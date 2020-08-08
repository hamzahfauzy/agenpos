-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2020 at 05:41 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `penerimas`
--

CREATE TABLE `penerimas` (
  `id` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `status_kolektif` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `negara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengirimans`
--

CREATE TABLE `pengirimans` (
  `id` int(11) NOT NULL,
  `id_agen` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ext` int(11) NOT NULL,
  `no_resi` varchar(50) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `berat_aktual` int(11) NOT NULL,
  `jenis_kiriman` varchar(100) NOT NULL,
  `nilai_barang` int(11) NOT NULL,
  `jenis_layanan` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `isi_kiriman` varchar(50) NOT NULL,
  `volume_p` int(11) NOT NULL,
  `volume_l` int(11) NOT NULL,
  `volume_t` int(11) NOT NULL,
  `volume_berat` int(11) NOT NULL,
  `bea_kirim` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `htnb` int(11) NOT NULL,
  `jumlah_bea` int(11) NOT NULL,
  `total_tarif` int(11) NOT NULL,
  `jumlah_tarif` int(11) NOT NULL,
  `bsu_loket` int(11) NOT NULL,
  `kolektif` int(11) NOT NULL,
  `batal` int(11) NOT NULL,
  `bsu_batal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengirims`
--

CREATE TABLE `pengirims` (
  `id` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `status_kolektif` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `negara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `status` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `password`, `alamat`, `no_hp`, `status`, `level`) VALUES
(11111, 'Loket 1', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Kisaran', '082369378823', 'aktif', 'agen'),
(12345, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '082369378823', 'aktif', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penerimas`
--
ALTER TABLE `penerimas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengirimans`
--
ALTER TABLE `pengirimans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengirims`
--
ALTER TABLE `pengirims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penerimas`
--
ALTER TABLE `penerimas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengirimans`
--
ALTER TABLE `pengirimans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengirims`
--
ALTER TABLE `pengirims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
