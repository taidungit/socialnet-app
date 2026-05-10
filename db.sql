-- 1. Initialize Database
CREATE DATABASE IF NOT EXISTS `socialnet`;
USE `socialnet`;

-- 2. Create the 'account' table exactly as specified
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `fullname` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `description` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Insert Mock Data for testing purposes
INSERT INTO `account` (`username`, `fullname`, `password`, `description`) VALUES 
('admin', 'System Administrator', 'admin123', 'Admin account for managing the user system.'),
('dungnt', 'Nguyen Tai Dung', '123456', 'HUST Student - School of ICT. Interested in Web Dev.'),
('hoatran', 'Tran Thi Hoa', '123456', 'Full-stack developer and UI/UX enthusiast.'),
('minhnguyen', 'Nguyen Quang Minh', '123456', 'Backend specialist focusing on PHP and MySQL.'),
('duongkt', 'Kieu Thai Duong', '123456', 'Linux system administrator and DevOps learner.'),
('tungduong', 'Pham Tung Duong', '123456', 'Passionate about Agile and Extreme Programming.'),
('lannhu', 'Hoang Lan Nhu', '123456', 'New user exploring the SocialNet platform.'),
('anhquan', 'Vu Anh Quan', '123456', 'Looking for internship opportunities in Hanoi.');
