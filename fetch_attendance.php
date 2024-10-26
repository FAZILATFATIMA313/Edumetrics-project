<?php
$servername = "localhost"; // or your server IP
$username = "root";
$password = "root";
$dbname = "student_management";

// Create connection
$conn = new mysqli(localhost, root, root, edumetrics);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch attendance records
$sql = "SELECT date, subject, status FROM attendance ORDER BY date ASC";
$result = $conn->query($sql);

$attendance_data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $attendance_data[] = $row;
    }
}

$conn->close();

// Output as JSON
header('Content-Type: application/json');
echo json_encode($attendance_data);
?>
