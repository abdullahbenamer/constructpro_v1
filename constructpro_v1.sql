-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2026 at 06:51 AM
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

--
-- Dumping data for table `goods_receipts`
--

INSERT INTO `goods_receipts` (`id`, `grn_number`, `purchase_order_id`, `supplier_id`, `receipt_date`, `subtotal`, `total_amount`, `remarks`, `created_by`, `created_at`) VALUES
(20, 'GRN-20260813191758', 31, 1, '2026-08-13', 60.00, 60.00, '', 1, '2026-08-13 17:17:58'),
(21, 'GRN-20260814063449', 32, 4, '2026-08-14', 15.00, 15.00, '', 1, '2026-08-14 04:34:49'),
(22, 'GRN-20260814114636', 33, 2, '2026-08-14', 96.00, 96.00, 'Partial receiving 8 of 20', 1, '2026-08-14 09:46:36'),
(23, 'GRN-20260814115031', 33, 2, '2026-08-14', 120.00, 120.00, 'Next Partial 10 of 12 units', 1, '2026-08-14 09:50:31'),
(24, 'GRN-20260814115350', 33, 2, '2026-08-14', 24.00, 24.00, '2 of the rest 2 to another WH , Item not listed in.', 1, '2026-08-14 09:53:50'),
(25, 'GRN-20260814144334', 34, 3, '2026-08-14', 324.00, 324.00, '', 1, '2026-08-14 12:43:34'),
(26, 'GRN-20260814144909', 34, 3, '2026-08-14', 36.00, 36.00, '', 1, '2026-08-14 12:49:09'),
(27, 'GRN-20260814145510', 35, 3, '2026-08-14', 285.00, 285.00, '', 1, '2026-08-14 12:55:10'),
(28, 'GRN-20260815112258', 38, 2, '2026-08-15', 15.20, 15.20, '', 1, '2026-08-15 09:22:58'),
(29, 'GRN-20260815143839', 39, 1, '2026-08-15', 50.00, 50.00, 'Switch 1 Gang\r\nABB Libya\r\nQuantity: 10\r\nWarehouse: WH-123\r\nUnit Cost: 5.00', 1, '2026-08-15 12:38:39'),
(30, 'GRN-20260815145615', 35, 3, '2026-08-15', 15.00, 15.00, '', 1, '2026-08-15 12:56:15'),
(31, 'GRN-20260816131441', 40, 1, '2026-08-16', 340.00, 340.00, '10 received of cement in WH-123', 1, '2026-08-16 11:14:41'),
(32, 'GRN-20260816145525', 41, 2, '2026-08-16', 240.00, 240.00, '', 1, '2026-08-16 12:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `goods_receipt_items`
--

CREATE TABLE `goods_receipt_items` (
  `id` int(11) NOT NULL,
  `goods_receipt_id` int(11) NOT NULL,
  `purchase_order_item_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `quantity` decimal(15,2) NOT NULL,
  `unit_cost` decimal(15,2) NOT NULL,
  `total_cost` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goods_receipt_items`
--

INSERT INTO `goods_receipt_items` (`id`, `goods_receipt_id`, `purchase_order_item_id`, `inventory_id`, `location_id`, `quantity`, `unit_cost`, `total_cost`) VALUES
(12, 20, 33, 8, NULL, 100.00, 0.60, 60.00),
(13, 21, 34, 7, NULL, 10.00, 1.50, 15.00),
(14, 22, 35, 108, NULL, 8.00, 12.00, 96.00),
(15, 23, 35, 108, NULL, 10.00, 12.00, 120.00),
(16, 24, 35, 108, NULL, 2.00, 12.00, 24.00),
(17, 25, 36, 6, NULL, 18.00, 18.00, 324.00),
(18, 26, 36, 6, NULL, 2.00, 18.00, 36.00),
(19, 27, 37, 7, NULL, 95.00, 3.00, 285.00),
(20, 28, 40, 8, NULL, 8.00, 1.90, 15.20),
(21, 29, 41, 8, NULL, 10.00, 5.00, 50.00),
(22, 30, 37, 7, 20, 5.00, 3.00, 15.00),
(23, 31, 42, 105, 20, 10.00, 34.00, 340.00),
(24, 32, 43, 108, 20, 20.00, 12.00, 240.00);

-- --------------------------------------------------------

--
-- Table structure for table `goods_returns`
--

CREATE TABLE `goods_returns` (
  `id` int(11) NOT NULL,
  `return_number` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `goods_receipt_id` int(11) NOT NULL,
  `purchase_order_id` int(11) NOT NULL,
  `return_date` date NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `total_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goods_returns`
--

INSERT INTO `goods_returns` (`id`, `return_number`, `supplier_id`, `goods_receipt_id`, `purchase_order_id`, `return_date`, `reason`, `notes`, `total_amount`, `created_by`, `created_at`) VALUES
(1, 'RTS-20260816132132', 1, 31, 40, '2026-08-16', 'Test returning 10 cement bags', '', 340.00, 1, '2026-08-16 11:21:32'),
(2, 'RTS-260816150111', 2, 32, 41, '2026-08-16', 'test partial return', 'test partial return', 96.00, 1, '2026-08-16 13:01:11'),
(3, 'RTS-260816151329', 2, 32, 41, '2026-08-16', 'fully partial return PO received qty', '', 144.00, 1, '2026-08-16 13:13:29'),
(4, 'RTS-260816153055', 3, 30, 35, '2026-08-16', '', '', 6.00, 1, '2026-08-16 13:30:55'),
(5, 'RTS-260816154044', 3, 30, 35, '2026-08-16', '', '', 3.00, 1, '2026-08-16 13:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `goods_return_items`
--

CREATE TABLE `goods_return_items` (
  `id` int(11) NOT NULL,
  `goods_return_id` int(11) NOT NULL,
  `goods_receipt_item_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL,
  `unit_cost` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total_cost` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goods_return_items`
--

INSERT INTO `goods_return_items` (`id`, `goods_return_id`, `goods_receipt_item_id`, `inventory_id`, `location_id`, `quantity`, `unit_cost`, `total_cost`, `created_at`) VALUES
(1, 1, 23, 105, 20, 10.00, 34.00, 340.00, '2026-08-16 11:21:32'),
(2, 2, 24, 108, 20, 8.00, 12.00, 96.00, '2026-08-16 13:01:11'),
(3, 3, 24, 108, 20, 12.00, 12.00, 144.00, '2026-08-16 13:13:29'),
(4, 4, 22, 7, 20, 2.00, 3.00, 6.00, '2026-08-16 13:30:55'),
(5, 5, 22, 7, 20, 1.00, 3.00, 3.00, '2026-08-16 13:40:44');

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
(1, 'MCB 1P 16A', 'MCB', 'MCB-1P-16A-SCH', 960.00, NULL, 20, 1.20, 'unit', 0, 'piece', 1, 2.50, 2.50, 5, 9),
(2, 'MCB 1P 20A', 'MCB', 'MCB-1P-20A-ABB', 158.00, NULL, 20, 1.10, 'unit', 0, 'piece', 1, 2.40, 2.40, 6, 3),
(3, 'MCB 1P 32A', 'Switchgear', 'MCB-1P-32A-CHNT', 1230.00, NULL, 20, 1.50, 'unit', 0, 'piece', 1, 2.10, 2.10, 14, 5),
(4, 'MCB 3P 63A', 'Switchgear', 'MCB-3P-63A-SCH', 5219.00, NULL, 10, 7.35, 'unit', 0, 'piece', 1, 9.80, 9.80, 5, 9),
(5, 'Contactor 25A 220V', 'Contactor', 'CT-25A-LS', 85.00, NULL, 10, 6.50, 'unit', 0, 'piece', 1, 12.00, 12.00, 12, 5),
(6, 'Contactor 40A 220V', 'Contactor', 'CT-40A-LS', 1021.00, NULL, 10, 8.20, 'unit', 0, 'piece', 1, 15.50, 15.50, 12, 5),
(7, 'Wall Socket 13A UK', 'Socket', 'SOC-13A-HVL', 967.00, NULL, 50, 0.80, 'unit', 0, 'piece', 1, 1.50, 1.50, 16, 10),
(8, 'Switch 1 Gang', 'Switch', 'SW-1G-HAG', 12460.00, NULL, 100, 0.60, 'unit', 0, 'piece', 1, 1.50, 1.50, 9, 1),
(9, 'PVC Cable 2.5mm²', 'Cable', 'PVC-2.5-SOUTH', 11290.00, NULL, 200, 0.30, 'meter', 1, 'roll', 100, 0.60, 60.00, 3, 3),
(10, 'Terminal Block 2.5mm', 'Terminal', 'TB-2.5-WAGO', 747.00, NULL, 100, 0.20, 'unit', 0, 'piece', 1, 0.50, 0.50, 21, 1),
(105, 'Cement', 'Switchgear', 'cem-1234', 500.00, 1, 100, 75.00, 'unit', 0, NULL, 1, 100.00, 100.00, 34, 12),
(106, 'Man Boot', 'Switchgear', 'MB-123', 496.00, 3, 50, 450.00, 'unit', 0, NULL, 1, 570.00, 570.00, 4, 8),
(108, 'Shakhashir Modern', 'Instrumentation', 'ni-999', 20.00, 20, 2, 12.00, 'unit', 0, NULL, 1, 0.00, 0.00, 14, 6);

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
(53, 1, 1, 167.00),
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
(90, 7, 2, 130.00),
(91, 7, 3, 210.00),
(92, 7, 4, 80.00),
(95, 8, 1, 11893.00),
(96, 8, 2, 149.00),
(97, 8, 3, 100.00),
(98, 8, 4, 100.00),
(101, 9, 1, 600.00),
(102, 9, 2, 300.00),
(103, 9, 3, 0.00),
(104, 9, 4, 10390.00),
(107, 10, 1, 130.00),
(108, 10, 2, 218.00),
(109, 10, 3, 199.00),
(110, 10, 4, 200.00),
(113, 105, 1, 400.00),
(114, 105, 4, 100.00),
(115, 106, 3, 490.00),
(116, 3, 19, 0.00),
(117, 106, 19, 6.00),
(118, 3, 20, 92.00),
(119, 8, 20, 210.00),
(120, 108, 20, 18.00),
(121, 108, 2, 2.00),
(122, 6, 20, 20.00),
(123, 7, 20, 97.00),
(124, 8, 19, 8.00),
(125, 105, 20, 0.00);

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
(229, 10, 3, 'OUT', 5.00, NULL, NULL, NULL, NULL, 236.00, 784.00, 'PROJECT #43', 'Terminal Block 2.5mm', 1, '2026-08-11 12:40:40'),
(230, 105, 4, 'OUT', 10.00, NULL, NULL, NULL, NULL, 90.00, 490.00, 'PROJECT #43', 'Cement for slap', 1, '2026-08-12 04:40:48'),
(231, 105, 4, 'IN', 10.00, NULL, NULL, NULL, NULL, 100.00, 500.00, 'PROJECT #43', 'Cement for slap', 1, '2026-08-12 04:41:37'),
(232, 8, 2, 'IN', 100.00, NULL, 1, NULL, NULL, 149.00, 12442.00, 'GRN-20', NULL, 1, '2026-08-13 17:17:58'),
(233, 7, 2, 'IN', 10.00, NULL, 4, NULL, NULL, 130.00, 870.00, 'GRN-21', NULL, 1, '2026-08-14 04:34:49'),
(234, 108, 20, 'IN', 8.00, NULL, 2, NULL, NULL, 8.00, 8.00, 'GRN-22', 'Partial receiving 8 of 20', 1, '2026-08-14 09:46:36'),
(235, 108, 20, 'IN', 10.00, NULL, 2, NULL, NULL, 18.00, 18.00, 'GRN-23', 'Next Partial 10 of 12 units', 1, '2026-08-14 09:50:31'),
(236, 108, 2, 'IN', 2.00, NULL, 2, NULL, NULL, 2.00, 20.00, 'GRN-24', '2 of the rest 2 to another WH , Item not listed in.', 1, '2026-08-14 09:53:50'),
(237, 6, 20, 'IN', 18.00, NULL, 3, NULL, NULL, 18.00, 1019.00, 'GRN-25', NULL, 1, '2026-08-14 12:43:34'),
(238, 6, 20, 'IN', 2.00, NULL, 3, NULL, NULL, 20.00, 1021.00, 'GRN-26', NULL, 1, '2026-08-14 12:49:09'),
(239, 7, 20, 'IN', 95.00, NULL, 3, NULL, NULL, 95.00, 965.00, 'GRN-27', NULL, 1, '2026-08-14 12:55:10'),
(240, 8, 19, 'IN', 8.00, NULL, 2, NULL, NULL, 8.00, 12450.00, 'GRN-28', NULL, 1, '2026-08-15 09:22:58'),
(241, 8, 20, 'IN', 10.00, NULL, 1, NULL, NULL, 210.00, 12460.00, 'GRN-29', 'Switch 1 Gang\r\nABB Libya\r\nQuantity: 10\r\nWarehouse: WH-123\r\nUnit Cost: 5.00', 1, '2026-08-15 12:38:39'),
(242, 7, 20, 'IN', 5.00, NULL, 3, NULL, NULL, 100.00, 970.00, 'GRN-30', NULL, 1, '2026-08-15 12:56:15'),
(243, 105, 20, 'IN', 10.00, NULL, 1, NULL, NULL, 10.00, 510.00, 'GRN-31', '10 received of cement in WH-123', 1, '2026-08-16 11:14:41'),
(244, 105, 20, 'OUT', 10.00, NULL, 1, NULL, NULL, 0.00, 500.00, 'RTS-20260816132132', 'Return to supplier: Test returning 10 cement bags', 1, '2026-08-16 11:21:32'),
(245, 108, 20, 'IN', 20.00, NULL, 2, NULL, NULL, 38.00, 40.00, 'GRN-32', NULL, 1, '2026-08-16 12:55:25'),
(246, 108, 20, 'OUT', 8.00, NULL, 2, NULL, NULL, 30.00, 32.00, 'RTS-260816150111', 'Return to supplier: test partial return', 1, '2026-08-16 13:01:11'),
(247, 108, 20, 'OUT', 12.00, NULL, 2, NULL, NULL, 18.00, 20.00, 'RTS-260816151329', 'Return to supplier: fully partial return PO received qty', 1, '2026-08-16 13:13:29'),
(248, 7, 20, 'OUT', 2.00, NULL, 3, NULL, NULL, 98.00, 968.00, 'RTS-260816153055', 'Return to supplier', 1, '2026-08-16 13:30:55'),
(249, 7, 20, 'OUT', 1.00, NULL, 3, NULL, NULL, 97.00, 967.00, 'RTS-260816154044', 'Return to supplier', 1, '2026-08-16 13:40:44'),
(250, 1, 1, 'OUT', 4.00, 1.20, NULL, NULL, 1, 167.00, 960.00, 'RR-FUL-', 'Resource requisition fulfillment', 1, '2026-08-21 04:45:59'),
(251, 106, 19, 'OUT', 10.00, 450.00, NULL, NULL, 1, 6.00, 496.00, 'RR-FUL-', 'Resource requisition fulfillment', 1, '2026-08-21 04:52:00'),
(252, 10, 3, 'OUT', 37.00, 0.20, NULL, NULL, 1, 199.00, 747.00, 'RR-FUL-20260821113536-277', 'Resource requisition fulfillment', 1, '2026-08-21 09:35:36'),
(253, 9, 3, 'OUT', 95.00, 0.30, NULL, NULL, 1, 505.00, 12495.00, 'RR-FUL-20260822063449-339', 'Resource requisition fulfillment: REQ-260821164443', 1, '2026-08-22 04:34:49'),
(254, 9, 3, 'OUT', 505.00, 0.30, NULL, NULL, 1, 0.00, 11990.00, 'RR-FUL-20260822064201-707', 'Resource requisition fulfillment: REQ-260821164443', 1, '2026-08-22 04:42:01'),
(255, 9, 2, 'OUT', 700.00, 0.30, NULL, NULL, 1, 300.00, 11290.00, 'RR-FUL-20260822064406-201', 'Resource requisition fulfillment: REQ-260821164443', 1, '2026-08-22 04:44:06');

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
(43, 'resource_requisitions.approve', 'Approve Resource Requisitions'),
(44, 'goods_returns.create', NULL),
(45, 'resource_requisitions.fulfill', 'User can Fulfill Resources Requestions for projects');

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
(43, 2, 'building School', 'construction', 'building School 1,500,000', '2026-10-28', 'planning', 1500000.00, '2026-08-08 20:59:33', 0, 'sirte', '2026-08-16', 1, '386', 'sc-386', 'high'),
(44, 5, 'Power Station Renovation', 'maintenance', 'Power Station Renovation for Tajoura West Valley.', '2026-12-31', 'planning', 2370000.00, '2026-08-21 14:43:21', 0, 'Tajoura West', '2026-08-02', 14, 'PS-2016-08', 'PS-2016', 'high');

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
(157, 43, NULL, NULL, 'subcontract', 'finishing basement for the fence', 100.00, 100.00, '2026-08-11 12:52:45'),
(159, 43, 1, 1, 'materials', '', 4.00, 1.20, '2026-08-21 04:45:59'),
(160, 43, 106, 19, 'materials', 'Man Boot', 10.00, 450.00, '2026-08-21 04:52:00'),
(161, 43, 10, 3, 'materials', 'Terminal Block 2.5mm', 37.00, 0.20, '2026-08-21 09:35:36'),
(162, 44, 9, 3, 'materials', 'PVC Cable 2.5mm²', 95.00, 0.30, '2026-08-22 04:34:49'),
(163, 44, 9, 3, 'materials', 'PVC Cable 2.5mm²', 505.00, 0.30, '2026-08-22 04:42:01'),
(164, 44, 9, 2, 'materials', 'PVC Cable 2.5mm²', 700.00, 0.30, '2026-08-22 04:44:06');

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
(58, 43, 'cost', 'project_costs', 157, 'finishing basement for the fence', 10000.00, 0.00, 86459.80, '2026-08-11 12:52:45'),
(59, 43, 'cost', 'project_costs', 158, 'Cement for slap', 750.00, 0.00, 85709.80, '2026-08-12 04:40:48'),
(60, 43, 'cost', 'project_costs', 158, 'Reversal: Cement for slap', 0.00, 750.00, 86459.80, '2026-08-12 04:41:37');

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

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `po_number`, `supplier_id`, `status`, `order_date`, `expected_date`, `subtotal`, `tax_amount`, `discount_amount`, `total_amount`, `notes`, `created_by`, `approved_by`, `approved_at`, `received_at`, `created_at`, `receiving_status`) VALUES
(31, 'PO-260813084310', 1, 'received', '2026-08-09', '2026-08-13', 60.00, 0.00, 0.00, 60.00, 'PO for test', 1, 1, '2026-08-13 08:48:55', '2026-08-13 19:17:58', '2026-08-13 06:43:10', 'RECEIVED'),
(32, 'PO-260814062956', 4, 'received', '2026-08-12', '2026-08-14', 15.00, 0.00, 0.00, 15.00, '10 units', 1, 1, '2026-08-14 06:34:05', '2026-08-14 06:34:49', '2026-08-14 04:29:56', 'RECEIVED'),
(33, 'PO-260814114032', 2, 'received', '2026-08-09', '2026-08-13', 240.00, 0.00, 0.00, 240.00, 'partial receiving test', 1, 1, '2026-08-14 11:44:43', '2026-08-14 11:53:50', '2026-08-14 09:40:32', 'RECEIVED'),
(34, 'PO-260814144219', 3, 'received', '2026-08-09', '2026-08-13', 360.00, 0.00, 0.00, 360.00, '', 1, 1, '2026-08-14 14:43:01', '2026-08-14 14:49:09', '2026-08-14 12:42:19', 'RECEIVED'),
(35, 'PO-260814145340', 3, 'received', '2026-08-11', '2026-08-14', 300.00, 0.00, 0.00, 300.00, '', 1, 1, '2026-08-14 14:54:15', '2026-08-15 14:56:15', '2026-08-14 12:53:40', 'RECEIVED'),
(36, 'PO-260815072043', 1, 'cancelled', '2026-08-10', '2026-08-14', 114.00, 0.00, 0.00, 114.00, 'Draft Cancel', 1, NULL, NULL, NULL, '2026-08-15 05:20:43', 'OPEN'),
(37, 'PO-260815074138', 4, 'cancelled', '2026-08-11', '2026-08-15', 260.00, 0.00, 0.00, 260.00, 'Approved cancel', 1, 1, '2026-08-15 07:42:06', NULL, '2026-08-15 05:41:38', 'OPEN'),
(38, 'PO-260815112115', 2, 'cancelled', '2026-08-10', '2026-08-14', 38.00, 0.00, 0.00, 38.00, 'Cancel partial receive', 1, 1, '2026-08-15 11:22:38', NULL, '2026-08-15 09:21:15', 'PARTIAL'),
(39, 'PO-260815143456', 1, 'received', '2026-08-11', '2026-08-14', 16.00, 0.00, 0.00, 16.00, 'return items test', 1, 1, '2026-08-15 14:35:55', '2026-08-15 14:38:39', '2026-08-15 12:34:56', 'RECEIVED'),
(40, 'PO-260816131303', 1, 'received', '2026-08-14', '2026-08-16', 340.00, 0.00, 0.00, 340.00, 'test return of 10 units', 1, 1, '2026-08-16 13:13:30', '2026-08-16 13:14:41', '2026-08-16 11:13:03', 'RECEIVED'),
(41, 'PO-260816144258', 2, 'received', '2026-08-16', '2026-08-17', 240.00, 0.00, 0.00, 240.00, '', 1, 1, '2026-08-16 14:53:54', '2026-08-16 14:55:25', '2026-08-16 12:42:58', 'RECEIVED');

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

--
-- Dumping data for table `purchase_order_items`
--

INSERT INTO `purchase_order_items` (`id`, `purchase_order_id`, `inventory_id`, `quantity`, `received_quantity`, `unit_cost`, `total_cost`, `notes`, `created_at`) VALUES
(33, 31, 8, 100.00, 100.00, 0.60, 0.00, NULL, '2026-08-13 06:48:39'),
(34, 32, 7, 10.00, 10.00, 1.50, 0.00, NULL, '2026-08-14 04:30:43'),
(35, 33, 108, 20.00, 20.00, 12.00, 0.00, NULL, '2026-08-14 09:44:29'),
(36, 34, 6, 20.00, 20.00, 18.00, 0.00, NULL, '2026-08-14 12:42:46'),
(37, 35, 7, 100.00, 100.00, 3.00, 0.00, NULL, '2026-08-14 12:54:06'),
(38, 36, 4, 20.00, 0.00, 5.70, 0.00, NULL, '2026-08-15 05:21:06'),
(39, 37, 8, 100.00, 0.00, 2.60, 0.00, NULL, '2026-08-15 05:41:56'),
(40, 38, 8, 20.00, 8.00, 1.90, 0.00, NULL, '2026-08-15 09:21:39'),
(41, 39, 8, 10.00, 10.00, 1.60, 0.00, NULL, '2026-08-15 12:35:40'),
(42, 40, 105, 10.00, 10.00, 34.00, 0.00, NULL, '2026-08-16 11:13:21'),
(43, 41, 108, 20.00, 20.00, 12.00, 0.00, NULL, '2026-08-16 12:43:28');

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

INSERT INTO `resource_requisitions` (`id`, `req_number`, `project_id`, `request_date`, `required_date`, `priority`, `status`, `remarks`, `submitted_by`, `submitted_at`, `requested_by`, `approved_by`, `approved_at`, `approval_remarks`, `approval_notes`, `created_at`, `updated_at`) VALUES
(14, 'REQ-260821065002', 43, '2026-08-21', '2026-08-24', 'HIGH', 'FULFILLED', 'test fulfill', 1, '2026-08-21 06:50:56', 1, 1, '2026-08-21 06:51:23', 'Ok go a head', NULL, '2026-08-21 04:50:02', '2026-08-21 04:52:00'),
(15, 'REQ-260821090323', 43, '2026-08-21', '2026-08-25', 'NORMAL', 'APPROVED', 'non material RR test', 1, '2026-08-21 09:04:40', 1, 1, '2026-08-21 09:05:06', '', NULL, '2026-08-21 07:03:23', '2026-08-21 07:05:06'),
(16, 'REQ-260821091044', 43, '2026-08-21', '2026-08-24', 'NORMAL', 'APPROVED', '', 1, '2026-08-21 09:12:36', 1, 1, '2026-08-21 09:12:44', '', NULL, '2026-08-21 07:10:44', '2026-08-21 07:12:44'),
(17, 'REQ-260821095950', 43, '2026-08-21', '2026-08-28', 'NORMAL', 'PARTIAL', '', 1, '2026-08-21 10:00:18', 1, 1, '2026-08-21 10:00:30', '', NULL, '2026-08-21 07:59:50', '2026-08-21 09:35:36'),
(18, 'REQ-260821113809', 43, '2026-08-21', '2026-08-22', 'NORMAL', 'APPROVED', '', 1, '2026-08-21 11:38:30', 1, 1, '2026-08-21 11:38:44', '', NULL, '2026-08-21 09:38:09', '2026-08-21 09:38:44'),
(19, 'REQ-260821164443', 44, '2026-08-16', '2026-08-24', 'HIGH', 'FULFILLED', 'Power Station Renovation RR #1', 1, '2026-08-21 16:47:14', 1, 1, '2026-08-21 16:47:37', '', NULL, '2026-08-21 14:44:43', '2026-08-22 04:44:06');

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

--
-- Dumping data for table `resource_requisition_approvals`
--

INSERT INTO `resource_requisition_approvals` (`id`, `requisition_id`, `action`, `action_by`, `remarks`, `action_date`) VALUES
(7, 14, 'SUBMITTED', 1, NULL, '2026-08-21 06:50:56'),
(8, 14, 'APPROVED', 1, 'Ok go a head', '2026-08-21 06:51:23'),
(9, 15, 'SUBMITTED', 1, NULL, '2026-08-21 09:04:40'),
(10, 15, 'APPROVED', 1, '', '2026-08-21 09:05:06'),
(11, 16, 'SUBMITTED', 1, NULL, '2026-08-21 09:12:36'),
(12, 16, 'APPROVED', 1, '', '2026-08-21 09:12:44'),
(13, 17, 'SUBMITTED', 1, NULL, '2026-08-21 10:00:18'),
(14, 17, 'APPROVED', 1, '', '2026-08-21 10:00:30'),
(15, 18, 'SUBMITTED', 1, NULL, '2026-08-21 11:38:30'),
(16, 18, 'APPROVED', 1, '', '2026-08-21 11:38:44'),
(17, 19, 'SUBMITTED', 1, NULL, '2026-08-21 16:47:14'),
(18, 19, 'APPROVED', 1, '', '2026-08-21 16:47:37');

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
-- Table structure for table `resource_requisition_fulfillments`
--

CREATE TABLE `resource_requisition_fulfillments` (
  `id` int(11) NOT NULL,
  `requisition_id` int(11) NOT NULL,
  `fulfillment_no` varchar(50) NOT NULL,
  `fulfillment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `fulfilled_by` int(11) NOT NULL,
  `remarks` text DEFAULT NULL,
  `status` enum('COMPLETED','CANCELLED') NOT NULL DEFAULT 'COMPLETED',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource_requisition_fulfillments`
--

INSERT INTO `resource_requisition_fulfillments` (`id`, `requisition_id`, `fulfillment_no`, `fulfillment_date`, `fulfilled_by`, `remarks`, `status`, `created_at`) VALUES
(3, 14, '', '2026-08-21 00:00:00', 1, '', 'COMPLETED', '2026-08-21 04:52:00'),
(10, 17, 'RR-FUL-20260821113536-277', '2026-08-21 00:00:00', 1, '', 'COMPLETED', '2026-08-21 09:35:36'),
(11, 19, 'RR-FUL-20260821173805-200', '2026-08-21 00:00:00', 1, '', 'COMPLETED', '2026-08-21 15:38:05'),
(12, 19, 'RR-FUL-20260821194941-533', '2026-08-21 00:00:00', 1, '', 'COMPLETED', '2026-08-21 17:49:41'),
(13, 19, 'RR-FUL-20260822063449-339', '2026-08-22 00:00:00', 1, '', 'COMPLETED', '2026-08-22 04:34:49'),
(14, 19, 'RR-FUL-20260822064201-707', '2026-08-22 00:00:00', 1, '', 'COMPLETED', '2026-08-22 04:42:01'),
(15, 19, 'RR-FUL-20260822064406-201', '2026-08-22 00:00:00', 1, '', 'COMPLETED', '2026-08-22 04:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `resource_requisition_fulfillment_items`
--

CREATE TABLE `resource_requisition_fulfillment_items` (
  `id` int(11) NOT NULL,
  `fulfillment_id` int(11) NOT NULL,
  `requisition_item_id` int(11) NOT NULL,
  `inventory_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `fulfilled_quantity` decimal(15,2) NOT NULL DEFAULT 0.00,
  `unit_cost` decimal(15,2) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `inventory_movement_id` int(11) DEFAULT NULL,
  `project_cost_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource_requisition_fulfillment_items`
--

INSERT INTO `resource_requisition_fulfillment_items` (`id`, `fulfillment_id`, `requisition_item_id`, `inventory_id`, `location_id`, `fulfilled_quantity`, `unit_cost`, `remarks`, `inventory_movement_id`, `project_cost_id`, `created_at`) VALUES
(2, 3, 14, 106, 19, 10.00, 450.00, NULL, 251, 160, '2026-08-21 04:52:00'),
(3, 10, 18, 10, 3, 37.00, 0.20, NULL, 252, 161, '2026-08-21 09:35:36'),
(4, 13, 20, 9, 3, 95.00, 0.30, '', 253, 162, '2026-08-22 04:34:49'),
(5, 14, 20, 9, 3, 505.00, 0.30, '', 254, 163, '2026-08-22 04:42:01'),
(6, 15, 20, 9, 2, 700.00, 0.30, '', 255, 164, '2026-08-22 04:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `resource_requisition_items`
--

CREATE TABLE `resource_requisition_items` (
  `id` int(11) NOT NULL,
  `requisition_id` int(11) NOT NULL,
  `resource_source` enum('INVENTORY','RESOURCE') NOT NULL,
  `inventory_id` int(11) DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `uom` varchar(30) DEFAULT NULL,
  `quantity` decimal(15,2) NOT NULL DEFAULT 1.00,
  `fulfilled_quantity` decimal(15,2) NOT NULL DEFAULT 0.00,
  `estimated_unit_cost` decimal(15,2) NOT NULL DEFAULT 0.00,
  `estimated_total` decimal(15,2) NOT NULL DEFAULT 0.00,
  `remarks` text DEFAULT NULL,
  `status` enum('OPEN','PARTIAL','FULFILLED','CANCELLED') NOT NULL DEFAULT 'OPEN',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource_requisition_items`
--

INSERT INTO `resource_requisition_items` (`id`, `requisition_id`, `resource_source`, `inventory_id`, `resource_id`, `description`, `uom`, `quantity`, `fulfilled_quantity`, `estimated_unit_cost`, `estimated_total`, `remarks`, `status`, `created_at`) VALUES
(14, 14, 'INVENTORY', NULL, 106, 'Man Boot', 'unit', 10.00, 0.00, 0.00, 0.00, '10 Man Boots', 'FULFILLED', '2026-08-21 04:50:43'),
(15, 15, 'RESOURCE', NULL, 15, 'Tower Crane', 'Gram', 15.00, 0.00, 0.00, 0.00, '', 'OPEN', '2026-08-21 07:03:41'),
(16, 15, 'RESOURCE', NULL, 13, 'Plate Compactor', 'Kilogram', 12.00, 0.00, 0.00, 0.00, '', 'OPEN', '2026-08-21 07:04:07'),
(17, 16, 'INVENTORY', NULL, 108, 'New Item', 'unit', 10.00, 0.00, 0.00, 0.00, '10 of 20 New Item', 'OPEN', '2026-08-21 07:12:31'),
(18, 17, 'INVENTORY', NULL, 10, 'Terminal Block 2.5mm', 'unit', 500.00, 0.00, 0.00, 0.00, '500 units', 'PARTIAL', '2026-08-21 08:00:14'),
(19, 18, 'RESOURCE', NULL, 15, 'Tower Crane', 'Gram', 3.00, 0.00, 0.00, 0.00, '', 'OPEN', '2026-08-21 09:38:24'),
(20, 19, 'INVENTORY', NULL, 9, 'PVC Cable 2.5mm²', 'meter', 1300.00, 1300.00, 0.00, 0.00, 'PVC Cable 2.5mm², 1300 Mtr', 'FULFILLED', '2026-08-21 14:45:55');

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

--
-- Dumping data for table `supplier_ledger`
--

INSERT INTO `supplier_ledger` (`id`, `supplier_id`, `type`, `reference_type`, `reference_id`, `amount`, `direction`, `created_at`) VALUES
(11, 1, 'GRN', 'GoodsReceipt', 20, 60.00, 'DEBIT', '2026-08-13 17:17:58'),
(12, 4, 'GRN', 'GoodsReceipt', 21, 15.00, 'DEBIT', '2026-08-14 04:34:49'),
(13, 2, 'GRN', 'GoodsReceipt', 22, 96.00, 'DEBIT', '2026-08-14 09:46:36'),
(14, 2, 'GRN', 'GoodsReceipt', 23, 120.00, 'DEBIT', '2026-08-14 09:50:31'),
(15, 2, 'GRN', 'GoodsReceipt', 24, 24.00, 'DEBIT', '2026-08-14 09:53:50'),
(16, 3, 'GRN', 'GoodsReceipt', 25, 324.00, 'DEBIT', '2026-08-14 12:43:34'),
(17, 3, 'GRN', 'GoodsReceipt', 26, 36.00, 'DEBIT', '2026-08-14 12:49:09'),
(18, 3, 'GRN', 'GoodsReceipt', 27, 285.00, 'DEBIT', '2026-08-14 12:55:10'),
(19, 2, 'GRN', 'GoodsReceipt', 28, 15.20, 'DEBIT', '2026-08-15 09:22:58'),
(20, 1, 'GRN', 'GoodsReceipt', 29, 50.00, 'DEBIT', '2026-08-15 12:38:39'),
(21, 3, 'GRN', 'GoodsReceipt', 30, 15.00, 'DEBIT', '2026-08-15 12:56:15'),
(22, 1, 'GRN', 'GoodsReceipt', 31, 340.00, 'DEBIT', '2026-08-16 11:14:41'),
(23, 1, '', 'GoodsReturn', 1, 340.00, 'CREDIT', '2026-08-16 11:21:32'),
(24, 2, 'GRN', 'GoodsReceipt', 32, 240.00, 'DEBIT', '2026-08-16 12:55:25'),
(25, 2, '', 'GoodsReturn', 2, 96.00, 'CREDIT', '2026-08-16 13:01:11'),
(26, 2, '', 'GoodsReturn', 3, 144.00, 'CREDIT', '2026-08-16 13:13:29'),
(27, 3, '', 'GoodsReturn', 4, 6.00, 'CREDIT', '2026-08-16 13:30:55'),
(28, 3, '', 'GoodsReturn', 5, 3.00, 'CREDIT', '2026-08-16 13:40:44');

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
  ADD KEY `inventory_id` (`inventory_id`),
  ADD KEY `idx_grn_item_location` (`location_id`);

--
-- Indexes for table `goods_returns`
--
ALTER TABLE `goods_returns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `return_number` (`return_number`),
  ADD KEY `idx_goods_returns_supplier` (`supplier_id`),
  ADD KEY `idx_goods_returns_grn` (`goods_receipt_id`),
  ADD KEY `idx_goods_returns_po` (`purchase_order_id`);

--
-- Indexes for table `goods_return_items`
--
ALTER TABLE `goods_return_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_return_items_return` (`goods_return_id`),
  ADD KEY `idx_return_items_grn_item` (`goods_receipt_item_id`),
  ADD KEY `idx_return_items_inventory` (`inventory_id`),
  ADD KEY `idx_return_items_location` (`location_id`);

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
-- Indexes for table `resource_requisition_fulfillments`
--
ALTER TABLE `resource_requisition_fulfillments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_fulfillment_no` (`fulfillment_no`),
  ADD KEY `idx_fulfillment_requisition` (`requisition_id`),
  ADD KEY `idx_fulfilled_by` (`fulfilled_by`);

--
-- Indexes for table `resource_requisition_fulfillment_items`
--
ALTER TABLE `resource_requisition_fulfillment_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_fulfillment` (`fulfillment_id`),
  ADD KEY `idx_requisition_item` (`requisition_item_id`),
  ADD KEY `idx_inventory` (`inventory_id`),
  ADD KEY `idx_location` (`location_id`),
  ADD KEY `idx_inventory_movement` (`inventory_movement_id`),
  ADD KEY `idx_project_cost` (`project_cost_id`);

--
-- Indexes for table `resource_requisition_items`
--
ALTER TABLE `resource_requisition_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_rri_requisition` (`requisition_id`),
  ADD KEY `idx_rri_inventory` (`inventory_id`),
  ADD KEY `idx_rri_resource` (`resource_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `goods_receipt_items`
--
ALTER TABLE `goods_receipt_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `goods_returns`
--
ALTER TABLE `goods_returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `goods_return_items`
--
ALTER TABLE `goods_return_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `inventory_locations`
--
ALTER TABLE `inventory_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `inventory_location_stock`
--
ALTER TABLE `inventory_location_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `inventory_movements`
--
ALTER TABLE `inventory_movements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `resource_requisition_approvals`
--
ALTER TABLE `resource_requisition_approvals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- AUTO_INCREMENT for table `resource_requisition_fulfillments`
--
ALTER TABLE `resource_requisition_fulfillments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `resource_requisition_fulfillment_items`
--
ALTER TABLE `resource_requisition_fulfillment_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resource_requisition_items`
--
ALTER TABLE `resource_requisition_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  ADD CONSTRAINT `fk_grn_item_location` FOREIGN KEY (`location_id`) REFERENCES `inventory_locations` (`id`),
  ADD CONSTRAINT `goods_receipt_items_ibfk_1` FOREIGN KEY (`goods_receipt_id`) REFERENCES `goods_receipts` (`id`),
  ADD CONSTRAINT `goods_receipt_items_ibfk_2` FOREIGN KEY (`purchase_order_item_id`) REFERENCES `purchase_order_items` (`id`),
  ADD CONSTRAINT `goods_receipt_items_ibfk_3` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`);

--
-- Constraints for table `goods_returns`
--
ALTER TABLE `goods_returns`
  ADD CONSTRAINT `fk_goods_returns_grn` FOREIGN KEY (`goods_receipt_id`) REFERENCES `goods_receipts` (`id`),
  ADD CONSTRAINT `fk_goods_returns_po` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`),
  ADD CONSTRAINT `fk_goods_returns_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `goods_return_items`
--
ALTER TABLE `goods_return_items`
  ADD CONSTRAINT `fk_return_items_grn_item` FOREIGN KEY (`goods_receipt_item_id`) REFERENCES `goods_receipt_items` (`id`),
  ADD CONSTRAINT `fk_return_items_inventory` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`),
  ADD CONSTRAINT `fk_return_items_location` FOREIGN KEY (`location_id`) REFERENCES `inventory_locations` (`id`),
  ADD CONSTRAINT `fk_return_items_return` FOREIGN KEY (`goods_return_id`) REFERENCES `goods_returns` (`id`);

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
-- Constraints for table `resource_requisition_fulfillments`
--
ALTER TABLE `resource_requisition_fulfillments`
  ADD CONSTRAINT `fk_fulfillment_requisition` FOREIGN KEY (`requisition_id`) REFERENCES `resource_requisitions` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fulfillment_user` FOREIGN KEY (`fulfilled_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `resource_requisition_fulfillment_items`
--
ALTER TABLE `resource_requisition_fulfillment_items`
  ADD CONSTRAINT `fk_fulfillment_inventory` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fulfillment_inventory_movement` FOREIGN KEY (`inventory_movement_id`) REFERENCES `inventory_movements` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fulfillment_item_header` FOREIGN KEY (`fulfillment_id`) REFERENCES `resource_requisition_fulfillments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fulfillment_location` FOREIGN KEY (`location_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fulfillment_project_cost` FOREIGN KEY (`project_cost_id`) REFERENCES `project_costs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fulfillment_requisition_item` FOREIGN KEY (`requisition_item_id`) REFERENCES `resource_requisition_items` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `resource_requisition_items`
--
ALTER TABLE `resource_requisition_items`
  ADD CONSTRAINT `fk_rri_inventory` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rri_requisition` FOREIGN KEY (`requisition_id`) REFERENCES `resource_requisitions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
