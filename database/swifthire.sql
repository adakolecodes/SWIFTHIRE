-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 27, 2023 at 05:48 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swifthire`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email_address`, `password`) VALUES
(1, 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age_group` varchar(50) NOT NULL,
  `whatsapp_no` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `highest_qualification` varchar(100) NOT NULL,
  `residential_address` varchar(100) NOT NULL,
  `nin_upload` varchar(200) DEFAULT NULL,
  `proof_of_highest_qualification` varchar(200) DEFAULT NULL,
  `passport_photograph` varchar(200) DEFAULT NULL,
  `referee_full_name` varchar(100) NOT NULL,
  `referee_residential_address` varchar(100) NOT NULL,
  `referee_work_address` varchar(100) NOT NULL,
  `referee_email_address` varchar(100) NOT NULL,
  `referee_phone_no` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employees_work_specification`
--

DROP TABLE IF EXISTS `employees_work_specification`;
CREATE TABLE IF NOT EXISTS `employees_work_specification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `job` varchar(50) NOT NULL,
  `renumeration_period` varchar(50) NOT NULL,
  `renumeration_amount` double(12,2) NOT NULL,
  `accommodation` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'PENDING',
  `taken` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

DROP TABLE IF EXISTS `employers`;
CREATE TABLE IF NOT EXISTS `employers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employer_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age_group` varchar(10) NOT NULL,
  `whatsapp_no` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `residential_address` varchar(100) NOT NULL,
  `work_address` varchar(100) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `nin_upload` varchar(200) DEFAULT NULL,
  `official_idcard_upload` varchar(200) DEFAULT NULL,
  `passport_photograph` varchar(200) DEFAULT NULL,
  `referee_fullname` varchar(100) NOT NULL,
  `referee_residential_address` varchar(100) NOT NULL,
  `referee_work_address` varchar(100) NOT NULL,
  `referee_job_title` varchar(100) NOT NULL,
  `referee_email` varchar(100) NOT NULL,
  `referee_phone_no` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employers_work_specification`
--

DROP TABLE IF EXISTS `employers_work_specification`;
CREATE TABLE IF NOT EXISTS `employers_work_specification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employer_id` int(11) NOT NULL,
  `job` varchar(100) NOT NULL,
  `renumeration_period` varchar(50) NOT NULL,
  `renumeration_amount` double(12,2) NOT NULL,
  `accommodation` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'PENDING',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
