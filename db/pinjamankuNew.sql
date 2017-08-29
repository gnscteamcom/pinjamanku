-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.34 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table pinjamanku.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jns_kel` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('Admin','Operator','Author') NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table pinjamanku.agunan
CREATE TABLE IF NOT EXISTS `agunan` (
  `id_agunan` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_agunan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table pinjamanku.anggota
CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `nm_depan` varchar(50) NOT NULL,
  `nm_blkg` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `no_telp_lain` varchar(50) NOT NULL,
  `provinsi` enum('Aceh','Bali','Banten','Bengkulu','DI Yogyakarta','DKI Jakarta','Gorontalo','Jambi','Jawa Barat','Jawa Tengah','Jawa Timur','Kalimantan Barat','Kalimantan Selatan','Kalimantan Selatan','Kalimantan Timur','Kalimantan Utara','Kepulauan Bangka Belitung','Kepulauan Riau','Lampung','Maluku','Maluku Utara','Nusa Tenggara Barat','Nusa Tenggara Timur','Papua','Papua Barat','Riau','Sulawesi Barat','Sulawesi Selatan','Sulawesi Tengah','Sulawesi Tenggara','Sulawesi Utara','Sumatera Barat','Sumatera Selatan','Sumatera Utara') NOT NULL,
  `kota` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jns_kel` enum('Laki-laki','Perempuan') NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table pinjamanku.artikel
CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(225) NOT NULL,
  `isi` text NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_artikel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table pinjamanku.pesan
CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `isi_pesan` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table pinjamanku.pinjaman
CREATE TABLE IF NOT EXISTS `pinjaman` (
  `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_agt` int(11) NOT NULL,
  `jml_pinjaman` varchar(50) NOT NULL,
  `angsuran` double DEFAULT NULL,
  `agunan` varchar(50) NOT NULL,
  `tenor` enum('6','12','24','36','48','60','72','84') NOT NULL,
  `tipe_pek` enum('Pegawai Swasta','Wiraswasta','Profesional','Ibu Rumah Tangga','Pegawai Negeri Sipil','TNI atau POLRI') NOT NULL,
  `thn_bek` varchar(10) NOT NULL,
  `stts_pek` enum('Paruh Waktu','Kontrak','Tetap/Permanen','Lain-lain') NOT NULL,
  `penghasilan` varchar(20) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '3',
  PRIMARY KEY (`id_pinjaman`),
  KEY `FK_pinjaman_anggota` (`id_agt`),
  CONSTRAINT `FK_pinjaman_anggota` FOREIGN KEY (`id_agt`) REFERENCES `anggota` (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table pinjamanku.reff_status
CREATE TABLE IF NOT EXISTS `reff_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table pinjamanku.trans_pinjaman
CREATE TABLE IF NOT EXISTS `trans_pinjaman` (
  `id_trans` int(11) NOT NULL AUTO_INCREMENT,
  `id_pinjaman` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `tenor_ke` varchar(50) DEFAULT NULL,
  `denda` double DEFAULT NULL,
  PRIMARY KEY (`id_trans`),
  KEY `FK_trans_pinjaman_pinjaman` (`id_pinjaman`),
  CONSTRAINT `FK_trans_pinjaman_pinjaman` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_agt`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
