<?php
session_start();

if (!isset($_SESSION['employee'])) {
    header('Location: page1.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['employee']['earnings'] = [
        'basic' => floatval($_POST['basic']),
        'da' => floatval($_POST['da']),
        'hra' => floatval($_POST['hra'])
    ];
    header('Location: page3.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Details - Step 2</title>
</head>
<body>
    <h2>Employee Details - Step 2</h2>
    <form method="POST">
        <p>
            <label>Basic Salary:</label><br>
            <input type="number" name="basic" step="0.01" required>
        </p>
        <p>
            <label>DA (Dearness Allowance):</label><br>
            <input type="number" name="da" step="0.01" required>
        </p>
        <p>
            <label>HRA (House Rent Allowance):</label><br>
            <input type="number" name="hra" step="0.01" required>
        </p>
        <p>
            <input type="button" value="Previous" onclick="window.location.href='page1.php'">
            <input type="submit" value="Next">
        </p>
    </form>
</body>
</html>