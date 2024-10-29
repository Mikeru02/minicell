SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `minicell_db`;
CREATE DATABASE `minicell_db`;
USE `minicell_db`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`(
    `role` varchar(10) NOT NULL,
    `id` varchar(100) NOT NULL,
    `username` varchar(50) NULL,
    `name` text NULL,
    `birthdate` date NULL,
    `mobile_number` text NULL,
    `email_address` text NOT NULL,
    `password` text NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `users_address`;
CREATE TABLE `users_address`(
    `id` varchar(100) NOT NULL,
    `house_number` text NOT NULL,
    `street_name` text NOT NULL,
    `barangay` text NOT NULL,
    `municipality` text NOT NULL,
    `province` text NOT NULL,
    `zip_code` int NOT NULL,
    FOREIGN KEY (`id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`(
    `id` varchar(100) NOT NULL,
    `image` varchar(255) NOT NULL,
    `name` text NOT NULL,
    `description` text NOT NULL,
    `price` int NOT NULL,
    `category` varchar(20) NOT NULL,
    `materials` text NOT NULL,
    `status` varchar(20) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `products_sizes`;
CREATE TABLE `products_sizes`(
    `id` varchar(100) NOT NULL,
    `small` int(10) NOT NULL,
    `medium` int(10) NOT NULL,
    `large` int(10) NOT NULL,
    FOREIGN KEY (`id`) REFERENCES `products`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dump Initial Data

-- User Table
INSERT INTO `users`(`role`, `id`, `email_address`, `password`) VALUES
('admin', 'user_20240001', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

