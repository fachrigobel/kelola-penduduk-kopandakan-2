-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2021 pada 16.58
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_penduduk_kopandakan_2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` char(16) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `status_perkawinan` varchar(15) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `status_perkawinan`, `pekerjaan`, `status`) VALUES
('7101140202720301', 'ALENG TUBUON', 'KOPANDAKAN', '1972-02-02', 'L', 'ISLAM', 'Kawin', 'PETANI/PEKEBUN', 0),
('7101140305780001', 'ABDUL RAHMAN TAHER', 'DARUBA', '1978-05-03', 'L', 'ISLAM', 'Kawin', 'WIRASWASTA', 1),
('7101141311760001', 'ARIF PUTENG', 'KOPANDAKAN', '1976-11-13', 'L', 'ISLAM', 'Kawin', 'BURUH TANI/PERKEBUNA', 1),
('7101144407800301', 'EPRIANI DATUNDUGON', 'KOPANDAKAN', '1980-07-04', 'P', 'ISLAM', 'KAWIN', 'MENGURUS RUMAH TANGG', 1),
('7101146503820304', 'IIN PARLINA RAMPAN', 'KOPANDAKAN', '1982-03-25', 'P', 'ISLAM', 'Kawin', 'WIRASWASTA', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('7174022710980001', '$2y$10$.1cbWbgVAzTMxI0QiuL7pu2eBTnF6ohXqDIJqIbBqLgzrwpWQTG5i');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
