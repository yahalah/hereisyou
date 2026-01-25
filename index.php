<?php
$pageTitle = 'Kindly Tech | Secure, enterprise-grade software — delivered by UK engineers';
$pageDescription = 'Kindly Tech is a UK software development company delivering quality-first engineering, governance-led delivery and long-term support.';
$pageHeading = 'Secure, enterprise-grade software — delivered by UK engineers.';
$pageIntro = 'Kindly Tech builds and modernises web, mobile and cloud platforms with clear governance, predictable delivery and long-term support — from discovery to launch and beyond.';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
];
require __DIR__ . '/partials/header.php';
?>
<section class="hero">
    <div class="container hero-grid">
        <div>
            <p class="tagline">Quality-first engineering.</p>
            <h1><?= htmlspecialchars($pageHeading) ?></h1>
            <p><?= htmlspecialchars($pageIntro) ?></p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="<?= site_url('/contact/') ?>">Book a call</a>
                <a class="btn btn-secondary" href="<?= site_url('/case-studies/') ?>">View case studies</a>
            </div>
        </div>
        <div>
            <img src="<?= asset_url('assets/img/people/hero.svg') ?>" alt="Kindly Tech engineers in a UK office">
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2>Enterprise delivery that works in the real world</h2>
        <?php render_long_content('Kindly Tech home introduction', 12); ?>
    </div>
</section>
<section class="stats-band">
    <div class="container grid-3">
        <div class="stat">
            <h3>UK-led teams</h3>
            <p>Delivery squads operate in the same time zone with clear governance.</p>
        </div>
        <div class="stat">
            <h3>Quality-first engineering</h3>
            <p>Code review, automated testing and CI/CD as standard.</p>
        </div>
        <div class="stat">
            <h3>Long-term support</h3>
            <p>Managed support and optimisation for enterprise platforms.</p>
        </div>
    </div>
</section>
<section class="section alt">
    <div class="container">
        <h2>Delivery, discovery and support with real teams</h2>
        <div class="grid-3">
            <div class="card">
                <img src="<?= asset_url('assets/icons/discovery.svg') ?>" alt="Discovery icon">
                <h3>Discovery workshops</h3>
                <p>Workshops align stakeholders, map constraints and confirm measurable outcomes.</p>
                <img src="<?= asset_url('assets/img/people/discovery.svg') ?>" alt="Discovery workshop">
            </div>
            <div class="card">
                <img src="<?= asset_url('assets/icons/engineering.svg') ?>" alt="Engineering icon">
                <h3>Engineering delivery</h3>
                <p>Enterprise engineering squads deliver secure web, mobile and cloud platforms.</p>
                <img src="<?= asset_url('assets/img/people/engineering.svg') ?>" alt="Engineering delivery">
            </div>
            <div class="card">
                <img src="<?= asset_url('assets/icons/qa.svg') ?>" alt="QA icon">
                <h3>QA and reliability</h3>
                <p>Automated testing, CI/CD pipelines and monitoring ensure predictable releases.</p>
                <img src="<?= asset_url('assets/img/people/qa.svg') ?>" alt="Quality assurance">
            </div>
        </div>
        <div class="grid-3" style="margin-top:32px;">
            <div class="card">
                <img src="<?= asset_url('assets/icons/delivery.svg') ?>" alt="Delivery icon">
                <h3>Delivery management</h3>
                <p>Structured governance for schedule, risk and quality control.</p>
                <img src="<?= asset_url('assets/img/people/delivery.svg') ?>" alt="Delivery management">
            </div>
            <div class="card">
                <img src="<?= asset_url('assets/icons/support.svg') ?>" alt="Support icon">
                <h3>Support and optimisation</h3>
                <p>Post-launch support with SLA-backed response and roadmap planning.</p>
                <img src="<?= asset_url('assets/img/people/support.svg') ?>" alt="Support team">
            </div>
            <div class="card">
                <img src="<?= asset_url('assets/icons/leadership.svg') ?>" alt="Leadership icon">
                <h3>Executive oversight</h3>
                <p>Senior engineers and delivery leads provide stable leadership.</p>
                <img src="<?= asset_url('assets/img/people/leadership.svg') ?>" alt="Leadership team">
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container grid-2">
        <div>
            <h2>Security and quality controls</h2>
            <?php render_long_content('Security and quality controls', 6); ?>
        </div>
        <div>
            <img src="<?= asset_url('assets/img/diagrams/architecture.svg') ?>" alt="Security and quality diagram">
        </div>
    </div>
</section>
<section class="section alt">
    <div class="container">
        <h2>Process timeline</h2>
        <div class="grid-3">
            <div class="card"><img src="<?= asset_url('assets/icons/discovery.svg') ?>" alt="Discovery">Discovery</div>
            <div class="card"><img src="<?= asset_url('assets/icons/design.svg') ?>" alt="Design">Design</div>
            <div class="card"><img src="<?= asset_url('assets/icons/engineering.svg') ?>" alt="Build">Build</div>
            <div class="card"><img src="<?= asset_url('assets/icons/qa.svg') ?>" alt="QA">QA</div>
            <div class="card"><img src="<?= asset_url('assets/icons/delivery.svg') ?>" alt="Launch">Launch</div>
            <div class="card"><img src="<?= asset_url('assets/icons/support.svg') ?>" alt="Support">Support</div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2>Enterprise capability icons</h2>
        <div class="grid-3">
            <div class="card"><img src="<?= asset_url('assets/icons/cloud.svg') ?>" alt="Cloud icon"><p>Cloud architecture</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/mobile.svg') ?>" alt="Mobile icon"><p>Mobile platforms</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/web.svg') ?>" alt="Web icon"><p>Web applications</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/data.svg') ?>" alt="Data icon"><p>Data platforms</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/governance.svg') ?>" alt="Governance icon"><p>Governance</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/integration.svg') ?>" alt="Integration icon"><p>Systems integration</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/timeline.svg') ?>" alt="Timeline icon"><p>Delivery planning</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/secure.svg') ?>" alt="Security icon"><p>Security controls</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/quality.svg') ?>" alt="Quality icon"><p>Quality assurance</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/support.svg') ?>" alt="Support icon"><p>Support services</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/uk.svg') ?>" alt="UK icon"><p>UK delivery</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/leadership.svg') ?>" alt="Leadership icon"><p>Executive oversight</p></div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2>Platforms we build for</h2>
        <p>Enterprise platforms across cloud, desktop and mobile ecosystems.</p>
        <div class="logo-strip">
            <img src="<?= asset_url('assets/brand/microsoft.svg') ?>" alt="Microsoft">
            <img src="<?= asset_url('assets/brand/windows.svg') ?>" alt="Windows">
            <img src="<?= asset_url('assets/brand/apple.svg') ?>" alt="Apple">
            <img src="<?= asset_url('assets/brand/macos.svg') ?>" alt="macOS">
            <img src="<?= asset_url('assets/brand/ios.svg') ?>" alt="iOS">
            <img src="<?= asset_url('assets/brand/android.svg') ?>" alt="Android">
            <img src="<?= asset_url('assets/brand/linux.svg') ?>" alt="Linux">
            <img src="<?= asset_url('assets/brand/aws.svg') ?>" alt="AWS">
            <img src="<?= asset_url('assets/brand/microsoftazure.svg') ?>" alt="Microsoft Azure">
            <img src="<?= asset_url('assets/brand/googlecloud.svg') ?>" alt="Google Cloud">
            <img src="<?= asset_url('assets/brand/docker.svg') ?>" alt="Docker">
            <img src="<?= asset_url('assets/brand/kubernetes.svg') ?>" alt="Kubernetes">
            <img src="<?= asset_url('assets/brand/github.svg') ?>" alt="GitHub">
        </div>
    </div>
</section>
<section class="section alt">
    <div class="container">
        <h2>Illustrative testimonials</h2>
        <div class="grid-3">
            <div class="card"><p><strong>Illustrative:</strong> “Kindly Tech brought disciplined governance to a complex programme and delivered on time.”</p></div>
            <div class="card"><p><strong>Illustrative:</strong> “Their UK-based engineers integrated with our teams and raised quality standards.”</p></div>
            <div class="card"><p><strong>Illustrative:</strong> “We gained clarity on roadmap, security and operational support.”</p></div>
        </div>
    </div>
</section>
<?php
require __DIR__ . '/partials/footer.php';
?>
