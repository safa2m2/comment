-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2017 at 12:41 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comment`
--

-- --------------------------------------------------------

--
-- Table structure for table `co_f_pr`
--

CREATE TABLE `co_f_pr` (
  `com_id` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `ur_id` int(11) NOT NULL,
  `come` varchar(512) NOT NULL,
  `co_data` date NOT NULL,
  `co_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `proc_id` int(11) NOT NULL,
  `subject` varchar(512) NOT NULL,
  `refer` varchar(512) NOT NULL,
  `descr` text NOT NULL,
  `or_data` date NOT NULL,
  `pr_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_tittle` varchar(10) NOT NULL,
  `user_code` varchar(10) NOT NULL,
  `user_job` varchar(512) NOT NULL,
  `user_mobile` varchar(11) NOT NULL,
  `user_name` varchar(512) NOT NULL,
  `user_pass` varchar(512) NOT NULL,
  `user_family` varchar(512) NOT NULL,
  `user_g` int(11) NOT NULL,
  `user_data` date NOT NULL,
  `user_time` time NOT NULL,
  `user_pic` varchar(512) NOT NULL,
  `user_1` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_tittle`, `user_code`, `user_job`, `user_mobile`, `user_name`, `user_pass`, `user_family`, `user_g`, `user_data`, `user_time`, `user_pic`, `user_1`) VALUES
(1, '', '0919900143', 'مدیر عامل', '09151112233', 'علیرضا', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'صفائی پور', 0, '0000-00-00', '00:00:00', '', ''),
(2, '', '9991', 'مدیر مالی', '9152221133', 'علی', 'ed47eee2e28adfb650351a89bd318ad2be3cdef6', 'گوهری', 0, '0000-00-00', '00:00:00', '', ''),
(3, '', '555', 'کمک', '5555', 'علی', 'cfa1150f1787186742a9a884b73a43d8cf219f9b', 'صفائی', 1, '1395-10-11', '838:59:59', '', ''),
(4, 'user', '668', 'کمک', '5858', 'علی', '34c66477519b949b09b45e131347c17b5822a30a', 'صفائی', 1, '1395-10-11', '838:59:59', '', ''),
(5, 'user', '555858', 'کمک', '58585', 'علی', '3fa0a5788fb5404f0f26e49783756710ebe9ae3c', 'صفائی', 1, '1395-10-11', '00:00:00', '', ''),
(6, 'user', '999696', 'کمک', '6969696', 'علی', 'd82b9fa4eb5cc5f5671b179d4dc182343da194fd', 'صفائی', 1, '1395-10-11', '04:50:57', '', ''),
(7, 'user', '99696', 'کمک', '69696', 'علی', '6f8916d4d90f714180b6bfd5765072bee4979be9', 'صفائی', 1, '1395-10-11', '16:55:44', '', ''),
(8, 'user', '222', 'آبدارچی', '915515', 'اکرم', '1c6637a8f2e1f75e06ff9984894d6bd16a3a36a9', 'اکرمی', 2, '1395-10-11', '17:01:09', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `co_f_pr`
--
ALTER TABLE `co_f_pr`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`proc_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `co_f_pr`
--
ALTER TABLE `co_f_pr`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `proc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
