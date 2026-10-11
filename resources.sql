-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2026 at 05:39 PM
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
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `resource_code` varchar(50) NOT NULL,
  `resource_name` varchar(150) NOT NULL,
  `resource_name_a` varchar(255) DEFAULT NULL,
  `resource_type` enum('HUMAN_RESOURCES','SERVICE','TRANSPORT','EQUIPMENT','PROFESSIONAL_SERVICES','MISCELLANEOUS') DEFAULT 'HUMAN_RESOURCES',
  `unit_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `description_a` text DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `resource_code`, `resource_name`, `resource_name_a`, `resource_type`, `unit_id`, `description`, `description_a`, `status`, `created_at`, `category_id`) VALUES
(12, 'EQP-0001', 'Concrete Mixer', 'خلاطة خرسانة', 'EQUIPMENT', 17, 'Portable concrete mixer', NULL, 'ACTIVE', '2026-07-13 07:52:15', 8),
(13, 'EQP-0002', 'Plate Compactor', 'مدك للارضيات', 'EQUIPMENT', 14, 'Soil compaction machine', NULL, 'ACTIVE', '2026-07-13 07:52:15', 8),
(14, 'EQP-0003', 'Excavator', 'حفارة', 'EQUIPMENT', 17, 'Hydraulic excavator', NULL, 'ACTIVE', '2026-07-13 07:52:15', 8),
(15, 'EQP-0004', 'Tower Crane', 'رافعة برجية', 'EQUIPMENT', 18, 'Heavy lifting equipment', NULL, 'ACTIVE', '2026-07-13 07:52:15', 8),
(16, 'EQP-0005', 'Electric Generator', 'مولد كهرباء', 'EQUIPMENT', 18, 'Diesel generator', NULL, 'ACTIVE', '2026-07-13 07:52:15', 8),
(17, 'HRS-0001', 'Civil Engineer', 'مهندس مدني', 'HUMAN_RESOURCES', 20, 'Professional engineer', NULL, 'ACTIVE', '2026-07-13 07:52:15', 12),
(18, 'HRS-0002', 'Site Supervisor', 'مشرف موقع', 'HUMAN_RESOURCES', 20, 'Construction supervisor', NULL, 'ACTIVE', '2026-07-13 07:52:15', 13),
(19, 'HRS-0003', 'Mason', 'أسطى بناء', 'HUMAN_RESOURCES', 14, 'Block laying and plastering', NULL, 'ACTIVE', '2026-07-13 07:52:15', 13),
(20, 'HRS-0004', 'Carpenter', 'اسطى نجار', 'PROFESSIONAL_SERVICES', 15, 'Formwork carpenter', NULL, 'ACTIVE', '2026-07-13 07:52:15', 13),
(21, 'HRS-0005', 'Steel Fixer', 'اسطى حداد', 'HUMAN_RESOURCES', 14, 'Rebar installation', NULL, 'ACTIVE', '2026-07-13 07:52:15', 13),
(22, 'HRS-0006', 'Electrician', 'اسطى كهربائي', 'HUMAN_RESOURCES', 22, 'Electrical installations', NULL, 'ACTIVE', '2026-07-13 07:52:15', 13),
(23, 'HRS-0007', 'Plumber', 'اسطى سباك', 'HUMAN_RESOURCES', 21, 'Plumbing installation', NULL, 'ACTIVE', '2026-07-13 07:52:15', 13),
(24, 'EQP-0006', 'Concrete Pumping', 'مضخة خرسانة', 'EQUIPMENT', 15, 'Concrete pumping service', NULL, 'ACTIVE', '2026-07-13 07:52:15', 8),
(25, 'SRV-0002', 'Survey Works', 'أعمال مساحة', 'PROFESSIONAL_SERVICES', 21, 'Topographic survey', NULL, 'ACTIVE', '2026-07-13 07:52:15', 12),
(26, 'EQP-0007', 'Equipment Rental', 'إيجار أليات', 'EQUIPMENT', 17, 'Heavy equipment rental', NULL, 'ACTIVE', '2026-07-13 07:52:15', 8),
(27, 'TRS-0004', 'Material Delivery', 'نقل مواد', 'TRANSPORT', 9, 'Transportation service', NULL, 'ACTIVE', '2026-07-13 07:52:15', 11),
(28, 'SRV-0005', 'Labor Supply', 'نوريد عمالة', 'SERVICE', 21, 'Temporary labor supply', NULL, 'ACTIVE', '2026-07-13 07:52:15', 11),
(31, 'CON-0001', 'Sub-Contracting', 'مقاولات بالباطن', 'PROFESSIONAL_SERVICES', 21, 'Sub-Contracting at Lump Sum', NULL, 'ACTIVE', '2026-09-11 18:25:32', 11),
(33, 'ABC-0033', 'SITE ENGINEER', 'مهندس موقع', 'HUMAN_RESOURCES', 20, 'Engineer Monthly Based Salary', 'مهندس براتب شهري', 'ACTIVE', '2026-09-27 17:45:23', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `resource_code` (`resource_code`),
  ADD KEY `fk_resources_category` (`category_id`),
  ADD KEY `fk_resources_unit` (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `fk_resources_category` FOREIGN KEY (`category_id`) REFERENCES `resource_categories` (`id`),
  ADD CONSTRAINT `fk_resources_unit` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`),
  ADD CONSTRAINT `resource_unitID_fk` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`),
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `resource_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
