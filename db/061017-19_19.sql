-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2017 at 02:18 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spa`
--

-- --------------------------------------------------------

--
-- Table structure for table `langganan`
--

CREATE TABLE `langganan` (
  `id` varchar(3) NOT NULL,
  `tipe_plg` varchar(30) NOT NULL,
  `permeter` bigint(5) NOT NULL,
  `lebih_permeter` bigint(6) NOT NULL,
  `abonemen` bigint(6) NOT NULL DEFAULT '2000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `langganan`
--

INSERT INTO `langganan` (`id`, `tipe_plg`, `permeter`, `lebih_permeter`, `abonemen`) VALUES
('lou', 'Loundy/Pencucian', 950, 1000, 2000),
('msj', 'Masjid/Musola', 250, 300, 2000),
('pbr', 'Pabrik', 1000, 1500, 5000),
('rum', 'Rumah', 500, 600, 2000),
('sek', 'Sekolah/Madrasah', 400, 500, 2000),
('swa', 'Toko Swalayan', 700, 800, 2500),
('tok', 'Toko', 600, 750, 2000),
('war', 'Warung', 650, 750, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_bayar` int(11) NOT NULL,
  `norek` varchar(6) NOT NULL,
  `bulan` date NOT NULL,
  `meter_lalu` int(4) NOT NULL,
  `meter_sekarang` int(4) NOT NULL,
  `meter_selisih` int(4) NOT NULL,
  `abonemen` int(6) NOT NULL DEFAULT '2000',
  `admin` int(6) NOT NULL,
  `terbilang` text NOT NULL,
  `operator` varchar(40) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `denda` bigint(6) NOT NULL,
  `jml_bayar` bigint(6) NOT NULL,
  `is_lunas` enum('1','0','','') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_bayar`, `norek`, `bulan`, `meter_lalu`, `meter_sekarang`, `meter_selisih`, `abonemen`, `admin`, `terbilang`, `operator`, `tgl_bayar`, `denda`, `jml_bayar`, `is_lunas`) VALUES
(1, '0001', '2017-10-02', 0, 5, 5, 2000, 500, ' sembilan ribu lima ratus ', 'kasir', '2017-10-03 10:32:55', 0, 9500, '1'),
(2, '0002', '2017-10-02', 0, 4, 4, 2000, 500, ' sembilan ribu lima ratus ', 'kasir', '2017-10-02 22:31:17', 0, 9500, '1'),
(3, '0003', '2017-10-02', 0, 10, 10, 2000, 500, ' dua puluh dua ribu ', 'kasir', '2017-10-02 22:33:33', 0, 22000, '1'),
(4, '0006', '2017-10-02', 0, 8, 8, 2000, 500, ' delapan belas ribu ', 'kasir', '2017-10-03 10:34:08', 0, 18000, '1'),
(5, '0007', '2017-10-02', 0, 10, 10, 2000, 500, ' dua puluh  ribu ', 'kasir', '2017-10-04 09:39:15', 0, 20000, '1'),
(6, '0008', '2017-10-02', 0, 10, 10, 2000, 500, ' dua puluh dua ribu ', 'kasir', '0000-00-00 00:00:00', 0, 22000, '0'),
(7, '0004', '2017-10-02', 0, 10, 10, 2000, 500, ' dua puluh dua ribu ', 'kasir', '0000-00-00 00:00:00', 0, 22000, '0'),
(8, '0001', '2017-11-02', 5, 10, 5, 2000, 500, ' tujuh ribu lima ratus ', 'kasir', '0000-00-00 00:00:00', 0, 7500, '0'),
(9, '0012', '2017-10-03', 0, 15, 15, 2000, 500, ' tiga puluh dua ribu ', 'kasir', '0000-00-00 00:00:00', 0, 32000, '0'),
(10, '0005', '2017-10-03', 0, 22, 22, 2000, 500, ' empat puluh enam ribu ', 'kasir', '2017-10-03 15:27:19', 0, 46000, '1'),
(11, '0009', '2017-10-03', 0, 32, 32, 2000, 500, ' enam puluh enam ribu ', 'kasir', '2017-10-03 15:38:47', 0, 66000, '1'),
(12, '0010', '2017-10-03', 5, 10, 5, 2000, 500, ' tujuh ribu lima ratus ', 'kasir', '2017-10-03 15:40:19', 0, 7500, '1'),
(13, '0015', '2017-10-03', 0, 25, 25, 2000, 500, ' lima puluh dua ribu ', 'kasir', '2017-10-03 15:41:35', 0, 52000, '1'),
(14, '0020', '2017-10-04', 0, 4, 4, 2000, 500, ' sembilan ribu lima ratus ', 'kasir', '0000-00-00 00:00:00', 0, 9500, '0'),
(15, '0021', '2017-10-04', 0, 10, 10, 2000, 500, ' dua puluh dua ribu ', 'kasir', '0000-00-00 00:00:00', 0, 22000, '0'),
(16, '0022', '2017-10-04', 0, 15, 15, 2000, 500, ' tiga puluh dua ribu ', 'kasir', '0000-00-00 00:00:00', 0, 32000, '0'),
(17, '0023', '2017-10-04', 0, 25, 25, 2000, 500, ' empat puluh sembilan ribu lima ratus ', 'kasir', '0000-00-00 00:00:00', 0, 49500, '0'),
(18, '0024', '2017-10-04', 0, 30, 30, 2000, 500, ' empat puluh sembilan ribu lima ratus ', 'kasir', '0000-00-00 00:00:00', 0, 49500, '0'),
(19, '0030', '2017-10-04', 0, 5, 5, 2000, 500, ' sembilan ribu lima ratus ', 'kasir', '0000-00-00 00:00:00', 0, 9500, '0'),
(20, '0031', '2017-10-04', 0, 8, 8, 2000, 500, ' delapan belas ribu ', 'kasir', '0000-00-00 00:00:00', 0, 18000, '0'),
(21, '0032', '2017-10-04', 0, 15, 15, 2000, 500, ' empat puluh dua ribu ', 'kasir', '0000-00-00 00:00:00', 0, 42000, '0'),
(22, '0033', '2017-10-04', 0, 20, 20, 2000, 500, ' enam puluh dua ribu ', 'kasir', '0000-00-00 00:00:00', 0, 62000, '0'),
(23, '0034', '2017-10-04', 0, 25, 25, 2000, 500, ' tujuh puluh sembilan ribu lima ratus ', 'kasir', '0000-00-00 00:00:00', 0, 79500, '0'),
(24, '0040', '2017-10-04', 0, 5, 5, 2000, 500, ' sembilan ribu lima ratus ', 'kasir', '0000-00-00 00:00:00', 0, 9500, '0'),
(25, '0041', '2017-10-04', 0, 12, 12, 2000, 500, ' dua puluh enam ribu ', 'kasir', '0000-00-00 00:00:00', 0, 26000, '0'),
(26, '0042', '2017-10-04', 0, 19, 19, 2000, 500, ' empat puluh  ribu ', 'kasir', '0000-00-00 00:00:00', 0, 40000, '0'),
(27, '0043', '2017-10-04', 0, 25, 25, 2000, 500, ' tiga puluh empat ribu lima ratus ', 'kasir', '0000-00-00 00:00:00', 0, 34500, '0'),
(28, '0044', '2017-10-04', 0, 25, 25, 2000, 500, ' lima puluh sembilan ribu lima ratus ', 'kasir', '0000-00-00 00:00:00', 0, 59500, '0'),
(29, '0050', '2017-10-04', 0, 5, 5, 2000, 500, ' sembilan ribu lima ratus ', 'kasir', '0000-00-00 00:00:00', 0, 9500, '0'),
(30, '0051', '2017-10-04', 0, 10, 10, 2000, 500, ' dua puluh dua ribu ', 'kasir', '0000-00-00 00:00:00', 0, 22000, '0'),
(31, '0052', '2017-10-04', 0, 15, 15, 2000, 500, ' tiga puluh empat ribu lima ratus ', 'kasir', '0000-00-00 00:00:00', 0, 34500, '0'),
(32, '0053', '2017-10-04', 0, 19, 19, 2000, 500, ' empat puluh sembilan ribu ', 'kasir', '0000-00-00 00:00:00', 0, 49000, '0'),
(33, '0054', '2017-10-04', 0, 25, 25, 2000, 500, ' lima puluh sembilan ribu lima ratus ', 'kasir', '0000-00-00 00:00:00', 0, 59500, '0'),
(34, '0070', '2017-10-04', 0, 15, 15, 0, 0, ' ', 'kasir', '0000-00-00 00:00:00', 0, 0, '0'),
(35, '0071', '2017-10-04', 0, 15, 15, 0, 0, ' ', 'kasir', '0000-00-00 00:00:00', 0, 0, '0'),
(36, '0080', '2017-10-04', 0, 3, 3, 0, 0, ' ', 'kasir', '0000-00-00 00:00:00', 0, 0, '0'),
(37, '0057', '2017-10-04', 0, 19, 19, 2000, 500, ' empat puluh sembilan ribu ', 'kasir', '0000-00-00 00:00:00', 0, 49000, '0'),
(38, '0468', '2017-10-04', 0, 50, 50, 0, 0, ' ', 'kasir', '0000-00-00 00:00:00', 0, 0, '0'),
(40, '0183', '2017-10-04', 0, 5, 5, 0, 0, ' ', 'kasir', '2017-10-04 13:21:48', 0, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode` int(5) NOT NULL,
  `norek` varchar(30) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `tipe` varchar(15) NOT NULL,
  `aktif` varchar(1) NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode`, `norek`, `nama`, `alamat`, `telp`, `tipe`, `aktif`) VALUES
(1, '0001', 'H. TOHA', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 't'),
(2, '0002', 'MISBAH', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(3, '0003', 'HUSEN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(4, '0004', 'HUSEN 2', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(5, '0005', 'NURUL', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(6, '0006', 'NGATARI', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(7, '0007', 'SIONO', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(8, '0008', 'SALEK', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(9, '0009', ' LUTFI AJI', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(10, '0010', 'MUJIB', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(11, '0011', 'B. JUM', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(12, '0012', 'H. SOLEH', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(13, '0013', 'SUPA\'AT', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(14, '0014', 'MASLIHA', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(15, '0015', 'PONIRUN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(16, '0016', 'P. SLAMET', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(17, '0017', 'SULTONI', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(18, '0018', 'KHOIRUL', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(19, '0019', 'ARIFIN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(20, '0020', 'PUJI LESTARI', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(21, '0021', 'GUNAWAN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(22, '0022', 'WAGISAN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(23, '0023', 'MAS\'AT', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(24, '0024', 'HOSI\'IN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(25, '0025', 'SOLIHIN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(26, '0026', 'SUKUR', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(27, '0027', 'KOSIM', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(28, '0028', 'SLAMET/ASAMA', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(29, '0029', 'LISWANTO', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(30, '0030', 'RIZKI', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(31, '0031', 'KASAN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(32, '0032', 'MESDI', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(33, '0033', 'MUSOLLA', 'PAKEL RT. 01 RW. 03', 'null', 'msj', 'y'),
(34, '0034', 'SAIFUL', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(35, '0035', 'ANDIK', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(36, '0036', 'MUNIR', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(37, '0037', 'DINA', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(39, '0039', 'ANAS', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(40, '0040', 'SAKRI', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(41, '0041', 'YEKA', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(42, '0042', 'HUDDIN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(43, '0043', 'NURAWI', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(44, '0044', 'H. IHSAN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(45, '0045', 'ROHMAN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(46, '0046', 'ROHIM', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(47, '0047', 'LUKMAN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(48, '0048', 'HOLIL', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(49, '0049', 'ARPAT', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(50, '0050', 'SUNARITA', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(51, '0051', 'NGATIJO', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(52, '0052', 'MATSATUR', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(53, '0053', 'HAIRUL J.', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(54, '0054', 'PADIL', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(55, '0055', 'HAIRUDDIN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(56, '0056', 'SAMSUL', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(57, '0057', 'HARIONO', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(58, '0058', 'JUPRI', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(59, '0059', 'HODIR', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(60, '0060', 'SENIMAN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(61, '0061', 'PIAYA', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(62, '0062', 'SUGIANTO', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(63, '0063', 'MISKUN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(64, '0064', 'DULBAKAR', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(65, '0065', 'IPA', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(66, '0066', 'PONIRI DWI HARIANSAH', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(67, '0067', 'ALI', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(68, '0068', 'HOLIL B', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(69, '0069', 'UDIN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(70, '0070', 'SULHAN', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(71, '0071', 'LUTFI', 'PAKEL RT. 01 RW. 03', 'null', 'rum', 'y'),
(72, '0072', 'ALAMA', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(73, '0073', 'SULIANA', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(74, '0074', 'TUTIK', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(75, '0075', 'JAINUL', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(76, '0076', 'MASPUT', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(77, '0077', 'SUPA\'AT', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(78, '0078', 'SAHAKIM', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(79, '0079', 'SITI MAIMUNAH', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(80, '0080', 'ABD GOFUR', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(81, '0081', 'TAMI', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(82, '0082', 'MUNDIR', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(83, '0083', 'UNTUNG', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(84, '0084', 'ISMATUL LIDIA', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(85, '0085', 'H. USUP', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(86, '0086', 'MUSLIH', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(87, '0087', 'MAS;AT', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(88, '0088', 'JUMAWI', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(89, '0089', 'TOLIB', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(90, '0090', 'MISNATI', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(91, '0091', 'HOSI\'IN', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(92, '0092', 'JAENI', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(93, '0093', 'UDI', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(94, '0094', 'AHMAD', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(95, '0095', 'BUSARI', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(96, '0096', 'HASAN', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(97, '0097', 'TOLIB 2', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(98, '0098', 'H. SOLIHIN', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(99, '0099', 'SI\'IN', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(100, '0100', 'SIHAT', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(101, '0101', 'SAMSUL', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(102, '0102', 'SAMAK', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(103, '0103', 'DARSIN', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(104, '0104', 'GUNADI', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(105, '0105', 'SALIHA', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(106, '0106', 'GIONO', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(107, '0107', 'SOLEH', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(108, '0108', 'IBU SITI', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(109, '0109', 'P. JUPRI', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(110, '0110', 'SUKARDI', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(111, '0111', 'MBAK SUP', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(112, '0112', 'ROKIM', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(113, '0113', 'KUNARIADI', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(114, '0114', 'P. GINEM', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(115, '0115', 'MUSTOPA', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(116, '0116', 'NGARI', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(117, '0117', 'TOHA', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(118, '0118', 'P. SLAMET', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(119, '0119', 'RIYADI', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(120, '0120', 'PONESAN', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(121, '0121', 'BASORI', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(122, '0122', 'H. AMALUDDIN', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(123, '0123', 'HADIS', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(124, '0124', 'GIAN ', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(125, '0125', 'SRI BAWON', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(126, '0126', 'YANTO', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(127, '0127', 'MALIHA', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(128, '0128', 'ROHANI', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(129, '0129', 'HOLIM', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(130, '0130', 'BUSARI/SIN', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(131, '0131', 'ROHMAT', 'PAKEL RT. 02 RW. 03', 'null', 'rum', 'y'),
(132, '0132', 'ISMA\'IL', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(133, '0133', 'SABULLA', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(134, '0134', 'MAT SALIM', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(135, '0135', 'SA\'I', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(136, '0136', 'MURSIT', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(137, '0137', 'MILA', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(138, '0138', 'H. ANWAR', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(139, '0139', 'SARIPI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(140, '0140', 'SOLIK', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(141, '0141', 'BUKORI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(142, '0142', 'SUKAMTO', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(143, '0143', 'MUT C', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(144, '0144', 'SUCIPTO', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(145, '0145', 'MISKUN', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(146, '0146', 'TOLIS', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(147, '0147', 'PURNOMO', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(148, '0148', 'SENETI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(149, '0149', 'SULIKA', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(150, '0150', 'JUNI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(151, '0151', 'JUMAT', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(152, '0152', 'NURHASAN ', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(153, '0153', 'HERI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(154, '0154', 'HILILA', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(155, '0155', 'ABD SUKUR', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(156, '0156', 'ROYANI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(157, '0157', 'RUKAYYAH', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(158, '0158', 'ARIFIN', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(159, '0159', 'USUP', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(160, '0160', 'DULMANAP', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(161, '0161', 'SAMARI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(162, '0162', 'SAIDUN', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(163, '0163', 'MAT BASORI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(164, '0164', 'NURSALIM', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(165, '0165', 'SDN', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(166, '0166', 'RONI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(167, '0167', 'JALIL', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(168, '0168', 'MATASAN ', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(169, '0169', 'KARMINTEN', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(170, '0170', 'TOHA /SUMANI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(171, '0171', 'P HABIT', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(172, '0172', 'MUSRIFAH', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(173, '0173', 'PANDRI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(174, '0174', 'SADUKI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(175, '0175', 'JUASIM', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(176, '0176', 'HUSIN', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(177, '0177', 'HUSIN2', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(178, '0178', 'P. NI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(179, '0179', 'SIONO', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(180, '0180', 'MISLAN', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(181, '0181', 'JUMARI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(182, '0182', 'SAN/SITI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(183, '0183', 'MUSOLLA', 'PAKEL  RT. 03 RW. 03', 'null', 'msj', 'y'),
(184, '0184', 'PONAWI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(185, '0185', 'SAIHU', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(186, '0186', 'NASPA\'I', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(187, '0187', 'SUHAIMIN', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(188, '0188', 'MATASAN B', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(189, '0189', 'SAPARI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(190, '0190', 'MIMIN', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(191, '0191', 'SLAMET BC', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(192, '0192', 'BAIHAQI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(193, '0193', 'SATAR', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(194, '0194', 'JUMAWI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(195, '0195', 'SONIA', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(196, '0196', 'BUHARI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(197, '0197', 'RUMANI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(198, '0198', 'MAHMUD', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(199, '0199', 'ROMLI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(200, '0200', 'TOHA / SUTRAMI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(201, '0201', 'JAMI\'AN', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(202, '0202', 'TUTIK', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(203, '0203', 'TOKIM', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(204, '0204', 'SA\'I', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(205, '0205', 'SUJIATI', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(206, '0206', 'NURUL', 'PAKEL  RT. 03 RW. 03', 'null', 'rum', 'y'),
(207, '0207', 'HATNAWI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(208, '0208', 'HAMIM', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(209, '0209', 'SAIFUL', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(210, '0210', 'BUASAN', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(211, '0211', 'MISNADI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(212, '0212', 'SALIK', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(213, '0213', 'KURDI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(214, '0214', 'PAERI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(215, '0215', 'SADOR', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(216, '0216', 'MARKIMIN', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(217, '0217', 'TOMO', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(218, '0218', 'NASERI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(219, '0219', 'TOHA /HUSNI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(220, '0220', 'H. RASAT', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(221, '0221', 'HARTONO', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(222, '0222', 'SOLIHIN', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(223, '0223', 'H. SUKRON', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(224, '0224', 'JUMA\'IN', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(225, '0225', 'ASPALI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(226, '0226', 'MACO', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(227, '0227', 'SALE', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(228, '0228', 'TAUFIQ', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(229, '0229', 'SAPA\'ATUN', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(230, '0230', 'SAJI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(231, '0231', 'TOHA /IM', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(232, '0232', 'ISMA\'IL', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(233, '0233', 'SADERI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(234, '0234', 'MATALI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(235, '0235', 'MUJIB', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(236, '0236', 'DA\'I', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(237, '0237', 'H. MISDUQI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(238, '0238', 'ANAS/NURI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(239, '0239', 'HURI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(240, '0240', 'H. ADNAN', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(241, '0241', 'SAHAR', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(242, '0242', 'MANAF', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(243, '0243', 'P. LURA', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(244, '0244', 'BUHARI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(245, '0245', 'SENALI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(246, '0246', 'SENIMAN', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(247, '0247', 'SENERI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(248, '0248', 'SUGIMAN', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(249, '0249', 'PESING', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(250, '0250', 'AHMAD', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(251, '0251', 'SATRAWI', 'PAKEL  RT. 04 RW. 03', 'null', 'rum', 'y'),
(252, '0252', 'P. LURA ', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(253, '0253', 'SAHAKIM', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(254, '0254', 'SAIHON', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(255, '0255', 'P. DOL', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(256, '0256', 'SU\'UT', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(257, '0257', 'H . FATIMAH', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(258, '0258', 'SUKI', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(259, '0259', 'SATUWI', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(260, '0260', 'ALIFI', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(261, '0261', 'KOSIM', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(262, '0262', 'RO\'UP', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(263, '0263', 'HARTONO', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(264, '0264', 'TA\'IL', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(265, '0265', 'SAMAN', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(266, '0266', 'SADIK ', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(267, '0267', 'SAMENU', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(268, '0268', 'IMRON', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(269, '0269', 'MU\'AT', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(270, '0270', 'KURDI', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(271, '0271', 'JUMARTO', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(272, '0272', 'RIFA\'I', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(273, '0273', 'HENDRO', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(274, '0274', 'ATEM', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(275, '0275', 'ABD ROSID', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(276, '0276', 'HUSIN', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(277, '0277', 'SENIMAN', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(278, '0278', 'P. KASIA', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(279, '0279', 'ROMLI', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(280, '0280', 'TINGGAL', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(281, '0281', 'ULAYYA', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(282, '0282', 'HAMIDA', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(283, '0283', 'ILMIA', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(284, '0284', 'TIKAM', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(285, '0285', 'SUKADIR', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(286, '0286', 'SAIMO', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(287, '0287', 'SUDIN', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(288, '0288', 'BUAWI', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(289, '0289', 'MATAYIS', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(290, '0290', 'MIUSLIMIN', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(291, '0291', 'RIDWAN', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(292, '0292', 'SITI', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(293, '0293', 'LIANA', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(294, '0294', 'NURHADI', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(295, '0295', 'H. SOLLA', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(296, '0296', 'KIBTIAH', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(297, '0297', 'NASIHIN', 'PAKEL  RT. 05  RW. 03', 'null', 'rum', 'y'),
(298, '0298', 'NASERI/ WEMA', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(299, '0299', 'BUANA ', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(300, '0300', 'PONESAN', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(301, '0301', 'MARTINJUN', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(302, '0302', 'AMAT', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(303, '0303', 'TENGALI', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(304, '0304', 'SODIK', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(305, '0305', 'SUTI\'IN', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(306, '0306', 'NASERI', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(307, '0307', 'NASUWI', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(308, '0308', 'DRA\'IS', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(309, '0309', 'KUSEN', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(310, '0310', 'NADI', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(311, '0311', 'SLAMET ', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(312, '0312', 'BEK MUN', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(313, '0313', 'MARLUKAT', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(314, '0314', 'PONA\'IM', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(315, '0315', 'ROHMAN', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(316, '0316', 'SAIFULLOH', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(317, '0317', 'H. RIFA\'I', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(318, '0318', 'JONO', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(319, '0319', 'SANI', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(320, '0320', 'JUMA\'I', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(321, '0321', 'MUHDAR', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(322, '0322', 'JUNAIDAH', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(323, '0323', 'NGATENI', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(324, '0324', 'SAMALI', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(325, '0325', 'ROHMAT', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(326, '0326', 'GIAN', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(328, '0328', 'CANDRA', 'PAKEL  RT. 06  RW. 03', 'null', 'rum', 'y'),
(329, '0329', 'SUPA\'AT', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(330, '0330', 'MUSTAKIM', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(331, '0331', 'BUSARI', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(332, '0332', 'ISMA\'IL', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(333, '0333', 'B. ZENAL', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(334, '0334', 'ASKAL', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(335, '0335', 'MARKUAT', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(336, '0336', 'ILYAS', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(337, '0337', 'SUMARO', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(338, '0338', 'NUR AJAK', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(339, '0339', 'HUSNA', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(340, '0340', 'ABBAS', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(341, '0341', 'NGADISAN', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(342, '0342', 'JUPRI', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(343, '0343', 'ROHMAN C', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(344, '0344', 'WITO', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(345, '0345', 'PARKI', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(346, '0346', 'YAKULLA', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(347, '0347', 'SAPI\'I', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(348, '0348', 'GHUFRON', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(349, '0349', 'P. NANDANG', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(350, '0350', 'TAWI', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(351, '0351', 'SOLIHIN', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(352, '0352', 'UMAR', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(353, '0353', 'MAHSUS', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(354, '0354', 'EKSAN', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(355, '0355', 'SAIFUL', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(356, '0356', 'SANAJI', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(357, '0357', 'WATIA', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(358, '0358', 'HUDDIN', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(359, '0359', 'HUSAIRI', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(360, '0360', 'SUKAR', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(361, '0361', 'ROHMAN J', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(362, '0362', 'MATSARI', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(363, '0363', 'MUSTOFA', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(364, '0364', 'SA\'I', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(365, '0365', 'SOFI ULA', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(366, '0366', 'MBK DIAN', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(367, '0367', 'SODIK', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(368, '0368', 'ABDULLA', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(369, '0369', 'IMAM', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(370, '0370', 'M. ANNUR HUDA', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(371, '0371', 'YADI', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(372, '0372', 'MARYAM', 'PAKEL  RT. 07  RW. 03', 'null', 'rum', 'y'),
(373, '0373', 'H. PURNAMA', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(374, '0374', 'ALFI', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(375, '0375', 'ROS', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(376, '0376', '', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(377, '0377', 'BU TUKIRAN', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(378, '0378', 'BU SISKA', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(379, '0379', 'H. SOLE', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(380, '0380', 'MISTIN', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(381, '0381', 'ISMA', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(382, '0382', 'BU TOTOK', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(383, '0383', 'BILIR', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(384, '0384', 'H. SULAIMAN', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(385, '0385', 'MBK NIA', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(386, '0386', 'P. TRIS', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(387, '0387', 'NUR SAFA\'AT', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(388, '0388', 'BAGUS', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(389, '0389', 'MISNAN', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(390, '0390', 'HANAFI', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(391, '0391', 'SULTON', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(392, '0392', 'NUR KHOLIK', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(393, '0393', 'P. HERU', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(394, '0394', 'P. IRWAN', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(395, '0395', 'RUDIAWATI', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(396, '0396', 'P.REN', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(397, '0397', 'JUWITA', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(398, '0398', 'OSOP', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(399, '0399', 'SUPRIYANTO', 'PAKEL  RT. 08  RW. 03', 'null', 'rum', 'y'),
(400, '0400', 'P. SUKUR', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(401, '0401', 'SAME\'AN', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(402, '0402', 'SOHIB', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(403, '0403', 'SADUAN', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(404, '0404', 'KOSIM HR', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(405, '0405', 'MASKUR', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(406, '0406', 'HAMID', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(407, '0407', 'MARYAM', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(408, '0408', 'BUAMAR', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(409, '0409', 'SATARI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(410, '0410', 'SUKARDI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(411, '0411', 'PALIL', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(412, '0412', 'P. RUP', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(413, '0413', 'P. SUN', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(414, '0414', 'ROHANI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(415, '0415', 'SIONO', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(416, '0416', 'SAHAR', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(417, '0417', 'RABINI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(418, '0418', 'MASENI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(419, '0419', 'JUMA\'ASIN', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(420, '0420', 'NURSA\'IT', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(421, '0421', 'SANAPI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(422, '0422', 'MASHUD', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(423, '0423', 'SANDI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(424, '0424', 'H. BISRI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(425, '0425', 'QOSIM', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(426, '0426', 'SENIMA', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(427, '0427', 'MIFTAHUL ULUM', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(428, '0428', 'MULIK', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(429, '0429', 'JUPRI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(430, '0430', 'H. SODIK', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(431, '0431', 'SALIHA', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(432, '0432', 'P. MUL', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(433, '0433', 'MU\'AT', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(434, '0434', 'BUHARI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(435, '0435', 'H. MAHFUDZ', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(436, '0436', 'JUMARI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(437, '0437', 'ISTINA', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(438, '0438', 'HUSNUL', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(439, '0439', 'SUGENG', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(440, '0440', 'SA\'DULLOH', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(441, '0441', 'SAIFUDDIN', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(442, '0442', 'AMALIA', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(443, '0443', 'MA\'AT', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(444, '0444', 'SODIKIN', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(445, '0445', 'HASIM', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(446, '0446', 'ALI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(447, '0447', 'MIFTAHUL ', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(448, '0448', 'MATROJI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(449, '0449', 'SATAR', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(450, '0450', 'NUR HALIM', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(451, '0451', 'SUPA\'I', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(452, '0452', 'MUDRIKA ', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(453, '0453', 'SAMIN', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(454, '0454', 'IMAM', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(455, '0455', 'KONTAK', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(456, '0456', 'HAMBALI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(457, '0457', 'TURI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(458, '0458', 'NURYASIN', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(459, '0459', 'HAJIN', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(460, '0460', 'SUHATIN', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(461, '0461', 'HASAN', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(462, '0462', 'P. KASDI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(463, '0463', 'H. NU\'MAN', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(464, '0464', 'ROMLI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(465, '0465', 'M. JUPRI[AHMAD]', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(466, '0466', 'SAKRI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(467, '0467', 'H. KHOIRUL', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(468, '0468', 'MUSOLLA', 'LOWOKJATI RT. 01 RW. 04', 'null', 'msj', 'y'),
(469, '0469', 'SISWANTO', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(470, '0470', 'H. NURKHOLIS', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(471, '0471', 'SMP', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(472, '0472', 'LUTFI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(473, '0473', 'HINDA', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(474, '0474', 'TOHARI 02', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(475, '0475', 'SOLIHIN', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(476, '0476', 'EMIL', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(477, '0477', 'LULUK', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(478, '0478', 'ARIS', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(479, '0479', 'RIYANTO', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(480, '0480', 'DAROJI', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(481, '0481', 'NANDA', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(482, '0482', 'ENDANG', 'LOWOKJATI RT. 01 RW. 04', 'null', 'rum', 'y'),
(483, '0483', 'LILIK', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(484, '0484', 'KHOIRIL', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(485, '0485', 'MISTAR', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(486, '0486', 'DULMAJIT', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(487, '0487', 'NGASERI', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(488, '0488', 'KOSIM', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(489, '0489', 'SADOR', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(490, '0490', 'NURUL', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(491, '0491', 'MA\'SUM', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(492, '0492', 'SONIP', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(493, '0493', 'BASORI', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(494, '0494', 'JUMAWI', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(495, '0495', 'M. ROYYAN SANALI', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(496, '0496', 'BUHARI', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(497, '0497', 'ZENAL A', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(498, '0498', 'JUMRO', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(499, '0499', 'DOWI', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(500, '0500', 'UMI MANAP', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(501, '0501', 'TOHARI ', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(502, '0502', 'HARUN', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(503, '0503', 'SONIP UL', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(504, '0504', 'LILA', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(505, '0505', 'BOK ISA', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(506, '0506', 'SORADI', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(507, '0507', 'SUGIANTO BS', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(508, '0508', 'IDRIS', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(509, '0509', 'HUSNA', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(510, '0510', 'ISMI', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(511, '0511', 'MISTAM', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(512, '0512', 'JUMA\'IN', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(513, '0513', 'MALIK', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(514, '0514', 'MANAF', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(515, '0515', 'HARIS', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(516, '0516', 'SUKAYAT', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(517, '0517', 'P. SANAM', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(518, '0518', 'MUSLIHIN', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(519, '0519', 'RIFA\'I', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(520, '0520', 'HASAN', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(521, '0521', 'SOFYAN', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(522, '0522', 'MISTIKA', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(523, '0523', 'SUPRIYANTO', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(524, '0524', 'USMAN ', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(525, '0525', 'KASDI', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(526, '0526', 'ABD GHONI', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(527, '0527', 'SONI', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(528, '0528', 'SUBHAN', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(529, '0529', 'SUSIA', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(530, '0530', 'SIFA\'UL', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(531, '0531', 'YUSUF', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(532, '0532', 'MUNIR', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(533, '0533', 'ROHAYU', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(534, '0534', 'JUMA\'ATIN', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(535, '0535', 'HOFID', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(536, '0536', 'YASIN', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(537, '0537', 'IDA', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(538, '0538', 'HOIRON', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(539, '0539', 'SILFI', 'LOWOKJATI RT. 02 RW. 04', 'null', 'rum', 'y'),
(550, '12345', 'Tester123', 'Jl. Testpack No.35', '0987654375', 'msj', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(1) NOT NULL,
  `range1` int(5) NOT NULL,
  `range2` int(5) NOT NULL,
  `range3` int(5) NOT NULL,
  `range_n` bigint(5) NOT NULL,
  `standar` int(5) NOT NULL,
  `abonemen` int(5) NOT NULL,
  `skala1` int(3) NOT NULL,
  `skala2` int(3) NOT NULL,
  `skala3` int(3) NOT NULL,
  `admin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `range1`, `range2`, `range3`, `range_n`, `standar`, `abonemen`, `skala1`, `skala2`, `skala3`, `admin`) VALUES
(1, 2000, 2500, 3000, 3500, 7500, 2000, 10, 15, 20, 500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(5) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `real_name` varchar(40) NOT NULL,
  `pas_foto` varchar(60) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `real_name`, `pas_foto`, `level`) VALUES
('00001', 'admin', '12345', 'Administrator', 'user7-128x128.jpg', 'admin'),
('0003', 'kasir', '8d068753a5dd37dd875c9c7de58c76ef', 'Abdur Rohim', 'kasir1.jpg', 'operator'),
('002', 'mattsh', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Muhammad Soleh', 'mattsh.jpg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `langganan`
--
ALTER TABLE `langganan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `kode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=551;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
