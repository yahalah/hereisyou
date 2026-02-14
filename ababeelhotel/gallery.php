<?php
require_once __DIR__ . '/config.php';
include __DIR__ . '/includes/header.php';
$images = [
  'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80',
  'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80',
  'https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=800',
  'https://images.unsplash.com/photo-1618773928121-c32242e63f39?q=80&w=800',
  'https://images.unsplash.com/photo-1566665797739-1674de7a421a?q=80&w=800',
  'https://images.unsplash.com/photo-1514933651103-005eec06c04b?q=80&w=1000',
  'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&q=80&w=2000'
];
?>
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <div class="text-center mb-12 reveal">
      <p class="text-emerald-600 uppercase tracking-wider text-sm">Visual Story</p>
      <h1 class="font-serif text-5xl mt-2">Gallery</h1>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php foreach ($images as $img): ?>
      <button type="button" data-lightbox-src="<?= $img ?>" class="reveal overflow-hidden rounded-xl shadow-lg">
        <img src="<?= $img ?>" alt="Ababeel Hotel Gallery" class="w-full h-72 object-cover hover:scale-105 transition duration-500">
      </button>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div id="lightbox" class="hidden fixed inset-0 z-[70] bg-slate-900/90 flex items-center justify-center p-6">
  <button id="close-lightbox" class="absolute top-6 right-6 text-white text-3xl">×</button>
  <img id="lightbox-image" src="" alt="Preview" class="max-w-5xl w-full max-h-[85vh] object-contain rounded-lg">
</div>
<?php include __DIR__ . '/includes/footer.php'; ?>
