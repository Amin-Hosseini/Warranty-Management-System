-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2019 at 04:06 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rifle_gr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='By : Arman Hosseini';

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'Admin', '', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `category_profile`
--

CREATE TABLE `category_profile` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='By : Arman Hosseini';

--
-- Dumping data for table `category_profile`
--

INSERT INTO `category_profile` (`cat_id`, `cat_name`) VALUES
(1, 'سلاح'),
(2, 'دوربین'),
(3, 'چادر مسافرتی'),
(5, 'اسلحه بادی'),
(6, 'فشنگ');

-- --------------------------------------------------------

--
-- Table structure for table `gun_profile`
--

CREATE TABLE `gun_profile` (
  `gun_id` int(11) NOT NULL,
  `gun_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `attr` text COLLATE utf8_unicode_ci NOT NULL,
  `gun_wprice` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gun_profile`
--

INSERT INTO `gun_profile` (`gun_id`, `gun_name`, `attr`, `gun_wprice`, `cat_id`) VALUES
(1, 'Daystate Renegade1', '99', 96778, 5),
(4, 'Kral Puncher Mega W', '45', 600000, 5),
(6, 'Hatsan BT65 SB', '40', 500000, 5),
(7, 'Steyr Hunting 5 Automatic', '40', 1000000, 5),
(8, 'FX Royale 400 W', '41', 700000, 5),
(9, 'کلاش افغانی1', '100', 1000, 1),
(10, 'کلاشینکف', '9', 1000, 1),
(11, 'jsj', 'rh', 54646, 3),
(12, '1jsj', '5757', 5858, 3),
(13, 'test', '454', 64646, 6),
(14, 'دوربین شکاری دید در شب', ' کشور سازنده : ایران\r\nقدرت دید : 4000\r\nنوع : شکاری\r\n                                                    ', 1000, 2),
(18, 'فشنگ خوب', 'قشنگخوب', 1000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pay_info`
--

CREATE TABLE `pay_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `amount` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `refid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `salerefid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `result` int(11) NOT NULL,
  `date` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pay_info`
--

INSERT INTO `pay_info` (`id`, `user_id`, `pay_id`, `order_id`, `amount`, `refid`, `salerefid`, `result`, `date`) VALUES
(13, 4, 700721, 131511016583, '1000', '1FF15EDAEF428CDD', '129663012548', 1, 1511016607),
(14, 4, 484292, 141511120263, '96778', '', '', 0, 0),
(15, 3, 752435, 151511188196, '1000', '790DA01BEB8AC8EE', '129724112567', 1, 1511188237),
(16, 5, 980761, 161511370384, '1000', '4CF03E6D8849E5F1', '129799479596', 1, 1511370402),
(17, 4, 194916, 171520810333, '54646', '', '', 0, 0),
(18, 4, 233815, 181520811540, '1000', '', '', 0, 0);

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
(1, 'طاهری', 'محسن', '09121231234', 'فروشگاه اسلحه طاهری', '02166982510', 'تهران', 'تهران', 'میدان فاطمی نرسیده به خ کوثر پلاک 112', 'mohsentaheri@yahoo.com', '381979d66248bb8e0d8581de72eb77eef78faaa1'),
(4, 'حسینی', 'آرمان', '09159126068', 'لرد سیستم', '05143453454', 'خراسان رضوی', 'نیشابور', 'بلوار پژوهش ، مسکن 155 واحدی ، مروافن بلوک آ12 شمال طبقه 4', 'persian@kimo.com', '356a192b7913b04c54574d18c28d46e6395428ab'),
(5, 'حسینی', 'امین', '09151111111', 'فروشگاه لرد سیستم', '05143355012', 'خراسان رضوی', 'نیشابور', '17 شهریور - بین 4 و 6', 'amir@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');

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
  `us_mobile` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `warranty_gun`
--

INSERT INTO `warranty_gun` (`war_id`, `war_cardnum`, `war_sdate`, `war_rs_id`, `war_gun_id`, `war_gun_sn`, `gun_wprice`, `us_name`, `us_bdate`, `us_mcode`, `us_city`, `us_mobile`, `approved`) VALUES
(17, '700721', '2017-11-18', 4, 13, '445566', 64646, 'محمد احمدی', '0000-00-00', '4455', 'خراسان رضوی - نیشابور - شهر آر', '221133', 1),
(18, '484292', '2017-11-19', 4, 1, '55555554444', 96778, 'آرمان حسینی', '0000-00-00', '1033453536', 'خراسان رضوی - نیشابور- مسکن مه', '09381839968', 0),
(19, '752435', '2017-11-20', 3, 9, '12132123', 1000, 'مشتری', '0000-00-00', '0184141777', 'نیشابور', '09187174747', 1),
(20, '980018', '2017-11-21', 3, 0, 'r3r3', 0, 'r3r', '0000-00-00', '3r3r', 'r3r3r', '3r3', 0),
(21, '980761', '2017-11-22', 5, 18, '112233', 1000, 'مشتری تست', '0000-00-00', '1044353566', 'نیشابور', '09156748293', 1),
(22, '523782', '2018-03-11', 4, 11, '454456666001', 54646, 'Arsalan Hosseini', '0000-00-00', '1058677895', 'ney', '09158576859', 0),
(23, '194916', '2018-03-11', 4, 11, '454456666001', 54646, '123', '0000-00-00', '2123', '636', '2435', 0),
(24, '855948', '2018-03-11', 4, 9, '777777', 1000, '7', '0000-00-00', '7', '7', '7', 0),
(25, '233815', '2018-03-11', 4, 10, '555555', 1000, '555555555', '0000-00-00', '5555555555', '555555555555555', '55555555', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_profile`
--
ALTER TABLE `category_profile`
  ADD PRIMARY KEY (`cat_id`);

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
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_profile`
--
ALTER TABLE `category_profile`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gun_profile`
--
ALTER TABLE `gun_profile`
  MODIFY `gun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pay_info`
--
ALTER TABLE `pay_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reseller_profile`
--
ALTER TABLE `reseller_profile`
  MODIFY `rs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `warranty_gun`
--
ALTER TABLE `warranty_gun`
  MODIFY `war_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
