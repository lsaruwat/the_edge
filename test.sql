-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2015 at 03:59 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Project 7`
--

-- --------------------------------------------------------

--
-- Table structure for table `300_level`
--

CREATE TABLE `300_level` (
  `mentor_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `semester_year` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `300_level`
--

INSERT INTO `300_level` (`mentor_id`, `school_id`, `student_id`, `semester_year`) VALUES
(1, 1, 777000001, 'Fall 2007'),
(2, 2, 777000002, 'Fall 2007');

-- --------------------------------------------------------

--
-- Table structure for table `400_level`
--

CREATE TABLE `400_level` (
  `mentor_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `semester_year` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `400_level`
--

INSERT INTO `400_level` (`mentor_id`, `school_id`, `student_id`, `semester_year`) VALUES
(3, 3, 777000001, 'Fall 2008'),
(4, 4, 777000002, 'Fall 2008');

-- --------------------------------------------------------

--
-- Table structure for table `completion`
--

CREATE TABLE `completion` (
  `id` int(11) NOT NULL DEFAULT '0',
  `student_id` int(11) DEFAULT NULL,
  `pass_fail` tinyint(1) DEFAULT NULL,
  `initial_emp` int(11) DEFAULT NULL,
  `completed_cte` varchar(20) DEFAULT NULL,
  `license` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `completion`
--

INSERT INTO `completion` (`id`, `student_id`, `pass_fail`, `initial_emp`, `completed_cte`, `license`) VALUES
(1, 777000001, 1, 3, 'Spring 2009', '2009-08-21'),
(2, 777000002, 1, 4, 'Spring 2009', '2009-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `GPA`
--

CREATE TABLE `GPA` (
  `semester_year` varchar(20) DEFAULT NULL,
  `id` int(11) NOT NULL DEFAULT '0',
  `student_id` int(11) DEFAULT NULL,
  `gpa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GPA`
--

INSERT INTO `GPA` (`semester_year`, `id`, `student_id`, `gpa`) VALUES
('Spring 2009', 1, 777000001, 4),
('Spring 2009', 2, 777000002, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `name` varchar(30) DEFAULT NULL,
  `id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`name`, `id`) VALUES
('Men Tora', 1),
('Men Torb', 2),
('Men Tora400', 3),
('Men Torb400', 4),
('Men Torast', 5),
('Men Torbst', 6);

-- --------------------------------------------------------

--
-- Table structure for table `races`
--

CREATE TABLE `races` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(30) DEFAULT NULL,
  `ethnicity` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `races`
--

INSERT INTO `races` (`id`, `name`, `ethnicity`) VALUES
(1, 'White', 'Not-Hispanic'),
(2, 'Indian', 'Not-Hispanic');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `name` varchar(20) DEFAULT NULL,
  `id` int(11) NOT NULL DEFAULT '0',
  `location` varchar(30) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`name`, `id`, `location`, `district`) VALUES
('Dos Rios Elementary', 1, 'Grand Junction', '51'),
('East M.S.', 2, 'Grand Junction', '51'),
('Thunder Mountain', 3, 'Grand Junction', '51'),
('GJHS', 4, 'Grand Junction', '51');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL DEFAULT '0',
  `last` varchar(20) DEFAULT NULL,
  `first` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `race_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `addr` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state_zip` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `last`, `first`, `age`, `gender`, `race_id`, `email`, `addr`, `city`, `state_zip`, `phone`) VALUES
(777000001, 'Lasta', 'Rian', 24, 'F', 1, 'lasta@mesastate.edu', '2846 C Rd.', 'Grand Junction', 'CO 81501', '970-970-9701'),
(777000002, 'Lastb', 'Johnathan', 32, 'M', 1, 'lastb@mesastate.edu', '1420 North St.', 'Grand Junction', 'CO 81501', '970-970-9702');

-- --------------------------------------------------------

--
-- Table structure for table `student_teaching`
--

CREATE TABLE `student_teaching` (
  `id` int(11) NOT NULL DEFAULT '0',
  `student_id` int(11) DEFAULT NULL,
  `semester_year` varchar(20) DEFAULT NULL,
  `mentor_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `supervisor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_teaching`
--

INSERT INTO `student_teaching` (`id`, `student_id`, `semester_year`, `mentor_id`, `school_id`, `supervisor_id`) VALUES
(1, 777000001, 'Spring 2009', 5, 3, 1),
(2, 777000002, 'Spring 2009', 6, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `name`) VALUES
(1, 'Super Visora'),
(2, 'Super Visorb');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL DEFAULT '0',
  `praxis` int(11) DEFAULT NULL,
  `place` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `300_level`
--
ALTER TABLE `300_level`
  ADD KEY `mentor_id` (`mentor_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `400_level`
--
ALTER TABLE `400_level`
  ADD KEY `mentor_id` (`mentor_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `completion`
--
ALTER TABLE `completion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `initial_emp` (`initial_emp`);

--
-- Indexes for table `GPA`
--
ALTER TABLE `GPA`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `race_id` (`race_id`);

--
-- Indexes for table `student_teaching`
--
ALTER TABLE `student_teaching`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentor_id` (`mentor_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `300_level`
--
ALTER TABLE `300_level`
  ADD CONSTRAINT `300_level_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`id`),
  ADD CONSTRAINT `300_level_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`),
  ADD CONSTRAINT `300_level_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `400_level`
--
ALTER TABLE `400_level`
  ADD CONSTRAINT `400_level_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`id`),
  ADD CONSTRAINT `400_level_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`),
  ADD CONSTRAINT `400_level_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `completion`
--
ALTER TABLE `completion`
  ADD CONSTRAINT `completion_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `completion_ibfk_2` FOREIGN KEY (`initial_emp`) REFERENCES `school` (`id`);

--
-- Constraints for table `GPA`
--
ALTER TABLE `GPA`
  ADD CONSTRAINT `gpa_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`);

--
-- Constraints for table `student_teaching`
--
ALTER TABLE `student_teaching`
  ADD CONSTRAINT `student_teaching_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`id`),
  ADD CONSTRAINT `student_teaching_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`),
  ADD CONSTRAINT `student_teaching_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `student_teaching_ibfk_4` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisor` (`id`);