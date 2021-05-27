-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 09:48 PM
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
    	INSERT INTO `pemilik_kos` VALUES('',$name, $email, $phone, $password, $address, $regencies, $zip_code, $birth_date); 
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
(2, 'Admin 1', 'tryanamertayasa@gmail.com', '$2y$10$s5dTlFpqsKzda/Mg9wHhlulwKNlZFffZyBuAS8hx8wympXAmCxUae');

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
(18, 1, 'kos tryana', 1000000, 'kosnya murah dekat dengan lokasi strategis                                ', 9),
(19, 1, 'kos tryana 2', 800000, 'kos dekat dengan unud                                ', 1);

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
(30, 19, '60af9c5cccf12.png');

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
(3, 'pasha', 'wayan@yahoo.com', '081337537455', '$2y$10$s8Ybnn9hApaVbUoV4C08vuw3LsUPMf0ZtVRRLyGbBduXxD8RMdbNy', '123', 'Badung', 80511, '2021-05-27');

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
(3, 'pasha', 'pasha@gmail.com', '081337537455', '$2y$10$bpH7FfrNejNbqk2VWN9zLO.aor7sqQyS53VmbLZ2nqtfBSCFwbppm');

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
(1, 'Tryana Mertayasa', 'admin@gmail.com', '081337537455', '$2y$10$7hZlyyGSSta3aZ24UUAc/.91EF9cCu8kBhVHbJIxBsExUUtowH7YS', 'asd', 'asd', 123, '2021-05-23');

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
(1, 'tryana mertayasa', 'admin@gmail.com', '081337537455', '$2y$10$xXnJG90YMA7t97AhBTxYl.D7zyA4MkXffiyCCOkk4RUWK2QRio3Lq');

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
-- Structure for view `index_query`
--
DROP TABLE IF EXISTS `index_query`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `index_query`  AS SELECT `kos`.`id_kos` AS `id_kos`, `kos`.`title` AS `title`, `kos`.`price` AS `price`, `kos`.`id_location` AS `id_location`, `kos_galleries`.`picture` AS `picture` FROM (`kos` join `kos_galleries` on(`kos`.`id_kos` = `kos_galleries`.`id_kos`)) GROUP BY `kos`.`id_kos` ORDER BY `kos`.`id_kos` DESC LIMIT 0, 4 ;

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kos`
--
ALTER TABLE `kos`
  MODIFY `id_kos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kos_galleries`
--
ALTER TABLE `kos_galleries`
  MODIFY `id_picture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `log_pemilik_kos`
--
ALTER TABLE `log_pemilik_kos`
  MODIFY `id_pemilik_kos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  MODIFY `id_pemilik_kos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
