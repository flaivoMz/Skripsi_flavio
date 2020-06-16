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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
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
  `level` enum('customer','member') COLLATE utf8mb4_unicode_ci DEFAULT 'customer',
  `status` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci DEFAULT 'aktif',
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (3,'endrakocak','$2y$10$dpWKl5.Ej816kCaQQwyUSOv3dUd5mA4Dk9GCI6YnmQKG9nXz0EQs2','endra_kocak@mail.com','asdf','089',NULL,'2020-06-15 15:07:49','customer','aktif'),(4,'hyung','$2y$10$4mjz1q2uPBPXAN5LK5nfSeMgKGrMFUlWltYs1Og.lUN8AU3TYOcgG','hyung@mail.com','godean','08123',NULL,'2020-06-15 19:16:25','customer','aktif'),(5,'hyung endra','$2y$10$jXL3kVgR3WumuaOg93YEKOMVPzW3WtGiBX/0QGdn2mSTOcs90Uu5m','hyung_endra@mail.com','test','087',NULL,'2020-06-15 19:17:16','customer','aktif'),(6,'test','$2y$10$mRa.Jqw2qFBE0YtG/AOjWuZDgOfzlmerqtpzX8cTn0QHO/KSjsj82','test@mail.com','test','087',NULL,'2020-06-15 19:17:57','customer','aktif');
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
  `nama_penerima` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpn_penerima` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pembayaran` enum('cash','transfer','cicilan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinat_asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinat_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_asal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_tujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jarak` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_order` enum('order','proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` bigint(20) DEFAULT NULL,
  `tanggal_order` datetime NOT NULL,
  `status_pembayaran` enum('lunas','belum') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum',
  `referal_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi_driver` enum('sudah','belum') COLLATE utf8mb4_unicode_ci DEFAULT 'belum',
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_customer`
--

LOCK TABLES `order_customer` WRITE;
/*!40000 ALTER TABLE `order_customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail_customer`
--

DROP TABLE IF EXISTS `order_detail_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_detail_customer` (
  `id_barang` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_order` bigint(20) NOT NULL,
  `volume_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail_customer`
--

LOCK TABLES `order_detail_customer` WRITE;
/*!40000 ALTER TABLE `order_detail_customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detail_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_driver`
--

DROP TABLE IF EXISTS `order_driver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_driver` (
  `id_order` int(11) NOT NULL,
  `gambar_pengambilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_pengantaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_driver`
--

LOCK TABLES `order_driver` WRITE;
/*!40000 ALTER TABLE `order_driver` DISABLE KEYS */;
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
  `plat_nomor` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bergabung` datetime NOT NULL,
  `status` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  PRIMARY KEY (`id_rider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rider`
--

LOCK TABLES `rider` WRITE;
/*!40000 ALTER TABLE `rider` DISABLE KEYS */;
/*!40000 ALTER TABLE `rider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarif` (
  `id_tarif` bigint(20) NOT NULL AUTO_INCREMENT,
  `jarak_minimal` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_jarak_minimal` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jarak_minimal` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `kategori_harga` enum('customer','member') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tarif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarif`
--

LOCK TABLES `tarif` WRITE;
/*!40000 ALTER TABLE `tarif` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarif` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-16 18:15:56
