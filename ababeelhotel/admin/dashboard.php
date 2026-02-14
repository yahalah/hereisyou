<?php
require_once __DIR__ . '/../config.php';
requireAdminAuth();

$stmt = $pdo->query('SELECT b.*, r.title AS room_title FROM bookings b JOIN rooms r ON b.room_id = r.id ORDER BY b.created_at DESC');
$bookings = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard | Ababeel Hotel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="/ababeelhotel/css/style.css">
</head>
<body class="bg-slate-50 p-6 lg:p-10">
  <div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-2xl shadow-xl p-6 lg:p-8">
      <div class="flex justify-between items-center mb-8">
        <div>
          <h1 class="font-serif text-4xl">Booking Dashboard</h1>
          <p>Welcome, <?= e($_SESSION['admin_username'] ?? 'Admin') ?></p>
        </div>
        <a href="logout.php" class="bg-slate-900 text-white px-5 py-2 rounded-lg hover:bg-emerald-600 transition">Logout</a>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-slate-100 text-slate-700">
              <th class="p-3">ID</th>
              <th class="p-3">Guest</th>
              <th class="p-3">Email</th>
              <th class="p-3">Room</th>
              <th class="p-3">Dates</th>
              <th class="p-3">Total</th>
              <th class="p-3">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($bookings as $booking): ?>
            <tr class="border-b border-slate-100">
              <td class="p-3">#<?= (int)$booking['id'] ?></td>
              <td class="p-3"><?= e($booking['customer_name']) ?></td>
              <td class="p-3"><?= e($booking['email']) ?></td>
              <td class="p-3"><?= e($booking['room_title']) ?></td>
              <td class="p-3"><?= e($booking['check_in']) ?> → <?= e($booking['check_out']) ?></td>
              <td class="p-3">£<?= number_format((float)$booking['total_price'], 2) ?></td>
              <td class="p-3">
                <span class="px-3 py-1 rounded-full text-xs <?= $booking['payment_status'] === 'paid' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' ?>">
                  <?= e(ucfirst($booking['payment_status'])) ?>
                </span>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
