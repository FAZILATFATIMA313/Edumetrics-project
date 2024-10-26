-- Create the database
CREATE DATABASE student_management;

USE student_management;

-- Table to store admin details
CREATE TABLE admins (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Store hashed password
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table to store student details
CREATE TABLE students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    roll_no VARCHAR(10) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    branch VARCHAR(100) NOT NULL,
    semester INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table to store attendance records
CREATE TABLE attendance (
    attendance_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    subject VARCHAR(50) NOT NULL,
    attendance_date DATE NOT NULL,
    status ENUM('P', 'A') NOT NULL, -- P for Present, A for Absent
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE
);

-- Table to store result uploads
CREATE TABLE results (
    result_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    result_file VARCHAR(255) NOT NULL, -- File path for uploaded results
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE
);

-- Table to store grievances
CREATE TABLE grievances (
    grievance_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    description TEXT NOT NULL,
    status ENUM('Pending', 'Resolved') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE
);

-- Table to store announcements
CREATE TABLE announcements (
    announcement_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    body TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table to store timetable uploads
CREATE TABLE timetables (
    timetable_id INT AUTO_INCREMENT PRIMARY KEY,
    timetable_file VARCHAR(255) NOT NULL, -- File path for uploaded timetable
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table to store semester details (optional, for better flexibility)
CREATE TABLE semesters (
    semester_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL
);
-- Table to store uploaded files
CREATE TABLE uploads (
    upload_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    subject VARCHAR(50) NOT NULL,
    file_path VARCHAR(255) NOT NULL, -- File path for uploaded file
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE
);
DROP TABLE RESULTS;
USE STUDENT_MANAGEMENT;
CREATE TABLE results (
    roll_no VARCHAR(7) PRIMARY KEY,
    dlcoa INT,
    cg INT,
    dsgt INT,
    ds INT,
    maths_3 INT,
    out_of_20 INT
);

INSERT INTO results (roll_no, dlcoa, cg, dsgt, ds, maths_3, out_of_20)
VALUES
("23ds01", 18, 17, 19, 20, 18, 20),
("23ds02", 16, 15, 18, 17, 16, 20),
("23ds03", 19, 18, 17, 16, 20, 20),
("23ds04", 14, 13, 12, 11, 14, 20),
("23ds05", 20, 19, 20, 20, 19, 20),
("23ds06", 13, 16, 19, 18, 14, 20),
("23ds07", 17, 15, 20, 16, 19, 10),
("23ds08", 18, 17, 11, 17, 16, 20);
