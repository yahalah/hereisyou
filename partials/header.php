<?php
require_once __DIR__ . '/functions.php';

$site = site_config();
$pageTitle = $pageTitle ?? $site['company'] . ' | Quality-first engineering';
$pageDescription = $pageDescription ?? 'Kindly Tech builds secure, enterprise-grade software for UK organisations.';
$pageUrl = $pageUrl ?? site_url(trim($_SERVER['REQUEST_URI'], '/'));
$breadcrumbs = $breadcrumbs ?? [
    ['label' => 'Home', 'url' => '/'],
];

$orgSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => $site['company'],
    'url' => $site['site_url'],
    'telephone' => $site['phone'],
    'email' => $site['emails']['info'],
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => $site['address'],
        'addressCountry' => 'GB',
    ],
];

$localSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => $site['company'],
    'url' => $site['site_url'],
    'telephone' => $site['phone'],
    'email' => $site['emails']['support'],
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => $site['address'],
        'addressCountry' => 'GB',
    ],
];

$websiteSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    'name' => $site['company'],
    'url' => $site['site_url'],
];

$schemaBlocks = [
    json_ld($orgSchema),
    json_ld($localSchema),
    json_ld($websiteSchema),
    json_ld(breadcrumbs_schema($breadcrumbs)),
];

if (!empty($extraSchema)) {
    $schemaBlocks[] = json_ld($extraSchema);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
    <link rel="canonical" href="<?= htmlspecialchars($pageUrl) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDescription) ?>">
    <meta property="og:url" content="<?= htmlspecialchars($pageUrl) ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= htmlspecialchars($site['company']) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="stylesheet" href="<?= asset_url('assets/css/style.css') ?>">
    <link rel="icon" href="<?= asset_url('assets/img/logo/favicon.svg') ?>" type="image/svg+xml">
    <?php foreach ($schemaBlocks as $schema) { echo $schema; } ?>
</head>
<body>
<a class="skip-link" href="#main-content">Skip to content</a>
<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="<?= site_url('/') ?>">
            <img src="<?= asset_url('assets/img/logo/primary-logo.svg') ?>" alt="Kindly Tech logo">
        </a>
        <nav class="desktop-nav" aria-label="Primary">
            <button class="mega-trigger" aria-expanded="false">Services</button>
            <a href="<?= site_url('/services/technologies/') ?>">Technologies</a>
            <a href="<?= site_url('/services/industries/') ?>">Industries</a>
            <a href="<?= site_url('/about/') ?>">Company</a>
            <a href="<?= site_url('/blog/') ?>">Resources</a>
        </nav>
        <div class="header-cta">
            <a class="btn btn-primary" href="<?= site_url('/contact/') ?>">Book a call</a>
            <button class="mobile-toggle" aria-expanded="false" aria-label="Open menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
    <div class="mega-menu" aria-hidden="true">
        <div class="container mega-grid">
            <div>
                <h4>Services</h4>
                <a href="<?= site_url('/services/mobile-app-development/') ?>">Mobile App Development<span>Native and cross-platform mobile applications.</span></a>
                <a href="<?= site_url('/services/legacy-software-modernisation/') ?>">Legacy Software Modernisation<span>Secure upgrades for critical legacy systems.</span></a>
                <a href="<?= site_url('/services/web-application-development/') ?>">Web Application Development<span>Enterprise web platforms and portals.</span></a>
                <a href="<?= site_url('/services/digital-transformation/') ?>">Digital Transformation<span>Strategic technology change programmes.</span></a>
            </div>
            <div>
                <h4>Technologies</h4>
                <a href="<?= site_url('/technologies/cloud-solutions/') ?>">Cloud Solutions<span>Scalable cloud architecture and migration.</span></a>
                <a href="<?= site_url('/technologies/artificial-intelligence-machine-learning/') ?>">AI & Machine Learning<span>Applied intelligence for operations.</span></a>
                <a href="<?= site_url('/technologies/internet-of-things-iot/') ?>">IoT Platforms<span>Connected device ecosystems.</span></a>
                <a href="<?= site_url('/technologies/blockchain-cryptocurrency/') ?>">Blockchain<span>Distributed ledgers and trust layers.</span></a>
            </div>
            <div>
                <h4>Industries</h4>
                <a href="<?= site_url('/industries/financial/') ?>">Financial Services<span>Secure platforms for regulated finance.</span></a>
                <a href="<?= site_url('/industries/healthcare/') ?>">Healthcare<span>Patient-first digital systems.</span></a>
                <a href="<?= site_url('/industries/education/') ?>">Education<span>Learning platforms and analytics.</span></a>
                <a href="<?= site_url('/industries/insurance/') ?>">Insurance<span>Claims automation and insights.</span></a>
            </div>
            <div>
                <h4>Company</h4>
                <a href="<?= site_url('/about/') ?>">About Kindly Tech<span>UK-based engineering teams.</span></a>
                <a href="<?= site_url('/how-we-work/') ?>">How We Work<span>Governed delivery model.</span></a>
                <a href="<?= site_url('/careers/') ?>">Careers<span>Join our delivery teams.</span></a>
                <a href="<?= site_url('/contact/') ?>">Contact<span>Talk to a delivery lead.</span></a>
            </div>
            <div>
                <h4>Resources</h4>
                <a href="<?= site_url('/case-studies/') ?>">Case Studies<span>Evidence-led transformation.</span></a>
                <a href="<?= site_url('/blog/') ?>">Insights Blog<span>Guidance for UK buyers.</span></a>
                <a href="<?= site_url('/faqs/') ?>">FAQs<span>Engagement and delivery queries.</span></a>
                <a href="<?= site_url('/sitemap/') ?>">Sitemap<span>Browse every page.</span></a>
                <a href="<?= site_url('/security/') ?>">Security<span>Responsible disclosure.</span></a>
            </div>
        </div>
    </div>
    <div class="mobile-drawer" aria-hidden="true">
        <div class="mobile-header">
            <span>Menu</span>
            <button class="mobile-close" aria-label="Close menu">×</button>
        </div>
        <div class="mobile-accordion">
            <button class="accordion-trigger">Services</button>
            <div class="accordion-panel">
                <a href="<?= site_url('/services/') ?>">Services overview</a>
                <a href="<?= site_url('/services/mobile-app-development/') ?>">Mobile App Development</a>
                <a href="<?= site_url('/services/legacy-software-modernisation/') ?>">Legacy Modernisation</a>
                <a href="<?= site_url('/services/web-application-development/') ?>">Web App Development</a>
                <a href="<?= site_url('/services/digital-transformation/') ?>">Digital Transformation</a>
                <a href="<?= site_url('/services/software-cybersecurity/') ?>">Software Cybersecurity</a>
            </div>
            <button class="accordion-trigger">Technologies</button>
            <div class="accordion-panel">
                <a href="<?= site_url('/services/technologies/') ?>">Technologies overview</a>
                <a href="<?= site_url('/technologies/cloud-solutions/') ?>">Cloud Solutions</a>
                <a href="<?= site_url('/technologies/artificial-intelligence-machine-learning/') ?>">AI & ML</a>
                <a href="<?= site_url('/technologies/web-application/') ?>">Web Platforms</a>
                <a href="<?= site_url('/technologies/mobile-application/') ?>">Mobile Platforms</a>
            </div>
            <button class="accordion-trigger">Industries</button>
            <div class="accordion-panel">
                <a href="<?= site_url('/services/industries/') ?>">Industries overview</a>
                <a href="<?= site_url('/industries/financial/') ?>">Financial</a>
                <a href="<?= site_url('/industries/healthcare/') ?>">Healthcare</a>
                <a href="<?= site_url('/industries/education/') ?>">Education</a>
                <a href="<?= site_url('/industries/gaming/') ?>">Gaming</a>
            </div>
            <button class="accordion-trigger">Company</button>
            <div class="accordion-panel">
                <a href="<?= site_url('/about/') ?>">About</a>
                <a href="<?= site_url('/how-we-work/') ?>">How We Work</a>
                <a href="<?= site_url('/engagement-models/') ?>">Engagement Models</a>
                <a href="<?= site_url('/careers/') ?>">Careers</a>
                <a href="<?= site_url('/contact/') ?>">Contact</a>
            </div>
            <button class="accordion-trigger">Resources</button>
            <div class="accordion-panel">
                <a href="<?= site_url('/case-studies/') ?>">Case Studies</a>
                <a href="<?= site_url('/blog/') ?>">Insights Blog</a>
                <a href="<?= site_url('/faqs/') ?>">FAQs</a>
                <a href="<?= site_url('/privacy-policy/') ?>">Privacy Policy</a>
            </div>
        </div>
        <a class="btn btn-primary mobile-cta" href="<?= site_url('/contact/') ?>">Book a call</a>
    </div>
</header>
<main id="main-content">
