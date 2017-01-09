-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2017 at 04:43 PM
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
  `co_pr_id` int(11) NOT NULL COMMENT 'شناسه پروسه',
  `co_ur_id` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `come` varchar(512) NOT NULL COMMENT 'کامنت',
  `co_data` varchar(10) NOT NULL COMMENT 'تاریخ کامنت',
  `co_time` varchar(10) NOT NULL COMMENT 'ساعت کامنت'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `co_f_pr`
--

INSERT INTO `co_f_pr` (`com_id`, `co_pr_id`, `co_ur_id`, `come`, `co_data`, `co_time`) VALUES
(7, 13, 14, 'سلام ، دیدم پیگیری میکنم', '۱۳۹۵/۱۰/۱۵', '۱۵:۴۴:۵۴'),
(8, 13, 14, 'بررسی شد', '۱۳۹۵/۱۰/۱۵', '۱۶:۴۵:۲۵'),
(9, 13, 14, 'دوباره بررسی گردید', '۱۳۹۵/۱۰/۱۵', '۱۶:۴۶:۳۰'),
(10, 13, 16, 'بررسی شد و خبرش دادم', '۱۳۹۵/۱۰/۱۵', '۱۷:۵۶:۰۱');

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `proc_id` int(11) NOT NULL,
  `subject` varchar(512) NOT NULL COMMENT 'عنوان',
  `pr_ur_id` varchar(512) NOT NULL COMMENT 'شناسه کاربر',
  `descr` text NOT NULL COMMENT 'توضیحات',
  `pr_data` varchar(10) NOT NULL COMMENT 'تاریخ ایجاد',
  `pr_time` varchar(10) NOT NULL COMMENT 'ساعت ایجاد'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`proc_id`, `subject`, `pr_ur_id`, `descr`, `pr_data`, `pr_time`) VALUES
(12, 'تست1', '14', 'س', '۱۳۹۵/۱۰/۱۳', '۱۵:۲۳:۵۶'),
(13, 'تست2', '14', '1', '۱۳۹۵/۱۰/۱۵', '۱۵:۲۴:۰۴');

-- --------------------------------------------------------

--
-- Table structure for table `refer`
--

CREATE TABLE `refer` (
  `refer_id` int(11) NOT NULL,
  `re_pr_id` int(11) NOT NULL COMMENT 'شناسه پروسه',
  `re_ur_id` int(11) NOT NULL COMMENT 'شناسه کاربر',
  `re_vi` int(11) NOT NULL COMMENT 'اقدام کاربر',
  `re_date` varchar(10) NOT NULL COMMENT 'تاریخ آخریم مشاهده',
  `re_time` varchar(10) NOT NULL COMMENT 'زمان مشاهده'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `refer`
--

INSERT INTO `refer` (`refer_id`, `re_pr_id`, `re_ur_id`, `re_vi`, `re_date`, `re_time`) VALUES
(15, 12, 14, 1, '۱۳۹۵/۱۰/۱۵', '۱۷:۰۵:۵۲'),
(16, 12, 15, 3, '۱۳۹۵/۱۰/۱۵', '۱۷:۰۸:۲۰'),
(17, 13, 14, 1, '۱۳۹۵/۱۰/۱۵', '۱۷:۰۵:۳۹'),
(18, 13, 16, 3, '۱۳۹۵/۱۰/۱۵', '۱۷:۵۶:۰۹');

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
  `user_data` varchar(10) NOT NULL,
  `user_time` varchar(10) NOT NULL,
  `user_pic` varchar(512) NOT NULL,
  `user_1` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_tittle`, `user_code`, `user_job`, `user_mobile`, `user_name`, `user_pass`, `user_family`, `user_g`, `user_data`, `user_time`, `user_pic`, `user_1`) VALUES
(14, 'user', '1111', 'مدیر بازرگانی', '09150', 'علی', '011c945f30ce2cbafc452f39840f025693339c42', 'گوهری', 1, '۱۳۹۵/۱۰/۱۵', '۱۲:۰۹:۴۸', '', ''),
(15, 'user', '5555', 'مدیر مالی', '09154', 'علیرضا', 'ab874467a7d1ff5fc71a4ade87dc0e098b458aae', 'صفائی', 1, '۱۳۹۵/۱۰/۱۵', '۱۲:۱۰:۰۳', '', ''),
(16, 'user', '6666', 'منشی', '09356', 'اکرم', '4c1b52409cf6be3896cf163fa17b32e4da293f2e', 'اکرمی', 1, '۱۳۹۵/۱۰/۱۵', '۱۲:۱۰:۱۴', '', ''),
(17, 'admin', '2222222', 'ادمین', '1111111', 'حسین', 'bf5fc3deae42dc9821b1dfc6907c12f985c8008b', 'حسینی', 1, '۱۳۹۵/۱۰/۲۰', '۱۹:۱۳:۰۵', '', '');

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
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `proc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `refer`
--
ALTER TABLE `refer`
  MODIFY `refer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
