<?php
require __DIR__ . '/../partials/functions.php';
header('Content-Type: text/html');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed');
}

if (!rate_limit('careers', 5, 3600)) {
    http_response_code(429);
    exit('Too many requests. Please try again later.');
}

if (!verify_csrf($_POST['csrf_token'] ?? '')) {
    http_response_code(400);
    exit('Invalid CSRF token.');
}

if (!empty($_POST['website'])) {
    http_response_code(400);
    exit('Spam detected.');
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$role = trim($_POST['role'] ?? '');
$message = trim($_POST['message'] ?? '');

if (!$name || !$email || !$message) {
    http_response_code(400);
    exit('Please complete all required fields.');
}

$pdo = db();
$stmt = $pdo->prepare('INSERT INTO submissions (type, name, email, phone, company, message, payload, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([
    'careers',
    $name,
    $email,
    $phone,
    $role,
    $message,
    json_encode($_POST),
    date('c'),
]);

$body = "New careers application from $name\nEmail: $email\nPhone: $phone\nRole: $role\nMessage:\n$message";
$sent = send_smtp_mail(site_config()['emails']['support'], 'New careers application', $body, $email);

if ($sent) {
    header('Location: /careers/?sent=1');
    exit;
}

http_response_code(500);
exit('Unable to send email.');
