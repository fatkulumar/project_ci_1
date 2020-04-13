-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2020 pada 19.17
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
-- Struktur dari tabel `tb_aktifitas`
--

CREATE TABLE `tb_aktifitas` (
  `id_aktifitas` int(255) NOT NULL,
  `uname_aktifitas` varchar(255) NOT NULL,
  `id_register_aktifitas` int(255) NOT NULL,
  `waktu_aktifitas` varchar(255) NOT NULL,
  `aktifitas` text NOT NULL,
  `aksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_chat`
--

CREATE TABLE `tb_chat` (
  `id_chat` int(255) NOT NULL,
  `id_from_reg` int(255) NOT NULL,
  `id_to_reg` int(255) NOT NULL,
  `pesan` text NOT NULL,
  `status_baca` int(1) NOT NULL,
  `waktu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_chat`
--

INSERT INTO `tb_chat` (`id_chat`, `id_from_reg`, `id_to_reg`, `pesan`, `status_baca`, `waktu`) VALUES
(1, 10, 2, 'hay boleh kenalan?', 0, '23 Jan 5:37 pm '),
(2, 2, 10, 'boleh kok..', 0, '23 Jan 7:37 am');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id_divisi` int(11) NOT NULL,
  `id_jabatan` int(255) NOT NULL,
  `divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawa` int(255) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `id_pekerjaan` int(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `status_pekerjaan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_registrasi`
--

CREATE TABLE `tb_registrasi` (
  `id_registrasi` int(255) NOT NULL,
  `id_karyawan` int(255) NOT NULL,
  `nip` int(9) NOT NULL,
  `ttl` varchar(10) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(5) NOT NULL,
  `nama_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Kawin'),
(2, 'Belum Kawin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_task`
--

CREATE TABLE `tb_task` (
  `id_task` int(255) NOT NULL,
  `id_registrasi` int(255) NOT NULL,
  `id_jabatan` int(255) NOT NULL,
  `id_karyawan` int(255) NOT NULL,
  `id_divisi` int(255) NOT NULL,
  `tgl_penugasan` varchar(10) NOT NULL,
  `tgl_penyelesaian` varchar(10) NOT NULL,
  `id_pekerjaan` int(255) NOT NULL,
  `keterangan` text NOT NULL,
  `progress` int(1) NOT NULL,
  `notif_kerja` int(1) NOT NULL,
  `id_baca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_aktifitas`
--
ALTER TABLE `tb_aktifitas`
  ADD PRIMARY KEY (`id_aktifitas`);

--
-- Indeks untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`id_chat`);

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
  ADD PRIMARY KEY (`id_karyawa`);

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
-- AUTO_INCREMENT untuk tabel `tb_aktifitas`
--
ALTER TABLE `tb_aktifitas`
  MODIFY `id_aktifitas` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id_chat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawa` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  MODIFY `id_pekerjaan` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
  MODIFY `id_registrasi` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_sts_kawin`
--
ALTER TABLE `tb_sts_kawin`
  MODIFY `id_sts_kawin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_task`
--
ALTER TABLE `tb_task`
  MODIFY `id_task` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
