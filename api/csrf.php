<?php
require __DIR__ . '/bootstrap.php';

$token = get_csrf_token($config);
json_response(['ok' => true, 'token' => $token]);
