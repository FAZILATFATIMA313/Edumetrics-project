<?php
session_start();
require 'db.php';  // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    
    // Check if email exists in the database
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate a 6-digit OTP
        $otp = rand(100000, 999999);
        
        // Set OTP expiry time (5 minutes)
        $otp_expiry = date('Y-m-d H:i:s', strtotime('+5 minutes'));

        // Store OTP and expiry in the database
        $stmt = $conn->prepare("UPDATE users SET otp = ?, otp_expiry = ? WHERE email = ?");
        $stmt->bind_param("sss", $otp, $otp_expiry, $email);
        $stmt->execute();
        
        // Send the OTP via email (in real implementation, use a proper mail server)
        mail($email, "Your OTP Code", "Your OTP is: $otp");

        $_SESSION['email'] = $email;
        echo "OTP has been sent to your email.";
        header("Location: reset_password.php");
    } else {
        echo "Email not found.";
    }
}
?>
