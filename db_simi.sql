-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2023 at 08:41 AM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u7437287_simi`
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
(23, 1, 31, 'putray@gmail.com', '2023-07-17', '2023-07-18', NULL),
(24, 2, 32, 'fitri@gmail.com', '2023-07-18', '2023-07-20', NULL),
(25, 2, 33, 'afdal@gmail.com', '2023-07-18', '2023-07-20', NULL),
(26, 7, 34, 'rifki@gmail.com', '2023-07-17', '2023-07-17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `leader_public_speaking` int(11) DEFAULT NULL,
  `leader_tanya_jawab` int(11) DEFAULT NULL,
  `leader_soal` int(11) DEFAULT NULL,
  `hrd_public_speaking` int(11) DEFAULT NULL,
  `hrd_tanya_jawab` int(11) DEFAULT NULL,
  `hrd_soal` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `leader_public_speaking`, `leader_tanya_jawab`, `leader_soal`, `hrd_public_speaking`, `hrd_tanya_jawab`, `hrd_soal`, `id_user`) VALUES
(10, 3, 3, 3, 2, 2, 3, 31),
(11, 2, 2, 1, 2, 1, 3, 32),
(12, 2, 2, 2, 2, 3, 3, 33),
(13, 3, 3, 3, 2, 2, 2, 34);

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

-- --------------------------------------------------------

--
-- Table structure for table `rumah_sakit`
--

CREATE TABLE `rumah_sakit` (
  `id_rumah_sakit` int(11) NOT NULL,
  `nama_rumah_sakit` varchar(50) NOT NULL,
  `alamat_rumah_sakit` varchar(255) NOT NULL,
  `deskripsi_rumah_sakit` varchar(255) NOT NULL,
  `tgl_mulai_kerjasama` date DEFAULT NULL,
  `tgl_akhir_kerjasama` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rumah_sakit`
--

INSERT INTO `rumah_sakit` (`id_rumah_sakit`, `nama_rumah_sakit`, `alamat_rumah_sakit`, `deskripsi_rumah_sakit`, `tgl_mulai_kerjasama`, `tgl_akhir_kerjasama`, `status`) VALUES
(1, 'RSU Mamami', 'alan R. W. Monginsidi I No. 3, Pasir Panjang, Kec. Kota Lama, Kota Kupang, Nusa Tenggara Tim. 85228', 'Fasilitas Rumah Sakit Umum Mamami Kupang:\r\n\r\n1. INSTALASI GAWAT DARURAT (IGD)\r\n2. INSTALASI FARMASI\r\n3. LABORATORIUM\r\n4. Ruang Operasi\r\n5. Ruang VK\r\n6. Poliklinik Anak\r\n7. Poliklinik Obgyn\r\n8. Poliklinik Penyakit Dalam\r\n9. Poliklinik Bedah\r\n10. Ruang Pera', '2023-07-17', '2023-07-18', 'Cancle'),
(2, 'RSUD A.M. Parikesit', 'Jalan Ratu Agung No. 1, Tenggarong Seberang 75572, Kutai Kartanegara Kalimantan Timur', 'Rumah sakit terdekat dari kabupaten Cibogo', '2023-07-18', '2023-07-20', NULL),
(3, 'JHC Tasikmalaya', 'Kecamatan Cipedes, Tasikmalaya, Jawa Barat', 'Rumah Sakit Jantung dan Pembuluh Darah', NULL, NULL, NULL),
(4, 'RS Samboja', 'Jl, Seluang River, Samboja, Kutai Kartanegara Regency, East Kalimantan 75274', 'Terdapat layanan unggulan yaitu Hemodialisis, CT Scan', NULL, NULL, NULL),
(5, 'Kayun Prasasta', 'Gg. BKR No. 261, Probolinggo 16931, Sumut', 'Pangkal Pinang', NULL, NULL, NULL),
(6, 'Kardia Eye Center', 'Jl. Matraman Raya No.61A, RW.4, Palmeriam, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13140', 'Rumah Sakit sebagai sebuah perusahaan yang bergerak di bidang kesehatan dengan spesialisasi jantung dan pembuluh darah serta penyakit kronis lainnya', NULL, NULL, NULL),
(7, 'RS Harapan Jayakarta ', 'Blok KM No.18, Jl. Raya Bekasi No.7, RW.11, Jatinegara, Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13930', 'Rumah Sakit Poliklinik Paru dan Poliklinik Saraf\r\n', '2023-07-17', '2023-07-17', NULL),
(8, 'RS Universitas Indonesia ', 'Jl. Prof. DR. Bahder Djohan, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424', 'Rumah Sakit Universitas Indonesia atau disingkat RS UI adalah rumah sakit universitas tipe B yang terletak area Universitas Indonesia. RS UI yang dibangun sejak tahun 2009 dan direncanakan beroperasi pada Oktober 2016 memiliki pelayanan unggulan di bidang', NULL, NULL, NULL),
(9, 'Rumah Sakit Husada', 'Jl. Raya Mangga Besar No.137-139, Mangga Dua Sel., Kecamatan Sawah Besar, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10730', 'Rumah Sakit Husada, dahulu Jang Seng Ie, adalah sebuah rumah sakit umum di Jakarta Pusat, Indonesia. Didirikan sebagai poliklinik oleh Dr. Kwa Tjoan Sioe pada tahun 1924, dan diresmikan penggunaannya pada tahun berikutnya.', NULL, NULL, NULL),
(10, 'RSIA Tambah', 'Jl. Tambak No.18, Pegangsaan, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10320', 'RSIA Tambak adalah Rumah Sakit Terbaik untuk Ibu dan Anak yang berada di Jakarta Pusat. Yang menerapkan program IMD.', NULL, NULL, NULL),
(11, 'DRI CLINIC', 'Jl. Terogong Raya No.52 E, RT.9/RW.10, Cilandak Bar., Kec. Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12430', 'Klinik Spesialis\r\n', NULL, NULL, NULL),
(12, 'Klinik Sakti Medika', 'Jl. Tebet Barat I No.5, RT.1/RW.2, Tebet Bar., Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12810 ', 'Klinik Sakti Medika pertama kali didirikan pada tanggal 18 Desember 1996 sebagai Praktek Dokter Bersama Spesialis (PDBS)', NULL, NULL, NULL),
(13, 'RSIA Tumbuh Kembang', 'Jl. Raya Bogor No.Km.31, Tugu, Kec. Cimanggis, Kabupaten Bogor, Jawa Barat 16951', 'RSIA Tumbuh Kembang adalah sebuah rumah sakit swasta yang berada di Kota Depok, Jawa Barat. Didirikan pada tanggal 13 Juni 2011 atas prakarsa PT. Endraz Medica. RSIA Tumbuh Kembang dibangun atas prakarsa PT. Endraz Medica. ', NULL, NULL, NULL),
(18, 'RSUD M Yunus', 'Jl. Bhayangkara, Sido Mulyo, Kec. Gading Cemp., Kota Bengkulu, Bengkulu 38211', 'Rumah Sakit Dr. M.Yunus Bengkulu sebagai rumah sakit rujukan tertinggi di propinsi Bengkulu, telah melaksanakan berbagai upaya yang ditujukan guna membantu penyembuhan pasien yang datang berobat ke rumah sakit. Upaya tersebut meliputi promotif, preventif,', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nilai_leader` int(11) DEFAULT NULL,
  `nilai_hrd` int(11) DEFAULT NULL,
  `role` enum('Leader','Karyawan','HRD','') NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `send_email` tinyint(1) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `jenis_kelamin`, `email`, `password`, `nilai_leader`, `nilai_hrd`, `role`, `foto`, `send_email`, `status`) VALUES
(1, 'Alexander', 'Laki-laki', 'leader@gmail.com', '123', NULL, NULL, 'Leader', NULL, NULL, NULL),
(16, 'Putri', 'Perempuan', 'hrd@gmail.com', '123', NULL, NULL, 'HRD', NULL, NULL, NULL),
(31, 'Putray', 'Perempuan', 'putray@gmail.com', '123', 9, 7, 'Karyawan', NULL, 1, 'Implementor'),
(32, 'Fitriani', 'Perempuan', 'fitri@gmail.com', '123', 5, 6, 'Karyawan', NULL, 1, 'Implementor'),
(33, 'Afdal Budiman', 'Perempuan', 'alfdal@gmail.com', '123', 6, 8, 'Karyawan', NULL, 1, 'Implementor'),
(34, 'Rifki Mawardi', 'Perempuan', 'rifki@gmail.com', '123', 9, 6, 'Karyawan', NULL, 1, 'Implementor');

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
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
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
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `implementor`
--
ALTER TABLE `implementor`
  MODIFY `id_implementor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  MODIFY `id_rumah_sakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `pekerjaan_ibfk_1` FOREIGN KEY (`id_implementor`) REFERENCES `implementor` (`id_implementor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
