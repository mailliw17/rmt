-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `bahan_baku`;
CREATE TABLE `bahan_baku` (
  `nomor_po` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `qty_rencana` int(11) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `nama_kapal` varchar(50) NOT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`nomor_po`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bahan_baku` (`nomor_po`, `nama_barang`, `qty_rencana`, `supplier`, `nama_kapal`, `status`) VALUES
(1861094604,	'Argentina Soya Bean Meal',	16500000,	'AGD',	'Sweet Lady III',	0);

DROP TABLE IF EXISTS `truk`;
CREATE TABLE `truk` (
  `id_barcode` int(11) NOT NULL,
  `nomor_po` int(11) NOT NULL,
  `plat_nomor` varchar(10) NOT NULL,
  `nomor_segel` int(11) NOT NULL,
  `nomor_sj` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `pelabuhan` datetime DEFAULT NULL,
  `security_in` datetime DEFAULT NULL,
  `ts_in` datetime DEFAULT NULL,
  `mulai_bongkar` datetime DEFAULT NULL,
  `lokasi_bongkar` varchar(10) DEFAULT NULL,
  `selesai_bongkar` datetime DEFAULT NULL,
  `ts_out` datetime DEFAULT NULL,
  `security_out` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `truk` (`id_barcode`, `nomor_po`, `plat_nomor`, `nomor_segel`, `nomor_sj`, `qty`, `pelabuhan`, `security_in`, `ts_in`, `mulai_bongkar`, `lokasi_bongkar`, `selesai_bongkar`, `ts_out`, `security_out`) VALUES
(1607653602,	1861094604,	'H 7474 BG',	58528,	24386,	17050,	'2020-12-11 09:26:42',	'2020-12-11 09:32:12',	'2020-12-11 09:34:33',	'2020-12-11 09:58:43',	'BKD5',	'2020-12-11 10:05:26',	'2020-12-11 10:07:32',	'2020-12-11 10:10:39');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('Admin','Operator') NOT NULL,
  `lokasi_pabrik` enum('Genuk / km.08','Sayung / km.09') NOT NULL,
  `lokasi_checkpoint` enum('Pelabuhan','Security','Truck Scale IN','Gudang Bongkar','Truck Scale OUT','Admin') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role`, `lokasi_pabrik`, `lokasi_checkpoint`) VALUES
(4,	'William',	'wil',	'202cb962ac59075b964b07152d234b70',	'Admin',	'Sayung / km.09',	'Admin'),
(5,	'Pelabuhan',	'pelabuhan',	'202cb962ac59075b964b07152d234b70',	'Operator',	'Sayung / km.09',	'Pelabuhan'),
(6,	'Security',	'security',	'202cb962ac59075b964b07152d234b70',	'Operator',	'Sayung / km.09',	'Security'),
(7,	'Truck Scale IN',	'tsin',	'202cb962ac59075b964b07152d234b70',	'Operator',	'Sayung / km.09',	'Truck Scale IN'),
(8,	'Bongkaran',	'bongkaran',	'202cb962ac59075b964b07152d234b70',	'Operator',	'Sayung / km.09',	'Gudang Bongkar'),
(9,	'Truck Scale OUT',	'tsout',	'202cb962ac59075b964b07152d234b70',	'Operator',	'Sayung / km.09',	'Truck Scale OUT'),
(10,	'Nanang Haruni',	'nanang',	'202cb962ac59075b964b07152d234b70',	'Admin',	'Sayung / km.09',	'Admin'),
(11,	'Nur Ubaya',	'nurubaya',	'202cb962ac59075b964b07152d234b70',	'Admin',	'Sayung / km.09',	'Admin');

-- 2020-12-11 03:18:54
