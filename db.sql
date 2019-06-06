-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2019 at 12:45 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saif`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(10) NOT NULL,
  `credit` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `department`, `credit`) VALUES
('APL', 'Advanced Programming Language', 'CSE', 3),
('ASM', 'Aseembly Programming Language', 'CSE', 3),
('CA', 'Computer Analysis', 'CSE', 3),
('DBMS', 'Database Management System', 'CSE', 3),
('DS', 'Data Structure', 'CSE', 3),
('IP', 'Industrial Management', 'CSE', 3),
('ML', 'Machine Learning', 'CSE', 3),
('SAD', 'System Analysis Design', 'CSE', 3),
('SOFT', 'Software Engineering', 'CSE', 3),
('SPL', 'Structure Programming Language', 'CSE', 3),
('WP', 'Web Programming Language', 'CSE', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`name`) VALUES
('CSE'),
('EEE');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `student_id` varchar(9) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `result` float(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`student_id`, `course_id`, `result`) VALUES
('011141149', 'APL', 2.25),
('011141149', 'CA', 4.00),
('011141149', 'IP', 3.30);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` varchar(9) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `department` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `password`, `department`, `type`) VALUES
('011141149', 'SAIF AHMED ANIK', '1234', 'CSE', 'student'),
('011142141', 'ZAHID HOSSAIN', '1234', 'CSE', 'student'),
('011142151', 'Saimoon Imran Shoccho', '1234', 'CSE', 'student'),
('011161190', 'Shafayat Mugdha', '1234', 'CSE', 'student'),
('MHR', 'Mahabubur Hossain Rana', '1234', 'CSE', 'faculty'),
('MOMN', 'Monirujjaman', '1234', 'CSE', 'faculty'),
('NM', 'Nagib Mishkat', '1234', 'CSE', 'faculty'),
('SS', 'Swakkhar Shatabda', '1234', 'CSE', 'faculty'),
('TAR', 'Tamjid Al Rahat', '1234', 'CSE', 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `courseid` varchar(10) NOT NULL,
  `name` varchar(3) NOT NULL,
  `facultyid` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`courseid`, `name`, `facultyid`) VALUES
('APL', 'A', 'NM'),
('APL', 'B', 'NM'),
('APL', 'C', 'TAR'),
('APL', 'D', 'TAR'),
('ASM', 'A', 'MOMN'),
('ASM', 'B', 'MOMN'),
('ASM', 'C', 'TAR'),
('ASM', 'D', 'TAR'),
('CA', 'A', 'NM'),
('CA', 'B', 'NM'),
('CA', 'C', 'SS'),
('CA', 'D', 'SS'),
('DBMS', 'A', 'TAR'),
('DBMS', 'B', 'TAR'),
('DBMS', 'C', 'MHR'),
('DBMS', 'D', 'MHR'),
('DS', 'A', 'NM'),
('DS', 'B', 'NM'),
('DS', 'C', 'MHR'),
('DS', 'D', 'MHR'),
('IP', 'A', 'MHR'),
('IP', 'B', 'MHR'),
('IP', 'C', 'MHR'),
('IP', 'D', 'MHR'),
('ML', 'A', 'SS'),
('ML', 'B', 'NM'),
('ML', 'C', 'SS'),
('SAD', 'A', 'MOMN'),
('SAD', 'B', 'MOMN'),
('SAD', 'C', 'NM'),
('SAD', 'D', 'NM'),
('SOFT', 'A', 'SS'),
('SOFT', 'B', 'SS'),
('SOFT', 'C', 'MOMN'),
('SOFT', 'D', 'MOMN'),
('WP', 'A', 'NM'),
('WP', 'B', 'NM'),
('WP', 'C', 'MHR'),
('WP', 'D', 'MHR');

-- --------------------------------------------------------

--
-- Table structure for table `std_course_sec`
--

CREATE TABLE `std_course_sec` (
  `student_id` varchar(9) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `section_name` varchar(3) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_course_sec`
--

INSERT INTO `std_course_sec` (`student_id`, `course_id`, `section_name`, `status`) VALUES
('011141149', 'DBMS', 'B', 'Registered'),
('011141149', 'ML', 'A', 'Registered'),
('011141149', 'SAD', 'B', 'Registered'),
('011142151', 'APL', 'B', 'Registered'),
('011142151', 'CA', 'C', 'Registered'),
('011142151', 'DBMS', 'B', 'Registered'),
('011142151', 'IP', 'B', 'Registered'),
('011142151', 'SOFT', 'A', 'Registered'),
('011142151', 'WP', 'B', 'Registered');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_history`
--

CREATE TABLE `teacher_history` (
  `facultyid` varchar(9) NOT NULL,
  `courseid` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_history`
--

INSERT INTO `teacher_history` (`facultyid`, `courseid`, `semester`) VALUES
('MHR', 'DBMS', 'spring15'),
('MHR', 'DBMS', 'summer14'),
('MHR', 'IP', 'winter15'),
('MHR', 'WP', 'winter12'),
('MHR', 'WP', 'winter13'),
('MOMN', 'CA', 'winter12'),
('MOMN', 'DS', 'winter12'),
('NM', 'CA', 'winter15'),
('NM', 'DS', 'winter13'),
('NM', 'IP', 'winter15'),
('NM', 'SAD', 'spring15'),
('NM', 'SAD', 'winter15'),
('SS', 'DBMS', 'summer15'),
('SS', 'DS', 'summer15'),
('SS', 'ML', 'spring14'),
('SS', 'ML', 'spring15'),
('SS', 'ML', 'winter14'),
('SS', 'ML', 'winter16'),
('SS', 'WP', 'winter16'),
('TAR', 'IP', 'winter15'),
('TAR', 'SOFT', 'spring15'),
('TAR', 'SOFT', 'summer15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`,`department`),
  ADD KEY `id` (`id`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`name`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`student_id`,`course_id`),
  ADD KEY `student_id` (`student_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`,`department`),
  ADD KEY `id` (`id`,`department`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`courseid`,`name`,`facultyid`),
  ADD KEY `courseid` (`courseid`,`facultyid`),
  ADD KEY `facultyid` (`facultyid`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `std_course_sec`
--
ALTER TABLE `std_course_sec`
  ADD PRIMARY KEY (`student_id`,`course_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `section_name` (`section_name`);

--
-- Indexes for table `teacher_history`
--
ALTER TABLE `teacher_history`
  ADD PRIMARY KEY (`facultyid`,`courseid`,`semester`),
  ADD KEY `facultyid` (`facultyid`,`courseid`),
  ADD KEY `courseid` (`courseid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`department`) REFERENCES `department` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_2` FOREIGN KEY (`department`) REFERENCES `department` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`facultyid`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `std_course_sec`
--
ALTER TABLE `std_course_sec`
  ADD CONSTRAINT `std_course_sec_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `std_course_sec_ibfk_2` FOREIGN KEY (`section_name`) REFERENCES `section` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `std_course_sec_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_history`
--
ALTER TABLE `teacher_history`
  ADD CONSTRAINT `teacher_history_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_history_ibfk_2` FOREIGN KEY (`facultyid`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
