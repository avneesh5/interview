-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 02:47 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uide`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `semester` varchar(200) NOT NULL,
  `DOB` date NOT NULL,
  `state` varchar(50) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `mobile`, `gender`, `image`, `password`, `course`, `semester`, `DOB`, `state`, `time`) VALUES
(3, 'amit kumar', 'avms4896@gmail.com', '9895325567', 'male', 'lhzmeikefnbospcScreenshot (1).png', '$2y$10$hufMdQEHB8jOWdjR3VxswO9HTLkfnlZH25Qw43crn6MSeQKkogC56', 'bcom', '3rd', '2019-11-01', 'U.P', '2019-11-18 03:00:55'),
(4, 'vaibhav chutiya', 'ssandeepk.jai431@gmail.com', '9895325567', 'male', 'behupaltrzcjnwmScreenshot (2).png', '$2y$10$WZSMQATAKr6Ew5s3SHtd8u8txz8OMHwBp5AmR.RFJXdietJPC2a0e', 'BBA', '4th', '2019-11-02', 'Bihar', '2019-11-18 03:01:35'),
(12, 'amit kumar', 'avms4896@gmail.com', '9895325567', 'male', 'zxqjimkhlsrbuwtback0.jpg', '$2y$10$9IaxEnGk4Ln2wlcLL8xjnuiggyIycvRkcxC6X7RVwK2rUHnZm7A8i', 'BBA', '4th', '2019-11-21', 'Bihar', '2019-11-20 07:08:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
