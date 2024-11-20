-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 07:45 AM
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
-- Database: `minicell_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `productId` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userId`, `productId`, `size`, `quantity`, `datetime`) VALUES
(81, 'user_20240002', 'product_20240003', 'medium', 1, '2024-11-20 13:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(255) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `shipping_address` text NOT NULL,
  `payment_option` text NOT NULL,
  `email_address` text NOT NULL,
  `subtotal` double NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `date`, `shipping_address`, `payment_option`, `email_address`, `subtotal`, `status`) VALUES
('ORD-673cd5a5bccfe8.51155555', 'user_20240002', '2024-11-20 02:15:01', 'test test test Pandi Bulacan', 'cash_on_delivery', 'test', 500, 'delivered'),
('ORD-673d0e3ac7c198.71566630', 'user_20240002', '2024-11-20 06:16:26', 'test test test Pandi Bulacan', 'cash_on_delivery', 'test', 850, 'delivered'),
('ORD-673d0edfd62278.92716574', 'user_20240002', '2024-11-20 06:19:11', 'test test test Pandi Bulacan', 'cash_on_delivery', 'test', 200, 'order placed'),
('ORD-673d0f183917b4.54861654', 'user_20240002', '2024-11-20 06:20:08', 'test test test Pandi Bulacan', 'cash_on_delivery', 'test', 680, 'order placed'),
('ORD-673d6d39926749.08484859', 'user_20240002', '2024-11-20 13:01:45', 'test test test Pandi Bulacan', 'cash_on_delivery', 'eme', 350, 'order placed');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderId` varchar(255) NOT NULL,
  `productId` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `orderId`, `productId`, `quantity`, `size`) VALUES
(23, 'ORD-673cd5a5bccfe8.51155555', 'product_20240002', 1, 'large'),
(24, 'ORD-673cd5a5bccfe8.51155555', 'product_20240002', 1, 'medium'),
(25, 'ORD-673d0e3ac7c198.71566630', 'product_20240011', 2, 'large'),
(26, 'ORD-673d0e3ac7c198.71566630', 'product_20240009', 1, 'large'),
(27, 'ORD-673d0edfd62278.92716574', 'product_20240003', 1, 'large'),
(28, 'ORD-673d0f183917b4.54861654', 'product_20240001', 1, 'large'),
(29, 'ORD-673d0f183917b4.54861654', 'product_20240006', 1, 'large'),
(30, 'ORD-673d0f183917b4.54861654', 'product_20240004', 1, 'medium'),
(31, 'ORD-673d6d39926749.08484859', 'product_20240001', 1, 'large');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `support1` text DEFAULT NULL,
  `support2` text DEFAULT NULL,
  `support3` text DEFAULT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `materials` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `support1`, `support2`, `support3`, `name`, `description`, `price`, `category`, `materials`, `status`) VALUES
('product_20240001', 'src/uploads/men1.jpg', 'src/uploads/men1.jpg', 'src/uploads/Japan View Traditionally Mockup.jpg', 'src/uploads/Japan View Traditionally.png', 'Traditional  Anime Hoodie', 'Hoodie Inspired by Japanese Anime-Style', 300, 'men', 'cotton', 'active'),
('product_20240002', 'src/uploads/men2.jpg', 'src/uploads/men2.jpg', 'src/uploads/Black and White Typographic Fashion Clothing Logo (1).png', 'src/uploads/Blue and Red Modern Illustration Clothing Apparel T-Shirt.png', 'Artistic Statue Sweatshirt', 'Sweatshirt Designed with Statue & Typography', 250, 'men', 'cotton', 'active'),
('product_20240003', 'src/uploads/men4.jpg', NULL, NULL, NULL, 'Beach Life White-Tee', 'White T-shirt decorated by beach lifestyle ', 150, 'men', 'co', 'active'),
('product_20240004', 'src/uploads/men3.jpg', 'src/uploads/men3.jpg', 'src/uploads/men tshirt mockup.png', 'src/uploads/Renaissance -defy the legion.png', 'Renaissance-Defy Legion ', 'Black T-shirt inspired by Renaissance Period Legion', 180, 'men', 'cotton', 'active'),
('product_20240005', 'src/uploads/women1.jpg', 'src/uploads/women1.jpg', 'src/uploads/Story Of Life Mockup (1).jpg', 'src/uploads/Story Of Life.png', 'Story Of My Life Sweater', 'Sweater inspired by Anime', 300, 'women', 'cotton', 'active'),
('product_20240006', 'src/uploads/women2.jpg', 'src/uploads/women2.jpg', 'src/uploads/City Light Mockup (1).jpg', 'src/uploads/', 'City Lights T-Shirt', 'T-shirt Designed with Typography', 150, 'women', 'cotton', 'active'),
('product_20240007', 'src/uploads/women3.jpg', 'src/uploads/women3.jpg', 'src/uploads/makeup girl tshirt mockup.png', 'src/uploads/makeup girl design.png', 'Make Up Girl T-Shirt', 'White T-shirt decorated by Make Up Look', 150, 'women', 'cotton', 'active'),
('product_20240008', 'src/uploads/women4.jpg', 'src/uploads/women4.jpg', 'src/uploads/flower women mockup.png', 'src/uploads/flower sweater.png', 'Beautiful Girl Sweater', 'White Sweater with a Eye-catchy design printed at the back ', 250, 'women', '', 'active'),
('product_20240009', 'src/uploads/teen1.jpg', 'src/uploads/', 'src/uploads/', 'src/uploads/', 'Human Being  Black-Tee', 'Human Being Black T-Shirt', 150, 'teens', '', 'active'),
('product_20240010', 'src/uploads/teen2.jpg', 'src/uploads/', 'src/uploads/', 'src/uploads/', 'Give me Coffee or Death Sweatshirt', 'Sweatshirt Designed with obsession with coffee', 250, 'teens', '', 'active'),
('product_20240011', 'src/uploads/teen3.jpg', 'src/uploads/', 'src/uploads/', 'src/uploads/', 'Y2K Neon Luna Soul Hoodie', 'Y2K Vibe Black Hoodie inspired from the Moon', 350, 'teens', '', 'active'),
('product_20240012', 'src/uploads/teen4.jpg', 'src/uploads/', 'src/uploads/', 'src/uploads/', 'Tropical Vibes-Endless Summer T-Shirt', 'White T-shirt inspired by Beach Vibes', 150, 'teens', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `products_sizes`
--

CREATE TABLE `products_sizes` (
  `id` varchar(100) NOT NULL,
  `small` int(10) NOT NULL,
  `medium` int(10) NOT NULL,
  `large` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_sizes`
--

INSERT INTO `products_sizes` (`id`, `small`, `medium`, `large`) VALUES
('product_20240001', 10, 10, 8),
('product_20240002', 9, 8, 9),
('product_20240003', 10, 10, 8),
('product_20240004', 10, 8, 10),
('product_20240005', 10, 9, 9),
('product_20240006', 10, 10, 9),
('product_20240007', 10, 10, 10),
('product_20240008', 10, 10, 10),
('product_20240009', 10, 10, 9),
('product_20240010', 10, 10, 9),
('product_20240011', 10, 10, 7),
('product_20240012', 10, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `orderId` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `userId`, `rating`, `orderId`, `content`, `datetime`) VALUES
(3, 'user_20240002', 5, 'ORD-673cd5a5bccfe8.51155555', 'goods na goods', '2024-11-20 03:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `role` varchar(10) NOT NULL,
  `id` varchar(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `mobile_number` text DEFAULT NULL,
  `email_address` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`role`, `id`, `username`, `name`, `birthdate`, `mobile_number`, `email_address`, `password`) VALUES
('admin', 'user_20240001', NULL, NULL, NULL, NULL, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
('user', 'user_20240002', 'mikeru', 'mikeru', '0001-01-01', '09987654321', 'test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08');

-- --------------------------------------------------------

--
-- Table structure for table `users_address`
--

CREATE TABLE `users_address` (
  `id` int(11) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `fullname` text NOT NULL,
  `phone_number` text NOT NULL,
  `house_number` text NOT NULL,
  `street_name` text NOT NULL,
  `barangay` text NOT NULL,
  `municipality` text NOT NULL,
  `province` text NOT NULL,
  `zip_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_address`
--

INSERT INTO `users_address` (`id`, `userId`, `fullname`, `phone_number`, `house_number`, `street_name`, `barangay`, `municipality`, `province`, `zip_code`) VALUES
(9, 'user_20240002', 'Ponce, Michael', '09987654321', '333', 'Pandi-Angat Road', 'Mapulang Lupa', 'Pandi', 'Bulacan', 3014);

-- --------------------------------------------------------

--
-- Table structure for table `users_voucher`
--

CREATE TABLE `users_voucher` (
  `id` int(11) NOT NULL,
  `userId` varchar(100) NOT NULL,
  `voucherId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `validity` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `name`, `description`, `validity`) VALUES
(3, 'WELCOME', 'welcome', 'welcome', '2025-01-01'),
(4, 'IHEARTU', 'Free Shipping', 'Min. spend of 0', '2025-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_fk_userId` (`userId`),
  ADD KEY `cart_fk_prodId` (`productId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_fk_userId` (`userId`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderddetails_fk_prodid` (`productId`),
  ADD KEY `orderddetails_fk_orderid` (`orderId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`) USING HASH;

--
-- Indexes for table `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD KEY `prodsize_fk_prodId` (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reviews_userid` (`userId`),
  ADD KEY `fk_reviews_orderid` (`orderId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_address`
--
ALTER TABLE `users_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `useradd_fk_userid` (`userId`);

--
-- Indexes for table `users_voucher`
--
ALTER TABLE `users_voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_uv_userid` (`userId`),
  ADD KEY `fk_uv_voucherid` (`voucherId`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_address`
--
ALTER TABLE `users_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_voucher`
--
ALTER TABLE `users_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_fk_prodId` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_fk_userId` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk_userId` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `orderddetails_fk_orderid` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderddetails_fk_prodid` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD CONSTRAINT `prodsize_fk_prodId` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_reviews_orderid` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reviews_userid` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_address`
--
ALTER TABLE `users_address`
  ADD CONSTRAINT `useradd_fk_userid` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_voucher`
--
ALTER TABLE `users_voucher`
  ADD CONSTRAINT `fk_uv_userid` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_uv_voucherid` FOREIGN KEY (`voucherId`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
