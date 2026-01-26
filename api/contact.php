<?php
require __DIR__ . '/bootstrap.php';

check_rate_limit('contact', 5, 300);
$payload = json_decode(file_get_contents('php://input'), true);
if (!is_array($payload)) {
    json_response(['ok' => false, 'message' => 'Invalid request.'], 400);
}

verify_csrf($config, $payload['csrf_token'] ?? null);

if (is_spam_honeypot($payload)) {
    json_response(['ok' => true, 'message' => 'Thanks for getting in touch.']);
}

$name = trim($payload['name'] ?? '');
$email = trim($payload['email'] ?? '');
$company = trim($payload['organisation'] ?? '');
$budget = trim($payload['budget'] ?? '');
$message = trim($payload['message'] ?? '');
$consent = !empty($payload['consent']);

if ($name === '' || $email === '' || $message === '' || !$consent) {
    json_response(['ok' => false, 'message' => 'Please complete all required fields and accept the privacy notice.'], 422);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    json_response(['ok' => false, 'message' => 'Please provide a valid email address.'], 422);
}

$logEntry = sprintf(
    "[%s] CONTACT %s <%s> | %s | %s | %s\n",
    date('c'),
    $name,
    $email,
    $company,
    $budget,
    str_replace(["\r", "\n"], ' ', $message)
);
file_put_contents(__DIR__ . '/../data/submissions.log', $logEntry, FILE_APPEND);

$to = $config['company']['email'];
$subject = 'New project enquiry from ' . $name;
$body = "Name: $name\nEmail: $email\nOrganisation: $company\nBudget: $budget\nMessage: $message\n";
$headers = "From: {$config['company']['name']} <{$config['company']['email']}>\r\n" .
    "Reply-To: $email\r\n" .
    "Content-Type: text/plain; charset=UTF-8\r\n";
@mail($to, $subject, $body, $headers);

json_response(['ok' => true, 'message' => 'Thanks for reaching out. We will respond within one business day.']);
