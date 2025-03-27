<?php
// Read the contact.dat file
$contacts = [];
$lines = file('contact.dat', FILE_IGNORE_NEW_LINES);

foreach ($lines as $line) {
    $data = explode('|', $line);
    $contacts[] = [
        'srno' => $data[0],
        'name' => $data[1],
        'residence_number' => $data[2],
        'mobile_number' => $data[3],
        'address' => $data[4]
    ];
}

// Set header to return JSON
header('Content-Type: application/json');

// Return the contacts array as JSON
echo json_encode($contacts);