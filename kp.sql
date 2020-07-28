-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2020 at 02:08 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_dosen`
--

CREATE TABLE `form_dosen` (
  `id_dosen` int(1) NOT NULL,
  `user_id` int(1) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `NIK` varchar(9) NOT NULL,
  `kebutuhan` text NOT NULL,
  `keperluan` text NOT NULL,
  `file` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_dosen`
--

INSERT INTO `form_dosen` (`id_dosen`, `user_id`, `nama_dosen`, `NIK`, `kebutuhan`, `keperluan`, `file`, `status`) VALUES
(27, 35, 'lala', '123456789', 'surat dinas', 'tugas negara', 'jurnal4.docx', 0);

-- --------------------------------------------------------

--
-- Table structure for table `form_mahasiswa`
--

CREATE TABLE `form_mahasiswa` (
  `id_mhs` int(1) NOT NULL,
  `user_id` int(1) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `NPM` varchar(12) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `kebutuhan` text NOT NULL,
  `keperluan` text NOT NULL,
  `tgl_input` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_mahasiswa`
--

INSERT INTO `form_mahasiswa` (`id_mhs`, `user_id`, `nama_mahasiswa`, `tempat_lahir`, `tanggal_lahir`, `NPM`, `semester`, `kebutuhan`, `keperluan`, `tgl_input`, `tgl_selesai`, `status`) VALUES
(29, 34, 'anjhel', 'Bogor', '1999-09-09', '161105151065', '8', 'surat keterangan aktif', 'keperluan tertentu', '2020-03-14', '2020-03-16', 0),
(30, 33, 'Lievia Anjhelina Maharani', 'Bogor', '1998-08-28', '161105150552', '8', 'surat keterangan aktif', 'Sidang Skripsi', '2020-03-14', '2020-03-16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id_notif` int(1) NOT NULL,
  `user_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id_notif`, `user_id`) VALUES
(50, 33),
(48, 34),
(49, 35);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `NPM` varchar(12) DEFAULT NULL,
  `NIK` varchar(9) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(1) NOT NULL,
  `aktif` int(1) NOT NULL,
  `dibuat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `NPM`, `NIK`, `password`, `role_id`, `aktif`, `dibuat`) VALUES
(33, 'Lievia Anjhelina Maharani', 'lieviaanjhelinam28@gmail.com', '161105150552', '', '$2y$10$U7OhV3xRYtvMPVq1G9qeO.Wq1uzZhLIgdktMwkGsRSwI/vlYrhNL6', 2, 1, 1584192213),
(34, 'anjhel', 'lieviaaaaaanm@gmail.com', '161105151065', '', '$2y$10$P7E38qOx0k7ir0tsfIi3z.a559KDceC5m0Lhgd3nlhZrvbPmetnx.', 2, 1, 1584192448),
(35, 'lala', 'lala28nana@gmail.com', '', '123456789', '$2y$10$n9B2po2qSQq/lOY5k6n.ieVoTki6YkwDq7dIr8W//p8ZOcHbmHKje', 3, 1, 1584192764),
(36, 'oliv', 'oolive697@gmail.com', '', '', '$2y$10$F5yP623pc3VHzrsFSHLiY.MpppAtOYyO0mjxTIb2JU8byc2mg675u', 1, 1, 1584193248);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access` int(1) NOT NULL,
  `role_id` int(1) NOT NULL,
  `menu_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_access`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(4, 1, 4),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(1) NOT NULL,
  `menu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`) VALUES
(1, 'Admin'),
(2, 'Mahasiswa'),
(3, 'Dosen'),
(4, 'Data Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(1) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Dosen'),
(3, 'mahasiswa\r');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_sub` int(1) NOT NULL,
  `menu_id` int(1) NOT NULL,
  `title` varchar(30) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_sub`, `menu_id`, `title`, `url`, `icon`, `aktif`) VALUES
(2, 1, 'Form Mahasiswa', 'admin/form_mahasiswa', 'fas fa-fw fa-folder ', 1),
(3, 1, 'Form Dosen', 'admin/form_dosen', 'fas fa-fw fa-folder ', 1),
(5, 2, 'Halaman Awal', 'user/h_mhs', 'fas fa-fw fa-user', 1),
(6, 2, 'Input Form', 'user/mahasiswa', 'fas fa-fw fa-user ', 1),
(7, 3, 'Halaman Awal', 'User/h_dosen', 'fas fa-fw fa-user', 1),
(8, 3, 'Input Form', 'user/dosen', 'fas fa-fw fa-user', 1),
(9, 4, 'Mahasiswa', 'admin/selesaimhs', 'fas fa-fw fa-folder-open', 1),
(10, 4, 'Dosen', 'admin/selesaidosen', 'fas fa-fw fa-folder-open', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(128) NOT NULL,
  `dibuat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_dosen`
--
ALTER TABLE `form_dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `form_mahasiswa`
--
ALTER TABLE `form_mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id_notif`),
  ADD KEY `id_user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access`),
  ADD KEY `role_id` (`role_id`,`menu_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_dosen`
--
ALTER TABLE `form_dosen`
  MODIFY `id_dosen` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `form_mahasiswa`
--
ALTER TABLE `form_mahasiswa`
  MODIFY `id_mhs` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id_notif` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_dosen`
--
ALTER TABLE `form_dosen`
  ADD CONSTRAINT `form_dosen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `form_mahasiswa`
--
ALTER TABLE `form_mahasiswa`
  ADD CONSTRAINT `form_mahasiswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `notif`
--
ALTER TABLE `notif`
  ADD CONSTRAINT `notif_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id_menu`);

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
