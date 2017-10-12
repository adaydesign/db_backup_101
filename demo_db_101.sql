-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2017 at 01:33 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_db_101`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `id` int(11) NOT NULL COMMENT 'หมายเลขพนักงาน',
  `name` varchar(150) NOT NULL COMMENT 'ชื่อพนักงาน',
  `position` tinyint(4) NOT NULL COMMENT 'ตำแหน่ง',
  `leader` tinyint(1) NOT NULL COMMENT 'สถานะการเป็นหัวหน้ากลุ่มงาน 0=ไม่เป็น 1=หัวหน้ากลุ่มงาน',
  `unit` tinyint(4) NOT NULL COMMENT 'กลุ่มงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`id`, `name`, `position`, `leader`, `unit`) VALUES
(1, 'นายวิทิตย์ ดอนหมื่นศรี', 2, 1, 1),
(2, 'นางสาวสรินยา สังหมื่นเหม้า', 1, 0, 1),
(3, 'ขวัญนิภา บุญขันธ์', 2, 1, 2),
(4, 'นางภิรมย์ นามวงษา', 5, 0, 2),
(5, 'นายวันชัย ศุภรมย์', 6, 0, 2),
(6, 'นางสุพัตรา โคตรสุวรรณ', 2, 0, 2),
(7, 'นางวงเดือน พงษ์สิทธิศักดิ์', 3, 0, 2),
(8, 'นางลำใย โง๊ะบุดดา', 1, 1, 3),
(9, 'นางเบญจวรรณ แก่งจำปา', 1, 0, 3),
(10, 'นายทวีชัย แสงไกร', 2, 0, 3),
(11, 'นายสุนัย บุญธรรม', 2, 1, 4),
(12, 'นางไพลิน ลิชผล', 3, 0, 4),
(13, 'นางประกอบ พลนามอินทร์', 1, 1, 5),
(14, 'นายวิฑูรย์ บุญจันทร์', 2, 0, 5),
(15, 'นางจรัส วาปีโส', 3, 0, 5),
(16, 'นางพรทิพย์ ต้นเงิน', 3, 0, 5),
(17, 'นางสาวรัตน์วดี อินทะกนก', 1, 1, 6),
(18, 'นางสาวสุวคนธ์ พลโยธา', 2, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_em_position`
--

CREATE TABLE `tb_em_position` (
  `id` int(11) NOT NULL COMMENT 'หมายเลขตำแหน่ง',
  `name` varchar(200) NOT NULL COMMENT 'ชื่อตำแหน่ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_em_position`
--

INSERT INTO `tb_em_position` (`id`, `name`) VALUES
(1, 'เจ้าพนักงานศาลยุติธรรม'),
(2, 'นิติกร'),
(3, 'นักวิชาการเงิน'),
(4, 'นักวิชาการคอมพิวเตอร์'),
(5, 'นักวิชาการพัสดุ'),
(6, 'เจ้าหน้าที่ศาลยุติธรรม');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE `tb_unit` (
  `id` int(11) NOT NULL COMMENT 'หมายเลขกลุ่มงาน',
  `name` varchar(100) NOT NULL COMMENT 'ชื่อกลุ่มงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`id`, `name`) VALUES
(1, 'กลุ่มงานบริหารจัดการคดี'),
(2, 'กลุ่มงานนิติการ'),
(3, 'กลุ่มงานคลัง'),
(4, 'กลุ่มงานช่วยอำนวยการ'),
(5, 'กลุ่มงานไกล่เกลี่ยและประนีประนอมข้อพิพาท'),
(6, 'กลุ่มงานช่วยพิจารณาคดี');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_em_position`
--
ALTER TABLE `tb_em_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'หมายเลขพนักงาน', AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_em_position`
--
ALTER TABLE `tb_em_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'หมายเลขตำแหน่ง', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_unit`
--
ALTER TABLE `tb_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'หมายเลขกลุ่มงาน', AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
