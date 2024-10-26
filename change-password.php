<?php
session_start();
require 'db.php';  // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_SESSION['email'];
    $new_password = password_hash($_POST['new-password'], PASSWORD_DEFAULT);  // Hash the password
    
    // Update the password in the database
    $stmt = $conn->prepare("UPDATE users SET password = ?, otp = NULL, otp_expiry = NULL WHERE email = ?");
    $stmt->bind_param("ss", $new_password, $email);
    $stmt->execute();
    
    // Show success message
    echo "Password has been changed successfully.";
    header("Location: login.php");
}
?>
