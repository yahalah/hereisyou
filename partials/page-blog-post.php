<?php
require __DIR__ . '/header.php';
?>
<section class="section">
    <div class="container">
        <?php render_breadcrumbs($breadcrumbs); ?>
        <h1><?= htmlspecialchars($pageHeading) ?></h1>
        <p><?= htmlspecialchars($pageIntro) ?></p>
        <img src="<?= asset_url($coverImage) ?>" alt="<?= htmlspecialchars($pageHeading) ?> cover">
        <?php render_blog_content($pageHeading); ?>
        <div class="grid-2">
            <img src="<?= asset_url($inlineImageOne) ?>" alt="<?= htmlspecialchars($pageHeading) ?> diagram">
            <img src="<?= asset_url($inlineImageTwo) ?>" alt="<?= htmlspecialchars($pageHeading) ?> diagram">
        </div>
    </div>
</section>
<?php
require __DIR__ . '/footer.php';
?>
