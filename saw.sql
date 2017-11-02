-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2017 at 02:48 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `sifat_kimia_tanah`
--

CREATE TABLE `sifat_kimia_tanah` (
  `kode_lab` int(11) NOT NULL,
  `nama_tanaman` varchar(30) NOT NULL,
  `tahun_tanaman` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `bobot` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_sifat_kimia_tanah`
--

CREATE TABLE `tb_sifat_kimia_tanah` (
  `nil_aluminim_dipertukarkan` int(20) NOT NULL,
  `nil_posfor_tersedia` int(20) NOT NULL,
  `nil_kalium_dipertukarkan` int(20) NOT NULL,
  `nil_natrium_dipertukarkan` int(20) NOT NULL,
  `nil_KTK` int(20) NOT NULL,
  `Hasil` int(20) NOT NULL,
  `nil_kalsium_dipertukarkan` int(20) NOT NULL,
  `natrium_dipertukarkan` int(20) NOT NULL,
  `nil_ph_tanah` int(20) NOT NULL,
  `nil_karbon_organik` int(20) NOT NULL,
  `nil_nitrogen_total` int(20) NOT NULL,
  `magnesium_dipertukarkan` int(20) NOT NULL,
  `aluminium_dipertukarkan` int(20) NOT NULL,
  `kalsium_dipertukarkan` int(20) NOT NULL,
  `posfor_tersedia` int(20) NOT NULL,
  `kalium_dipergunakan` int(20) NOT NULL,
  `ktk` int(20) NOT NULL,
  `kode_sifat_kimia` int(20) NOT NULL,
  `kode_lab` int(20) NOT NULL,
  `kode_kriteria` int(20) NOT NULL,
  `nitrogen_total` int(20) NOT NULL,
  `karbon_organik` int(20) NOT NULL,
  `ph_tanah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sifat_kimia_tanah`
--
ALTER TABLE `sifat_kimia_tanah`
  ADD PRIMARY KEY (`kode_lab`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`kode_login`);

--
-- Indexes for table `tb_sifat_kimia_tanah`
--
ALTER TABLE `tb_sifat_kimia_tanah`
  ADD KEY `kode_lab` (`kode_lab`),
  ADD KEY `kode_kriteria` (`kode_kriteria`),
  ADD KEY `kode_sifat_kimia` (`kode_sifat_kimia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sifat_kimia_tanah`
--
ALTER TABLE `sifat_kimia_tanah`
  MODIFY `kode_lab` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `kode_kriteria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `kode_login` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
