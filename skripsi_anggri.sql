/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.7.24 : Database - skripsi_anggri
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`skripsi_anggri` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `skripsi_anggri`;

/*Table structure for table `bayar` */

DROP TABLE IF EXISTS `bayar`;

CREATE TABLE `bayar` (
  `id_bayar` int(11) NOT NULL AUTO_INCREMENT,
  `id_pesanan` int(11) DEFAULT NULL,
  `tgl_bayar` datetime DEFAULT NULL,
  `nominal_bayar` int(11) DEFAULT NULL,
  `status_bayar` enum('dp','lunas') DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `bayar` */

insert  into `bayar`(`id_bayar`,`id_pesanan`,`tgl_bayar`,`nominal_bayar`,`status_bayar`,`id_user`) values 
(1,1,'2021-03-21 19:23:45',3162500,'dp',1),
(2,1,'2021-03-21 19:32:04',3162500,'lunas',1),
(3,2,'2021-03-21 20:15:30',1225000,'dp',1);

/*Table structure for table `paket_wisata` */

DROP TABLE IF EXISTS `paket_wisata`;

CREATE TABLE `paket_wisata` (
  `id_wisata` int(11) NOT NULL AUTO_INCREMENT,
  `nama_wisata` varchar(100) DEFAULT NULL,
  `kategori_wisata` varchar(100) DEFAULT NULL,
  `harga_wisata` int(11) DEFAULT NULL,
  `min_orang` int(11) DEFAULT NULL,
  `deskripsi` text,
  `gambar_wisata` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_wisata`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `paket_wisata` */

insert  into `paket_wisata`(`id_wisata`,`nama_wisata`,`kategori_wisata`,`harga_wisata`,`min_orang`,`deskripsi`,`gambar_wisata`,`slug`) values 
(1,'Paket Wisata Jogja 3 Hari 2 Malam','Wisata Kota',1150000,6,'Fasilitas :\r\n\r\nTransportasi ( Xpander/Avanza ), Hotel bintang 3 ( isi 2/kamar ) area Malioboro + Breakfast hotel,  Tiket Masuk Obyek Wisata,  Jeep Merapi, Air Mineral, Parkir & Retribusi, Tips Driver.\r\n\r\nNon Fasilitas :\r\n\r\nMakan dluar program\r\n\r\nKeperluan pribadi\r\n\r\nTiket spot foto\r\n\r\nLaundry\r\n\r\nTiket PP Transportasi Dar/ke Kota Asal\r\n\r\nSegala yang tidak termasuk dalam fasilitas.\r\n\r\nHari ke-1\r\n\r\nKebun Buah Mangunan\r\n\r\nPuncak Becici\r\n\r\nGoa Pindul\r\n\r\nPantai Mesra\r\n\r\nHari Ke-2\r\n\r\nJeep Lava Tour\r\n\r\nCandi Borobudur\r\n\r\nGereja Ayam\r\n\r\nHari Ke-3\r\n\r\nKeraton Yogyakarta\r\n\r\nTamansari\r\n\r\nPusat Oleh-oleh khas Jogja','wisata1.jpg','paket-wisata-jogja-3-hari-2-malam-82917693'),
(2,'Wisata Bandung (Explore Gunung Tangkuban Perahu)','Gunung',375000,15,'TOUR BANDUNG 1 HARI\r\n\r\nDestinasi :\r\n\r\nGunung Tangkuban Perahu\r\n\r\nFloating Market\r\n\r\nDusun Bambu\r\n\r\nPaket yang menawarkkan wisata mengexplor Keindahan Gunung Tangkuban\r\n\r\nPerahu, bersantai di Dusun Bambu dan menikmati keunikan Floating Market.\r\n\r\n\r\nMeeting Point BANDUNG\r\n\r\n07.00        Penjemputan dari Bandara/Terminal Bus/Stasiun Kereta/Hotel\r\n\r\n08.00        Mengunjung Gunung Tangkuban Perahu\r\n\r\n12.00        Makan Siang\r\n\r\n13.00        Wisata Floating Market & Dusun Bambu\r\n\r\n16.00        Belanja Oleh-oleh\r\n\r\n18.00        Kembali ke Bandara/Terminal Bus/Stasiun Kereta/Hotel','wisata2.jpg','wisata-bandung-explore-gunung-tangkuban-perahu-02397832'),
(3,'Wisata Pegunungan Di Bandung 2 Hari 1 Malam','Gunung',850000,15,'Perjalanan\r\nHari ke 1\r\n\r\nWisata Kawah Putih\r\n\r\n\r\n\r\nHari ke 2\r\n\r\nWisata Tangkuban Perahu & Ciater Hotspring\r\n\r\nMeeting Point  JAKARTA\r\n\r\nFasilitas :\r\n\r\n1. Tiket Masuk Objek Wisata (gerbang utama)\r\n\r\n2. Transportasi (all in)\r\n\r\n3. Hotel 1 Kmr 3 org + Sarapan\r\n\r\n4. Makan Siang (2x) & Makan Malam (1x)\r\n\r\n5. Guide\r\n\r\n\r\nHarga Belum Termasuk :\r\n\r\nTiket sarana transportasi tambahan.\r\n\r\nTips Crew, Makan diluar program, Pengeluaran pribadi/belanja oleh-oleh dan segala yang tidak disebutkan dalam fasilitas.','wisata3.jpg','wisata-pegunungan-dibandung-2-hari-1-malam-987432907'),
(4,'Wisata Religi Lombok 2D1N','Religi',1030000,6,'HARGA  SUDAH TERMASUK  :\r\n\r\nMenginap di hotel Senggigi / Mataram Area Bintang 3\r\n\r\nSarapan pagI di hotel\r\n\r\nPrivate transfer and tours sesuai dengan program di atas\r\n\r\nSemua karcis masuk objek wisata\r\n\r\nMakan siang dan makan malam di lokal restaurant seperti program di atas\r\n\r\nTransport  Pariwisata tahun 2017,Sesuai dengan jumlah peserta\r\n\r\nPemandu wisata yang berpengalaman.\r\n\r\nSemua Biaya  parkir.\r\n\r\nMineral Water pada saat kedatangan dan tour.\r\n\r\nKalungan selendang motif khas Lombok pada saat kedatangan\r\n\r\n01/02 x Free Foc for TL ( Twin Share )\r\n\r\n\r\n\r\nHARGA TIDAK TERMASUK :\r\n\r\nTiket pesawat, Airport  tax, Porter  airport.Extra pemakaian di hotel (telefon, minibar, laundry)\r\n\r\nExtra  pemakaian waktu tour (souvenir, extra makanan atau minuman yang tidak termasuk di menu paket).\r\n\r\nTipping untuk Sopir & Guide.\r\n\r\nDonasi Pada saat di tempat Ziarah ( Seiklasnya )','wisata4.jpg','wisata-religi-lombok-2d1n-9829834'),
(5,'Tour Religi Murah Jawa Timur','Religi',245000,12,'Fasilitas termasuk :\r\n\r\nKendaraan pariwisata \r\nBig bus/medium bus/ling elf,/hiace\r\nRetribusi smw makam\r\nToll, parkir\r\nMakan 1x\r\nPemandu khusus wisata religi\r\nTour Leader\r\nSnack dan air mineral. Botol\r\nBaner kegiatan\r\n\r\nPerjalanan\r\n\r\nIniterary trip\r\n06.00 penjemputan\r\n07.00 pemberangkatan trowulan mojokerto\r\n09.00 tiba di makam syekh jumadil kubro trowulan\r\n10.30 menuju makam Gusdur Jombang\r\n11.30 tiba di kawasan makam Gusdur, sholat dhuhur dan ziaroh\r\n13.00 menuju makam Bung karno blitar\r\n15.30 tiba di makam Bung Karno Blitar\r\n17.00 menujuke kediri mampir resto lokal makan malam\r\n18.00 tiba di resto sekitar kediri utk mkan malam\r\n19.00 menuju simpang lima gumul kediri\r\n20.00 wisata simpang lima gumul\r\n21.30 melnjutkan perjalanan pulang menuju SBY via toll panjang\r\n23.30 Estimasi tiba d titik penjemputan','wisata5.jpg','tour-religi-murah-jawa-timur-9829834'),
(6,'3D2N Religi Tour Wali Songo\r\n','Religi',1400000,18,'Detail Harga\r\nFasilitas :\r\n- Transport ac\r\n- Makan 7 kali\r\n- Penginapan ac 2 malam\r\n- Tol/parkir\r\n- Tour Guide include doa\r\n- Spanduk dan dokumentasi\r\n\r\nPerjalanan\r\n3D2N Religi Tour Wali Songo\r\n\r\nD1\r\n07.00   Jemput Surabaya dsk\r\n08.00   Wisata Sunan Ampel\r\n10.00    Wisata Sunan Giri\r\nMakan siang \r\n13.00    Wisata Syeh Maulana Malik Ibrahim\r\n15.00    Wisata Sunan Drajad\r\n18.00     Wisata Sunan Bonang\r\n20.00     Makan malam\r\n21.00     Istirahat di hotel\r\n\r\nD2\r\n06.00     Makan pagi di hotel\r\n07.00     Menuju Kudus\r\n12.00     Wisata Sunan Kudus\r\n14.00     Wisata Sunan Muria\r\n18.00     Wisata Sunan Kalijogo Demak\r\n19.00      Menuju Cirebon\r\n                Makan malam dinner box\r\n23.00      Istirahat di penginapan\r\n\r\nD3\r\n07.00     Sarapan di hotel\r\n08.00     Wisata ziarah Sunan Gunung Jati\r\n10.00     Kembali ke Surabaya\r\nSinggah makan siang','wisata6.jpg','3d2n-religi-tour-wali-songo-9287349');

/*Table structure for table `pemandu` */

DROP TABLE IF EXISTS `pemandu`;

CREATE TABLE `pemandu` (
  `id_pemandu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemandu` varchar(100) DEFAULT NULL,
  `alamat_pemandu` varchar(100) DEFAULT NULL,
  `jekel_pemandu` enum('L','P') DEFAULT NULL,
  `no_hp_pemandu` varchar(15) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pemandu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pemandu` */

insert  into `pemandu`(`id_pemandu`,`nama_pemandu`,`alamat_pemandu`,`jekel_pemandu`,`no_hp_pemandu`,`photo`) values 
(1,'abdul hamid','jogja','L','087765431121','avatar1.jpg'),
(2,'akifah naila','bantul','P','082366751254','avatar2.jpg'),
(3,'sofyan gibran','sleman','L','089976541132','avatar3.jpg');

/*Table structure for table `pemandu_wisata` */

DROP TABLE IF EXISTS `pemandu_wisata`;

CREATE TABLE `pemandu_wisata` (
  `id_pemandu_wisata` int(11) NOT NULL AUTO_INCREMENT,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_pemandu` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pemandu_wisata`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `pemandu_wisata` */

insert  into `pemandu_wisata`(`id_pemandu_wisata`,`id_pesanan`,`id_pemandu`,`id_user`) values 
(8,2,2,1),
(9,2,3,1),
(10,1,1,1),
(11,1,2,1);

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_booking` varchar(50) NOT NULL,
  `id_wisata` int(11) DEFAULT NULL,
  `id_wisatawan` int(11) DEFAULT NULL,
  `tgl_pesanan` datetime DEFAULT NULL,
  `tgl_wisata` datetime DEFAULT NULL,
  `nama_pemesan` varchar(50) DEFAULT NULL,
  `no_hp_pemesan` varchar(15) DEFAULT NULL,
  `jml_dewasa` int(11) DEFAULT NULL,
  `jml_balita` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_pesan` enum('booking','batalw','batalp','expired','selesai') DEFAULT NULL,
  `status_bayar` enum('dp','lunas') DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pesanan` */

insert  into `pesanan`(`id_pesanan`,`kode_booking`,`id_wisata`,`id_wisatawan`,`tgl_pesanan`,`tgl_wisata`,`nama_pemesan`,`no_hp_pemesan`,`jml_dewasa`,`jml_balita`,`total_bayar`,`status_pesan`,`status_bayar`) values 
(1,'1616274352',1,1,'2021-03-21 04:00:05','2021-03-31 12:00:00','gibran','089876543321',5,1,6325000,'booking','lunas'),
(2,'1616274412',5,1,'2021-03-21 04:07:23','2021-04-15 14:00:00','naila','082366541287',8,4,2450000,'booking','dp'),
(3,'1616287347',6,1,'2021-03-21 07:42:27','2021-04-30 12:00:00','ahmad','082243116754',10,8,19600000,'batalw',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('admin','wisatawan') DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id_user`,`username`,`password`,`role`,`is_active`) values 
(1,'wisatawan','$2y$10$9l39QPqKLlbWBrvkODPO7uKFSMKuwQI4Ho63R0WjmPlxwQ90XIFNy','wisatawan',1),
(2,'hamid','$2y$10$Aa6bzW7SGGFTCCs3m6/TO.zEW6mwtCWFN9aUmu3p5UAq1kVJ4ovga','wisatawan',1);

/*Table structure for table `wisatawan` */

DROP TABLE IF EXISTS `wisatawan`;

CREATE TABLE `wisatawan` (
  `id_wisatawan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nama_wisatawan` varchar(100) DEFAULT NULL,
  `alamat_wisatawan` varchar(100) DEFAULT NULL,
  `jekel_wisatawan` enum('L','P') DEFAULT NULL,
  `no_hp_wisatawan` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_wisatawan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `wisatawan` */

insert  into `wisatawan`(`id_wisatawan`,`id_user`,`nama_wisatawan`,`alamat_wisatawan`,`jekel_wisatawan`,`no_hp_wisatawan`) values 
(1,1,'ABDUL HAMID','bantul','L','086675431265'),
(2,2,'abdul hamid','Jl. Raya Janti Karang Jambe No. 143  Yogyakarta, Indonesia','L','081266301224');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
