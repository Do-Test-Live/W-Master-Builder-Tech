-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 07:26 AM
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
(1, 'Cleaning service', 'Test', '000000', '9100', 'Test', '2023-02-17', '500', 1, 'Test Description', '6 (3).png', 1, '2023-02-16 05:47:36', '2023-02-16 05:47:36');

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
  `status` int(11) NOT NULL DEFAULT 1,
  `type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `phone`, `name`, `user_email`, `address`, `password`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, '00000000000', 'Test', 'test@test.com', 'test', '$argon2id$v=19$m=65536,t=4,p=1$NHE2bjZkSlR4MlAzV3NtSQ$Y+GdpvAlGOCRscX0P8Pls9mUdi1lpPF6zGJFtAs5ubY', 1, 0, '2023-02-04 10:33:43', '2023-02-04 10:33:43'),
(2, '9494', 'jsjsj', 'Francis00358@gmail.com', 'hk', '$argon2id$v=19$m=65536,t=4,p=1$b3VhV2VSN0U3SlNFRm5paA$VIaDeCjqu0E8XZH7oNwyTy9z/WxQAjpMKbE40IDSJ+E', 1, 1, '2023-02-05 21:28:46', '2023-02-05 21:28:46'),
(3, '00000000000', 'Test', 'test@gmail.com', 'test', '$argon2id$v=19$m=65536,t=4,p=1$LkF0amliR2ViTnBZZmx4Nw$k2jywcIvpuOB6k/lhp2rbvKnh1mRYiQWHDNrsrnom9Y', 1, 0, '2023-02-06 06:18:36', '2023-02-06 06:18:36');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
