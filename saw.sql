-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 12:06 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `fuzzy` varchar(50) NOT NULL,
  `nilai` int(11) NOT NULL,
  `min_range` float NOT NULL,
  `max_range` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `id_kriteria`, `fuzzy`, `nilai`, `min_range`, `max_range`) VALUES
(1, 1, 'Sangat Rendah(SR)', 1, 0, 4.4),
(2, 1, 'Rendah(R)', 2, 4.5, 5.5),
(3, 1, 'Cukup(C)', 3, 5.6, 6.5),
(4, 1, 'Tinggi(T)', 4, 6.6, 7.5),
(5, 1, 'Sangat Tinggi(ST)', 5, 7.6, 8.5),
(6, 2, 'Sangat Rendah(SR)', 1, 0, 4),
(7, 2, 'Rendah(R)', 2, 5, 16),
(8, 2, 'Cukup(C)', 3, 17, 24),
(9, 2, 'Tinggi(T)', 4, 25, 40),
(10, 2, 'Sangat Tinggi(ST)', 5, 41, 999999),
(11, 3, 'Sangat Rendah(SR)', 1, 0, 0.09),
(12, 3, 'Rendah(R)', 2, 0.1, 0.2),
(13, 3, 'Cukup(C)', 3, 0.21, 0.5),
(14, 3, 'Tinggi(T)', 4, 0.51, 0.75),
(15, 3, 'Sangat Tinggi(ST)', 5, 0.76, 10000000),
(16, 4, 'Sangat Rendah(SR)', 1, 0, 9),
(17, 4, 'Rendah(R)', 2, 10, 20),
(18, 4, 'Cukup(C)', 3, 21, 30),
(19, 4, 'Tinggi(T)', 4, 31, 60),
(20, 4, 'Sangat Tinggi(ST)', 5, 61, 10000000),
(21, 5, 'Sangat Rendah(SR)', 1, 0, 0.09),
(22, 5, 'Rendah(R)', 2, 0.1, 0.2),
(23, 5, 'Cukup(C)', 3, 0.3, 0.5),
(24, 5, 'Tinggi(T)', 4, 0.6, 1),
(25, 5, 'Sangat Tinggi(ST)', 5, 1.1, 100000000),
(26, 6, 'Sangat Rendah(SR)', 1, 0, 0.09),
(27, 6, 'Rendah(R)', 2, 0.1, 0.3),
(28, 6, 'Cukup(C)', 3, 0.4, 0.7),
(29, 6, 'Tinggi(T)', 4, 0.8, 1),
(30, 6, 'Sangat Tinggi(ST)', 5, 1.1, 10000000),
(31, 7, 'Sangat Rendah(SR)', 1, 0, 2),
(32, 7, 'Rendah(R)', 2, 2.1, 5),
(33, 7, 'Cukup(C)', 3, 6, 10),
(34, 7, 'Tinggi(T)', 4, 11, 20),
(35, 7, 'Sangat Tinggi(ST)', 5, 20.1, 10000000),
(36, 8, 'Sangat Rendah(SR)', 1, 0, 0.39),
(37, 8, 'Rendah(R)', 2, 0.4, 1),
(38, 8, 'Cukup(C)', 3, 1.1, 2),
(39, 8, 'Tinggi(T)', 4, 2.1, 8),
(40, 8, 'Sangat Tinggi(ST)', 5, 8.1, 10000000),
(41, 9, 'Sangat Rendah(SR)', 1, 0, 4.9),
(42, 9, 'Rendah(R)', 2, 5, 16),
(43, 9, 'Cukup(C)', 3, 17, 24),
(44, 9, 'Tinggi(T)', 4, 25, 40),
(45, 9, 'Sangat Tinggi(ST)', 5, 40.1, 10000000),
(46, 10, 'Sangat Rendah(SR)', 1, 0, 9),
(47, 10, 'Rendah(R)', 2, 10, 20),
(48, 10, 'Cukup(C)', 3, 21, 30),
(49, 10, 'Tinggi(T)', 4, 31, 60),
(50, 10, 'Sangat Tinggi(ST)', 5, 60.1, 1000000000);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `bobot` varchar(100) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama`, `bobot`, `nilai`) VALUES
(1, 'Kemasaman tanah (pH tanah)', 'Sangat Tinggi(ST)', 5),
(2, 'Karbon organik tanah', 'Sangat Tinggi(ST)', 5),
(3, 'Nitrogen total tanah', 'Sangat Tinggi(ST)', 5),
(4, 'Fosfor(P) tersedia', 'Tinggi(T)', 4),
(5, 'Kalium dapat dipertukarkan', 'Cukup(C)', 3),
(6, 'Natrium(Na) dapat dipertukarkan', 'Tinggi(T)', 4),
(7, 'Kalsium(Ca) dapat dipertukarkan', 'Sangat Tinggi(ST)', 5),
(8, 'Magnesium(Mg) dapat dipertukarkan', 'Cukup(C)', 3),
(9, 'KTK', 'Sangat Tinggi(ST)', 5),
(10, 'Aluminium(Al) dapat dipertukarkan', 'Cukup(C)', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_sifat_tanah`
--

CREATE TABLE `nilai_sifat_tanah` (
  `id_nilai` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_bobot` int(11) NOT NULL,
  `kode_lab` varchar(50) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sifat_kimia_tanah`
--

CREATE TABLE `sifat_kimia_tanah` (
  `kode_lab` varchar(50) NOT NULL,
  `nama_tanaman` varchar(150) NOT NULL,
  `tahun_tanaman` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sifat_kimia_tanah`
--

INSERT INTO `sifat_kimia_tanah` (`kode_lab`, `nama_tanaman`, `tahun_tanaman`) VALUES
('T1.1 (2000)', 'Tanaman 1', '2000'),
('T1.2 (2000)', 'Tanaman 2', '2000'),
('T1.3 (2000)', 'Tanaman 3', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `kode_login` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `pass_user` varchar(32) NOT NULL,
  `hak_akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_sifat_tanah`
--
ALTER TABLE `nilai_sifat_tanah`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `sifat_kimia_tanah`
--
ALTER TABLE `sifat_kimia_tanah`
  ADD PRIMARY KEY (`kode_lab`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`kode_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `nilai_sifat_tanah`
--
ALTER TABLE `nilai_sifat_tanah`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `kode_login` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
