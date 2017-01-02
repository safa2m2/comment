-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2017 at 07:01 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

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
  `co_pr_id` int(11) NOT NULL COMMENT 'شناسه پروسه',
  `co_ur_id` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `come` varchar(512) NOT NULL COMMENT 'کامنت',
  `co_data` date NOT NULL COMMENT 'تاریخ کامنت',
  `co_time` time NOT NULL COMMENT 'ساعت کامنت'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `proc_id` int(11) NOT NULL,
  `subject` varchar(512) NOT NULL COMMENT 'عنوان',
  `pr_ur_id` varchar(512) NOT NULL COMMENT 'شناسه کاربر',
  `descr` text NOT NULL COMMENT 'توضیحات',
  `pr_data` date NOT NULL COMMENT 'تاریخ ایجاد',
  `pr_time` time NOT NULL COMMENT 'ساعت ایجاد'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`proc_id`, `subject`, `pr_ur_id`, `descr`, `pr_data`, `pr_time`) VALUES
(1, 'd', '13', 's', '1395-10-13', '19:41:11'),
(2, 's', '11', 's', '1395-10-13', '20:08:00'),
(3, 'رستور نمدن اطلاعات', '11', 'd', '1395-10-13', '20:34:06'),
(4, 'رستور نمدن اطلاعات', '11', 'd', '1395-10-13', '20:36:45'),
(5, 'رستور نمدن اطلاعات', '11', 'd', '1395-10-13', '20:37:18'),
(6, 'رستور نمدن اطلاعات', '11', 'd', '1395-10-13', '20:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `refer`
--

CREATE TABLE `refer` (
  `refer_id` int(11) NOT NULL,
  `re_pr_id` int(11) NOT NULL COMMENT 'شناسه پروسه',
  `re_ur_id` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `re_vi` int(11) NOT NULL COMMENT 'اقدام کاربر',
  `re_date` date NOT NULL COMMENT 'تاریخ آخریم مشاهده',
  `re_time` time NOT NULL COMMENT 'زمان مشاهده'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `refer`
--

INSERT INTO `refer` (`refer_id`, `re_pr_id`, `re_ur_id`, `re_vi`, `re_date`, `re_time`) VALUES
(1, 3, 8, 1, '0000-00-00', '00:00:00'),
(2, 4, 8, 1, '0000-00-00', '00:00:00'),
(3, 5, 8, 1, '0000-00-00', '00:00:00'),
(4, 6, 1, 1, '0000-00-00', '00:00:00'),
(5, 6, 4, 1, '0000-00-00', '00:00:00'),
(6, 6, 8, 1, '0000-00-00', '00:00:00');

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
(1, '', '0919900143', 'مدیر عامل', '09151112233', 'علیرضا', '6c1621467a24674edd08e0c9ebee3ae5478f4011', 'صفائی پور', 0, '0000-00-00', '00:00:00', '', ''),
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
-- Indexes for table `refer`
--
ALTER TABLE `refer`
  ADD PRIMARY KEY (`refer_id`);

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
  MODIFY `proc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `refer`
--
ALTER TABLE `refer`
  MODIFY `refer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
