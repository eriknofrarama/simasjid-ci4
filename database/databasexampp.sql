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

/*Table structure for table `tabel_tahun` */

DROP TABLE IF EXISTS `tabel_tahun`;

CREATE TABLE `tabel_tahun` (
  `id_tahun` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_h` varchar(4) DEFAULT NULL,
  `tahun_m` year(4) DEFAULT NULL,
  PRIMARY KEY (`id_tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tabel_tahun` */

insert  into `tabel_tahun`(`id_tahun`,`tahun_h`,`tahun_m`) values (5,'1444',2023),(6,'1445',2024),(7,'1446',2025);

/*Table structure for table `tbl_agenda` */

DROP TABLE IF EXISTS `tbl_agenda`;

CREATE TABLE `tbl_agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_agenda` */

insert  into `tbl_agenda`(`id_agenda`,`nama_kegiatan`,`tanggal`,`jam`) values (25,'Rapat Internal Pembahasan Anggaran Dana Pembagunan Masjid Raya Pauh Kambar Bintungan Tinggi','2023-04-13','17:45:00'),(26,'Ceramah Ustad Abdika','2023-04-12','13:37:00'),(27,'Kajian Akidah Bersama Ustad Adi Hidayat ','2023-04-13','13:40:00'),(28,'Ceramah Bersama Ustad Abdul Somad Lc,Ma','2023-05-05','01:12:00'),(29,'Goro Bersama Pakde Joko Widodo Di Lingkungan Masjid','2023-05-05','12:00:00');

/*Table structure for table `tbl_donasi` */

DROP TABLE IF EXISTS `tbl_donasi`;

CREATE TABLE `tbl_donasi` (
  `id_donasi` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `nama_pengirim` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `jenis_donasi` varchar(10) DEFAULT NULL,
  `bukti` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_donasi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_donasi` */

insert  into `tbl_donasi`(`id_donasi`,`tgl`,`id_rekening`,`nama_bank`,`no_rek`,`nama_pengirim`,`jumlah`,`jenis_donasi`,`bukti`) values (1,'2023-05-04',9,'BNI','3423-9398-0934-9482','Erik Nofra Rama',150000,'Sosial','1683169811_413254c16cc8943412c4.jpg'),(2,'2023-05-04',8,'Bank BCA','9090-9090-9900-9999','Fajrul Amal',10000,'Sosial','1683170013_b3f666e217ca1ebf6ccd.jpg'),(3,'2023-05-05',8,'BNI','0223-0090-9999-999','Ilham',1000000,'Sosial','1683174647_de61e051f9f5c2753c66.jpg'),(4,'2023-05-06',8,'BCA','0000-8980-0000-9747','Marion Putra',1000000,'Masjid','1683175577_e8c14263bf8d0a871baf.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_kas_masjid` */

insert  into `tbl_kas_masjid`(`id_kas_masjid`,`tanggal`,`ket`,`kas_masuk`,`kas_keluar`,`status`) values (5,'2023-04-10','Saldo Awal',12000000,0,'Masuk'),(6,'2023-04-11','Pembayaran Listrik',0,160000,'Keluar'),(8,'2023-04-11','Pembayaran PDAM',0,100000,'Keluar'),(9,'2023-04-12','Pembelian Cat ',0,100000,'Keluar'),(10,'2023-04-12','Kotak Amal Jumat',750000,0,'Masuk'),(11,'2023-04-13','Kotak Amal Ceramah',250000,0,'Masuk'),(12,'2023-04-12','Kotak Amal Kultum Jumat',150000,0,'Masuk'),(13,'2023-04-11','Dana Aspirasi DPR RI',2000000,0,'Masuk'),(14,'2023-04-11','Kotak Amal Jumat',400000,0,'Masuk'),(15,'2023-04-27','Infak Minggu',500000,0,'Masuk'),(16,'2023-04-20','Sumbangan Jamaah',400000,0,'Masuk'),(18,'2023-04-27','Sumbangan Jamaah Shubuh',300000,0,'Masuk'),(21,'2023-04-12','Infak Sekarang',1000000,0,'Masuk'),(22,'2023-04-12','Infak Acara Maulid Nabi Besar Muhammad Saw 1444 H',3420000,0,'Masuk'),(26,'2023-04-14','Bayar Honor Garim Masjid',0,1000000,'Keluar'),(27,'2023-04-15','Bayar Tim IT Masjid',0,5000000,'Keluar'),(28,'2023-04-20','Bayar Makan Bersama Tamu Undangan Masjid',0,250000,'Keluar'),(29,'2023-04-13','Perbaikan Speaker Masjid',0,230000,'Keluar'),(30,'2023-04-14','Kotak Amal Di Kadai',200000,0,'Masuk'),(31,'2023-04-15','Test Input',100000,0,'Masuk'),(33,'2023-04-15','Operasional Jumat',0,500000,'Keluar'),(34,'2023-04-13','Infak Ramadhan Malam 1',370000,0,'Masuk'),(36,'2023-04-06','Test Input 4',0,60000,'Keluar'),(37,'2023-04-13','Infak Ramadhan Malam',1000000,0,'Masuk'),(38,'2023-04-19','Pengeluaran Ramadhan Malam 3',0,100000,'Keluar'),(39,'2023-04-19','Operasional Ramadhan Malam 3',0,1000000,'Keluar'),(42,'2023-05-01','Sumbangan Aspirasi Dari Ketua DPR RI Puan Maharani',5000000,0,'Masuk'),(43,'2023-05-01','Perbaikan Kran Air ',0,150000,'Keluar'),(44,'2023-07-06','jjj',10000,0,'Masuk');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_kas_sosial` */

insert  into `tbl_kas_sosial`(`id_kas_sosial`,`tanggal`,`ket`,`kas_masuk`,`kas_keluar`,`status`) values (1,'2023-04-20','Saldo Awal Kas Sosial',5000000,0,'Masuk'),(2,'2023-04-29','Pemberian Santunan Lansia Korong Bayur',0,1500000,'Keluar'),(4,'2023-04-19','Sumbangan Pak Gubernur Sumbar',1200000,0,'Masuk'),(5,'2023-04-19','Sumbangan Sosial Kemensos 2023',5000000,0,'Masuk'),(7,'2023-04-20','Pembelian Bahan Makanan Berbuka Bersama Malam 1',0,1000000,'Keluar'),(11,'2023-04-19','Pembelian 10 Karung 10 kg beras',0,1000000,'Keluar'),(12,'2023-05-01','Bantu Sosial Dari Prof Amien Rais',5000000,0,'Masuk'),(13,'2023-05-01','Biaya Buka Bersama Anak Yatim',0,1000000,'Keluar'),(14,'2023-07-06','kjk',300000,0,'Masuk');

/*Table structure for table `tbl_kelompok` */

DROP TABLE IF EXISTS `tbl_kelompok`;

CREATE TABLE `tbl_kelompok` (
  `id_kelompok` int(11) NOT NULL AUTO_INCREMENT,
  `id_tahun` int(11) DEFAULT NULL,
  `nama_kelompok` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_kelompok`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_kelompok` */

insert  into `tbl_kelompok`(`id_kelompok`,`id_tahun`,`nama_kelompok`) values (1,5,'Kelompok 1'),(3,5,'Kelompok 2'),(5,5,'Kelompok 3'),(8,6,'Kelompok 4'),(9,5,'Kelompok 4'),(11,6,'Kelompok 1'),(12,6,'Kelompok 3'),(13,7,'Kelompok 1'),(14,7,'Kelompok 2'),(15,6,'Kelompok 2'),(16,5,'Kelompok 5');

/*Table structure for table `tbl_peserta_kelompok` */

DROP TABLE IF EXISTS `tbl_peserta_kelompok`;

CREATE TABLE `tbl_peserta_kelompok` (
  `id_peserta` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelompok` int(11) DEFAULT NULL,
  `nama_peserta` varchar(100) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_peserta`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_peserta_kelompok` */

insert  into `tbl_peserta_kelompok`(`id_peserta`,`id_kelompok`,`nama_peserta`,`biaya`) values (1,1,'Erik Nofra Rama',2500000),(2,1,'Marion Putra',2500000),(3,1,'Ilham ',2500000),(5,5,'Fajrul Amal',2500000),(6,5,'Arief Rahmat',2500000),(7,3,'Rizky',2500000),(9,5,'Fajri Mahmuda',2500000),(14,1,'Ahmad Gunawan',250000),(15,9,'Mahyeldi Ansharullah',2500000),(16,8,'Joko Widodo',2500000),(17,8,'Anies Rasyid Baswedan',2500000),(18,11,'Surya Paloh',2500000),(19,12,'Luhut Binsar Panjaitan',2500000),(20,8,'Susilo Bambang Yudhoyono',2500000),(21,12,'KH Ma\'ruf Amin',2500000),(23,16,'Prof Dr H Genius Umar S.sos, Msi',2500000),(24,16,'Mardison',2500000);

/*Table structure for table `tbl_rekening` */

DROP TABLE IF EXISTS `tbl_rekening`;

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(50) DEFAULT NULL,
  `no_rek` varchar(20) DEFAULT NULL,
  `atas_nama` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_rekening`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_rekening` */

insert  into `tbl_rekening`(`id_rekening`,`nama_bank`,`no_rek`,`atas_nama`) values (8,'Bank Nagari','1234-1234-1234-1234','Masjid Raya Pauh Kambar Bintungan Tinggi'),(9,'Bank BNI','1234-1234-1234-0000','Masjid Raya Pauh Kambar Bintungan Tinggi'),(10,' Bank BSI','0909-0999-0909-0900','Masjid Raya Pauh Kambar Bintungan Tinggi'),(12,'Bank BRI','0909-0999-0909-0900','Masjid Raya Pauh Kambar Bintungan Tinggi'),(13,'Bank Danamon','0913-0083-9839','Masjid Raya Pauh Kambar Bintungan Tinggi');

/*Table structure for table `tbl_setting` */

DROP TABLE IF EXISTS `tbl_setting`;

CREATE TABLE `tbl_setting` (
  `id` char(20) NOT NULL,
  `nama_masjid` varchar(100) DEFAULT NULL,
  `id_kota` varchar(5) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_setting` */

insert  into `tbl_setting`(`id`,`nama_masjid`,`id_kota`,`alamat`) values ('1','MASJID RAYA PAUH KAMBAR BINTUNGAN TINGGI','0306','Nagari Pauh Kambar Kecamatan Nan Sabaris');

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
