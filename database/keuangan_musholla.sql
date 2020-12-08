-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 09:21 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan_musholla`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemasukan_barang`
--

CREATE TABLE `tb_pemasukan_barang` (
  `id` int(11) NOT NULL,
  `namaBarang` text NOT NULL,
  `tanggal` date NOT NULL,
  `donatur` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemasukan_barang`
--

INSERT INTO `tb_pemasukan_barang` (`id`, `namaBarang`, `tanggal`, `donatur`) VALUES
(1, '20 kg sembako', '2020-12-08', 'Aji'),
(2, '50 bungkus pakaian', '2020-12-08', 'Kamal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemasukan_uang`
--

CREATE TABLE `tb_pemasukan_uang` (
  `id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `donatur` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemasukan_uang`
--

INSERT INTO `tb_pemasukan_uang` (`id`, `jumlah`, `tanggal`, `donatur`) VALUES
(1, 500000, '2020-12-08', 'Mukidi'),
(2, 500000, '2020-12-08', 'Ulul');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaturan`
--

CREATE TABLE `tb_pengaturan` (
  `id` int(11) NOT NULL,
  `namaMusholla` varchar(256) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengaturan`
--

INSERT INTO `tb_pengaturan` (`id`, `namaMusholla`, `alamat`, `telp`) VALUES
(1, 'Musholla Maulana', 'Demak', '089128912');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengeluaran_uang`
--

CREATE TABLE `tb_pengeluaran_uang` (
  `id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengeluaran_uang`
--

INSERT INTO `tb_pengeluaran_uang` (`id`, `jumlah`, `tanggal`, `keterangan`) VALUES
(1, 250000, '2020-12-11', 'semen, bata, pasir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `createDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `createDate`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-12-07 22:04:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pemasukan_barang`
--
ALTER TABLE `tb_pemasukan_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pemasukan_uang`
--
ALTER TABLE `tb_pemasukan_uang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengeluaran_uang`
--
ALTER TABLE `tb_pengeluaran_uang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pemasukan_barang`
--
ALTER TABLE `tb_pemasukan_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pemasukan_uang`
--
ALTER TABLE `tb_pemasukan_uang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pengeluaran_uang`
--
ALTER TABLE `tb_pengeluaran_uang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;