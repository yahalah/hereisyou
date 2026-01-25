<?php
require __DIR__ . '/bootstrap.php';

check_rate_limit('chat', 10, 300);
$payload = json_decode(file_get_contents('php://input'), true);
if (!is_array($payload)) {
    json_response(['ok' => false, 'message' => 'Invalid request.'], 400);
}

verify_csrf($config, $payload['csrf_token'] ?? null);

if (is_spam_honeypot($payload)) {
    json_response(['ok' => true, 'reply' => 'Thanks for the message.']);
}

$message = trim($payload['message'] ?? '');
$email = trim($payload['email'] ?? '');

if ($message === '') {
    json_response(['ok' => false, 'message' => 'Please enter a message.'], 422);
}

$reply = 'Thanks for your message. A consultant will follow up within one business day. If you need immediate assistance, email ' . $config['company']['support_email'] . '.';

$logEntry = sprintf(
    "[%s] CHAT %s | %s\n",
    date('c'),
    $email,
    str_replace(["\r", "\n"], ' ', $message)
);
file_put_contents(__DIR__ . '/../data/chat.log', $logEntry, FILE_APPEND);

json_response(['ok' => true, 'reply' => $reply]);
