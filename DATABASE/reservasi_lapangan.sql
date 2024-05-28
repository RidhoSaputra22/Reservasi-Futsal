-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2024 at 04:10 PM
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
-- Database: `reservasi_lapangan`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `lapangan_kosong`
-- (See below for the actual view)
--
CREATE TABLE `lapangan_kosong` (
`id_reservasi` int
,`id_user` int
,`id_lapangan` int
,`masuk` time
,`keluar` time
,`status` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lapangan`
--

CREATE TABLE `tb_lapangan` (
  `id_lapangan` int NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` int NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_lapangan`
--

INSERT INTO `tb_lapangan` (`id_lapangan`, `kondisi`, `status`, `jenis`, `harga`, `deskripsi`, `foto`) VALUES
(9, 'Baik', 'Tersedia', 'Biasa', 200000, 'Lapangan dengan rumput sintetis', '1715225235.jpg'),
(10, 'Baik', 'Tersedia', 'Biasa', 20000, 'Lapangan Bagus', '1715225398.jpg'),
(11, 'Baik', 'ok', 'Biasa', 20000, 'kkks', '1715463268.jpg'),
(12, 'Baik', 'ok', 'Biasa', 20000, 'kkks', '1715463288.jpg'),
(13, 'Baik', 'ok', 'Biasa', 250000, 'kkks', '1715463318.jpg'),
(15, 'Baik', 'Tersedia', '131', 75000, 'jbjb', '1715519452.jpg'),
(16, 'Baik', 'Tersedia', 'Sintetis', 120000, 'bla', '1716836069.jpg'),
(17, 'Baik', 'Tersedia', 'Rumput Asli', 2432, 'q42q', '1716836113.jpg'),
(18, 'Baik', 'Tersedia', 'Rumput Biasa', 23, '2432', '1716836340.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int NOT NULL,
  `id_user` int NOT NULL,
  `id_lapangan` int NOT NULL,
  `masuk` text NOT NULL,
  `keluar` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `id_reservasi` int NOT NULL,
  `id_user` int NOT NULL,
  `id_lapangan` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `masuk` time DEFAULT NULL,
  `keluar` time DEFAULT NULL,
  `total_harga` int NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_reservasi`
--

INSERT INTO `tb_reservasi` (`id_reservasi`, `id_user`, `id_lapangan`, `nama`, `hp`, `tanggal`, `masuk`, `keluar`, `total_harga`, `status`) VALUES
(34, 20, 12, 'Fikri', '08123131231', '2024-05-13', '01:51:00', '03:51:00', 40000, 'Sudah'),
(35, 20, 9, 'Fikri', '08123131231', '2024-05-13', '01:52:00', '02:52:00', 200000, 'Selesai'),
(36, 22, 18, 'c', 'j', '2024-05-28', '04:54:00', '05:54:00', 23, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int NOT NULL,
  `id_user` int NOT NULL,
  `id_reservasi` int NOT NULL,
  `metode_pembayaran` text NOT NULL,
  `jumlah_pembayaran` int NOT NULL,
  `waktu_pembayaran` text NOT NULL,
  `status_pembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hp` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama`, `alamat`, `hp`, `foto`, `username`, `password`, `role`) VALUES
(2, 'PUTRA', 'Perintis', '08123343223', '1715499196.jpg', 'test', 'admin', 'admin'),
(3, 'Putra', 'Perintis', '08123343223', '2024-05-04', 'test', 'super', 'superadmin'),
(20, 'Fikri', 'Sudiang', '08123131231', '1715536234.jpg', 'fikri', 'fikri', 'user'),
(22, 'c', 'j', 'j', '1716843263.jpg', 'n', 'n', 'user'),
(24, 'Surya', 'Sudiang', '0808080', '1716912593.png', 'sudiangJaya', 'Sudianh13', 'user');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_reservasi`
-- (See below for the actual view)
--
CREATE TABLE `view_reservasi` (
`id_reservasi` int
,`id_user` int
,`id_lapangan` int
,`masuk` time
,`tanggal` date
,`keluar` time
,`status` varchar(255)
,`total_harga` int
,`nama` varchar(255)
,`hp` varchar(255)
,`alamat` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `lapangan_kosong`
--
DROP TABLE IF EXISTS `lapangan_kosong`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lapangan_kosong`  AS SELECT `tb_reservasi`.`id_reservasi` AS `id_reservasi`, `tb_reservasi`.`id_user` AS `id_user`, `tb_reservasi`.`id_lapangan` AS `id_lapangan`, `tb_reservasi`.`masuk` AS `masuk`, `tb_reservasi`.`keluar` AS `keluar`, `tb_reservasi`.`status` AS `status` FROM `tb_reservasi` WHERE ((`tb_reservasi`.`keluar` <= now()) OR (`tb_reservasi`.`masuk` >= now()))  ;

-- --------------------------------------------------------

--
-- Structure for view `view_reservasi`
--
DROP TABLE IF EXISTS `view_reservasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_reservasi`  AS SELECT `tb_reservasi`.`id_reservasi` AS `id_reservasi`, `tb_reservasi`.`id_user` AS `id_user`, `tb_reservasi`.`id_lapangan` AS `id_lapangan`, `tb_reservasi`.`masuk` AS `masuk`, `tb_reservasi`.`tanggal` AS `tanggal`, `tb_reservasi`.`keluar` AS `keluar`, `tb_reservasi`.`status` AS `status`, `tb_reservasi`.`total_harga` AS `total_harga`, `tb_users`.`nama` AS `nama`, `tb_users`.`hp` AS `hp`, `tb_users`.`alamat` AS `alamat` FROM (`tb_reservasi` left join `tb_users` on((`tb_reservasi`.`id_user` = `tb_users`.`id_user`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_lapangan`
--
ALTER TABLE `tb_lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_lapangan` (`id_lapangan`);

--
-- Indexes for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_lapangan` (`id_lapangan`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_reservasi` (`id_reservasi`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_lapangan`
--
ALTER TABLE `tb_lapangan`
  MODIFY `id_lapangan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  MODIFY `id_reservasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD CONSTRAINT `tb_reservasi_ibfk_2` FOREIGN KEY (`id_lapangan`) REFERENCES `tb_lapangan` (`id_lapangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_reservasi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
