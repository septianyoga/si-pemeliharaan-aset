-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 03:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-aset`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id_aset` int(11) NOT NULL,
  `nama_aset` varchar(255) NOT NULL,
  `jenis_aset` varchar(50) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `nomor_plat` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id_aset`, `nama_aset`, `jenis_aset`, `asal`, `kondisi`, `nomor_plat`, `created_at`, `updated_at`) VALUES
(1, 'Mobil', 'Bergerak', 'PT LEN', 'Baik', 'T 123 HEH', '2024-04-17 02:44:49', '2024-04-17 04:31:45'),
(3, 'TRUK', 'Bergerak', 'PT DAHANA', 'Baik', 'B 123 HOH', '2024-04-17 04:21:30', NULL),
(4, 'DRILL', 'Tetap', 'PT PINDAD', 'Baik', '', '2024-04-17 04:21:56', NULL),
(5, 'LAS', 'Tetap', 'PT PAL', 'Baik', '', '2024-04-17 04:30:41', NULL),
(6, 'Pesawat', 'Bergerak', 'PT DI', 'Dalam Perawatan', 'T 123 HHH', '2024-04-17 04:31:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_aktivitas`
--

CREATE TABLE `jadwal_aktivitas` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_driver` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `aktivitas` longtext NOT NULL,
  `status` enum('Diantar','Sampai') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_aktivitas`
--

INSERT INTO `jadwal_aktivitas` (`id_jadwal`, `tanggal`, `id_driver`, `id_aset`, `aktivitas`, `status`, `created_at`, `updated_at`) VALUES
(1, '2024-04-17 15:06:46', 3, 3, 'Bawa mobil ke PT Dahana', 'Sampai', '2024-04-17 05:07:00', '2024-04-17 09:23:43'),
(3, '2024-04-17 18:57:04', 3, 5, 'Las Besi', 'Diantar', '2024-04-17 08:57:19', '2024-04-17 10:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pemeliharaan`
--

CREATE TABLE `jadwal_pemeliharaan` (
  `id_pemeliharaan` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_aset` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_pemeliharaan`
--

INSERT INTO `jadwal_pemeliharaan` (`id_pemeliharaan`, `deskripsi`, `tanggal`, `id_aset`, `created_at`, `updated_at`) VALUES
(1, 'Ini adalah deskripsi dari aset pemeliharaan', '2024-04-18 11:09:00', 4, '2024-04-17 16:10:17', NULL),
(2, 'Las besi', '2024-04-18 15:00:00', 6, '2024-04-18 04:08:17', '2024-04-18 04:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id_maps` int(11) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`id_maps`, `latitude`, `longitude`, `id_aset`, `created_at`, `updated_at`) VALUES
(1, '-6.559137', '107.770953', 1, '2024-04-18 08:54:26', NULL),
(2, '-6.562355', '107.768075', 1, '2024-04-18 08:54:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Driver','User PIC') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '$2y$12$AFnwJAQ1/3VIF1uw.nk3Vuw8dzjcWGzbldq9GhkGDov9NZwzDx74a', 'Admin', '2024-04-02 05:52:20', NULL),
(3, 'Pengemudi', 'driver', 'driver@gmail.com', '$2y$10$rRfLlhlNUaS4UacOItEQwui9ikh9EGAgBx9z8LkmTq.mIeMm4fR7K', 'Driver', '2024-04-17 05:05:16', '2024-04-17 15:26:55'),
(4, 'Pengemudi2', 'pengemudi2', 'pengemudi2@gmail.com', '$2y$10$4FHcf2oy5zc4DcJwyf663OYZ.a.SyMec7SBBacs.snOW0O0/GLXwS', 'Driver', '2024-04-17 09:17:59', NULL),
(5, 'driver dua', 'driver2', 'driver2@gmail.com', '$2y$10$KRy.0RAKSWlywvd/eKJLiuOgRIUNHxeUChB1OuEi.ejY27djdICyG', 'Driver', '2024-04-17 13:31:47', NULL),
(6, 'tes', 'tesdriver', 'tes@gmail.com', '$2y$10$6QJM.hjy0VNnpDvSVh6VAOrWAZ0JBZzW.70S9ghenKB7xd8KuDQl6', 'Driver', '2024-04-17 13:33:00', NULL),
(7, 'tes3', 'tes3', 'tes2@gmail.com', '$2y$10$3/PAdWwGgkpmTefO5WnHOe6Ey1.FMnbwiGkMEZztT/pVJ/4/fistW', 'Driver', '2024-04-17 13:34:36', NULL),
(8, 'Pengguna PIC', 'userpic', 'pic@gmail.com', '$2y$10$C68U6xAC/GZ.c2PrBxr5ZOdqarzR/PYYZ8b85RP5wJNC8rx1dg8xm', 'User PIC', '2024-04-17 15:39:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `jadwal_aktivitas`
--
ALTER TABLE `jadwal_aktivitas`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_driver` (`id_driver`,`id_aset`),
  ADD KEY `id_aset` (`id_aset`);

--
-- Indexes for table `jadwal_pemeliharaan`
--
ALTER TABLE `jadwal_pemeliharaan`
  ADD PRIMARY KEY (`id_pemeliharaan`),
  ADD KEY `id_aset` (`id_aset`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id_maps`),
  ADD KEY `id_aset` (`id_aset`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal_aktivitas`
--
ALTER TABLE `jadwal_aktivitas`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_pemeliharaan`
--
ALTER TABLE `jadwal_pemeliharaan`
  MODIFY `id_pemeliharaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id_maps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_aktivitas`
--
ALTER TABLE `jadwal_aktivitas`
  ADD CONSTRAINT `jadwal_aktivitas_ibfk_1` FOREIGN KEY (`id_driver`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_aktivitas_ibfk_2` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id_aset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_pemeliharaan`
--
ALTER TABLE `jadwal_pemeliharaan`
  ADD CONSTRAINT `jadwal_pemeliharaan_ibfk_1` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id_aset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maps`
--
ALTER TABLE `maps`
  ADD CONSTRAINT `maps_ibfk_1` FOREIGN KEY (`id_aset`) REFERENCES `aset` (`id_aset`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
