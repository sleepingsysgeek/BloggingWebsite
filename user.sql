-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 23, 2018 at 12:47 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `firstname` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `password` varchar(500) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `question` varchar(100) DEFAULT NULL,
  `answer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `email`, `contact`, `password`, `lastname`, `question`, `answer`) VALUES
('Chintu', 'abc@abc.com', '9464568951', 'c296539f3286a899d8b3f6632fd62274', '', NULL, NULL),
('Gautam', 'gautty95p@gmail.com', '9693271971', '5d41402abc4b2a76b9719d911017c592', 'Gupta', NULL, NULL),
('Shravan', 'kshravan002@gmail.com', '7033407781', 'ce4d22c014237b28634dac2cbbbc293f', 'Kumar', NULL, NULL),
('Ashutosh', 'kumarashutosh84028@gmail.com', '9570684028', 'fa27328342675695152c15dedb8f62b8', 'kumar', NULL, NULL),
('Nitin', 'mishranitin047@gmail.com', '7901388009', '203ad5ffa1d7c650ad681fdff3965cd2', 'Mishra', 'Who was your first crush', 'sonam'),
('Poonam', 'poonam.em2895@gmail.com', '9501354582', '5d41402abc4b2a76b9719d911017c592', 'Verma', NULL, NULL),
('Praveen', 'praveenmishraemail@gmail.com', '7901388009', '7b156bf942f20c70e77abb3f054c9340', 'Nitin', NULL, NULL),
('twe', 'trishajhg@gmail.com', '5545254541', '385d04e7683a033fcc6c6654529eb7e9', 'rew', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
