-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2017 at 11:53 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hudai_cafe`
--
CREATE DATABASE IF NOT EXISTS `hudai_cafe` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hudai_cafe`;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` varchar(10) NOT NULL,
  `nama_paket` varchar(200) DEFAULT NULL,
  `detail_menu` varchar(100) NOT NULL,
  `jenis` varchar(11) NOT NULL,
  `lama_buat` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_paket`, `detail_menu`, `jenis`, `lama_buat`, `harga`, `gambar`) VALUES
('M1001', 'Bubur Ayam Komplit', 'Bubur ayam', 'Sarapan', '2 menit', 10000, '5938591_20140329063952-tokomesin.jpg'),
('M1002', 'Nasi Goreng Ikan Asin', 'Nasi Goreng Ikan Asin', 'Sarapan', '13 menit', 12000, 'nasi-goreng-ikan-asin.jpg'),
('M1003', 'Udang Goreng Tepung Asam Manis', 'Udang Goreng Tepung Asam Manis', 'Sarapan', '12 menit', 12000, '08-udang-goreng-tepung-asam-manis.jpg'),
('M1004', 'Cumi Asam Manis', 'Cumi Asam Manis', 'Sarapan', '12 menit', 10000, 'resep-cumi-asam-manis-pedas.jpg'),
('M1005', 'Lontong Sayur Komplit', 'Lontong Sayur', 'Sarapan', '4 menit', 10000, 'Lontong sayur pepaya muda 2.jpg'),
('M1006', 'Paket Ayam Goreng', 'Nasi, Ayam Goreng, Sayur Nangka, sambal', 'Makan Siang', '16 menit', 15000, 'paketgorengayam-800x480.jpg'),
('M1007', 'Paket Ayam Goreng Kremes', 'Paket Ayam Goreng Kremes', 'Makan Siang', '16 menit', 18000, 'paket-ayam-goreng-kremes-upload-foto.jpg'),
('M1008', 'Soto Ayam', 'Soto Ayam + Nasi', 'Makan Malam', '2 menit', 12000, 'resep-soto-ayam.jpg'),
('M1009', 'Ayam Bakar Khas Kulo', 'Ayam Bakar Khas Kulo', 'Makan Malam', '17 menit', 15000, 'ayam-bakar-khas-solo-dapur-kulo.jpg'),
('M1010', 'Gulai Ayam', 'Gulai Ayam', 'Makan Siang', '3 menit', 20000, 'Bumbu-Gulai-Ayam.jpg'),
('M1011', 'Kelinci Rica-Rica', 'Kelinci Rica-Rica', 'Makan Siang', '16 menit', 30000, 'Cara-Memasak-Daging-Kelinci-Bumbu-Rica-Rica-2.jpg'),
('M1012', 'Paket Ikan Kembung', 'Nasi, Ikan Kembung kuah Kuning, Cah Sawi, pepes tahu', 'Makan Siang', '4 menit', 20000, 'ikan-tongkol-goreng-tepung-beras.jpg'),
('M1013', 'Sate Ayam', 'Nasi + Sate Ayam', 'Sarapan', '14 menit', 18000, '100_2754.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE IF NOT EXISTS `pesanan` (
`id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_pesanan` varchar(50) NOT NULL,
  `id_menu` varchar(50) NOT NULL,
  `pemesan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tgl_delivery` date NOT NULL,
  `delivery` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `no_pesanan`, `id_menu`, `pemesan`, `jumlah`, `tanggal`, `tgl_delivery`, `delivery`) VALUES
(1, 2, 'P33001', 'M1005', 'Ahmad', 7, '2016-04-23', '2016-04-23', 'Sudah Dikirim'),
(2, 2, 'P33002', 'M1002', 'Chandra', 18, '2016-04-24', '2016-04-24', 'Sudah Dikirim'),
(3, 2, 'P33003', 'M1008', 'Hidaya Sari', 10, '2016-04-24', '2016-04-24', 'Sudah Dikirim'),
(4, 2, 'P33004', 'M1002', 'Reza', 10, '2016-04-24', '2016-04-24', 'Sudah Dikirim'),
(5, 2, 'P33005', 'M1004', 'Nabilla', 3, '2016-04-25', '2016-04-25', 'Sudah Dikirim'),
(6, 2, 'P33006', 'M1006', 'Hardiawan', 14, '2016-04-25', '2016-04-25', 'Sudah Dikirim'),
(7, 2, 'P33007', 'M1006', 'Brenda', 12, '2016-04-25', '2016-04-25', 'Sudah Dikirim'),
(8, 2, 'P33008', 'M1009', 'Elysa Hardiyanti', 20, '2016-04-27', '2016-04-27', 'Sudah Dikirim'),
(9, 2, 'P33009', 'M1004', 'A. Yazid Al Busthomi', 14, '2016-04-27', '2016-04-27', 'Sudah Dikirim'),
(10, 2, 'P33010', 'M1003', 'A. Zainul Abidin', 6, '2016-04-27', '2016-04-27', 'Sudah Dikirim'),
(11, 2, 'P33011', 'M1011', 'Abdi Rouyan Surya', 5, '2016-04-29', '2016-04-29', 'Sudah Dikirim'),
(12, 2, 'P33012', 'M1002', 'Abduh', 2, '2016-04-29', '2016-04-29', 'Sudah Dikirim'),
(13, 2, 'P33013', 'M1001', 'Abdul Aziz Muzakki', 7, '2016-04-29', '2016-04-29', 'Sudah Dikirim'),
(14, 2, 'P33014', 'M1005', 'Abdul Basith Hermanianto', 20, '2016-05-01', '2016-05-01', 'Sudah Dikirim'),
(15, 2, 'P33015', 'M1005', 'Abdul Muslichun', 1, '2016-05-01', '2016-05-01', 'Sudah Dikirim'),
(16, 2, 'P33016', 'M1002', 'Abdul Rahman', 13, '2016-05-01', '2016-05-01', 'Sudah Dikirim'),
(17, 2, 'P33017', 'M1001', 'Abdullah Taufik Kharisma', 17, '2016-05-04', '2016-05-04', 'Sudah Dikirim'),
(18, 2, 'P33018', 'M1011', 'Abdurrahman Fathony Syaukat', 18, '2016-05-04', '2016-05-04', 'Sudah Dikirim'),
(19, 2, 'P33019', 'M1008', 'Ach. Ridho Z.', 11, '2016-05-04', '2016-05-04', 'Sudah Dikirim'),
(20, 2, 'P33020', 'M1008', 'Achmad Kusni', 3, '2016-05-05', '2016-05-05', 'Sudah Dikirim'),
(21, 2, 'P33021', 'M1003', 'Achmad Sobari', 9, '2016-05-05', '2016-05-05', 'Sudah Dikirim'),
(22, 2, 'P33022', 'M1011', 'Achmad Zakky', 13, '2016-05-05', '2016-05-05', 'Sudah Dikirim'),
(23, 2, 'P33023', 'M1006', 'Adam Ardiyato', 5, '2016-05-06', '2016-05-06', 'Sudah Dikirim'),
(24, 2, 'P33024', 'M1011', 'Addin R Hemaswari', 3, '2016-05-06', '2016-05-06', 'Sudah Dikirim'),
(25, 2, 'P33025', 'M1012', 'Ade Azis Kusnaya', 17, '2016-05-06', '2016-05-06', 'Sudah Dikirim'),
(26, 2, 'P33026', 'M1003', 'Ade Bagus Setiawan', 5, '2016-05-07', '2016-05-07', 'Sudah Dikirim'),
(27, 2, 'P33027', 'M1004', 'Ade Hermawan', 5, '2016-05-07', '2016-05-07', 'Sudah Dikirim'),
(28, 2, 'P33028', 'M1003', 'Ade Nurjaman', 7, '2016-05-07', '2016-05-07', 'Sudah Dikirim'),
(29, 2, 'P33029', 'M1011', 'Ade Rais', 20, '2016-05-08', '2016-05-08', 'Sudah Dikirim'),
(30, 2, 'P33030', 'M1009', 'Ade Saepulloh Abdul K', 15, '2016-05-08', '2016-05-08', 'Sudah Dikirim'),
(31, 2, 'P33031', 'M1012', 'Ade Wahyudi', 16, '2016-05-08', '2016-05-08', 'Sudah Dikirim'),
(32, 2, 'P33032', 'M1007', 'Adelin Dicky Pribadi', 11, '2016-05-11', '2016-05-11', 'Sudah Dikirim'),
(33, 2, 'P33033', 'M1004', 'Adelina Fitri', 11, '2016-05-11', '2016-05-11', 'Sudah Dikirim'),
(34, 2, 'P33034', 'M1009', 'Adhelia Rizky Putri Arifin', 11, '2016-05-11', '2016-05-11', 'Sudah Dikirim'),
(35, 2, 'P33035', 'M1003', 'Adhika Rozi Ahmad', 9, '2016-05-15', '2016-05-15', 'Sudah Dikirim'),
(36, 2, 'P33036', 'M1012', 'Adi Abdurahman Nawawi', 19, '2016-05-15', '2016-05-15', 'Sudah Dikirim'),
(37, 2, 'P33037', 'M1001', 'Adi Juanda', 16, '2016-05-15', '2016-05-15', 'Sudah Dikirim'),
(38, 2, 'P33038', 'M1006', 'Adi Puswantoro', 17, '2016-05-16', '2016-05-16', 'Sudah Dikirim'),
(39, 2, 'P33039', 'M1011', 'Adi Sukmo', 20, '2016-05-16', '2016-05-16', 'Sudah Dikirim'),
(40, 2, 'P33040', 'M1002', 'Adin Hapid', 18, '2016-05-16', '2016-05-16', 'Sudah Dikirim'),
(41, 2, 'P33041', 'M1007', 'Adinda Pryanka', 7, '2016-05-17', '2016-05-17', 'Sudah Dikirim'),
(42, 2, 'P33042', 'M1002', 'Adisty Risnawati', 12, '2016-05-17', '2016-05-17', 'Sudah Dikirim'),
(43, 2, 'P33043', 'M1006', 'Aditya Aji M.', 4, '2016-05-17', '2016-05-17', 'Sudah Dikirim'),
(44, 2, 'P33044', 'M1005', 'Aditya Aufar', 12, '2016-05-20', '2016-05-20', 'Sudah Dikirim'),
(45, 2, 'P33045', 'M1004', 'Aditya Dwi Agung Prabowo', 8, '2016-05-20', '2016-05-20', 'Sudah Dikirim'),
(46, 2, 'P33046', 'M1011', 'Aditya Pria Muldiyanto', 18, '2016-05-20', '2016-05-20', 'Sudah Dikirim'),
(47, 2, 'P33047', 'M1012', 'Adwin Setyawan', 16, '2016-05-22', '2016-05-22', 'Sudah Dikirim'),
(48, 2, 'P33048', 'M1009', 'Adysti Lady Andini', 18, '2016-05-22', '2016-05-22', 'Sudah Dikirim'),
(49, 2, 'P33049', 'M1005', 'Afiati Syarifah', 15, '2016-05-22', '2016-05-22', 'Sudah Dikirim'),
(50, 2, 'P33050', 'M1002', 'Afuan Afandi', 13, '2016-05-23', '2016-05-23', 'Sudah Dikirim'),
(51, 2, 'P33051', 'M1010', 'Agiasti Maulidya B.', 2, '2016-05-23', '2016-05-23', 'Sudah Dikirim'),
(52, 2, 'P33052', 'M1010', 'Agitha Saverti J', 20, '2016-05-23', '2016-05-23', 'Sudah Dikirim'),
(53, 2, 'P33053', 'M1002', 'Agung Sutomo', 13, '2016-05-24', '2016-05-24', 'Sudah Dikirim'),
(54, 2, 'P33054', 'M1006', 'Agus Harianto', 20, '2016-05-24', '2016-05-24', 'Sudah Dikirim'),
(55, 2, 'P33055', 'M1007', 'Agus Kurniawan', 20, '2016-05-24', '2016-05-24', 'Sudah Dikirim'),
(56, 2, 'P33056', 'M1010', 'Agus Subandi', 8, '2016-05-27', '2016-05-27', 'Sudah Dikirim'),
(57, 2, 'P33057', 'M1005', 'Agus Suherman', 5, '2016-05-27', '2016-05-27', 'Sudah Dikirim'),
(58, 2, 'P33058', 'M1005', 'Agus Supriyadi', 7, '2016-05-27', '2016-05-27', 'Sudah Dikirim'),
(59, 2, 'P33059', 'M1002', 'Agustian Muarif', 18, '2016-05-28', '2016-05-28', 'Sudah Dikirim'),
(60, 2, 'P33060', 'M1008', 'Agustin Neorima', 10, '2016-05-28', '2016-05-28', 'Sudah Dikirim'),
(61, 2, 'P33061', 'M1002', 'Agustin Tri K.', 10, '2016-05-28', '2016-05-28', 'Sudah Dikirim'),
(62, 2, 'P33062', 'M1004', 'Agustinus Dwi Handono', 3, '2016-05-29', '2016-05-29', 'Sudah Dikirim'),
(63, 2, 'P33063', 'M1006', 'Ahda Nurlaily', 14, '2016-05-29', '2016-05-29', 'Sudah Dikirim'),
(64, 2, 'P33064', 'M1006', 'Ahmad Ajruddin Munshif', 12, '2016-05-29', '2016-05-29', 'Sudah Dikirim'),
(65, 2, 'P33065', 'M1009', 'Ahmad Bisri', 20, '2016-05-31', '2016-05-31', 'Sudah Dikirim'),
(66, 2, 'P33066', 'M1004', 'Ahmad Dedat', 14, '2016-05-31', '2016-05-31', 'Sudah Dikirim'),
(67, 2, 'P33067', 'M1003', 'Ahmad Faisal', 6, '2016-05-31', '2016-05-31', 'Sudah Dikirim'),
(68, 2, 'P33068', 'M1011', 'Ahmad Faisol', 5, '2016-06-03', '2016-06-03', 'Sudah Dikirim'),
(69, 2, 'P33069', 'M1002', 'Ahmad Faizal Ramadhan', 2, '2016-06-03', '2016-06-03', 'Sudah Dikirim'),
(70, 2, 'P33070', 'M1001', 'Ahmad Fajar Novarianto', 7, '2016-06-03', '2016-06-03', 'Sudah Dikirim'),
(71, 2, 'P33071', 'M1005', 'Ahmad Fauzi', 20, '2016-06-04', '2016-06-04', 'Sudah Dikirim'),
(72, 2, 'P33072', 'M1005', 'Ahmad Ghalib Darmawel', 1, '2016-06-04', '2016-06-04', 'Sudah Dikirim'),
(73, 2, 'P33073', 'M1002', 'Ahmad Khoirul Agung Siswoyo', 13, '2016-06-04', '2016-06-04', 'Sudah Dikirim'),
(74, 2, 'P33074', 'M1001', 'Ahmad Kholil Gunawan', 17, '2016-06-05', '2016-06-05', 'Sudah Dikirim'),
(75, 2, 'P33075', 'M1011', 'Ahmad Muhammad Tajul Mafakhir', 18, '2016-06-05', '2016-06-05', 'Sudah Dikirim'),
(76, 2, 'P33076', 'M1008', 'Ahmad Nur Fadhian', 11, '2016-06-05', '2016-06-05', 'Sudah Dikirim'),
(77, 2, 'P33077', 'M1008', 'Ahmad Rifai', 3, '2016-06-06', '2016-06-06', 'Sudah Dikirim'),
(78, 2, 'P33078', 'M1003', 'Ahmad Sopian', 9, '2016-06-06', '2016-06-06', 'Sudah Dikirim'),
(79, 2, 'P33079', 'M1011', 'Ahmad Yoga Sugama', 13, '2016-06-06', '2016-06-06', 'Sudah Dikirim'),
(80, 2, 'P33080', 'M1006', 'Ahmad Yusuf Salile', 5, '2016-06-10', '2016-06-10', 'Sudah Dikirim'),
(81, 2, 'P33081', 'M1011', 'Aini Nurkartika Mala', 3, '2016-06-10', '2016-06-10', 'Sudah Dikirim'),
(82, 2, 'P33082', 'M1012', 'Ainul Yaqin', 17, '2016-06-10', '2016-06-10', 'Sudah Dikirim'),
(83, 2, 'P33083', 'M1003', 'Aisyah Mahbubah', 5, '2016-06-11', '2016-06-11', 'Sudah Dikirim'),
(84, 2, 'P33084', 'M1004', 'Ajeng Febrina Saraswati', 5, '2016-06-11', '2016-06-11', 'Sudah Dikirim'),
(85, 2, 'P33085', 'M1003', 'Ajeng M. Savitri', 7, '2016-06-11', '2016-06-11', 'Sudah Dikirim'),
(86, 2, 'P33086', 'M1011', 'Akbar Rafsanjani', 20, '2016-06-12', '2016-06-12', 'Sudah Dikirim'),
(87, 2, 'P33087', 'M1009', 'Akhmad Rizal J.', 15, '2016-06-12', '2016-06-12', 'Sudah Dikirim'),
(88, 2, 'P33088', 'M1012', 'Akrom Muflih', 16, '2016-06-12', '2016-06-12', 'Sudah Dikirim'),
(89, 2, 'P33089', 'M1007', 'Alam Suddin', 11, '2016-06-16', '2016-06-16', 'Sudah Dikirim'),
(90, 2, 'P33090', 'M1004', 'Aldyan Rushka Putra', 11, '2016-06-16', '2016-06-16', 'Sudah Dikirim'),
(91, 2, 'P33091', 'M1009', 'Alethea Noer', 11, '2016-06-16', '2016-06-16', 'Sudah Dikirim'),
(92, 2, 'P33092', 'M1003', 'Alexander Harahap', 9, '2016-06-17', '2016-06-17', 'Sudah Dikirim'),
(93, 2, 'P33093', 'M1012', 'Alf Briatna', 19, '2016-06-17', '2016-06-17', 'Sudah Dikirim'),
(94, 2, 'P33094', 'M1001', 'Alfian Resal Akbar Lastaluhu', 16, '2016-06-17', '2016-06-17', 'Sudah Dikirim'),
(95, 2, 'P33095', 'M1006', 'Alfian Sandi P.', 17, '2016-06-18', '2016-06-18', 'Sudah Dikirim'),
(96, 2, 'P33096', 'M1011', 'Alfiansyah Muhammad', 20, '2016-06-18', '2016-06-18', 'Sudah Dikirim'),
(97, 2, 'P33097', 'M1002', 'Alfim Muhlison', 18, '2016-06-18', '2016-06-18', 'Sudah Dikirim'),
(98, 2, 'P33098', 'M1007', 'Alfista Bayu Kresna', 7, '2016-06-19', '2016-06-19', 'Sudah Dikirim'),
(99, 2, 'P33099', 'M1002', 'Alifianti Analisa T.', 12, '2016-06-19', '2016-06-19', 'Sudah Dikirim'),
(100, 2, 'P33100', 'M1006', 'Alip Suharto', 4, '2016-06-19', '2016-06-19', 'Sudah Dikirim'),
(101, 2, 'P33101', 'M1005', 'Alit Pradana', 12, '2016-06-21', '2016-06-21', 'Sudah Dikirim'),
(102, 2, 'P33102', 'M1004', 'Aliyah Sakinah', 8, '2016-06-21', '2016-06-21', 'Sudah Dikirim'),
(103, 2, 'P33103', 'M1011', 'Almira Ardelia', 18, '2016-06-21', '2016-06-21', 'Sudah Dikirim'),
(104, 2, 'P33104', 'M1012', 'Almira Nuraelah', 16, '2016-06-22', '2016-06-22', 'Sudah Dikirim'),
(105, 2, 'P33105', 'M1009', 'Alvin Risyad Brillian', 18, '2016-06-22', '2016-06-22', 'Sudah Dikirim'),
(106, 2, 'P33106', 'M1005', 'Alvinda Kusumaningrostati', 15, '2016-06-22', '2016-06-22', 'Sudah Dikirim'),
(107, 2, 'P33107', 'M1002', 'Amalia Ardiyanti', 13, '2016-06-23', '2016-06-23', 'Sudah Dikirim'),
(108, 2, 'P33108', 'M1010', 'Amalia Fitranty Almira', 2, '2016-06-23', '2016-06-23', 'Sudah Dikirim'),
(109, 2, 'P33109', 'M1010', 'Amalia Nur Utami Ichwandi', 20, '2016-06-23', '2016-06-23', 'Sudah Dikirim'),
(110, 2, 'P33110', 'M1002', 'Amalia Putri Firdausi', 13, '2016-06-24', '2016-06-24', 'Sudah Dikirim'),
(111, 2, 'P33111', 'M1006', 'Amalia Retnasari S', 20, '2016-06-24', '2016-06-24', 'Sudah Dikirim'),
(112, 2, 'P33112', 'M1007', 'Amar Husna', 20, '2016-06-24', '2016-06-24', 'Sudah Dikirim'),
(113, 2, 'P33113', 'M1010', 'Amelia Ayu P.', 8, '2016-06-26', '2016-06-26', 'Sudah Dikirim'),
(114, 2, 'P33114', 'M1005', 'Amir Suarna', 5, '2016-06-26', '2016-06-26', 'Sudah Dikirim'),
(115, 2, 'P33115', 'M1005', 'Amri Maulana', 7, '2016-06-26', '2016-06-26', 'Sudah Dikirim'),
(116, 2, 'P33116', 'M1002', 'Ana Febrianty', 18, '2016-06-27', '2016-06-27', 'Sudah Dikirim'),
(117, 2, 'P33117', 'M1008', 'Ana Widiastutik', 10, '2016-06-27', '2016-06-27', 'Sudah Dikirim'),
(118, 2, 'P33118', 'M1002', 'Andi Asmuliana', 10, '2016-06-27', '2016-06-27', 'Sudah Dikirim'),
(119, 2, 'P33119', 'M1004', 'Andi Dwi Mandasari', 3, '2016-06-29', '2016-06-29', 'Sudah Dikirim'),
(120, 2, 'P33120', 'M1006', 'Andi Fitra Ardiansyah', 14, '2016-06-29', '2016-06-29', 'Sudah Dikirim'),
(121, 2, 'P33121', 'M1006', 'Andi Ruswandi', 12, '2016-06-29', '2016-06-29', 'Sudah Dikirim'),
(122, 2, 'P33122', 'M1009', 'Andik Yulianto', 20, '2016-06-30', '2016-06-30', 'Sudah Dikirim'),
(123, 2, 'P33123', 'M1004', 'Andika Rizky Sulyat', 14, '2016-06-30', '2016-06-30', 'Sudah Dikirim'),
(124, 2, 'P33124', 'M1003', 'Andina Dyah Rahmadhani A', 6, '2016-06-30', '2016-06-30', 'Sudah Dikirim'),
(125, 2, 'P33125', 'M1011', 'Andini Dewi Putri', 5, '2016-07-01', '2016-07-01', 'Sudah Dikirim'),
(126, 2, 'P33126', 'M1002', 'Andini Nisurahmah', 2, '2016-07-01', '2016-07-01', 'Sudah Dikirim'),
(127, 2, 'P33127', 'M1001', 'Andino Yudho Pratomo', 7, '2016-07-01', '2016-07-01', 'Sudah Dikirim'),
(128, 2, 'P33128', 'M1005', 'Andre Pasetha', 20, '2016-07-02', '2016-07-02', 'Sudah Dikirim'),
(129, 2, 'P33129', 'M1005', 'Andre Sugiri', 1, '2016-07-02', '2016-07-02', 'Sudah Dikirim'),
(130, 2, 'P33130', 'M1002', 'Andrey Tri Widya Putra', 13, '2016-07-02', '2016-07-02', 'Sudah Dikirim'),
(131, 2, 'P33131', 'M1001', 'Andri Kurniawan', 17, '2016-07-03', '2016-07-03', 'Sudah Dikirim'),
(132, 2, 'P33132', 'M1011', 'Andrian Tri Hartanto', 18, '2016-07-03', '2016-07-03', 'Sudah Dikirim'),
(133, 2, 'P33133', 'M1008', 'Andrielina Firdausih', 11, '2016-07-03', '2016-07-03', 'Sudah Dikirim'),
(134, 2, 'P33134', 'M1008', 'Andriyanto Ashari', 3, '2016-07-08', '2016-07-08', 'Sudah Dikirim'),
(135, 2, 'P33135', 'M1003', 'Aneisti Septiani', 9, '2016-07-08', '2016-07-08', 'Sudah Dikirim'),
(136, 2, 'P33136', 'M1011', 'Angga Mandesno', 13, '2016-07-08', '2016-07-08', 'Sudah Dikirim'),
(153, 2, 'P33137', 'M1008', 'Ari', 5, '2017-06-03', '0000-00-00', 'Belum Dikirim'),
(154, 2, 'P33137', 'M1009', 'Ari', 2, '2017-06-03', '0000-00-00', 'Belum Dikirim'),
(155, 2, 'P33137', 'M1009', 'Ari', 1, '2017-06-03', '0000-00-00', 'Belum Dikirim'),
(156, 2, 'P33137', 'M1006', 'Ari', 3, '2017-06-03', '0000-00-00', 'Belum Dikirim'),
(157, 2, 'P33137', 'M1006', 'Ari', 4, '2017-06-03', '0000-00-00', 'Belum Dikirim'),
(158, 2, 'P33138', 'M1008', 'Ari', 5, '2017-06-03', '0000-00-00', 'Belum Dikirim'),
(159, 2, 'P33138', 'M1009', 'Ari', 2, '2017-06-03', '0000-00-00', 'Belum Dikirim'),
(160, 2, 'P33138', 'M1009', 'Ari', 3, '2017-06-03', '0000-00-00', 'Belum Dikirim'),
(161, 2, 'P33138', 'M1013', 'Ari', 6, '2017-06-03', '0000-00-00', 'Belum Dikirim'),
(162, 2, 'P33139', 'M1008', '2', 1, '2017-06-07', '0000-00-00', 'Belum Dikirim'),
(163, 2, 'P33139', 'M1009', '2', 2, '2017-06-07', '0000-00-00', 'Belum Dikirim'),
(164, 2, 'P33139', 'M1009', '2', 3, '2017-06-07', '0000-00-00', 'Belum Dikirim'),
(165, 2, 'P33139', 'M1008', '2', 1, '2017-06-07', '0000-00-00', 'Belum Dikirim'),
(166, 2, 'P33140', 'M1008', '2', 1, '2017-06-07', '0000-00-00', 'Belum Dikirim'),
(167, 2, 'P33140', 'M1009', '2', 2, '2017-06-07', '0000-00-00', 'Belum Dikirim'),
(168, 2, 'P33140', 'M1009', '2', 3, '2017-06-07', '0000-00-00', 'Belum Dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `kartu_id` varchar(15) NOT NULL,
  `nomor_kartu` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` char(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('admin','owner') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `kartu_id`, `nomor_kartu`, `nama`, `alamat`, `jenis_kelamin`, `tgl_lahir`, `no_hp`, `email`, `username`, `password`, `status`) VALUES
(1, 'KTP', 2147483647, 'Hudai', 'Gunung Putri', 'Laki-Laki', '2017-02-01', 2147483647, 'hudai@gmail.com', 'hudai', 'hudai', 'owner'),
(2, 'KTP', 3561845, 'Admin', 'Bogor', 'Laki-Laki', '1990-12-01', 812556161, 'admin@gmail.com', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
 ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
