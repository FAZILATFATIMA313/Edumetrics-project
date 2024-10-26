<?php
session_start();
include 'db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $grievance_title = $_POST['grievance-title'];
    $grievance_description = $_POST['grievance-description'];

    // Assuming you have the student's ID in the session
    $student_id = $_SESSION['student_id'];

    $query = $conn->prepare("INSERT INTO grievances (student_id, description) VALUES (?, ?)");
    $query->bind_param("is", $student_id, $grievance_description);

    if ($query->execute()) {
        echo "Grievance submitted successfully!";
    } else {
        echo "Error submitting grievance.";
    }

    $conn->close();
}
?>
