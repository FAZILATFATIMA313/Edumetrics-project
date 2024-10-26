<?php
$host = "localhost"; // Database host
$username = "root"; // Database username
$password = "root"; // Database password
$database = "student_management"; // Database name

// Create connection
$conn = new mysqli(localhost, root, root, student_management);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
