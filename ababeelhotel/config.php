<?php
declare(strict_types=1);

session_start();

$dbHost = 'localhost';
$dbName = 'ababeel_hotel';
$dbUser = 'root';
$dbPass = '';

try {
    $pdo = new PDO(
        "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4",
        $dbUser,
        $dbPass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $e) {
    exit('Database connection failed.');
}

// Stripe keys should be moved to environment variables in production.
$stripeSecretKey = 'sk_test_replace_with_your_secret_key';
$stripePublishableKey = 'pk_test_replace_with_your_publishable_key';
