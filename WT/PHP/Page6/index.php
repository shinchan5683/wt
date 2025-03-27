<?php
// Load the XML file into a SimpleXML object
$books = simplexml_load_file('book.xml');
// Display book information
foreach ($books->book as $book) {
    echo "Title: " . $book->title . "<br>";
    echo "Author: " . $book->author . "<br>";
    echo "Year: " . $book->year . "<br>";
    echo "Price: " . $book->price . "<br>";
    echo "<hr>";
}
?>