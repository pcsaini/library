-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2017 at 03:17 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(100) NOT NULL,
  `book_name` varchar(64) NOT NULL,
  `isbn_no` varchar(10) NOT NULL,
  `author` varchar(32) NOT NULL,
  `edition` int(10) NOT NULL,
  `no_of_copies` int(10) DEFAULT '0',
  `book_category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `isbn_no`, `author`, `edition`, `no_of_copies`, `book_category_id`) VALUES
(4, 'JavaScript Introducation', '1234567', 'pcsaini', 1, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `book_category_id` int(100) NOT NULL,
  `book_category_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`book_category_id`, `book_category_name`) VALUES
(3, 'JS'),
(5, 'Ajax'),
(6, 'PHP'),
(7, 'Angular Js');

-- --------------------------------------------------------

--
-- Table structure for table `book_code`
--

CREATE TABLE `book_code` (
  `book_id` int(100) NOT NULL,
  `book_category_id` int(10) NOT NULL,
  `book_code` varchar(32) NOT NULL,
  `register_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_code`
--

INSERT INTO `book_code` (`book_id`, `book_category_id`, `book_code`, `register_status`) VALUES
(4, 5, 'IIITV1232wqeq', 0);

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `user_id` int(100) NOT NULL,
  `book_id` int(100) NOT NULL,
  `book_code` varchar(32) NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `return_date` int(32) NOT NULL,
  `issue_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`user_id`, `book_id`, `book_code`, `issue_date`, `return_date`, `issue_status`) VALUES
(1, 1, 'IIITV123A', '2016-11-13 18:22:48', 0, 0),
(3, 3, 'IIITV123p', '2016-11-13 18:55:32', 0, 0),
(2, 5, 'IIITV123PAA', '2016-11-13 18:55:35', 0, 0),
(3, 1, 'IIITV123B', '2016-11-13 18:55:50', 0, 1),
(2, 2, 'IIITV123PH', '2016-11-13 18:55:51', 0, 1),
(1, 1, 'IIITV1232', '2016-11-13 18:55:52', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register_book`
--

CREATE TABLE `register_book` (
  `user_id` int(100) NOT NULL,
  `book_id` int(100) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `register_status` int(10) DEFAULT NULL,
  `book_code` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_book`
--

INSERT INTO `register_book` (`user_id`, `book_id`, `register_date`, `register_status`, `book_code`) VALUES
(1, 1, '2016-11-13 18:15:29', 0, 'IIITV1232'),
(1, 1, '2016-11-13 18:15:35', 0, 'IIITV123A'),
(2, 5, '2016-11-13 18:54:39', 0, 'IIITV123PAA'),
(2, 2, '2016-11-13 18:54:44', 0, 'IIITV123PH'),
(3, 1, '2016-11-13 18:55:09', 0, 'IIITV123B'),
(3, 3, '2016-11-13 18:55:14', 0, 'IIITV123p'),
(3, 1, '2016-11-13 18:56:02', 1, 'IIITV123A'),
(1, 3, '2016-11-13 18:56:21', 1, 'IIITV123p'),
(2, 5, '2016-11-13 18:56:44', 1, 'IIITV123PAA');

-- --------------------------------------------------------

--
-- Table structure for table `return_book`
--

CREATE TABLE `return_book` (
  `user_id` int(100) NOT NULL,
  `book_id` int(100) NOT NULL,
  `book_code` varchar(32) NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `returned_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_book`
--

INSERT INTO `return_book` (`user_id`, `book_id`, `book_code`, `issue_date`, `returned_date`) VALUES
(1, 1, 'IIITV123A', '2016-11-13 18:35:35', '2016-11-13 18:35:35'),
(2, 5, 'IIITV123PAA', '2016-11-13 18:55:45', '2016-11-13 18:55:45'),
(3, 3, 'IIITV123p', '2016-11-13 18:55:46', '2016-11-13 18:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '1',
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` text NOT NULL,
  `contact_number` bigint(12) DEFAULT NULL,
  `profile_pic` varchar(32) NOT NULL DEFAULT 'no_img.png',
  `address` varchar(100) DEFAULT NULL,
  `batch` int(6) NOT NULL,
  `stream` varchar(32) NOT NULL,
  `registered_books` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_type`, `first_name`, `last_name`, `email`, `gender`, `contact_number`, `profile_pic`, `address`, `batch`, `stream`, `registered_books`) VALUES
(1, 'pcsaini', '37a7e2cf07ff08f43e5cd844e567a23f', 2, 'Prem Chand', 'Saini', 'premchandsaini779@gmail.com', 'Male', 9887554425, 'no_img.png', 'IIIT Vadodara', 0, '', NULL),
(2, '201452019', '8075820b23d068e27198fa51ad94a56c', 1, 'Prem Chand', 'Saini', 'premchandsaini81@gmail.com', 'Male', 9887554425, '7461483988445.jpg', 'IIIT Vadodara', 2014, 'Information Technology', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`book_category_id`);

--
-- Indexes for table `book_code`
--
ALTER TABLE `book_code`
  ADD PRIMARY KEY (`book_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `book_category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
