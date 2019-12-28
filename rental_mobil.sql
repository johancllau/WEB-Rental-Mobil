-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2019 at 04:59 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `idmobil` int(11) NOT NULL,
  `noplat` varchar(10) NOT NULL,
  `merk` varchar(15) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `foto` varchar(70) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`idmobil`, `noplat`, `merk`, `nama`, `warna`, `harga`, `status`, `foto`) VALUES
(4, 'ab 123 dc', 'lamborgini', 'mobil', 'ungu', 2000, 'Ready', 'download (1).jpg'),
(5, 'AB 888 Z', 'Dodge', 'Challanger', 'Hitam', 5000000, 'Ready', 'download.jpg'),
(6, 'Z 789 XX', 'Honda', 'Jazz', 'Kuning', 300000, 'Ready', 'Jazz.jpg'),
(7, 'AB 69 XXX', 'Toyota', 'Avanza', 'Putih', 250000, 'Ready', 'Avanza.jpg'),
(8, 'AB 00 AA', 'Suzuki', 'Ertiga', 'Putih', 400000, 'Ready', 'Ertiga.jpg'),
(9, 'AB 1234 CZ', 'Toyota', 'Avanza', 'Putih', 300000, 'Ready', 'Avanza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `idsewa` int(11) NOT NULL,
  `noplat` varchar(10) NOT NULL,
  `namamob` varchar(20) NOT NULL,
  `namacust` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `durasi` int(11) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `foto` varchar(70) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`idsewa`, `noplat`, `namamob`, `namacust`, `alamat`, `tanggal`, `durasi`, `notelp`, `foto`) VALUES
(19, 'Z 789 XX', 'Jazz', 'johan', 'janti', '01/Jun/2019', 60, '082237064375', 'sudirman.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` char(25) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `notelp` varchar(15) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `email`, `gender`, `notelp`, `status`) VALUES
('Admin', 'johan123', 'Yohanes Brechmans Klau', 'cllaujhohan@gmail.com', 'Male', '082237064375', 1),
('galangkrsnt', 'galang123', 'Galang Krisnanto', 'galangkrsnt@gmail.cm', 'Female', '081252156651', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`idmobil`),
  ADD KEY `noplat` (`noplat`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`idsewa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `idmobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `idsewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
