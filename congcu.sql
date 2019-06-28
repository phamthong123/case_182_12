-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 28, 2019 lúc 06:24 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `congcu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(2, 'Phạm Văn Thi Thông', 'thithong', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kieu`
--

CREATE TABLE `kieu` (
  `idKieu` int(11) NOT NULL,
  `tenKieu` varchar(255) NOT NULL,
  `idLoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `kieu`
--

INSERT INTO `kieu` (`idKieu`, `tenKieu`, `idLoai`) VALUES
(1, 'Tee', 1),
(2, 'Hoodie', 1),
(3, 'Flannel', 1),
(4, 'Tank top', 1),
(5, 'Quần short', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `idLoai` int(11) NOT NULL,
  `tenLoai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`idLoai`, `tenLoai`) VALUES
(1, 'top'),
(2, 'bot'),
(3, 'accesory'),
(4, 'hat'),
(5, 'bag'),
(6, 'shoe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idSanPham` int(11) NOT NULL,
  `tenSanPham` varchar(255) NOT NULL,
  `tenSP_kd` varchar(155) NOT NULL,
  `kieu` varchar(255) NOT NULL,
  `url_img` varchar(255) NOT NULL,
  `gia` int(11) NOT NULL,
  `chiTiet` text NOT NULL,
  `luotxem` int(11) NOT NULL,
  `giamgia` int(11) NOT NULL,
  `maGiamgia` varchar(11) NOT NULL,
  `trangthai` varchar(255) NOT NULL,
  `soLuong` int(255) NOT NULL,
  `idLoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idSanPham`, `tenSanPham`, `tenSP_kd`, `kieu`, `url_img`, `gia`, `chiTiet`, `luotxem`, `giamgia`, `maGiamgia`, `trangthai`, `soLuong`, `idLoai`) VALUES
(1, 'Tank top A2', 'Tank top A2', '4', 'image/Screenshot_2.jpg', 250000, '<p><img alt=\"\" src=\"/congcu/login/image/images/Screenshot_2.jpg\" style=\"height:328px; width:500px\" /></p>\r\n', 0, 10, '', 'Đang giảm giá', 0, 1),
(2, 'Quần short A1', 'Quan short A1', '5', 'image/bot.jpg', 150000, '<p><img alt=\"\" src=\"/congcu/login/image/images/bot.jpg\" style=\"height:368px; width:308px\" /></p>\r\n', 0, 5, '', 'Đang giảm giá', 0, 2),
(3, 'Áo thun A2', 'Áo thun A2', '4', 'image/Screenshot_2.jpg', 250000, '', 0, 5, '', 'Đang giảm giá', 0, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kieu`
--
ALTER TABLE `kieu`
  ADD PRIMARY KEY (`idKieu`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`idLoai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idSanPham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `kieu`
--
ALTER TABLE `kieu`
  MODIFY `idKieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `idLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
