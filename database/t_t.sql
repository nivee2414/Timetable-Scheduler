-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 07, 2021 at 05:31 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: t_t
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_credentials`
--

CREATE TABLE IF NOT EXISTS `admin_credentials` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_credentials`
--

INSERT INTO `admin_credentials` (`username`, `password`) VALUES
('admin', 'pass@123');

-- --------------------------------------------------------

--
-- Table structure for table `staff_details`
--
 CREATE TABLE IF NOT EXISTS `staff_details` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `designation` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `academic_position` VARCHAR(50) NOT NULL, -- Added column for academic position
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE IF NOT EXISTS `room_details` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `roomType` VARCHAR(50) NOT NULL,
  `roomNumber` VARCHAR(50) NOT NULL,
  `allocation` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses_detials`
--

CREATE TABLE IF NOT EXISTS `courses_detials` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `courseId` VARCHAR(50) NOT NULL,
  `courseName` VARCHAR(100) NOT NULL,
  `duration` VARCHAR(50) NOT NULL,
  `type` VARCHAR(50) NOT NULL,
  `credit` INT NOT NULL,
  `semester` INT NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  -- Define your table structure here
);

-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
 