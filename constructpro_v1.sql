-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2026 at 10:12 PM
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
  `location_id` int(11) DEFAULT NULL,
  `quantity` decimal(15,2) NOT NULL,
  `unit_cost` decimal(15,2) NOT NULL,
  `total_cost` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(111, 'Portland Cement 42.5N', 'CONSTRUCTION MATERIAL', 'CEM-42-001', 500.00, NULL, 100, 12.50, 'BAG', 0, NULL, 1, 15.63, NULL, 36, 12),
(112, 'Portland Cement 52.5N', 'CONSTRUCTION MATERIAL', 'CEM-52-001', 250.00, NULL, 50, 15.50, 'BAG', 0, NULL, 1, 19.38, NULL, 36, 12),
(113, 'Ready Mix Concrete C25', 'CONCRETE', 'CON-C25-001', 25.00, NULL, 5, 95.00, 'M3', 1, NULL, 1, 118.75, NULL, NULL, 12),
(114, 'Concrete Block 20cm', 'MASONRY', 'BLK-20-001', 3000.00, NULL, 500, 1.80, 'PCS', 0, NULL, 1, 2.25, NULL, NULL, 12),
(115, 'Concrete Block 15cm', 'MASONRY', 'BLK-15-001', 2500.00, NULL, 500, 1.55, 'PCS', 0, NULL, 1, 1.94, NULL, NULL, 12),
(116, 'Fine Sand', 'AGGREGATE', 'SND-FINE-001', 40.00, NULL, 10, 75.00, 'M3', 1, NULL, 1, 93.75, NULL, NULL, 12),
(117, 'Coarse Aggregate 20mm', 'AGGREGATE', 'AGR-20-001', 60.00, NULL, 15, 85.00, 'M3', 1, NULL, 1, 106.25, NULL, NULL, 12),
(118, 'Construction Gravel', 'AGGREGATE', 'GRV-001', 50.00, NULL, 10, 80.00, 'M3', 1, NULL, 1, 100.00, NULL, NULL, 12),
(119, 'Red Brick', 'MASONRY', 'BRK-RED-001', 5000.00, NULL, 1000, 0.65, 'PCS', 0, NULL, 1, 0.81, NULL, NULL, 12),
(120, 'Plastering Cement', 'CONSTRUCTION MATERIAL', 'PLS-CEM-001', 300.00, NULL, 50, 11.50, 'BAG', 0, NULL, 1, 14.38, NULL, 36, 12),
(121, 'Gypsum Board 12.5mm', 'FINISHING', 'GYP-125-001', 400.00, NULL, 50, 18.00, 'PCS', 0, NULL, 1, 22.50, NULL, NULL, 12),
(122, 'Ceramic Floor Tile 60x60', 'FINISHING', 'TIL-6060-001', 800.00, NULL, 100, 6.50, 'M2', 1, NULL, 1, 8.13, NULL, NULL, 12),
(123, 'Ceramic Wall Tile 30x60', 'FINISHING', 'TIL-3060-001', 650.00, NULL, 100, 5.80, 'M2', 1, NULL, 1, 7.25, NULL, NULL, 12),
(124, 'Waterproofing Membrane 4mm', 'WATERPROOFING', 'WPM-4-001', 120.00, NULL, 20, 42.00, 'ROLL', 0, NULL, 1, 52.50, NULL, NULL, 12),
(125, 'PVC Water Tank 1000L', 'PLUMBING', 'TANK-1000-001', 20.00, NULL, 5, 450.00, 'PCS', 0, NULL, 1, 562.50, NULL, NULL, 12),
(126, 'Rebar 8mm', 'STEEL', 'REB-08-001', 3500.00, NULL, 500, 3.20, 'M', 1, NULL, 1, 4.00, NULL, 34, 12),
(127, 'Rebar 10mm', 'STEEL', 'REB-10-001', 2800.00, NULL, 500, 4.80, 'M', 1, NULL, 1, 6.00, NULL, 34, 12),
(128, 'Rebar 12mm', 'STEEL', 'REB-12-001', 3200.00, NULL, 500, 6.90, 'M', 1, NULL, 1, 8.63, NULL, 34, 12),
(129, 'Rebar 16mm', 'STEEL', 'REB-16-001', 2200.00, NULL, 400, 11.80, 'M', 1, NULL, 1, 14.75, NULL, 34, 12),
(130, 'Rebar 20mm', 'STEEL', 'REB-20-001', 1200.00, NULL, 250, 18.20, 'M', 1, NULL, 1, 22.75, NULL, 34, 12),
(131, 'Steel Angle 50x50x5mm', 'STRUCTURAL STEEL', 'ANG-50505-001', 400.00, NULL, 50, 28.00, 'M', 1, NULL, 1, 35.00, NULL, 34, 12),
(132, 'Steel Channel 100mm', 'STRUCTURAL STEEL', 'CHN-100-001', 250.00, NULL, 50, 42.00, 'M', 1, NULL, 1, 52.50, NULL, 34, 12),
(133, 'Steel Plate 6mm', 'STRUCTURAL STEEL', 'PLT-6-001', 120.00, NULL, 20, 145.00, 'M2', 1, NULL, 1, 181.25, NULL, 34, 12),
(134, 'Binding Wire', 'STEEL ACCESSORY', 'BW-001', 80.00, NULL, 15, 4.50, 'KG', 1, NULL, 1, 5.63, NULL, NULL, 12),
(135, 'Electrical Cable 1.5mm² Single Core', 'ELECTRICAL CABLE', 'CAB-1.5-001', 2500.00, NULL, 500, 1.15, 'M', 1, NULL, 1, 1.44, NULL, 3, 3),
(136, 'Electrical Cable 2.5mm² Single Core', 'ELECTRICAL CABLE', 'CAB-2.5-001', 3000.00, NULL, 500, 1.75, 'M', 1, NULL, 1, 2.19, NULL, 3, 3),
(137, 'Electrical Cable 4mm² Single Core', 'ELECTRICAL CABLE', 'CAB-4-001', 1800.00, NULL, 400, 2.80, 'M', 1, NULL, 1, 3.50, NULL, 3, 3),
(138, 'Electrical Cable 6mm² Single Core', 'ELECTRICAL CABLE', 'CAB-6-001', 1400.00, NULL, 300, 3.95, 'M', 1, NULL, 1, 4.94, NULL, 3, 3),
(139, 'Power Cable 4C x 16mm²', 'POWER CABLE', 'PWC-4C16-001', 600.00, NULL, 100, 18.50, 'M', 1, NULL, 1, 23.13, NULL, 19, 6),
(140, 'Power Cable 4C x 35mm²', 'POWER CABLE', 'PWC-4C35-001', 500.00, NULL, 100, 34.50, 'M', 1, NULL, 1, 43.13, NULL, 20, 9),
(141, 'Power Cable 4C x 70mm²', 'POWER CABLE', 'PWC-4C70-001', 300.00, NULL, 50, 58.00, 'M', 1, NULL, 1, 72.50, NULL, 19, 6),
(142, 'Wall Socket 13A UK', 'ELECTRICAL ACCESSORY', 'WS-13A-UK-001', 1000.00, NULL, 100, 2.25, 'PCS', 0, 'BOX', 10, 2.81, 22.50, 8, 9),
(143, 'Double Wall Socket 13A UK', 'ELECTRICAL ACCESSORY', 'WS-D13A-001', 500.00, NULL, 100, 3.40, 'PCS', 0, 'BOX', 10, 4.25, 34.00, 8, 9),
(144, 'LED Panel Light 600x600 40W', 'LIGHTING', 'LED-PNL-40-001', 100.00, NULL, 20, 28.00, 'PCS', 0, 'BOX', 1, 35.00, 28.00, 5, 9),
(145, 'MCB 1P 16A', 'ELECTRICAL PROTECTION', 'MCB-1P16-001', 150.00, NULL, 30, 8.50, 'PCS', 0, 'BOX', 12, 10.63, 102.00, 5, 9),
(146, 'MCB 3P 32A', 'ELECTRICAL PROTECTION', 'MCB-3P32-001', 80.00, NULL, 15, 24.00, 'PCS', 0, 'BOX', 6, 30.00, 144.00, 5, 9),
(147, 'Distribution Board 12-Way', 'ELECTRICAL PANEL', 'DB-12W-001', 25.00, NULL, 5, 95.00, 'PCS', 0, NULL, 1, 118.75, NULL, 5, 9),
(148, 'Contactor 25A', 'CONTROL GEAR', 'CNT-25A-001', 40.00, NULL, 10, 32.00, 'PCS', 0, 'BOX', 1, 40.00, 32.00, 1, 1),
(149, 'Terminal Block 6mm²', 'ELECTRICAL ACCESSORY', 'TB-6-001', 500.00, NULL, 100, 0.75, 'PCS', 0, 'BOX', 100, 0.94, 75.00, 21, 1),
(150, 'PVC Pipe 20mm', 'PLUMBING', 'PVC-20-001', 800.00, NULL, 100, 2.40, 'M', 1, NULL, 1, 3.00, NULL, NULL, 12),
(151, 'PVC Pipe 32mm', 'PLUMBING', 'PVC-32-001', 600.00, NULL, 100, 3.80, 'M', 1, NULL, 1, 4.75, NULL, NULL, 12),
(152, 'PVC Pipe 50mm', 'PLUMBING', 'PVC-50-001', 450.00, NULL, 80, 5.90, 'M', 1, NULL, 1, 7.38, NULL, NULL, 12),
(153, 'PPR Pipe 25mm', 'PLUMBING', 'PPR-25-001', 400.00, NULL, 80, 4.80, 'M', 1, NULL, 1, 6.00, NULL, NULL, 12),
(154, 'PVC Elbow 90° 25mm', 'PLUMBING FITTING', 'ELB-25-90-001', 300.00, NULL, 50, 1.20, 'PCS', 0, 'BOX', 20, 1.50, 24.00, NULL, 12),
(155, 'Brass Ball Valve 1\"', 'PLUMBING VALVE', 'VAL-BV-1-001', 80.00, NULL, 15, 18.00, 'PCS', 0, NULL, 1, 22.50, NULL, NULL, 12),
(156, 'Bearing 6204', 'MECHANICAL', 'BRG-6204-001', 40.00, NULL, 10, 12.00, 'PCS', 0, 'BOX', 10, 15.00, 120.00, 6, 3),
(157, 'Bearing 6205', 'MECHANICAL', 'BRG-6205-001', 40.00, NULL, 10, 14.50, 'PCS', 0, 'BOX', 10, 18.13, 145.00, 6, 3),
(158, 'V-Belt A-42', 'MECHANICAL', 'VBT-A42-001', 25.00, NULL, 5, 9.50, 'PCS', 0, NULL, 1, 11.88, NULL, NULL, 12),
(159, 'Hydraulic Hose 1/2\"', 'HYDRAULIC', 'HYD-HS-12-001', 250.00, NULL, 50, 8.50, 'M', 1, NULL, 1, 10.63, NULL, NULL, 12),
(160, 'Hydraulic Oil ISO 46', 'LUBRICANT', 'OIL-ISO46-001', 200.00, NULL, 50, 4.80, 'LTR', 1, NULL, 1, 6.00, NULL, 7, 12),
(161, 'Engine Oil 15W40', 'LUBRICANT', 'OIL-15W40-001', 150.00, NULL, 30, 5.50, 'LTR', 1, NULL, 1, 6.88, NULL, 34, 12),
(162, 'Grease EP2', 'LUBRICANT', 'GRS-EP2-001', 80.00, NULL, 20, 7.25, 'KG', 1, NULL, 1, 9.06, NULL, 34, 12),
(163, 'Hex Bolt M8x40', 'FASTENERS', 'BLT-M8-40-001', 1000.00, NULL, 200, 0.18, 'PCS', 0, 'BOX', 100, 0.23, 18.00, NULL, 12),
(164, 'Hex Bolt M10x50', 'FASTENERS', 'BLT-M10-50-001', 1000.00, NULL, 200, 0.28, 'PCS', 0, 'BOX', 100, 0.35, 28.00, NULL, 12),
(165, 'Hex Nut M10', 'FASTENERS', 'NUT-M10-001', 1200.00, NULL, 200, 0.12, 'PCS', 0, 'BOX', 100, 0.15, 12.00, NULL, 12),
(166, 'Washer M10', 'FASTENERS', 'WSR-M10-001', 1500.00, NULL, 300, 0.06, 'PCS', 0, 'BOX', 100, 0.08, 6.00, NULL, 12),
(167, 'Anchor Bolt M16', 'FASTENERS', 'ANC-M16-001', 300.00, NULL, 50, 2.80, 'PCS', 0, 'BOX', 25, 3.50, 70.00, NULL, 12),
(168, 'Acrylic Wall Paint White', 'PAINT', 'PNT-WHT-001', 250.00, NULL, 50, 18.00, 'LTR', 1, NULL, 1, 22.50, NULL, NULL, 12),
(169, 'Exterior Paint White', 'PAINT', 'PNT-EXT-WHT-001', 180.00, NULL, 30, 21.00, 'LTR', 1, NULL, 1, 26.25, NULL, NULL, 12),
(170, 'Epoxy Primer', 'COATING', 'EPX-PRM-001', 100.00, NULL, 20, 24.00, 'LTR', 1, NULL, 1, 30.00, NULL, NULL, 12),
(171, 'Silicone Sealant', 'CHEMICAL', 'SIL-001', 120.00, NULL, 20, 3.80, 'PCS', 0, 'BOX', 24, 4.75, 91.20, NULL, 12),
(172, 'Construction Adhesive', 'CHEMICAL', 'ADH-001', 100.00, NULL, 20, 6.50, 'PCS', 0, 'BOX', 12, 8.13, 78.00, NULL, 12),
(173, 'Safety Shoes S1P', 'SAFETY PPE', 'PPE-SHOE-S1P-001', 40.00, NULL, 10, 42.00, 'PAIR', 0, NULL, 1, 52.50, NULL, 4, 4),
(174, 'Safety Helmet', 'SAFETY PPE', 'PPE-HELMET-001', 80.00, NULL, 20, 8.50, 'PCS', 0, 'BOX', 20, 10.63, 170.00, 4, 4),
(175, 'Safety Goggles', 'SAFETY PPE', 'PPE-GOGGLE-001', 100.00, NULL, 20, 3.25, 'PCS', 0, 'BOX', 20, 4.06, 65.00, 4, 4),
(176, 'Reflective Safety Vest', 'SAFETY PPE', 'PPE-VEST-001', 80.00, NULL, 20, 6.50, 'PCS', 0, 'BOX', 10, 8.13, 65.00, 4, 4),
(177, 'Nitrile Work Gloves', 'SAFETY PPE', 'PPE-GLOVE-001', 500.00, NULL, 100, 0.75, 'PAIR', 0, 'BOX', 100, 0.94, 75.00, 4, 4),
(178, 'Cut Resistant Gloves', 'SAFETY PPE', 'PPE-CUT-001', 100.00, NULL, 20, 4.50, 'PAIR', 0, 'BOX', 10, 5.63, 45.00, 4, 4),
(179, 'Safety Harness', 'SAFETY PPE', 'PPE-HARNESS-001', 25.00, NULL, 5, 65.00, 'SET', 0, NULL, 1, 81.25, NULL, 4, 4),
(180, 'Ear Protection Plugs', 'SAFETY PPE', 'PPE-EAR-001', 300.00, NULL, 50, 0.45, 'PAIR', 0, 'BOX', 100, 0.56, 45.00, 4, 4),
(181, 'Dust Mask FFP2', 'SAFETY PPE', 'PPE-MASK-001', 500.00, NULL, 100, 0.55, 'PCS', 0, 'BOX', 50, 0.69, 27.50, 4, 4),
(182, 'Cutting Disc 115mm', 'TOOLS / CONSUMABLE', 'DISC-115-001', 200.00, NULL, 30, 1.20, 'PCS', 0, 'BOX', 25, 1.50, 30.00, 8, 9),
(183, 'Grinding Disc 115mm', 'TOOLS / CONSUMABLE', 'GRD-115-001', 150.00, NULL, 30, 1.50, 'PCS', 0, 'BOX', 25, 1.88, 37.50, 8, 9),
(184, 'Welding Electrode 3.2mm', 'WELDING', 'WELD-32-001', 100.00, NULL, 20, 4.80, 'KG', 1, NULL, 1, 6.00, NULL, NULL, 12),
(185, 'Silica Sandpaper 120 Grit', 'TOOLS / CONSUMABLE', 'SAND-120-001', 200.00, NULL, 40, 0.85, 'PCS', 0, 'BOX', 50, 1.06, 42.50, NULL, 12),
(186, 'PVC Electrical Tape', 'ELECTRICAL CONSUMABLE', 'TAPE-PVC-001', 150.00, NULL, 30, 1.20, 'ROLL', 0, 'BOX', 20, 1.50, 24.00, NULL, 12);

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
(3, 'JANZOUR', 'JANZOUR WAREHOUSE', 'Janzour Center', 'Janzour Center', 15, '0942787698', '2026-06-12 06:27:59');

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
(256, 111, 1, 250.00),
(257, 111, 2, 150.00),
(258, 111, 3, 100.00),
(259, 112, 1, 125.00),
(260, 112, 2, 75.00),
(261, 112, 3, 50.00),
(262, 113, 1, 12.50),
(263, 113, 2, 7.50),
(264, 113, 3, 5.00),
(265, 114, 1, 1500.00),
(266, 114, 2, 900.00),
(267, 114, 3, 600.00),
(268, 115, 1, 1250.00),
(269, 115, 2, 750.00),
(270, 115, 3, 500.00),
(271, 116, 1, 20.00),
(272, 116, 2, 12.00),
(273, 116, 3, 8.00),
(274, 117, 1, 30.00),
(275, 117, 2, 18.00),
(276, 117, 3, 12.00),
(277, 118, 1, 25.00),
(278, 118, 2, 15.00),
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
(289, 122, 1, 400.00),
(290, 122, 2, 240.00),
(291, 122, 3, 160.00),
(292, 123, 1, 325.00),
(293, 123, 2, 195.00),
(294, 123, 3, 130.00),
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
(325, 134, 1, 40.00),
(326, 134, 2, 24.00),
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
(352, 143, 1, 250.00),
(353, 143, 2, 150.00),
(354, 143, 3, 100.00),
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
(367, 148, 1, 20.00),
(368, 148, 2, 12.00),
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
(388, 155, 1, 40.00),
(389, 155, 2, 24.00),
(390, 155, 3, 16.00),
(391, 156, 1, 20.00),
(392, 156, 2, 12.00),
(393, 156, 3, 8.00),
(394, 157, 1, 20.00),
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
(408, 161, 3, 30.00),
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
(426, 167, 3, 60.00),
(427, 168, 1, 125.00),
(428, 168, 2, 75.00),
(429, 168, 3, 50.00),
(430, 169, 1, 90.00),
(431, 169, 2, 54.00),
(432, 169, 3, 36.00),
(433, 170, 1, 50.00),
(434, 170, 2, 30.00),
(435, 170, 3, 20.00),
(436, 171, 1, 60.00),
(437, 171, 2, 36.00),
(438, 171, 3, 24.00),
(439, 172, 1, 50.00),
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
(474, 183, 3, 30.00),
(475, 184, 1, 50.00),
(476, 184, 2, 30.00),
(477, 184, 3, 20.00),
(478, 185, 1, 100.00),
(479, 185, 2, 60.00),
(480, 185, 3, 40.00),
(481, 186, 1, 75.00),
(482, 186, 2, 45.00),
(483, 186, 3, 30.00);

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
(297, 134, 1, 'OUT', 5.00, NULL, NULL, NULL, NULL, 35.00, 80.00, NULL, 'Warehouse Transfer #41', 1, '2026-09-02 08:32:56'),
(298, 134, 3, 'IN', 5.00, NULL, NULL, NULL, NULL, 21.00, 80.00, NULL, 'Warehouse Transfer #41', 1, '2026-09-02 08:32:56'),
(299, 134, 3, 'OUT', 5.00, NULL, NULL, NULL, NULL, 16.00, 80.00, NULL, 'Reversal of Transfer #41', 1, '2026-09-02 08:36:42'),
(300, 134, 1, 'IN', 5.00, NULL, NULL, NULL, NULL, 40.00, 80.00, NULL, 'Reversal of Transfer #41', 1, '2026-09-02 08:36:42');

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
(26, 168, 1, 45, 5.00, 'ACTIVE', '', '', 1, '2026-09-02 08:35:39', '2026-09-05');

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
(41, 134, 1, 3, 5.00, '', '', 1, '2026-09-02 08:32:56', '2026-09-02 10:36:42', 1, 42, 'REVERSED'),
(42, 134, 3, 1, 5.00, '', 'Reversal of Transfer #41', 1, '2026-09-02 08:36:42', NULL, NULL, NULL, 'COMPLETED');

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
(45, 'resource_requisitions.fulfill', 'User can Fulfill Resources Requestions for projects'),
(46, 'purchase_orders.approve', NULL),
(47, 'quotation.view', NULL),
(48, 'quotation.create', NULL);

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
(45, 5, 'Construction of XYZ Building', 'construction', 'Construction of XYZ Building including facilities', '2026-12-24', 'planning', 1750000.00, '2026-09-01 09:55:13', 0, 'South Tripoli', '2026-08-15', 14, 'CT-000119', 'ABC-001', 'medium');

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
  `cost_type` enum('materials','labor','transport','subcontract','misc') NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT 1.00,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `unit_price`) STORED,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(52, 'PO-260902155733', 4, NULL, NULL, NULL, 'WAREHOUSE', 'draft', '2026-09-02', '2026-09-09', 1250.00, 0.00, 0.00, 1250.00, 'Created from Resource Requisition REQ-260902145633', 1, NULL, NULL, NULL, '2026-09-02 13:57:33', 'OPEN');

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
(53, 52, 114, 500.00, 0.00, 2.50, 0.00, NULL, '2026-09-02 13:57:33');

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
(1, 'CON', 'Concrete', 'خرسانة', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(2, 'STL', 'Steel', 'حديد', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(3, 'MAS', 'Masonry', 'بناء', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(4, 'ELE', 'Electrical', 'كهرباء', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(5, 'PLB', 'Plumbing', 'سباكة', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(6, 'HVAC', 'HVAC', 'تكييف وتهوية', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(7, 'FIN', 'Finishes', 'تشطيبات نهائية', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(8, 'EQP', 'Equipment', 'ألات ثقيلة', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(9, 'TLS', 'Tools', 'ادوات ومعدات', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(10, 'LAB', 'Labor', 'عمالة', NULL, 'ACTIVE', '2026-07-12 05:40:56'),
(11, 'SRV', 'Services', 'خدمات', NULL, 'ACTIVE', '2026-07-12 05:40:56');

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

INSERT INTO `resource_requisitions` (`id`, `req_number`, `project_id`, `request_date`, `required_date`, `target_warehouse_id`, `delivery_method`, `priority`, `status`, `remarks`, `submitted_by`, `submitted_at`, `requested_by`, `approved_by`, `approved_at`, `approval_remarks`, `approval_notes`, `created_at`, `updated_at`) VALUES
(38, 'REQ-260902145633', 45, '2026-09-02', '2026-09-09', 1, 'WAREHOUSE', 'NORMAL', 'APPROVED', 'Test RR', 1, '2026-09-02 15:17:06', 1, 1, '2026-09-02 15:21:49', 'Test approval', NULL, '2026-09-02 12:56:33', '2026-09-02 20:09:52');

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
(45, 38, 'SUBMITTED', 1, NULL, '2026-09-02 15:17:06'),
(46, 38, 'APPROVED', 1, 'Test approval', '2026-09-02 15:21:49');

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
(36, 38, 'INVENTORY', NULL, 114, 'Concrete Block 20cm', 'PCS', 500.00, 0.00, 0.00, 0.00, 'Concrete blocks for project works', 'OPEN', '2026-09-02 12:57:55');

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
-- Indexes for table `supplier_payment_allocations`
--
ALTER TABLE `supplier_payment_allocations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_spa_payment` (`payment_id`),
  ADD KEY `idx_spa_grn` (`goods_receipt_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `goods_receipts`
--
ALTER TABLE `goods_receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `goods_receipt_items`
--
ALTER TABLE `goods_receipt_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `inventory_locations`
--
ALTER TABLE `inventory_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `inventory_location_stock`
--
ALTER TABLE `inventory_location_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- AUTO_INCREMENT for table `inventory_movements`
--
ALTER TABLE `inventory_movements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `inventory_reservations`
--
ALTER TABLE `inventory_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `inventory_transfers`
--
ALTER TABLE `inventory_transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `location_switch_log`
--
ALTER TABLE `location_switch_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `project_advances`
--
ALTER TABLE `project_advances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `project_costs`
--
ALTER TABLE `project_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `resource_requisition_approvals`
--
ALTER TABLE `resource_requisition_approvals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `resource_requisition_fulfillment_items`
--
ALTER TABLE `resource_requisition_fulfillment_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `resource_requisition_items`
--
ALTER TABLE `resource_requisition_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
-- AUTO_INCREMENT for table `supplier_quotations`
--
ALTER TABLE `supplier_quotations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier_quotation_items`
--
ALTER TABLE `supplier_quotation_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `fk_po_target_warehouse` FOREIGN KEY (`target_warehouse_id`) REFERENCES `inventory_locations` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
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
  ADD CONSTRAINT `fk_rr_target_warehouse` FOREIGN KEY (`target_warehouse_id`) REFERENCES `inventory_locations` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
-- Constraints for table `supplier_payment_allocations`
--
ALTER TABLE `supplier_payment_allocations`
  ADD CONSTRAINT `fk_spa_grn` FOREIGN KEY (`goods_receipt_id`) REFERENCES `goods_receipts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_spa_payment` FOREIGN KEY (`payment_id`) REFERENCES `supplier_payments` (`id`) ON DELETE CASCADE;

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
