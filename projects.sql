-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2026 at 05:57 PM
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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `project_type` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status` enum('planning','in_progress','testing','completed','cancelled') DEFAULT NULL,
  `budget` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `site_location` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `project_manager_id` int(11) DEFAULT NULL,
  `contract_number` varchar(100) DEFAULT NULL,
  `project_code` varchar(100) DEFAULT NULL,
  `priority` enum('low','medium','high','critical') DEFAULT 'medium'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `location_id`, `customer_id`, `title`, `project_type`, `description`, `deadline`, `status`, `budget`, `created_at`, `is_archived`, `site_location`, `start_date`, `project_manager_id`, `contract_number`, `project_code`, `priority`) VALUES
(45, 22, 5, 'Construction of XYZ Building', 'Construction', 'Construction of XYZ Building including facilities', '2026-12-24', 'planning', 1750000.00, '2026-09-01 09:55:13', 0, 'South Tripoli', '2026-08-15', 14, 'CT-000119', 'ABC-001', 'medium'),
(46, 21, 2, 'New Office Building', 'Construction', 'Renovating and extending the New Office Building', '2026-10-22', 'planning', 500000.00, '2026-09-04 04:59:13', 0, 'Tarhouna the mountains', '2026-09-07', 1, 'NOB-2026', 'NOB-1773', 'medium'),
(47, NULL, 5, 'Maintaining The Corniche', 'Maintenance', '', '2026-11-06', 'planning', 600000.00, '2026-09-04 10:36:10', 0, 'Musrata North', '2026-09-11', 1, '26009', 'MTC-7864', 'medium'),
(48, 24, 2, 'Building Studio in Janzour', 'Construction', 'Building Studio in Janzour for 76000 LYD', '2026-11-08', 'planning', 79000.00, '2026-09-07 12:43:08', 0, 'Sara, Iloilo', '2026-09-09', 1, '26907', 'Proj-BSJ22', 'critical'),
(49, 25, 5, 'Our Tiny house in Sara', 'Construction', 'Tiny house in Sara', '2026-11-12', 'planning', 600000.00, '2026-09-07 16:32:52', 0, 'Sara, Iloilo', '2026-09-13', 1, '5548', 'OTH-147', 'high'),
(50, 26, 2, 'Bamboo House In Aldeguer', 'Construction', 'Bamboo House In Aldeguer', '2026-10-15', 'planning', 40000.00, '2026-09-07 16:36:35', 0, 'Ajuy, Tipacla', '2026-09-14', 14, '111190', 'bamboo-26', 'medium'),
(51, 27, 2, 'a test project', 'Maintenance', 'a test project', '2026-10-29', 'in_progress', 300000.00, '2026-09-07 16:59:38', 0, 'Alzahra Tripoli, north', '2026-09-16', 1, 'con-1733', 'New-246', 'critical'),
(52, 28, 5, 'abc', 'Maintenance', 'small project', '2026-09-22', 'planning', 1900000.00, '2026-09-07 17:10:47', 0, 'ABCDEF', '2026-09-16', 1, 'XYZ', 'AAA', 'high'),
(53, 29, 5, 'any test project', 'Maintenance', 'any test project  any test project  any test project.', '2026-10-10', 'planning', 50000.00, '2026-09-07 19:42:16', 0, 'Ajuy Tipacla LOT 4', '2026-09-23', 23, 'CONT-18765', 'PRJ-2026-0053', 'medium'),
(54, NULL, 5, 'بناء مدرسة ثانوية', 'Construction', 'بناء مدرسة ثانوية بمنطقة عين زارة طرابلس', '2026-11-25', 'planning', 1500000.00, '2026-09-08 19:56:38', 0, 'عين زارة طرابلس', '2026-09-13', 14, '892026', 'PRJ-2026-0054', 'low'),
(55, 31, 2, 'بناء مركز صحي بمنطقة المراونة، تاجوراء', 'Construction', 'بناء مركز صحي بمنطقة المراونة، تاجوراء يتسع لعدد 500 حالة يوميا', '2027-01-07', 'planning', 3000000.00, '2026-09-12 13:50:51', 0, 'منطقة المراونة، تاجوراء، 12 الشارع الرابع.', '2026-09-20', 14, 'TAJ-2026-0012', 'PRJ-2026-0055', 'high'),
(56, NULL, 14, 'مشروع جديد قائم', 'Maintenance', 'مشروع صيانة صغير', '2026-12-26', 'planning', 500000.00, '2026-09-26 19:46:06', 0, 'الظهرة شارع الذيب 25', '2026-09-27', 23, 'XYZ1238765', 'PRJ-26-0056', 'high');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_projects_project_code` (`project_code`),
  ADD KEY `project_customer_fk` (`customer_id`),
  ADD KEY `project_manager_fk` (`project_manager_id`),
  ADD KEY `fk_projects_location` (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `fk_projects_location` FOREIGN KEY (`location_id`) REFERENCES `inventory_locations` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `project_customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_manager_fk` FOREIGN KEY (`project_manager_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
