<?php
$host = "localhost"; // Database host
$username = "root"; // Database username
$password = "root"; // Database password
$database = "edumetrics"; // Database name

// Create connection
$conn = new mysqli(localhost, root, root, edumetrics);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
