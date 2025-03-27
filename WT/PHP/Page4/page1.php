<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['employee'] = [
        'eno' => $_POST['eno'],
        'ename' => $_POST['ename'],
        'address' => $_POST['address']
    ];
    header('Location: page2.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Details - Step 1</title>
</head>
<body>
    <h2>Employee Details - Step 1</h2>
    <form method="POST">
        <p>
            <label>Employee Number:</label><br>
            <input type="text" name="eno" required>
        </p>
        <p>
            <label>Employee Name:</label><br>
            <input type="text" name="ename" required>
        </p>
        <p>
            <label>Address:</label><br>
            <textarea name="address" rows="3" required></textarea>
        </p>
        <input type="submit" value="Next">
    </form>
</body>
</html>