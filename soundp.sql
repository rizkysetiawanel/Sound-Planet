-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2017 at 11:24 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soundp`
--

-- --------------------------------------------------------

--
-- Table structure for table `sp_genre`
--

CREATE TABLE `sp_genre` (
  `id_genre` int(11) NOT NULL,
  `title_genre` varchar(55) NOT NULL,
  `slug_genre` varchar(55) NOT NULL,
  `date_genre` date NOT NULL,
  `time_genre` time NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_genre`
--

INSERT INTO `sp_genre` (`id_genre`, `title_genre`, `slug_genre`, `date_genre`, `time_genre`, `date_time`) VALUES
(1, 'Glitch Hop', 'glitch-hop', '2017-05-04', '01:13:08', '2017-05-01 01:13:08'),
(2, 'Electro', 'electro', '2017-05-01', '01:00:00', '2017-05-01 01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sp_song`
--

CREATE TABLE `sp_song` (
  `id_song` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `file_song` text NOT NULL,
  `name_song` varchar(55) NOT NULL,
  `desc_song` text NOT NULL,
  `dlbtn_song` int(1) NOT NULL,
  `photo_song` text NOT NULL,
  `date_song` date NOT NULL,
  `time_song` time NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_song`
--

INSERT INTO `sp_song` (`id_song`, `id_user`, `id_genre`, `file_song`, `name_song`, `desc_song`, `dlbtn_song`, `photo_song`, `date_song`, `time_song`, `date_time`) VALUES
(16, 1, 2, 'ElectroTristamRogueFlamewarCatalystEPmp3.mp3', '[Electro] - Tristam & Rogue - Flamewar [Catalyst EP]', '[Electro] - Tristam & Rogue - Flamewar [Catalyst EP]', 1, 'maxresdefault1495610820.png', '2017-05-24', '14:27:00', '2017-05-24 14:27:00'),
(17, 1, 1, 'GlitchHopor110BPMTristamTillItsOverMonstercatReleasemp3.mp3', '[Glitch Hop or 110BPM] - Tristam - Till It\'s Over [Mons', '[Glitch Hop or 110BPM] - Tristam - Till It\'s Over [Monstercat Release]', 1, 'hqdefault1495610956.png', '2017-05-24', '14:29:16', '2017-05-24 14:29:16'),
(18, 1, 1, 'AEIUEOAOOPHNtSAMEHADAKUNETmp3.mp3', 'A-E-I-U-E-O-AO!!-OP-HNt-SAMEHADAKU.NET', 'anime', 1, 'hinakonote_cover1495613655.png', '2017-05-24', '15:14:15', '2017-05-24 15:14:15'),
(19, 1, 2, 'UndertaleASGOREMetalCoverRichaadEBmp3.mp3', 'Undertale- ASGORE - Metal Cover -- RichaadEB', 'Undertale- ASGORE - Metal Cover -- RichaadEB', 1, '7277121495616195.png', '2017-05-24', '15:56:35', '2017-05-24 15:56:35'),
(20, 1, 1, 'UndertaleOSTLastGoodbyeExtendedmp3.mp3', 'Undertale OST - Last Goodbye Extended', '', 1, 'Flowey_the_Flower1495616440.png', '2017-05-24', '16:00:40', '2017-05-24 16:00:40'),
(21, 1, 2, 'UndertaleOSTBergentrckungIntroASGOREExtendedmp3.mp3', 'Undertale OST  - Bergentrückung (Intro) + ASGORE Extend', 'dasdsadsa', 1, 'asgore1495617157.png', '2017-05-24', '16:12:37', '2017-05-24 16:12:37'),
(23, 1, 2, 'WatersofMegalovaniamp3.mp3', 'Waters of Megalovania', 'UNDERTALE OST GAME', 1, 'megalovania1495617342.png', '2017-05-24', '16:15:42', '2017-05-24 16:15:42'),
(24, 1, 2, 'UndertaleOSTMetalCrusherExtendedmp3.mp3', 'Undertale OST - Metal Crusher Extended', 'Undertale OST - Metal Crusher Extended', 1, 'metalcrusher1495617462.png', '2017-05-24', '16:17:42', '2017-05-24 16:17:42'),
(25, 1, 1, 'KarmaFieldsBuildTheCitiesfeatKerliGrabbitzRemixMonstercatReleasemp3.mp3', 'Karma Fields - Build The Cities (feat. Kerli) (Grabbitz', 'Karma Fields - Build The Cities (feat. Kerli) (Grabbitz Remix) [Monstercat Release]', 1, 'karmafields1495617735.png', '2017-05-24', '16:22:15', '2017-05-24 16:22:15'),
(26, 1, 1, 'saikikusuomp3.mp3', 'Saiki Kusuo No Yan', 'Saiki Kusuo No Yan op 2', 1, 'saiki1495617805.png', '2017-05-24', '16:23:25', '2017-05-24 16:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `sp_user`
--

CREATE TABLE `sp_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(40) NOT NULL,
  `country` varchar(25) NOT NULL,
  `bio` text NOT NULL,
  `photo_url` text NOT NULL,
  `cover_url` text NOT NULL,
  `slug_url` varchar(55) NOT NULL,
  `confirm_code` varchar(255) NOT NULL,
  `status_user` int(1) NOT NULL,
  `status_online` int(1) NOT NULL,
  `date_user` date NOT NULL,
  `time_user` time NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp_user`
--

INSERT INTO `sp_user` (`id_user`, `username`, `email`, `password`, `city`, `country`, `bio`, `photo_url`, `cover_url`, `slug_url`, `confirm_code`, `status_user`, `status_online`, `date_user`, `time_user`, `date_time`) VALUES
(1, 'Papyrus Disbelief', 'rizkys2323@gmail.com', '9b2b2b708fc80ce45315e7ea2837d58a', '', '', '', '120_Undertale.png', '17277121495615539.png', 'papyrus-disbelief', '9b2b2b708fc80ce45315e7ea2837d58a', 2, 0, '2017-05-23', '00:42:26', '2017-05-23 00:42:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sp_genre`
--
ALTER TABLE `sp_genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `sp_song`
--
ALTER TABLE `sp_song`
  ADD PRIMARY KEY (`id_song`);

--
-- Indexes for table `sp_user`
--
ALTER TABLE `sp_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sp_genre`
--
ALTER TABLE `sp_genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sp_song`
--
ALTER TABLE `sp_song`
  MODIFY `id_song` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `sp_user`
--
ALTER TABLE `sp_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
