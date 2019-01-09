-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 03:48 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpspp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kas_masuk`
--

CREATE TABLE `kas_masuk` (
  `id_proker` int(11) NOT NULL,
  `no_prk` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `coa` varchar(12) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas_masuk`
--

INSERT INTO `kas_masuk` (`id_proker`, `no_prk`, `nama`, `coa`, `kategori`, `jumlah`, `tanggal`) VALUES
(26, 'IC8075', 'beban listrik ', '51', 'produksi langsung', 35000000, '2019-01-08 15:36:29'),
(38, 'IC75301', 'improvement server', '5400021', 'pemeliharaan', 45000000, '2019-01-09 04:49:07'),
(40, 'IC753006', 'improvement power', '52002', 'pengadaan', 70000000, '2019-01-09 04:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_bayar`
--

CREATE TABLE `kategori_bayar` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_bayar`
--

INSERT INTO `kategori_bayar` (`id_kategori`, `nama_kategori`) VALUES
(52, 'Service AC POP PWP '),
(54, 'Pergantian AC '),
(55, 'Patroli Server');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `coa` varchar(20) NOT NULL,
  `nama_bayar` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `id_kategori`, `coa`, `nama_bayar`, `jumlah`, `tanggal`) VALUES
(9, 0, '5243001', 'Air Conditioner', 4000000, '2019-01-04 22:03:00'),
(11, 52, '523001', 'AC POP ', 4000000, '2019-01-06 15:05:02'),
(12, 54, '523002', 'AC POP', 6000000, '2019-01-06 15:05:31'),
(13, 55, '540999', 'Patroli 3', 500000, '2019-01-08 10:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `penyerapan`
--

CREATE TABLE `penyerapan` (
  `no_spp` int(15) NOT NULL,
  `judul_program_penyerapan` varchar(200) NOT NULL,
  `biaya` int(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `judul_program_kerja` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyerapan`
--

INSERT INTO `penyerapan` (`no_spp`, `judul_program_penyerapan`, `biaya`, `tanggal`, `judul_program_kerja`) VALUES
(0, 'perjalanan dinas', 12345678, '2019-01-09 04:51:45', 'improvement power'),
(34567, 'khkjh', 100000000, '2019-01-09 04:33:52', 'beban listrik '),
(111111, 'pengadaan gergaji', 10000000, '2019-01-09 04:51:24', 'improvement power');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `name`, `username`, `password`) VALUES
(1, 'Mas Admin', 'admin', '$2y$10$e54aCJAR2CL9TvD1pdqa8eZcP4cnXblyM6WTj15NdN54fo7kHtUc2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kas_masuk`
--
ALTER TABLE `kas_masuk`
  ADD PRIMARY KEY (`id_proker`),
  ADD UNIQUE KEY `no_prk` (`no_prk`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `kategori_bayar`
--
ALTER TABLE `kategori_bayar`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `penyerapan`
--
ALTER TABLE `penyerapan`
  ADD PRIMARY KEY (`no_spp`),
  ADD KEY `judul_program_kerja` (`judul_program_kerja`) USING BTREE;

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kas_masuk`
--
ALTER TABLE `kas_masuk`
  MODIFY `id_proker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `kategori_bayar`
--
ALTER TABLE `kategori_bayar`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penyerapan`
--
ALTER TABLE `penyerapan`
  ADD CONSTRAINT `penyerapan_ibfk_1` FOREIGN KEY (`judul_program_kerja`) REFERENCES `kas_masuk` (`nama`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
