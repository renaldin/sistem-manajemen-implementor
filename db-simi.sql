-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 04:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-simi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `jam` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `koordinat` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `implementor`
--

CREATE TABLE `implementor` (
  `id_implementor` int(11) NOT NULL,
  `id_rumah_sakit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `implementor`
--

INSERT INTO `implementor` (`id_implementor`, `id_rumah_sakit`, `id_user`, `email`, `tanggal_mulai`, `tanggal_selesai`, `status`) VALUES
(1, 1, 2, 'ks11281991@gmail.com', '2023-05-19', '2023-05-19', NULL),
(2, 1, 3, 'riangergor@gmail.com', '2023-05-19', '2023-05-19', NULL),
(4, 2, 6, 'contohh@gmail.com', '2023-05-22', '2023-05-22', NULL),
(5, 3, 7, 'karyawan1@gmail.com', '2023-05-22', '2023-05-31', NULL),
(6, 3, 8, 'karyawan2@gmail.com', '2023-05-22', '2023-05-31', NULL),
(8, 8, 13, 'putri@gmail.com', '2023-06-04', '2023-08-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `batas_tgl_pekerjaan` date NOT NULL,
  `tgl_pengumpulan` date DEFAULT NULL,
  `link` text DEFAULT NULL,
  `id_implementor` int(11) NOT NULL,
  `status_pekerjaan` enum('On Progress','Uploaded','Done','Late') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `deskripsi`, `batas_tgl_pekerjaan`, `tgl_pengumpulan`, `link`, `id_implementor`, `status_pekerjaan`) VALUES
(2, 'Menambahkan fitur Search', '2023-06-08', '2023-06-08', 'https://www.figma.com/file/F8SAW9XCqnBf7KVIBmcX6J/UI-PA?type=design&node-id=0-1', 1, 'Done'),
(3, 'Update fitur', '2023-06-15', '2023-06-08', 'https://www.figma.com/file/F8SAW9XCqnBf7KVIBmcX6J/UI-PA?type=design&node-id=0-1', 2, 'Done'),
(4, 'Update sistem', '2023-06-08', '2023-06-08', 'http://localhost/phpmyadmin/index.php?route=/table/structure/save', 2, 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `rumah_sakit`
--

CREATE TABLE `rumah_sakit` (
  `id_rumah_sakit` int(11) NOT NULL,
  `nama_rumah_sakit` varchar(50) NOT NULL,
  `alamat_rumah_sakit` varchar(255) NOT NULL,
  `deskripsi_rumah_sakit` varchar(255) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rumah_sakit`
--

INSERT INTO `rumah_sakit` (`id_rumah_sakit`, `nama_rumah_sakit`, `alamat_rumah_sakit`, `deskripsi_rumah_sakit`, `status`) VALUES
(1, 'Sentosa', 'Subang, Ciereng', 'Rumah Sakit Umum', NULL),
(2, 'Hospital', 'subangg', 'Rumah sakit terdekat dari kabupaten Cibogo', NULL),
(3, 'RSUD Ciereng', 'Ciereng, Subang, Jawa Barat', 'Rumah Sakit Umum Buka 24 jam', NULL),
(4, 'Oliva Tania Utami M.M.', 'Ds. Banal No. 812, Payakumbuh 34663, Sulsel', 'Prabumulih', NULL),
(5, 'Kayun Prasasta', 'Gg. BKR No. 261, Probolinggo 16931, Sumut', 'Pangkal Pinang', NULL),
(6, 'Margana Pangestu Dongoran S.E.I', 'Gg. Babah No. 269, Depok 40465, DKI', 'Tomohon', 'Cancle'),
(7, 'Hesti Palastri', 'Ds. Sutami No. 252, Tidore Kepulauan 33308, Aceh', 'Kendari', NULL),
(8, 'Bancar Simanjuntak', 'Kpg. Warga No. 341, Pematangsiantar 89115, Pabar', 'Tual', NULL),
(9, 'Aditya Suryono M.Ak', 'Psr. Gatot Subroto No. 861, Yogyakarta 59152, Jatim', 'Depok', 'Cancle'),
(10, 'Cinthia Nuraini M.M.', 'Jr. Baabur Royan No. 362, Bengkulu 40167, NTT', 'Tebing Tinggi', 'Cancle'),
(11, 'Dalimin Budiman', 'Dk. Tambun No. 331, Tebing Tinggi 41492, Malut', 'Pekalongan', NULL),
(12, 'Emil Megantara S.IP', 'Ki. Bakti No. 80, Parepare 63114, Gorontalo', 'Cilegon', 'Cancle'),
(13, 'Zahra Suartini', 'Ki. Tubagus Ismail No. 810, Padang 42003, Papua', 'Subulussalam', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nilai_leader` int(11) DEFAULT NULL,
  `nilai_hrd` int(11) DEFAULT NULL,
  `role` enum('Leader','Karyawan','HRD','') NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `jenis_kelamin`, `email`, `password`, `nilai_leader`, `nilai_hrd`, `role`, `status`) VALUES
(1, 'Alex', 'Laki-laki', 'leader@gmail.com', '123', NULL, NULL, 'Leader', NULL),
(2, 'Udin', 'Laki-laki', 'karyawan@gmail.com', '123', 6, 6, 'Karyawan', 'Implementor'),
(3, 'John', 'Laki-laki', 'john@gmail.com', '123', 6, 6, 'Karyawan', 'Implementor'),
(6, 'contoh', 'Perempuan', 'contoh@gmail.com', '123', 6, 6, 'Karyawan', 'Implementor'),
(7, 'karyawan1', 'Laki-laki', 'karyawan1@gmail.com', '123', 6, 6, 'Karyawan', 'Implementor'),
(8, 'karyawan2', 'Perempuan', 'karyawan2@gmail.com', '123', 6, 6, 'Karyawan', 'Implementor'),
(13, 'Putri', 'Perempuan', 'putri@gmail.com', '123', 6, 6, 'Karyawan', 'Implementor'),
(14, 'Susanti', 'Perempuan', 'susanti@gmail.com', '123', 6, 6, 'Karyawan', 'Diterima'),
(15, 'Rendi', 'Laki-laki', 'rendi@gmail.com', '123', NULL, NULL, 'Karyawan', NULL),
(16, 'Putri', 'Perempuan', 'hrd@gmail.com', '123', NULL, NULL, 'HRD', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `implementor`
--
ALTER TABLE `implementor`
  ADD PRIMARY KEY (`id_implementor`),
  ADD KEY `id_rumah_sakit` (`id_rumah_sakit`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`),
  ADD KEY `id_implementor` (`id_implementor`);

--
-- Indexes for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  ADD PRIMARY KEY (`id_rumah_sakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `implementor`
--
ALTER TABLE `implementor`
  MODIFY `id_implementor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  MODIFY `id_rumah_sakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `implementor`
--
ALTER TABLE `implementor`
  ADD CONSTRAINT `implementor_ibfk_1` FOREIGN KEY (`id_rumah_sakit`) REFERENCES `rumah_sakit` (`id_rumah_sakit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `implementor_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `pekerjaan_ibfk_1` FOREIGN KEY (`id_implementor`) REFERENCES `implementor` (`id_implementor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
