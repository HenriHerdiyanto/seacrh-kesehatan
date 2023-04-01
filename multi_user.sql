-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 08:45 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `kode_gejala` varchar(11) NOT NULL,
  `nama_gejala` varchar(255) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `id_penyakit`, `kode_gejala`, `nama_gejala`, `pertanyaan`) VALUES
(3, 3, 'G1', 'Demam', 'Apakah anda mengalami Demam ?'),
(4, 4, 'G1', 'Demam', 'Apakah anda mengalami Demam ?'),
(5, 5, 'G1', 'Demam', 'Apakah anda mengalami Demam ?'),
(6, 6, 'G1', 'Demam', 'Apakah anda mengalami Demam ?'),
(7, 7, 'G1', 'Demam', 'Apakah anda mengalami Demam ?'),
(8, 6, 'G10', 'Tidak Nafsu Makan', 'Apakah anda mengalami Tidak Nafsu Makan ?'),
(9, 6, 'G11', 'Badan Lesu/Lemah', 'Apakah anda mengalami Badan Lesu/Lemah ?'),
(10, 6, 'G12', 'Darah Lender Dalam Kotoran', 'Apakah anda mengalami Darah Lender Dalam Kotoran ?'),
(11, 7, 'G13', 'Mudah Lelah', 'Apakah anda mengalami Mudah Lelah ?'),
(12, 7, 'G14', 'Nyeri Perut', 'Apakah anda mengalami Nyeri Perut ?'),
(13, 3, 'G15', 'Wajah Pucat', 'Apakah anda mengalami Wajah Pucat ?'),
(14, 5, 'G16', 'Perubahan Pola BAB', 'Apakah anda mengalami Perubahan Pola BAB ?'),
(15, 3, 'G17', 'Denyut Nadi Melambat', 'Apakah anda mengalami Denyut Nadi Melambat ?'),
(16, 4, 'G18', 'Lidah Berwarna Putih', 'Apakah anda mengalami Lidah Berwarna Putih ?'),
(17, 5, 'G19', 'Muncul Bintik-Bintik Merah', 'Apakah anda mengalami Muncul Bintik-Bintik Merah ?'),
(18, 4, 'G2', 'Diare', 'Apakah anda mengalami Diare ?'),
(19, 5, 'G20', 'Sakit Pada Persendian', 'Apakah anda mengalami Sakit Pada Persendian ?'),
(20, 7, 'G21', 'Pendarahan', 'Apakah anda mengalami Pendarahan ?'),
(21, 5, 'G22', 'Gatal-Gatal', 'Apakah anda mengalami Gatal-Gatal ?'),
(22, 7, 'G23', 'Trombosit <= 100.000', 'Apakah anda mengalami Trombosit <= 100.000 ?'),
(23, 5, 'G24', 'Muka Tampak Kemerahan', 'Apakah anda mengalami Muka Tampak Kemerahan ?'),
(24, 6, 'G25', 'Batuk Kering', 'Apakah anda mengalami Batuk Kering ?'),
(25, 3, 'G26', 'Bintik Putih Kecil Di Bagian Dalam', 'Apakah anda mengalami Bintik Putih Kecil Di Bagian Dalam ?'),
(26, 4, 'G26', 'Bintik Putih Kecil Di Bagian Dalam', 'Apakah anda mengalami Bintik Putih Kecil Di Bagian Dalam ?'),
(27, 5, 'G26', 'Bintik Putih Kecil Di Bagian Dalam', 'Apakah anda mengalami Bintik Putih Kecil Di Bagian Dalam ?'),
(28, 6, 'G26', 'Bintik Putih Kecil Di Bagian Dalam', 'Apakah anda mengalami Bintik Putih Kecil Di Bagian Dalam ?'),
(29, 7, 'G26', 'Bintik Putih Kecil Di Bagian Dalam', 'Apakah anda mengalami Bintik Putih Kecil Di Bagian Dalam ?'),
(30, 7, 'G27', 'Mata Merah Dan Sakit', 'Apakah anda mengalami Mata Merah Dan Sakit ?'),
(31, 4, 'G28', 'Kejang-Kejang', 'Apakah anda mengalami Kejang-Kejang ?'),
(32, 6, 'G29', 'Kencing Warna Teh Tua', 'Apakah anda mengalami Kencing Warna Teh Tua ?'),
(33, 4, 'G3', 'Muntah-Muntah', 'Apakah anda mengalami Muntah-Muntah ?'),
(34, 5, 'G30', 'Nafas Cepat', 'Apakah anda mengalami Nafas Cepat ?'),
(35, 4, 'G4', 'Sakit Kepala', 'Apakah anda mengalami Sakit Kepala ?');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `solusi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`, `solusi`) VALUES
(3, 'P1', 'Malaria Falsiparum', 'Disarankan harus dibawa ke rumah sakit untuk penanganan sedini mungkin karena penyakit malaria falsiparum merupakan tingkat resikonya sangat bahaya bila tidak dapat penanganan secepat mungkin jika tidak akan menyebabkan kematian.'),
(4, 'P2', 'Malaria Vivaks', 'Disarankan harus dibawa ke rumah sakit untuk penanganan sedini mungkin karena penyakit malaria falsiparum merupakan tingkat resikonya sangat bahaya bila tidak dapat penanganan secepat mungkin jika tidak akan menyebabkan kematian.'),
(5, 'P3', 'Malaria Ovale', 'Disarankan harus dibawa ke rumah sakit untuk penanganan sedini mungkin karena penyakit malaria falsiparum merupakan tingkat resikonya sangat bahaya bila tidak dapat penanganan secepat mungkin jika tidak akan menyebabkan kematian.'),
(6, 'P4', 'Malaria Malariae', 'Disarankan harus dibawa ke rumah sakit untuk penanganan sedini mungkin karena penyakit malaria falsiparum merupakan tingkat resikonya sangat bahaya bila tidak dapat penanganan secepat mungkin jika tidak akan menyebabkan kematian.'),
(7, 'P5', 'Malaria Knowlesi', 'Disarankan harus dibawa ke rumah sakit untuk penanganan sedini mungkin karena penyakit malaria falsiparum merupakan tingkat resikonya sangat bahaya bila tidak dapat penanganan secepat mungkin jika tidak akan menyebabkan kematian.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Malas Ngoding', 'malasngoding', 'malasngoding123', 'admin'),
(2, 'Diki Alfarabi Hadi', 'diki', 'diki123', 'admin'),
(3, 'Jamaludin', 'irfan', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
