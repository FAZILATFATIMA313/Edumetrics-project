<?php
$servername = "localhost";
$username = "root"; // Default WAMP username
$password = "root"; // Default WAMP password

// Database names
$dbname1 = "edumetrics"; // Replace with your first database name
$dbname2 = "student_management"; // Replace with your second database name
$dbname3 = "user_management"; // Replace with your third database name

// Create connections for each database
$conn1 = new mysqli(localhost, root, root, edumetrics);
$conn2 = new mysqli(localhost, root, root, student_management);
$conn3 = new mysqli(localhost, root, root, user_management);
$conn4 = new mysqli(localhost, root, root, login);
$conn5 = new mysqli(localhost, root, root, registration);


// Check connections
if ($conn1->connect_error) {
    die("Connection to edumetrics failed: " . $conn1->connect_error);
}
if ($conn2->connect_error) {
    die("Connection to student_management failed: " . $conn2->connect_error);
}
if ($conn3->connect_error) {
    die("Connection to user_management failed: " . $conn3->connect_error);
}
if ($conn4->connect_error) {
    die("Connection to user_management failed: " . $conn3->connect_error);
}
if ($conn5->connect_error) {
    die("Connection to user_management failed: " . $conn3->connect_error);
}

echo "Connected successfully to all databases";
?>