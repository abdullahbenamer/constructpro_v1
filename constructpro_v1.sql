-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2026 at 07:29 AM
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
(2, 'Terasaki', 2, 'www.terasaki.com', '2026-06-06 22:47:07'),
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
(34, 'ITTIHAD', 12, 'www.ittihad.ly', '2026-06-21 21:13:14'),
(35, 'Generic', 12, 'sample.com', '2026-09-01 10:55:03'),
(36, 'Local', 12, 'sample.com', '2026-09-01 10:55:03'),
(37, 'Tunisia', 14, 'sample.com', '2026-09-01 10:57:02'),
(38, 'Algerian', 13, 'sample.com', '2026-09-01 10:57:34'),
(39, 'Egypt', 15, 'sample.com', '2026-09-01 10:58:03');

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
(12, 'LIBYA', 'LY'),
(13, 'Algeria', 'DZ'),
(14, 'Tunisia', 'TN'),
(15, 'Egypt', 'EG');

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
(2, 'Sayed Saleem', 'Libya Power Instrumentation Ltd', 'info@lpp.com', '0923456787', '', 'active', '2026-04-07 20:11:12', 6),
(5, 'Khaled Sadoon', 'Switchgear Electric Co.', 'info@khaled.ly', '0944567899', 'Misrata Industrial Area', 'active', '2026-04-07 20:34:24', 8),
(14, 'عبدالحميد العبدالله', 'الموارد الذاتية المساهمة الليبية', 'mawared@ems.com', '0960258765', 'جنة العريف طرابلس ليبيا', 'active', '2026-09-24 10:32:54', NULL),
(16, 'سالم سلوم', 'شركة الاخوة للتنمية', 'bico@email.com', '0982658765', 'زاوية الدهماني ', 'active', '2026-09-27 13:15:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `employee_code` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `national_id` varchar(100) DEFAULT NULL,
  `passport_number` varchar(100) DEFAULT NULL,
  `marital_status` enum('single','married','divorced','widowed') DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `job_title` varchar(150) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `employment_type` enum('full_time','part_time','contract','temporary','intern') DEFAULT 'full_time',
  `status` enum('active','inactive','terminated','on_leave') DEFAULT 'active',
  `work_email` varchar(255) DEFAULT NULL,
  `work_mobile` varchar(50) DEFAULT NULL,
  `personal_email` varchar(255) DEFAULT NULL,
  `personal_mobile` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `emergency_contact_name` varchar(255) DEFAULT NULL,
  `emergency_contact_relationship` varchar(100) DEFAULT NULL,
  `emergency_contact_mobile` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(45, 'GRN-20261018091129', 65, 3, '2026-10-18', 160000.00, 160000.00, '', 1, '2026-10-18 07:11:29'),
(46, 'GRN-261018140750', 69, 3, '2026-10-18', 240.00, 240.00, '', 1, '2026-10-18 12:07:50'),
(47, 'GRN-261018141015', 70, 2, '2026-10-18', 105.00, 105.00, '', 1, '2026-10-18 12:10:15'),
(48, 'GRN-261018143227', 71, 4, '2026-10-18', 6125.00, 6125.00, '', 1, '2026-10-18 12:32:27'),
(49, 'GRN-261018143319', 71, 4, '2026-10-18', 245.00, 245.00, '', 1, '2026-10-18 12:33:19'),
(50, 'GRN-261020072756', 74, 4, '2026-10-20', 56.25, 56.25, '', 1, '2026-10-20 05:27:56');

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
(37, 45, 69, 111, 41, 5000.00, 32.00, 160000.00),
(38, 46, 73, 148, 41, 10.00, 24.00, 240.00),
(39, 47, 74, 157, 3, 5.00, 21.00, 105.00),
(40, 48, 75, 114, 3, 2500.00, 2.45, 6125.00),
(41, 49, 75, 114, 3, 100.00, 2.45, 245.00),
(42, 50, 83, 155, 2, 15.00, 3.75, 56.25);

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

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `quantity` decimal(12,2) NOT NULL DEFAULT 0.00,
  `location_id` int(11) DEFAULT NULL,
  `min_stock` int(11) DEFAULT 10,
  `cost_price` decimal(10,2) DEFAULT 0.00,
  `base_unit` varchar(20) DEFAULT 'unit',
  `unit_id` int(11) NOT NULL,
  `allow_fraction` tinyint(1) DEFAULT 0,
  `brand_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `description`, `category`, `sku`, `quantity`, `location_id`, `min_stock`, `cost_price`, `base_unit`, `unit_id`, `allow_fraction`, `brand_id`, `country_id`) VALUES
(111, 'Portland Cement 42.5N', 'Portland cement, strength class 42.5N', 'BUILDING & FINISHING', 'CEM-42-001', 5350.00, NULL, 50, 32.00, 'BAG', 3, 0, 36, 12),
(112, 'Portland Cement 52.5N', 'Portland cement, strength class 52.5N', 'BUILDING & FINISHING', 'CEM-52-001', 230.00, NULL, 50, 15.50, 'BAG', 3, 0, 36, 12),
(113, 'Ready Mix Concrete C25', 'Ready-mix concrete, C25', 'BUILDING & FINISHING', 'CON-C25-001', 25.00, NULL, 5, 95.00, 'M3', 15, 1, NULL, 12),
(114, 'Concrete Block 20cm', 'Concrete block, 20 cm thickness', 'BUILDING & FINISHING', 'BLK-20-001', 4685.00, NULL, 500, 2.45, 'PCS', 1, 0, 36, 12),
(115, 'Concrete Block 15cm', 'Concrete block, 15 cm thickness', 'BUILDING & FINISHING', 'BLK-15-001', 5285.00, NULL, 500, 1.55, 'PCS', 1, 0, NULL, 12),
(117, 'Coarse Aggregate 20mm', 'Coarse aggregate, 20 mm', 'BUILDING & FINISHING', 'AGR-20-001', 100.00, NULL, 15, 120.00, 'M3', 15, 1, NULL, 12),
(118, 'Construction Gravel', 'Construction gravel', 'BUILDING & FINISHING', 'GRV-001', 43.00, NULL, 10, 80.00, 'M3', 15, 1, NULL, 12),
(119, 'Red Brick', 'Red clay brick', 'BUILDING & FINISHING', 'BRK-RED-001', 5000.00, NULL, 1000, 0.65, 'PCS', 1, 0, NULL, 12),
(120, 'Plastering Cement', 'Plastering cement', 'BUILDING & FINISHING', 'PLS-CEM-001', 500.00, NULL, 50, 11.50, 'BAG', 3, 0, 36, 12),
(122, 'Ceramic Floor Tile 60x60', 'Ceramic floor tile, 60 × 60 cm', 'BUILDING & FINISHING', 'TIL-6060-001', 936.00, NULL, 100, 25.80, 'M2', 14, 0, NULL, 12),
(123, 'Ceramic Wall Tile 30x60', 'Ceramic wall tile, 30 × 60 cm', 'BUILDING & FINISHING', 'TIL-3060-001', 620.00, NULL, 100, 6.00, 'M2', 14, 1, 35, 12),
(124, 'Waterproofing Membrane 4mm', 'Waterproofing membrane, 4 mm', 'BUILDING & FINISHING', 'WPM-4-001', 120.00, NULL, 20, 42.00, 'ROLL', 4, 0, NULL, 12),
(125, 'PVC Water Tank 1000L', 'PVC water tank, 1000 L', 'PLUMBING & DRAINAGE', 'TANK-1000-001', 20.00, NULL, 5, 450.00, 'PCS', 1, 0, NULL, 12),
(126, 'Rebar 8mm', 'Steel reinforcement bar, 8 mm', 'BUILDING & FINISHING', 'REB-08-001', 3500.00, NULL, 500, 3.20, 'MTR', 10, 1, 34, 12),
(127, 'Rebar 10mm', 'Steel reinforcement bar, 10 mm', 'BUILDING & FINISHING', 'REB-10-001', 2800.00, NULL, 500, 4.80, 'MTR', 10, 1, 34, 12),
(128, 'Rebar 12mm', 'Steel reinforcement bar, 12 mm', 'BUILDING & FINISHING', 'REB-12-001', 3200.00, NULL, 500, 6.90, 'MTR', 10, 1, 34, 12),
(129, 'Rebar 16mm', 'Steel reinforcement bar, 16 mm', 'BUILDING & FINISHING', 'REB-16-001', 2200.00, NULL, 400, 11.80, 'MTR', 10, 1, 34, 12),
(130, 'Rebar 20mm', 'Steel reinforcement bar, 20 mm', 'BUILDING & FINISHING', 'REB-20-001', 1200.00, NULL, 250, 18.20, 'MTR', 10, 1, 34, 12),
(131, 'Steel Angle 50x50x5mm', 'Steel angle, 50 × 50 × 5 mm', 'BUILDING & FINISHING', 'ANG-50505-001', 400.00, NULL, 50, 28.00, 'MTR', 10, 1, 34, 12),
(132, 'Steel Channel 100mm', 'Steel channel, 100 mm', 'BUILDING & FINISHING', 'CHN-100-001', 230.00, NULL, 50, 42.00, 'MTR', 10, 1, 34, 12),
(135, 'Electrical Cable 1.5mm² Single Core', 'Electrical cable, 1.5 mm² single core', 'ELECTRICAL', 'CAB-1.5-001', 2500.00, NULL, 500, 1.15, 'MTR', 10, 1, 3, 3),
(136, 'Electrical Cable 2.5mm² Single Core', 'Electrical cable, 2.5 mm² single core', 'ELECTRICAL ', 'CAB-2.5-001', 2861.80, NULL, 500, 1.75, 'MTR', 10, 1, 3, 3),
(137, 'Electrical Cable 4mm² Single Core', 'Electrical cable, 4 mm² single core', 'ELECTRICAL ', 'CAB-4-001', 1399.25, NULL, 400, 2.80, 'MTR', 10, 1, 3, 3),
(138, 'Electrical Cable 6mm² Single Core', 'Electrical cable, 6 mm² single core', 'ELECTRICAL ', 'CAB-6-001', 1400.00, NULL, 300, 3.95, 'MTR', 10, 1, 3, 3),
(139, 'Power Cable 4C x 16mm²', 'Power cable, 4C × 16 mm²', 'ELECTRICAL', 'PWC-4C16-001', 600.00, NULL, 100, 18.50, 'MTR', 10, 1, 19, 6),
(140, 'Power Cable 4C x 35mm²', 'Power cable, 4C × 35 mm²', 'ELECTRICAL', 'PWC-4C35-001', 500.00, NULL, 100, 34.50, 'MTR', 10, 1, 20, 9),
(141, 'Power Cable 4C x 70mm²', 'Power cable, 4C × 70 mm²', 'ELECTRICAL', 'PWC-4C70-001', 300.00, NULL, 50, 58.00, 'MTR', 10, 1, 19, 6),
(142, 'Wall Socket 13A UK', 'Wall socket, 13A UK', 'ELECTRICAL', 'WS-13A-UK-001', 1000.00, NULL, 100, 2.25, 'PCS', 1, 0, 8, 9),
(143, 'Double Wall Socket 13A UK', 'Double wall socket, 13A UK', 'ELECTRICAL', 'WS-D13A-001', 489.00, NULL, 100, 3.40, 'PCS', 1, 0, 8, 9),
(144, 'LED Panel Light 600x600 40W', 'LED panel light, 600 × 600 mm, 40 W', 'ELECTRICAL', 'LED-PNL-40-001', 100.00, NULL, 20, 28.00, 'PCS', 1, 0, 5, 9),
(145, 'MCB 1P 16A', 'MCB, 1P, 16A', 'ELECTRICAL', 'MCB-1P16-001', 150.00, NULL, 30, 8.50, 'PCS', 1, 0, 5, 9),
(146, 'MCB 3P 32A', 'MCB, 3P, 32A', 'ELECTRICAL', 'MCB-3P32-001', 80.00, NULL, 15, 24.00, 'PCS', 1, 0, 5, 9),
(147, 'Distribution Board 12-Way', 'Distribution board, 12-way', 'ELECTRICAL', 'DB-12W-001', 24.00, NULL, 5, 95.00, 'PCS', 1, 0, 5, 9),
(148, 'Contactor 25A', 'Contactor, 25A', 'ELECTRICAL', 'CNT-25A-001', 41.00, NULL, 10, 24.00, 'PCS', 1, 0, 1, 1),
(149, 'Terminal Block 6mm²', 'Terminal block, 6 mm²', 'ELECTRICAL', 'TB-6-001', 500.00, NULL, 100, 0.75, 'PCS', 1, 0, 21, 1),
(150, 'PVC Pipe 20mm', 'PVC pipe, 20 mm', 'PLUMBING & DRAINAGE', 'PVC-20-001', 800.00, NULL, 100, 2.40, 'MTR', 10, 1, NULL, 12),
(151, 'PVC Pipe 32mm', 'PVC pipe, 32 mm', 'PLUMBING & DRAINAGE', 'PVC-32-001', 600.00, NULL, 100, 3.80, 'MTR', 10, 1, NULL, 12),
(152, 'PVC Pipe 50mm', 'PVC pipe, 50 mm', 'PLUMBING & DRAINAGE', 'PVC-50-001', 450.00, NULL, 80, 5.90, 'MTR', 10, 1, NULL, 12),
(153, 'PPR Pipe 25mm', 'PPR pipe, 25 mm', 'PLUMBING & DRAINAGE', 'PPR-25-001', 400.00, NULL, 80, 4.80, 'MTR', 10, 1, NULL, 12),
(154, 'PVC Elbow 90° 25mm', 'PVC elbow, 90°, 25 mm', 'PLUMBING & DRAINAGE', 'ELB-25-90-001', 300.00, NULL, 50, 1.20, 'PCS', 1, 0, NULL, 12),
(155, 'Brass Ball Valve 1\"', 'Brass ball valve, 1 inch', 'PLUMBING & DRAINAGE', 'VAL-BV-1-001', 80.00, NULL, 15, 3.75, 'PCS', 1, 0, NULL, 12),
(156, 'Bearing 6204', 'Ball bearing, 6204', 'OTHER', 'BRG-6204-001', 202.00, NULL, 10, 35.00, 'PCS', 1, 0, 6, 3),
(157, 'Bearing 6205', 'Ball bearing, 6205', 'OTHER', 'BRG-6205-001', 40.50, NULL, 10, 21.00, 'PCS', 1, 0, 6, 3),
(158, 'V-Belt A-42', 'V-belt, A-42', 'OTHER', 'VBT-A42-001', 25.00, NULL, 5, 9.50, 'PCS', 1, 0, NULL, 12),
(159, 'Hydraulic Hose 1/2\"', 'Hydraulic hose, 1/2 inch', 'OTHER', 'HYD-HS-12-001', 250.00, NULL, 50, 8.50, 'MTR', 10, 1, NULL, 12),
(160, 'Hydraulic Oil ISO 46', 'Hydraulic oil, ISO VG 46', 'CONSUMABLES', 'OIL-ISO46-001', 200.00, NULL, 50, 4.80, 'LTR', 16, 1, 7, 12),
(161, 'Engine Oil 15W40', 'Engine oil, 15W-40', 'CONSUMABLES', 'OIL-15W40-001', 145.00, NULL, 30, 5.50, 'LTR', 16, 0, 34, 12),
(162, 'Grease EP2', 'Grease, EP2', 'CONSUMABLES', 'GRS-EP2-001', 80.00, NULL, 20, 7.25, 'KG', 7, 0, 34, 12),
(163, 'Hex Bolt M8x40', 'Hex bolt, M8 × 40 mm', 'OTHER', 'BLT-M8-40-001', 1000.00, NULL, 200, 0.18, 'PCS', 1, 0, 14, 6),
(164, 'Hex Bolt M10x50', 'Hex bolt, M10 × 50 mm', 'OTHER', 'BLT-M10-50-001', 1000.00, NULL, 200, 0.28, 'PCS', 1, 0, NULL, 12),
(165, 'Hex Nut M10', 'Hex nut, M10', 'OTHER', 'NUT-M10-001', 1200.00, NULL, 200, 0.12, 'PCS', 1, 0, NULL, 12),
(166, 'Washer M10', 'Flat washer, M10', 'OTHER', 'WSR-M10-001', 1500.00, NULL, 300, 0.06, 'PCS', 1, 0, NULL, 12),
(167, 'Anchor Bolt M16', 'Anchor bolt, M16', 'OTHER', 'ANC-M16-001', 281.00, NULL, 50, 3.00, 'PCS', 1, 0, NULL, 12),
(168, 'Acrylic Wall Paint White', 'Acrylic wall paint, white', 'BUILDING & FINISHING', 'PNT-WHT-001', 323.00, NULL, 50, 18.00, 'LTR', 16, 0, NULL, 12),
(169, 'Exterior Paint White', 'Exterior paint, white', 'BUILDING & FINISHING', 'PNT-EXT-WHT-001', 180.00, NULL, 30, 21.00, 'LTR', 16, 1, NULL, 12),
(170, 'Epoxy Primer', 'Epoxy primer', 'CONSUMABLES', 'EPX-PRM-001', 99.00, NULL, 20, 24.00, 'LTR', 5, 0, NULL, 12),
(171, 'Silicone Sealant', 'Silicone sealant', 'CONSUMABLES', 'SIL-001', 126.00, NULL, 20, 3.80, 'PCS', 1, 0, NULL, 12),
(172, 'Construction Adhesive', 'Construction adhesive', 'CONSUMABLES', 'ADH-001', 113.00, NULL, 20, 10.75, 'PCS', 1, 0, 27, 15),
(173, 'Safety Shoes S1P', 'Safety shoes, S1P', 'SAFETY & PPE', 'PPE-SHOE-S1P-001', 40.00, NULL, 10, 42.00, 'PAIR', 6, 0, 7, 11),
(174, 'Safety Helmet', 'Industrial safety helmet', 'SAFETY & PPE', 'PPE-HELMET-001', 80.00, NULL, 20, 8.50, 'PCS', 1, 0, 4, 4),
(175, 'Safety Goggles', 'Safety goggles', 'SAFETY & PPE', 'PPE-GOGGLE-001', 100.00, NULL, 20, 3.25, 'PCS', 1, 0, 4, 4),
(176, 'Reflective Safety Vest', 'Reflective safety vest', 'SAFETY & PPE', 'PPE-VEST-001', 80.00, NULL, 20, 6.50, 'PCS', 1, 0, 4, 4),
(177, 'Nitrile Work Gloves', 'Nitrile work gloves', 'SAFETY & PPE', 'PPE-GLOVE-001', 500.00, NULL, 100, 0.75, 'PAIR', 6, 0, 4, 4),
(178, 'Cut Resistant Gloves', 'Cut-resistant gloves', 'SAFETY & PPE', 'PPE-CUT-001', 100.00, NULL, 20, 4.50, 'PAIR', 6, 0, 4, 4),
(179, 'Safety Harness', 'Safety harness', 'SAFETY & PPE', 'PPE-HARNESS-001', 25.00, NULL, 5, 65.00, 'SET', 5, 0, 4, 4),
(180, 'Ear Protection Plugs', 'Ear protection plugs', 'SAFETY & PPE', 'PPE-EAR-001', 300.00, NULL, 50, 0.45, 'PAIR', 6, 0, 4, 4),
(181, 'Dust Mask FFP2', 'Dust mask, FFP2', 'SAFETY & PPE', 'PPE-MASK-001', 570.00, NULL, 100, 0.75, 'PCS', 1, 0, 4, 4),
(182, 'Cutting Disc 115mm', 'Cutting disc, 115 mm', 'OTHER', 'DISC-115-001', 195.00, NULL, 30, 1.20, 'PCS', 1, 0, 8, 9),
(183, 'Grinding Disc 115mm', 'Grinding disc, 115 mm', 'CONSUMABLES', 'GRD-115-001', 149.00, NULL, 30, 1.50, 'PCS', 1, 0, 8, 9),
(184, 'Welding Electrode 3.2mm', 'Welding electrode, 3.2 mm', 'CONSUMABLES', 'WELD-32-001', 100.00, NULL, 20, 4.80, 'KG', 7, 1, NULL, 12),
(185, 'Silica Sandpaper 120 Grit', 'Silica sandpaper, 120 grit', 'CONSUMABLES', 'SAND-120-001', 200.00, NULL, 40, 0.85, 'PCS', 1, 0, NULL, 12),
(186, 'PVC Electrical Tape', 'PVC electrical tape', 'CONSUMABLES', 'TAPE-PVC-001', 150.00, NULL, 30, 1.20, 'ROLL', 4, 0, NULL, 12),
(187, 'Wheelbarrow', 'Construction wheelbarrow', 'HAND TOOLS', 'WLW-50', 60.00, NULL, 5, 45.00, 'PCS', 1, 0, 37, 14),
(188, 'Light Bulb 100W', 'Light bulb, 100 W', 'ELECTRICAL', 'LB-100', 0.00, NULL, 100, 0.00, 'PCS', 1, 0, 35, 7),
(189, 'Light Bulb 200W', 'Light bulb, 200 W', 'ELECTRICAL', 'LB-200', 0.00, NULL, 100, 0.00, 'PCS', 1, 0, 8, 8),
(190, 'Light Bulb 500W', 'Light bulb, 500 W', 'ELECTRICAL', 'LB-500', 975.00, NULL, 200, 0.00, 'PCS', 1, 0, 9, 2),
(191, 'Light Bulb 60W', 'Light bulb, 60 W', 'ELECTRICAL', 'LB-60', 0.00, NULL, 100, 0.00, 'PCS', 1, 0, 6, 7),
(192, 'Light Bulb 10W', 'Light bulb, 10 W', 'ELECTRICAL', 'LB-10', 0.00, NULL, 150, 0.00, 'PCS', 1, 0, 7, 7),
(193, 'حذاء مطري طويل', 'Long waterproof safety boot', 'CONSUMABLES', 'SH-RS24', 1500.00, NULL, 10, 0.00, 'PCS', 6, 0, 14, 13),
(194, 'صندوق معدات خفيفة', 'Light-duty tool box', 'HAND TOOLS', 'BX-112', 15.00, NULL, 5, 0.00, 'PCS', 1, 0, 4, 10),
(195, 'Plywood Sheets 0.5\"', 'Plywood Sheets, thickness is 1/2 inch', 'BUILDING & FINISHING', 'PLY-5IN', 0.00, NULL, 50, 0.00, 'unit', 1, 0, 35, 12),
(196, 'Flood Light 1000W', 'Outdoor High Power Waterproof 1000W LED Flood Light', 'ELECTRICAL', 'FL-1000', 0.00, NULL, 2, 0.00, 'unit', 1, 0, 6, 1),
(197, 'test', 'descriptionn', 'CIVIL & STRUCTURAL', 'test2', 5.00, NULL, 5, 25.00, 'unit', 1, 0, 14, 8);

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
(1, 'MAIN WH', 'MAIN WAREHOUSE', 'Central Main Warehouse', 'Central Main Warehouse', NULL, '092609876', '2026-06-12 06:27:59'),
(2, 'TAJORA', 'TAJORA WH', 'مخزن النشيع', 'مخزن النشيع', 12, '098723654', '2026-06-12 06:27:59'),
(3, 'JANZOUR', 'JANZOUR WAREHOUSE', 'Janzour Center', 'Janzour Center', NULL, '0942787698', '2026-06-12 06:27:59'),
(32, 'N-TAJ', 'مخزن النشيع تاجوراء', 'مواعيد العمل من 9 صباحا الى 5 مساء', 'النشيع - تاجوراء - شارع اللطعي بقرب ملعب الجولف', NULL, '098635442', '2026-09-18 07:11:34'),
(39, 'PRJ-26-0059', 'PROJECT - PRJ-26-0059 # تعبيد الطريق الدائري الخامس', 'Project inventory location', 'طرابلس طريق الفلاح', NULL, NULL, '2026-10-12 18:38:49'),
(41, 'PRJ-26-0060', 'PROJECT - PRJ-26-0060 # contribution ONE', 'Project inventory location', 'Ghat', NULL, NULL, '2026-10-17 19:40:55');

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
(256, 111, 1, 150.00),
(257, 111, 2, 100.00),
(258, 111, 3, 100.00),
(259, 112, 1, 105.00),
(260, 112, 2, 75.00),
(261, 112, 3, 50.00),
(262, 113, 1, 12.50),
(263, 113, 2, 7.50),
(264, 113, 3, 5.00),
(265, 114, 1, 200.00),
(266, 114, 2, 790.00),
(267, 114, 3, 3095.00),
(268, 115, 1, 1250.00),
(269, 115, 2, 685.00),
(270, 115, 3, 350.00),
(271, 116, 1, 20.00),
(272, 116, 2, 12.00),
(273, 116, 3, 8.00),
(274, 117, 1, 30.00),
(275, 117, 2, 18.00),
(276, 117, 3, 12.00),
(277, 118, 1, 20.00),
(278, 118, 2, 8.00),
(279, 118, 3, 10.00),
(280, 119, 1, 2500.00),
(281, 119, 2, 1500.00),
(282, 119, 3, 1000.00),
(283, 120, 1, 150.00),
(284, 120, 2, 90.00),
(285, 120, 3, 60.00),
(286, 121, 1, 200.00),
(287, 121, 2, 120.00),
(288, 121, 3, 80.00),
(289, 122, 1, 408.00),
(290, 122, 2, 240.00),
(291, 122, 3, 175.00),
(292, 123, 1, 200.00),
(293, 123, 2, 195.00),
(294, 123, 3, 100.00),
(295, 124, 1, 60.00),
(296, 124, 2, 36.00),
(297, 124, 3, 24.00),
(298, 125, 1, 10.00),
(299, 125, 2, 6.00),
(300, 125, 3, 4.00),
(301, 126, 1, 1750.00),
(302, 126, 2, 1050.00),
(303, 126, 3, 700.00),
(304, 127, 1, 1400.00),
(305, 127, 2, 840.00),
(306, 127, 3, 560.00),
(307, 128, 1, 1600.00),
(308, 128, 2, 960.00),
(309, 128, 3, 640.00),
(310, 129, 1, 1100.00),
(311, 129, 2, 660.00),
(312, 129, 3, 440.00),
(313, 130, 1, 600.00),
(314, 130, 2, 360.00),
(315, 130, 3, 240.00),
(316, 131, 1, 200.00),
(317, 131, 2, 120.00),
(318, 131, 3, 80.00),
(319, 132, 1, 105.00),
(320, 132, 2, 75.00),
(321, 132, 3, 50.00),
(322, 133, 1, 60.00),
(323, 133, 2, 36.00),
(324, 133, 3, 24.00),
(325, 134, 1, 0.00),
(326, 134, 2, 23.00),
(327, 134, 3, 16.00),
(328, 135, 1, 1246.56),
(329, 135, 2, 750.00),
(330, 135, 3, 500.00),
(331, 136, 1, 1485.10),
(332, 136, 2, 900.00),
(333, 136, 3, 474.80),
(334, 137, 1, 397.30),
(335, 137, 2, 117.30),
(336, 137, 3, 460.00),
(337, 138, 1, 697.54),
(338, 138, 2, 420.00),
(339, 138, 3, 280.00),
(340, 139, 1, 300.00),
(341, 139, 2, 180.00),
(342, 139, 3, 120.00),
(343, 140, 1, 250.00),
(344, 140, 2, 150.00),
(345, 140, 3, 100.00),
(346, 141, 1, 150.00),
(347, 141, 2, 90.00),
(348, 141, 3, 60.00),
(349, 142, 1, 500.00),
(350, 142, 2, 300.00),
(351, 142, 3, 200.00),
(352, 143, 1, 240.00),
(353, 143, 2, 150.00),
(354, 143, 3, 99.00),
(355, 144, 1, 50.00),
(356, 144, 2, 30.00),
(357, 144, 3, 20.00),
(358, 145, 1, 75.00),
(359, 145, 2, 45.00),
(360, 145, 3, 30.00),
(361, 146, 1, 40.00),
(362, 146, 2, 24.00),
(363, 146, 3, 16.00),
(364, 147, 1, 12.50),
(365, 147, 2, 7.50),
(366, 147, 3, 4.00),
(367, 148, 1, 10.00),
(368, 148, 2, 8.00),
(369, 148, 3, 8.00),
(370, 149, 1, 250.00),
(371, 149, 2, 150.00),
(372, 149, 3, 100.00),
(373, 150, 1, 400.00),
(374, 150, 2, 240.00),
(375, 150, 3, 160.00),
(376, 151, 1, 300.00),
(377, 151, 2, 180.00),
(378, 151, 3, 120.00),
(379, 152, 1, 225.00),
(380, 152, 2, 135.00),
(381, 152, 3, 90.00),
(382, 153, 1, 200.00),
(383, 153, 2, 120.00),
(384, 153, 3, 80.00),
(385, 154, 1, 150.00),
(386, 154, 2, 90.00),
(387, 154, 3, 60.00),
(388, 155, 1, 24.00),
(389, 155, 2, 39.00),
(390, 155, 3, 16.00),
(391, 156, 1, 190.00),
(392, 156, 2, 12.00),
(393, 156, 3, 0.00),
(394, 157, 1, 2.00),
(395, 157, 2, 12.00),
(396, 157, 3, 12.50),
(397, 158, 1, 12.50),
(398, 158, 2, 7.50),
(399, 158, 3, 5.00),
(400, 159, 1, 125.00),
(401, 159, 2, 75.00),
(402, 159, 3, 50.00),
(403, 160, 1, 100.00),
(404, 160, 2, 60.00),
(405, 160, 3, 40.00),
(406, 161, 1, 75.00),
(407, 161, 2, 45.00),
(408, 161, 3, 25.00),
(409, 162, 1, 40.00),
(410, 162, 2, 24.00),
(411, 162, 3, 16.00),
(412, 163, 1, 400.00),
(413, 163, 2, 300.00),
(414, 163, 3, 200.00),
(415, 164, 1, 500.00),
(416, 164, 2, 300.00),
(417, 164, 3, 200.00),
(418, 165, 1, 600.00),
(419, 165, 2, 360.00),
(420, 165, 3, 240.00),
(421, 166, 1, 750.00),
(422, 166, 2, 450.00),
(423, 166, 3, 300.00),
(424, 167, 1, 150.00),
(425, 167, 2, 90.00),
(426, 167, 3, 31.00),
(427, 168, 1, 99.00),
(428, 168, 2, 75.00),
(429, 168, 3, 50.00),
(430, 169, 1, 90.00),
(431, 169, 2, 54.00),
(432, 169, 3, 36.00),
(433, 170, 1, 50.00),
(434, 170, 2, 30.00),
(435, 170, 3, 19.00),
(436, 171, 1, 60.00),
(437, 171, 2, 42.00),
(438, 171, 3, 24.00),
(439, 172, 1, 28.00),
(440, 172, 2, 32.00),
(441, 172, 3, 32.00),
(442, 173, 1, 20.00),
(443, 173, 2, 12.00),
(444, 173, 3, 8.00),
(445, 174, 1, 40.00),
(446, 174, 2, 24.00),
(447, 174, 3, 16.00),
(448, 175, 1, 50.00),
(449, 175, 2, 30.00),
(450, 175, 3, 20.00),
(451, 176, 1, 40.00),
(452, 176, 2, 24.00),
(453, 176, 3, 16.00),
(454, 177, 1, 250.00),
(455, 177, 2, 150.00),
(456, 177, 3, 100.00),
(457, 178, 1, 50.00),
(458, 178, 2, 30.00),
(459, 178, 3, 20.00),
(460, 179, 1, 12.50),
(461, 179, 2, 7.50),
(462, 179, 3, 5.00),
(463, 180, 1, 150.00),
(464, 180, 2, 90.00),
(465, 180, 3, 60.00),
(466, 181, 1, 250.00),
(467, 181, 2, 150.00),
(468, 181, 3, 100.00),
(469, 182, 1, 95.00),
(470, 182, 2, 60.00),
(471, 182, 3, 40.00),
(472, 183, 1, 75.00),
(473, 183, 2, 45.00),
(474, 183, 3, 29.00),
(475, 184, 1, 50.00),
(476, 184, 2, 30.00),
(477, 184, 3, 20.00),
(478, 185, 1, 100.00),
(479, 185, 2, 60.00),
(480, 185, 3, 40.00),
(481, 186, 1, 75.00),
(482, 186, 2, 45.00),
(483, 186, 3, 30.00),
(488, 187, 1, 55.00),
(489, 187, 2, 5.00),
(493, 114, 32, 600.00),
(494, 172, 32, 21.00),
(495, 117, 32, 40.00),
(496, 181, 32, 70.00),
(497, 123, 32, 125.00),
(498, 156, 32, 0.00),
(499, 122, 32, 113.00),
(501, 193, 32, 1000.00),
(502, 194, 32, 15.00),
(503, 193, 3, 500.00),
(504, 168, 32, 99.00),
(505, 148, 32, 5.00),
(506, 115, 32, 2000.00),
(507, 120, 32, 200.00),
(508, 190, 32, 975.00),
(509, 137, 32, 424.65),
(510, 155, 32, 1.00),
(511, 163, 32, 100.00),
(512, 138, 32, 2.46),
(513, 135, 32, 3.44),
(514, 136, 32, 1.90),
(515, 134, 32, 35.00),
(516, 157, 32, 14.00),
(517, 118, 32, 0.50),
(521, 197, 32, 5.00),
(522, 111, 32, 0.00),
(523, 111, 41, 5000.00),
(524, 148, 41, 10.00);

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
(490, 197, 32, 'ADJUSTMENT', 7.50, NULL, NULL, NULL, NULL, 7.50, 7.50, 'ADJ-261016182325', 'PHYSICAL_COUNT_CORRECTION - some notes', 1, '2026-10-16 16:23:25'),
(491, 197, 32, 'ADJUSTMENT', 0.50, NULL, NULL, NULL, NULL, 8.00, 8.00, 'ADJ-261016182609', 'FOUND - test', 1, '2026-10-16 16:26:09'),
(492, 197, 32, 'OUT', 3.00, NULL, NULL, NULL, NULL, 5.00, 5.00, 'PROJECT #59', 'descriptionn', 1, '2026-10-16 16:34:07'),
(493, 197, 32, 'OUT', 2.00, NULL, NULL, NULL, NULL, 3.00, 3.00, 'PROJECT #59', 'descriptionn', 1, '2026-10-16 16:36:29'),
(494, 197, 32, 'IN', 2.00, NULL, NULL, NULL, NULL, 5.00, 5.00, 'PROJECT #59', 'descriptionn', 1, '2026-10-16 16:37:30'),
(495, 147, 3, 'OUT', 1.00, NULL, NULL, NULL, NULL, 4.00, 24.00, 'PROJECT #59', 'Distribution board, 12-way', 1, '2026-10-17 19:05:25'),
(496, 111, 3, 'OUT', 10.00, NULL, NULL, NULL, NULL, 90.00, 350.00, NULL, 'Warehouse Transfer #89', 1, '2026-10-17 19:50:11'),
(497, 111, 32, 'IN', 10.00, NULL, NULL, NULL, NULL, 10.00, 350.00, NULL, 'Warehouse Transfer #89', 1, '2026-10-17 19:50:11'),
(498, 111, 32, 'OUT', 10.00, NULL, NULL, NULL, NULL, 0.00, 350.00, NULL, 'Reversal of Transfer #89', 1, '2026-10-17 19:54:32'),
(499, 111, 3, 'IN', 10.00, NULL, NULL, NULL, NULL, 100.00, 350.00, NULL, 'Reversal of Transfer #89', 1, '2026-10-17 19:54:32'),
(500, 132, 1, 'OUT', 20.00, NULL, NULL, NULL, NULL, 105.00, 230.00, 'PROJECT #59', 'Reservation Fulfillment: Steel Channel 100mm', 1, '2026-10-17 21:00:48'),
(501, 168, 32, 'OUT', 11.00, NULL, NULL, NULL, NULL, 99.00, 323.00, 'PROJECT #60', 'تنفيذ المواد المحجوزة: Acrylic Wall Paint White', 1, '2026-10-18 05:41:29'),
(502, 111, 41, 'IN', 5000.00, NULL, 3, NULL, NULL, 5000.00, 5350.00, 'GRN-45 / PO-PO-20261014093535', NULL, 1, '2026-10-18 07:11:29'),
(503, 148, 41, 'IN', 10.00, NULL, 3, NULL, NULL, 10.00, 41.00, 'GRN-46 / PO-PO-261018140232', NULL, 1, '2026-10-18 12:07:50'),
(504, 157, 3, 'IN', 5.00, NULL, 2, NULL, NULL, 12.50, 40.50, 'GRN-47 / PO-PO-261018140832', NULL, 1, '2026-10-18 12:10:15'),
(505, 114, 3, 'IN', 2500.00, NULL, 4, NULL, NULL, 2995.00, 4585.00, 'GRN-48 / PO-PO-261018143032', NULL, 1, '2026-10-18 12:32:27'),
(506, 114, 3, 'IN', 100.00, NULL, 4, NULL, NULL, 3095.00, 4685.00, 'GRN-49 / PO-PO-261018143032', NULL, 1, '2026-10-18 12:33:19'),
(507, 155, 2, 'IN', 15.00, NULL, 4, NULL, NULL, 39.00, 80.00, 'GRN-50 / PO-PO-261019225425', NULL, 1, '2026-10-20 05:27:56');

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

--
-- Dumping data for table `inventory_reservations`
--

INSERT INTO `inventory_reservations` (`id`, `inventory_id`, `location_id`, `project_id`, `quantity`, `status`, `reference`, `notes`, `created_by`, `created_at`, `required_by_date`) VALUES
(45, 112, 1, 60, 6.00, 'CANCELLED', 'by site engineer', 'by site engineer', 1, '2026-10-17 20:01:18', '2026-10-18'),
(52, 132, 1, 59, 20.00, 'CANCELLED', '', '', 1, '2026-10-17 20:25:34', '2026-10-21'),
(53, 167, 1, 60, 5.00, 'CANCELLED', '', '', 1, '2026-10-18 05:07:34', '2026-10-20'),
(54, 168, 32, 60, 11.00, 'FULFILLED', '', '', 1, '2026-10-18 05:40:51', '2026-10-20'),
(55, 157, 32, 60, 1.98, 'CANCELLED', '', '', 1, '2026-10-18 06:04:42', '2026-10-20'),
(56, 136, 1, 60, 1.38, 'ACTIVE', '', '', 1, '2026-10-18 06:27:57', '2026-10-20'),
(57, 156, 1, 60, 5.00, 'ACTIVE', '', '', 1, '2026-10-18 06:30:12', '2026-10-28');

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

--
-- Dumping data for table `inventory_transfers`
--

INSERT INTO `inventory_transfers` (`id`, `inventory_id`, `from_location_id`, `to_location_id`, `quantity`, `reference`, `notes`, `created_by`, `created_at`, `reversed_at`, `reversed_by`, `reversal_transfer_id`, `status`) VALUES
(89, 111, 3, 32, 10.00, '', '', 1, '2026-10-17 19:50:11', '2026-10-17 21:54:32', 1, 90, 'REVERSED'),
(90, 111, 32, 3, 10.00, '', 'Reversal of Transfer #89', 1, '2026-10-17 19:54:32', NULL, NULL, NULL, 'COMPLETED');

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
(7, 'project_costs.view', 'View project costs'),
(10, 'projects.create', 'Create projects'),
(11, 'projects.edit', 'Edit projects'),
(12, 'inventory.edit', 'Edit inventory items'),
(13, 'project_finance.view', 'View finance'),
(16, 'reports.view', 'View reports'),
(17, 'customers.view', 'View customers'),
(18, 'customers.create', 'Create customers'),
(19, 'customers.edit', 'Edit customers'),
(20, 'customers.delete', 'Delete customers'),
(21, 'inventory.create', 'Create inventory items'),
(22, 'inventory.delete', 'Delete inventory items'),
(23, 'projects.delete', 'Delete projects'),
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
(43, 'resource_requisitions.approve', 'Approve Resource Requisitions'),
(44, 'goods_returns.create', 'Create goods return'),
(45, 'resource_requisitions.fulfill', 'User can Fulfill Resources Requestions for projects'),
(46, 'purchase_orders.approve', 'Approving purchase orders'),
(47, 'supplier_quotations.view', 'view quotations'),
(48, 'supplier_quotations.create', 'create quotations'),
(49, 'inventory_adjustments.view', 'view inventory adjustments'),
(50, 'inventory_adjustments.create', 'create inventory adjustments'),
(51, 'projects.archive', 'Archive projects'),
(52, 'projects.restore', 'Restore archived projects'),
(53, 'projects.documents.create', 'Upload project documents'),
(54, 'projects.documents.delete', 'Delete project documents'),
(55, 'project_advances.view', 'View project advances'),
(56, 'project_advances.create', 'Create project advances'),
(57, 'project_advances.settle', 'Settle project advances'),
(58, 'project_costs.create', 'Create project costs'),
(59, 'project_costs.edit', 'Edit project costs'),
(60, 'project_costs.delete', 'Delete project costs'),
(61, 'inventory_locations.edit', 'Edit inventory locations'),
(62, 'inventory_locations.delete', 'Delete inventory locations'),
(63, 'inventory_reservations.edit', 'Edit inventory reservations'),
(64, 'inventory_reservations.delete', 'Delete inventory reservations'),
(65, 'inventory_reservations.fulfill', 'Fulfill inventory reservations'),
(66, 'inventory_reservations.cancel', 'Cancel inventory reservations'),
(67, 'stock_transfers.reverse', 'Reverse stock transfers'),
(68, 'goods_receipts.create', 'Create goods receipts'),
(69, 'goods_returns.view', 'View goods returns'),
(70, 'purchase_orders.edit', 'Edit purchase orders'),
(71, 'purchase_orders.cancel', 'Cancel purchase orders'),
(72, 'supplier_quotations.edit', 'Edit supplier quotations'),
(73, 'supplier_quotations.accept', 'Accept supplier quotations'),
(74, 'supplier_quotations.cancel', 'Cancel supplier quotations'),
(75, 'supplier_quotations.create_po', 'Create purchase orders from supplier quotations'),
(76, 'supplier_payments.view', 'View supplier payments'),
(77, 'supplier_payments.create', 'Create supplier payments'),
(78, 'suppliers.edit', 'Edit suppliers'),
(79, 'suppliers.delete', 'Delete suppliers'),
(80, 'suppliers.ledger', 'View supplier ledger'),
(81, 'resource_requisitions.view', 'View resource requisitions'),
(82, 'resource_requisitions.create', 'Create resource requisitions'),
(83, 'resource_requisitions.edit', 'Edit resource requisitions'),
(84, 'resource_requisitions.delete', 'Delete resource requisitions'),
(85, 'resource_requisitions.submit', 'Submit resource requisitions'),
(86, 'resource_requisitions.reject', 'Reject resource requisitions'),
(87, 'resources.view', 'View resources'),
(88, 'resources.create', 'Create resources'),
(89, 'resources.edit', 'Edit resources'),
(90, 'resources.delete', 'Delete resources'),
(91, 'resource_categories.view', 'View resource categories'),
(92, 'resource_categories.create', 'Create resource categories'),
(93, 'resource_categories.edit', 'Edit resource categories'),
(94, 'resource_categories.delete', 'Delete resource categories'),
(95, 'units.view', 'View units'),
(96, 'units.create', 'Create units'),
(97, 'units.edit', 'Edit units'),
(98, 'units.delete', 'Delete units'),
(99, 'technicians.view', 'View technicians'),
(100, 'purchases.view', 'View purchases'),
(104, 'admin.access', 'Full access for Admin.'),
(110, 'goods_receipts.view', ''),
(113, 'goods_returns.print', ''),
(114, 'goods_receipts.print', ''),
(119, 'dashboard.view', 'Can view the main dashboard page');

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
(59, 39, 16, 'تعبيد الطريق الدائري الخامس', 'Construction', 'تعبيد الطريق الدائري الخامس وتوصيله بالرابع', '2026-12-31', 'planning', 2000000.00, '2026-10-12 18:38:49', 0, 'طرابلس طريق الفلاح', '2026-10-12', 14, '261012', 'PRJ-26-0059', 'medium'),
(60, 41, 14, 'contribution ONE', 'Maintenance', 'Ghat contribution ONEcontribution ONEcontribution ONE', '2026-12-10', 'planning', 0.00, '2026-10-17 19:40:55', 0, 'Ghat', '2026-10-19', NULL, '26905', 'PRJ-26-0060', 'medium');

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
(38, 59, 500000.00, 'Bank Transfer', 'الدفعة الاولى', 'على ان يتم تسويتها في غضون شهر من تاريخه', 1, '2026-10-12', '2026-10-12 18:42:39', 'received', NULL),
(39, 59, 2000.00, 'Cash', 'نقليات اضافية', '', 1, '2026-10-12', '2026-10-12 20:32:14', 'received', NULL);

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
  `unit_id` int(11) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT 1.00,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `unit_price`) STORED,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_costs`
--

INSERT INTO `project_costs` (`id`, `project_id`, `requisition_id`, `fulfillment_id`, `inventory_id`, `resource_id`, `location_id`, `cost_type`, `description`, `unit_id`, `quantity`, `unit_price`, `created_at`) VALUES
(284, 59, NULL, NULL, NULL, NULL, NULL, 'EQUIPMENT', 'رافعة شوكية', 17, 2.00, 500.00, '2026-10-15 16:08:57'),
(285, 59, NULL, NULL, 197, NULL, 32, 'MATERIALS', 'descriptionn', 1, 1.00, 25.00, '2026-10-16 16:34:07'),
(286, 59, NULL, NULL, 197, NULL, 32, 'MATERIALS', 'descriptionn', 1, 2.00, 25.00, '2026-10-16 16:36:29'),
(287, 59, NULL, NULL, 147, NULL, 3, 'MATERIALS', 'Distribution board, 12-way', 1, 1.00, 95.00, '2026-10-17 19:05:25'),
(288, 59, NULL, NULL, 132, NULL, 1, 'MATERIALS', 'Reservation Fulfillment: Steel Channel 100mm', 10, 20.00, 42.00, '2026-10-17 21:00:48'),
(289, 60, NULL, NULL, 168, NULL, 32, 'MATERIALS', 'تنفيذ المواد المحجوزة: Acrylic Wall Paint White', 16, 11.00, 18.00, '2026-10-18 05:41:29');

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
(198, 59, 'advance', 'project_advances', 38, 'الدفعة الاولى', 0.00, 500000.00, 500000.00, '2026-10-12 18:42:39'),
(199, 59, 'advance', 'project_advances', 39, 'نقليات اضافية', 0.00, 2000.00, 502000.00, '2026-10-12 20:32:14'),
(200, 59, 'cost', 'project_costs', 284, 'رافعة شوكية', 1000.00, 0.00, 501000.00, '2026-10-15 16:08:57'),
(201, 59, 'cost', 'project_costs', 285, 'descriptionn', 25.00, 0.00, 500975.00, '2026-10-16 16:34:07'),
(202, 59, 'cost', 'project_costs', 286, 'descriptionn', 50.00, 0.00, 500925.00, '2026-10-16 16:36:29'),
(203, 59, 'cost', 'project_costs', 287, 'Distribution board, 12-way', 95.00, 0.00, 500830.00, '2026-10-17 19:05:25'),
(204, 59, 'cost', 'project_costs', 288, 'Reservation Fulfillment: Steel Channel 100mm', 840.00, 0.00, 499990.00, '2026-10-17 21:00:48'),
(205, 60, 'cost', 'project_costs', 289, 'تنفيذ المواد المحجوزة: Acrylic Wall Paint White', 198.00, 0.00, -198.00, '2026-10-18 05:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `project_scopes`
--

CREATE TABLE `project_scopes` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `scope` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_scopes`
--

INSERT INTO `project_scopes` (`id`, `project_id`, `scope`) VALUES
(54, 45, 'Architectural'),
(53, 45, 'Civil'),
(56, 45, 'MEP'),
(55, 45, 'Structural'),
(8, 48, 'Architectural'),
(7, 48, 'Civil'),
(9, 48, 'MEP'),
(11, 49, 'Architectural'),
(10, 49, 'Civil'),
(13, 49, 'MEP'),
(12, 49, 'Structural'),
(18, 50, 'Finishing'),
(17, 50, 'Structural'),
(32, 51, 'Civil'),
(34, 51, 'Finishing'),
(33, 51, 'MEP'),
(28, 52, 'Finishing'),
(52, 53, 'Architectural'),
(44, 54, 'Architectural'),
(43, 54, 'Civil'),
(46, 54, 'MEP'),
(45, 54, 'Structural'),
(48, 55, 'Architectural'),
(47, 55, 'Civil'),
(51, 55, 'Finishing'),
(50, 55, 'MEP'),
(49, 55, 'Structural'),
(61, 56, 'Architectural'),
(63, 56, 'MEP'),
(62, 56, 'Structural'),
(60, 57, 'Civil'),
(67, 58, 'Architectural'),
(66, 58, 'Civil'),
(69, 59, 'Civil'),
(71, 60, 'Architectural'),
(70, 60, 'Civil'),
(72, 60, 'Structural');

-- --------------------------------------------------------

--
-- Table structure for table `project_settlements`
--

CREATE TABLE `project_settlements` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `advance_id` int(11) NOT NULL,
  `cost_id` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `settlement_type` enum('advance_to_cost') NOT NULL DEFAULT 'advance_to_cost',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ;

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
(65, 'PO-20261014093535', 3, 59, NULL, NULL, 'DIRECT_TO_PROJECT_SITE', 'received', '2026-10-14', '2026-10-21', 175000.00, 0.00, 0.00, 175000.00, 'ملاحظاتي', 1, 1, '2026-10-18 09:03:26', '2026-10-18 09:11:29', '2026-10-14 07:35:35', 'RECEIVED'),
(66, 'PO-261018090908', 4, 60, NULL, NULL, 'DIRECT_TO_PROJECT_SITE', 'cancelled', '2026-10-18', '2026-10-24', 3000.00, 0.00, 0.00, 3000.00, '', 1, NULL, NULL, NULL, '2026-10-18 07:09:08', 'OPEN'),
(67, 'PO-261018135921', 1, NULL, NULL, 3, 'WAREHOUSE', 'cancelled', '2026-10-18', '2026-10-01', 340.00, 0.00, 0.00, 340.00, 'some notes', 1, NULL, NULL, NULL, '2026-10-18 11:59:21', 'OPEN'),
(68, 'PO-261018140054', 4, 60, NULL, NULL, 'DIRECT_TO_PROJECT_SITE', 'cancelled', '2026-10-18', '2026-10-21', 1500.00, 0.00, 0.00, 1500.00, '', 1, 1, '2026-10-18 14:01:24', NULL, '2026-10-18 12:00:54', 'OPEN'),
(69, 'PO-261018140232', 3, 60, NULL, NULL, 'DIRECT_TO_PROJECT_SITE', 'received', '2026-10-18', '2026-10-20', 240.00, 0.00, 0.00, 240.00, '', 1, 1, '2026-10-18 14:02:58', '2026-10-18 14:07:50', '2026-10-18 12:02:32', 'RECEIVED'),
(70, 'PO-261018140832', 2, NULL, NULL, 3, 'WAREHOUSE', 'cancelled', '2026-10-18', '2026-10-20', 460.00, 0.00, 0.00, 460.00, '', 1, 1, '2026-10-18 14:09:00', NULL, '2026-10-18 12:08:32', 'PARTIAL'),
(71, 'PO-261018143032', 4, NULL, NULL, 3, 'WAREHOUSE', 'cancelled', '2026-10-18', '2026-10-21', 7350.00, 0.00, 0.00, 7350.00, '', 1, 1, '2026-10-18 14:31:23', NULL, '2026-10-18 12:30:32', 'PARTIAL'),
(72, 'PO-261019125338', 1, NULL, NULL, 1, 'WAREHOUSE', 'approved', '2026-10-19', NULL, 500.00, 0.00, 0.00, 500.00, '', 1, 1, '2026-10-19 13:52:52', NULL, '2026-10-19 10:53:38', 'OPEN'),
(73, 'PO-261019141114', 1, 60, NULL, NULL, 'DIRECT_TO_PROJECT_SITE', 'draft', '2026-10-19', NULL, 2335.03, 0.00, 0.00, 2335.03, '', 1, NULL, NULL, NULL, '2026-10-19 12:11:14', 'OPEN'),
(74, 'PO-261019225425', 4, NULL, NULL, 2, 'WAREHOUSE', 'received', '2026-10-19', NULL, 56.25, 0.00, 0.00, 56.25, '', 1, 1, '2026-10-19 22:55:37', '2026-10-20 07:27:56', '2026-10-19 20:54:25', 'RECEIVED'),
(75, 'PO-261019225657', 4, 60, NULL, NULL, 'DIRECT_TO_PROJECT_SITE', 'approved', '2026-10-19', NULL, 460.00, 0.00, 0.00, 460.00, '', 1, 1, '2026-10-19 22:57:23', NULL, '2026-10-19 20:56:57', 'OPEN');

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
(69, 65, 111, 5000.00, 5000.00, 35.00, 0.00, NULL, '2026-10-18 07:02:35'),
(70, 66, 167, 2000.00, 0.00, 1.50, 0.00, NULL, '2026-10-18 07:09:37'),
(71, 67, 123, 10.00, 0.00, 34.00, 0.00, NULL, '2026-10-18 11:59:39'),
(72, 68, 155, 100.00, 0.00, 15.00, 0.00, NULL, '2026-10-18 12:01:12'),
(73, 69, 148, 10.00, 10.00, 24.00, 0.00, NULL, '2026-10-18 12:02:48'),
(74, 70, 157, 20.00, 5.00, 23.00, 0.00, NULL, '2026-10-18 12:08:47'),
(75, 71, 114, 3000.00, 2600.00, 2.45, 0.00, NULL, '2026-10-18 12:30:54'),
(76, 72, 193, 20.00, 0.00, 25.00, 0.00, NULL, '2026-10-19 11:51:28'),
(77, 73, 122, 1.62, 0.00, 34.00, 0.00, NULL, '2026-10-19 12:11:42'),
(78, 73, 115, 500.00, 0.00, 2.45, 0.00, NULL, '2026-10-19 17:39:59'),
(79, 73, 123, 5.00, 0.00, 23.00, 0.00, NULL, '2026-10-19 17:51:59'),
(81, 73, 136, 23.35, 0.00, 12.00, 0.00, NULL, '2026-10-19 18:04:23'),
(82, 73, 138, 50.75, 0.00, 13.00, 0.00, NULL, '2026-10-19 20:10:29'),
(83, 74, 155, 15.00, 15.00, 3.75, 0.00, NULL, '2026-10-19 20:55:08'),
(84, 75, 122, 20.00, 0.00, 23.00, 0.00, NULL, '2026-10-19 20:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `resource_code` varchar(50) NOT NULL,
  `resource_name` varchar(150) NOT NULL,
  `resource_name_a` varchar(255) NOT NULL,
  `resource_type` enum('HUMAN_RESOURCES','SERVICE','TRANSPORT','EQUIPMENT','PROFESSIONAL_SERVICES','MISCELLANEOUS') NOT NULL DEFAULT 'HUMAN_RESOURCES',
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
(12, 'EQP-0001', 'Concrete Mixer', 'خلاطة خرسانة', 'EQUIPMENT', 17, 'Portable concrete mixer', 'خلاطة خرسانة متنقلة', 'ACTIVE', '2026-07-13 07:52:15', 8),
(13, 'EQP-0002', 'Plate Compactor', 'مدك للارضيات', 'EQUIPMENT', 14, 'Soil compaction machine', 'آلة دمك التربة', 'ACTIVE', '2026-07-13 07:52:15', 8),
(14, 'EQP-0003', 'Excavator', 'حفارة', 'EQUIPMENT', 17, 'Hydraulic excavator', 'حفارة هيدروليكية', 'ACTIVE', '2026-07-13 07:52:15', 8),
(15, 'EQP-0004', 'Tower Crane', 'رافعة برجية', 'EQUIPMENT', 18, 'Heavy lifting equipment', 'معدات رفع ثقيلة', 'ACTIVE', '2026-07-13 07:52:15', 8),
(16, 'EQP-0005', 'Electric Generator', 'مولد كهرباء', 'EQUIPMENT', 18, 'Diesel generator', 'مولد كهربائي يعمل بالديزل', 'ACTIVE', '2026-07-13 07:52:15', 8),
(17, 'HRS-0001', 'Civil Engineer', 'مهندس مدني', 'HUMAN_RESOURCES', 20, 'Professional engineer', 'مهندس محترف', 'ACTIVE', '2026-07-13 07:52:15', 12),
(18, 'HRS-0002', 'Site Supervisor', 'مشرف موقع', 'HUMAN_RESOURCES', 20, 'Construction supervisor', 'مشرف إنشاءات', 'ACTIVE', '2026-07-13 07:52:15', 13),
(19, 'HRS-0003', 'Mason', 'أسطى بناء', 'HUMAN_RESOURCES', 14, 'Block laying and plastering', 'أعمال بناء البلوك واللياسة', 'ACTIVE', '2026-07-13 07:52:15', 13),
(20, 'HRS-0004', 'Carpenter', 'اسطى نجار', 'PROFESSIONAL_SERVICES', 15, 'Formwork carpenter', 'نجار شدات خشبية', 'ACTIVE', '2026-07-13 07:52:15', 13),
(21, 'HRS-0005', 'Steel Fixer', 'اسطى حداد', 'HUMAN_RESOURCES', 14, 'Rebar installation', 'أعمال تركيب حديد التسليح', 'ACTIVE', '2026-07-13 07:52:15', 13),
(22, 'HRS-0006', 'Electrician', 'اسطى كهربائي', 'HUMAN_RESOURCES', 22, 'Electrical installations', 'أعمال التركيبات الكهربائية', 'ACTIVE', '2026-07-13 07:52:15', 13),
(23, 'HRS-0007', 'Plumber', 'اسطى سباك', 'HUMAN_RESOURCES', 21, 'Plumbing installation', 'أعمال تركيب السباكة', 'ACTIVE', '2026-07-13 07:52:15', 13),
(24, 'EQP-0006', 'Concrete Pumping', 'مضخة خرسانة', 'EQUIPMENT', 15, 'Concrete pumping service', 'خدمة ضخ الخرسانة', 'ACTIVE', '2026-07-13 07:52:15', 8),
(25, 'SRV-0002', 'Survey Works', 'أعمال مساحة', 'PROFESSIONAL_SERVICES', 21, 'Topographic survey', 'أعمال المسح الطبوغرافي', 'ACTIVE', '2026-07-13 07:52:15', 12),
(26, 'EQP-0007', 'Equipment Rental', 'إيجار أليات', 'EQUIPMENT', 17, 'Heavy equipment rental', 'تأجير المعدات الثقيلة', 'ACTIVE', '2026-07-13 07:52:15', 8),
(27, 'TRS-0004', 'Material Delivery', 'نقل مواد', 'TRANSPORT', 9, 'Transportation service', 'خدمة النقل', 'ACTIVE', '2026-07-13 07:52:15', 11),
(28, 'SRV-0005', 'Labor Supply', 'نوريد عمالة', 'SERVICE', 21, 'Temporary labor supply', 'توفير العمالة المؤقتة', 'ACTIVE', '2026-07-13 07:52:15', 11),
(31, 'CON-0001', 'Sub-Contracting', 'مقاولات بالباطن', 'PROFESSIONAL_SERVICES', 21, 'Sub-Contracting at Lump Sum', 'تنفيذ أعمال مقاولة من الباطن بمبلغ مقطوع', 'ACTIVE', '2026-09-11 18:25:32', 11),
(33, 'ABC-0033', 'SITE ENGINEER', 'مهندس موقع', 'HUMAN_RESOURCES', 20, 'Engineer Monthly Based Salary', 'مهندس براتب شهري', 'ACTIVE', '2026-09-27 17:45:23', 12),
(35, 'HRS-0009', 'Telecommunication Technician', 'فني إتصالات وشبكات', 'HUMAN_RESOURCES', 27, 'فني إتصالات وشبكات', NULL, 'ACTIVE', '2026-10-15 19:23:01', 13),
(39, 'HRS-99904', 'penter', 'نجار', 'HUMAN_RESOURCES', 7, '', NULL, 'ACTIVE', '2026-10-15 19:31:37', 13);

-- --------------------------------------------------------

--
-- Table structure for table `resource_categories`
--

CREATE TABLE `resource_categories` (
  `id` int(11) NOT NULL,
  `category_code` varchar(30) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_name_a` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource_categories`
--

INSERT INTO `resource_categories` (`id`, `category_code`, `category_name`, `category_name_a`, `description`, `status`, `created_at`) VALUES
(2, 'STL', 'Steel', 'حديد', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(3, 'MAS', 'Masonary', 'بناء', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(5, 'PLB', 'Plumbing', 'سباكة', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(6, 'HVC', 'Heat, Ventilation & Air Conditioning', 'تكييف وتهوية', 'Heat, Ventilation & Air Conditions - التدفئة والتهوية وتكييف الهواء', 'ACTIVE', '2026-07-12 05:40:56'),
(7, 'FIN', 'Finishes', 'تشطيبات نهائية', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(8, 'EQP', 'Equipment', 'ألات ثقيلة', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(9, 'TLS', 'Tools', 'ادوات ومعدات', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(10, 'LAB', 'Labor', 'عمالة', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(11, 'SRV', 'Services', 'خدمات', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(12, 'ENG', 'Engineering & Design', 'هندسة وتصميم', 'مهندس مدني او مصمم معماري', 'ACTIVE', '2026-09-13 19:58:34'),
(13, 'SKT', 'Skilled Trades', 'المهن الحرفية', 'Specialized, licensed field experts like Masons, Electricians, and Plumbers.', 'ACTIVE', '2026-09-13 20:03:47'),
(18, 'CON', 'concrete', 'خرسانة', 'الاشغال التي تنتمي الى اعمال الخرسانات.', 'ACTIVE', '2026-09-26 20:37:29'),
(19, 'ELC', 'Electric', 'كهرباء', 'الاعمال الكهربائية', 'ACTIVE', '2026-09-27 05:10:41');

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
(76, 'REQ-261012224055', 59, '2026-10-12', '2026-10-14', 1, 'WAREHOUSE', 'MEDIUM', 'APPROVED', '', 1, '2026-10-18 09:45:15', 1, 1, '2026-10-18 09:55:56', '', NULL, '2026-10-12 20:40:55', '2026-10-18 07:55:56'),
(77, 'REQ-261018095225', 60, '2026-10-18', '2026-10-22', 32, 'WAREHOUSE', 'MEDIUM', 'DRAFT', '', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-10-18 07:52:25', NULL);

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
(106, 76, 'SUBMITTED', 1, NULL, '2026-10-18 09:45:15'),
(107, 76, 'APPROVED', 1, '', '2026-10-18 09:55:56');

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

-- --------------------------------------------------------

--
-- Table structure for table `resource_requisition_items`
--

CREATE TABLE `resource_requisition_items` (
  `id` int(11) NOT NULL,
  `requisition_id` int(11) NOT NULL,
  `resource_source` enum('INVENTORY','RESOURCE') NOT NULL,
  `cost_type` enum('MATERIALS','HUMAN_RESOURCES','TRANSPORT','EQUIPMENT','SUBCONTRACT','SITE_EXPENSES','PROFESSIONAL_SERVICES','PERMITS_FEES','INSURANCE','BANK_CHARGES','TAXES','MISCELLANEOUS') DEFAULT NULL,
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

INSERT INTO `resource_requisition_items` (`id`, `requisition_id`, `resource_source`, `cost_type`, `inventory_id`, `resource_id`, `description`, `uom`, `quantity`, `fulfilled_quantity`, `estimated_unit_cost`, `estimated_total`, `remarks`, `status`, `created_at`) VALUES
(107, 76, 'RESOURCE', 'EQUIPMENT', NULL, 12, 'Portable concrete mixer', 'DAY', 10.00, 0.00, 0.00, 0.00, '', 'OPEN', '2026-10-15 16:04:29'),
(108, 76, 'INVENTORY', 'MATERIALS', NULL, 137, 'Electrical cable, 4 mm² single core', 'متر', 100.00, 0.00, 0.00, 0.00, '', 'OPEN', '2026-10-15 16:05:19'),
(109, 77, 'RESOURCE', 'HUMAN_RESOURCES', NULL, 23, 'Plumbing installation', 'LUMP SUM', 1.00, 0.00, 0.00, 0.00, '', 'OPEN', '2026-10-18 07:53:39');

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
(5, 'ACCOUNTANT'),
(1, 'ADMIN'),
(7, 'CASHIER'),
(3, 'ENGINEER'),
(10, 'FORMAN'),
(2, 'MANAGER'),
(8, 'STOREKEEPER'),
(4, 'TECHNICIAN');

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
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
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
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 104),
(1, 110),
(2, 5),
(2, 6),
(2, 7),
(2, 12),
(2, 17),
(2, 21),
(2, 22),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 35),
(2, 36),
(2, 43),
(2, 44),
(2, 45),
(2, 49),
(2, 50),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 68),
(2, 69),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(3, 5),
(3, 6),
(3, 7),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 16),
(3, 17),
(3, 21),
(3, 29),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(3, 39),
(3, 45),
(3, 46),
(3, 47),
(3, 48),
(3, 49),
(3, 51),
(3, 52),
(3, 53),
(3, 55),
(3, 56),
(3, 57),
(3, 58),
(3, 59),
(3, 61),
(3, 62),
(3, 63),
(3, 65),
(3, 66),
(3, 69),
(3, 70),
(3, 71),
(3, 81),
(3, 82),
(3, 83),
(3, 85),
(3, 87),
(3, 91),
(3, 99),
(3, 100),
(4, 5),
(4, 6),
(4, 17),
(4, 29),
(4, 31),
(4, 33),
(4, 34),
(4, 35),
(4, 36),
(4, 37),
(4, 39),
(4, 44),
(4, 45),
(4, 47),
(4, 53),
(4, 68),
(4, 69),
(4, 81),
(4, 82),
(4, 83),
(4, 85),
(4, 87),
(4, 99),
(5, 5),
(5, 6),
(5, 7),
(5, 10),
(5, 12),
(5, 13),
(5, 16),
(5, 17),
(5, 18),
(5, 19),
(5, 21),
(5, 29),
(5, 30),
(5, 31),
(5, 32),
(5, 37),
(5, 38),
(5, 39),
(5, 40),
(5, 46),
(5, 47),
(5, 48),
(5, 49),
(5, 50),
(5, 55),
(5, 56),
(5, 57),
(5, 58),
(5, 59),
(5, 61),
(5, 70),
(5, 71),
(5, 72),
(5, 73),
(5, 74),
(5, 75),
(5, 76),
(5, 77),
(5, 78),
(5, 80),
(5, 100),
(7, 5),
(7, 6),
(7, 7),
(7, 12),
(7, 17),
(7, 21),
(7, 29),
(7, 31),
(7, 32),
(7, 35),
(7, 37),
(7, 39),
(7, 44),
(7, 47),
(7, 50),
(7, 61),
(7, 69),
(7, 81),
(7, 100),
(8, 5),
(8, 6),
(8, 12),
(8, 17),
(8, 21),
(8, 29),
(8, 30),
(8, 31),
(8, 32),
(8, 33),
(8, 34),
(8, 35),
(8, 37),
(8, 39),
(8, 44),
(8, 49),
(8, 56),
(8, 61),
(8, 62),
(8, 67),
(8, 68),
(8, 69),
(8, 81),
(8, 95),
(8, 100),
(9, 5),
(9, 6),
(9, 16),
(9, 17),
(9, 31),
(9, 37),
(9, 39),
(9, 47),
(9, 81),
(9, 87),
(9, 99),
(9, 100),
(10, 5),
(10, 6),
(10, 10),
(10, 11),
(10, 16),
(10, 17),
(10, 19),
(10, 23),
(10, 29),
(10, 31),
(10, 33),
(10, 34),
(10, 35),
(10, 36),
(10, 37),
(10, 39),
(10, 44),
(10, 45),
(10, 47),
(10, 53),
(10, 68),
(10, 69),
(10, 81),
(10, 82),
(10, 83),
(10, 85),
(10, 87),
(10, 99);

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
(1, 'BONYA ALEAMAR - بنية الاعمار الهندسيه', 'uploads/1792165939_ba-logo.png', ' Tripoli, Seyahiya District', '+218910610067', '2026-06-24 07:24:04', '2026-10-16 15:52:19');

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
(1, 'ABB Libya', 'Sami Salem', '+2189987615', 'ales@abb-bya.ly', 'THE SECOND Tripoli Industrial Area', 'THE Authorized ABB distributor and local', '2026-05-08 07:56:15'),
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
(47, 3, 'GRN', 'GoodsReceipt', 45, 160000.00, 'DEBIT', '2026-10-18 07:11:29'),
(48, 3, 'GRN', 'GoodsReceipt', 46, 240.00, 'DEBIT', '2026-10-18 12:07:50'),
(49, 2, 'GRN', 'GoodsReceipt', 47, 105.00, 'DEBIT', '2026-10-18 12:10:15'),
(50, 4, 'GRN', 'GoodsReceipt', 48, 6125.00, 'DEBIT', '2026-10-18 12:32:27'),
(51, 4, 'GRN', 'GoodsReceipt', 49, 245.00, 'DEBIT', '2026-10-18 12:33:19'),
(52, 4, 'GRN', 'GoodsReceipt', 50, 56.25, 'DEBIT', '2026-10-20 05:27:56');

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
-- Table structure for table `supplier_quotations`
--

CREATE TABLE `supplier_quotations` (
  `id` int(11) NOT NULL,
  `quotation_number` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_reference` varchar(100) DEFAULT NULL,
  `procurement_reference` varchar(100) DEFAULT NULL,
  `quotation_date` date NOT NULL,
  `valid_until` date DEFAULT NULL,
  `required_delivery_date` date DEFAULT NULL,
  `promised_delivery_date` date DEFAULT NULL,
  `status` enum('DRAFT','ACCEPTED','CANCELLED') NOT NULL DEFAULT 'DRAFT',
  `purchase_order_id` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `evaluation_notes` text DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_quotation_items`
--

CREATE TABLE `supplier_quotation_items` (
  `id` int(11) NOT NULL,
  `supplier_quotation_id` int(11) NOT NULL,
  `inventory_id` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `specification` text DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `quantity` decimal(15,2) NOT NULL DEFAULT 0.00,
  `unit_price` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total_price` decimal(15,2) GENERATED ALWAYS AS (`quantity` * `unit_price`) STORED,
  `quality_status` enum('MEETS','PARTIAL','DOES_NOT_MEET') DEFAULT NULL,
  `quality_notes` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
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
  `unit_name_a` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_code`, `unit_name`, `unit_name_a`, `description`, `status`, `created_at`) VALUES
(1, 'PCS', 'PIECES', 'قطعة', 'Used for individual pieces or units.', 'ACTIVE', '2026-07-12 05:15:58'),
(2, 'BOX', 'BOX', 'صندوق', 'Used for goods supplied or measured by box.', 'ACTIVE', '2026-07-12 05:15:58'),
(3, 'BAG', 'BAG', 'كيس', 'Used for goods supplied or measured by bag.', 'ACTIVE', '2026-07-12 05:15:58'),
(4, 'ROL', 'ROLL', 'لفة', 'Used for goods supplied or measured by roll.', 'ACTIVE', '2026-07-12 05:15:58'),
(5, 'SET', 'SET', 'طقم', 'Used for goods supplied or measured as a set.', 'ACTIVE', '2026-07-12 05:15:58'),
(6, 'PAR', 'PAIR', 'زوج', 'Used for goods supplied or measured as a pair.', 'ACTIVE', '2026-07-12 05:15:58'),
(7, 'KG', 'KILOGRAM', 'كيلوجرام', 'Unit of mass equal to one thousand grams.', 'ACTIVE', '2026-07-12 05:15:58'),
(8, 'GRM', 'GRAM', 'جرام', 'Unit of mass equal to one thousandth of a kilogram.', 'ACTIVE', '2026-07-12 05:15:58'),
(9, 'TON', 'TON', 'طن', 'Unit of mass used for large quantities of materials.', 'ACTIVE', '2026-07-12 05:15:58'),
(10, 'MTR', 'METER', 'متر', 'Unit of length equal to one meter.', 'ACTIVE', '2026-07-12 05:15:58'),
(11, 'CM', 'CENTIMETER', 'سنتمتر', 'سنتيميتر طولي', 'ACTIVE', '2026-07-12 05:15:58'),
(12, 'MM', 'MILLIMETER', 'مليمتر', 'Unit of length equal to one thousandth of a meter.', 'ACTIVE', '2026-07-12 05:15:58'),
(13, 'KM', 'KILOMETER', 'كيلومتر', 'Unit of length equal to one thousand meters.', 'ACTIVE', '2026-07-12 05:15:58'),
(14, 'M2', 'SQUARE METER', 'متر مربع', 'Unit of area equal to one square meter.', 'ACTIVE', '2026-07-12 05:15:58'),
(15, 'M3', 'CUBIC METER', 'متر مكعب', 'Unit of volume equal to one cubic meter.', 'ACTIVE', '2026-07-12 05:15:58'),
(16, 'LTR', 'LITER', 'لتر', 'Unit of volume equal to one liter.', 'ACTIVE', '2026-07-12 05:15:58'),
(17, 'DAY', 'DAY', 'اجر يومي', 'Used for daily labor, equipment, or service costs.', 'ACTIVE', '2026-07-12 05:15:58'),
(18, 'HR', 'HOUR', 'ساعة', 'Used for hourly labor, equipment, or service costs.', 'ACTIVE', '2026-07-12 05:15:58'),
(20, 'MTH', 'MONTH', 'شهري', 'مرتب شهري', 'ACTIVE', '2026-07-12 05:15:58'),
(21, 'LPS', 'LUMP SUM', 'مبلغ مقطوع', 'التعاقد على مبلغ مقطوع من المال.', 'ACTIVE', '2026-09-11 18:16:23'),
(22, 'PNT', 'POINT', 'نقطة', 'Electrical Distribution Point or any similar professional work.', 'ACTIVE', '2026-09-13 06:09:05'),
(25, 'TRIP', 'TRIP', 'رحلة', 'Unit used for transportation trips.', 'ACTIVE', '2026-10-09 06:06:40'),
(26, 'JOB', 'JOB', 'مهمة', 'Unit used for a completed job or work package.', 'ACTIVE', '2026-10-09 06:06:40'),
(27, 'SRVC', 'SERVICE', 'خدمة', 'Unit used for professional or service-based costs.', 'ACTIVE', '2026-10-09 06:06:40'),
(28, 'ITM', 'ITEM', 'بند', 'Unit used for miscellaneous individual items.', 'ACTIVE', '2026-10-09 06:06:40'),
(29, 'FEE', 'FEE', 'رسوم', 'Unit used for fees and charges.', 'ACTIVE', '2026-10-09 06:06:40'),
(30, 'PLC', 'POLICY', 'وثيقة', 'Unit used for insurance policies.', 'ACTIVE', '2026-10-09 06:06:40'),
(31, 'TRN', 'TRANSACTION', 'معاملة', 'Unit used for transaction-based costs.', 'ACTIVE', '2026-10-09 06:06:40'),
(38, 'WK', 'Week', 'اسبوعي', 'أجر اسبوعي', 'ACTIVE', '2026-10-15 17:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `user_name`, `email`, `mobile`, `photo`, `password`, `created_at`, `role_id`) VALUES
(1, 'Abdullah AlSahli', 'Abdullah', 'admin@ems.com', '+2189988457687', 'uploads/users/user_6aa8e7ac334196.66652294.jpg', '$2y$10$uNBYvJRdBnd5xdlc8ADmb.oCxl4EIVLmd3kuftCWcW7Epbj7CiQrK', '2026-04-07 20:11:12', 1),
(6, 'Ahmad Sudan', 'Ahmad', 'ac@ems.com', '+218912345745', 'uploads/users/user_6ad1f40e39d824.50231873.jpg', '$2y$10$K170SUkPfIqPiRKuTo/ooOL/oxljnnW1tc6h8Tlr7JkdgNjO1UcFS', '2026-04-07 20:34:24', 5),
(8, 'Ali Salem', 'Ali', 'tech@ems.com', '+218918762345', 'uploads/users/user_6abbb32ab44531.94162267.jpg', '$2y$10$uNBYvJRdBnd5xdlc8ADmb.oCxl4EIVLmd3kuftCWcW7Epbj7CiQrK', '2026-04-07 20:34:24', 4),
(11, 'Abdullah Ben Amer', 'Amer', 'benamer@gmail.com', '+218972987645', NULL, '$2y$10$YSYPAjp4O/R.pe40wv4Equfr18/r70omV36YJkE5VU94iTeDCF2P6', '2026-04-20 20:29:44', 8),
(12, 'Sumaya Abdullah', 'Sumaya', 'sumaya@ems.com', '+2189123457687', 'uploads/users/user_6abb622c124b03.34558456.png', '$2y$10$Y.8EQGCefp30HlCMXKLS2OMuMbWAxnaTRHR88HX8AzTRbHRPoYxgG', '2026-04-22 11:59:21', 5),
(14, 'Taha Hussain', 'Taha', 'th@ems.com', '+2189343457687', 'uploads/users/user_6aaf6c9f7141e6.68874237.jpg', '$2y$10$fLhJosWCRxuPtL0C/s5dTup98BZ11Xa0n72HW4qLCBGdEGM0byvEW', '2026-06-12 15:52:02', 2),
(16, 'abdulatif musa', 'abdelatif', 'am@ems.com', '+2189123776487', 'uploads/users/user_6aaed492527af9.10740308.jpg', '$2y$10$PlLMFxaLWxS01oXxwqpFUenxYKAHHGe32.M8yAwdh6oj8izQIvXsW', '2026-06-19 16:50:12', 7),
(17, 'faraj mugharbi', 'farajm', 'fm@ems.com', '+2189127657687', NULL, '$2y$10$pA06wD0MRIA4COTnDPVEt.tlEPyPdrj/Ebkf9RTyzzkaLjuCwRd22', '2026-06-20 08:00:48', 7),
(40, 'sdhjfGHjg', 'kjahjksfhj', 'jxxhvjkdshj@mail.com', '808098908', NULL, '$2y$10$BxWx2bzBj/Lsa5xdi/HLXejkV1gb1Lw61HZ0lh3ga7rQ2zC7WeaWW', '2026-10-16 10:23:42', 7);

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
(1, 4),
(6, 1),
(6, 21),
(6, 22),
(8, 21),
(12, 32),
(16, 1),
(16, 32),
(17, 22);

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
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_code` (`employee_code`),
  ADD KEY `fk_employee_user` (`user_id`),
  ADD KEY `fk_employee_manager` (`manager_id`);

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
  ADD UNIQUE KEY `uq_projects_project_code` (`project_code`),
  ADD KEY `project_customer_fk` (`customer_id`),
  ADD KEY `project_manager_fk` (`project_manager_id`),
  ADD KEY `fk_projects_location` (`location_id`);

--
-- Indexes for table `project_advances`
--
ALTER TABLE `project_advances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `advance_received_by_fk` (`received_by`);

--
-- Indexes for table `project_costs`
--
ALTER TABLE `project_costs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `inventory_id` (`inventory_id`),
  ADD KEY `project_costs_location_fk` (`location_id`),
  ADD KEY `fk_project_costs_unit` (`unit_id`);

--
-- Indexes for table `project_documents`
--
ALTER TABLE `project_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `uploaded_by` (`uploaded_by`);

--
-- Indexes for table `project_ledger`
--
ALTER TABLE `project_ledger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projectid_ledger-fk` (`project_id`);

--
-- Indexes for table `project_scopes`
--
ALTER TABLE `project_scopes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_project_scope` (`project_id`,`scope`);

--
-- Indexes for table `project_settlements`
--
ALTER TABLE `project_settlements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_project_settlements_advance_cost_type` (`advance_id`,`cost_id`,`settlement_type`),
  ADD KEY `idx_project_settlements_project` (`project_id`),
  ADD KEY `idx_project_settlements_advance` (`advance_id`),
  ADD KEY `idx_project_settlements_cost` (`cost_id`);

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
  ADD KEY `purchase_orders_ibfk_1` (`supplier_id`),
  ADD KEY `fk_po_project` (`project_id`),
  ADD KEY `fk_po_requisition` (`requisition_id`),
  ADD KEY `fk_po_target_warehouse` (`target_warehouse_id`);

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
  ADD UNIQUE KEY `uq_resource_name` (`resource_name`) USING BTREE,
  ADD UNIQUE KEY `uq_resource_code` (`resource_code`) USING BTREE,
  ADD UNIQUE KEY `uq_resource_name_a` (`resource_name_a`) USING BTREE,
  ADD KEY `fk_resources_category` (`category_id`),
  ADD KEY `fk_resources_unit` (`unit_id`);

--
-- Indexes for table `resource_categories`
--
ALTER TABLE `resource_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_resource_categories_name` (`category_name`) USING BTREE,
  ADD UNIQUE KEY `uq_resource_categories_code` (`category_code`) USING BTREE,
  ADD UNIQUE KEY `uq_resource_categories_name_a` (`category_name_a`);

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
  ADD KEY `idx_requisition_id` (`requisition_id`),
  ADD KEY `idx_user_id` (`user_id`);

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
-- Indexes for table `supplier_quotations`
--
ALTER TABLE `supplier_quotations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_supplier_quotation_number` (`quotation_number`),
  ADD KEY `idx_supplier_id` (`supplier_id`),
  ADD KEY `idx_created_by` (`created_by`),
  ADD KEY `idx_procurement_reference` (`procurement_reference`),
  ADD KEY `idx_purchase_order_id` (`purchase_order_id`);

--
-- Indexes for table `supplier_quotation_items`
--
ALTER TABLE `supplier_quotation_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_quotation_id` (`supplier_quotation_id`),
  ADD KEY `idx_inventory_id` (`inventory_id`),
  ADD KEY `idx_unit_id` (`unit_id`);

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
  ADD UNIQUE KEY `uq_unit_code` (`unit_code`) USING BTREE,
  ADD UNIQUE KEY `uq_unit_name` (`unit_name`) USING BTREE,
  ADD UNIQUE KEY `uq_unit_name_a` (`unit_name_a`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_mobile` (`mobile`) USING BTREE,
  ADD UNIQUE KEY `uq_user_name` (`user_name`) USING BTREE,
  ADD UNIQUE KEY `uq_email` (`email`) USING BTREE,
  ADD KEY `fk_role` (`role_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goods_receipts`
--
ALTER TABLE `goods_receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `goods_receipt_items`
--
ALTER TABLE `goods_receipt_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `goods_returns`
--
ALTER TABLE `goods_returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `goods_return_items`
--
ALTER TABLE `goods_return_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `inventory_locations`
--
ALTER TABLE `inventory_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `inventory_location_stock`
--
ALTER TABLE `inventory_location_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=525;

--
-- AUTO_INCREMENT for table `inventory_movements`
--
ALTER TABLE `inventory_movements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- AUTO_INCREMENT for table `inventory_reservations`
--
ALTER TABLE `inventory_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `inventory_transfers`
--
ALTER TABLE `inventory_transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `project_advances`
--
ALTER TABLE `project_advances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `project_costs`
--
ALTER TABLE `project_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT for table `project_documents`
--
ALTER TABLE `project_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `project_ledger`
--
ALTER TABLE `project_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `project_scopes`
--
ALTER TABLE `project_scopes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `project_settlements`
--
ALTER TABLE `project_settlements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `resource_categories`
--
ALTER TABLE `resource_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `resource_requisitions`
--
ALTER TABLE `resource_requisitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `resource_requisition_approvals`
--
ALTER TABLE `resource_requisition_approvals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `resource_requisition_fulfillment_items`
--
ALTER TABLE `resource_requisition_fulfillment_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `resource_requisition_items`
--
ALTER TABLE `resource_requisition_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier_ledger`
--
ALTER TABLE `supplier_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `supplier_payments`
--
ALTER TABLE `supplier_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supplier_quotations`
--
ALTER TABLE `supplier_quotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier_quotation_items`
--
ALTER TABLE `supplier_quotation_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `technicians`
--
ALTER TABLE `technicians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_employee_manager` FOREIGN KEY (`manager_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_employee_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

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
  ADD CONSTRAINT `fk_projects_location` FOREIGN KEY (`location_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_manager_fk` FOREIGN KEY (`project_manager_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `project_advances`
--
ALTER TABLE `project_advances`
  ADD CONSTRAINT `advance_received_by_fk` FOREIGN KEY (`received_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `project_advances_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_costs`
--
ALTER TABLE `project_costs`
  ADD CONSTRAINT `fk_project_costs_unit` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_costs_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_costs_location_fk` FOREIGN KEY (`location_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_inventory_costs_fk` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `project_documents`
--
ALTER TABLE `project_documents`
  ADD CONSTRAINT `project_documents_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_documents_ibfk_2` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `project_ledger`
--
ALTER TABLE `project_ledger`
  ADD CONSTRAINT `projectid_ledger-fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `project_scopes`
--
ALTER TABLE `project_scopes`
  ADD CONSTRAINT `fk_project_scopes_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_settlements`
--
ALTER TABLE `project_settlements`
  ADD CONSTRAINT `fk_project_settlements_advance` FOREIGN KEY (`advance_id`) REFERENCES `project_advances` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_project_settlements_cost` FOREIGN KEY (`cost_id`) REFERENCES `project_costs` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_project_settlements_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_po_project` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_po_requisition` FOREIGN KEY (`requisition_id`) REFERENCES `resource_requisitions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_po_target_warehouse` FOREIGN KEY (`target_warehouse_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE,
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
  ADD CONSTRAINT `fk_rr_requested_by` FOREIGN KEY (`requested_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rr_target_warehouse` FOREIGN KEY (`target_warehouse_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE;

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
-- Constraints for table `supplier_quotations`
--
ALTER TABLE `supplier_quotations`
  ADD CONSTRAINT `fk_supplier_quotations_purchase_order` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_supplier_quotations_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `fk_supplier_quotations_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `supplier_quotation_items`
--
ALTER TABLE `supplier_quotation_items`
  ADD CONSTRAINT `fk_supplier_quotation_items_inventory` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`),
  ADD CONSTRAINT `fk_supplier_quotation_items_quote` FOREIGN KEY (`supplier_quotation_id`) REFERENCES `supplier_quotations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_supplier_quotation_items_unit` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

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
