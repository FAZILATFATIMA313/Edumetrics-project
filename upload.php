<?php
session_start();
include 'db.php'; // Include your database connection

// Check if files were uploaded
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['files'])) {
    $student_id = $_SESSION['student_id']; // Assuming you have the student's ID in the session
    $subject = $_POST['subject']; // Get subject name from the POST request
    $uploads_dir = 'uploads/'; // Directory where files will be uploaded

    // Create the uploads directory if it doesn't exist
    if (!is_dir($uploads_dir)) {
        mkdir($uploads_dir, 0755, true);
    }

    foreach ($_FILES['files']['name'] as $key => $name) {
        if ($_FILES['files']['error'][$key] === UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['files']['tmp_name'][$key];
            $file_path = $uploads_dir . basename($name);

            // Move the uploaded file to the target directory
            if (move_uploaded_file($tmp_name, $file_path)) {
                // Insert file information into the database
                $query = $conn->prepare("INSERT INTO uploads (student_id, subject, file_name, file_path) VALUES (?, ?, ?, ?)");
                $query->bind_param("isss", $student_id, $subject, $name, $file_path);
                $query->execute();
            } else {
                echo "Error uploading file: " . htmlspecialchars($name);
            }
        }
    }
    
    echo "Files uploaded successfully!";
    $conn->close();
}
?>
