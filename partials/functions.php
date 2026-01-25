<?php
$config = require __DIR__ . '/../config/site.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function site_config(): array
{
    static $config;
    if (!$config) {
        $config = require __DIR__ . '/../config/site.php';
    }
    return $config;
}

function site_url(string $path = ''): string
{
    $base = rtrim(site_config()['site_url'], '/');
    return $base . '/' . ltrim($path, '/');
}

function asset_url(string $path): string
{
    return '/' . ltrim($path, '/');
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf(string $token): bool
{
    return hash_equals($_SESSION['csrf_token'] ?? '', $token);
}

function db(): PDO
{
    $config = site_config();
    $dsn = 'sqlite:' . $config['storage'];
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('CREATE TABLE IF NOT EXISTS submissions (id INTEGER PRIMARY KEY AUTOINCREMENT, type TEXT, name TEXT, email TEXT, phone TEXT, company TEXT, message TEXT, payload TEXT, created_at TEXT)');
    $pdo->exec('CREATE TABLE IF NOT EXISTS chats (id INTEGER PRIMARY KEY AUTOINCREMENT, session_id TEXT, message TEXT, created_at TEXT)');
    $pdo->exec('CREATE TABLE IF NOT EXISTS rate_limits (id INTEGER PRIMARY KEY AUTOINCREMENT, endpoint TEXT, ip TEXT, created_at INTEGER)');
    return $pdo;
}

function rate_limit(string $endpoint, int $limit, int $windowSeconds): bool
{
    $pdo = db();
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $now = time();
    $windowStart = $now - $windowSeconds;
    $stmt = $pdo->prepare('DELETE FROM rate_limits WHERE created_at < ?');
    $stmt->execute([$windowStart]);
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM rate_limits WHERE endpoint = ? AND ip = ?');
    $stmt->execute([$endpoint, $ip]);
    $count = (int) $stmt->fetchColumn();
    if ($count >= $limit) {
        return false;
    }
    $stmt = $pdo->prepare('INSERT INTO rate_limits (endpoint, ip, created_at) VALUES (?, ?, ?)');
    $stmt->execute([$endpoint, $ip, $now]);
    return true;
}

function send_smtp_mail(string $to, string $subject, string $body, string $replyTo = ''): bool
{
    $config = site_config();
    $smtp = $config['smtp'];
    $host = $smtp['host'];
    $port = $smtp['port'];
    $secure = $smtp['secure'];

    $protocol = '';
    if ($secure === 'ssl') {
        $protocol = 'ssl://';
    }

    $socket = stream_socket_client($protocol . $host . ':' . $port, $errno, $errstr, 10);
    if (!$socket) {
        return false;
    }

    $read = function () use ($socket) {
        return fgets($socket, 515);
    };

    $send = function (string $command) use ($socket) {
        fwrite($socket, $command . "\r\n");
    };

    $read();
    $send('EHLO kindlytech.co.uk');
    $read();

    if ($secure === 'tls') {
        $send('STARTTLS');
        $read();
        stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
        $send('EHLO kindlytech.co.uk');
        $read();
    }

    $send('AUTH LOGIN');
    $read();
    $send(base64_encode($smtp['user']));
    $read();
    $send(base64_encode($smtp['pass']));
    $read();

    $fromEmail = $smtp['from_email'];
    $fromName = $smtp['from_name'];
    $headers = [
        'From: ' . $fromName . ' <' . $fromEmail . '>',
        'To: ' . $to,
        'Subject: ' . $subject,
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
    ];

    if ($replyTo) {
        $headers[] = 'Reply-To: ' . $replyTo;
    }

    $send('MAIL FROM:<' . $fromEmail . '>');
    $read();
    $send('RCPT TO:<' . $to . '>');
    $read();
    $send('DATA');
    $read();
    $send(implode("\r\n", $headers) . "\r\n\r\n" . $body . "\r\n.");
    $read();
    $send('QUIT');
    fclose($socket);
    return true;
}

function json_ld(array $data): string
{
    return '<script type="application/ld+json">' . json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
}

function breadcrumbs_schema(array $breadcrumbs): array
{
    $items = [];
    $position = 1;
    foreach ($breadcrumbs as $crumb) {
        $items[] = [
            '@type' => 'ListItem',
            'position' => $position++,
            'name' => $crumb['label'],
            'item' => site_url($crumb['url']),
        ];
    }
    return [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $items,
    ];
}

function render_breadcrumbs(array $breadcrumbs): void
{
    if (count($breadcrumbs) < 2) {
        return;
    }
    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<ol>';
    foreach ($breadcrumbs as $index => $crumb) {
        $isLast = $index === count($breadcrumbs) - 1;
        echo '<li>'; 
        if ($isLast) {
            echo '<span>' . htmlspecialchars($crumb['label']) . '</span>';
        } else {
            echo '<a href="' . htmlspecialchars(site_url($crumb['url'])) . '">' . htmlspecialchars($crumb['label']) . '</a>';
        }
        echo '</li>';
    }
    echo '</ol>';
    echo '</nav>';
}

function render_faqs(array $faqs): void
{
    echo '<div class="faq-grid">';
    foreach ($faqs as $faq) {
        echo '<div class="faq-item">';
        echo '<h3>' . htmlspecialchars($faq['q']) . '</h3>';
        echo '<p>' . htmlspecialchars($faq['a']) . '</p>';
        echo '</div>';
    }
    echo '</div>';
}

function default_faqs(string $type): array
{
    $service = [
        ['q' => 'How do you scope delivery?', 'a' => 'We run discovery sessions to align outcomes, architecture and governance before committing to delivery milestones.'],
        ['q' => 'Do you work with legacy estates?', 'a' => 'Yes. We specialise in stabilising and modernising platforms without operational downtime.'],
        ['q' => 'What engagement models do you support?', 'a' => 'We offer fixed price, time and materials, and retainer-based models tailored to governance needs.'],
        ['q' => 'How do you manage security?', 'a' => 'We embed threat modelling, secure code review and automated testing in every delivery stream.'],
        ['q' => 'Can you support long-term?', 'a' => 'Yes. We provide post-launch support, optimisation and roadmap planning.'],
        ['q' => 'Where are your teams based?', 'a' => 'Our delivery teams are UK-based, ensuring aligned time zones and governance expectations.'],
        ['q' => 'How do you report progress?', 'a' => 'We provide weekly status reporting, KPI dashboards and steering committee updates.'],
        ['q' => 'Do you work with internal teams?', 'a' => 'We integrate with internal engineering, QA and security teams to maintain continuity.'],
    ];
    $technology = [
        ['q' => 'How do you choose the right architecture?', 'a' => 'We assess existing constraints, regulatory requirements and future growth plans before recommending patterns.'],
        ['q' => 'Can you integrate with legacy systems?', 'a' => 'Yes, we design integration layers that allow legacy systems to coexist with new services.'],
        ['q' => 'Do you provide cloud cost governance?', 'a' => 'We design cost controls, tagging strategies and FinOps reporting for transparency.'],
        ['q' => 'How do you ensure quality?', 'a' => 'Automated testing, code review and CI/CD pipelines are standard across all deliveries.'],
        ['q' => 'Is data governance included?', 'a' => 'Yes, we align data models with security, retention and audit policies.'],
        ['q' => 'Can you provide support?', 'a' => 'We offer long-term support and optimisation programmes.'],
    ];
    $industry = [
        ['q' => 'Do you understand regulatory expectations?', 'a' => 'We align delivery with sector-specific governance, audit and data protection requirements.'],
        ['q' => 'Can you modernise existing platforms?', 'a' => 'Yes, we deliver staged modernisation to protect service continuity.'],
        ['q' => 'How do you manage stakeholders?', 'a' => 'We provide clear reporting, steering forums and executive-level updates.'],
        ['q' => 'Do you support integrations?', 'a' => 'We build integration layers for core systems, data platforms and third parties.'],
        ['q' => 'What about security?', 'a' => 'Security-by-design, testing and monitoring are built into delivery.'],
        ['q' => 'Do you offer ongoing support?', 'a' => 'We provide managed support and continuous improvement programmes.'],
    ];

    return match ($type) {
        'technology' => $technology,
        'industry' => $industry,
        default => $service,
    };
}

function render_long_content(string $topic, int $paragraphs = 10): void
{
    $templates = [
        "$topic at Kindly Tech begins with clear governance and a practical delivery plan shaped by UK stakeholders, security expectations and the realities of regulated procurement.",
        "Our engineers align architecture with long-term operations, selecting platforms and integration patterns that allow enterprise teams to evolve services safely and without downtime.",
        "We build with predictable delivery in mind, pairing discovery workshops with technical spikes so risk is surfaced early and the roadmap stays transparent.",
        "The team works in multidisciplinary squads, blending product strategy, design, engineering and QA to deliver usable software that meets compliance and performance goals.",
        "We prioritise quality-first engineering by using code review, automated testing, CI/CD, monitoring and backup strategies tailored to the environment you operate in.",
        "As a UK software development company, we also focus on data handling, GDPR compliance and resilient cloud architecture that supports auditability and change control.",
        "Clients value the stability of a London software developers team that can collaborate in the same time zone, from discovery to launch and beyond.",
        "Each engagement is supported by transparent reporting, stakeholder comms and measurable outcomes that keep leadership and technical teams aligned.",
        "We design for maintainability, ensuring that future teams can extend systems without needing costly rewrites or disruption to live operations.",
        "By pairing strong governance with pragmatic engineering, Kindly Tech delivers secure, enterprise-grade software that supports strategic growth.",
    ];

    for ($i = 0; $i < $paragraphs; $i++) {
        $sentences = [];
        $sentences[] = $templates[$i % count($templates)];
        $sentences[] = "From architecture reviews to delivery governance, we maintain predictable scope control while keeping user needs at the centre.";
        $sentences[] = "Teams rely on us for reliable delivery against critical milestones, with clear documentation and full visibility of progress.";
        $sentences[] = "We align with internal security and compliance teams, ensuring that release workflows, change control and incident response are well defined.";
        $sentences[] = "This approach enables organisations to modernise platforms without sacrificing stability or user trust.";
        $sentences[] = "Kindly Tech London teams collaborate with product owners to prioritise outcomes, not just output, ensuring measurable business value.";
        $sentences[] = "The result is a dependable partner for web app development London, mobile app development UK and cloud & DevOps UK projects.";
        echo '<p>' . implode(' ', $sentences) . '</p>';
    }
}

function render_blog_content(string $topic): void
{
    $sections = [
        'Strategic context',
        'Technical considerations',
        'Governance and risk',
        'Delivery playbook',
        'Commercial guidance',
        'Next steps',
    ];
    foreach ($sections as $section) {
        echo '<h2>' . htmlspecialchars($section) . '</h2>';
        render_long_content($topic, 2);
        echo '<ul>';
        echo '<li>Define outcomes and measurable KPIs before delivery starts, especially for multi-year transformation programmes.</li>';
        echo '<li>Invest in architecture runway and platform observability to keep delivery predictable and secure.</li>';
        echo '<li>Ensure vendor governance covers data protection, exit planning and long-term support.</li>';
        echo '</ul>';
    }
}
?>
