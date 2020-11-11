-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2020 at 06:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vina_fix`
--

-- --------------------------------------------------------

--
-- Table structure for table `gaji_user`
--

CREATE TABLE `gaji_user` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_bulan` varchar(50) NOT NULL,
  `jumlah_hadir` int(11) NOT NULL,
  `jumlah_ijin` int(11) NOT NULL,
  `besar_gaji` float NOT NULL,
  `total_gaji` float NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `create_at` datetime DEFAULT NULL,
  `create_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji_user`
--

INSERT INTO `gaji_user` (`id`, `id_user`, `nama_bulan`, `jumlah_hadir`, `jumlah_ijin`, `besar_gaji`, `total_gaji`, `status`, `create_at`, `create_by`) VALUES
(11, 16, 'November 2020', 12, 2, 50000, 600000, 1, '2020-11-11 18:22:09', 'ada');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto_user` text NOT NULL,
  `nama_user` text NOT NULL,
  `jabatan` int(1) NOT NULL DEFAULT 2,
  `alamat_asal` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `foto_user`, `nama_user`, `jabatan`, `alamat_asal`, `active`, `create_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$X8PRd8YCuOYnt1SuXaMdduCk/uNGHzzVno7Viw3vGWtGiFiaslmLm', '5fac0d5a78550_ada.jpg', 'ada', 1, 'ada', 1, '2020-10-15 22:40:56'),
(16, 'riyan@undiksha.ac.id', '$2y$10$PJwWoja/9TwmrTlH2er/J.EhbljOy24lM1uw72b0jN4auzP1vx14q', '5fac0f1233a5e_deyan.jpg', 'deyan', 2, 'lovina', 1, '2020-11-11 17:19:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gaji_user`
--
ALTER TABLE `gaji_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gaji_user`
--
ALTER TABLE `gaji_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gaji_user`
--
ALTER TABLE `gaji_user`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
