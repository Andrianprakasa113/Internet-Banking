-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 02:16 PM
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
-- Database: `internet_banking`
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`USERNAME_ADMIN`, `SANDI_ADMIN`, `NAMA_ADMIN`, `EMAIL_ADMIN`, `NO_HP_ADMIN`) VALUES
('andre', '8a8b53dd046a36328b661315ffd6a594c9229ab4672fc6207c9f3ff8449516f0', 'andre', 'andre@gmail.com', '895411010059'),
('fadil', '341c3dabb062eed58733ecb311fa446aa08e220a59fef91a61b4bae8f25f6064', 'fadil', 'fadil@gmail.com', '82232744038'),
('rosi', '59665e357cf06640f3e1579c9ac5a488ff25905d652e0e68979d51c833cfc24e', 'rosi', 'rosi@gmail.com', '82337307547');

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

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`USERNAME_NSB`, `USERNAME_ADMIN`, `PASSWORD_NSB`, `NAMA_NSB`, `ALAMAT_NSB`, `EMAIL_NSB`, `TGL_NSB`, `NO_HP_NSB`) VALUES
('Agus', 'fadil', '1baedd25059490937a8f7a52dbaf5a7c168bc49f5bac0d7bc48bd6b58a84a421', 'Agus', 'Telang Lucu no 76', 'agus@gmail.com', '2001-01-08', '86113917612'),
('janice', 'andre', '4ca6e67d64009d3ec31d93d53a96c47bd30724da0decbbe26ff6ac58eb1f6d58', 'Janice', 'Nangka indah no 26', 'Janicea@gmail.com', '2004-03-05', '86013917612'),
('puspa', 'rosi', '06f41bfd47a88780d98043db32948f2ee4e50f5a8b33bc345199c9a7326617c0', 'puspa', 'JL. Puspa no 2', 'puspa@gmail.com', '0000-00-00', '86013917612');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `USERNAME_NSB` varchar(35) NOT NULL,
  `NO_REK` decimal(12,0) NOT NULL,
  `WAKTU_BUAT_REK` date DEFAULT NULL,
  `SALDO_REK` float(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`USERNAME_NSB`, `NO_REK`, `WAKTU_BUAT_REK`, `SALDO_REK`) VALUES
('agus', '333900977912', '2022-11-26', 460000.00),
('agus', '343900967912', '2022-11-26', 1000000.00),
('agus', '932911877912', '2022-11-26', 75000.00),
('janice', '124900977912', '2022-11-26', 750000.00),
('janice', '756400977912', '2022-11-26', 23000.00),
('puspa', '135923977912', '2022-11-26', 50000.00);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `WAKTU_TRANSAKSI` datetime NOT NULL,
  `JUM_TRANSFER` float(15,2) DEFAULT NULL,
  `no_rek_pengirim` decimal(12,0) NOT NULL,
  `no_rek_penerima` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`WAKTU_TRANSAKSI`, `JUM_TRANSFER`, `no_rek_pengirim`, `no_rek_penerima`) VALUES
('2022-11-26 20:15:45', 50000.00, '756400977912', '333900977912'),
('2022-11-26 20:15:56', 50000.00, '756400977912', '333900977912');

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
  ADD PRIMARY KEY (`USERNAME_NSB`,`NO_REK`),
  ADD KEY `NO_REK` (`NO_REK`);

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
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`no_rek_pengirim`) REFERENCES `rekening` (`NO_REK`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`no_rek_penerima`) REFERENCES `rekening` (`NO_REK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
