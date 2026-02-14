<?php
require_once __DIR__ . '/config.php';

$bookingId = (int)($_GET['booking_id'] ?? 0);
$sessionId = trim($_GET['session_id'] ?? '');
$statusMessage = 'Unable to verify payment.';

if ($bookingId > 0 && $sessionId !== '') {
    $stmt = $pdo->prepare('SELECT * FROM bookings WHERE id = ?');
    $stmt->execute([$bookingId]);
    $booking = $stmt->fetch();

    if ($booking && $booking['stripe_session_id'] === $sessionId) {
        $update = $pdo->prepare("UPDATE bookings SET payment_status = 'paid' WHERE id = ?");
        $update->execute([$bookingId]);
        $statusMessage = 'Payment received and your booking is confirmed.';
    }
}

include __DIR__ . '/includes/header.php';
?>
<section class="py-24 bg-slate-50">
  <div class="max-w-2xl mx-auto px-6 lg:px-10 reveal">
    <div class="bg-white rounded-2xl shadow-xl p-10 text-center">
      <h1 class="font-serif text-4xl mb-4">Thank You</h1>
      <p class="text-lg mb-6"><?= e($statusMessage) ?></p>
      <a href="/ababeelhotel/index.php" class="inline-block bg-emerald-600 text-white px-6 py-3 rounded-lg hover:bg-slate-900 transition">Return to Home</a>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
