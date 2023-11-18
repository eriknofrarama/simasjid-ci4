/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.24-MariaDB : Database - db-simasjid-ci4
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db-simasjid-ci4` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db-simasjid-ci4`;

/*Table structure for table `tbl_agenda` */

DROP TABLE IF EXISTS `tbl_agenda`;

CREATE TABLE `tbl_agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_agenda` */

insert  into `tbl_agenda`(`id_agenda`,`nama_kegiatan`,`tanggal`,`jam`) values (12,'Kajian Rutin Bulanan Bersama Profesor Dr. H. Abdul Somad Lc.Ma ','2023-04-05','19:33:00'),(13,'Malamang ','2023-04-05','16:26:00'),(14,'AA','0000-00-00','00:00:00'),(15,'BBB','0000-00-00','00:00:00'),(16,'BVV','0000-00-00','00:00:00'),(17,'FFF','0000-00-00','00:00:00'),(18,'TT','0000-00-00','00:00:00'),(19,'GG','0000-00-00','00:00:00'),(20,'GG','0000-00-00','00:00:00'),(21,'YY','0000-00-00','00:00:00'),(22,'YUYYY','0000-00-00','00:00:00'),(23,'Ceramah Rutin Bersama Wiwiwn','2023-04-08','10:12:00');

/*Table structure for table `tbl_donasi` */

DROP TABLE IF EXISTS `tbl_donasi`;

CREATE TABLE `tbl_donasi` (
  `id_donasi` int(11) NOT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `an` varchar(50) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `jenis_donasi` varchar(10) DEFAULT NULL,
  `bukti` varchar(150) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_donasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_donasi` */

/*Table structure for table `tbl_kas_masjid` */

DROP TABLE IF EXISTS `tbl_kas_masjid`;

CREATE TABLE `tbl_kas_masjid` (
  `id_kas_masjid` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `kas_masuk` int(11) DEFAULT NULL,
  `kas_keluar` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_kas_masjid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_kas_masjid` */

/*Table structure for table `tbl_kas_sosial` */

DROP TABLE IF EXISTS `tbl_kas_sosial`;

CREATE TABLE `tbl_kas_sosial` (
  `id_kas_sosial` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `kas_masuk` int(11) DEFAULT NULL,
  `kas_keluar` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_kas_sosial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_kas_sosial` */

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`nama_user`,`email`,`password`,`level`) values (1,'Erik Nofra Rama','Admin@gmail.com','123',0),(2,'Surleman Rose','Surlemanrose@gmail.com','123',1);

/*Table structure for table `tbl_waktu` */

DROP TABLE IF EXISTS `tbl_waktu`;

CREATE TABLE `tbl_waktu` (
  `id_waktu` int(11) unsigned NOT NULL,
  `nama_waktu` varchar(100) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  PRIMARY KEY (`id_waktu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_waktu` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
