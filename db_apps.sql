-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 09:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_fortune`
--

CREATE TABLE `data_fortune` (
  `id` int(11) NOT NULL,
  `name_fortune` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_fortune`
--

INSERT INTO `data_fortune` (`id`, `name_fortune`) VALUES
(1, 'Mobil'),
(3, 'Motor'),
(4, 'Laptop mac book air'),
(5, 'Laptop mac book pro'),
(6, 'Iphone');

-- --------------------------------------------------------

--
-- Table structure for table `hadiah_undian`
--

CREATE TABLE `hadiah_undian` (
  `No_undian` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `Nama_hadiah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hadiah_undian`
--

INSERT INTO `hadiah_undian` (`No_undian`, `id`, `Nama_hadiah`) VALUES
(1, 2, 'Motor'),
(2, 3, 'Tofik'),
(3, 4, 'Skuter'),
(4, 5, 'cilok'),
(5, 6, 'Batagor'),
(8, 9, 'Nasi kuning'),
(89, 29, 'mie'),
(78, 30, 'remot');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `posisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `posisi`) VALUES
(1, 'Master', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_modul` varchar(150) NOT NULL,
  `link_menu` text NOT NULL,
  `link_folder` text NOT NULL,
  `posisi` int(11) NOT NULL,
  `icon_menu` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `id_menu`, `nama_modul`, `link_menu`, `link_folder`, `posisi`, `icon_menu`) VALUES
(1, 1, 'Data Fortune', 'index.php?page=data_fortune', 'pages/data_fortune/data_fortune.php', 1, 'fa fa-anchor'),
(3, 1, 'Nama Hadiah', 'index.php?page=hadiah_undian', 'pages/hadiah_undian/hadiah_undian.php', 2, 'fa fa-archive');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(45) NOT NULL,
  `usernm` varchar(20) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `usernm`, `passwd`, `level`, `last_login`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2022-05-18 09:15:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_fortune`
--
ALTER TABLE `data_fortune`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hadiah_undian`
--
ALTER TABLE `hadiah_undian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_fortune`
--
ALTER TABLE `data_fortune`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hadiah_undian`
--
ALTER TABLE `hadiah_undian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
