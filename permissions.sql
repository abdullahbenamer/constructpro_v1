-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2026 at 10:32 AM
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
-- Database: `constructpro_v2`
--

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
(47, 'quotation.view', 'view quotations'),
(48, 'quotation.create', 'create quotations'),
(49, 'inventory.adjustment.view', 'view inventory adjustments'),
(50, 'inventory.adjustment.create', 'create inventory adjustments');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_name` (`name`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
