-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 03:41 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(15, 'Diana Alfi Ainun Nur Khasanah', 'alfi', '1234'),
(16, 'Yanny Ayu Mai Saroh', 'yani', '234');

-- --------------------------------------------------------

--
-- Table structure for table `baju`
--

CREATE TABLE IF NOT EXISTS `baju` (
`id_baju` int(11) NOT NULL,
  `baju` text NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baju`
--

INSERT INTO `baju` (`id_baju`, `baju`, `stok`, `id_kategori`) VALUES
(2, 'Dress', 145, 4),
(4, 'Sabrina panjang', 234, 5),
(5, 'Long Dress renda', 45, 6);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_baju`
--

CREATE TABLE IF NOT EXISTS `kategori_baju` (
`id_kategori` int(11) NOT NULL,
  `nama_kategori` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_baju`
--

INSERT INTO `kategori_baju` (`id_kategori`, `nama_kategori`) VALUES
(4, 'Pesta'),
(5, 'Floral'),
(6, 'Muslimah'),
(7, 'Resmi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `baju`
--
ALTER TABLE `baju`
 ADD PRIMARY KEY (`id_baju`), ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori_baju`
--
ALTER TABLE `kategori_baju`
 ADD PRIMARY KEY (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `baju`
--
ALTER TABLE `baju`
MODIFY `id_baju` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kategori_baju`
--
ALTER TABLE `kategori_baju`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `baju`
--
ALTER TABLE `baju`
ADD CONSTRAINT `baju_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_baju` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
