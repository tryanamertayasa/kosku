-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 05:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosku`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `golongan` ()  BEGIN 
SELECT * FROM koskos;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pemilik_login` (IN `paramEmail` VARCHAR(50))  BEGIN 
    	SELECT * FROM pemilik_login WHERE email=paramEmail;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pemilik_register` (IN `$name` VARCHAR(50), IN `$email` VARCHAR(50), IN `$phone` VARCHAR(15), IN `$password` VARCHAR(300), IN `$address` VARCHAR(300), IN `$regencies` VARCHAR(10), IN `$zip_code` INT(5), IN `$birth_date` DATE)  BEGIN 
        INSERT INTO `pemilik_kos` (`name`, `email`, `no_hp`, `password`, `address`, `regencies`, `zip_code`, `birth_date`) VALUES($name, $email, $phone, $password, $address, $regencies, $zip_code, $birth_date); 
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_login` (IN `paramEmail` VARCHAR(50))  BEGIN 
    	SELECT * FROM `user` WHERE email=paramEmail;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_register` (IN `$name` VARCHAR(50), IN `$email` VARCHAR(50), IN `$phone` VARCHAR(15), IN `$password` VARCHAR(300))  BEGIN 
    	INSERT INTO user VALUES('',$name, $email, $phone, $password);
	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `email`, `password`) VALUES
(2, 'Admin 1', 'tryanamertayasa@gmail.com', '$2y$10$s5dTlFpqsKzda/Mg9wHhlulwKNlZFffZyBuAS8hx8wympXAmCxUae'),
(3, 'Pasha Admin', 'pasha@gmail.com', '$2y$10$pcQgxKjpqj3CBWVEc9Bxr.iYfXBMqmYNX/lW1vNMXG4JOjzNYsnPW'),
(4, 'Admin Asdos', 'asdos@gmail.com', '$2y$10$iZbbZfM8Q880y4ScBznfQOCnlLgTIXRVjzSWHFk47rGGcpTMabZ1u');

-- --------------------------------------------------------

--
-- Stand-in structure for view `alllist`
-- (See below for the actual view)
--
CREATE TABLE `alllist` (
`nama` varchar(50)
,`email` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `index_query`
-- (See below for the actual view)
--
CREATE TABLE `index_query` (
`id_kos` int(11)
,`title` varchar(100)
,`price` int(11)
,`id_location` int(11)
,`picture` varchar(300)
);

-- --------------------------------------------------------

--
-- Table structure for table `kos`
--

CREATE TABLE `kos` (
  `id_kos` int(11) NOT NULL,
  `id_pemilik_kos` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `id_location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kos`
--

INSERT INTO `kos` (`id_kos`, `id_pemilik_kos`, `title`, `price`, `description`, `id_location`) VALUES
(18, 1, 'kos tryana', 1000000, 'Kos murah cocok untuk mahasiswa                                ', 1),
(19, 1, 'kos pasha, murah', 750000, 'Kos bersih dan nyaman dengan harga yang murah                              ', 1),
(20, 1, 'kos ela', 100000, 'Kos mantap cocok untuk sultan dan dayang-dayangnya                                ', 1),
(23, 5, 'Kos Mewah Mantap', 3000000, 'Kos Elegan merupakan kos yang mewah dengan fasilitas yang \r\nlengkap seperti wifi,kolam renang, kamar mandi dalam, gym. \r\nkos elegan juga berdekatan dengan universitas udayana dan \r\npoliteknik negeri bali.', 1),
(24, 5, 'Kos Murah Cocok Untuk MABA', 700000, 'Kosnya murah, cocok untuk maba yang masuk unud                                ', 1),
(25, 6, 'Kos Beny Elegan Murah', 1300000, 'Terletak di lokasi yang strategis, kos ini cocok untuk segala kalangan.                                ', 4),
(29, 9, 'Kos Demo', 800000, 'Update data kos                                ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kos_galleries`
--

CREATE TABLE `kos_galleries` (
  `id_picture` int(11) NOT NULL,
  `id_kos` int(11) NOT NULL,
  `picture` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kos_galleries`
--

INSERT INTO `kos_galleries` (`id_picture`, `id_kos`, `picture`) VALUES
(23, 18, '60af9c3051b37.png'),
(24, 18, '60af9c305325c.png'),
(25, 18, '60af9c30543f4.png'),
(26, 18, '60af9c3055569.png'),
(27, 19, '60af9c5ccc324.png'),
(28, 19, '60af9c5ccc74c.png'),
(29, 19, '60af9c5cccb61.png'),
(30, 19, '60af9c5cccf12.png'),
(31, 20, '60b06b0966187.png'),
(32, 20, '60b06b0967388.png'),
(44, 23, '60b09468c4f34.jpg'),
(45, 23, '60b09468c52e0.jpg'),
(46, 23, '60b09468c56f2.jpg'),
(47, 23, '60b09468c59ed.jpg'),
(48, 24, '60b094dd24c93.jpg'),
(49, 24, '60b094dd25109.jpg'),
(50, 24, '60b094dd25557.jpg'),
(51, 24, '60b094dd259f6.jpg'),
(52, 25, '60b0957d9b5e4.jpg'),
(53, 25, '60b0957d9beef.jpg'),
(54, 25, '60b0957d9deed.jpg'),
(55, 25, '60b0957d9e3a9.jpg'),
(60, 18, '60b09765b93e4.jpeg'),
(61, 18, '60b09765bc24a.jpeg'),
(62, 18, '60b09765bc6d0.jpeg'),
(63, 18, '60b09765bca77.jpeg'),
(64, 19, '60b097977a6f0.jpeg'),
(65, 19, '60b097977ab79.jpeg'),
(66, 19, '60b097977af8d.jpeg'),
(67, 19, '60b097977b3a0.jpeg'),
(68, 20, '60b097b6a6863.jpeg'),
(69, 20, '60b097b6a6d60.jpeg'),
(70, 20, '60b097b6a71fe.jpeg'),
(71, 20, '60b097b6a765a.jpeg'),
(84, 29, '60b0b58fa75a1.jpg'),
(85, 29, '60b0b58fa7d6b.jpg'),
(86, 29, '60b0b58fa83dd.jpg'),
(87, 29, '60b0b58fae769.jpg'),
(88, 29, '60b0b5f6a21e5.jpg'),
(89, 29, '60b0b5f6a27a5.jpg'),
(90, 29, '60b0b5f6a2d13.jpg'),
(91, 29, '60b0b5f6a32fd.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `kos_mahasiswa`
-- (See below for the actual view)
--
CREATE TABLE `kos_mahasiswa` (
`id_kos` int(11)
,`title` varchar(100)
,`price` int(11)
,`id_location` int(11)
,`picture` varchar(300)
);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id_location` int(11) NOT NULL,
  `location` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id_location`, `location`) VALUES
(1, 'Badung'),
(2, 'Bangli'),
(3, 'Buleleng'),
(4, 'Denpasar'),
(5, 'Gianyar'),
(6, 'Jembrana'),
(7, 'Karangasem'),
(8, 'Klungkung'),
(9, 'Tabanan');

-- --------------------------------------------------------

--
-- Table structure for table `log_pemilik_kos`
--

CREATE TABLE `log_pemilik_kos` (
  `id_pemilik_kos` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `regencies` varchar(10) NOT NULL,
  `zip_code` int(5) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_pemilik_kos`
--

INSERT INTO `log_pemilik_kos` (`id_pemilik_kos`, `name`, `email`, `no_hp`, `password`, `address`, `regencies`, `zip_code`, `birth_date`) VALUES
(3, 'pasha', 'wayan@yahoo.com', '081337537455', '$2y$10$s8Ybnn9hApaVbUoV4C08vuw3LsUPMf0ZtVRRLyGbBduXxD8RMdbNy', '123', 'Badung', 80511, '2021-05-27'),
(4, 'asd', 'asd@gmail.com', '081337537455', '$2y$10$IiNYrk9Zn6dygI6/TmOyVOPz.4W4ntsBAmUv2rzKut19vX0mpBFA2', 'jln raya', 'badung', 80123, '2021-05-28'),
(7, 'beny elia', 'ela@gmail.com', '081337537455', '$2y$10$raufN3ddY3svUI/k/clJdeazMYri0yS.n3skhWt2qEsCFTfYNUeIa', 'asd', 'Badung', 80511, '2021-05-28'),
(8, 'Beny Elia Mantap', 'ela1@gmail.com', '081337537455', '$2y$10$TpZgREat4nVMzhrkoL8wMe1/IaCSuvLWg0sNN9Ad3rTOfXDP6qnj6', 'uluwatu', 'Badung', 80511, '2021-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE `log_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_user`
--

INSERT INTO `log_user` (`id_user`, `nama`, `email`, `no_hp`, `password`) VALUES
(3, 'pasha', 'pasha@gmail.com', '081337537455', '$2y$10$bpH7FfrNejNbqk2VWN9zLO.aor7sqQyS53VmbLZ2nqtfBSCFwbppm'),
(4, 'Amir Badu', 'badu@gmail.com', '081337537455', '$2y$10$5hWF4ONwIhdShVuJySFmpeQ4svXphDOntlDYy61VKLir3/lXqnuW6'),
(6, 'Prak Basdat', 'db@gmail.com', '081337537455', '$2y$10$0cg4F1AgbqbsLqr4SarPguSVRHOp7Bis3Q4eU69mKQFhGY5ucQYx.');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_kos`
--

CREATE TABLE `pemilik_kos` (
  `id_pemilik_kos` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `regencies` varchar(10) NOT NULL,
  `zip_code` int(5) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilik_kos`
--

INSERT INTO `pemilik_kos` (`id_pemilik_kos`, `name`, `email`, `no_hp`, `password`, `address`, `regencies`, `zip_code`, `birth_date`) VALUES
(1, 'Tryana Mertayasa', 'admin@gmail.com', '081337537455', '$2y$10$7hZlyyGSSta3aZ24UUAc/.91EF9cCu8kBhVHbJIxBsExUUtowH7YS', 'asd', 'asd', 123, '2021-05-23'),
(5, 'beny elia', 'beny@gmail.com', '081337537455', '$2y$10$3Q96rSo7GO8A4HGeJxPWeuCfvPEgjOCls2kUdfYCedAvT7RHDh5CS', 'asd', 'Badung', 80361, '2021-05-28'),
(6, 'beny elia', 'benyela@gmail.com', '081337537455', '$2y$10$zWSnm.XeZOLbygdj0HzWr.uA2mSQMuQaIVx.W0.2kZUZoxfqqAAr6', 'asd', 'Badung', 80511, '2021-05-28'),
(9, 'Asdos Basdat', 'dbs@gmail.com', '081337537455', '$2y$10$Key8r0PhZyB2CAoz6./vmuS03U5AmWqX4r.tK26Bf/6k7BMLRR7TS', 'uluwatu', 'Badung', 80511, '2021-05-28');

--
-- Triggers `pemilik_kos`
--
DELIMITER $$
CREATE TRIGGER `insert_log_pemilik_kos` AFTER DELETE ON `pemilik_kos` FOR EACH ROW BEGIN INSERT INTO `log_pemilik_kos` VALUES
    (OLD.id_pemilik_kos, OLD.name, OLD.email, OLD.no_hp, OLD.password, 
     OLD.address, OLD.regencies, OLD.zip_code, OLD.birth_date); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `pemilik_login`
-- (See below for the actual view)
--
CREATE TABLE `pemilik_login` (
`id_pemilik_kos` int(11)
,`email` varchar(50)
,`password` varchar(300)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `no_hp`, `password`) VALUES
(1, 'tryana mertayasa', 'admin@gmail.com', '081337537455', '$2y$10$xXnJG90YMA7t97AhBTxYl.D7zyA4MkXffiyCCOkk4RUWK2QRio3Lq'),
(5, 'Pasha Reniasan', 'pasharenaisan@gmail.com', '081337537455', '$2y$10$sCHAMCZQEkIh8TMrNGTyi.R5W/n8qRX0pcJ8OUWy80ZUegIw91yTu'),
(7, 'Basdat Tryana', 'dbtryanamertayasa@gmail.com', '081337537455', '$2y$10$TzD3AKFbZynKZxZbo1GJEOmBbo0OZgmasoDFmxUoIwjs6GiQVsDRG');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `insert_log_user` AFTER DELETE ON `user` FOR EACH ROW BEGIN INSERT INTO `log_user` VALUES
    (OLD.id_user, OLD.nama, OLD.email, OLD.no_hp, OLD.password); 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `alllist`
--
DROP TABLE IF EXISTS `alllist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `alllist`  AS SELECT `user`.`nama` AS `nama`, `user`.`email` AS `email` FROM `user` ;

-- --------------------------------------------------------

--
-- Structure for view `index_query`
--
DROP TABLE IF EXISTS `index_query`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `index_query`  AS SELECT `kos`.`id_kos` AS `id_kos`, `kos`.`title` AS `title`, `kos`.`price` AS `price`, `kos`.`id_location` AS `id_location`, `kos_galleries`.`picture` AS `picture` FROM (`kos` join `kos_galleries` on(`kos`.`id_kos` = `kos_galleries`.`id_kos`)) GROUP BY `kos`.`id_kos` ORDER BY `kos`.`id_kos` DESC LIMIT 0, 4 ;

-- --------------------------------------------------------

--
-- Structure for view `kos_mahasiswa`
--
DROP TABLE IF EXISTS `kos_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kos_mahasiswa`  AS SELECT `kos`.`id_kos` AS `id_kos`, `kos`.`title` AS `title`, `kos`.`price` AS `price`, `kos`.`id_location` AS `id_location`, max(`kos_galleries`.`picture`) AS `picture` FROM (`kos` join `kos_galleries` on(`kos`.`id_kos` = `kos_galleries`.`id_kos`)) WHERE `kos`.`price` between 500000 and 800000 GROUP BY `kos`.`id_kos` ;

-- --------------------------------------------------------

--
-- Structure for view `pemilik_login`
--
DROP TABLE IF EXISTS `pemilik_login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pemilik_login`  AS SELECT `pemilik_kos`.`id_pemilik_kos` AS `id_pemilik_kos`, `pemilik_kos`.`email` AS `email`, `pemilik_kos`.`password` AS `password` FROM `pemilik_kos` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kos`
--
ALTER TABLE `kos`
  ADD PRIMARY KEY (`id_kos`),
  ADD KEY `id_location` (`id_location`),
  ADD KEY `id_pemilik_kos` (`id_pemilik_kos`);

--
-- Indexes for table `kos_galleries`
--
ALTER TABLE `kos_galleries`
  ADD PRIMARY KEY (`id_picture`),
  ADD KEY `id_kos` (`id_kos`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`);

--
-- Indexes for table `log_pemilik_kos`
--
ALTER TABLE `log_pemilik_kos`
  ADD PRIMARY KEY (`id_pemilik_kos`);

--
-- Indexes for table `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  ADD PRIMARY KEY (`id_pemilik_kos`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `id_kos` (`id_kos`),
  ADD KEY `wishlist_ibfk_1` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kos`
--
ALTER TABLE `kos`
  MODIFY `id_kos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kos_galleries`
--
ALTER TABLE `kos_galleries`
  MODIFY `id_picture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `log_pemilik_kos`
--
ALTER TABLE `log_pemilik_kos`
  MODIFY `id_pemilik_kos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  MODIFY `id_pemilik_kos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kos`
--
ALTER TABLE `kos`
  ADD CONSTRAINT `kos_ibfk_1` FOREIGN KEY (`id_location`) REFERENCES `location` (`id_location`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kos_ibfk_2` FOREIGN KEY (`id_pemilik_kos`) REFERENCES `pemilik_kos` (`id_pemilik_kos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kos_galleries`
--
ALTER TABLE `kos_galleries`
  ADD CONSTRAINT `kos_galleries_ibfk_1` FOREIGN KEY (`id_kos`) REFERENCES `kos` (`id_kos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
