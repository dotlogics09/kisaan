-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 08:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kishan_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `kishan_data_add`
--

CREATE TABLE `kishan_data_add` (
  `id` int(11) NOT NULL,
  `new_kishan_number` varchar(100) NOT NULL,
  `createat` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kishan_data_add`
--

INSERT INTO `kishan_data_add` (`id`, `new_kishan_number`, `createat`) VALUES
(1, '1', '2023-04-07 00:00:00.000000'),
(2, '1', '2023-04-09 00:00:00.000000'),
(3, '1', '2023-04-09 00:00:00.000000'),
(4, '1', '2023-04-09 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `kishan_data_record`
--

CREATE TABLE `kishan_data_record` (
  `id` int(11) NOT NULL,
  `kishan_name` varchar(250) NOT NULL,
  `kishan_number` varchar(20) NOT NULL,
  `createat` datetime(6) NOT NULL,
  `kishan_vill` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kishan_data_record`
--

INSERT INTO `kishan_data_record` (`id`, `kishan_name`, `kishan_number`, `createat`, `kishan_vill`) VALUES
(1, 'manmohankushwah', '1', '2023-04-07 00:00:00.000000', 'pachora'),
(2, 'मन मोहन सिंह कुशवाह', '2', '2023-04-07 00:00:00.000000', 'charkha'),
(5, 'मन मोहन सिंह ', '1', '2023-04-09 00:00:00.000000', 'gadajar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kishan_data_add`
--
ALTER TABLE `kishan_data_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kishan_data_record`
--
ALTER TABLE `kishan_data_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kishan_data_add`
--
ALTER TABLE `kishan_data_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kishan_data_record`
--
ALTER TABLE `kishan_data_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
