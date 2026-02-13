<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';

$pageTitle = 'Booking';
$error = '';

$roomsStmt = $pdo->query('SELECT id, name, price_per_night FROM rooms ORDER BY name');
$rooms = $roomsStmt->fetchAll();
$selectedRoomId = isset($_GET['room_id']) ? (int) $_GET['room_id'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomId = filter_input(INPUT_POST, 'room_id', FILTER_VALIDATE_INT);
    $fullName = trim((string) filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_SPECIAL_CHARS));
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone = trim((string) filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));
    $checkIn = (string) filter_input(INPUT_POST, 'check_in');
    $checkOut = (string) filter_input(INPUT_POST, 'check_out');
    $guests = filter_input(INPUT_POST, 'guests', FILTER_VALIDATE_INT);

    if (!$roomId || !$email || !$guests || empty($fullName) || empty($checkIn) || empty($checkOut)) {
        $error = 'Please fill in all required fields correctly.';
    } else {
        $roomStmt = $pdo->prepare('SELECT id, name, price_per_night FROM rooms WHERE id = :id');
        $roomStmt->execute(['id' => $roomId]);
        $room = $roomStmt->fetch();

        if (!$room) {
            $error = 'Selected room was not found.';
        } else {
            $days = max(1, (int) ((strtotime($checkOut) - strtotime($checkIn)) / 86400));
            $amount = (float) $room['price_per_night'] * $days;

            $insert = $pdo->prepare('INSERT INTO bookings (room_id, full_name, email, phone, check_in, check_out, guests, total_amount, payment_status, booking_status) VALUES (:room_id, :full_name, :email, :phone, :check_in, :check_out, :guests, :total_amount, :payment_status, :booking_status)');
            $insert->execute([
                'room_id' => $roomId,
                'full_name' => $fullName,
                'email' => $email,
                'phone' => $phone,
                'check_in' => $checkIn,
                'check_out' => $checkOut,
                'guests' => $guests,
                'total_amount' => $amount,
                'payment_status' => 'unpaid',
                'booking_status' => 'pending',
            ]);

            $bookingId = (int) $pdo->lastInsertId();

            // Stripe Checkout integration:
            // 1) Create a Checkout Session in GBP using the booking details.
            // 2) Pass booking_id in metadata so we can map successful payments.
            // 3) Redirect customer to Stripe hosted payment page.
            require_once __DIR__ . '/vendor/autoload.php';
            \Stripe\Stripe::setApiKey($stripeSecretKey);

            $baseUrl = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/ababeelhotel';

            $checkoutSession = \Stripe\Checkout\Session::create([
                'mode' => 'payment',
                'success_url' => $baseUrl . '/booking_success.php?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => $baseUrl . '/booking.php?cancelled=1',
                'customer_email' => $email,
                'line_items' => [[
                    'quantity' => 1,
                    'price_data' => [
                        'currency' => 'gbp',
                        'unit_amount' => (int) round($amount * 100),
                        'product_data' => [
                            'name' => 'Ababeel Hotel Booking - ' . $room['name'],
                            'description' => $checkIn . ' to ' . $checkOut . ' (' . $days . ' night(s))',
                        ],
                    ],
                ]],
                'metadata' => [
                    'booking_id' => (string) $bookingId,
                ],
            ]);

            header('Location: ' . $checkoutSession->url);
            exit;
        }
    }
}

include __DIR__ . '/includes/header.php';
?>
<section class="section">
    <div class="container">
        <h1>Book Your Stay</h1>
        <?php if ($error): ?>
            <p class="notice error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <?php if (isset($_GET['cancelled'])): ?>
            <p class="notice error">Payment was cancelled. You can try again.</p>
        <?php endif; ?>

        <form method="post" class="form-wrap">
            <div class="form-grid">
                <div>
                    <label for="room_id">Room</label>
                    <select id="room_id" name="room_id" required>
                        <option value="">Select room</option>
                        <?php foreach ($rooms as $room): ?>
                            <option value="<?= (int) $room['id'] ?>" <?= $selectedRoomId === (int) $room['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($room['name']) ?> - £<?= number_format((float) $room['price_per_night'], 2) ?>/night
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="full_name">Full Name</label>
                    <input id="full_name" name="full_name" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input id="phone" name="phone" required>
                </div>
                <div>
                    <label for="check_in">Check-in</label>
                    <input type="date" id="check_in" name="check_in" required>
                </div>
                <div>
                    <label for="check_out">Check-out</label>
                    <input type="date" id="check_out" name="check_out" required>
                </div>
                <div>
                    <label for="guests">Guests</label>
                    <input type="number" min="1" max="6" id="guests" name="guests" required>
                </div>
            </div>
            <p style="margin-top:1rem;">You will be redirected to Stripe Checkout to complete secure payment in GBP.</p>
            <button class="btn" type="submit">Proceed to Payment</button>
        </form>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
