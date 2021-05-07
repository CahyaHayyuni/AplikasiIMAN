-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2021 pada 04.42
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

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
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nip` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `divisi` varchar(75) NOT NULL,
  `email` varchar(250) NOT NULL,
  `user_login` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`nip`, `nama`, `password`, `divisi`, `email`, `user_login`) VALUES
(345, 'vdfb', '', '', 'testisiaanjayani@gmail.com', 'user'),
(123456, 'Aya', 'Pelindo3', 'it', 'cahyahayyuni28@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id` int(9) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `divisi` varchar(75) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `tgl_serah` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id` int(9) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `divisi` varchar(75) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `ekspedisi` varchar(250) NOT NULL,
  `tgl_terima` date NOT NULL,
  `file_foto` varchar(250) NOT NULL,
  `file_ttd` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id`, `nip`, `nama`, `divisi`, `barang`, `ekspedisi`, `tgl_terima`, `file_foto`, `file_ttd`) VALUES
(53, 243545, 'dsdhyt', 'it', 'tv biasa', 'J&T Express', '2021-05-09', 'uploads/60939364284dc.png', 'signatures/609393737a179.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ekspedisi`
--

CREATE TABLE `tb_ekspedisi` (
  `id` int(11) NOT NULL,
  `singkatan` varchar(50) NOT NULL,
  `nama_ekspedisi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ekspedisi`
--

INSERT INTO `tb_ekspedisi` (`id`, `singkatan`, `nama_ekspedisi`) VALUES
(3, 'J&T Express', 'Jet & Tony'),
(4, 'JNE Express', 'Jalur Nugraha Ekakurir'),
(5, 'TIKI', 'Titipan Kilat'),
(6, 'SiCepat', 'Si Cepat'),
(15, 'dfty', 'gdht');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_histori_barang_keluar`
--

CREATE TABLE `tb_histori_barang_keluar` (
  `id` int(9) NOT NULL DEFAULT 0,
  `nip` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `divisi` varchar(75) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `ekspedisi` varchar(250) NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_serah` date NOT NULL,
  `file_foto` varchar(250) NOT NULL,
  `file_ttd` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_histori_barang_keluar`
--

INSERT INTO `tb_histori_barang_keluar` (`id`, `nip`, `nama`, `divisi`, `barang`, `ekspedisi`, `tujuan`, `tgl_terima`, `tgl_serah`, `file_foto`, `file_ttd`) VALUES
(31, 1534374, 'Farah', 'it', 'tv biasa', 'J&T Express', 'gjk', '2021-05-19', '2021-05-06', '', 'signatures/60936eed83374.png'),
(32, 243545, 'dsdhyt', 'it', 'dj', 'J&T Express', 'shdh', '2021-05-24', '2021-05-18', '', 'signatures/609392beaf364.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_histori_barang_masuk`
--

CREATE TABLE `tb_histori_barang_masuk` (
  `id` int(9) NOT NULL DEFAULT 0,
  `nip` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `divisi` varchar(75) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `ekspedisi` varchar(250) NOT NULL,
  `penerima_fisik` varchar(250) NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_serah` date NOT NULL,
  `file_foto` varchar(250) DEFAULT NULL,
  `file_ttd` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_histori_barang_masuk`
--

INSERT INTO `tb_histori_barang_masuk` (`id`, `nip`, `nama`, `divisi`, `barang`, `ekspedisi`, `penerima_fisik`, `tgl_terima`, `tgl_serah`, `file_foto`, `file_ttd`) VALUES
(43, 1534374, 'Farah', 'it', 'Cassing HP', 'J&T Express', 'dghgj', '2021-05-14', '2021-05-03', 'uploads/609353d5b86fb.png', 'signatures/60935434a5398.png'),
(45, 243545, 'dsdhyt', 'it', 'tuk', 'J&T Express', 'fhgd', '2021-05-20', '2021-05-04', '', 'signatures/6093925ef2144.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_ekspedisi`
--
ALTER TABLE `tb_ekspedisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_histori_barang_keluar`
--
ALTER TABLE `tb_histori_barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_histori_barang_masuk`
--
ALTER TABLE `tb_histori_barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT untuk tabel `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `tb_ekspedisi`
--
ALTER TABLE `tb_ekspedisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
