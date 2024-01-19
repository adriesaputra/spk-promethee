-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2024 at 04:19 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `promethee`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int NOT NULL,
  `nik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_alternatif` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tmp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ibu_kandung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nik`, `nama_alternatif`, `tmp_lahir`, `tgl_lahir`, `gender`, `ibu_kandung`) VALUES
(2, '12345678910', 'Irawan Kurniadi', 'Kumu Sejati', '2014-01-15', 'male', 'Fatimah'),
(4, '12345678911', 'Ahmad Baijuri', 'Pekanbaru', '2006-01-03', 'male', 'Megawati'),
(5, '', 'Sunardi', '', NULL, '', ''),
(6, '', 'Sunarti', '', NULL, '', ''),
(7, '', 'Sumiati', '', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `entering_flow`
--

CREATE TABLE `entering_flow` (
  `id_ef` int NOT NULL,
  `id_alternatif` int NOT NULL,
  `indek` int NOT NULL,
  `nilai_ef` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entering_flow`
--

INSERT INTO `entering_flow` (`id_ef`, `id_alternatif`, `indek`, `nilai_ef`) VALUES
(502, 2, 1, 0.45),
(503, 4, 2, 0.35),
(504, 5, 3, 0.6),
(505, 6, 4, 0.6),
(506, 7, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `index_preferensi`
--

CREATE TABLE `index_preferensi` (
  `id_ip` int NOT NULL,
  `id_alternatif` int NOT NULL,
  `indek` int NOT NULL,
  `nilai_ip` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `index_preferensi`
--

INSERT INTO `index_preferensi` (`id_ip`, `id_alternatif`, `indek`, `nilai_ip`) VALUES
(2449, 2, 1, 0),
(2450, 2, 2, 0.4),
(2451, 2, 3, 0.6),
(2452, 2, 4, 0.6),
(2453, 2, 5, 0),
(2454, 4, 1, 0.6),
(2455, 4, 2, 0),
(2456, 4, 3, 0.6),
(2457, 4, 4, 0.4),
(2458, 4, 5, 0),
(2459, 5, 1, 0.2),
(2460, 5, 2, 0.4),
(2461, 5, 3, 0),
(2462, 5, 4, 0.4),
(2463, 5, 5, 0),
(2464, 6, 1, 0.2),
(2465, 6, 2, 0),
(2466, 6, 3, 0.4),
(2467, 6, 4, 0),
(2468, 6, 5, 0),
(2469, 7, 1, 0.8),
(2470, 7, 2, 0.6),
(2471, 7, 3, 0.8),
(2472, 7, 4, 1),
(2473, 7, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `jenis_kriteria` varchar(30) NOT NULL,
  `bobot_kriteria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `jenis_kriteria`, `bobot_kriteria`) VALUES
('2', 'Conditions', 'Benefit', 5),
('3', ' Character ', 'Benefit', 2),
('4', 'Constraint ', 'Benefit', 4),
('5', 'Capacity/Cashflow', 'Benefit', 1),
('6', 'Capital ', 'Cost', 3);

-- --------------------------------------------------------

--
-- Table structure for table `leaving_flow`
--

CREATE TABLE `leaving_flow` (
  `id_lf` int NOT NULL,
  `id_alternatif` int NOT NULL,
  `nilai_lf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaving_flow`
--

INSERT INTO `leaving_flow` (`id_lf`, `id_alternatif`, `nilai_lf`) VALUES
(566, 2, 0.4),
(567, 4, 0.4),
(568, 5, 0.25),
(569, 6, 0.15),
(570, 7, 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `net_flow`
--

CREATE TABLE `net_flow` (
  `id_nf` int NOT NULL,
  `id_alternatif` int NOT NULL,
  `nilai_lf` float NOT NULL,
  `nilai_ef` float NOT NULL,
  `nilai_nf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `net_flow`
--

INSERT INTO `net_flow` (`id_nf`, `id_alternatif`, `nilai_lf`, `nilai_ef`, `nilai_nf`) VALUES
(281, 2, 0.4, 0.45, -0.05),
(282, 4, 0.4, 0.35, 0.05),
(283, 5, 0.25, 0.6, -0.35),
(284, 6, 0.15, 0.6, -0.45),
(285, 7, 0.8, 0, 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int NOT NULL,
  `id_alternatif` int NOT NULL,
  `id_kriteria` int NOT NULL,
  `nilai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(24, 2, 2, 4),
(25, 2, 3, 3),
(26, 2, 4, 3),
(27, 2, 5, 1),
(28, 2, 6, 3),
(29, 4, 2, 2),
(30, 4, 3, 4),
(31, 4, 4, 4),
(32, 4, 5, 3),
(33, 4, 6, 2),
(34, 5, 2, 1),
(35, 5, 3, 1),
(36, 5, 4, 1),
(37, 5, 5, 4),
(38, 5, 6, 3),
(39, 6, 2, 2),
(40, 6, 3, 3),
(41, 6, 4, 1),
(42, 6, 5, 3),
(43, 6, 6, 1),
(44, 7, 2, 4),
(45, 7, 3, 4),
(46, 7, 4, 4),
(47, 7, 5, 4),
(48, 7, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `preferensi`
--

CREATE TABLE `preferensi` (
  `id_preferensi` int NOT NULL,
  `alternatif1` int NOT NULL,
  `alternatif2` int NOT NULL,
  `id_kriteria` int NOT NULL,
  `nilai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preferensi`
--

INSERT INTO `preferensi` (`id_preferensi`, `alternatif1`, `alternatif2`, `id_kriteria`, `nilai`) VALUES
(3, 2, 4, 2, 1),
(4, 2, 4, 3, 0),
(5, 2, 4, 4, 0),
(6, 2, 4, 5, 0),
(7, 2, 4, 6, 1),
(8, 2, 5, 2, 1),
(9, 2, 5, 3, 1),
(10, 2, 5, 4, 1),
(11, 2, 5, 5, 0),
(12, 2, 5, 6, 0),
(13, 2, 6, 2, 1),
(14, 2, 6, 3, 0),
(15, 2, 6, 4, 1),
(16, 2, 6, 5, 0),
(17, 2, 6, 6, 1),
(18, 2, 7, 2, 0),
(19, 2, 7, 3, 0),
(20, 2, 7, 4, 0),
(21, 2, 7, 5, 0),
(22, 2, 7, 6, 0),
(23, 4, 2, 2, 0),
(24, 4, 2, 3, 1),
(25, 4, 2, 4, 1),
(26, 4, 2, 5, 1),
(27, 4, 2, 6, 0),
(28, 4, 5, 2, 1),
(29, 4, 5, 3, 1),
(30, 4, 5, 4, 1),
(31, 4, 5, 5, 0),
(32, 4, 5, 6, 0),
(33, 4, 6, 2, 0),
(34, 4, 6, 3, 1),
(35, 4, 6, 4, 1),
(36, 4, 6, 5, 0),
(37, 4, 6, 6, 0),
(38, 4, 7, 2, 0),
(39, 4, 7, 3, 0),
(40, 4, 7, 4, 0),
(41, 4, 7, 5, 0),
(42, 4, 7, 6, 0),
(43, 5, 2, 2, 0),
(44, 5, 2, 3, 0),
(45, 5, 2, 4, 0),
(46, 5, 2, 5, 1),
(47, 5, 2, 6, 0),
(48, 5, 4, 2, 0),
(49, 5, 4, 3, 0),
(50, 5, 4, 4, 0),
(51, 5, 4, 5, 1),
(52, 5, 4, 6, 1),
(53, 5, 6, 2, 0),
(54, 5, 6, 3, 0),
(55, 5, 6, 4, 0),
(56, 5, 6, 5, 1),
(57, 5, 6, 6, 1),
(58, 5, 7, 2, 0),
(59, 5, 7, 3, 0),
(60, 5, 7, 4, 0),
(61, 5, 7, 5, 0),
(62, 5, 7, 6, 0),
(63, 6, 2, 2, 0),
(64, 6, 2, 3, 0),
(65, 6, 2, 4, 0),
(66, 6, 2, 5, 1),
(67, 6, 2, 6, 0),
(68, 6, 4, 2, 0),
(69, 6, 4, 3, 0),
(70, 6, 4, 4, 0),
(71, 6, 4, 5, 0),
(72, 6, 4, 6, 0),
(73, 6, 5, 2, 1),
(74, 6, 5, 3, 1),
(75, 6, 5, 4, 0),
(76, 6, 5, 5, 0),
(77, 6, 5, 6, 0),
(78, 6, 7, 2, 0),
(79, 6, 7, 3, 0),
(80, 6, 7, 4, 0),
(81, 6, 7, 5, 0),
(82, 6, 7, 6, 0),
(83, 7, 2, 2, 0),
(84, 7, 2, 3, 1),
(85, 7, 2, 4, 1),
(86, 7, 2, 5, 1),
(87, 7, 2, 6, 1),
(88, 7, 4, 2, 1),
(89, 7, 4, 3, 0),
(90, 7, 4, 4, 0),
(91, 7, 4, 5, 1),
(92, 7, 4, 6, 1),
(93, 7, 5, 2, 1),
(94, 7, 5, 3, 1),
(95, 7, 5, 4, 1),
(96, 7, 5, 5, 0),
(97, 7, 5, 6, 1),
(98, 7, 6, 2, 1),
(99, 7, 6, 3, 1),
(100, 7, 6, 4, 1),
(101, 7, 6, 5, 1),
(102, 7, 6, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int NOT NULL,
  `id_kriteria` int DEFAULT '0',
  `nama_subkriteria` varchar(30) DEFAULT '0',
  `bobot` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `bobot`) VALUES
(39, 2, 'Tinggi', 4),
(40, 2, 'Sedang', 3),
(41, 2, 'Cukup', 2),
(42, 2, 'Kurang', 1),
(43, 3, 'Tinggi', 4),
(44, 3, 'Sedang', 3),
(45, 3, 'Cukup', 2),
(46, 3, 'Kurang', 1),
(47, 4, 'Tinggi', 4),
(48, 4, 'Sedang', 3),
(49, 4, 'Cukup', 2),
(50, 4, 'Kurang', 1),
(51, 5, 'Tinggi', 4),
(52, 5, 'Sedang', 3),
(53, 5, 'Cukup', 2),
(54, 5, 'Kurang', 1),
(55, 6, 'Tinggi', 4),
(56, 6, 'Sedang', 3),
(57, 6, 'Cukup', 2),
(58, 6, 'Kurang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` varchar(15) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `foto`) VALUES
(3, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `entering_flow`
--
ALTER TABLE `entering_flow`
  ADD PRIMARY KEY (`id_ef`);

--
-- Indexes for table `index_preferensi`
--
ALTER TABLE `index_preferensi`
  ADD PRIMARY KEY (`id_ip`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `leaving_flow`
--
ALTER TABLE `leaving_flow`
  ADD PRIMARY KEY (`id_lf`);

--
-- Indexes for table `net_flow`
--
ALTER TABLE `net_flow`
  ADD PRIMARY KEY (`id_nf`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `preferensi`
--
ALTER TABLE `preferensi`
  ADD PRIMARY KEY (`id_preferensi`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `kriteria_id` (`id_kriteria`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `entering_flow`
--
ALTER TABLE `entering_flow`
  MODIFY `id_ef` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=507;

--
-- AUTO_INCREMENT for table `index_preferensi`
--
ALTER TABLE `index_preferensi`
  MODIFY `id_ip` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2474;

--
-- AUTO_INCREMENT for table `leaving_flow`
--
ALTER TABLE `leaving_flow`
  MODIFY `id_lf` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=571;

--
-- AUTO_INCREMENT for table `net_flow`
--
ALTER TABLE `net_flow`
  MODIFY `id_nf` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `preferensi`
--
ALTER TABLE `preferensi`
  MODIFY `id_preferensi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
