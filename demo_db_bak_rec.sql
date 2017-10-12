-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2017 at 01:43 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_db_bak_rec`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_backup_record`
--

CREATE TABLE `tb_backup_record` (
  `id` int(11) NOT NULL COMMENT 'ลำดับ',
  `bak_file_name` varchar(200) NOT NULL COMMENT 'ที่อยู่ไฟล์',
  `gz` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=use .gz zip, 0= do not use zip file',
  `action` tinyint(4) NOT NULL COMMENT '0=backup 1=restore',
  `action_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันเวลา ที่บันทึก',
  `result` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=fail 1=success'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_backup_record`
--
ALTER TABLE `tb_backup_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_backup_record`
--
ALTER TABLE `tb_backup_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ', AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
