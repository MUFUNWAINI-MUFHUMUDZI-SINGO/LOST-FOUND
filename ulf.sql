-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 11:32 PM
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
-- Database: `ulf`
--

-- --------------------------------------------------------

--
-- Table structure for table `reported_items`
--

CREATE TABLE `reported_items` (
  `id` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `dateFound` date NOT NULL,
  `locationFound` varchar(255) NOT NULL,
  `contactName` varchar(255) NOT NULL,
  `contactPhone` varchar(20) NOT NULL,
  `itemDescription` text NOT NULL,
  `imagePath` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reported_items`
--

INSERT INTO `reported_items` (`id`, `itemName`, `dateFound`, `locationFound`, `contactName`, `contactPhone`, `itemDescription`, `imagePath`, `created_at`) VALUES
(1, 'Student card', '2024-03-26', 'DBSA', 'Mufunwa', '065-800-9179', 'I found your thing hit me up', 'C:/xampp/htdocs/ULF/items/6dba19d2-cdec-4868-b197-d555cf6bad8b.jpg', '2024-03-26 06:56:15'),
(2, 'Bag', '2024-03-26', 'Eblock', 'phumudzo', '065-800-9179', 'hit me up for your nike bag', 'C:/xampp/htdocs/ULF/items/4d480c8c-6102-4a52-b427-5a080b99a993.jpg', '2024-03-26 07:12:28'),
(3, 'Keys', '2024-03-26', 'Maingate', 'madzima', '065-800-9179', 'I have your car keys for ranger wildtrack. Hit me up', 'C:/xampp/htdocs/ULF/items/97de93ff-765a-42b4-91c4-01b991630a9e.jpg', '2024-03-26 10:44:20'),
(4, 'phone', '2024-03-13', 'Library', 'khoza', '065-800-9179', 'Please contact me in order to get your phone', 'C:/xampp/htdocs/ULF/items/6dba19d2-cdec-4868-b197-d555cf6bad8b.jpg', '2024-03-26 10:45:53'),
(5, 'Router', '2024-03-07', 'Dblock', 'Mukhethwa', '065-800-9179', 'dm me', 'C:/xampp/htdocs/ULF/items/6dba19d2-cdec-4868-b197-d555cf6bad8b.jpg', '2024-03-26 10:47:05'),
(6, 'Laptop', '2024-03-12', 'ICT', 'Tshipuke', '065-800-9179', 'please reach out through my number in order to get your device', 'C:/xampp/htdocs/ULF/items/7cf67a17-2b54-4177-88fa-a2e60488c0af.jpg', '2024-03-26 10:53:42'),
(7, 'STUDENT CARD ', '2024-03-28', 'B-BLOCK', 'SINGO MUDZ', '065-800-9179', 'Hey  I FOUND YOUY CARD HIT ME UP', 'C:/xampp/htdocs/ULF/items/6dba19d2-cdec-4868-b197-d555cf6bad8b.jpg', '2024-03-28 09:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username_email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--

-- Indexes for dumped tables
--

--
-- Indexes for table `reported_items`
--
ALTER TABLE `reported_items`
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
-- AUTO_INCREMENT for table `reported_items`
--
ALTER TABLE `reported_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
