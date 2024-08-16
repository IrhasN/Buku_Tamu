-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2024 at 02:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `id_keperluan` int(11) NOT NULL,
  `telp` varchar(250) NOT NULL,
  `waktu` datetime NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `status1` varchar(256) NOT NULL,
  `catatan1` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `log_user` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id`, `nama`, `id_instansi`, `id_tujuan`, `id_keperluan`, `telp`, `waktu`, `keterangan`, `status1`, `catatan1`, `id_user`, `log_user`) VALUES
(49, 'Hj. Eka Nor Efiani', 4, 7, 5, '08533269664', '2024-05-22 13:15:37', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(50, 'Mursalin', 4, 7, 5, '08533269664', '2024-05-22 13:16:18', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(51, 'Paharlani', 4, 7, 5, '08533269664', '2024-05-22 13:16:51', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(52, 'Hj.Norhidayah', 4, 7, 5, '08533269664', '2024-05-22 13:18:25', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(53, 'Abd Rahman', 4, 7, 5, '08533269664', '2024-05-22 13:19:12', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(54, 'Sunardi', 4, 7, 5, '08533269664', '2024-05-22 13:20:30', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(55, 'Moh Wahyudi', 4, 7, 5, '08533269664', '2024-05-22 13:21:15', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(56, 'AG. Rahman', 4, 7, 5, '08533269664', '2024-05-22 13:21:41', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(57, 'Hj. Sumiati', 4, 7, 5, '08533269664', '2024-05-22 13:22:11', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(58, 'Meluis', 4, 7, 5, '08533269664', '2024-05-22 13:23:12', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(59, 'Faehruddin', 4, 7, 5, '08533269664', '2024-05-22 13:23:35', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(60, 'M. Kurniawan A.S.Kom', 5, 7, 6, '0816286291', '2024-05-22 13:27:45', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(61, 'Bima Santoso', 5, 7, 6, '0816286291', '2024-05-22 13:28:58', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(62, 'H. Abdul Kasir HB', 5, 7, 6, '0816286291', '2024-05-22 13:29:31', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(63, 'Paisal Damarsing Sp', 5, 7, 6, '0816286291', '2024-05-22 13:30:00', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(64, 'Hj. Rusmawati', 5, 7, 6, '0816286291', '2024-05-22 13:30:45', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(65, 'Handoyo J Wibowo', 5, 7, 6, '', '2024-05-22 13:31:14', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(66, 'H. Bunyamin', 5, 7, 6, '0816286291', '2024-05-22 13:31:47', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(67, 'Modika Latifah M', 5, 7, 6, '0816286291', '2024-05-22 13:32:15', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(68, 'Khozaini S.Kom', 5, 7, 6, '0816286291', '2024-05-22 13:32:48', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(69, 'Ali Yasin', 5, 7, 6, '0816286291', '2024-05-22 13:33:14', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(70, 'Suharmadi', 5, 7, 6, '0816286291', '2024-05-22 13:33:42', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(71, 'Rizqa Munadiyah', 6, 7, 7, '085157544485', '2024-05-22 13:35:05', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(72, 'Ewan Robiansyah, ST', 7, 7, 7, '085112341421', '2024-05-22 13:37:31', 'kosong', '', '', 9, 'FrontOffice@gmail.com'),
(73, 'Siti Mulkan, A.Md', 7, 7, 7, '085112341421', '2024-05-22 13:38:20', 'kosong', 'Diterima', '', 9, 'FrontOffice@gmail.com'),
(74, 'Rahmalina, A.Md', 7, 7, 7, '085112341421', '2024-05-22 13:38:55', 'kosong', 'Diterima', '', 9, 'FrontOffice@gmail.com'),
(75, 'Rakhmawati', 7, 7, 7, '085112341421', '2024-05-22 13:39:24', 'kosong', 'Diterima', '', 9, 'FrontOffice@gmail.com'),
(76, 'Rahnida Santi', 7, 7, 7, '085112341421', '2024-05-22 13:39:45', 'kosong', 'Diterima', '', 9, 'FrontOffice@gmail.com'),
(88, 'test', 1, 7, 4, '11111', '2024-08-01 10:31:46', 'www', '', '', 9, ''),
(89, 'test', 1, 7, 4, '11111', '2024-08-01 10:33:21', 'www', '', '', 29, 'irhas@gmail.com'),
(90, 'test', 1, 7, 5, '11111', '2024-08-01 10:34:25', 'www', 'Diterima', '', 9, 'FrontOffice@gmail.com'),
(91, '123', 4, 7, 2, '123', '2024-08-04 20:46:13', 'wwww', 'Diterima', 'lansung ke bagian umpeg', 29, 'irhas@gmail.com'),
(92, 'test1', 5, 7, 4, '123', '2024-08-08 06:58:56', 'wwww', 'Diterima', '', 9, 'FrontOffice@gmail.com'),
(93, 'test2', 4, 16, 4, '123', '2024-08-08 07:00:44', 'wwww', 'Diterima', '', 9, 'FrontOffice@gmail.com'),
(94, 'test3', 1, 17, 8, '123', '2024-08-08 07:02:31', 'wwww', 'Diterima', '', 9, 'FrontOffice@gmail.com'),
(95, 'test4', 4, 18, 5, '123', '2024-08-08 07:30:41', 'wwww', 'Diterima', '', 9, 'FrontOffice@gmail.com'),
(96, 'test5', 6, 19, 5, '123', '2024-08-08 07:33:18', 'wwww', 'Diterima', '', 9, 'FrontOffice@gmail.com'),
(97, 'Irhas', 4, 7, 8, '123', '2024-08-08 09:18:36', 'wwww', 'Diterima', '', 9, 'FrontOffice@gmail.com'),
(98, 'M.Safe&#039;i', 9, 7, 9, '0812224433111', '2024-08-08 09:22:28', 'kosong', 'Ditolak', '', 9, 'FrontOffice@gmail.com'),
(99, 'erwin', 10, 17, 6, '123456789', '2024-08-08 09:36:26', 'menamkan modal', 'Diterima', 'setealh 5 menit masuk ruangan', 9, 'FrontOffice@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `data_instansi`
--

CREATE TABLE `data_instansi` (
  `id` int(11) NOT NULL,
  `instansi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_instansi`
--

INSERT INTO `data_instansi` (`id`, `instansi`) VALUES
(1, 'Dinas Komunikasi, Informatika dan Statistik Kota Banjarmasin'),
(4, 'DPRD Tabalong'),
(5, 'DPRD Kotawaringin Timur'),
(6, 'Satgas UUCK'),
(7, 'Dinas PTSP dan Tenaga Kerja (Hulu Sungai Tengah)'),
(8, 'Pemko Banjarmasin'),
(9, 'BSI kcp ahmad yani'),
(10, 'Univertas Muhammdiyah Banjarmasin');

-- --------------------------------------------------------

--
-- Table structure for table `data_keperluan`
--

CREATE TABLE `data_keperluan` (
  `id` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_keperluan`
--

INSERT INTO `data_keperluan` (`id`, `keperluan`) VALUES
(2, '0'),
(3, '0'),
(4, 'test'),
(5, 'Koordinasi dan Konstruksi'),
(6, 'Sinergi dan Konsultasi'),
(7, 'Kunjungan Kerja'),
(8, 'Sosialisasi'),
(9, 'Permintaan data umum');

-- --------------------------------------------------------

--
-- Table structure for table `data_tujuan`
--

CREATE TABLE `data_tujuan` (
  `id` int(11) NOT NULL,
  `tujuan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_tujuan`
--

INSERT INTO `data_tujuan` (`id`, `tujuan`) VALUES
(7, 'Sekretaris'),
(16, 'Kepala Bidang Usaha Mikro'),
(17, 'Kepala Bidang Koperasi'),
(18, 'Kepala Bidang Pembinaan Pelatihan dan Penempatan Kerja'),
(19, 'Kepala Bidang Koperasi Hubungan Industrial dan Jaminan Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` varchar(100) NOT NULL,
  `is_active` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `unit_kerja` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role_id`, `is_active`, `date`, `unit_kerja`) VALUES
(9, 'Ahmad', 'FrontOffice@gmail.com', '$2y$10$cO9QH.ueAyIykbypIVV9.uU9OmtRISQpyTXTwMzPMgCcdi830PBDq', 'FrontOffice', 'aktif', '2023-01-26 14:54:55', 'FrontOffice'),
(11, 'hasnur', 'irhasnor@gmail.com', '$2y$10$LHj57sXc5ph/cP3jJMuxRuZIgubyDFuVvkCL0KH2zlE.jLEmpPJie', 'Sekretaris', 'aktif', '2023-11-06 15:10:42', '31'),
(20, 'Kepala Bidang Usaha Mikro', 'KepalaBidangUsahaMikro@gmail.com', '$2y$10$jb1F0KFC0ssY3M477PdwRe6BQiI7AW1XS8NkAH1QqQSBW0AVVxDv6', 'KepalaBidangUsahaMikro', 'aktif', '2023-12-27 12:04:31', 'Kepala Bidang Usaha Mikro'),
(21, 'Kepala Bidang Koperasi', 'KepalaBidangKoperasi@gmail.com', '$2y$10$TnjlYdqviB1HP02n.ztbtO4mlIBHYvs1BoQ9dt.A.vdw9siY903ga', 'KepalaBidangKoperasi', 'aktif', '2023-12-27 12:05:01', 'Kepala Bidang Koperasi'),
(23, 'Kepala Bidang Koperasi Hubungan Industrial dan Jaminan Sosial', 'KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial@gmail.com', '$2y$10$3haL8wjICcGBfS1gVrKNK.TCnvAKSCEsOuJUwxLoJ2Mkj/qf6dwKy', 'KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial', 'aktif', '2023-12-27 12:05:50', 'Kepala Bidang Koperasi Hubungan Industrial dan Jaminan Sosial'),
(26, 'sekretaris', 'sekretaris@gmail.com', '$2y$10$LxyyqPy0hHJgWn4tNspVM.zSwefNtvfMPyUoTzrdy8ccVXfq1Q6/m', 'Sekretaris', 'aktif', '2024-05-17 09:39:04', 'sekretaris'),
(27, 'sekretaris', 'Sekretaris1@gmail.com', '$2y$10$K.yXLhrvhYGMke4rO6t.eu4HGJAfDzxlPtCDc3dOaNsJTNeD8lHXC', 'Sekretaris', 'tidak', '2024-05-17 09:40:58', 'sekretaris'),
(28, 'Kepala Bidang Pembinaan Pelatihan dan Penempatan Kerja', 'KepalaBidangPembinaanPelatihandanPenempatanKerja@gmail.com', '$2y$10$l4V5GS3jXc2aFqe8BRbedu3PRfKy5aB27luSnCJzB4A4Kix4WzGMm', 'KepalaBidangPembinaanPelatihandanPenempatanKerja', 'aktif', '2024-05-20 06:00:53', 'Kepala Bidang Pembinaan Pelatihan dan Penempatan Kerja'),
(29, 'irhas', 'irhas@gmail.com', '$2y$10$fju4/bM317PrlPisolxp6uhHzbnx5Zx7MCW7XX6dKNURMcCSjqjv2', 'FrontOffice', 'aktif', '2024-05-29 09:02:54', 'Front Office'),
(30, 'mas', 'mas@gmail.com', '$2y$10$AZCJXsAFwYgvHJh7ZIELnO/EQw.uB.84tJFjCLGWMmBjV9a97xuES', '', 'aktif', '2024-07-17 23:23:13', '222'),
(31, 'mas', 'kadis@gmail.com', '$2y$10$GW/0x3NuqxbNoulK.76wvu..9I0uqhe49kujuJ3TyKzB0iAbtOfce', '', 'tidak', '2024-07-20 14:42:39', '1'),
(32, 'testss', 'tset@gmail.com', '$2y$10$C6W4ezOFYvJZ/I9A.qjFWujzDUOcGwtvEBKUQqv5eQUEHc0ZCb8My', 'Sekretaris', 'tidak', '2024-08-05 11:57:07', 'Umpeg'),
(33, 'TEST', 'Kpla@gmail.com', '$2y$10$nbgfHr4W6luOEC1wBqKyt.7PNiuUyVIHZbolILwwr68c/tcMC6m46', 'KepalaBidangKoperasiHubunganIndustrialdanJaminanSosial', 'aktif', '2024-08-08 07:33:55', 'Kepala Bidang Koperasi Hubungan Industrial dan Jaminan Sosial'),
(34, 'noor', 'nor@gmail.com', '$2y$10$NeuIwWchNvv/fabBlkCyZeHrhF8YZaAPKeYWt291yDFzGw0G30AQy', 'KepalaBidangUsahaMikro', 'aktif', '2024-08-08 09:24:51', 'Bidang usaha mikro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_instansi` (`id_instansi`),
  ADD KEY `id_tujuan` (`id_tujuan`,`id_keperluan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_keperluan` (`id_keperluan`);

--
-- Indexes for table `data_instansi`
--
ALTER TABLE `data_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_keperluan`
--
ALTER TABLE `data_keperluan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_tujuan`
--
ALTER TABLE `data_tujuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `data_instansi`
--
ALTER TABLE `data_instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_keperluan`
--
ALTER TABLE `data_keperluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_tujuan`
--
ALTER TABLE `data_tujuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD CONSTRAINT `buku_tamu_ibfk_1` FOREIGN KEY (`id_instansi`) REFERENCES `data_instansi` (`id`),
  ADD CONSTRAINT `buku_tamu_ibfk_2` FOREIGN KEY (`id_tujuan`) REFERENCES `data_tujuan` (`id`),
  ADD CONSTRAINT `buku_tamu_ibfk_3` FOREIGN KEY (`id_keperluan`) REFERENCES `data_keperluan` (`id`),
  ADD CONSTRAINT `buku_tamu_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
