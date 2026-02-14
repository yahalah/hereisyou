<?php
require_once __DIR__ . '/config.php';
include __DIR__ . '/includes/header.php';
$facilities = [
  ['📶', 'High-Speed WiFi', 'Complimentary WiFi across all rooms and public areas.'],
  ['🕒', '24/7 Front Desk', 'Round-the-clock concierge support and check-in assistance.'],
  ['🛏', 'Spacious Rooms', 'Comfort-focused layouts with premium bedding and quiet interiors.'],
  ['📍', 'Prime Location', 'Close to airport links, shopping, and major city attractions.'],
  ['🚗', 'Private Parking', 'Secure on-site parking for guests and business visitors.'],
  ['🍽', 'Ababeel Grill', 'In-house dining with local and international favourites.'],
  ['🧳', 'Luggage Assistance', 'Convenient luggage storage for early arrivals and late departures.'],
  ['🧼', 'Daily Housekeeping', 'Professional housekeeping to maintain fresh, pristine rooms.'],
];
?>
<section class="py-24 bg-slate-100">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <div class="text-center mb-12 reveal">
      <p class="text-emerald-600 uppercase tracking-wider text-sm">Services</p>
      <h1 class="font-serif text-5xl mt-2">Facilities</h1>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php foreach ($facilities as [$icon, $name, $desc]): ?>
        <article class="bg-white rounded-xl p-6 shadow-lg hover:-translate-y-1 transition reveal">
          <span class="text-4xl text-emerald-600"><?= $icon ?></span>
          <h2 class="font-serif text-2xl mt-4 mb-2"><?= $name ?></h2>
          <p><?= $desc ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
