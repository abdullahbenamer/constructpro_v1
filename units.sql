-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2026 at 10:30 AM
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
(1, 'PCS', 'Pieces', 'قطعة', 'Used for individual pieces or units.', 'ACTIVE', '2026-07-12 05:15:58'),
(2, 'BOX', 'Box', 'صندوق', 'Used for goods supplied or measured by box.', 'ACTIVE', '2026-07-12 05:15:58'),
(3, 'BAG', 'Bag', 'كيس', 'Used for goods supplied or measured by bag.', 'ACTIVE', '2026-07-12 05:15:58'),
(4, 'ROL', 'Roll', 'لفة', 'Used for goods supplied or measured by roll.', 'ACTIVE', '2026-07-12 05:15:58'),
(5, 'SET', 'Set', 'طقم', 'Used for goods supplied or measured as a set.', 'ACTIVE', '2026-07-12 05:15:58'),
(6, 'PAR', 'Pair', 'زوج', 'Used for goods supplied or measured as a pair.', 'ACTIVE', '2026-07-12 05:15:58'),
(7, 'KG', 'Kilogram', 'كيلوجرام', 'Unit of mass equal to one thousand grams.', 'ACTIVE', '2026-07-12 05:15:58'),
(8, 'GRM', 'Gram', 'جرام', 'Unit of mass equal to one thousandth of a kilogram.', 'ACTIVE', '2026-07-12 05:15:58'),
(9, 'TON', 'Ton', 'طن', 'Unit of mass used for large quantities of materials.', 'ACTIVE', '2026-07-12 05:15:58'),
(10, 'MTR', 'Meter', 'متر', 'Unit of length equal to one meter.', 'ACTIVE', '2026-07-12 05:15:58'),
(11, 'CM', 'Centimeter', 'سنتمتر', 'سنتيميتر طولي', 'ACTIVE', '2026-07-12 05:15:58'),
(12, 'MM', 'Millimeter', 'مليمتر', 'Unit of length equal to one thousandth of a meter.', 'ACTIVE', '2026-07-12 05:15:58'),
(13, 'KM', 'Kilometer', 'كيلومتر', 'Unit of length equal to one thousand meters.', 'ACTIVE', '2026-07-12 05:15:58'),
(14, 'M2', 'Square Meter', 'متر مربع', 'Unit of area equal to one square meter.', 'ACTIVE', '2026-07-12 05:15:58'),
(15, 'M3', 'Cubic Meter', 'متر مكعب', 'Unit of volume equal to one cubic meter.', 'ACTIVE', '2026-07-12 05:15:58'),
(16, 'LTR', 'Liter', 'لتر', 'Unit of volume equal to one liter.', 'ACTIVE', '2026-07-12 05:15:58'),
(17, 'DAY', 'Day', 'اجر يومي', 'Used for daily labor, equipment, or service costs.', 'ACTIVE', '2026-07-12 05:15:58'),
(18, 'HR', 'Hour', 'ساعة', 'Used for hourly labor, equipment, or service costs.', 'ACTIVE', '2026-07-12 05:15:58'),
(19, 'WK', 'Week', 'اسبوعي', 'أجرة او مرتب اسبوعي ثابت', 'ACTIVE', '2026-07-12 05:15:58'),
(20, 'MTH', 'Month', 'شهري', 'مرتب شهري', 'ACTIVE', '2026-07-12 05:15:58'),
(21, 'LPS', 'Lump Sum', 'مبلغ مقطوع', 'التعاقد على مبلغ مقطوع من المال.', 'ACTIVE', '2026-09-11 18:16:23'),
(22, 'PNT', 'Point', 'نقطة', 'Electrical Distribution Point or any similar professional work.', 'ACTIVE', '2026-09-13 06:09:05'),
(25, 'TRIP', 'Trip', 'رحلة', 'Unit used for transportation trips.', 'ACTIVE', '2026-10-09 06:06:40'),
(26, 'JOB', 'Job', 'مهمة', 'Unit used for a completed job or work package.', 'ACTIVE', '2026-10-09 06:06:40'),
(27, 'SRVC', 'Service', 'خدمة', 'Unit used for professional or service-based costs.', 'ACTIVE', '2026-10-09 06:06:40'),
(28, 'ITM', 'Item', 'بند', 'Unit used for miscellaneous individual items.', 'ACTIVE', '2026-10-09 06:06:40'),
(29, 'FEE', 'Fee', 'رسوم', 'Unit used for fees and charges.', 'ACTIVE', '2026-10-09 06:06:40'),
(30, 'PLC', 'Policy', 'وثيقة', 'Unit used for insurance policies.', 'ACTIVE', '2026-10-09 06:06:40'),
(31, 'TRN', 'Transaction', 'معاملة', 'Unit used for transaction-based costs.', 'ACTIVE', '2026-10-09 06:06:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_code` (`unit_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
