-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2026 at 07:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `constructpro_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(1, 6),
(1, 8),
(1, 12),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(2, 5),
(2, 6),
(2, 7),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 43),
(3, 5),
(3, 6),
(3, 7),
(3, 11),
(3, 12),
(3, 13),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(4, 5),
(4, 6),
(4, 11),
(4, 12),
(4, 21),
(5, 5),
(5, 6),
(5, 7),
(5, 13),
(5, 50),
(7, 6),
(7, 7),
(7, 12),
(7, 17),
(7, 18),
(7, 19),
(7, 21),
(7, 29),
(7, 31),
(7, 35),
(7, 50),
(8, 5),
(8, 6),
(8, 12),
(8, 17),
(8, 21),
(8, 29),
(8, 30),
(8, 31),
(8, 33),
(8, 34),
(8, 35),
(8, 36),
(8, 37),
(8, 39),
(8, 40),
(10, 5),
(10, 10),
(10, 11),
(10, 17),
(10, 19),
(10, 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
