<?php
require __DIR__ . '/header.php';
?>
<section class="section">
    <div class="container">
        <?php render_breadcrumbs($breadcrumbs); ?>
        <h1><?= htmlspecialchars($pageHeading) ?></h1>
        <p><?= htmlspecialchars($pageIntro) ?></p>
        <img src="<?= asset_url($headerImage) ?>" alt="<?= htmlspecialchars($pageHeading) ?> case study">
        <?php render_long_content($pageHeading, 8); ?>
        <p><strong>Illustrative example:</strong> This case study is a representative scenario compiled to show how Kindly Tech structures enterprise delivery without disclosing client identities.</p>
    </div>
</section>
<?php
require __DIR__ . '/footer.php';
?>
