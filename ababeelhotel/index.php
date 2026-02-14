<?php
require_once __DIR__ . '/config.php';
$rooms = $pdo->query('SELECT * FROM rooms ORDER BY id ASC LIMIT 3')->fetchAll();
include __DIR__ . '/includes/header.php';
?>
<section class="relative min-h-screen flex items-center justify-center hero-overlay bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&q=80&w=2000');">
  <div class="relative z-10 text-center px-6">
    <p class="text-emerald-400 uppercase tracking-[0.2em] mb-4 text-sm">Welcome to Luxury</p>
    <h1 class="text-white text-5xl md:text-7xl font-serif mb-8">Ababeel Hotel</h1>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="/ababeelhotel/booking.php" class="bg-emerald-600 text-white px-8 py-3 rounded-xl shadow-xl hover:bg-emerald-500 transition">Reserve Your Stay</a>
      <a href="/ababeelhotel/rooms.php" class="border border-white text-white px-8 py-3 rounded-xl hover:bg-white hover:text-slate-900 transition">Explore More</a>
    </div>
  </div>
</section>

<section class="max-w-7xl mx-auto px-6 lg:px-10 -mt-16 relative z-20">
  <div class="bg-white rounded-2xl shadow-xl p-8 grid md:grid-cols-4 gap-6 reveal">
    <?php
    $highlights = [
      ['📍', 'Location', 'Central UK District'],
      ['✈️', 'Airport', '3 miles away'],
      ['📶', 'Connectivity', 'Free WiFi'],
      ['🍽️', 'Dining', 'Ababeel Grill'],
    ];
    foreach ($highlights as [$icon, $title, $text]): ?>
      <div class="flex gap-4 items-start">
        <span class="w-12 h-12 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl"><?= $icon ?></span>
        <div>
          <h3 class="font-serif text-lg"><?= $title ?></h3>
          <p class="text-slate-600 text-sm"><?= $text ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="bg-slate-50 py-24 mt-16">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <div class="text-center mb-12 reveal">
      <p class="text-emerald-600 uppercase text-sm tracking-wider">Accommodation</p>
      <h2 class="font-serif text-4xl mt-2">Our Rooms</h2>
    </div>
    <div class="grid md:grid-cols-3 gap-8">
      <?php foreach ($rooms as $room): ?>
      <article class="bg-white rounded-2xl overflow-hidden shadow-lg reveal">
        <div class="relative">
          <img src="<?= e($room['image_url']) ?>" alt="<?= e($room['title']) ?>" class="w-full h-56 object-cover">
          <span class="absolute top-4 right-4 bg-emerald-600 text-white text-sm px-3 py-1 rounded-lg">£<?= number_format($room['price'], 2) ?>/night</span>
        </div>
        <div class="p-6">
          <h3 class="font-serif text-2xl mb-2"><?= e($room['title']) ?></h3>
          <div class="flex gap-4 text-sm text-slate-500 mb-3">
            <span>🛏 <?= e($room['bed_type']) ?></span>
            <span>📐 <?= e($room['size']) ?></span>
          </div>
          <p class="mb-5"><?= e($room['description']) ?></p>
          <a href="/ababeelhotel/booking.php?room_id=<?= (int)$room['id'] ?>" class="inline-block bg-slate-900 text-white px-5 py-2.5 rounded-lg hover:bg-emerald-600 transition">View Details</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 grid lg:grid-cols-2 gap-12 items-center">
    <div class="reveal">
      <p class="text-emerald-600 uppercase text-sm tracking-wider">Dining</p>
      <h2 class="font-serif text-4xl mt-2 mb-5">Ababeel Grill</h2>
      <p class="mb-6">Taste authentic cuisine and premium classics in an intimate, elegant atmosphere curated for modern travellers.</p>
      <ul class="space-y-3">
        <li class="flex items-center gap-3"><span class="text-emerald-600">✔</span> Authentic Cuisine</li>
        <li class="flex items-center gap-3"><span class="text-emerald-600">✔</span> 20% Guest Discount</li>
        <li class="flex items-center gap-3"><span class="text-emerald-600">✔</span> Locally Sourced Ingredients</li>
      </ul>
    </div>
    <div class="relative reveal">
      <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?q=80&w=1000" alt="Ababeel Grill" class="rounded-2xl shadow-xl w-full h-[420px] object-cover">
      <div class="absolute -bottom-6 -left-6 bg-white shadow-lg rounded-xl px-5 py-4 font-serif text-slate-900">🌿 Farm to Table</div>
    </div>
  </div>
</section>

<section class="py-24 bg-slate-100">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <div class="text-center mb-12 reveal"><h2 class="font-serif text-4xl">Facilities</h2></div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php $facilities = [['📶','High-Speed WiFi'],['🕒','24/7 Front Desk'],['🛋','Spacious Rooms'],['📍','Prime Location']];
      foreach ($facilities as [$icon,$name]): ?>
        <div class="bg-white rounded-xl p-6 shadow-lg hover:-translate-y-1 transition reveal">
          <span class="text-emerald-600 text-3xl"><?= $icon ?></span>
          <h3 class="font-serif text-xl mt-4"><?= $name ?></h3>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <div class="text-center mb-10 reveal"><h2 class="font-serif text-4xl">Gallery Highlights</h2></div>
    <div class="masonry-grid reveal">
      <?php
      $gallery = [
        'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80',
        'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80',
        'https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=800',
        'https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=800',
        'https://images.unsplash.com/photo-1566665797739-1674de7a421a?q=80&w=800'
      ];
      foreach ($gallery as $image): ?>
        <img src="<?= $image ?>" alt="Ababeel Hotel interior" class="shadow-lg">
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="py-24 bg-slate-50">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <div class="text-center mb-10 reveal"><h2 class="font-serif text-4xl">Guest Reviews</h2></div>
    <div class="grid md:grid-cols-3 gap-6">
      <?php
      $reviews = [
        ['Emma R.','"Beautiful ambience, clean rooms, and exceptional hospitality."'],
        ['James W.','"Convenient location and the grill food is simply outstanding."'],
        ['Ayesha K.','"Quiet luxury at a great price. Highly recommended for city breaks."']
      ];
      foreach ($reviews as [$name,$quote]): ?>
      <div class="bg-white rounded-xl p-6 shadow-lg reveal">
        <p class="text-slate-600 mb-4"><?= $quote ?></p>
        <p class="font-serif text-lg"><?= $name ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="py-20 bg-slate-900 text-center text-white px-6">
  <h2 class="font-serif text-4xl text-white mb-6">Ready to Experience Luxury?</h2>
  <a href="/ababeelhotel/booking.php" class="inline-block bg-emerald-600 text-white px-8 py-3 rounded-xl hover:bg-white hover:text-slate-900 transition">Book Your Room Now</a>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
