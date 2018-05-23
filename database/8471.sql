-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 03:56 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `8471`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `ID_CABANG` int(11) NOT NULL,
  `CABANG` varchar(15) DEFAULT NULL,
  `ALAMAT_CABANG` varchar(200) DEFAULT NULL,
  `TELEPON_CABANG` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`ID_CABANG`, `CABANG`, `ALAMAT_CABANG`, `TELEPON_CABANG`) VALUES
(1, 'Yogyakarta', 'Jl. Malioboro', '0274 4709009'),
(2, 'Bandung', 'Jl.Merdeka12', '0439 4029402'),
(3, 'surabaya', 'jln surabaya', '083218833');

-- --------------------------------------------------------

--
-- Table structure for table `detail_fasilitas`
--

CREATE TABLE `detail_fasilitas` (
  `ID_DETAIL_FASILITAS` int(11) NOT NULL,
  `ID_JENIS_KAMAR` int(11) NOT NULL,
  `ID_FASILITAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_fasilitas`
--

INSERT INTO `detail_fasilitas` (`ID_DETAIL_FASILITAS`, `ID_JENIS_KAMAR`, `ID_FASILITAS`) VALUES
(1, 1, 10),
(2, 1, 11),
(3, 1, 12),
(4, 1, 13),
(5, 1, 14),
(6, 1, 15),
(7, 1, 16),
(8, 1, 17),
(9, 1, 18),
(10, 1, 19),
(11, 1, 20),
(12, 1, 21),
(13, 1, 22),
(14, 1, 23),
(15, 1, 24),
(16, 1, 25),
(17, 1, 26),
(18, 2, 10),
(19, 2, 11),
(20, 2, 12),
(21, 2, 13),
(22, 2, 14),
(23, 2, 15),
(24, 2, 16),
(25, 2, 17),
(26, 2, 18),
(27, 2, 19),
(28, 2, 20),
(29, 2, 21),
(30, 2, 22),
(31, 2, 23),
(32, 2, 24),
(33, 2, 25),
(34, 2, 26),
(35, 3, 10),
(36, 3, 11),
(37, 3, 12),
(38, 3, 13),
(39, 3, 14),
(40, 3, 15),
(41, 3, 16),
(42, 3, 17),
(43, 3, 18),
(44, 3, 19),
(45, 3, 20),
(46, 3, 21),
(47, 3, 22),
(48, 3, 23),
(49, 3, 24),
(50, 3, 25),
(51, 3, 26);

-- --------------------------------------------------------

--
-- Table structure for table `detail_reservasi`
--

CREATE TABLE `detail_reservasi` (
  `ID_DETAIL_RES` int(11) NOT NULL,
  `ID_JENIS_KAMAR` int(11) NOT NULL,
  `ID_RESERVASI` int(11) NOT NULL,
  `JUMLAH_TEMPAT_TIDUR` int(11) DEFAULT NULL,
  `JUMLAH_KAMAR` int(11) DEFAULT NULL,
  `SUBTOTAL` double DEFAULT NULL,
  `STATUS_RESERVASI` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_reservasi`
--

INSERT INTO `detail_reservasi` (`ID_DETAIL_RES`, `ID_JENIS_KAMAR`, `ID_RESERVASI`, `JUMLAH_TEMPAT_TIDUR`, `JUMLAH_KAMAR`, `SUBTOTAL`, `STATUS_RESERVASI`) VALUES
(29, 1, 126, 1, 20, 24000000, NULL),
(31, 3, 127, 1, 20, 11000000, NULL),
(32, 3, 128, 1, 1, 600000, NULL),
(33, 4, 129, 1, 1, 1500000, NULL),
(34, 1, 130, 1, 20, 300000, NULL),
(35, 1, 131, 2, 20, 16000000, ''),
(36, 2, 132, 2, 7, 7700000, '');

-- --------------------------------------------------------

--
-- Table structure for table `display_pict`
--

CREATE TABLE `display_pict` (
  `ID_DISPLAY_PICT` int(11) NOT NULL,
  `DISPLAY_PICT` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `display_pict`
--

INSERT INTO `display_pict` (`ID_DISPLAY_PICT`, `DISPLAY_PICT`) VALUES
(1, 'pict1'),
(2, 'pict2');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `ID_FASILITAS` int(11) NOT NULL,
  `NAMA_FASILITAS` varchar(30) DEFAULT NULL,
  `JLH_TERSEDIA_FAS` int(11) DEFAULT NULL,
  `HARGA_FASILITAS` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`ID_FASILITAS`, `NAMA_FASILITAS`, `JLH_TERSEDIA_FAS`, `HARGA_FASILITAS`) VALUES
(3, 'Laundry Fast Service', 500, 250008),
(4, 'Massage', 100, 75000),
(6, 'Tambahan Breakfast', 500, 50000),
(7, 'Lunch Package', 500, 100000),
(8, 'Dinner Package', 500, 100000),
(9, 'Meeting Room FullDay', 3, 200000),
(10, 'AC', NULL, NULL),
(11, 'Air minum kemasan gratis', NULL, NULL),
(12, 'Brankas dalam kamar (Laptop)', NULL, NULL),
(13, 'Fasilitas pembuat kopi/teh', NULL, NULL),
(14, 'Jubah mandi', NULL, NULL),
(15, 'Layanan kamar 24 jam', NULL, NULL),
(16, 'Meja tulis', NULL, NULL),
(17, 'Pembersihan kamar mandi', NULL, NULL),
(18, 'Pengering rambut', NULL, NULL),
(19, 'Peralatan mandi gratis', NULL, NULL),
(20, 'Sandal', NULL, NULL),
(21, 'Telepon', NULL, NULL),
(22, 'Tempat tidur premium', NULL, NULL),
(23, 'Tirai kedap cahaya', NULL, NULL),
(24, 'TV kabel', NULL, NULL),
(25, 'TV LCD', NULL, NULL),
(26, 'WiFi Gratis', NULL, NULL),
(890, 'imama', 20, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kamar`
--

CREATE TABLE `jenis_kamar` (
  `ID_JENIS_KAMAR` int(11) NOT NULL,
  `JENIS_KAMAR` varchar(20) DEFAULT NULL,
  `KODE_JENIS_KAMAR` varchar(2) DEFAULT NULL,
  `KAPASITAS` int(11) DEFAULT NULL,
  `DESKRIPSI_JKAMAR` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kamar`
--

INSERT INTO `jenis_kamar` (`ID_JENIS_KAMAR`, `JENIS_KAMAR`, `KODE_JENIS_KAMAR`, `KAPASITAS`, `DESKRIPSI_JKAMAR`) VALUES
(1, 'Superior', 'SP', 2, '22 Meter Persegi\r\nInternet              - WiFi Gratis\r\nHiburan               - Televisi LCD dengan channel TV premium channels\r\nMakan Minum   - Pembuat kopi/teh, minibar, layanan 24 jam, air minum kemasan gratis, termasuk sarapan\r\nUntuk tidur         - Seprai kualitas premium dan gorden.tirai kedap cahaya\r\nKamar Mandi    - Kamar mandi pribadi dengan shower, jubah mandi dan sandal\r\nKemudahan      - Brankas (muat laptop), meja tulis, dan telepon; tempat tidur lipat / tambahan tersedia berdasarkan permintaan\r\nKenyamanan    - AC dan layanan pembenahan kamar harian\r\nMerokok / Dilarang merokok'),
(2, 'Executive Deluxe', 'ED', 2, 'Kamar berukuran 36 meter persegi, menampilkan pemandangan kota\r\nInternet              - WiFi Gratis\r\nHiburan               - Televisi LCD dengan channel TV premium channels\r\nMakan Minum   - Pembuat kopi/teh, minibar, layanan 24 jam, air minum kemasan gratis, termasuk sarapan\r\nUntuk tidur         - Seprai kualitas premium dan gorden.tirai kedap cahaya\r\nKamar Mandi    - Kamar mandi pribadi dengan shower, jubah mandi dan sandal\r\nKemudahan      - Brankas (muat laptop), meja tulis, dan telepon; tempat tidur lipat / tambahan tersedia berdasarkan permintaan\r\nKenyamanan    - AC dan layanan pembenahan kamar harian\r\nMerokok / Dilarang merokok'),
(3, 'Double Deluxee', 'DD', 2, '24 Meter PersegiInternet              - WiFi GratisHiburan               - Televisi LCD dengan channel TV premium channelsMakan Minum   - Pembuat kopi/teh, minibar, layanan 24 jam, air minum kemasan gratis, termasuk sarapanUntuk tidur         - Seprai kualitas premium dan gorden.tirai kedap cahayaKamar Mandi    - Kamar mandi pribadi dengan shower, jubah mandi dan sandalKemudahan      - Brankas (muat laptop), meja tulis, dan telepon; tempat tidur lipat / tambahan tersedia berdasarkan permintaanKenyamanan    - AC dan layanan pembenahan kamar harianMerokok / Dilarang merokok'),
(4, 'Junior Suite', 'JS', 2, 'Kamar berukuran 46 meter persegi, menampilkan pemandangan kota\r\nInternet              - WiFi Gratis\r\nHiburan               - Televisi LCD dengan channel TV premium channels\r\nMakan Minum   - Pembuat kopi/teh, minibar, layanan 24 jam, air minum kemasan gratis, termasuk sarapan\r\nUntuk tidur         - Seprai kualitas premium dan gorden.tirai kedap cahaya\r\nKamar Mandi    - Kamar mandi pribadi dengan shower, jubah mandi dan sandal\r\nKemudahan      - Brankas (muat laptop), meja tulis, dan telepon; tempat tidur lipat / tambahan tersedia berdasarkan permintaan\r\nKenyamanan    - AC dan layanan pembenahan kamar harian\r\nMerokok / Dilarang merokok'),
(5, 'jjj', '88', 2, 'ghggg'),
(12, 'qwq', 'wq', 2, 'asas');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tamu`
--

CREATE TABLE `jenis_tamu` (
  `ID_JENIS_TAMU` int(11) NOT NULL,
  `JENIS_TAMU` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_tamu`
--

INSERT INTO `jenis_tamu` (`ID_JENIS_TAMU`, `JENIS_TAMU`) VALUES
(1, 'Personal'),
(2, 'Grup');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `ID_KAMAR` int(11) NOT NULL,
  `ID_JENIS_KAMAR` int(11) NOT NULL,
  `ID_TEMPAT_TIDUR` int(11) NOT NULL,
  `ID_CABANG` int(11) NOT NULL,
  `NO_KAMAR` varchar(6) DEFAULT NULL,
  `LANTAI` int(11) DEFAULT NULL,
  `BEBAS_ROKOK` varchar(5) DEFAULT NULL,
  `STATUS_KAMAR` varchar(20) DEFAULT NULL,
  `TGL_MASUK` date DEFAULT NULL,
  `TGL_KELUAR` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`ID_KAMAR`, `ID_JENIS_KAMAR`, `ID_TEMPAT_TIDUR`, `ID_CABANG`, `NO_KAMAR`, `LANTAI`, `BEBAS_ROKOK`, `STATUS_KAMAR`, `TGL_MASUK`, `TGL_KELUAR`) VALUES
(24, 4, 3, 1, '1001JS', 1, 'Ya', 'Available', NULL, NULL),
(25, 4, 3, 1, '1002JS', 1, 'Tidak', 'Available', NULL, NULL),
(26, 2, 3, 1, '1003ED', 1, 'Ya', 'Available', NULL, NULL),
(27, 2, 3, 1, '1004ED', 1, 'Ya', 'Available', NULL, NULL),
(28, 2, 3, 1, '1005ED', 1, 'Ya', 'Available', NULL, NULL),
(29, 2, 3, 1, '1006ED', 1, 'Tidak', 'Available', NULL, NULL),
(30, 2, 3, 1, '1007ED', 1, 'Tidak', 'Available', NULL, NULL),
(31, 3, 1, 1, '1008DD', 1, 'Ya', 'Available', NULL, NULL),
(32, 3, 1, 1, '1009DD', 1, 'Ya', 'Available', NULL, NULL),
(33, 3, 2, 1, '1010DD', 1, 'Ya', 'Available', NULL, NULL),
(34, 3, 2, 1, '1011DD', 1, 'Tidak', 'Available', NULL, NULL),
(35, 3, 2, 1, '1012DD', 1, 'Tidak', 'Available', NULL, NULL),
(38, 1, 1, 1, '1015SP', 1, 'Ya', 'Available', NULL, NULL),
(39, 1, 1, 1, '1016SP', 1, 'Tidak', 'Available', NULL, NULL),
(40, 1, 1, 1, '1017SP', 1, 'Ya', 'Available', NULL, NULL),
(41, 1, 2, 1, '1018SP', 1, 'Ya', 'Available', NULL, NULL),
(42, 1, 2, 1, '1019SP', 1, 'Ya', 'Available', NULL, NULL),
(43, 1, 2, 1, '1020SP', 1, 'Ya', 'Available', NULL, NULL),
(44, 1, 2, 1, '1021SP', 1, 'Ya', 'Available', NULL, NULL),
(45, 1, 2, 1, '1022SP', 1, 'Tidak', 'Available', NULL, NULL),
(46, 1, 1, 1, '1023SP', 1, 'Ya', 'Available', NULL, NULL),
(47, 1, 1, 1, '1024SP', 1, 'Ya', 'Available', NULL, NULL),
(48, 1, 2, 1, '1025SP', 1, 'Ya', 'Available', NULL, NULL),
(49, 4, 3, 1, '2001JS', 2, 'Ya', 'Available', NULL, NULL),
(50, 4, 3, 1, '2002JS', 2, 'Tidak', 'Available', NULL, NULL),
(54, 2, 3, 1, '2003ED', 2, 'Ya', 'Available', NULL, NULL),
(55, 2, 3, 1, '2004ED', 2, 'Ya', 'Available', NULL, NULL),
(56, 2, 3, 1, '2005ED', 2, 'Ya', 'Available', NULL, NULL),
(57, 2, 3, 1, '2006ED', 2, 'Tidak', 'Available', NULL, NULL),
(58, 2, 3, 1, '2007ED', 2, 'Tidak', 'Available', NULL, NULL),
(60, 1, 2, 1, '666', 3, 'yy', 'ry', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `ID_PEGAWAI` int(11) NOT NULL,
  `ID_ROLE` int(11) NOT NULL,
  `ID_CABANG` int(11) NOT NULL,
  `NAMA_PEGAWAI` varchar(50) DEFAULT NULL,
  `EMAIL_PEGAWAI` varchar(100) DEFAULT NULL,
  `USERNAME_PEG` varchar(20) DEFAULT NULL,
  `PASSWORD_PEG` varchar(15) DEFAULT NULL,
  `ID_DISPLAY_PICT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`ID_PEGAWAI`, `ID_ROLE`, `ID_CABANG`, `NAMA_PEGAWAI`, `EMAIL_PEGAWAI`, `USERNAME_PEG`, `PASSWORD_PEG`, `ID_DISPLAY_PICT`) VALUES
(1, 1, 1, 'Hendy ', 'hendy@gmail.com', 'OWNER001', 'OWNER001', NULL),
(2, 2, 1, 'Imam', 'imam@gmail.com', 'GMANAJER001', 'GMANAJER001', NULL),
(3, 3, 1, 'Grelly', 'grellylondo@gmail.com', 'ADMIN01', 'ADMIN01', NULL),
(4, 4, 1, 'Egik', 'egik@gmail.com', 'SALESMAR01', 'SALESMAR01', NULL),
(5, 5, 1, 'Komang', 'komang@gmail.com', 'FRONTOFF01', 'FRONTOFF01', NULL),
(11, 1, 1, 'budii', 'budi@gmail.comm', 'budi', '1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID_PELANGGAN` int(11) NOT NULL,
  `NAMA_PELANGGAN` varchar(50) DEFAULT NULL,
  `NO_IDENTITAS` varchar(20) DEFAULT NULL,
  `NAMA_INSTITUSI` varchar(30) DEFAULT NULL,
  `NO_TELEPON` varchar(12) DEFAULT NULL,
  `ALAMAT_PELANGGAN` varchar(200) DEFAULT NULL,
  `EMAIL_PELANGGAN` varchar(100) DEFAULT NULL,
  `STATUS_PELANGGAN` varchar(20) DEFAULT NULL,
  `USERNAME_PEL` varchar(20) DEFAULT NULL,
  `PASSWORD_PEL` varchar(20) DEFAULT NULL,
  `ID_DISPLAY_PICT` int(11) DEFAULT NULL,
  `TGL_RESERVASI_PERTAMA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`ID_PELANGGAN`, `NAMA_PELANGGAN`, `NO_IDENTITAS`, `NAMA_INSTITUSI`, `NO_TELEPON`, `ALAMAT_PELANGGAN`, `EMAIL_PELANGGAN`, `STATUS_PELANGGAN`, `USERNAME_PEL`, `PASSWORD_PEL`, `ID_DISPLAY_PICT`, `TGL_RESERVASI_PERTAMA`) VALUES
(20, 'budi', '09880', 'uajy', '0988800', 'jjk,llll', 'imambudi808@gmail.com', 'aktive', 'budiuu', 'budi', 1, '2018-05-01'),
(80, 'Agitha Pramesti', '150708418', 'Bli Bli', '0849019281', 'Jalan Wates', 'agitha@gmail.com', NULL, NULL, NULL, NULL, '2017-01-01'),
(81, 'Nandia Rani', '150708395', 'Atma', '08493029039', 'Wonosobo', 'nandiarani@gmail.com', NULL, NULL, NULL, NULL, '2017-02-08'),
(82, 'Dea Zevihadeta', '150708421', 'Atma', '08202302103', 'Sukabumi', 'deaz@gmail.com', NULL, NULL, NULL, NULL, '2017-03-19'),
(84, 'Fara Belinda', '150708419', 'Atma', '08092020930', 'Klaten', 'fara@gmail.com', '', '', '', 2, '2018-05-20'),
(85, 'Verry', '1128491829', 'Atma Jaya', '01283071283', 'Tambak Bayan', 'verry@gmail.com', '', '', '', 2, '2018-05-20'),
(86, 'm imam budi la', '098309391', 'uajy', '9809380', 'indonesia', 'imam@gmail.com', 'aktive', 'imam', 'imam', NULL, NULL),
(87, 'budi laksamanana', '099388', 'uajy', '98030830', 'lobar', 'imam@gmail.com', 'aktive', 'momi', 'momi', NULL, NULL),
(88, 'laksamana', '09839090', 'uajy', '098390938', 'lobar', 'imam@gmail.com', 'aktive', 'laksamamana', 'laksamana', NULL, NULL),
(89, 'monday', '89787842498', 'daylight', '082121345', 'Babarsari raya', 'monday@day.com', '', 'monday', 'monday', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_PEMBAYARAN` int(11) NOT NULL,
  `ID_RESERVASI` int(11) NOT NULL,
  `ID_PEGAWAI` int(11) DEFAULT NULL,
  `NOMOR_NOTA` varchar(11) DEFAULT NULL,
  `TGL_PEMBAYARAN` date DEFAULT NULL,
  `TOTAL_AWAL` double DEFAULT NULL,
  `PAJAK` double DEFAULT NULL,
  `TOTAL_AKHIR` double DEFAULT NULL,
  `DEPOSIT` double DEFAULT NULL,
  `NAMA_PEMILIKI_KARTU` varchar(50) DEFAULT NULL,
  `NOMOR_KARTU` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_fasilitas`
--

CREATE TABLE `pemesanan_fasilitas` (
  `ID_PEMESANAN_FASILITAS` int(11) NOT NULL,
  `ID_PEMBAYARAN` int(11) DEFAULT NULL,
  `ID_FASILITAS` int(11) DEFAULT NULL,
  `JLH_PEMESANAN` int(11) DEFAULT NULL,
  `TGL_PEMAKAIAN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_khusus`
--

CREATE TABLE `permintaan_khusus` (
  `ID_PERMINTAAN` int(11) NOT NULL,
  `ID_RESERVASI` int(11) DEFAULT NULL,
  `PERMINTAAN` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan_khusus`
--

INSERT INTO `permintaan_khusus` (`ID_PERMINTAAN`, `ID_RESERVASI`, `PERMINTAAN`) VALUES
(2, 126, 'non smoking');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `ID_RESERVASI` int(11) NOT NULL,
  `ID_PEGAWAI` int(11) DEFAULT NULL,
  `ID_CABANG` int(11) NOT NULL,
  `ID_JENIS_TAMU` int(11) NOT NULL,
  `ID_PELANGGAN` int(11) DEFAULT NULL,
  `NOMOR_RESERVASI` varchar(11) DEFAULT NULL,
  `TGL_RESERVASI` date DEFAULT NULL,
  `TGL_CHECKIN` date DEFAULT NULL,
  `TGL_CHECKOUT` date DEFAULT NULL,
  `TOTAL_DEWASA` int(11) DEFAULT NULL,
  `TOTAL_ANAK` int(11) DEFAULT NULL,
  `TOTAL` double DEFAULT NULL,
  `JAMINAN` double DEFAULT NULL,
  `PIC` varchar(50) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`ID_RESERVASI`, `ID_PEGAWAI`, `ID_CABANG`, `ID_JENIS_TAMU`, `ID_PELANGGAN`, `NOMOR_RESERVASI`, `TGL_RESERVASI`, `TGL_CHECKIN`, `TGL_CHECKOUT`, `TOTAL_DEWASA`, `TOTAL_ANAK`, `TOTAL`, `JAMINAN`, `PIC`, `STATUS`) VALUES
(126, 4, 1, 2, 80, 'G010117-126', '2017-01-01', '2017-01-04', '2017-01-07', 30, 0, 40500000, 20250000, 'Brandon', 'Reserved'),
(127, 4, 1, 2, 80, 'G080217-127', '2017-02-08', '2017-02-10', '2017-02-11', 20, 0, 11000000, 5500000, 'Brandon', 'Check Out'),
(128, NULL, 1, 1, 81, 'P080217-128', '2017-02-08', '2017-02-11', '2017-02-12', 1, 0, 600000, 300000, '', 'Check Out'),
(129, NULL, 2, 1, 82, 'P190317-129', '2017-03-19', '2017-03-21', '2017-03-23', 1, 0, 1500000, 750000, NULL, 'Check Out'),
(130, 4, 1, 2, 82, 'G200518-130', '2018-05-02', '2018-05-03', '2018-05-04', 25, 0, 500000, 250000, 'Tes', 'Batal'),
(131, 4, 1, 2, 84, 'G200518-131', '2018-05-20', '2018-05-22', '2018-05-24', 20, 0, 16000000, 8000000, 'Brandon', 'Reserved'),
(132, 4, 1, 2, 85, 'G200518-132', '2018-05-20', '2018-05-21', '2018-05-23', 20, 5, 7700000, 3850000, 'Hendy', 'Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ID_ROLE` int(11) NOT NULL,
  `ROLE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ID_ROLE`, `ROLE`) VALUES
(1, 'Owner'),
(2, 'General Manager'),
(3, 'Admin'),
(4, 'Sales Marketing'),
(5, 'Front Office');

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `ID_SEASON` int(11) NOT NULL,
  `SEASON` varchar(11) DEFAULT NULL,
  `TGL_MULAI` date DEFAULT NULL,
  `TGL_SELESAI` date DEFAULT NULL,
  `DESKRIPSI_SEASON` varchar(255) DEFAULT NULL,
  `STATUS_SEASON` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`ID_SEASON`, `SEASON`, `TGL_MULAI`, `TGL_SELESAI`, `DESKRIPSI_SEASON`, `STATUS_SEASON`) VALUES
(1, 'Normal', '0000-00-00', '0000-00-00', 'Harga Normal', 'Aktif'),
(9, 'Promo', '2018-12-01', '2019-01-05', 'Diskon 10%', 'Tidak Aktif'),
(10, 'High Season', '0000-00-00', '0000-00-00', 'Harga Naik 10 %e', 'Tidak Aktif'),
(14, 'defaulth', '2018-05-29', '2018-05-29', 'ddd', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `ID_TARIF` int(11) NOT NULL,
  `ID_JENIS_KAMAR` int(11) NOT NULL,
  `ID_SEASON` int(11) NOT NULL,
  `TARIF` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`ID_TARIF`, `ID_JENIS_KAMAR`, `ID_SEASON`, `TARIF`) VALUES
(6, 1, 1, 400000),
(7, 2, 1, 550000),
(8, 3, 1, 600000),
(9, 4, 1, 750000),
(10, 1, 9, 360000),
(11, 2, 9, 495000),
(12, 3, 9, 540000),
(13, 4, 9, 675000),
(14, 1, 10, 440000),
(15, 2, 10, 605000),
(16, 1, 1, 660000),
(18, 1, 1, 222),
(19, 1, 1, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `tempat_tidur`
--

CREATE TABLE `tempat_tidur` (
  `ID_TEMPAT_TIDUR` int(11) NOT NULL,
  `JENIS_TEMPAT_TIDUR` varchar(10) DEFAULT NULL,
  `JLH_TERSEDIA_TMPTDR` int(11) DEFAULT NULL,
  `HARGA_TEMPAT_TIDUR` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempat_tidur`
--

INSERT INTO `tempat_tidur` (`ID_TEMPAT_TIDUR`, `JENIS_TEMPAT_TIDUR`, `JLH_TERSEDIA_TMPTDR`, `HARGA_TEMPAT_TIDUR`) VALUES
(1, 'Double', 50, NULL),
(2, 'Twin', 50, NULL),
(3, 'King', 50, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`ID_CABANG`);

--
-- Indexes for table `detail_fasilitas`
--
ALTER TABLE `detail_fasilitas`
  ADD PRIMARY KEY (`ID_DETAIL_FASILITAS`),
  ADD KEY `FK_MEMPUNYAI_DETFAS` (`ID_JENIS_KAMAR`),
  ADD KEY `FK_MEMPUNYAI_DETFAS2` (`ID_FASILITAS`);

--
-- Indexes for table `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  ADD PRIMARY KEY (`ID_DETAIL_RES`),
  ADD KEY `FK_MEMPUNYAI_DETAIL` (`ID_RESERVASI`),
  ADD KEY `FK_MEMPUNYAI_DETRES` (`ID_JENIS_KAMAR`);

--
-- Indexes for table `display_pict`
--
ALTER TABLE `display_pict`
  ADD PRIMARY KEY (`ID_DISPLAY_PICT`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`ID_FASILITAS`);

--
-- Indexes for table `jenis_kamar`
--
ALTER TABLE `jenis_kamar`
  ADD PRIMARY KEY (`ID_JENIS_KAMAR`);

--
-- Indexes for table `jenis_tamu`
--
ALTER TABLE `jenis_tamu`
  ADD PRIMARY KEY (`ID_JENIS_TAMU`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`ID_KAMAR`),
  ADD KEY `FK_BERADA_DI` (`ID_TEMPAT_TIDUR`),
  ADD KEY `FK_MEMPUNYAI_KAMAR` (`ID_CABANG`),
  ADD KEY `FK_TERDIRI` (`ID_JENIS_KAMAR`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`ID_PEGAWAI`),
  ADD KEY `FK_MEMPEKERJAKAN` (`ID_CABANG`),
  ADD KEY `FK_RELATIONSHIP_21` (`ID_ROLE`),
  ADD KEY `FK_MEMPUNYAI_DP1` (`ID_DISPLAY_PICT`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_PELANGGAN`),
  ADD KEY `FK_MEMPUNYAI_DP` (`ID_DISPLAY_PICT`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_PEMBAYARAN`),
  ADD KEY `FK_MEMILIKI11` (`ID_RESERVASI`),
  ADD KEY `FK_MENANGANI2` (`ID_PEGAWAI`);

--
-- Indexes for table `pemesanan_fasilitas`
--
ALTER TABLE `pemesanan_fasilitas`
  ADD PRIMARY KEY (`ID_PEMESANAN_FASILITAS`),
  ADD KEY `FK_PEMESANAN_FAS` (`ID_FASILITAS`),
  ADD KEY `FK_PEMESANAN_PEM` (`ID_PEMBAYARAN`);

--
-- Indexes for table `permintaan_khusus`
--
ALTER TABLE `permintaan_khusus`
  ADD PRIMARY KEY (`ID_PERMINTAAN`),
  ADD KEY `FK_MEMPUNYAI_PERMINTAAN` (`ID_RESERVASI`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`ID_RESERVASI`),
  ADD KEY `FK_MELAKUKAN` (`ID_PELANGGAN`),
  ADD KEY `FK_MEMPUNYAI_JTRES` (`ID_JENIS_TAMU`),
  ADD KEY `FK_MEMPUNYAI_RESERVASICAB` (`ID_CABANG`),
  ADD KEY `FK_MENANGANI` (`ID_PEGAWAI`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`ID_SEASON`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`ID_TARIF`),
  ADD KEY `FK_MEMPUNYAI_TARIF2` (`ID_JENIS_KAMAR`),
  ADD KEY `FK_MEMPUNYAI_TRFSS` (`ID_SEASON`);

--
-- Indexes for table `tempat_tidur`
--
ALTER TABLE `tempat_tidur`
  ADD PRIMARY KEY (`ID_TEMPAT_TIDUR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `ID_CABANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_fasilitas`
--
ALTER TABLE `detail_fasilitas`
  MODIFY `ID_DETAIL_FASILITAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  MODIFY `ID_DETAIL_RES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `display_pict`
--
ALTER TABLE `display_pict`
  MODIFY `ID_DISPLAY_PICT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `ID_FASILITAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=891;

--
-- AUTO_INCREMENT for table `jenis_kamar`
--
ALTER TABLE `jenis_kamar`
  MODIFY `ID_JENIS_KAMAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jenis_tamu`
--
ALTER TABLE `jenis_tamu`
  MODIFY `ID_JENIS_TAMU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `ID_KAMAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `ID_PEGAWAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `ID_PELANGGAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `ID_PEMBAYARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesanan_fasilitas`
--
ALTER TABLE `pemesanan_fasilitas`
  MODIFY `ID_PEMESANAN_FASILITAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permintaan_khusus`
--
ALTER TABLE `permintaan_khusus`
  MODIFY `ID_PERMINTAAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `ID_RESERVASI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `ID_SEASON` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `ID_TARIF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tempat_tidur`
--
ALTER TABLE `tempat_tidur`
  MODIFY `ID_TEMPAT_TIDUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_fasilitas`
--
ALTER TABLE `detail_fasilitas`
  ADD CONSTRAINT `FK_MEMPUNYAI_DETFAS` FOREIGN KEY (`ID_JENIS_KAMAR`) REFERENCES `jenis_kamar` (`ID_JENIS_KAMAR`),
  ADD CONSTRAINT `FK_MEMPUNYAI_DETFAS2` FOREIGN KEY (`ID_FASILITAS`) REFERENCES `fasilitas` (`ID_FASILITAS`);

--
-- Constraints for table `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  ADD CONSTRAINT `FK_MEMPUNYAI_DETAIL` FOREIGN KEY (`ID_RESERVASI`) REFERENCES `reservasi` (`ID_RESERVASI`),
  ADD CONSTRAINT `FK_MEMPUNYAI_JKAMAR` FOREIGN KEY (`ID_JENIS_KAMAR`) REFERENCES `jenis_kamar` (`ID_JENIS_KAMAR`);

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `FK_BERADA_DI` FOREIGN KEY (`ID_TEMPAT_TIDUR`) REFERENCES `tempat_tidur` (`ID_TEMPAT_TIDUR`),
  ADD CONSTRAINT `FK_MEMPUNYAI_KAMAR` FOREIGN KEY (`ID_CABANG`) REFERENCES `cabang` (`ID_CABANG`),
  ADD CONSTRAINT `FK_TERDIRI` FOREIGN KEY (`ID_JENIS_KAMAR`) REFERENCES `jenis_kamar` (`ID_JENIS_KAMAR`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `FK_MEMPEKERJAKAN` FOREIGN KEY (`ID_CABANG`) REFERENCES `cabang` (`ID_CABANG`),
  ADD CONSTRAINT `FK_MEMPUNYAI_DP1` FOREIGN KEY (`ID_DISPLAY_PICT`) REFERENCES `display_pict` (`ID_DISPLAY_PICT`),
  ADD CONSTRAINT `FK_RELATIONSHIP_21` FOREIGN KEY (`ID_ROLE`) REFERENCES `role` (`ID_ROLE`);

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `FK_MEMPUNYAI_DP` FOREIGN KEY (`ID_DISPLAY_PICT`) REFERENCES `display_pict` (`ID_DISPLAY_PICT`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `FK_MEMILIKI11` FOREIGN KEY (`ID_RESERVASI`) REFERENCES `reservasi` (`ID_RESERVASI`),
  ADD CONSTRAINT `FK_MENANGANI2` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`);

--
-- Constraints for table `pemesanan_fasilitas`
--
ALTER TABLE `pemesanan_fasilitas`
  ADD CONSTRAINT `FK_PEMESANAN_FAS` FOREIGN KEY (`ID_FASILITAS`) REFERENCES `fasilitas` (`ID_FASILITAS`),
  ADD CONSTRAINT `FK_PEMESANAN_PEM` FOREIGN KEY (`ID_PEMBAYARAN`) REFERENCES `pembayaran` (`ID_PEMBAYARAN`);

--
-- Constraints for table `permintaan_khusus`
--
ALTER TABLE `permintaan_khusus`
  ADD CONSTRAINT `FK_MEMPUNYAI_PERMINTAAN` FOREIGN KEY (`ID_RESERVASI`) REFERENCES `reservasi` (`ID_RESERVASI`);

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_PELANGGAN`) REFERENCES `pelanggan` (`ID_PELANGGAN`),
  ADD CONSTRAINT `FK_MEMPUNYAI_JTRES` FOREIGN KEY (`ID_JENIS_TAMU`) REFERENCES `jenis_tamu` (`ID_JENIS_TAMU`),
  ADD CONSTRAINT `FK_MEMPUNYAI_RESERVASICAB` FOREIGN KEY (`ID_CABANG`) REFERENCES `cabang` (`ID_CABANG`),
  ADD CONSTRAINT `FK_MENANGANI` FOREIGN KEY (`ID_PEGAWAI`) REFERENCES `pegawai` (`ID_PEGAWAI`);

--
-- Constraints for table `tarif`
--
ALTER TABLE `tarif`
  ADD CONSTRAINT `FK_MEMPUNYAI_TARIF2` FOREIGN KEY (`ID_JENIS_KAMAR`) REFERENCES `jenis_kamar` (`ID_JENIS_KAMAR`),
  ADD CONSTRAINT `FK_MEMPUNYAI_TRFSS` FOREIGN KEY (`ID_SEASON`) REFERENCES `season` (`ID_SEASON`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
