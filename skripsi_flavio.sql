/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.7.24 : Database - skripsi_flavio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `skripsi_flavio`;

/*Table structure for table `calon` */

DROP TABLE IF EXISTS `calon`;

CREATE TABLE `calon` (
  `id_calon` int(11) NOT NULL AUTO_INCREMENT,
  `no_urut` int(11) DEFAULT NULL,
  `id_ketua` int(11) DEFAULT NULL,
  `id_wakil` int(11) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `visi_misi` text,
  `kategori` enum('parpol','independen') DEFAULT NULL,
  `id_periode` int(11) DEFAULT NULL,
  `id_parpol` varchar(30) DEFAULT NULL,
  `id_kpu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_calon`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `calon` */

insert  into `calon`(`id_calon`,`no_urut`,`id_ketua`,`id_wakil`,`photo`,`visi_misi`,`kategori`,`id_periode`,`id_parpol`,`id_kpu`) values 
(1,2,4,5,'jokowi.jpg','<p><strong>Visi :</strong></p>\r\n\r\n<ol>\r\n <li>Bagian misi 1</li>\r\n <li>Bagian misi 2</li>\r\n <li>Bagian misi 3</li>\r\n <li>Bagian misi 4</li>\r\n</ol>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Misi :</strong></p>\r\n\r\n<ol>\r\n <li>Bagian visi 1</li>\r\n <li>Bagian visi 2</li>\r\n <li>Bagian visi 3</li>\r\n <li>Bagian visi 4</li>\r\n</ol>','independen',1,NULL,1),
(2,1,6,7,'prabowo.jpg','<p><strong>Visi :</strong></p>\r\n\r\n<ol>\r\n <li>Bagian misi 1</li>\r\n <li>Bagian misi 2</li>\r\n <li>Bagian misi 3</li>\r\n <li>Bagian misi 4</li>\r\n</ol>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Misi :</strong></p>\r\n\r\n<ol>\r\n <li>Bagian visi 1</li>\r\n <li>Bagian visi 2</li>\r\n <li>Bagian visi 3</li>\r\n <li>Bagian visi 4</li>\r\n</ol>','parpol',1,'1,2,4,',1);

/*Table structure for table `kotak_suara` */

DROP TABLE IF EXISTS `kotak_suara`;

CREATE TABLE `kotak_suara` (
  `id_suara` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemilih` int(11) DEFAULT NULL,
  `id_calon` int(11) DEFAULT NULL,
  `id_periode` int(11) DEFAULT NULL,
  `tgl_pilih` datetime DEFAULT NULL,
  PRIMARY KEY (`id_suara`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `kotak_suara` */

insert  into `kotak_suara`(`id_suara`,`id_pemilih`,`id_calon`,`id_periode`,`tgl_pilih`) values 
(8,1,1,1,'2021-05-26 14:00:53'),
(9,2,1,1,'2021-05-26 14:02:38'),
(10,3,1,1,'2021-05-26 20:20:35'),
(11,4,2,1,'2021-05-27 16:16:59'),
(12,5,1,1,'2021-05-29 21:19:42'),
(13,6,2,1,'2021-05-29 21:21:05'),
(14,7,2,1,'2021-05-29 21:21:34'),
(15,8,2,1,'2021-05-29 21:36:54');

/*Table structure for table `kpu` */

DROP TABLE IF EXISTS `kpu`;

CREATE TABLE `kpu` (
  `id_kpu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  PRIMARY KEY (`id_kpu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kpu` */

insert  into `kpu`(`id_kpu`,`nama_lengkap`,`username`,`password`,`is_active`) values 
(1,'kpu 1','admin','$2y$10$38FkPC/fn4YBJKnnxLddC.j8eBMTKqT9T3FsAmB0fop4rgoYZn88O',1);

/*Table structure for table `parpol` */

DROP TABLE IF EXISTS `parpol`;

CREATE TABLE `parpol` (
  `id_parpol` int(11) NOT NULL AUTO_INCREMENT,
  `nama_parpol` varchar(50) DEFAULT NULL,
  `singkatan` varchar(20) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_parpol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `parpol` */

insert  into `parpol`(`id_parpol`,`nama_parpol`,`singkatan`,`logo`) values 
(1,'partai kebangkitan bangsa','PKB','pkb.png'),
(2,'partai golongan karya','GOLKAR','golkar.jpg'),
(3,'partai demokrasi indonesia perjuangan','PDI Perjuangan','pdip.png'),
(4,'partai keadilan sejahtera','PKS','pks.jpg'),
(5,'partai nasional demokrat','nasdem','nasdem-edit-1621822055.png');

/*Table structure for table `pemilih` */

DROP TABLE IF EXISTS `pemilih`;

CREATE TABLE `pemilih` (
  `id_pemilih` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jekel` enum('L','P') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_pemilih`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `pemilih` */

insert  into `pemilih`(`id_pemilih`,`nik`,`nama`,`jekel`,`tempat_lahir`,`tgl_lahir`,`alamat`,`agama`) values 
(1,'12345671','abdul hamid','L','bantul','1997-01-23','bantul','islam'),
(2,'12345672','putri ayu','P','kulon progo','1996-05-10','bantul','hindu'),
(3,'12345673','sofyan gibran','L','sleman','2000-02-17','bantul','islam'),
(4,'12345674','Joko Widodo','L','Solo','1980-11-20','solo','islam'),
(5,'12345675','Ma\'aruf Amin','L','jawa tengah','1977-10-30','jawa tengah','islam'),
(6,'12345676','Prabowo Subianto','L','gorontalo','1980-07-19','gorontalo','islam'),
(7,'12345677','Sandiaga Uno','L','kalimantan','1988-01-20','kalimantan','islam'),
(8,'12345678','putri aju','P','Yogyakarta','1996-05-10','Jl. Raya Janti Karang Jambe No. 143  Yogyakarta, Indonesia',NULL);

/*Table structure for table `periode` */

DROP TABLE IF EXISTS `periode`;

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL AUTO_INCREMENT,
  `periode_jabatan` varchar(20) DEFAULT NULL,
  `mulai_pilih` date DEFAULT NULL,
  `batas_pilih` date DEFAULT NULL,
  `status` enum('aktif','tidak') DEFAULT NULL,
  PRIMARY KEY (`id_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `periode` */

insert  into `periode`(`id_periode`,`periode_jabatan`,`mulai_pilih`,`batas_pilih`,`status`) values 
(1,'2021 - 2024','2021-05-26','2021-05-31','aktif'),
(3,'2018 - 2021','2018-04-09','2018-04-10','tidak');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
