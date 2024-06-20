-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 06:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataset`
--

CREATE TABLE `dataset` (
  `id_dataset` int(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dataset`
--

INSERT INTO `dataset` (`id_dataset`, `tanggal`) VALUES
(1, '2022-03-09'),
(2, '2023-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_karyawan` int(100) NOT NULL,
  `kode` int(100) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `Gelar` int(100) NOT NULL,
  `tanggal_dataset` int(10) NOT NULL,
  `posisi_lamar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `kode`, `nama`, `Gelar`, `tanggal_dataset`, `posisi_lamar`) VALUES
(108, 1, 'Megawati', 1, 1, 1),
(109, 2, 'Dina Karlita', 1, 1, 1),
(110, 3, 'Dina Rizki Sepriani', 1, 1, 1),
(111, 4, 'Amalia Tasya Karmila', 2, 1, 1),
(112, 5, 'Sity Nurchasana', 2, 1, 1),
(113, 6, 'Shella Astarika', 2, 1, 1),
(114, 7, 'Rajakiah', 2, 1, 1),
(115, 8, 'Alam', 4, 1, 4),
(116, 9, 'Asdariyanti', 4, 1, 4),
(117, 10, 'Irayani', 4, 1, 4),
(118, 11, 'Ravi', 4, 1, 4),
(119, 12, 'Rina Dwi Urbaningrum', 8, 1, 8),
(120, 13, 'Ade Echa Octaviana', 8, 1, 8),
(121, 14, 'Eka Pratiwi', 8, 1, 8),
(122, 15, 'Novita Suryani', 8, 1, 8),
(123, 16, 'Andri Syaifoerrachman', 8, 1, 8),
(148, 17, 'Fini Ananda Fitrisya', 10, 1, 10),
(149, 18, 'Aulia Rahmawati', 10, 1, 10),
(150, 19, 'Adella Anindia', 10, 1, 10),
(151, 20, 'Mawaddaturrokhmah', 10, 1, 10),
(167, 21, 'Jati', 4, 2, 4),
(168, 22, 'Rafid', 1, 2, 1),
(169, 23, 'Farhan', 8, 2, 8),
(170, 24, 'Budi', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gelar`
--

CREATE TABLE `gelar` (
  `id_gelar` int(10) NOT NULL,
  `gelar` varchar(100) NOT NULL,
  `posisi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gelar`
--

INSERT INTO `gelar` (`id_gelar`, `gelar`, `posisi`) VALUES
(1, 'S.Tr.Keb.', 1),
(2, 'A.Md.Keb.', 1),
(4, '-', 4),
(8, 'S.K.M.', 8),
(10, 'S.H.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode` text NOT NULL,
  `nama_kriteria` text NOT NULL,
  `bobot` float DEFAULT NULL,
  `atribut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode`, `nama_kriteria`, `bobot`, `atribut`) VALUES
(32, 'C1', 'Pengetahuan Dasar', 2, 'Benefit'),
(33, 'C2', 'Uji Kompetensi', 3, 'Benefit'),
(34, 'C3', 'Wawancara', 5, 'Benefit'),
(44, 'C4', 'Tes Praktek', 4, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nilai`, `id_kriteria`, `id_karyawan`) VALUES
(330, 50, 32, 108),
(331, 78, 33, 108),
(332, 82, 34, 108),
(333, 84, 44, 108),
(338, 34, 32, 109),
(339, 89.6, 33, 109),
(340, 82, 34, 109),
(341, 77, 44, 109),
(342, 40, 32, 110),
(343, 86.5, 33, 110),
(344, 79, 34, 110),
(345, 85, 44, 110),
(346, 32, 32, 111),
(347, 64.1, 33, 111),
(348, 61, 34, 111),
(349, 78, 44, 111),
(350, 36, 32, 112),
(351, 66.9, 33, 112),
(352, 81, 34, 112),
(353, 80, 44, 112),
(354, 42, 32, 113),
(355, 68.1, 33, 113),
(356, 79, 34, 113),
(357, 83, 44, 113),
(358, 32, 32, 114),
(359, 65.7, 33, 114),
(360, 73, 34, 114),
(361, 79, 44, 114),
(362, 20, 32, 115),
(363, 88, 33, 115),
(364, 48, 34, 115),
(365, 90, 44, 115),
(366, 40, 32, 116),
(367, 76, 33, 116),
(368, 61, 34, 116),
(369, 94, 44, 116),
(370, 36, 32, 117),
(371, 62.5, 33, 117),
(372, 59, 34, 117),
(373, 91.2, 44, 117),
(374, 50, 32, 118),
(375, 48.5, 33, 118),
(376, 63, 34, 118),
(377, 73, 44, 118),
(378, 38, 32, 119),
(379, 64, 33, 119),
(380, 68, 34, 119),
(381, 75, 44, 119),
(382, 44, 32, 120),
(383, 66, 33, 120),
(384, 60, 34, 120),
(385, 74, 44, 120),
(386, 46, 32, 121),
(387, 34, 33, 121),
(388, 56, 34, 121),
(389, 76, 44, 121),
(390, 36, 32, 122),
(391, 43, 33, 122),
(392, 59, 34, 122),
(393, 75, 44, 122),
(394, 34, 32, 123),
(395, 78, 33, 123),
(396, 87, 34, 123),
(397, 84, 44, 123),
(398, 32, 32, 148),
(399, 65, 33, 148),
(400, 45, 34, 148),
(401, 70, 44, 148),
(402, 30, 32, 149),
(403, 60, 33, 149),
(404, 65, 34, 149),
(405, 78, 44, 149),
(406, 40, 32, 150),
(407, 45, 33, 150),
(408, 59, 34, 150),
(409, 80, 44, 150),
(410, 60, 32, 151),
(411, 60, 33, 151),
(412, 80, 34, 151),
(413, 87, 44, 151),
(418, 78, 32, 168),
(419, 79, 33, 168),
(420, 73, 34, 168),
(421, 70, 44, 168),
(426, 75, 32, 167),
(427, 65, 33, 167),
(428, 84, 34, 167),
(429, 77, 44, 167),
(438, 55, 32, 169),
(439, 60, 33, 169),
(440, 61, 34, 169),
(441, 60, 44, 169);

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan`
--

CREATE TABLE `perhitungan` (
  `id` int(10) NOT NULL,
  `vektor_s` float NOT NULL,
  `id_karyawan` int(100) NOT NULL,
  `id_dataset` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perhitungan`
--

INSERT INTO `perhitungan` (`id`, `vektor_s`, `id_karyawan`, `id_dataset`) VALUES
(88, 76.132, 108, 1),
(89, 72.391, 109, 1),
(90, 74.632, 110, 1),
(91, 60.325, 111, 1),
(92, 69.02, 112, 1),
(93, 70.931, 113, 1),
(94, 64.894, 114, 1),
(95, 57.714, 115, 1),
(96, 68.126, 116, 1),
(97, 63.052, 117, 1),
(98, 60.117, 118, 1),
(99, 63.498, 119, 1),
(100, 62.202, 120, 1),
(101, 53.389, 121, 1),
(102, 55.042, 122, 1),
(103, 73.582, 123, 1),
(112, 52.624, 148, 1),
(113, 60.29, 149, 1),
(114, 57.462, 150, 1),
(115, 73.944, 151, 1),
(123, 76.317, 167, 2),
(124, 74.048, 168, 2),
(125, 59.618, 169, 2);

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(100) NOT NULL,
  `kode` int(100) NOT NULL,
  `nama_posisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `kode`, `nama_posisi`) VALUES
(1, 1, 'Bidan'),
(4, 2, 'Perawat'),
(8, 3, 'Healthcare Administrator'),
(10, 4, 'Notaris');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'spkkaryawan'),
(2, 'rafid', 'unmul2018');

-- --------------------------------------------------------

--
-- Table structure for table `vektor_v`
--

CREATE TABLE `vektor_v` (
  `id` int(10) NOT NULL,
  `vektor_v` float NOT NULL,
  `id_karyawan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vektor_v`
--

INSERT INTO `vektor_v` (`id`, `vektor_v`, `id_karyawan`) VALUES
(15, 0.059046, 108),
(16, 0.0561446, 109),
(17, 0.0578827, 110),
(18, 0.0467865, 111),
(19, 0.0535301, 112),
(20, 0.0550123, 113),
(21, 0.0503301, 114),
(22, 0.0447615, 115),
(23, 0.0528368, 116),
(24, 0.0489015, 117),
(25, 0.0466252, 118),
(26, 0.0492474, 119),
(27, 0.0482423, 120),
(28, 0.0414071, 121),
(29, 0.0426892, 122),
(30, 0.0570683, 123),
(39, 0.0408138, 148),
(40, 0.0467594, 149),
(41, 0.0445661, 150),
(42, 0.0573491, 151),
(50, 0.363444, 167),
(51, 0.352638, 168),
(52, 0.283918, 169);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`id_dataset`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `fk_id_dataset` (`tanggal_dataset`),
  ADD KEY `fk_id_gelar` (`Gelar`),
  ADD KEY `fk_id_posisi_lamar` (`posisi_lamar`);

--
-- Indexes for table `gelar`
--
ALTER TABLE `gelar`
  ADD PRIMARY KEY (`id_gelar`),
  ADD KEY `fk_id_posisi` (`posisi`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `fk_id_tanggal` (`id_dataset`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vektor_v`
--
ALTER TABLE `vektor_v`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataset`
--
ALTER TABLE `dataset`
  MODIFY `id_dataset` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id_karyawan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `gelar`
--
ALTER TABLE `gelar`
  MODIFY `id_gelar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=442;

--
-- AUTO_INCREMENT for table `perhitungan`
--
ALTER TABLE `perhitungan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vektor_v`
--
ALTER TABLE `vektor_v`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD CONSTRAINT `fk_id_dataset` FOREIGN KEY (`tanggal_dataset`) REFERENCES `dataset` (`id_dataset`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_gelar` FOREIGN KEY (`Gelar`) REFERENCES `gelar` (`id_gelar`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_posisi_lamar` FOREIGN KEY (`posisi_lamar`) REFERENCES `posisi` (`id_posisi`) ON UPDATE CASCADE;

--
-- Constraints for table `gelar`
--
ALTER TABLE `gelar`
  ADD CONSTRAINT `fk_id_posisi` FOREIGN KEY (`posisi`) REFERENCES `posisi` (`id_posisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `data_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD CONSTRAINT `fk_id_tanggal` FOREIGN KEY (`id_dataset`) REFERENCES `dataset` (`id_dataset`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perhitungan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `data_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vektor_v`
--
ALTER TABLE `vektor_v`
  ADD CONSTRAINT `vektor_v_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `data_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
