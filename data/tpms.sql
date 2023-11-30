-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2023 lúc 12:14 PM
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
-- Cấu trúc bảng cho bảng `tbl_banners`
--

CREATE TABLE `tbl_banners` (
  `id` int(11) NOT NULL,
  `bannerTitle` varchar(100) NOT NULL,
  `bannerContent` varchar(100) NOT NULL,
  `bannerImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_banners`
--

INSERT INTO `tbl_banners` (`id`, `bannerTitle`, `bannerContent`, `bannerImage`) VALUES
(1, 'Chương trình ưu đãi Black Friday', 'Ngày đen tối - Săn Sale quên lối', 'black-friday.png'),
(2, 'Tri ân lớn - Mừng ngày Thầy Cô', 'Samsung Galaxy Z Flip 5 - ZFold 5', 'tri-an-lon-mung-ngay-thay-co.png'),
(3, 'Redmi 13C (6GB/128GB)', 'Ưu đãi giảm thêm 300.000đ', 'redmi-13c.png'),
(4, 'Hotsale Xiaomi Redmi Note 12', 'Ưu đãi chỉ còn 3.690.000đ', 'hotsale-xiaomi-redmi-no-12.png'),
(5, 'Sản phẩm mới Honor 90 | 90 Lite', 'Tặng bộ quà hấp dẫn', 'sản-phẩm-mới-honor-lite.png'),
(6, 'SENNHEISER Accentum Wireles', 'Xoay gập - Chống ồn - Pin tới 50 giờ', 'Sennheiser-accentum-wireless.png'),
(7, 'Máy lọc không khí Xiaomi Air Purifier 4 Lite', 'Ưu đãi giảm giá sốc', 'may-loc-khong-khi-xiaomi-air-purifer4-lite..png'),
(8, 'Đại tiệc Rog - Săn quà tới TUF', 'Laptop Gaming mạnh nhất Việt Nam', 'dai-tiec-rog-san-qua-toi-tuf.png'),
(9, 'Sony WF - 1000XM5', 'Ưu đãi tháng 11 ', 'Sony-WF-1000XM5.png'),
(10, 'Marshall Motif II ANC', 'Tái hiện âm thanh sân khấu', 'Marshall-Motif-II-ANC.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `id` int(11) NOT NULL,
  `brandCode` varchar(50) NOT NULL,
  `brandName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brands`
--

INSERT INTO `tbl_brands` (`id`, `brandCode`, `brandName`) VALUES
(1, 'BRAND1', 'APPLE'),
(2, 'BRAND2', 'SAMSUNG'),
(3, 'BRAND3', 'XIAOMI'),
(4, 'BRAND4', 'OPPO'),
(5, 'BRAND5', 'TECHNO'),
(6, 'BRAND6', 'NOKIA'),
(7, 'BRAND7', 'REALME'),
(8, 'BRAND8', 'VIVO'),
(9, 'BRAND9', 'HONOR'),
(10, 'BRAND10', 'HTC'),
(11, 'BRAND11', 'INFINIX'),
(12, 'BRAND12', 'ROG'),
(13, 'BRAND13', 'NUBIA'),
(14, 'BRAND14', 'XOR'),
(15, 'BRAND15', 'MASSTEL'),
(16, 'BRAND16', 'TCL'),
(17, 'BRAND17', 'ITEL'),
(18, 'BRAND18', 'MỚI - TIN ĐỒN'),
(19, 'BRAND19', 'ĐIỆN THOẠI CAO CẤP'),
(20, 'BRAND20', 'ĐIỆN THOẠI GẬP'),
(21, 'BRAND21', 'ASUS'),
(22, 'BRAND22', 'DELL'),
(23, 'BRAND23', 'ACER'),
(24, 'BRAND24', 'MSI'),
(25, 'BRAND25', 'LG'),
(26, 'BRAND26', 'HUAWEI'),
(27, 'BRAND27', 'SURFACE'),
(28, 'BRAND28', 'LENOVO'),
(29, 'BRAND29', 'HP'),
(30, 'BRAND30', 'GIGABYTE'),
(31, 'BRAND31', 'YUHO'),
(32, 'BRAND32', 'MICROSOFT SURFACE'),
(33, 'BRAND32', 'TLC');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `Id` int(11) NOT NULL,
  `categoryCode` varchar(50) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_categories`
--

INSERT INTO `tbl_categories` (`Id`, `categoryCode`, `categoryName`) VALUES
(1, 'CAT1', 'ĐIỆN THOẠI'),
(2, 'CAT2', 'LAPTOP'),
(3, 'CAT3', 'TABLET'),
(4, 'CAT4', 'MÀN HÌNH'),
(5, 'CAT5', 'SMART TV'),
(6, 'CAT6', 'ĐỒNG HỒ'),
(7, 'CAT7', 'ÂM THANH'),
(8, 'CAT8', 'SMART HOME'),
(16, 'CAT9', 'PHỤ KIỆN'),
(17, 'CAT10', 'ĐỒ CHƠI CN'),
(18, 'CAT11', 'MÁY TRÔI'),
(19, 'CAT12', 'SỬA CHỮA'),
(20, 'CAT13', 'DỊCH VỤ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_colors`
--

CREATE TABLE `tbl_colors` (
  `id` int(11) NOT NULL,
  `colorName` varchar(100) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `idBrand` int(11) NOT NULL,
  `productId` varchar(50) NOT NULL,
  `productCode` varchar(150) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productVersion` varchar(50) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `productDescription` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `idCategory`, `idBrand`, `productId`, `productCode`, `productName`, `productVersion`, `productImage`, `productDescription`) VALUES
(4, 1, 1, 'IP15PROMA', 'IP15PROMAX', 'Điện thoại di động iPhone 15 Pro Max (256GB) - Chính hãng VN/', 'TITAN XANH - 256GB', 'iphone-15-pro-max-256gb-titan-trắng.png', '<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">Tất cả iPhone ch&iacute;nh h&atilde;ng VN/A được ph&acirc;n phối tại Ho&agrave;ng H&agrave; Mobile đều được nhập trực tiếp từ C&ocirc;ng ty TNHH Apple Việt Nam. Ho&agrave;ng H&agrave; Mobile l&agrave; nh&agrave; b&aacute;n lẻ ủy quyền ch&iacute;nh thức của Apple&nbsp;tại&nbsp;Việt&nbsp;Nam.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><img src=\"https://admin.hoanghamobile.com/Uploads/2023/10/10/tem-ict-apple.jpg\" style=\"max-width:100%\" /></span></span></span></span></p>\r\n\r\n<blockquote>\r\n<p style=\"text-align:justify\"><strong><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\"><a href=\"https://hoanghamobile.com/dien-thoai-di-dong/iphone/iphone-15-series\" style=\"text-decoration:none; color:#00483d\" target=\"_blank\"><span style=\"color:#397b21\">iPhone 15 Pro Max</span></a></span></strong><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">&nbsp;đ&atilde; ch&iacute;nh thức được ra mắt trong sự kiện Wonderlust tại nh&agrave; h&aacute;t Steve Jobs, California (Mỹ) v&agrave;o l&uacute;c 10h s&aacute;ng 12/9 tức 0h ng&agrave;y 13/9 (giờ Việt Nam). Chiếc&nbsp;<a href=\"https://hoanghamobile.com/dien-thoai-di-dong/iphone\" style=\"text-decoration:none; color:#00483d\" target=\"_blank\"><span style=\"color:#397b21\"><strong>iPhone</strong></span></a>&nbsp;mới trong series mới đem đến cho người d&ugrave;ng trải nghiệm ổn định hơn với thế hệ&nbsp;<strong>chip A17 Pro&nbsp;</strong>mới nhất, c&ugrave;ng c&ocirc;ng nghệ&nbsp;<strong>Wi-Fi 6E</strong>. Bộ camera của iPhone 15 Pro Max cũng được n&acirc;ng cấp th&ecirc;m với<strong>&nbsp;ống k&iacute;nh tele</strong>&nbsp;với khả năng zoom quang học 5x với thiết kế tetraprism hiện đại.</span></p>\r\n</blockquote>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><strong><span dir=\"ltr\" lang=\"vi\" style=\"font-size:18pt\">iPhone 15 Pro Max m&agrave;u sắc sang chảnh, iFans ch&aacute;y t&uacute;i</span></strong></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><strong><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">iPhone 15 Pro Max&nbsp;</span></strong><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">đem đến cho người d&ugrave;ng đa dạng sự lựa chọn với ba phi&ecirc;n bản bộ nhớ trong lần lượt l&agrave; 256GB/512GB/1TB v&agrave; bốn lựa chọn m&agrave;u gồm Titan Tự Nhi&ecirc;n/Titan Trắng/Titan Xanh/Titan Đen. Ngo&agrave;i việc sử dụng chất liệu Titan mới, những cải tiến về cấu h&igrave;nh được Apple cập nhật v&agrave; trang bị hứa hẹn đem đến trải nghiệm người d&ugrave;ng n&acirc;ng cao hơn.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><img alt=\"iPhone 15 Pro Max Màu Titan Tự Nhiên\" src=\"https://admin.hoanghamobile.com/Uploads/2023/09/14/vn-iphone-15-pro-max-natural-titanium-pdp-image-position-1a-natural-titanium-color.jpg\" style=\"max-width:100%\" /></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><strong><span dir=\"ltr\" lang=\"vi\" style=\"font-size:16pt\">Thiết kế khung viền titan nhẹ hơn, bền hơn</span></strong></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">Đối với iPhone 15 Pro Max, Apple đ&atilde; quyết định loại bỏ lớp khung th&eacute;p kh&ocirc;ng gỉ truyền thống v&agrave; chuyển sang sử dụng titan gi&uacute;p thiết bị nhẹ hơn khoảng 10% so với c&aacute;c phi&ecirc;n bản trước đ&oacute;. Ngo&agrave;i đem đến trải nghiệm cầm nắm thuận tiện hơn, chất liệu titan c&oacute; t&iacute;nh chất chống ăn m&ograve;n v&agrave; chịu được va đập tốt sẽ mang lại độ bền cao hơn cho iPhone 15 Pro Max.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><img alt=\"iPhone 15 Pro Max Màu Titan Tự Nhiên\" src=\"https://admin.hoanghamobile.com/Uploads/2023/09/14/vn-iphone-15-pro-max-natural-titanium-pdp-image-position-2-design.jpg\" style=\"max-width:100%\" /></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><strong><span dir=\"ltr\" lang=\"vi\" style=\"font-size:16pt\">Wi-Fi 6E tốc độ kết nối mạng kh&ocirc;ng d&acirc;y nhanh gấp 2</span></strong></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">iPhone 15 Pro Max c&oacute; tốc độ kết nối mạng nhanh gấp đ&ocirc;i với cải tiến Wi-Fi 6E ho&agrave;n to&agrave;n mới, cung cấp kết nối ổn định v&agrave; nhanh ch&oacute;ng, bạn ho&agrave;n to&agrave;n c&oacute; thể tải xuống c&aacute;c tập tin nhanh như chớp.&nbsp;</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n<span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><img alt=\"iPhone 15 Pro Max Thiết kế\" src=\"https://admin.hoanghamobile.com/Uploads/2023/09/14/vn-iphone-15-pro-max-natural-titanium-pdp-image-position-3-design-detail.jpg\" style=\"max-width:100%\" /></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">Khả năng sửa chữa tiếp tục được n&acirc;ng cấp tr&ecirc;n iPhone 15 Pro Max trong việc sửa chữa m&agrave;n h&igrave;nh. Apple tiếp tục triển khai việc sử dụng c&aacute;c linh kiện v&agrave; m&ocirc;-đun m&agrave;n h&igrave;nh c&oacute; thể được thay thế một c&aacute;ch dễ d&agrave;ng hơn, m&agrave; kh&ocirc;ng cần phải th&aacute;o rời nhiều phần kh&aacute;c nhau của thiết bị, gi&uacute;p giảm thời gian v&agrave; c&ocirc;ng sức cần thiết cho qu&aacute; tr&igrave;nh sửa chữa, đồng thời giảm nguy cơ g&acirc;y hư hỏng hoặc tổn thất linh kiện kh&aacute;c.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><strong><span dir=\"ltr\" lang=\"vi\" style=\"font-size:16pt\">Camera được n&acirc;ng cấp với ống k&iacute;nh tele độ ph&acirc;n giải lớn</span></strong></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">Apple giữ nguy&ecirc;n cụm camera ch&iacute;nh tr&ecirc;n iPhone 15 Pro Max v&agrave; trang bị th&ecirc;m ống k&iacute;nh tele v&agrave; ống k&iacute;nh si&ecirc;u rộng, gi&uacute;p người d&ugrave;ng c&oacute; được những bức ảnh chất lượng cao hơn với đầy đủ c&aacute;c chi tiết v&agrave; m&agrave;u sắc trung thực.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><img alt=\"iPhone 15 Pro Max Màu Sắc\" src=\"https://admin.hoanghamobile.com/Uploads/2023/09/14/vn-iphone-15-pro-max-natural-titanium-pdp-image-position-5-colors.jpg\" style=\"max-width:100%\" /></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">Ngo&agrave;i ra, Apple cũng đang ph&aacute;t triển camera Telephoto với ống k&iacute;nh thiết kế tetraprism mới cho iPhone 15 Pro Max. Ống k&iacute;nh n&agrave;y gi&uacute;p tăng độ khả năng zoom quang học từ 3x l&ecirc;n 5x ở ti&ecirc;u cự 120mm m&agrave; kh&ocirc;ng l&agrave;m giảm chất lượng ảnh với cảm biến lớn hơn 25% so với 14 Pro Max c&ugrave;ng khẩu độ f/2.8. Những cải tiến camera n&agrave;y hỗ trợ người d&ugrave;ng thực hiện chụp ảnh từ xa với độ chi tiết cao v&agrave; khả năng ghi lại c&aacute;c chi tiết nhỏ hiệu quả hơn.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><strong><span dir=\"ltr\" lang=\"vi\" style=\"font-size:16pt\">iPhone 15 Pro Max trang bị chip A17 Pro n&acirc;ng cao hiệu suất v&agrave; tiết kiệm pin</span></strong></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">Chip Apple A17 Pro được trang bị cho iPhone 15 Pro Max l&agrave; con chip được sản xuất tr&ecirc;n tiến tr&igrave;nh 3 nm mới nhất của TSMC. A17 Pro c&oacute; khoảng 19 tỷ b&oacute;ng b&aacute;n dẫn gấp 1,5 lần b&oacute;ng b&aacute;n dẫn trong A16 Bionic.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><img alt=\"iPhone 15 Pro Max Tin Nổi Bật\" src=\"https://admin.hoanghamobile.com/Uploads/2023/09/14/vn-iphone-15-pro-max-natural-titanium-pdp-image-position-6-feature-story.jpg\" style=\"max-width:100%\" /></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">Với tiến tr&igrave;nh mới &aacute;p dụng tr&ecirc;n A17 Pro, con chip n&agrave;y sẽ gi&uacute;p iPhone 15 Pro Max cải thiện hiệu suất GPU l&ecirc;n đến 20% b&ecirc;n cạnh việc c&ocirc;ng nghệ d&ograve; tia dựa tr&ecirc;n phần mềm nhanh hơn 4 lần so với con chip tiền nhiệm. Khi hiệu suất v&agrave; mức ti&ecirc;u thụ năng lượng được cải thiện, tuổi thị vi&ecirc;n pin của&nbsp; iPhone 15 Pro Max được đ&aacute;nh gi&aacute; l&agrave; sẽ bền bỉ hơn so với d&ograve;ng sản phẩm cũ.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><strong><span dir=\"ltr\" lang=\"vi\" style=\"font-size:16pt\">Thời lượng pin Pro</span></strong></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">D&ugrave; được trang bị rất nhiều t&iacute;nh năng mới ti&ecirc;n tiến để phục vụ nhu cầu sử dụng cao của người d&ugrave;ng, iPhone 15 Pro vẫn mang đến cho ch&uacute;ng ta thời lượng pin d&ugrave;ng thoải m&aacute;i cả ng&agrave;y d&agrave;i đầy ấn tượng. Dung lượng pin tr&ecirc;n iPhone 15 Pro Max cho bạn thời gian xem video li&ecirc;n tục l&ecirc;n đến 29 giờ, d&agrave;i hơn 9 giờ so với dung lượng pin tr&ecirc;n iPhone 12 Pro Max.&nbsp;</span><span style=\"font-size:12pt\">B&ecirc;n cạnh đ&oacute;, m&aacute;y được hỗ trợ USB 3.0 đem đến cho người d&ugrave;ng trải nghiệm truyền v&agrave; xử l&yacute; dữ liệu tốc độ nhanh gấp 20 lần.</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><img alt=\"iPhone 15 Pro Max Tính Năng &amp; Thông Số Kỹ Thuật\" src=\"https://admin.hoanghamobile.com/Uploads/2023/09/14/vn-iphone-15-pro-max-natural-titanium-pdp-image-position-7-features-specs.jpg\" style=\"max-width:100%\" /></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><strong><span dir=\"ltr\" lang=\"vi\" style=\"font-size:18pt\">Gi&aacute; dự kiến của iPhone 15 Pro Max</span></strong></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">Gi&aacute; b&aacute;n khởi điểm của iPhone 15 Pro Max khởi điểm điểm từ 1.199 USD (khoảng 28 triệu VNĐ). Gi&aacute; b&aacute;n sản phẩm d&agrave;nh cho người d&ugrave;ng Việt thay đổi t&ugrave;y thuộc v&agrave;o phi&ecirc;n bản bộ nhớ cũng như thời gian cập bến thị trường Việt Nam. Theo th&ocirc;ng tin mở b&aacute;n mới nhất tr&ecirc;n trang web ch&iacute;nh thức của Apple, mức gi&aacute; cho mỗi phi&ecirc;n bản iPhone 15 Pro Max hiện tại lần lượt như sau:</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">iPhone 15 Pro Max 256GB: 1.199 USD (Khoảng 28 triệu VNĐ)</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">iPhone 15 Pro Max 512GB: 1.399 USD (Khoảng 33 triệu VNĐ)</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">iPhone 15 Pro Max 1TB: 1.599 USD (Khoảng 38 triệu VNĐ)</span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><img alt=\"iPhone 15 Pro Max Cáp Sạc USB-C\" src=\"https://admin.hoanghamobile.com/Uploads/2023/09/14/vn-iphone-15-pro-max-natural-titanium-pdp-image-position-8-usb-c-charge-cable.jpg\" style=\"max-width:100%\" /></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><strong><span dir=\"ltr\" lang=\"vi\" style=\"font-size:16pt\">Nhận th&ocirc;ng tin của iPhone 15 Pro Max tại Ho&agrave;ng H&agrave; Mobile</span></strong></span></span></span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"font-family:-apple-system,BlinkMacSystemFont,\"><span style=\"background-color:#ffffff\"><span dir=\"ltr\" lang=\"vi\" style=\"font-size:12pt\">Ho&agrave;ng H&agrave; Mobile - Đại l&yacute; uy t&iacute;n chuy&ecirc;n cung cấp c&aacute;c sản phẩm c&ocirc;ng nghệ chất lượng h&agrave;ng đầu, h&acirc;n hạnh th&ocirc;ng b&aacute;o đến qu&yacute; kh&aacute;ch h&agrave;ng về sự ra mắt đặc biệt của iPhone 15 Pro Max. Trong khi chờ đợi thiết bị cập bến v&agrave; sẵn s&agrave;ng tr&ecirc;n hệ thống của Ho&agrave;ng H&agrave;, qu&yacute; kh&aacute;ch h&agrave;ng c&oacute; thể đăng k&yacute; tại đ&acirc;y để nhận những th&ocirc;ng tin mới nhất về iPhone 15 Pro Max ngay h&ocirc;m nay.</span></span></span></span></span></p>\r\n');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_versions`
--

CREATE TABLE `tbl_versions` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `versionCode` varchar(100) NOT NULL,
  `versionName` varchar(100) NOT NULL,
  `versionImage` varchar(255) NOT NULL,
  `versionPrice` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_versions`
--

INSERT INTO `tbl_versions` (`id`, `productId`, `versionCode`, `versionName`, `versionImage`, `versionPrice`) VALUES
(1, 4, 'IP15PROMAX', 'TITAN XANH - 256GB', 'iphone-15-pro-max.png', 32850000),
(2, 4, 'IP15PROMAX', 'TITAN ĐEN- 256GB', 'iphone-15-pro-max-256gb-titan-trắng.png', 33190000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_banners`
--
ALTER TABLE `tbl_banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_colors`
--
ALTER TABLE `tbl_colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategory` (`idCategory`),
  ADD KEY `idBrand` (`idBrand`);

--
-- Chỉ mục cho bảng `tbl_versions`
--
ALTER TABLE `tbl_versions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idColor` (`versionPrice`),
  ADD KEY `tbl_versions_ibfk_1` (`productId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_banners`
--
ALTER TABLE `tbl_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_colors`
--
ALTER TABLE `tbl_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_versions`
--
ALTER TABLE `tbl_versions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `tbl_categories` (`Id`),
  ADD CONSTRAINT `tbl_products_ibfk_2` FOREIGN KEY (`idBrand`) REFERENCES `tbl_brands` (`id`);

--
-- Các ràng buộc cho bảng `tbl_versions`
--
ALTER TABLE `tbl_versions`
  ADD CONSTRAINT `tbl_versions_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tbl_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
