-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2023 at 03:09 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `time_management_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'rebeccarushman', '$2y$10$qzd7j6CK2U8FnKci.ygX.eISqVSfCFnrtfRcFvaxcrSRq26exzc/W', '2023-12-10 15:28:43'),
(2, 'jalleman', '$2y$10$hqhPDu162OaCdlO7wjp1F.7wq8BDJC6EhkfK5iq8l5r/zj31l/TNS', '2023-12-10 18:06:00'),
(3, 'sue_thomas', '$2y$10$eGxclEQE6AGo8BPsydZRx.tqH4nh3ifIhduxgwSEjLjL6xqc3nvdy', '2023-12-10 19:01:55'),
(4, 'zacBurden', '$2y$10$tNh0oEX/MgYyl1ZJqtI0cepaKsld6ALblOHKVrbCcnP8VvwrLzph6', '2023-12-12 18:26:45'),
(5, 'rhalma', '$2y$10$NiAzbyMQiSNA5nsROI4roulT6tXKHxAo0yNuF2rv.T9Klh0CdzwAG', '2023-12-12 18:59:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
