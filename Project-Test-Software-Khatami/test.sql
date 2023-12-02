-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2023 pada 11.21
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aslab`
--

CREATE TABLE `aslab` (
  `NIM` varchar(50) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Lab` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `aslab`
--

INSERT INTO `aslab` (`NIM`, `Nama`, `Lab`) VALUES
('202131060', 'Muhammad khatami', 'IR'),
('2023', 'zombie', 'ir'),
('2027', 'sendy', 'escn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `kode_matkul` varchar(50) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `jam` time(6) NOT NULL,
  `dosen` varchar(50) NOT NULL,
  `Lab` varchar(50) NOT NULL,
  `NIM` varchar(50) NOT NULL,
  `Nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`kode_matkul`, `nama_matkul`, `hari`, `jam`, `dosen`, `Lab`, `NIM`, `Nama`) VALUES
('c32', 'pem', 'minggu', '22:35:00.000000', 'zilong', '', '2027', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aslab`
--
ALTER TABLE `aslab`
  ADD PRIMARY KEY (`NIM`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kode_matkul`),
  ADD KEY `nim_aslab` (`NIM`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `matkul_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `aslab` (`NIM`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
