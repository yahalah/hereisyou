<?php
declare(strict_types=1);
require_once __DIR__ . '/../config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: /ababeelhotel/admin/login.php');
    exit;
}

$pageTitle = 'Admin Dashboard';
$bookingsStmt = $pdo->query('SELECT b.id, b.full_name, b.email, b.check_in, b.check_out, b.guests, b.total_amount, b.payment_status, b.booking_status, r.name AS room_name FROM bookings b INNER JOIN rooms r ON r.id = b.room_id ORDER BY b.created_at DESC');
$bookings = $bookingsStmt->fetchAll();

include __DIR__ . '/../includes/header.php';
?>
<section class="section">
    <div class="container">
        <h1>Dashboard</h1>
        <p>Welcome, <?= htmlspecialchars((string) $_SESSION['admin_username']) ?> | <a class="btn" href="/ababeelhotel/admin/logout.php">Logout</a></p>
        <div class="table-wrap">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Guest</th>
                    <th>Email</th>
                    <th>Room</th>
                    <th>Dates</th>
                    <th>Guests</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($bookings as $booking): ?>
                    <tr>
                        <td><?= (int) $booking['id'] ?></td>
                        <td><?= htmlspecialchars($booking['full_name']) ?></td>
                        <td><?= htmlspecialchars($booking['email']) ?></td>
                        <td><?= htmlspecialchars($booking['room_name']) ?></td>
                        <td><?= htmlspecialchars($booking['check_in']) ?> to <?= htmlspecialchars($booking['check_out']) ?></td>
                        <td><?= (int) $booking['guests'] ?></td>
                        <td>£<?= number_format((float) $booking['total_amount'], 2) ?></td>
                        <td><?= htmlspecialchars($booking['payment_status']) ?></td>
                        <td><?= htmlspecialchars($booking['booking_status']) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
