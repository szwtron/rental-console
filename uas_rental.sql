-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 04:41 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `nama_cat` varchar(100) NOT NULL,
  `description_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `nama_cat`, `description_cat`) VALUES
(1, 'Playstation', 'Playstation 1, 2, 3, 4, 5'),
(2, 'Nintendo', 'Nintendo Wii, Switch'),
(3, 'Xbox', 'Xbox 360, One, SeriesX'),
(4, 'Atari VCS', 'Atari');

-- --------------------------------------------------------

--
-- Table structure for table `category_console`
--

CREATE TABLE `category_console` (
  `id_category` int(11) NOT NULL,
  `id_console` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_console`
--

INSERT INTO `category_console` (`id_category`, `id_console`) VALUES
(2, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `console`
--

CREATE TABLE `console` (
  `id_console` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `status_console` varchar(50) NOT NULL,
  `id_category` int(11) NOT NULL,
  `multiplayer` int(11) NOT NULL,
  `ad_hoc` int(11) NOT NULL,
  `online` int(11) NOT NULL,
  `subscription` int(11) NOT NULL,
  `small_storage` int(11) NOT NULL,
  `medium_storage` int(11) NOT NULL,
  `large_storage` int(11) NOT NULL,
  `game_list` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `console`
--

INSERT INTO `console` (`id_console`, `nama`, `description`, `harga`, `status_console`, `id_category`, `multiplayer`, `ad_hoc`, `online`, `subscription`, `small_storage`, `medium_storage`, `large_storage`, `game_list`, `gambar`) VALUES
(1, 'Nintendo Switch', 'The Nintendo Switch is a video game console developed by Nintendo and released worldwide in most regions on March 3, 2017.', 50000, '1', 2, 1, 0, 1, 1, 1, 0, 0, 'The Legend of Zelda: Breath of the Wild, Apex Legends, Monster Hunter Rise, Animal Crossing, Mario Kart 8, Paper Mario: The Origami King', '1920px-Nintendo-Switch-wJoyCons-BlRd-Standing-FL.jpg'),
(3, 'ps 5', 'The PlayStation 5 (PS5) is a home video game console developed by Sony Interactive Entertainment. Announced in 2019 as the successor to the PlayStation 4, the PS5 was released on November 12, 2020, in Australia, Japan, New Zealand, North America, Singapor', 250000, '0', 1, 1, 0, 1, 0, 0, 0, 1, 'Marvel\'s Spider-Man: Miles Morales, Gran Turismo 7, Demon\'s Souls, EA SPORTS FIFA 21, NBA 2K21, Call of Duty®: Black Ops Cold War, Grand Theft Auto V & Grand Theft Auto Online, Resident Evil Village, Hogwarts Legacy, Godfall', '5ee2d91340862.jpg'),
(4, 'Xbox 360', 'The Xbox 360 is a home video game console developed by Microsoft. As the successor to the original Xbox, it is the second console in the Xbox series.', 50000, '1', 3, 1, 1, 1, 0, 0, 1, 0, 'Grand Theft Auto V, Grand Theft Auto IV, BioShock, The Orange Box, Mass Effect 2, The Elder Scrolls V: Skyrim, Red Dead Redemption, Portal 2, Batman: Arkham City, Gears of War, Call of Duty 4: Modern Warfare', '02SwziVCVPbEvJqMvSlGf1t-2__1569476809.jpg'),
(5, 'Atari 2600', 'The Atari 2600, originally branded as the Atari Video Computer System (Atari VCS) until November 1982, is a home video game console developed and produced by Atari, Inc. Released on September 11, 1977, it popularized the use of microprocessor-based hardwa', 30000, '1', 4, 0, 0, 0, 0, 0, 0, 0, 'Pong (1977), Adventure (1979), Space Invaders (1980), Asteroids (1981), Ms. Pac-Man (1982), Pitfall! (1982), Frogger (1982), Q*bert (1983), Joust (1983), Pole Position (1983)', 'Atari-2600-Wood-4Sw-Set.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_rental` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_console` int(11) NOT NULL,
  `fromDate` varchar(50) NOT NULL,
  `toDate` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `alamat`, `gender`, `no_telepon`, `role_id`) VALUES
(3, 'lalala', 'tes', 'tes@gmail.com', '28b662d883b6d76fd96e4ddc5e9ba780', 'Taman Sentosa blok D3 No. 35', 'Perempuan', '082137603702', 2),
(4, 'admin', 'admin', 'admin@umn.ac.id', '21232f297a57a5a743894a0e4a801fc3', 'Taman Sentosa blok D3 No. 35', 'Laki-laki', '082137603702', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`id_console`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `console`
--
ALTER TABLE `console`
  MODIFY `id_console` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
