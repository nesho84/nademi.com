-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 11:17 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop_portfolio_github`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoryUserID` int(11) NOT NULL,
  `categoryDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `categoryDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `categoryUserID`, `categoryDescription`, `categoryDate`) VALUES
(1, 'Windows Apps', 33, 'Windows Applications', '2019-12-02 00:59:59'),
(2, 'Web Apps', 33, 'Web Applications', '2019-12-02 00:59:59'),
(3, 'Websites', 33, 'Simple Websites', '2019-12-02 00:59:59'),
(4, 'Mobile Apps', 33, 'Mobile Applications for IOS or Android', '2019-12-02 00:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `demoID` int(11) NOT NULL,
  `demoTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `demoCategoryID` int(11) NOT NULL,
  `demoUserID` int(11) NOT NULL,
  `demoCompletionDate` date NOT NULL,
  `demoDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `demoImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `demoLinks` text COLLATE utf8_unicode_ci NOT NULL,
  `demoStatus` tinyint(4) NOT NULL DEFAULT '0',
  `demoDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`demoID`, `demoTitle`, `demoCategoryID`, `demoUserID`, `demoCompletionDate`, `demoDescription`, `demoImage`, `demoLinks`, `demoStatus`, `demoDate`) VALUES
(62, 'test4', 4, 33, '2020-05-15', 'desc4', '5ec3174f66e7d.jpg,5ec3174f66e81.jpg', '1,2,3', 1, '2020-05-19 01:15:56'),
(63, 'test7', 4, 33, '2020-05-21', 'desc7', '5ec3b27ccd5c9.jpg,5ec3b27ccd5ce.jpg,5ec3b27ccd5d0.jpg', 'l,2km,4', 1, '2020-05-19 12:17:41'),
(66, 'many imgs', 4, 33, '2020-06-10', 'many img desc', '5ee0cee00b308.png,5ee0cee00b30f.png', 'link1, link2, link3', 0, '2020-06-10 14:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `projekt`
--

CREATE TABLE `projekt` (
  `projektID` int(11) NOT NULL,
  `projektTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `projektCategoryID` int(11) NOT NULL,
  `projektUserID` int(11) NOT NULL,
  `projektCompletionDate` date NOT NULL,
  `projektDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `projektImage` text COLLATE utf8_unicode_ci NOT NULL,
  `projektLinks` text COLLATE utf8_unicode_ci NOT NULL,
  `projektStatus` tinyint(4) NOT NULL DEFAULT '0',
  `projektDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projekt`
--

INSERT INTO `projekt` (`projektID`, `projektTitle`, `projektCategoryID`, `projektUserID`, `projektCompletionDate`, `projektDescription`, `projektImage`, `projektLinks`, `projektStatus`, `projektDate`) VALUES
(19, 'albimco.com', 2, 33, '2017-10-01', 'A real estate Company located in Albania', '5de446091f9a9.png', 'http://albimco.com/, https://github.com/nesho84/albimco.com', 1, '2018-10-01 01:41:13'),
(20, 'NECOM IT GmbH', 3, 33, '2016-01-01', 'IT Solutions Company and Software Development', '5de445ee2d4cd.png', 'https://github.com/nesho84/necom.at', 1, '2016-01-01 01:41:33'),
(21, 'Limani Immo GmbH', 3, 33, '2018-11-15', 'A real estate Company', '5e1ba382d39d9.png', 'http://limani-immo.ch,\r\nhttps://github.com/nesho84/limani-immo.ch', 1, '2018-11-15 03:39:36'),
(22, 'UMR GmbH (umr.at v.2)', 2, 33, '2020-02-20', 'Human Resource Management and Cleaning Company', '5e1ba05bf1435.png', 'https://umr.at, https://umr.at/dfg, https://umr.at/pm, https://umr.at/kfz', 1, '2020-03-20 03:42:44'),
(23, 'PromDress.at (offline)', 2, 33, '2015-03-30', 'Online shop for women&amp;#39;s fashion', '5de445d2392e9.png', 'http://promdress.at (offline)', 1, '2015-03-30 04:16:33'),
(26, 'Real Budget', 1, 33, '2019-04-01', 'Windows application for Personal Budget (Expense Tracking)', '5de445c6ecf37.png', 'https://github.com/nesho84/Real-Budget', 1, '2019-04-01 20:30:10'),
(27, 'Universal Management', 1, 33, '2015-05-01', 'Employee Management Software', '5de446885133e.jpg', 'https://github.com/nesho84/Universal-Management', 1, '2015-05-01 22:27:03'),
(28, 'UMR GmbH (umr.at v.1)', 3, 33, '2014-07-10', 'Human Resource Management and Cleaning Company', '5e1ba572b61b3.png', 'https://umr.at/,\r\nhttps://github.com/nesho84/umr.at_v1.0', 1, '2014-07-10 00:02:10'),
(29, 'GLM BAU GmbH', 2, 33, '2020-03-30', 'Construction Company', '5e32ea8d1b53e.png', 'https://glmbau.de', 1, '2020-03-30 15:29:40'),
(30, 'INTER-TRANS', 2, 33, '2020-04-02', 'International Transport Company', '5e5d5a1258977.jpg', 'https://inter-trans.mk', 1, '2020-04-02 20:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userPassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userRole` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `userDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `userEmail`, `userPassword`, `userRole`, `userDate`) VALUES
(33, 'admin', 'admin@admin.com', '$2y$10$PZxEJuQEjTe6gMUvXSu5lOUfUBIaAvxvfFW0FXbPImuW7u1sgM/LO', '1', '2019-11-26 20:19:44'),
(51, 'test', 'test@test.com', '$2y$10$z8ZSzuo1ZHJkpbJIKTeh.O8Dt1ppM0H/CPyrZQG6erglFY5PL/xp.', '1', '2019-12-03 01:54:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`demoID`);

--
-- Indexes for table `projekt`
--
ALTER TABLE `projekt`
  ADD PRIMARY KEY (`projektID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `demoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `projekt`
--
ALTER TABLE `projekt`
  MODIFY `projektID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
