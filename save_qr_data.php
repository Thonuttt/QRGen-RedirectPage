<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = ""; // Update with your database password
$dbname = "attendance_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(array("success" => false, "message" => "Connection failed: " . $conn->connect_error));
    exit();
}

$input = json_decode(file_get_contents('php://input'), true);

$subjectCode = $input['subjectCode'];
$day = $input['day'];
$time = $input['time'];
$term = $input['term'];

$tableName = $subjectCode . "_" . $term;

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT AUTO_INCREMENT PRIMARY KEY,
    studentName VARCHAR(255) NOT NULL,
    studentID VARCHAR(255) NOT NULL,
    day VARCHAR(255) NOT NULL,
    time VARCHAR(255) NOT NULL,
    term VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {

    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false, "message" => "Error creating table: " . $conn->error));
}

$conn->close();
?>

 
 <?php
header('Content-Type: application/json');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Check if data is properly decoded
if ($data === null) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON input']);
    exit;
}
?>