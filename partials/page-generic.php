<?php
require __DIR__ . '/header.php';
?>
<section class="section">
    <div class="container">
        <?php render_breadcrumbs($breadcrumbs); ?>
        <h1><?= htmlspecialchars($pageHeading) ?></h1>
        <p><?= htmlspecialchars($pageIntro) ?></p>
        <?php render_long_content($pageHeading, $paragraphs ?? 8); ?>
        <?php if (!empty($extraContent)) { echo $extraContent; } ?>
    </div>
</section>
<?php
require __DIR__ . '/footer.php';
?>
