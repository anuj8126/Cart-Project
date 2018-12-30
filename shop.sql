-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 25, 2018 at 04:04 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `delivery` varchar(255) NOT NULL,
  `save` float NOT NULL,
  `detail_line` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `picture`, `name`, `mrp`, `price`, `delivery`, `save`, `detail_line`) VALUES
(1, 'mobile1.jpg', 'Samsung Guru 1200 (GT-E1200, Indigo Blue)', 1400.89, 1199.48, 'Free Delivery', 200.52, 'Inclusive of all taxes'),
(2, 'computer1.jpg', 'HP 15-bs145tu 15.6-inch FHD Laptop (8th Gen Intel Core i5-8250U/8GB/1TB/Free DOS/Integrated Graphics), Sparkling Black', 41058.6, 3899.5, 'Free Delivery', 20660, 'Inclusive all of taxes'),
(3, 'computer2.jpg', 'DELL 3565 15.6-inch Laptop (7th Gen E2-9000/4GB/1TB/Windows 10/Integrated Graphics), Black', 26611, 21970, 'Free Delivery', 4641, 'Inclusive all of taxes'),
(4, 'mobile2.jpg', 'Moto G6 Play (Indigo Black, 32 GB)  (3 GB RAM)', 11999.2, 10999.2, 'Free Delivery', 1000, 'Inclusive all of taxes');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
