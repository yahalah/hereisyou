<?php
require_once __DIR__ . '/config.php';
include __DIR__ . '/includes/header.php';
?>
<section class="py-24 bg-slate-50">
  <div class="max-w-4xl mx-auto px-6 lg:px-10 bg-white shadow-xl rounded-2xl p-10 reveal">
    <h1 class="font-serif text-5xl mb-8">Hotel Policies</h1>
    <div class="space-y-6">
      <div>
        <h2 class="font-serif text-2xl mb-2">Check-In & Check-Out</h2>
        <p>Check-in starts at 2:00 PM. Check-out is by 11:00 AM.</p>
      </div>
      <div>
        <h2 class="font-serif text-2xl mb-2">Cancellation Policy</h2>
        <p>Free cancellation up to 48 hours before arrival. Later cancellations may incur one-night charge.</p>
      </div>
      <div>
        <h2 class="font-serif text-2xl mb-2">Smoking Policy</h2>
        <p>Ababeel Hotel is a non-smoking property in all indoor areas and guest rooms.</p>
      </div>
      <div>
        <h2 class="font-serif text-2xl mb-2">Payment Methods</h2>
        <p>All online reservations are secured through Stripe Checkout in GBP.</p>
      </div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
