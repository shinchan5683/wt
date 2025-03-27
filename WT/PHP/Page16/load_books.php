<?php
header('Content-Type: text/plain');

$xml = simplexml_load_file('books.xml');
if ($xml === false) {
    die('Error loading XML file');
}

$titles = [];
foreach ($xml->book as $book) {
    $titles[] = (string)$book->title;
}

echo implode('|', $titles);
?>