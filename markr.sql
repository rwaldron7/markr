-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 02:47 AM
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
-- Database: `markr`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `year_level` int(9) NOT NULL,
  `class_code` varchar(50) NOT NULL,
  `no_of_questions` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `user_id`, `subject`, `year_level`, `class_code`, `no_of_questions`) VALUES
(6, 30, 'Maths', 8, '8C', 10),
(7, 30, 'Science', 7, '7B', 10),
(8, 30, 'Science', 7, '7B', 10),
(9, 30, 'Science', 7, '7E', 15),
(13, 30, 'Science', 7, '8B', 10),
(14, 30, 'Maths', 9, '9D', 5),
(15, 30, 'Maths', 9, '9D', 5),
(19, 29, 'Science', 9, '9C', 8),
(20, 29, 'English', 10, '10C', 12),
(21, 29, 'Maths', 10, '10C', 20),
(22, 29, 'PE', 12, '12A', 30);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `student_id` int(9) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `exam_id` int(9) DEFAULT NULL,
  `q_1` int(3) DEFAULT NULL,
  `q_2` int(3) DEFAULT NULL,
  `q_3` int(3) DEFAULT NULL,
  `q_4` int(3) DEFAULT NULL,
  `q_5` int(3) DEFAULT NULL,
  `q_6` int(3) DEFAULT NULL,
  `q_7` int(3) DEFAULT NULL,
  `q_8` int(3) DEFAULT NULL,
  `q_9` int(3) DEFAULT NULL,
  `q_10` int(3) DEFAULT NULL,
  `q_11` int(3) DEFAULT NULL,
  `q_12` int(3) DEFAULT NULL,
  `q_13` int(3) DEFAULT NULL,
  `q_14` int(3) DEFAULT NULL,
  `q_15` int(3) DEFAULT NULL,
  `q_16` int(3) DEFAULT NULL,
  `q_17` int(3) DEFAULT NULL,
  `q_18` int(3) DEFAULT NULL,
  `q_19` int(3) DEFAULT NULL,
  `q_20` int(3) DEFAULT NULL,
  `q_21` int(3) DEFAULT NULL,
  `q_22` int(3) DEFAULT NULL,
  `q_23` int(3) DEFAULT NULL,
  `q_24` int(3) DEFAULT NULL,
  `q_25` int(3) DEFAULT NULL,
  `q_26` int(3) DEFAULT NULL,
  `q_27` int(3) DEFAULT NULL,
  `q_28` int(3) DEFAULT NULL,
  `q_29` int(3) DEFAULT NULL,
  `q_30` int(3) DEFAULT NULL,
  `q_31` int(3) DEFAULT NULL,
  `q_32` int(3) DEFAULT NULL,
  `q_33` int(3) DEFAULT NULL,
  `q_34` int(3) DEFAULT NULL,
  `q_35` int(3) DEFAULT NULL,
  `q_36` int(3) DEFAULT NULL,
  `q_37` int(3) DEFAULT NULL,
  `q_38` int(3) DEFAULT NULL,
  `q_39` int(3) DEFAULT NULL,
  `q_40` int(3) DEFAULT NULL,
  `q_41` int(3) DEFAULT NULL,
  `q_42` int(3) DEFAULT NULL,
  `q_43` int(3) DEFAULT NULL,
  `q_44` int(3) DEFAULT NULL,
  `q_45` int(3) DEFAULT NULL,
  `q_46` int(3) DEFAULT NULL,
  `q_47` int(3) DEFAULT NULL,
  `q_48` int(3) DEFAULT NULL,
  `q_49` int(3) DEFAULT NULL,
  `q_50` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`student_id`, `first_name`, `last_name`, `exam_id`, `q_1`, `q_2`, `q_3`, `q_4`, `q_5`, `q_6`, `q_7`, `q_8`, `q_9`, `q_10`, `q_11`, `q_12`, `q_13`, `q_14`, `q_15`, `q_16`, `q_17`, `q_18`, `q_19`, `q_20`, `q_21`, `q_22`, `q_23`, `q_24`, `q_25`, `q_26`, `q_27`, `q_28`, `q_29`, `q_30`, `q_31`, `q_32`, `q_33`, `q_34`, `q_35`, `q_36`, `q_37`, `q_38`, `q_39`, `q_40`, `q_41`, `q_42`, `q_43`, `q_44`, `q_45`, `q_46`, `q_47`, `q_48`, `q_49`, `q_50`) VALUES
(14, 'Tim', 'Jones', 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 'Rick', 'Waldron', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 'Loretta', 'Guppy', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Rick', 'Waldron', 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Loretta', 'Guppy', 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Rick', 'Waldron', 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Loretta', 'Guppy', 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Rick', 'Waldron', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Loretta', 'Guppy', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Rick', 'Waldron', 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Loretta', 'Guppy', 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Rick', 'Waldron', 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Rick', 'Jones', 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password_hash` varchar(72) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password_hash`, `email`) VALUES
(29, 'rwaldron', '$2y$10$x2UBkxsFR8zJUvOczBloUuqczPTSmM.DeKduWq1B5KpldOakM2wFy', NULL),
(30, 'lguppy', '$2y$10$j9rnQI4iWRizXXkJTmA5YeyDu7kDR99PRVEbugMSTFJgwDZ5l.KUO', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `student_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
