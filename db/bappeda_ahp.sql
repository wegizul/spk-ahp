-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 04:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bappeda_ahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ir`
--

CREATE TABLE `ir` (
  `jumlah` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ir`
--

INSERT INTO `ir` (`jumlah`, `nilai`) VALUES
(1, 0),
(2, 0),
(3, 0.58),
(4, 0.9),
(5, 1.12),
(6, 1.24),
(7, 1.32),
(8, 1.41),
(9, 1.45),
(10, 1.49),
(11, 1.51),
(12, 1.48),
(13, 1.56),
(14, 1.57),
(15, 1.59);

-- --------------------------------------------------------

--
-- Table structure for table `peta`
--

CREATE TABLE `peta` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(150) NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `lonfitude` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peta`
--

INSERT INTO `peta` (`id_kecamatan`, `nama_kecamatan`, `latitude`, `lonfitude`) VALUES
(2, 'Rengat', -0.386713, 102.542397),
(3, 'Rengat Barat', -0.386713, 102.542397),
(4, 'Kuala Cenaku', -0.182414, 102.667557),
(5, 'Lirik', -0.274365, 102.277687),
(6, 'Peranap', -0.773957, 102.026138),
(7, 'Seberida', -0.921860, 102.392212),
(8, 'Sungai Lala', 0.000000, 102.000000),
(9, 'Pasir Penyu', 0.000000, 102.000000),
(10, 'Lubuk Batu Jaya', 0.000000, 102.000000),
(11, 'Kelayang', 0.000000, 102.000000),
(12, 'Rakit Kulim', 0.000000, 102.000000),
(13, 'Batang Cenaku', 0.000000, 102.000000),
(14, 'Pasir Penyu', -0.343230, 102.306305),
(15, 'Batang Gangsal', -0.741640, 102.524948);

-- --------------------------------------------------------

--
-- Table structure for table `tb_banding_alternatif`
--

CREATE TABLE `tb_banding_alternatif` (
  `id` int(11) NOT NULL,
  `alternatif1` int(11) DEFAULT NULL,
  `alternatif2` int(11) DEFAULT NULL,
  `pembanding` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_banding_alternatif`
--

INSERT INTO `tb_banding_alternatif` (`id`, `alternatif1`, `alternatif2`, `pembanding`, `nilai`) VALUES
(43, 1, 2, 1, 1),
(44, 1, 3, 1, 5),
(45, 1, 4, 1, 2),
(46, 1, 5, 1, 2),
(47, 1, 6, 1, 3),
(48, 1, 7, 1, 1),
(49, 2, 3, 1, 9),
(50, 2, 4, 1, 3),
(51, 2, 5, 1, 7),
(52, 2, 6, 1, 2),
(53, 2, 7, 1, 9),
(54, 3, 4, 1, 1),
(55, 3, 5, 1, 5),
(56, 3, 6, 1, 1),
(57, 3, 7, 1, 1),
(58, 4, 5, 1, 1),
(59, 4, 6, 1, 9),
(60, 4, 7, 1, 1),
(61, 5, 6, 1, 3),
(62, 5, 7, 1, 3),
(63, 6, 7, 1, 1),
(64, 1, 2, 3, 3),
(65, 1, 3, 3, 2),
(66, 1, 4, 3, 2),
(67, 1, 5, 3, 2),
(68, 1, 6, 3, 2),
(69, 1, 7, 3, 2),
(70, 2, 3, 3, 5),
(71, 2, 4, 3, 5),
(72, 2, 5, 3, 2),
(73, 2, 6, 3, 5),
(74, 2, 7, 3, 7),
(75, 3, 4, 3, 2),
(76, 3, 5, 3, 3),
(77, 3, 6, 3, 2),
(78, 3, 7, 3, 3),
(79, 4, 5, 3, 2),
(80, 4, 6, 3, 5),
(81, 4, 7, 3, 4),
(82, 5, 6, 3, 3),
(83, 5, 7, 3, 6),
(84, 6, 7, 3, 3),
(85, 1, 2, 2, 5),
(86, 1, 3, 2, 7),
(87, 1, 4, 2, 5),
(88, 1, 5, 2, 2),
(89, 1, 6, 2, 2),
(90, 1, 7, 2, 7),
(91, 2, 3, 2, 3),
(92, 2, 4, 2, 7),
(93, 2, 5, 2, 2),
(94, 2, 6, 2, 2),
(95, 2, 7, 2, 2),
(96, 3, 4, 2, 5),
(97, 3, 5, 2, 2),
(98, 3, 6, 2, 9),
(99, 3, 7, 2, 7),
(100, 4, 5, 2, 1),
(101, 4, 6, 2, 7),
(102, 4, 7, 2, 1),
(103, 5, 6, 2, 2),
(104, 5, 7, 2, 2),
(105, 6, 7, 2, 2),
(106, 1, 2, 4, 7),
(107, 1, 3, 4, 3),
(108, 1, 4, 4, 5),
(109, 1, 5, 4, 2),
(110, 1, 6, 4, 4),
(111, 1, 7, 4, 7),
(112, 2, 3, 4, 5),
(113, 2, 4, 4, 7),
(114, 2, 5, 4, 9),
(115, 2, 6, 4, 6),
(116, 2, 7, 4, 5),
(117, 3, 4, 4, 2),
(118, 3, 5, 4, 4),
(119, 3, 6, 4, 6),
(120, 3, 7, 4, 8),
(121, 4, 5, 4, 5),
(122, 4, 6, 4, 3),
(123, 4, 7, 4, 9),
(124, 5, 6, 4, 2),
(125, 5, 7, 4, 3),
(126, 6, 7, 4, 3),
(127, 1, 2, 5, 2),
(128, 1, 3, 5, 7),
(129, 1, 4, 5, 7),
(130, 1, 5, 5, 9),
(131, 1, 6, 5, 2),
(132, 1, 7, 5, 8),
(133, 2, 3, 5, 3),
(134, 2, 4, 5, 5),
(135, 2, 5, 5, 7),
(136, 2, 6, 5, 3),
(137, 2, 7, 5, 5),
(138, 3, 4, 5, 5),
(139, 3, 5, 5, 5),
(140, 3, 6, 5, 7),
(141, 3, 7, 5, 9),
(142, 4, 5, 5, 9),
(143, 4, 6, 5, 7),
(144, 4, 7, 5, 2),
(145, 5, 6, 5, 7),
(146, 5, 7, 5, 2),
(147, 6, 7, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_banding_kriteria`
--

CREATE TABLE `tb_banding_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria1` int(11) DEFAULT NULL,
  `kriteria2` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_banding_kriteria`
--

INSERT INTO `tb_banding_kriteria` (`id`, `kriteria1`, `kriteria2`, `nilai`) VALUES
(21, 1, 2, 1),
(22, 1, 3, 9),
(23, 1, 4, 3),
(24, 1, 5, 7),
(25, 2, 3, 3),
(26, 2, 4, 3),
(27, 2, 5, 3),
(28, 3, 4, 1),
(29, 3, 5, 1),
(30, 4, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `kriteria_kode` varchar(50) NOT NULL,
  `kriteria_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kriteria_id`, `kriteria_kode`, `kriteria_nama`) VALUES
(1, '001', 'Daya Guna'),
(2, '002', 'Kondisi'),
(3, '003', 'Budget'),
(4, '004', 'Daya Tahan'),
(5, '005', 'Waktu Pelaksanaan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembangunan`
--

CREATE TABLE `tb_pembangunan` (
  `id_pembangunan` int(11) NOT NULL,
  `nama_pembangunan` varchar(100) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembangunan`
--

INSERT INTO `tb_pembangunan` (`id_pembangunan`, `nama_pembangunan`, `nama_kecamatan`) VALUES
(1, 'Jalan ', 'Kuala Cenaku'),
(2, 'Drainase / Gorong-gorong', 'Rengat'),
(3, 'Penerangan Jalan dan Taman Kota', 'Rengat Barat'),
(4, 'Sarana dan Prasarana Pemerintah', 'Seberida'),
(5, 'Penyediaan Tanah dan Pembangunan', 'Seberida'),
(6, 'Fasiitas Lalu Lintas', 'Rengat Barat'),
(7, 'Kantor Camat', 'Bellilas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pv_alternatif`
--

CREATE TABLE `tb_pv_alternatif` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pv_alternatif`
--

INSERT INTO `tb_pv_alternatif` (`id`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(1, 1, 1, 0.191457),
(2, 2, 1, 0.327244),
(3, 3, 1, 0.0949591),
(4, 4, 1, 0.135898),
(5, 5, 1, 0.0981145),
(6, 6, 1, 0.0681987),
(7, 7, 1, 0.084128),
(8, 1, 3, 0.220679),
(9, 2, 3, 0.282296),
(10, 3, 3, 0.139398),
(11, 4, 3, 0.134327),
(12, 5, 3, 0.113729),
(13, 6, 3, 0.0652127),
(14, 7, 3, 0.0443575),
(15, 1, 2, 0.327025),
(16, 2, 2, 0.170331),
(17, 3, 2, 0.196722),
(18, 4, 2, 0.0915872),
(19, 5, 2, 0.0928991),
(20, 6, 2, 0.077661),
(21, 7, 2, 0.0437744),
(22, 1, 4, 0.323765),
(23, 2, 4, 0.276301),
(24, 3, 4, 0.150562),
(25, 4, 4, 0.117299),
(26, 5, 4, 0.066227),
(27, 6, 4, 0.0435889),
(28, 7, 4, 0.0222574),
(29, 1, 5, 0.352832),
(30, 2, 5, 0.208214),
(31, 3, 5, 0.171766),
(32, 4, 5, 0.11169),
(33, 5, 5, 0.0650642),
(34, 6, 5, 0.0626329),
(35, 7, 5, 0.0278005);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pv_kriteria`
--

CREATE TABLE `tb_pv_kriteria` (
  `id` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pv_kriteria`
--

INSERT INTO `tb_pv_kriteria` (`id`, `id_kriteria`, `nilai`) VALUES
(1, 1, 0.419491),
(2, 2, 0.292432),
(3, 3, 0.0802995),
(4, 4, 0.144536),
(5, 5, 0.0632413);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tipe` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_users`, `nama`, `tipe`, `username`, `password`) VALUES
(1, 'mesi', 'user', 'admin', 'admin'),
(2, 'pak indra', 'pimpinan', 'indra', 'indra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ir`
--
ALTER TABLE `ir`
  ADD PRIMARY KEY (`jumlah`);

--
-- Indexes for table `peta`
--
ALTER TABLE `peta`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `tb_banding_alternatif`
--
ALTER TABLE `tb_banding_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_banding_kriteria`
--
ALTER TABLE `tb_banding_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `tb_pembangunan`
--
ALTER TABLE `tb_pembangunan`
  ADD PRIMARY KEY (`id_pembangunan`);

--
-- Indexes for table `tb_pv_alternatif`
--
ALTER TABLE `tb_pv_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pv_kriteria`
--
ALTER TABLE `tb_pv_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peta`
--
ALTER TABLE `peta`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_banding_alternatif`
--
ALTER TABLE `tb_banding_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `tb_banding_kriteria`
--
ALTER TABLE `tb_banding_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pembangunan`
--
ALTER TABLE `tb_pembangunan`
  MODIFY `id_pembangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pv_alternatif`
--
ALTER TABLE `tb_pv_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_pv_kriteria`
--
ALTER TABLE `tb_pv_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
