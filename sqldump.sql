-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2015 at 01:16 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dental_db`
--
CREATE DATABASE IF NOT EXISTS `dental_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dental_db`;

-- --------------------------------------------------------

--
-- Table structure for table `Patients`
--

DROP TABLE IF EXISTS `Patients`;
CREATE TABLE IF NOT EXISTS `Patients` (
  `CaseNo` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Phone_No` text NOT NULL,
  `Patient_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Medicines` text NOT NULL,
  `Address` text NOT NULL,
  `Age` int(11) NOT NULL,
  `Date` date NOT NULL,
  `NextAppointmentDate` date NOT NULL,
  `Gender` varchar(15) NOT NULL,
  `Status` varchar(200) NOT NULL,
  `Payment_Paid` int(11) NOT NULL,
  `Payment_Unpaid` int(11) NOT NULL,
  `Symptoms` text NOT NULL,
  `Treatment_Given` text NOT NULL,
  `Referred_By` text NOT NULL,
  `Time` time NOT NULL,
  `NextAppointmentTime` time NOT NULL,
  `DentalHistory` text NOT NULL,
  `MedicalHistory` text NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`Patient_ID`),
  UNIQUE KEY `CaseNo` (`CaseNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
