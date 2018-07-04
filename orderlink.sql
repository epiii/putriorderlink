-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2018 at 05:00 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sf_db019`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderlink`
--

CREATE TABLE `orderlink` (
  `id_order` int(6) NOT NULL,
  `nama_dpn` varchar(20) NOT NULL,
  `nama_blk` varchar(20) NOT NULL,
  `nomor` varchar(16) NOT NULL,
  `username` varchar(20) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderlink`
--

INSERT INTO `orderlink` (`id_order`, `nama_dpn`, `nama_blk`, `nomor`, `username`, `gambar`) VALUES
(1, 'Yuanita', 'Pratiwi', '089671762352', 'yuanita', 'gambar/a.JPG'),
(12, 'Zacky', 'Zacky', '085780652005', 'zacky', 'gambar/buku.jpg'),
(19, 'Ida', 'ida', '085710145257', 'ida', 'gambar/a.JPG'),
(24, 'Iman', 'Jaya', '081219143732', 'iman', 'gambar/a.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderlink`
--
ALTER TABLE `orderlink`
  ADD PRIMARY KEY (`id_order`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderlink`
--
ALTER TABLE `orderlink`
  MODIFY `id_order` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
