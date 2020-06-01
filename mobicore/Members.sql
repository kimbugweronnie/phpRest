-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2020 at 09:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Members`
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `pin` varchar(50) NOT NULL,
  `groupId` varchar(50) NOT NULL,
  `awaitingEmailValidation` tinyint(1) DEFAULT NULL,
  `UserId` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `username`, `name`, `email`, `Password`, `pin`, `groupId`, `awaitingEmailValidation`, `UserId`) VALUES
(26, 'return', 'Ronnie Kimbugwe', 'kimbugweronnie@gmail.com', 'ron12222', '12121', '12', NULL, NULL),
(27, 'return', 'Ronnie Kimbugwe', 'kimbugweronnie@gmail.com', '111222', '11111', '12', NULL, NULL),
(28, 'ronnie1234', 'Ronnie Kimbugwe', 'kimbugweronnie@gmail.com', '122121', '11111', '12', NULL, NULL),
(29, 'ronnie1234', 'Ronnie Kimbugwe', 'kimbugweronnie@gmail.com', '11211221', '12121', '12', NULL, NULL),
(30, 'return', 'Ronnie Kimbugwe', 'kimbugweronnie@gmail.com', '11211221', '12121', '12', NULL, NULL),
(31, 'return', 'Ronnie Kimbugwe', 'kimbugweronnie@gmail.com', '12211211', '11111', '12', NULL, NULL),
(32, 'return', 'Ronnie Kimbugwe', 'kimbugweronnie@gmail.com', 'w12212', '12121', '12', NULL, NULL),
(33, 'return', 'Ronnie Kimbugwe', 'kimbugweronnie@gmail.com', '12121212', '12121', '12', NULL, NULL),
(34, 'groupId', 'Ronnie Kimbugwe', 'kimbugweronnie@gmail.com', '11221121', '12121', '12', NULL, NULL),
(35, 'groupId', 'Ronnie Kimbugwe', 'kimbugweronnie@gmail.com', '1121121', '11111', '12', NULL, NULL),
(36, 'ronnie1234', 'Ronnie Kimbugwe', 'kimbugweronnie@gmail.com', '121212', '11111', '12', NULL, NULL),
(37, 'ronnie1234', 'Ronnie Kimbugwe', 'kimbugweronnie@gmail.com', '11121', '12341', '12', NULL, NULL),
(38, 'ronnie1234', 'Ronnie Kimbugwe', 'kimbugweronnie@gmail.com', '112121', '11111', '12', NULL, NULL),
(39, 'bbb123', 'bbb1233', 'bbb@gmail.com', '111111', '11111', '12', NULL, NULL),
(40, 'edc1234', 'edc12345', 'edc@gmail.com', '1221133', '44444', '12', NULL, NULL),
(41, 'ronnie1234', 'Ronnie Kimbugwe', 'kimbugweronnie@gmail.com', '112112', '11111', '12', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
