-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 09:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_mgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_records`
--

CREATE TABLE `attendance_records` (
  `attendance_records_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_ID` varchar(15) NOT NULL,
  `attendance_status` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_records`
--

INSERT INTO `attendance_records` (`attendance_records_id`, `student_name`, `student_ID`, `attendance_status`, `date`) VALUES
(262, 'Tina Hamilton', '00022025', 'Present', '2024-04-12'),
(263, 'Adwo Sarpon', '00032025', 'Present', '2024-04-12'),
(264, 'Pascal tobi', '00042025', 'Present', '2024-04-12'),
(265, 'Betty Azornu', '00052025', 'Present', '2024-04-12'),
(266, 'Thomas Aqua', '00092025', 'Present', '2024-04-12'),
(267, 'Selasie Agoro', '90008000', 'Present', '2024-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`pid`, `rid`, `fname`, `lname`, `gender`, `dob`, `tel`, `email`, `passwd`) VALUES
(30, 1, 'Lecturer', 'Name', 'male', '2001-05-21', '0558032476', 'admin.lecturer@gmail.com', '$2y$10$FocsnXHg.tnu2Zt.njKkRe9N.fQ.8AupzhRKhPRcrAIVFXoLKZyCW'),
(31, 2, 'FI', 'Name', 'male', '2003-03-05', '0240012345', 'admin.fi@gmail.com', '$2y$10$c4XsP4XEvgQkt40H7C92Guh6CSQbzpKgWjL5y3hWzyw2T9H/jM59.'),
(32, 3, 'Tina', 'Hamilton', 'female', '2002-09-13', '1234567890', 'th@gmail.com', '$2y$10$mybKuPbPd7oJ9i0bngZk9.l.73eOkSSZS8Niv4sGKMiwwMcYrU.Fu'),
(33, 3, 'Betty', 'Azornu', 'female', '2024-04-01', '0235789012', 'b.a@gmail.com', '$2y$10$Dmy2z4pJNTNKZs6OJojijefC10eChIiXxZEvJM3YDa/5FOpmTotLS'),
(34, 3, 'Adwo', 'Sarpon', 'female', '2024-04-01', '1234509876', 'a.s@gmail.com', '$2y$10$bacun4k9gFNrL3ukaMqx8eqW867k63tXaai.HWgy201Oov1H555rW'),
(35, 3, 'Thomas', 'Aqua', 'male', '2024-04-02', '0987612345', 't.a@gmail.com', '$2y$10$SzfpjOrAzkZMZIhE3I9LMuM3bzjF2te64QAnmruivaeOn16tQdSXG'),
(58, 3, 'Selasie', 'Agoro', 'male', '2024-04-03', '1230987123', 'sag@gmail.com', '$2y$10$APiZgUZLGjm72klPGBRDN.C5noAdYaSoXAwNX7//Lrq2bwTNAmEMW'),
(63, 2, 'Gasper', 'Philips', 'male', '2024-04-02', '0240245555', 'gas.p@gmail.com', '$2y$10$SVT6sCjv3lx5PIsQnCCYnu3AfSRr/g7vQNJ9UKSjUYbqRtQ0wExtm'),
(64, 3, 'Pascal', 'tobi', 'male', '2024-04-03', '8888800000', 'pti.@gmail.com', '$2y$10$YHK88MOWb5Y6MAx42NgKtu1vimKq4sSEMXCzQzw.5mbcIecoBSOMi'),
(74, 3, 'James', 'James', 'male', '2024-04-02', '3010204050', 'jj@gmail.com', '$2y$10$cMEI1wl9VlVNrVcLwlMLrehgJ0591dt.cp6pgLoR9LVycZaTpQEIW');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `rid` int(11) NOT NULL,
  `rname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`rid`, `rname`) VALUES
(1, 'Lecturer'),
(2, 'FI'),
(3, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `attendance_records`
--
ALTER TABLE `attendance_records`
  ADD PRIMARY KEY (`attendance_records_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `UNIQUE(tel)` (`tel`) USING BTREE,
  ADD UNIQUE KEY `UNIQUE(email)` (`email`) USING BTREE,
  ADD KEY `FOREIGN(rid)` (`rid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `attendance_records`
--
ALTER TABLE `attendance_records`
  MODIFY `attendance_records_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `FOREIGN(rid)` FOREIGN KEY (`rid`) REFERENCES `role` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
