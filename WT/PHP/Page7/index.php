<?php
// Create a new DOMDocument instance and load the XML file
$dom = new DOMDocument();
$dom->load('Movie.xml');

// Get all MovieInfo elements
$movies = $dom->getElementsByTagName('MovieInfo');

// Display movie titles and actor names
echo "<h2>Movie Information</h2>";
foreach ($movies as $movie) {
    echo "Movie Title: " . $movie->getElementsByTagName('MovieTitle')->item(0)->nodeValue . "<br>";
    echo "Actor Name: " . $movie->getElementsByTagName('ActorName')->item(0)->nodeValue . "<br><br>";
}
?>