-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2019 at 10:44 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autentificare`
--

-- --------------------------------------------------------

--
-- Table structure for table `arhiva`
--

CREATE TABLE `arhiva` (
  `id` int(11) NOT NULL,
  `id_comanda` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arhiva`
--

INSERT INTO `arhiva` (`id`, `id_comanda`, `id_produs`, `id_user`, `data`) VALUES
(1, 1, 23, 15, '2019-01-07 22:24:10'),
(2, 2, 33, 15, '2019-01-07 23:40:12'),
(3, 2, 25, 15, '2019-01-07 23:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'Sony'),
(2, 'Audio-Tehnica'),
(3, 'Sennheiser');

-- --------------------------------------------------------

--
-- Table structure for table `cos`
--

CREATE TABLE `cos` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `data` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `istoric`
--

CREATE TABLE `istoric` (
  `id` int(11) NOT NULL,
  `plata` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `judet` varchar(64) NOT NULL,
  `localitate` varchar(64) NOT NULL,
  `strada` varchar(32) NOT NULL,
  `nr` int(11) NOT NULL,
  `bloc` varchar(24) NOT NULL,
  `cod_postal` int(12) NOT NULL,
  `numar_de_telefon` int(24) NOT NULL,
  `termeni` varchar(12) NOT NULL,
  `termenii` varchar(12) NOT NULL,
  `data` varchar(64) NOT NULL,
  `total` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `istoric`
--

INSERT INTO `istoric` (`id`, `plata`, `email`, `judet`, `localitate`, `strada`, `nr`, `bloc`, `cod_postal`, `numar_de_telefon`, `termeni`, `termenii`, `data`, `total`) VALUES
(1, 'ramburs', 'sebi.paul121@gmail.com', 'bihor', 'marghita', 'herculane', 3, 'D', 415300, 755467325, 'de_acord', 'de_acord', '2019-01-07 22:24:52', '567'),
(2, 'ramburs', 'sebi.paul121@gmail.com', 'bihor', 'marghita', 'herculane', 3, 'D', 415300, 755467325, 'de_acord', 'de_acord', '2019-01-07 23:40:37', '2188');

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `id` int(11) NOT NULL,
  `tip` varchar(64) NOT NULL,
  `brand` varchar(64) NOT NULL,
  `model` varchar(64) NOT NULL,
  `design` varchar(64) NOT NULL,
  `tehnologie` varchar(64) NOT NULL,
  `conectare` varchar(64) NOT NULL,
  `diametru` varchar(64) NOT NULL,
  `impedanta` varchar(64) NOT NULL,
  `frecventa` varchar(64) NOT NULL,
  `greutate` varchar(64) NOT NULL,
  `altele` text NOT NULL,
  `pret` int(32) NOT NULL,
  `pic_link` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`id`, `tip`, `brand`, `model`, `design`, `tehnologie`, `conectare`, `diametru`, `impedanta`, `frecventa`, `greutate`, `altele`, `pret`, `pic_link`) VALUES
(23, '1', '1', 'WH-CH500', 'On-ear', 'Wireless', 'Bluetooth', '30', '20 ohm', '20-20000', '140 g', 'Microfon', 179, 'sony1.jpg'),
(24, '1', '1', 'WI-1000XN', 'In-Ear', 'Wireless', 'Bluetooth', '4', '46 ohm', '3-40000', '71 g', 'Izolare Zgomot', 1099, 'sony2.jpg'),
(25, '1', '1', 'WH-1000XM3B', 'Over-Ear', 'Wireless', 'Bluetooth', '40', '90 ohm', '4-40000', '255 g', 'Izolare Zgomot', 1739, 'sony3.jpg'),
(26, '1', '1', 'WFSP700NY', 'In-Ear', 'Wireless', 'Bluetooth', '6', '45 ohm', '20-20000', '15 g', 'Extra bass', 839, 'sony4.jpg'),
(27, '1', '2', 'ATH-S200BT', 'On-ear', 'Wireless', 'Bluetooth', '30', '32 ohm', '5-32000', '190 g', 'Autonomie 40 ore', 299, 'ath1.jpg'),
(28, '1', '2', 'ATH-MSR7', 'Over-Ear', 'Wireless', 'Bluetooth', '45', '35 ohm', '5-40000', '290 g', 'Dual air control', 879, 'ath2.jpg'),
(29, '1', '2', 'ATH-M50x', 'Over-Ear', 'Wired', 'Wired', '45', '38 ohm', '15-28000', '310 g', 'microfon', 929, 'ath3.jpg'),
(30, '1', '3', 'HD 599', 'Deschis', 'Wired', 'Cablu', '60', '50 ohm', '12-38500', '360 g', 'Hi-Fi', 559, 'sh1.jpg'),
(31, '1', '3', 'HD 4.40 BT', 'Over-Ear', 'Wireless', 'Bluetooth', '50', '18 ohm', '18-22000', '230 g', 'THD', 399, 'sh2.jpg'),
(32, '1', '3', 'Momentum M2 I', 'On-ear', 'Wired', 'Cablu', '47', '18 ohm', '100-10000', '278 g', 'cablu 1.4m', 1079, 'sh3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tip`
--

CREATE TABLE `tip` (
  `id` int(11) NOT NULL,
  `tipul` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tip`
--

INSERT INTO `tip` (`id`, `tipul`) VALUES
(1, 'Casti Audio'),
(2, 'Accesorii');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `prenume` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nume`, `prenume`, `username`, `password`, `user_type`) VALUES
(14, 'danciu', 'emanuel', 'danciuema', '$2y$10$uvHFeicJHinvz90kiVDdNebiJZK1JHAtKmPtPhDgwGHduJ6xN3aXS', 1),
(15, 'sebi', 'sebi', 'client1', '$2y$10$qTzTl.8Xyh6v33QTNM3Z9uCPU.W3.lZeWIIFQOeA6rQNmqV/pNSrm', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arhiva`
--
ALTER TABLE `arhiva`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cos`
--
ALTER TABLE `cos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `istoric`
--
ALTER TABLE `istoric`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tip`
--
ALTER TABLE `tip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arhiva`
--
ALTER TABLE `arhiva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cos`
--
ALTER TABLE `cos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `istoric`
--
ALTER TABLE `istoric`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tip`
--
ALTER TABLE `tip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
