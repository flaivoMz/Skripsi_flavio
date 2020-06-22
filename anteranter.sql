-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: anteranter
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('1','2','3') COLLATE utf8mb4_unicode_ci DEFAULT '3',
  `status` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci DEFAULT 'tidak',
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'superadmin','$2y$10$yWfCxhAKi.tSQiU6QjyTl.S5hig5/6qUaLSr0g6FIpk4mlsn1X9wa','1','aktif');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpn` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referal_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_bergabung` datetime DEFAULT NULL,
  `level` enum('customer','member','B2B') COLLATE utf8mb4_unicode_ci DEFAULT 'customer',
  `status` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci DEFAULT 'aktif',
  `diskon` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (3,'endrakocak','$2y$10$dpWKl5.Ej816kCaQQwyUSOv3dUd5mA4Dk9GCI6YnmQKG9nXz0EQs2','endra_kocak@mail.com','asdf','089',NULL,'2020-06-15 15:07:49','customer','aktif',NULL),(4,'hyung','$2y$10$4mjz1q2uPBPXAN5LK5nfSeMgKGrMFUlWltYs1Og.lUN8AU3TYOcgG','hyung@mail.com','godean','08123',NULL,'2020-06-15 19:16:25','customer','aktif',NULL),(5,'hyung endra','$2y$10$jXL3kVgR3WumuaOg93YEKOMVPzW3WtGiBX/0QGdn2mSTOcs90Uu5m','hyung_endra@mail.com','test','087',NULL,'2020-06-15 19:17:16','customer','aktif',NULL),(6,'test','$2y$10$mRa.Jqw2qFBE0YtG/AOjWuZDgOfzlmerqtpzX8cTn0QHO/KSjsj82','test@mail.com','test','087',NULL,'2020-06-15 19:17:57','customer','aktif',NULL),(7,'Koh Afuk','$2y$10$QGgxcW0zielxgi1W7GoVEO5NyzEcHlBPOpbed5I7aGUZEX26PKSMC','kohafuk@mail.com','godean','081222333444',NULL,'2020-06-16 17:32:51','customer','aktif',NULL),(8,'usertest2','$2y$10$lECw5jddkO6lS8z/XdY3mOeb9csGzlaVbaeCmRDcv6YdQvSJ/chRu','usertest2@mail.com','godean','089123',NULL,'2020-06-16 17:33:52','customer','aktif',NULL),(9,'usertest3','$2y$10$IjwxnXEFgnK04FmQh0aHoeWNVx6siMsmp/RNjPQqan3Cm//tIJsWK','usertest3@mail.com','godean','087999',NULL,'2020-06-16 17:34:29','customer','aktif',NULL);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ganti_driver`
--

DROP TABLE IF EXISTS `ganti_driver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ganti_driver` (
  `id_orderan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jarak_tempuh` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_driver_lama` bigint(20) NOT NULL,
  `id_driver_baru` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ganti_driver`
--

LOCK TABLES `ganti_driver` WRITE;
/*!40000 ALTER TABLE `ganti_driver` DISABLE KEYS */;
/*!40000 ALTER TABLE `ganti_driver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iklan`
--

DROP TABLE IF EXISTS `iklan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iklan` (
  `id_iklan` int(11) NOT NULL AUTO_INCREMENT,
  `gambar_iklan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci DEFAULT 'tidak',
  PRIMARY KEY (`id_iklan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iklan`
--

LOCK TABLES `iklan` WRITE;
/*!40000 ALTER TABLE `iklan` DISABLE KEYS */;
/*!40000 ALTER TABLE `iklan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_customer`
--

DROP TABLE IF EXISTS `order_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_customer` (
  `id_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `id_rider` bigint(20) DEFAULT NULL,
  `nama_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penerima` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpn_penerima` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpn_pengirim` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pembayaran` enum('cash','transfer','cicilan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinat_asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinat_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_asal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_tujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten_asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jarak` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_order` enum('order','proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_order` datetime NOT NULL,
  `status_pembayaran` enum('lunas','belum') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum',
  `referal_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi_driver` enum('sudah','belum') COLLATE utf8mb4_unicode_ci DEFAULT 'belum',
  `ongkir` bigint(20) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `verifikasi_customer` enum('sudah','belum') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum',
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_customer`
--

LOCK TABLES `order_customer` WRITE;
/*!40000 ALTER TABLE `order_customer` DISABLE KEYS */;
INSERT INTO `order_customer` VALUES ('CC20060000001',3,1,'endrakocak','tono','082333444555','08911','cash','-7.792744099999999,110.408355','-7.782893849976345,110.36705409325408','Jl. Janti No.143, Jaranan, Karang Jambe, Kec. Banguntapan, Bantul, Daerah Istimewa Yogyakarta 55918, Indonesia','Jl. Margomulyo No.70, Gowongan, Kec. Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233, Indonesia','Bantul','Daerah Istimewa Yogyakarta','','selesai','2020-06-18 17:44:59','belum',NULL,'sudah',13000,70800,83800,'sudah'),('CC20060000002',3,2,'endrakocak','mawar','087888999','089','cash','-7.804125199999999,110.3980215','-7.758782030746977,110.39930938954924','Jl. Kebun Raya No.2, Rejowinangun, Kec. Kotagede, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55171, Indonesia','Jl. Ring Road Utara Jl. Kaliwaru No.73, Kaliwaru, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281, Indonesia','Daerah Istimewa Yogyakarta','Kecamatan Depok','8.1 km','order','2020-06-19 16:56:57','belum',NULL,'belum',17000,2600,19600,'sudah'),('CC20060000003',3,1,'endrakocak','mawar','086122432111','089','transfer','-7.78334561882169,110.37455320358276','-7.784004677928404,110.35738706588745','Jl. A.M. Sangaji No.70, Gowongan, Kec. Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233, Indonesia','Jl. A.M. Sangaji No.70, Gowongan, Kec. Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233, Indonesia','Daerah Istimewa Yogyakarta','Daerah Istimewa Yogyakarta','2.0 km','order','2020-06-21 20:09:33','belum',NULL,'belum',10000,121500,131500,'sudah'),('CC20060000004',3,1,'endrakocak','koh afuk','888','999','transfer','-7.783033705818436,110.41256606815338','-7.782511719698654,110.36147135700836','Jl. Laksda Adisucipto No.204-205, Ngentak, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281, Indonesia','Jl. Pangeran Diponegoro No.106, Cokrodiningratan, Kec. Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233, Indonesia','Kabupaten Sleman','Daerah Istimewa Yogyakarta','6.6 km','order','2020-06-21 20:38:11','belum',NULL,'sudah',15000,4500,19500,'sudah');
/*!40000 ALTER TABLE `order_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail_customer`
--

DROP TABLE IF EXISTS `order_detail_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_detail_customer` (
  `id_barang` bigint(20) NOT NULL,
  `id_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `volume_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_barang` decimal(20,2) NOT NULL,
  `status_berat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `charge` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail_customer`
--

LOCK TABLES `order_detail_customer` WRITE;
/*!40000 ALTER TABLE `order_detail_customer` DISABLE KEYS */;
INSERT INTO `order_detail_customer` VALUES (13,'CC20060000001',3,'50x50x50',20.80,'overweight,oversize','helm barang mudah pecah',70800,0),(15,'CC20060000002',3,'25x25x25',2.60,'normal','',2600,0),(17,'CC20060000003',3,'90x90x90',121.50,'normal','asdf',121500,0),(18,'CC20060000004',3,'30x30x30',4.50,'normal','asdf',4500,0);
/*!40000 ALTER TABLE `order_detail_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail_customer_tmp`
--

DROP TABLE IF EXISTS `order_detail_customer_tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_detail_customer_tmp` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `volume_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_barang` decimal(20,2) NOT NULL,
  `status_berat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail_customer_tmp`
--

LOCK TABLES `order_detail_customer_tmp` WRITE;
/*!40000 ALTER TABLE `order_detail_customer_tmp` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detail_customer_tmp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_driver`
--

DROP TABLE IF EXISTS `order_driver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_driver` (
  `id_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_pengambilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_pengantaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_barang` decimal(20,2) NOT NULL,
  `status_berat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uang_diterima` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_driver`
--

LOCK TABLES `order_driver` WRITE;
/*!40000 ALTER TABLE `order_driver` DISABLE KEYS */;
INSERT INTO `order_driver` VALUES ('CC20060000001','pulung1592735645CC20060000001.png','pulung1592755440CC20060000001.png','50x50x50',20.80,'overweight,oversize',150000);
/*!40000 ALTER TABLE `order_driver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rider`
--

DROP TABLE IF EXISTS `rider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rider` (
  `id_rider` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpn` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plat_nomor` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_bergabung` datetime NOT NULL,
  `status` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  PRIMARY KEY (`id_rider`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rider`
--

LOCK TABLES `rider` WRITE;
/*!40000 ALTER TABLE `rider` DISABLE KEYS */;
INSERT INTO `rider` VALUES (1,'pulung','$2y$10$G6TnDT3pdbFiWL1D1cA/guNJppfaDOZAVp86Pc2O22hm/MICDh/sS','godean','087812174854','AB1054DD','profile.png','2020-06-20 13:00:00','aktif'),(2,'Si Maikel','$2y$10$YXknpTthDdQtSeLX7fHAjebgPzp1.7nb/n7OBglK5zLC15/VGASH6','godean','085743125271','AD6754ZZ','profile.png','2020-06-20 13:00:00','aktif');
/*!40000 ALTER TABLE `rider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarif_barang`
--

DROP TABLE IF EXISTS `tarif_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarif_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `harga_overweight` bigint(20) NOT NULL,
  `harga_oversize` bigint(20) NOT NULL,
  `harga_normal` bigint(20) NOT NULL,
  `kategori` enum('customer','member','B2B') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci DEFAULT 'aktif',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarif_barang`
--

LOCK TABLES `tarif_barang` WRITE;
/*!40000 ALTER TABLE `tarif_barang` DISABLE KEYS */;
INSERT INTO `tarif_barang` VALUES (1,50,50,1000,'customer','aktif'),(2,2000,2000,4000,'member','aktif'),(3,3000,3000,6000,'B2B','aktif');
/*!40000 ALTER TABLE `tarif_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarif_ongkir`
--

DROP TABLE IF EXISTS `tarif_ongkir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarif_ongkir` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jarak_minimal` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_jarak_minimal` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jarak_minimal` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `kategori_harga` enum('customer','member','B2B') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarif_ongkir`
--

LOCK TABLES `tarif_ongkir` WRITE;
/*!40000 ALTER TABLE `tarif_ongkir` DISABLE KEYS */;
INSERT INTO `tarif_ongkir` VALUES (1,'2','aktif',5000,2000,'customer'),(2,'2','tidak',2500,3000,'member');
/*!40000 ALTER TABLE `tarif_ongkir` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-22  9:43:31
