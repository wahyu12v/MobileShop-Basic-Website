-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 06:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobileshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`) VALUES
(2, 'M Hafizd Fadhilah', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '+688807255313', 'HafizdFadilah57@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(1, 'Iphone'),
(2, 'Nokia'),
(3, 'Oppo'),
(8, 'Xiaomi'),
(9, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(4) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `date_created`) VALUES
(4, 2, 'nokia 121zx', 800000, '<p>nggk tau pengen beli truk</p>\r\n', 'nokia1.png', 1, '2023-07-06 15:34:17'),
(5, 2, 'nokia 112', 7800000, '<p>1 + 1 =2</p>\r\n', 'nokia2.png', 1, '2023-07-06 15:34:41'),
(6, 2, 'nokia 55D', 4500000, '<p>boleh ngakak nggk sih</p>\r\n', 'nokia3.jpeg', 1, '2023-07-06 15:35:03'),
(7, 2, 'nokia 45', 560000, '<p>waduh</p>\r\n', 'nokia4.jpeg', 1, '2023-07-06 15:35:24'),
(8, 3, 'oppo 12', 1200000, '<p>acumalaka</p>\r\n', 'oppo1.jpg', 1, '2023-07-06 15:39:59'),
(9, 3, 'oppo 22', 45000000, '<p>skibi di mba nda d</p>\r\n', 'oppo2.png', 1, '2023-07-06 15:40:27'),
(10, 3, 'oppo 334', 446000, '<p>what da dog doin</p>\r\n', 'oppo3.webp', 1, '2023-07-06 15:41:08'),
(11, 3, 'oppo 56', 900000, '<p>3 4 buckle some more</p>\r\n', 'oppo4.webp', 1, '2023-07-06 15:41:38'),
(12, 1, 'iphone 112', 4450000, '<p>despite making up to 13%</p>\r\n', 'iphone1.jpeg', 1, '2023-07-06 15:42:03'),
(13, 1, 'iphone 4445', 6900000, '<p>1 2 buckle my shoes</p>\r\n', 'iphone2.jpeg', 1, '2023-07-06 15:42:35'),
(14, 1, 'iphone 3455', 890000, '<p>boycot jeff bezos</p>\r\n', 'iphone3.jpeg', 1, '2023-07-06 15:42:52'),
(15, 1, 'iphone 4427', 6870000, '<p>kalian tau hari ni hari ape?</p>\r\n', 'iphone4.jpg', 1, '2023-07-06 15:43:11'),
(17, 8, 'xiaomi ty55', 7800000, '<p>beliau ini bukan sembarang beliau</p>\r\n', 'xiaomi1.jpeg', 1, '2023-07-06 15:45:51'),
(18, 8, 'xiaomi 333uy', 89444000, '<p>kerja bagus</p>\r\n', 'xiaomi2.jpeg', 1, '2023-07-06 15:43:46'),
(19, 8, 'xiaomi 566', 7890000, '<p>RAM 4GB</p>\r\n\r\n<p>Internal 64gb</p>\r\n', 'xiaomi3.jpeg', 1, '2023-07-06 15:44:01'),
(20, 9, 'samsung 11', 1100000, '<p>hati hati</p>\r\n', 'samsung1.jpeg', 1, '2023-07-06 15:44:25'),
(21, 9, 'samsung 112', 12370000, '<p>kerja bagus</p>\r\n', 'samsung2.png', 1, '2023-07-06 15:44:39'),
(22, 9, 'samsung 33rt', 8860000, '', 'samsung3.png', 1, '2023-07-06 15:44:59'),
(24, 9, 'Samsung F9', 4000000, '<p>bagus</p>\r\n', 'samsung4.webp', 1, '2023-07-06 15:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaction`
--

CREATE TABLE `tb_transaction` (
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `metode_pembayaran` varchar(15) NOT NULL,
  `nama_penerima` varchar(30) NOT NULL,
  `total_price` int(10) NOT NULL,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaction`
--

INSERT INTO `tb_transaction` (`transaction_id`, `product_id`, `warna`, `alamat`, `jumlah`, `metode_pembayaran`, `nama_penerima`, `total_price`, `transaction_date`) VALUES
(1, 24, 'kuning', 'jl sukarno hatta', 2, 'MANDIRI', 'nama_penerima', 8000000, '2023-07-06 18:22:39'),
(2, 22, 'kuning', 'jl sukarno hatta', 3, '--pilih metode ', 'nama_penerima', 26580000, '2023-07-06 18:26:32'),
(3, 22, 'kuning', 'jl sukarno hatta', 3, '--pilih metode ', 'nama_penerima', 26580000, '2023-07-06 18:28:28'),
(4, 22, 'kuning', 'jl sukarno hatta', 3, 'BSI', 'nama_penerima', 26580000, '2023-07-06 18:28:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_transaction`
--
ALTER TABLE `tb_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_transaction`
--
ALTER TABLE `tb_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
