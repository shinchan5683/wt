<?php
$name = isset($_POST['name']) ? trim($_POST['name']) : '';

if (empty($name)) {
    echo "Stranger, please tell me your name!";
    exit;
}

$masterNames = ['Rohit', 'Virat', 'Dhoni', 'Ashwin', 'Harbhajan'];
echo in_array(ucfirst(strtolower($name)), $masterNames) ? "Hello, master!" : "$name, I don't know you!";