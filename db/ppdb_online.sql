-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 03:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `nilai_un` double DEFAULT NULL,
  `nilai_us` double DEFAULT NULL,
  `nilai_rata` double(100,0) NOT NULL,
  `status` int(1) NOT NULL,
  `pendaftar_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tmpt_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(45) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `nama`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `alamat`, `email`, `telepon`, `foto`, `users_id`) VALUES
(2, 'Ahmad', 'Malang', '2020-11-13', 'L', 'islam', 'Malang', 'test@gmail.com', '085646126950', '', 3),
(6, 'test', 'Pasuruan', '2020-05-07', 'L', 'islam', 'fasf', 'test12@gmail.com', '085646126950', '', 11),
(7, 'asd', 'asd', '2020-04-01', 'L', 'islam', 'asd', 'asd@gmail.com', '085646126950', '', 15),
(8, 'zuhri', 'Pasuruan', '2020-04-10', 'L', 'islam', 'Talang', 'zuhri@gmail.com', '085646126950', '', 16),
(9, 'a', 'Pasuruan', '2020-04-23', 'L', 'islam', 'ad', 'a@gmail.com', '085646126950', '', 17),
(10, 'baru', 'pasuruan', '2000-02-13', 'P', 'islam', 'asd', 'baru@gmail.com', '085646126950', 'baru.jpg', 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Admnistrator', 'admin@manusgi.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'Ahmad', 'test@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(7, 'Lala', 'lala@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(9, 'Lili', 'lili@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(10, 'Coba', 'coba@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(11, 'test', 'test12@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(12, 'Polinema', 'polinema@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(13, 'Anas', 'anas@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(15, 'asd', 'asd@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(16, 'zuhri', 'zuhri@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(17, 'a', 'a@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(18, 'ifud', 'ifud@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(19, 'baru', 'baru@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nilai_pendaftar1_idx` (`pendaftar_id`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_pendaftar_users_idx` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_nilai_pendaftar1` FOREIGN KEY (`pendaftar_id`) REFERENCES `pendaftar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `fk_pendaftar_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
