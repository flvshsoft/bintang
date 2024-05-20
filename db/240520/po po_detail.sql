-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Bulan Mei 2024 pada 19.13
-- Versi server: 10.6.17-MariaDB-cll-lve-log
-- Versi PHP: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hhdzbcdm_dev`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id_purchase_order` int(11) UNSIGNED NOT NULL,
  `id_branch` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `minggu_purchase_order` int(11) DEFAULT NULL,
  `status_purchase_order` varchar(111) DEFAULT NULL,
  `keterangan_purchase_order` varchar(222) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data untuk tabel `purchase_order`
--

INSERT INTO `purchase_order` (`id_purchase_order`, `id_branch`, `id_user`, `id_supplier`, `minggu_purchase_order`, `status_purchase_order`, `keterangan_purchase_order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 34563, 213000001, 16, 'Tes', 'Ket', '2024-04-30 06:21:22', '2024-05-06 03:19:45', '2024-05-06 03:19:45'),
(2, 1, 34563, 213000002, 16, 'Tes', 'Ket', '2024-04-30 07:19:19', '2024-05-06 03:19:48', '2024-05-06 03:19:48'),
(3, 1, 34576, 213000002, 17, 'Belum Diterima', 'Barang Masuk Dari Pabrik', '2024-04-30 10:26:52', '2024-05-06 03:19:50', '2024-05-06 03:19:50'),
(4, 1, 34576, 213000014, 17, 'Belum diterima', '0505', '2024-05-06 03:19:41', '2024-05-06 03:19:41', '0000-00-00 00:00:00'),
(5, 1, 34578, 213000002, 19, 'Belum diterima', '9909', '2024-05-07 10:22:12', '2024-05-07 10:22:12', '0000-00-00 00:00:00'),
(6, 1, 34578, 213000031, 15, 'Belum diterima', 'uuuu', '2024-05-08 13:52:23', '2024-05-08 13:52:38', '2024-05-08 13:52:38'),
(7, 18, 34606, 213000209, 50, 'Belum diterima', 'Barang Masuk Dari Pabrik', '2024-05-09 12:11:03', '2024-05-09 12:11:03', '0000-00-00 00:00:00'),
(8, 3, 34565, 213000217, 18, 'Belum diterima', '9909', '2024-05-10 15:17:00', '2024-05-10 15:17:00', '0000-00-00 00:00:00'),
(9, 18, 34606, 213000209, 4, 'Belum diterima', 'AWQS', '2024-05-11 08:09:58', '2024-05-11 08:09:58', '0000-00-00 00:00:00'),
(10, 18, 34606, 213000220, 17, 'Belum diterima', 'barang masuk', '2024-05-16 15:36:20', '2024-05-16 15:36:20', '0000-00-00 00:00:00'),
(11, 18, 34606, 213000219, 20, 'Belum diterima', 'PO TGL 26-04-2024', '2024-05-16 20:21:06', '2024-05-16 20:21:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order_detail`
--

CREATE TABLE `purchase_order_detail` (
  `id_purchase_order_detail` int(11) UNSIGNED NOT NULL,
  `id_purchase_order` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `jumlah_product` int(11) DEFAULT NULL,
  `jumlah_masuk` int(11) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data untuk tabel `purchase_order_detail`
--

INSERT INTO `purchase_order_detail` (`id_purchase_order_detail`, `id_purchase_order`, `id_product`, `jumlah_product`, `jumlah_masuk`, `harga_beli`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 8, 10000373, 210000, NULL, 9800, '2024-05-10 15:17:20', '2024-05-10 15:17:20', '0000-00-00 00:00:00'),
(11, 9, 10000365, 20000, 20000, 15500, '2024-05-13 15:13:23', '2024-05-13 15:13:23', '0000-00-00 00:00:00'),
(12, 9, 10000380, 20000, 10000, 11400, '2024-05-13 15:14:21', '2024-05-13 15:14:21', '0000-00-00 00:00:00'),
(13, 10, 10000365, 1000, 1000, 15500, '2024-05-16 15:36:40', '2024-05-16 15:36:40', '0000-00-00 00:00:00'),
(14, 10, 10000380, 1000, 0, 11400, '2024-05-16 15:37:46', '2024-05-16 15:37:46', '0000-00-00 00:00:00'),
(15, 11, 10000381, 100000, 100000, 9500, '2024-05-16 20:21:26', '2024-05-16 20:21:26', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id_purchase_order`);

--
-- Indeks untuk tabel `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  ADD PRIMARY KEY (`id_purchase_order_detail`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id_purchase_order` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  MODIFY `id_purchase_order_detail` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
