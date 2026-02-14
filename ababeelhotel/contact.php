<?php
require_once __DIR__ . '/config.php';
$sent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sent = true;
}
include __DIR__ . '/includes/header.php';
?>
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-6 lg:px-10 grid lg:grid-cols-2 gap-10">
    <div class="reveal">
      <p class="text-emerald-600 uppercase text-sm tracking-wider">Get in Touch</p>
      <h1 class="font-serif text-5xl mt-2 mb-6">Contact Us</h1>
      <div class="space-y-4 text-slate-600">
        <p><strong class="text-slate-900">Address:</strong> 14 Regent Street, Birmingham, UK</p>
        <p><strong class="text-slate-900">Phone:</strong> +44 121 123 4567</p>
        <p><strong class="text-slate-900">Email:</strong> stay@ababeelhotel.co.uk</p>
      </div>
      <div class="mt-8 rounded-xl overflow-hidden shadow-lg">
        <iframe class="w-full h-72" src="https://maps.google.com/maps?q=Birmingham%20UK&t=&z=13&ie=UTF8&iwloc=&output=embed" loading="lazy"></iframe>
      </div>
    </div>
    <div class="bg-slate-50 rounded-2xl p-8 shadow-xl reveal">
      <h2 class="font-serif text-3xl mb-5">Send a Message</h2>
      <?php if ($sent): ?>
        <div class="mb-4 p-4 rounded-lg bg-emerald-50 text-emerald-700">Thanks for contacting us. We will respond shortly.</div>
      <?php endif; ?>
      <form method="post" class="space-y-4">
        <input type="text" name="name" placeholder="Your Name" required class="w-full border border-slate-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-600">
        <input type="email" name="email" placeholder="Your Email" required class="w-full border border-slate-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-600">
        <textarea name="message" rows="5" placeholder="Your Message" required class="w-full border border-slate-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-600"></textarea>
        <button type="submit" class="bg-slate-900 text-white px-6 py-3 rounded-lg hover:bg-emerald-600 transition">Submit</button>
      </form>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
