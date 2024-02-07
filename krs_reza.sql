-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2024 pada 07.01
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krs_reza`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_mk`
--

CREATE TABLE `daftar_mk` (
  `id_mk` int(11) NOT NULL,
  `kode_mk` int(11) NOT NULL,
  `nama_mk` varchar(255) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_mk`
--

INSERT INTO `daftar_mk` (`id_mk`, `kode_mk`, `nama_mk`, `semester`, `sks`, `kelas`) VALUES
(72, 41010004, 'bahasa pemorograman', '2', 3, 'A'),
(73, 41010001, 'logika dan algoritma', '1', 3, 'B'),
(74, 41010002, 'agama', '1', 2, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `password`, `status`, `level`, `nama`) VALUES
(1, '220101067', '$2y$10$yBtC4Ay1xmlfqIysNPB1xuM0aaAR6YcY9KxmzJMCIHlSU0BY6h4bO', 'aktif', 'admin', 'reza aditya'),
(2, '220101078', '$2y$10$N.XDWww6WmMTO9YXXO89Bu.eVDJALglhR3HkLdCahCZ09fjIf7tj6', 'pasif', 'user', 'fikri'),
(3, '220101062', '$2y$10$skE8N4ea87CNis7xluYma.8AI/IxNHxsZrUYHbc1stBpA3phMihge', 'pasif', 'user', 'danang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kulia`
--

CREATE TABLE `mata_kulia` (
  `id` int(11) NOT NULL,
  `kode_mk` int(50) NOT NULL,
  `nama_mk` varchar(255) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `sks` int(50) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mata_kulia`
--

INSERT INTO `mata_kulia` (`id`, `kode_mk`, `nama_mk`, `semester`, `sks`, `kelas`) VALUES
(4, 41010001, 'logika dan algoritma', '1', 3, 'B'),
(5, 41010002, 'agama', '1', 2, 'A'),
(6, 41010003, 'bahasa inggris', '1', 2, 'B'),
(7, 41010004, 'bahasa pemorograman', '2', 3, 'A'),
(8, 41010005, 'pemrograman web', '2', 3, 'A'),
(9, 41010006, 'pemrograman web lanjutan', '5', 3, 'A'),
(10, 41010007, 'testing inplementasi', '5', 2, 'A'),
(11, 41010008, 'pemrograman basis data', '4', 3, 'B'),
(12, 41010009, 'rekayasa perangkat lunak', '4', 3, 'B'),
(13, 41010010, 'Sistem Operasi', '2', 3, 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `tgl_tahun` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id_semester`, `tgl_tahun`, `semester`, `status`, `id_mahasiswa`) VALUES
(3, '2024/2025', 'ganjil', 'aktif', 1),
(4, '2018/2020', 'ganjil', 'aktif', 2),
(5, '2018/2018', 'ganjil', 'pasif', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_mk`
--
ALTER TABLE `daftar_mk`
  ADD PRIMARY KEY (`id_mk`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `mata_kulia`
--
ALTER TABLE `mata_kulia`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_mk`
--
ALTER TABLE `daftar_mk`
  MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mata_kulia`
--
ALTER TABLE `mata_kulia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
