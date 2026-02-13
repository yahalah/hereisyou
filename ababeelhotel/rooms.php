<?php
require_once __DIR__ . '/config.php';
$pageTitle = 'Rooms';

$stmt = $pdo->query('SELECT id, name, description, price_per_night, image_url, capacity FROM rooms ORDER BY price_per_night ASC');
$rooms = $stmt->fetchAll();

include __DIR__ . '/includes/header.php';
?>
<section class="section">
    <div class="container">
        <h1>Our Rooms</h1>
        <div class="card-grid">
            <?php foreach ($rooms as $room): ?>
                <article class="card">
                    <img src="<?= htmlspecialchars($room['image_url']) ?>" alt="<?= htmlspecialchars($room['name']) ?>">
                    <div class="card-body">
                        <h3><?= htmlspecialchars($room['name']) ?></h3>
                        <p><?= htmlspecialchars($room['description']) ?></p>
                        <p>Capacity: <?= (int) $room['capacity'] ?> guest(s)</p>
                        <p class="price">£<?= number_format((float) $room['price_per_night'], 2) ?> / night</p>
                        <a class="btn" href="/ababeelhotel/booking.php?room_id=<?= (int) $room['id'] ?>">Book This Room</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
