-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2026 at 03:14 PM
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
-- Table structure for table `project_costs`
--

CREATE TABLE `project_costs` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `requisition_id` int(11) DEFAULT NULL,
  `fulfillment_id` int(11) DEFAULT NULL,
  `inventory_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `cost_type` enum('MATERIALS','HUMAN_RESOURCES','TRANSPORT','EQUIPMENT','SUBCONTRACT','SITE_EXPENSES','PROFESSIONAL_SERVICES','PERMITS_FEES','INSURANCE','BANK_CHARGES','TAXES','MISCELLANEOUS') NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT 1.00,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `unit_price`) STORED,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_costs`
--

INSERT INTO `project_costs` (`id`, `project_id`, `requisition_id`, `fulfillment_id`, `inventory_id`, `resource_id`, `location_id`, `cost_type`, `description`, `quantity`, `unit_price`, `created_at`) VALUES
(206, 54, NULL, NULL, 148, NULL, 1, 'MATERIALS', 'Contactor 25A', 5.00, 32.00, '2026-09-09 06:38:09'),
(208, 51, NULL, NULL, 122, NULL, 1, 'MATERIALS', 'Ceramic Floor Tile 60x60', 500.00, 25.80, '2026-09-10 14:30:10'),
(211, 49, NULL, NULL, 161, NULL, 3, 'MATERIALS', 'Engine Oil 15W40', 5.00, 5.50, '2026-09-12 05:53:55'),
(212, 49, NULL, NULL, 134, NULL, 2, 'MATERIALS', 'Binding Wire', 1.00, 4.50, '2026-09-12 06:04:39'),
(214, 55, NULL, NULL, 112, NULL, 1, 'MATERIALS', 'Reservation Fulfillment: Portland Cement 52.5N', 20.00, 15.50, '2026-09-12 14:07:30'),
(215, 49, NULL, NULL, NULL, NULL, NULL, 'HUMAN_RESOURCES', 'عمالة طرح التربة', 12.00, 250.00, '2026-09-15 06:15:58'),
(216, 47, NULL, NULL, NULL, NULL, NULL, 'SITE_EXPENSES', 'اعداد الموقع لبدء العمل', 1.00, 2000.00, '2026-09-15 06:36:08'),
(217, 55, NULL, NULL, 123, NULL, 3, 'MATERIALS', 'Reservation Fulfillment: Ceramic Wall Tile 30x60', 30.00, 6.00, '2026-09-16 05:44:20'),
(218, 45, NULL, NULL, 117, NULL, 32, 'MATERIALS', 'Coarse Aggregate 20mm', 10.00, 120.00, '2026-09-20 13:29:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_costs`
--
ALTER TABLE `project_costs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `inventory_id` (`inventory_id`),
  ADD KEY `project_costs_location_fk` (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_costs`
--
ALTER TABLE `project_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_costs`
--
ALTER TABLE `project_costs`
  ADD CONSTRAINT `project_costs_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_costs_location_fk` FOREIGN KEY (`location_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_inventory_costs_fk` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_location_costs_fk` FOREIGN KEY (`location_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
