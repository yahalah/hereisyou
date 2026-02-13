<?php
require_once __DIR__ . '/config.php';
$pageTitle = 'Facilities';
include __DIR__ . '/includes/header.php';
?>
<section class="section">
    <div class="container">
        <h1>Hotel Facilities</h1>
        <div class="card-grid">
            <div class="card card-body facility"><h3><i>✓</i>24/7 Reception</h3><p>Round-the-clock assistance from our front desk team.</p><img src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa" alt="Reception"></div>
            <div class="card card-body facility"><h3><i>✓</i>Spacious Lobby</h3><p>Relax in our modern, comfortable lobby area.</p><img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b" alt="Lobby"></div>
            <div class="card card-body facility"><h3><i>✓</i>On-site Restaurant</h3><p>Fresh meals and drinks served daily.</p><img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5" alt="Restaurant"></div>
            <div class="card card-body facility"><h3><i>✓</i>Private Bathrooms</h3><p>Clean en-suite bathrooms with toiletries.</p><img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a" alt="Bathroom"></div>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
