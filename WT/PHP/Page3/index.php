<?php
session_start();

// Initialize attempt counter
if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 0;
}

$valid_username = 'admin';
$valid_password = 'password123';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['logged_in'] = true;
    } else {
        $_SESSION['attempts']++;
        $error_message = $_SESSION['attempts'] >= 3 ? 
            'Maximum attempts reached. Access denied.' : 
            'Invalid credentials. ' . (3 - $_SESSION['attempts']) . ' attempts remaining.';
    }
}
?>
<html>
<head>
    <title>Simple Login System</title>
</head>
<body>
    <?php if (isset($_SESSION['logged_in'])): ?>
        <h2>Welcome!</h2>
        <p>You have successfully logged in.</p>
    <?php else: ?>
        <?php if ($_SESSION['attempts'] < 3): ?>
            <h2>Login</h2>
            <?php if ($error_message): ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <form method="POST">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
            </form>
        <?php else: ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>