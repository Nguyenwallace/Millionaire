-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2017 at 08:12 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `million`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(3, 'Quan Dai', 2, NULL, NULL),
(2, 'Quan Tay', 1, NULL, NULL),
(4, 'NewCat', 2, '2017-09-28 23:58:10', '2017-09-28 23:58:10'),
(5, 'parent Cate', 0, '2017-09-28 23:58:45', '2017-09-28 23:58:45'),
(6, 'Mother Cat', 0, '2017-09-28 23:59:51', '2017-09-28 23:59:51'),
(7, 'test4', 2, '2017-10-02 00:13:46', '2017-10-02 00:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `telephone`, `created_at`, `updated_at`, `photo`) VALUES
(23, 'Ngoc Tien', 'ngocthuy@ngoctien.com', '56 Au Co, Ho Chi Minh, Vietnam', '090911262', '2017-10-16 01:08:38', '2017-11-01 03:03:36', 'Bao cao 1.png'),
(22, 'Ngoc Tien', 'ngocthuy@ngoctien.com', '56 Au Co, Ho Chi Minh, Vietnam', '090911262', '2017-10-16 01:08:38', '2017-11-01 03:04:58', 'Giao dich 24.png'),
(3, 'TOVINA', 'luyen@tovina.vn', '67 San Bay Tan Son Nhat, HCMC', '0902345678', '2017-10-16 01:10:05', '2017-11-01 03:07:38', 'Bao cao.png'),
(4, 'Ngoc Tien', 'ngocthuy@ngoctien.com', '56 Au Co, Ho Chi Minh, Vietnam', '090911262', '2017-10-16 01:08:38', '2017-10-16 01:08:38', NULL),
(19, 'TOVINA', 'luyen@tovina.vn', '67 San Bay Tan Son Nhat, HCMC', '0902345678', '2017-10-16 01:10:05', '2017-10-16 01:10:05', NULL),
(6, 'TOVINA', 'luyen@tovina.vn', '67 San Bay Tan Son Nhat, HCMC', '0902345678', '2017-10-16 01:10:05', '2017-10-16 01:10:05', NULL),
(7, 'Ngoc Tien', 'ngocthuy@ngoctien.com', '56 Au Co, Ho Chi Minh, Vietnam', '090911262', '2017-10-16 01:08:38', '2017-10-16 01:08:38', NULL),
(24, 'TOVINA', 'luyen@tovina.vn', '67 San Bay Tan Son Nhat, HCMC', '0902345678', '2017-10-16 01:10:05', '2017-10-16 01:10:05', NULL),
(25, 'Ngoc Tien', 'ngocthuy@ngoctien.com', '56 Au Co, Ho Chi Minh, Vietnam', '090911262', '2017-10-16 01:08:38', '2017-10-16 01:08:38', NULL),
(27, 'TOVINA', 'luyen@tovina.vn', '67 San Bay Tan Son Nhat, HCMC', '0902345678', '2017-10-16 01:10:05', '2017-10-16 01:10:05', NULL),
(20, 'Ngoc Tien', 'ngocthuy@ngoctien.com', '56 Au Co, Ho Chi Minh, Vietnam', '090911262', '2017-10-16 01:08:38', '2017-10-16 01:08:38', NULL),
(21, 'TOVINA', 'luyen@tovina.vn', '67 San Bay Tan Son Nhat, HCMC', '0902345678', '2017-10-16 01:10:05', '2017-10-16 01:10:05', NULL),
(28, 'Ngoc Tien', 'ngocthuy@ngoctien.com', '56 Au Co, Ho Chi Minh, Vietnam', '090911262', '2017-10-16 01:08:38', '2017-10-16 01:08:38', NULL),
(29, 'Ngoc Tien', 'ngocthuy@ngoctien.com', '56 Au Co, Ho Chi Minh, Vietnam', '090911262', '2017-10-16 01:08:38', '2017-10-16 01:08:38', NULL),
(30, 'TOVINA', 'luyen@tovina.vn', '67 San Bay Tan Son Nhat, HCMC', '0902345678', '2017-10-16 01:10:05', '2017-10-16 01:10:05', NULL),
(31, 'HuynhThanh', 'Thanh@gmail.com', '12 Lhj Dít 1', '123352322', '2017-11-05 00:17:52', '2017-11-05 00:17:52', 'Bao cao 2.png');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_09_28_090019_create_categories_table', 1),
(2, '2017_09_28_090532_create_products_table', 2),
(3, '2017_09_29_043445_create_stamp_product_table', 3),
(4, '2017_09_29_065704_add_timestamps_category_table', 4),
(5, '2017_09_29_083632_create_table_stock', 5),
(6, '2017_09_30_032122_create_table_quotation', 6),
(7, '2017_10_13_021644_create_quotations_table', 7),
(8, '2017_10_13_062230_create_qps_table', 8),
(10, '2017_10_16_065405_create_customer_table', 9),
(11, '2017_10_16_074915_create_timestamps_customer', 9),
(12, '2017_10_16_075216_create_timestamps_customers', 10),
(13, '2017_10_16_101412_create_cusName_Quotations', 11),
(14, '2017_10_16_102434_create_cusEmail_Quotations', 12),
(15, '2017_10_29_120844_create_photo_col_customer_table', 13),
(16, '2017_11_05_033943_create_suppliers_table', 14),
(17, '2017_11_05_035059_update_timestamps_for_suppliers', 15);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `price` double(8,2) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `manu_date` date DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `content`, `price`, `image`, `manu_date`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Motor 4kW', 'This is Test Only', 100.00, 'Tsst', '2017-09-14', 2, NULL, NULL),
(2, 'Motor 5.5 kW', NULL, 1000.00, NULL, NULL, 3, '2017-09-28 21:36:21', '2017-09-28 21:36:21'),
(9, 'Motor 7.5kW', NULL, 200.00, NULL, NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qps`
--

CREATE TABLE `qps` (
  `id` int(10) UNSIGNED NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qps`
--

INSERT INTO `qps` (`id`, `quotation_id`, `product_id`, `product`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(130, 26, NULL, 'Motor 7.5kW', 3, 200.00, '2017-11-14 01:53:45', '2017-11-14 01:53:45'),
(129, 26, NULL, 'Motor 5.5 kW', 23, 1000.00, '2017-11-14 01:53:45', '2017-11-14 01:53:45'),
(126, 25, NULL, 'Motor 7.5kW', 60, 200.00, '2017-11-13 21:13:47', '2017-11-13 21:13:47'),
(125, 25, NULL, 'Motor 5.5 kW', 45, 1000.00, '2017-11-13 21:13:47', '2017-11-13 21:13:47'),
(114, 22, NULL, 'Motor 7.5kW', 23, 200.00, '2017-10-27 20:37:52', '2017-10-27 20:37:52'),
(118, 23, NULL, 'Motor 5.5 kW', 12, 1000.00, '2017-11-02 20:22:45', '2017-11-02 20:22:45'),
(119, 23, NULL, 'Motor 7.5kW', 4, 200.00, '2017-11-02 20:22:45', '2017-11-02 20:22:45'),
(123, 24, NULL, 'Motor 5.5 kW', 4, 1000.00, '2017-11-04 19:51:00', '2017-11-04 19:51:00'),
(124, 24, NULL, 'Motor 7.5kW', 300, 200.00, '2017-11-04 19:51:00', '2017-11-04 19:51:00'),
(122, 21, NULL, 'Motor 5.5 kW', 100, 1000.00, '2017-11-04 19:48:34', '2017-11-04 19:48:34'),
(121, 21, NULL, 'Motor 7.5kW', 23, 200.00, '2017-11-04 19:48:34', '2017-11-04 19:48:34'),
(120, 21, NULL, 'Motor 4kW', 4, 100.00, '2017-11-04 19:48:34', '2017-11-04 19:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` int(10) UNSIGNED NOT NULL,
  `quote_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `quoted_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `tax` double(8,2) NOT NULL DEFAULT '10.00',
  `cusEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `quote_number`, `amount`, `customer_id`, `quoted_date`, `created_at`, `updated_at`, `supplier_id`, `discount`, `tax`, `cusEmail`) VALUES
(24, '59fe7c283b873', 64000.00, 1, '2017-11-05', '2017-11-04 19:51:00', '2017-11-04 19:51:00', NULL, 10.00, 10.00, 'luyen@tovina.vn'),
(21, '59ef08d2de9f4', 105000.00, 1, '2017-10-04', '2017-10-24 02:33:52', '2017-11-04 19:48:34', NULL, 30.00, 20.00, 'luyen@tovina.vn'),
(23, '59f3ed4f6150a', 12800.00, NULL, '2017-10-05', '2017-10-27 19:37:37', '2017-11-02 20:22:45', NULL, 12.00, 15.00, 'luyen@tovina.vn'),
(22, '59ef0918b59a2', 4600.00, NULL, '2017-10-12', '2017-10-24 02:34:54', '2017-10-27 20:37:52', NULL, 10.00, 15.00, 'ngocthuy@ngoctien.com'),
(25, '5a0a6d37533f3', 57000.00, NULL, '2017-11-14', '2017-11-13 21:13:47', '2017-11-13 21:13:47', NULL, 0.00, 10.00, 'ngocthuy@ngoctien.com'),
(26, '5a0aaebde9f73', 23600.00, NULL, '2017-11-14', '2017-11-14 01:52:51', '2017-11-14 01:53:45', NULL, 5.00, 10.00, 'ngocthuy@ngoctien.com');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, NULL),
(2, 2, 100, NULL, NULL),
(9, 9, 300, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyen', 'nguyen@gmail.com', '$2y$10$XEFhFk8GFxjMgS.Sr4PU7OVwA/xL9vJaUr7569omGJl693LykjFQy', 'HsXT0pFX3fUztqSCWcDKYDw7Xu16KTJRgMAcvqnXaadLMeMqBgiaIxFTF95j', '2017-10-21 00:05:09', '2017-10-21 00:05:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `qps`
--
ALTER TABLE `qps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `qps`
--
ALTER TABLE `qps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
