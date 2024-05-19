-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 08:33 AM
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
-- Database: `trafficapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `signal_sequences`
--

CREATE TABLE `signal_sequences` (
  `id` int(11) NOT NULL,
  `sequence` text DEFAULT NULL,
  `green_interval` int(11) DEFAULT NULL,
  `yellow_interval` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signal_sequences`
--

INSERT INTO `signal_sequences` (`id`, `sequence`, `green_interval`, `yellow_interval`, `created_at`, `updated_at`) VALUES
(1, '[null,null,null,null]', 1, 1, '2024-05-18 23:18:23', '2024-05-18 23:18:23'),
(2, '[null,null,null,null]', 3, 4, '2024-05-18 23:21:02', '2024-05-18 23:21:02'),
(3, '[\"green\",\"yellow\",\"red\",\"orange\"]', 1, 1, '2024-05-18 23:22:23', '2024-05-18 23:22:23'),
(4, '[null,null,null,null]', 2, 1, '2024-05-18 23:24:01', '2024-05-18 23:24:01'),
(5, '[null,null,null,null]', 1, 2, '2024-05-18 23:25:28', '2024-05-18 23:25:28'),
(6, '[null,null,null,null]', 1, 2, '2024-05-18 23:26:15', '2024-05-18 23:26:15'),
(7, '[null,null,null,null]', 1, 2, '2024-05-18 23:27:28', '2024-05-18 23:27:28'),
(8, '[\"green\",\"yellow\",\"red\",\"orange\"]', 2, 4, '2024-05-18 23:36:11', '2024-05-18 23:36:11'),
(9, '[\"green\",\"yellow\",\"red\",\"orange\"]', 2, 1, '2024-05-18 23:51:05', '2024-05-18 23:51:05'),
(10, '[\"green\",\"yellow\",\"red\",\"orange\"]', 3, 5, '2024-05-18 23:51:50', '2024-05-18 23:51:50'),
(11, '[\"red\",\"yellow\",\"orange\",\"green\"]', 2, 1, '2024-05-19 00:01:34', '2024-05-19 00:01:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signal_sequences`
--
ALTER TABLE `signal_sequences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signal_sequences`
--
ALTER TABLE `signal_sequences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
