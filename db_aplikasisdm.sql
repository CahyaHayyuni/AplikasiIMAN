-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 07:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aplikasisdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nip` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `divisi` varchar(75) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `divisi`) VALUES
(1233567, 'udin', 'bandung', '2021-03-15', 'l', 'tnk'),
(1245686, 'Siti', 'Tanggerang', '1988-01-20', 'p', 'keu'),
(12357580, 'Indah', 'Kota Baru', '1998-02-14', 'p', 'umum'),
(123456789, 'Gery', 'Sumedang', '2000-01-03', 'l', 'tnk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id` int(9) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `divisi` varchar(75) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `tgl_terima` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id` int(9) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `divisi` varchar(75) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `pengirim` varchar(250) NOT NULL,
  `tgl_terima` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_histori_barang_keluar`
--

CREATE TABLE `tb_histori_barang_keluar` (
  `id` int(9) NOT NULL DEFAULT 0,
  `nip` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `divisi` varchar(75) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `penerima` varchar(250) NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_serah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_histori_barang_masuk`
--

CREATE TABLE `tb_histori_barang_masuk` (
  `id` int(9) NOT NULL DEFAULT 0,
  `nip` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `divisi` varchar(75) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `pengirim` varchar(250) NOT NULL,
  `penerima` varchar(250) NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_serah` date NOT NULL,
  `file_foto` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `level` varchar(30) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `level`, `foto`) VALUES
(1, 'user', 'user', 'user', 'user', 'avatar5.png'),
(2, 'user2', 'user2', 'user2', 'user2', 'avatar7.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_histori_barang_keluar`
--
ALTER TABLE `tb_histori_barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_histori_barang_masuk`
--
ALTER TABLE `tb_histori_barang_masuk`
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
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456790;

--
-- AUTO_INCREMENT for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
