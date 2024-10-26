<?php
// Start session
session_start();

// Database connection
$host = 'localhost';
$db = 'registration';
$user = 'root';  // Use your MySQL username
$pass = 'root';      // Use your MySQL password

$conn = new mysqli('localhost', 'root', 'root', 'registration');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // 'student' or 'admin'

    // Choose the correct table
    $table = 'student_regs';

    // Fetch user from the appropriate table
    $stmt = $conn->prepare("SELECT * FROM student_regs WHERE (email = ? OR password = ?)");
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // User found
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start session
            $_SESSION['user'] = $user['email'];
            $_SESSION['user'] = $user['password'];
    
    
            
            // Redirect to the home page
            header('Location: home page.html');
            exit();
        } else {
            // Invalid password
            echo "Invalid password";
        }
    } else {
        // No user found
        echo "No user found with that username or email";
}
}
?>