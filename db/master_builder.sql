-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 10:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master_builder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@buildingmastertech.com', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Maintenance & Install'),
(2, 'Renovation'),
(3, 'Move house servise'),
(4, 'Radiator service'),
(5, 'Cleaning service'),
(6, 'Whole house decoration'),
(7, 'Electric Lamp safety camera'),
(8, 'Water tap Plumbing'),
(9, 'Cleaning Roof'),
(10, 'Painting works'),
(11, 'Door Lock'),
(12, 'Aluminium Window door'),
(13, 'Radiator service'),
(14, 'Disinfection'),
(15, 'Pest Control'),
(16, 'Electric Boiler inspection');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `time` date NOT NULL,
  `budget` varchar(255) NOT NULL,
  `license` int(11) NOT NULL,
  `desctription` text NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `cat_name`, `name`, `contact`, `post_code`, `address`, `time`, `budget`, `license`, `desctription`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '', 'Test', '000000', '0000', 'Test', '2023-02-06', '500', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '6 (3).png', 0, '2023-02-04 10:35:02', '2023-02-04 10:35:02'),
(2, '', 'Frans', '123', '0000', 'Hk', '2023-02-06', '10000', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '338B9AFB-FD25-419F-AB3A-166F2BEAC1A0.png', 0, '2023-02-05 21:22:25', '2023-02-05 21:22:25'),
(3, '', 'Ray', '07548382818', 'M12ha', '14 victory st', '2023-02-15', '??', 1, 'Replace floor tile', '94AF6E96-F50E-4AFC-93D6-4676E0A7F5B8.jpeg', 1, '2023-02-06 16:24:46', '2023-02-06 16:24:46'),
(4, 'Renovation', 'Amen', '07548382819', 'M14hq', '14', '2023-02-24', '100', 1, 'Floor', '194D24AF-CD4E-42D1-8579-3C828C68A822.jpeg', 0, '2023-02-18 10:10:53', '2023-02-18 10:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `vcode` int(10) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `phone`, `name`, `user_email`, `address`, `password`, `status`, `vcode`, `type`, `created_at`, `updated_at`) VALUES
(1, '01799039179', 'M. Ahmed', 'superadmin1@oms.com', '64/2 South Tutpara Circular Road', '$argon2id$v=19$m=65536,t=4,p=1$VExuZW0xVDltbEtRNW9PYw$WDIqvHt8jLNhiA7bM1DMVi4x356Sq3cIBItUZfOyojs', 0, 498375, 0, '2023-02-22 08:12:36', '2023-02-22 08:12:36'),
(2, '00000000000', 'M. Ahmed', 'test@test.com', '64/2 South Tutpara Circular Road', '$argon2id$v=19$m=65536,t=4,p=1$YmJ3Wk80c3p1c1Q5Q3ZnTw$3TJFIwvAr6usCyrL9sxW10aNqZegcs0alPZ/wGsN6A0', 0, 687386, 0, '2023-02-22 08:13:52', '2023-02-22 08:13:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
