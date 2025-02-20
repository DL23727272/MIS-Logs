-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2025 at 03:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mis_logs`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ID` int(11) NOT NULL,
  `empID` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `officeID` int(11) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `empID`, `name`, `officeID`, `position`, `address`, `phone`) VALUES
(2, 'EMP002', 'Jane Smiths', 3, 'Department Heads', '456 Business Rd, City B', '09234567890'),
(3, 'EMP003', 'Mark Johnson', 3, 'Senior Lecturer', '789 Education Ave, City C', '09345678901'),
(4, 'EMP004', 'Emily Davis', 4, 'Instructor', '321 Agriculture Ln, City D', '09456789012'),
(5, 'EMP005', 'Michael Brown', 2, 'Research Associate', '654 Science Blvd, City A', '09567890123'),
(6, 'EMP006', 'Sarah Wilson', 2, 'Administrator', '987 Management St, City B', '09678901234'),
(7, 'EMP007', 'David Martinez', 3, 'Training Coordinator', '159 Teacher Way, City C', '09789012345'),
(9, '23-13027', 'Dran Leynard Gamoso', 1, 'Software Developer', 'bagar', '09456221399'),
(10, '24-00001', 'RHumar', 4, 'Software Developer', 'bagar', '09456221399'),
(11, '24-00002', 'Dran Leynard Gamoso', 5, 'Software Developer', 'bagar', '09456221399'),
(12, 'A21-00001', 'Ruvic Bacton', 6, 'Graphic Designer', 'barangay san juan', '11111'),
(13, 'MIS-00001', 'DL', 6, 'Developer', 'Bagar', '11111'),
(14, 'MIS-00002', 'Ruvic', 6, 'Graphic Designer', 'San Juan', '12312412'),
(15, 'MIS-00003', 'Rhumar', 6, 'Network', 'Narvacan', '12312');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `officeID` int(11) NOT NULL,
  `officeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`officeID`, `officeName`) VALUES
(1, 'CAS'),
(2, 'CBME'),
(3, 'CTE'),
(4, 'CAFED'),
(5, 'SCJE'),
(6, 'MIS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `empID` (`empID`),
  ADD KEY `officeID` (`officeID`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`officeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `officeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`officeID`) REFERENCES `offices` (`officeID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
