-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2026 at 07:24 AM
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
(35, 'General', 12, 'sample.com', '2026-09-01 10:55:03'),
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
(2, 'Sayed Saleem', 'Libya Power Instrumentation Ltd', 'info@lpp.com', '0923456789', '', 'active', '2026-04-07 20:11:12', 6),
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
(37, 'GRN-20260906210130', 56, 3, '2026-09-06', 1150.00, 1150.00, '', 1, '2026-09-06 19:01:30'),
(38, 'GRN-20260906210253', 56, 3, '2026-09-06', 10320.00, 10320.00, '', 1, '2026-09-06 19:02:53'),
(39, 'GRN-20260910114958', 57, 4, '2026-09-10', 600.00, 600.00, '', 1, '2026-09-10 09:49:58'),
(40, 'GRN-20260920144629', 63, 4, '2026-09-20', 322.50, 322.50, '', 1, '2026-09-20 12:46:29'),
(41, 'GRN-20260920151231', 60, 4, '2026-09-20', 6000.00, 6000.00, 'هناك ارتفاع واضح في السعر بما يعادل 1/3 القيمة الاصلية', 1, '2026-09-20 13:12:31'),
(42, 'GRN-20260924073313', 60, 4, '2026-09-24', 75.00, 75.00, '', 1, '2026-09-24 05:33:13'),
(43, 'GRN-20260924123722', 60, 4, '2026-09-24', 15.00, 15.00, 'متبقي 80 قطعة لم تستلم', 1, '2026-09-24 10:37:22'),
(44, 'GRN-20260926065123', 64, 1, '2026-09-26', 525.00, 525.00, '', 1, '2026-09-26 04:51:23');

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
(29, 37, 57, 156, 1, 200.00, 5.75, 1150.00),
(30, 38, 58, 122, 1, 400.00, 25.80, 10320.00),
(31, 39, 59, 155, 1, 25.00, 24.00, 600.00),
(32, 40, 67, 172, 32, 30.00, 10.75, 322.50),
(33, 41, 64, 117, 32, 50.00, 120.00, 6000.00),
(34, 42, 63, 181, 32, 50.00, 1.50, 75.00),
(35, 43, 63, 181, 32, 20.00, 0.75, 15.00),
(36, 44, 68, 156, 32, 15.00, 35.00, 525.00);

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
(7, 'RTS-260910122040', 4, 39, 57, '2026-09-10', 'كسور واعطاب في الاصناف', '', 360.00, 1, '2026-09-10 10:20:40');

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
(7, 7, 31, 155, 1, 15.00, 24.00, 360.00, '2026-09-10 10:20:40');

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
  `unit_id` int(11) NOT NULL,
  `allow_fraction` tinyint(1) DEFAULT 0,
  `brand_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `category`, `sku`, `quantity`, `location_id`, `min_stock`, `cost_price`, `base_unit`, `unit_id`, `allow_fraction`, `brand_id`, `country_id`) VALUES
(111, 'Portland Cement 42.5N', 'BUILDING & FINISHING', 'CEM-42-001', 450.00, NULL, 50, 12.50, 'BAG', 3, 0, 36, 12),
(112, 'Portland Cement 52.5N', 'BUILDING & FINISHING', 'CEM-52-001', 230.00, NULL, 50, 15.50, 'BAG', 3, 0, 36, 12),
(113, 'Ready Mix Concrete C25', 'BUILDING & FINISHING', 'CON-C25-001', 25.00, NULL, 5, 95.00, 'M3', 15, 1, NULL, 12),
(114, 'Concrete Block 20cm', 'BUILDING & FINISHING', 'BLK-20-001', 2360.00, NULL, 500, 3.25, 'PCS', 1, 0, 36, 12),
(115, 'Concrete Block 15cm', 'BUILDING & FINISHING', 'BLK-15-001', 5285.00, NULL, 500, 1.55, 'PCS', 1, 0, NULL, 12),
(117, 'Coarse Aggregate 20mm', 'BUILDING & FINISHING', 'AGR-20-001', 100.00, NULL, 15, 120.00, 'M3', 15, 1, NULL, 12),
(118, 'Construction Gravel', 'BUILDING & FINISHING', 'GRV-001', 43.00, NULL, 10, 80.00, 'M3', 15, 1, NULL, 12),
(119, 'Red Brick', 'BUILDING & FINISHING', 'BRK-RED-001', 5000.00, NULL, 1000, 0.65, 'PCS', 1, 0, NULL, 12),
(120, 'Plastering Cement', 'BUILDING & FINISHING', 'PLS-CEM-001', 500.00, NULL, 50, 11.50, 'BAG', 3, 0, 36, 12),
(122, 'Ceramic Floor Tile 60x60', 'BUILDING & FINISHING', 'TIL-6060-001', 941.00, NULL, 100, 25.80, 'M2', 14, 1, NULL, 12),
(123, 'Ceramic Wall Tile 30x60', 'BUILDING & FINISHING', 'TIL-3060-001', 620.00, NULL, 100, 6.00, 'M2', 14, 1, NULL, 12),
(124, 'Waterproofing Membrane 4mm', 'BUILDING & FINISHING', 'WPM-4-001', 120.00, NULL, 20, 42.00, 'ROLL', 4, 0, NULL, 12),
(125, 'PVC Water Tank 1000L', 'PLUMBING & DRAINAGE', 'TANK-1000-001', 20.00, NULL, 5, 450.00, 'PCS', 1, 0, NULL, 12),
(126, 'Rebar 8mm', 'BUILDING & FINISHING', 'REB-08-001', 3500.00, NULL, 500, 3.20, 'M', 10, 1, 34, 12),
(127, 'Rebar 10mm', 'BUILDING & FINISHING', 'REB-10-001', 2800.00, NULL, 500, 4.80, 'M', 10, 1, 34, 12),
(128, 'Rebar 12mm', 'BUILDING & FINISHING', 'REB-12-001', 3200.00, NULL, 500, 6.90, 'M', 10, 1, 34, 12),
(129, 'Rebar 16mm', 'BUILDING & FINISHING', 'REB-16-001', 2200.00, NULL, 400, 11.80, 'M', 10, 1, 34, 12),
(130, 'Rebar 20mm', 'BUILDING & FINISHING', 'REB-20-001', 1200.00, NULL, 250, 18.20, 'M', 10, 1, 34, 12),
(131, 'Steel Angle 50x50x5mm', 'BUILDING & FINISHING', 'ANG-50505-001', 400.00, NULL, 50, 28.00, 'M', 10, 1, 34, 12),
(132, 'Steel Channel 100mm', 'BUILDING & FINISHING', 'CHN-100-001', 250.00, NULL, 50, 42.00, 'M', 10, 1, 34, 12),
(134, 'Binding Wire', 'BUILDING & FINISHING', 'BW-001', 94.00, NULL, 15, 4.50, 'KG', 7, 1, NULL, 12),
(135, 'Electrical Cable 1.5mm² Single Core', 'ELECTRICAL', 'CAB-1.5-001', 2500.00, NULL, 500, 1.15, 'M', 10, 1, 3, 3),
(136, 'Electrical Cable 2.5mm² Single Core', 'ELECTRICAL ', 'CAB-2.5-001', 3000.00, NULL, 500, 1.75, 'M', 10, 1, 3, 3),
(137, 'Electrical Cable 4mm² Single Core', 'ELECTRICAL ', 'CAB-4-001', 1800.00, NULL, 400, 2.80, 'M', 10, 1, 3, 3),
(138, 'Electrical Cable 6mm² Single Core', 'ELECTRICAL ', 'CAB-6-001', 1400.00, NULL, 300, 3.95, 'M', 10, 1, 3, 3),
(139, 'Power Cable 4C x 16mm²', 'ELECTRICAL', 'PWC-4C16-001', 600.00, NULL, 100, 18.50, 'M', 10, 1, 19, 6),
(140, 'Power Cable 4C x 35mm²', 'ELECTRICAL', 'PWC-4C35-001', 500.00, NULL, 100, 34.50, 'M', 10, 1, 20, 9),
(141, 'Power Cable 4C x 70mm²', 'ELECTRICAL', 'PWC-4C70-001', 300.00, NULL, 50, 58.00, 'M', 10, 1, 19, 6),
(142, 'Wall Socket 13A UK', 'ELECTRICAL', 'WS-13A-UK-001', 1000.00, NULL, 100, 2.25, 'PCS', 1, 0, 8, 9),
(143, 'Double Wall Socket 13A UK', 'ELECTRICAL', 'WS-D13A-001', 489.00, NULL, 100, 3.40, 'PCS', 1, 0, 8, 9),
(144, 'LED Panel Light 600x600 40W', 'ELECTRICAL', 'LED-PNL-40-001', 100.00, NULL, 20, 28.00, 'PCS', 1, 0, 5, 9),
(145, 'MCB 1P 16A', 'ELECTRICAL', 'MCB-1P16-001', 150.00, NULL, 30, 8.50, 'PCS', 1, 0, 5, 9),
(146, 'MCB 3P 32A', 'ELECTRICAL', 'MCB-3P32-001', 80.00, NULL, 15, 24.00, 'PCS', 1, 0, 5, 9),
(147, 'Distribution Board 12-Way', 'ELECTRICAL', 'DB-12W-001', 25.00, NULL, 5, 95.00, 'PCS', 1, 0, 5, 9),
(148, 'Contactor 25A', 'ELECTRICAL', 'CNT-25A-001', 33.00, NULL, 10, 32.00, 'PCS', 1, 0, 1, 1),
(149, 'Terminal Block 6mm²', 'ELECTRICAL', 'TB-6-001', 500.00, NULL, 100, 0.75, 'PCS', 1, 0, 21, 1),
(150, 'PVC Pipe 20mm', 'PLUMBING & DRAINAGE', 'PVC-20-001', 800.00, NULL, 100, 2.40, 'M', 10, 1, NULL, 12),
(151, 'PVC Pipe 32mm', 'PLUMBING & DRAINAGE', 'PVC-32-001', 600.00, NULL, 100, 3.80, 'M', 10, 1, NULL, 12),
(152, 'PVC Pipe 50mm', 'PLUMBING & DRAINAGE', 'PVC-50-001', 450.00, NULL, 80, 5.90, 'M', 10, 1, NULL, 12),
(153, 'PPR Pipe 25mm', 'PLUMBING & DRAINAGE', 'PPR-25-001', 400.00, NULL, 80, 4.80, 'M', 10, 1, NULL, 12),
(154, 'PVC Elbow 90° 25mm', 'PLUMBING & DRAINAGE', 'ELB-25-90-001', 300.00, NULL, 50, 1.20, 'PCS', 1, 0, NULL, 12),
(155, 'Brass Ball Valve 1\"', 'PLUMBING & DRAINAGE', 'VAL-BV-1-001', 90.00, NULL, 15, 24.00, 'PCS', 1, 0, NULL, 12),
(156, 'Bearing 6204', 'OTHER', 'BRG-6204-001', 254.00, NULL, 10, 35.00, 'PCS', 1, 0, 6, 3),
(157, 'Bearing 6205', 'OTHER', 'BRG-6205-001', 41.00, NULL, 10, 14.50, 'PCS', 1, 0, 6, 3),
(158, 'V-Belt A-42', 'OTHER', 'VBT-A42-001', 25.00, NULL, 5, 9.50, 'PCS', 1, 0, NULL, 12),
(159, 'Hydraulic Hose 1/2\"', 'OTHER', 'HYD-HS-12-001', 250.00, NULL, 50, 8.50, 'M', 10, 1, NULL, 12),
(160, 'Hydraulic Oil ISO 46', 'CONSUMABLES', 'OIL-ISO46-001', 200.00, NULL, 50, 4.80, 'LTR', 16, 1, 7, 12),
(161, 'Engine Oil 15W40', 'CONSUMABLES', 'OIL-15W40-001', 145.00, NULL, 30, 5.50, 'LTR', 16, 1, 34, 12),
(162, 'Grease EP2', 'CONSUMABLES', 'GRS-EP2-001', 80.00, NULL, 20, 7.25, 'KG', 7, 1, 34, 12),
(163, 'Hex Bolt M8x40', 'OTHER', 'BLT-M8-40-001', 1000.00, NULL, 200, 0.18, 'PCS', 1, 0, 14, 6),
(164, 'Hex Bolt M10x50', 'OTHER', 'BLT-M10-50-001', 1000.00, NULL, 200, 0.28, 'PCS', 1, 0, NULL, 12),
(165, 'Hex Nut M10', 'OTHER', 'NUT-M10-001', 1200.00, NULL, 200, 0.12, 'PCS', 1, 0, NULL, 12),
(166, 'Washer M10', 'OTHER', 'WSR-M10-001', 1500.00, NULL, 300, 0.06, 'PCS', 1, 0, NULL, 12),
(167, 'Anchor Bolt M16', 'OTHER', 'ANC-M16-001', 289.00, NULL, 50, 3.00, 'PCS', 1, 0, NULL, 12),
(168, 'Acrylic Wall Paint White', 'BUILDING & FINISHING', 'PNT-WHT-001', 234.00, NULL, 50, 18.00, 'LTR', 16, 1, NULL, 12),
(169, 'Exterior Paint White', 'BUILDING & FINISHING', 'PNT-EXT-WHT-001', 180.00, NULL, 30, 21.00, 'LTR', 16, 1, NULL, 12),
(170, 'Epoxy Primer', 'CONSUMABLES', 'EPX-PRM-001', 99.00, NULL, 20, 24.00, 'LTR', 5, 0, NULL, 12),
(171, 'Silicone Sealant', 'CONSUMABLES', 'SIL-001', 126.00, NULL, 20, 3.80, 'PCS', 1, 0, NULL, 12),
(172, 'Construction Adhesive', 'CONSUMABLES', 'ADH-001', 113.00, NULL, 20, 10.75, 'PCS', 1, 0, 27, 15),
(173, 'Safety Shoes S1P', 'SAFETY & PPE', 'PPE-SHOE-S1P-001', 40.00, NULL, 10, 42.00, 'PAIR', 6, 0, 7, 11),
(174, 'Safety Helmet', 'SAFETY & PPE', 'PPE-HELMET-001', 80.00, NULL, 20, 8.50, 'PCS', 1, 0, 4, 4),
(175, 'Safety Goggles', 'SAFETY & PPE', 'PPE-GOGGLE-001', 100.00, NULL, 20, 3.25, 'PCS', 1, 0, 4, 4),
(176, 'Reflective Safety Vest', 'SAFETY & PPE', 'PPE-VEST-001', 80.00, NULL, 20, 6.50, 'PCS', 1, 0, 4, 4),
(177, 'Nitrile Work Gloves', 'SAFETY & PPE', 'PPE-GLOVE-001', 500.00, NULL, 100, 0.75, 'PAIR', 6, 0, 4, 4),
(178, 'Cut Resistant Gloves', 'SAFETY & PPE', 'PPE-CUT-001', 100.00, NULL, 20, 4.50, 'PAIR', 6, 0, 4, 4),
(179, 'Safety Harness', 'SAFETY & PPE', 'PPE-HARNESS-001', 25.00, NULL, 5, 65.00, 'SET', 5, 0, 4, 4),
(180, 'Ear Protection Plugs', 'SAFETY & PPE', 'PPE-EAR-001', 300.00, NULL, 50, 0.45, 'PAIR', 6, 0, 4, 4),
(181, 'Dust Mask FFP2', 'SAFETY & PPE', 'PPE-MASK-001', 570.00, NULL, 100, 0.75, 'PCS', 1, 0, 4, 4),
(182, 'Cutting Disc 115mm', 'OTHER', 'DISC-115-001', 200.00, NULL, 30, 1.20, 'PCS', 1, 0, 8, 9),
(183, 'Grinding Disc 115mm', 'OTHER', 'GRD-115-001', 149.00, NULL, 30, 1.50, 'PCS', 1, 0, 8, 9),
(184, 'Welding Electrode 3.2mm', 'CONSUMABLES', 'WELD-32-001', 100.00, NULL, 20, 4.80, 'KG', 7, 1, NULL, 12),
(185, 'Silica Sandpaper 120 Grit', 'CONSUMABLES', 'SAND-120-001', 200.00, NULL, 40, 0.85, 'PCS', 1, 0, NULL, 12),
(186, 'PVC Electrical Tape', 'CONSUMABLES', 'TAPE-PVC-001', 150.00, NULL, 30, 1.20, 'ROLL', 4, 0, NULL, 12),
(187, 'Wheelbarrow', 'HAND TOOLS', 'WLW-50', 60.00, NULL, 5, 45.00, 'unit', 1, 0, 37, 14),
(188, 'Light Bulb 100W', 'ELECTRICAL', 'LB-100', 0.00, NULL, 100, 0.00, 'piece', 1, 0, 35, 7),
(189, 'Light Bulb 200W', 'ELECTRICAL', 'LB-200', 0.00, NULL, 100, 0.00, 'piece', 1, 0, 8, 8),
(190, 'Light Bulb 500W', 'ELECTRICAL', 'LB-500', 975.00, NULL, 200, 0.00, 'unit', 1, 0, 9, 2),
(191, 'Light Bulb 60W', 'ELECTRICAL', 'LB-60', 0.00, NULL, 100, 0.00, 'unit', 1, 0, 6, 7),
(192, 'Light Bulb 10W', 'ELECTRICAL', 'LB-10', 0.00, NULL, 150, 0.00, 'unit', 1, 0, 7, 7),
(193, 'حذاء مطري طويل', 'CONSUMABLES', 'SH-RS24', 1500.00, NULL, 10, 0.00, 'unit', 6, 0, 14, 13),
(194, 'صندوق معدات خفيفة', 'HAND TOOLS', 'BX-112', 15.00, NULL, 5, 0.00, 'unit', 1, 0, 4, 10);

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
(21, 'PRJ-46', 'PROJECT - 46# New Office Building', 'Project inventory location', 'Tarhouna the mountains', NULL, '', '2026-09-04 04:59:13'),
(22, 'PRJ-45', 'PROJECT - 45# Construction of XYZ Building', 'Project inventory location', 'South Tripoli, Ain Zara', 15, '0987654236', '2026-09-04 09:37:33'),
(24, 'PRJ-48', 'PROJECT - 48# Building Studio in Janzour', 'Project inventory location', 'Sara, Iloilo', NULL, NULL, '2026-09-07 12:43:08'),
(25, 'PRJ-49', 'PROJECT - 49# Our Tiny house in Sara', 'Project inventory location', 'Sara, Iloilo', NULL, NULL, '2026-09-07 16:32:52'),
(26, 'PRJ-50', 'PROJECT - 50# Bamboo House In Aldeguer', 'Project inventory location', 'Ajuy, Tipacla', NULL, NULL, '2026-09-07 16:36:35'),
(27, 'PRJ-51', 'PROJECT - 51# a test project', 'Project inventory location', 'Alzahra Tripoli', NULL, NULL, '2026-09-07 16:59:38'),
(28, 'PRJ-52', 'PROJECT - 52# abc', 'Project inventory location', 'ABCDEF', NULL, NULL, '2026-09-07 17:10:47'),
(29, 'PRJ-2026-0053', 'PROJECT - PRJ-2026-0053 # any test project', 'Project inventory location', 'Ajuy Tipacla LOT 4', NULL, NULL, '2026-09-07 19:42:16'),
(31, 'PRJ-2026-0055', 'PROJECT - PRJ-2026-0055 # بناء مركز صحي بمنطقة المراونة، تاجوراء', 'Project inventory location', 'منطقة المراونة، تاجوراء، 12 الشارع الرابع.', NULL, NULL, '2026-09-12 13:50:51'),
(32, 'N-TAJ', 'مخزن النشيع تاجوراء', 'مواعيد العمل من 9 صباحا الى 5 مساء', 'النشيع - تاجوراء - شارع اللطعي بقرب ملعب الجولف', 15, '098635442', '2026-09-18 07:11:34'),
(36, 'XYZ', 'xyz store', '', 'xyz location', NULL, '', '2026-09-28 11:07:51'),
(37, 'PRJ-26-0057', 'PROJECT - PRJ-26-0057 # صيانة طريق السلع', 'Project inventory location', 'تاجوراء طريق السلع', NULL, NULL, '2026-09-28 17:46:33');

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
(266, 114, 2, 890.00),
(267, 114, 3, 495.00),
(268, 115, 1, 1250.00),
(269, 115, 2, 685.00),
(270, 115, 3, 350.00),
(271, 116, 1, 20.00),
(272, 116, 2, 12.00),
(273, 116, 3, 8.00),
(274, 117, 1, 30.00),
(275, 117, 2, 18.00),
(276, 117, 3, 12.00),
(277, 118, 1, 21.00),
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
(289, 122, 1, 410.00),
(290, 122, 2, 240.00),
(291, 122, 3, 175.00),
(292, 123, 1, 300.00),
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
(319, 132, 1, 125.00),
(320, 132, 2, 75.00),
(321, 132, 3, 50.00),
(322, 133, 1, 60.00),
(323, 133, 2, 36.00),
(324, 133, 3, 24.00),
(325, 134, 1, 35.00),
(326, 134, 2, 23.00),
(327, 134, 3, 16.00),
(328, 135, 1, 1250.00),
(329, 135, 2, 750.00),
(330, 135, 3, 500.00),
(331, 136, 1, 1500.00),
(332, 136, 2, 900.00),
(333, 136, 3, 600.00),
(334, 137, 1, 900.00),
(335, 137, 2, 540.00),
(336, 137, 3, 360.00),
(337, 138, 1, 700.00),
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
(366, 147, 3, 5.00),
(367, 148, 1, 11.00),
(368, 148, 2, 10.00),
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
(388, 155, 1, 50.00),
(389, 155, 2, 24.00),
(390, 155, 3, 16.00),
(391, 156, 1, 220.00),
(392, 156, 2, 12.00),
(393, 156, 3, 7.00),
(394, 157, 1, 21.00),
(395, 157, 2, 12.00),
(396, 157, 3, 8.00),
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
(412, 163, 1, 500.00),
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
(426, 167, 3, 39.00),
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
(440, 172, 2, 30.00),
(441, 172, 3, 20.00),
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
(469, 182, 1, 100.00),
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
(484, 118, 21, 4.00),
(485, 123, 22, 0.00),
(486, 114, 21, 275.00),
(487, 167, 21, 10.00),
(488, 187, 1, 55.00),
(489, 187, 2, 5.00),
(490, 111, 31, 100.00),
(491, 134, 21, 20.00),
(492, 115, 29, 1000.00),
(493, 114, 32, 500.00),
(494, 172, 32, 35.00),
(495, 117, 32, 40.00),
(496, 181, 32, 70.00),
(497, 123, 32, 25.00),
(498, 156, 32, 15.00),
(499, 122, 32, 111.00),
(500, 122, 36, 5.00),
(501, 193, 32, 1000.00),
(502, 194, 32, 15.00),
(503, 193, 3, 500.00),
(504, 168, 32, 10.00),
(505, 148, 32, 4.00),
(506, 115, 32, 2000.00),
(507, 120, 32, 200.00),
(508, 190, 32, 975.00);

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
(319, 156, 1, 'IN', 200.00, NULL, 3, NULL, NULL, 220.00, 240.00, 'GRN-37 / PO-PO-260906205731', NULL, 1, '2026-09-06 19:01:30'),
(320, 122, 1, 'IN', 400.00, NULL, 3, NULL, NULL, 800.00, 1200.00, 'GRN-38 / PO-PO-260906205731', NULL, 1, '2026-09-06 19:02:53'),
(321, 148, 1, 'OUT', 5.00, NULL, NULL, NULL, NULL, 15.00, 35.00, 'PROJECT #54', 'Contactor 25A', 1, '2026-09-09 06:38:09'),
(322, 155, 1, 'IN', 25.00, NULL, 4, NULL, NULL, 65.00, 105.00, 'GRN-39 / PO-PO-260909203253', NULL, 1, '2026-09-10 09:49:59'),
(323, 155, 1, 'OUT', 15.00, NULL, 4, NULL, NULL, 50.00, 90.00, 'RTS-260910122040', 'Return to supplier: كسور واعطاب في الاصناف', 1, '2026-09-10 10:20:40'),
(324, 122, 1, 'OUT', 500.00, NULL, NULL, NULL, NULL, 300.00, 700.00, 'PROJECT #51', 'Ceramic Floor Tile 60x60', 1, '2026-09-10 14:30:10'),
(325, 187, 1, 'ADJUSTMENT', 10.00, NULL, NULL, NULL, NULL, 60.00, 60.00, 'ADJ-260911163626', 'FOUND - Found another 10 Units in the Bedron', 1, '2026-09-11 14:36:26'),
(326, 187, 1, 'OUT', 5.00, NULL, NULL, NULL, NULL, 55.00, 60.00, 'updating Tajora WH', 'Warehouse Transfer #46', 1, '2026-09-11 14:42:53'),
(327, 187, 2, 'IN', 5.00, NULL, NULL, NULL, NULL, 5.00, 60.00, 'updating Tajora WH', 'Warehouse Transfer #46', 1, '2026-09-11 14:42:53'),
(328, 161, 3, 'OUT', 5.00, 5.50, NULL, NULL, 1, 25.00, 145.00, 'RR-FUL-20260912075355-825', 'Resource requisition fulfillment: REQ-260911204609', 1, '2026-09-12 05:53:55'),
(329, 134, 2, 'OUT', 1.00, 4.50, NULL, NULL, 1, 23.00, 79.00, 'RR-FUL-20260912080439-350', 'Resource requisition fulfillment: REQ-260911204609', 1, '2026-09-12 06:04:39'),
(330, 111, 1, 'OUT', 100.00, NULL, NULL, NULL, NULL, 150.00, 500.00, 'طلب تاسيسات لمبني العمال', 'Warehouse Transfer #47', 1, '2026-09-12 13:55:16'),
(331, 111, 31, 'IN', 100.00, NULL, NULL, NULL, NULL, 100.00, 500.00, 'طلب تاسيسات لمبني العمال', 'Warehouse Transfer #47', 1, '2026-09-12 13:55:16'),
(332, 112, 1, 'OUT', 20.00, NULL, NULL, NULL, NULL, 105.00, 230.00, 'PROJECT #55', 'Reservation Fulfillment: Portland Cement 52.5N', 1, '2026-09-12 14:07:30'),
(333, 123, 3, 'OUT', 30.00, NULL, NULL, NULL, NULL, 100.00, 620.00, 'PROJECT #55', 'Reservation Fulfillment: Ceramic Wall Tile 30x60', 1, '2026-09-16 05:44:20'),
(334, 134, 21, 'ADJUSTMENT', 20.00, NULL, NULL, NULL, NULL, 20.00, 99.00, 'ADJ-260918080908', 'FOUND', 1, '2026-09-18 06:09:08'),
(335, 115, 29, 'ADJUSTMENT', 1000.00, NULL, NULL, NULL, NULL, 1000.00, 3435.00, 'ADJ-260918094500', 'FOUND', 16, '2026-09-18 07:45:00'),
(336, 115, 3, 'ADJUSTMENT', -150.00, NULL, NULL, NULL, NULL, 350.00, 3285.00, 'ADJ-260918094651', 'BROKEN', 16, '2026-09-18 07:46:52'),
(337, 114, 1, 'OUT', 500.00, NULL, NULL, NULL, NULL, 1000.00, 3275.00, 'for next project', 'Warehouse Transfer #48', 1, '2026-09-18 13:27:30'),
(338, 114, 32, 'IN', 500.00, NULL, NULL, NULL, NULL, 500.00, 3275.00, 'for next project', 'Warehouse Transfer #48', 1, '2026-09-18 13:27:30'),
(339, 172, 32, 'IN', 30.00, NULL, 4, NULL, NULL, 30.00, 113.00, 'GRN-40 / PO-PO-20260914095038', NULL, 1, '2026-09-20 12:46:29'),
(340, 117, 32, 'IN', 50.00, NULL, 4, NULL, NULL, 50.00, 110.00, 'GRN-41 / PO-PO-260912085701', 'هناك ارتفاع واضح في السعر بما يعادل 1/3 القيمة الاصلية', 1, '2026-09-20 13:12:31'),
(341, 117, 32, 'OUT', 10.00, NULL, NULL, NULL, NULL, 40.00, 100.00, 'PROJECT #45', 'Coarse Aggregate 20mm', 1, '2026-09-20 13:29:42'),
(342, 181, 32, 'IN', 50.00, NULL, 4, NULL, NULL, 50.00, 550.00, 'GRN-42 / PO-PO-260912085701', NULL, 1, '2026-09-24 05:33:14'),
(343, 181, 32, 'IN', 20.00, NULL, 4, NULL, NULL, 70.00, 570.00, 'GRN-43 / PO-PO-260912085701', 'متبقي 80 قطعة لم تستلم', 1, '2026-09-24 10:37:22'),
(344, 123, 1, 'OUT', 25.00, NULL, NULL, NULL, NULL, 300.00, 620.00, NULL, 'Warehouse Transfer #49', 12, '2026-09-25 20:16:35'),
(345, 123, 32, 'IN', 25.00, NULL, NULL, NULL, NULL, 25.00, 620.00, NULL, 'Warehouse Transfer #49', 12, '2026-09-25 20:16:35'),
(346, 156, 32, 'IN', 15.00, NULL, 1, NULL, NULL, 15.00, 255.00, 'GRN-44 / PO-PO-20260917174851', NULL, 1, '2026-09-26 04:51:23'),
(347, 122, 32, 'ADJUSTMENT', 100.00, NULL, NULL, NULL, NULL, 100.00, 800.00, 'ADJ-260926121509', 'PHYSICAL_COUNT_CORRECTION - found 100 M2 in the WH', 1, '2026-09-26 10:15:09'),
(348, 122, 32, 'ADJUSTMENT', -9.00, NULL, NULL, NULL, NULL, 91.00, 791.00, 'ADJ-260926121609', 'BROKEN', 1, '2026-09-26 10:16:09'),
(349, 122, 1, 'OUT', 5.00, NULL, NULL, NULL, NULL, 295.00, 791.00, 'test transfer', 'Warehouse Transfer #50', 1, '2026-09-28 18:23:44'),
(350, 122, 36, 'IN', 5.00, NULL, NULL, NULL, NULL, 5.00, 791.00, 'test transfer', 'Warehouse Transfer #50', 1, '2026-09-28 18:23:44'),
(351, 122, 36, 'OUT', 5.00, NULL, NULL, NULL, NULL, 0.00, 786.00, 'PROJECT #57', 'Ceramic Floor Tile 60x60', 1, '2026-09-28 18:25:17'),
(352, 193, 32, 'ADJUSTMENT', 2000.00, NULL, NULL, NULL, NULL, 2000.00, 2000.00, 'ADJ-260929073548', 'PHYSICAL_COUNT_CORRECTION - وجدنا كمية بالمخزن غير محسزبة سابقا', 1, '2026-09-29 05:35:48'),
(353, 193, 32, 'ADJUSTMENT', -500.00, NULL, NULL, NULL, NULL, 1500.00, 1500.00, 'ADJ-260929073747', 'DAMAGED - 500 زوج تالفة', 1, '2026-09-29 05:37:47'),
(354, 194, 32, 'ADJUSTMENT', 15.00, NULL, NULL, NULL, NULL, 15.00, 15.00, 'ADJ-260929080133', 'PHYSICAL_COUNT_CORRECTION - هناك كمية لم تدخل سابقا', 1, '2026-09-29 06:01:33'),
(355, 193, 32, 'OUT', 500.00, NULL, NULL, NULL, NULL, 1000.00, 1500.00, 'توصيات مدير المشروع', 'Warehouse Transfer #51', 1, '2026-09-29 06:03:53'),
(356, 193, 3, 'IN', 500.00, NULL, NULL, NULL, NULL, 500.00, 1500.00, 'توصيات مدير المشروع', 'Warehouse Transfer #51', 1, '2026-09-29 06:03:53'),
(357, 172, 1, 'OUT', 5.00, NULL, NULL, NULL, NULL, 28.00, 113.00, NULL, 'Warehouse Transfer #52', 1, '2026-09-30 15:20:20'),
(358, 172, 32, 'IN', 5.00, NULL, NULL, NULL, NULL, 35.00, 113.00, NULL, 'Warehouse Transfer #52', 1, '2026-09-30 15:20:20'),
(359, 122, 1, 'OUT', 20.00, NULL, NULL, NULL, NULL, 275.00, 786.00, NULL, 'Warehouse Transfer #53', 1, '2026-09-30 16:15:06'),
(360, 122, 32, 'IN', 20.00, NULL, NULL, NULL, NULL, 111.00, 786.00, NULL, 'Warehouse Transfer #53', 1, '2026-09-30 16:15:06'),
(361, 122, 1, 'OUT', 15.00, NULL, NULL, NULL, NULL, 260.00, 786.00, NULL, 'Warehouse Transfer #54', 1, '2026-09-30 16:20:27'),
(362, 122, 3, 'IN', 15.00, NULL, NULL, NULL, NULL, 175.00, 786.00, NULL, 'Warehouse Transfer #54', 1, '2026-09-30 16:20:27'),
(363, 168, 1, 'OUT', 10.00, NULL, NULL, NULL, NULL, 115.00, 250.00, 'من الرئيسي الى التشيع', 'Warehouse Transfer #55', 1, '2026-09-30 16:29:33'),
(364, 168, 32, 'IN', 10.00, NULL, NULL, NULL, NULL, 10.00, 250.00, 'من الرئيسي الى التشيع', 'Warehouse Transfer #55', 1, '2026-09-30 16:29:33'),
(365, 122, 1, 'ADJUSTMENT', 150.00, NULL, NULL, NULL, NULL, 410.00, 936.00, 'ADJ-260930233828', 'PHYSICAL_COUNT_CORRECTION', 1, '2026-09-30 21:38:28'),
(366, 148, 1, 'OUT', 4.00, NULL, NULL, NULL, NULL, 11.00, 35.00, 'توفير الكمية للمهمة القادمة', 'Warehouse Transfer #56', 1, '2026-10-01 05:41:18'),
(367, 148, 32, 'IN', 4.00, NULL, NULL, NULL, NULL, 4.00, 35.00, 'توفير الكمية للمهمة القادمة', 'Warehouse Transfer #56', 1, '2026-10-01 05:41:18'),
(368, 115, 32, 'ADJUSTMENT', 2000.00, NULL, NULL, NULL, NULL, 2000.00, 5285.00, 'ADJ-261001074423', 'FOUND - تم العثور على 2000 قطعة بلوك في المخزن', 1, '2026-10-01 05:44:23'),
(369, 120, 32, 'ADJUSTMENT', 200.00, NULL, NULL, NULL, NULL, 200.00, 500.00, 'ADJ-261001074642', 'PHYSICAL_COUNT_CORRECTION', 1, '2026-10-01 05:46:42'),
(370, 168, 1, 'OUT', 15.00, NULL, NULL, NULL, NULL, 100.00, 235.00, 'PROJECT #57', 'Reservation Fulfillment: Acrylic Wall Paint White', 1, '2026-10-01 08:56:46'),
(371, 167, 3, 'OUT', 14.00, 3.00, NULL, NULL, 1, 46.00, 296.00, 'RR-FUL-20261001111252-494', 'Resource requisition fulfillment: REQ-261001110916', 1, '2026-10-01 09:12:52'),
(372, 156, 1, 'OUT', 4.00, 35.00, NULL, NULL, 1, 216.00, 251.00, 'RR-FUL-20261001145414-140', 'Resource requisition fulfillment: REQ-261001145317', 1, '2026-10-01 12:54:14'),
(373, 123, 2, 'OUT', 95.00, NULL, NULL, NULL, NULL, 100.00, 525.00, 'PROJECT #57', 'Ceramic Wall Tile 30x60', 1, '2026-10-01 16:10:02'),
(374, 114, 3, 'OUT', 25.00, NULL, NULL, NULL, NULL, 525.00, 3200.00, 'PROJECT #57', 'Concrete Block 20cm', 1, '2026-10-01 20:13:16'),
(375, 114, 3, 'OUT', 30.00, NULL, NULL, NULL, NULL, 495.00, 3170.00, 'PROJECT #57', 'Concrete Block 20cm', 1, '2026-10-01 20:16:44'),
(376, 148, 2, 'OUT', 2.00, NULL, NULL, NULL, NULL, 10.00, 33.00, 'PROJECT #57', 'Reservation Fulfillment: Contactor 25A', 1, '2026-10-01 20:36:31'),
(377, 114, 2, 'OUT', 10.00, NULL, NULL, NULL, NULL, 890.00, 3160.00, 'PROJECT #57', 'Concrete Block 20cm', 1, '2026-10-02 05:28:09'),
(378, 111, 2, 'OUT', 50.00, NULL, NULL, NULL, NULL, 100.00, 450.00, 'PROJECT #57', 'Portland Cement 42.5N', 1, '2026-10-02 06:07:06'),
(379, 114, 1, 'OUT', 800.00, NULL, NULL, NULL, NULL, 200.00, 2360.00, 'PROJECT #57', 'Concrete Block 20cm', 1, '2026-10-02 15:36:08'),
(380, 134, 1, 'OUT', 5.00, NULL, NULL, NULL, NULL, 35.00, 94.00, 'PROJECT #57', 'Reservation Fulfillment: Binding Wire', 1, '2026-10-02 17:37:24'),
(381, 168, 1, 'OUT', 16.00, NULL, NULL, NULL, NULL, 84.00, 219.00, 'PROJECT #57', 'تنفيذ المواد المحجوزة: Acrylic Wall Paint White', 1, '2026-10-02 18:03:38'),
(382, 138, 3, 'OUT', 1.00, 3.95, NULL, NULL, 1, 279.00, 1399.00, 'RR-FUL-261002204156-734', 'Resource requisition fulfillment: REQ-261001153000', 1, '2026-10-02 18:41:56'),
(383, 147, 3, 'OUT', 1.00, 95.00, NULL, NULL, 1, 4.00, 24.00, 'RR-FUL-261002210041-824', 'Resource requisition fulfillment: REQ-261001152651', 1, '2026-10-02 19:00:41'),
(384, 147, 3, 'IN', 1.00, NULL, NULL, NULL, NULL, 5.00, 25.00, 'PROJECT #57', 'Distribution Board 12-Way', 1, '2026-10-02 19:50:21'),
(385, 138, 3, 'IN', 1.00, NULL, NULL, NULL, NULL, 280.00, 1400.00, 'PROJECT #57', 'Electrical Cable 6mm² Single Core', 1, '2026-10-02 19:50:39'),
(386, 122, 36, 'IN', 5.00, NULL, NULL, NULL, NULL, 5.00, 941.00, 'PROJECT #57', 'Ceramic Floor Tile 60x60', 1, '2026-10-02 19:51:17'),
(387, 168, 1, 'IN', 15.00, NULL, NULL, NULL, NULL, 99.00, 234.00, 'PROJECT #57', 'Reservation Fulfillment: Acrylic Wall Paint White', 1, '2026-10-02 19:51:21'),
(388, 167, 3, 'IN', 14.00, NULL, NULL, NULL, NULL, 60.00, 310.00, 'PROJECT #57', 'Anchor Bolt M16', 1, '2026-10-02 19:51:25'),
(389, 156, 1, 'IN', 4.00, NULL, NULL, NULL, NULL, 220.00, 255.00, 'PROJECT #57', 'Bearing 6204', 1, '2026-10-02 19:51:33'),
(390, 123, 2, 'IN', 95.00, NULL, NULL, NULL, NULL, 195.00, 620.00, 'PROJECT #57', 'Ceramic Wall Tile 30x60', 1, '2026-10-02 19:51:38'),
(393, 167, 3, 'OUT', 20.00, 3.00, NULL, NULL, 1, 40.00, 290.00, 'RR-FUL-261002222148-711', 'Resource requisition fulfillment: REQ-260911164912', 1, '2026-10-02 20:21:48'),
(394, 170, 3, 'OUT', 1.00, 24.00, NULL, NULL, 1, 19.00, 99.00, 'RR-FUL-261002224306-352', 'Resource requisition fulfillment: REQ-261002222859', 1, '2026-10-02 20:43:06'),
(395, 156, 3, 'OUT', 1.00, 35.00, NULL, NULL, 1, 7.00, 254.00, 'RR-FUL-261002224751-945', 'Resource requisition fulfillment: REQ-261002224714', 1, '2026-10-02 20:47:51'),
(396, 143, 3, 'OUT', 1.00, 3.40, NULL, NULL, 1, 99.00, 489.00, 'RR-FUL-261002231326-769', 'Resource requisition fulfillment: REQ-261002231239', 1, '2026-10-02 21:13:26'),
(397, 190, 32, 'ADJUSTMENT', 1000.00, NULL, NULL, NULL, NULL, 1000.00, 1000.00, 'ADJ-261003080358', 'PHYSICAL_COUNT_CORRECTION', 1, '2026-10-03 06:03:58'),
(398, 190, 32, 'OUT', 25.00, 0.00, NULL, NULL, 1, 975.00, 975.00, 'RR-FUL-261003080449-534', 'Resource requisition fulfillment: REQ-260917114231', 1, '2026-10-03 06:04:49'),
(399, 167, 3, 'OUT', 1.00, 3.00, NULL, NULL, 1, 39.00, 289.00, 'RR-FUL-261003084531-149', 'Resource requisition fulfillment: REQ-261003084449', 1, '2026-10-03 06:45:31'),
(400, 183, 3, 'OUT', 1.00, 1.50, NULL, NULL, 1, 29.00, 149.00, 'RR-FUL-261003114143-684', 'Resource requisition fulfillment: REQ-261003114055', 1, '2026-10-03 09:41:43'),
(401, 118, 2, 'OUT', 7.00, NULL, NULL, NULL, NULL, 8.00, 43.00, 'PROJECT #49', 'Reservation Fulfillment: Construction Gravel', 1, '2026-10-04 15:41:26');

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
(30, 123, 1, 47, 150.00, 'CANCELLED', 'الاحتفاظ بهذه الكمية من الصنف لنقصها من السوق', 'الاحتفاظ بهذه الكمية من الصنف لنقصها من السوق ويتم تسليمها للمشروع قبل التاريخ المذكور', 1, '2026-09-10 12:44:21', '2026-09-16'),
(31, 112, 1, 55, 20.00, 'FULFILLED', 'نقص في توريدات الاسمنت', 'يجب التسليم الى مخزن المشروع', 1, '2026-09-12 14:05:54', '2026-09-14'),
(32, 123, 3, 55, 30.00, 'FULFILLED', 'اختبار', 'اختبار', 1, '2026-09-16 05:42:47', '2026-09-23'),
(33, 172, 32, 54, 10.00, 'ACTIVE', 'طلب من مهندس الموقع عبداللطيف موسى', 'التسليم صباحا', 1, '2026-09-20 12:50:38', '2026-09-23'),
(34, 168, 1, 57, 15.00, 'FULFILLED', 'بناء على طلب مهندس الموقع', 'تم الحجز بناء على طلب مهندس الموقع', 1, '2026-10-01 08:36:24', '2026-10-15'),
(35, 168, 1, 57, 16.00, 'FULFILLED', 'كمية اضافية', 'كمية 16 اضافية', 1, '2026-10-01 08:57:53', '2026-10-08'),
(36, 148, 2, 57, 2.00, 'FULFILLED', '', '', 1, '2026-10-01 20:36:21', '2026-10-08'),
(37, 134, 1, 57, 5.00, 'FULFILLED', '', '', 1, '2026-10-02 17:35:46', '2026-10-02'),
(38, 118, 2, 49, 7.00, 'FULFILLED', 'reservation of construction Gravel : 5 M3', 'reservation of construction Gravel : 5 M3 for Our tiny house in Sara Project', 1, '2026-10-04 15:37:59', '2026-10-06'),
(39, 118, 2, 49, 3.00, 'CANCELLED', 'for cancelation test', '3 M3 for Cancel test', 1, '2026-10-04 15:49:15', '2026-10-06');

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
(46, 187, 1, 2, 5.00, 'updating Tajora WH', 'for daily work', 1, '2026-09-11 14:42:53', NULL, NULL, NULL, 'COMPLETED'),
(47, 111, 1, 31, 100.00, 'طلب تاسيسات لمبني العمال', 'يتم نقل المادة المحولة فورا', 1, '2026-09-12 13:55:16', NULL, NULL, NULL, 'COMPLETED'),
(48, 114, 1, 32, 500.00, 'for next project', 'we keep it in WH N-TAJ before prices go up.', 1, '2026-09-18 13:27:30', NULL, NULL, NULL, 'COMPLETED'),
(49, 123, 1, 32, 25.00, '', '', 12, '2026-09-25 20:16:35', NULL, NULL, NULL, 'COMPLETED'),
(50, 122, 1, 36, 5.00, 'test transfer', 'test transfer to xyz', 1, '2026-09-28 18:23:44', NULL, NULL, NULL, 'COMPLETED'),
(51, 193, 32, 3, 500.00, 'توصيات مدير المشروع', 'حسب المتفق عليه', 1, '2026-09-29 06:03:53', NULL, NULL, NULL, 'COMPLETED'),
(52, 172, 1, 32, 5.00, '', '', 1, '2026-09-30 15:20:20', NULL, NULL, NULL, 'COMPLETED'),
(53, 122, 1, 32, 20.00, '', '', 1, '2026-09-30 16:15:06', NULL, NULL, NULL, 'COMPLETED'),
(54, 122, 1, 3, 15.00, '', '', 1, '2026-09-30 16:20:27', NULL, NULL, NULL, 'COMPLETED'),
(55, 168, 1, 32, 10.00, 'من الرئيسي الى التشيع', 'نقل من الرئيسي الى التشيع', 1, '2026-09-30 16:29:33', NULL, NULL, NULL, 'COMPLETED'),
(56, 148, 1, 32, 4.00, 'توفير الكمية للمهمة القادمة', 'توفير الكمية للمهمة القادمة التي سيقوم بها الكهربائي', 1, '2026-10-01 05:41:18', NULL, NULL, NULL, 'COMPLETED');

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
(104, 'admin.access', 'Full access for Admin.');

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
(56, NULL, 14, 'مشروع جديد قائم', 'Maintenance', 'مشروع صيانة صغير', '2026-12-26', 'planning', 500000.00, '2026-09-26 19:46:06', 0, 'الظهرة شارع الذيب 25', '2026-09-27', 23, 'XYZ1238765', 'PRJ-26-0056', 'high'),
(57, 37, 16, 'صيانة طريق السلع', 'Maintenance', 'صيانة طريق السلع تاجوراء', '2026-10-30', 'planning', 1500000.00, '2026-09-28 17:46:33', 0, 'تاجوراء طريق السلع', '2026-10-05', 23, '2026-0015', 'PRJ-26-0057', 'high');

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
(18, 51, 150000.00, 'Cash', 'دفعة مبدئية', 'تصفى بعد المصاريف', 1, '2026-09-10', '2026-09-10 14:28:46', 'received', NULL),
(19, 48, 20000.00, 'Cash', 'test', '', 1, '2026-09-10', '2026-09-10 14:38:02', 'received', NULL),
(20, 51, 50000.00, 'Cash', 'tets 2', '', 1, '2026-09-10', '2026-09-10 14:39:03', 'received', NULL),
(21, 54, 10000.00, 'Bank Transfer', 'لطلب بعض المواد الاولية', 'يجب تقديم تفاصيل الصرف في غضون اسبوع', 1, '2026-09-07', '2026-09-11 09:24:33', 'received', NULL),
(22, 51, 35000.00, 'Bank Transfer', 'الدفعة الاولى ايصال رقم 2026-238', 'يتم تقديم تفاصيل بالخصوص في غضون شهر من تاريخ الاستلام.', 1, '2026-09-19', '2026-09-21 08:37:57', 'received', NULL),
(23, 51, 1000.00, 'Cash', 'دفعة ثانية', 'يتم تسويتها مع العميل في غضون اسبوع', 1, '2026-09-21', '2026-09-21 08:40:53', 'received', NULL),
(24, 49, 5000.00, 'Cheque', 'شيك رقم 03046652', 'يتم تسويتها في غضون اسبوع', 1, '2026-09-21', '2026-09-21 08:46:32', 'received', NULL),
(25, 55, 100000.00, 'Cash', 'اول دفعة مقدمة', 'يجب تسويتها في خلال اسبوع', 12, '2026-09-25', '2026-09-25 21:16:39', 'received', NULL),
(26, 57, 500000.00, 'Cheque', 'First installment', 'to be cleared every month', 1, '2026-10-02', '2026-10-02 06:15:30', 'received', NULL),
(27, 56, 15000.00, 'Bank Transfer', 'First installment', 'to be settled within one week', 1, '2026-10-04', '2026-10-04 09:06:17', 'received', NULL),
(28, 56, 10000.00, 'Cash', 'second installment', 'second installment in one week', 1, '2026-10-04', '2026-10-04 09:27:05', 'received', NULL);

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
(218, 45, NULL, NULL, 117, NULL, 32, 'MATERIALS', 'Coarse Aggregate 20mm', 10.00, 120.00, '2026-09-20 13:29:42'),
(224, 57, NULL, NULL, 178, NULL, 1, 'MATERIALS', 'Cut Resistant Gloves', 5.00, 4.50, '2026-10-01 16:14:56'),
(225, 57, NULL, NULL, NULL, NULL, NULL, 'HUMAN_RESOURCES', 'elelctrician work per point', 10.00, 300.00, '2026-10-01 16:22:05'),
(226, 57, NULL, NULL, 134, NULL, 1, 'MATERIALS', 'Binding Wire', 8.00, 4.50, '2026-10-01 16:23:02'),
(227, 57, NULL, NULL, 114, NULL, 3, 'MATERIALS', 'Concrete Block 20cm', 50.00, 3.25, '2026-10-01 19:59:25'),
(228, 57, NULL, NULL, 114, NULL, 3, 'MATERIALS', 'Concrete Block 20cm', 25.00, 3.25, '2026-10-01 20:13:16'),
(229, 57, NULL, NULL, 114, NULL, 3, 'MATERIALS', 'Concrete Block 20cm', 30.00, 3.25, '2026-10-01 20:16:44'),
(230, 57, NULL, NULL, 148, NULL, 2, 'MATERIALS', 'Reservation Fulfillment: Contactor 25A', 2.00, 32.00, '2026-10-01 20:36:31'),
(231, 57, NULL, NULL, 114, NULL, 2, 'MATERIALS', 'Concrete Block 20cm', 10.00, 3.25, '2026-10-02 05:28:09'),
(232, 57, NULL, NULL, 111, NULL, 2, 'MATERIALS', 'Portland Cement 42.5N', 50.00, 12.50, '2026-10-02 06:07:06'),
(233, 57, NULL, NULL, 114, NULL, 1, 'MATERIALS', 'Concrete Block 20cm', 800.00, 3.25, '2026-10-02 15:36:08'),
(234, 57, NULL, NULL, 134, NULL, 1, 'MATERIALS', 'Reservation Fulfillment: Binding Wire', 5.00, 4.50, '2026-10-02 17:37:24'),
(235, 57, NULL, NULL, 168, NULL, 1, 'MATERIALS', 'تنفيذ المواد المحجوزة: Acrylic Wall Paint White', 16.00, 18.00, '2026-10-02 18:03:38'),
(238, 56, NULL, NULL, NULL, NULL, NULL, '', 'Electrician — تنفيذ طلب الموارد: REQ-261002215258 / RR-FUL-20261002215347-529', 1.00, 500.00, '2026-10-02 19:53:47'),
(239, 56, NULL, NULL, NULL, NULL, NULL, 'HUMAN_RESOURCES', 'سباك', 5.00, 250.00, '2026-10-02 20:02:49'),
(240, 56, NULL, NULL, NULL, NULL, NULL, 'TAXES', 'معزة المختار', 66.00, 120.00, '2026-10-02 20:19:59'),
(242, 49, NULL, NULL, 167, NULL, 3, 'MATERIALS', 'Anchor Bolt M16 — تنفيذ طلب الموارد: REQ-260911164912 / RR-FUL-261002222148-711', 20.00, 3.00, '2026-10-02 20:21:48'),
(243, 49, NULL, NULL, 170, NULL, 3, 'MATERIALS', 'Epoxy Primer — Resource Request Fulfillment: REQ-261002222859 / RR-FUL-261002224306-352', 1.00, 24.00, '2026-10-02 20:43:06'),
(245, 49, NULL, NULL, 156, NULL, 3, 'MATERIALS', 'Bearing 6204 — تنفيذ طلب الموارد: REQ-261002224714 / RR-FUL-261002224751-945', 1.00, 35.00, '2026-10-02 20:47:51'),
(246, 49, NULL, NULL, 143, NULL, 3, 'MATERIALS', 'Double Wall Socket 13A UK — تنفيذ طلب الموارد: REQ-261002231239 / RR-FUL-261002231326-769', 1.00, 3.40, '2026-10-02 21:13:26'),
(248, 49, NULL, NULL, NULL, NULL, NULL, 'PERMITS_FEES', 'قيمة تراخيص', 1.00, 2500.00, '2026-10-03 05:59:11'),
(249, 47, 50, 54, 190, NULL, 32, 'MATERIALS', 'Light Bulb 500W', 25.00, 0.00, '2026-10-03 06:04:49'),
(250, 47, 62, 55, NULL, NULL, NULL, '', 'Plumber — تنفيذ طلب الموارد: REQ-261003080555 / RR-FUL-20261003080634-739', 1.00, 500.00, '2026-10-03 06:06:34'),
(251, 47, 63, 56, 167, NULL, 3, 'MATERIALS', 'Anchor Bolt M16', 1.00, 3.00, '2026-10-03 06:45:31'),
(252, 47, 64, 57, NULL, NULL, NULL, '', 'SITE ENGINEER — تنفيذ طلب الموارد: REQ-261003084643 / RR-FUL-20261003084725-457', 3.00, 600.00, '2026-10-03 06:47:25'),
(253, 49, 65, 58, 183, NULL, 3, 'MATERIALS', 'Grinding Disc 115mm', 1.00, 1.50, '2026-10-03 09:41:43'),
(254, 49, 66, 59, NULL, NULL, NULL, '', 'Plumber', 1.00, 500.00, '2026-10-03 09:43:52'),
(255, 51, 45, 60, NULL, NULL, NULL, 'PROFESSIONAL_SERVICES', 'Plumber', 1.00, 5000.00, '2026-10-04 07:36:15'),
(256, 51, 45, 61, NULL, NULL, NULL, 'PROFESSIONAL_SERVICES', 'Plumber', 1.00, 4000.00, '2026-10-04 07:41:32'),
(257, 51, 67, 62, NULL, NULL, NULL, 'EQUIPMENT', 'Excavator', 1.00, 1500.00, '2026-10-04 08:18:20'),
(258, 51, NULL, NULL, NULL, NULL, NULL, 'SITE_EXPENSES', 'ترخيص احضار الالات ثقيلة', 1.00, 95.00, '2026-10-04 08:37:46'),
(259, 49, NULL, NULL, 118, NULL, 2, 'MATERIALS', 'Reservation Fulfillment: Construction Gravel', 7.00, 80.00, '2026-10-04 15:41:26');

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

--
-- Dumping data for table `project_documents`
--

INSERT INTO `project_documents` (`id`, `project_id`, `category`, `title`, `description`, `original_name`, `stored_name`, `file_type`, `file_size`, `document_date`, `uploaded_by`, `uploaded_at`) VALUES
(24, 53, 'quotation', 'QUOTATION - 123', 'QUOTATION - 123 for the project ', 'DWUA.pdf', '6a9f141355a60_DWUA.pdf', 'application/pdf', 431635, '2026-09-02', 1, '2026-09-07 19:44:19'),
(25, 53, 'quotation', 'QUOTATION - 123', 'QUOTATION - 123 for the project ', 'fatura.pdf', '6a9f14135678c_fatura.pdf', 'application/pdf', 184156, '2026-09-02', 1, '2026-09-07 19:44:19');

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
(88, 48, 'cost', 'project_costs', 205, 'عمال مساعدين', 600.00, 0.00, -600.00, '2026-09-08 06:53:20'),
(89, 54, 'cost', 'project_costs', 206, 'Contactor 25A', 160.00, 0.00, -160.00, '2026-09-09 06:38:09'),
(90, 51, 'cost', 'project_costs', 207, 'بنائين', 10000.00, 0.00, -10000.00, '2026-09-10 14:17:26'),
(91, 51, 'advance', 'project_advances', 18, 'دفعة مبدئية', 0.00, 150000.00, 140000.00, '2026-09-10 14:28:46'),
(92, 51, 'cost', 'project_costs', 208, 'Ceramic Floor Tile 60x60', 12900.00, 0.00, 127100.00, '2026-09-10 14:30:10'),
(93, 48, 'advance', 'project_advances', 19, 'test', 0.00, 20000.00, 19400.00, '2026-09-10 14:38:02'),
(94, 51, 'advance', 'project_advances', 20, 'tets 2', 0.00, 50000.00, 177100.00, '2026-09-10 14:39:03'),
(95, 54, 'advance', 'project_advances', 21, 'لطلب بعض المواد الاولية', 0.00, 10000.00, 9840.00, '2026-09-11 09:24:33'),
(96, 54, 'cost', 'project_costs', 209, 'Payment of Permission', 1500.00, 0.00, 8340.00, '2026-09-11 12:12:34'),
(97, 54, 'cost', 'project_costs', 210, 'ظرائب حكومية', 5000.00, 0.00, 3340.00, '2026-09-11 12:35:41'),
(98, 54, 'cost', 'project_costs', 210, 'Reversal: ظرائب حكومية', 0.00, 5000.00, 8340.00, '2026-09-11 12:36:44'),
(99, 49, 'cost', 'project_costs', 211, 'RR Fulfillment: Engine Oil 15W40', 27.50, 0.00, -27.50, '2026-09-12 05:53:55'),
(100, 49, 'cost', 'project_costs', 212, 'RR Fulfillment: Binding Wire', 4.50, 0.00, -32.00, '2026-09-12 06:04:39'),
(101, 46, 'cost', 'project_costs', 213, 'RR Fulfillment: Concrete Pumping', 12000.00, 0.00, -12000.00, '2026-09-12 07:11:58'),
(102, 55, 'cost', 'project_costs', 214, 'Reservation Fulfillment: Portland Cement 52.5N', 310.00, 0.00, -310.00, '2026-09-12 14:07:30'),
(103, 49, 'cost', 'project_costs', 215, 'عمالة طرح التربة', 3000.00, 0.00, -3032.00, '2026-09-15 06:15:58'),
(104, 46, 'cost', 'project_costs', 213, 'Reversal: RR Fulfillment: Concrete Pumping', 0.00, 12000.00, 0.00, '2026-09-15 06:32:07'),
(105, 54, 'cost', 'project_costs', 209, 'Reversal: Payment of Permission', 0.00, 1500.00, 9840.00, '2026-09-15 06:33:00'),
(106, 51, 'cost', 'project_costs', 207, 'Reversal: بنائين', 0.00, 10000.00, 187100.00, '2026-09-15 06:33:51'),
(107, 48, 'cost', 'project_costs', 205, 'Reversal: عمال مساعدين', 0.00, 600.00, 20000.00, '2026-09-15 06:34:38'),
(108, 47, 'cost', 'project_costs', 216, 'اعداد الموقع لبدء العمل', 2000.00, 0.00, -2000.00, '2026-09-15 06:36:08'),
(109, 55, 'cost', 'project_costs', 217, 'Reservation Fulfillment: Ceramic Wall Tile 30x60', 180.00, 0.00, -490.00, '2026-09-16 05:44:20'),
(110, 45, 'cost', 'project_costs', 218, 'Coarse Aggregate 20mm', 1200.00, 0.00, -1200.00, '2026-09-20 13:29:42'),
(111, 51, 'advance', 'project_advances', 22, 'الدفعة الاولى ايصال رقم 2026-238', 0.00, 35000.00, 222100.00, '2026-09-21 08:37:57'),
(112, 51, 'advance', 'project_advances', 23, 'دفعة ثانية', 0.00, 1000.00, 223100.00, '2026-09-21 08:40:54'),
(113, 49, 'advance', 'project_advances', 24, 'شيك رقم 03046652', 0.00, 5000.00, 1968.00, '2026-09-21 08:46:32'),
(114, 55, 'advance', 'project_advances', 25, 'اول دفعة مقدمة', 0.00, 100000.00, 99510.00, '2026-09-25 21:16:39'),
(115, 57, 'cost', 'project_costs', 219, 'Ceramic Floor Tile 60x60', 129.00, 0.00, -129.00, '2026-09-28 18:25:17'),
(116, 57, 'cost', 'project_costs', 220, 'Reservation Fulfillment: Acrylic Wall Paint White', 270.00, 0.00, -399.00, '2026-10-01 08:56:46'),
(117, 57, 'cost', 'project_costs', 221, 'RR Fulfillment: Anchor Bolt M16', 42.00, 0.00, -441.00, '2026-10-01 09:12:52'),
(118, 57, 'cost', 'project_costs', 222, 'RR Fulfillment: Bearing 6204', 140.00, 0.00, -581.00, '2026-10-01 12:54:14'),
(119, 57, 'cost', 'project_costs', 223, 'Ceramic Wall Tile 30x60', 570.00, 0.00, -1151.00, '2026-10-01 16:10:02'),
(120, 57, 'cost', 'project_costs', 229, 'Concrete Block 20cm', 97.50, 0.00, -1248.50, '2026-10-01 20:16:44'),
(121, 57, 'cost', 'project_costs', 230, 'Reservation Fulfillment: Contactor 25A', 64.00, 0.00, -1312.50, '2026-10-01 20:36:31'),
(122, 57, 'cost', 'project_costs', 231, 'Concrete Block 20cm', 32.50, 0.00, -1345.00, '2026-10-02 05:28:09'),
(123, 57, 'cost', 'project_costs', 232, 'Portland Cement 42.5N', 625.00, 0.00, -1970.00, '2026-10-02 06:07:06'),
(124, 57, 'advance', 'project_advances', 26, 'First installment', 0.00, 500000.00, 498030.00, '2026-10-02 06:15:30'),
(125, 57, 'cost', 'project_costs', 233, 'Concrete Block 20cm', 2600.00, 0.00, 495430.00, '2026-10-02 15:36:08'),
(126, 57, 'cost', 'project_costs', 234, 'Reservation Fulfillment: Binding Wire', 22.50, 0.00, 495407.50, '2026-10-02 17:37:24'),
(127, 57, 'cost', 'project_costs', 235, 'تنفيذ المواد المحجوزة: Acrylic Wall Paint White', 288.00, 0.00, 495119.50, '2026-10-02 18:03:38'),
(128, 57, 'cost', 'project_costs', 236, 'RR Fulfillment: Electrical Cable 6mm² Single Core', 3.95, 0.00, 495115.55, '2026-10-02 18:41:56'),
(129, 57, 'cost', 'project_costs', 237, 'تنفيذ طلب الموارد: Distribution Board 12-Way', 95.00, 0.00, 495020.55, '2026-10-02 19:00:41'),
(130, 57, 'cost', 'project_costs', 237, 'Reversal: تنفيذ طلب الموارد: Distribution Board 12-Way', 0.00, 95.00, 495115.55, '2026-10-02 19:50:21'),
(131, 57, 'cost', 'project_costs', 236, 'Reversal: RR Fulfillment: Electrical Cable 6mm² Single Core', 0.00, 3.95, 495119.50, '2026-10-02 19:50:39'),
(132, 57, 'cost', 'project_costs', 219, 'Reversal: Ceramic Floor Tile 60x60', 0.00, 129.00, 495248.50, '2026-10-02 19:51:17'),
(133, 57, 'cost', 'project_costs', 220, 'Reversal: Reservation Fulfillment: Acrylic Wall Paint White', 0.00, 270.00, 495518.50, '2026-10-02 19:51:21'),
(134, 57, 'cost', 'project_costs', 221, 'Reversal: RR Fulfillment: Anchor Bolt M16', 0.00, 42.00, 495560.50, '2026-10-02 19:51:25'),
(135, 57, 'cost', 'project_costs', 222, 'Reversal: RR Fulfillment: Bearing 6204', 0.00, 140.00, 495700.50, '2026-10-02 19:51:33'),
(136, 57, 'cost', 'project_costs', 223, 'Reversal: Ceramic Wall Tile 30x60', 0.00, 570.00, 496270.50, '2026-10-02 19:51:38'),
(137, 56, 'cost', 'project_costs', 238, 'تنفيذ طلب الموارد: ', 500.00, 0.00, -500.00, '2026-10-02 19:53:47'),
(138, 56, 'cost', 'project_costs', 239, 'سباك', 1250.00, 0.00, -1750.00, '2026-10-02 20:02:49'),
(139, 56, 'cost', 'project_costs', 240, 'معزة المختار', 7920.00, 0.00, -9670.00, '2026-10-02 20:19:59'),
(140, 49, 'cost', 'project_costs', 241, 'تنفيذ طلب الموارد: ', 500.00, 0.00, 1468.00, '2026-10-02 20:21:23'),
(141, 49, 'cost', 'project_costs', 242, 'تنفيذ طلب الموارد: Anchor Bolt M16', 60.00, 0.00, 1408.00, '2026-10-02 20:21:48'),
(142, 49, 'cost', 'project_costs', 243, 'Resource Request Fulfillment: Epoxy Primer', 24.00, 0.00, 1384.00, '2026-10-02 20:43:06'),
(143, 49, 'cost', 'project_costs', 244, 'Resource Request Fulfillment: ', 110.00, 0.00, 1274.00, '2026-10-02 20:44:07'),
(144, 49, 'cost', 'project_costs', 245, 'تنفيذ طلب الموارد: Bearing 6204', 35.00, 0.00, 1239.00, '2026-10-02 20:47:51'),
(145, 49, 'cost', 'project_costs', 246, 'تنفيذ طلب الموارد: Double Wall Socket 13A UK', 3.40, 0.00, 1235.60, '2026-10-02 21:13:26'),
(146, 49, 'cost', 'project_costs', 247, 'تنفيذ طلب الموارد: ', 4000.00, 0.00, -2764.40, '2026-10-02 21:15:40'),
(147, 49, 'cost', 'project_costs', 247, 'Reversal: تنفيذ طلب الموارد: ', 0.00, 4000.00, 1235.60, '2026-10-03 05:58:16'),
(148, 49, 'cost', 'project_costs', 241, 'Reversal: تنفيذ طلب الموارد: ', 0.00, 500.00, 1735.60, '2026-10-03 05:58:22'),
(149, 49, 'cost', 'project_costs', 244, 'Reversal: Resource Request Fulfillment: ', 0.00, 110.00, 1845.60, '2026-10-03 05:58:27'),
(150, 49, 'cost', 'project_costs', 248, 'قيمة تراخيص', 2500.00, 0.00, -654.40, '2026-10-03 05:59:11'),
(151, 47, 'cost', 'project_costs', 249, 'Resource Request Fulfillment: Light Bulb 500W', 0.00, 0.00, -2000.00, '2026-10-03 06:04:49'),
(152, 47, 'cost', 'project_costs', 250, 'تنفيذ طلب الموارد: ', 500.00, 0.00, -2500.00, '2026-10-03 06:06:34'),
(153, 47, 'cost', 'project_costs', 251, 'Resource Request Fulfillment: Anchor Bolt M16', 3.00, 0.00, -2503.00, '2026-10-03 06:45:31'),
(154, 47, 'cost', 'project_costs', 252, 'تنفيذ طلب الموارد: SITE ENGINEER', 1800.00, 0.00, -4303.00, '2026-10-03 06:47:25'),
(155, 49, 'cost', 'project_costs', 253, 'Resource Request Fulfillment: Grinding Disc 115mm', 1.50, 0.00, -655.90, '2026-10-03 09:41:43'),
(156, 49, 'cost', 'project_costs', 254, 'تنفيذ طلب الموارد: Plumber', 500.00, 0.00, -1155.90, '2026-10-03 09:43:52'),
(157, 51, 'cost', 'project_costs', 255, 'تنفيذ طلب الموارد: Plumber', 5000.00, 0.00, 218100.00, '2026-10-04 07:36:15'),
(158, 51, 'cost', 'project_costs', 256, 'تنفيذ طلب الموارد: Plumber', 4000.00, 0.00, 214100.00, '2026-10-04 07:41:32'),
(159, 51, 'cost', 'project_costs', 257, 'Resource Request Fulfillment: Excavator', 1500.00, 0.00, 212600.00, '2026-10-04 08:18:20'),
(160, 51, 'cost', 'project_costs', 258, 'ترخيص احضار الالات ثقيلة', 95.00, 0.00, 212505.00, '2026-10-04 08:37:46'),
(161, 56, 'advance', 'project_advances', 27, 'First installment', 0.00, 15000.00, 5330.00, '2026-10-04 09:06:17'),
(162, 56, 'advance', 'project_advances', 28, 'second installment', 0.00, 10000.00, 15330.00, '2026-10-04 09:27:05'),
(163, 49, 'cost', 'project_costs', 259, 'Reservation Fulfillment: Construction Gravel', 560.00, 0.00, -1715.90, '2026-10-04 15:41:26');

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
(57, 56, 'Architectural'),
(59, 56, 'MEP'),
(58, 56, 'Structural'),
(60, 57, 'Civil');

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
(56, 'PO-260906205731', 3, NULL, NULL, NULL, 'WAREHOUSE', 'received', '2026-09-06', '2026-09-12', 11470.00, 0.00, 0.00, 11470.00, '', 1, 1, '2026-09-06 21:00:08', '2026-09-06 21:02:53', '2026-09-06 18:57:31', 'RECEIVED'),
(57, 'PO-260909203253', 4, NULL, NULL, NULL, 'WAREHOUSE', 'partial', '2026-09-09', '2026-09-23', 2400.00, 0.00, 0.00, 2400.00, '', 1, 1, '2026-09-09 20:36:40', NULL, '2026-09-09 18:32:53', 'PARTIAL'),
(58, 'PO-260911204901', 1, NULL, NULL, NULL, 'WAREHOUSE', 'approved', '2026-09-11', '2026-09-24', 1050.00, 0.00, 0.00, 1050.00, '', 1, 1, '2026-09-11 22:04:03', NULL, '2026-09-11 18:49:01', 'OPEN'),
(59, 'PO-260911222729', 4, NULL, NULL, NULL, 'WAREHOUSE', 'approved', '2026-09-11', '2026-09-18', 2650.00, 0.00, 0.00, 2650.00, '', 1, 1, '2026-09-12 09:08:54', NULL, '2026-09-11 20:27:29', 'OPEN'),
(60, 'PO-260912085701', 4, 46, 43, 3, 'WAREHOUSE', 'partial', '2026-09-12', '2026-09-19', 6112.50, 0.00, 0.00, 6112.50, 'Created from Resource Requisition REQ-260906224746', 1, 1, '2026-09-12 09:00:40', NULL, '2026-09-12 06:57:01', 'PARTIAL'),
(61, 'PO-260912223226', 4, NULL, NULL, NULL, 'WAREHOUSE', 'draft', '2026-09-12', '2026-09-17', 620.00, 0.00, 0.00, 620.00, '', 1, NULL, NULL, NULL, '2026-09-12 20:32:26', 'OPEN'),
(62, 'PO-260914081516', 3, NULL, NULL, NULL, 'WAREHOUSE', 'draft', '2026-09-13', '2026-09-17', 0.00, 0.00, 0.00, 0.00, '', 1, NULL, NULL, NULL, '2026-09-14 06:15:16', 'OPEN'),
(63, 'PO-20260914095038', 4, 55, NULL, NULL, 'DIRECT_TO_PROJECT_SITE', 'received', '2026-09-14', '2026-09-18', 8250.00, 0.00, 0.00, 8250.00, '', 1, 1, '2026-09-14 09:51:19', '2026-09-20 14:46:29', '2026-09-14 07:50:38', 'RECEIVED'),
(64, 'PO-20260917174851', 1, NULL, NULL, 1, 'WAREHOUSE', 'partial', '2026-09-17', '2026-09-24', 700.00, 0.00, 0.00, 700.00, '', 1, 12, '2026-09-25 22:22:17', NULL, '2026-09-17 15:48:51', 'PARTIAL');

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
(57, 56, 156, 200.00, 200.00, 5.75, 0.00, NULL, '2026-09-06 18:59:32'),
(58, 56, 122, 400.00, 400.00, 25.80, 0.00, NULL, '2026-09-06 18:59:51'),
(59, 57, 155, 100.00, 25.00, 24.00, 0.00, NULL, '2026-09-09 18:36:19'),
(60, 58, 187, 30.00, 0.00, 35.00, 0.00, NULL, '2026-09-11 18:49:38'),
(61, 59, 114, 1000.00, 0.00, 2.45, 0.00, NULL, '2026-09-11 20:27:55'),
(62, 59, 134, 40.00, 0.00, 5.00, 0.00, NULL, '2026-09-12 05:29:11'),
(63, 60, 181, 150.00, 70.00, 0.75, 0.00, NULL, '2026-09-12 06:57:01'),
(64, 60, 117, 50.00, 50.00, 120.00, 0.00, NULL, '2026-09-12 06:59:49'),
(65, 61, 167, 100.00, 0.00, 1.20, 0.00, NULL, '2026-09-12 20:32:44'),
(66, 61, 113, 20.00, 0.00, 25.00, 0.00, NULL, '2026-09-12 21:15:47'),
(67, 63, 172, 30.00, 30.00, 275.00, 0.00, NULL, '2026-09-14 07:51:10'),
(68, 64, 156, 20.00, 15.00, 35.00, 0.00, NULL, '2026-09-17 15:49:43');

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
  `status` enum('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `resource_code`, `resource_name`, `resource_name_a`, `resource_type`, `unit_id`, `description`, `status`, `created_at`, `category_id`) VALUES
(12, 'EQP-0001', 'Concrete Mixer', 'خلاطة خرسانة', 'EQUIPMENT', 17, 'Portable concrete mixer', 'ACTIVE', '2026-07-13 07:52:15', 8),
(13, 'EQP-0002', 'Plate Compactor', 'مدك للارضيات', 'EQUIPMENT', 14, 'Soil compaction machine', 'ACTIVE', '2026-07-13 07:52:15', 8),
(14, 'EQP-0003', 'Excavator', 'حفارة', 'EQUIPMENT', 17, 'Hydraulic excavator', 'ACTIVE', '2026-07-13 07:52:15', 8),
(15, 'EQP-0004', 'Tower Crane', 'رافعة برجية', 'EQUIPMENT', 18, 'Heavy lifting equipment', 'ACTIVE', '2026-07-13 07:52:15', 8),
(16, 'EQP-0005', 'Electric Generator', 'مولد كهرباء', 'EQUIPMENT', 18, 'Diesel generator', 'ACTIVE', '2026-07-13 07:52:15', 8),
(17, 'HRS-0001', 'Civil Engineer', 'هندسة مدنية', 'HUMAN_RESOURCES', 20, 'Professional engineer', 'ACTIVE', '2026-07-13 07:52:15', 12),
(18, 'HRS-0002', 'Site Supervisor', 'مشرف موقع', 'HUMAN_RESOURCES', 20, 'Construction supervisor', 'ACTIVE', '2026-07-13 07:52:15', 13),
(19, 'HRS-0003', 'Mason', 'أسطى بناء', 'HUMAN_RESOURCES', 14, 'Block laying and plastering', 'ACTIVE', '2026-07-13 07:52:15', 13),
(20, 'HRS-0004', 'Carpenter', 'اسطى نجار', 'PROFESSIONAL_SERVICES', 15, 'Formwork carpenter', 'ACTIVE', '2026-07-13 07:52:15', 13),
(21, 'HRS-0005', 'Steel Fixer', 'اسطى حداد', 'HUMAN_RESOURCES', 14, 'Rebar installation', 'ACTIVE', '2026-07-13 07:52:15', 13),
(22, 'HRS-0006', 'Electrician', 'اسطى كهربائي', 'HUMAN_RESOURCES', 22, 'Electrical installations', 'ACTIVE', '2026-07-13 07:52:15', 13),
(23, 'HRS-0007', 'Plumber', 'اسطى سباك', 'HUMAN_RESOURCES', 21, 'Plumbing installation', 'ACTIVE', '2026-07-13 07:52:15', 13),
(24, 'EQP-0006', 'Concrete Pumping', 'مضخة خرسانة', 'EQUIPMENT', 15, 'Concrete pumping service', 'ACTIVE', '2026-07-13 07:52:15', 8),
(25, 'SRV-0002', 'Survey Works', 'أعمال مساحة', 'PROFESSIONAL_SERVICES', 21, 'Topographic survey', 'ACTIVE', '2026-07-13 07:52:15', 12),
(26, 'EQP-0007', 'Equipment Rental', 'إيجار أليات', 'EQUIPMENT', 17, 'Heavy equipment rental', 'ACTIVE', '2026-07-13 07:52:15', 8),
(27, 'TRS-0004', 'Material Delivery', 'نقل مواد', 'TRANSPORT', 9, 'Transportation service', 'ACTIVE', '2026-07-13 07:52:15', 11),
(28, 'SRV-0005', 'Labor Supply', 'نوريد عمالة', 'SERVICE', 21, 'Temporary labor supply', 'ACTIVE', '2026-07-13 07:52:15', 11),
(31, 'CON-0001', 'Sub-Contracting', 'مقاولات بالباطن', 'PROFESSIONAL_SERVICES', 21, 'Sub-Contracting at Lump Sum', 'ACTIVE', '2026-09-11 18:25:32', 11),
(33, 'ABC-0033', 'SITE ENGINEER', 'مهندس موقع', 'HUMAN_RESOURCES', 20, 'مهندس راتب شهري', 'ACTIVE', '2026-09-27 17:45:23', 12);

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
(2, 'STL', 'Steel', 'حديد', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(3, 'MAS', 'Masonary', 'بناء', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(5, 'PLB', 'Plumbing', 'سباكة', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(6, 'HVAC', 'HVAC', 'تكييف وتهوية', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
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
(43, 'REQ-260906224746', 46, '2026-09-06', '2026-09-19', 3, 'WAREHOUSE', 'MEDIUM', 'APPROVED', 'test RR to show in the dashboard', 1, '2026-09-06 22:53:24', 1, 1, '2026-09-06 22:55:02', '', NULL, '2026-09-06 20:47:46', '2026-09-06 20:55:02'),
(44, 'REQ-260906231019', 45, '2026-09-06', '2026-09-23', 22, 'WAREHOUSE', 'MEDIUM', 'APPROVED', '', 1, '2026-09-09 20:38:57', 1, 1, '2026-09-09 20:39:08', '', NULL, '2026-09-06 21:10:19', '2026-09-09 18:39:08'),
(45, 'REQ-260911114053', 51, '2026-09-11', '2026-09-23', 27, 'WAREHOUSE', 'MEDIUM', 'PARTIAL', '', 1, '2026-10-04 09:34:34', 1, 1, '2026-10-04 09:34:38', '', NULL, '2026-09-11 09:40:53', '2026-10-04 07:36:15'),
(46, 'REQ-260911164912', 49, '2026-09-11', '2026-09-16', NULL, 'DIRECT_TO_PROJECT_SITE', 'HIGH', 'FULFILLED', '', 1, '2026-10-02 22:20:46', 1, 1, '2026-10-02 22:20:49', '', NULL, '2026-09-11 14:49:12', '2026-10-02 20:21:48'),
(47, 'REQ-260911185350', 46, '2026-09-11', '2026-09-25', NULL, 'DIRECT_TO_PROJECT_SITE', 'MEDIUM', 'FULFILLED', '', 1, '2026-09-12 08:11:27', 1, 1, '2026-09-12 08:11:37', '', NULL, '2026-09-11 16:53:50', '2026-09-12 07:11:58'),
(48, 'REQ-260911204609', 49, '2026-09-11', '2026-09-17', 25, 'WAREHOUSE', 'MEDIUM', 'FULFILLED', '', 1, '2026-09-12 07:30:16', 1, 1, '2026-09-12 07:30:25', '', NULL, '2026-09-11 18:46:09', '2026-09-12 06:04:39'),
(49, 'REQ-260912232515', 46, '2026-09-12', '2026-09-12', 1, 'WAREHOUSE', 'MEDIUM', 'APPROVED', '', 1, '2026-09-13 08:16:22', 1, 1, '2026-09-13 08:16:28', '', NULL, '2026-09-12 21:25:15', '2026-09-13 06:16:28'),
(50, 'REQ-260917114231', 47, '2026-09-17', '2026-09-30', 3, 'WAREHOUSE', 'HIGH', 'FULFILLED', 'some remarks .....................', 1, '2026-09-17 14:59:27', 1, 1, '2026-09-17 14:59:39', '', NULL, '2026-09-17 09:42:31', '2026-10-03 06:04:49'),
(52, 'REQ-261001110916', 57, '2026-10-01', '2026-10-08', NULL, 'DIRECT_TO_PROJECT_SITE', 'MEDIUM', 'PARTIAL', '', 1, '2026-10-01 11:10:48', 1, 1, '2026-10-01 11:10:55', '', NULL, '2026-10-01 09:09:16', '2026-10-01 09:12:52'),
(53, 'REQ-261001145317', 57, '2026-10-01', '2026-10-15', NULL, 'DIRECT_TO_PROJECT_SITE', 'MEDIUM', 'FULFILLED', '', 1, '2026-10-01 14:53:51', 1, 1, '2026-10-01 14:53:54', '', NULL, '2026-10-01 12:53:17', '2026-10-01 12:54:14'),
(55, 'REQ-261001152651', 57, '2026-10-01', '2026-10-08', NULL, 'DIRECT_TO_PROJECT_SITE', 'MEDIUM', 'FULFILLED', '', 1, '2026-10-02 21:00:19', 1, 1, '2026-10-02 21:00:22', '', NULL, '2026-10-01 13:26:51', '2026-10-02 19:00:41'),
(56, 'REQ-261001153000', 57, '2026-10-01', '2026-10-08', NULL, 'DIRECT_TO_PROJECT_SITE', 'MEDIUM', 'FULFILLED', '', 1, '2026-10-02 20:40:14', 1, 1, '2026-10-02 20:40:18', '', NULL, '2026-10-01 13:30:00', '2026-10-02 18:41:56'),
(57, 'REQ-261002215258', 56, '2026-10-02', '2026-10-09', NULL, 'DIRECT_TO_PROJECT_SITE', 'MEDIUM', 'FULFILLED', '', 1, '2026-10-02 21:53:18', 1, 1, '2026-10-02 21:53:21', '', NULL, '2026-10-02 19:52:58', '2026-10-02 19:53:47'),
(58, 'REQ-261002222859', 49, '2026-10-02', '2026-10-03', NULL, 'DIRECT_TO_PROJECT_SITE', 'MEDIUM', 'FULFILLED', '', 1, '2026-10-02 22:42:35', 1, 1, '2026-10-02 22:42:39', '', NULL, '2026-10-02 20:28:59', '2026-10-02 20:44:07'),
(59, 'REQ-261002224714', 49, '2026-10-02', '2026-10-09', 32, 'WAREHOUSE', 'MEDIUM', 'FULFILLED', '', 1, '2026-10-02 22:47:32', 1, 1, '2026-10-02 22:47:35', '', NULL, '2026-10-02 20:47:14', '2026-10-02 20:47:51'),
(60, 'REQ-261002231239', 49, '2026-10-02', '2026-10-14', NULL, 'DIRECT_TO_PROJECT_SITE', 'MEDIUM', 'FULFILLED', '', 1, '2026-10-02 23:13:07', 1, 1, '2026-10-02 23:13:12', '', NULL, '2026-10-02 21:12:39', '2026-10-02 21:13:26'),
(61, 'REQ-261002231450', 49, '2026-10-02', '2026-10-08', 32, 'WAREHOUSE', 'MEDIUM', 'FULFILLED', '', 1, '2026-10-02 23:15:22', 1, 1, '2026-10-02 23:15:24', '', NULL, '2026-10-02 21:14:50', '2026-10-02 21:15:40'),
(62, 'REQ-261003080555', 47, '2026-10-03', '2026-10-09', NULL, 'DIRECT_TO_PROJECT_SITE', 'MEDIUM', 'FULFILLED', '', 1, '2026-10-03 08:06:12', 1, 1, '2026-10-03 08:06:15', '', NULL, '2026-10-03 06:05:55', '2026-10-03 06:06:34'),
(63, 'REQ-261003084449', 47, '2026-10-03', '2026-10-09', 32, 'WAREHOUSE', 'MEDIUM', 'FULFILLED', '', 1, '2026-10-03 08:45:09', 1, 1, '2026-10-03 08:45:12', '', NULL, '2026-10-03 06:44:49', '2026-10-03 06:45:31'),
(64, 'REQ-261003084643', 47, '2026-10-03', '2026-10-06', 32, 'WAREHOUSE', 'MEDIUM', 'FULFILLED', '', 1, '2026-10-03 08:47:06', 1, 1, '2026-10-03 08:47:09', '', NULL, '2026-10-03 06:46:43', '2026-10-03 06:47:25'),
(65, 'REQ-261003114055', 49, '2026-10-03', '2026-10-08', NULL, 'DIRECT_TO_PROJECT_SITE', 'MEDIUM', 'FULFILLED', '', 1, '2026-10-03 11:41:15', 1, 1, '2026-10-03 11:41:19', '', NULL, '2026-10-03 09:40:55', '2026-10-03 09:41:43'),
(66, 'REQ-261003114307', 49, '2026-10-03', '2026-10-14', NULL, 'DIRECT_TO_PROJECT_SITE', 'MEDIUM', 'FULFILLED', '', 1, '2026-10-03 11:43:30', 1, 1, '2026-10-03 11:43:34', '', NULL, '2026-10-03 09:43:07', '2026-10-03 09:43:52'),
(67, 'REQ-261004101704', 51, '2026-10-04', '2026-10-12', 27, 'WAREHOUSE', 'HIGH', 'FULFILLED', '', 1, '2026-10-04 10:17:52', 1, 1, '2026-10-04 10:17:56', '', NULL, '2026-10-04 08:17:04', '2026-10-04 08:18:20'),
(68, 'REQ-261004222012', 49, '2026-10-04', '2026-10-06', 3, 'WAREHOUSE', 'MEDIUM', 'DRAFT', '', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-10-04 20:20:12', NULL);

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
(54, 43, 'SUBMITTED', 1, NULL, '2026-09-06 22:53:24'),
(55, 43, 'APPROVED', 1, '', '2026-09-06 22:55:02'),
(56, 44, 'SUBMITTED', 1, NULL, '2026-09-09 20:38:57'),
(57, 44, 'APPROVED', 1, '', '2026-09-09 20:39:08'),
(58, 48, 'SUBMITTED', 1, NULL, '2026-09-12 07:30:16'),
(59, 48, 'APPROVED', 1, '', '2026-09-12 07:30:25'),
(60, 47, 'SUBMITTED', 1, NULL, '2026-09-12 08:11:27'),
(61, 47, 'APPROVED', 1, '', '2026-09-12 08:11:37'),
(62, 49, 'SUBMITTED', 1, NULL, '2026-09-13 08:16:22'),
(63, 49, 'APPROVED', 1, '', '2026-09-13 08:16:28'),
(64, 50, 'SUBMITTED', 1, NULL, '2026-09-17 14:59:27'),
(65, 50, 'APPROVED', 1, '', '2026-09-17 14:59:39'),
(66, 52, 'SUBMITTED', 1, NULL, '2026-10-01 11:10:48'),
(67, 52, 'APPROVED', 1, '', '2026-10-01 11:10:55'),
(68, 53, 'SUBMITTED', 1, NULL, '2026-10-01 14:53:51'),
(69, 53, 'APPROVED', 1, '', '2026-10-01 14:53:54'),
(70, 56, 'SUBMITTED', 1, NULL, '2026-10-02 20:40:14'),
(71, 56, 'APPROVED', 1, '', '2026-10-02 20:40:18'),
(72, 55, 'SUBMITTED', 1, NULL, '2026-10-02 21:00:19'),
(73, 55, 'APPROVED', 1, '', '2026-10-02 21:00:22'),
(74, 57, 'SUBMITTED', 1, NULL, '2026-10-02 21:53:18'),
(75, 57, 'APPROVED', 1, '', '2026-10-02 21:53:21'),
(76, 46, 'SUBMITTED', 1, NULL, '2026-10-02 22:20:46'),
(77, 46, 'APPROVED', 1, '', '2026-10-02 22:20:49'),
(78, 58, 'SUBMITTED', 1, NULL, '2026-10-02 22:42:35'),
(79, 58, 'APPROVED', 1, '', '2026-10-02 22:42:39'),
(80, 59, 'SUBMITTED', 1, NULL, '2026-10-02 22:47:32'),
(81, 59, 'APPROVED', 1, '', '2026-10-02 22:47:35'),
(82, 60, 'SUBMITTED', 1, NULL, '2026-10-02 23:13:07'),
(83, 60, 'APPROVED', 1, '', '2026-10-02 23:13:12'),
(84, 61, 'SUBMITTED', 1, NULL, '2026-10-02 23:15:22'),
(85, 61, 'APPROVED', 1, '', '2026-10-02 23:15:24'),
(86, 62, 'SUBMITTED', 1, NULL, '2026-10-03 08:06:12'),
(87, 62, 'APPROVED', 1, '', '2026-10-03 08:06:15'),
(88, 63, 'SUBMITTED', 1, NULL, '2026-10-03 08:45:09'),
(89, 63, 'APPROVED', 1, '', '2026-10-03 08:45:12'),
(90, 64, 'SUBMITTED', 1, NULL, '2026-10-03 08:47:06'),
(91, 64, 'APPROVED', 1, '', '2026-10-03 08:47:09'),
(92, 65, 'SUBMITTED', 1, NULL, '2026-10-03 11:41:15'),
(93, 65, 'APPROVED', 1, '', '2026-10-03 11:41:19'),
(94, 66, 'SUBMITTED', 1, NULL, '2026-10-03 11:43:30'),
(95, 66, 'APPROVED', 1, '', '2026-10-03 11:43:34'),
(96, 45, 'SUBMITTED', 1, NULL, '2026-10-04 09:34:34'),
(97, 45, 'APPROVED', 1, '', '2026-10-04 09:34:38'),
(98, 67, 'SUBMITTED', 1, NULL, '2026-10-04 10:17:52'),
(99, 67, 'APPROVED', 1, '', '2026-10-04 10:17:56');

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
(39, 48, 'RR-FUL-20260912075355-825', '2026-09-12 00:00:00', 1, '', 'COMPLETED', '2026-09-12 05:53:55'),
(40, 48, 'RR-FUL-20260912080439-350', '2026-09-12 00:00:00', 1, '', 'COMPLETED', '2026-09-12 06:04:39'),
(41, 47, 'RR-FUL-20260912091158-219', '2026-09-12 09:11:58', 1, '', 'COMPLETED', '2026-09-12 07:11:58'),
(42, 52, 'RR-FUL-20261001111252-494', '2026-10-01 00:00:00', 1, '', 'COMPLETED', '2026-10-01 09:12:52'),
(43, 53, 'RR-FUL-20261001145414-140', '2026-10-01 00:00:00', 1, '', 'COMPLETED', '2026-10-01 12:54:14'),
(44, 56, 'RR-FUL-261002204156-734', '2026-10-02 00:00:00', 1, '', 'COMPLETED', '2026-10-02 18:41:56'),
(45, 55, 'RR-FUL-261002210041-824', '2026-10-02 00:00:00', 1, '', 'COMPLETED', '2026-10-02 19:00:41'),
(46, 57, 'RR-FUL-20261002215347-529', '2026-10-02 21:53:47', 1, '', 'COMPLETED', '2026-10-02 19:53:47'),
(47, 46, 'RR-FUL-20261002222123-912', '2026-10-02 22:21:23', 1, '', 'COMPLETED', '2026-10-02 20:21:23'),
(48, 46, 'RR-FUL-261002222148-711', '2026-10-02 00:00:00', 1, '', 'COMPLETED', '2026-10-02 20:21:48'),
(49, 58, 'RR-FUL-261002224306-352', '2026-10-02 00:00:00', 1, '', 'COMPLETED', '2026-10-02 20:43:06'),
(50, 58, 'RR-FUL-20261002224407-756', '2026-10-02 22:44:07', 1, '', 'COMPLETED', '2026-10-02 20:44:07'),
(51, 59, 'RR-FUL-261002224751-945', '2026-10-02 00:00:00', 1, '', 'COMPLETED', '2026-10-02 20:47:51'),
(52, 60, 'RR-FUL-261002231326-769', '2026-10-02 00:00:00', 1, '', 'COMPLETED', '2026-10-02 21:13:26'),
(53, 61, 'RR-FUL-20261002231540-244', '2026-10-02 23:15:40', 1, '', 'COMPLETED', '2026-10-02 21:15:40'),
(54, 50, 'RR-FUL-261003080449-534', '2026-10-03 00:00:00', 1, '', 'COMPLETED', '2026-10-03 06:04:49'),
(55, 62, 'RR-FUL-20261003080634-739', '2026-10-03 08:06:34', 1, '', 'COMPLETED', '2026-10-03 06:06:34'),
(56, 63, 'RR-FUL-261003084531-149', '2026-10-03 00:00:00', 1, '', 'COMPLETED', '2026-10-03 06:45:31'),
(57, 64, 'RR-FUL-20261003084725-457', '2026-10-03 08:47:25', 1, '', 'COMPLETED', '2026-10-03 06:47:25'),
(58, 65, 'RR-FUL-261003114143-684', '2026-10-03 00:00:00', 1, '', 'COMPLETED', '2026-10-03 09:41:43'),
(59, 66, 'RR-FUL-20261003114352-434', '2026-10-03 11:43:52', 1, '', 'COMPLETED', '2026-10-03 09:43:52'),
(60, 45, 'RR-FUL-20261004093615-639', '2026-10-04 09:36:15', 1, '', 'COMPLETED', '2026-10-04 07:36:15'),
(61, 45, 'RR-FUL-20261004094132-908', '2026-10-04 09:41:32', 1, '', 'COMPLETED', '2026-10-04 07:41:32'),
(62, 67, 'RR-FUL-20261004101820-491', '2026-10-04 10:18:20', 1, '', 'COMPLETED', '2026-10-04 08:18:20');

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
(30, 39, 46, 161, 3, 5.00, 5.50, '', 328, 211, '2026-09-12 05:53:55'),
(31, 40, 47, 134, 2, 1.00, 4.50, '', 329, 212, '2026-09-12 06:04:39'),
(32, 41, 45, NULL, NULL, 40.00, 300.00, 'الحساب بالمتر المكعب', NULL, NULL, '2026-09-12 07:11:58'),
(33, 42, 52, 167, 3, 14.00, 3.00, '', 371, NULL, '2026-10-01 09:12:52'),
(34, 43, 53, 156, 1, 4.00, 35.00, '', 372, NULL, '2026-10-01 12:54:14'),
(35, 44, 54, 138, 3, 1.00, 3.95, '', 382, NULL, '2026-10-02 18:41:56'),
(36, 45, 55, 147, 3, 1.00, 95.00, '', 383, NULL, '2026-10-02 19:00:41'),
(37, 46, 56, NULL, NULL, 1.00, 500.00, '', NULL, 238, '2026-10-02 19:53:47'),
(38, 47, 44, NULL, NULL, 2.00, 250.00, '', NULL, NULL, '2026-10-02 20:21:23'),
(39, 48, 43, 167, 3, 20.00, 3.00, '', 393, 242, '2026-10-02 20:21:48'),
(40, 49, 58, 170, 3, 1.00, 24.00, '', 394, 243, '2026-10-02 20:43:06'),
(41, 50, 57, NULL, NULL, 1.00, 110.00, '', NULL, NULL, '2026-10-02 20:44:07'),
(42, 51, 59, 156, 3, 1.00, 35.00, '', 395, 245, '2026-10-02 20:47:51'),
(43, 52, 60, 143, 3, 1.00, 3.40, '', 396, 246, '2026-10-02 21:13:26'),
(44, 53, 61, NULL, NULL, 10.00, 400.00, '', NULL, NULL, '2026-10-02 21:15:40'),
(45, 54, 50, 190, 32, 25.00, 0.00, '', 398, 249, '2026-10-03 06:04:49'),
(46, 55, 62, NULL, NULL, 1.00, 500.00, '', NULL, 250, '2026-10-03 06:06:34'),
(47, 56, 63, 167, 3, 1.00, 3.00, '', 399, 251, '2026-10-03 06:45:31'),
(48, 57, 64, NULL, NULL, 3.00, 600.00, '', NULL, 252, '2026-10-03 06:47:25'),
(49, 58, 65, 183, 3, 1.00, 1.50, '', 400, 253, '2026-10-03 09:41:43'),
(50, 59, 66, NULL, NULL, 1.00, 500.00, '', NULL, 254, '2026-10-03 09:43:52'),
(51, 60, 70, NULL, NULL, 1.00, 5000.00, 'للفحص فيما يتعلق بنوع التكلفة', NULL, 255, '2026-10-04 07:36:15'),
(52, 61, 72, NULL, NULL, 1.00, 4000.00, '', NULL, 256, '2026-10-04 07:41:32'),
(53, 62, 73, NULL, NULL, 1.00, 1500.00, '', NULL, 257, '2026-10-04 08:18:20');

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
(41, 43, 'INVENTORY', NULL, NULL, 181, 'Dust Mask FFP2', 'PCS', 150.00, 0.00, 0.00, 0.00, '', 'OPEN', '2026-09-06 20:52:51'),
(42, 44, 'INVENTORY', NULL, NULL, 134, 'Binding Wire', 'KG', 190.00, 0.00, 0.00, 0.00, '', 'OPEN', '2026-09-09 18:38:41'),
(43, 46, 'INVENTORY', NULL, NULL, 167, 'Anchor Bolt M16', 'PCS', 20.00, 20.00, 0.00, 0.00, '', 'FULFILLED', '2026-09-11 16:34:47'),
(44, 46, 'RESOURCE', NULL, NULL, 20, 'Carpenter', 'Ton', 2.00, 2.00, 0.00, 0.00, '', 'FULFILLED', '2026-09-11 16:36:22'),
(45, 47, 'RESOURCE', NULL, NULL, 24, 'Concrete Pumping', 'Cubic Meter', 40.00, 40.00, 0.00, 0.00, '', 'FULFILLED', '2026-09-11 18:35:02'),
(46, 48, 'INVENTORY', NULL, NULL, 161, 'Engine Oil 15W40', 'LTR', 5.00, 5.00, 0.00, 0.00, '', 'FULFILLED', '2026-09-11 19:58:22'),
(47, 48, 'INVENTORY', NULL, NULL, 134, 'Binding Wire', 'KG', 1.00, 1.00, 0.00, 0.00, '', 'FULFILLED', '2026-09-11 20:01:53'),
(48, 49, 'INVENTORY', NULL, NULL, 117, 'Coarse Aggregate 20mm', 'Cubic Meter', 5.00, 0.00, 0.00, 0.00, '', 'OPEN', '2026-09-12 21:26:20'),
(49, 49, 'RESOURCE', NULL, NULL, 22, 'Electrician', 'Point', 200.00, 0.00, 0.00, 0.00, '', 'OPEN', '2026-09-13 06:15:53'),
(50, 50, 'INVENTORY', NULL, NULL, 190, 'Light Bulb 500W', 'Pieces', 25.00, 25.00, 0.00, 0.00, '', 'FULFILLED', '2026-09-17 09:54:51'),
(52, 52, 'INVENTORY', NULL, NULL, 167, 'Anchor Bolt M16', 'Pieces', 14.99, 14.00, 0.00, 0.00, 'تجربة ترجمة الوصف في تكاليف المشروع بناء على طلب المواد', 'PARTIAL', '2026-10-01 09:10:46'),
(53, 53, 'INVENTORY', NULL, NULL, 156, 'Bearing 6204', 'Pieces', 4.00, 4.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-01 12:53:45'),
(54, 56, 'INVENTORY', NULL, NULL, 138, 'Electrical Cable 6mm² Single Core', 'Meter', 1.00, 1.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-02 18:40:12'),
(55, 55, 'INVENTORY', NULL, NULL, 147, 'Distribution Board 12-Way', 'Pieces', 1.00, 1.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-02 19:00:17'),
(56, 57, 'RESOURCE', NULL, NULL, 22, 'Electrician', 'Point', 1.00, 1.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-02 19:53:13'),
(57, 58, 'RESOURCE', NULL, NULL, 19, 'Mason', 'Square Meter', 1.00, 1.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-02 20:42:02'),
(58, 58, 'INVENTORY', NULL, NULL, 170, 'Epoxy Primer', 'Liter', 1.00, 1.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-02 20:42:31'),
(59, 59, 'INVENTORY', NULL, NULL, 156, 'Bearing 6204', 'Pieces', 1.00, 1.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-02 20:47:28'),
(60, 60, 'INVENTORY', NULL, NULL, 143, 'Double Wall Socket 13A UK', 'Pieces', 1.00, 1.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-02 21:13:02'),
(61, 61, 'RESOURCE', NULL, NULL, 23, 'Plumber', 'Lump Sum', 10.00, 10.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-02 21:15:15'),
(62, 62, 'RESOURCE', NULL, NULL, 23, 'Plumber', 'Lump Sum', 1.00, 1.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-03 06:06:11'),
(63, 63, 'INVENTORY', NULL, NULL, 167, 'Anchor Bolt M16', 'Pieces', 1.00, 1.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-03 06:45:08'),
(64, 64, 'RESOURCE', NULL, NULL, 33, 'SITE ENGINEER', 'Month', 3.00, 3.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-03 06:47:04'),
(65, 65, 'INVENTORY', NULL, NULL, 183, 'Grinding Disc 115mm', 'Pieces', 1.00, 1.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-03 09:41:12'),
(66, 66, 'RESOURCE', NULL, NULL, 23, 'Plumber', 'Lump Sum', 1.00, 1.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-03 09:43:28'),
(67, 45, 'RESOURCE', 'HUMAN_RESOURCES', NULL, 22, 'Electrician', 'Point', 1.00, 0.00, 0.00, 0.00, '', 'OPEN', '2026-10-03 19:58:10'),
(68, 45, 'INVENTORY', 'MATERIALS', NULL, 135, 'Electrical Cable 1.5mm² Single Core', 'Meter', 20.00, 0.00, 0.00, 0.00, '', 'OPEN', '2026-10-04 04:55:20'),
(69, 45, 'INVENTORY', 'MATERIALS', NULL, 112, 'Portland Cement 52.5N', 'Bag', 11.99, 0.00, 0.00, 0.00, '', 'OPEN', '2026-10-04 05:31:57'),
(70, 45, 'RESOURCE', 'PROFESSIONAL_SERVICES', NULL, 23, 'Plumber', 'Lump Sum', 1.00, 1.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-04 05:34:44'),
(71, 45, 'RESOURCE', 'EQUIPMENT', NULL, 14, 'Excavator', 'Day', 1.00, 0.00, 0.00, 0.00, '', 'OPEN', '2026-10-04 05:37:11'),
(72, 45, 'RESOURCE', 'PROFESSIONAL_SERVICES', NULL, 23, 'Plumber', 'Lump Sum', 1.00, 1.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-04 05:38:42'),
(73, 67, 'RESOURCE', 'EQUIPMENT', NULL, 14, 'Excavator', 'Day', 1.00, 1.00, 0.00, 0.00, '', 'FULFILLED', '2026-10-04 08:17:37'),
(74, 68, 'INVENTORY', NULL, NULL, 135, 'Electrical Cable 1.5mm² Single Core', 'Meter', 3.50, 0.00, 0.00, 0.00, '', 'OPEN', '2026-10-04 21:46:34'),
(75, 68, 'INVENTORY', NULL, NULL, 167, 'Anchor Bolt M16', 'Pieces', 1.00, 0.00, 0.00, 0.00, '', 'OPEN', '2026-10-04 21:47:00'),
(77, 68, 'INVENTORY', NULL, NULL, 138, 'Electrical Cable 6mm² Single Core', 'Meter', 5.75, 0.00, 0.00, 0.00, '', 'OPEN', '2026-10-04 21:49:36'),
(79, 68, 'INVENTORY', NULL, NULL, 137, 'Electrical Cable 4mm² Single Core', 'Meter', 1.50, 0.00, 0.00, 0.00, '', 'OPEN', '2026-10-05 05:12:52'),
(80, 68, 'RESOURCE', NULL, NULL, 19, 'Mason', 'Square Meter', 12.00, 0.00, 0.00, 0.00, '', 'OPEN', '2026-10-05 05:15:25');

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
(2, 5),
(2, 6),
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
(7, 18),
(7, 19),
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
(8, 22),
(8, 29),
(8, 30),
(8, 31),
(8, 32),
(8, 33),
(8, 34),
(8, 35),
(8, 37),
(8, 39),
(8, 49),
(8, 50),
(8, 56),
(8, 61),
(8, 62),
(8, 67),
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
(1, 'ABB Libya', 'sAMI Ahmed Salem', '+2189987615', 'ales@abb-bya.ly', 'THE SECOND Tripoli Industrial Area', 'THE Authorized ABB distributor and local', '2026-05-08 07:56:15'),
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
(34, 3, 'GRN', 'GoodsReceipt', 37, 1150.00, 'DEBIT', '2026-09-06 19:01:30'),
(35, 3, 'GRN', 'GoodsReceipt', 38, 10320.00, 'DEBIT', '2026-09-06 19:02:53'),
(36, 3, 'PAYMENT', 'SupplierPayment', 12, 10000.00, 'CREDIT', '2026-09-06 19:04:01'),
(37, 3, 'PAYMENT', 'SupplierPayment', 13, 1000.00, 'CREDIT', '2026-09-06 19:45:19'),
(38, 4, 'GRN', 'GoodsReceipt', 39, 600.00, 'DEBIT', '2026-09-10 09:49:59'),
(39, 4, '', 'GoodsReturn', 7, 360.00, 'CREDIT', '2026-09-10 10:20:40'),
(40, 4, 'GRN', 'GoodsReceipt', 40, 322.50, 'DEBIT', '2026-09-20 12:46:29'),
(41, 4, 'GRN', 'GoodsReceipt', 41, 6000.00, 'DEBIT', '2026-09-20 13:12:31'),
(42, 4, 'GRN', 'GoodsReceipt', 42, 75.00, 'DEBIT', '2026-09-24 05:33:14'),
(43, 4, 'GRN', 'GoodsReceipt', 43, 15.00, 'DEBIT', '2026-09-24 10:37:22'),
(44, 1, 'GRN', 'GoodsReceipt', 44, 525.00, 'DEBIT', '2026-09-26 04:51:23'),
(45, 1, 'PAYMENT', 'SupplierPayment', 14, 200.00, 'CREDIT', '2026-09-26 04:54:01');

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

--
-- Dumping data for table `supplier_payments`
--

INSERT INTO `supplier_payments` (`id`, `supplier_id`, `payment_date`, `amount`, `method`, `reference`, `notes`, `created_by`, `created_at`) VALUES
(12, 3, '2026-09-06', 10000.00, 'Bank Transfer', 'against PO-12300765', 'partial payment', 1, '2026-09-06 19:04:01'),
(13, 3, '2026-09-06', 1000.00, 'Cash', 'second payment PO-#', 'second payment PO-#', 1, '2026-09-06 19:45:19'),
(14, 1, '2026-09-26', 200.00, 'Cash', 'PO 20260917174851', 'دفعة من حساب امر الشراء PO 20260917174851', 1, '2026-09-26 04:54:01');

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

--
-- Dumping data for table `supplier_quotations`
--

INSERT INTO `supplier_quotations` (`id`, `quotation_number`, `supplier_id`, `supplier_reference`, `procurement_reference`, `quotation_date`, `valid_until`, `required_delivery_date`, `promised_delivery_date`, `status`, `purchase_order_id`, `notes`, `evaluation_notes`, `attachment`, `created_by`, `created_at`) VALUES
(6, 'SQ-260917150525', 3, '17776354', 'REQ-260917114231', '2026-09-16', '2026-10-08', '2026-09-24', '2026-09-24', 'DRAFT', NULL, 'الموعد جيد', 'المورد له تاريخ تعامل جيد', NULL, 1, '2026-09-17 13:05:25'),
(7, 'SQ-260917180825', 1, '478467256', 'REQ-260917114231', '2026-09-17', '2026-10-15', '2026-09-24', '2026-09-24', 'DRAFT', NULL, '', '', NULL, 1, '2026-09-17 16:08:25'),
(8, 'SQ-260917181039', 2, '9798788', 'REQ-260917114231', '2026-09-17', '2026-10-09', '2026-09-24', '2026-09-25', 'DRAFT', NULL, '', '', NULL, 1, '2026-09-17 16:10:39'),
(9, 'SQ-260917181717', 4, '9878009', 'REQ-260911204609', '2026-09-17', '2026-10-22', '2026-09-23', '2026-09-24', 'DRAFT', NULL, '', '', NULL, 1, '2026-09-17 16:17:17');

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

--
-- Dumping data for table `supplier_quotation_items`
--

INSERT INTO `supplier_quotation_items` (`id`, `supplier_quotation_id`, `inventory_id`, `description`, `specification`, `unit_id`, `quantity`, `unit_price`, `quality_status`, `quality_notes`, `notes`, `created_at`) VALUES
(7, 6, 134, 'Binding Wire', '', 7, 100.00, 7.80, NULL, '', '', '2026-09-17 16:06:02'),
(8, 7, 134, 'Binding Wire', '', 7, 100.00, 7.95, NULL, '', '', '2026-09-17 16:09:25'),
(9, 8, 134, 'Binding Wire', '', 7, 100.00, 7.74, NULL, '', '', '2026-09-17 16:11:06'),
(10, 9, 115, 'Concrete Block 15cm', '', 1, 5000.00, 2.45, NULL, '', '', '2026-09-17 16:17:57');

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
(1, 'PCS', 'Pieces', 'قطعة', NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(2, 'BOX', 'Box', 'صندوق', NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(3, 'BAG', 'Bag', 'كيس', NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(4, 'ROLL', 'Roll', 'لفة', NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(5, 'SET', 'Set', 'طقم', NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(6, 'PAIR', 'Pair', 'زوج', NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(7, 'KG', 'Kilogram', 'كيلوجرام', NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(8, 'GRM', 'Gram', 'جرام', '', 'ACTIVE', '2026-07-12 05:15:58'),
(9, 'TON', 'Ton', 'طن', NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(10, 'MTR', 'Meter', 'متر', NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(11, 'CM', 'Centimeter', 'سنتمتر', 'سنتيميتر طولي', 'ACTIVE', '2026-07-12 05:15:58'),
(12, 'MM', 'Millimeter', 'مليمتر', NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(13, 'KM', 'Kilometer', 'كيلومتر', NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(14, 'M2', 'Square Meter', 'متر مربع', NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(15, 'M3', 'Cubic Meter', 'متر مكعب', NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(16, 'LTR', 'Liter', 'لتر', NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(17, 'DAY', 'Day', 'اجر يومي', 'أجرة عامل يومية', 'ACTIVE', '2026-07-12 05:15:58'),
(18, 'HR', 'Hour', 'ساعة', NULL, 'ACTIVE', '2026-07-12 05:15:58'),
(19, 'WK', 'Week', 'اسبوعي', 'أجرة او مرتب اسبوعي ثابت', 'ACTIVE', '2026-07-12 05:15:58'),
(20, 'MONTH', 'Month', 'شهري', 'مرتب شهري', 'ACTIVE', '2026-07-12 05:15:58'),
(21, 'LS', 'Lump Sum', 'مبلغ مقطوع', 'التعاقد على مبلغ مقطوع من المال.', 'ACTIVE', '2026-09-11 18:16:23'),
(22, 'PNT', 'Point', 'نقطة', 'Electrical Distribution Point or any similar professional work.', 'ACTIVE', '2026-09-13 06:09:05');

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
(6, 'Ahmad Sudan', 'Ahmad', 'ac@ems.com', '+218912345745', 'uploads/users/user_6aa8ec904ca723.73806793.jpg', '$2y$10$g.O9QjwPsW60VVrZZ.UGGebvqu3YqCbDq4DknouqpBIxR/iiA9JKu', '2026-04-07 20:34:24', 5),
(7, 'Omar Khalid', 'Omar', 'eng@ems.com', '+218912345298', NULL, '$2y$10$uNBYvJRdBnd5xdlc8ADmb.oCxl4EIVLmd3kuftCWcW7Epbj7CiQrK', '2026-04-07 20:34:24', 3),
(8, 'Ali Salem', 'Ali', 'tech@ems.com', '+218918762345', 'uploads/users/user_6abbb32ab44531.94162267.jpg', '$2y$10$uNBYvJRdBnd5xdlc8ADmb.oCxl4EIVLmd3kuftCWcW7Epbj7CiQrK', '2026-04-07 20:34:24', 4),
(11, 'Abdullah Ben Amer', 'Amer', 'benamer@gmail.com', '+218972987645', NULL, '$2y$10$YSYPAjp4O/R.pe40wv4Equfr18/r70omV36YJkE5VU94iTeDCF2P6', '2026-04-20 20:29:44', 8),
(12, 'Sumaya Abdullah', 'Sumaya', 'sumaya@ems.com', '+2189123457687', 'uploads/users/user_6abb622c124b03.34558456.png', '$2y$10$Y.8EQGCefp30HlCMXKLS2OMuMbWAxnaTRHR88HX8AzTRbHRPoYxgG', '2026-04-22 11:59:21', 5),
(13, 'Mustafa Saqer', 'Mustafa', 'cash@ems.com', '+2189123457687', NULL, '$2y$10$XeB5nEBG9iuu87/pCrjMU.tVgMAxOpvl7j5uYhQ9b/TbTXrCg/fM.', '2026-04-24 20:14:40', 7),
(14, 'Taha Hussain', 'Taha', 'th@ems.com', '+2189123457687', 'uploads/users/user_6aaf6c9f7141e6.68874237.jpg', '$2y$10$fLhJosWCRxuPtL0C/s5dTup98BZ11Xa0n72HW4qLCBGdEGM0byvEW', '2026-06-12 15:52:02', 2),
(15, 'khalil salem', 'salem', 'ks@ems.com', '+2189123457687', 'uploads/users/user_6abb6171844544.00756220.jpg', '$2y$10$1QScFHLSeyeWP2bcjk4fnujmDhz0hFGFYGLl8H1W09fIa9ymw2mMm', '2026-06-19 16:29:37', 8),
(16, 'abdulatif musa', 'abdulatif', 'am@ems.com', '+2189123776487', 'uploads/users/user_6aaed492527af9.10740308.jpg', '$2y$10$PlLMFxaLWxS01oXxwqpFUenxYKAHHGe32.M8yAwdh6oj8izQIvXsW', '2026-06-19 16:50:12', 7),
(17, 'faraj mugharbi', 'faraj', 'fm@ems.com', '+2189127657687', NULL, '$2y$10$pA06wD0MRIA4COTnDPVEt.tlEPyPdrj/Ebkf9RTyzzkaLjuCwRd22', '2026-06-20 08:00:48', 7),
(18, 'sami khalid', 'sami', 'sami@ems.com', '+2189123457687', NULL, '$2y$10$KclciMNyrrKA/6MZSlCGy.aEY0ekS4bMttTrcTmKMeP6Nv17VVbpO', '2026-06-25 05:50:21', 5),
(19, 'test permissions', 'test perm', 'test@ems.com', '+218911112233', NULL, '$2y$10$ODoFA.hgkqfKgTZ6WZI.teb00KNkJFl13C2vn8/smTFvyAe8WmKtS', '2026-07-22 16:42:24', 10),
(20, 'فرج المفيربي', 'faraj', 'faraj@ems.com', '+218972763765', NULL, '$2y$10$.HaOLKzSERJPuNOKHOlVLeSJlxwLrh2UCTBuUTQA4r5SJtCbxthx2', '2026-09-14 12:41:37', 3),
(23, 'عبدالباسط المغيربي', 'abdelbaset', 'abdelbaset@ems.com', '+218982658736', 'uploads/users/user_6aa7f02a799083.87514601.jpg', '$2y$10$pChk5ib7vSOAm6ZRIjI1xu5/PR3RsTWn4o.dn/5qTijL4FTyZjc.e', '2026-09-14 12:46:29', 2);

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
(6, 21),
(6, 22),
(8, 21),
(12, 32),
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
  ADD KEY `project_costs_location_fk` (`location_id`);

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
  ADD UNIQUE KEY `unit_code` (`unit_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goods_receipts`
--
ALTER TABLE `goods_receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `goods_receipt_items`
--
ALTER TABLE `goods_receipt_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `goods_returns`
--
ALTER TABLE `goods_returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `goods_return_items`
--
ALTER TABLE `goods_return_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `inventory_locations`
--
ALTER TABLE `inventory_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `inventory_location_stock`
--
ALTER TABLE `inventory_location_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- AUTO_INCREMENT for table `inventory_movements`
--
ALTER TABLE `inventory_movements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;

--
-- AUTO_INCREMENT for table `inventory_reservations`
--
ALTER TABLE `inventory_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `inventory_transfers`
--
ALTER TABLE `inventory_transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `project_advances`
--
ALTER TABLE `project_advances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `project_costs`
--
ALTER TABLE `project_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `project_documents`
--
ALTER TABLE `project_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `project_ledger`
--
ALTER TABLE `project_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `project_scopes`
--
ALTER TABLE `project_scopes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `resource_categories`
--
ALTER TABLE `resource_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `resource_requisitions`
--
ALTER TABLE `resource_requisitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `resource_requisition_approvals`
--
ALTER TABLE `resource_requisition_approvals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `resource_requisition_fulfillment_items`
--
ALTER TABLE `resource_requisition_fulfillment_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `resource_requisition_items`
--
ALTER TABLE `resource_requisition_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
