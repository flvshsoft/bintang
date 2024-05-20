-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Bulan Mei 2024 pada 18.59
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
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `password_hash` varchar(191) NOT NULL,
  `level_user` varchar(20) NOT NULL,
  `status_user` tinyint(1) NOT NULL,
  `tanggal_akses` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_user`, `password_hash`, `level_user`, `status_user`, `tanggal_akses`, `created_at`, `updated_at`, `deleted_at`, `gambar`, `id_branch`) VALUES
(34544, 'coba123', 'coba12345', '$2y$10$Fm2jHOuNCINmlFaC7F.9KeKH8xzvuYwswi/JHgJ1zkZ7.cXpI.FmG', 'SPV', 1, NULL, '2022-09-06 22:18:58', '2022-09-28 03:07:05', '0000-00-00 00:00:00', '1664350570WhatsApp Image 2022-08-19 at 01.05.49 (2).jpeg', 0),
(34550, 'gudang', 'ALDO', '$2y$10$Fm2jHOuNCINmlFaC7F.9KeKH8xzvuYwswi/JHgJ1zkZ7.cXpI.FmG', 'Gudang', 1, NULL, '2022-09-06 22:18:58', '2022-09-28 03:07:05', '0000-00-00 00:00:00', '1664350570WhatsApp Image 2022-08-19 at 01.05.49 (2).jpeg', 0),
(34563, 'PEKANBARU', 'PEKANBARU', '$2y$10$4WSOi3/GvCB8gubXERcpR.wFXhbyc3oERjgLosx8lJRFclHykPVyC', 'ho', 1, NULL, '2024-04-01 09:45:15', '2024-05-07 10:35:22', '0000-00-00 00:00:00', '', 1),
(34564, 'PADANG', 'PADANG', '$2y$10$WITp0OfCKU2r4zF3B.KGguKyYeoaB8NW8Aj/15DlFsP6xdWDw8twu', 'ho', 1, NULL, '2024-04-01 09:47:12', '2024-05-07 10:35:30', '0000-00-00 00:00:00', '', 2),
(34565, 'gsk', 'gsk', '$2y$10$a8fChzH8fehyFE.GG.T0f.LH6tnfeefxZoQC2VR/7YfAusZRHzBPe', 'ho', 1, NULL, '2024-04-01 09:47:44', '2024-05-09 17:42:40', '0000-00-00 00:00:00', '', 3),
(34566, 'KUDUS', 'KUDUS', '$2y$10$Bx0SJTQu/uM.MDqaVDg2ou5uyC/NkJyxGl2ABqaK5jYZgE1U1doT6', 'ho', 1, NULL, '2024-04-01 09:48:57', '2024-05-07 10:34:31', '0000-00-00 00:00:00', '', 4),
(34567, 'BENGKULU', 'BENGKULU', '$2y$10$myJT2CtTJasp0tP0gzAYS.QUylBydONFsmChuLlqXJpJBntg6SeBq', 'ho', 1, NULL, '2024-04-01 09:49:44', '2024-05-07 10:34:56', '0000-00-00 00:00:00', '', 7),
(34568, 'PALEMBANG', 'PALEMBANG', '$2y$10$VDZGRU8toTA9/qm5uEhcoeTk1ojBb0Q7De9t4WJPGWrxekPt4tYDa', 'ho', 1, NULL, '2024-04-01 09:50:01', '2024-05-07 10:35:09', '0000-00-00 00:00:00', '', 8),
(34569, 'exc-jambi', 'exc-jambi', '$2y$10$jOhTJDbW0REY8A06Dn/NKeeCR1J/QcI8dcXvDem4LooBRyu8AIoQu', 'ho', 1, NULL, '2024-04-01 09:50:16', '2024-05-07 10:35:51', '0000-00-00 00:00:00', '', 9),
(34570, 'br-jmb', 'br-jmb', '$2y$10$U8uQnysi6xp4gMQYWc.MguCbItxskvV5VLFeyykErSKCmKrzoWlSa', 'ho', 1, NULL, '2024-04-01 09:50:35', '2024-05-07 10:36:01', '0000-00-00 00:00:00', '', 10),
(34571, 'EXC-BUNGO', 'EXC-BUNGO', '$2y$10$X5IlYNnFyZRPmpMXKrNMm.Vf/CzIWXIBs.ImMilH1f.fF9Jp3cpCy', 'ho', 1, NULL, '2024-04-01 09:50:58', '2024-05-07 10:36:33', '0000-00-00 00:00:00', '', 11),
(34572, 'BR-BUNGO', 'BR-BUNGO', '$2y$10$F1khizmbuQWKJHZAsJlJle/Kx8TDIauu9FYcsydlfuxXRyZcHqRFK', 'ho', 1, NULL, '2024-04-01 09:51:17', '2024-05-07 10:36:59', '0000-00-00 00:00:00', '', 12),
(34573, 'amb', 'amb', '$2y$10$SOAXUui5KQwGBz61k1Ov0OxEpZDxuhIkfXkd7lAiRlUTf56t4wSpq', 'admin', 1, NULL, '2024-04-01 09:51:28', '2024-04-01 09:51:28', '0000-00-00 00:00:00', '', 13),
(34574, 'ho-exc', 'ho-exc', '$2y$10$SDmp3lIH/.MBP5MrrmUvAeBYi.x8xCLSDRWthwsYTCUCorCzODrHa', 'Admin', 1, NULL, '2024-04-01 09:52:10', '2024-04-01 09:52:10', '0000-00-00 00:00:00', '', 14),
(34575, 'ho-br', 'ho-br', '$2y$10$N4pH2cSpdLx2sUkdqwd4nubhe0OurYCRiuOdBNtyRq8np1mOHWapW', 'Admin', 1, NULL, '2024-04-01 09:52:32', '2024-04-01 09:52:32', '0000-00-00 00:00:00', '', 15),
(34576, 'youkai', 'Youkai', '$2y$10$5rw4r7V..shx1bWpQzYdVek/6VON94ymvLyiGs/NNPxuclELJpWmK', 'superadmin', 1, NULL, '2024-05-06 03:14:32', '2024-05-06 03:14:32', '0000-00-00 00:00:00', '', 1),
(34577, 'pkugudang', 'Pku Gudang', '$2y$10$Jlvhd.Cw3jsXSPxmQe7qfOZGVmCFZhOJjED8jBdhgUbPOVUyvoypK', 'gudang', 1, NULL, '2024-05-06 03:16:58', '2024-05-06 03:21:35', '0000-00-00 00:00:00', '', 1),
(34578, 'pkuho', 'Pku HO', '$2y$10$NIMQS4pq2pTDPYmtJwh3/ObMltAbcMKUoHZcw7UrEKRAzKqrl0Io.', 'ho', 1, NULL, '2024-05-06 03:17:33', '2024-05-06 03:21:47', '0000-00-00 00:00:00', '', 1),
(34579, 'pdgho', 'Pdg HO', '$2y$10$J5nbNXZdzgy1bt7UDDS33ey3BrAhMx79VECzR4U.VJ/caOYdQ7yJe', 'ho', 1, NULL, '2024-04-01 09:47:12', '2024-04-01 09:47:12', '0000-00-00 00:00:00', '', 2),
(34580, 'kdsho', 'Kds HO', '$2y$10$J5nbNXZdzgy1bt7UDDS33ey3BrAhMx79VECzR4U.VJ/caOYdQ7yJe', 'ho', 1, NULL, '2024-04-01 09:47:12', '2024-04-01 09:47:12', '0000-00-00 00:00:00', '', 4),
(34582, 'PKUADMIN1', 'PKUADMIN1', '$2y$10$7Kt/9hllxIAVoydreKqJDOPSc02pPqqDAUnylOQ4h9gvRXFpKC9lC', 'admin', 1, NULL, '2024-05-07 10:12:26', '2024-05-08 13:11:58', '0000-00-00 00:00:00', '', 1),
(34583, 'PKUADMIN2', 'PKUADMIN2', '$2y$10$3S/KI.RHA8P/mhJaQxMLhetexROt2zfgE9w/3fp0ynl2h.wIBpV3m', 'admin', 1, NULL, '2024-05-07 10:13:27', '2024-05-08 13:12:10', '0000-00-00 00:00:00', '', 1),
(34584, 'PDGADMIN', 'PDGADMIN', '$2y$10$kM1qaQzaW2rNLVbo3sLVve2QTuGVWhwwCWbYzqkQM5WpOuQJTMOHS', 'admin', 1, NULL, '2024-05-07 10:13:46', '2024-05-07 10:13:46', '0000-00-00 00:00:00', '', 2),
(34585, 'PDGGUDANG', 'PDGGUDANG', '$2y$10$2ICyA1trj172aS639G9NJOP6iDI9/30nNUnPAhi53bjwCwW4jnrny', 'gudang', 1, NULL, '2024-05-07 10:14:01', '2024-05-07 10:14:01', '0000-00-00 00:00:00', '', 2),
(34586, 'PKUGUDANG', 'PKUGUDANG', '$2y$10$ADLRLA24ClwdjvVQb0oNuucDjxwQI1oJHwOhmKzdXhNd/umzDDEmK', 'gudang', 1, NULL, '2024-05-07 10:14:16', '2024-05-07 10:14:16', '0000-00-00 00:00:00', '', 1),
(34587, 'GSKADMIN', 'GSKADMIN', '$2y$10$dAIm8k6IcpQR/cEti5mVX.UBfR4iFxrwplJD0FjJ.KDwnR0c8xCW6', 'admin', 1, NULL, '2024-05-07 10:14:35', '2024-05-07 10:14:35', '0000-00-00 00:00:00', '', 3),
(34588, 'GSKGUDANG', 'GSKGUDANG', '$2y$10$4aeDeUORKq4vPsLL3fm6VuJnY0Hyv3eFLeLQCusZJfz45Emywszai', 'gudang', 1, NULL, '2024-05-07 10:14:53', '2024-05-07 10:14:53', '0000-00-00 00:00:00', '', 3),
(34589, 'KDSADMIN', 'KDSADMIN', '$2y$10$hjGOljCJl9kygh7QcSk63OUqip0d4CRlcvqtIssuaW2Rt5h1RNcwy', 'admin', 1, NULL, '2024-05-07 10:15:13', '2024-05-07 10:15:13', '0000-00-00 00:00:00', '', 4),
(34590, 'KDSGUDANG', 'KDSGUDANG', '$2y$10$AhPTszTiJqB1mZrDqo8soua.PHWOUOrPcKVAFxBOOP9RRxCI/x3uy', 'gudang', 1, NULL, '2024-05-07 10:15:34', '2024-05-07 10:16:09', '0000-00-00 00:00:00', '', 4),
(34591, 'BKLADMIN', 'BKLADMIN', '$2y$10$OLlOfFfylQ9CcGBamrLqyOJsWM2xcG882WUqzVOJYhEdl.4fX93oS', 'admin', 1, NULL, '2024-05-07 10:17:12', '2024-05-07 10:17:12', '0000-00-00 00:00:00', '', 7),
(34592, 'BKLGUDANG', 'BKLGUDANG', '$2y$10$tuGUbb3rCmKa/2dQM6gcbOxyRG1EYxo0LDk/UggbrfKSPip6dHwAm', 'gudang', 1, NULL, '2024-05-07 10:17:30', '2024-05-07 10:17:30', '0000-00-00 00:00:00', '', 7),
(34593, 'PLBADMIN', 'PLBADMIN', '$2y$10$VkVQZu76IINHThBQijVKMOwW/pUWncrmnxpiB1VcBRfSvquPngyY6', 'admin', 1, NULL, '2024-05-07 10:17:58', '2024-05-07 10:17:58', '0000-00-00 00:00:00', '', 8),
(34594, 'PLBGUDANG', 'PLBGUDANG', '$2y$10$GKfe/BR1y9oqKWmyB4ptWO0mrSV3n9lf98IJmVk8eWAgesM8.F6s6', 'gudang', 1, NULL, '2024-05-07 10:18:33', '2024-05-07 10:18:33', '0000-00-00 00:00:00', '', 8),
(34595, 'EXCJADMIN', 'EXCJADMIN', '$2y$10$zgTjFVnMoRLopVDIeTLBIeRf79DAkeUGhBcXkiEq05PKdjh4HBfPm', 'admin', 1, NULL, '2024-05-07 10:19:27', '2024-05-07 10:19:27', '0000-00-00 00:00:00', '', 9),
(34596, 'EXCJGUDANG', 'EXCJGUDANG', '$2y$10$ghzsR9T9SJQy5ELU7qOheusEeGVNhqGpx7mDWZ5iGVrMuA784DIb6', 'gudang', 1, NULL, '2024-05-07 10:19:43', '2024-05-07 10:19:43', '0000-00-00 00:00:00', '', 9),
(34597, 'BRJADMIN', 'BRJADMIN', '$2y$10$jBHcSYPpV2yPZtRFr320me2dRBwP4aztqAfbtIBdlW55PRr6l4R.m', 'admin', 1, NULL, '2024-05-07 10:20:03', '2024-05-07 10:20:03', '0000-00-00 00:00:00', '', 10),
(34598, 'BRJGUDANG', 'BRJGUDANG', '$2y$10$kPmXl7GxWUyoH5PEEY49Hutq5zPy3pg9thlzaQhYNVy7//0XWMnvO', 'gudang', 1, NULL, '2024-05-07 10:20:24', '2024-05-07 10:20:24', '0000-00-00 00:00:00', '', 10),
(34599, 'EXCBADMIN', 'EXCBADMIN', '$2y$10$TkE2xOnKpYJBRI/bB0Vz.edlaNNQXRQQvyQok0/lbnMsWlzfH76Cq', 'admin', 1, NULL, '2024-05-07 10:20:42', '2024-05-07 10:20:42', '0000-00-00 00:00:00', '', 11),
(34600, 'EXCBGUDANG', 'EXCBGUDANG', '$2y$10$hOtMkTF8BkIju6lND9.vbe6wdB4wGT0a4ejiip5SCz/6VUNSCWUue', 'gudang', 1, NULL, '2024-05-07 10:21:03', '2024-05-07 10:21:03', '0000-00-00 00:00:00', '', 11),
(34601, 'BRBADMIN', 'BRBADMIN', '$2y$10$0fSRUtKPyaAT.09YQ6ERxe91dsIBUXxoEeG3SDy7IWra8Tyk2AWby', 'admin', 1, NULL, '2024-05-07 10:21:25', '2024-05-07 10:21:25', '0000-00-00 00:00:00', '', 12),
(34602, 'BRBGUDANG', 'BRBGUDANG', '$2y$10$nPzh1nHrUwk82Fp1u40.h.oPcq5NGm43yb50.ER2KtwSjWax.2hAG', 'gudang', 1, NULL, '2024-05-07 10:21:44', '2024-05-07 10:21:44', '0000-00-00 00:00:00', '', 12),
(34603, 'TASIK', 'TASIK', '$2y$10$pZMdeuqwNIAR14Ylr9zQ8OwXEz8xkGIr86ID98UP72xQq2Z3od9x6', 'ho', 1, NULL, '2024-05-07 10:41:58', '2024-05-07 10:41:58', '0000-00-00 00:00:00', '', 17),
(34604, 'TASIKADMIN', 'TASIKADMIN', '$2y$10$VwqlYwcKnAUiQItduEX5E.KBkM0kHWOl.iEq82jgFiLbF6cmcMx12', 'admin', 1, NULL, '2024-05-07 10:42:15', '2024-05-07 10:42:15', '0000-00-00 00:00:00', '', 17),
(34605, 'TASIKGUDANG', 'TASIKGUDANG', '$2y$10$qq07aRjydP9Pd1Ne5ZpxlORQDKa1rWU.GGynLTSr0FGWo6mQIOpMW', 'gudang', 1, NULL, '2024-05-07 10:42:40', '2024-05-07 10:42:40', '0000-00-00 00:00:00', '', 17),
(34606, 'demo', 'demo', '$2y$10$TRVo/wpktwbuGJ3xhauy6.3vpk6eN8Dl3wtpKHPcWerqbIANs9ZPm', 'ho', 1, NULL, '2024-05-08 20:53:09', '2024-05-08 20:53:09', '0000-00-00 00:00:00', '', 18),
(34607, 'pirate123', 'Doflamingo', '$2y$10$g35VQziJrsWKjAcyb2nSu.hq4lT2U8YAnFVxND6CNXfv26gEOMAqS', 'gudang', 1, NULL, '2024-05-11 07:31:22', '2024-05-11 07:31:39', '2024-05-11 07:31:39', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34608;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
