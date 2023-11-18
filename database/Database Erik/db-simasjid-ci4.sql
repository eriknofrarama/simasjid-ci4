-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 16, 2023 at 01:54 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-simasjid-ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tahun`
--

CREATE TABLE `tabel_tahun` (
  `id_tahun` int NOT NULL,
  `tahun_h` varchar(4) DEFAULT NULL,
  `tahun_m` year DEFAULT NULL,
  `tahun_aktif` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tahun`
--

INSERT INTO `tabel_tahun` (`id_tahun`, `tahun_h`, `tahun_m`, `tahun_aktif`) VALUES
(5, '1444', '2023', ''),
(15, '1445', '2024', ''),
(16, '1447', '2026', ''),
(17, '1448', '2027', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agenda`
--

CREATE TABLE `tbl_agenda` (
  `id_agenda` int NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_agenda`
--

INSERT INTO `tbl_agenda` (`id_agenda`, `nama_kegiatan`, `tanggal`, `jam`) VALUES
(41, 'Pembekalan Jamaah Sebelum Keberangkatan Haji\r\n', '2023-07-06', '12:00:00'),
(42, 'Kajian Remaja Bersama Ustadz Felix Siau', '2023-07-10', '17:00:00'),
(43, 'Ceramah Bersama Prof Dr H Abdul Somad Lc,Ma', '2023-07-08', '12:00:00'),
(44, 'Ceramah ', '2023-07-05', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donasi`
--

CREATE TABLE `tbl_donasi` (
  `id_donasi` int NOT NULL,
  `tgl` date DEFAULT NULL,
  `id_rekening` int DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `nama_pengirim` varchar(50) DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `jenis_donasi` varchar(10) DEFAULT NULL,
  `bukti` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_donasi`
--

INSERT INTO `tbl_donasi` (`id_donasi`, `tgl`, `id_rekening`, `nama_bank`, `no_rek`, `nama_pengirim`, `jumlah`, `jenis_donasi`, `bukti`) VALUES
(5, '2023-06-18', 9, 'Bank Nagari', '0293891288', 'Erik Nofra Rama', 3000000, 'Sosial', '1687045904_e253798107b2daa533c1.jpg'),
(6, '2023-06-18', 12, 'Bank Nagari', '028321989823', 'Arief Rahmat', 1000000, 'Masjid', '1687045998_96102561e57516990af3.jpg'),
(7, '2023-06-25', 8, 'Bank Nagari', '0100-0101-0101-0101', 'Erik Nofra Rama', 4000000, 'Masjid', '1687705534_ed2d8041d48846dc8ad1.jpg'),
(8, '2023-06-25', 12, 'Bank BNI', '0100-0101-0101-0101', 'Wiwin Haryanto', 250000, 'Sosial', '1687705615_2abbef052bbb4119b10e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_masjid`
--

CREATE TABLE `tbl_kas_masjid` (
  `id_kas_masjid` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `kas_masuk` float DEFAULT NULL,
  `kas_keluar` float DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kas_masjid`
--

INSERT INTO `tbl_kas_masjid` (`id_kas_masjid`, `tanggal`, `ket`, `kas_masuk`, `kas_keluar`, `status`) VALUES
(47, '2023-06-23', 'Saldo Awal', 11250000, 0, 'Masuk'),
(48, '2023-06-23', 'Pembelian ATK ', 0, 150000, 'Keluar'),
(49, '2023-06-27', 'Sumabangan Dari Bpk.Azri', 300000, 0, 'Masuk'),
(50, '2023-06-27', 'Operasional Jumat', 0, 500000, 'Keluar'),
(51, '2023-07-04', 'Sumbangan bapak tono', 500000, 0, 'Masuk'),
(52, '2023-07-04', 'sumbangan pak imam', 50000, 0, 'Masuk'),
(53, '2023-07-04', 'pembelian ATK', 0, 100000, 'Keluar'),
(54, '2023-07-06', 'pembelian ATK', 100000, 0, 'Masuk'),
(55, '2023-07-06', 'test reviis', 50000, 0, 'Masuk'),
(56, '2023-07-06', 'test revisi 3', 1000000, 0, 'Masuk'),
(57, '2023-07-06', 'test revisi 3', 0, 1000000, 'Keluar'),
(58, '2023-07-06', 'Infak Dari Hamba Allah', 50000, 0, 'Masuk'),
(59, '2023-07-07', 'Sumbangan Pak Imam', 450000, 0, 'Masuk'),
(60, '2023-07-07', 'Pembelian Sapu', 0, 1000000, 'Keluar'),
(61, '2023-07-07', 'jjh', 1000000, 0, 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_yatim`
--

CREATE TABLE `tbl_kas_yatim` (
  `id_kas_yatim` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `kas_masuk` int DEFAULT NULL,
  `kas_keluar` int DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kas_yatim`
--

INSERT INTO `tbl_kas_yatim` (`id_kas_yatim`, `tanggal`, `ket`, `kas_masuk`, `kas_keluar`, `status`) VALUES
(19, '2023-06-23', 'Saldo Awal', 10000000, 0, 'Masuk'),
(20, '2023-06-23', 'Buka Bersama Anak Yatim  1444H ', 0, 2000000, 'Keluar'),
(21, '2023-06-23', 'Pemberian Santunan Yatim Panti Asuhan', 0, 1000000, 'Keluar'),
(22, '2023-06-23', 'Sumbangan Aspirasi Dari Ketua DPR RI Puan Maharani', 5000000, 0, 'Masuk'),
(23, '2023-07-04', 'Sumbnagan pak imam', 150000, 0, 'Masuk'),
(24, '2023-07-04', 'Sumbangan bapak tono', 0, 150000, 'Keluar'),
(25, '2023-07-06', 'test revisi', 1000000, 0, 'Masuk'),
(26, '2023-07-06', 'test revisi 3', 1000000, 0, 'Masuk'),
(27, '2023-07-06', 'test revisi', 0, 1000000, 'Keluar'),
(28, '2023-07-07', 'Sumbangan Pak Imam', 1000000, 0, 'Masuk'),
(29, '2023-07-07', 'Pemberian Santunan Yatim Panti Asuhan', 0, 500000, 'Keluar'),
(30, '2023-07-16', 'Test Input', 0, 200000, 'Keluar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelompok`
--

CREATE TABLE `tbl_kelompok` (
  `id_kelompok` int NOT NULL,
  `id_tahun` int DEFAULT NULL,
  `nama_kelompok` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kelompok`
--

INSERT INTO `tbl_kelompok` (`id_kelompok`, `id_tahun`, `nama_kelompok`) VALUES
(47, 5, 'Kelompok 1 2023'),
(48, 5, 'Kelompok 2 2023'),
(49, 15, 'Kelompok 1 2024'),
(50, 15, 'Kelompok 2 2024'),
(51, 15, 'Kelompok 3 2024'),
(52, 5, 'Kelompok 4 2023'),
(53, 5, 'Kelompok 5 2023'),
(54, 5, 'Kelompok 3 2023'),
(55, 16, 'Kelompok 1 2026'),
(56, 16, 'Kelompok 2 2026'),
(57, 16, 'Kelompok 3 2026'),
(58, 16, 'Kelompok 4 2026'),
(59, 17, 'Kelompok 1 2027'),
(60, 17, 'Kelompok 2 2027'),
(62, 17, 'Kelompok 3 2027'),
(63, 17, 'Kelompok 4 2027');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengurus`
--

CREATE TABLE `tbl_pengurus` (
  `id_pengurus` int NOT NULL,
  `nama_pengurus` varchar(35) DEFAULT NULL,
  `jabatan` varchar(30) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_pengurus`
--

INSERT INTO `tbl_pengurus` (`id_pengurus`, `nama_pengurus`, `jabatan`, `alamat`, `no_hp`) VALUES
(2, 'Surleman Rose', 'Bendahara', 'Korong Bayur', '081277402487'),
(4, 'Muhammad Idris S.Kom', 'Sekretaris', 'Pauh Kambar Hilir', '08123384783');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peserta_kelompok`
--

CREATE TABLE `tbl_peserta_kelompok` (
  `id_peserta` int NOT NULL,
  `id_kelompok` int DEFAULT NULL,
  `nama_peserta` varchar(100) DEFAULT NULL,
  `biaya` int DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_peserta_kelompok`
--

INSERT INTO `tbl_peserta_kelompok` (`id_peserta`, `id_kelompok`, `nama_peserta`, `biaya`, `alamat`, `no_hp`) VALUES
(52, 47, 'Erik Nofra Rama', 2500000, '0', '0'),
(53, 47, 'Arief Rahmat ', 2500000, '0', '0'),
(54, 49, 'Erik Nofra Rama', 2500000, '0', '0'),
(55, 48, 'Habib Almustafa', 2500000, '0', '0'),
(56, 47, 'Fri Anggy Burhanuddin', 2500000, '0', '0'),
(57, 49, 'Imam Gunawan ', 2500000, '0', '0'),
(59, 49, 'Rizky Maiyuda', 2500000, '0', '0'),
(60, 49, 'Arief Rahmat', 2500000, '0', '0'),
(61, 49, 'Fajrul Amal', 250000, '0', '0'),
(62, 49, 'Fri Anggy Burhanudin', 2500000, '0', '0'),
(63, 49, 'Anies Rasyid Baswedan', 2500000, '0', '0'),
(65, 50, 'Gustriandi', 2500000, '0', '0'),
(66, 50, 'Akmal Irmansyah', 2500000, '0', '0'),
(67, 48, 'Fauziah', 2500000, '0', '0'),
(70, 51, 'Wiwin Haryanto', 2500000, 'pasaman barat', '28482837'),
(71, 51, 'Erik Nofra Rama', 2500000, 'Pauh Kambar Hilir', '920348249'),
(73, 47, 'Imam Gunawan', 250000, 'Padang', '2147483647'),
(74, 54, 'Test Peserta 3', 2000000, 'Padang', '2147483647'),
(75, 47, 'Ireno Adinata', 25000, 'Padang', '45346756'),
(78, 55, 'randifilan', 200000, 'Padang', '2147483647'),
(79, 55, 'sektor4', 250000, 'Padang', '2147483647'),
(80, 54, 'Test Peserta 3', 2500000, 'Padang', '081292849328');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int NOT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `no_rek` varchar(20) DEFAULT NULL,
  `atas_nama` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(8, 'Bank Nagari', '1234-1234-1234-1234', 'Masjid Raya Pauh Kambar Bintungan Tinggi'),
(12, 'Bank BRI', '0909-0999-0909-0900', 'Masjid Raya Pauh Kambar Bintungan Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` char(20) NOT NULL,
  `nama_masjid` varchar(100) DEFAULT NULL,
  `id_kota` varchar(5) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tahunaktif` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_masjid`, `id_kota`, `alamat`, `tahunaktif`) VALUES
('1', 'MASJID RAYA PAUH KAMBAR BINTUNGAN TINGGI', '0305', 'Nagari Pauh Kambar Kecamatan Nan Sabaris', 2024);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `level`) VALUES
(2, 'Bendahara', 'Bendahara@gmail.com', '123', 1),
(4, 'Administrator', 'admin@gmail.com', '123', 0),
(5, 'Sekretaris', 'sekretaris@gmail.com', '123', 2),
(6, 'Ketua', 'ketua@gmail.com', '123', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tahun`
--
ALTER TABLE `tabel_tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indexes for table `tbl_kas_masjid`
--
ALTER TABLE `tbl_kas_masjid`
  ADD PRIMARY KEY (`id_kas_masjid`);

--
-- Indexes for table `tbl_kas_yatim`
--
ALTER TABLE `tbl_kas_yatim`
  ADD PRIMARY KEY (`id_kas_yatim`);

--
-- Indexes for table `tbl_kelompok`
--
ALTER TABLE `tbl_kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `tbl_pengurus`
--
ALTER TABLE `tbl_pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indexes for table `tbl_peserta_kelompok`
--
ALTER TABLE `tbl_peserta_kelompok`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tahun`
--
ALTER TABLE `tabel_tahun`
  MODIFY `id_tahun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `id_agenda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  MODIFY `id_donasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_kas_masjid`
--
ALTER TABLE `tbl_kas_masjid`
  MODIFY `id_kas_masjid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_kas_yatim`
--
ALTER TABLE `tbl_kas_yatim`
  MODIFY `id_kas_yatim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_kelompok`
--
ALTER TABLE `tbl_kelompok`
  MODIFY `id_kelompok` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_pengurus`
--
ALTER TABLE `tbl_pengurus`
  MODIFY `id_pengurus` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_peserta_kelompok`
--
ALTER TABLE `tbl_peserta_kelompok`
  MODIFY `id_peserta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
