<?php
require_once __DIR__ . '/config.php';
$pageTitle = 'Gallery';
include __DIR__ . '/includes/header.php';
$images = [
    'https://images.unsplash.com/photo-1566073771259-6a8506099945',
    'https://images.unsplash.com/photo-1501117716987-c8e1ecb210d9',
    'https://images.unsplash.com/photo-1590490360182-c33d57733427',
    'https://images.unsplash.com/photo-1618773928121-c32242e63f39',
    'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa',
    'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b',
    'https://images.unsplash.com/photo-1555396273-367ea4eb4db5',
    'https://images.unsplash.com/photo-1584622650111-993a426fbf0a'
];
?>
<section class="section">
    <div class="container">
        <h1>Gallery</h1>
        <div class="card-grid">
            <?php foreach ($images as $image): ?>
                <div class="card">
                    <img src="<?= htmlspecialchars($image) ?>" alt="Ababeel Hotel Gallery Image">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
