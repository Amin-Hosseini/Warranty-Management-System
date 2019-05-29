-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2017 at 01:14 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ae_rifle`
--

-- --------------------------------------------------------

--
-- Table structure for table `gun_profile`
--

CREATE TABLE `gun_profile` (
  `gun_id` int(11) NOT NULL,
  `gun_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gun_caliber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gun_mc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gun_power` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gun_wprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gun_profile`
--

INSERT INTO `gun_profile` (`gun_id`, `gun_name`, `gun_caliber`, `gun_mc`, `gun_power`, `gun_wprice`) VALUES
(1, 'Daystate Renegade', '5.5', 'انگلستان', '44', 1000),
(2, 'Hatsan GALATIAN III', '5.5', 'سوئد', '41', 1000000),
(3, 'Hatsan BULLBOSS W', '5.5', 'ترکیه', '40', 600000),
(4, 'Kral Puncher Mega W', '5.5', 'ترکیه', '45', 600000),
(5, 'Kral Puncher Maxi W', '5.5', 'ترکیه', '45', 800000),
(6, 'Hatsan BT65 SB', '5.5', 'ترکیه', '40', 500000),
(7, 'Steyr Hunting 5 Automatic', '5.5', 'اتریش', '40', 1000000),
(8, 'FX Royale 400 W', '5.5', 'سوئد', '41', 700000);

-- --------------------------------------------------------

--
-- Table structure for table `pay_info`
--

CREATE TABLE `pay_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `amount` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `refid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `salerefid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pay_info`
--

INSERT INTO `pay_info` (`id`, `user_id`, `pay_id`, `amount`, `refid`, `salerefid`, `result`) VALUES
(1, 3, 159159, '1000', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reseller_profile`
--

CREATE TABLE `reseller_profile` (
  `rs_id` int(11) NOT NULL,
  `rs_lname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rs_fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rs_mobile` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `rs_shop` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `rs_phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `rs_state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rs_city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rs_add` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `rs_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rs_pass` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reseller_profile`
--

INSERT INTO `reseller_profile` (`rs_id`, `rs_lname`, `rs_fname`, `rs_mobile`, `rs_shop`, `rs_phone`, `rs_state`, `rs_city`, `rs_add`, `rs_email`, `rs_pass`) VALUES
(1, 'طاهری', 'محسن', '09121231234', 'فروشگاه اسلحه طاهری', '02166982510', 'تهران', 'تهران', 'میدان فاطمی نرسیده به خ کوثر پلاک 112', '', ''),
(2, 'نادری', 'رضا', '09157413232', 'فروشگاه نادری', '05185274150', 'خراسان رضوی', 'مشهد', 'خیابان تست کوچه تست پلاک تست', '', ''),
(3, 'تست', 'تست', '09123456789', 'تست', '021111111', 'تست', 'تست', 'تست', '1', '356a192b7913b04c54574d18c28d46e6395428ab');

-- --------------------------------------------------------

--
-- Table structure for table `warranty_gun`
--

CREATE TABLE `warranty_gun` (
  `war_id` int(11) NOT NULL,
  `war_cardnum` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `war_sdate` date NOT NULL,
  `war_rs_id` int(11) NOT NULL,
  `war_gun_id` int(11) NOT NULL,
  `war_gun_sn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gun_wprice` int(11) NOT NULL,
  `us_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `us_bdate` date NOT NULL,
  `us_mcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `us_city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `us_mobile` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `warranty_gun`
--

INSERT INTO `warranty_gun` (`war_id`, `war_cardnum`, `war_sdate`, `war_rs_id`, `war_gun_id`, `war_gun_sn`, `gun_wprice`, `us_name`, `us_bdate`, `us_mcode`, `us_city`, `us_mobile`) VALUES
(1, '123456', '2017-03-31', 3, 1, '1020315', 1000, 'سید امین حسینی', '1985-09-15', '1063911181', 'نیشابور', '09153528270'),
(2, '13412213213', '2017-03-31', 3, 7, '087847047', 1000000, 'سید امین حسینی', '2015-03-29', '1063911181', 'نیشابور', '09153528270'),
(3, '159159', '2017-04-01', 3, 1, '159159', 1000, '11111', '1985-09-15', '1063911181', 'نیشابور', '09182583636');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gun_profile`
--
ALTER TABLE `gun_profile`
  ADD PRIMARY KEY (`gun_id`);

--
-- Indexes for table `pay_info`
--
ALTER TABLE `pay_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reseller_profile`
--
ALTER TABLE `reseller_profile`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `warranty_gun`
--
ALTER TABLE `warranty_gun`
  ADD PRIMARY KEY (`war_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gun_profile`
--
ALTER TABLE `gun_profile`
  MODIFY `gun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pay_info`
--
ALTER TABLE `pay_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reseller_profile`
--
ALTER TABLE `reseller_profile`
  MODIFY `rs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `warranty_gun`
--
ALTER TABLE `warranty_gun`
  MODIFY `war_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
