-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 04:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjadwalan_dokter`
--
CREATE DATABASE IF NOT EXISTS `penjadwalan_dokter` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `penjadwalan_dokter`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Rahmat Hidayatullah', 'Rahmat', 'af2a4c9d4c4956ec9d6ba62213eed568', 'admin'),
(2, 'Faishal Rachman Hakim', 'Faishal', '610411b3fa6d392b21728417512487b0', 'admin'),
(3, 'Aris Setiawan', 'Aris', '288077f055be4fadc3804a69422dd4f8', 'pasien'),
(4, 'Agus Boy', 'Agus', 'fdf169558242ee051cca1479770ebac3', 'pasien'),
(5, 'Test Pasien', 'Pasien', 'f5c25a0082eb0748faedca1ecdcfb131', 'pasien');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `poliklinik` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama`, `jenis_kelamin`, `poliklinik`) VALUES
(1, 'ANDHI EKO F,DRG', 'L', 'POLI GIGI UMUM'),
(2, 'RAHMAWATI SP, DRG, M.MED.ED', 'P', 'POLI GIGI UMUM'),
(3, 'SUPRIYANA,DR.,DRG.,M.PD', 'L', 'POLI GIGI UMUM'),
(4, 'ARISTO FARABI, DR., SP.OG', 'L', 'POLI KEBIDANAN DAN KANDUNGAN	'),
(5, 'BAMBANG SUYONO,DR., SPOG(K)', 'L', 'POLI KEBIDANAN DAN KANDUNGAN'),
(6, 'DENI DWI ARIANI, DR.,SPOG', 'P', 'POLI KEBIDANAN DAN KANDUNGAN'),
(7, 'DIANA HANDARIA,DR., SPOG', 'P', 'POLI KEBIDANAN DAN KANDUNGAN'),
(8, 'HERMAN K. DR.,SPOG(K)', 'L', 'POLI KEBIDANAN DAN KANDUNGAN'),
(9, 'ATIK RAHMAWATI, DR., SP.M', 'P', 'POLI MATA'),
(10, 'MASTUTI,DR., SP.M', 'P', 'POLI MATA'),
(11, 'WAHYU RATNA,DR., SPM', 'P', 'POLI MATA'),
(12, 'AZIZAH,DR., SPA', 'P', 'POLI ANAK'),
(13, 'ENI SULISTIYARINI,DR.,SPA', 'P', 'POLI ANAK'),
(14, 'HARSOYO NA, H.PROF.,DR.DR.SPA(K)', 'L', 'POLI ANAK'),
(15, 'HARTONO, DR.,SPA', 'L', 'POLI ANAK'),
(16, 'MOH. SUPRIATNA,DR.,SPA (K)', 'L', 'POLI ANAK'),
(17, 'EKO SETIAWAN, DR., SP.B', 'L', 'POLI BEDAH UMUM'),
(18, 'HAKIMANSYAH, DR.,SPB', 'L', 'POLI BEDAH UMUM'),
(19, 'IVO DEVI KRISTYANI, DR.,SPB', 'P', 'POLI BEDAH UMUM'),
(20, 'SURYO ADJI,DR.,SPB', 'L', 'POLI BEDAH UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama`, `jenis_kelamin`, `alamat`) VALUES
(1, 'Rahmat H', 'L', 'Jl. Madukoro 3 no 233 RT 4 RW 1 Krobokan, Semarang Barat, Kota Semarang'),
(2, 'Raita Kazuto', 'P', 'Jl. Ngaglik Lama 72 B RT 1 RW 5 Bendungan, Gajahmungkur, Kota Semarang'),
(3, 'Aris Setiawan', 'L', 'Jl. Kemantren RT 002/04, Semarang, Jawa Tengah'),
(4, 'Agus Boy', 'L', 'Jl. Hos Cokroaminoto No.10-11, Cileduk, Tangerang'),
(5, 'Faishal R H', 'L', 'Jl. Gajahmada 137, Bali, Denpasar'),
(6, 'Rachman H F', 'L', 'Jl. Melawai IX 48, DKI Jakarta, Jakarta'),
(7, 'Hakim F R', 'L', 'Jl. K 2 A Teluk Gong, DKI Jakarta, Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_jadwal` int(10) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  `hari` varchar(6) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjadwalan`
--

INSERT INTO `penjadwalan` (`id_jadwal`, `id_dokter`, `hari`, `waktu_mulai`, `waktu_akhir`) VALUES
(1, 1, 'SENIN', '07:00:00', '14:30:00'),
(2, 1, 'SELASA', '07:00:00', '14:00:00'),
(3, 1, 'KAMIS', '07:00:00', '14:00:00'),
(4, 2, 'SELASA', '16:00:00', '17:30:00'),
(5, 2, 'RABU', '16:00:00', '17:30:00'),
(6, 2, 'SABTU', '15:00:00', '17:00:00'),
(7, 3, 'SENIN', '18:00:00', '19:00:00'),
(8, 3, 'RABU', '18:00:00', '19:00:00'),
(9, 3, 'SABTU', '18:00:00', '19:00:00'),
(10, 4, 'SENIN', '09:00:00', '11:00:00'),
(11, 4, 'SELASA', '10:00:00', '12:00:00'),
(12, 4, 'JUMAT', '09:00:00', '11:00:00'),
(13, 5, 'SENIN', '14:00:00', '16:00:00'),
(14, 5, 'SELASA', '14:00:00', '16:00:00'),
(15, 5, 'JUMAT', '14:00:00', '16:00:00'),
(16, 6, 'KAMIS', '16:00:00', '18:00:00'),
(17, 6, 'JUMAT', '16:00:00', '18:00:00'),
(18, 6, 'SABTU', '13:00:00', '15:00:00'),
(19, 7, 'SELASA', '16:00:00', '18:00:00'),
(20, 7, 'RABU', '16:00:00', '18:00:00'),
(21, 7, 'SABTU', '08:00:00', '12:00:00'),
(22, 8, 'SELASA', '14:00:00', '16:00:00'),
(23, 8, 'KAMIS', '14:00:00', '16:00:00'),
(24, 8, 'JUMAT', '13:00:00', '15:00:00'),
(25, 9, 'SENIN', '09:00:00', '12:00:00'),
(26, 9, 'JUMAT', '09:00:00', '12:00:00'),
(27, 10, 'SENIN', '17:00:00', '19:00:00'),
(28, 10, 'RABU', '11:00:00', '15:00:00'),
(29, 10, 'JUMAT', '11:00:00', '15:00:00'),
(30, 11, 'SENIN', '12:00:00', '14:00:00'),
(31, 11, 'RABU', '12:00:00', '14:00:00'),
(32, 11, 'JUMAT', '12:00:00', '14:00:00'),
(33, 12, 'SELASA', '16:00:00', '17:00:00'),
(34, 12, 'KAMIS', '16:00:00', '17:00:00'),
(35, 12, 'SABTU', '16:00:00', '17:00:00'),
(36, 13, 'SELASA', '11:30:00', '13:30:00'),
(37, 13, 'RABU', '11:30:00', '13:30:00'),
(38, 13, 'KAMIS', '11:30:00', '13:30:00'),
(39, 14, 'SENIN', '07:30:00', '08:00:00'),
(40, 14, 'RABU', '07:30:00', '08:00:00'),
(41, 14, 'JUMAT', '07:30:00', '08:00:00'),
(42, 15, 'SENIN', '16:00:00', '18:00:00'),
(43, 15, 'RABU', '16:00:00', '18:00:00'),
(44, 15, 'JUMAT', '16:00:00', '18:00:00'),
(45, 16, 'SENIN', '17:00:00', '19:00:00'),
(46, 16, 'RABU', '17:00:00', '19:00:00'),
(47, 16, 'JUMAT', '17:00:00', '19:00:00'),
(48, 17, 'SELASA', '08:00:00', '10:00:00'),
(49, 17, 'KAMIS', '08:00:00', '10:00:00'),
(50, 17, 'SABTU', '10:00:00', '12:00:00'),
(51, 18, 'SELASA', '15:00:00', '17:00:00'),
(52, 18, 'RABU', '15:00:00', '17:00:00'),
(53, 18, 'JUMAT', '15:00:00', '17:00:00'),
(54, 19, 'SENIN', '09:00:00', '13:00:00'),
(55, 19, 'SELASA', '12:00:00', '15:00:00'),
(56, 19, 'RABU', '10:00:00', '13:00:00'),
(57, 19, 'KAMIS', '12:00:00', '15:00:00'),
(58, 20, 'KAMIS', '16:00:00', '17:00:00'),
(59, 20, 'JUMAT', '16:00:00', '18:00:00'),
(60, 20, 'SABTU', '08:00:00', '11:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `perjanjian`
--

CREATE TABLE `perjanjian` (
  `id_janji` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_jadwal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perjanjian`
--

INSERT INTO `perjanjian` (`id_janji`, `id_pasien`, `id_jadwal`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 7),
(5, 2, 8),
(6, 2, 9),
(7, 3, 19),
(8, 3, 20),
(9, 3, 21),
(10, 4, 22),
(11, 4, 23),
(12, 4, 24),
(13, 5, 27),
(14, 5, 28),
(15, 5, 29),
(16, 6, 33),
(17, 6, 34),
(18, 7, 57);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `idx_jadwal` (`id_dokter`);

--
-- Indexes for table `perjanjian`
--
ALTER TABLE `perjanjian`
  ADD PRIMARY KEY (`id_janji`),
  ADD KEY `idx_pasien` (`id_pasien`),
  ADD KEY `index_jadwal` (`id_jadwal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `perjanjian`
--
ALTER TABLE `perjanjian`
  MODIFY `id_janji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD CONSTRAINT `idx_jadwal` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE NO ACTION;

--
-- Constraints for table `perjanjian`
--
ALTER TABLE `perjanjian`
  ADD CONSTRAINT `idx_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE NO ACTION,
  ADD CONSTRAINT `index_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `penjadwalan` (`id_jadwal`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
