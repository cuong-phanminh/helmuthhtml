-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 06:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helmuthtml`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categorys`
--

CREATE TABLE `blog_categorys` (
  `blog_category_id` int(11) NOT NULL,
  `name_blog_category` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `img_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_detail`
--

CREATE TABLE `blog_detail` (
  `blog_dt_id` int(11) NOT NULL,
  `blog_id` int(10) DEFAULT NULL,
  `blog_category_id` int(10) DEFAULT NULL,
  `img_id` int(11) DEFAULT NULL,
  `blog_content` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_category`
--

CREATE TABLE `child_category` (
  `child_cate_id` int(11) NOT NULL,
  `parent_cate_id` int(11) NOT NULL,
  `child_cate_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url_img` text COLLATE utf8_unicode_ci NOT NULL,
  `child_cate_slug` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `child_category`
--

INSERT INTO `child_category` (`child_cate_id`, `parent_cate_id`, `child_cate_name`, `url_img`, `child_cate_slug`) VALUES
(1, 4, 'accessories', 'Accessories_LuxCraft.jpg', ''),
(2, 4, 'accent-tables', 'Accent-Tables_LuxCraft.jpg', ''),
(3, 4, 'gliders', 'Gliders_LuxCraft.jpg', ''),
(4, 4, 'swings', 'Swings_LuxCraft.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `img_url` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `img_url`) VALUES
(81, 'Accent-Tables_LuxCraft.jpg'),
(82, 'Accent-Tables_LuxCraft.jpg'),
(83, 'Accent-Tables_LuxCraft.jpg'),
(84, 'Gliders_LuxCraft.jpg'),
(85, 'Gliders_LuxCraft.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `order_date` date NOT NULL,
  `payment` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` int(10) NOT NULL,
  `ship_address` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_dt_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_category`
--

CREATE TABLE `parent_category` (
  `parent_cate_id` int(10) NOT NULL,
  `parent_cate_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `url_img` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug_parent_cate` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parent_category`
--

INSERT INTO `parent_category` (`parent_cate_id`, `parent_cate_name`, `url_img`, `slug_parent_cate`) VALUES
(1, 'Sheds', './src/images/sheds.svg', ''),
(2, 'Animal structures', './src/images/animal-structures.svg', ''),
(3, 'Outdoor living', './src/images/outdoor-living.svg', ''),
(4, 'Furniture', './src/images/furniture.svg', 'Helmuth Builders’ furniture comes in 3 basic styles: the Rollback, the Classic Highback, and the Adirondack. These styles are represented in many different types of furniture, gliders, rockers, swings, etc. We also offer various styles tables and accent pieces. Most of our furniture is available in either polyethylene (poly vinyl) or wood.');

-- --------------------------------------------------------

--
-- Table structure for table `productss`
--

CREATE TABLE `productss` (
  `product_id` int(11) NOT NULL,
  `child_cate_id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productss`
--

INSERT INTO `productss` (`product_id`, `child_cate_id`, `product_name`) VALUES
(161, 2, 'Table'),
(162, 2, 'Table'),
(163, 2, 'Chain'),
(164, 2, 'Chain');

-- --------------------------------------------------------

--
-- Table structure for table `product_detailss`
--

CREATE TABLE `product_detailss` (
  `product_dt_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(18,0) DEFAULT NULL,
  `model_year` date DEFAULT NULL,
  `descriptions` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_detailss`
--

INSERT INTO `product_detailss` (`product_dt_id`, `product_id`, `quantity`, `price`, `model_year`, `descriptions`) VALUES
(116, 162, 12, '12', '2020-07-24', 'ahihi'),
(117, 162, 12, '12', '2020-07-24', 'ahihi'),
(118, 164, 2, '13', '2020-07-21', 'Ahihi do ngoc'),
(119, 164, 2, '13', '2020-07-21', 'Ahihi do ngoc');

-- --------------------------------------------------------

--
-- Table structure for table `prooduct_image_relationship`
--

CREATE TABLE `prooduct_image_relationship` (
  `relationship_id` int(11) NOT NULL,
  `product_dt_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prooduct_image_relationship`
--

INSERT INTO `prooduct_image_relationship` (`relationship_id`, `product_dt_id`, `img_id`) VALUES
(41, 117, 83),
(42, 119, 85);

-- --------------------------------------------------------

--
-- Table structure for table `ship_address`
--

CREATE TABLE `ship_address` (
  `ship_add_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ship_first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ship_last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ship_street_add` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ship_city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ship_state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ship_zip` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `street_address` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `order_note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `phone`, `email`, `password`, `street_address`, `city`, `state`, `zip_code`, `order_note`, `role`) VALUES
(3, 'minhcuong', 'phan', 897654, 'minhcuong16299@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1q12', 'binhdinh', 'alabama', '55000', NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_categorys`
--
ALTER TABLE `blog_categorys`
  ADD PRIMARY KEY (`blog_category_id`),
  ADD KEY `img_id` (`img_id`);

--
-- Indexes for table `blog_detail`
--
ALTER TABLE `blog_detail`
  ADD PRIMARY KEY (`blog_dt_id`);

--
-- Indexes for table `child_category`
--
ALTER TABLE `child_category`
  ADD PRIMARY KEY (`child_cate_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_dt_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `parent_category`
--
ALTER TABLE `parent_category`
  ADD PRIMARY KEY (`parent_cate_id`),
  ADD KEY `category_id` (`parent_cate_id`);

--
-- Indexes for table `productss`
--
ALTER TABLE `productss`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_detailss`
--
ALTER TABLE `product_detailss`
  ADD PRIMARY KEY (`product_dt_id`);

--
-- Indexes for table `prooduct_image_relationship`
--
ALTER TABLE `prooduct_image_relationship`
  ADD PRIMARY KEY (`relationship_id`);

--
-- Indexes for table `ship_address`
--
ALTER TABLE `ship_address`
  ADD PRIMARY KEY (`ship_add_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_detail`
--
ALTER TABLE `blog_detail`
  MODIFY `blog_dt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `child_category`
--
ALTER TABLE `child_category`
  MODIFY `child_cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_dt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent_category`
--
ALTER TABLE `parent_category`
  MODIFY `parent_cate_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productss`
--
ALTER TABLE `productss`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `product_detailss`
--
ALTER TABLE `product_detailss`
  MODIFY `product_dt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `prooduct_image_relationship`
--
ALTER TABLE `prooduct_image_relationship`
  MODIFY `relationship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `ship_address`
--
ALTER TABLE `ship_address`
  MODIFY `ship_add_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
