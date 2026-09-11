-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2026 at 03:30 PM
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
(114, 'Concrete Block 20cm', 'MASONRY', 'BLK-20-001', 3275.00, NULL, 500, 3.25, 'PCS', 0, NULL, 1, 2.25, NULL, NULL, 12),
(115, 'Concrete Block 15cm', 'MASONRY', 'BLK-15-001', 2435.00, NULL, 500, 1.55, 'PCS', 0, NULL, 1, 1.94, NULL, NULL, 12),
(116, 'Fine Sand', 'AGGREGATE', 'SND-FINE-001', 40.00, NULL, 10, 75.00, 'M3', 1, NULL, 1, 93.75, NULL, NULL, 12),
(117, 'Coarse Aggregate 20mm', 'AGGREGATE', 'AGR-20-001', 60.00, NULL, 15, 85.00, 'M3', 1, NULL, 1, 106.25, NULL, NULL, 12),
(118, 'Construction Gravel', 'AGGREGATE', 'GRV-001', 50.00, NULL, 10, 80.00, 'M3', 1, NULL, 1, 100.00, NULL, NULL, 12),
(119, 'Red Brick', 'MASONRY', 'BRK-RED-001', 5000.00, NULL, 1000, 0.65, 'PCS', 0, NULL, 1, 0.81, NULL, NULL, 12),
(120, 'Plastering Cement', 'CONSTRUCTION MATERIAL', 'PLS-CEM-001', 300.00, NULL, 50, 11.50, 'BAG', 0, NULL, 1, 14.38, NULL, 36, 12),
(121, 'Gypsum Board 12.5mm', 'FINISHING', 'GYP-125-001', 400.00, NULL, 50, 18.00, 'PCS', 0, NULL, 1, 22.50, NULL, NULL, 12),
(122, 'Ceramic Floor Tile 60x60', 'FINISHING', 'TIL-6060-001', 700.00, NULL, 100, 25.80, 'M2', 1, NULL, 1, 8.13, NULL, NULL, 12),
(123, 'Ceramic Wall Tile 30x60', 'FINISHING', 'TIL-3060-001', 650.00, NULL, 100, 6.00, 'M2', 1, NULL, 1, 7.25, NULL, NULL, 12),
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
(143, 'Double Wall Socket 13A UK', 'ELECTRICAL ACCESSORY', 'WS-D13A-001', 490.00, NULL, 100, 3.40, 'PCS', 0, 'BOX', 10, 4.25, 34.00, 8, 9),
(144, 'LED Panel Light 600x600 40W', 'LIGHTING', 'LED-PNL-40-001', 100.00, NULL, 20, 28.00, 'PCS', 0, 'BOX', 1, 35.00, 28.00, 5, 9),
(145, 'MCB 1P 16A', 'ELECTRICAL PROTECTION', 'MCB-1P16-001', 150.00, NULL, 30, 8.50, 'PCS', 0, 'BOX', 12, 10.63, 102.00, 5, 9),
(146, 'MCB 3P 32A', 'ELECTRICAL PROTECTION', 'MCB-3P32-001', 80.00, NULL, 15, 24.00, 'PCS', 0, 'BOX', 6, 30.00, 144.00, 5, 9),
(147, 'Distribution Board 12-Way', 'ELECTRICAL PANEL', 'DB-12W-001', 25.00, NULL, 5, 95.00, 'PCS', 0, NULL, 1, 118.75, NULL, 5, 9),
(148, 'Contactor 25A', 'CONTROL GEAR', 'CNT-25A-001', 35.00, NULL, 10, 32.00, 'PCS', 0, 'BOX', 1, 40.00, 32.00, 1, 1),
(149, 'Terminal Block 6mm²', 'ELECTRICAL ACCESSORY', 'TB-6-001', 500.00, NULL, 100, 0.75, 'PCS', 0, 'BOX', 100, 0.94, 75.00, 21, 1),
(150, 'PVC Pipe 20mm', 'PLUMBING', 'PVC-20-001', 800.00, NULL, 100, 2.40, 'M', 1, NULL, 1, 3.00, NULL, NULL, 12),
(151, 'PVC Pipe 32mm', 'PLUMBING', 'PVC-32-001', 600.00, NULL, 100, 3.80, 'M', 1, NULL, 1, 4.75, NULL, NULL, 12),
(152, 'PVC Pipe 50mm', 'PLUMBING', 'PVC-50-001', 450.00, NULL, 80, 5.90, 'M', 1, NULL, 1, 7.38, NULL, NULL, 12),
(153, 'PPR Pipe 25mm', 'PLUMBING', 'PPR-25-001', 400.00, NULL, 80, 4.80, 'M', 1, NULL, 1, 6.00, NULL, NULL, 12),
(154, 'PVC Elbow 90° 25mm', 'PLUMBING FITTING', 'ELB-25-90-001', 300.00, NULL, 50, 1.20, 'PCS', 0, 'BOX', 20, 1.50, 24.00, NULL, 12),
(155, 'Brass Ball Valve 1\"', 'PLUMBING VALVE', 'VAL-BV-1-001', 90.00, NULL, 15, 24.00, 'PCS', 0, NULL, 1, 22.50, NULL, NULL, 12),
(156, 'Bearing 6204', 'MECHANICAL', 'BRG-6204-001', 240.00, NULL, 10, 5.75, 'PCS', 0, 'BOX', 10, 15.00, 120.00, 6, 3),
(157, 'Bearing 6205', 'MECHANICAL', 'BRG-6205-001', 41.00, NULL, 10, 14.50, 'PCS', 0, 'BOX', 10, 18.13, 145.00, 6, 3),
(158, 'V-Belt A-42', 'MECHANICAL', 'VBT-A42-001', 25.00, NULL, 5, 9.50, 'PCS', 0, NULL, 1, 11.88, NULL, NULL, 12),
(159, 'Hydraulic Hose 1/2\"', 'HYDRAULIC', 'HYD-HS-12-001', 250.00, NULL, 50, 8.50, 'M', 1, NULL, 1, 10.63, NULL, NULL, 12),
(160, 'Hydraulic Oil ISO 46', 'LUBRICANT', 'OIL-ISO46-001', 200.00, NULL, 50, 4.80, 'LTR', 1, NULL, 1, 6.00, NULL, 7, 12),
(161, 'Engine Oil 15W40', 'LUBRICANT', 'OIL-15W40-001', 150.00, NULL, 30, 5.50, 'LTR', 1, NULL, 1, 6.88, NULL, 34, 12),
(162, 'Grease EP2', 'LUBRICANT', 'GRS-EP2-001', 80.00, NULL, 20, 7.25, 'KG', 1, NULL, 1, 9.06, NULL, 34, 12),
(163, 'Hex Bolt M8x40', 'FASTENERS', 'BLT-M8-40-001', 1000.00, NULL, 200, 0.18, 'PCS', 0, 'BOX', 100, 0.23, 18.00, NULL, 12),
(164, 'Hex Bolt M10x50', 'FASTENERS', 'BLT-M10-50-001', 1000.00, NULL, 200, 0.28, 'PCS', 0, 'BOX', 100, 0.35, 28.00, NULL, 12),
(165, 'Hex Nut M10', 'FASTENERS', 'NUT-M10-001', 1200.00, NULL, 200, 0.12, 'PCS', 0, 'BOX', 100, 0.15, 12.00, NULL, 12),
(166, 'Washer M10', 'FASTENERS', 'WSR-M10-001', 1500.00, NULL, 300, 0.06, 'PCS', 0, 'BOX', 100, 0.08, 6.00, NULL, 12),
(167, 'Anchor Bolt M16', 'FASTENERS', 'ANC-M16-001', 310.00, NULL, 50, 3.00, 'PCS', 0, 'BOX', 25, 3.50, 70.00, NULL, 12),
(168, 'Acrylic Wall Paint White', 'PAINT', 'PNT-WHT-001', 250.00, NULL, 50, 18.00, 'LTR', 1, NULL, 1, 22.50, NULL, NULL, 12),
(169, 'Exterior Paint White', 'PAINT', 'PNT-EXT-WHT-001', 180.00, NULL, 30, 21.00, 'LTR', 1, NULL, 1, 26.25, NULL, NULL, 12),
(170, 'Epoxy Primer', 'COATING', 'EPX-PRM-001', 100.00, NULL, 20, 24.00, 'LTR', 1, NULL, 1, 30.00, NULL, NULL, 12),
(171, 'Silicone Sealant', 'CHEMICAL', 'SIL-001', 126.00, NULL, 20, 3.80, 'PCS', 0, 'BOX', 24, 4.75, 91.20, NULL, 12),
(172, 'Construction Adhesive', 'CHEMICAL', 'ADH-001', 83.00, NULL, 20, 6.50, 'PCS', 0, 'BOX', 12, 8.13, 78.00, NULL, 12),
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

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_brand_fk` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_country_fk` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_locations_fk` FOREIGN KEY (`location_id`) REFERENCES `inventory_locations` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
