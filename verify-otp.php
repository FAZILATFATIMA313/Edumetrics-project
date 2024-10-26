<?php
session_start();
require 'db.php';  // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_SESSION['email'];
    $otp = $_POST['otp'];

    // Check if the OTP matches and hasn't expired
    $stmt = $conn->prepare("SELECT otp, otp_expiry FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $user['otp'] == $otp && $user['otp_expiry'] >= date('Y-m-d H:i:s')) {
        echo "OTP verified successfully.";
        header("Location: reset_password.php");
    } else {
        echo "Invalid or expired OTP.";
    }
}
?>
