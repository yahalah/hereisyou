<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';
$pageTitle = 'Booking Success';

$bookingUpdated = false;
$message = 'Your payment has been processed.';

$sessionId = isset($_GET['session_id']) ? trim((string) $_GET['session_id']) : '';

if ($sessionId !== '') {
    try {
        require_once __DIR__ . '/vendor/autoload.php';
        \Stripe\Stripe::setApiKey($stripeSecretKey);

        // Retrieve Checkout Session from Stripe to verify payment status.
        $session = \Stripe\Checkout\Session::retrieve($sessionId);

        if ($session && $session->payment_status === 'paid' && isset($session->metadata->booking_id)) {
            $bookingId = (int) $session->metadata->booking_id;
            $update = $pdo->prepare('UPDATE bookings SET payment_status = :payment_status, booking_status = :booking_status WHERE id = :id');
            $update->execute([
                'payment_status' => 'paid',
                'booking_status' => 'confirmed',
                'id' => $bookingId,
            ]);
            $bookingUpdated = true;
        } else {
            $message = 'Payment verification is pending. Please contact support if needed.';
        }
    } catch (Exception $e) {
        $message = 'Unable to verify payment automatically. Please contact support with your payment reference.';
    }
}

include __DIR__ . '/includes/header.php';
?>
<section class="section">
    <div class="container">
        <?php if ($bookingUpdated): ?>
            <p class="notice success">Thank you! Your booking is confirmed and marked as paid.</p>
        <?php else: ?>
            <p class="notice error"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <a href="/ababeelhotel/index.php" class="btn">Back to Home</a>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
