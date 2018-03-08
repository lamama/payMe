-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 09:25 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payme`
--

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL,
  `code` varchar(3) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `code`, `active`) VALUES
(1, 'Israeli shekel', 'ILS', 1),
(2, 'US dollar', 'USD', 1),
(3, 'European dollar', 'EUR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `status_code` tinyint(4) NOT NULL,
  `sale_url` varchar(255) NOT NULL,
  `seller_payme_id` varchar(80) NOT NULL,
  `payme_sale_code` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `status_code`, `sale_url`, `seller_payme_id`, `payme_sale_code`, `price`, `transaction_id`, `currency`, `dateTime`, `description`) VALUES
(1, 0, 'https://preprod.paymeservice.com/sale/generate/SALE1520-493558CZ-SJXQ07IM-TOA3WJ5L', 'SALE1520-493558CZ-SJXQ07IM-TOA3WJ5L', 189123, 34543, 0, 'ILS', '2018-03-08 07:19:18', ''),
(2, 0, 'https://preprod.paymeservice.com/sale/generate/SALE1520-493618LR-MHBR3OKG-7FWGKLSJ', 'SALE1520-493618LR-MHBR3OKG-7FWGKLSJ', 189124, 34543, 0, 'ILS', '2018-03-08 07:20:17', ''),
(3, 0, 'https://preprod.paymeservice.com/sale/generate/SALE1520-497364RA-LZQQOAXT-S9QDFOPW', 'SALE1520-497364RA-LZQQOAXT-S9QDFOPW', 189126, 3545, 0, 'ILS', '2018-03-08 08:22:44', 'fffffffff'),
(4, 0, 'https://preprod.paymeservice.com/sale/generate/SALE1520-497439HE-X3KWKCBL-ZSZMV7M1', 'SALE1520-497439HE-X3KWKCBL-ZSZMV7M1', 189127, 34554, 0, 'ILS', '2018-03-08 08:23:59', 'dfgdfgdfg dfgf'),
(5, 0, 'https://preprod.paymeservice.com/sale/generate/SALE1520-497527DT-U1PM8J0J-HSL9X0ZP', 'SALE1520-497527DT-U1PM8J0J-HSL9X0ZP', 189128, 435345, 0, 'ILS', '2018-03-08 08:25:27', 'dfgdfg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
