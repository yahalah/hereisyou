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
                <img src="<?= asset_url($headerImage) ?>" alt="<?= htmlspecialchars($pageHeading) ?> team">
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2>Enterprise delivery for <?= htmlspecialchars($pageHeading) ?></h2>
        <?php render_long_content($pageHeading, 10); ?>
    </div>
</section>
<section class="section alt">
    <div class="container">
        <h2>Delivery focus areas</h2>
        <div class="grid-3">
            <div class="card"><img src="<?= asset_url('assets/icons/secure.svg') ?>" alt="Security icon"><h3>Security</h3><p>Threat modelling and secure coding aligned to governance.</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/quality.svg') ?>" alt="Quality icon"><h3>Quality</h3><p>Automated testing and code review for reliable releases.</p></div>
            <div class="card"><img src="<?= asset_url('assets/icons/leadership.svg') ?>" alt="Leadership icon"><h3>Leadership</h3><p>Senior oversight for predictable enterprise delivery.</p></div>
        </div>
    </div>
</section>
<section class="section alt">
    <div class="container grid-2">
        <div>
            <h2>Security, quality and governance</h2>
            <?php render_long_content('Security and quality for ' . $pageHeading, 4); ?>
        </div>
        <div>
            <img src="<?= asset_url('assets/img/diagrams/architecture.svg') ?>" alt="Architecture diagram">
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <h2>Related technologies and industries</h2>
        <div class="grid-3">
            <div class="card"><h3>Cloud Solutions</h3><a href="<?= site_url('/technologies/cloud-solutions/') ?>">Explore cloud solutions</a></div>
            <div class="card"><h3>Mobile Application Platforms</h3><a href="<?= site_url('/technologies/mobile-application/') ?>">Explore mobile platforms</a></div>
            <div class="card"><h3>Financial Services</h3><a href="<?= site_url('/industries/financial/') ?>">Explore financial services</a></div>
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
