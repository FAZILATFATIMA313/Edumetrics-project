<?php
session_start();
include 'db.php'; // Include your database connection

// Assuming you have the student's ID in the session
$student_id = $_SESSION['student_id'];

$query = $conn->prepare("SELECT * FROM students WHERE student_id = ?");
$query->bind_param("i", $student_id);
$query->execute();
$result = $query->get_result();
$student = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content here -->
</head>
<body>
    <div id="sidebar"></div>
    <div class="container">

        <!-- Student Profile Section -->
        <div class="profile-box">
            <h2>Student Profile</h2>
            <div class="profile-details">
                <label for="fullname">Full Name:</label>
                <span id="fullname"><?php echo $student['name']; ?></span>

                <label for="rollno">Roll No:</label>
                <span id="rollno"><?php echo $student['roll_no']; ?></span>

                <label for="branch">Branch:</label>
                <span id="branch"><?php echo $student['branch']; ?></span>

                <label for="sem">Semester:</label>
                <span id="sem"><?php echo $student['semester']; ?></span>

                <label for="year">Year:</label>
                <span id="year"><?php echo date('Y') - ($student['semester'] - 1) / 2; ?> Year</span> <!-- Adjust according to your semester calculation -->

                <label for="phone">Phone No:</label>
                <span id="phone"><?php echo $student['phone']; ?></span>

                <label for="address">Address:</label>
                <span id="address"><?php echo $student['address']; ?></span>
            </div>
        </div>

        <!-- Additional content for certificates and uploads -->
    </div>
</body>
</html>
