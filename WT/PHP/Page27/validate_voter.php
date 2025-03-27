<?php
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$age = isset($_POST['age']) ? (int)$_POST['age'] : 0;
$nationality = isset($_POST['nationality']) ? trim(strtolower($_POST['nationality'])) : '';

$errors = [];

if (!preg_match('/^[A-Z\s]+$/', $name)) {
    $errors[] = 'Name must be in uppercase letters only';
}

if ($age < 18) {
    $errors[] = 'Age must be 18 or above';
}

if ($nationality !== 'indian') {
    $errors[] = 'Nationality must be Indian';
}

header('Content-Type: application/json');

if (empty($errors)) {
    echo json_encode([
        'success' => true,
        'message' => 'Registration successful!'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'errors' => $errors
    ]);
}