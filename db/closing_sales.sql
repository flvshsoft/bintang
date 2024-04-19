-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 01:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bintang_distributor`
--

-- --------------------------------------------------------

--
-- Table structure for table `closing_sales`
--

CREATE TABLE `closing_sales` (
  `id_cs` int(11) NOT NULL,
  `id_nota` int(244) NOT NULL,
  `id_sales` int(244) NOT NULL,
  `id_branch` int(11) NOT NULL,
  `week` int(2) NOT NULL,
  `kredit` int(244) NOT NULL,
  `cash` int(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `closing_sales`
--

INSERT INTO `closing_sales` (`id_cs`, `id_nota`, `id_sales`, `id_branch`, `week`, `kredit`, `cash`) VALUES
(3, 3, 3, 1, 20, 900000, 0),
(4, 3, 3, 1, 20, 0, 0),
(5, 4, 3, 1, 20, 900000, 0),
(6, 3, 3, 1, 20, 0, 0),
(7, 4, 3, 1, 20, 900000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `closing_sales`
--
ALTER TABLE `closing_sales`
  ADD PRIMARY KEY (`id_cs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `closing_sales`
--
ALTER TABLE `closing_sales`
  MODIFY `id_cs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
