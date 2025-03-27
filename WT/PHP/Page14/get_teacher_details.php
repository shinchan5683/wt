<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'teacher_db');

// Check connection
if ($conn->connect_error) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

// Get teacher ID from query string
$teacherId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Query to get teacher details
$sql = "SELECT * FROM TEACHER WHERE tno = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $teacherId);
$stmt->execute();
$result = $stmt->get_result();

$teacher = null;
if ($result->num_rows > 0) {
    $teacher = $result->fetch_assoc();
}

// Close connection
$stmt->close();
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($teacher);