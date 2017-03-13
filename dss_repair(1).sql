-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Mar 2017 pada 13.54
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dss_repair`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_optimasi`
--

CREATE TABLE `hasil_optimasi` (
  `id` int(5) NOT NULL,
  `kode_masjid` varchar(10) DEFAULT NULL,
  `nilai` varchar(100) DEFAULT NULL,
  `keluar` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_masjid`
--

CREATE TABLE `jenis_masjid` (
  `kode_jenis` int(5) NOT NULL,
  `nama_jenis` varchar(30) DEFAULT NULL,
  `nilai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_masjid`
--

INSERT INTO `jenis_masjid` (`kode_jenis`, `nama_jenis`, `nilai`) VALUES
(1, 'Masjid', '60'),
(2, 'Mushalla', '40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_masjid`
--

CREATE TABLE `kegiatan_masjid` (
  `id` int(5) NOT NULL,
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `nilai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan_masjid`
--

INSERT INTO `kegiatan_masjid` (`id`, `nama_kegiatan`, `nilai`) VALUES
(1, 'Pengajian', '60'),
(2, 'Majelis Talim', '40'),
(3, 'Keduanya Pengajian dan Majelis', '100'),
(4, 'Tidak ada', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_user`
--

CREATE TABLE `level_user` (
  `id_level` int(2) NOT NULL,
  `nama_level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level_user`
--

INSERT INTO `level_user` (`id_level`, `nama_level`) VALUES
(1, 'Bimas Islam'),
(2, 'Perencanaan'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masjid`
--

CREATE TABLE `masjid` (
  `kode_masjid` int(5) NOT NULL,
  `nama_masjid` varchar(100) DEFAULT NULL,
  `jenis_masjid` int(2) DEFAULT NULL,
  `alamat` text,
  `kegiatan_masjid` int(3) DEFAULT NULL,
  `intensitasperbaikan` int(2) DEFAULT NULL,
  `lama_kerusakan` int(4) DEFAULT NULL,
  `kapasitas_jamaah` int(10) DEFAULT NULL,
  `status_tanah` int(1) DEFAULT NULL,
  `tipe_kerusakan` int(1) DEFAULT NULL,
  `biaya` float DEFAULT NULL,
  `luas_bangunan` float DEFAULT NULL,
  `lama_berdiri` varchar(10) DEFAULT NULL,
  `jarak` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masjid`
--

INSERT INTO `masjid` (`kode_masjid`, `nama_masjid`, `jenis_masjid`, `alamat`, `kegiatan_masjid`, `intensitasperbaikan`, `lama_kerusakan`, `kapasitas_jamaah`, `status_tanah`, `tipe_kerusakan`, `biaya`, `luas_bangunan`, `lama_berdiri`, `jarak`) VALUES
(10, 'Nurul Amal', 2, '   Jl. Karya Utama RT 003/003', 2, 1, 1, 500, 1, 3, 10000000, 350, '22', '500'),
(11, 'Nurul Falah', 2, '  Jl. Srengseng Kelapa Dua ', 2, 1, 3, 150, 3, 2, 100000000, 144, '41', '300'),
(12, 'Al Amien', 2, ' Jl. Mufakat Rt 003/006 No. 17', 3, 1, 12, 100, 1, 3, 1000000, 130, '20', '500'),
(13, 'Al-Muttaqin', 2, ' Jl. Pesanggrahan Rt 008/09 No.45', 2, 1, 1, 100, 1, 3, 1500000, 100, '25', '500'),
(14, 'AL-Muhajirin', 1, 'Jl.Bambu I Rt 005/04', 3, 3, 2, 300, 1, 3, 3000000, 200, '30', '700'),
(16, 'Al-Hurriyah', 1, 'Jl. Tegal Parang selatan 1', 3, 1, 3, 500, 1, 3, 5000000, 250, '60', '52'),
(17, 'AT-TIN', 1, ' Jl. semanggi 2 cempaka putih', 3, 1, 5, 420, 1, 1, 12000000, 250, '18', '700'),
(18, 'AT-TAQWA', 1, ' Jl. Peninggilan Raya dalam RT 006/01', 3, 1, 4, 300, 1, 2, 10000000, 200, '20', '700'),
(19, 'AL-JIHAD', 2, ' Jl. Karya Utama dalam RT 008/06', 3, 3, 2, 80, 1, 3, 500000, 60, '21', '200'),
(20, 'Al Ikhlas', 1, ' Jalan Jalan', 1, 2, 7, 200, 1, 3, 12000000, 5000, '7', '200'),
(21, 'Masjid A', 1, ' Dimana aja', 1, 1, 13, 150, 1, 1, 11000000, 500, '13', '100'),
(22, 'masjid b', 1, ' wei', 2, 3, 3, 60, 1, 1, 5000000, 300, '3', '500'),
(23, 'Masjid Al-1', 1, 'Alamat', 1, 3, 1, 150, 1, 1, 30000000, 130, '1', '300'),
(24, 'masjid al2 ', 2, 'b', 1, 2, 1, 131, 1, 2, 5000000, 100, '3', '55'),
(25, 'masjid al 3', 1, 'ba', 2, 1, 1, 111, 2, 2, 3000000, 90, '4', '200'),
(26, 'masjid al 5', 1, 'baa', 2, 1, 1, 122, 3, 2, 1000000, 90, '1', '10000'),
(27, 'masjid al 4', 2, 'acz', 2, 3, 3, 89, 1, 1, 1300000, 50, '2', '130'),
(28, 'masjid al 6', 2, 'aad', 3, 5, 5, 59, 1, 1, 300000, 60, '2', '150'),
(38, 'Masjid Jami'' Baiturrahim', 1, 'Jl. Mampang Prapatan XIV No.57, RT.4/RW.4, Tegal Parang, Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 1, 5, 1, 100, 2, 2, 30000000, 300, '5', '300'),
(39, 'Masjid Jami Al-Munnawar', 1, 'Jl. Raya Psr Minggu, RT.1/RW.6, Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta ', 2, 3, 2, 80, 1, 3, 20000000, 500, '3', '200'),
(40, 'Masjid Jami'' Ar-Riyadh', 1, 'Jl. Tegal Parang Utara, Tegal Parang, Mampang Prapatan, Tegal Parang, Mampang Prpt., Jakarta Selatan, Daerah Khusus Ibukota Jakarta ', 3, 1, 3, 70, 3, 1, 22000000, 100, '4', '100'),
(41, 'Masjid Al Anwar', 1, 'Jl. Mampang Prpt. Raya No.11, RT.4/RW.7, Tegal Parang, Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta ', 3, 2, 4, 40, 3, 3, 13000000, 200, '6', '300'),
(42, 'Masjid Al Falah', 1, 'JL. Mampang Prapatan I, RT.05 RW. 06, RT.5/RW.6, Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta ', 2, 3, 5, 50, 2, 2, 15000000, 90, '1', '300'),
(43, 'Masjid Baitussalam', 1, 'Jl. Duren Tiga No.102, RT.7/RW.1, Duren Tiga, Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 0, 2, 3, 100, 1, 1, 1500000, 100, '16', '400'),
(44, 'Masjid Nurul Hidayah Kalibata', 1, 'Jalan Warung Jati Timur No. 25, RT 07/RW. 4, Kalibata, Pancoran, RT.7/RW.4, Kalibata, Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta ', 2, 1, 4, 123, 2, 3, 16000000, 130, '5', '800'),
(45, 'Masjid Nurul Badar', 1, 'Jl. Raya Pasar Minggu, RT.6/RW.1, Pejaten Bar., Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 2, 5, 3, 111, 3, 3, 13000000, 120, '6', '300'),
(46, 'Masjid Raya At-Taqwa', 1, 'Jalan Raya Pasar Minggu Km. 19, 7, Pejaten Barat, Pasar Minggu, RT.2/RW.5, Pejaten Bar., Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta ', 3, 6, 4, 151, 2, 2, 14500000, 180, '8', '300'),
(47, 'Masjid Jami Kemang', 1, 'Jalan Kemang Utara Raya, RT.4/RW.1, Bangka, Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 3, 1, 5, 100, 2, 2, 15000000, 130, '9', '500'),
(48, 'Masjid Al - Hikmah', 1, 'Jl. Bangka II, RT.8/RW.3, Pela Mampang, Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 1, 1, 6, 50, 1, 1, 15000000, 95, '10', '300'),
(49, 'Masjid Baitul Halim', 1, 'Jalan Mampang Prapatan 5, RT 09 RW 04, Tegal Parang, RT.5/RW.3, Tegal Parang, Jakarta Selatan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta ', 1, 10, 7, 90, 2, 3, 18900000, 60, '30', '900'),
(50, 'Masjid Jami At-Taubah', 1, 'Jalan Rawajati Timur II, Pancoran, RT.3/RW.8, Rawajati, Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta ', 3, 4, 8, 50, 3, 1, 15000000, 70, '50', '300'),
(51, 'Masjid At Taubah Pancoran', 1, 'Jl. Pancoran Barat VIII No.13, RT.9/RW.3, Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta ', 3, 5, 7, 80, 2, 2, 15000000, 90, '30', '300'),
(52, 'Masjid Raya Palapa Baitus Salam', 1, 'Jalan Hortikultura, Pasar Minggu, RT.11/RW.10, Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 2, 3, 8, 130, 3, 2, 15000000, 230, '20', '900'),
(53, 'Masjid Al Ikhlas Jati Padang', 1, 'Jalan Jati Padang Raya, RT 04 / RW 03, Jati Padang, Pasar Minggu, Jati Padang, Ps. Minggu, Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 0, 6, 2, 200, 1, 2, 15100000, 210, '13', '160'),
(54, 'Masjid Al-Ikhlas', 1, 'Jalan Pangeran Antasari, RT. 013 / 02, RT.13/RW.2, Cipete Sel., Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 0, 7, 2, 130, 1, 1, 15000000, 209, '12', '300'),
(55, 'Masjid Nurul Huda Komplek DEPLU Cipete', 1, 'Komp Deplu Cipete, Jalan Haji Abdul Majid Dalam III, Cipete Selatan, Cilandak, Cipete Sel., Cilandak, Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 1, 1, 5, 190, 3, 2, 15000000, 203, '11', '300'),
(56, 'Masjid Jami'' Annur', 1, 'RT. 003 RW. 002, Jl. Masjid An Nur, RT.3/RW.2, Menteng Dalam, Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta ', 2, 3, 6, 210, 2, 3, 13100000, 210, '11', '300'),
(57, 'Masjid Nurul Iman Pasar Tebet Barat', 1, 'Pasar Tebet Barat Lantai Basement, Tebet Barat, RT.2/RW.5, Tebet Bar., Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 3, 4, 7, 305, 3, 3, 1400000, 400, '11', '1300'),
(58, 'Masjid Assa''adah As''sudairi', 1, 'Jalan Mampang Prapatan Raya No. 72, RT.001 / RW.06, Tegal Parang, Mampang Prapatan, Tegal Parang, Jakarta Selatan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 2, 5, 8, 104, 1, 2, 15000000, 301, '11', '300'),
(59, 'Masjid Al-Bakrie Taman Rasuna Jakarta', 1, 'Jalan HR. Rasuna Said, RT.17/RW.1, Menteng Atas, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 3, 6, 9, 153, 3, 3, 15000000, 201, '12', '300'),
(60, 'Masjid Perahu', 1, 'Jl. Casablanca, RT.3/RW.5, Menteng Dalam, Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta ', 3, 7, 0, 156, 1, 2, 23000000, 190, '15', '222'),
(61, 'Yayasan Masjid Al Huda Muhammadiyah', 1, 'Jl. Tebet Tim. Raya No.565, RT.10/RW.5, Tebet Tim., Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 2, 9, 6, 222, 1, 3, 13100000, 130, '13', '300'),
(62, 'Masjid Teladan', 1, 'No.1, Jl. Tebet Timur IV G, RT.5/RW.8, Tebet Tim., Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 2, 3, 4, 131, 1, 2, 10000000, 140, '16', '300'),
(63, 'Masjid Jami Al-Abror', 1, 'Jl. Sultan Agung,Jaksel., RT.1/RW.3, Ps. Manggis, Setia Budi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 2, 6, 2, 130, 2, 3, 13000000, 200, '13', '100'),
(64, 'Mesjid Al Barkah', 1, 'Jl. Al - Barkah I No. 17, Manggarai Selatan, Tebet, Manggarai Sel., Tebet, Jakarta Selatan, Daerah Khusus Ibukota Jakarta', 1, 8, 3, 222, 2, 1, 8000000, 300, '18', '300'),
(65, 'Masjid Baitur Rahman', 1, 'Jl. Saharjo, RT.1/RW.7, Menteng Atas, Setia Budi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta ', 0, 3, 5, 300, 3, 3, 5000000, 400, '13', '300'),
(66, 'Al-Istiqomah', 1, 'Jl. Masjid Al-Istiqomah, RT.5/RW.5, Tegal Parang, Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790', 3, 2, 6, 1500, 1, 3, 10000000, 140, '18', '700 m'),
(67, 'At-Taubah', 1, 'Jl. Pancoran Barat VIII No.13, RT.9/RW.3, Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790', 3, 1, 9, 700, 1, 2, 20000000, 70, '10', '700 m'),
(68, 'An-Najat', 2, 'Jl. Pancoran Barat IX RT.10/RW.3, Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12780', 3, 4, 1, 100, 1, 2, 5000000, 15, '7', '100 m'),
(81, 'Al-Muniroh', 1, 'Jl. Karya usaha', 3, 3, 4, 90, 2, 2, 5000000, 90, '15', '600'),
(82, 'Al-Hikmah', 1, 'Jl. Karya bakti', 2, 3, 2, 120, 1, 3, 4000000, 150, '25', '700'),
(83, 'At-Taqwa', 2, 'Jl. Karya utama', 3, 2, 3, 80, 1, 3, 4000000, 100, '20', '500'),
(84, 'Hidayatul anwar', 1, 'Jl Karya usaha', 3, 3, 2, 200, 1, 3, 5000000, 170, '22', '800'),
(85, 'Nurul Iman', 1, 'Jl. Pos pengumben', 3, 4, 3, 300, 1, 3, 5000000, 250, '40', '800'),
(86, 'Nurul Amal', 1, 'Jl. Karya utama', 2, 4, 3, 300, 1, 3, 4500000, 250, '35', '400'),
(87, 'Jami Al-afiyah a', 1, ' Jl. Bambu II', 3, 3, 5, 200, 1, 2, 6000000, 150, '30', '600'),
(88, 'Nurul falah', 2, 'Jl. Kelapa dua', 2, 2, 3, 70, 1, 2, 8000000, 70, '21', '500'),
(89, 'Al-Ikhlas', 2, 'Jl. Kampung bengek', 2, 2, 3, 65, 1, 2, 5000000, 78, '20', '600'),
(90, 'Al-Muttaqin', 1, 'Jl. Rawa Bangke wetan', 3, 2, 4, 230, 1, 2, 8000000, 250, '35', '920'),
(91, 'Umar bin Khattab', 1, 'Jl. Kerukunan', 3, 2, 4, 180, 2, 3, 4000000, 180, '23', '700'),
(92, 'Utsman bin affan', 2, 'Jl. Keramaian', 2, 1, 3, 120, 2, 3, 4000000, 150, '15', '600'),
(93, 'Al-Barokah', 1, 'Jl. Kebahagiaan', 2, 2, 3, 300, 1, 2, 7000000, 280, '30', '900'),
(94, 'Al-Jihad', 2, 'Jl. H Ahmad', 3, 1, 3, 100, 1, 3, 9000000, 120, '21', '900'),
(95, 'Ali bin abi thalib', 2, 'Jl. Kramat', 2, 1, 4, 80, 2, 3, 4000000, 100, '20', '800'),
(96, 'Al-Muniroh', 2, 'Jl. Karya bangsa', 3, 2, 3, 80, 1, 1, 10000000, 100, '25', '500'),
(97, 'Al-Hikmah', 2, 'Jl. Karya usaha', 3, 2, 4, 140, 3, 2, 5000000, 130, '15', '600'),
(98, 'At-Taqwa', 1, 'Jl. Karya betawi', 2, 2, 1, 150, 3, 1, 10000000, 150, '23', '700'),
(99, 'Hidayatul anwar', 1, 'Jl Krukut', 1, 5, 2, 100, 2, 2, 8000000, 100, '25', '700'),
(100, 'Nurul Iman', 1, 'Jl. Pemancingan I', 3, 1, 5, 200, 1, 2, 8000000, 240, '39', '900'),
(101, 'Nurul Amal', 1, 'Jl. Karya utama dalam', 3, 2, 3, 150, 2, 1, 11000000, 198, '20', '700'),
(102, 'Jami Al-afiyah B', 1, ' Jl. Berang berang', 2, 2, 2, 100, 2, 3, 5000000, 150, '40', '600'),
(103, 'Nurul falah', 1, 'Jl. Kelapa sawit', 3, 1, 3, 200, 1, 3, 9000000, 250, '40', '800'),
(104, 'Al-Ikhlas', 1, 'Jl. Kampung duku', 2, 3, 2, 140, 2, 1, 12000000, 200, '30', '1000'),
(105, 'Al-Muttaqin', 1, 'Jl. Pemancingan II', 2, 2, 3, 200, 1, 3, 9000000, 200, '50', '800'),
(106, 'Umar bin Khattab', 1, 'Jl. Keselamatan', 1, 3, 7, 200, 3, 2, 9000000, 500, '25', '900'),
(107, 'Utsman bin affan', 1, 'Jl. Ketekunan', 2, 4, 3, 180, 1, 1, 12000000, 200, '20', '900'),
(108, 'Al-Barokah', 1, 'Jl. H Anwar wahid', 3, 2, 5, 120, 1, 3, 8000000, 200, '29', '800'),
(109, 'Al-Jihad', 1, 'Jl. H Ahmad Yani', 1, 3, 7, 130, 3, 2, 10000000, 280, '42', '980'),
(110, 'Ali bin abi thalib', 2, 'Jl. H Niming', 3, 1, 3, 100, 2, 2, 13000000, 150, '40', '750'),
(111, 'Al- Muhajirin', 1, 'Jl H Kelik kelapa dua', 3, 3, 2, 200, 1, 2, 9000000, 170, '30', '800'),
(112, 'Nurul zikri', 1, 'Jl. Pos petamburan', 3, 4, 3, 300, 1, 3, 5000000, 250, '40', '800'),
(113, 'An-nawawi', 2, 'Jl. H Marzuki', 2, 4, 3, 300, 1, 1, 9000000, 250, '29', '400'),
(114, ' Al-afiyah', 1, 'Jl. Bambu II', 3, 3, 5, 200, 1, 2, 6000000, 150, '30', '600'),
(115, 'Nurul falah', 2, 'Jl. Kelapa dua', 2, 2, 3, 70, 1, 2, 8000000, 70, '21', '500'),
(116, 'Al-Ikhlas', 2, 'Jl. Kampung bengek', 2, 2, 3, 65, 1, 2, 5000000, 78, '20', '600'),
(117, 'Al-Muttaqin', 1, 'Jl. Rawa Bangke wetan', 3, 2, 4, 230, 1, 2, 8000000, 250, '35', '920'),
(118, 'An-Nur', 1, 'Jl. Kerukunan', 3, 2, 4, 180, 2, 3, 4000000, 180, '23', '700'),
(119, 'Al-Anshor', 2, 'Jl. Mufakat', 2, 1, 3, 120, 2, 3, 4000000, 150, '15', '600'),
(120, 'Al-Barokah', 1, 'Jl. Kebahagiaan', 2, 2, 3, 300, 1, 2, 7000000, 280, '30', '900'),
(121, 'Al-Ma;rufiyah', 2, 'Jl. Simpang siur', 3, 1, 3, 100, 1, 3, 9000000, 120, '11', '900'),
(122, 'As-Sobri', 1, 'Jl. Tanah lapang', 3, 3, 4, 90, 2, 2, 5000000, 90, '25', '600'),
(123, 'Agung', 1, 'Jl. Srengseng raya', 2, 3, 2, 120, 1, 3, 9000000, 150, '35', '700'),
(124, 'As-Syam', 2, 'Jl. Gang tolo', 3, 2, 3, 80, 1, 3, 5000000, 100, '30', '500'),
(125, 'Hidayatul anwar', 1, 'Jl Karya usaha', 3, 3, 2, 200, 1, 3, 5000000, 170, '22', '800'),
(126, 'Nurul Iman', 1, 'Jl. Gambir raya', 3, 4, 3, 300, 1, 3, 5000000, 250, '30', '800'),
(127, 'Nurul Amal', 1, 'Jl. Joglo', 2, 4, 3, 300, 1, 3, 4500000, 250, '25', '400'),
(128, 'Jami Al-afiyah', 1, 'Jl. H Sinan', 3, 3, 5, 200, 1, 2, 6000000, 150, '20', '600'),
(129, 'An-nur', 1, 'Jl. Kebon jeruk ', 2, 2, 3, 100, 1, 2, 8000000, 170, '31', '900'),
(130, 'Al-Muniroh', 1, 'Jl. Karya usaha', 3, 3, 4, 90, 2, 2, 5000000, 100, '15', '600'),
(131, 'Al-Hikmah', 1, 'Jl. Karya bakti', 2, 3, 2, 120, 1, 3, 4000000, 150, '25', '700'),
(132, 'At-Taqwa', 2, 'Jl. Karya utama', 3, 2, 3, 80, 1, 3, 4000000, 100, '20', '500'),
(133, 'Hidayatul anwar', 1, 'Jl Karya usaha', 3, 3, 2, 200, 1, 3, 5000000, 270, '22', '800'),
(134, 'Nurul Iman', 1, 'Jl. Pos pengumben', 3, 4, 3, 300, 1, 3, 5000000, 400, '40', '800'),
(135, 'Nurul Amal', 1, 'Jl. Karya utama', 2, 4, 3, 300, 1, 3, 4500000, 450, '35', '400'),
(136, 'Jami Al-afiyah', 1, 'Jl. Bambu II', 3, 3, 5, 200, 1, 2, 6000000, 250, '30', '600'),
(137, 'Nurul falah', 2, 'Jl. Kelapa dua', 2, 2, 3, 70, 1, 2, 8000000, 100, '21', '500'),
(138, 'Al-Ikhlas', 2, 'Jl. Kampung bengek', 2, 2, 3, 65, 1, 2, 5000000, 108, '20', '600'),
(139, 'Al-Muttaqin', 1, 'Jl. Rawa Bangke wetan', 3, 2, 4, 230, 1, 2, 8000000, 250, '35', '920'),
(140, 'Umar bin Khattab', 1, 'Jl. Kerukunan', 3, 2, 4, 180, 2, 3, 4000000, 180, '23', '700'),
(141, 'Utsman bin affan', 2, 'Jl. Keramaian', 2, 1, 3, 120, 2, 3, 4000000, 150, '15', '600'),
(142, 'Al-Barokah', 1, 'Jl. Kebahagiaan', 2, 2, 3, 300, 1, 2, 7000000, 400, '30', '900'),
(143, 'Al-Jihad', 2, 'Jl. H Ahmad', 3, 1, 3, 100, 1, 3, 9000000, 120, '21', '900'),
(144, 'Ali bin abi thalib', 2, 'Jl. Kramat', 2, 1, 4, 80, 2, 3, 4000000, 100, '20', '800'),
(145, 'Al-Muniroh', 2, 'Jl. Karya bangsa', 3, 2, 3, 80, 1, 1, 10000000, 100, '25', '500'),
(146, 'Al-Hikmah', 2, 'Jl. Karya usaha', 3, 2, 4, 140, 3, 2, 5000000, 230, '15', '600'),
(147, 'At-Taqwa', 1, 'Jl. Karya betawi', 2, 2, 1, 150, 3, 1, 10000000, 150, '23', '700'),
(148, 'Hidayatul anwar', 1, 'Jl Krukut', 1, 5, 2, 100, 2, 2, 8000000, 100, '25', '700'),
(149, 'Nurul Iman', 1, 'Jl. Pemancingan I', 3, 1, 5, 200, 1, 2, 8000000, 240, '39', '900'),
(150, 'Nurul Amal', 1, 'Jl. Karya utama dalam', 3, 2, 3, 150, 2, 1, 11000000, 198, '20', '700'),
(151, 'Jami Al-afiyaha', 1, ' Jl. Berang berang', 2, 2, 2, 100, 2, 1, 5000000, 150, '40', '600'),
(152, 'Nurul falah', 1, 'Jl. Kelapa sawit', 3, 1, 3, 200, 1, 3, 9000000, 250, '40', '800'),
(153, 'Al-Ikhlas', 1, 'Jl. Kampung duku', 2, 3, 2, 140, 2, 1, 12000000, 200, '30', '1000'),
(154, 'Al-Muttaqin', 1, 'Jl. Pemancingan II', 2, 2, 3, 200, 1, 3, 9000000, 230, '50', '800'),
(155, 'Umar bin Khattab', 1, 'Jl. Keselamatan', 2, 3, 7, 200, 3, 2, 9000000, 250, '25', '900'),
(156, 'Utsman bin affan', 1, 'Jl. Ketekunan', 2, 4, 3, 180, 1, 1, 12000000, 200, '20', '900'),
(157, 'Al-Barokah', 1, 'Jl. H Anwar wahid', 3, 2, 5, 120, 1, 3, 8000000, 200, '29', '800'),
(158, 'Al-Jihad', 1, 'Jl. H Ahmad Yani', 1, 3, 7, 130, 3, 2, 10000000, 280, '42', '980'),
(159, 'Ali bin abi thalib', 2, 'Jl. H Niming', 3, 1, 3, 100, 2, 2, 13000000, 150, '40', '750'),
(160, 'Al- Muhajirin', 1, 'Jl H Kelik kelapa dua', 3, 3, 2, 200, 1, 2, 9000000, 270, '30', '800'),
(161, 'Nurul zikri', 1, 'Jl. Pos petamburan', 3, 4, 3, 300, 1, 3, 5000000, 550, '40', '800'),
(162, 'An-nawawi', 2, 'Jl. H Marzuki', 2, 4, 3, 300, 1, 1, 9000000, 250, '29', '400'),
(163, ' Al-afiyah', 1, 'Jl. Bambu II', 3, 3, 5, 200, 1, 2, 6000000, 150, '30', '600'),
(164, 'Nurul falah', 2, 'Jl. Kelapa dua', 2, 2, 3, 70, 1, 2, 8000000, 70, '21', '500'),
(165, 'Al-Ikhlas', 2, 'Jl. Kampung bengek', 2, 2, 3, 65, 1, 2, 5000000, 78, '20', '600'),
(166, 'Al-Muttaqin', 1, 'Jl. Rawa Bangke wetan', 3, 2, 4, 230, 1, 2, 8000000, 250, '35', '920'),
(167, 'An-Nur', 1, 'Jl. Kerukunan', 3, 2, 4, 180, 2, 3, 4000000, 180, '23', '700'),
(168, 'Al-Anshor', 2, 'Jl. Mufakat', 2, 1, 3, 120, 2, 3, 4000000, 150, '15', '600'),
(169, 'Al-Barokah', 1, 'Jl. Kebahagiaan', 2, 2, 3, 300, 1, 2, 7000000, 320, '30', '900'),
(170, 'Al-Ma;rufiyah', 2, 'Jl. Simpang siur', 3, 1, 3, 100, 1, 3, 9000000, 120, '11', '900'),
(171, 'As-Sobri', 1, 'Jl. Tanah lapang', 3, 3, 4, 90, 2, 2, 5000000, 90, '25', '600'),
(172, 'Agung', 1, 'Jl. Srengseng raya', 2, 3, 2, 120, 1, 3, 9000000, 150, '35', '700'),
(173, 'As-Syam', 2, 'Jl. Gang tolo', 3, 2, 3, 80, 1, 3, 5000000, 100, '30', '500'),
(174, 'Hidayatul anwar', 1, 'Jl Karya usaha', 3, 3, 2, 200, 1, 3, 5000000, 170, '22', '800'),
(175, 'Nurul Iman', 1, 'Jl. Gambir raya', 3, 4, 3, 300, 1, 3, 5000000, 450, '30', '800'),
(176, 'Nurul Amal', 1, 'Jl. Joglo', 2, 4, 3, 300, 1, 3, 4500000, 350, '25', '400'),
(177, 'Jami Al-afiyah IV', 1, ' Jl. H Sinan', 3, 3, 5, 200, 1, 2, 6000000, 250, '20', '600'),
(178, 'An-nur', 1, 'Jl. Kebon jeruk ', 2, 2, 3, 100, 1, 2, 8000000, 170, '31', '900'),
(179, 'Nurul Iman', 1, 'Jl. Pos pengumben', 3, 4, 3, 300, 1, 3, 5000000, 250, '40', '800'),
(180, 'Nurul Amal', 1, 'Jl. Karya utama', 2, 4, 3, 300, 1, 3, 4500000, 350, '35', '400'),
(181, 'Jami Al-afiyah iii', 1, ' Jl. Bambu II', 3, 3, 5, 200, 1, 2, 6000000, 150, '30', '600'),
(182, 'Nurul falah', 2, 'Jl. Kelapa dua', 2, 2, 3, 70, 1, 2, 8000000, 70, '21', '500'),
(183, 'Al-Ikhlas', 2, 'Jl. Kampung bengek', 2, 2, 3, 65, 1, 2, 5000000, 78, '20', '600'),
(184, 'Al-Muttaqin', 1, 'Jl. Rawa Bangke wetan', 3, 2, 4, 230, 1, 2, 8000000, 250, '35', '920'),
(185, 'Umar bin Khattab', 1, 'Jl. Kerukunan', 3, 2, 4, 180, 2, 3, 4000000, 280, '23', '700'),
(186, 'Utsman bin affan', 2, 'Jl. Keramaian', 2, 1, 3, 120, 2, 3, 4000000, 150, '15', '600'),
(187, 'Al-Barokah', 1, 'Jl. Kebahagiaan', 2, 2, 3, 300, 1, 2, 7000000, 400, '30', '900'),
(188, 'Al-Jihad', 2, 'Jl. H Ahmad', 3, 1, 3, 100, 1, 3, 9000000, 120, '21', '900'),
(189, 'Ali bin abi thalib', 2, 'Jl. Kramat', 2, 1, 4, 80, 2, 3, 4000000, 100, '20', '800'),
(190, 'Al-Muniroh', 2, 'Jl. Karya bangsa', 3, 2, 3, 80, 1, 1, 10000000, 100, '25', '500'),
(191, 'Al-Hikmah', 2, 'Jl. Karya usaha', 3, 2, 4, 140, 3, 2, 5000000, 200, '15', '600'),
(192, 'At-Taqwa', 1, 'Jl. Karya betawi', 2, 2, 1, 150, 3, 1, 10000000, 150, '23', '700'),
(193, 'Hidayatul anwar', 1, 'Jl Krukut', 1, 5, 2, 100, 2, 2, 8000000, 100, '25', '700'),
(194, 'Nurul Iman', 1, 'Jl. Pemancingan I', 3, 1, 5, 200, 1, 2, 8000000, 240, '39', '900'),
(195, 'Nurul Amal', 1, 'Jl. Karya utama dalam', 3, 2, 3, 150, 2, 1, 11000000, 198, '20', '700'),
(196, 'Jami Al-afiyah islam', 1, ' Jl. Berang berang', 2, 2, 2, 100, 2, 3, 5000000, 150, '40', '600'),
(197, 'Nurul falah', 1, 'Jl. Kelapa sawit', 3, 1, 3, 200, 1, 3, 9000000, 250, '40', '800'),
(198, 'Al-Ikhlas', 1, 'Jl. Kampung duku', 2, 3, 2, 140, 2, 1, 12000000, 200, '30', '1000'),
(199, 'Al-Muttaqin', 1, 'Jl. Pemancingan II', 2, 2, 3, 200, 1, 3, 9000000, 300, '50', '800'),
(200, 'Umar bin Khattab', 1, 'Jl. Keselamatan', 2, 3, 7, 200, 3, 2, 9000000, 250, '25', '900'),
(201, 'Nurul zikri', 1, 'Jl. Pos petamburan', 3, 4, 3, 300, 1, 3, 5000000, 450, '40', '800'),
(202, 'An-nawawi', 2, 'Jl. H Marzuki', 2, 4, 3, 300, 1, 1, 9000000, 400, '29', '400'),
(203, ' Al-afiyah', 1, 'Jl. Bambu II', 3, 3, 5, 200, 1, 2, 6000000, 350, '30', '600'),
(204, 'Nurul falah', 2, 'Jl. Kelapa dua', 2, 2, 3, 70, 1, 2, 8000000, 70, '21', '500'),
(205, 'Al-Ikhlas', 2, 'Jl. Kampung bengek', 2, 2, 3, 65, 1, 2, 5000000, 98, '20', '600'),
(206, 'Al-Muttaqin', 1, 'Jl. Rawa Bangke wetan', 3, 2, 4, 230, 1, 2, 8000000, 300, '35', '920'),
(207, 'An-Nur', 1, 'Jl. Kerukunan', 3, 2, 4, 180, 2, 3, 4000000, 280, '23', '700'),
(208, 'Al-Anshor', 2, 'Jl. Mufakat', 2, 1, 3, 120, 2, 3, 4000000, 150, '15', '600'),
(209, 'Al-Barokah', 1, 'Jl. Kebahagiaan', 2, 2, 3, 300, 1, 2, 7000000, 350, '30', '900'),
(210, 'Al-Ma;rufiyah', 2, 'Jl. Simpang siur', 3, 1, 3, 100, 1, 3, 9000000, 120, '11', '900'),
(211, 'As-Sobri', 1, 'Jl. Tanah lapang', 3, 3, 4, 90, 2, 2, 5000000, 90, '25', '600'),
(212, 'Agung', 1, 'Jl. Srengseng raya', 2, 3, 2, 120, 1, 3, 9000000, 150, '35', '700'),
(213, 'As-Syam', 2, 'Jl. Gang tolo', 3, 2, 3, 80, 1, 3, 5000000, 100, '30', '500'),
(214, 'Hidayatul anwar', 1, 'Jl Karya usaha', 3, 3, 2, 200, 1, 3, 5000000, 170, '22', '800'),
(215, 'Nurul Iman', 1, 'Jl. Gambir raya', 3, 4, 3, 300, 1, 3, 5000000, 350, '30', '800'),
(216, 'Nurul Amal', 1, 'Jl. Joglo', 2, 4, 3, 300, 1, 3, 4500000, 300, '25', '400'),
(217, 'Jami Al-afiyah VI', 1, ' Jl. H Sinan', 3, 3, 5, 200, 1, 2, 6000000, 300, '20', '600'),
(218, 'An-nur', 1, 'Jl. Kebon jeruk ', 2, 2, 3, 100, 1, 2, 8000000, 170, '31', '900'),
(219, 'Al-Muniroh', 1, 'Jl. Karya usaha', 3, 3, 4, 90, 2, 2, 5000000, 120, '15', '600'),
(220, 'Al-Hikmah', 1, 'Jl. Karya bakti', 2, 3, 2, 120, 1, 3, 4000000, 150, '25', '700'),
(221, 'At-Taqwa', 2, 'Jl. Karya utama', 3, 2, 3, 80, 1, 3, 4000000, 100, '20', '500'),
(222, 'Hidayatul anwar', 1, 'Jl Karya usaha', 3, 3, 2, 200, 1, 3, 5000000, 250, '22', '800'),
(223, 'Nurul Iman', 1, 'Jl. Pos pengumben', 3, 4, 3, 300, 1, 3, 5000000, 400, '40', '800'),
(224, 'Nurul Amal', 1, 'Jl. Karya utama', 2, 4, 3, 300, 1, 3, 4500000, 450, '35', '400'),
(225, 'Ali bin abi thalib', 2, 'Jl. H Niming', 3, 1, 3, 100, 2, 2, 13000000, 150, '40', '750'),
(226, 'Al- Muhajirin', 1, 'Jl H Kelik kelapa dua', 3, 3, 2, 200, 1, 2, 9000000, 250, '30', '800'),
(227, 'Nurul zikri', 1, 'Jl. Pos petamburan', 3, 4, 3, 300, 1, 3, 5000000, 400, '40', '800');

-- --------------------------------------------------------

--
-- Struktur dari tabel `new_hasilopt`
--

CREATE TABLE `new_hasilopt` (
  `kode_masjid` int(10) DEFAULT NULL,
  `nilai` varchar(10) DEFAULT NULL,
  `keluar` int(10) DEFAULT NULL,
  `tipe_opt` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `parameter`
--

CREATE TABLE `parameter` (
  `id` int(2) NOT NULL,
  `parameter` varchar(20) DEFAULT NULL,
  `detail` text,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `parameter`
--

INSERT INTO `parameter` (`id`, `parameter`, `detail`, `nilai`) VALUES
(1, 'p1', 'Biaya', 0.15),
(2, 'p2', 'Kapasitas Jamaah', 0.14),
(3, 'p3', 'Tipe Kerusakan', 0.13),
(4, 'p4', 'Lama Kerusakan', 0.13),
(5, 'p5', 'Intensitas Perbaikan', 0.12),
(6, 'p6', 'Jarak', 0.09),
(7, 'p7', 'Kegiatan Masjid', 0.06),
(8, 'p8', 'Jenis Masjid', 0.06),
(9, 'p9', 'Luas Bangunan', 0.05),
(10, 'p10', 'Lama Berdiri', 0.05),
(11, 'p11', 'Status Tanah', 0.02);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_tanah`
--

CREATE TABLE `status_tanah` (
  `id` int(5) NOT NULL,
  `nama_tanah` varchar(50) DEFAULT NULL,
  `nilai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_tanah`
--

INSERT INTO `status_tanah` (`id`, `nama_tanah`, `nilai`) VALUES
(1, 'Wakaf', '50'),
(2, 'SHM', '30'),
(3, 'GIRIK', '20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_kerusakan`
--

CREATE TABLE `tipe_kerusakan` (
  `id` int(1) NOT NULL,
  `nama_tipe` varchar(50) DEFAULT NULL,
  `nilai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_kerusakan`
--

INSERT INTO `tipe_kerusakan` (`id`, `nama_tipe`, `nilai`) VALUES
(1, 'Rusak Berat', '70'),
(2, 'Rusak Sedang', '20'),
(3, 'Rusak Ringan', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id_level` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_level`) VALUES
(2, 'bimas', '2076c10acbcf614301f3f13d992783a3', 1),
(3, 'perencanaan', '99e6b14a7719e0d468e1e3a42a75141c', 2),
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 3),
(6, 'iqbal', 'd41d8cd98f00b204e9800998ecf8427e', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_opt`
--

CREATE TABLE `waktu_opt` (
  `id` int(5) NOT NULL,
  `tipe_opt` int(2) DEFAULT NULL,
  `waktu` varchar(100) DEFAULT NULL,
  `percobaan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_optimasi`
--
ALTER TABLE `hasil_optimasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_masjid`
--
ALTER TABLE `jenis_masjid`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `kegiatan_masjid`
--
ALTER TABLE `kegiatan_masjid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `masjid`
--
ALTER TABLE `masjid`
  ADD PRIMARY KEY (`kode_masjid`);

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_tanah`
--
ALTER TABLE `status_tanah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_kerusakan`
--
ALTER TABLE `tipe_kerusakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `waktu_opt`
--
ALTER TABLE `waktu_opt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_optimasi`
--
ALTER TABLE `hasil_optimasi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenis_masjid`
--
ALTER TABLE `jenis_masjid`
  MODIFY `kode_jenis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kegiatan_masjid`
--
ALTER TABLE `kegiatan_masjid`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id_level` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `masjid`
--
ALTER TABLE `masjid`
  MODIFY `kode_masjid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;
--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `status_tanah`
--
ALTER TABLE `status_tanah`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipe_kerusakan`
--
ALTER TABLE `tipe_kerusakan`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `waktu_opt`
--
ALTER TABLE `waktu_opt`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
