-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2026 at 12:30 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_id` int(11) NOT NULL,
  `default_location_id` int(11) DEFAULT NULL,
  `last_location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `name`, `email`, `mobile`, `password`, `created_at`, `role_id`, `default_location_id`, `last_location_id`) VALUES
(1, 'Abdullah AlSahli', 'Abdullah', 'admin@ems.com', '+2189123457687', '$2y$10$uNBYvJRdBnd5xdlc8ADmb.oCxl4EIVLmd3kuftCWcW7Epbj7CiQrK', '2026-04-07 20:11:12', 1, NULL, 17),
(6, 'Ahmad Sudan', 'Ahmad', 'ac@ems.com', '+218912345745', '$2y$10$g.O9QjwPsW60VVrZZ.UGGebvqu3YqCbDq4DknouqpBIxR/iiA9JKu', '2026-04-07 20:34:24', 5, 17, 1),
(7, 'Omar Khalid', 'Omar', 'eng@ems.com', '+218912345298', '$2y$10$uNBYvJRdBnd5xdlc8ADmb.oCxl4EIVLmd3kuftCWcW7Epbj7CiQrK', '2026-04-07 20:34:24', 3, NULL, NULL),
(8, 'Ali Salem', 'Ali', 'tech@ems.com', '+218918762345', '$2y$10$uNBYvJRdBnd5xdlc8ADmb.oCxl4EIVLmd3kuftCWcW7Epbj7CiQrK', '2026-04-07 20:34:24', 4, NULL, NULL),
(11, 'Abdullah Ben Amer', 'Amer', 'benamer@gmail.com', NULL, '$2y$10$YSYPAjp4O/R.pe40wv4Equfr18/r70omV36YJkE5VU94iTeDCF2P6', '2026-04-20 20:29:44', 8, NULL, NULL),
(12, 'Sumaya Abdullah', 'Sumaya', 'sumaya@ems.com', '+2189123457687', '$2y$10$Y.8EQGCefp30HlCMXKLS2OMuMbWAxnaTRHR88HX8AzTRbHRPoYxgG', '2026-04-22 11:59:21', 8, 2, NULL),
(13, 'Mustafa Saqer', 'Mustafa', 'cash@ems.com', '+2189123457687', '$2y$10$XeB5nEBG9iuu87/pCrjMU.tVgMAxOpvl7j5uYhQ9b/TbTXrCg/fM.', '2026-04-24 20:14:40', 7, NULL, NULL),
(14, 'Taha Hussain', 'Taha', 'th@ems.com', '+2189123457687', '$2y$10$fLhJosWCRxuPtL0C/s5dTup98BZ11Xa0n72HW4qLCBGdEGM0byvEW', '2026-06-12 15:52:02', 2, 2, NULL),
(15, 'khalil salem', 'salem', 'ks@ems.com', '+2189123457687', '$2y$10$1QScFHLSeyeWP2bcjk4fnujmDhz0hFGFYGLl8H1W09fIa9ymw2mMm', '2026-06-19 16:29:37', 8, 19, NULL),
(16, 'abdulatif musa', 'abdulatif', 'am@ems.com', '+2189123776487', '$2y$10$8XhNe1z5DDXy2MNAV2EYxeiFknJcIG8ZQyP6EgPzFgpchzjNVmWdO', '2026-06-19 16:50:12', 7, 18, NULL),
(17, 'faraj mugharbi', 'faraj', 'fm@ems.com', '+2189127657687', '$2y$10$pA06wD0MRIA4COTnDPVEt.tlEPyPdrj/Ebkf9RTyzzkaLjuCwRd22', '2026-06-20 08:00:48', 7, 2, NULL),
(18, 'sami khalid', 'sami', 'sami@ems.com', '+2189123457687', '$2y$10$KclciMNyrrKA/6MZSlCGy.aEY0ekS4bMttTrcTmKMeP6Nv17VVbpO', '2026-06-25 05:50:21', 5, 2, NULL),
(19, 'test permissions', 'test perm', 'test@ems.com', NULL, '$2y$10$ODoFA.hgkqfKgTZ6WZI.teb00KNkJFl13C2vn8/smTFvyAe8WmKtS', '2026-07-22 16:42:24', 10, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_role` (`role_id`),
  ADD KEY `users_default_location_fk` (`default_location_id`),
  ADD KEY `users_last_location_fk` (`last_location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
