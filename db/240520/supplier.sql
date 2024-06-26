-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Bulan Mei 2024 pada 19.15
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
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` int(11) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `no_hp_supplier` varchar(15) NOT NULL,
  `id_branch` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `id_supplier`, `nama_supplier`, `alamat_supplier`, `no_hp_supplier`, `id_branch`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 213000001, 'TRISNO JOYO', '-', '0', 1, NULL, NULL, NULL),
(2, 213000002, 'CENGKIR MAS', '-', '0', 1, NULL, NULL, NULL),
(3, 213000014, 'PIRAMIDA', '-', '0', 1, NULL, NULL, NULL),
(4, 213000015, 'RETURN TOKO', '-', '0', 1, NULL, NULL, NULL),
(5, 213000017, 'EXC JAMBI', '-', '0', 9, NULL, NULL, NULL),
(6, 213000018, 'PEKAN BARU', '-', '0', 9, NULL, NULL, NULL),
(7, 213000020, 'HEAD OFFICE', 'Jambi', '0', 9, NULL, NULL, NULL),
(8, 213000021, 'OFFICE JAMBI', 'Jambi', '0', 9, NULL, NULL, NULL),
(9, 213000031, 'BR JAMBI', 'JAMBI', '0', 1, NULL, NULL, NULL),
(10, 213000036, 'PALEMBANG', 'Palembang', '0', 9, NULL, NULL, NULL),
(11, 213000038, 'RASTA', 'PEKANBARU', '0', 1, NULL, NULL, NULL),
(12, 213000041, 'H. ALI', 'JMB, PLB1, PDG', '0', 2, NULL, NULL, NULL),
(13, 213000042, 'JAMBI BR', 'Jambi', '0', 9, NULL, NULL, NULL),
(14, 213000046, 'CENGKIR MAS', '0', '0', 2, NULL, NULL, NULL),
(16, 213000048, 'HEAD OFFICE', 'BINTANG REZEKI', '0', 2, NULL, NULL, NULL),
(17, 213000049, 'H. Ari Seven', 'PDG', '0', 2, NULL, NULL, NULL),
(18, 213000055, 'CENGKIR MAS', '0', '0', 4, NULL, NULL, NULL),
(19, 213000056, 'TRESNO JOYO', '0', '0', 4, NULL, NULL, NULL),
(20, 213000057, 'H. ALI', '0', '0', 4, NULL, NULL, NULL),
(21, 213000058, 'BR PEKANBARU', 'PEKANBARU', '0', 4, NULL, NULL, NULL),
(22, 213000063, 'RETURN TOKO', '0', '0', 4, NULL, NULL, NULL),
(23, 213000069, 'EXC BUNGO', '-', '0', 9, NULL, NULL, NULL),
(24, 213000071, 'BAMBANG', 'KASANG PUDAK JAMBI', '0', 9, NULL, NULL, NULL),
(25, 213000080, 'BR BUNGO', 'BUNGO', '0', 2, NULL, NULL, NULL),
(26, 213000081, 'MAS BAYU', 'JAMBI', '0', 1, NULL, NULL, NULL),
(27, 213000082, 'HEAD OFFICE', 'KUDUS', '0', 1, NULL, NULL, NULL),
(28, 213000085, 'HEAD OFFICE', 'KUDUS', '0', 4, NULL, NULL, NULL),
(29, 213000087, 'PEKANBARU', 'Pekanbaru', '2147483647', 2, NULL, NULL, NULL),
(30, 213000093, 'H. ALI', '0', '0', 1, NULL, NULL, NULL),
(31, 213000096, 'H. ALI', '-', '8', 9, NULL, NULL, NULL),
(32, 213000098, 'BAMBANG KOPI', 'JAMBI', '0', 9, NULL, NULL, NULL),
(33, 213000102, 'PARADE BINTANG', '0', '8', 2, NULL, NULL, NULL),
(34, 213000111, 'BANI', 'SURABAYA', '8', 4, NULL, NULL, NULL),
(35, 213000116, 'BR PADANG', 'PADANG', '8', 1, NULL, NULL, NULL),
(36, 213000124, 'TRESNO JOYO', ' -', '8', 2, NULL, NULL, NULL),
(37, 213000130, 'EXC BUNGO', 'BUNGO', '8', 2, NULL, NULL, NULL),
(38, 213000131, 'EXC BUNGO', 'BUNGO', '8', 1, NULL, NULL, NULL),
(39, 213000135, 'GRESIK', 'GRESIK', '0', 9, NULL, NULL, NULL),
(40, 213000136, 'CENGKIRMAS SKM', '0', '8', 9, NULL, NULL, NULL),
(41, 213000137, 'TRISNO JOYO SKM', '0', '8', 9, NULL, NULL, NULL),
(42, 213000138, 'BAMBANG NP', '0', '8', 9, NULL, NULL, NULL),
(43, 213000140, 'BR JAMBI', 'JAMBI', '8', 4, NULL, NULL, NULL),
(44, 213000142, 'BR PADANG', 'PADANG', '8', 4, NULL, NULL, NULL),
(45, 213000144, 'BR GRESIK', 'GRESIK', '8', 4, NULL, NULL, NULL),
(46, 213000152, 'MD PKU', 'PKU', '8', 1, NULL, NULL, NULL),
(47, 213000158, 'EXC BUNGO', 'BUNGO', '8', 4, NULL, NULL, NULL),
(48, 213000159, 'BR PALEMBANG', 'PALEMBANG', '0', 1, NULL, NULL, NULL),
(49, 213000163, 'SUPRAYITNO', 'GRESIK', '8', 9, NULL, NULL, NULL),
(50, 213000164, 'JELACA HEAD OFFICE TABACO', ' KUDUS', '8', 4, NULL, NULL, NULL),
(51, 213000165, 'PARADE BINTANG', 'KUDUS', '8', 1, NULL, NULL, NULL),
(52, 213000168, 'BR MADISTRO', 'JMB', '8', 9, NULL, NULL, NULL),
(53, 213000173, 'TONI NUGROHO', 'Kudus', '8', 9, NULL, NULL, NULL),
(54, 213000182, 'H ARI', '-', '8', 9, NULL, NULL, NULL),
(55, 213000183, 'H ARI', '-', '0', 1, NULL, NULL, NULL),
(56, 213000184, 'JAWA BARAT', 'BANDUNG', '8', 4, NULL, NULL, NULL),
(57, 213000186, 'BENGKULU', 'BENGKULU', '8', 4, NULL, NULL, NULL),
(58, 213000190, 'BUNGO', 'BUNGO', '8', 1, NULL, NULL, NULL),
(59, 213000193, 'PARADE BINTANG', 'KUDUS', '8', 4, NULL, NULL, NULL),
(60, 213000001, 'TRISNO JOYO', '-', '0', 9, NULL, NULL, NULL),
(61, 213000002, 'CENGKIR MAS', '-', '0', 9, NULL, NULL, NULL),
(62, 213000014, 'PIRAMIDA', '-', '0', 9, NULL, NULL, NULL),
(63, 213000015, 'RETURN TOKO', '-', '0', 9, NULL, NULL, NULL),
(64, 213000194, 'PEKAN BARU', 'PEKAN BARU', '0', 10, NULL, NULL, NULL),
(65, 213000188, 'MAS TONI', 'KUDUS', '8', 10, NULL, NULL, NULL),
(66, 213000068, 'BR BUNGO', '-', '0', 10, NULL, NULL, NULL),
(67, 213000051, 'MAS BAYU', 'JAMBI', '0', 10, NULL, NULL, NULL),
(68, 213000050, 'H.O', 'JAMBI', '0', 10, NULL, NULL, NULL),
(69, 213000035, 'PALEMBANG', 'PALEMBANG', '0', 10, NULL, NULL, NULL),
(70, 213000015, 'RETURN TOKO', '-', '0', 10, NULL, NULL, NULL),
(71, 213000014, 'PIRAMIDA', '-', '0', 10, NULL, NULL, NULL),
(72, 213000002, 'CENGKIR MAS', '-', '0', 10, NULL, NULL, NULL),
(73, 213000001, 'TRISNO JOYO', '-', '0', 10, NULL, NULL, NULL),
(74, 213000187, 'KUDUS', 'KUDUS', '8', 7, NULL, NULL, NULL),
(75, 213000171, 'PEKANBARU', 'PEKANBARU', '8', 7, NULL, NULL, NULL),
(76, 213000167, 'PARADE BINTANG', 'KUDUS', '8', 7, NULL, NULL, NULL),
(77, 213000162, 'BR PADANG', 'PADANG', '8', 7, NULL, NULL, NULL),
(78, 213000160, 'H ALI', '-', '8', 7, NULL, NULL, NULL),
(79, 213000151, 'CENGKIR MAS', '-', '8', 7, NULL, NULL, NULL),
(80, 213000150, 'BR PALEMBANG', 'PALEMBANG', '8', 7, NULL, NULL, NULL),
(81, 213000145, 'RETURN TOKO', 'RETURN TOKO', '8', 7, NULL, NULL, NULL),
(82, 213000132, 'JELACA HEAD OFFICE', ' KUDUS', '8', 7, NULL, NULL, NULL),
(83, 213000129, 'EXC BUNGO', 'BUNGO', '8', 7, NULL, NULL, NULL),
(84, 213000174, 'BR PADANG', 'PADANG', '8', 8, NULL, NULL, NULL),
(85, 213000172, 'BR BENGKULU', 'BENGKULU', '8', 8, NULL, NULL, NULL),
(86, 213000166, 'HEAD OFFICE', 'KUDUS', '8', 8, NULL, NULL, NULL),
(87, 213000153, 'OWNER PALEMBANG', 'PALEMBANG', '0', 8, NULL, NULL, NULL),
(88, 213000148, 'BAMBANG HV', 'JAMBI', '8', 8, NULL, NULL, NULL),
(89, 213000146, 'BR PEKANBARU', 'PKU', '8', 8, NULL, NULL, NULL),
(90, 213000141, 'BR GRESIK', 'GRESIK', '8', 8, NULL, NULL, NULL),
(91, 213000122, 'OFFICE', '-', '0', 8, NULL, NULL, NULL),
(92, 213000117, 'MAS BAYU', '-', '8', 8, NULL, NULL, NULL),
(93, 213000108, 'EXC BUNGO', 'BUNGO', '0', 8, NULL, NULL, NULL),
(94, 213000094, 'BR BUNGO', 'BUNGO', '0', 8, NULL, NULL, NULL),
(95, 213000039, 'CV. CAKRA MAS JAYA', '-', '0', 8, NULL, NULL, NULL),
(96, 213000037, 'PALEMBANG', '-', '0', 8, NULL, NULL, NULL),
(97, 213000026, 'BR PEKANBARU', 'PEKANBARU', '0', 8, NULL, NULL, NULL),
(98, 213000025, 'BR JAMBI', '-', '0', 8, NULL, NULL, NULL),
(99, 213000019, 'EXC JAMBI', '-', '0', 8, NULL, NULL, NULL),
(100, 213000016, 'TRISNO JOYO', '0', '0', 8, NULL, NULL, NULL),
(101, 213000015, 'RETURN TOKO', '-', '0', 8, NULL, NULL, NULL),
(102, 213000014, 'PIRAMIDA', '-', '0', 8, NULL, NULL, NULL),
(103, 213000002, 'CENGKIR MAS', '-', '0', 8, NULL, NULL, NULL),
(104, 213000181, 'H ARI', '-', '8', 11, NULL, NULL, NULL),
(105, 213000170, 'PEKANBARU', 'PEKANBARU', '8', 11, NULL, NULL, NULL),
(106, 213000155, 'DEDI POLISI', 'BANGKO', '2147483647', 11, NULL, NULL, NULL),
(107, 213000139, 'BENGKULU', 'BENGKULU', '8', 11, NULL, NULL, NULL),
(108, 213000134, 'BALATIF', 'BUNGO', '0', 11, NULL, NULL, NULL),
(109, 213000112, 'MADISTRO', '-', '8', 11, NULL, NULL, NULL),
(110, 213000110, 'H ALI', '-', '8', 11, NULL, NULL, NULL),
(111, 213000095, 'TRESNO JOYO', '0', '0', 11, NULL, NULL, NULL),
(112, 213000092, 'CENGKIR MAS', '-', '0', 11, NULL, NULL, NULL),
(113, 213000084, 'HEAD OFFICE', '-', '0', 11, NULL, NULL, NULL),
(114, 213000083, 'BR PADANG', 'PADANG', '0', 11, NULL, NULL, NULL),
(115, 213000079, 'PARADE BINTANG', '0', '0', 11, NULL, NULL, NULL),
(116, 213000074, 'RETURN TOKO', '0', '0', 11, NULL, NULL, NULL),
(117, 213000073, 'HV', 'JAMBI', '0', 11, NULL, NULL, NULL),
(118, 213000066, 'JAMBI EXC', 'JAMBI', '0', 11, NULL, NULL, NULL),
(119, 213000189, 'DEDE ISMAIL', 'BUNGO', '8', 12, NULL, NULL, NULL),
(120, 213000113, 'MADISTRO', '-', '8', 12, NULL, NULL, NULL),
(121, 213000086, 'TRESNO JOYO', '-', '0', 12, NULL, NULL, NULL),
(122, 213000078, 'BR PALEMBANG', 'PALEMBANG', '0', 12, NULL, NULL, NULL),
(123, 213000075, 'RETURN TOKO', 'JAMBI', '0', 12, NULL, NULL, NULL),
(124, 213000067, 'JAMBI BR', 'JAMBI', '0', 12, NULL, NULL, NULL),
(125, 213000192, 'H ALI', 'MALANG', '0', 13, NULL, NULL, NULL),
(126, 213000191, 'SUKAMAJU', 'AMBON', '8', 13, NULL, NULL, NULL),
(127, 213000180, 'MODAL AWAL', 'GRESIK KUDUS', '8', 13, NULL, NULL, NULL),
(128, 213000178, 'MAS BAYU', 'BANDUNG', '8', 13, NULL, NULL, NULL),
(129, 213000177, 'H PRAYIT', 'GRESIK', '8', 13, NULL, NULL, NULL),
(130, 213000176, 'H TONI', 'KUDUS', '8', 13, NULL, NULL, NULL),
(131, 213000161, 'BR GRESIK', 'GRESIK', '8', 13, NULL, NULL, NULL),
(132, 213000149, 'BR PADANG', 'PADANG', '8', 13, NULL, NULL, NULL),
(133, 213000125, 'RETURN TOKO', '-', '8', 13, NULL, NULL, NULL),
(134, 213000121, 'HEAD OFFICE', 'KUDUS', '0', 13, NULL, NULL, NULL),
(135, 213000109, 'CENGKIR MAS', 'SIDOARJO', '877455627', 13, NULL, NULL, NULL),
(213000208, 213000208, 'Tesa', '2', '1', 1, NULL, NULL, '2024-05-09 08:56:53'),
(213000209, 213000209, 'MD PKU', 'Jl. Imam Bonjol', '082172964', 18, NULL, NULL, NULL),
(213000210, 213000210, 'BINTANG REZEKI', 'KUDUS', '0', 1, NULL, NULL, NULL),
(213000211, 213000211, 'PARADE BINTANG', 'KUDUS', '8', 17, NULL, NULL, NULL),
(213000212, 213000212, 'TRESNO JOYO', 'SIDOARJO', '8', 17, NULL, NULL, NULL),
(213000213, 213000213, 'CENGKIR MAS', 'SIDOARJO', '8', 17, NULL, NULL, NULL),
(213000214, 213000214, 'H. ALI/ CV. CAKRA MAS JAYA', 'MALANG', '8', 17, NULL, NULL, NULL),
(213000215, 213000215, 'H. ARI', 'MALANG', '8', 17, NULL, NULL, NULL),
(213000216, 213000216, 'JELACA HEAD OFFICE ', 'KUDUS', '8', 17, NULL, NULL, NULL),
(213000217, 213000217, 'CENGKIR MAS', 'GRESIK', '0', 3, NULL, NULL, NULL),
(213000218, 213000209, 'MD PKU', ' Jl. Imam Bakti Usaha', '082172964', 18, NULL, NULL, NULL),
(213000219, 213000219, 'TRISNO JOYO', '0\r\n', '0', 18, NULL, NULL, NULL),
(213000220, 213000220, 'cangkirmas', 'pku', '0812', 18, NULL, NULL, '2024-05-16 19:50:09'),
(213000221, 213000220, 'CENGKIR MAS', 'JAWA', '0812', 18, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `kode_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213000222;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
