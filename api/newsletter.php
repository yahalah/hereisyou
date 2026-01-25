<?php
require __DIR__ . '/bootstrap.php';

check_rate_limit('newsletter', 5, 300);
$payload = json_decode(file_get_contents('php://input'), true);
if (!is_array($payload)) {
    json_response(['ok' => false, 'message' => 'Invalid request.'], 400);
}

verify_csrf($config, $payload['csrf_token'] ?? null);

if (is_spam_honeypot($payload)) {
    json_response(['ok' => true, 'message' => 'Thanks for subscribing.']);
}

$email = trim($payload['email'] ?? '');
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    json_response(['ok' => false, 'message' => 'Please provide a valid email address.'], 422);
}

$logEntry = sprintf("[%s] NEWSLETTER %s\n", date('c'), $email);
file_put_contents(__DIR__ . '/../data/newsletter.log', $logEntry, FILE_APPEND);

json_response(['ok' => true, 'message' => 'Thanks for subscribing. We will be in touch soon.']);
