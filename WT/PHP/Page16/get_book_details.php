<?php
header('Content-Type: application/json');

$title = isset($_GET['title']) ? $_GET['title'] : '';
if (empty($title)) {
    http_response_code(400);
    echo json_encode(['error' => 'Title parameter is required']);
    exit;
}

$xml = simplexml_load_file('books.xml');
if ($xml === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Error loading XML file']);
    exit;
}

$book_details = null;
foreach ($xml->book as $book) {
    if ((string)$book->title === $title) {
        $book_details = [
            'title' => (string)$book->title,
            'author' => (string)$book->author,
            'year' => (string)$book->year,
            'price' => (string)$book->price
        ];
        break;
    }
}

if ($book_details === null) {
    http_response_code(404);
    echo json_encode(['error' => 'Book not found']);
    exit;
}

echo json_encode($book_details);
?>