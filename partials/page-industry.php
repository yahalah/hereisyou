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
                <img src="<?= asset_url($headerImage) ?>" alt="<?= htmlspecialchars($pageHeading) ?> sector">
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2>Sector outcomes for <?= htmlspecialchars($pageHeading) ?></h2>
        <?php render_long_content($pageHeading, 9); ?>
    </div>
</section>
<section class="section alt">
    <div class="container">
        <h2>Industry priorities</h2>
        <div class="grid-3">
            <div class="card"><img src="<?= asset_url('assets/icons/secure.svg') ?>" alt="Security icon"><h3>Security</h3><p>Risk controls aligned to sector regulations.</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/data.svg') ?>" alt="Data icon"><h3>Data governance</h3><p>Secure data handling and audit trails.</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/support.svg') ?>" alt="Support icon"><h3>Operational support</h3><p>Long-term platform reliability and support.</p></div>
        </div>
    </div>
</section>
<section class="section alt">
    <div class="container grid-2">
        <div>
            <h2>Delivery diagram</h2>
            <img src="<?= asset_url('assets/img/diagrams/architecture.svg') ?>" alt="Delivery diagram">
        </div>
        <div>
            <h2>Governance and compliance</h2>
            <?php render_long_content('Governance for ' . $pageHeading, 4); ?>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2>Related services and technologies</h2>
        <div class="grid-3">
            <div class="card"><h3>Digital Transformation</h3><a href="<?= site_url('/services/digital-transformation/') ?>">Explore the service</a></div>
            <div class="card"><h3>Cloud Solutions</h3><a href="<?= site_url('/technologies/cloud-solutions/') ?>">Explore the technology</a></div>
            <div class="card"><h3>Web Application Platforms</h3><a href="<?= site_url('/technologies/web-application/') ?>">Explore the technology</a></div>
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
