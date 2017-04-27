-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 02:26 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Employee_ID` varchar(45) NOT NULL,
  `Employee_Type` int(1) NOT NULL,
  `Specialty` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Employee_ID`, `Employee_Type`, `Specialty`) VALUES
('d1', 1, 'Radiology'),
('d10', 1, 'Oncology'),
('d11', 1, 'Pediatrics'),
('d12', 1, 'Endocrinology'),
('d13', 1, 'Radiology'),
('d14', 1, 'Endocrinology'),
('d15', 1, 'Radiology'),
('d16', 1, 'Pediatrics'),
('d17', 1, 'Immunology'),
('d18', 1, 'Nephrology'),
('d19', 1, 'Hematology'),
('d2', 1, 'Cardiology'),
('d20', 1, 'Pediatrics'),
('d3', 1, 'Oncology'),
('d4', 1, 'Oncology'),
('d5', 1, 'Pediatrics'),
('d6', 1, 'Endocrinology'),
('d7', 1, 'Pulmonary'),
('d8', 1, 'Radiology'),
('d9', 1, 'Cardiology');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_ID` varchar(45) NOT NULL,
  `Employee_Type` int(10) NOT NULL,
  `FName` varchar(45) NOT NULL,
  `LName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `Employee_Type`, `FName`, `LName`) VALUES
('d1', 1, 'Bob', 'Barkerz'),
('d10', 1, 'Margareet', 'Jones'),
('d11', 1, 'Charliie', 'Johnson'),
('d12', 1, 'Sussana', 'Williams'),
('d13', 1, 'Barbbara', 'Simpson'),
('d14', 1, 'Dorrothy', 'Brown'),
('d15', 1, 'Anfony', 'Miller'),
('d16', 1, 'Lisa', 'Wilson'),
('d17', 1, 'Kimberly', 'Jackson'),
('d18', 1, 'Ashlley', 'Thompson'),
('d19', 1, 'Carrol', 'Clark'),
('d2', 1, 'Janus', 'Willis'),
('d20', 1, 'Emiliey', 'Greene'),
('d3', 1, 'Donnie', 'Sanders'),
('d4', 1, 'Lissa', 'Hodgers'),
('d5', 1, 'Sarrah', 'Scott'),
('d6', 1, 'Sandiey', 'Preston'),
('d7', 1, 'Fayye', 'Butters'),
('d8', 1, 'Jammes', 'Smith'),
('d9', 1, 'Karren', 'Moore'),
('n1', 2, 'Marge', 'Simpson'),
('n10', 2, 'Margaret', 'Jones'),
('n11', 2, 'Charles', 'Johnson'),
('n12', 2, 'Susan', 'Williams'),
('n13', 2, 'Barbara', 'Simpson'),
('n14', 2, 'Dorothy', 'Brown'),
('n15', 2, 'Anthony', 'Miller'),
('n16', 2, 'Lisa', 'Wilson'),
('n17', 2, 'Kimberly', 'Jackson'),
('n18', 2, 'Ashley', 'Thompson'),
('n19', 2, 'Carol', 'Clark'),
('n2', 2, 'Jan', 'Willis'),
('n20', 2, 'Emily', 'Greene'),
('n3', 2, 'Don', 'Sanders'),
('n4', 2, 'Lisa', 'Hodgers'),
('n5', 2, 'Sarah', 'Scott'),
('n6', 2, 'Sandy', 'Preston'),
('n7', 2, 'Faye', 'Butters'),
('n8', 2, 'James', 'Smith'),
('n9', 2, 'Karen', 'Moore'),
('r1', 3, 'Bobby', 'Barkerz'),
('r10', 3, 'Margariet', 'Jonnes'),
('r11', 3, 'Charliie', 'Johnsson'),
('r12', 3, 'Sussana', 'Williiams'),
('r13', 3, 'Barbbara', 'Simpsonz'),
('r14', 3, 'Dorrothy', 'Brownz'),
('r15', 3, 'Anfony', 'Millerz'),
('r16', 3, 'Lisa', 'Wilsonz'),
('r17', 3, 'Kimberly', 'Jacksonz'),
('r18', 3, 'Ashlley', 'Thompsonz'),
('r19', 3, 'Carrol', 'Clarkz'),
('r2', 3, 'Jany', 'Willis'),
('r20', 3, 'Emiliey', 'Green'),
('r3', 3, 'Donniee', 'Sanders'),
('r4', 3, 'Lissa', 'Hodgers'),
('r5', 3, 'Zarrah', 'Scott'),
('r6', 3, 'Sanddiey', 'Prestton'),
('r7', 3, 'Fayyez', 'Butterrs'),
('r8', 3, 'Jaammes', 'Smitth'),
('r9', 3, 'Karrenn', 'Moorre');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `employee_AFTER_INSERT` AFTER INSERT ON `employee` FOR EACH ROW BEGIN
    IF new.Employee_Type = 1 then
	Insert into doctor(Employee_ID, Employee_Type) 
    values(new.Employee_ID, new.Employee_Type);
    elseif new.Employee_Type = 2 then
	Insert into nurse(Employee_ID, Employee_Type) 
    values(new.Employee_ID, new.Employee_Type);
	elseif new.Employee_Type = 3 then
	Insert into receptionist(Employee_ID, Employee_Type) 
    values(new.Employee_ID, new.Employee_Type);
    end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_has_patient`
--

CREATE TABLE `employee_has_patient` (
  `employee_Employee_ID` varchar(45) NOT NULL,
  `patient_patient_ID` varchar(45) NOT NULL,
  `employee_Type` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_has_patient`
--

INSERT INTO `employee_has_patient` (`employee_Employee_ID`, `patient_patient_ID`, `employee_Type`) VALUES
('d1', 'p1', 1),
('d1', 'p2', 1),
('d2', 'p7', 1),
('d3', 'p8', 1),
('d4', 'p9', 1),
('d5', 'p10', 1),
('d6', 'p8', 1),
('d7', 'p11', 1),
('n1', 'p1', 2),
('n11', 'p11', 2),
('n12', 'p12', 2),
('n13', 'p13', 2),
('n14', 'p14', 2),
('n2', 'p10', 2),
('n3', 'p7', 2),
('n4', 'p6', 2),
('n4', 'p7', 2),
('n5', 'p5', 2),
('n6', 'p8', 2),
('n7', 'p14', 2),
('n7', 'p9', 2),
('r1', 'p1', 3);

--
-- Triggers `employee_has_patient`
--
DELIMITER $$
CREATE TRIGGER `employee_has_patient_BEFORE_INSERT` BEFORE INSERT ON `employee_has_patient` FOR EACH ROW BEGIN
     set new.employee_Type = (select Employee_Type from employee where Employee_ID = new.employee_Employee_ID);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `Employee_ID` varchar(45) NOT NULL,
  `Employee_Type` int(1) NOT NULL,
  `Specialty` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`Employee_ID`, `Employee_Type`, `Specialty`) VALUES
('n1', 2, 'midwifery'),
('n10', 2, 'holistic nurse'),
('n11', 2, 'genetics nurse'),
('n12', 2, 'holistic nurse'),
('n13', 2, 'holistic nurse'),
('n14', 2, 'midwifery'),
('n15', 2, 'legal nurse'),
('n16', 2, 'registered nurse'),
('n17', 2, 'holistic nurse'),
('n18', 2, 'legal nurse'),
('n19', 2, 'mental health nurse'),
('n2', 2, 'registered nurse'),
('n20', 2, 'neonatal'),
('n3', 2, 'registered nurse'),
('n4', 2, 'holistic nurse'),
('n5', 2, 'holistic nurse'),
('n6', 2, 'genetics nurse'),
('n7', 2, 'legal nurse'),
('n8', 2, 'mental health nurse'),
('n9', 2, 'legal nurse');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_ID` varchar(45) NOT NULL,
  `Fname` varchar(45) NOT NULL,
  `Lname` varchar(45) NOT NULL,
  `Minit` varchar(1) DEFAULT NULL,
  `Birthday` varchar(10) DEFAULT NULL,
  `Sex` varchar(10) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Weight` decimal(10,0) DEFAULT NULL,
  `Height` decimal(10,0) DEFAULT NULL,
  `blood_type` varchar(2) DEFAULT NULL,
  `chief_complaint` varchar(45) DEFAULT NULL,
  `diagnosis` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_ID`, `Fname`, `Lname`, `Minit`, `Birthday`, `Sex`, `Address`, `Weight`, `Height`, `blood_type`, `chief_complaint`, `diagnosis`) VALUES
('p1', 'Apple', 'Cesar', 'M', '5/3/1996', 'F', '1300 Bob Lane', '177', '68', 'AB', 'Stomach ache', 'Food Poisoning'),
('p10', 'Canilore', 'Ducckets', 'P', '1/9/2010', 'M', '1300 Bob Lane', '187', '70', 'AB', 'Can\'t focus', 'ADHD'),
('p100', 'Alma', 'Gonzalez', 'B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('p11', 'Genesis', 'Finn', 'F', '9/17/1984', 'F', '1300 Finn Lane', '168', '63', 'AB', 'Stomach ache', 'Food Poisoning'),
('p12', 'Silinda', 'Lay', 'F', '6/6/1968', 'F', '1300 Lay Lane', '121', '55', 'AB', 'Back Pain', 'Scoliosis'),
('p13', 'Behula', 'Raslusin', 'F', '2/7/1982', 'F', '1300 Behula Lane', '170', '60', 'AB', 'Cold', 'Flu'),
('p14', 'Jedo', 'Ollred', 'M', '7/6/1957', 'M', '1300 Ollred Lane', '178', '70', 'AB', 'Muscle Weakness', 'Atrophy'),
('p15', 'Chamelia', 'Pather', 'F', '5/3/17', 'F', '1300 Pather Lane', '167', '64', 'AB', 'Joint pain', 'Arthritis'),
('p18', 'A', 'G', 'B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('p2', 'Cinderella', 'Banjo', 'F', '2/3/2000', 'F', '1300 Cinderella Lane', '131', '70', 'B', 'Headache', 'High Blood Pressure'),
('p3', 'Apple', 'Banana', 'F', '6/26/2010', 'F', '1300 Banana Lane', '137', '68', 'A', 'Cold', 'Flu'),
('p30', 'Alma', 'Gomez', 'B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('p4', 'Cornelia', 'Groce', 'F', '5/19/1942', 'F', '1300 Groce Lane', '177', '68', 'AB', 'Heart Hurts', 'Flu'),
('p400', 'Al', 'dsadas', 'B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('p5', 'Noma', 'Goldsmith', 'F', '12/4/1954', 'F', '1300 Noma Lane', '176', '58', 'A', 'Exhaustion', 'Flu'),
('p6', 'Lucille', 'Bealer', 'F', '8/5/1999', 'F', '1300 Bealer Lane', '187', '69', 'AB', 'Cold', 'Common Cold'),
('p7', 'Siu', 'Peele', 'M', '3/15/2002', 'F', '1300 Peele Lane', '147', '65', 'O', 'Head Hurts', 'High Blood Pressure'),
('p8', 'Keva', 'Mendenhall', 'F', '7/30/2000', 'F', '1300 Keva Lane', '177', '68', 'B', 'Stomach ache', 'Flue'),
('p9', 'Catherine', 'Kidwell', 'C', '5/29/1997', 'F', '1300 Kidwell Lane', '178', '69', 'A', 'Can\'t Sleep', 'Insomnia');

--
-- Triggers `patient`
--
DELIMITER $$
CREATE TRIGGER `patient_AFTER_INSERT` AFTER INSERT ON `patient` FOR EACH ROW BEGIN
   Insert into patient_record(patient_ID)
   values(new.patient_ID);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_record`
--

CREATE TABLE `patient_record` (
  `record_ID` int(45) NOT NULL,
  `patient_ID` varchar(45) NOT NULL,
  `date_admitted` timestamp NULL DEFAULT NULL,
  `date_released` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_record`
--

INSERT INTO `patient_record` (`record_ID`, `patient_ID`, `date_admitted`, `date_released`) VALUES
(33, 'p1', '2005-09-21 14:56:43', '2015-06-16 04:14:44'),
(34, 'p2', '2008-12-12 16:45:11', '2012-12-15 05:25:47'),
(35, 'p3', '2012-10-15 08:56:50', '2015-05-20 23:01:42'),
(36, 'p4', '2000-01-28 12:05:27', '2009-02-25 13:29:20'),
(37, 'p5', '2004-11-09 17:28:21', '2007-07-01 02:33:08'),
(38, 'p6', '2011-05-17 02:07:48', '2008-11-24 22:47:54'),
(39, 'p7', '2004-12-20 07:32:39', '2010-03-25 08:28:54'),
(40, 'p8', '2015-08-10 08:18:08', '2011-10-06 18:32:02'),
(41, 'p9', '2011-10-06 18:32:02', '2015-08-10 08:18:08'),
(42, 'p10', '2010-03-25 08:28:54', '2004-12-20 07:32:39'),
(43, 'p11', '2008-11-24 22:47:54', '2011-05-17 02:07:48'),
(44, 'p12', '2007-07-01 02:33:08', '2004-11-09 17:28:21'),
(45, 'p13', '2009-02-25 13:29:20', '2000-01-28 12:05:27'),
(46, 'p14', '2015-05-20 23:01:42', '2012-10-15 08:56:50'),
(47, 'p15', '2012-12-15 05:25:47', '2008-12-12 16:45:11'),
(48, 'p18', NULL, NULL),
(49, 'p30', NULL, NULL),
(50, 'p100', NULL, NULL),
(51, 'p400', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `Employee_ID` varchar(45) NOT NULL,
  `Employee_Type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`Employee_ID`, `Employee_Type`) VALUES
('r1', 3),
('r10', 3),
('r11', 3),
('r12', 3),
('r13', 3),
('r14', 3),
('r15', 3),
('r16', 3),
('r17', 3),
('r18', 3),
('r19', 3),
('r2', 3),
('r20', 3),
('r3', 3),
('r4', 3),
('r5', 3),
('r6', 3),
('r7', 3),
('r8', 3),
('r9', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Employee_ID`),
  ADD KEY `FK_Doctor` (`Employee_ID`,`Employee_Type`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_ID`),
  ADD UNIQUE KEY `UQ_Employee` (`Employee_ID`,`Employee_Type`);

--
-- Indexes for table `employee_has_patient`
--
ALTER TABLE `employee_has_patient`
  ADD PRIMARY KEY (`employee_Employee_ID`,`patient_patient_ID`),
  ADD KEY `fk_employee_has_patient_patient1_idx` (`patient_patient_ID`),
  ADD KEY `fk_employee_has_patient_employee1_idx` (`employee_Employee_ID`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`Employee_ID`),
  ADD KEY `FK_Nurse` (`Employee_ID`,`Employee_Type`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_ID`);

--
-- Indexes for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD PRIMARY KEY (`record_ID`,`patient_ID`),
  ADD KEY `FK_patient_ID` (`patient_ID`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`Employee_ID`),
  ADD KEY `FK_Recpetionist` (`Employee_ID`,`Employee_Type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_record`
--
ALTER TABLE `patient_record`
  MODIFY `record_ID` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `FK_Doctor` FOREIGN KEY (`Employee_ID`,`Employee_Type`) REFERENCES `employee` (`Employee_ID`, `Employee_Type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_has_patient`
--
ALTER TABLE `employee_has_patient`
  ADD CONSTRAINT `fk_employee_has_patient_employee1` FOREIGN KEY (`employee_Employee_ID`) REFERENCES `employee` (`Employee_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_has_patient_patient1` FOREIGN KEY (`patient_patient_ID`) REFERENCES `patient` (`patient_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nurse`
--
ALTER TABLE `nurse`
  ADD CONSTRAINT `FK_Nurse` FOREIGN KEY (`Employee_ID`,`Employee_Type`) REFERENCES `employee` (`Employee_ID`, `Employee_Type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD CONSTRAINT `FK_patient_ID` FOREIGN KEY (`patient_ID`) REFERENCES `patient` (`patient_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD CONSTRAINT `FK_Recpetionist` FOREIGN KEY (`Employee_ID`,`Employee_Type`) REFERENCES `employee` (`Employee_ID`, `Employee_Type`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
