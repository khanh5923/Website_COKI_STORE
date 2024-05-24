-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 03:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_coki`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(100) NOT NULL,
  `ad_email` varchar(100) NOT NULL,
  `ad_password` varchar(100) NOT NULL,
  `ad_psw_email` varchar(100) NOT NULL,
  `codeAdmin` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_email`, `ad_password`, `ad_psw_email`, `codeAdmin`) VALUES
(1, 'admin', 'ruyelem@gmail.com', '123', 'llam aaym sruw cozl\r\n', '0'),
(2, 'staff', 'tranquangkhanh10a1@gmail.com', '111', 'tranquangkhanh', '767df');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `img`) VALUES
(1, 'Wood products ', 'spgo.png'),
(2, 'Wool product', 'splen.png'),
(3, 'Plastic products', 'spnhua.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `fullname`, `email`, `phone_number`, `note`) VALUES
(18, '3', 'demo@gmail.com', '0394413460', ''),
(19, 's', '111@gmail.com', '0394413460', ''),
(20, 's', 'demo@gmail.com', '0394413460', ''),
(21, '&lt;script&gt;alert();&lt;/script&gt;', 'demo@gmail.com', '0394413460', ''),
(22, '', 'demo@gmail.com', '0394413460', '');

-- --------------------------------------------------------

--
-- Table structure for table `giaodich`
--

CREATE TABLE `giaodich` (
  `giaodich_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `date_giaodich` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `order_status` int(2) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giaodich`
--

INSERT INTO `giaodich` (`giaodich_id`, `order_id`, `date_giaodich`, `title`, `quantity`, `price`, `order_status`, `product_id`) VALUES
(28, 12, '03:23 16/12/2023', 'Xe cau', 4, 1200000, 1, 3),
(29, 12, '03:23 16/12/2023', 'Bua ', 1, 180000, 1, 1),
(30, 12, '03:23 16/12/2023', 'Do choi hinh hoc', 4, 200000, 1, 5),
(31, 13, '03:25 16/12/2023', 'Do choi hinh hoc', 2, 100000, 1, 5),
(32, 14, '03:51 16/12/2023', 'Do choi hinh hoc', 5, 250000, 0, 5),
(33, 14, '03:51 16/12/2023', 'Cao 2', 3, 270000, 0, 13),
(34, 15, '09:34 16/12/2023', 'Dung cu bep', 2, 400000, 2, 2),
(35, 15, '09:34 16/12/2023', 'Nhim', 1, 370000, 2, 11),
(36, 16, '16:29 16/12/2023', 'Dung cu bep', 1, 200000, 2, 2),
(37, 16, '16:29 16/12/2023', 'Xe cau', 1, 300000, 2, 3),
(38, 17, '16:36 16/12/2023', 'Dung cu bep', 1, 200000, 0, 2),
(39, 17, '16:36 16/12/2023', 'Xe cau', 1, 300000, 0, 3),
(40, 18, '16:37 16/12/2023', 'Dung cu bep', 3, 600000, 2, 2),
(41, 19, '00:59 17/12/2023', 'Ban da bong', 4, 2000000, 2, 6),
(42, 20, '01:02 17/12/2023', 'Bua ', 1, 180000, 2, 1),
(43, 20, '01:02 17/12/2023', 'Dung cu bep', 4, 800000, 2, 2),
(44, 21, '20:04 21/12/2023', 'Dung cu bep', 2, 400000, 0, 2),
(101, 61, '23:48 05/05/2024', 'Dung cu bep', 1, 200000, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `payment_method` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `fullname`, `email`, `phone_number`, `address`, `note`, `order_date`, `quantity`, `price`, `payment_method`) VALUES
(12, 'Trần Quang Khánh', 'khanh@gmail.com', '123', '123', '123', '03:23 16/12/2023', 9, 1210000, 'Cash'),
(13, 'Trần Quang Khánh', 'khanh@gmail.com', '234', '567', '111', '03:25 16/12/2023', 2, 90000, 'Ship OCD'),
(14, 'DAO HAI DANG', 'dangby10a1@gmail.com', '123', '122222', '234', '03:51 16/12/2023', 8, 465000, 'Internet banking'),
(15, 'Trần Quang Khánh', 'khanh@gmail.com', '111', '111', '111', '09:34 16/12/2023', 3, 740000, 'Ship OCD'),
(16, 'Trần Quang Khánh', 'khanh@gmail.com', '333', '234', '3', '16:29 16/12/2023', 2, 415000, 'Internet banking'),
(17, 'Trần Quang Khánh', 'khanh@gmail.com', '', '', '', '16:36 16/12/2023', 2, 415000, ''),
(18, 'Trần Quang Khánh', 'khanh@gmail.com', '123', '123', '3', '16:37 16/12/2023', 3, 585000, 'Cash'),
(19, 'Trần Quang Khánh', 'khanh@gmail.com', '124', '123', '124', '00:59 17/12/2023', 4, 1800000, 'Cash'),
(20, 'Trần Quang Khánh', 'khanh@gmail.com', '345', '234', '124', '01:02 17/12/2023', 5, 930000, 'Cash'),
(21, 'Trần Quang Khánh', 'khanh@gmail.com', '', '', '', '20:04 21/12/2023', 6, 990000, 'Internet banking'),
(61, 'Trần Quang Khánh', 'tranquangkhanh050923@gmail.com', '0394413460', '1/1', '', '23:48 05/05/2024', 1, 195000, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `title`, `price`, `discount`, `thumbnail`, `description`) VALUES
(1, 1, 'Bua ', 180000, 150000, 'bua-dap-tho-1.png', 'Suitable for all ages.'),
(2, 1, 'Dung cu bep', 200000, 195000, '71K0gCqKNiL._AC_SX569_.png', 'Suitable for all ages.'),
(3, 1, 'Xe cau', 300000, 220000, 'sphamgo4.png', 'Suitable for all ages.'),
(4, 1, 'Do choi xep hinh', 100000, 75000, 'sphamgo3.png', 'Suitable for all ages.'),
(5, 1, 'Do choi hinh hoc', 50000, 45000, 'sphamgo2.png', 'Suitable for all ages.'),
(6, 1, 'Ban da bong', 500000, 450000, 'sphamgo5.png', 'Suitable for all ages.'),
(7, 1, 'Hinh go', 300000, 150000, 'sphamgo1.png', 'Suitable for all ages.'),
(8, 1, 'Nha go', 370000, 330000, 'sphamgo1.png', 'Suitable for all ages.'),
(9, 2, 'Cao', 100000, 75000, 'big-friend-fox.png', 'Suitable for all ages.'),
(10, 2, 'Su tu', 500000, 490000, 'gau1.png', 'Suitable for all ages.'),
(11, 2, 'Nhim', 370000, 350000, 'hubert.png', 'Suitable for all ages.'),
(12, 2, 'Khi', 350000, 340000, 'khi_giohang.png', 'Suitable for all ages.'),
(13, 2, 'Cao 2', 90000, 80000, 'missy-fox.png', 'Suitable for all ages.'),
(14, 2, 'Cao 3', 120000, 110000, 'thalaboo-fox.png', 'Suitable for all ages.'),
(15, 3, 'Hoa qua', 700000, 690000, 'hoaqua.png', 'Suitable for all ages.'),
(16, 3, 'Dung cu lam vuon', 370000, 350000, 'lamvuon.png', 'Suitable for all ages.'),
(17, 3, 'Dung du lam vuon 2', 350000, 340000, 'spnhua.png', 'Suitable for all ages.'),
(18, 3, 'Bua ta', 90000, 80000, 'bua.png', 'Suitable for all ages.'),
(19, 3, 'Xe lua', 120000, 110000, 'OIP.png', 'Suitable for all ages.');

-- --------------------------------------------------------

--
-- Table structure for table `star`
--

CREATE TABLE `star` (
  `yellow_star` varchar(100) NOT NULL,
  `white_star` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `star`
--

INSERT INTO `star` (`yellow_star`, `white_star`) VALUES
('Star.svg', 'WhiteStar.svg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code_password` varchar(10) NOT NULL,
  `deleted` int(2) NOT NULL,
  `avatar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `fullname`, `phone_number`, `password`, `code_password`, `deleted`, `avatar`) VALUES
('111@gmail.com', '111', '111', '$2y$10$ZtPd2PsHMVIxwwop2CuSa.cDBrd.7GFYrmr1RAQghSiPbuAFsFcvu', '23a38', 0, ''),
('123@gmail.com', 'khanh tran', '12345', '$2y$10$wm9RPqJOOVB2caPN7yAT5umL1eG3v/F3O/jJwRzlSBaiyDWeMZG4y', '0c510', 0, ''),
('dangby10a1@gmail.com', 'DAO HAI DANG', '0347188593', '$2y$10$aafuOZM0CiGG4bRjw8qgK.9pMPmFNfiOvXXYaX5ki5z42gNLDmkX.', '341ef', 0, 'man.png'),
('demo@gmail.com', 'demo', '0987654322345', '$2y$10$YNMJ2NIAtN65OG1y0AIk.e8iCnebgyybkqj6lCW.RwBz7xbM59XE2', '90a01', 0, ''),
('giang@gmail.com', 'Trần Hương Giangg', '098665754', '$2y$10$IxE0h28.FyvxzXkiCqA2nO.7BJ6zwggOd7ByQI1QR5X4S//BX6bO.', '3be58', 0, ''),
('khanh@gmail.com', 'Trần Quang Khánh', '0398878765', '$2y$10$rqsmdMsH/KRTHPVa/BM9W.zU/mbiZQ1U3eFHfD5g615XgPdjYVbj2', '38bdb', 0, 'man.png'),
('khanhtran5923@gmail.com', 'Trần Quang Khánh', '0398878765', '$2y$10$V2Pnv8t/iSTuE/BxZ8E8x.deCnnfmhG9AodOwJOiFzH8FpRTiZiIW', '18ddf', 0, ''),
('khanhtran@gmail.com', 'kkkkk', '0398878765', '$2y$10$lOwr4DHzWFDkx6ZV8YipheCLjz1BVROf1sYCGjOqIAvm7RymxdcKq', '42df8', 0, ''),
('ruyelem@gmail.com', 'kkkkk', '0398878765', '$2y$10$poeb0Op.ClLB.7aDfMvvGu9d/G7R/3wafugrOc2VQr2MMbxJ5qxoy', 'c961b', 0, ''),
('tranquangkhanh050923@gmail.com', 'Trần Quang Khánh', '0398878765', '$2y$10$xzLGdc2VFTNj4Coc0y3YvO7dUH15lhcMNfuGZn9atvFcR8UQkmBrW', '3bcc5', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`giaodich_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `email` (`email`),
  ADD KEY `email_2` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `giaodich`
--
ALTER TABLE `giaodich`
  MODIFY `giaodich_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `giaodich`
--
ALTER TABLE `giaodich`
  ADD CONSTRAINT `giaodich_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `giaodich_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
