-- phpMyAdmin SQL Dump
-- version 4.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 02, 2015 at 09:51 PM
-- Server version: 5.5.35-1ubuntu1
-- PHP Version: 5.5.9-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `biodata`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajaxtrap`
--

CREATE TABLE IF NOT EXISTS `ajaxtrap` (
`kode` int(5) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ajaxtrap`
--

INSERT INTO `ajaxtrap` (`kode`, `nama`, `gender`, `phone`, `alamat`) VALUES
(1, 'Ghazali', 'Laki-laki', '9876544', 'Sigli'),
(2, 'Bukhari', 'Laki-laki', '8765544', 'Banda Aceh'),
(3, 'Boyhaki', 'Laki-laki', '8765544', 'Grong-grong, Pidie'),
(4, 'Monicha', 'Perempuan', '987655', 'Bambi, Pidie');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajaxtrap`
--
ALTER TABLE `ajaxtrap`
 ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ajaxtrap`
--
ALTER TABLE `ajaxtrap`
MODIFY `kode` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
