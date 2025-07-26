-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2025 at 01:19 PM
-- Server version: 10.5.29-MariaDB-0+deb11u1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `republic`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(45) NOT NULL,
  `mrp` float NOT NULL,
  `sell` float NOT NULL,
  `cost` float NOT NULL,
  `unit` varchar(8) NOT NULL,
  `qty` float NOT NULL,
  `alert` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `description`, `image`, `mrp`, `sell`, `cost`, `unit`, `qty`, `alert`) VALUES
(1, 'hello', 'hde', 'adaffrf', 'asffe.jpg', 24, 23, 23, 'kg', 12, 10),
(2, 'eferf', 'afra', 'afer', 'img_91654c723bf4f13ecdec69d663f00fd6.png', 12, 12, 32, 'g', 1, 1),
(3, 'eferf', 'afra', 'afer', 'img_e618de6653f1ae7df86814ddef97d6b6.png', 12, 12, 32, 'g', 1, 1),
(4, 'eferf', 'afra', 'afer', 'img_7bbc461b1c0d24e515797e76e638ea86.png', 12, 12, 32, 'g', 1, 1),
(5, 'eferf', 'afra', 'afer', 'img_b78066902efb45524efcee4530cb93c4.png', 12, 12, 32, 'g', 1, 1),
(6, 'eferf', 'afra', 'afer', 'img_90707f23ad3464a6c7ceb8d37a4e1b0c.png', 12, 12, 32, 'g', 1, 1),
(7, 'hggj', 'gugkb', '', 'img_3586fd52de0c321607e2f85b51c02eb2.png', 23, 45, 78, 'kg', 67, 78);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'Arnab Bose', 'a@a.a', '7029228114', '123'),
(2, 'Test Bose', 'sirarnab.bose.2006@gmail.com', '6453789876', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
