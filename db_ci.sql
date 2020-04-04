-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2020 pada 19.14
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akses_level`
--

CREATE TABLE `tb_akses_level` (
  `id_akses_level` int(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id_divisi` int(11) NOT NULL,
  `id_jabatan` int(255) NOT NULL,
  `divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_divisi`
--

INSERT INTO `tb_divisi` (`id_divisi`, `id_jabatan`, `divisi`) VALUES
(7, 6, 'Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `id_karyawan` int(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `id_karyawan`, `jabatan`) VALUES
(6, 9, 'Manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(255) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_pekerjaan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama_karyawan`, `id_jabatan`, `id_divisi`, `id_pekerjaan`) VALUES
(9, 'umar', 6, 7, 6),
(10, 'fatkhul', 6, 7, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `id_pekerjaan` int(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `status_pekerjaan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`id_pekerjaan`, `pekerjaan`, `status_pekerjaan`) VALUES
(6, 'Tani', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(255) NOT NULL,
  `id_registrasi` int(255) NOT NULL,
  `profil` text NOT NULL,
  `nama_profil` varchar(255) NOT NULL,
  `tpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `alamat_asal` text NOT NULL,
  `alamat_sekarang` text NOT NULL,
  `hobi` text NOT NULL,
  `id_sts_perkawinan` int(2) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `id_registrasi`, `profil`, `nama_profil`, `tpt_lahir`, `tgl_lahir`, `alamat_asal`, `alamat_sekarang`, `hobi`, `id_sts_perkawinan`, `agama`, `foto`) VALUES
(7, 2, 'nama\r\n', 'test', 'test', '2020-04-07', 'test', 'test', 'test', 0, 'test', 'Koala3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_registrasi`
--

CREATE TABLE `tb_registrasi` (
  `id_registrasi` int(255) NOT NULL,
  `id_karyawan` int(255) NOT NULL,
  `nip` int(18) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ttl` varchar(10) NOT NULL,
  `nik` int(16) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_registrasi`
--

INSERT INTO `tb_registrasi` (`id_registrasi`, `id_karyawan`, `nip`, `nama`, `ttl`, `nik`, `username`, `password`, `level`) VALUES
(2, 2, 1, 'test', 'test', 1, 'test', 'test', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(5) NOT NULL,
  `nama_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `nama_status`) VALUES
(5, 'Aktifkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sts_kawin`
--

CREATE TABLE `tb_sts_kawin` (
  `id_sts_kawin` int(255) NOT NULL,
  `sts_kawin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sts_kawin`
--

INSERT INTO `tb_sts_kawin` (`id_sts_kawin`, `sts_kawin`) VALUES
(6, 'Kawin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_task`
--

CREATE TABLE `tb_task` (
  `id_task` int(255) NOT NULL,
  `id_jabatan` int(255) NOT NULL,
  `id_karyawan` int(255) NOT NULL,
  `id_divisi` int(255) NOT NULL,
  `tgl_penugasan` varchar(10) NOT NULL,
  `tgl_penyelesaian` varchar(10) NOT NULL,
  `id_pekerjaan` int(255) NOT NULL,
  `keterangan` text NOT NULL,
  `progress` int(1) NOT NULL,
  `notif_kerja` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_task`
--

INSERT INTO `tb_task` (`id_task`, `id_jabatan`, `id_karyawan`, `id_divisi`, `tgl_penugasan`, `tgl_penyelesaian`, `id_pekerjaan`, `keterangan`, `progress`, `notif_kerja`) VALUES
(33, 2, 2, 2, '11111111', '11111111', 1, '1', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_akses_level`
--
ALTER TABLE `tb_akses_level`
  ADD PRIMARY KEY (`id_akses_level`);

--
-- Indeks untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indeks untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
  ADD PRIMARY KEY (`id_registrasi`);

--
-- Indeks untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_sts_kawin`
--
ALTER TABLE `tb_sts_kawin`
  ADD PRIMARY KEY (`id_sts_kawin`);

--
-- Indeks untuk tabel `tb_task`
--
ALTER TABLE `tb_task`
  ADD PRIMARY KEY (`id_task`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_akses_level`
--
ALTER TABLE `tb_akses_level`
  MODIFY `id_akses_level` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  MODIFY `id_pekerjaan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
  MODIFY `id_registrasi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_sts_kawin`
--
ALTER TABLE `tb_sts_kawin`
  MODIFY `id_sts_kawin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_task`
--
ALTER TABLE `tb_task`
  MODIFY `id_task` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
