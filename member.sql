-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 11:45 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `member`
--

-- --------------------------------------------------------

--
-- Table structure for table `maids`
--

CREATE TABLE `maids` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `age` int(60) NOT NULL,
  `gender` varchar(60) NOT NULL,
  `salary` int(100) NOT NULL,
  `worktype` varchar(100) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maids`
--

INSERT INTO `maids` (`id`, `name`, `email`, `age`, `gender`, `salary`, `worktype`, `skills`, `experience`, `status`) VALUES
(17, 'Jeffrey Jeff', 'sdfgh@sfgf.com', 22, 'Female', 200, 'Permanent', 'sdfgh', 'Entry Level ( < 1 yr)', 'Active'),
(20, 'frank', 'fagjhd@jhhds.com', 66, 'Female', 333, 'Permanent', 'yyuhhh', 'More than 3 yrs', 'inactive'),
(24, 'Nanis', 'nanis@gmail.com', 22, 'Female', 1122, 'Contract', 'Kiki', 'Entry Level ( < 1 yr)', 'pending'),
(25, 'fererre', 'fagjhd@jhhds.com', 111, 'Female', 111111, 'Permanent', 'Cleaning', 'Entry Level ( < 1 yr)', 'Active'),
(27, 'Kkakakka', 'makakama@gmail.com', 28, 'Female', 320, 'Permanent', 'Hike and Cool', 'More than 3 yrs', 'Active'),
(28, 'GraceMburu', 'makakama@gmail.com', 28, 'Female', 320, 'Permanent', 'Cooking yes', 'Entry Level ( < 1 yr)', 'Active'),
(29, 'Elvis Okoh', 'okoh@asirigi.xyz', 22, 'Male', 200, 'Contract', 'Skills in Cooking Indomie', 'More than 3 yrs', 'Active'),
(30, 'Ffffffffff', 'fagjhd@jhhds.com', 222, 'Female', 222, 'Permanent', 'Skills in Cooking Indomie', 'Entry Level ( < 1 yr)', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `first_name`, `last_name`, `usertype`, `email`, `password`, `date_added`) VALUES
(2, 'Karanja', 'Patrick', 'admin', 'karanja@gmail.com', 'kara', '2018-04-16 11:45:32'),
(3, 'Faith', 'Kilonzi', 'admin', 'faithmueni6@gmail.com', '0d61130a6dd5eea85c2c5facfe1c15a7', '2018-04-16 17:39:19'),
(4, 'kaka', 'ngu', 'client', 'kaka@gmail.com', '5541c7b5a06c39b267a5efae6628e003', '2018-04-20 02:39:19'),
(5, 'Degwa', 'Kabiru', 'admin', 'degwa@gmail.com', '12345', '0000-00-00 00:00:00'),
(6, 'David Ebo', 'Yamoah', 'client', 'eboyamoah@gmail.com', '0d61130a6dd5eea85c2c5facfe1c15a7', '2018-04-21 16:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(60) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `salary` int(100) NOT NULL,
  `worktype` varchar(100) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `maids`
--
ALTER TABLE `maids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `maids`
--
ALTER TABLE `maids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
