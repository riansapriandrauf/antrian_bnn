-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2024 at 12:29 AM
-- Server version: 10.2.44-MariaDB-cll-lve
-- PHP Version: 8.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rdms2673_anggel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_antrian`
--

CREATE TABLE `tb_antrian` (
  `id_antrian` int(11) NOT NULL,
  `id_datadiri` int(11) NOT NULL,
  `tgl_antrian` date NOT NULL,
  `no_antrian` varchar(11) NOT NULL,
  `status_antrian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_antrian`
--

INSERT INTO `tb_antrian` (`id_antrian`, `id_datadiri`, `tgl_antrian`, `no_antrian`, `status_antrian`) VALUES
(3, 8, '2024-03-04', '1', 1),
(4, 9, '2024-04-25', '1', 1),
(5, 10, '2024-05-07', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_datadiri`
--

CREATE TABLE `tb_datadiri` (
  `id_datadiri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `nik` varchar(17) NOT NULL,
  `jk` char(11) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `id_pekerjaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_datadiri`
--

INSERT INTO `tb_datadiri` (`id_datadiri`, `id_user`, `nama_lengkap`, `nik`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `id_pekerjaan`) VALUES
(8, 11, 'Andi Dheni Setiawan', '7401010904010001', 'l', 'Unamendaa', '2001-04-09', 'Jl. Wirabuana No. 22', 9),
(9, 12, 'kiki putri amelia', '7401104301030001', 'p', 'tamborasi', '2003-03-01', 'tamborasi', 9),
(10, 13, 'Damy', '7401012901880003', 'l', 'Kolaka', '1988-01-29', 'Kolaka', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasiltest`
--

CREATE TABLE `tb_hasiltest` (
  `id_hasiltes` int(11) NOT NULL,
  `id_antrian` int(11) NOT NULL,
  `id_datadiri` int(11) NOT NULL,
  `amphetamenie` int(11) NOT NULL,
  `methamphetamine` int(11) NOT NULL,
  `morphine` int(11) NOT NULL,
  `thc` int(11) NOT NULL,
  `cocaine` int(11) NOT NULL,
  `benzodiazepine` int(11) NOT NULL,
  `fisik` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_hasiltest`
--

INSERT INTO `tb_hasiltest` (`id_hasiltes`, `id_antrian`, `id_datadiri`, `amphetamenie`, `methamphetamine`, `morphine`, `thc`, `cocaine`, `benzodiazepine`, `fisik`, `tgl`) VALUES
(6, 3, 8, 2, 2, 2, 2, 2, 2, 2, '2024-03-03'),
(7, 4, 9, 1, 1, 1, 1, 1, 1, 2, '2024-04-24'),
(8, 5, 10, 2, 2, 2, 2, 2, 2, 2, '2024-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
(1, 'Petani'),
(2, 'Nelayan'),
(3, 'Operator mesin'),
(4, 'Teknisi'),
(5, 'Pekerja pabrik'),
(6, 'Pegawai kantor'),
(7, 'Pegawai administratif'),
(8, 'Pelayan toko atau restora'),
(9, 'Guru'),
(10, 'Dosen'),
(11, 'Dokter'),
(12, 'Perawat'),
(13, 'Apoteker'),
(14, 'Pengembang perangkat luna'),
(15, 'Analis sistem'),
(16, 'Akuntan'),
(17, 'Analis keuangan'),
(18, 'Teller bank'),
(19, 'Pemasar'),
(20, 'Sales representative'),
(21, 'Pemandu wisata'),
(22, 'Resepsionis hotel'),
(23, 'Koki'),
(24, 'Tukang bangunan'),
(25, 'Insinyur konstruksi'),
(26, 'Mandor proyek'),
(27, 'Sopir truk'),
(28, 'Kurir'),
(29, 'Manajer logistik'),
(30, 'Pengacara'),
(31, 'Notaris'),
(32, 'Hakim'),
(33, 'Seniman'),
(34, 'Penulis'),
(35, 'Pemain film/teater'),
(36, 'Manajer SDM'),
(37, 'Rekrutmen dan seleksi'),
(38, 'Pengembangan karyawan'),
(39, 'Ahli lingkungan'),
(40, 'Teknisi energi terbarukan'),
(41, 'Insinyur lingkungan'),
(42, 'Konselor'),
(43, 'Pekerja sosial'),
(44, 'Psikolog'),
(45, 'Peneliti'),
(46, 'Ilmuwan'),
(47, 'Pengembang produk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(6, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(7, 'lab', '3953f9ddf975ab5097ee468d99555c5b441169bf', 2),
(8, 'pimpinan', '59335c9f58c78597ff73f6706c6c8fa278e08b3a', 3),
(11, 'dheni', '24c7494fce4a7235eb5f38e74acdc760534a19e6', 0),
(12, 'user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', 0),
(13, 'damy', '9cf88e6038337ba5b2ed42c848f589995904ab76', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_antrian`
--
ALTER TABLE `tb_antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `relasi_datadiri_nomorantiran` (`id_datadiri`);

--
-- Indexes for table `tb_datadiri`
--
ALTER TABLE `tb_datadiri`
  ADD PRIMARY KEY (`id_datadiri`),
  ADD KEY `relasi_datadiri_user` (`id_user`),
  ADD KEY `relasi_pekerjaan` (`id_pekerjaan`);

--
-- Indexes for table `tb_hasiltest`
--
ALTER TABLE `tb_hasiltest`
  ADD PRIMARY KEY (`id_hasiltes`),
  ADD KEY `relasi_hasiltest_datadiri` (`id_datadiri`),
  ADD KEY `relasi_antrian_hasil` (`id_antrian`);

--
-- Indexes for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_antrian`
--
ALTER TABLE `tb_antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_datadiri`
--
ALTER TABLE `tb_datadiri`
  MODIFY `id_datadiri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_hasiltest`
--
ALTER TABLE `tb_hasiltest`
  MODIFY `id_hasiltes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_antrian`
--
ALTER TABLE `tb_antrian`
  ADD CONSTRAINT `relasi_datadiri_nomorantiran` FOREIGN KEY (`id_datadiri`) REFERENCES `tb_datadiri` (`id_datadiri`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_datadiri`
--
ALTER TABLE `tb_datadiri`
  ADD CONSTRAINT `relasi_datadiri_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_pekerjaan` FOREIGN KEY (`id_pekerjaan`) REFERENCES `tb_pekerjaan` (`id_pekerjaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_hasiltest`
--
ALTER TABLE `tb_hasiltest`
  ADD CONSTRAINT `relasi_antrian_hasil` FOREIGN KEY (`id_antrian`) REFERENCES `tb_antrian` (`id_antrian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_hasiltest_datadiri` FOREIGN KEY (`id_datadiri`) REFERENCES `tb_datadiri` (`id_datadiri`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
