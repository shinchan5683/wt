<?php
// Simple array of suggestions for learning purpose
$suggestions = [
    'Programming',
    'Python',
    'PHP',
    'JavaScript',
    'Java',
    'HTML',
    'CSS',
    'Database',
    'MySQL'
];

$query = isset($_GET['q']) ? strtolower($_GET['q']) : '';

// Filter matching suggestions
$filtered = array_filter($suggestions, function($item) use ($query) {
    return stripos($item, $query) !== false;
});

header('Content-Type: application/json');
echo json_encode(array_values($filtered));