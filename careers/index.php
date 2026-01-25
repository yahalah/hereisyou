<?php
$pageTitle = 'Careers | Kindly Tech';
$pageDescription = 'Join Kindly Tech delivery teams in London and across the UK.';
$pageHeading = 'Careers at Kindly Tech';
$pageIntro = 'We hire experienced engineers, delivery managers and designers who value quality-first engineering.';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Careers', 'url' => '/careers/'],
];
require __DIR__ . '/../partials/header.php';
?>
<section class="section">
    <div class="container">
        <?php render_breadcrumbs($breadcrumbs); ?>
        <h1><?= htmlspecialchars($pageHeading) ?></h1>
        <p><?= htmlspecialchars($pageIntro) ?></p>
        <?php render_long_content('Careers at Kindly Tech', 8); ?>
    </div>
</section>
<section class="section alt">
    <div class="container">
        <h2>Apply now</h2>
        <form action="/api/careers.php" method="post">
            <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
            <input type="text" name="website" class="hidden" style="display:none" tabindex="-1" autocomplete="off">
            <div class="form-grid">
                <input type="text" name="name" placeholder="Full name" required>
                <input type="email" name="email" placeholder="Work email" required>
                <input type="text" name="phone" placeholder="Phone">
                <input type="text" name="role" placeholder="Role of interest">
            </div>
            <textarea name="message" rows="6" placeholder="Tell us about your experience" required></textarea>
            <button class="btn btn-primary" type="submit">Submit application</button>
        </form>
    </div>
</section>
<?php
require __DIR__ . '/../partials/footer.php';
?>
