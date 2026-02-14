<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ababeel Hotel | Boutique 3-Star Hotel in the UK</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            emerald: {
              600: '#10B981'
            }
          }
        }
      }
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/ababeelhotel/css/style.css">
</head>
<body class="bg-white text-slate-600 antialiased">
<header id="main-nav" class="fixed top-0 left-0 w-full z-50 bg-white/90 backdrop-blur-md border-b border-slate-100 transition-all">
  <div class="max-w-7xl mx-auto px-6 lg:px-10">
    <div class="flex items-center justify-between h-20">
      <a href="/ababeelhotel/index.php" class="flex items-center gap-3">
        <span class="w-10 h-10 rounded-lg bg-emerald-600 text-white flex items-center justify-center font-bold text-xl">A</span>
        <span class="text-2xl font-serif text-slate-900 tracking-wide">ABABEEL</span>
      </a>
      <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-700">
        <a class="hover:text-emerald-600 <?= $currentPage === 'index.php' ? 'text-emerald-600' : '' ?>" href="/ababeelhotel/index.php">Home</a>
        <a class="hover:text-emerald-600 <?= $currentPage === 'rooms.php' ? 'text-emerald-600' : '' ?>" href="/ababeelhotel/rooms.php">Rooms</a>
        <a class="hover:text-emerald-600 <?= $currentPage === 'facilities.php' ? 'text-emerald-600' : '' ?>" href="/ababeelhotel/facilities.php">Facilities</a>
        <a class="hover:text-emerald-600 <?= $currentPage === 'gallery.php' ? 'text-emerald-600' : '' ?>" href="/ababeelhotel/gallery.php">Gallery</a>
        <a class="hover:text-emerald-600 <?= $currentPage === 'contact.php' ? 'text-emerald-600' : '' ?>" href="/ababeelhotel/contact.php">Contact</a>
      </nav>
      <div class="flex items-center gap-3">
        <a href="/ababeelhotel/booking.php" class="hidden md:inline-flex bg-slate-900 text-white px-5 py-2.5 rounded-lg hover:bg-emerald-600 transition">Book Now</a>
        <button id="menu-toggle" class="md:hidden p-2 rounded-lg border border-slate-200" aria-label="Toggle Menu">
          ☰
        </button>
      </div>
    </div>
    <div id="mobile-menu" class="md:hidden hidden py-4 border-t border-slate-100 space-y-2">
      <a class="block px-3 py-2 rounded hover:bg-slate-50" href="/ababeelhotel/index.php">Home</a>
      <a class="block px-3 py-2 rounded hover:bg-slate-50" href="/ababeelhotel/rooms.php">Rooms</a>
      <a class="block px-3 py-2 rounded hover:bg-slate-50" href="/ababeelhotel/facilities.php">Facilities</a>
      <a class="block px-3 py-2 rounded hover:bg-slate-50" href="/ababeelhotel/gallery.php">Gallery</a>
      <a class="block px-3 py-2 rounded hover:bg-slate-50" href="/ababeelhotel/contact.php">Contact</a>
      <a class="block px-3 py-2 rounded bg-slate-900 text-white text-center" href="/ababeelhotel/booking.php">Book Now</a>
    </div>
  </div>
</header>
<main class="pt-20">
