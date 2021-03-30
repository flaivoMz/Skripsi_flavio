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
-- CREATE DATABASE /*!32312 IF NOT EXISTS*/`skripsi_anggri` /*!40100 DEFAULT CHARACTER SET latin1 */;

-- USE `skripsi_anggri`;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `bayar` */

insert  into `bayar`(`id_bayar`,`id_pesanan`,`tgl_bayar`,`nominal_bayar`,`status_bayar`,`id_user`) values 
(8,4,'2021-03-27 10:19:00',1347500,'dp',3);

/*Table structure for table `paket_wisata` */

DROP TABLE IF EXISTS `paket_wisata`;

CREATE TABLE `paket_wisata` (
  `id_wisata` int(11) NOT NULL AUTO_INCREMENT,
  `nama_wisata` varchar(150) DEFAULT NULL,
  `kategori_wisata` varchar(100) DEFAULT NULL,
  `harga_wisata` int(11) DEFAULT NULL,
  `min_orang` int(11) DEFAULT NULL,
  `deskripsi` text,
  `gambar_wisata` varchar(100) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_wisata`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `paket_wisata` */

insert  into `paket_wisata`(`id_wisata`,`nama_wisata`,`kategori_wisata`,`harga_wisata`,`min_orang`,`deskripsi`,`gambar_wisata`,`slug`) values 
(1,'Paket Wisata Jogja 3 Hari 2 Malam','Wisata Kota',1150000,6,'<p><strong>Fasilitas : </strong></p>\r\n\r\n<ol>\r\n	<li>Transportasi ( Xpander/Avanza ),</li>\r\n	<li>Hotel bintang 3 ( isi 2/kamar ) area Malioboro + Breakfast hotel,</li>\r\n	<li>Tiket Masuk Obyek Wisata,</li>\r\n	<li>Jeep Merapi,</li>\r\n	<li>Air Mineral,</li>\r\n	<li>Parkir &amp; Retribusi,</li>\r\n	<li>Tips Driver.</li>\r\n</ol>\r\n\r\n<p><strong>Non Fasilitas : </strong></p>\r\n\r\n<ol>\r\n	<li>Makan dluar program</li>\r\n	<li>Keperluan pribadi</li>\r\n	<li>Tiket spot foto</li>\r\n	<li>Laundry Tiket PP</li>\r\n	<li>Transportasi Dar/ke Kota Asal</li>\r\n	<li>Segala yang tidak termasuk dalam fasilitas</li>\r\n</ol>\r\n\r\n<p><strong>Perjalanan :</strong></p>\r\n\r\n<p>Hari ke-1 Kebun Buah Mangunan Puncak Becici Goa Pindul Pantai Mesra</p>\r\n\r\n<p>Hari Ke-2 Jeep Lava Tour Candi Borobudur Gereja Ayam</p>\r\n\r\n<p>Hari Ke-3 Keraton Yogyakarta Tamansari Pusat Oleh-oleh khas Jogja</p>\r\n','wisata1.jpg','paket-wisata-jogja-3-hari-2-malam-1616641999'),
(2,'Wisata Bandung (Explore Gunung Tangkuban Perahu)','Gunung',375000,15,'<p><strong>Destinasi : </strong></p>\r\n\r\n<ol>\r\n	<li>Gunung Tangkuban Perahu</li>\r\n	<li>Floating Market Dusun Bambu</li>\r\n</ol>\r\n\r\n<p>Paket yang menawarkkan wisata mengexplor Keindahan Gunung Tangkuban Perahu, bersantai di Dusun Bambu dan menikmati keunikan Floating Market.</p>\r\n\r\n<p><strong>Meeting Point BANDUNG </strong></p>\r\n\r\n<ol>\r\n	<li>07.00 Penjemputan dari Bandara/Terminal Bus/Stasiun Kereta/Hotel</li>\r\n	<li>08.00 Mengunjung Gunung Tangkuban Perahu</li>\r\n	<li>12.00 Makan Siang</li>\r\n	<li>13.00 Wisata Floating Market &amp; Dusun Bambu</li>\r\n	<li>16.00 Belanja Oleh-oleh</li>\r\n	<li>18.00 Kembali ke Bandara/Terminal Bus/Stasiun Kereta/Hotel</li>\r\n</ol>\r\n','wisata2.jpg','wisata-bandung-explore-gunung-tangkuban-perahu-1616643032'),
(3,'Wisata Pegunungan Di Bandung 2 Hari 1 Malam','Gunung',850000,15,'<p><strong>Perjalanan Hari ke 1 </strong></p>\r\n\r\n<p>Wisata Kawah Putih</p>\r\n\r\n<p><strong>Hari ke 2 </strong></p>\r\n\r\n<p>Wisata Tangkuban Perahu &amp; Ciater Hotspring</p>\r\n\r\n<p>Meeting Point JAKARTA</p>\r\n\r\n<p><strong>Fasilitas : </strong></p>\r\n\r\n<ol>\r\n	<li>Tiket Masuk Objek Wisata (gerbang utama)</li>\r\n	<li>Transportasi (all in)</li>\r\n	<li>Hotel 1 Kmr 3 org + Sarapan</li>\r\n	<li>Makan Siang (2x) &amp; Makan Malam (1x</li>\r\n	<li>Guide</li>\r\n</ol>\r\n\r\n<p><strong>Harga Belum Termasuk : </strong></p>\r\n\r\n<p>Tiket sarana transportasi tambahan.</p>\r\n\r\n<p>Tips Crew,</p>\r\n\r\n<p>Makan diluar program,</p>\r\n\r\n<p>Pengeluaran pribadi/belanja oleh-oleh dan</p>\r\n\r\n<p>segala yang tidak disebutkan dalam fasilitas.</p>\r\n','wisata3.jpg','wisata-pegunungan-di-bandung-2-hari-1-malam-1616643457'),
(4,'Wisata Religi Lombok 2D1N','Religi',1030000,6,'<p><strong>HARGA SUDAH TERMASUK : </strong></p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Menginap di hotel Senggigi / Mataram Area Bintang 3</p>\r\n	</li>\r\n	<li>\r\n	<p>Sarapan pagI di hotel</p>\r\n	</li>\r\n	<li>\r\n	<p>Private transfer and tours sesuai dengan program di atas</p>\r\n	</li>\r\n	<li>\r\n	<p>Semua karcis masuk objek wisata</p>\r\n	</li>\r\n	<li>\r\n	<p>Makan siang dan makan malam di lokal restaurant seperti program di atas</p>\r\n	</li>\r\n	<li>\r\n	<p>Transport Pariwisata tahun 2017,</p>\r\n	</li>\r\n	<li>\r\n	<p>Sesuai dengan jumlah peserta</p>\r\n	</li>\r\n	<li>\r\n	<p>Pemandu wisata yang berpengalaman.</p>\r\n	</li>\r\n	<li>\r\n	<p>Semua Biaya parkir.</p>\r\n	</li>\r\n	<li>\r\n	<p>Mineral Water pada saat kedatangan dan tour.</p>\r\n	</li>\r\n	<li>\r\n	<p>Kalungan selendang motif khas</p>\r\n	</li>\r\n	<li>\r\n	<p>Lombok pada saat kedatangan 01/02 x Free Foc for TL ( Twin Share )</p>\r\n	</li>\r\n</ol>\r\n\r\n<p><strong>HARGA TIDAK TERMASUK : </strong></p>\r\n\r\n<p>Tiket pesawat, Airport tax, Porter airport.Extra pemakaian di hotel (telefon, minibar, laundry) Extra pemakaian waktu tour (souvenir, extra makanan atau minuman yang tidak termasuk di menu paket). Tipping untuk Sopir &amp; Guide. Donasi Pada saat di tempat Ziarah ( Seiklasnya )</p>\r\n','wisata4.jpg','wisata-religi-lombok-2d1n-1616643810'),
(5,'Tour Religi Murah Jawa Timur','Religi',245000,12,'<p><strong>Fasilitas termasuk :</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Kendaraan pariwisata</p>\r\n	</li>\r\n	<li>\r\n	<p>Big bus/medium bus/ling elf,/hiace</p>\r\n	</li>\r\n	<li>\r\n	<p>Retribusi smw makam</p>\r\n	</li>\r\n	<li>\r\n	<p>Toll, parkir</p>\r\n	</li>\r\n	<li>\r\n	<p>Makan 1x</p>\r\n	</li>\r\n	<li>\r\n	<p>Pemandu khusus wisata religi</p>\r\n	</li>\r\n	<li>\r\n	<p>Tour Leader Snack dan air mineral.</p>\r\n	</li>\r\n	<li>\r\n	<p>Botol</p>\r\n	</li>\r\n	<li>\r\n	<p>Baner kegiatan</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>Perjalanan Initerary trip </strong></p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>06.00 penjemputan</p>\r\n	</li>\r\n	<li>\r\n	<p>07.00 pemberangkatan trowulan mojokerto</p>\r\n	</li>\r\n	<li>\r\n	<p>09.00 tiba di makam syekh jumadil kubro trowulan</p>\r\n	</li>\r\n	<li>\r\n	<p>10.30 menuju makam Gusdur Jombang</p>\r\n	</li>\r\n	<li>\r\n	<p>11.30 tiba di kawasan makam Gusdur, sholat dhuhur dan ziaroh</p>\r\n	</li>\r\n	<li>\r\n	<p>13.00 menuju makam Bung karno blitar</p>\r\n	</li>\r\n	<li>\r\n	<p>15.30 tiba di makam Bung Karno Blitar</p>\r\n	</li>\r\n	<li>\r\n	<p>17.00 menujuke kediri mampir resto lokal makan malam</p>\r\n	</li>\r\n	<li>\r\n	<p>18.00 tiba di resto sekitar kediri utk mkan malam</p>\r\n	</li>\r\n	<li>\r\n	<p>19.00 menuju simpang lima gumul kediri</p>\r\n	</li>\r\n	<li>\r\n	<p>20.00 wisata simpang lima gumul</p>\r\n	</li>\r\n	<li>\r\n	<p>21.30 melnjutkan perjalanan pulang menuju SBY via toll panjang</p>\r\n	</li>\r\n	<li>\r\n	<p>23.30 Estimasi tiba d titik penjemputan</p>\r\n	</li>\r\n</ol>\r\n','wisata5.jpg','tour-religi-murah-jawa-timur-1616644048'),
(6,'3D2N Religi Tour Wali Songo','Religi',1400000,18,'<p><strong>Fasilitas </strong>:</p>\r\n\r\n<ol>\r\n	<li>Transport ac</li>\r\n	<li>Makan 7 kali</li>\r\n	<li>Penginapan ac 2 malam</li>\r\n	<li>Tol/parkir</li>\r\n	<li>Tour Guide include doa</li>\r\n	<li>Spanduk dan dokumentasi</li>\r\n	<li>Perjalanan 3D2N Religi Tour Wali Songo</li>\r\n</ol>\r\n\r\n<p><strong>D1</strong></p>\r\n\r\n<p>07.00 Jemput Surabaya dsk</p>\r\n\r\n<p>08.00 Wisata Sunan Ampel</p>\r\n\r\n<p>10.00 Wisata Sunan Giri Makan siang</p>\r\n\r\n<p>13.00 Wisata Syeh Maulana Malik Ibrahim</p>\r\n\r\n<p>15.00 Wisata Sunan Drajad</p>\r\n\r\n<p>18.00 Wisata Sunan Bonang</p>\r\n\r\n<p>20.00 Makan malam</p>\r\n\r\n<p>21.00 Istirahat di hotel</p>\r\n\r\n<p><strong>D2</strong></p>\r\n\r\n<p>06.00 Makan pagi di hotel</p>\r\n\r\n<p>07.00 Menuju Kudus</p>\r\n\r\n<p>12.00 Wisata Sunan Kudus</p>\r\n\r\n<p>14.00 Wisata Sunan Muria</p>\r\n\r\n<p>18.00 Wisata Sunan Kalijogo Demak</p>\r\n\r\n<p>19.00 Menuju Cirebon Makan malam dinner box</p>\r\n\r\n<p>23.00 Istirahat di penginapan</p>\r\n\r\n<p><strong>D3</strong></p>\r\n\r\n<p>07.00 Sarapan di hotel</p>\r\n\r\n<p>08.00 Wisata ziarah Sunan Gunung Jati</p>\r\n\r\n<p>10.00 Kembali ke Surabaya Singgah makan siang</p>\r\n','wisata6.jpg','3d2n-religi-tour-wali-songo-1616641742');

/*Table structure for table `pemandu` */

DROP TABLE IF EXISTS `pemandu`;

CREATE TABLE `pemandu` (
  `id_pemandu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemandu` varchar(100) DEFAULT NULL,
  `alamat_pemandu` varchar(100) DEFAULT NULL,
  `jekel_pemandu` enum('L','P') DEFAULT NULL,
  `no_hp_pemandu` varchar(15) DEFAULT NULL,
  `photo` varchar(150) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `pemandu_wisata` */

insert  into `pemandu_wisata`(`id_pemandu_wisata`,`id_pesanan`,`id_pemandu`,`id_user`) values 
(18,4,2,3);

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
  `status_pesan` enum('booking','batal','expired','selesai') DEFAULT NULL,
  `status_bayar` enum('dp','lunas') DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `pesanan` */

insert  into `pesanan`(`id_pesanan`,`kode_booking`,`id_wisata`,`id_wisatawan`,`tgl_pesanan`,`tgl_wisata`,`nama_pemesan`,`no_hp_pemesan`,`jml_dewasa`,`jml_balita`,`total_bayar`,`status_pesan`,`status_bayar`) values 
(4,'1616743501',5,1,'2021-03-26 14:25:01','2021-04-01 12:00:00','ahmad','082243116754',10,2,2695000,'booking','dp');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('admin','wisatawan') DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id_user`,`username`,`password`,`role`,`is_active`) values 
(1,'wisatawan','$2y$10$9l39QPqKLlbWBrvkODPO7uKFSMKuwQI4Ho63R0WjmPlxwQ90XIFNy','wisatawan',1),
(2,'hamid','$2y$10$Aa6bzW7SGGFTCCs3m6/TO.zEW6mwtCWFN9aUmu3p5UAq1kVJ4ovga','wisatawan',1),
(3,'admin','$2y$10$38FkPC/fn4YBJKnnxLddC.j8eBMTKqT9T3FsAmB0fop4rgoYZn88O','admin',1);

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
(2,2,'sofyan gibran','Jl. Raya Janti Karang Jambe No. 143  Yogyakarta, Indonesia','L','081266301224');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
