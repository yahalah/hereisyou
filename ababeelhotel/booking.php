<?php
require_once __DIR__ . '/config.php';

$rooms = $pdo->query('SELECT id, title, price FROM rooms ORDER BY title ASC')->fetchAll();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomId = (int)($_POST['room_id'] ?? 0);
    $customerName = trim($_POST['customer_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $checkIn = $_POST['check_in'] ?? '';
    $checkOut = $_POST['check_out'] ?? '';

    $roomStmt = $pdo->prepare('SELECT * FROM rooms WHERE id = ?');
    $roomStmt->execute([$roomId]);
    $room = $roomStmt->fetch();

    if (!$room) $errors[] = 'Please select a valid room.';
    if ($customerName === '') $errors[] = 'Name is required.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email is required.';

    $checkInDate = DateTime::createFromFormat('Y-m-d', $checkIn);
    $checkOutDate = DateTime::createFromFormat('Y-m-d', $checkOut);

    if (!$checkInDate || !$checkOutDate || $checkOutDate <= $checkInDate) {
        $errors[] = 'Check-out date must be after check-in date.';
    }

    if (!$errors) {
        $nights = $checkInDate->diff($checkOutDate)->days;
        $totalPrice = $room['price'] * $nights;

        $bookingStmt = $pdo->prepare('INSERT INTO bookings (room_id, customer_name, email, check_in, check_out, total_price, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $bookingStmt->execute([$roomId, $customerName, $email, $checkIn, $checkOut, $totalPrice, 'pending']);
        $bookingId = (int)$pdo->lastInsertId();

        $postData = http_build_query([
            'mode' => 'payment',
            'success_url' => $baseUrl . '/booking_success.php?session_id={CHECKOUT_SESSION_ID}&booking_id=' . $bookingId,
            'cancel_url' => $baseUrl . '/booking.php?cancelled=1',
            'customer_email' => $email,
            'line_items[0][price_data][currency]' => 'gbp',
            'line_items[0][price_data][product_data][name]' => 'Ababeel Hotel - ' . $room['title'],
            'line_items[0][price_data][unit_amount]' => (int)round($room['price'] * 100),
            'line_items[0][quantity]' => $nights,
            'metadata[booking_id]' => $bookingId,
        ]);

        $ch = curl_init('https://api.stripe.com/v1/checkout/sessions');
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $stripeSecretKey,
                'Content-Type: application/x-www-form-urlencoded',
            ],
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $stripeResponse = json_decode((string)$response, true);

        if ($httpCode >= 200 && $httpCode < 300 && isset($stripeResponse['id'], $stripeResponse['url'])) {
            $update = $pdo->prepare('UPDATE bookings SET stripe_session_id = ? WHERE id = ?');
            $update->execute([$stripeResponse['id'], $bookingId]);
            header('Location: ' . $stripeResponse['url']);
            exit;
        }

        $errors[] = 'Unable to initiate Stripe Checkout. Confirm STRIPE_SECRET_KEY and APP_URL settings.';
    }
}

include __DIR__ . '/includes/header.php';
?>
<section class="py-24 bg-slate-50">
  <div class="max-w-3xl mx-auto px-6 lg:px-10 reveal">
    <div class="bg-white rounded-2xl shadow-xl p-8 lg:p-10">
      <p class="text-emerald-600 uppercase text-sm tracking-wider">Reservation</p>
      <h1 class="font-serif text-4xl mt-2 mb-6">Book Your Stay</h1>

      <?php if (!empty($_GET['cancelled'])): ?>
        <div class="mb-4 p-4 rounded-lg bg-amber-50 text-amber-700">Your payment was cancelled. You can try booking again.</div>
      <?php endif; ?>

      <?php if ($errors): ?>
        <div class="mb-4 p-4 rounded-lg bg-red-50 text-red-700">
          <ul class="list-disc pl-5">
            <?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form method="post" class="space-y-5">
        <div>
          <label class="block mb-2 text-slate-700">Room Type</label>
          <select name="room_id" required class="w-full border border-slate-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-600">
            <option value="">Select a room</option>
            <?php foreach ($rooms as $room): ?>
              <option value="<?= (int)$room['id'] ?>" <?= isset($_GET['room_id']) && (int)$_GET['room_id'] === (int)$room['id'] ? 'selected' : '' ?>>
                <?= e($room['title']) ?> - £<?= number_format($room['price'], 2) ?>/night
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="grid md:grid-cols-2 gap-4">
          <div>
            <label class="block mb-2 text-slate-700">Check-in Date</label>
            <input type="date" name="check_in" required class="w-full border border-slate-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-600">
          </div>
          <div>
            <label class="block mb-2 text-slate-700">Check-out Date</label>
            <input type="date" name="check_out" required class="w-full border border-slate-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-600">
          </div>
        </div>

        <div>
          <label class="block mb-2 text-slate-700">Full Name</label>
          <input type="text" name="customer_name" required class="w-full border border-slate-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-600" placeholder="Your name">
        </div>

        <div>
          <label class="block mb-2 text-slate-700">Email Address</label>
          <input type="email" name="email" required class="w-full border border-slate-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-600" placeholder="you@example.com">
        </div>

        <button type="submit" class="w-full bg-slate-900 text-white rounded-lg py-3 hover:bg-emerald-600 transition">Proceed to Stripe Checkout (GBP)</button>
      </form>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
