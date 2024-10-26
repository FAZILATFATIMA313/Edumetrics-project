<?php
// Database connection
$host = 'localhost';   // Change this if necessary
$username = 'root';     // Your MySQL username
$password = 'root';         // Your MySQL password
$dbname = 'student_management';  // Your database name

// Create connection
$conn = new mysqli(localhost, root, root,student_management );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Loop through 60 roll numbers (Assuming 60 students)
    for ($i = 1; $i <= 60; $i++) {
        // Generate roll number (e.g., 23DS01, 23DS02...)
        $roll_no = sprintf('23DS%02d', $i);

        // Retrieve marks for each subject from the form
        $dlcoa = isset($_POST["dlcoa-$roll_no"]) ? $_POST["dlcoa-$roll_no"] : 0;
        $maths3 = isset($_POST["maths3-$roll_no"]) ? $_POST["maths3-$roll_no"] : 0;
        $dsgt = isset($_POST["dsgt-$roll_no"]) ? $_POST["dsgt-$roll_no"] : 0;
        $ds = isset($_POST["ds-$roll_no"]) ? $_POST["ds-$roll_no"] : 0;
        $cg = isset($_POST["cg-$roll_no"]) ? $_POST["cg-$roll_no"] : 0;

        // Prepare the SQL query to insert/update results in the database
        $sql = "INSERT INTO results (roll_no, dlcoa, maths3, dsgt, ds, cg)
                VALUES ('$roll_no', '$dlcoa', '$maths3', '$dsgt', '$ds', '$cg')
                ON DUPLICATE KEY UPDATE 
                dlcoa='$dlcoa', maths3='$maths3', dsgt='$dsgt', ds='$ds', cg='$cg'";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "Results for Roll No $roll_no updated successfully.<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
        }
    }
}

// Close the connection
$conn->close();
?>
