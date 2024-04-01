-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2024 pada 21.25
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sh_bintang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_akhir`
--

CREATE TABLE `stock_akhir` (
  `id_stock_akhir` int(111) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `jumlah_stock_kembali` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `id_sales` int(111) DEFAULT NULL,
  `id_salesman` int(111) DEFAULT NULL,
  `created_by` int(111) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stock_akhir`
--

INSERT INTO `stock_akhir` (`id_stock_akhir`, `id_product`, `jumlah_stock_kembali`, `satuan`, `id_sales`, `id_salesman`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10000001, 40, 'Gudang', NULL, NULL, NULL, '2024-02-27', '2024-02-27', NULL),
(2, 10000000, 40, 'Gudang', NULL, NULL, NULL, '2024-02-27', '2024-02-27', NULL),
(3, 10000000, 40, 'Gudang', NULL, NULL, NULL, '2024-02-27', '2024-02-27', NULL),
(4, 10000000, 40, 'Gudang', NULL, NULL, NULL, '2024-02-27', '2024-02-27', NULL),
(5, 10000000, 60, 'Gudang', NULL, NULL, NULL, '2024-02-27', '2024-02-27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `stock_akhir`
--
ALTER TABLE `stock_akhir`
  ADD PRIMARY KEY (`id_stock_akhir`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `stock_akhir`
--
ALTER TABLE `stock_akhir`
  MODIFY `id_stock_akhir` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
