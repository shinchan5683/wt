<?php
$conn = mysqli_connect('localhost', 'root', '', 'test');

$eno = isset($_GET['eno']) ? (int)$_GET['eno'] : 0;

$query = "SELECT * FROM emp WHERE eno = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $eno);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$employee = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);
mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($employee);