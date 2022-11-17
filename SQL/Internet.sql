-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 06:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internet_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `USERNAME_ADMIN` varchar(35) NOT NULL,
  `SANDI_ADMIN` varchar(70) DEFAULT NULL,
  `NAMA_ADMIN` varchar(35) DEFAULT NULL,
  `EMAIL_ADMIN` varchar(35) DEFAULT NULL,
  `NO_HP_ADMIN` decimal(14,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `USERNAME_NSB` varchar(35) NOT NULL,
  `USERNAME_ADMIN` varchar(35) DEFAULT NULL,
  `PASSWORD_NSB` varchar(70) DEFAULT NULL,
  `NAMA_NSB` varchar(35) DEFAULT NULL,
  `ALAMAT_NSB` text DEFAULT NULL,
  `EMAIL_NSB` varchar(35) DEFAULT NULL,
  `TGL_NSB` date DEFAULT NULL,
  `NO_HP_NSB` decimal(14,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `USERNAME_NSB` varchar(35) NOT NULL,
  `NO_REK` decimal(12,0) NOT NULL,
  `WAKTU_BUAT_REK` date DEFAULT NULL,
  `SALDO_REK` float(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `WAKTU_TRANSAKSI` datetime NOT NULL,
  `JUM_TRANSFER` float(8,2) DEFAULT NULL,
  `no_rek_pengirim` decimal(12,0) NOT NULL,
  `no_rek_penerima` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`USERNAME_ADMIN`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`USERNAME_NSB`),
  ADD KEY `FK_MENGATUR` (`USERNAME_ADMIN`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`USERNAME_NSB`,`NO_REK`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`WAKTU_TRANSAKSI`),
  ADD KEY `no_rek_pengirim` (`no_rek_pengirim`),
  ADD KEY `no_rek_penerima` (`no_rek_penerima`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD CONSTRAINT `FK_MENGATUR` FOREIGN KEY (`USERNAME_ADMIN`) REFERENCES `admin` (`USERNAME_ADMIN`);

--
-- Constraints for table `rekening`
--
ALTER TABLE `rekening`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`USERNAME_NSB`) REFERENCES `nasabah` (`USERNAME_NSB`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`USERNAME_NSB`) REFERENCES `nasabah` (`USERNAME_NSB`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
