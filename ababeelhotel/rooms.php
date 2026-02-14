<?php
require_once __DIR__ . '/config.php';
$rooms = $pdo->query('SELECT * FROM rooms ORDER BY price ASC')->fetchAll();
include __DIR__ . '/includes/header.php';
?>
<section class="py-24 bg-slate-50">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <div class="text-center mb-12 reveal">
      <p class="text-emerald-600 uppercase tracking-wider text-sm">Accommodation</p>
      <h1 class="font-serif text-5xl mt-2">Our Rooms</h1>
    </div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($rooms as $room): ?>
      <article class="bg-white rounded-2xl overflow-hidden shadow-lg reveal">
        <div class="relative">
          <img src="<?= e($room['image_url']) ?>" alt="<?= e($room['title']) ?>" class="w-full h-56 object-cover">
          <span class="absolute top-4 right-4 bg-emerald-600 text-white text-sm px-3 py-1 rounded-lg">£<?= number_format($room['price'], 2) ?>/night</span>
        </div>
        <div class="p-6">
          <h2 class="font-serif text-2xl mb-2"><?= e($room['title']) ?></h2>
          <div class="flex gap-4 text-sm text-slate-500 mb-3">
            <span>🛏 <?= e($room['bed_type']) ?></span>
            <span>📐 <?= e($room['size']) ?></span>
          </div>
          <p class="mb-5"><?= e($room['description']) ?></p>
          <a href="/ababeelhotel/booking.php?room_id=<?= (int)$room['id'] ?>" class="inline-block bg-slate-900 text-white px-5 py-2.5 rounded-lg hover:bg-emerald-600 transition">Book This Room</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
