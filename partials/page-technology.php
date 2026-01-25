<?php
require __DIR__ . '/header.php';
?>
<section class="hero">
    <div class="container">
        <?php render_breadcrumbs($breadcrumbs); ?>
        <div class="hero-grid">
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
                <img src="<?= asset_url($headerImage) ?>" alt="<?= htmlspecialchars($pageHeading) ?> technology">
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2>How we deliver <?= htmlspecialchars($pageHeading) ?></h2>
        <?php render_long_content($pageHeading, 9); ?>
    </div>
</section>
<section class="section alt">
    <div class="container">
        <h2>Technology capability highlights</h2>
        <div class="grid-3">
            <div class="card"><img src="<?= asset_url('assets/icons/cloud.svg') ?>" alt="Cloud icon"><h3>Cloud architecture</h3><p>Resilient cloud & DevOps UK practices.</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/integration.svg') ?>" alt="Integration icon"><h3>Integrations</h3><p>Secure API and data integration layers.</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/governance.svg') ?>" alt="Governance icon"><h3>Governance</h3><p>Controls, auditability and compliance by design.</p></div>
        </div>
    </div>
</section>
<section class="section alt">
    <div class="container grid-2">
        <div>
            <h2>Architecture diagram</h2>
            <img src="<?= asset_url('assets/img/diagrams/architecture.svg') ?>" alt="Architecture diagram">
        </div>
        <div>
            <h2>Enterprise readiness</h2>
            <?php render_long_content('Enterprise readiness for ' . $pageHeading, 4); ?>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2>Related services and industries</h2>
        <div class="grid-3">
            <div class="card"><h3>Web Application Development</h3><a href="<?= site_url('/services/web-application-development/') ?>">Explore the service</a></div>
            <div class="card"><h3>Legacy Modernisation</h3><a href="<?= site_url('/services/legacy-software-modernisation/') ?>">Explore the service</a></div>
            <div class="card"><h3>Healthcare</h3><a href="<?= site_url('/industries/healthcare/') ?>">Explore the industry</a></div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2>Frequently asked questions</h2>
        <?php render_faqs($faqs); ?>
    </div>
</section>
<?php
require __DIR__ . '/footer.php';
?>
