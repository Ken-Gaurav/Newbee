-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 06:33 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `adhesive`
--

CREATE TABLE `adhesive` (
  `adhesive_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `adhesive_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adhesive_min_qty` int(11) NOT NULL,
  `make_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adhesive`
--

INSERT INTO `adhesive` (`adhesive_id`, `price`, `adhesive_unit`, `adhesive_min_qty`, `make_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '23.00', 'test', 1, 1, 1, '2017-09-19 18:30:00', '2017-12-18 02:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `adhesive_solvent`
--

CREATE TABLE `adhesive_solvent` (
  `adhesive_solvent_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `adhesive_solvent_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adhesive_solvent_min_qty` int(11) NOT NULL,
  `make_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adhesive_solvent`
--

INSERT INTO `adhesive_solvent` (`adhesive_solvent_id`, `price`, `adhesive_solvent_unit`, `adhesive_solvent_min_qty`, `make_id`, `status`, `created_at`, `updated_at`) VALUES
(2, '2.00', 'we', 123, 2, 1, '2017-09-20 01:25:30', '2017-12-15 22:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `admin_gress_details`
--

CREATE TABLE `admin_gress_details` (
  `admin_gress_details_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `gst_for_invoice` int(11) NOT NULL,
  `company_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_signature` text COLLATE utf8_unicode_ci NOT NULL,
  `term_and_conditions` text COLLATE utf8_unicode_ci NOT NULL,
  `valve_price` double(8,2) NOT NULL,
  `color_plate_price` double(8,2) NOT NULL,
  `gress_for_cylinder` double(8,2) NOT NULL,
  `stockorder_quantity_for_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stockorder_price_display` tinyint(4) NOT NULL,
  `multiquotation_price_display` tinyint(4) NOT NULL,
  `allow_currency_selection` tinyint(4) NOT NULL,
  `send_email_with_gress` tinyint(4) NOT NULL,
  `order_limit` int(11) NOT NULL,
  `primary_currency` int(11) NOT NULL,
  `secondary_currency` int(11) NOT NULL,
  `product_currency_rate` double(8,2) NOT NULL,
  `cylinder_currency_rate` double(8,2) NOT NULL,
  `tool_currency_rate` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_gress_percentage`
--

CREATE TABLE `admin_gress_percentage` (
  `admin_gress_percentage_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_gress_details_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `by_factory` double(8,2) NOT NULL,
  `by_air` double(8,2) NOT NULL,
  `by_sea` double(8,2) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `parent_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`admin_id`, `parent_id`, `title`, `route`, `icon`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, '0', 'Dashboard', 'dashboard', 'fa fa-home', 1, 0, '2017-11-28 01:31:37', '2017-12-01 22:38:08'),
(2, '0', 'Settings', '', 'fa fa-cog', 1, 0, '2017-11-28 01:33:05', '2017-11-28 01:33:05'),
(3, '0', 'Product', '', 'fa fa-tencent-weibo', 1, 0, '2017-11-28 01:38:37', '2017-11-29 06:13:54'),
(4, '3', 'Product', '', 'fa fa-pied-piper', 1, 0, '2017-11-28 01:40:45', '2017-11-28 01:40:45'),
(5, '4', 'Product Add', 'product', 'fa fa-caret-right', 1, 0, '2017-11-28 01:42:12', '2017-11-28 01:42:12'),
(7, '3', 'Ink Master', 'Ink_master', 'fa fa-paint-brush', 0, 0, '2017-11-28 02:45:52', '2017-11-28 02:45:52'),
(8, '56', 'Mailer Bag Color', 'mailerbage', 'fa fa-caret-right', 1, 0, '2017-11-28 02:46:38', '2017-11-28 02:46:38'),
(9, '7', 'Ink Solvent', 'Ink_solvent', 'fa fa-caret-right', 1, 0, '2017-11-28 02:48:05', '2017-11-28 02:48:05'),
(10, '4', 'Printing Effect', 'Printing_effect', 'fa fa-caret-right', 1, 0, '2017-11-28 02:49:00', '2017-11-28 02:49:00'),
(11, '7', 'Custom Multiplier', 'Custom_ink_mul', 'fa fa-caret-right', 1, 0, '2017-11-28 02:50:18', '2017-11-28 02:50:18'),
(12, '56', 'Pouch Style', 'pouchstyle', 'fa fa-caret-right', 1, 0, '2017-11-28 02:51:17', '2017-11-28 02:51:17'),
(13, '3', 'Cylinder', '', 'fa fa-database', 0, 0, '2017-11-28 02:51:49', '2017-11-28 02:51:49'),
(14, '13', 'Cylinder Vendor Price', 'cylinder', 'fa fa-caret-right', 1, 0, '2017-11-28 02:53:53', '2017-11-28 02:53:53'),
(15, '56', 'Color Category', 'colorcategory', 'fa fa-caret-right', 1, 0, '2017-11-28 02:55:07', '2017-11-28 02:55:07'),
(16, '4', 'Product Layer', 'productlayer', 'fa fa-caret-right', 1, 0, '2017-11-28 02:56:12', '2017-11-28 02:56:12'),
(17, '13', 'Cylinder Base', 'cylinder_base', 'fa fa-caret-right', 1, 0, '2017-11-28 02:56:43', '2017-11-28 02:56:43'),
(18, '3', 'Product Material', 'product_material', 'fa fa-caret-right', 1, 0, '2017-11-28 02:57:21', '2017-11-28 02:57:21'),
(19, '57', 'Zipper Price', 'zipperprice', 'fa fa-caret-right', 1, 0, '2017-11-28 02:58:22', '2017-11-28 02:58:22'),
(20, '56', 'Spout', 'spout', 'fa fa-caret-right', 1, 0, '2017-11-28 02:58:58', '2017-11-28 02:58:58'),
(21, '13', 'Cylinder Currency', 'cylinder_currency', 'fa fa-caret-right', 1, 0, '2017-11-28 02:58:59', '2017-11-28 02:58:59'),
(22, '3', 'Adhesive', 'adhesive', 'fa fa-magic', 0, 0, '2017-11-28 03:00:18', '2017-11-28 03:00:18'),
(23, '56', 'Accesories', 'accessorie_price', 'fa fa-caret-right', 1, 0, '2017-11-28 03:00:19', '2017-11-28 03:00:19'),
(24, '22', 'Adhesive Solvent', 'adhesive_solvent', 'fa fa-caret-right', 1, 0, '2017-11-28 03:01:09', '2017-11-28 03:01:09'),
(25, '57', 'Profit Pricing', 'profit_pricing', 'fa fa-caret-right', 1, 0, '2017-11-28 03:01:26', '2017-11-28 03:01:26'),
(26, '22', 'CPP Adhesive', 'cpp_adhesive', 'fa fa-caret-right', 1, 0, '2017-11-28 03:01:56', '2017-11-28 03:01:56'),
(27, '57', 'Packing Pricing', 'packing_pricing', 'fa fa-caret-right', 1, 0, '2017-11-28 03:02:50', '2017-11-28 03:02:50'),
(28, '3', 'Size Master', 'size_master', 'fa fa-google-wallet', 0, 0, '2017-11-28 03:03:03', '2017-11-28 03:03:03'),
(29, '57', 'Tool Pricing', 'tool_pricing', 'fa fa-caret-right', 1, 0, '2017-11-28 03:04:23', '2017-11-28 03:04:23'),
(30, '3', 'Roll Profit Pricing', 'roll_profit_pricing', 'fa fa-money', 0, 0, '2017-11-28 03:05:50', '2017-11-28 03:05:50'),
(31, '30', 'Roll Packing Pricing', 'roll_packing', 'fa fa-caret-right', 1, 0, '2017-11-28 03:06:46', '2017-11-28 03:06:46'),
(32, '57', 'Stock Profit By Air', 'stock_profit_air', 'fa fa-caret-right', 1, 0, '2017-11-28 03:09:48', '2017-11-28 03:09:48'),
(33, '30', 'Roll Transport Pricing', 'roll_transport', 'fa fa-caret-right', 1, 0, '2017-11-28 03:10:09', '2017-11-28 03:10:09'),
(34, '57', 'Stock Profit By Sea', 'stock_profit_sea', 'fa fa-caret-right', 1, 0, '2017-11-28 03:10:20', '2017-11-28 03:10:20'),
(35, '0', 'Templates', '', 'fa fa-money', 0, 0, '2017-11-28 03:10:23', '2017-11-29 06:13:59'),
(36, '30', 'Roll Wastage', 'roll_wastage', 'fa fa-caret-right', 1, 0, '2017-11-28 03:10:56', '2017-11-28 03:10:56'),
(37, '57', 'Stock Profit By Pickup', 'stock_profit_pickup', 'fa fa-caret-right', 1, 0, '2017-11-28 03:11:19', '2017-11-28 03:11:19'),
(38, '35', 'Template Quantity', 'Template_Quantity', 'fa fa-caret-right', 1, 0, '2017-11-28 03:11:35', '2017-11-28 03:11:35'),
(39, '3', 'View Size Table', 'view_size', 'fa fa-arrows-alt', 0, 0, '2017-11-28 03:12:03', '2017-11-28 03:12:03'),
(40, '0', 'Production', '', 'fa fa-rub', 1, 0, '2017-11-28 03:12:33', '2017-11-30 02:46:49'),
(41, '35', 'Template Volume', 'Template_Volume', 'fa fa-caret-right', 1, 0, '2017-11-28 03:13:04', '2017-11-28 03:13:04'),
(42, '3', 'Product Code', 'product_code', 'fa fa-magic', 0, 0, '2017-11-28 03:13:05', '2017-11-28 03:13:05'),
(43, '4', 'Product Measurement', 'Template_Measurement', 'fa fa-caret-right', 1, 0, '2017-11-28 03:13:38', '2017-11-28 03:13:38'),
(44, '3', 'Spout Pouch Size Master', 'spout_pouch', 'fa fa-beer', 0, 0, '2017-11-28 03:14:06', '2017-11-28 03:14:06'),
(45, '40', 'Master', '', 'fa fa-bars', 1, 0, '2017-11-28 03:14:11', '2017-11-28 03:14:11'),
(46, '57', 'Transport Pricing By Sea', 'transport_sea', 'fa fa-caret-right', 1, 0, '2017-11-28 03:14:46', '2017-11-28 03:14:46'),
(47, '45', 'Unit', 'Unit', 'fa fa-caret-right', 1, 0, '2017-11-28 03:16:01', '2017-11-28 03:16:01'),
(48, '45', 'Production Process', 'Production_process', 'fa fa-caret-right', 1, 0, '2017-11-28 03:16:33', '2017-11-28 03:16:33'),
(49, '56', 'Storezo Details', 'storezo_details', 'fa fa-caret-right', 1, 0, '2017-11-28 03:16:34', '2017-11-28 03:16:34'),
(50, '45', 'Product Category', 'Product_category', 'fa fa-caret-right', 1, 0, '2017-11-28 03:17:17', '2017-11-28 03:17:17'),
(51, '45', 'Machine', 'Machine_Master', 'fa fa-caret-right', 1, 0, '2017-11-28 03:17:44', '2017-11-28 03:17:44'),
(52, '45', 'Raw Material', 'Product_item_info', 'fa fa-caret-right', 1, 0, '2017-11-28 03:19:39', '2017-11-28 03:19:39'),
(53, '57', 'Stock Wastage', 'stock_wastage', 'fa fa-caret-right', 1, 0, '2017-11-28 03:20:15', '2017-11-28 03:20:15'),
(54, '59', 'Inward', 'Product_Inward', 'fa fa-caret-right', 1, 0, '2017-11-28 03:20:34', '2017-11-28 03:20:34'),
(55, '60', 'Job Master', 'job', 'fa fa-caret-right', 1, 0, '2017-11-28 03:21:16', '2017-11-28 03:21:16'),
(56, '3', 'Pouch', '', 'fa fa-database', 0, 0, '2017-11-28 03:26:32', '2017-11-28 03:26:32'),
(57, '3', 'Product Price', '', 'fa fa-database', 0, 0, '2017-11-28 03:27:14', '2017-11-28 03:27:14'),
(58, '56', 'Pouch Color', 'pouch_color', 'fa fa-caret-right', 1, 0, '2017-11-28 03:38:49', '2017-11-28 03:38:49'),
(59, '40', 'Inventory', '', 'fa fa-beer', 1, 0, '2017-11-28 03:40:33', '2017-11-28 03:40:33'),
(60, '40', 'Process', '', 'fa fa-database', 1, 0, '2017-11-28 03:40:59', '2017-11-28 03:40:59'),
(61, '56', 'Pouch Volume', 'productpouch', 'fa fa-caret-right', 1, 0, '2017-11-28 03:43:26', '2017-11-28 03:43:26'),
(62, '40', 'Report', '', 'fa fa-book', 1, 0, '2017-11-28 03:45:54', '2017-11-28 03:45:54'),
(63, '4', 'Product Make', 'product_make', 'fa fa-caret-right', 1, 0, '2017-11-28 03:50:13', '2017-11-28 03:50:13'),
(64, '2', 'Currency', 'currency', 'fa fa-inr', 1, 0, '2017-11-28 05:11:19', '2017-11-28 05:11:19'),
(65, '2', 'Country', 'country', 'fa fa-map-marker', 1, 0, '2017-11-28 05:11:45', '2017-11-28 05:11:45'),
(66, '3', 'Quantity Master', '', 'fa fa-sort-amount-asc', 0, 0, '2017-11-29 00:53:40', '2017-11-29 00:53:40'),
(67, '4', 'Product Quantity', 'product_quantity', 'fa fa-caret-right', 1, 0, '2017-11-29 01:00:35', '2017-11-29 01:00:35'),
(68, '66', 'Roll Quantity', 'roll_quantity', 'fa fa-caret-right', 1, 0, '2017-11-29 01:01:56', '2017-11-29 01:01:56'),
(69, '2', 'Bank Detail', 'bank_detail', 'fa fa-university', 1, 0, '2017-11-29 23:04:20', '2017-11-29 23:04:20'),
(70, '2', 'Taxation', 'taxation', 'fa fa-archive', 1, 0, '2017-12-01 00:18:55', '2017-12-01 00:18:55'),
(71, '2', 'Courier', 'courier', ' fa fa-truck', 1, 0, '2017-12-07 22:42:30', '2017-12-07 22:42:30'),
(72, '0', 'Usersss', '', 'fa fa-user', 0, 0, '2017-12-25 23:04:14', '2017-12-25 23:04:14'),
(73, '72', 'International', 'International', 'fa fa-users', 1, 0, '2017-12-25 23:05:29', '2017-12-25 23:05:29'),
(74, '0', 'Users', '', 'fa fa-magic', 1, 0, '2018-02-23 22:12:46', '2018-02-23 22:12:46'),
(75, '74', 'International Users', 'menu_permission', 'fa fa-caret-right', 1, 0, '2018-02-23 22:13:19', '2018-02-23 22:13:19'),
(76, '74', 'User Types', 'user_types', 'fa fa-caret-right', 1, 0, '2018-03-15 00:27:35', '2018-03-15 00:27:35'),
(77, '0', 'CRM', '', 'fa fa-child', 1, 0, '2018-04-29 23:11:34', '2018-04-29 23:11:34'),
(78, '77', 'Lead Source', 'lead_source', 'fa fa-caret-right', 1, 0, '2018-04-29 23:19:18', '2018-04-29 23:19:18'),
(79, '77', 'Industry', 'lead_industry', 'fa fa-caret-right', 1, 0, '2018-04-29 23:20:14', '2018-04-29 23:20:14'),
(80, '77', 'Contacts', 'contacts', 'fa fa-caret-right', 1, 0, '2018-04-29 23:20:40', '2018-04-29 23:20:40'),
(81, '0', 'MultiQuotation', '', 'fa fa-ioxhost', 1, 0, '2018-05-20 22:41:10', '2018-05-20 22:41:10'),
(82, '4', 'Product Volume', 'product_volume', 'fa fa-caret-right', 1, 0, '2018-05-21 05:27:19', '2018-05-21 05:27:19'),
(83, '3', 'Quotation Pricing', '', 'fa fa-caret-right', 1, 0, '2018-05-29 00:40:09', '2018-05-29 00:40:09'),
(84, '83', 'Zipper', '', 'fa fa-caret-right', 1, 0, '2018-05-29 00:41:22', '2018-05-29 00:41:22'),
(85, '83', 'Spout', '', 'fa fa-caret-right', 1, 0, '2018-05-29 00:42:17', '2018-05-29 00:42:17'),
(86, '83', 'Accessories', '', 'fa fa-caret-right', 1, 0, '2018-05-29 00:42:25', '2018-05-29 00:42:25'),
(87, '83', 'Handle', '', 'fa fa-caret-right', 1, 0, '2018-05-29 00:42:33', '2018-05-29 00:42:33'),
(88, '83', 'Valve', '', 'fa fa-caret-right', 1, 0, '2018-05-29 00:43:59', '2018-05-29 00:43:59'),
(89, '83', 'Tin TIe', '', 'fa fa-caret-right', 1, 0, '2018-05-29 00:44:06', '2018-05-29 00:44:06'),
(90, '83', 'Laser Scoring', '', 'fa fa-caret-right', 1, 0, '2018-05-29 22:32:54', '2018-05-29 22:32:54'),
(91, '84', 'Zipper Types', 'zipper', '', 1, 0, '2018-05-29 22:35:01', '2018-05-29 22:35:01'),
(92, '84', 'Zipper Price', 'zipper_price', '', 1, 0, '2018-05-29 22:35:20', '2018-05-29 22:35:20'),
(93, '85', 'Spout Types', 'spout', '', 1, 0, '2018-05-29 22:35:50', '2018-05-29 22:35:50'),
(94, '85', 'Spout Price', 'spout_price', '', 1, 0, '2018-05-29 22:36:15', '2018-05-29 22:36:15'),
(95, '86', 'Accessories Types', 'accessories', '', 1, 0, '2018-05-29 22:37:51', '2018-05-29 22:37:51'),
(96, '86', 'Accessories Price', 'accessories_price', '', 1, 0, '2018-05-29 22:38:27', '2018-05-29 22:38:27'),
(97, '87', 'Handle Types', 'handle', '', 1, 0, '2018-05-29 22:38:53', '2018-05-29 22:38:53'),
(98, '87', 'Handle Price', 'handle_price', '', 1, 0, '2018-05-29 22:45:10', '2018-05-29 22:45:10'),
(99, '88', 'Valve Types', 'valve', '', 1, 0, '2018-05-29 22:49:53', '2018-05-29 22:49:53'),
(100, '88', 'Valve Price', 'valve_price', '', 1, 0, '2018-05-29 22:50:15', '2018-05-29 22:50:15'),
(101, '89', 'Tin Tie Types', 'tintie', '', 1, 0, '2018-05-29 22:52:31', '2018-05-29 22:52:31'),
(102, '89', 'Tin Tie Price', 'tintie_price', '', 1, 0, '2018-05-29 22:52:52', '2018-05-29 22:52:52'),
(103, '90', 'Laser Scoring Type', 'scoring', '', 1, 0, '2018-05-29 22:55:03', '2018-05-29 22:55:03'),
(104, '90', 'Laser Scoring Price', 'scoring_price', '', 1, 0, '2018-05-29 22:55:37', '2018-05-29 22:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `associated_accounts`
--

CREATE TABLE `associated_accounts` (
  `associated_accounts_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `employee_detail_id` int(11) NOT NULL,
  `associated_users` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `associated_accounts`
--

INSERT INTO `associated_accounts` (`associated_accounts_id`, `user_id`, `employee_detail_id`, `associated_users`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '1,2', 0, '2018-04-26 02:39:10', '2018-04-26 05:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `bank_detail`
--

CREATE TABLE `bank_detail` (
  `bank_detail_id` int(10) UNSIGNED NOT NULL,
  `bank_accnt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `benefry_add` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accnt_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `benefry_bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `benefry_bank_add` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `swift_cd_hsbc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `micr_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intery_bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hsbc_accnt_intery_bank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `swift_cd_intery_bank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intery_aba_rout_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `curr_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clabe` text COLLATE utf8_unicode_ci NOT NULL,
  `bsb` text COLLATE utf8_unicode_ci NOT NULL,
  `swift_code` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `color_category`
--

CREATE TABLE `color_category` (
  `color_category_id` int(10) UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `color_category`
--

INSERT INTO `color_category` (`color_category_id`, `color_name`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'CLEAR/PRINT', 1, 0, '2017-12-05 01:09:47', '2017-12-05 01:09:47'),
(2, 'PRINT- PRINT / CLEAR-PRINT', 1, 0, '2017-12-05 01:10:08', '2017-12-05 01:10:08'),
(3, 'CLEAR/CLEAR', 1, 0, '2017-12-05 01:10:24', '2017-12-05 01:10:24'),
(4, 'BROWN KRAFT PAPER / WHITE PAPER', 1, 0, '2017-12-05 01:10:54', '2017-12-05 01:10:54'),
(5, 'BLACK PAPER/GREEN PAPER', 1, 0, '2017-12-05 01:11:07', '2017-12-05 01:12:57'),
(6, 'BIODEGRADABLE', 1, 0, '2017-12-05 01:11:14', '2017-12-05 01:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vat_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gst_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `Consignee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `user_parent_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `customer_name`, `customer_email`, `vat_no`, `gst_no`, `contact_number`, `Consignee`, `delivery_address`, `city`, `state`, `country`, `user_id`, `user_type_id`, `user_parent_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'The Barak Tea Company Ltd.', 'dilkhoosh@gmail.com', '', '19AABCT0181HIZF', 9435175088, 'Shop 2, 2-4 Gymea Bay Rd <br> Sydney, NSW, 2227 <br> Australia <br> T: 02 9525 7370', 'Shop 2, 2-4 Gymea Bay Rd <br> Sydney, NSW, 2227 <br> Australia <br> T: 02 9525 7370', '', 'Kolkata ', 155, 3, 2, 1, 1, NULL, '2018-04-30 18:30:00', '2018-05-09 23:11:29'),
(2, 'De Zamora Michoacan', 'dilkh222@gmail.com', '', '19AABCT0181HIZF', 9435175088, 'Jorullo 1725 Col Independencia Guadalajara, Jalisco', 'Jorullo 1725 Col Independencia Guadalajara, Jalisco', '', 'Kolkata ', 155, 3, 2, 1, 1, NULL, '2018-04-30 18:30:00', '2018-05-09 23:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_code` text COLLATE utf8_unicode_ci NOT NULL,
  `currency_id` int(11) NOT NULL,
  `default_courier_id` int(11) NOT NULL,
  `foreign_port` int(11) NOT NULL,
  `tax` decimal(15,3) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_code`, `currency_code`, `currency_id`, `default_courier_id`, `foreign_port`, `tax`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'AFG', 'AFN', 1, 3, 0, '10.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Algeria', 'DZD', 'DZD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'American samoa', '', 'USD1', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Andorra', '', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Angola', '', 'AOA', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Anguilla', '', 'XCD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Antarctica', '', 'XCD', 0, 2, 0, '0.000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Antigua and barbuda', 'ANB', 'XCD1', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Argentina', 'ARG', 'ARS', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Armenia', '', 'AMD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Aruba', '', 'AWG', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Australia', 'AUS', 'AUD', 0, 3, 36, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Austria', 'AUT', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Azerbaijan', '', 'AZN', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Bahamas', 'BHS', 'BSD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Bahrain', '', 'BHD', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Bangladesh', 'BGD', 'BDT', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Barbados', 'BRB ', 'BBD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Belarus', 'BLR', 'BYR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Belgium', 'BEL', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Belize', '', 'BZD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Benin', '', 'XOF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Bermuda', '', 'BMD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Bhutan', '', 'BTN', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Bhutan', 'BTN', 'BTN', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Bolivia, plurinational state of', '', 'BOB', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Bolivia, plurinational state of', '', 'BOB', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Bosnia and herzegovina', '', 'BAM', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Botswana', 'BWA', 'BWP', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Bouvet island', '', 'NOK', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Brazil', 'BRA', 'BRL', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'British indian ocean territory', 'USD', 'USD', 0, 2, 0, '0.000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Brunei', '11', 'BND', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Bulgaria', 'BGR', 'BGN', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Burkina faso', '', 'XOF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Burundi', 'BUR', 'BIF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Cambodia', 'KHM', 'KHR', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Cameroon', 'CMR', 'XAF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Canada', 'CAN', 'CAD', 0, 3, 36, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Cabo verde', '', 'CVE', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Cayman islands', '', 'KYD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'Central african republic', 'CAF', 'XAF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'Chad', 'TCD', 'XAF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'Chile', 'CHL', 'CLP', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'China', 'CHN', 'CNY', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'Christmas island', 'CXR', 'AUD', 0, 2, 0, '0.000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'Cocos (keeling) islands', 'COC', 'AUD', 0, 2, 0, '0.000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Colombia', 'COL', 'COP', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Comoros', 'COM', 'KMF', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'Congo', 'CNG', 'XAF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'Congo, democratic republic of the ', 'CDF', 'CDF', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'Cook islands', 'COK', 'NZD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'Costa rica', 'CRC', 'CRC', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'Croatia', 'HRK', 'HRK', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'Cuba', 'CUB', 'CUP', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'Cyprus', 'CYP', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'Czech republic', 'CZE', 'CZK', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'Denmark', 'DNK', 'DKK', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'Djibouti', 'DJF', 'DJF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'Dominica', 'DMA', 'XCD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'Dominican republic', 'DOM', 'DOP', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'Ecuador', 'ECS', 'ECS', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'Egypt', 'EGY', 'EGP', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'El salvador', 'SLV', 'SVC', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'Equatorial guinea', 'XAF', 'XAF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'Eritrea', 'ERI', 'ERN', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'Estonia', 'EST', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'Ethiopia', 'ETH', 'ETB', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'European union', 'ERU', 'EUR', 0, 0, 0, '0.000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'Falkland islands (malvinas)', 'FKP', 'FKP', 0, 0, 0, '0.000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'Faroe islands', 'DKK', 'DKK', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'Fiji', 'FJI', 'FJD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'Finland', 'FIN', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'France', 'FRA', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'French guiana', 'FPG', 'EUR', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'French polynesia', 'PYF', '', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'Gabon', 'GAB', 'XAF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'Gambia', 'GMB', 'GMD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'Georgia', 'GEO', 'GEL', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'Germany', 'DEU', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'Ghana', 'GHA', 'GHS', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'Gibraltar', 'GIB', 'GIP', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'Greece', 'GRC', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'Greenland', 'GRL', 'DKK', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'Grenada', 'GRD', 'XCD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'Guadeloupe', 'GUP', 'EUR', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'Guam', 'GUM', 'USD', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'Guatemala', 'GTM', 'QTQ', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'Guernsey', 'GGP', 'GGP', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'Guinea', 'GIN', 'GNF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'Guinea-bissau', 'GNB', 'GWP', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'Guyana', 'GUY', 'GYD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'Haiti', 'HTG', 'HTG', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'Heard island and mcdonald islands', 'HIM', 'AUD', 0, 0, 0, '0.000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'Honduras', 'HON', 'HNL', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'Hong kong', 'HKG', 'HKD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'Hungary', 'HUN', 'HUF', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'Iceland', 'IS', 'ISK', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'India', 'IND', 'INR', 1, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'Indonesia', 'IDN', 'IDR', 0, 4, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'Iran, islamic republic of', 'IRN', 'IRR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'Iraq', 'IRQ', 'IQD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'Ireland', 'IRL', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'Isle of man', 'IMN', 'GBP', 0, 0, 0, '0.000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'Israel', 'ISR', 'ILS', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'Italy', 'ITA', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'Jamaica', 'JAM', 'JMD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'Japan', 'JPN', 'JPY', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'Jersey', 'JEY', 'GBP', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'Jordan', 'JOR', 'JOD', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'Kazakhstan', 'KAZ', 'KZT', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'Kenya', 'KEN', 'KES', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'Kiribati', 'KIB', 'AUD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'Korea, democratic people  s republic of', 'KPS', 'KPW', 0, 0, 0, '0.000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'Korea, republic of', 'KPW', 'KRW', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'Kuwait', 'KWT', 'KWD', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'Kyrgyzstan', 'KRY', 'KGS', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'Lao people  s democratic republic', 'LOS', 'LAK', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'Latvia', 'LVA', 'LVL', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'Lebanon', 'LBN', 'LBP', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'Lesotho', 'LES', 'LSL', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'Liberia', 'LBR', 'LRD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'Libya', 'LBY', 'LYD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'Liechtenstein', 'LIE', 'CHF', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'Lithuania', 'LTY', 'LTL', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'Luxembourg', 'LUX', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'Macao', 'MAC', 'MOP', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'Macedonia, the former yugoslav republic of', 'MCD', 'MKD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'Madagascar', 'MGF', 'MGF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'Malawi', 'MAL', 'MWK', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'Malaysia', 'MYS', 'MYR', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'Maldives', 'MDV', 'MVR', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'Mali', 'MLI', 'XOF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'Malta', 'MLT', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'Marshall islands', 'MAR', 'USD', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'Martinique', 'MAT', 'EUR', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'Mauritania', 'MRT', 'MRO', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'Mauritius', 'MUS', 'MUR', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'Mayotte', 'MOT', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'Mexico', 'MEX', 'MXN', 0, 3, 36, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'Micronesia, federated states of', 'FSM', 'USD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'Moldova, republic of', 'MDA', 'MDL', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'Monaco', 'MCO', 'EUR', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'Mongolia', 'MGN', 'MNT', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'Montenegro', 'MNE', 'EUR', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'Montserrat', 'MTT', 'XCD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'Morocco', 'MAR', 'MAD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'Mozambique', 'MZN', 'MZN', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'Myanmar', 'MYM', 'MMK', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'Namibia', 'NAM', 'NAD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'Nauru', 'NRU', 'AUD', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'Nepal', 'NPL', 'NPR', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'Netherlands', 'NDL', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'New caledonia', 'NCL', 'XPF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'New zealand', 'NZL', 'NZD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 'Nicaragua', 'NIC', 'NIO', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'Niger', 'NGR', 'XOF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'Nigeria', 'NGA', 'NGN', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'Niue', 'NUE', 'NZD', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'Norfolk island', 'NFI', 'AUD', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'Northern mariana islands', 'NMI', 'USD', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'Norway', 'NOR', 'NOK', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'Oman', 'OMN', 'NOK', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'Pakistan', 'PAK', 'PKR', 0, 2, 0, '0.000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'Palau', 'PLU', 'USD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'Panama', 'PAN', 'PAB', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'Papua new guinea', 'PGN', 'PGK', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 'Paraguay', 'PRY', 'PYG', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'Peru', 'PER', 'PEN', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 'Philippines', 'PHL', 'PHP', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'Pitcairn', 'PCN', 'NZD', 0, 0, 0, '0.000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'Poland', 'POL', 'PLN', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'Portugal', 'PRT', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 'Puerto rico', 'PRI', 'USD', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'Qatar', 'QAT', 'QAR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'Reunion', 'REU', 'EUR', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'Romania', 'ROU', 'RON', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 'Russian federation', 'RUF', 'RUB', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 'Rwanda', 'RWD', 'RWF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 'Saint helena, ascension and  tristan da cunha', 'STH', 'SHP', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 'Saint kitts and nevis', 'STK', 'XCD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'Saint lucia', 'STL', 'XCD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 'Saint pierre and miquelon', 'STP', 'EUR', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'Saint vincent and the grenadines', 'STV', 'XCD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'Samoa', 'SMO', 'WST', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 'San marino', 'SMR', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'Sao tome and principe', 'STP', 'STD', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'Saudi arabia', 'SAU', 'SAR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 'Senegal', 'SEN', 'XOF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 'Serbia', 'SRB', 'RSD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 'Seychelles', 'SYC', 'SCR', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'Sierra leone', 'SIL', 'SLL', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'Singapore', 'SGP', 'SGD', 0, 3, 16, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 'Slovakia', 'SLK', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'Slovenia', 'SLN', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 'Solomon islands', 'SLB', 'SBD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 'Somalia', 'SOM', 'SOS', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 'South africa', 'ZAF', 'ZAR', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 'South georgia and the south sandwich islands', 'SGS', 'GBP', 0, 0, 0, '0.000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 'Sudan', 'SSU', 'SSP', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 'Spain', 'ESP', 'EUR', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 'Sri lanka', 'LKA', 'LKR', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 'Sudan', 'SDN', 'SDG', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 'Suriname', 'SUE', 'SRD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 'Svalbard and jan mayen', 'SJM', 'NOK', 0, 0, 0, '0.000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 'Swaziland', 'SWZ', 'SZL', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 'Sweden', 'SWE', 'SEK', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 'Switzerland', 'CHE', 'CHF', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 'Syria', 'SYR', 'SYP', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 'Taiwan, province of china', 'TWN', 'TWD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 'Tajikistan', '', 'TJS', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 'Tanzania', 'TZA', 'TZS', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 'Thailand', 'THA', 'THB', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 'Togo', 'TGO', 'XOF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 'Tokelau', 'TOK', 'NZD', 0, 0, 0, '0.000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 'Tonga', 'TON', 'TOP', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 'Trinidad and tobago', 'TTO', 'TTD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 'Tunisia', 'TUN', 'TND', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 'Turkey', 'TUR', 'TRY', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 'Turkmenistan', 'TKM', 'TMT', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 'Turks and caicos islands', '', 'USD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 'Tuvalu', 'TUV', 'AUD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 'Uganda', 'UGA', 'UGX', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 'Ukraine', 'UKR', 'UAH', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 'United arab emirates', 'UAE', 'AED', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 'United kingdom', 'GBR', 'GBP', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 'United states', 'USA', 'USD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 'United states minor outlying islands', 'USA', 'USD', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 'Uruguay', 'URY', '', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 'Uzbekistan', '', 'UZS', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 'Vanuatu', 'VUT', 'VUV', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 'Venezuela, bolivarian republic of', 'VEZ', 'VEF', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 'Viet nam', 'VNM', 'VND', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 'Virgin islands (british)', '', 'USD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 'Virgin islands (u.s.)', 'VIR', 'USD', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 'Wallis and futuna', 'WFL', '', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 'Western sahara', '', 'MAD', 0, 0, 0, '0.000', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 'Yemen', 'YEM', 'YER', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 'Zambia', 'ZMB', 'ZMW', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 'Zimbabwe', 'ZWE', 'ZWD', 0, 3, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 'saipan', 'SAI', 'SAI', 0, 2, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 'macedonia', 'MAC', 'MAC', 0, 0, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 'Ivory coast', 'IVC', 'IVC', 0, 0, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 'East timor', 'ETM', 'ETM', 0, 0, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 'Bonaire', 'BON', 'BON', 0, 0, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, 'British virgin island', 'BVI', 'BVI', 0, 0, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, 'Curacao', 'CUR', 'CUR', 0, 0, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 'Democratic republic', 'DER', 'DER', 0, 0, 0, '0.000', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `courier_id` int(10) UNSIGNED NOT NULL,
  `courier_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fuel_surcharge` decimal(8,2) NOT NULL,
  `service_tax` decimal(8,2) NOT NULL,
  `handling_charge` decimal(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cpp_adhesive`
--

CREATE TABLE `cpp_adhesive` (
  `cpp_adhesive_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cpp_adhesive`
--

INSERT INTO `cpp_adhesive` (`cpp_adhesive_id`, `price`, `status`, `created_at`, `updated_at`) VALUES
(2, '150.00', '1', '2017-11-30 00:14:26', '2017-11-30 00:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(10) UNSIGNED NOT NULL,
  `currency_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(15,3) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency_code`, `currency_name`, `price`, `status`, `created_at`, `updated_at`, `is_delete`) VALUES
(1, 'INR', 'Indian Rupee', '1.000', 1, '2017-10-03 01:04:28', '2017-10-31 00:04:49', 0),
(2, 'USD', 'US Dollar', '50.000', 0, '2017-10-03 01:05:02', '2017-12-11 22:22:22', 0),
(3, 'EUR', 'Euro', '65.000', 1, '2017-10-03 01:06:56', '2017-10-31 00:04:49', 0),
(4, 'GBP', 'Pound Sterling', '98.000', 1, '2017-10-03 01:07:33', '2017-10-31 00:04:49', 0),
(5, 'AUD', 'Australian Dollar', '45.000', 1, '2017-10-03 01:08:00', '2017-10-31 00:04:49', 0),
(6, 'NZD', 'New Zealand Dollar', '38.000', 1, '2017-10-03 01:08:28', '2017-10-31 00:04:49', 0),
(7, 'SGD', 'Singapore Dollar', '45.000', 1, '2017-10-03 01:08:53', '2017-10-31 00:04:49', 0),
(8, 'CHF', 'Swiss Franc', '57.000', 1, '2017-10-03 01:09:18', '2017-10-31 00:04:49', 0),
(9, 'MXN', 'Mexican Pesos', '4.400', 1, '2017-10-03 01:09:53', '2017-10-31 00:04:49', 0),
(10, 'FJD', 'FJD', '1.000', 1, '2017-10-03 01:10:15', '2017-10-31 00:04:49', 0),
(11, 'AFN', 'Afghanistan Afghani', '1.000', 1, '2017-10-03 01:11:53', '2017-10-03 01:45:06', 0),
(12, 'ALL', 'Albanian Lek', '1.000', 1, '2017-10-03 01:13:01', '2017-10-03 01:45:06', 0),
(13, 'DZD', 'Algerian Dinar', '1.000', 1, '2017-10-03 01:13:34', '2017-10-03 01:45:06', 0),
(14, 'CAD', 'Canadian Dollar', '51.490', 1, '2017-10-03 01:14:02', '2017-10-03 01:45:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `custom_ink_mul`
--

CREATE TABLE `custom_ink_mul` (
  `custom_ink_mul_id` int(10) UNSIGNED NOT NULL,
  `ink_mul` double(8,2) NOT NULL,
  `adhesive_mul` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `custom_ink_mul`
--

INSERT INTO `custom_ink_mul` (`custom_ink_mul_id`, `ink_mul`, `adhesive_mul`, `created_at`, `updated_at`) VALUES
(1, 1.00, 1.00, '2017-09-18 18:30:00', '2017-09-18 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `cylinder_base_price`
--

CREATE TABLE `cylinder_base_price` (
  `cylinder_base_price_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cylinder_base_price`
--

INSERT INTO `cylinder_base_price` (`cylinder_base_price_id`, `price`, `currency_id`, `currency_code`, `status`, `created_at`, `updated_at`) VALUES
(7, '456565.00', 0, 'EUR', 0, '2017-10-05 00:44:21', '2017-10-05 00:44:21'),
(8, '5453.00', 0, 'DZD', 0, '2017-10-06 06:16:28', '2017-10-06 06:16:28'),
(9, '1.00', 0, 'GBP', 0, '2017-10-06 06:32:02', '2017-11-24 22:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `cylinder_currency`
--

CREATE TABLE `cylinder_currency` (
  `cylinder_currency_id` int(10) UNSIGNED NOT NULL,
  `currency_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cylinder_vendor`
--

CREATE TABLE `cylinder_vendor` (
  `cylinder_vendor_id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL,
  `price` decimal(15,4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cylinder_vendor`
--

INSERT INTO `cylinder_vendor` (`cylinder_vendor_id`, `type`, `price`, `status`, `user_id`, `user_type_id`, `created_at`, `updated_at`) VALUES
(1, 0, '28.0000', 1, 1, 1, '2017-09-24 18:30:00', '2017-09-24 18:30:00'),
(2, 1, '24.0000', 1, 1, 1, '2017-09-24 18:30:00', '2017-12-01 04:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_id` int(11) NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `approved` tinyint(4) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_signature` text COLLATE utf8_unicode_ci NOT NULL,
  `associate_acnt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `stock_order_price` int(11) NOT NULL,
  `multi_quotation_price` int(11) NOT NULL,
  `stock_price_compulsory` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `user_type_id`, `user_id`, `first_name`, `last_name`, `profile_image`, `user_name`, `telephone`, `address_id`, `ip`, `approved`, `token`, `email_signature`, `associate_acnt`, `status`, `is_delete`, `stock_order_price`, `multi_quotation_price`, `stock_price_compulsory`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ABC', 'XYZ', 'jfsdj', 'def', '45456565', 4, '1', 1, '1', 'csdfsdfsdf', 'dfd', 1, 0, 45450, 5, 5, 5, '2017-10-02 18:30:00', '2017-10-02 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `employee_details_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `email_signature` text COLLATE utf8_unicode_ci NOT NULL,
  `stock_order_price` tinyint(4) NOT NULL,
  `multi_quotation_price` tinyint(4) NOT NULL,
  `stock_price_compulsory` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`employee_details_id`, `user_id`, `parent_user_id`, `first_name`, `last_name`, `telephone`, `postal_code`, `city`, `state`, `country_id`, `email_signature`, `stock_order_price`, `multi_quotation_price`, `stock_price_compulsory`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'sofia', 'sofia', 9876543210, 224561, 'MGS', 'Au', 8, '<p>Testing&nbsp;</p>', 0, 1, 0, 1, 0, '2018-04-04 00:07:42', '2018-04-04 00:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_industry`
--

CREATE TABLE `enquiry_industry` (
  `enquiry_industry_id` int(10) UNSIGNED NOT NULL,
  `industry_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enquiry_industry`
--

INSERT INTO `enquiry_industry` (`enquiry_industry_id`, `industry_name`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Food industries', 1, 0, '2018-04-30 00:45:42', '2018-04-30 00:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_source`
--

CREATE TABLE `enquiry_source` (
  `enquiry_source_id` int(10) UNSIGNED NOT NULL,
  `enquiry_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enquiry_source`
--

INSERT INTO `enquiry_source` (`enquiry_source_id`, `enquiry_name`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Google Search', 1, 0, '2018-04-30 03:12:40', '2018-04-30 03:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `ink_master`
--

CREATE TABLE `ink_master` (
  `ink_master_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `ink_master_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ink_master_min_qty` int(11) NOT NULL,
  `make_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ink_master`
--

INSERT INTO `ink_master` (`ink_master_id`, `price`, `ink_master_unit`, `ink_master_min_qty`, `make_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '1.00', '11', 111, 3, 1, '2017-09-18 00:57:01', '2017-12-15 22:39:00'),
(4, '11.00', '21', 3, 1, 0, '2017-09-18 05:01:41', '2017-10-02 00:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `ink_solvent`
--

CREATE TABLE `ink_solvent` (
  `ink_solvent_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `ink_solvent_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ink_solvent_min_qty` int(11) NOT NULL,
  `make_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ink_solvent`
--

INSERT INTO `ink_solvent` (`ink_solvent_id`, `price`, `ink_solvent_unit`, `ink_solvent_min_qty`, `make_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '123.00', 'qwert', 12, 1, 1, '2017-09-15 18:30:00', '2017-12-15 22:42:01'),
(2, '234.00', 'zxcv', 12, 2, 1, '2017-09-15 18:30:00', '2017-09-16 04:35:39'),
(3, '44.00', 'erp', 300, 3, 0, '2017-09-19 23:22:21', '2017-10-02 00:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `job_master`
--

CREATE TABLE `job_master` (
  `job_id` int(10) UNSIGNED NOT NULL,
  `job_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pouch_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `user_details` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `size_product` int(11) NOT NULL,
  `width` decimal(8,2) NOT NULL,
  `height` decimal(8,2) NOT NULL,
  `gusset` decimal(8,2) NOT NULL,
  `printing_option` int(11) NOT NULL,
  `layers` int(11) NOT NULL,
  `cylinder` int(11) NOT NULL,
  `manufacturing_process` int(11) NOT NULL,
  `lamination_status` tinyint(4) NOT NULL,
  `slitting_status` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `machine_master`
--

CREATE TABLE `machine_master` (
  `machine_id` int(10) UNSIGNED NOT NULL,
  `machine_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `production_process_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `machine_master`
--

INSERT INTO `machine_master` (`machine_id`, `machine_name`, `production_process_id`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'XL machine', '5,6', 1, 0, '2017-09-21 03:08:37', '2017-12-05 00:55:26'),
(2, 'Super Combi 3000 (lamination M/C)', '4,5,6,7', 1, 0, '2017-09-21 03:09:06', '2017-12-05 00:55:26'),
(6, 'IPN (VALVE) Machine', '5,6', 1, 0, '2017-10-02 04:06:14', '2017-12-05 00:55:26'),
(7, 'IPN (VALVE) Machine', '1,3,5,6', 1, 0, '2017-10-02 04:07:09', '2017-12-05 00:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `mailer_bag_color`
--

CREATE TABLE `mailer_bag_color` (
  `plastic_color_id` int(10) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mailer_bag_color`
--

INSERT INTO `mailer_bag_color` (`plastic_color_id`, `color`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(2, 'adsd', 0, 0, '2017-09-18 01:38:03', '2017-09-18 01:38:03'),
(4, 'sadasd', 1, 0, '2017-09-18 01:39:30', '2017-09-18 01:39:30'),
(5, 'qww', 1, 0, '2017-09-18 01:39:37', '2017-09-18 01:39:37'),
(6, 'red', 1, 0, '2017-10-30 01:33:31', '2017-10-30 01:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `measurement_id` int(10) UNSIGNED NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_permission`
--

CREATE TABLE `menu_permission` (
  `menu_permission_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_09_11_041201_admin_menu', 2),
('2017_09_11_111930_create_pouch_volume', 3),
('2017_09_14_100039_unit_master', 4),
('2017_09_14_113506_Production_process', 5),
('2017_09_15_044430_colorcategory', 6),
('2017_09_15_091344_product_option', 7),
('2017_09_16_044201_inkmaster', 8),
('2017_09_16_044336_inksolvent', 8),
('2017_09_16_044454_printingeffect', 8),
('2017_09_16_044841_pouch_style', 8),
('2017_09_16_062143_Product_Category', 9),
('2017_09_16_085127_product_layer', 10),
('2017_09_18_055801_mailer_bag_color', 11),
('2017_09_18_064229_Machine_Master', 12),
('2017_09_18_083832_zipper_price', 13),
('2017_09_18_104817_product_make', 14),
('2017_09_19_093740_Product_Item_Info', 15),
('2017_09_19_104233_custom_ink_mul', 15),
('2017_09_20_034513_product', 16),
('2017_09_20_042256_adhesive', 17),
('2017_09_20_053639_product_quantity', 18),
('2017_09_20_061131_adhesive_solvent', 19),
('2017_09_20_075511_roll_quantity', 20),
('2017_09_20_112134_roll_profit_price', 21),
('2017_09_20_113622_accessorie_price', 22),
('2017_09_21_084230_roll_packing', 23),
('2017_09_21_102311_roll_transport', 24),
('2017_09_21_104434_roll_wastage', 25),
('2017_09_22_052042_packing_pricing', 26),
('2017_09_22_085259_pouch_color', 27),
('2017_09_25_064611_cylinder_vender', 28),
('2017_09_26_042503_TemplateQuantity', 29),
('2017_09_26_063932_production_layer_material', 30),
('2017_09_26_082150_TemplateMeasurement', 31),
('2017_09_27_081829_rollback', 32),
('2017_09_27_082021_Production_layer_Material_Migration', 32),
('2017_09_29_034001_TemplateVolume', 33),
('2017_09_29_053754_Product_Item_Info', 34),
('2017_09_29_084721_StorezoDetail', 35),
('2017_10_02_083600_Product_Inward_Migration', 36),
('2017_10_02_085937_Transport_Sea_Width', 37),
('2017_10_02_111105_Vendor_Info_Migration', 37),
('2017_10_02_112445_Transport_Sea_Height', 37),
('2017_10_02_113923_cylinder_base_price', 38),
('2017_10_03_042007_product_tool_price', 39),
('2017_10_03_051651_currency', 40),
('2017_10_03_060735_employee_migration', 41),
('2017_10_03_060819_Production_User_Type', 41),
('2017_10_03_112608_Create_ProductMaterial', 42),
('2017_10_03_115254_country', 42),
('2017_10_05_053529_Product_Material_Quantity', 43),
('2017_10_05_054014_Product_Material_Thickness', 43),
('2017_10_06_043049_Product_Material_ThicknessPrice', 44),
('2017_10_09_083424_Job_master', 45),
('2017_10_10_040151_create_stock_wastage', 46),
('2017_10_10_045436_spout', 47),
('2017_10_10_070622_create_product_thickness', 48),
('2017_10_11_085015_size_master', 49),
('2017_10_11_085952_size_masters', 50),
('2017_10_13_080633_Product_Quan', 51),
('2017_10_13_080711_Product_ThickPrice', 51),
('2017_11_01_045504_Spout_Pouch_Masters', 52),
('2017_11_10_091527_Admin_Menu_Migration', 53),
('2017_11_13_042438_stock_profit', 54),
('2017_11_13_092808_stock_profit_by_sea', 55),
('2017_11_15_100410_profit_pricing', 56),
('2017_11_22_054501_View_sizetable', 57),
('2017_11_30_035605_Cpp_Adhesise', 58),
('2017_12_01_075230_create_bank__details_table', 59),
('2017_12_02_041118_create_taxations_table', 59),
('2017_12_02_041237_Bank_Detail', 60),
('2017_12_02_041720_create_cylinder__currencies_table', 61),
('2017_12_02_060751_Bank_details_table', 61),
('2017_12_02_060902_create_models_taxations_table', 61),
('2017_12_08_043950_Create_Courier', 61),
('2017_12_26_051128_international_users', 61),
('2018_02_24_034405_Add_menu_permission_table', 61),
('2018_03_03_055304_role_permission_user', 61),
('2018_03_15_042926_careat_user_table', 61),
('2018_03_15_054951_create_usertypeid_table', 61),
('2018_03_19_105323_Create_user_personal_Details', 61),
('2018_03_27_060659_Create_Employee_table', 61),
('2018_04_23_041949_AdminGressDetails', 62),
('2018_04_23_080407_AdminGressPercentage', 63),
('2018_04_25_053553_CreateAssociatedAccountsTable', 64),
('2018_04_25_094903_CreateAssociatedAccounts', 65),
('2018_04_26_061734_CreateEmployeeAssociatedUsers', 66),
('2018_04_30_050319_Create_Enquiry_Industry_Table', 67),
('2018_04_30_050450_Create_Enquiry_Source_Table', 67),
('2018_04_30_061227_Create_Enquiry_Industry', 68),
('2018_04_30_061244_Create_Enquiry_Source', 68),
('2018_05_05_044108_Create_Contacts_Table', 69),
('2018_05_07_042822_Create_Contacts', 70),
('2018_05_18_053435_Create_Product_material_Table', 71),
('2018_05_18_105505_Create_Product_materials', 72),
('2018_05_18_105933_Create_Product_material_list', 73),
('2018_05_19_052736_Create_Material_thickness_price_table', 74),
('2018_05_21_112526_Create_product_volume_Table', 75),
('2018_05_22_045351_Create_measurement_Table', 76),
('2018_05_28_045247_Create_Product', 77),
('2018_05_28_095555_Create_Product_table', 78),
('2018_05_31_042523_New_Product', 79),
('2018_05_31_042843_product_new', 80),
('2018_06_02_084653_create_zippers_table', 81);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@swisspack.com', 'ef13b82cf4cc9116693deb1e166a12fb8bb028334a0dbf2bf0f550d625080b37', '2017-11-29 03:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `pouch_color`
--

CREATE TABLE `pouch_color` (
  `pouch_color_id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `make_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` text COLLATE utf8_unicode_ci NOT NULL,
  `pouch_color_abbr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_value` int(11) NOT NULL,
  `color_category` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pouch_color`
--

INSERT INTO `pouch_color` (`pouch_color_id`, `product_id`, `make_id`, `color`, `pouch_color_abbr`, `color_value`, `color_category`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, '11,13', '1,2', 'Shiny White / Shiny White\r\n', 'SWW', 2, 1, 1, 0, '2017-09-22 03:46:10', '2017-11-22 03:29:20'),
(4, '24', '1,2,6', 'White Paper / White Paper\r\n', 'WHP', 11, 2, 1, 0, '2017-09-22 05:39:00', '2017-12-05 01:21:58'),
(5, '11,13', '2', 'Shiny Silver / Shiny Silver\r\n', 'SSS', 1, 1, 1, 0, '2017-11-22 03:03:02', '2017-11-22 03:29:26'),
(6, '23', '5', 'Shiny Gold / Shiny Gold\r\n', 'SDD', 1, 1, 1, 0, '2017-11-22 03:04:02', '2017-11-22 03:29:28'),
(7, '26', '3', 'Red / Red\r\n', 'SRR', 1, 1, 1, 0, '2017-11-22 03:04:25', '2017-12-05 01:24:15'),
(8, '11', '3', 'Jute Look / Jute Look\r\n', 'JTL', 1, 1, 1, 0, '2017-11-22 03:04:46', '2017-12-05 01:24:15'),
(9, '27', '2', 'green paper / green paper\r\n', 'GP', 3, 1, 1, 0, '2017-11-22 03:05:06', '2017-11-22 03:29:33'),
(10, '26', '4', 'Brown Paper / Brown paper\r\n', 'BKP', 3, 4, 1, 0, '2017-11-22 03:05:42', '2017-12-05 01:22:11'),
(11, '24', '1', 'Blue / Blue\r\n', 'SBB', 1, 1, 1, 0, '2017-11-22 03:06:05', '2017-11-22 03:30:18'),
(12, '13', '4', 'Black paper / Black paper\r\n', 'BP', 2, 1, 1, 0, '2017-11-22 03:06:22', '2017-12-05 01:22:11'),
(13, '13', '3', 'Blue Oval Window\r\n', 'SBO', 2, 1, 1, 0, '2017-11-22 03:06:41', '2017-12-05 01:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `pouch_style`
--

CREATE TABLE `pouch_style` (
  `pouch_style_id` int(10) UNSIGNED NOT NULL,
  `style` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pouch_style`
--

INSERT INTO `pouch_style` (`pouch_style_id`, `style`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'tgrg123', 0, 0, '2017-09-16 01:36:49', '2017-09-16 02:35:26'),
(3, 'abc', 1, 0, '2017-10-30 22:23:21', '2017-10-30 22:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `printing_effect`
--

CREATE TABLE `printing_effect` (
  `printing_effect_id` int(10) UNSIGNED NOT NULL,
  `effect_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `effect_name_spanish` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `multi_by` decimal(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `printing_effect`
--

INSERT INTO `printing_effect` (`printing_effect_id`, `effect_name`, `effect_name_spanish`, `price`, `multi_by`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Shiny Finish', 'Acabado Brillante\r\n', '0.00', '0.00', 1, 0, NULL, NULL),
(2, 'Matt Finish\r\n', 'Acabado Mate\r\n', '0.00', '0.00', 1, 0, NULL, NULL),
(3, 'Matt - Shine Finish\r\n', 'Acabado Mate-Brillante\r\n', '200.00', '2.20', 1, 0, NULL, NULL),
(4, 'Brown Kraft Paper\r\n', ' Papel kraft marrÃ³n\r\n', '0.00', '0.00', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abbrevation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `per_kg_price` int(11) NOT NULL,
  `strip_thickness` int(11) NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `abbrevation`, `per_kg_price`, `strip_thickness`, `image_path`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Stand Up Pouch', 'SUP', 0, 0, '', 1, NULL, '2018-05-30 22:59:25', '2018-05-30 22:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `production_layer_material`
--

CREATE TABLE `production_layer_material` (
  `material_layer_id` int(10) UNSIGNED NOT NULL,
  `product_item_id` int(11) NOT NULL,
  `layer_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `production_layer_material`
--

INSERT INTO `production_layer_material` (`material_layer_id`, `product_item_id`, `layer_id`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 1, '3,5,6', 0, '2017-09-28 04:44:32', '2017-09-28 04:44:32'),
(2, 1, '3,6', 0, '2017-09-28 04:49:54', '2017-09-28 04:49:54'),
(3, 1, '3,5', 0, '2017-09-29 00:36:06', '2017-09-29 00:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `production_process`
--

CREATE TABLE `production_process` (
  `production_process_id` int(10) UNSIGNED NOT NULL,
  `production_process_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `production_process`
--

INSERT INTO `production_process` (`production_process_id`, `production_process_name`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Valve & Tintie Fixing', 1, 0, '2017-09-15 22:57:08', '2017-10-02 02:06:53'),
(3, 'Spouting', 1, 0, '2017-09-16 00:30:25', '2017-10-02 02:06:59'),
(5, 'Slitting / Trimming', 1, 0, '2017-09-15 18:30:00', '2017-10-02 02:06:17'),
(6, 'Pouching', 1, 0, '2017-09-15 18:30:00', '2017-10-02 02:06:17'),
(7, 'printing', 1, 0, '2017-09-15 22:57:08', '2017-10-02 02:06:53'),
(8, 'Lamination', 1, 0, '2017-09-15 22:57:08', '2017-10-02 02:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `production_user_type`
--

CREATE TABLE `production_user_type` (
  `user_type_id` int(10) UNSIGNED NOT NULL,
  `user_type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_accessorie`
--

CREATE TABLE `product_accessorie` (
  `accessorie_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abbreviation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `min_product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wastage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_accessorie`
--

INSERT INTO `product_accessorie` (`accessorie_id`, `name`, `abbreviation`, `unit`, `min_product`, `price`, `wastage`, `serial_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Die cut Handle', 'DC', '12', '12', '11', '111', '12', 1, '2017-09-21 05:43:37', '2017-11-16 03:48:12'),
(3, 'Euro hole or Round hole', 'EU', '1211', '1111', '1111', '11', '11', 1, '2017-09-21 06:11:18', '2017-11-16 03:48:38'),
(4, 'No Accessorie', 'NA', '5', '5', '5', '5', '5', 1, '2017-11-16 03:48:54', '2017-11-16 03:48:54'),
(5, 'Round Corner', 'RC', '5', '5', '5', '55', '5', 1, '2017-11-16 03:49:09', '2017-11-16 03:49:09'),
(6, 'Round Corners', 'RR', '69', '6', '6', '6', '6', 1, '2017-11-16 03:49:25', '2017-11-16 03:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `product_category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `product_category_name`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Digital Ink', 1, 0, '2017-09-18 00:55:47', '2017-10-02 01:57:50'),
(3, 'Spout', 1, 0, '2017-09-18 01:01:06', '2017-10-02 01:56:32'),
(5, 'Tin Tie', 1, 0, '2017-09-18 01:02:45', '2017-10-02 01:56:32'),
(6, 'Valve', 1, 0, '2017-09-18 01:03:48', '2017-10-02 01:56:32'),
(9, 'Films', 1, 0, '2017-09-18 01:05:04', '2017-10-02 01:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_inward`
--

CREATE TABLE `product_inward` (
  `product_inward_id` int(10) UNSIGNED NOT NULL,
  `inward_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_item_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inward_size` int(11) NOT NULL,
  `qty` decimal(8,2) NOT NULL,
  `unit` int(11) NOT NULL,
  `sec_unit` int(11) NOT NULL,
  `roll_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `inward_date` date NOT NULL,
  `manufacutring_date` date NOT NULL,
  `added_user_id` int(11) NOT NULL,
  `added_user_type_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `slit_is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_inward`
--

INSERT INTO `product_inward` (`product_inward_id`, `inward_no`, `vendor_id`, `product_category_id`, `product_item_id`, `inward_size`, `qty`, `unit`, `sec_unit`, `roll_no`, `user_id`, `user_type_id`, `inward_date`, `manufacutring_date`, `added_user_id`, `added_user_type_id`, `status`, `is_delete`, `slit_is_delete`, `created_at`, `updated_at`) VALUES
(1, 'INWD00000001', 2, 9, '6', 78, '56.00', 3, 5, '45', 1, 0, '2017-10-07', '2017-10-07', 0, 0, 1, 0, 0, '2017-10-03 03:26:25', '2017-12-01 03:31:19'),
(9, 'INWD00000002', 1, 5, '9', 5, '5.00', 8, 7, '5', 1, 0, '2017-10-20', '2017-10-22', 0, 0, 1, 0, 0, '2017-10-07 03:46:39', '2017-10-11 04:17:38'),
(10, 'INWD00000010', 2, 0, '', 4, '4.00', 6, 11, '74', 1, 0, '2017-10-19', '2017-10-17', 0, 0, 1, 0, 0, '2017-10-07 03:48:18', '2017-11-23 04:53:28'),
(11, 'INWD00000011', 1, 1, '9', 4, '4.00', 6, 7, '41', 1, 0, '2017-10-18', '2017-10-09', 0, 0, 1, 0, 0, '2017-10-07 03:49:12', '2017-10-08 22:22:34'),
(12, 'INWD00000012', 1, 3, '11', 5, '5.00', 8, 8, '45', 1, 0, '2017-12-18', '2017-12-11', 0, 0, 1, 0, 0, '2017-12-18 05:00:18', '2017-12-18 05:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_item_info`
--

CREATE TABLE `product_item_info` (
  `product_item_id` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit` int(11) NOT NULL,
  `sec_unit` int(11) NOT NULL,
  `material` tinyint(4) NOT NULL,
  `production_process_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `layer_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `product_thickness` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `current_stock` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added_user_id` int(11) NOT NULL,
  `added_user_type_id` int(11) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_item_info`
--

INSERT INTO `product_item_info` (`product_item_id`, `product_category_id`, `product_code`, `product_name`, `unit`, `sec_unit`, `material`, `production_process_id`, `layer_id`, `product_thickness`, `current_stock`, `status`, `added_user_id`, `added_user_type_id`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 3, 'ssssss', 'wewewewe', 4, 6, 1, '3,4,5', '2', '', 45, 0, 0, 0, 0, '2017-09-29 00:36:06', '2017-10-03 06:02:49'),
(4, 3, 'fzsdfsd', 'cfsdf', 4, 3, 1, '3,5,6,7', '3', '', 45, 1, 0, 0, 0, '2017-10-02 00:12:37', '2017-10-02 00:30:56'),
(5, 1, 'ytt', 'tyut', 5, 0, 0, '1,3', '3,5,6', '', 0, 0, 0, 0, 0, '2017-10-02 01:15:28', '2017-10-02 01:15:28'),
(6, 5, 'sdfsdsd', 'dsfs', 5, 6, 1, '1,3,4,5,6,7,8', '1', '', 45, 1, 0, 0, 0, '2017-10-02 01:16:49', '2017-10-02 01:16:49'),
(7, 5, 'sdfsdsd', 'dsfs', 5, 6, 1, '1,3,4,5,6,7,8', '2', '', 45, 1, 0, 0, 0, '2017-10-02 01:16:50', '2017-10-02 01:16:50'),
(8, 9, 'eeerrpp', 'hgj', 3, 4, 1, '1,3,4,5,6,7,8', '3,5,6', '7', 45, 0, 0, 0, 0, '2017-10-02 01:19:13', '2017-10-02 01:19:13'),
(9, 1, '23', '1Kg Brown paper bags with rectangle window (SUP with zipper)', 3, 3, 1, '1,3', '3,5', '', 535325, 1, 0, 0, 0, '2017-10-02 03:45:01', '2017-11-01 06:28:59'),
(10, 1, '1222', '1Kg Brown paper bags with rectangle window (SUP with zipper)', 4, 0, 0, '1,3,5,6', '5,6', '', 535325, 0, 0, 0, 0, '2017-10-02 03:46:02', '2017-10-02 03:46:02'),
(11, 9, 'erp77', 'ERRTRET', 3, 4, 1, '1,3,5,6', '3', '45', 78, 1, 0, 0, 0, '2017-10-02 03:49:26', '2017-10-02 03:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_layer`
--

CREATE TABLE `product_layer` (
  `product_layer_id` int(10) UNSIGNED NOT NULL,
  `layer` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `product_layer`
--

INSERT INTO `product_layer` (`product_layer_id`, `layer`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, '2017-09-17 23:53:02', '2017-10-04 00:57:59'),
(2, 2, 1, 0, '2017-09-18 00:13:16', '2017-10-04 00:57:50'),
(3, 3, 1, 0, '2017-09-18 00:13:47', '2017-10-04 00:57:39'),
(4, 4, 1, 0, '2017-10-04 00:57:03', '2017-10-04 00:57:03'),
(5, 5, 1, 0, '2017-10-04 00:57:14', '2017-10-04 00:57:14'),
(6, 6, 1, 0, '2017-10-04 00:57:25', '2017-10-04 00:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_make`
--

CREATE TABLE `product_make` (
  `make_id` int(10) UNSIGNED NOT NULL,
  `make_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abbr` text COLLATE utf8_unicode_ci NOT NULL,
  `serial_no` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_make`
--

INSERT INTO `product_make` (`make_id`, `make_name`, `abbr`, `serial_no`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Normal', 'PL', 1, 1, 0, '2017-09-17 18:30:00', '2017-11-22 02:45:23'),
(2, 'Paper', 'PP', 2, 1, 0, '2017-09-17 18:30:00', '2017-11-22 03:47:16'),
(3, 'Retort', 'RT', 3, 1, 0, '2017-09-17 18:30:00', '2017-09-17 18:30:00'),
(4, 'Vacuum', 'VC', 4, 1, 0, '2017-09-17 18:30:00', '2017-09-17 18:30:00'),
(5, 'Spout', 'SP', 5, 1, 0, '2017-09-17 18:30:00', '2017-09-17 18:30:00'),
(6, 'oxo-Biodegradable', 'OBIO', 6, 1, 0, '2017-09-17 18:30:00', '2017-09-17 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_material`
--

CREATE TABLE `product_material` (
  `product_material_id` int(10) UNSIGNED NOT NULL,
  `material_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `layers` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gsm` double(8,4) NOT NULL,
  `minimum_product_quo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thickness` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `printing_effect` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `make_pouch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `material_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_material`
--

INSERT INTO `product_material` (`product_material_id`, `material_name`, `layers`, `gsm`, `minimum_product_quo`, `thickness`, `printing_effect`, `make_pouch`, `quantity`, `material_unit`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Polyester (PET)', '1,2,3', 1.4000, '0', '12.00', '1,2,3', '1,2,3,4,5', '5,6,7,8,9,10', 'mtr', 1, NULL, '2018-05-19 01:16:21', '2018-05-19 01:16:21'),
(2, 'Metalized Polyester', '2,3', 1.4000, '0', '12.000', '', '1,2,4,5', '5,6,7,8,9,10', 'mtr', 1, NULL, '2018-05-19 01:21:55', '2018-05-19 01:21:55'),
(3, 'PE', '1,2,3,4', 0.9300, '0', '60.00|80.00|100.00|135.00|165.00|25.00|120.00|40.00', '1,2,3,4', '1,2,4,5', '5,6,7,8,9,10', 'mtr', 1, NULL, '2018-05-19 01:24:01', '2018-05-19 01:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_material_quantity`
--

CREATE TABLE `product_material_quantity` (
  `product_material_quantity_id` int(10) UNSIGNED NOT NULL,
  `product_material_id` int(11) NOT NULL,
  `product_quantity_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_material_quantity`
--

INSERT INTO `product_material_quantity` (`product_material_quantity_id`, `product_material_id`, `product_quantity_id`, `created_at`, `updated_at`) VALUES
(1, 5, '5|6|8', '2017-10-13 02:43:55', '2017-10-13 02:43:55'),
(2, 6, '4|5', '2017-10-13 03:52:05', '2017-10-13 03:52:05'),
(3, 13, '6|8|10', '2017-10-18 01:30:36', '2017-10-18 01:30:36'),
(4, 14, '7|8', '2017-11-10 23:38:47', '2017-11-10 23:38:47'),
(5, 16, '5|6|7|8', '2017-11-16 23:38:57', '2017-11-16 23:38:57'),
(6, 16, '5|6|7|8', '2017-11-16 23:39:55', '2017-11-16 23:39:55'),
(7, 16, '5|6|7|8', '2017-11-16 23:40:38', '2017-11-16 23:40:38'),
(8, 17, '5|6|7|8', '2017-11-16 23:41:53', '2017-11-16 23:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_material_thickness`
--

CREATE TABLE `product_material_thickness` (
  `product_material_thickness_id` int(10) UNSIGNED NOT NULL,
  `product_material_id` int(11) NOT NULL,
  `thickness` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_material_thickness`
--

INSERT INTO `product_material_thickness` (`product_material_thickness_id`, `product_material_id`, `thickness`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '3,4,5,7', 1, '2017-10-12 05:06:58', '2017-10-12 22:56:40'),
(2, 2, '78,5,8', 1, '2017-10-13 00:36:52', '2017-10-13 00:36:52'),
(3, 4, '12', 1, '2017-10-13 02:28:30', '2017-10-13 02:28:30'),
(4, 5, '4545', 1, '2017-10-13 02:43:55', '2017-10-13 02:43:55'),
(5, 16, '8,9,1,5,7', 1, '2017-10-13 03:52:05', '2017-11-16 23:40:38'),
(6, 13, '14', 1, '2017-10-18 01:30:36', '2017-10-18 01:30:36'),
(7, 14, '12,44,11', 1, '2017-11-10 23:38:47', '2017-11-10 23:38:47'),
(8, 16, '7,4,5,7', 1, '2017-11-16 23:38:58', '2017-11-16 23:38:58'),
(9, 17, '3,4,5,7,9', 1, '2017-11-16 23:41:53', '2017-11-16 23:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_material_thickness_price`
--

CREATE TABLE `product_material_thickness_price` (
  `product_material_thickness_id` int(10) UNSIGNED NOT NULL,
  `product_material_id` int(11) NOT NULL,
  `thickness_form` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thickness_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thickness_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_material_thickness_price`
--

INSERT INTO `product_material_thickness_price` (`product_material_thickness_id`, `product_material_id`, `thickness_form`, `thickness_to`, `thickness_price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '101', '200', '2018-05-19 01:11:31', '2018-05-19 01:10:17', '2018-05-19 01:11:31'),
(2, 1, '101', '200', '330', '2018-05-19 01:11:33', '2018-05-19 01:10:17', '2018-05-19 01:11:33'),
(3, 1, '1', '101', '111', NULL, '2018-05-19 01:12:11', '2018-05-19 01:12:11'),
(4, 1, '101', '200', '333', NULL, '2018-05-19 01:12:11', '2018-05-19 01:12:11'),
(5, 1, '0', '100', '185', '2018-05-29 04:56:25', '2018-05-19 01:16:21', '2018-05-29 04:56:25'),
(6, 2, '0', '100', '185', NULL, '2018-05-19 01:21:55', '2018-05-19 01:21:55'),
(7, 3, '0', '165', '153', NULL, '2018-05-19 01:24:01', '2018-05-19 01:24:01'),
(8, 3, '166', '500', '153', NULL, '2018-05-19 01:24:01', '2018-05-19 01:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_option`
--

CREATE TABLE `product_option` (
  `product_option_id` int(10) UNSIGNED NOT NULL,
  `option_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `zipper` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_option`
--

INSERT INTO `product_option` (`product_option_id`, `option_name`, `price`, `zipper`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'test', '1.20', 1, 0, 0, NULL, '2017-10-05 03:58:40'),
(2, 'test2', '1.63', 1, 1, 0, NULL, '2017-10-05 03:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_packing`
--

CREATE TABLE `product_packing` (
  `product_packing_id` int(10) UNSIGNED NOT NULL,
  `from_total` decimal(8,2) NOT NULL,
  `to_total` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_packing`
--

INSERT INTO `product_packing` (`product_packing_id`, `from_total`, `to_total`, `price`, `created_at`, `updated_at`) VALUES
(1, '15.00', '15.00', '15.00', '2017-09-22 00:36:22', '2017-09-22 00:36:22'),
(2, '20.00', '21.00', '23.00', '2017-09-22 00:44:31', '2017-09-22 00:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_pouch_volume`
--

CREATE TABLE `product_pouch_volume` (
  `pouch_volume_id` int(10) UNSIGNED NOT NULL,
  `pouch_volume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abbreviation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_delete` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_pouch_volume`
--

INSERT INTO `product_pouch_volume` (`pouch_volume_id`, `pouch_volume`, `abbreviation`, `status`, `remember_token`, `created_at`, `updated_at`, `is_delete`) VALUES
(12, 'product pouch testing', 'product', '1', NULL, '2017-09-15 03:11:17', '2017-09-19 00:16:02', 0),
(13, 'pouching', 'dghsjhd', '0', NULL, '2017-09-15 03:11:46', '2017-09-15 03:11:46', 0),
(14, 'ggf', 'rtryr', '1', NULL, '2017-09-19 00:00:12', '2017-09-19 00:15:55', 0),
(16, 'hjhgj1234', ' mjmjhk', '1', NULL, '2017-09-19 00:07:08', '2017-09-19 00:07:17', 0),
(17, 'tee', '', '0', NULL, '2017-09-22 02:17:53', '2017-09-22 02:17:53', 0),
(18, 'test', 'Spout', '0', NULL, '2017-09-22 05:30:44', '2017-09-22 05:30:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_quantity`
--

CREATE TABLE `product_quantity` (
  `product_quantity_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `plus_minus_quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_quantity`
--

INSERT INTO `product_quantity` (`product_quantity_id`, `quantity`, `plus_minus_quantity`, `status`, `created_at`, `updated_at`) VALUES
(5, 100, 0, 0, '2017-09-20 05:43:10', '2017-11-11 03:38:19'),
(6, 10000, 0, 1, '2017-10-04 00:27:13', '2017-10-04 00:27:13'),
(7, 15000, 0, 1, '2017-10-04 00:27:23', '2017-10-04 00:27:23'),
(8, 20000, 0, 1, '2017-10-04 00:27:32', '2017-10-04 00:27:32'),
(9, 30000, 0, 1, '2017-10-04 00:27:49', '2017-10-04 00:27:49'),
(10, 50000, 0, 1, '2017-10-04 00:27:59', '2017-10-04 00:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_tool_price`
--

CREATE TABLE `product_tool_price` (
  `product_tool_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `width_from` int(11) NOT NULL,
  `width_to` int(11) NOT NULL,
  `gusset` decimal(8,2) NOT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_tool_price`
--

INSERT INTO `product_tool_price` (`product_tool_id`, `product_id`, `width_from`, `width_to`, `gusset`, `price`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 23, 55, 22, '33.00', 22, 1, 0, NULL, '2017-11-16 05:28:00'),
(2, 10, 2, 2, '2.00', 2, 0, 0, '2017-11-15 03:04:34', '2017-11-29 04:49:53'),
(3, 11, 55, 22, '33.00', 22, 0, 0, '2017-11-15 04:29:11', '2017-11-24 05:53:39'),
(4, 13, 55, 22, '33.00', 22, 0, 0, '2017-11-15 06:20:35', '2017-11-16 23:52:11'),
(6, 11, 435, 54, '545.00', 435, 0, 0, '2017-11-15 22:01:54', '2017-11-24 05:53:39'),
(9, 10, 12, 23, '13.00', 123, 0, 0, NULL, '2017-11-29 04:49:53'),
(11, 10, 1, 11, '1.00', 111, 0, 0, NULL, '2017-11-29 04:49:53'),
(14, 10, 7, 7, '7.00', 66, 0, 0, NULL, '2017-11-29 04:49:53'),
(17, 23, 1, 1, '1.00', 1, 0, 0, NULL, NULL),
(22, 13, 65, 57, '57.00', 57, 0, 0, NULL, NULL),
(27, 11, 435, 54, '545.00', 435, 0, 0, '2017-11-15 22:01:54', '2017-11-24 05:53:39'),
(33, 24, 12, 12, '123.00', 13, 0, 0, NULL, NULL),
(34, 28, 21, 21, '21.00', 21, 0, 0, NULL, NULL),
(35, 10, 55, 55, '55.00', 55, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_transport_sea_height`
--

CREATE TABLE `product_transport_sea_height` (
  `product_transport_sea_height_id` int(10) UNSIGNED NOT NULL,
  `from_height` decimal(8,2) NOT NULL,
  `to_height` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_transport_sea_height`
--

INSERT INTO `product_transport_sea_height` (`product_transport_sea_height_id`, `from_height`, `to_height`, `price`, `created_at`, `updated_at`) VALUES
(1, '75.00', '75.00', '75.00', '2017-10-03 04:23:58', '2017-10-03 04:23:58'),
(2, '140.00', '600.00', '0.50', '2017-10-03 04:51:55', '2017-10-03 04:51:55'),
(3, '0.00', '122.00', '22.00', '2017-10-03 04:52:48', '2017-10-03 04:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_transport_sea_width`
--

CREATE TABLE `product_transport_sea_width` (
  `product_transport_sea_width_id` int(10) UNSIGNED NOT NULL,
  `from_width` decimal(8,2) NOT NULL,
  `to_width` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_transport_sea_width`
--

INSERT INTO `product_transport_sea_width` (`product_transport_sea_width_id`, `from_width`, `to_width`, `price`, `created_at`, `updated_at`) VALUES
(1, '25.00', '25.00', '25.00', '2017-10-03 03:55:01', '2017-10-03 03:55:01'),
(2, '50.00', '50.00', '50.00', '2017-10-03 03:55:44', '2017-10-03 03:56:40'),
(3, '0.00', '12.00', '120.00', '2017-10-03 04:52:24', '2017-10-03 04:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_volume`
--

CREATE TABLE `product_volume` (
  `product_volume_id` int(10) UNSIGNED NOT NULL,
  `volume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary_measurement_id` int(11) NOT NULL,
  `uk_volume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_measurement_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_volume`
--

INSERT INTO `product_volume` (`product_volume_id`, `volume`, `primary_measurement_id`, `uk_volume`, `secondary_measurement_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '100', 2, '', 0, 1, NULL, '2018-05-22 22:21:44', '2018-05-22 22:21:44'),
(2, '70', 2, '2', 8, 1, NULL, '2018-05-22 22:22:50', '2018-05-22 22:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `profit_pricing`
--

CREATE TABLE `profit_pricing` (
  `profit_pricing_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_id` int(11) NOT NULL,
  `size_from` decimal(15,2) NOT NULL,
  `size_to` decimal(15,2) NOT NULL,
  `profit` decimal(15,2) NOT NULL,
  `wastage_per` decimal(15,2) NOT NULL,
  `plus_minus_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profit_pricing`
--

INSERT INTO `profit_pricing` (`profit_pricing_id`, `product_id`, `quantity_id`, `size_from`, `size_to`, `profit`, `wastage_per`, `plus_minus_quantity`, `created_at`, `updated_at`) VALUES
(21, 10, 5, '1111111.00', '1.00', '1.00', '1.00', 1, NULL, '2017-11-22 01:02:02'),
(22, 10, 5, '33333.00', '2.00', '2.00', '2.00', 2, NULL, '2017-11-22 01:02:02'),
(24, 10, 6, '4.00', '4.00', '4.00', '4.00', 4, NULL, '2017-11-22 01:02:02'),
(25, 10, 7, '5.00', '5.00', '5.00', '5.00', 5, NULL, '2017-11-22 01:02:02'),
(26, 10, 8, '6.00', '6.00', '6.00', '6.00', 6, NULL, '2017-11-22 01:02:02'),
(27, 10, 9, '7.00', '7.00', '7.00', '7.00', 7, NULL, '2017-11-22 01:02:02'),
(28, 10, 10, '8.00', '8.00', '8.00', '8.00', 8, NULL, '2017-11-22 01:02:02'),
(29, 10, 10, '9.00', '9.00', '9.00', '9.00', 9, NULL, '2017-11-22 01:02:02'),
(30, 10, 10, '10.00', '10.00', '10.00', '10.00', 10, NULL, '2017-11-22 01:02:02'),
(31, 11, 5, '1.00', '1.00', '1.00', '1.00', 1, NULL, '2017-11-21 23:27:07'),
(32, 11, 6, '2.00', '2.00', '2.00', '2.00', 2, NULL, '2017-11-21 23:27:07'),
(33, 11, 7, '3.00', '3.00', '3.00', '3.00', 3, NULL, '2017-11-21 23:27:07'),
(34, 11, 8, '4.00', '4.00', '4.00', '4.00', 4, NULL, '2017-11-21 23:27:08'),
(35, 11, 9, '5.00', '5.00', '5.00', '5.00', 5, NULL, '2017-11-21 23:27:08'),
(36, 11, 10, '6.00', '6.00', '6.00', '6.00', 6, NULL, '2017-11-21 23:27:08'),
(38, 11, 5, '88.00', '8.00', '8.00', '8.00', 8, NULL, '2017-11-21 23:27:07'),
(39, 11, 6, '9.00', '9.00', '9.00', '9.00', 9, NULL, '2017-11-21 23:27:07'),
(41, 11, 7, '55.00', '44.00', '66.00', '88.00', 77, NULL, NULL),
(42, 10, 6, '78.00', '89.00', '74.00', '55.00', 75, NULL, '2017-11-22 01:02:02'),
(43, 28, 5, '1.00', '1.00', '1.00', '1.00', 1, NULL, NULL),
(44, 28, 6, '2.00', '2.00', '2.00', '2.00', 2, NULL, NULL),
(45, 28, 6, '9.00', '9.00', '9.00', '9.00', 9, NULL, NULL),
(46, 28, 7, '3.00', '3.00', '3.00', '3.00', 3, NULL, NULL),
(47, 28, 7, '4.00', '4.00', '4.00', '4.00', 4, NULL, NULL),
(48, 28, 8, '5.00', '5.00', '5.00', '5.00', 5, NULL, NULL),
(49, 28, 9, '6.00', '6.00', '6.00', '6.00', 6, NULL, NULL),
(50, 28, 9, '7.00', '7.00', '7.00', '7.00', 7, NULL, NULL),
(51, 28, 10, '8.00', '8.00', '8.00', '8.00', 8, NULL, NULL),
(52, 28, 10, '10.00', '10.00', '10.00', '10.00', 10, NULL, NULL),
(53, 10, 5, '88888888.00', '3333333.00', '5.00', '5.00', 5, NULL, '2017-11-22 01:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `role_permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `add_permission` longtext COLLATE utf8_unicode_ci NOT NULL,
  `edit_permission` longtext COLLATE utf8_unicode_ci NOT NULL,
  `delete_permission` longtext COLLATE utf8_unicode_ci NOT NULL,
  `view_permission` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`role_permission_id`, `user_id`, `user_type_id`, `add_permission`, `edit_permission`, `delete_permission`, `view_permission`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'a:103:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"7\";i:6;s:1:\"8\";i:7;s:1:\"9\";i:8;s:2:\"10\";i:9;s:2:\"11\";i:10;s:2:\"12\";i:11;s:2:\"13\";i:12;s:2:\"14\";i:13;s:2:\"15\";i:14;s:2:\"16\";i:15;s:2:\"17\";i:16;s:2:\"18\";i:17;s:2:\"19\";i:18;s:2:\"20\";i:19;s:2:\"21\";i:20;s:2:\"22\";i:21;s:2:\"23\";i:22;s:2:\"24\";i:23;s:2:\"25\";i:24;s:2:\"26\";i:25;s:2:\"27\";i:26;s:2:\"28\";i:27;s:2:\"29\";i:28;s:2:\"30\";i:29;s:2:\"31\";i:30;s:2:\"32\";i:31;s:2:\"33\";i:32;s:2:\"34\";i:33;s:2:\"35\";i:34;s:2:\"36\";i:35;s:2:\"37\";i:36;s:2:\"38\";i:37;s:2:\"39\";i:38;s:2:\"40\";i:39;s:2:\"41\";i:40;s:2:\"42\";i:41;s:2:\"43\";i:42;s:2:\"44\";i:43;s:2:\"45\";i:44;s:2:\"46\";i:45;s:2:\"47\";i:46;s:2:\"48\";i:47;s:2:\"49\";i:48;s:2:\"50\";i:49;s:2:\"51\";i:50;s:2:\"52\";i:51;s:2:\"53\";i:52;s:2:\"54\";i:53;s:2:\"55\";i:54;s:2:\"56\";i:55;s:2:\"57\";i:56;s:2:\"58\";i:57;s:2:\"59\";i:58;s:2:\"60\";i:59;s:2:\"61\";i:60;s:2:\"62\";i:61;s:2:\"63\";i:62;s:2:\"64\";i:63;s:2:\"65\";i:64;s:2:\"66\";i:65;s:2:\"67\";i:66;s:2:\"68\";i:67;s:2:\"69\";i:68;s:2:\"70\";i:69;s:2:\"71\";i:70;s:2:\"72\";i:71;s:2:\"73\";i:72;s:2:\"74\";i:73;s:2:\"75\";i:74;s:2:\"76\";i:75;s:2:\"77\";i:76;s:2:\"78\";i:77;s:2:\"79\";i:78;s:2:\"80\";i:79;s:2:\"81\";i:80;s:2:\"82\";i:81;s:2:\"83\";i:82;s:2:\"84\";i:83;s:2:\"85\";i:84;s:2:\"86\";i:85;s:2:\"87\";i:86;s:2:\"88\";i:87;s:2:\"89\";i:88;s:2:\"90\";i:89;s:2:\"91\";i:90;s:2:\"92\";i:91;s:2:\"93\";i:92;s:2:\"94\";i:93;s:2:\"95\";i:94;s:2:\"96\";i:95;s:2:\"97\";i:96;s:2:\"98\";i:97;s:2:\"99\";i:98;s:3:\"100\";i:99;s:3:\"101\";i:100;s:3:\"102\";i:101;s:3:\"103\";i:102;s:3:\"104\";}', 'a:101:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"7\";i:6;s:1:\"8\";i:7;s:1:\"9\";i:8;s:2:\"10\";i:9;s:2:\"11\";i:10;s:2:\"12\";i:11;s:2:\"13\";i:12;s:2:\"14\";i:13;s:2:\"15\";i:14;s:2:\"16\";i:15;s:2:\"17\";i:16;s:2:\"18\";i:17;s:2:\"19\";i:18;s:2:\"20\";i:19;s:2:\"22\";i:20;s:2:\"23\";i:21;s:2:\"24\";i:22;s:2:\"25\";i:23;s:2:\"26\";i:24;s:2:\"27\";i:25;s:2:\"28\";i:26;s:2:\"29\";i:27;s:2:\"30\";i:28;s:2:\"31\";i:29;s:2:\"32\";i:30;s:2:\"33\";i:31;s:2:\"34\";i:32;s:2:\"35\";i:33;s:2:\"36\";i:34;s:2:\"37\";i:35;s:2:\"38\";i:36;s:2:\"39\";i:37;s:2:\"40\";i:38;s:2:\"41\";i:39;s:2:\"42\";i:40;s:2:\"43\";i:41;s:2:\"44\";i:42;s:2:\"45\";i:43;s:2:\"46\";i:44;s:2:\"47\";i:45;s:2:\"48\";i:46;s:2:\"49\";i:47;s:2:\"50\";i:48;s:2:\"51\";i:49;s:2:\"52\";i:50;s:2:\"53\";i:51;s:2:\"54\";i:52;s:2:\"55\";i:53;s:2:\"56\";i:54;s:2:\"57\";i:55;s:2:\"58\";i:56;s:2:\"59\";i:57;s:2:\"60\";i:58;s:2:\"61\";i:59;s:2:\"62\";i:60;s:2:\"63\";i:61;s:2:\"65\";i:62;s:2:\"66\";i:63;s:2:\"67\";i:64;s:2:\"68\";i:65;s:2:\"69\";i:66;s:2:\"70\";i:67;s:2:\"71\";i:68;s:2:\"72\";i:69;s:2:\"73\";i:70;s:2:\"74\";i:71;s:2:\"75\";i:72;s:2:\"76\";i:73;s:2:\"77\";i:74;s:2:\"78\";i:75;s:2:\"79\";i:76;s:2:\"80\";i:77;s:2:\"81\";i:78;s:2:\"82\";i:79;s:2:\"83\";i:80;s:2:\"84\";i:81;s:2:\"85\";i:82;s:2:\"86\";i:83;s:2:\"87\";i:84;s:2:\"88\";i:85;s:2:\"89\";i:86;s:2:\"90\";i:87;s:2:\"91\";i:88;s:2:\"92\";i:89;s:2:\"93\";i:90;s:2:\"94\";i:91;s:2:\"95\";i:92;s:2:\"96\";i:93;s:2:\"97\";i:94;s:2:\"98\";i:95;s:2:\"99\";i:96;s:3:\"100\";i:97;s:3:\"101\";i:98;s:3:\"102\";i:99;s:3:\"103\";i:100;s:3:\"104\";}', 'a:102:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"7\";i:6;s:1:\"8\";i:7;s:1:\"9\";i:8;s:2:\"10\";i:9;s:2:\"11\";i:10;s:2:\"12\";i:11;s:2:\"13\";i:12;s:2:\"14\";i:13;s:2:\"15\";i:14;s:2:\"16\";i:15;s:2:\"17\";i:16;s:2:\"18\";i:17;s:2:\"19\";i:18;s:2:\"20\";i:19;s:2:\"22\";i:20;s:2:\"23\";i:21;s:2:\"24\";i:22;s:2:\"25\";i:23;s:2:\"26\";i:24;s:2:\"27\";i:25;s:2:\"28\";i:26;s:2:\"29\";i:27;s:2:\"30\";i:28;s:2:\"31\";i:29;s:2:\"32\";i:30;s:2:\"33\";i:31;s:2:\"34\";i:32;s:2:\"35\";i:33;s:2:\"36\";i:34;s:2:\"37\";i:35;s:2:\"38\";i:36;s:2:\"39\";i:37;s:2:\"40\";i:38;s:2:\"41\";i:39;s:2:\"42\";i:40;s:2:\"43\";i:41;s:2:\"44\";i:42;s:2:\"45\";i:43;s:2:\"46\";i:44;s:2:\"47\";i:45;s:2:\"48\";i:46;s:2:\"49\";i:47;s:2:\"50\";i:48;s:2:\"51\";i:49;s:2:\"52\";i:50;s:2:\"53\";i:51;s:2:\"54\";i:52;s:2:\"55\";i:53;s:2:\"56\";i:54;s:2:\"57\";i:55;s:2:\"58\";i:56;s:2:\"59\";i:57;s:2:\"60\";i:58;s:2:\"61\";i:59;s:2:\"62\";i:60;s:2:\"63\";i:61;s:2:\"64\";i:62;s:2:\"65\";i:63;s:2:\"66\";i:64;s:2:\"67\";i:65;s:2:\"68\";i:66;s:2:\"69\";i:67;s:2:\"70\";i:68;s:2:\"71\";i:69;s:2:\"72\";i:70;s:2:\"73\";i:71;s:2:\"74\";i:72;s:2:\"75\";i:73;s:2:\"76\";i:74;s:2:\"77\";i:75;s:2:\"78\";i:76;s:2:\"79\";i:77;s:2:\"80\";i:78;s:2:\"81\";i:79;s:2:\"82\";i:80;s:2:\"83\";i:81;s:2:\"84\";i:82;s:2:\"85\";i:83;s:2:\"86\";i:84;s:2:\"87\";i:85;s:2:\"88\";i:86;s:2:\"89\";i:87;s:2:\"90\";i:88;s:2:\"91\";i:89;s:2:\"92\";i:90;s:2:\"93\";i:91;s:2:\"94\";i:92;s:2:\"95\";i:93;s:2:\"96\";i:94;s:2:\"97\";i:95;s:2:\"98\";i:96;s:2:\"99\";i:97;s:3:\"100\";i:98;s:3:\"101\";i:99;s:3:\"102\";i:100;s:3:\"103\";i:101;s:3:\"104\";}', 'a:103:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"7\";i:6;s:1:\"8\";i:7;s:1:\"9\";i:8;s:2:\"10\";i:9;s:2:\"11\";i:10;s:2:\"12\";i:11;s:2:\"13\";i:12;s:2:\"14\";i:13;s:2:\"15\";i:14;s:2:\"16\";i:15;s:2:\"17\";i:16;s:2:\"18\";i:17;s:2:\"19\";i:18;s:2:\"20\";i:19;s:2:\"21\";i:20;s:2:\"22\";i:21;s:2:\"23\";i:22;s:2:\"24\";i:23;s:2:\"25\";i:24;s:2:\"26\";i:25;s:2:\"27\";i:26;s:2:\"28\";i:27;s:2:\"29\";i:28;s:2:\"30\";i:29;s:2:\"31\";i:30;s:2:\"32\";i:31;s:2:\"33\";i:32;s:2:\"34\";i:33;s:2:\"35\";i:34;s:2:\"36\";i:35;s:2:\"37\";i:36;s:2:\"38\";i:37;s:2:\"39\";i:38;s:2:\"40\";i:39;s:2:\"41\";i:40;s:2:\"42\";i:41;s:2:\"43\";i:42;s:2:\"44\";i:43;s:2:\"45\";i:44;s:2:\"46\";i:45;s:2:\"47\";i:46;s:2:\"48\";i:47;s:2:\"49\";i:48;s:2:\"50\";i:49;s:2:\"51\";i:50;s:2:\"52\";i:51;s:2:\"53\";i:52;s:2:\"54\";i:53;s:2:\"55\";i:54;s:2:\"56\";i:55;s:2:\"57\";i:56;s:2:\"58\";i:57;s:2:\"59\";i:58;s:2:\"60\";i:59;s:2:\"61\";i:60;s:2:\"62\";i:61;s:2:\"63\";i:62;s:2:\"64\";i:63;s:2:\"65\";i:64;s:2:\"66\";i:65;s:2:\"67\";i:66;s:2:\"68\";i:67;s:2:\"69\";i:68;s:2:\"70\";i:69;s:2:\"71\";i:70;s:2:\"72\";i:71;s:2:\"73\";i:72;s:2:\"74\";i:73;s:2:\"75\";i:74;s:2:\"76\";i:75;s:2:\"77\";i:76;s:2:\"78\";i:77;s:2:\"79\";i:78;s:2:\"80\";i:79;s:2:\"81\";i:80;s:2:\"82\";i:81;s:2:\"83\";i:82;s:2:\"84\";i:83;s:2:\"85\";i:84;s:2:\"86\";i:85;s:2:\"87\";i:86;s:2:\"88\";i:87;s:2:\"89\";i:88;s:2:\"90\";i:89;s:2:\"91\";i:90;s:2:\"92\";i:91;s:2:\"93\";i:92;s:2:\"94\";i:93;s:2:\"95\";i:94;s:2:\"96\";i:95;s:2:\"97\";i:96;s:2:\"98\";i:97;s:2:\"99\";i:98;s:3:\"100\";i:99;s:3:\"101\";i:100;s:3:\"102\";i:101;s:3:\"103\";i:102;s:3:\"104\";}', 0, 0, '2018-03-20 22:36:04', '2018-05-29 22:56:40'),
(2, 2, 1, 'a:15:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:2:\"69\";i:8;s:2:\"70\";i:9;s:2:\"71\";i:10;s:2:\"72\";i:11;s:2:\"73\";i:12;s:2:\"74\";i:13;s:2:\"75\";i:14;s:2:\"76\";}', 'a:15:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:2:\"69\";i:8;s:2:\"70\";i:9;s:2:\"71\";i:10;s:2:\"72\";i:11;s:2:\"73\";i:12;s:2:\"74\";i:13;s:2:\"75\";i:14;s:2:\"76\";}', 'a:15:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:2:\"69\";i:8;s:2:\"70\";i:9;s:2:\"71\";i:10;s:2:\"72\";i:11;s:2:\"73\";i:12;s:2:\"74\";i:13;s:2:\"75\";i:14;s:2:\"76\";}', 'a:15:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:2:\"69\";i:8;s:2:\"70\";i:9;s:2:\"71\";i:10;s:2:\"72\";i:11;s:2:\"73\";i:12;s:2:\"74\";i:13;s:2:\"75\";i:14;s:2:\"76\";}', 0, 0, '2018-04-04 03:40:02', '2018-04-04 03:40:02'),
(3, 3, 2, 'a:76:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";i:10;s:2:\"11\";i:11;s:2:\"12\";i:12;s:2:\"13\";i:13;s:2:\"14\";i:14;s:2:\"15\";i:15;s:2:\"16\";i:16;s:2:\"17\";i:17;s:2:\"18\";i:18;s:2:\"19\";i:19;s:2:\"20\";i:20;s:2:\"21\";i:21;s:2:\"22\";i:22;s:2:\"23\";i:23;s:2:\"24\";i:24;s:2:\"25\";i:25;s:2:\"26\";i:26;s:2:\"27\";i:27;s:2:\"28\";i:28;s:2:\"29\";i:29;s:2:\"30\";i:30;s:2:\"31\";i:31;s:2:\"32\";i:32;s:2:\"33\";i:33;s:2:\"34\";i:34;s:2:\"35\";i:35;s:2:\"36\";i:36;s:2:\"37\";i:37;s:2:\"38\";i:38;s:2:\"39\";i:39;s:2:\"40\";i:40;s:2:\"41\";i:41;s:2:\"42\";i:42;s:2:\"43\";i:43;s:2:\"44\";i:44;s:2:\"45\";i:45;s:2:\"46\";i:46;s:2:\"47\";i:47;s:2:\"48\";i:48;s:2:\"49\";i:49;s:2:\"50\";i:50;s:2:\"51\";i:51;s:2:\"52\";i:52;s:2:\"53\";i:53;s:2:\"54\";i:54;s:2:\"55\";i:55;s:2:\"56\";i:56;s:2:\"57\";i:57;s:2:\"58\";i:58;s:2:\"59\";i:59;s:2:\"60\";i:60;s:2:\"61\";i:61;s:2:\"62\";i:62;s:2:\"63\";i:63;s:2:\"64\";i:64;s:2:\"65\";i:65;s:2:\"66\";i:66;s:2:\"67\";i:67;s:2:\"68\";i:68;s:2:\"69\";i:69;s:2:\"70\";i:70;s:2:\"71\";i:71;s:2:\"72\";i:72;s:2:\"73\";i:73;s:2:\"74\";i:74;s:2:\"75\";i:75;s:2:\"76\";}', 'a:76:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";i:10;s:2:\"11\";i:11;s:2:\"12\";i:12;s:2:\"13\";i:13;s:2:\"14\";i:14;s:2:\"15\";i:15;s:2:\"16\";i:16;s:2:\"17\";i:17;s:2:\"18\";i:18;s:2:\"19\";i:19;s:2:\"20\";i:20;s:2:\"21\";i:21;s:2:\"22\";i:22;s:2:\"23\";i:23;s:2:\"24\";i:24;s:2:\"25\";i:25;s:2:\"26\";i:26;s:2:\"27\";i:27;s:2:\"28\";i:28;s:2:\"29\";i:29;s:2:\"30\";i:30;s:2:\"31\";i:31;s:2:\"32\";i:32;s:2:\"33\";i:33;s:2:\"34\";i:34;s:2:\"35\";i:35;s:2:\"36\";i:36;s:2:\"37\";i:37;s:2:\"38\";i:38;s:2:\"39\";i:39;s:2:\"40\";i:40;s:2:\"41\";i:41;s:2:\"42\";i:42;s:2:\"43\";i:43;s:2:\"44\";i:44;s:2:\"45\";i:45;s:2:\"46\";i:46;s:2:\"47\";i:47;s:2:\"48\";i:48;s:2:\"49\";i:49;s:2:\"50\";i:50;s:2:\"51\";i:51;s:2:\"52\";i:52;s:2:\"53\";i:53;s:2:\"54\";i:54;s:2:\"55\";i:55;s:2:\"56\";i:56;s:2:\"57\";i:57;s:2:\"58\";i:58;s:2:\"59\";i:59;s:2:\"60\";i:60;s:2:\"61\";i:61;s:2:\"62\";i:62;s:2:\"63\";i:63;s:2:\"64\";i:64;s:2:\"65\";i:65;s:2:\"66\";i:66;s:2:\"67\";i:67;s:2:\"68\";i:68;s:2:\"69\";i:69;s:2:\"70\";i:70;s:2:\"71\";i:71;s:2:\"72\";i:72;s:2:\"73\";i:73;s:2:\"74\";i:74;s:2:\"75\";i:75;s:2:\"76\";}', 'a:76:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";i:10;s:2:\"11\";i:11;s:2:\"12\";i:12;s:2:\"13\";i:13;s:2:\"14\";i:14;s:2:\"15\";i:15;s:2:\"16\";i:16;s:2:\"17\";i:17;s:2:\"18\";i:18;s:2:\"19\";i:19;s:2:\"20\";i:20;s:2:\"21\";i:21;s:2:\"22\";i:22;s:2:\"23\";i:23;s:2:\"24\";i:24;s:2:\"25\";i:25;s:2:\"26\";i:26;s:2:\"27\";i:27;s:2:\"28\";i:28;s:2:\"29\";i:29;s:2:\"30\";i:30;s:2:\"31\";i:31;s:2:\"32\";i:32;s:2:\"33\";i:33;s:2:\"34\";i:34;s:2:\"35\";i:35;s:2:\"36\";i:36;s:2:\"37\";i:37;s:2:\"38\";i:38;s:2:\"39\";i:39;s:2:\"40\";i:40;s:2:\"41\";i:41;s:2:\"42\";i:42;s:2:\"43\";i:43;s:2:\"44\";i:44;s:2:\"45\";i:45;s:2:\"46\";i:46;s:2:\"47\";i:47;s:2:\"48\";i:48;s:2:\"49\";i:49;s:2:\"50\";i:50;s:2:\"51\";i:51;s:2:\"52\";i:52;s:2:\"53\";i:53;s:2:\"54\";i:54;s:2:\"55\";i:55;s:2:\"56\";i:56;s:2:\"57\";i:57;s:2:\"58\";i:58;s:2:\"59\";i:59;s:2:\"60\";i:60;s:2:\"61\";i:61;s:2:\"62\";i:62;s:2:\"63\";i:63;s:2:\"64\";i:64;s:2:\"65\";i:65;s:2:\"66\";i:66;s:2:\"67\";i:67;s:2:\"68\";i:68;s:2:\"69\";i:69;s:2:\"70\";i:70;s:2:\"71\";i:71;s:2:\"72\";i:72;s:2:\"73\";i:73;s:2:\"74\";i:74;s:2:\"75\";i:75;s:2:\"76\";}', 'a:76:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";i:10;s:2:\"11\";i:11;s:2:\"12\";i:12;s:2:\"13\";i:13;s:2:\"14\";i:14;s:2:\"15\";i:15;s:2:\"16\";i:16;s:2:\"17\";i:17;s:2:\"18\";i:18;s:2:\"19\";i:19;s:2:\"20\";i:20;s:2:\"21\";i:21;s:2:\"22\";i:22;s:2:\"23\";i:23;s:2:\"24\";i:24;s:2:\"25\";i:25;s:2:\"26\";i:26;s:2:\"27\";i:27;s:2:\"28\";i:28;s:2:\"29\";i:29;s:2:\"30\";i:30;s:2:\"31\";i:31;s:2:\"32\";i:32;s:2:\"33\";i:33;s:2:\"34\";i:34;s:2:\"35\";i:35;s:2:\"36\";i:36;s:2:\"37\";i:37;s:2:\"38\";i:38;s:2:\"39\";i:39;s:2:\"40\";i:40;s:2:\"41\";i:41;s:2:\"42\";i:42;s:2:\"43\";i:43;s:2:\"44\";i:44;s:2:\"45\";i:45;s:2:\"46\";i:46;s:2:\"47\";i:47;s:2:\"48\";i:48;s:2:\"49\";i:49;s:2:\"50\";i:50;s:2:\"51\";i:51;s:2:\"52\";i:52;s:2:\"53\";i:53;s:2:\"54\";i:54;s:2:\"55\";i:55;s:2:\"56\";i:56;s:2:\"57\";i:57;s:2:\"58\";i:58;s:2:\"59\";i:59;s:2:\"60\";i:60;s:2:\"61\";i:61;s:2:\"62\";i:62;s:2:\"63\";i:63;s:2:\"64\";i:64;s:2:\"65\";i:65;s:2:\"66\";i:66;s:2:\"67\";i:67;s:2:\"68\";i:68;s:2:\"69\";i:69;s:2:\"70\";i:70;s:2:\"71\";i:71;s:2:\"72\";i:72;s:2:\"73\";i:73;s:2:\"74\";i:74;s:2:\"75\";i:75;s:2:\"76\";}', 0, 0, '2018-04-26 05:19:56', '2018-04-26 05:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `roll_packing`
--

CREATE TABLE `roll_packing` (
  `roll_packing_id` int(10) UNSIGNED NOT NULL,
  `from_kgs` decimal(15,3) NOT NULL,
  `to_kgs` decimal(15,3) NOT NULL,
  `profit_kgs` decimal(15,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roll_packing`
--

INSERT INTO `roll_packing` (`roll_packing_id`, `from_kgs`, `to_kgs`, `profit_kgs`, `created_at`, `updated_at`) VALUES
(1, '1.000', '3.000', '5.000', '2017-09-21 03:52:34', '2017-09-21 03:52:34'),
(2, '2.000', '10000000.000', '2.000', '2017-09-21 03:53:45', '2017-09-21 03:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `roll_profit_price`
--

CREATE TABLE `roll_profit_price` (
  `product_roll_profit_id` int(10) UNSIGNED NOT NULL,
  `from_kg` int(11) NOT NULL,
  `to_kg` int(11) NOT NULL,
  `profit_kg` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roll_profit_price`
--

INSERT INTO `roll_profit_price` (`product_roll_profit_id`, `from_kg`, `to_kg`, `profit_kg`, `created_at`, `updated_at`) VALUES
(1, 0, 50, '300.00', '2017-09-20 23:30:15', '2017-09-20 23:30:15'),
(2, 501, 600, '34.00', '2017-09-20 23:31:36', '2017-09-20 23:31:36'),
(3, 601, 750, '33.00', '2017-09-20 23:32:47', '2017-09-20 23:32:47'),
(4, 751, 1000, '30.00', '2017-09-20 23:33:21', '2017-09-20 23:33:21'),
(5, 1001, 10000000, '25.00', '2017-09-20 23:34:24', '2017-09-20 23:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `roll_quantity`
--

CREATE TABLE `roll_quantity` (
  `roll_quantity_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plus_minus_quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roll_quantity`
--

INSERT INTO `roll_quantity` (`roll_quantity_id`, `quantity`, `quantity_type`, `plus_minus_quantity`, `status`, `created_at`, `updated_at`) VALUES
(2, 89, 'Kgs', 533, 0, '2017-09-20 04:25:38', '2017-10-17 04:34:08'),
(3, 56, 'Meter', 5, 1, '2017-09-20 05:09:23', '2017-09-20 05:09:23'),
(4, 89, 'Prices', 36, 1, '2017-09-20 05:43:35', '2017-09-20 05:43:51'),
(5, 15, 'Meter', 15, 1, '2017-09-29 00:22:42', '2017-09-29 00:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `roll_transport`
--

CREATE TABLE `roll_transport` (
  `roll_transport_id` int(10) UNSIGNED NOT NULL,
  `from_kgs` int(11) NOT NULL,
  `to_kgs` int(11) NOT NULL,
  `profit_kgs` decimal(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roll_transport`
--

INSERT INTO `roll_transport` (`roll_transport_id`, `from_kgs`, `to_kgs`, `profit_kgs`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 0, 100, '2.00', 0, 0, '2017-09-21 05:07:40', '2017-09-21 05:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `roll_wastage`
--

CREATE TABLE `roll_wastage` (
  `roll_wastage_id` int(10) UNSIGNED NOT NULL,
  `from_kg` int(11) NOT NULL,
  `to_kg` int(11) NOT NULL,
  `wastage_meter` decimal(8,2) NOT NULL,
  `wastage_kg` decimal(8,2) NOT NULL,
  `wastage_piece` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roll_wastage`
--

INSERT INTO `roll_wastage` (`roll_wastage_id`, `from_kg`, `to_kg`, `wastage_meter`, `wastage_kg`, `wastage_piece`, `created_at`, `updated_at`) VALUES
(1, 0, 50, '0.00', '50.00', '0.00', '2017-09-21 05:46:27', '2017-09-21 05:46:27'),
(2, 51, 100, '0.00', '35.00', '0.00', '2017-09-21 05:46:45', '2017-09-21 05:46:45'),
(3, 101, 150, '0.00', '30.00', '0.00', '2017-09-21 05:47:06', '2017-09-21 05:47:06'),
(4, 151, 300, '0.00', '15.00', '0.00', '2017-09-21 05:47:21', '2017-09-21 05:47:21'),
(5, 300, 500000, '0.00', '13.00', '0.00', '2017-09-21 05:47:43', '2017-09-21 05:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `size_masters`
--

CREATE TABLE `size_masters` (
  `size_master_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_zipper_id` int(11) NOT NULL,
  `volume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `width` decimal(10,3) NOT NULL,
  `height` decimal(10,3) NOT NULL,
  `gusset` decimal(10,2) NOT NULL,
  `weight` decimal(15,3) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size_masters`
--

INSERT INTO `size_masters` (`size_master_id`, `product_id`, `product_zipper_id`, `volume`, `width`, `height`, `gusset`, `weight`, `status`, `created_at`, `updated_at`) VALUES
(32, 11, 2, '45', '65.000', '54.000', '0.00', '88.000', 0, NULL, '2017-11-23 04:55:16'),
(33, 11, 1, '4', '54.000', '4.000', '0.00', '99.000', 0, NULL, '2017-11-23 04:55:16'),
(34, 11, 6, '45', '465.000', '12.000', '0.00', '0.000', 0, NULL, '2017-11-23 04:55:16'),
(38, 10, 1, '1.00', '2.000', '3.000', '4.00', '0.000', 0, NULL, '2018-05-21 03:42:29'),
(39, 11, 1, '22', '22.000', '22.000', '0.00', '22.000', 0, NULL, '2017-11-23 04:55:16'),
(40, 28, 3, '17', '17.000', '19.000', '0.00', '0.000', 0, NULL, '2017-11-16 05:34:53'),
(41, 10, 2, '5.00', '5.000', '5.000', '5.55', '0.000', 0, NULL, '2018-05-21 03:42:29'),
(42, 10, 3, '4', '5.000', '4.000', '5.00', '0.000', 0, NULL, '2018-05-21 03:42:29'),
(43, 10, 5, '22', '1.000', '10.000', '3.00', '0.000', 0, NULL, '2018-05-21 03:42:29'),
(45, 28, 2, '8', '8.000', '8.000', '0.00', '0.000', 0, NULL, NULL),
(46, 10, 2, '500 gm', '2.000', '2.000', '2.00', '0.000', 0, NULL, '2018-05-21 03:42:29'),
(47, 11, 3, '21', '43.000', '54.000', '0.00', '322.000', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spout`
--

CREATE TABLE `spout` (
  `spout_id` int(10) UNSIGNED NOT NULL,
  `spout_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spout_name_spanish` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spout_abbr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `wastage` decimal(8,2) NOT NULL,
  `spout_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spout_min_qty` int(11) NOT NULL,
  `by_air` decimal(8,2) NOT NULL,
  `by_sea` decimal(8,2) NOT NULL,
  `weight_kgs` double(8,2) NOT NULL,
  `additional_packaging_price` double(8,2) NOT NULL,
  `additional_profit_pouch` decimal(8,2) NOT NULL,
  `serial_no` int(11) NOT NULL,
  `weight` decimal(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `spout`
--

INSERT INTO `spout` (`spout_id`, `spout_name`, `spout_name_spanish`, `spout_abbr`, `price`, `wastage`, `spout_unit`, `spout_min_qty`, `by_air`, `by_sea`, `weight_kgs`, `additional_packaging_price`, `additional_profit_pouch`, `serial_no`, `weight`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(3, '10 mm', '10 mm', 'mkl', '5.00', '5.00', '4', 5, '5.00', '5.00', 5.00, 5.00, '5.00', 5, '5.00', 1, 0, '2017-10-10 00:23:49', '2017-11-16 03:42:46'),
(4, 'IPN Chill spout (for Juice)', 'IPN Chill spout (for Juice)', 'tt', '3.00', '4.00', '1', 2, '5.00', '6.00', 7.00, 8.00, '9.00', 11, '12.00', 1, 0, '2017-10-10 00:41:11', '2017-11-16 03:44:17'),
(5, '22 mm', '22 mm', 'l', '5.00', '5.00', '7', 8, '5.00', '5.00', 5.00, 5.00, '5.00', 5, '5.00', 1, 0, '2017-10-10 00:43:11', '2017-11-16 03:42:57'),
(6, 'No Spout', 'No Spout', 'eee', '2.00', '65.00', '7', 5, '32.00', '2.00', 52.00, 2.00, '2.00', 2, '2.00', 0, 0, '2017-10-10 00:46:02', '2017-11-16 03:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `spout_pouch_size_master`
--

CREATE TABLE `spout_pouch_size_master` (
  `size_master_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `spout_type_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `volume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `gusset` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `spout_pouch_size_master`
--

INSERT INTO `spout_pouch_size_master` (`size_master_id`, `product_id`, `spout_type_id`, `volume`, `width`, `height`, `gusset`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'Corner', '11 gm', 22, 11, 22, 0, '2017-11-07 23:33:48', '2017-11-23 05:23:44'),
(32, 10, 'Corner', '22 ml', 11, 22, 33, 0, NULL, '2017-11-23 05:23:44'),
(34, 11, 'Corner', '11 inch', 99, 88, 77, 0, NULL, '2017-11-13 22:12:01'),
(44, 11, 'Center', '10 ltr', 77, 88, 99, 0, NULL, '2017-11-13 22:12:01'),
(45, 11, 'Center', '55 ml', 11, 22, 33, 0, NULL, '2017-11-13 22:12:01'),
(46, 11, 'Corner', '44 mm', 555, 66, 6, 0, NULL, '2017-11-13 22:12:01'),
(47, 11, 'Corner', '77 cm', 88, 99, 99, 0, NULL, '2017-11-13 22:12:01'),
(48, 10, 'Corner', '55 ltr', 55, 55, 66, 0, NULL, '2017-11-23 05:23:44'),
(50, 10, 'Corner', '33 inch', 77, 88, 99, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_profit`
--

CREATE TABLE `stock_profit` (
  `stock_profit_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_id` int(11) NOT NULL,
  `size_master_id` int(11) NOT NULL,
  `height` decimal(8,2) NOT NULL,
  `width` decimal(8,2) NOT NULL,
  `gusset` decimal(8,2) NOT NULL,
  `volume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profit` decimal(8,2) NOT NULL,
  `profit_poor` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_profit`
--

INSERT INTO `stock_profit` (`stock_profit_id`, `product_id`, `quantity_id`, `size_master_id`, `height`, `width`, `gusset`, `volume`, `profit`, `profit_poor`, `created_at`, `updated_at`) VALUES
(1, 11, 10, 0, '0.00', '0.00', '0.00', '', '4.00', '4.00', '2017-11-13 00:36:16', '2017-11-13 00:36:16'),
(2, 11, 10, 0, '0.00', '0.00', '0.00', '', '6.00', '6.00', '2017-11-13 00:37:26', '2017-11-13 00:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `stock_profit_by_sea`
--

CREATE TABLE `stock_profit_by_sea` (
  `stock_profit_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_id` int(11) NOT NULL,
  `size_master_id` int(11) NOT NULL,
  `height` decimal(8,2) NOT NULL,
  `width` decimal(8,2) NOT NULL,
  `gusset` decimal(8,2) NOT NULL,
  `volume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profit` decimal(8,2) NOT NULL,
  `profit_poor` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_wastage`
--

CREATE TABLE `stock_wastage` (
  `stock_wastage_id` int(10) UNSIGNED NOT NULL,
  `from_quantity` int(11) NOT NULL,
  `to_quantity` int(11) NOT NULL,
  `wastage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_wastage`
--

INSERT INTO `stock_wastage` (`stock_wastage_id`, `from_quantity`, `to_quantity`, `wastage`, `created_at`, `updated_at`) VALUES
(1, 11, 2, '2,1,2,3,1,3,3,3', '2017-10-12 02:26:58', '2017-10-12 02:26:58'),
(2, 22, 3, '6,4,5,4,4,4,4,8', '2017-10-12 23:29:15', '2017-10-12 23:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `storezo_detail`
--

CREATE TABLE `storezo_detail` (
  `storezo_id` int(10) UNSIGNED NOT NULL,
  `storezo_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `basic_price` decimal(8,2) NOT NULL,
  `wastage` decimal(8,2) NOT NULL,
  `storezo_weight` decimal(8,2) NOT NULL,
  `select_volume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cable_ties_price` decimal(8,2) NOT NULL,
  `cable_ties_weight` double(8,2) NOT NULL,
  `transport_price` decimal(8,2) NOT NULL,
  `packing_price` decimal(8,2) NOT NULL,
  `profit_price_rich` decimal(8,2) NOT NULL,
  `profit_price_poor` decimal(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `storezo_detail`
--

INSERT INTO `storezo_detail` (`storezo_id`, `storezo_name`, `basic_price`, `wastage`, `storezo_weight`, `select_volume`, `cable_ties_price`, `cable_ties_weight`, `transport_price`, `packing_price`, `profit_price_rich`, `profit_price_poor`, `status`, `created_at`, `updated_at`) VALUES
(3, 'storezo 25 kg', '12.00', '12.00', '12.00', '25 kg', '12.00', 12.00, '12.00', '12.00', '12.00', '12.00', 0, '2017-09-29 23:25:49', '2017-09-29 23:25:49'),
(4, 'storezo 50 kg', '25.00', '25.00', '25.00', '50 kg', '25.00', 25.00, '25.00', '25.00', '25.00', '25.00', 1, '2017-09-29 23:26:25', '2017-09-29 23:26:25'),
(5, 'storezo 75 kg', '55.00', '55.00', '55.00', '75 kg', '55.00', 555.00, '55.00', '55.00', '55.00', '55.00', 1, '2017-09-29 23:27:47', '2017-09-29 23:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `taxation`
--

CREATE TABLE `taxation` (
  `taxation_id` int(10) UNSIGNED NOT NULL,
  `excies` decimal(8,2) NOT NULL,
  `cst_with_form_c` decimal(8,2) NOT NULL,
  `cst_without_form_c` decimal(8,2) NOT NULL,
  `vat` decimal(8,2) NOT NULL,
  `cgst` decimal(8,2) NOT NULL,
  `sgst` decimal(8,2) NOT NULL,
  `igst` decimal(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `tax_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `template_measurement`
--

CREATE TABLE `template_measurement` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `template_measurement`
--

INSERT INTO `template_measurement` (`product_id`, `measurement`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kg', 1, '2017-10-13 00:40:57', '2017-10-13 00:40:57'),
(2, 'gm', 1, '2017-10-13 00:41:21', '2017-10-13 00:41:21'),
(3, 'ml', 1, '2017-10-13 00:41:43', '2017-10-13 00:41:43'),
(4, 'ltr', 1, '2017-10-13 00:41:59', '2017-10-13 00:41:59'),
(5, 'mm', 1, '2017-10-13 00:42:14', '2017-10-13 00:42:14'),
(6, 'cc', 1, '2017-10-13 00:42:29', '2017-10-13 00:42:29'),
(7, 'inch', 1, '2017-10-13 00:42:44', '2017-10-13 00:42:44'),
(8, 'Oz', 1, '2018-05-22 22:22:36', '2018-05-22 22:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `template_quantity`
--

CREATE TABLE `template_quantity` (
  `template_quantity_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `template_quantity`
--

INSERT INTO `template_quantity` (`template_quantity_id`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(4, 25, 0, '2017-09-30 02:27:19', '2017-10-26 01:16:40'),
(5, 50, 1, '2017-09-30 02:27:30', '2017-10-26 06:07:56'),
(7, 99, 1, '2017-10-27 00:01:34', '2017-11-20 04:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `template_volume`
--

CREATE TABLE `template_volume` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `volume` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `measurement_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `template_volume`
--

INSERT INTO `template_volume` (`product_id`, `volume`, `measurement_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '22', 5, 0, '2017-10-13 00:43:59', '2017-12-15 00:38:30'),
(2, '77', 2, 1, '2017-10-13 00:49:41', '2017-10-13 00:49:41'),
(3, '55', 1, 1, '2017-10-13 00:49:55', '2017-10-13 00:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `unit_master`
--

CREATE TABLE `unit_master` (
  `unit_id` int(10) UNSIGNED NOT NULL,
  `product_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unit_master`
--

INSERT INTO `unit_master` (`unit_id`, `product_unit`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(3, 'cm', 1, 0, '2017-09-15 04:42:03', '2017-11-28 23:23:57'),
(6, 'gm', 1, 0, '2017-09-15 04:57:15', '2017-10-07 03:00:50'),
(7, 'kg', 1, 0, '2017-10-07 03:12:01', '2017-10-31 06:11:50'),
(8, 'ltr', 1, 0, '2017-10-07 03:16:48', '2017-10-31 06:11:58'),
(9, 'asd', 0, 0, NULL, '2017-10-31 06:11:55'),
(10, 'asd', 0, 0, NULL, NULL),
(11, 'asd', 0, 0, NULL, NULL),
(12, 'asdfa', 0, 0, NULL, NULL),
(13, 's', 0, 0, NULL, NULL),
(14, 'sdfg', 0, 0, NULL, NULL),
(15, 'hsg', 0, 0, NULL, NULL),
(16, 'adhf', 0, 0, NULL, NULL),
(17, 'hryws', 0, 0, NULL, NULL),
(18, 'ahdf', 0, 0, NULL, NULL),
(19, 'KG', 1, 0, '2017-11-21 05:43:48', '2017-11-21 05:43:48'),
(20, 'f', 0, 0, '2017-12-05 22:35:49', '2017-12-05 22:35:49'),
(21, 'dfasf', 0, 0, '2017-12-05 23:43:51', '2017-12-05 23:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `textpassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `name`, `email`, `textpassword`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'testing@test.com', 'admin@123', '$2y$10$e8TBXGop8fVrOD.x5MADv.qGdVdnGPVDipSfTnrOkV9aQDORBkmk.', 'j8forWRooV9Yp0TVhZMYmyc9tn64UYe4z5a1bKdJh2AMoCX0EDE3DTcbuCng', '2018-03-20 18:30:00', '2018-05-29 22:27:52'),
(2, 1, 'Smit', 'smit@smit.com', 'smit123', '$2y$10$pPf0XEsjF3ch9b1hrOTyl.G1u6dH2u5UaIG5emJggpOiJPaip/W8.', 'F2elmQKuK9ooIXiQdouWsKBVsZNheimXr2XTswbhO5kIUtXT6aNt7bWy4SEP', '2018-04-03 23:54:47', '2018-05-29 22:28:30'),
(3, 2, 'Sofia', 'sofia@sofia.com', 'sofia123', '$2y$10$SegRR5lm4N1q.TnDcb2j6.GGGfnZTXWovOk1ZHfPyWangwq2hcv8u', 'oDfhlAkB9U4M0xQm2c2LdxNXmyTdoVKZlzDl90kTyXm7LBf72yqjBaiUYqfb', '2018-04-04 00:07:42', '2018-05-13 23:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_personal_details`
--

CREATE TABLE `user_personal_details` (
  `user_personal_details_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_personal_details`
--

INSERT INTO `user_personal_details` (`user_personal_details_id`, `user_id`, `company_logo`, `first_name`, `last_name`, `telephone`, `postal_code`, `city`, `state`, `country_id`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 'Company_logo_swisspackCoInLogo.jpg', 'Prashant', 'vachhani', 9876543210, 391440, 'baroda', 'guj', 10, 1, 1, '2018-04-03 23:30:42', '2018-04-13 00:22:26'),
(2, 2, 'Company_logo_Pouch-Direct-Logo-Concept.jpg', 'smit', 'jani', 9876543210, 391440, 'baroda', 'guj', 1, 1, 0, '2018-04-03 23:54:47', '2018-04-12 00:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `name`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 0, '2018-04-03 23:25:33', '2018-04-03 23:25:33'),
(2, 'Executive', 1, 0, '2018-04-03 23:25:40', '2018-04-03 23:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_info`
--

CREATE TABLE `vendor_info` (
  `vendor_info_id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendor_first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendor_last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_item_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postcode` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vendor_info`
--

INSERT INTO `vendor_info` (`vendor_info_id`, `company_name`, `vendor_first_name`, `vendor_last_name`, `product_item_id`, `address`, `contact_no`, `email_id`, `country`, `state`, `city`, `fax_no`, `postcode`, `status`, `remark`, `bank_detail`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'swisspack', 'prashant', 'vanchhani', '1', 'dabhasa', '7845123690', 'pV@swisspack.com', 'India', 'Gujarat', 'Vadodara', '7845421', 391440, 1, 'dddd', '1451456562', 0, '2017-10-01 18:30:00', '2017-10-01 18:30:00'),
(2, 'swisspack', 'shrishrir', 'vanchhani', '3', 'dabhasa', '457544524', 'sV@swisspack.com', 'India', 'Gujarat', 'Vadodara', '7845421', 391440, 1, 'dddd', '1451456562', 0, '2017-10-01 18:30:00', '2017-10-01 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `zipper`
--

CREATE TABLE `zipper` (
  `zipper_id` int(10) UNSIGNED NOT NULL,
  `zipper_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipper_abbrevation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zipper_price`
--

CREATE TABLE `zipper_price` (
  `product_zipper_id` int(10) UNSIGNED NOT NULL,
  `zipper_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipper_name_spanish` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipper_abbr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipper_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipper_min_qty` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `wastage` decimal(8,2) NOT NULL,
  `Weight` double(8,2) NOT NULL,
  `serial_no` int(11) NOT NULL,
  `slider_price` decimal(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zipper_price`
--

INSERT INTO `zipper_price` (`product_zipper_id`, `zipper_name`, `zipper_name_spanish`, `zipper_abbr`, `zipper_unit`, `zipper_min_qty`, `price`, `wastage`, `Weight`, `serial_no`, `slider_price`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'No zip', '', 'NZ', '2', 2, '2.00', '2.00', 2.00, 2, '2.00', 1, 0, '2017-10-30 00:09:47', '2017-11-22 02:34:35'),
(2, 'Powder Proof Zipper', '', 'PPZ', '3', 3, '3.00', '3.00', 3.00, 3, '3.00', 1, 0, '2017-10-30 00:10:14', '2017-10-30 00:10:14'),
(3, 'Slider Zipper', '', 'SZ', '5', 5, '5.00', '5.00', 55.00, 6, '5.00', 1, 0, '2017-10-30 00:10:39', '2017-10-30 00:10:39'),
(4, 'TinTie 120mm / 70mm adhesive - Black', '', 'TT120B', '1', 1, '1.00', '1.00', 1.00, 1, '1.00', 1, 0, '2017-10-30 00:10:57', '2017-10-30 00:10:57'),
(5, 'TinTie 120mm / 70mm adhesive - Kraft Color', '', 'TT120K', '1', 1, '1.00', '1.00', 1.00, 1, '11.00', 1, 0, '2017-10-30 00:11:16', '2017-10-30 00:11:16'),
(6, 'TinTie 120mm / 70mm adhesive - White', '', 'TT120W', '2', 2, '2.00', '2.00', 222.00, 2, '2.00', 1, 0, '2017-10-30 00:11:44', '2017-10-30 00:11:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adhesive`
--
ALTER TABLE `adhesive`
  ADD PRIMARY KEY (`adhesive_id`);

--
-- Indexes for table `adhesive_solvent`
--
ALTER TABLE `adhesive_solvent`
  ADD PRIMARY KEY (`adhesive_solvent_id`);

--
-- Indexes for table `admin_gress_details`
--
ALTER TABLE `admin_gress_details`
  ADD PRIMARY KEY (`admin_gress_details_id`);

--
-- Indexes for table `admin_gress_percentage`
--
ALTER TABLE `admin_gress_percentage`
  ADD PRIMARY KEY (`admin_gress_percentage_id`);

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `associated_accounts`
--
ALTER TABLE `associated_accounts`
  ADD PRIMARY KEY (`associated_accounts_id`);

--
-- Indexes for table `bank_detail`
--
ALTER TABLE `bank_detail`
  ADD PRIMARY KEY (`bank_detail_id`);

--
-- Indexes for table `color_category`
--
ALTER TABLE `color_category`
  ADD PRIMARY KEY (`color_category_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`),
  ADD UNIQUE KEY `contacts_customer_email_unique` (`customer_email`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`courier_id`);

--
-- Indexes for table `cpp_adhesive`
--
ALTER TABLE `cpp_adhesive`
  ADD PRIMARY KEY (`cpp_adhesive_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `custom_ink_mul`
--
ALTER TABLE `custom_ink_mul`
  ADD PRIMARY KEY (`custom_ink_mul_id`);

--
-- Indexes for table `cylinder_base_price`
--
ALTER TABLE `cylinder_base_price`
  ADD PRIMARY KEY (`cylinder_base_price_id`);

--
-- Indexes for table `cylinder_currency`
--
ALTER TABLE `cylinder_currency`
  ADD PRIMARY KEY (`cylinder_currency_id`);

--
-- Indexes for table `cylinder_vendor`
--
ALTER TABLE `cylinder_vendor`
  ADD PRIMARY KEY (`cylinder_vendor_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`employee_details_id`);

--
-- Indexes for table `enquiry_industry`
--
ALTER TABLE `enquiry_industry`
  ADD PRIMARY KEY (`enquiry_industry_id`);

--
-- Indexes for table `enquiry_source`
--
ALTER TABLE `enquiry_source`
  ADD PRIMARY KEY (`enquiry_source_id`);

--
-- Indexes for table `ink_master`
--
ALTER TABLE `ink_master`
  ADD PRIMARY KEY (`ink_master_id`);

--
-- Indexes for table `ink_solvent`
--
ALTER TABLE `ink_solvent`
  ADD PRIMARY KEY (`ink_solvent_id`);

--
-- Indexes for table `job_master`
--
ALTER TABLE `job_master`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `machine_master`
--
ALTER TABLE `machine_master`
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table `mailer_bag_color`
--
ALTER TABLE `mailer_bag_color`
  ADD PRIMARY KEY (`plastic_color_id`);

--
-- Indexes for table `measurement`
--
ALTER TABLE `measurement`
  ADD PRIMARY KEY (`measurement_id`);

--
-- Indexes for table `menu_permission`
--
ALTER TABLE `menu_permission`
  ADD PRIMARY KEY (`menu_permission_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pouch_color`
--
ALTER TABLE `pouch_color`
  ADD PRIMARY KEY (`pouch_color_id`);

--
-- Indexes for table `pouch_style`
--
ALTER TABLE `pouch_style`
  ADD PRIMARY KEY (`pouch_style_id`);

--
-- Indexes for table `printing_effect`
--
ALTER TABLE `printing_effect`
  ADD PRIMARY KEY (`printing_effect_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `production_layer_material`
--
ALTER TABLE `production_layer_material`
  ADD PRIMARY KEY (`material_layer_id`);

--
-- Indexes for table `production_process`
--
ALTER TABLE `production_process`
  ADD PRIMARY KEY (`production_process_id`);

--
-- Indexes for table `production_user_type`
--
ALTER TABLE `production_user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `product_accessorie`
--
ALTER TABLE `product_accessorie`
  ADD PRIMARY KEY (`accessorie_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `product_inward`
--
ALTER TABLE `product_inward`
  ADD PRIMARY KEY (`product_inward_id`);

--
-- Indexes for table `product_item_info`
--
ALTER TABLE `product_item_info`
  ADD PRIMARY KEY (`product_item_id`);

--
-- Indexes for table `product_layer`
--
ALTER TABLE `product_layer`
  ADD PRIMARY KEY (`product_layer_id`);

--
-- Indexes for table `product_make`
--
ALTER TABLE `product_make`
  ADD PRIMARY KEY (`make_id`);

--
-- Indexes for table `product_material`
--
ALTER TABLE `product_material`
  ADD PRIMARY KEY (`product_material_id`);

--
-- Indexes for table `product_material_quantity`
--
ALTER TABLE `product_material_quantity`
  ADD PRIMARY KEY (`product_material_quantity_id`);

--
-- Indexes for table `product_material_thickness`
--
ALTER TABLE `product_material_thickness`
  ADD PRIMARY KEY (`product_material_thickness_id`);

--
-- Indexes for table `product_material_thickness_price`
--
ALTER TABLE `product_material_thickness_price`
  ADD PRIMARY KEY (`product_material_thickness_id`);

--
-- Indexes for table `product_option`
--
ALTER TABLE `product_option`
  ADD PRIMARY KEY (`product_option_id`);

--
-- Indexes for table `product_packing`
--
ALTER TABLE `product_packing`
  ADD PRIMARY KEY (`product_packing_id`);

--
-- Indexes for table `product_pouch_volume`
--
ALTER TABLE `product_pouch_volume`
  ADD PRIMARY KEY (`pouch_volume_id`);

--
-- Indexes for table `product_quantity`
--
ALTER TABLE `product_quantity`
  ADD PRIMARY KEY (`product_quantity_id`);

--
-- Indexes for table `product_tool_price`
--
ALTER TABLE `product_tool_price`
  ADD PRIMARY KEY (`product_tool_id`);

--
-- Indexes for table `product_transport_sea_height`
--
ALTER TABLE `product_transport_sea_height`
  ADD PRIMARY KEY (`product_transport_sea_height_id`);

--
-- Indexes for table `product_transport_sea_width`
--
ALTER TABLE `product_transport_sea_width`
  ADD PRIMARY KEY (`product_transport_sea_width_id`);

--
-- Indexes for table `product_volume`
--
ALTER TABLE `product_volume`
  ADD PRIMARY KEY (`product_volume_id`);

--
-- Indexes for table `profit_pricing`
--
ALTER TABLE `profit_pricing`
  ADD PRIMARY KEY (`profit_pricing_id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`role_permission_id`);

--
-- Indexes for table `roll_packing`
--
ALTER TABLE `roll_packing`
  ADD PRIMARY KEY (`roll_packing_id`);

--
-- Indexes for table `roll_profit_price`
--
ALTER TABLE `roll_profit_price`
  ADD PRIMARY KEY (`product_roll_profit_id`);

--
-- Indexes for table `roll_quantity`
--
ALTER TABLE `roll_quantity`
  ADD PRIMARY KEY (`roll_quantity_id`);

--
-- Indexes for table `roll_transport`
--
ALTER TABLE `roll_transport`
  ADD PRIMARY KEY (`roll_transport_id`);

--
-- Indexes for table `roll_wastage`
--
ALTER TABLE `roll_wastage`
  ADD PRIMARY KEY (`roll_wastage_id`);

--
-- Indexes for table `size_masters`
--
ALTER TABLE `size_masters`
  ADD PRIMARY KEY (`size_master_id`);

--
-- Indexes for table `spout`
--
ALTER TABLE `spout`
  ADD PRIMARY KEY (`spout_id`);

--
-- Indexes for table `spout_pouch_size_master`
--
ALTER TABLE `spout_pouch_size_master`
  ADD PRIMARY KEY (`size_master_id`);

--
-- Indexes for table `stock_profit`
--
ALTER TABLE `stock_profit`
  ADD PRIMARY KEY (`stock_profit_id`);

--
-- Indexes for table `stock_profit_by_sea`
--
ALTER TABLE `stock_profit_by_sea`
  ADD PRIMARY KEY (`stock_profit_id`);

--
-- Indexes for table `stock_wastage`
--
ALTER TABLE `stock_wastage`
  ADD PRIMARY KEY (`stock_wastage_id`);

--
-- Indexes for table `storezo_detail`
--
ALTER TABLE `storezo_detail`
  ADD PRIMARY KEY (`storezo_id`);

--
-- Indexes for table `taxation`
--
ALTER TABLE `taxation`
  ADD PRIMARY KEY (`taxation_id`);

--
-- Indexes for table `template_measurement`
--
ALTER TABLE `template_measurement`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `template_quantity`
--
ALTER TABLE `template_quantity`
  ADD PRIMARY KEY (`template_quantity_id`);

--
-- Indexes for table `template_volume`
--
ALTER TABLE `template_volume`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `unit_master`
--
ALTER TABLE `unit_master`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_personal_details`
--
ALTER TABLE `user_personal_details`
  ADD PRIMARY KEY (`user_personal_details_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `vendor_info`
--
ALTER TABLE `vendor_info`
  ADD PRIMARY KEY (`vendor_info_id`);

--
-- Indexes for table `zipper`
--
ALTER TABLE `zipper`
  ADD PRIMARY KEY (`zipper_id`);

--
-- Indexes for table `zipper_price`
--
ALTER TABLE `zipper_price`
  ADD PRIMARY KEY (`product_zipper_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adhesive`
--
ALTER TABLE `adhesive`
  MODIFY `adhesive_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adhesive_solvent`
--
ALTER TABLE `adhesive_solvent`
  MODIFY `adhesive_solvent_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_gress_details`
--
ALTER TABLE `admin_gress_details`
  MODIFY `admin_gress_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_gress_percentage`
--
ALTER TABLE `admin_gress_percentage`
  MODIFY `admin_gress_percentage_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `associated_accounts`
--
ALTER TABLE `associated_accounts`
  MODIFY `associated_accounts_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_detail`
--
ALTER TABLE `bank_detail`
  MODIFY `bank_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color_category`
--
ALTER TABLE `color_category`
  MODIFY `color_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `courier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cpp_adhesive`
--
ALTER TABLE `cpp_adhesive`
  MODIFY `cpp_adhesive_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `custom_ink_mul`
--
ALTER TABLE `custom_ink_mul`
  MODIFY `custom_ink_mul_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cylinder_base_price`
--
ALTER TABLE `cylinder_base_price`
  MODIFY `cylinder_base_price_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cylinder_currency`
--
ALTER TABLE `cylinder_currency`
  MODIFY `cylinder_currency_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cylinder_vendor`
--
ALTER TABLE `cylinder_vendor`
  MODIFY `cylinder_vendor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `employee_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiry_industry`
--
ALTER TABLE `enquiry_industry`
  MODIFY `enquiry_industry_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiry_source`
--
ALTER TABLE `enquiry_source`
  MODIFY `enquiry_source_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ink_master`
--
ALTER TABLE `ink_master`
  MODIFY `ink_master_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ink_solvent`
--
ALTER TABLE `ink_solvent`
  MODIFY `ink_solvent_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_master`
--
ALTER TABLE `job_master`
  MODIFY `job_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `machine_master`
--
ALTER TABLE `machine_master`
  MODIFY `machine_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mailer_bag_color`
--
ALTER TABLE `mailer_bag_color`
  MODIFY `plastic_color_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `measurement_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_permission`
--
ALTER TABLE `menu_permission`
  MODIFY `menu_permission_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pouch_color`
--
ALTER TABLE `pouch_color`
  MODIFY `pouch_color_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pouch_style`
--
ALTER TABLE `pouch_style`
  MODIFY `pouch_style_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `printing_effect`
--
ALTER TABLE `printing_effect`
  MODIFY `printing_effect_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `production_layer_material`
--
ALTER TABLE `production_layer_material`
  MODIFY `material_layer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `production_process`
--
ALTER TABLE `production_process`
  MODIFY `production_process_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `production_user_type`
--
ALTER TABLE `production_user_type`
  MODIFY `user_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_accessorie`
--
ALTER TABLE `product_accessorie`
  MODIFY `accessorie_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_inward`
--
ALTER TABLE `product_inward`
  MODIFY `product_inward_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_item_info`
--
ALTER TABLE `product_item_info`
  MODIFY `product_item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_layer`
--
ALTER TABLE `product_layer`
  MODIFY `product_layer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_make`
--
ALTER TABLE `product_make`
  MODIFY `make_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_material`
--
ALTER TABLE `product_material`
  MODIFY `product_material_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_material_quantity`
--
ALTER TABLE `product_material_quantity`
  MODIFY `product_material_quantity_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_material_thickness`
--
ALTER TABLE `product_material_thickness`
  MODIFY `product_material_thickness_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_material_thickness_price`
--
ALTER TABLE `product_material_thickness_price`
  MODIFY `product_material_thickness_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_option`
--
ALTER TABLE `product_option`
  MODIFY `product_option_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_packing`
--
ALTER TABLE `product_packing`
  MODIFY `product_packing_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_pouch_volume`
--
ALTER TABLE `product_pouch_volume`
  MODIFY `pouch_volume_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_quantity`
--
ALTER TABLE `product_quantity`
  MODIFY `product_quantity_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_tool_price`
--
ALTER TABLE `product_tool_price`
  MODIFY `product_tool_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_transport_sea_height`
--
ALTER TABLE `product_transport_sea_height`
  MODIFY `product_transport_sea_height_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_transport_sea_width`
--
ALTER TABLE `product_transport_sea_width`
  MODIFY `product_transport_sea_width_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_volume`
--
ALTER TABLE `product_volume`
  MODIFY `product_volume_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profit_pricing`
--
ALTER TABLE `profit_pricing`
  MODIFY `profit_pricing_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `role_permission_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roll_packing`
--
ALTER TABLE `roll_packing`
  MODIFY `roll_packing_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roll_profit_price`
--
ALTER TABLE `roll_profit_price`
  MODIFY `product_roll_profit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roll_quantity`
--
ALTER TABLE `roll_quantity`
  MODIFY `roll_quantity_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roll_transport`
--
ALTER TABLE `roll_transport`
  MODIFY `roll_transport_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roll_wastage`
--
ALTER TABLE `roll_wastage`
  MODIFY `roll_wastage_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `size_masters`
--
ALTER TABLE `size_masters`
  MODIFY `size_master_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `spout`
--
ALTER TABLE `spout`
  MODIFY `spout_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `spout_pouch_size_master`
--
ALTER TABLE `spout_pouch_size_master`
  MODIFY `size_master_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `stock_profit`
--
ALTER TABLE `stock_profit`
  MODIFY `stock_profit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock_profit_by_sea`
--
ALTER TABLE `stock_profit_by_sea`
  MODIFY `stock_profit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_wastage`
--
ALTER TABLE `stock_wastage`
  MODIFY `stock_wastage_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `storezo_detail`
--
ALTER TABLE `storezo_detail`
  MODIFY `storezo_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `taxation`
--
ALTER TABLE `taxation`
  MODIFY `taxation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `template_measurement`
--
ALTER TABLE `template_measurement`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `template_quantity`
--
ALTER TABLE `template_quantity`
  MODIFY `template_quantity_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `template_volume`
--
ALTER TABLE `template_volume`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit_master`
--
ALTER TABLE `unit_master`
  MODIFY `unit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_personal_details`
--
ALTER TABLE `user_personal_details`
  MODIFY `user_personal_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_info`
--
ALTER TABLE `vendor_info`
  MODIFY `vendor_info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zipper`
--
ALTER TABLE `zipper`
  MODIFY `zipper_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zipper_price`
--
ALTER TABLE `zipper_price`
  MODIFY `product_zipper_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
