<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "uploads/";
    $practical_file = $target_dir . basename($_FILES["practical"]["name"]);
    $assignment_file = $target_dir . basename($_FILES["assignment"]["name"]);

    // Create the uploads directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $uploadOk = 1;

    // Check if files were uploaded
    if (move_uploaded_file($_FILES["practical"]["tmp_name
?>