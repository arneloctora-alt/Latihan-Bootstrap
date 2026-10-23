-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2026 at 03:49 AM
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
-- Database: `web_pkmb`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `nama`, `email`, `pesan`, `tanggal`) VALUES
(1, 'Arnel', 'arneloctora@gmail.com', 'Hebat', '2026-10-22 07:09:45'),
(2, 'Akyy', 'arneloctora@gmail.com', 'Semangat', '2026-10-22 07:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `grafik_data`
--

CREATE TABLE `grafik_data` (
  `id` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grafik_data`
--

INSERT INTO `grafik_data` (`id`, `bulan`, `jumlah`, `urutan`) VALUES
(1, 'Jan', 2, 1),
(2, 'Feb', 3, 2),
(3, 'Mar', 2, 3),
(4, 'Apr', 2, 4),
(5, 'Mei', 4, 5),
(6, 'Jun', 2, 6),
(7, 'Jul', 3, 7),
(8, 'Agu', 2, 8),
(9, 'Sep', 3, 9),
(10, 'Okt', 3, 10),
(11, 'Nov', 2, 11),
(12, 'Des', 10, 12);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `jadwal` varchar(150) DEFAULT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `judul`, `jadwal`, `deskripsi`) VALUES
(1, 'Fellowship', 'Every Saturday, 5 pm, GBI Tangkil', 'A time to worship, share, and grow together as one community.'),
(2, 'Sharing Our Faith', 'Regular fellowship', 'A moment to share God\'s Word, experiences, and faith with one another.'),
(3, 'Sunday School', 'After the Sunday service', 'Learn God\'s Word together and discover how to apply His teachings in our daily lives.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grafik_data`
--
ALTER TABLE `grafik_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `urutan` (`urutan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grafik_data`
--
ALTER TABLE `grafik_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
