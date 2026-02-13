<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';
$pageTitle = 'Contact';
$sent = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim((string) filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $message = trim((string) filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS));
    if ($name !== '' && $email && $message !== '') {
        // In production, send this via secure mailer or store in DB.
        $sent = true;
    }
}

include __DIR__ . '/includes/header.php';
?>
<section class="section">
    <div class="container">
        <h1>Contact Us</h1>
        <?php if ($sent): ?>
            <p class="notice success">Thank you. Your message has been received.</p>
        <?php endif; ?>
        <div class="card-grid">
            <form method="post" class="form-wrap">
                <div>
                    <label for="name">Name</label>
                    <input id="name" name="name" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button class="btn" type="submit">Send Message</button>
            </form>
            <div class="form-wrap">
                <h3>Find Us</h3>
                <iframe class="map-placeholder" title="Google Map Placeholder" src="https://maps.google.com/maps?q=london&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
            </div>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
