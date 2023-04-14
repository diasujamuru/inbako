-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 05:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inbako`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(2) NOT NULL COMMENT '1.)petugas 2.)warga'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `role_id`) VALUES
(5, 'admin', 'admin@gmail.com', '$2y$10$J2xbBrrb93ZNGG2UtrCcRefBxivia71.12CNkgwTPojOAra3g27Ja', 1),
(6, 'radit', 'radit@gmail.com', '$2y$10$zkG6VIo2I4fUDS9lm7zIr.nrVlxcdSyUQZCbQtVxaFIrTtYKaEb1.', 1),
(7, 'sancho', 'sancho@gmail.com', '$2y$10$FgT2vyPdDp.tDVsbqJT0Y.RYWs5/Wj3jP2qmsYd7YcwP8KrTLclm6', 1),
(8, 'asd', 'asd@gmail.com', '$2y$10$aL3FgLH8moW/j.mvpwyR3exC5wY1Qnm9u2qrHE1Zyo/Rqy3OCupJC', 1),
(9, 'asddsa', 'dsa@gmail.com', '$2y$10$K01AwFLjQulFDqcHX5HDnOHXiYyMlNtUkfhh42gFs45v5PZ18Xzu2', 1),
(10, 'admina', 'alejandro@gmail.com', '$2y$10$0CUvHFmnwULveUgk8kM8p.NQaortluXk5UMEvAH.GWtinNkRahWKG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `kode_wilayah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `kode_perwilayah` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `kode_wilayah`, `tanggal`, `mulai`, `selesai`, `kode_perwilayah`) VALUES
(1, 16320, '2023-04-01', '09:00:00', '10:00:00', '001'),
(2, 12124, '2023-04-10', '09:52:00', '00:52:00', '002'),
(3, 120, '2023-04-09', '10:01:00', '00:01:00', '001'),
(4, 10, '2023-04-02', '10:32:00', '00:32:00', '003'),
(5, 12124, '2023-04-02', '23:38:00', '22:39:00', '004'),
(6, 12124, '2023-04-22', '01:30:00', '04:30:00', '003'),
(7, 12124, '2023-04-25', '11:35:00', '12:37:00', '002'),
(8, 12124, '2023-04-27', '18:38:00', '19:38:00', '001');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nik` int(20) NOT NULL,
  `nama` varchar(28) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `email` varchar(124) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kode_wilayah` int(10) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nik`, `nama`, `kota`, `email`, `password`, `kecamatan`, `kelurahan`, `kode_wilayah`, `status`) VALUES
(22121212, 'joni', 'bogor', 'joni@gmail.com', 'asd', 'cibeureum', 'cicanjak', 16320, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(24) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(2) NOT NULL,
  `is_active` int(2) NOT NULL,
  `kode_wilayah` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `is_active`, `kode_wilayah`) VALUES
(1, 'radit', 'radit@gmail.com', '$2y$10$8nqa1SG/dfurE0iMU605KOus7l4cYbyNutiUrMs4NQExNvylZna5u', 2, 1, 16320),
(2, 'jaka', 'jaka@gmail.com', '$2y$10$d76ZyMNa31SU1VaWkH5DNe9n2pf9stJADjcMgFn/InZ0eeLuXE5V6', 2, 1, 12124);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `nik` int(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kota` int(128) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `rt` int(2) NOT NULL,
  `rw` int(2) NOT NULL,
  `ttl` varchar(129) NOT NULL,
  `no_telpon` int(20) NOT NULL,
  `kode_wilayah` int(11) NOT NULL,
  `kode_perwilayah` varchar(3) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status_ambil` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`nik`, `nama`, `kota`, `kecamatan`, `kelurahan`, `rt`, `rw`, `ttl`, `no_telpon`, `kode_wilayah`, `kode_perwilayah`, `password`, `status_ambil`) VALUES
(0, 'Trinity Rodriguez DVM', 0, 'Lake', 'shire', 4, 6, '1989-02-25', 0, 16320, '0', 'b2516ba778a1a0cec5386d0dace872bdd0d5083d', 0),
(1, 'Adolfo Nitzsche III', 0, 'Port', 'ville', 0, 2, '1983-03-07', 0, 16320, '0', 'a3ed996f27282337425173838268dc07c4650508', 0),
(2, 'Cielo Hudson', 0, 'North', 'port', 4, 4, '2011-01-22', 0, 16320, '0', '4f6037f7e8022a575ca7a52562cd74baf3b65f87', 0),
(4, 'Ellie Treutel', 0, 'New', 'furt', 9, 6, '2001-03-18', 0, 12124, '10', '8ac214999138a2506b3bf5a0516dd31fecc29805', 0),
(7, 'Mr. Alan Johnson Jr.', 0, 'West', 'haven', 0, 3, '1970-05-30', 0, 12124, '0', '76ade1567caf80b0bccf39d7c1055dee500bc4eb', 0),
(9, 'Ms. Zola Braun', 0, 'South', 'land', 7, 9, '2016-06-13', 0, 12124, '0', '7a94ea188424f7ab00753d056fed011f1b2a778c', 0),
(19, 'Sebastian Robel', 0, 'Port', 'furt', 6, 3, '2011-07-25', 0, 12124, '0', '92786d8ce38e6bc41577ee21c046e1f5096a9c6e', 0),
(42, 'Dax Wisoky', 0, 'Port', 'mouth', 8, 8, '1994-03-08', 0, 12124, '0', 'b358f0d4d1ad79e25feb59a173bb77d3d311dbfe', 0),
(94, 'Eda Breitenberg', 0, 'Lake', 'bury', 9, 7, '2013-09-18', 0, 3, '0', '5c2ffce23322daf0f1fc6b9bb357251214bc6fef', 0),
(226, 'Ms. Sarai Trantow V', 0, 'New', 'ville', 1, 4, '1974-11-29', 0, 6, '0', '9cebe7d7ac3ec0112db31fa6491e18e7cd6447de', 0),
(382, 'Dr. Devin Fisher Sr.', 0, 'East', 'shire', 3, 8, '2008-03-04', 0, 5, '0', '61913e9429fbc9f81a44720049f7a0980f5b8f3e', 0),
(459, 'Prof. Seamus Gusikowski', 0, 'East', 'shire', 0, 7, '2004-04-03', 0, 2, '0', 'dcaf5107ffbbfde503fc9963f743e7c4d6d65dd3', 0),
(752, 'Jayden Jones', 0, 'New', 'ton', 8, 8, '1994-02-10', 0, 3, '0', 'ad6338fe4b568007d0bb4af9ec903cd254d9befd', 0),
(816, 'Jeanette Harber', 0, 'Lake', 'side', 9, 5, '1990-04-17', 0, 1, '0', '5b1e6ed7f41dbdac72aa62c3e8da252fd128552d', 0),
(830, 'Prof. Carmelo Kuhlman', 0, 'North', 'haven', 5, 8, '1979-07-04', 0, 8, '0', '9d1be232e641f312d1fc35182b9070bd7c5840d8', 0),
(1255, 'Ms. Arianna Rice DVM', 0, 'East', 'borough', 7, 6, '2014-04-21', 0, 3, '0', '0654b3f75504c85e60e9504d430cb03b837dae39', 0),
(4129, 'Kamryn Hintz', 0, 'North', 'furt', 3, 9, '2007-12-02', 0, 3, '0', '18c8f9ad113332660a71e7235fa7aed8e3a5050b', 0),
(5748, 'Mr. Muhammad Abernathy', 0, 'North', 'mouth', 2, 5, '1999-08-22', 0, 4, '0', '4ffc4c34af9821fe4b8fb56def7cfc3d44760e0e', 0),
(9371, 'Aliya Ruecker I', 0, 'East', 'mouth', 5, 6, '2008-08-31', 0, 2, '0', '137eaac68c1654402234d8a4f8c730ca2b2d6740', 0),
(16143, 'Yasmine Senger', 0, 'North', 'mouth', 3, 7, '1985-05-28', 0, 3, '0', 'ec5af95442ebe32efd29407a0e4cb5b3de851dc3', 0),
(420193, 'Garett Dooley III', 0, 'West', 'side', 8, 1, '2017-07-06', 0, 9, '0', '07f5799146b3fcfc75456f99d8e65f2cad90cfb5', 0),
(5156380, 'Elvera Swaniawski', 0, 'Lake', 'fort', 3, 3, '1999-09-21', 0, 3, '0', '73a4aa53c29de7f30315f15dde21e07c20233164', 0),
(31975068, 'Estel Legros', 0, 'New', 'berg', 6, 6, '1981-07-16', 0, 8, '0', 'd68ee374ce6f4420c3995bb105981f46d06eb8d1', 0),
(32332852, 'Maurice O\'Connell PhD', 0, 'East', 'ville', 8, 8, '2004-04-19', 0, 5, '0', 'e0e1db1dbe2bb364233fb6f6344925675afbdd4f', 0),
(89691731, 'Anthony Bruen', 0, 'Port', 'berg', 9, 6, '1981-03-11', 0, 2, '0', '57c44eb1aaf7307cf8f23a13705a37d3737f85b9', 0),
(300000000, 'Prof. Manuela Corwin Sr.', 0, 'Lake', 'stad', 2, 6, '1974-05-13', 0, 8, '0', '4615818b247104d9d95942ffa2a8906a36444f4b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
