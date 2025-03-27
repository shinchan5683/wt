<?php
$conn = mysqli_connect('localhost', 'root', '', 'test');
if (!$conn) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$query = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

echo json_encode([
    'success' => mysqli_num_rows($result) > 0,
    'message' => mysqli_num_rows($result) > 0 ? 'Login successful!' : 'Invalid credentials'
]);

mysqli_stmt_close($stmt);
mysqli_close($conn);