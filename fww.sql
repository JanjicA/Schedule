-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 07, 2020 at 01:09 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fww`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

DROP TABLE IF EXISTS `calendar`;
CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_event` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `start_event` (`start_event`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `title`, `start_event`) VALUES
(17, 'Obavezno prisustvo!', '2020-07-08 00:00:00'),
(20, 'Sastanak za danas', '2020-07-13 00:00:00'),
(23, 'Sastanak', '2020-07-16 00:00:00'),
(25, 'Moj rodjendan', '2020-07-21 00:00:00'),
(26, 'Meeting', '2020-07-03 00:00:00'),
(27, 'Neradni dan', '2020-07-17 00:00:00'),
(28, 'Sefovi', '2020-07-02 00:00:00'),
(29, 'Proslava firme', '2020-07-18 00:00:00'),
(31, 'Rucak', '2020-07-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `date`, `password`) VALUES
(3, 'Aleksandar', 'Aco995', 'aleksandarjanjic10@hotmail.com', '2020-07-02 18:02:01', 'f4e41819109e82d555e6be38edb329a6'),
(16, 'Admin', 'Admin12', 'admin@admin.com', '2020-07-07 12:50:10', '25d55ad283aa400af464c76d713c07ad'),
(17, 'Jelena', 'Jecapereca12', 'jeca@gmail.com', '2020-07-07 12:54:53', '2b78b7d4efe85a69445f73c757a1b1ff');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
