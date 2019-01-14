-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2019 at 11:33 PM
-- Server version: 10.3.10-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bosscoffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `bosses`
--

CREATE TABLE `bosses` (
  `ID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bosses`
--

INSERT INTO `bosses` (`ID`, `username`, `password`) VALUES
(1, 'bill', '$2y$10$ZyuqN4s/F0y2qU4/CPlRq.j1d9mdw2mhKq4GyH7JISEVlOVxoKqzy');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `stock_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID`, `nama`, `harga`, `stock_id`) VALUES
(4, 'kopi ijo', '6000', 3),
(6, 'kopi hitam', '5000', 3),
(7, 'kopi susu', '7000', 3),
(9, 'susu', '5000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `ID` int(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `menu_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`ID`, `tanggal`, `nama`, `jumlah`, `harga`, `total`, `menu_id`) VALUES
(11, '2018-12-12', 'kopi ijo', 3, '6000', '18000', 4),
(12, '2018-12-12', 'kopi susu', 3, '7000', '21000', 7),
(13, '2018-12-12', 'kopi ijo', 4, '6000', '24000', 4),
(14, '2018-12-12', 'susu', 5, '5000', '25000', 9),
(15, '2018-12-12', 'kopi ijo', 4, '6000', '24000', 4),
(16, '2018-12-12', 'susu', 5, '5000', '25000', 9),
(17, '2018-12-12', 'kopi susu', 3, '7000', '21000', 7),
(18, '2018-12-12', 'kopi ijo', 3, '6000', '18000', 4),
(19, '2018-12-12', 'susu', 6, '5000', '30000', 9);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `ID` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `banyaknya` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`ID`, `nama`, `tanggal`, `jumlah`, `banyaknya`) VALUES
(3, 'kopi', '2018-10-04', 0, 1),
(5, 'Susu', '12-12-2018', 39, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bosses`
--
ALTER TABLE `bosses`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bosses`
--
ALTER TABLE `bosses`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
