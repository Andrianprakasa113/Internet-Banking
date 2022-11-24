-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 04:50 PM
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
('ad', '123', 'andre', 'andre@gmail.com', '81'),
('admin', '123', 'andre', 'andre@gmail.com', '81');

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
('Andra', NULL, '12', 'Andra', 'lolol', 'andra@com', '2022-11-22', '123'),
('Janice', NULL, '12', 'Janice', 'lolol', 'Janicea@com', '2022-11-22', '123'),
('Mapa', NULL, 'az', 'Mapa Mahardika', 'asdwa', 'awda@co', '2022-11-22', '123'),
('Nulce', NULL, '12', 'Nulce', 'lolol', 'Nulcea@com', '2022-11-22', '123'),
('Sam', NULL, '12', 'Sam', 'lolol', 'Sam@com', '2022-11-22', '123'),
('Tatak', NULL, '12', 'Tatak', 'lolol', 'Tataka@com', '2022-11-22', '123'),
('Yosua', NULL, 'az', 'yasudd', 'Yosua', 'yasuda@com', '2022-11-22', '912');

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
('Andra', '123124', '0000-00-00', 1231231.00),
('Andra', '212312', '2022-11-03', 123123120.00),
('Janice', '212312', '2022-11-03', 223123120.00),
('Tatak', '212112', '2022-11-03', 123123120.00);

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
