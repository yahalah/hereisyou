<?php
require_once __DIR__ . '/../config.php';

if (isAdminLoggedIn()) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare('SELECT * FROM admin_users WHERE username = ? LIMIT 1');
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password_hash'])) {
        $_SESSION['admin_user_id'] = (int)$admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        header('Location: dashboard.php');
        exit;
    }

    $error = 'Invalid login credentials.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | Ababeel Hotel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/ababeelhotel/css/style.css">
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">
  <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
    <h1 class="font-serif text-4xl mb-6 text-center">Admin Login</h1>
    <?php if ($error): ?><div class="mb-4 p-3 rounded bg-red-50 text-red-700"><?= e($error) ?></div><?php endif; ?>
    <form method="post" class="space-y-4">
      <input type="text" name="username" required placeholder="Username" class="w-full border border-slate-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-600 focus:outline-none">
      <input type="password" name="password" required placeholder="Password" class="w-full border border-slate-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-600 focus:outline-none">
      <button type="submit" class="w-full bg-slate-900 text-white py-3 rounded-lg hover:bg-emerald-600 transition">Login</button>
    </form>
  </div>
</body>
</html>
