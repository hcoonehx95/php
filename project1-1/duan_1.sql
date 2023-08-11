-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2022 lúc 03:57 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `ma_bl` int(11) NOT NULL,
  `noi_dung` text NOT NULL,
  `Ma_SP` int(11) NOT NULL,
  `ngay_bl` date NOT NULL,
  `rating` tinyint(5) NOT NULL,
  `ma_kh` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`ma_bl`, `noi_dung`, `Ma_SP`, `ngay_bl`, `rating`, `ma_kh`) VALUES
(5, 'haha', 45, '2022-11-21', 5, 'admin'),
(6, 'hì', 48, '2022-11-21', 5, 'admin'),
(7, 'ok\r\n', 47, '2022-11-21', 5, 'admin'),
(8, 'ok\r\n', 47, '2022-11-21', 5, 'admin'),
(9, 'Diễm Quỳnh đã mua', 50, '2022-11-21', 5, 'admin'),
(10, 'Cho 10 sao chu k phai 5 sao\r\n', 49, '2022-11-23', 2, 'admin'),
(11, 'Đạt như củ chuối\r\n', 51, '2022-11-23', 5, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ma_hd` int(11) NOT NULL,
  `ma_kh` varchar(20) NOT NULL,
  `tong_tien` float NOT NULL,
  `ngay_mua` date NOT NULL,
  `ghi_chu` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`ma_hd`, `ma_kh`, `tong_tien`, `ngay_mua`, `ghi_chu`) VALUES
(2, 'admin', 12300000, '2022-11-25', 'Chưa thanh toán'),
(3, 'hungpp', 1980000, '2022-11-25', 'Chưa thanh toán'),
(5, 'hungpp', 4100000, '2022-11-28', 'Chưa thanh toán'),
(6, 'admin', 8200000, '2022-11-28', 'Chưa thanh toán'),
(7, 'hungpp', 7000000, '2022-11-28', 'Chưa thanh toán'),
(10, 'hungpp', 990000, '2022-11-28', 'Chưa thanh toán'),
(11, 'hungpp', 990000, '2022-11-28', 'Chưa thanh toán'),
(12, 'hungpp', 2550000, '2022-11-28', 'Chưa thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `ma_hdct` int(11) NOT NULL,
  `ma_hd` int(11) NOT NULL,
  `Ma_SP` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `size` enum('s','m','l','xl') NOT NULL,
  `mau` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadonchitiet`
--

INSERT INTO `hoadonchitiet` (`ma_hdct`, `ma_hd`, `Ma_SP`, `so_luong`, `size`, `mau`) VALUES
(1, 2, 51, 2, 's', 'black'),
(2, 2, 52, 1, 'xl', 'black'),
(3, 3, 53, 2, 'l', 'black'),
(5, 5, 51, 1, 'm', 'black'),
(6, 6, 52, 2, 'm', 'black'),
(7, 7, 51, 1, 's', 'black'),
(8, 7, 49, 1, 's', 'black'),
(12, 10, 53, 1, 's', 'black'),
(13, 11, 53, 1, 's', 'black'),
(14, 12, 50, 1, 's', 'black');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `Image` text NOT NULL,
  `Ma_SP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `img`
--

INSERT INTO `img` (`id`, `Image`, `Ma_SP`) VALUES
(107, 'ALI14147.jpg', 47),
(108, 'ALI14161.jpg', 47),
(109, 'ALI14175.jpg', 47),
(111, 'ali14181-1668690747.jpg', 47),
(112, 'ALI12351.jpg', 48),
(113, 'ALI12354.jpg', 48),
(114, 'ALI12361.jpg', 48),
(115, 'ALI12398.jpg', 48),
(116, 'ali12406-1666835979.jpg', 48),
(117, '0152SIXDO_Kiengcanteam(1).jpg', 49),
(118, 'dsj_6463-1636697744.jpg', 49),
(119, 'DSJ_6472.jpg', 49),
(120, 'DSJ_6487.jpg', 49),
(121, 'ALI11287.jpg', 50),
(122, 'ALI11307.jpg', 50),
(123, 'ali11310-1668679191.jpg', 50),
(124, 'ALI11403.jpg', 50),
(125, 'ALI11607.jpg', 51),
(127, 'ALI11626.jpg', 51),
(128, 'ALI11661.jpg', 51),
(129, '_1668688514ALI10642_1.jpg', 52),
(130, '_1668688516ALI10602_1.jpg', 52),
(131, '_1668688519ALI10682_1.jpg', 52),
(132, 'ali10629-1668688567.jpg', 52),
(133, 'vnq00252-1667554420.jpg', 53),
(134, 'VNQ00259.jpg', 53),
(135, 'VNQ00261.jpg', 53),
(136, 'VNQ00265.jpg', 53),
(137, 'ALI11661.jpg', 51);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`) VALUES
(12, 'Quần'),
(13, 'Váy Đầm'),
(14, 'Quần nữ'),
(15, 'Áo Phông Nữ'),
(16, 'Chân váy'),
(17, 'Set quần áo nữ'),
(18, 'Áo vest nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `Ma_SP` int(11) NOT NULL,
  `Ten_SP` text NOT NULL,
  `Price` float NOT NULL,
  `Price_Giam` float NOT NULL,
  `Mota` text NOT NULL,
  `ngay_nhap` date NOT NULL,
  `so_luot_xem` int(15) NOT NULL,
  `ma_loai` int(11) NOT NULL,
  `dac_biet` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`Ma_SP`, `Ten_SP`, `Price`, `Price_Giam`, `Mota`, `ngay_nhap`, `so_luot_xem`, `ma_loai`, `dac_biet`) VALUES
(47, 'Red Cropped Tweed Vest', 2896000, 2896000, 'Giới thiệu về WEBsite Xin chào bạn – độc giả của WEBSITE,\r\nLời đầu tiên, cho phép admin được gửi tới quý khách, quý thân nhân và bạn bè lời chúc sức khỏe, thành đạt và hạnh phúc.\r\nWebsite được thành lập tháng 11/2022 dưới dạng Blog cá nhân, với mục đích ban đầu là nơi lưu trữ những bài viết kiến thức hoặc những sản phẩm sáng tạo trong quá trình học tập, làm việc.\r\nSau một thời gian hoạt động, website đã có những bước tiến đáng kể cả về chất lượng và hình thức. Số lượng khách truy cập website trở thành khách hàng sử dụng dịch vụ thiết kế tăng lên đáng kể. Từ việc chăm chút nội dung cho website theo sở thích, Nguyễn Huy Hoàng đã dần chinh phục khách hàng với những dịch vụ thiết kế sáng tạo uy tín và chất lượng.\r\nTự tin với khả năng đáp ứng mọi yêu cầu thiết kế của khách hàng, Nguyễn Huy Hoàng chính thức đem lại dịch vụ Thiết kế đồ họa và Thiết kế Website chuyên nghiệp từ đầu năm 2022. Sự ủng hộ và tin tưởng của khách hàng sẽ trở thành nguồn cảm hứng lớn lao cho Website trong quá trình phác họa những ý tưởng thiết kế được trở thành hiện thực.\r\nXin cám ơn sự tin tưởng và ủng hộ của quý khách trong thời gian qua. Trân trọng./.\r\nAdmin', '2022-11-21', 31, 18, 1),
(48, 'Pink Check Tweed Dress And Vest Set', 4590000, 4100000, 'Pink Check Tweed Dress And Vest Set ', '2022-11-21', 16, 17, 1),
(49, 'Black Tweed Dress And Vest Set', 3432000, 2900000, 'Black Tweed Dress And Vest Set', '2022-11-21', 9, 17, 1),
(50, 'Green Midi Tweed Dress', 2996000, 2550000, 'Green Midi Tweed Dress', '2022-11-21', 39, 13, 1),
(51, 'Multi-coloured Stripe Midi Tweed Dress', 4490000, 4100000, 'Multi-coloured Stripe Midi Tweed Dress', '2022-11-21', 139, 13, 1),
(52, 'Navy Wide Leg Tweed Pants', 4390000, 4100000, 'Navy Wide Leg Tweed Pants', '2022-11-21', 47, 14, 1),
(53, 'Black Wide Leg Raw Pants With Buttons', 1299000, 990000, 'Black Wide Leg Raw Pants With Buttons', '2022-11-21', 137, 14, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ma_kh` varchar(20) NOT NULL COMMENT 'ten_dn',
  `vaitro` varchar(30) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `kich_hoat` bit(1) NOT NULL,
  `mat_khau` varchar(24) NOT NULL,
  `sdt` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `dia_chi` text NOT NULL,
  `tinh_thanhpho` text NOT NULL,
  `quan_huyen` text NOT NULL,
  `xa_phuong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ma_kh`, `vaitro`, `ho_ten`, `kich_hoat`, `mat_khau`, `sdt`, `email`, `Image`, `dia_chi`, `tinh_thanhpho`, `quan_huyen`, `xa_phuong`) VALUES
('admin', '1', 'Nguyễn Phi Anh', b'1', '111111', 0, 'admin@gmail.com', 'z3852442365124_47ece630304786a0bb33f4e9e53b2f86.jpg', '', '0', '', '0'),
('admin1', '1', 'Nguyễn Viết Quân', b'1', '111111', 0, 'admin1@gmail.com', 'product11.webp', '', '0', '', '0'),
('admin2', '0', 'Nguyễn Phi Anh', b'1', '123123', 0, 'admin@gmail.com', 'z3889696159136_63cd9e60f2d2cf591a2f0e3798d0626d.jpg', '', '0', '', '0'),
('admin33', '0', 'hùng', b'1', '1111111', 343843232, 'adfdfd@gmail.com', '', 'fdfdfwd', '25', '234', '08317'),
('hcoonehx95', '0', 'hùng', b'1', '111111', 909011002, 'hcoone@gmai.com', '', 'ấccs', '02', '024', '00688'),
('hungpp', '0', 'hùng', b'1', '123456', 0, 'hcoone22@gmail.com', 'cna.jpg', '', '0', '', '0'),
('locphuho', '0', 'Lộc Phụ Hồ', b'1', '111111', 0, 'locphuho@gmail.com', 'locfuho.webp', '', '0', '', '0'),
('quan', '0', 'Nguyen Viet Quan', b'1', '111111', 0, '', 'locfuho.webp', '', '0', '', '0'),
('user', '0', 'Nguyễn Phi Anh', b'1', '111111', 0, 'nguyenphianh161003@gmai.com', 'product5.webp', '', '0', '', '0');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `Ma_SP` (`Ma_SP`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ma_hd`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD PRIMARY KEY (`ma_hdct`),
  ADD KEY `Ma_SP` (`Ma_SP`),
  ADD KEY `MaHD` (`ma_hd`);

--
-- Chỉ mục cho bảng `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Ma_SP` (`Ma_SP`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Ma_SP`),
  ADD KEY `ma_loai` (`ma_loai`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ma_kh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ma_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  MODIFY `ma_hdct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `Ma_SP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
