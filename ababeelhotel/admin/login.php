<?php
declare(strict_types=1);
require_once __DIR__ . '/../config.php';

if (isset($_SESSION['admin_id'])) {
    header('Location: /ababeelhotel/admin/dashboard.php');
    exit;
}

$pageTitle = 'Admin Login';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string) filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));
    $password = (string) ($_POST['password'] ?? '');

    $stmt = $pdo->prepare('SELECT id, username, password_hash FROM admin_users WHERE username = :username LIMIT 1');
    $stmt->execute(['username' => $username]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password_hash'])) {
        $_SESSION['admin_id'] = (int) $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        session_regenerate_id(true);
        header('Location: /ababeelhotel/admin/dashboard.php');
        exit;
    }

    $error = 'Invalid username or password.';
}

include __DIR__ . '/../includes/header.php';
?>
<section class="section">
    <div class="container" style="max-width:500px;">
        <h1>Admin Login</h1>
        <?php if ($error): ?><p class="notice error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
        <form method="post" class="form-wrap">
            <div>
                <label for="username">Username</label>
                <input id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
