-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2022 at 10:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `kode` varchar(4) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `trash` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`kode`, `nama`, `instansi`, `trash`) VALUES
('4560', 'opik', 'test4', 0),
('4568', 'Anang', 'BPKH', 0);

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `biayaid` int(11) NOT NULL,
  `a_nominal` varchar(250) NOT NULL,
  `tgl` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`biayaid`, `a_nominal`, `tgl`) VALUES
(1, '2500', '2022-09-06 16:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `pinjamanid` int(11) NOT NULL,
  `kode` varchar(250) NOT NULL,
  `pokok` varchar(250) NOT NULL,
  `cicilan` varchar(250) NOT NULL,
  `n_cicilan` varchar(250) NOT NULL,
  `s_pokok` varchar(250) NOT NULL,
  `s_cicilan` varchar(1000) NOT NULL,
  `tgl_awal` varchar(250) NOT NULL,
  `tgl_akhir` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`pinjamanid`, `kode`, `pokok`, `cicilan`, `n_cicilan`, `s_pokok`, `s_cicilan`, `tgl_awal`, `tgl_akhir`) VALUES
(13, '4560', '5000000', '12', '416667', '4583333', '11', '2022-09-06', '2023-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `simpananid` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tgl` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`simpananid`, `kode`, `total`, `tgl`) VALUES
(12, '4568', '85000', '2022-08-30 22:54:28'),
(13, '4560', '27500', '2022-09-06 14:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `t_pinjaman`
--

CREATE TABLE `t_pinjaman` (
  `idtp` int(11) NOT NULL,
  `pinjamanid` varchar(250) NOT NULL,
  `kode` varchar(250) NOT NULL,
  `tgl_bayar` varchar(250) NOT NULL,
  `n_bayar` varchar(250) NOT NULL,
  `adm` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pinjaman`
--

INSERT INTO `t_pinjaman` (`idtp`, `pinjamanid`, `kode`, `tgl_bayar`, `n_bayar`, `adm`) VALUES
(4, '13', '4560', '2022-09-06', '416667', '2500');

-- --------------------------------------------------------

--
-- Table structure for table `t_simpanan`
--

CREATE TABLE `t_simpanan` (
  `idts` int(11) NOT NULL,
  `idsimpanan` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nominal` varchar(255) NOT NULL,
  `adm` varchar(1000) NOT NULL,
  `sub` varchar(1000) NOT NULL,
  `kategori` varchar(1000) NOT NULL,
  `tgl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_simpanan`
--

INSERT INTO `t_simpanan` (`idts`, `idsimpanan`, `kode`, `nominal`, `adm`, `sub`, `kategori`, `tgl`) VALUES
(23, 12, '4568', '20000', '2500', '17500', 'simpanan', '2022-09-06 17:21:51'),
(24, 12, '4568', '80000', '2500', '77500', 'simpanan', '2022-09-06 17:22:54'),
(25, 12, '4568', '5000', '2500', '2500', 'simpanan', '2022-09-06 17:23:21'),
(26, 12, '4568', '5000', '2500', '2500', 'simpanan', '2022-09-06 17:23:40'),
(27, 13, '4560', '120000', '2500', '117500', 'simpanan', '2022-09-06 17:25:34'),
(28, 12, '4568', '5000', '2500', '7500', 'Saldo Di Tarik', '2022-09-06 17:33:07'),
(29, 13, '4560', '80000', '2500', '82500', 'Saldo Di Tarik', '2022-09-06 17:33:52'),
(30, 12, '4568', '5000', '2500', '7500', 'Saldo Di Tarik', '2022-09-06 17:56:26'),
(32, 13, '4560', '5000', '2500', '7500', 'Saldo Di Tarik', '2022-09-06 19:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`biayaid`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`pinjamanid`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`simpananid`);

--
-- Indexes for table `t_pinjaman`
--
ALTER TABLE `t_pinjaman`
  ADD PRIMARY KEY (`idtp`);

--
-- Indexes for table `t_simpanan`
--
ALTER TABLE `t_simpanan`
  ADD PRIMARY KEY (`idts`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `biayaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `pinjamanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `simpananid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `t_pinjaman`
--
ALTER TABLE `t_pinjaman`
  MODIFY `idtp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_simpanan`
--
ALTER TABLE `t_simpanan`
  MODIFY `idts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
