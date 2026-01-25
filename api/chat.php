<?php
require __DIR__ . '/../partials/functions.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

if (!rate_limit('chat', 15, 3600)) {
    http_response_code(429);
    echo json_encode(['error' => 'Too many requests']);
    exit;
}

if (!verify_csrf($_POST['csrf_token'] ?? '')) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid CSRF token']);
    exit;
}

$message = trim($_POST['message'] ?? '');
if (!$message) {
    http_response_code(400);
    echo json_encode(['error' => 'Message required']);
    exit;
}

$sessionId = session_id();
$pdo = db();
$stmt = $pdo->prepare('INSERT INTO chats (session_id, message, created_at) VALUES (?, ?, ?)');
$stmt->execute([$sessionId, $message, date('c')]);

$body = "Chat message from session $sessionId:\n$message";
send_smtp_mail(site_config()['emails']['support'], 'New chat message', $body);

$response = [
    'reply' => 'Thanks for reaching out. A delivery lead will reply shortly. In the meantime, share your goals and timeline.',
];

echo json_encode($response);
