-- Use the registration database
USE registration;

-- Drop table if it already exists
DROP TABLE IF EXISTS student_regs;

-- Create the student_regs table
CREATE TABLE student_regs (
    id INT AUTO_INCREMENT PRIMARY KEY,              -- Primary key with auto-increment
    firstname VARCHAR(20) NOT NULL,
    middlename VARCHAR(20),
    lastname VARCHAR(20) NOT NULL,
    semester INT NOT NULL,
    course CHAR(10) NOT NULL,
    rollno VARCHAR(10) NOT NULL UNIQUE,             -- Ensure roll number is unique
    gender ENUM('m', 'f', 'o') NOT NULL,
    phone VARCHAR(15) NOT NULL,                     -- Store phone numbers as VARCHAR
    address VARCHAR(100) NOT NULL,                  -- Increased size for address
    email VARCHAR(50) NOT NULL UNIQUE,              -- Ensure email is unique
    password VARCHAR(255) NOT NULL                  -- Store password hashes
);

-- Index for faster search on common fields
CREATE INDEX idx_rollno ON student_regs (rollno);
CREATE INDEX idx_email ON student_regs (email);
