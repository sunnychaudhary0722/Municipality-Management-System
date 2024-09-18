-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 07:39 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `municipality`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `City` varchar(20) NOT NULL,
  `ZipCode` int(11) NOT NULL,
  `House_No` int(11) NOT NULL,
  `Street_Name` varchar(20) NOT NULL,
  `Street_No` varchar(10) NOT NULL,
  `ID_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`City`, `ZipCode`, `House_No`, `Street_Name`, `Street_No`, `ID_No`) VALUES
('Nepalgunj', 21900, 13, 'Bulbulia', '3', 10000),
('Vellore', 632014, 12, 'Bulbulia', '3', 10004),
('Vellore', 632014, 12, 'Bulbulia', '3', 10005);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `Paid` float NOT NULL,
  `Debit` float NOT NULL,
  `P_Date` date NOT NULL,
  `ID_No` int(11) NOT NULL,
  `S_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `citizen`
--

CREATE TABLE `citizen` (
  `ID_No` int(11) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `B_Day` date NOT NULL,
  `F_Name` varchar(20) NOT NULL,
  `M_Name` varchar(20) NOT NULL,
  `L_Name` varchar(20) NOT NULL,
  `Fm_Name` varchar(20) NOT NULL,
  `Marriage_ID_No` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citizen`
--

INSERT INTO `citizen` (`ID_No`, `Gender`, `B_Day`, `F_Name`, `M_Name`, `L_Name`, `Fm_Name`, `Marriage_ID_No`) VALUES
(10000, 'Male', '2000-07-15', 'Atul', 'Kumar', 'Karn', 'Karn', 100),
(10001, 'male', '2021-05-14', 'Bipul', '', 'Bainwar', '', 102),
(10002, 'male', '2000-07-15', 'Atul', 'Kumar', 'Karn', 'Karn', 101),
(10003, 'male', '2021-05-06', 'Kapil', '', 'Dhungana', '', 103),
(10004, 'male', '1998-06-05', 'Piyush', 'Kumar', 'Karn', 'Karn', 104),
(10005, 'male', '1997-06-05', 'Piyush', 'Kumar', 'Karn', '', 105);

-- --------------------------------------------------------

--
-- Table structure for table `citizen_ph_no`
--

CREATE TABLE `citizen_ph_no` (
  `Ph_NO` varchar(14) NOT NULL,
  `ID_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citizen_ph_no`
--

INSERT INTO `citizen_ph_no` (`Ph_NO`, `ID_No`) VALUES
('+918252452680', 10000),
('+9779800000000', 10003),
('+9779813540648', 10004),
('+9779813540648', 10005),
('+9779868223453', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `C_ID` int(11) NOT NULL,
  `C_Date` date NOT NULL,
  `C_Description` text NOT NULL,
  `C_Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`C_ID`, `C_Date`, `C_Description`, `C_Status`) VALUES
(1, '2021-05-30', 'Sewage in my locality is clogged.\r\n', 'solved'),
(3, '2021-06-04', 'There is broken electric pole. It might cause serious harm.', 'pending'),
(10005, '0000-00-00', 'The road infront of my house is totally damaged. Please repair it as soon as possible.', 'solved');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `D_Name` varchar(255) NOT NULL,
  `D_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`D_Name`, `D_No`) VALUES
('Physical Infrastructure', 1),
('Health', 2),
('Education', 3),
('Agriculture', 4);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Email` varchar(100) NOT NULL,
  `E_ID` int(11) NOT NULL,
  `Salary` float NOT NULL,
  `Extra_Hours` int(11) NOT NULL,
  `Commission_Pct` float NOT NULL,
  `D_No` int(11) NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Email`, `E_ID`, `Salary`, `Extra_Hours`, `Commission_Pct`, `D_No`, `Password`) VALUES
('atkkul@gmail.com', 10, 200000, 10, 2, 1, '$2y$10$Yo7nTEqBG4UoAyBQhXcRcO9D0uwyE.ZVxw4w6cpWap9CwRbCr.aX.'),
('bipulbainwar356@gmail.com', 2636, 100000, 20, 0, 1, '$2y$10$94iKH9ya1kqHrnkbGmoSvOXsUQyKxte8UkED.2lJvKxNLPStVaqMS');

-- --------------------------------------------------------

--
-- Table structure for table `manages`
--

CREATE TABLE `manages` (
  `E_ID` int(11) NOT NULL,
  `D_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manages`
--

INSERT INTO `manages` (`E_ID`, `D_No`) VALUES
(10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `Budget` float NOT NULL,
  `P_Name` varchar(50) NOT NULL,
  `P_No` int(11) NOT NULL,
  `P_Company` varchar(20) NOT NULL,
  `P_Location` varchar(20) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `D_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`Budget`, `P_Name`, `P_No`, `P_Company`, `P_Location`, `Start_Date`, `End_Date`, `D_No`) VALUES
(12345, 'Project 1', 1, 'ABC', 'Panauti', '2021-05-01', '2021-05-30', 1),
(1500000, 'Covid Vaccination', 31, 'Panauti Hospital', 'Panauti Municipality', '2021-06-04', '2021-08-18', 2),
(1050000, 'Water Pump Distribution', 1234, 'Sagarmatha Agro Ltd', 'Panauti', '2021-05-28', '2021-07-22', 4);

-- --------------------------------------------------------

--
-- Table structure for table `provides`
--

CREATE TABLE `provides` (
  `D_No` int(11) NOT NULL,
  `S_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ID_No` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ID_No`, `C_ID`) VALUES
(10000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `S_ID` int(11) NOT NULL,
  `SName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `solves`
--

CREATE TABLE `solves` (
  `D_No` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solves`
--

INSERT INTO `solves` (`D_No`, `C_ID`) VALUES
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`City`,`ZipCode`,`House_No`,`Street_Name`,`Street_No`,`ID_No`),
  ADD KEY `ID_No` (`ID_No`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`ID_No`,`S_ID`),
  ADD KEY `S_ID` (`S_ID`);

--
-- Indexes for table `citizen`
--
ALTER TABLE `citizen`
  ADD PRIMARY KEY (`ID_No`);

--
-- Indexes for table `citizen_ph_no`
--
ALTER TABLE `citizen_ph_no`
  ADD PRIMARY KEY (`Ph_NO`,`ID_No`),
  ADD KEY `ID_No` (`ID_No`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`C_ID`),
  ADD UNIQUE KEY `C_Name` (`C_Description`) USING HASH;

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`D_No`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`E_ID`),
  ADD KEY `D_No` (`D_No`);

--
-- Indexes for table `manages`
--
ALTER TABLE `manages`
  ADD PRIMARY KEY (`E_ID`,`D_No`),
  ADD KEY `D_No` (`D_No`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`P_No`),
  ADD KEY `D_No` (`D_No`);

--
-- Indexes for table `provides`
--
ALTER TABLE `provides`
  ADD PRIMARY KEY (`D_No`,`S_ID`),
  ADD KEY `S_ID` (`S_ID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ID_No`,`C_ID`),
  ADD KEY `C_ID` (`C_ID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `solves`
--
ALTER TABLE `solves`
  ADD PRIMARY KEY (`D_No`,`C_ID`),
  ADD KEY `C_ID` (`C_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`ID_No`) REFERENCES `citizen` (`ID_No`);

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`ID_No`) REFERENCES `citizen` (`ID_No`),
  ADD CONSTRAINT `bills_ibfk_2` FOREIGN KEY (`S_ID`) REFERENCES `services` (`S_ID`);

--
-- Constraints for table `citizen_ph_no`
--
ALTER TABLE `citizen_ph_no`
  ADD CONSTRAINT `citizen_ph_no_ibfk_1` FOREIGN KEY (`ID_No`) REFERENCES `citizen` (`ID_No`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`D_No`) REFERENCES `department` (`D_No`),
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`D_No`) REFERENCES `department` (`D_No`);

--
-- Constraints for table `manages`
--
ALTER TABLE `manages`
  ADD CONSTRAINT `manages_ibfk_1` FOREIGN KEY (`E_ID`) REFERENCES `employees` (`E_ID`),
  ADD CONSTRAINT `manages_ibfk_2` FOREIGN KEY (`D_No`) REFERENCES `department` (`D_No`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`D_No`) REFERENCES `department` (`D_No`);

--
-- Constraints for table `provides`
--
ALTER TABLE `provides`
  ADD CONSTRAINT `provides_ibfk_1` FOREIGN KEY (`D_No`) REFERENCES `department` (`D_No`),
  ADD CONSTRAINT `provides_ibfk_2` FOREIGN KEY (`S_ID`) REFERENCES `services` (`S_ID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`ID_No`) REFERENCES `citizen` (`ID_No`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`C_ID`) REFERENCES `complaints` (`C_ID`);

--
-- Constraints for table `solves`
--
ALTER TABLE `solves`
  ADD CONSTRAINT `solves_ibfk_1` FOREIGN KEY (`D_No`) REFERENCES `department` (`D_No`),
  ADD CONSTRAINT `solves_ibfk_2` FOREIGN KEY (`C_ID`) REFERENCES `complaints` (`C_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
