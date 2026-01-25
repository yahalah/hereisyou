<?php
$pageTitle = 'Contact | Kindly Tech';
$pageDescription = 'Book a call with Kindly Tech delivery leads and discuss your enterprise programme.';
$pageHeading = 'Contact Kindly Tech';
$pageIntro = 'Talk to our UK delivery team about secure, enterprise-grade software delivery.';
$breadcrumbs = [
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Contact', 'url' => '/contact/'],
];
require __DIR__ . '/../partials/header.php';
?>
<section class="section">
    <div class="container">
        <?php render_breadcrumbs($breadcrumbs); ?>
        <h1><?= htmlspecialchars($pageHeading) ?></h1>
        <p><?= htmlspecialchars($pageIntro) ?></p>
        <div class="grid-2">
            <form action="/api/contact.php" method="post">
                <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
                <input type="text" name="website" class="hidden" style="display:none" tabindex="-1" autocomplete="off">
                <div class="form-grid">
                    <input type="text" name="name" placeholder="Full name" required>
                    <input type="email" name="email" placeholder="Work email" required>
                    <input type="text" name="phone" placeholder="Phone">
                    <input type="text" name="company" placeholder="Company">
                </div>
                <textarea name="message" rows="6" placeholder="Describe your project" required></textarea>
                <button class="btn btn-primary" type="submit">Send message</button>
            </form>
            <div>
                <h2>Direct contact</h2>
                <p>Phone: <?= htmlspecialchars(site_config()['phone']) ?></p>
                <p>Email: <?= htmlspecialchars(site_config()['emails']['info']) ?></p>
                <p>Support: <?= htmlspecialchars(site_config()['emails']['support']) ?></p>
                <p>Address: <?= htmlspecialchars(site_config()['address']) ?></p>
                <img src="<?= asset_url('assets/img/people/support.svg') ?>" alt="Support team">
            </div>
        </div>
    </div>
</section>
<div class="chat-widget">
    <div class="chat-panel">
        <div class="chat-messages"></div>
        <form class="chat-form">
            <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
            <input type="text" name="message" placeholder="Ask a question">
            <button class="btn btn-primary" type="submit">Send</button>
        </form>
    </div>
    <button class="chat-button">Chat with us</button>
</div>
<script src="/assets/js/chat.js"></script>
<?php
require __DIR__ . '/../partials/footer.php';
?>
