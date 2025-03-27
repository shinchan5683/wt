<?php
if (!file_exists('student.xml')) {
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><students></students>');
    
    // Sample student data
    $students = [
        ['roll' => '101', 'name' => 'John Doe', 'address' => 'Mumbai', 'college' => 'ABC College', 'course' => 'BCS'],
        ['roll' => '102', 'name' => 'Jane Smith', 'address' => 'Pune', 'college' => 'XYZ College', 'course' => 'BCA'],
        ['roll' => '103', 'name' => 'Mike Ross', 'address' => 'Delhi', 'college' => 'PQR College', 'course' => 'BCS']
    ];
    
    foreach ($students as $student) {
        $studentNode = $xml->addChild('student');
        foreach ($student as $key => $value) {
            $studentNode->addChild($key, $value);
        }
    }
    
    $xml->asXML('student.xml');
}
?>
<html>
<body>
    <h2>Search Students by Course</h2>
    <form method="post">
        <label>Enter Course: </label>
        <input type="text" name="course" required>
        <input type="submit" value="Search">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['course'])) {
        $course = $_POST['course'];
        $xml = simplexml_load_file('student.xml');
        
        echo "<h3>Students in $course course:</h3>";
        echo "<table>";
        echo "<tr><th>Roll No</th><th>Name</th><th>Address</th><th>College</th><th>Course</th></tr>";
        
        foreach ($xml->student as $student) {
            if (strtolower((string)$student->course) === strtolower($course)) {
                echo "<tr>";
                echo "<td>{$student->roll}</td>";
                echo "<td>{$student->name}</td>";
                echo "<td>{$student->address}</td>";
                echo "<td>{$student->college}</td>";
                echo "<td>{$student->course}</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }
    ?>
</body>
</html>