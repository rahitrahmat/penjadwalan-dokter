-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2022 pada 02.48
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Rahmat', 'af2a4c9d4c4956ec9d6ba62213eed568'),
('Faishal', '610411b3fa6d392b21728417512487b0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `poliklinik` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
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
-- Struktur dari tabel `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_jadwal` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_dokter` int(10) NOT NULL,
  `hari` varchar(6) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjadwalan`
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
(60, 20, 'SABTU', '08:00:00', '11:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
-- ALTER TABLE `dokter`
  -- ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `penjadwalan`
--
-- ALTER TABLE `penjadwalan`
--   ADD PRIMARY KEY (`id_jadwal`),
--   ADD KEY `idx_jadwal` (`id_dokter`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penjadwalan`
--
-- ALTER TABLE `penjadwalan`
--   ADD CONSTRAINT `idx_jadwal` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
