-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2026 at 05:58 PM
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
-- Table structure for table `resource_requisitions`
--

CREATE TABLE `resource_requisitions` (
  `id` int(11) NOT NULL,
  `req_number` varchar(30) NOT NULL,
  `project_id` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `required_date` date DEFAULT NULL,
  `target_warehouse_id` int(11) DEFAULT NULL,
  `delivery_method` enum('WAREHOUSE','DIRECT_TO_PROJECT_SITE') NOT NULL DEFAULT 'WAREHOUSE',
  `priority` enum('HIGH','MEDIUM','LOW') NOT NULL DEFAULT 'MEDIUM',
  `status` enum('DRAFT','SUBMITTED','APPROVED','PARTIAL','FULFILLED','REJECTED','CANCELLED') DEFAULT 'DRAFT',
  `remarks` text DEFAULT NULL,
  `submitted_by` int(11) DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `requested_by` int(11) NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `approval_remarks` text DEFAULT NULL,
  `approval_notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource_requisitions`
--

INSERT INTO `resource_requisitions` (`id`, `req_number`, `project_id`, `request_date`, `required_date`, `target_warehouse_id`, `delivery_method`, `priority`, `status`, `remarks`, `submitted_by`, `submitted_at`, `requested_by`, `approved_by`, `approved_at`, `approval_remarks`, `approval_notes`, `created_at`, `updated_at`) VALUES
(43, 'REQ-260906224746', 46, '2026-09-06', '2026-09-19', 3, 'WAREHOUSE', 'MEDIUM', 'APPROVED', 'test RR to show in the dashboard', 1, '2026-09-06 22:53:24', 1, 1, '2026-09-06 22:55:02', '', NULL, '2026-09-06 20:47:46', '2026-09-06 20:55:02'),
(44, 'REQ-260906231019', 45, '2026-09-06', '2026-09-23', 22, 'WAREHOUSE', 'MEDIUM', 'APPROVED', '', 1, '2026-09-09 20:38:57', 1, 1, '2026-09-09 20:39:08', '', NULL, '2026-09-06 21:10:19', '2026-09-09 18:39:08'),
(45, 'REQ-260911114053', 51, '2026-09-11', '2026-09-23', 27, 'WAREHOUSE', 'MEDIUM', 'DRAFT', '', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-09-11 09:40:53', NULL),
(46, 'REQ-260911164912', 49, '2026-09-11', '2026-09-16', NULL, 'DIRECT_TO_PROJECT_SITE', 'HIGH', 'DRAFT', '', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-09-11 14:49:12', '2026-09-14 13:26:53'),
(47, 'REQ-260911185350', 46, '2026-09-11', '2026-09-25', NULL, 'DIRECT_TO_PROJECT_SITE', 'MEDIUM', 'FULFILLED', '', 1, '2026-09-12 08:11:27', 1, 1, '2026-09-12 08:11:37', '', NULL, '2026-09-11 16:53:50', '2026-09-12 07:11:58'),
(48, 'REQ-260911204609', 49, '2026-09-11', '2026-09-17', 25, 'WAREHOUSE', 'MEDIUM', 'FULFILLED', '', 1, '2026-09-12 07:30:16', 1, 1, '2026-09-12 07:30:25', '', NULL, '2026-09-11 18:46:09', '2026-09-12 06:04:39'),
(49, 'REQ-260912232515', 46, '2026-09-12', '2026-09-12', 1, 'WAREHOUSE', 'MEDIUM', 'APPROVED', '', 1, '2026-09-13 08:16:22', 1, 1, '2026-09-13 08:16:28', '', NULL, '2026-09-12 21:25:15', '2026-09-13 06:16:28'),
(50, 'REQ-260917114231', 47, '2026-09-17', '2026-09-30', 3, 'WAREHOUSE', 'HIGH', 'APPROVED', 'some remarks .....................', 1, '2026-09-17 14:59:27', 1, 1, '2026-09-17 14:59:39', '', NULL, '2026-09-17 09:42:31', '2026-09-17 12:59:39'),
(51, 'REQ-260927070710', 54, '2026-09-27', '2026-10-01', NULL, 'DIRECT_TO_PROJECT_SITE', 'MEDIUM', 'DRAFT', '', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-09-27 05:07:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resource_requisitions`
--
ALTER TABLE `resource_requisitions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `req_number` (`req_number`),
  ADD KEY `fk_rr_project` (`project_id`),
  ADD KEY `fk_rr_requested_by` (`requested_by`),
  ADD KEY `fk_rr_approved_by` (`approved_by`),
  ADD KEY `fk_rr_target_warehouse` (`target_warehouse_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resource_requisitions`
--
ALTER TABLE `resource_requisitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resource_requisitions`
--
ALTER TABLE `resource_requisitions`
  ADD CONSTRAINT `fk_rr_approved_by` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rr_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rr_requested_by` FOREIGN KEY (`requested_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rr_target_warehouse` FOREIGN KEY (`target_warehouse_id`) REFERENCES `inventory_locations` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
