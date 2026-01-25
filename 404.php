<?php
$pageTitle = 'Page Not Found | Kindly Tech';
$pageDescription = 'The page you requested could not be found.';
$pageHeading = 'Page not found';
$pageIntro = 'The page you are looking for does not exist. Use the navigation or return home.';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => '404', 'url' => '/404.php'],
];
require __DIR__ . '/partials/header.php';
?>
<section class="section">
    <div class="container">
        <?php render_breadcrumbs($breadcrumbs); ?>
        <h1><?= htmlspecialchars($pageHeading) ?></h1>
        <p><?= htmlspecialchars($pageIntro) ?></p>
        <a class="btn btn-primary" href="<?= site_url('/') ?>">Return home</a>
    </div>
</section>
<?php
require __DIR__ . '/partials/footer.php';
?>
