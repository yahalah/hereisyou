<?php
$config = require __DIR__ . '/../config/site.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function json_response(array $payload, int $status = 200): void
{
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($payload);
    exit;
}

function get_client_ip(): string
{
    $keys = ['HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'];
    foreach ($keys as $key) {
        if (!empty($_SERVER[$key])) {
            $value = $_SERVER[$key];
            if (strpos($value, ',') !== false) {
                $parts = explode(',', $value);
                return trim($parts[0]);
            }
            return trim($value);
        }
    }
    return 'unknown';
}

function check_rate_limit(string $namespace, int $limit, int $windowSeconds): void
{
    $ip = get_client_ip();
    $file = sys_get_temp_dir() . '/hereisyou_rate_' . md5($namespace . $ip) . '.json';
    $now = time();
    $data = ['reset' => $now + $windowSeconds, 'count' => 0];

    if (file_exists($file)) {
        $stored = json_decode((string) file_get_contents($file), true);
        if (is_array($stored) && isset($stored['reset'], $stored['count'])) {
            $data = $stored;
        }
    }

    if ($now > $data['reset']) {
        $data = ['reset' => $now + $windowSeconds, 'count' => 0];
    }

    $data['count']++;
    file_put_contents($file, json_encode($data));

    if ($data['count'] > $limit) {
        json_response([
            'ok' => false,
            'message' => 'Please wait a moment before sending another message.'
        ], 429);
    }
}

function get_csrf_token(array $config): string
{
    $tokenName = $config['site']['csrf_token_name'];
    if (empty($_SESSION[$tokenName])) {
        $_SESSION[$tokenName] = bin2hex(random_bytes(32));
    }
    return $_SESSION[$tokenName];
}

function verify_csrf(array $config, ?string $token): void
{
    $tokenName = $config['site']['csrf_token_name'];
    if (!$token || empty($_SESSION[$tokenName]) || !hash_equals($_SESSION[$tokenName], $token)) {
        json_response(['ok' => false, 'message' => 'Security check failed. Refresh and try again.'], 400);
    }
}

function is_spam_honeypot(array $data): bool
{
    return !empty($data['company']);
}
