-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2023 lúc 10:36 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tpms`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_models`
--

CREATE TABLE `tbl_models` (
  `Id` int(11) NOT NULL,
  `ModelCode` varchar(50) NOT NULL,
  `ModelName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_models`
--

INSERT INTO `tbl_models` (`Id`, `ModelCode`, `ModelName`) VALUES
(1, '', 'BMW I'),
(2, '', 'X'),
(3, '', '3'),
(4, '', '4'),
(5, '', '5'),
(6, '', '7'),
(7, '', '8'),
(8, '', 'z4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `Id` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductCode` varchar(50) NOT NULL,
  `ModelID` int(11) NOT NULL,
  `Price` bigint(20) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Description` longtext NOT NULL,
  `Details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`Id`, `ProductName`, `ProductCode`, `ModelID`, `Price`, `Image`, `Description`, `Details`) VALUES
(1, 'BMW I7', 'THE NEW I7', 1, 7199000000, '', '', ''),
(2, 'BMW iX3', 'THE NEW iX3', 1, 3499000000, '', '', ''),
(3, 'BMW i4', 'THE NEW i4', 1, 3759000000, '', '', ''),
(4, 'BMW X3', 'THE NEW X3', 2, 1799000000, '', '', ''),
(5, 'BMW X4', 'THE NEW X4', 2, 3069000000, '', '', ''),
(6, 'BMW X5', 'THE NEW X5', 2, 3299000000, '', '', ''),
(7, 'BMW X6', 'THE NEW X6', 2, 4369000000, '', '', ''),
(8, 'BMW X7', 'THE NEW X7', 2, 5569000000, '', '', ''),
(9, 'BMW 4', 'THE NEW 3', 3, 1489000000, '', '', ''),
(10, 'BMW 4 SERIES MUI TRẦN', 'THE NEW 5', 4, 3159000000, '', '', ''),
(11, 'BMW 4 SERIES GRAN COUPÉ', 'THE NEW 4', 4, 2779000000, '', '', ''),
(12, 'BMW 5 SERIES', ' THE NEW 5', 5, 1859000000, '', '', ''),
(13, 'BMW 7', 'THE NEW 7', 6, 4999000000, '', '', ''),
(14, 'BMW 8 SERIES GRAN COUPÉ', 'THE NEW 8', 7, 6899000000, '', '', ''),
(15, 'BMW Z4', 'THE NEW Z4', 8, 3239000000, '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `Id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gmail` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`Id`, `username`, `password`, `fullname`, `gmail`, `phone`, `permission`) VALUES
(1, 'admin@tpms.com', 'e3afed0047b08059d0fada10f400c1e5', 'Admin', 'admin@bms.com', 386131716, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_models`
--
ALTER TABLE `tbl_models`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ModelID` (`ModelID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_models`
--
ALTER TABLE `tbl_models`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`ModelID`) REFERENCES `tbl_models` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
