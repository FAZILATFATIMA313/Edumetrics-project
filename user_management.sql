-- Create the database
CREATE DATABASE user_management;

-- Use the database

USE user_management;

-- Create the users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    otp VARCHAR(6),
    otp_expiry DATETIME
);

-- Insert sample data for testing
INSERT INTO users (email, password) 
VALUES ('example@example.com', 'old_password_hash');  -- Store hashed password in a real application
