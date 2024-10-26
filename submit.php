<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Retrieve POST data
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$semester = $_POST['semester'];
$course = $_POST['course'];
$rollno = $_POST['rollno'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];

// Check if password and re-password match
if ($password !== $repassword) {
    die("Passwords do not match. Please try again.");
}

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Database connection
$conn = new mysqli('localhost', 'root', 'root', 'registration');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO student_regs(firstname, middlename, lastname, semester, course, rollno, gender, phone, address, email, password) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Error handling for prepare
    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }
    
    // Bind parameters
    $stmt->bind_param("sssisssssss", $firstname, $middlename, $lastname, $semester, $course, $rollno, $gender, $phone, $address, $email, $hashed_password);
    
    // Execute the query and handle potential errors (duplicate entry)
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        if ($conn->errno == 1062) {  // Error code for duplicate entry
            echo "Error: Duplicate entry for roll number or email.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
