-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2017 at 10:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `splib`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id` int(11) NOT NULL,
  `nama_buku` varchar(200) NOT NULL,
  `synopsis` text NOT NULL,
  `pengarang` varchar(200) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `kategori_buku` varchar(100) NOT NULL,
  `cover_book` varchar(100) NOT NULL,
  `thumbnail_book` varchar(200) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_patch` varchar(200) NOT NULL,
  `location` varchar(100) NOT NULL,
  `create_user` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_user` varchar(200) NOT NULL,
  `update_date` datetime NOT NULL,
  `kondisi` varchar(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `create_owner` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_user` varchar(200) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `kategori`, `description`, `create_owner`, `create_date`, `update_user`, `update_date`) VALUES
(1, 'Akuntansi', 'Ini Buku Akuntansi', '302716', '2017-01-26 16:45:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `create_owner` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_owner` varchar(200) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `activity` varchar(200) NOT NULL,
  `activity_description` text NOT NULL,
  `activity_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_computer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`id`, `user_id`, `activity`, `activity_description`, `activity_time`, `ip_computer`) VALUES
(1, '4', 'INSERT', 'Register Heru Anggisa As User', '2016-12-26 16:25:05', '::1'),
(2, '4', 'INSERT', 'Register Rifaldy As As User', '2016-12-26 16:25:45', '::1'),
(3, '4', 'Logout', ' Trying Logout from the System & Successfull!!', '2016-12-26 17:00:30', '::1'),
(4, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2016-12-26 17:02:00', '::1'),
(5, '4', 'Logout', ' Trying Logout from the System & Successfull!!', '2016-12-26 17:02:03', '::1'),
(6, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2016-12-27 07:36:38', '::1'),
(7, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2016-12-27 08:06:17', '::1'),
(8, '4', 'Logout', ' Trying Logout from the System & Successfull!!', '2016-12-27 08:44:11', '::1'),
(9, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2016-12-27 08:46:03', '::1'),
(10, '4', 'Logout', ' Trying Logout from the System & Successfull!!', '2016-12-27 08:47:28', '::1'),
(11, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2016-12-27 08:48:11', '::1'),
(12, '4', 'Logout', ' Trying Logout from the System & Successfull!!', '2016-12-27 08:48:14', '::1'),
(13, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2016-12-27 08:49:34', '::1'),
(14, '4', 'Logout', 'Hari anto  Trying Logout from the System & Successfull!!', '2016-12-27 08:49:37', '::1'),
(15, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2016-12-27 08:49:43', '::1'),
(16, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2016-12-27 12:23:21', '::1'),
(17, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2016-12-27 13:20:07', '::1'),
(18, '4', 'DELETE', 'Permanently Delete User ID : Rifaldy As', '2016-12-27 13:23:04', '::1'),
(19, '4', 'DELETE', 'Permanently Delete User ID : Heru Anggisa', '2016-12-27 13:23:08', '::1'),
(20, '4', 'INSERT', 'Register Ridho Nurdiwijaya As User', '2016-12-27 13:37:47', '::1'),
(21, '4', 'RESET', 'Reset Password user : Ridho Nurdiwijaya', '2016-12-27 13:37:54', '::1'),
(22, '4', 'Logout', 'Hari anto  Trying Logout from the System & Successfull!!', '2016-12-27 13:38:04', '::1'),
(23, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2016-12-27 13:38:23', '::1'),
(24, '4', 'Logout', 'Hari anto  Trying Logout from the System & Successfull!!', '2016-12-27 13:38:44', '::1'),
(25, '7', 'Login', 'Ridho Nurdiwijaya Trying Login to the System & Successfull!!', '2016-12-27 13:38:48', '::1'),
(26, '7', 'RESET', 'Reset Password user : Ridho Nurdiwijaya', '2016-12-27 13:40:03', '::1'),
(27, '7', 'Logout', 'Ridho Nurdiwijaya Trying Logout from the System & Successfull!!', '2016-12-27 13:40:19', '::1'),
(28, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2016-12-27 13:40:26', '::1'),
(29, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2016-12-27 13:42:45', '192.168.22.88'),
(30, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2016-12-28 07:55:06', '::1'),
(31, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2016-12-28 13:44:00', '::1'),
(32, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2016-12-29 21:00:56', '::1'),
(33, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-04 08:10:47', '192.168.1.158'),
(34, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-16 09:43:02', '::1'),
(35, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-16 13:59:29', '::1'),
(36, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-18 08:59:08', '::1'),
(37, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-18 11:54:24', '::1'),
(38, '4', 'Logout', 'Hari anto  Trying Logout from the System & Successfull!!', '2017-01-18 12:12:12', '::1'),
(39, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-18 12:12:19', '::1'),
(40, '4', 'Logout', 'Hari anto  Trying Logout from the System & Successfull!!', '2017-01-18 12:13:23', '::1'),
(41, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-18 12:13:33', '::1'),
(42, '4', 'Logout', 'Hari anto  Trying Logout from the System & Successfull!!', '2017-01-18 12:50:01', '::1'),
(43, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-18 12:50:13', '::1'),
(44, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-18 14:29:34', '::1'),
(45, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-18 15:06:47', '::1'),
(46, '4', 'Logout', 'Hari anto  Trying Logout from the System & Successfull!!', '2017-01-18 15:26:59', '::1'),
(47, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-18 15:27:12', '::1'),
(48, '4', 'Logout', 'Hari anto  Trying Logout from the System & Successfull!!', '2017-01-18 15:28:02', '::1'),
(49, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-18 15:28:07', '::1'),
(50, '4', 'Logout', 'Hari anto  Trying Logout from the System & Successfull!!', '2017-01-18 15:28:35', '::1'),
(51, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-18 15:28:40', '::1'),
(52, '4', 'Logout', 'Hari anto  Trying Logout from the System & Successfull!!', '2017-01-18 15:36:21', '::1'),
(53, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-18 15:36:33', '::1'),
(54, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-19 07:31:02', '::1'),
(55, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-23 14:43:43', '::1'),
(56, '4', 'Logout', 'Hari anto  Trying Logout from the System & Successfull!!', '2017-01-23 14:44:31', '::1'),
(57, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-23 14:44:38', '::1'),
(58, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-23 14:45:07', '::1'),
(59, '4', 'Logout', 'Hari anto  Trying Logout from the System & Successfull!!', '2017-01-23 15:12:07', '127.0.0.1'),
(60, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-23 15:12:19', '127.0.0.1'),
(61, '4', 'Logout', 'Hari anto  Trying Logout from the System & Successfull!!', '2017-01-23 15:16:01', '::1'),
(62, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-23 15:16:15', '::1'),
(63, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-25 11:16:09', '::1'),
(64, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-25 11:39:09', '::1'),
(65, '4', 'Logout', 'Hari anto  Trying Logout from the System & Successfull!!', '2017-01-25 13:17:10', '::1'),
(66, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-26 15:13:48', '::1'),
(67, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-26 16:42:52', '::1'),
(68, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-01-31 16:59:25', '::1'),
(69, '4', 'Login', 'Hari anto  Trying Login to the System & Successfull!!', '2017-02-09 16:55:22', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id` int(11) NOT NULL,
  `code` varchar(200) NOT NULL,
  `user` varchar(15) NOT NULL,
  `buku` varchar(15) NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembali` datetime NOT NULL,
  `tgl_kembali_actual` datetime NOT NULL,
  `operator_pinjam` varchar(20) NOT NULL,
  `operator_kembali` varchar(20) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_number` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(200) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  `create_owner` varchar(45) DEFAULT NULL,
  `photos` varchar(500) NOT NULL,
  `thumbnail` varchar(200) NOT NULL,
  `patch` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `password`, `birth_date`, `email`, `id_number`, `address`, `phone_number`, `create_date`, `last_login`, `token`, `level`, `active`, `create_owner`, `photos`, `thumbnail`, `patch`) VALUES
(4, 'Hari anto ', '827ccb0eea8a706c4c34a16891f84e7b', '1996-11-16', 'masharry.net@gmail.com', '356373457', 'asdfgjkjgkjg', '081310527999', '2016-12-23 18:22:53', '2016-12-23 18:22:53', 'cda90de1-7fb4-433b-9092-dec9a1d20ef8', 3, 1, '0', '1485159541Hydrangeas.jpg', '1485159541Hydrangeas_thumb.jpg', '/assets/uploads/ProfilePhoto/'),
(7, 'Ridho Nurdiwijaya', '827ccb0eea8a706c4c34a16891f84e7b', '1995-12-12', 'Ridho.nr@gmail.com', '654684984684', '', '021325142254', '2016-12-27 13:37:47', '2016-12-27 13:37:47', '4acc0ad3-63ad-4666-a574-d3445744dda8', 1, 1, '4', '', '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_statistik_activity`
--
CREATE TABLE `view_statistik_activity` (
`Activity` varchar(10)
,`Login` decimal(23,0)
,`Logout` decimal(23,0)
,`Register` decimal(23,0)
,`Removed` decimal(23,0)
,`Updated` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tbl_log`
--
CREATE TABLE `view_tbl_log` (
`id` int(11)
,`user_id` varchar(50)
,`name` varchar(100)
,`activity` varchar(200)
,`activity_description` text
,`activity_time` datetime
,`ip_computer` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view_statistik_activity`
--
DROP TABLE IF EXISTS `view_statistik_activity`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_statistik_activity`  AS  select date_format(`tbl_log`.`activity_time`,'%d/%m/%Y') AS `Activity`,sum((case when (`tbl_log`.`activity` = 'LOGIN') then 1 else 0 end)) AS `Login`,sum((case when (`tbl_log`.`activity` = 'LOGOUT') then 1 else 0 end)) AS `Logout`,sum((case when (`tbl_log`.`activity` = 'INSERT') then 1 else 0 end)) AS `Register`,sum((case when (`tbl_log`.`activity` = 'DELETE') then 1 else 0 end)) AS `Removed`,sum((case when (`tbl_log`.`activity` = 'UPDATE') then 1 else 0 end)) AS `Updated` from `tbl_log` group by date_format(`tbl_log`.`activity_time`,'%d/%m/%Y') ;

-- --------------------------------------------------------

--
-- Structure for view `view_tbl_log`
--
DROP TABLE IF EXISTS `view_tbl_log`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tbl_log`  AS  select `tbl_log`.`id` AS `id`,`tbl_log`.`user_id` AS `user_id`,`tbl_user`.`name` AS `name`,`tbl_log`.`activity` AS `activity`,`tbl_log`.`activity_description` AS `activity_description`,`tbl_log`.`activity_time` AS `activity_time`,`tbl_log`.`ip_computer` AS `ip_computer` from (`tbl_log` join `tbl_user` on((`tbl_log`.`user_id` = `tbl_user`.`id`))) order by `tbl_log`.`activity_time` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
