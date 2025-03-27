<?php
session_start();

if (!isset($_SESSION['employee']) || !isset($_SESSION['employee']['earnings'])) {
    header('Location: page1.php');
    exit;
}

$employee = $_SESSION['employee'];
$earnings = $employee['earnings'];
$total = $earnings['basic'] + $earnings['da'] + $earnings['hra'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Details - Summary</title>
</head>
<body>
    <h2>Employee Information Summary</h2>
    
    <h3>Personal Details</h3>
    <p>
        <strong>Employee Number:</strong> <?php echo htmlspecialchars($employee['eno']); ?><br>
        <strong>Employee Name:</strong> <?php echo htmlspecialchars($employee['ename']); ?><br>
        <strong>Address:</strong> <?php echo nl2br(htmlspecialchars($employee['address'])); ?>
    </p>

    <h3>Earnings Details</h3>
    <p>
        <strong>Basic Salary:</strong> ₹<?php echo number_format($earnings['basic'], 2); ?><br>
        <strong>DA (Dearness Allowance):</strong> ₹<?php echo number_format($earnings['da'], 2); ?><br>
        <strong>HRA (House Rent Allowance):</strong> ₹<?php echo number_format($earnings['hra'], 2); ?>
    </p>

    <p>
        <strong>Total Earnings:</strong> ₹<?php echo number_format($total, 2); ?>
    </p>

    <p>
        <input type="button" value="Previous" onclick="window.location.href='page2.php'">
        <input type="button" value="Print" onclick="window.print()">
        <input type="button" value="New Entry" onclick="window.location.href='page1.php'">
    </p>
</body>
</html>