<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'teacher_db');

// Check connection
if ($conn->connect_error) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

// Query to get all teachers
$sql = "SELECT tno, tname FROM TEACHER ORDER BY tname";
$result = $conn->query($sql);

$teachers = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $teachers[] = $row;
    }
}

// Close connection
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($teachers);