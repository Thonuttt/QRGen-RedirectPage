<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentName = $_POST['studentName'] ?? '';
    $studentID = $_POST['studentID'] ?? '';
    $qrData = $_POST['qrData'] ?? '';

    if ($studentName && $studentID && $qrData) {
        // Process the attendance data, e.g., save to a database

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid input']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
