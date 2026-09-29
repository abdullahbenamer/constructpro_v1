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
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` int(11) NOT NULL,
  `po_number` varchar(50) DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `requisition_id` int(11) DEFAULT NULL,
  `target_warehouse_id` int(11) DEFAULT NULL,
  `delivery_method` enum('WAREHOUSE','DIRECT_TO_PROJECT_SITE') NOT NULL DEFAULT 'WAREHOUSE',
  `status` enum('draft','approved','partial','received','cancelled') DEFAULT 'draft',
  `order_date` date DEFAULT NULL,
  `expected_date` date DEFAULT NULL,
  `subtotal` decimal(15,2) DEFAULT 0.00,
  `tax_amount` decimal(15,2) DEFAULT 0.00,
  `discount_amount` decimal(15,2) DEFAULT 0.00,
  `total_amount` decimal(15,2) DEFAULT 0.00,
  `notes` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `received_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `receiving_status` enum('OPEN','PARTIAL','RECEIVED') DEFAULT 'OPEN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `po_number`, `supplier_id`, `project_id`, `requisition_id`, `target_warehouse_id`, `delivery_method`, `status`, `order_date`, `expected_date`, `subtotal`, `tax_amount`, `discount_amount`, `total_amount`, `notes`, `created_by`, `approved_by`, `approved_at`, `received_at`, `created_at`, `receiving_status`) VALUES
(56, 'PO-260906205731', 3, NULL, NULL, NULL, 'WAREHOUSE', 'received', '2026-09-06', '2026-09-12', 11470.00, 0.00, 0.00, 11470.00, '', 1, 1, '2026-09-06 21:00:08', '2026-09-06 21:02:53', '2026-09-06 18:57:31', 'RECEIVED'),
(57, 'PO-260909203253', 4, NULL, NULL, NULL, 'WAREHOUSE', 'partial', '2026-09-09', '2026-09-23', 2400.00, 0.00, 0.00, 2400.00, '', 1, 1, '2026-09-09 20:36:40', NULL, '2026-09-09 18:32:53', 'PARTIAL'),
(58, 'PO-260911204901', 1, NULL, NULL, NULL, 'WAREHOUSE', 'approved', '2026-09-11', '2026-09-24', 1050.00, 0.00, 0.00, 1050.00, '', 1, 1, '2026-09-11 22:04:03', NULL, '2026-09-11 18:49:01', 'OPEN'),
(59, 'PO-260911222729', 4, NULL, NULL, NULL, 'WAREHOUSE', 'approved', '2026-09-11', '2026-09-18', 2650.00, 0.00, 0.00, 2650.00, '', 1, 1, '2026-09-12 09:08:54', NULL, '2026-09-11 20:27:29', 'OPEN'),
(60, 'PO-260912085701', 4, 46, 43, 3, 'WAREHOUSE', 'partial', '2026-09-12', '2026-09-19', 6112.50, 0.00, 0.00, 6112.50, 'Created from Resource Requisition REQ-260906224746', 1, 1, '2026-09-12 09:00:40', NULL, '2026-09-12 06:57:01', 'PARTIAL'),
(61, 'PO-260912223226', 4, NULL, NULL, NULL, 'WAREHOUSE', 'draft', '2026-09-12', '2026-09-17', 620.00, 0.00, 0.00, 620.00, '', 1, NULL, NULL, NULL, '2026-09-12 20:32:26', 'OPEN'),
(62, 'PO-260914081516', 3, NULL, NULL, NULL, 'WAREHOUSE', 'draft', '2026-09-13', '2026-09-17', 0.00, 0.00, 0.00, 0.00, '', 1, NULL, NULL, NULL, '2026-09-14 06:15:16', 'OPEN'),
(63, 'PO-20260914095038', 4, 55, NULL, NULL, 'DIRECT_TO_PROJECT_SITE', 'received', '2026-09-14', '2026-09-18', 8250.00, 0.00, 0.00, 8250.00, '', 1, 1, '2026-09-14 09:51:19', '2026-09-20 14:46:29', '2026-09-14 07:50:38', 'RECEIVED'),
(64, 'PO-20260917174851', 1, NULL, NULL, 1, 'WAREHOUSE', 'partial', '2026-09-17', '2026-09-24', 700.00, 0.00, 0.00, 700.00, '', 1, 12, '2026-09-25 22:22:17', NULL, '2026-09-17 15:48:51', 'PARTIAL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `po_number` (`po_number`),
  ADD KEY `approved_by_fk` (`approved_by`),
  ADD KEY `purchase_orders_ibfk_1` (`supplier_id`),
  ADD KEY `fk_po_project` (`project_id`),
  ADD KEY `fk_po_requisition` (`requisition_id`),
  ADD KEY `fk_po_target_warehouse` (`target_warehouse_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD CONSTRAINT `approved_by_fk` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_po_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_po_requisition` FOREIGN KEY (`requisition_id`) REFERENCES `resource_requisitions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_po_target_warehouse` FOREIGN KEY (`target_warehouse_id`) REFERENCES `inventory_locations` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_orders_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
