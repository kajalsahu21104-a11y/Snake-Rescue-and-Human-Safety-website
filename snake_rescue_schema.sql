-- Snake Rescue Project Complete SQL Schema
-- Database: snake_rescue (matched from all backend PHP files)
-- Run this in phpMyAdmin or MySQL CLI to setup database
-- Supports all tables: hospitals, doctors, rescueteam, feedback, registration, snakeawareness, admin, hospital_admin
-- Image fields as LONGBLOB (binary storage as used in save-*.php), change to VARCHAR(255) if storing filenames

CREATE DATABASE IF NOT EXISTS `snake_rescue` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `snake_rescue`;

-- Table: hospitals (main table, used in hospital.php, save-hospital.php, fetch_hospitals.php etc.)
CREATE TABLE `hospitals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `fees` varchar(100) NOT NULL,
  `hostipal_time` varchar(100) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `image` longblob COMMENT 'Binary image data',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample data for hospitals
INSERT INTO `hospitals` (`name`, `location`, `fees`, `hostipal_time`, `doctor`, `contact`) VALUES 
('Sanjivani Hospital', 'Jaipur, Rajasthan', '₹500-1000', '24/7', 'Dr. Rathi', '9876543210'),
('Padhar Hospital', 'Udaipur', '₹300-800', '9AM-9PM', 'Dr. Sharma', '9123456789');

-- Table: doctors (save-doctor.php, fetch-doctor.php)
CREATE TABLE `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `hostipal_time` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `image` longblob,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `doctors` (`name`, `location`, `hostipal_time`, `contact`) VALUES 
('Dr. Kumar', 'Jaipur', '10AM-8PM', '9876543211');

-- Table: rescueteam (save-rescueteam.php, fetch-rescueteam.php)
CREATE TABLE `rescueteam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `hostipal_time` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `link` varchar(255),
  `image` longblob,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rescueteam` (`name`, `location`, `hostipal_time`, `contact`, `link`) VALUES 
('Snake Rescue Team Jaipur', 'Jaipur', '24/7', '9988776655', 'https://example.com');

-- Table: feedback (feedbackfile.php, display_feedback.php)
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `rating` int(11) NOT NULL CHECK (rating BETWEEN 1 AND 5),
  `submitted_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `feedback` (`name`, `email`, `comments`, `rating`) VALUES 
('User1', 'user@example.com', 'Great service!', 5);

-- Table: registration (registration.php)
CREATE TABLE `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) UNIQUE NOT NULL,
  `address` varchar(500),
  `gender` enum('Male','Female','Other'),
  `mobile` varchar(20),
  `password` varchar(255) NOT NULL COMMENT 'MD5 hashed',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `registration` (`fname`, `email`, `address`, `gender`, `mobile`, `password`) VALUES 
('Test User', 'test@example.com', 'Jaipur', 'Male', '9876543212', MD5('password123'));

-- Table: snakeawareness (searchanswer.php)
CREATE TABLE `snakeawareness` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `keyword` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `snakeawareness` (`question`, `answer`, `keyword`) VALUES 
('Snake bite first aid?', 'Keep calm, immobilize, seek hospital.', 'snake bite first aid');

-- Table: admin (home.php login)
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'MD5 hashed',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`email`, `password`) VALUES 
('admin@snake.com', MD5('admin123'));

-- Table: hospital_admin (display.php)
CREATE TABLE `hospital_admin` (
  `id` int(11) NOT NULL,
  `hospital_name` varchar(255),
  `doctor_name` varchar(255),
  `email` varchar(255),
  `fees` varchar(100),
  `timing` varchar(100),
  `location` varchar(255),
  `mobile` varchar(20),
  `photo` varchar(500) COMMENT 'Image path',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `hospital_admin` (`id`, `hospital_name`, `doctor_name`, `email`, `fees`, `timing`, `location`, `mobile`, `photo`) VALUES 
(1, 'Sanjivani', 'Dr. Rathi', 'doctor@example.com', '₹500', '24/7', 'Jaipur', '9876543210', 'uploads/photo1.jpg');

-- Indexes for performance
CREATE INDEX idx_email ON registration(email);
CREATE INDEX idx_contact ON hospitals(contact);
CREATE INDEX idx_keyword ON snakeawareness(keyword);

-- End of schema
-- To import: Save as snake_rescue_schema.sql and run: mysql -u root -p snake_rescue < snake_rescue_schema.sql
-- Backend PHP files match exactly: INSERT/SELECT queries use these columns.

