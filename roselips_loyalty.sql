-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 06, 2021 at 01:24 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roselips_loyalty`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` bigint NOT NULL,
  `scores` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `number`, `scores`) VALUES
(1, 'Расулов Азизбек', 998903590066, 140);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `client_id` int NOT NULL,
  `date` varchar(19) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `scores` float NOT NULL,
  `number` bigint NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `mode` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'add'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `client_id`, `date`, `scores`, `number`, `message`, `mode`) VALUES
(49, 1, '2021-10-05 22:52:07', 152, 998903590066, '', 'add'),
(50, 1, '2021-10-05 22:52:33', 0.1, 998903590066, '', 'remove'),
(51, 1, '2021-10-05 22:52:38', 12, 998903590066, '', 'remove'),
(52, 1, '2021-10-05 23:14:44', 0.01, 998903590066, '', 'add'),
(53, 1, '2021-10-05 23:14:48', 0.01, 998903590066, '', 'add'),
(54, 1, '2021-10-05 23:14:50', 0.01, 998903590066, '', 'add'),
(55, 1, '2021-10-05 23:14:54', 0.01, 998903590066, '', 'add'),
(56, 1, '2021-10-05 23:14:56', 0.01, 998903590066, '', 'add'),
(57, 1, '2021-10-05 23:14:58', 0.01, 998903590066, '', 'add'),
(58, 1, '2021-10-05 23:15:11', 0.04, 998903590066, '', 'add');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
