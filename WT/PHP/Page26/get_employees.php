<?php
$conn = mysqli_connect('localhost', 'root', '', 'test');

$query = "SELECT eno, ename FROM emp";
$result = mysqli_query($conn, $query);

$employees = [];
while ($row = mysqli_fetch_assoc($result)) {
    $employees[] = $row;
}

mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($employees);