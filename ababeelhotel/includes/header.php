<?php
if (!isset($pageTitle)) {
    $pageTitle = 'Ababeel Hotel';
}
?>
<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ababeel Hotel is a welcoming UK 3-star hotel offering comfortable stays, quality service, and secure online booking.">
    <title><?= htmlspecialchars($pageTitle) ?> | Ababeel Hotel</title>
    <link rel="stylesheet" href="/ababeelhotel/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="/ababeelhotel/index.php">Ababeel Hotel</a>
        <button class="menu-toggle" aria-label="Toggle menu">☰</button>
        <nav class="main-nav">
            <a href="/ababeelhotel/index.php">Home</a>
            <a href="/ababeelhotel/rooms.php">Rooms</a>
            <a href="/ababeelhotel/facilities.php">Facilities</a>
            <a href="/ababeelhotel/gallery.php">Gallery</a>
            <a href="/ababeelhotel/booking.php">Booking</a>
            <a href="/ababeelhotel/contact.php">Contact</a>
            <a href="/ababeelhotel/policies.php">Policies</a>
            <a href="/ababeelhotel/admin/login.php">Admin</a>
        </nav>
    </div>
</header>
<main>
