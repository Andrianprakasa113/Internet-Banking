-- Adminer 4.8.1 MySQL 10.4.24-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `USERNAME_ADMIN` varchar(35) NOT NULL,
  `SANDI_ADMIN` varchar(70) DEFAULT NULL,
  `NAMA_ADMIN` varchar(35) DEFAULT NULL,
  `EMAIL_ADMIN` varchar(35) DEFAULT NULL,
  `NO_HP_ADMIN` decimal(14,0) DEFAULT NULL,
  PRIMARY KEY (`USERNAME_ADMIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`USERNAME_ADMIN`, `SANDI_ADMIN`, `NAMA_ADMIN`, `EMAIL_ADMIN`, `NO_HP_ADMIN`) VALUES
('ad',	'123',	'andre',	'andre@gmail.com',	81),
('admin',	'123',	'andre',	'andre@gmail.com',	81);

DROP TABLE IF EXISTS `nasabah`;
CREATE TABLE `nasabah` (
  `USERNAME_NSB` varchar(35) NOT NULL,
  `USERNAME_ADMIN` varchar(35) DEFAULT NULL,
  `PASSWORD_NSB` varchar(70) DEFAULT NULL,
  `NAMA_NSB` varchar(35) DEFAULT NULL,
  `ALAMAT_NSB` text DEFAULT NULL,
  `EMAIL_NSB` varchar(35) DEFAULT NULL,
  `TGL_NSB` date DEFAULT NULL,
  `NO_HP_NSB` decimal(14,0) DEFAULT NULL,
  PRIMARY KEY (`USERNAME_NSB`),
  KEY `FK_MENGATUR` (`USERNAME_ADMIN`),
  CONSTRAINT `FK_MENGATUR` FOREIGN KEY (`USERNAME_ADMIN`) REFERENCES `admin` (`USERNAME_ADMIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `rekening`;
CREATE TABLE `rekening` (
  `USERNAME_NSB` varchar(35) NOT NULL,
  `NO_REK` decimal(12,0) NOT NULL,
  `WAKTU_BUAT_REK` date DEFAULT NULL,
  `SALDO_REK` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`USERNAME_NSB`,`NO_REK`),
  CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`USERNAME_NSB`) REFERENCES `nasabah` (`USERNAME_NSB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `WAKTU_TRANSAKSI` datetime NOT NULL,
  `JUM_TRANSFER` float(8,2) DEFAULT NULL,
  `no_rek_pengirim` varchar(35) NOT NULL,
  `no_rek_penerima` varchar(35) NOT NULL,
  PRIMARY KEY (`WAKTU_TRANSAKSI`),
  KEY `no_rek_pengirim` (`no_rek_pengirim`),
  KEY `no_rek_penerima` (`no_rek_penerima`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`no_rek_pengirim`) REFERENCES `nasabah` (`USERNAME_NSB`),
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`no_rek_penerima`) REFERENCES `nasabah` (`USERNAME_NSB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2022-11-19 14:13:53
