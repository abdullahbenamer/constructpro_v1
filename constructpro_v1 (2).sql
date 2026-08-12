-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2026 at 03:49 PM
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
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `country_id`, `website`, `created_at`) VALUES
(1, 'Siemens', 1, 'www.siemens.com', '2026-06-06 20:58:24'),
(2, 'TERASAKI', 2, 'www.terasaki.com', '2026-06-06 22:47:07'),
(3, 'Southwire', 3, 'www.southwire.com', '2026-06-08 19:39:47'),
(4, 'Coleman', 4, 'www.coleman.com', '2026-06-08 19:39:47'),
(5, 'Schneider Electric', 9, 'www.se.com', '2026-06-14 22:00:00'),
(6, 'ABB', 3, 'www.abb.com', '2026-06-14 22:00:00'),
(7, 'Eaton', 3, 'www.eaton.com', '2026-06-14 22:00:00'),
(8, 'Legrand', 9, 'www.legrand.com', '2026-06-14 22:00:00'),
(9, 'Hager', 1, 'www.hager.com', '2026-06-14 22:00:00'),
(10, 'Mitsubishi Electric', 8, 'www.mitsubishielectric.com', '2026-06-14 22:00:00'),
(11, 'Fuji Electric', 8, 'www.fujielectric.com', '2026-06-14 22:00:00'),
(12, 'LS Electric', 5, 'www.ls-electric.com', '2026-06-14 22:00:00'),
(13, 'Hyundai Electric', 5, 'www.hyundai-electric.com', '2026-06-14 22:00:00'),
(14, 'Chint', 5, 'www.chint.com', '2026-06-14 22:00:00'),
(15, 'Delixi Electric', 5, 'www.delixi-electric.com', '2026-06-14 22:00:00'),
(16, 'Havells', 10, 'www.havells.com', '2026-06-14 22:00:00'),
(17, 'Finolex', 10, 'www.finolex.com', '2026-06-14 22:00:00'),
(18, 'Polycab', 10, 'www.polycab.com', '2026-06-14 22:00:00'),
(19, 'Prysmian', 6, 'www.prysmian.com', '2026-06-14 22:00:00'),
(20, 'Nexans', 9, 'www.nexans.com', '2026-06-14 22:00:00'),
(21, 'WAGO', 1, 'www.wago.com', '2026-06-14 22:00:00'),
(22, 'Phoenix Contact', 1, 'www.phoenixcontact.com', '2026-06-14 22:00:00'),
(23, 'Weidmuller', 1, 'www.weidmueller.com', '2026-06-14 22:00:00'),
(24, 'Lovato Electric', 6, 'www.lovatoelectric.com', '2026-06-14 22:00:00'),
(25, 'Carlo Gavazzi', 6, 'www.carlogavazzi.com', '2026-06-14 22:00:00'),
(26, 'LAPP', 1, 'www.lapp.com', '2026-06-14 22:00:00'),
(27, 'Belden', 3, 'www.belden.com', '2026-06-14 22:00:00'),
(28, 'Hubbell', 3, 'www.hubbell.com', '2026-06-14 22:00:00'),
(29, 'Rockwell Automation', 3, 'www.rockwellautomation.com', '2026-06-14 22:00:00'),
(30, 'C&S Electric', 10, 'www.cselectric.co.in', '2026-06-14 22:00:00'),
(31, 'Anchor by Panasonic', 8, 'www.panasonic.com', '2026-06-14 22:00:00'),
(32, 'Schneider Electric Easy9', 9, 'www.se.com', '2026-06-14 22:00:00'),
(33, 'ABB System pro M', 3, 'www.abb.com', '2026-06-14 22:00:00'),
(34, 'ITTIHAD', 12, 'www.ittihad.ly', '2026-06-21 21:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `country_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `country_code`) VALUES
(1, 'Germany', 'DE'),
(2, 'Spain', 'ES'),
(3, 'United States', 'US'),
(4, 'United Kingdom', 'UK'),
(5, 'CHINA', 'CN'),
(6, 'ITALY', 'IT'),
(7, 'INDONESIA', 'ID'),
(8, 'JAPAN', 'JP'),
(9, 'FRANCE', 'FR'),
(10, 'INDIA', 'IN'),
(11, 'MALAYASIA', 'MY'),
(12, 'LIBYA', 'LY');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `account_manager_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `company`, `email`, `phone`, `address`, `status`, `created_at`, `account_manager_id`) VALUES
(2, 'Saad Atia', 'Libya Power Instrumentation Ltd', 'info@lpp.com', '0923456789', '', 'active', '2026-04-07 20:11:12', 6),
(5, 'Khaled Saadoun', 'Switchgear Electric Co.', 'info@khaled.ly', '0944567899', 'Misrata Industrial Area', 'active', '2026-04-07 20:34:24', 8);

-- --------------------------------------------------------

--
-- Table structure for table `goods_receipts`
--

CREATE TABLE `goods_receipts` (
  `id` int(11) NOT NULL,
  `grn_number` varchar(50) NOT NULL,
  `purchase_order_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `receipt_date` date NOT NULL,
  `subtotal` decimal(15,2) DEFAULT 0.00,
  `total_amount` decimal(15,2) DEFAULT 0.00,
  `remarks` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goods_receipt_items`
--

CREATE TABLE `goods_receipt_items` (
  `id` int(11) NOT NULL,
  `goods_receipt_id` int(11) NOT NULL,
  `purchase_order_item_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL,
  `unit_cost` decimal(15,2) NOT NULL,
  `total_cost` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `quantity` decimal(12,2) NOT NULL DEFAULT 0.00,
  `location_id` int(11) DEFAULT NULL,
  `min_stock` int(11) DEFAULT 10,
  `cost_price` decimal(10,2) DEFAULT 0.00,
  `base_unit` varchar(20) DEFAULT 'unit',
  `allow_fraction` tinyint(1) DEFAULT 0,
  `sale_unit` varchar(20) DEFAULT NULL,
  `units_per_sale` int(11) DEFAULT 1,
  `price_per_base` decimal(10,2) DEFAULT NULL,
  `price_per_sale` decimal(10,2) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `category`, `sku`, `quantity`, `location_id`, `min_stock`, `cost_price`, `base_unit`, `allow_fraction`, `sale_unit`, `units_per_sale`, `price_per_base`, `price_per_sale`, `brand_id`, `country_id`) VALUES
(1, 'MCB 1P 16A', 'MCB', 'MCB-1P-16A-SCH', 964.00, NULL, 20, 1.20, 'unit', 0, 'piece', 1, 2.50, 2.50, 5, 9),
(2, 'MCB 1P 20A', 'MCB', 'MCB-1P-20A-ABB', 158.00, NULL, 20, 1.10, 'unit', 0, 'piece', 1, 2.40, 2.40, 6, 3),
(3, 'MCB 1P 32A', 'Switchgear', 'MCB-1P-32A-CHNT', 1230.00, NULL, 20, 1.50, 'unit', 0, 'piece', 1, 2.10, 2.10, 14, 5),
(4, 'MCB 3P 63A', 'Switchgear', 'MCB-3P-63A-SCH', 5219.00, NULL, 10, 7.35, 'unit', 0, 'piece', 1, 9.80, 9.80, 5, 9),
(5, 'Contactor 25A 220V', 'Contactor', 'CT-25A-LS', 85.00, NULL, 10, 6.50, 'unit', 0, 'piece', 1, 12.00, 12.00, 12, 5),
(6, 'Contactor 40A 220V', 'Contactor', 'CT-40A-LS', 1001.00, NULL, 10, 8.20, 'unit', 0, 'piece', 1, 15.50, 15.50, 12, 5),
(7, 'Wall Socket 13A UK', 'Socket', 'SOC-13A-HVL', 860.00, NULL, 50, 0.80, 'unit', 0, 'piece', 1, 1.50, 1.50, 16, 10),
(8, 'Switch 1 Gang', 'Switch', 'SW-1G-HAG', 12342.00, NULL, 100, 0.60, 'unit', 0, 'piece', 1, 1.50, 1.50, 9, 1),
(9, 'PVC Cable 2.5mm²', 'Cable', 'PVC-2.5-SOUTH', 12590.00, NULL, 200, 0.30, 'meter', 1, 'roll', 100, 0.60, 60.00, 3, 3),
(10, 'Terminal Block 2.5mm', 'Terminal', 'TB-2.5-WAGO', 784.00, NULL, 100, 0.20, 'unit', 0, 'piece', 1, 0.50, 0.50, 21, 1),
(105, 'Cement', 'Switchgear', 'cem-1234', 600.00, 1, 100, 75.00, 'unit', 0, NULL, 1, 100.00, 100.00, 34, 12),
(106, 'Man Boot', 'Switchgear', 'MB-123', 506.00, 3, 50, 450.00, 'unit', 0, NULL, 1, 570.00, 570.00, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_locations`
--

CREATE TABLE `inventory_locations` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `storekeeper_id` int(11) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_locations`
--

INSERT INTO `inventory_locations` (`id`, `code`, `name`, `notes`, `address`, `storekeeper_id`, `mobile`, `created_at`) VALUES
(1, 'MAIN WH', 'MAIN WAREHOUSE', 'Central Main Warehouse', 'Central Main Warehouse', 12, '092609876', '2026-06-12 06:27:59'),
(2, 'TAJORA', 'TAJORA WH', 'مخزن النشيع', 'مخزن النشيع', 12, '098723654', '2026-06-12 06:27:59'),
(3, 'JANZOUR', 'JANZOUR WAREHOUSE', 'Janzour Center', 'Janzour Center', 15, '0942787698', '2026-06-12 06:27:59'),
(4, 'MUSRATA', 'MUSRATA WAREHOUSE', 'Musrata, Tripoli Street', 'Musrata, Tripoli Street', 15, '0938765989', '2026-06-12 06:27:59'),
(19, 'EX-WH', 'Extra Warehouse', 'Virtual store', 'Zintan south', 12, '0911987654', '2026-07-22 03:33:42'),
(20, 'WH123', 'Znata branch', 'some notes here', 'Tripoli', 11, '09165348765', '2026-07-22 07:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_location_stock`
--

CREATE TABLE `inventory_location_stock` (
  `id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `quantity` decimal(12,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_location_stock`
--

INSERT INTO `inventory_location_stock` (`id`, `inventory_id`, `location_id`, `quantity`) VALUES
(53, 1, 1, 171.00),
(54, 1, 2, 279.00),
(55, 1, 3, 465.00),
(56, 1, 4, 49.00),
(59, 2, 1, 70.00),
(60, 2, 2, 43.00),
(61, 2, 3, 5.00),
(62, 2, 4, 40.00),
(65, 3, 1, 108.00),
(66, 3, 2, 690.00),
(67, 3, 3, 300.00),
(68, 3, 4, 40.00),
(71, 4, 1, 90.00),
(72, 4, 2, 25.00),
(73, 4, 3, 79.00),
(74, 4, 4, 5025.00),
(77, 5, 1, 11.00),
(78, 5, 2, 25.00),
(79, 5, 3, 22.00),
(80, 5, 4, 27.00),
(83, 6, 1, 19.00),
(84, 6, 2, 20.00),
(85, 6, 3, 0.00),
(86, 6, 4, 962.00),
(89, 7, 1, 450.00),
(90, 7, 2, 120.00),
(91, 7, 3, 210.00),
(92, 7, 4, 80.00),
(95, 8, 1, 11893.00),
(96, 8, 2, 49.00),
(97, 8, 3, 100.00),
(98, 8, 4, 100.00),
(101, 9, 1, 600.00),
(102, 9, 2, 1000.00),
(103, 9, 3, 600.00),
(104, 9, 4, 10390.00),
(107, 10, 1, 130.00),
(108, 10, 2, 218.00),
(109, 10, 3, 236.00),
(110, 10, 4, 200.00),
(113, 105, 1, 400.00),
(114, 105, 4, 100.00),
(115, 106, 3, 490.00),
(116, 3, 19, 0.00),
(117, 106, 19, 16.00),
(118, 3, 20, 92.00),
(119, 8, 20, 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_movements`
--

CREATE TABLE `inventory_movements` (
  `id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `type` enum('IN','OUT','ADJUSTMENT','TRANSFER') NOT NULL,
  `quantity` decimal(12,2) NOT NULL,
  `unit_cost` decimal(10,2) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `movement_by` int(11) DEFAULT NULL,
  `balance_after` decimal(12,2) DEFAULT NULL,
  `global_balance_after` decimal(12,2) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_movements`
--

INSERT INTO `inventory_movements` (`id`, `inventory_id`, `location_id`, `type`, `quantity`, `unit_cost`, `supplier_id`, `supplier`, `movement_by`, `balance_after`, `global_balance_after`, `reference`, `notes`, `created_by`, `created_at`) VALUES
(217, 3, 3, 'OUT', 50.00, NULL, NULL, NULL, NULL, 300.00, NULL, 'PROJECT #43', 'MCB 1P 32A', 1, '2026-08-09 13:16:03'),
(218, 3, 3, 'IN', 50.00, NULL, NULL, NULL, NULL, 300.00, NULL, 'DELETE PROJECT #43', 'Restore deleted material', 1, '2026-08-09 13:19:43'),
(219, 5, 1, 'OUT', 10.00, NULL, NULL, NULL, NULL, 11.00, NULL, 'PROJECT #43', 'Contactor 25A 220V', 1, '2026-08-09 14:51:23'),
(220, 5, 1, 'IN', 10.00, NULL, NULL, NULL, NULL, 11.00, NULL, 'DELETE PROJECT #43', 'Restore deleted material', 1, '2026-08-10 09:55:49'),
(221, 5, 1, 'OUT', 10.00, NULL, NULL, NULL, NULL, 1.00, NULL, 'PROJECT #43', 'Contactor 25A 220V', 1, '2026-08-10 11:07:51'),
(222, 5, 1, 'IN', 10.00, NULL, NULL, NULL, NULL, 11.00, NULL, 'PROJECT #43', 'Contactor 25A 220V', 1, '2026-08-10 11:10:18'),
(223, 106, 3, 'OUT', 4.00, NULL, NULL, NULL, NULL, 490.00, NULL, 'PROJECT #43', 'Man Boot', 1, '2026-08-10 13:03:38'),
(224, 6, 1, 'OUT', 8.00, NULL, NULL, NULL, NULL, 19.00, NULL, 'PROJECT #43', 'Contactor 40 Am 220 Volt', 1, '2026-08-11 07:57:29'),
(225, 8, 1, 'OUT', 10.00, NULL, NULL, NULL, NULL, 11890.00, NULL, 'PROJECT #43', 'Switch 1 Gang', 1, '2026-08-11 09:33:10'),
(226, 8, 1, 'OUT', 5.00, NULL, NULL, NULL, NULL, 11885.00, NULL, 'PROJECT #43', 'Switch 1 Gang for room lights', 1, '2026-08-11 09:39:31'),
(227, 8, 1, 'IN', 8.00, NULL, NULL, NULL, NULL, 11893.00, NULL, 'PROJECT #43', 'Switch 1 Gang 7 for room lights', 1, '2026-08-11 09:58:53'),
(228, 9, 1, 'OUT', 98.00, NULL, NULL, NULL, NULL, 600.00, 12590.00, 'PROJECT #43', 'PVC Cable 2.5mm²', 1, '2026-08-11 10:49:17'),
(229, 10, 3, 'OUT', 5.00, NULL, NULL, NULL, NULL, 236.00, 784.00, 'PROJECT #43', 'Terminal Block 2.5mm', 1, '2026-08-11 12:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_reservations`
--

CREATE TABLE `inventory_reservations` (
  `id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `quantity` decimal(12,2) NOT NULL,
  `status` enum('ACTIVE','FULFILLED','CANCELLED') DEFAULT 'ACTIVE',
  `reference` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `required_by_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_transfers`
--

CREATE TABLE `inventory_transfers` (
  `id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `from_location_id` int(11) NOT NULL,
  `to_location_id` int(11) NOT NULL,
  `quantity` decimal(12,2) NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reversed_at` datetime DEFAULT NULL,
  `reversed_by` int(11) DEFAULT NULL,
  `reversal_transfer_id` int(11) DEFAULT NULL,
  `status` enum('COMPLETED','REVERSED','','') NOT NULL DEFAULT 'COMPLETED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location_switch_log`
--

CREATE TABLE `location_switch_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `old_location_id` int(11) DEFAULT NULL,
  `new_location_id` int(11) NOT NULL,
  `switched_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`) VALUES
(1, 'users.view', 'View users'),
(2, 'users.create', 'Create users'),
(3, 'users.edit', 'Edit users'),
(4, 'users.delete', 'Delete users'),
(5, 'projects.view', 'View projects'),
(6, 'inventory.view', 'View inventory'),
(7, 'costs.view', 'View project costs'),
(8, 'admin.access', 'Access admin panel'),
(10, 'projects.create', 'Create projects'),
(11, 'projects.edit', 'Edit projects'),
(12, 'inventory.edit', 'Edit inventory items'),
(13, 'finance.view', 'View finance'),
(15, 'services.view', 'View services'),
(16, 'reports.view', 'View reports'),
(17, 'customers.view', 'View customers'),
(18, 'customers.create', 'Create customers'),
(19, 'customers.edit', 'Edit customers'),
(20, 'customers.delete', 'Delete customers'),
(21, 'inventory.create', 'Create inventory items'),
(22, 'inventory.delete', 'Delete inventory items'),
(23, 'projects.delete', 'Delete projects'),
(24, 'services.create', 'Create services'),
(25, 'services.edit', 'Edit services'),
(26, 'services.delete', 'Delete services'),
(27, 'pos.view', 'View POS'),
(28, 'pos.create', 'Create POS sales'),
(29, 'inventory_movements.view', 'View inventory movements'),
(30, 'inventory_movements.create', 'Create inventory movements'),
(31, 'inventory_locations.view', 'View inventory locations'),
(32, 'inventory_locations.create', 'Create inventory locations'),
(33, 'stock_transfers.view', 'View stock transfers'),
(34, 'stock_transfers.create', 'Create stock transfers'),
(35, 'inventory_reservations.view', 'View inventory reservations'),
(36, 'inventory_reservations.create', 'Create inventory reservations'),
(37, 'purchase_orders.view', 'View purchase orders'),
(38, 'purchase_orders.create', 'Create purchase orders'),
(39, 'suppliers.view', 'View suppliers'),
(40, 'suppliers.create', 'Create suppliers'),
(42, 'pos.change_location', 'Allow user to change POS warehouse/location'),
(43, 'resource_requisitions.approve', 'Approve Resource Requisitions');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
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

INSERT INTO `projects` (`id`, `customer_id`, `title`, `project_type`, `description`, `deadline`, `status`, `budget`, `created_at`, `is_archived`, `site_location`, `start_date`, `project_manager_id`, `contract_number`, `project_code`, `priority`) VALUES
(43, 2, 'building School', 'construction', 'building School 1,500,000', '2026-10-28', 'planning', 1500000.00, '2026-08-08 20:59:33', 0, 'sirte', '2026-08-16', 1, '386', 'sc-386', 'high');

-- --------------------------------------------------------

--
-- Table structure for table `project_advances`
--

CREATE TABLE `project_advances` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `received_by` int(11) DEFAULT NULL,
  `advance_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('received','reversed') DEFAULT 'received',
  `attachment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_advances`
--

INSERT INTO `project_advances` (`id`, `project_id`, `amount`, `payment_method`, `reference`, `notes`, `received_by`, `advance_date`, `created_at`, `status`, `attachment`) VALUES
(14, 43, 100000.00, 'Cash', 'test', 'test note', 1, '2026-08-09', '2026-08-09 14:27:45', 'received', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_construction_details`
--

CREATE TABLE `project_construction_details` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `construction_type` varchar(100) DEFAULT NULL,
  `site_area` decimal(12,2) DEFAULT NULL,
  `builtup_area` decimal(12,2) DEFAULT NULL,
  `floors` int(11) DEFAULT NULL,
  `structural_system` varchar(255) DEFAULT NULL,
  `consultant` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_costs`
--

CREATE TABLE `project_costs` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `inventory_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `cost_type` enum('materials','labor','transport','subcontract','misc') NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT 1.00,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `unit_price`) STORED,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_costs`
--

INSERT INTO `project_costs` (`id`, `project_id`, `inventory_id`, `location_id`, `cost_type`, `description`, `quantity`, `unit_price`, `created_at`) VALUES
(151, 43, 106, 3, 'materials', 'Man Boot', 4.00, 450.00, '2026-08-10 13:03:38'),
(152, 43, NULL, NULL, 'transport', 'carrying Blocks from to', 2.00, 250.00, '2026-08-11 06:19:01'),
(153, 43, 6, 1, 'materials', 'Contactor 40 Am 220 Volts', 8.00, 8.20, '2026-08-11 07:57:29'),
(154, 43, 8, 1, 'materials', 'Switch 1 Gang - room lights Fixture', 7.00, 0.60, '2026-08-11 09:33:10'),
(155, 43, 9, 1, 'materials', 'PVC Cable 2.5mm²', 98.00, 0.30, '2026-08-11 10:49:17'),
(156, 43, 10, 3, 'materials', 'Terminal Block 2.5mm', 5.00, 0.20, '2026-08-11 12:40:40'),
(157, 43, NULL, NULL, 'subcontract', 'finishing basement for the fence', 100.00, 100.00, '2026-08-11 12:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `project_documents`
--

CREATE TABLE `project_documents` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `category` enum('contract','drawing','quotation','invoice','receipt','purchase_order','inspection','report','photo','certificate','permit','manual','other') DEFAULT 'other',
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `original_name` varchar(255) NOT NULL,
  `stored_name` varchar(255) NOT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `file_size` bigint(20) DEFAULT NULL,
  `document_date` date DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_electrical_details`
--

CREATE TABLE `project_electrical_details` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `panel_type` varchar(100) DEFAULT NULL,
  `voltage_rating` varchar(100) DEFAULT NULL,
  `protection_system` varchar(255) DEFAULT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_inspection_details`
--

CREATE TABLE `project_inspection_details` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `inspection_type` varchar(100) DEFAULT NULL,
  `standard_used` varchar(255) DEFAULT NULL,
  `equipment_used` varchar(255) DEFAULT NULL,
  `report_number` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_ledger`
--

CREATE TABLE `project_ledger` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `entry_type` enum('advance','cost') NOT NULL,
  `ref_table` varchar(50) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `debit` decimal(15,2) DEFAULT 0.00,
  `credit` decimal(15,2) DEFAULT 0.00,
  `balance_after` decimal(15,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_ledger`
--

INSERT INTO `project_ledger` (`id`, `project_id`, `entry_type`, `ref_table`, `ref_id`, `description`, `debit`, `credit`, `balance_after`, `created_at`) VALUES
(44, 43, 'cost', 'project_costs', 146, 'MCB 1P 32A', 75.00, 0.00, -75.00, '2026-08-09 13:16:03'),
(45, 43, 'cost', 'project_costs', 147, 'renovation office', 1000.00, 0.00, -1075.00, '2026-08-09 14:25:20'),
(46, 43, 'advance', 'project_advances', 14, 'test', 0.00, 100000.00, 98925.00, '2026-08-09 14:27:45'),
(47, 43, 'cost', 'project_costs', 148, 'Contactor 25A 220V', 65.00, 0.00, 98860.00, '2026-08-09 14:51:23'),
(48, 43, 'cost', 'project_costs', 149, '2 masonary', 200.00, 0.00, 98660.00, '2026-08-10 09:51:27'),
(49, 43, 'cost', 'project_costs', 150, 'Contactor 25A 220V', 65.00, 0.00, 98595.00, '2026-08-10 11:07:51'),
(50, 43, '', 'project_costs', 150, 'Reversal: Contactor 25A 220V', 0.00, 65.00, 98660.00, '2026-08-10 11:10:18'),
(51, 43, 'cost', 'project_costs', 151, 'Man Boot', 1800.00, 0.00, 96860.00, '2026-08-10 13:03:38'),
(52, 43, '', 'project_costs', 149, 'Reversal: 2 masonary', 0.00, 200.00, 97060.00, '2026-08-10 13:11:52'),
(53, 43, 'cost', 'project_costs', 152, 'carrying Blocks from to', 500.00, 0.00, 96560.00, '2026-08-11 06:19:01'),
(54, 43, 'cost', 'project_costs', 153, 'Contactor 40 Am 220 Volt', 65.60, 0.00, 96494.40, '2026-08-11 07:57:29'),
(55, 43, 'cost', 'project_costs', 154, 'Switch 1 Gang - room lights Fixture', 4.20, 0.00, 96490.20, '2026-08-11 09:33:10'),
(56, 43, 'cost', 'project_costs', 155, 'PVC Cable 2.5mm²', 29.40, 0.00, 96460.80, '2026-08-11 10:49:17'),
(57, 43, 'cost', 'project_costs', 156, 'Terminal Block 2.5mm', 1.00, 0.00, 96459.80, '2026-08-11 12:40:40'),
(58, 43, 'cost', 'project_costs', 157, 'finishing basement for the fence', 10000.00, 0.00, 86459.80, '2026-08-11 12:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `project_settlements`
--

CREATE TABLE `project_settlements` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `advance_id` int(11) DEFAULT NULL,
  `cost_id` int(11) DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL,
  `settlement_type` enum('advance_to_cost') NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `total_amount` decimal(12,2) DEFAULT 0.00,
  `notes` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `quantity` decimal(12,2) NOT NULL,
  `unit_cost` decimal(12,2) NOT NULL,
  `total_cost` decimal(12,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` int(11) NOT NULL,
  `po_number` varchar(50) DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_items`
--

CREATE TABLE `purchase_order_items` (
  `id` int(11) NOT NULL,
  `purchase_order_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL,
  `received_quantity` decimal(15,2) DEFAULT 0.00,
  `unit_cost` decimal(15,2) NOT NULL,
  `total_cost` decimal(15,2) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `resource_code` varchar(50) NOT NULL,
  `resource_name` varchar(150) NOT NULL,
  `resource_name_a` varchar(150) DEFAULT NULL,
  `resource_type` enum('MATERIAL','EQUIPMENT','LABOR','SERVICE') DEFAULT 'MATERIAL',
  `unit_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `resource_code`, `resource_name`, `resource_name_a`, `resource_type`, `unit_id`, `description`, `status`, `created_at`, `category_id`) VALUES
(1, 'CON', 'test', 'تجربة', 'MATERIAL', 1, 'description description description description description description description description description description description description description.', 'ACTIVE', '2026-07-12 06:37:58', 1),
(2, 'MAT-0001', 'Portland Cement', 'أسمنت بورتلاندي', 'MATERIAL', 1, '50kg bag', 'ACTIVE', '2026-07-13 07:52:15', 1),
(3, 'MAT-0002', 'River Sand', 'رمل', 'MATERIAL', 2, 'Fine washed sand', 'ACTIVE', '2026-07-13 07:52:15', 1),
(4, 'MAT-0003', 'Gravel 3/4\"', 'حصى 3/4', 'MATERIAL', 2, 'Concrete aggregate', 'ACTIVE', '2026-07-13 07:52:15', 1),
(5, 'MAT-0004', 'Hollow Block 20x20x40', 'طوب إسمنتي', 'MATERIAL', 3, 'Standard hollow block', 'ACTIVE', '2026-07-13 07:52:15', 1),
(6, 'MAT-0005', 'Reinforcing Steel 16mm', 'حديد تسليح 16 مم', 'MATERIAL', 4, 'High tensile steel bar', 'ACTIVE', '2026-07-13 07:52:15', 2),
(7, 'MAT-0006', 'Binding Wire', 'سلك ربط', 'MATERIAL', 5, 'GI binding wire', 'ACTIVE', '2026-07-13 07:52:15', 2),
(8, 'MAT-0007', 'Marine Plywood 12mm', 'خشب أبلكاش بحري', 'MATERIAL', 6, 'Formwork plywood', 'ACTIVE', '2026-07-13 07:52:15', 3),
(9, 'MAT-0008', 'Common Nail 3\"', 'مسامير 3 بوصة', 'MATERIAL', 5, 'Steel nails', 'ACTIVE', '2026-07-13 07:52:15', 3),
(10, 'MAT-0009', 'PVC Pipe 2\"', 'أنبوب PVC 2 بوصة', 'MATERIAL', 4, 'Water supply pipe', 'ACTIVE', '2026-07-13 07:52:15', 4),
(11, 'MAT-0010', 'Electrical Wire 2.5mm²', 'سلك كهربائي 2.5 مم', 'MATERIAL', 4, 'Copper electrical wire', 'ACTIVE', '2026-07-13 07:52:15', 5),
(12, 'EQP-0001', 'Concrete Mixer', 'خلاطة خرسانة', 'EQUIPMENT', 7, 'Portable concrete mixer', 'ACTIVE', '2026-07-13 07:52:15', 6),
(13, 'EQP-0002', 'Plate Compactor', 'دكاكة تربة', 'EQUIPMENT', 7, 'Soil compaction machine', 'ACTIVE', '2026-07-13 07:52:15', 6),
(14, 'EQP-0003', 'Excavator', 'حفارة', 'EQUIPMENT', 8, 'Hydraulic excavator', 'ACTIVE', '2026-07-13 07:52:15', 6),
(15, 'EQP-0004', 'Tower Crane', 'رافعة برجية', 'EQUIPMENT', 8, 'Heavy lifting equipment', 'ACTIVE', '2026-07-13 07:52:15', 6),
(16, 'EQP-0005', 'Generator 100kVA', 'مولد كهرباء', 'EQUIPMENT', 8, 'Diesel generator', 'ACTIVE', '2026-07-13 07:52:15', 6),
(17, 'LAB-0001', 'Civil Engineer', 'مهندس مدني', 'LABOR', 9, 'Professional engineer', 'ACTIVE', '2026-07-13 07:52:15', 7),
(18, 'LAB-0002', 'Site Supervisor', 'مشرف موقع', 'LABOR', 9, 'Construction supervisor', 'ACTIVE', '2026-07-13 07:52:15', 7),
(19, 'LAB-0003', 'Mason', 'عامل بناء', 'LABOR', 9, 'Block laying and plastering', 'ACTIVE', '2026-07-13 07:52:15', 7),
(20, 'LAB-0004', 'Carpenter', 'نجار', 'LABOR', 9, 'Formwork carpenter', 'ACTIVE', '2026-07-13 07:52:15', 7),
(21, 'LAB-0005', 'Steel Fixer', 'حداد تسليح', 'LABOR', 9, 'Rebar installation', 'ACTIVE', '2026-07-13 07:52:15', 7),
(22, 'LAB-0006', 'Electrician', 'كهربائي', 'LABOR', 9, 'Electrical installation', 'ACTIVE', '2026-07-13 07:52:15', 7),
(23, 'LAB-0007', 'Plumber', 'سباك', 'LABOR', 9, 'Plumbing installation', 'ACTIVE', '2026-07-13 07:52:15', 7),
(24, 'SRV-0001', 'Concrete Pumping', 'ضخ الخرسانة', 'SERVICE', 10, 'Concrete pumping service', 'ACTIVE', '2026-07-13 07:52:15', 8),
(25, 'SRV-0002', 'Survey Works', 'أعمال المساحة', 'SERVICE', 10, 'Topographic survey', 'ACTIVE', '2026-07-13 07:52:15', 8),
(26, 'SRV-0003', 'Equipment Rental', 'تأجير معدات', 'SERVICE', 10, 'Heavy equipment rental', 'ACTIVE', '2026-07-13 07:52:15', 8),
(27, 'SRV-0004', 'Material Delivery', 'نقل المواد', 'SERVICE', 10, 'Transportation service', 'ACTIVE', '2026-07-13 07:52:15', 8),
(28, 'SRV-0005', 'Labor Supply', 'توريد عمالة', 'SERVICE', 10, 'Temporary labor supply', 'ACTIVE', '2026-07-13 07:52:15', 8);

-- --------------------------------------------------------

--
-- Table structure for table `resource_categories`
--

CREATE TABLE `resource_categories` (
  `id` int(11) NOT NULL,
  `category_code` varchar(30) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_name_a` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource_categories`
--

INSERT INTO `resource_categories` (`id`, `category_code`, `category_name`, `category_name_a`, `description`, `status`, `created_at`) VALUES
(1, 'CON', 'Concrete', NULL, NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(2, 'STL', 'Steel', NULL, NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(3, 'MAS', 'Masonry', NULL, NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(4, 'ELE', 'Electrical', NULL, NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(5, 'PLB', 'Plumbing', NULL, NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(6, 'HVAC', 'HVAC', NULL, NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(7, 'FIN', 'Finishes', NULL, NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(8, 'EQP', 'Equipment', NULL, NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(9, 'TLS', 'Tools', NULL, NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(10, 'LAB', 'Labor', NULL, NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(11, 'SRV', 'Services', NULL, NULL, 'ACTIVE', '2026-07-12 05:40:56');

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
  `priority` enum('LOW','NORMAL','HIGH','URGENT','CRITICAL') DEFAULT 'NORMAL',
  `status` enum('DRAFT','SUBMITTED','APPROVED','REJECTED','CANCELLED') DEFAULT 'DRAFT',
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

-- --------------------------------------------------------

--
-- Table structure for table `resource_requisition_approvals`
--

CREATE TABLE `resource_requisition_approvals` (
  `id` int(11) NOT NULL,
  `requisition_id` int(11) NOT NULL,
  `action` enum('SUBMITTED','APPROVED','REJECTED','RETURNED') NOT NULL,
  `action_by` int(11) NOT NULL,
  `remarks` text DEFAULT NULL,
  `action_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource_requisition_attachments`
--

CREATE TABLE `resource_requisition_attachments` (
  `id` int(11) NOT NULL,
  `requisition_id` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `original_name` varchar(255) DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource_requisition_comments`
--

CREATE TABLE `resource_requisition_comments` (
  `id` int(11) NOT NULL,
  `requisition_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource_requisition_items`
--

CREATE TABLE `resource_requisition_items` (
  `id` int(11) NOT NULL,
  `requisition_id` int(11) NOT NULL,
  `resource_type` enum('MATERIAL','SERVICE','MANPOWER','EQUIPMENT','LOGISTICS','VEHICLE','RENTAL','OTHER') NOT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `uom` varchar(30) DEFAULT NULL,
  `quantity` decimal(15,2) DEFAULT 1.00,
  `estimated_unit_cost` decimal(15,2) DEFAULT 0.00,
  `estimated_total` decimal(15,2) DEFAULT 0.00,
  `remarks` text DEFAULT NULL,
  `status` enum('OPEN','PARTIAL','FULFILLED','CANCELLED') DEFAULT 'OPEN',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `resource_source` enum('INVENTORY','RESOURCE') DEFAULT 'RESOURCE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(5, 'accountant'),
(1, 'admin'),
(7, 'cashier'),
(3, 'engineer'),
(2, 'manager'),
(8, 'STOREKEEPER'),
(4, 'technician'),
(10, 'test'),
(9, 'USER');

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
(1, 27),
(1, 28),
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
(1, 42),
(2, 5),
(2, 6),
(2, 7),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 15),
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
(2, 42),
(2, 43),
(3, 5),
(3, 6),
(3, 7),
(3, 11),
(3, 12),
(3, 13),
(3, 15),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 24),
(3, 25),
(4, 5),
(4, 6),
(4, 11),
(4, 12),
(4, 15),
(4, 21),
(4, 24),
(4, 25),
(5, 5),
(5, 6),
(5, 7),
(5, 13),
(5, 27),
(5, 28),
(5, 42),
(7, 6),
(7, 12),
(7, 17),
(7, 18),
(7, 19),
(7, 21),
(7, 27),
(7, 28),
(8, 5),
(8, 6),
(8, 12),
(8, 17),
(8, 21),
(8, 27),
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

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `technician_id` int(11) DEFAULT NULL,
  `service_type` varchar(100) DEFAULT NULL,
  `scheduled_date` date DEFAULT NULL,
  `status` enum('scheduled','in_progress','completed','cancelled') DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_costs`
--

CREATE TABLE `service_costs` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `inventory_id` int(11) DEFAULT NULL,
  `cost_type` enum('materials','labor','transport','misc') NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT 1.00,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `unit_price`) STORED,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contacts` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `logo`, `address`, `contacts`, `created_at`, `updated_at`) VALUES
(1, 'BONYA ALEAMAR - بنية الاعمار الهندسية', 'uploads/1782371337_ba-logo-logo.png', ' Tripoli, Seyahiya', '+218910610067', '2026-06-24 07:24:04', '2026-06-25 07:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `company_name`, `contact_person`, `phone`, `email`, `address`, `notes`, `created_at`) VALUES
(1, 'ABB Libya', 'Ahmed Salem', '+218911111115', 'sales@abb-libya.ly', 'Tripoli Industrial Area', 'Authorized ABB distributor and local', '2026-05-08 07:56:15'),
(2, 'Siemens Libya', 'Mohamed Ali', '+218922222222', 'supply@siemens.ly', 'Misrata', 'Protection relays supplier', '2026-05-08 07:56:15'),
(3, 'General Electric Supplies', 'Khaled Omar', '+218933333333', 'info@gesupplies.ly', 'Benghazi', 'General electrical materials', '2026-05-08 07:56:15'),
(4, 'Almadar Industrial', 'Hassan Faraj', '+218944444444', 'sales@almadar.ly', 'Tripoli', 'Cables and accessories', '2026-05-08 07:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_ledger`
--

CREATE TABLE `supplier_ledger` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `type` enum('GRN','PAYMENT','DEBIT_NOTE','CREDIT_NOTE') NOT NULL,
  `reference_type` varchar(50) DEFAULT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `direction` enum('DEBIT','CREDIT') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payments`
--

CREATE TABLE `supplier_payments` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `method` varchar(50) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment_allocations`
--

CREATE TABLE `supplier_payment_allocations` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `goods_receipt_id` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technicians`
--

CREATE TABLE `technicians` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `specialty` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technicians`
--

INSERT INTO `technicians` (`id`, `name`, `email`, `phone`, `specialty`, `status`) VALUES
(1, 'Mohamed Ibrahim', 'mohamed@ems.com', '0911111111', 'Switchgear Installation', 'active'),
(2, 'Salem Ahmed', 'salem@ems.com', '0922222222', 'Protection Systems', 'active'),
(3, 'Fatima Omar', 'fatima@ems.com', '0933333333', 'Maintenance & Testing', 'active'),
(4, 'Karim Ali', 'karim@ems.com', '0944444444', 'High Voltage Panels', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit_code` varchar(20) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `unit_name_a` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_code`, `unit_name`, `unit_name_a`, `description`, `status`, `created_at`) VALUES
(1, 'PCS', 'Pieces', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(2, 'BOX', 'Box', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(3, 'BAG', 'Bag', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(4, 'ROLL', 'Roll', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(5, 'SET', 'Set', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(6, 'PAIR', 'Pair', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(7, 'KG', 'Kilogram', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(8, 'G', 'Gram', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(9, 'TON', 'Ton', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(10, 'M', 'Meter', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(11, 'CM', 'Centimeter', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(12, 'MM', 'Millimeter', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(13, 'KM', 'Kilometer', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(14, 'M2', 'Square Meter', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(15, 'M3', 'Cubic Meter', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(16, 'LTR', 'Liter', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(17, 'DAY', 'Day', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(18, 'HR', 'Hour', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(19, 'WK', 'Week', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(20, 'MONTH', 'Month', NULL, NULL, 'ACTIVE', '2026-07-12 05:15:58');

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
(8, 'Ali Salem', 'Ali', 'tech@ems.com', NULL, '$2y$10$uNBYvJRdBnd5xdlc8ADmb.oCxl4EIVLmd3kuftCWcW7Epbj7CiQrK', '2026-04-07 20:34:24', 4, NULL, NULL),
(11, 'Abdullah Ben Amer', 'Amer', 'benamer@gmail.com', NULL, '$2y$10$YSYPAjp4O/R.pe40wv4Equfr18/r70omV36YJkE5VU94iTeDCF2P6', '2026-04-20 20:29:44', 8, NULL, NULL),
(12, 'Sumaya Abdullah', 'Sumaya', 'sumaya@ems.com', '+2189123457687', '$2y$10$Y.8EQGCefp30HlCMXKLS2OMuMbWAxnaTRHR88HX8AzTRbHRPoYxgG', '2026-04-22 11:59:21', 8, 2, NULL),
(13, 'Mustafa Saqer', 'Mustafa', 'cash@ems.com', '+2189123457687', '$2y$10$XeB5nEBG9iuu87/pCrjMU.tVgMAxOpvl7j5uYhQ9b/TbTXrCg/fM.', '2026-04-24 20:14:40', 7, NULL, NULL),
(14, 'Taha Hussain', 'Taha', 'th@ems.com', '+2189123457687', '$2y$10$fLhJosWCRxuPtL0C/s5dTup98BZ11Xa0n72HW4qLCBGdEGM0byvEW', '2026-06-12 15:52:02', 2, 2, NULL),
(15, 'khalil salem', 'salem', 'ks@ems.com', '+2189123457687', '$2y$10$1QScFHLSeyeWP2bcjk4fnujmDhz0hFGFYGLl8H1W09fIa9ymw2mMm', '2026-06-19 16:29:37', 8, 19, NULL),
(16, 'abdulatif musa', 'abdulatif', 'am@ems.com', '+2189123776487', '$2y$10$8XhNe1z5DDXy2MNAV2EYxeiFknJcIG8ZQyP6EgPzFgpchzjNVmWdO', '2026-06-19 16:50:12', 7, 18, NULL),
(17, 'faraj mugharbi', 'faraj', 'fm@ems.com', '+2189127657687', '$2y$10$pA06wD0MRIA4COTnDPVEt.tlEPyPdrj/Ebkf9RTyzzkaLjuCwRd22', '2026-06-20 08:00:48', 7, 2, NULL),
(18, 'sami khalid', 'sami', 'sami@ems.com', '+2189123457687', '$2y$10$KclciMNyrrKA/6MZSlCGy.aEY0ekS4bMttTrcTmKMeP6Nv17VVbpO', '2026-06-25 05:50:21', 5, 2, NULL),
(19, 'test permissions', 'test perm', 'test@ems.com', NULL, '$2y$10$ODoFA.hgkqfKgTZ6WZI.teb00KNkJFl13C2vn8/smTFvyAe8WmKtS', '2026-07-22 16:42:24', 10, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_locations`
--

CREATE TABLE `user_locations` (
  `user_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_locations`
--

INSERT INTO `user_locations` (`user_id`, `location_id`) VALUES
(1, 2),
(1, 3),
(1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`brand_name`),
  ADD KEY `brands_countries_FK` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_customers_company` (`company`),
  ADD UNIQUE KEY `uq_customers_email` (`email`),
  ADD UNIQUE KEY `uq_customers_phone` (`phone`),
  ADD KEY `customers_account_manager_fk` (`account_manager_id`);

--
-- Indexes for table `goods_receipts`
--
ALTER TABLE `goods_receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_order_id` (`purchase_order_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `goods_receipt_items`
--
ALTER TABLE `goods_receipt_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goods_receipt_id` (`goods_receipt_id`),
  ADD KEY `purchase_order_item_id` (`purchase_order_item_id`),
  ADD KEY `inventory_id` (`inventory_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `inventory_locations_FK` (`location_id`) USING BTREE;

--
-- Indexes for table `inventory_locations`
--
ALTER TABLE `inventory_locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `fk_storekeeper` (`storekeeper_id`);

--
-- Indexes for table `inventory_location_stock`
--
ALTER TABLE `inventory_location_stock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_stock` (`inventory_id`,`location_id`);

--
-- Indexes for table `inventory_movements`
--
ALTER TABLE `inventory_movements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_id` (`inventory_id`),
  ADD KEY `inventory_locations_ibfk_2` (`location_id`),
  ADD KEY `supplier_ibfk_3` (`supplier_id`),
  ADD KEY `moved_by_ibfk_4` (`movement_by`),
  ADD KEY `created_by_ibfk_5` (`created_by`);

--
-- Indexes for table `inventory_reservations`
--
ALTER TABLE `inventory_reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_created_by_fk` (`created_by`),
  ADD KEY `reservation_inventory_fk` (`inventory_id`),
  ADD KEY `reservation_location_fk` (`location_id`),
  ADD KEY `reservation_project_fk` (`project_id`);

--
-- Indexes for table `inventory_transfers`
--
ALTER TABLE `inventory_transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transfer_inventory` (`inventory_id`),
  ADD KEY `fk_transfer_from_location` (`from_location_id`),
  ADD KEY `fk_transfer_to_location` (`to_location_id`),
  ADD KEY `fk_transfer_created_by` (`created_by`);

--
-- Indexes for table `location_switch_log`
--
ALTER TABLE `location_switch_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_name` (`name`) USING BTREE;

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_customer_fk` (`customer_id`),
  ADD KEY `project_manager_fk` (`project_manager_id`);

--
-- Indexes for table `project_advances`
--
ALTER TABLE `project_advances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `advance_received_by_fk` (`received_by`);

--
-- Indexes for table `project_construction_details`
--
ALTER TABLE `project_construction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_costs`
--
ALTER TABLE `project_costs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `inventory_id` (`inventory_id`),
  ADD KEY `project_costs_location_fk` (`location_id`);

--
-- Indexes for table `project_documents`
--
ALTER TABLE `project_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `uploaded_by` (`uploaded_by`);

--
-- Indexes for table `project_electrical_details`
--
ALTER TABLE `project_electrical_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_inspection_details`
--
ALTER TABLE `project_inspection_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_ledger`
--
ALTER TABLE `project_ledger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projectid_ledger-fk` (`project_id`);

--
-- Indexes for table `project_settlements`
--
ALTER TABLE `project_settlements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `project_advance_settlement_fk` (`advance_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_fk` (`supplier_id`),
  ADD KEY `created_by_fk` (`created_by`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `inventory_id` (`inventory_id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `po_number` (`po_number`),
  ADD KEY `approved_by_fk` (`approved_by`),
  ADD KEY `purchase_orders_ibfk_1` (`supplier_id`);

--
-- Indexes for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_order_id` (`purchase_order_id`),
  ADD KEY `inventory_id` (`inventory_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `resource_code` (`resource_code`),
  ADD KEY `fk_resources_category` (`category_id`),
  ADD KEY `fk_resources_unit` (`unit_id`);

--
-- Indexes for table `resource_categories`
--
ALTER TABLE `resource_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_code` (`category_code`);

--
-- Indexes for table `resource_requisitions`
--
ALTER TABLE `resource_requisitions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `req_number` (`req_number`),
  ADD KEY `fk_rr_project` (`project_id`),
  ADD KEY `fk_rr_requested_by` (`requested_by`),
  ADD KEY `fk_rr_approved_by` (`approved_by`);

--
-- Indexes for table `resource_requisition_approvals`
--
ALTER TABLE `resource_requisition_approvals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rra_req` (`requisition_id`),
  ADD KEY `fk_rra_user` (`action_by`);

--
-- Indexes for table `resource_requisition_attachments`
--
ALTER TABLE `resource_requisition_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rr_attach` (`requisition_id`);

--
-- Indexes for table `resource_requisition_comments`
--
ALTER TABLE `resource_requisition_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rr_comment_req` (`requisition_id`),
  ADD KEY `fk_rr_comment_user` (`user_id`);

--
-- Indexes for table `resource_requisition_items`
--
ALTER TABLE `resource_requisition_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rri_header` (`requisition_id`),
  ADD KEY `fk_req_items_resource` (`resource_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_unique` (`name`) USING BTREE;

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_customer_fk` (`customer_id`),
  ADD KEY `technician_services_fk` (`technician_id`),
  ADD KEY `project_services_fk1` (`project_id`);

--
-- Indexes for table `service_costs`
--
ALTER TABLE `service_costs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `FK_InventoryID` (`inventory_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `supplier_ledger`
--
ALTER TABLE `supplier_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_payments`
--
ALTER TABLE `supplier_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_payment_allocations`
--
ALTER TABLE `supplier_payment_allocations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_spa_payment` (`payment_id`),
  ADD KEY `idx_spa_grn` (`goods_receipt_id`);

--
-- Indexes for table `technicians`
--
ALTER TABLE `technicians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_code` (`unit_code`);

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
-- Indexes for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD PRIMARY KEY (`user_id`,`location_id`),
  ADD KEY `fk_user_locations_location` (`location_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `goods_receipts`
--
ALTER TABLE `goods_receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `goods_receipt_items`
--
ALTER TABLE `goods_receipt_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `inventory_locations`
--
ALTER TABLE `inventory_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `inventory_location_stock`
--
ALTER TABLE `inventory_location_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `inventory_movements`
--
ALTER TABLE `inventory_movements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `inventory_reservations`
--
ALTER TABLE `inventory_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inventory_transfers`
--
ALTER TABLE `inventory_transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `location_switch_log`
--
ALTER TABLE `location_switch_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `project_advances`
--
ALTER TABLE `project_advances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `project_construction_details`
--
ALTER TABLE `project_construction_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_costs`
--
ALTER TABLE `project_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `project_documents`
--
ALTER TABLE `project_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `project_electrical_details`
--
ALTER TABLE `project_electrical_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_inspection_details`
--
ALTER TABLE `project_inspection_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_ledger`
--
ALTER TABLE `project_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `project_settlements`
--
ALTER TABLE `project_settlements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `resource_categories`
--
ALTER TABLE `resource_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `resource_requisitions`
--
ALTER TABLE `resource_requisitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `resource_requisition_approvals`
--
ALTER TABLE `resource_requisition_approvals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource_requisition_attachments`
--
ALTER TABLE `resource_requisition_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource_requisition_comments`
--
ALTER TABLE `resource_requisition_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource_requisition_items`
--
ALTER TABLE `resource_requisition_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_costs`
--
ALTER TABLE `service_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier_ledger`
--
ALTER TABLE `supplier_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier_payments`
--
ALTER TABLE `supplier_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier_payment_allocations`
--
ALTER TABLE `supplier_payment_allocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technicians`
--
ALTER TABLE `technicians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_countries_FK` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_account_manager_fk` FOREIGN KEY (`account_manager_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `goods_receipts`
--
ALTER TABLE `goods_receipts`
  ADD CONSTRAINT `goods_receipts_ibfk_1` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`),
  ADD CONSTRAINT `goods_receipts_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `goods_receipt_items`
--
ALTER TABLE `goods_receipt_items`
  ADD CONSTRAINT `goods_receipt_items_ibfk_1` FOREIGN KEY (`goods_receipt_id`) REFERENCES `goods_receipts` (`id`),
  ADD CONSTRAINT `goods_receipt_items_ibfk_2` FOREIGN KEY (`purchase_order_item_id`) REFERENCES `purchase_order_items` (`id`),
  ADD CONSTRAINT `goods_receipt_items_ibfk_3` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_brand_fk` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_country_fk` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_locations_fk` FOREIGN KEY (`location_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `inventory_locations`
--
ALTER TABLE `inventory_locations`
  ADD CONSTRAINT `fk_storekeeper` FOREIGN KEY (`storekeeper_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `inventory_movements`
--
ALTER TABLE `inventory_movements`
  ADD CONSTRAINT `created_by_ibfk_5` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_locations_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_movements_ibfk_1` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `moved_by_ibfk_4` FOREIGN KEY (`movement_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_ibfk_3` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `inventory_reservations`
--
ALTER TABLE `inventory_reservations`
  ADD CONSTRAINT `reservation_created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_inventory_fk` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_location_fk` FOREIGN KEY (`location_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `inventory_transfers`
--
ALTER TABLE `inventory_transfers`
  ADD CONSTRAINT `fk_transfer_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transfer_from_location` FOREIGN KEY (`from_location_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transfer_inventory` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transfer_to_location` FOREIGN KEY (`to_location_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `project_customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_manager_fk` FOREIGN KEY (`project_manager_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `project_advances`
--
ALTER TABLE `project_advances`
  ADD CONSTRAINT `advance_received_by_fk` FOREIGN KEY (`received_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `project_advances_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_construction_details`
--
ALTER TABLE `project_construction_details`
  ADD CONSTRAINT `project_construction_details_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_costs`
--
ALTER TABLE `project_costs`
  ADD CONSTRAINT `project_costs_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_costs_location_fk` FOREIGN KEY (`location_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_inventory_costs_fk` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_location_costs_fk` FOREIGN KEY (`location_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `project_documents`
--
ALTER TABLE `project_documents`
  ADD CONSTRAINT `project_documents_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_documents_ibfk_2` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `project_electrical_details`
--
ALTER TABLE `project_electrical_details`
  ADD CONSTRAINT `project_electrical_details_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_inspection_details`
--
ALTER TABLE `project_inspection_details`
  ADD CONSTRAINT `project_inspection_details_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_ledger`
--
ALTER TABLE `project_ledger`
  ADD CONSTRAINT `projectid_ledger-fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `project_settlements`
--
ALTER TABLE `project_settlements`
  ADD CONSTRAINT `project_advance_settlement_fk` FOREIGN KEY (`advance_id`) REFERENCES `project_advances` (`id`),
  ADD CONSTRAINT `project_settlements_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `created_by_fk` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_fk` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD CONSTRAINT `purchase_inventory` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_items_fk` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD CONSTRAINT `approved_by_fk` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_orders_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  ADD CONSTRAINT `purchase_order_items_ibfk_1` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_order_items_ibfk_2` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`);

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `fk_resources_category` FOREIGN KEY (`category_id`) REFERENCES `resource_categories` (`id`),
  ADD CONSTRAINT `fk_resources_unit` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`),
  ADD CONSTRAINT `resource_unitID_fk` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`),
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `resource_categories` (`id`);

--
-- Constraints for table `resource_requisitions`
--
ALTER TABLE `resource_requisitions`
  ADD CONSTRAINT `fk_rr_approved_by` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rr_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rr_requested_by` FOREIGN KEY (`requested_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `resource_requisition_approvals`
--
ALTER TABLE `resource_requisition_approvals`
  ADD CONSTRAINT `fk_rra_req` FOREIGN KEY (`requisition_id`) REFERENCES `resource_requisitions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_rra_user` FOREIGN KEY (`action_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `resource_requisition_attachments`
--
ALTER TABLE `resource_requisition_attachments`
  ADD CONSTRAINT `fk_rr_attach` FOREIGN KEY (`requisition_id`) REFERENCES `resource_requisitions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resource_requisition_comments`
--
ALTER TABLE `resource_requisition_comments`
  ADD CONSTRAINT `fk_rr_comment_req` FOREIGN KEY (`requisition_id`) REFERENCES `resource_requisitions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_rr_comment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `resource_requisition_items`
--
ALTER TABLE `resource_requisition_items`
  ADD CONSTRAINT `fk_req_items_resource` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`),
  ADD CONSTRAINT `fk_rri_header` FOREIGN KEY (`requisition_id`) REFERENCES `resource_requisitions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `project_services_fk1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `service_customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `technician_services_fk` FOREIGN KEY (`technician_id`) REFERENCES `technicians` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `service_costs`
--
ALTER TABLE `service_costs`
  ADD CONSTRAINT `FK_InventoryID` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`),
  ADD CONSTRAINT `service_costs_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_inventory_fk2` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `services_id_fk1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `supplier_payment_allocations`
--
ALTER TABLE `supplier_payment_allocations`
  ADD CONSTRAINT `fk_spa_grn` FOREIGN KEY (`goods_receipt_id`) REFERENCES `goods_receipts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_spa_payment` FOREIGN KEY (`payment_id`) REFERENCES `supplier_payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD CONSTRAINT `fk_user_locations_location` FOREIGN KEY (`location_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_locations_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
