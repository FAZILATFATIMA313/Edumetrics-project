<?php
// Start session
session_start();

// Database connection
$host = 'localhost';
$db = 'registration';
$user = 'root';  // Replace with your MySQL username
$pass = 'root';      // Replace with your MySQL password

$conn = new mysqli(localhost, root, root, registration);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstname'];
    $middleName = $_POST['middlename'];
    $lastName = $_POST['lastname'];
    $rollNo = $_POST['rollno'];
    $semester = $_POST['semester'];
    $course = $_POST['course'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $passwordRepeat = $_POST['psw-repeat'];

    // Check if passwords match
    if ($password !== $passwordRepeat) {
        echo "Passwords do not match!";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind the SQL query
    $stmt = $conn->prepare("INSERT INTO students_regs (first_name, middle_name, last_name, roll_no, semester, course, gender, phone, address, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisissss", $firstName, $middleName, $lastName, $rollNo, $semester, $course, $gender, $phone, $address, $email, $hashedPassword);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        // Registration successful, redirect to login page
        echo "Registration successful! Redirecting to login...";
        header("Location: Login.html");
        exit();
    } else {
        // Error handling
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
