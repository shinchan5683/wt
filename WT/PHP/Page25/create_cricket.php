<?php
// Function to create initial XML file with Australia team
function createInitialXML() {
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->formatOutput = true;

    // Create root element
    $root = $xml->createElement('CricketTeam');
    $xml->appendChild($root);

    // Add Australia team
    $team = $xml->createElement('Team');
    $team->setAttribute('country', 'Australia');
    $root->appendChild($team);

    // Add player details
    $player = $xml->createElement('player', 'Steve Smith');
    $runs = $xml->createElement('runs', '8010');
    $wicket = $xml->createElement('wicket', '17');

    $team->appendChild($player);
    $team->appendChild($runs);
    $team->appendChild($wicket);

    // Save XML file
    $xml->save('cricket.xml');
    echo "Initial XML file created with Australia team.<br>";
}

// Function to add India team
function addIndiaTeam() {
    $xml = new DOMDocument();
    $xml->load('cricket.xml');
    $xml->formatOutput = true;

    $root = $xml->getElementsByTagName('CricketTeam')->item(0);

    // Add India team
    $team = $xml->createElement('Team');
    $team->setAttribute('country', 'India');

    // Add player details
    $player = $xml->createElement('player', 'Virat Kohli');
    $runs = $xml->createElement('runs', '12898');
    $wicket = $xml->createElement('wicket', '4');

    $team->appendChild($player);
    $team->appendChild($runs);
    $team->appendChild($wicket);

    $root->appendChild($team);
    $xml->save('cricket.xml');
    echo "India team added to XML file.<br>";
}

// Create initial XML with Australia team
createInitialXML();

// Add India team
addIndiaTeam();

// Display the XML content
echo "<h3>XML File Content:</h3>";
echo "<pre>";
echo htmlspecialchars(file_get_contents('cricket.xml'));
echo "</pre>";
?>