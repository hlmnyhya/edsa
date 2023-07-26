-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 03:16 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciedsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-07-06-110744', 'App\\Database\\Migrations\\Users', 'default', 'App', 1688641731, 1),
(2, '2023-07-06-114247', 'App\\Database\\Migrations\\Users', 'default', 'App', 1688643812, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id`, `email`, `username`, `password`) VALUES
(12, 'kasiumpolsekjuai@gmail.com', 'admin', '$2y$10$poaCzBF1AyJ.vMJP1K'),
(13, 'unitpolsekjuai@gmail.com', 'unit', '$2y$10$SKhXZWptbYQBfc7wOa'),
(14, 'kapolsekpolsekjuai@gmail.com', 'kapolsek', '$2y$10$djsWKDwibRpat4nFwP'),
(15, 'satuanpolsekjuai@gmail.com', 'satuanjaga', '$2y$10$fPVTqqnYbx8PL5TPM5'),
(17, 'erna@gmail.com', 'erna', 'erna');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id` int(11) NOT NULL,
  `nm_anggota` varchar(50) NOT NULL,
  `nrp` int(10) NOT NULL,
  `pangkat` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(9) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id`, `nm_anggota`, `nrp`, `pangkat`, `tgl_lahir`, `jk`, `id_jabatan`) VALUES
(3, 'Ahmad Rizali', 93070370, 'BRIGADIR', '1998-05-04', 'Laki-Laki', 29),
(9, 'Jimmy Hasiolan Saragi', 87070039, 'IPDA', '1993-06-17', 'Laki-Laki', 10),
(12, 'Hasmaini', 79080321, 'AIPTU', '1988-02-02', 'Laki-Laki', 13),
(13, 'Syaiful Anwar', 78040718, 'AIPTU', '1986-09-29', 'Laki-Laki', 3),
(14, 'Abizar Alghifar Ari', 85020682, 'AIPDA', '1995-11-16', 'Laki-Laki', 21),
(15, 'Beni Setiono', 85041624, 'BRIPKA', '1996-08-08', 'Laki-Laki', 24),
(16, 'Frenki M Simanjuntak', 85051647, 'BRIPKA', '1996-06-05', 'Laki-Laki', 15),
(17, 'Muhammad Taufiq', 86101538, 'BRIPKA', '1997-07-14', 'Laki-Laki', 18),
(18, 'Muhammad Ikraam', 191091092, 'BRIGADIR', '1995-02-09', 'Laki-Laki', 5),
(19, 'Riko Jeksen Thiago', 2147483647, 'BRIGADIR', '1998-01-15', 'Laki-Laki', 5),
(20, 'Aris Stiawan', 288484948, 'BRIPTU', '2001-06-06', 'Laki-Laki', 5),
(21, 'Hafizh Albarez', 479298480, 'BRIPTU', '2002-02-06', 'Laki-Laki', 5),
(22, 'Noor Indra Mustafa', 6878492, 'BRIPTU', '2002-07-01', 'Laki-Laki', 5),
(23, 'Muhammad Raihan', 627397, 'BRIPTU', '2003-08-08', 'Laki-Laki', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `id` int(11) NOT NULL,
  `nm_berkas` varchar(50) NOT NULL,
  `berkas` varchar(50) NOT NULL,
  `folder` varchar(50) NOT NULL,
  `id_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berkas`
--

INSERT INTO `tb_berkas` (`id`, `nm_berkas`, `berkas`, `folder`, `id_unit`) VALUES
(3, 'Berkas Examplet', '276-Article Text-688-1-10-20180216.pdf', 'Pengaduan', 1),
(5, 'Anggota Polsek Juaaaaai', '1688473004_05cda34abbf34ad466ca.docx', 'Lainya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumentasi`
--

CREATE TABLE `tb_dokumentasi` (
  `id` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokumentasi`
--

INSERT INTO `tb_dokumentasi` (`id`, `id_unit`, `judul`, `jenis`, `tgl`, `ket`, `foto`) VALUES
(19, 1, 'ooooom', 'Pertemuan', '2023-07-04', 'ooook', '1688467959_8b017b65755682a1c269.png'),
(20, 1, 'ooooom', 'Pertemuan', '2023-07-04', 'ooook', '1688463495_54f0286a2e6c0920fb58.jpg'),
(23, 1, 'kegiatan', 'Sosialisasi', '2023-07-06', 'kegiatan sosialisasi', '1688533894_00a3e86a8b3c7408dba2.png'),
(24, 1, 'kegiatan', 'Sosialisasi', '2023-07-06', 'kegiatan sosialisasi', '1688533894_5248ba3ef2f645995b13.png'),
(25, 1, 'patroli kegiatan harian', 'Patroli', '2023-07-11', '-', '1689054418_929f1738f14f4d3ee4f5.jpg'),
(26, 1, 'patroli kegiatan harian', 'Patroli', '2023-07-11', '-', '1689054418_38dc272d9356e426d4c9.jpg'),
(27, 1, 'patroli kegiatan harian', 'Patroli', '2023-07-11', '-', '1689054418_0068e2db10c61b34ac58.jpg'),
(28, 1, 'patroli kegiatan harian', 'Patroli', '2023-07-11', '-', '1689054419_e6a4de5ed2fcd5b97614.jpg'),
(29, 1, 'coba coba', 'Pelayanan', '2023-07-12', 'pelayanan masyarakat', '1689154153_aa0d393b1c69e81ba7b6.png'),
(30, 1, 'coba coba', 'Pelayanan', '2023-07-12', 'pelayanan masyarakat', '1689154153_574890dd064500f14b70.jpg'),
(31, 1, 'coba coba', 'Pelayanan', '2023-07-12', 'pelayanan masyarakat', '1689154153_a6f3c933103995b963b6.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id` int(11) NOT NULL,
  `nm_jabatan` varchar(50) NOT NULL,
  `simbol_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id`, `nm_jabatan`, `simbol_jabatan`) VALUES
(3, 'Kepala Sentra Pelayanan Kepolisian Terpadu', 'KA SPKT'),
(5, 'Anggota', 'ANGGOTA'),
(10, 'Kepala Kepolisian Sektor', 'KAPOLSEK'),
(13, 'Kepala Seksi Umum', 'KASIUM'),
(14, 'Wakil Kepolisian Sektor ', 'WAKAPOLSEK'),
(15, 'Kepala Unit Profesi dan Pengamanan ', 'KANIT  PROPAM'),
(16, 'Bintara Urusan Umum', 'BANUM'),
(17, 'Bintara Administrasi ', 'BAMIN'),
(18, 'Kepala Unit Intelijen Keamanan ', 'KANIT INTELKAM'),
(19, 'Pelayan Unit Intellijen Keamanan ', 'PANIT INTELKAM'),
(20, 'Bintara Unit Intelijen dan Keamanan ', 'BANIT INTELKAM'),
(21, 'Kepala Unit Reserse Kriminal ', 'KANIT RESKRIM'),
(22, 'Pelayan Unit Reserse Kriminal ', 'PANIT RESKRIM'),
(23, 'Bintara Unit Reserse  Kriminal ', 'BANIT RESKRIM'),
(24, 'Kepala Unit Pembinaan Masyarakat ', 'KANIT BINMAS'),
(25, 'Bintara Unit Pembinaan Masyarakat ', 'BANIT BINMAS'),
(26, 'Kepala Unit SAMAPTA', 'KA SAMAPTA'),
(27, 'Bintara Unit SAMAPTA', 'BANIT SAMAPTA'),
(28, 'Kepala Unit Lalu Lintas ', 'KANIT LANTAS'),
(29, 'Bintara Unit Lalu Lintas ', 'BANIT LANTAS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_mutasi`
--

CREATE TABLE `tb_jenis_mutasi` (
  `id` int(11) NOT NULL,
  `jenis_mutasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_mutasi`
--

INSERT INTO `tb_jenis_mutasi` (`id`, `jenis_mutasi`) VALUES
(1, 'Penerimaan'),
(3, 'Penyerahan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mutasi`
--

CREATE TABLE `tb_mutasi` (
  `id` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `mutasi` varchar(500) NOT NULL,
  `ket_mutasi` varchar(50) NOT NULL,
  `barang_buku` varchar(50) NOT NULL,
  `jumlah_buku` varchar(3) NOT NULL,
  `barang_senpiss` varchar(50) NOT NULL,
  `jumlah_senpiss` varchar(3) NOT NULL,
  `barang_senpirm` varchar(50) NOT NULL,
  `jumlah_senpirm` varchar(3) NOT NULL,
  `barang_senpirev` varchar(50) NOT NULL,
  `jumlah_senpirev` varchar(3) NOT NULL,
  `kejadian_kejahatan` varchar(50) NOT NULL,
  `jumlah_kejahatan` varchar(3) NOT NULL,
  `kejadian_pelanggaran` varchar(50) NOT NULL,
  `jumlah_pelanggaran` varchar(3) NOT NULL,
  `kejadian_lain` varchar(50) NOT NULL,
  `jumlah_lain` varchar(3) NOT NULL,
  `tahanan_laki` varchar(50) NOT NULL,
  `jumlah_tahananlaki` varchar(3) NOT NULL,
  `tahanan_perempuan` varchar(50) NOT NULL,
  `jumlah_tahananper` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mutasi`
--

INSERT INTO `tb_mutasi` (`id`, `id_anggota`, `id_jenis`, `id_shift`, `tanggal`, `jam`, `mutasi`, `ket_mutasi`, `barang_buku`, `jumlah_buku`, `barang_senpiss`, `jumlah_senpiss`, `barang_senpirm`, `jumlah_senpirm`, `barang_senpirev`, `jumlah_senpirev`, `kejadian_kejahatan`, `jumlah_kejahatan`, `kejadian_pelanggaran`, `jumlah_pelanggaran`, `kejadian_lain`, `jumlah_lain`, `tahanan_laki`, `jumlah_tahananlaki`, `tahanan_perempuan`, `jumlah_tahananper`) VALUES
(21, 3, 1, 2, '2023-07-25', '15:00:00', 'kegiatan harian jaga', 'jaga harian', 'ada', '1', 'ada', '1', 'ada', '1', 'ada', '1', 'ada', '1', 'ada', '1', 'ada', '1', 'ada', '1', 'ada', '1'),
(25, 12, 3, 3, '2023-07-26', '21:05:00', 'ada', 'tes', 'ada', '1', 'ada', '1', 'ada', '1', 'ada', '1', 'ada', '1', 'ada', '1', 'ada', '1', 'ada', '1', 'ada', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_regu`
--

CREATE TABLE `tb_regu` (
  `id` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `nm_regu` varchar(10) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_regu`
--

INSERT INTO `tb_regu` (`id`, `id_anggota`, `id_shift`, `nm_regu`, `tgl`) VALUES
(28, 3, 2, 'Regu 1', '2023-07-25'),
(29, 18, 2, 'Regu 1', '2023-07-25'),
(30, 19, 2, 'Regu 1', '2023-07-25'),
(31, 20, 2, 'Regu 1', '2023-07-25'),
(32, 21, 3, 'Regu 2', '2023-07-25'),
(33, 22, 3, 'Regu 2', '2023-07-25'),
(34, 23, 3, 'Regu 2', '2023-07-25'),
(35, 9, 2, 'Regu 1', '2023-07-25'),
(36, 12, 3, 'Regu 2', '2023-07-25'),
(37, 14, 3, 'Regu 2', '2023-07-25'),
(38, 15, 3, 'Regu 2', '2023-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_shift`
--

CREATE TABLE `tb_shift` (
  `id` int(11) NOT NULL,
  `nm_shift` varchar(50) NOT NULL,
  `jam_piket` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `ket_jaga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_shift`
--

INSERT INTO `tb_shift` (`id`, `nm_shift`, `jam_piket`, `jam_keluar`, `ket_jaga`) VALUES
(2, 'Pagi', '08:00:00', '20:00:00', 'Jadwal Jaga Pagi (08.00-20.00)'),
(3, 'Malam', '20:00:00', '08:00:00', 'Jadwal Jaga Malam (20.00-08.00)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE `tb_unit` (
  `id` int(11) NOT NULL,
  `nm_unit` varchar(50) NOT NULL,
  `simbol_unit` varchar(10) NOT NULL,
  `id_anggota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`id`, `nm_unit`, `simbol_unit`, `id_anggota`) VALUES
(1, 'Sentra Pelayanan Kepolisian Terpadu', 'SPKT', 3),
(3, 'Intelijen keamanan', 'INTELKAM', 17),
(4, 'Reserse Kriminal ', 'RESKRIM', 14),
(5, 'Pembinaan Masyarakat', 'BINMAS', 15),
(6, 'Profesi dan Pengamanan', 'PROPAM', 16),
(7, 'Seksi Umum', 'SIUM', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:Admin, 2:Unit, 3:Kapolsek, 4:Satuan',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_anggota`, `name`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(23, 9, 'Jimmy Hasiolan Saragi', 'kapolsek@gmail.com', '$2y$10$8H43P8N6mblb8ZR4ZjAPnuuMEpf9A2VIU1Ilg0ZfA9O/Kc1XVgfwe', 3, NULL, NULL),
(24, 12, 'Hasmaini', 'adminkasium@gmail.com', '$2y$10$SlxTVLPIN0fVEHwZNbDKVeN24MhJDTHk/iWP/FSyu0KEsmuXY8QMi', 1, NULL, NULL),
(25, 17, 'Muhammad Taufiq', 'intelkampolsekjuai@gmail.com', '$2y$10$.X9Usv8InJVzyNXzQTSbS.mE8ByVF/GBJkczVRySYK7McI4MIwyGS', 2, NULL, NULL),
(27, 23, 'Muhammad Raihan', 'raihan@gmail.com', '$2y$10$S9m.nSPeyev.tapHkh6FhObWZhJekMcMK71hPuJbRIKATaE/yfl02', 4, NULL, NULL),
(28, 22, 'Noor Indra Mustafa', 'indra@gmail.com', '$2y$10$u4AVw9/GJ23cSZpyWIue8u.o1tJF9/My2Bg2jE7Nx2c/LXq7hwPOi', 4, NULL, NULL),
(29, 21, 'Hafizh Albarez', 'hafizh@gmail.com', '$2y$10$l9ZzHY7JBAK./7vBP6HIoeo8sxzy.IhC2M3nQ/Quibd0YcfdCIeoC', 4, NULL, NULL),
(30, 20, 'Aris Stiawan', 'aris@gmail.com', '$2y$10$22my7xnNYEzrkKpnfvdQYeZ/Zk3.y914m34yrayVP6mIG20An4DTq', 4, NULL, NULL),
(31, 19, 'Riko Jeksen Thiago', 'riko@gmail.com', '$2y$10$7ZGLS9/mxJFTRcrV./8aEeasAHkO.T17rirQDEB8/Q4QZOlPCRYGK', 4, NULL, NULL),
(32, 18, 'Muhammad Ikraam', 'ikram@gmail.com', '$2y$10$k4ul11bl8n.PdOu1cnUpQuuICOxF9j26NZCoKjtKE3wl06azCEHlm', 4, NULL, NULL),
(34, 3, 'Ahmad Rizali', 'ahmad@gmail.com', '$2y$10$Fif65EMbCToRFsVxDBQbP.EEuWry/LekGpvPj8ZwJFx1thhiYCWKK', 4, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `tb_dokumentasi`
--
ALTER TABLE `tb_dokumentasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenis_mutasi`
--
ALTER TABLE `tb_jenis_mutasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mutasi`
--
ALTER TABLE `tb_mutasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_shift` (`id_shift`);

--
-- Indexes for table `tb_regu`
--
ALTER TABLE `tb_regu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_shift` (`id_shift`);

--
-- Indexes for table `tb_shift`
--
ALTER TABLE `tb_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_dokumentasi`
--
ALTER TABLE `tb_dokumentasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_jenis_mutasi`
--
ALTER TABLE `tb_jenis_mutasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_mutasi`
--
ALTER TABLE `tb_mutasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_regu`
--
ALTER TABLE `tb_regu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_shift`
--
ALTER TABLE `tb_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_unit`
--
ALTER TABLE `tb_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD CONSTRAINT `tb_berkas_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `tb_unit` (`id`);

--
-- Constraints for table `tb_dokumentasi`
--
ALTER TABLE `tb_dokumentasi`
  ADD CONSTRAINT `tb_dokumentasi_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `tb_unit` (`id`);

--
-- Constraints for table `tb_mutasi`
--
ALTER TABLE `tb_mutasi`
  ADD CONSTRAINT `tb_mutasi_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis_mutasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_mutasi_ibfk_2` FOREIGN KEY (`id_shift`) REFERENCES `tb_shift` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_mutasi_ibfk_3` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_regu`
--
ALTER TABLE `tb_regu`
  ADD CONSTRAINT `tb_regu_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_regu_ibfk_2` FOREIGN KEY (`id_shift`) REFERENCES `tb_shift` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD CONSTRAINT `tb_unit_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
