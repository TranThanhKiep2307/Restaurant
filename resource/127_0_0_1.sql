-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2023 lúc 09:33 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `food`
--
CREATE DATABASE IF NOT EXISTS `food` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `food`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `AD_id` int(11) NOT NULL,
  `AD_ten` varchar(30) NOT NULL,
  `AD_username` varchar(10) NOT NULL,
  `AD_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`AD_id`, `AD_ten`, `AD_username`, `AD_password`) VALUES
(1, 'Nguyễn Phương Thư', 'thu', '123456'),
(2, 'Nguyễn Thị Phương Thư', 'admin', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `BV_MA` int(10) NOT NULL,
  `QTV_MA` varchar(10) NOT NULL,
  `MA_MA` varchar(10) NOT NULL,
  `CTV_MA` varchar(10) NOT NULL,
  `BV_TIEUDE` varchar(30) DEFAULT NULL,
  `BV_NOIDUNG` mediumtext DEFAULT NULL,
  `BV_HINHANH` varchar(200) DEFAULT NULL,
  `BV_TINHTRANG` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`BV_MA`, `QTV_MA`, `MA_MA`, `CTV_MA`, `BV_TIEUDE`, `BV_NOIDUNG`, `BV_HINHANH`, `BV_TINHTRANG`) VALUES
(1, '', '', '', 'hi', '<p>hi</p>', '3a9265ab90.jpg', 'Chọn trạng'),
(2, '', '', '', 'hi 2', '<p>Thu ngu</p>', 'aa1a28fc91.jpg', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bao_gom`
--

CREATE TABLE `bao_gom` (
  `HD_MA` varchar(10) NOT NULL,
  `MA_MA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `HD_MA` varchar(10) NOT NULL,
  `CTHD_SOLUONG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietmonan`
--

CREATE TABLE `chitietmonan` (
  `MA_MA` varchar(10) NOT NULL,
  `CTMA_DONGIA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congtacvien`
--

CREATE TABLE `congtacvien` (
  `CTV_MA` int(10) NOT NULL,
  `QA_MA` varchar(10) NOT NULL,
  `CTV_TEN` varchar(30) DEFAULT NULL,
  `CTV_USERNAME` varchar(20) DEFAULT NULL,
  `CTV_PASS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `congtacvien`
--

INSERT INTO `congtacvien` (`CTV_MA`, `QA_MA`, `CTV_TEN`, `CTV_USERNAME`, `CTV_PASS`) VALUES
(1, '01', 'Nguyễn Ngọc Hân', 'ctv01', '12345');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `co_loai_mon_an`
--

CREATE TABLE `co_loai_mon_an` (
  `QA_MA` varchar(10) NOT NULL,
  `LMA_MA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `co_mon_an`
--

CREATE TABLE `co_mon_an` (
  `LMA_MA` varchar(10) NOT NULL,
  `MA_MA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duoc_viet_vao`
--

CREATE TABLE `duoc_viet_vao` (
  `RW_MA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `HD_MA` int(10) NOT NULL,
  `KH_MA` varchar(10) NOT NULL,
  `HD_NGAYLAP` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `KH_MA` int(10) NOT NULL,
  `KH_USERNAME` varchar(10) DEFAULT NULL,
  `KH_PASS` varchar(10) DEFAULT NULL,
  `KH_DIACHI` varchar(100) DEFAULT NULL,
  `KH_TEN` varchar(30) DEFAULT NULL,
  `KH_SDT` decimal(10,0) DEFAULT NULL,
  `KH_EMAIL` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`KH_MA`, `KH_USERNAME`, `KH_PASS`, `KH_DIACHI`, `KH_TEN`, `KH_SDT`, `KH_EMAIL`) VALUES
(1, 'dang', '123', '21', 'Nguyen Nhat Dang', 912345678, 'example@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaimonan`
--

CREATE TABLE `loaimonan` (
  `LMA_MA` varchar(10) NOT NULL,
  `LMA_TEN` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaimonan`
--

INSERT INTO `loaimonan` (`LMA_MA`, `LMA_TEN`) VALUES
('01', 'Lẩu'),
('02', 'Ăn vặt'),
('03', 'Trái cây');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monan`
--

CREATE TABLE `monan` (
  `MA_MA` int(10) NOT NULL,
  `LMA_MA` varchar(10) NOT NULL,
  `MA_TEN` varchar(30) DEFAULT NULL,
  `MA_TINHTRANG` varchar(10) DEFAULT NULL,
  `MA_HINHANH` varchar(200) DEFAULT NULL,
  `MA_MOTA` text NOT NULL,
  `MA_GIA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `monan`
--

INSERT INTO `monan` (`MA_MA`, `LMA_MA`, `MA_TEN`, `MA_TINHTRANG`, `MA_HINHANH`, `MA_MOTA`, `MA_GIA`) VALUES
(1, '02', 'Mì trộn MH', '1', 'product-1.jpg', '', 28000),
(2, '02', 'Mì cay ITADA', NULL, 'product-2.jpg', '', 35000),
(3, '02', 'Gỏi cuốn ', NULL, 'product-3.jpg', '', 6000),
(4, '02', 'Bún đậu mắm tôm Bà ròm', NULL, 'product-4.jpg', '', 45000),
(5, '02', 'Phúc Long', NULL, 'product-5.jpg', '', 60000),
(6, '02', 'Cơm gà xối mỡ NH', NULL, 'product-6.jpg', '', 35000),
(7, '03', 'Dalat Graden', NULL, 'product-7.jpg', '', 120000),
(8, '02', 'Pizza Hut', NULL, 'product-8.jpg', '', 99000),
(9, '01', 'Bún riêu cua đồng', NULL, 'product-9.jpg', '', 25000),
(10, '02', 'Chè cô Chu', NULL, 'product-10.jpg', '', 27000),
(11, '01', 'Sabu Sabu', NULL, 'product-11.jpg', '', 120000),
(12, '02', 'Highland', NULL, 'product-12.jpg', '', 65000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuong`
--

CREATE TABLE `phuong` (
  `P_MA` int(10) NOT NULL,
  `P_TEN` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanan`
--

CREATE TABLE `quanan` (
  `QA_MA` int(10) NOT NULL,
  `QH_MA` varchar(10) NOT NULL,
  `QA_TEN` varchar(30) DEFAULT NULL,
  `QA_DIACHI` varchar(100) DEFAULT NULL,
  `QA_SDT` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `QH_MA` int(10) NOT NULL,
  `P_MA` varchar(10) NOT NULL,
  `QH_TEN` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantrivien`
--

CREATE TABLE `quantrivien` (
  `QTV_MA` int(10) NOT NULL,
  `QTV_TEN` varchar(30) DEFAULT NULL,
  `QTV_USERNAME` varchar(20) DEFAULT NULL,
  `QTV_PASS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quantrivien`
--

INSERT INTO `quantrivien` (`QTV_MA`, `QTV_TEN`, `QTV_USERNAME`, `QTV_PASS`) VALUES
(1, 'Nguyễn Phương Thư', 'thu', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `RW_MA` int(10) NOT NULL,
  `QTV_MA` varchar(10) NOT NULL,
  `BV_MA` varchar(10) NOT NULL,
  `RW_CMT` mediumtext DEFAULT NULL,
  `RW_RATING` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AD_id`);

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`BV_MA`),
  ADD UNIQUE KEY `BAIVIET_PK` (`BV_MA`),
  ADD KEY `VIET_FK` (`CTV_MA`),
  ADD KEY `VIET_VE_FK` (`MA_MA`),
  ADD KEY `DUYET_FK` (`QTV_MA`);

--
-- Chỉ mục cho bảng `bao_gom`
--
ALTER TABLE `bao_gom`
  ADD PRIMARY KEY (`HD_MA`,`MA_MA`),
  ADD KEY `BAO_GOM_FK` (`HD_MA`),
  ADD KEY `BAO_GOM2_FK` (`MA_MA`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`HD_MA`);

--
-- Chỉ mục cho bảng `chitietmonan`
--
ALTER TABLE `chitietmonan`
  ADD PRIMARY KEY (`MA_MA`);

--
-- Chỉ mục cho bảng `congtacvien`
--
ALTER TABLE `congtacvien`
  ADD PRIMARY KEY (`CTV_MA`),
  ADD UNIQUE KEY `CONGTACVIEN_PK` (`CTV_MA`),
  ADD KEY `CO_CONG_TAC_VIEN_FK` (`QA_MA`);

--
-- Chỉ mục cho bảng `co_loai_mon_an`
--
ALTER TABLE `co_loai_mon_an`
  ADD PRIMARY KEY (`QA_MA`,`LMA_MA`),
  ADD KEY `CO_LOAI_MON_AN_FK` (`QA_MA`),
  ADD KEY `CO_LOAI_MON_AN2_FK` (`LMA_MA`);

--
-- Chỉ mục cho bảng `co_mon_an`
--
ALTER TABLE `co_mon_an`
  ADD PRIMARY KEY (`LMA_MA`,`MA_MA`),
  ADD KEY `CO_MON_AN_FK` (`LMA_MA`),
  ADD KEY `CO_MON_AN2_FK` (`MA_MA`);

--
-- Chỉ mục cho bảng `duoc_viet_vao`
--
ALTER TABLE `duoc_viet_vao`
  ADD PRIMARY KEY (`RW_MA`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`HD_MA`),
  ADD UNIQUE KEY `HOADON_PK` (`HD_MA`),
  ADD KEY `THANH_TOAN_FK` (`KH_MA`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`KH_MA`),
  ADD UNIQUE KEY `KHACHHANG_PK` (`KH_MA`);

--
-- Chỉ mục cho bảng `loaimonan`
--
ALTER TABLE `loaimonan`
  ADD PRIMARY KEY (`LMA_MA`);

--
-- Chỉ mục cho bảng `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`MA_MA`),
  ADD KEY `FK_MONAN` (`LMA_MA`);

--
-- Chỉ mục cho bảng `phuong`
--
ALTER TABLE `phuong`
  ADD PRIMARY KEY (`P_MA`),
  ADD UNIQUE KEY `PHUONG_PK` (`P_MA`);

--
-- Chỉ mục cho bảng `quanan`
--
ALTER TABLE `quanan`
  ADD PRIMARY KEY (`QA_MA`),
  ADD UNIQUE KEY `QUANAN_PK` (`QA_MA`),
  ADD KEY `QUAN_AN_THUOC_FK` (`QH_MA`);

--
-- Chỉ mục cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD PRIMARY KEY (`QH_MA`),
  ADD UNIQUE KEY `QUANHUYEN_PK` (`QH_MA`),
  ADD KEY `CO_FK` (`P_MA`);

--
-- Chỉ mục cho bảng `quantrivien`
--
ALTER TABLE `quantrivien`
  ADD PRIMARY KEY (`QTV_MA`),
  ADD UNIQUE KEY `QUANTRIVIEN_PK` (`QTV_MA`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`RW_MA`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `AD_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `BV_MA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `congtacvien`
--
ALTER TABLE `congtacvien`
  MODIFY `CTV_MA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `HD_MA` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `KH_MA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `monan`
--
ALTER TABLE `monan`
  MODIFY `MA_MA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `phuong`
--
ALTER TABLE `phuong`
  MODIFY `P_MA` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quanan`
--
ALTER TABLE `quanan`
  MODIFY `QA_MA` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  MODIFY `QH_MA` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quantrivien`
--
ALTER TABLE `quantrivien`
  MODIFY `QTV_MA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `RW_MA` int(10) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `FK_MONAN` FOREIGN KEY (`LMA_MA`) REFERENCES `loaimonan` (`LMA_MA`);
--
-- Cơ sở dữ liệu: `phone_store`
--
CREATE DATABASE IF NOT EXISTS `phone_store` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phone_store`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `AD_id` int(10) NOT NULL,
  `AD_ten` varchar(50) NOT NULL,
  `AD_username` varchar(50) NOT NULL,
  `AD_password` varchar(50) NOT NULL,
  `AD_level` int(10) NOT NULL,
  `AD_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`AD_id`, `AD_ten`, `AD_username`, `AD_password`, `AD_level`, `AD_email`) VALUES
(1, 'kiep', 'kiepadmin', 'e10adc3949ba59abbe56e057f20f883e', 0, 'kiep@gmail.com'),
(2, 'Kiệp', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 0, 'kiep@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `DMSP_MA` int(6) NOT NULL,
  `DMSP_TEN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`DMSP_MA`, `DMSP_TEN`) VALUES
(1, 'Điện thoại'),
(2, 'Phụ kiện '),
(4, 'Dịch vụ khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `GH_MA` int(11) NOT NULL,
  `SP_MA` int(11) NOT NULL,
  `GH_MASS` varchar(100) NOT NULL,
  `SP_TEN` varchar(30) NOT NULL,
  `SP_GIA` varchar(100) NOT NULL,
  `GH_SOLUONG` int(11) NOT NULL,
  `SP_MAU` varchar(30) NOT NULL,
  `SP_HINHANH` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`GH_MA`, `SP_MA`, `GH_MASS`, `SP_TEN`, `SP_GIA`, `GH_SOLUONG`, `SP_MAU`, `SP_HINHANH`) VALUES
(40, 4, 'mr6a8rpq65brbqviulhsopi277', 'Iphone 14 plus', '30000000', 3, 'Đỏ', '24eec3dfe3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `HD_MA` int(11) NOT NULL,
  `SP_MA` int(11) NOT NULL,
  `SP_TEN` varchar(30) NOT NULL,
  `KH_MA` int(11) NOT NULL,
  `GH_SOLUONG` int(11) NOT NULL,
  `SP_GIA` varchar(100) NOT NULL,
  `HD_GHICHU` varchar(255) NOT NULL,
  `HD_NGAYMUA` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`HD_MA`, `SP_MA`, `SP_TEN`, `KH_MA`, `GH_SOLUONG`, `SP_GIA`, `HD_GHICHU`, `HD_NGAYMUA`) VALUES
(17, 4, 'Iphone 14 plus', 0, 3, '90000000', '', '2023-10-11 05:33:21'),
(18, 4, 'Iphone 14 plus', 0, 3, '90000000', '', '2023-10-11 05:36:26'),
(19, 4, 'Iphone 14 plus', 0, 3, '90000000', '', '2023-10-11 05:40:09'),
(20, 4, 'Iphone 14 plus', 0, 3, '90000000', '', '2023-10-11 05:41:11'),
(21, 4, 'Iphone 14 plus', 0, 3, '90000000', '', '2023-10-11 05:41:48'),
(22, 4, 'Iphone 14 plus', 0, 3, '90000000', '', '2023-10-11 05:45:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `KH_MA` int(11) NOT NULL,
  `KH_TEN` varchar(30) NOT NULL,
  `KH_EMAIL` varchar(50) NOT NULL,
  `KH_SDT` varchar(12) NOT NULL,
  `KH_DIACHI` varchar(50) NOT NULL,
  `KH_PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`KH_MA`, `KH_TEN`, `KH_EMAIL`, `KH_SDT`, `KH_DIACHI`, `KH_PASSWORD`) VALUES
(1, 'kiệp', 'kiepb2012024@student.ctu.edu.vn', '0123456789', 'cà mau', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Đoàn Ngọc Quốc Huy', 'huy@gmail.com', '0858801302', 'Vĩnh Long', '25f9e794323b453885f5181f1b624d0b'),
(3, 'test', 'kiepctu.edu.vn', '0258963147', 'cà mau', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sp`
--

CREATE TABLE `loai_sp` (
  `LSP_MA` int(6) NOT NULL,
  `LSP_TEN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_sp`
--

INSERT INTO `loai_sp` (`LSP_MA`, `LSP_TEN`) VALUES
(1, 'Samsung'),
(2, 'Iphone'),
(3, 'Nokia'),
(8, 'Reamle'),
(14, 'Vivo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `SP_MA` int(6) NOT NULL,
  `SP_TEN` varchar(50) DEFAULT NULL,
  `DMSP_MA` int(6) NOT NULL,
  `LSP_MA` int(6) NOT NULL,
  `SP_MOTA` text DEFAULT NULL,
  `SP_GIA` varchar(100) DEFAULT NULL,
  `SP_HINHANH` varchar(255) DEFAULT NULL,
  `SP_MAU` varchar(30) DEFAULT NULL,
  `SP_TRANGTHAI` int(11) DEFAULT NULL,
  `SP_TINHTRANG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`SP_MA`, `SP_TEN`, `DMSP_MA`, `LSP_MA`, `SP_MOTA`, `SP_GIA`, `SP_HINHANH`, `SP_MAU`, `SP_TRANGTHAI`, `SP_TINHTRANG`) VALUES
(1, 'Iphone 11', 1, 2, '<p>abcdef</p>', '12000000', '9a1ffcdba9.jpg', 'Trắng', 0, 0),
(2, 'Iphone 12', 1, 2, '<p>&acirc;xaxaxaxaxaxaxaxa</p>', '14000000', '57f8d48a6e.jpg', 'Xanh', 0, 0),
(3, 'Iphone 14', 1, 2, '<p>aaaaaaaaaaaaa</p>', '27000000', '5d9ea6716e.png', 'Xám', 0, 0),
(4, 'Iphone 14 plus', 1, 2, '<p>zxczvzxvzvzfsdafsdgfbcvxcv</p>', '30000000', '24eec3dfe3.jpg', 'Đỏ', 0, 0),
(5, 'Iphone 15', 1, 2, '<p>&atilde;vvvcvxvxvxcvxvcx</p>', '32000000', '83b28245b5.jpg', 'Trắng', 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AD_id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`DMSP_MA`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`GH_MA`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`HD_MA`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`KH_MA`);

--
-- Chỉ mục cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`LSP_MA`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`SP_MA`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `AD_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `DMSP_MA` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `GH_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `HD_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `KH_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  MODIFY `LSP_MA` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `SP_MA` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Cơ sở dữ liệu: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Đang đổ dữ liệu cho bảng `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"food\",\"table\":\"congtacvien\"},{\"db\":\"food\",\"table\":\"admin\"},{\"db\":\"food\",\"table\":\"monan\"},{\"db\":\"food\",\"table\":\"chitietmonan\"},{\"db\":\"food\",\"table\":\"baiviet\"},{\"db\":\"food\",\"table\":\"quantri\"},{\"db\":\"food\",\"table\":\"adminn\"},{\"db\":\"food\",\"table\":\"review\"},{\"db\":\"food\",\"table\":\"loaimonan\"},{\"db\":\"food\",\"table\":\"quantrivien\"}]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Đang đổ dữ liệu cho bảng `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-10-11 13:25:28', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"vi\"}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Chỉ mục cho bảng `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Chỉ mục cho bảng `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Chỉ mục cho bảng `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Chỉ mục cho bảng `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Chỉ mục cho bảng `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Chỉ mục cho bảng `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Chỉ mục cho bảng `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Chỉ mục cho bảng `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Chỉ mục cho bảng `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Chỉ mục cho bảng `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Chỉ mục cho bảng `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Chỉ mục cho bảng `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Chỉ mục cho bảng `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Cơ sở dữ liệu: `restaurant`
--
CREATE DATABASE IF NOT EXISTS `restaurant` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `restaurant`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `AD_id` int(11) NOT NULL,
  `AD_ten` varchar(30) NOT NULL,
  `AD_username` varchar(30) NOT NULL,
  `AD_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`AD_id`, `AD_ten`, `AD_username`, `AD_password`) VALUES
(1, 'FOXXOF', 'fox', 'fox');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apdung`
--

CREATE TABLE `apdung` (
  `KM_MA` char(10) NOT NULL,
  `HD_MA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ban`
--

CREATE TABLE `ban` (
  `B_MA` varchar(10) NOT NULL,
  `PDH_MA` varchar(10) NOT NULL,
  `B_VITRI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ban`
--

INSERT INTO `ban` (`B_MA`, `PDH_MA`, `B_VITRI`) VALUES
('B01', '002', 1),
('B02', '003', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietban`
--

CREATE TABLE `chitietban` (
  `B_MA` varchar(10) NOT NULL,
  `CTB_TINHTRANG` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietban`
--

INSERT INTO `chitietban` (`B_MA`, `CTB_TINHTRANG`) VALUES
('B01', 'Đã đặt'),
('B02', 'Trống ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `HD_MA` varchar(10) NOT NULL,
  `CTHD_SOLUONGMON` int(11) DEFAULT NULL,
  `CTHD_TONGTIEN` int(11) DEFAULT NULL,
  `CTHD_SOLUONGBAN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`HD_MA`, `CTHD_SOLUONGMON`, `CTHD_TONGTIEN`, `CTHD_SOLUONGBAN`) VALUES
('002', 1, 59, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieu`
--

CREATE TABLE `chitietphieu` (
  `PX_MA` varchar(10) NOT NULL,
  `PNH_MAPHIEU` varchar(10) NOT NULL,
  `CTDX_SOLUONG` int(11) DEFAULT NULL,
  `CTDX_GIA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietphieu`
--

INSERT INTO `chitietphieu` (`PX_MA`, `PNH_MAPHIEU`, `CTDX_SOLUONG`, `CTDX_GIA`) VALUES
('01', 'P01', 1, 50000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietthucan`
--

CREATE TABLE `chitietthucan` (
  `TA_MA` varchar(10) NOT NULL,
  `CTTA_DONGIA` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietthucan`
--

INSERT INTO `chitietthucan` (`TA_MA`, `CTTA_DONGIA`) VALUES
('M1', '59.000'),
('M10', '59000'),
('M11', '79000'),
('M12', '89000'),
('M13', '59000'),
('M14', '59000'),
('M15', '39000'),
('M16', '49000'),
('M17', '29000'),
('M18', '19000'),
('M19', '49000'),
('M2', '79.000'),
('M20', '39000'),
('M21', '39000'),
('M22', '49000'),
('M23', '39000'),
('M24', '29000'),
('M25', '39000'),
('M26', '19000'),
('M27', '1090000'),
('M28', '1190000'),
('M29', '1050000'),
('M3', '109000'),
('M30', '6900000'),
('M31', '790000'),
('M32', '990000'),
('M33', '790000'),
('M34', '1590000'),
('M35', '169000'),
('M36', '219000'),
('M37', '239000'),
('M38', '239000'),
('M39', '259000'),
('M4', '0'),
('M40', '289000'),
('M41', '299000'),
('M42', '289000'),
('M5', '89000'),
('M6', '89000'),
('M7', '79000'),
('M8', '59.000'),
('M9', '69000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doanhthu`
--

CREATE TABLE `doanhthu` (
  `DT_MA` varchar(10) NOT NULL,
  `DT_TONGTIEN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `doanhthu`
--

INSERT INTO `doanhthu` (`DT_MA`, `DT_TONGTIEN`) VALUES
('T08', 70000000),
('T09', 100000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gom`
--

CREATE TABLE `gom` (
  `NL_MA` varchar(10) NOT NULL,
  `TA_MA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gom`
--

INSERT INTO `gom` (`NL_MA`, `TA_MA`) VALUES
('R01', 'M1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `HD_MA` varchar(10) NOT NULL,
  `NV_MA` varchar(10) NOT NULL,
  `KH_MA` varchar(10) NOT NULL,
  `HD_NGAYLAP` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`HD_MA`, `NV_MA`, `KH_MA`, `HD_NGAYLAP`) VALUES
('001', '01', '001', '2023-09-13'),
('002', '02', '003', '2023-08-16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `KH_MA` int(10) NOT NULL,
  `Q_MA` varchar(10) NOT NULL,
  `KH_TEN` char(20) DEFAULT NULL,
  `KH_SDT` decimal(10,0) DEFAULT NULL,
  `KH_EMAIL` varchar(20) DEFAULT NULL,
  `KH_DIACHI` text DEFAULT NULL,
  `KH_USERNAME` varchar(8) DEFAULT NULL,
  `KH_PASSWORD` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`KH_MA`, `Q_MA`, `KH_TEN`, `KH_SDT`, `KH_EMAIL`, `KH_DIACHI`, `KH_USERNAME`, `KH_PASSWORD`) VALUES
(1, '2', 'Trần Thanh Kiệp', 123456789, 'kiep@gmail.com', 'Chợ nổi Cái Răng', 'kiep', '123'),
(2, '1', 'Nguyễn Phương Thư', 796998944, 'thu@gmail.com', 'Đối diện trường Tiểu học An Bình 3', 'thu', '123'),
(3, '3', 'Nguyễn Ngọc Kiều Hân', 372002556, 'han@gmail.com', 'Nhà trọ Hồng Đăng ', 'han ', '123'),
(4, '1', 'hanne', 567839027, 'hanb2003783@student.', 'dsaihfoe', 'hanne', '125'),
(5, '2', 'Nguyễn Nhật Đăng', 796998947, 'ctv01@h.h', 'Cần Thơ', 'ctv01', '12345'),
(6, '1', 'Nguyễn Nhật', 12587496, 'nhat@gmail.com', 'Cần Thơ', 'nhat', 'nhat');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `KM_MA` char(10) NOT NULL,
  `KM_THOIHAN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`KM_MA`, `KM_THOIHAN`) VALUES
('KM1', '2024-10-01'),
('KM2', '2023-12-14'),
('KM3', '2023-12-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainhanvien`
--

CREATE TABLE `loainhanvien` (
  `LNV_MA` varchar(10) NOT NULL,
  `LNV_TEN` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loainhanvien`
--

INSERT INTO `loainhanvien` (`LNV_MA`, `LNV_TEN`) VALUES
('KT', 'Kế Toán'),
('PV', 'Phục vụ'),
('QL', 'Quản lý'),
('ĐB', 'Đầu bếp'),
('ĐH', 'Điều hành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_thuc_an`
--

CREATE TABLE `loai_thuc_an` (
  `LTA_MA` varchar(10) NOT NULL,
  `LTA_TEN` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_thuc_an`
--

INSERT INTO `loai_thuc_an` (`LTA_MA`, `LTA_TEN`) VALUES
('K01', 'Món kèm'),
('K02', 'Kem'),
('L01', 'Lẩu'),
('R01', 'Rượu'),
('S01', 'Sốt'),
('T01', 'Thịt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `MN_MA` int(11) NOT NULL,
  `MN_TEN` varchar(30) NOT NULL,
  `MN_HINHANH` varchar(100) NOT NULL,
  `MN_GIA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`MN_MA`, `MN_TEN`, `MN_HINHANH`, `MN_GIA`) VALUES
(1, 'Combo1', 'combo1.jpg', 0),
(2, 'Combo2', 'combo1.jpg', 20000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenlieu`
--

CREATE TABLE `nguyenlieu` (
  `NL_MA` varchar(10) NOT NULL,
  `NL_TEN` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyenlieu`
--

INSERT INTO `nguyenlieu` (`NL_MA`, `NL_TEN`) VALUES
('BC', 'Ba chỉ heo'),
('BCB', 'Ba chỉ bò'),
('C01', 'Cá'),
('R01', 'Rau');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `NV_MA` varchar(10) NOT NULL,
  `LNV_MA` varchar(10) NOT NULL,
  `Q_MA` varchar(10) NOT NULL,
  `NV_TEN` char(20) DEFAULT NULL,
  `NV_SDT` decimal(10,0) DEFAULT NULL,
  `NV_EMAIL` varchar(20) DEFAULT NULL,
  `NV_DIACHI` text DEFAULT NULL,
  `NV_USERNAME` varchar(8) DEFAULT NULL,
  `NV_PASSWORD` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`NV_MA`, `LNV_MA`, `Q_MA`, `NV_TEN`, `NV_SDT`, `NV_EMAIL`, `NV_DIACHI`, `NV_USERNAME`, `NV_PASSWORD`) VALUES
('01', 'PV', '01', 'Nguyễn Thị Lan', 123456789, 'lan@gmail.com', 'Lộ Vòng Cung', 'lan', '123'),
('02', 'KT', '01', 'Nguyễn Thị Thắm', 123456789, 'tham@gmail.com', 'Đường 3/2', 'tham', '123'),
('03', 'QL', '02', 'Huỳnh Thạch Thảo', 123456787, 'thao@gmail.com', 'Đường 3/2, số nhà 37', 'thao', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudathang`
--

CREATE TABLE `phieudathang` (
  `PDH_MA` int(11) NOT NULL,
  `PDH_SONGUOI` int(11) NOT NULL,
  `PDH_TENKH` varchar(30) NOT NULL,
  `PDH_EMAILKH` varchar(100) NOT NULL,
  `PDH_SDTKH` varchar(12) NOT NULL,
  `PDH_TG` time DEFAULT NULL,
  `PDH_NGAYLAP` date DEFAULT NULL,
  `PDH_GHICHU` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudathang`
--

INSERT INTO `phieudathang` (`PDH_MA`, `PDH_SONGUOI`, `PDH_TENKH`, `PDH_EMAILKH`, `PDH_SDTKH`, `PDH_TG`, `PDH_NGAYLAP`, `PDH_GHICHU`) VALUES
(1, 1, 'kiep', 'kiep@gmail.com', '12345698', '10:00:00', '2023-10-14', 'NOT'),
(2, 1, 'Nguyễn', 'nguyen@gmail.com', '12547896', '13:00:00', '2023-10-15', 'not'),
(3, 1, 'kiep', 'kiep@gmail.com', '12345698', '10:00:00', '2023-10-14', 'not');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhaphang`
--

CREATE TABLE `phieunhaphang` (
  `PNH_MAPHIEU` varchar(10) NOT NULL,
  `NV_MA` varchar(10) NOT NULL,
  `PNH_NGAYNHAP` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhaphang`
--

INSERT INTO `phieunhaphang` (`PNH_MAPHIEU`, `NV_MA`, `PNH_NGAYNHAP`) VALUES
('P01', '02', '2023-10-02'),
('P02', '02', '2023-10-02'),
('P03', '02', '2023-10-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `PX_MA` varchar(10) NOT NULL,
  `NV_MA` varchar(10) NOT NULL,
  `PX_NGAYKT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuxuat`
--

INSERT INTO `phieuxuat` (`PX_MA`, `NV_MA`, `PX_NGAYKT`) VALUES
('P01', '02', '2023-10-03'),
('P02', '02', '2023-10-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_huyen`
--

CREATE TABLE `quan_huyen` (
  `Q_MA` int(10) NOT NULL,
  `TP_MA` varchar(10) NOT NULL,
  `Q_TEN` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quan_huyen`
--

INSERT INTO `quan_huyen` (`Q_MA`, `TP_MA`, `Q_TEN`) VALUES
(1, '1', 'Ninh Kiều'),
(2, '1', 'Cái Răng'),
(3, '3', 'Bình Thủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhpho_tinh`
--

CREATE TABLE `thanhpho_tinh` (
  `TP_MA` varchar(10) NOT NULL,
  `TP_TEN` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhpho_tinh`
--

INSERT INTO `thanhpho_tinh` (`TP_MA`, `TP_TEN`) VALUES
('01', 'Cần Thơ'),
('02', 'Vị Thanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoidiem`
--

CREATE TABLE `thoidiem` (
  `B_MA` varchar(10) NOT NULL,
  `THOIGIAN_BD` datetime DEFAULT NULL,
  `THOIGIAN_KT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thoidiem`
--

INSERT INTO `thoidiem` (`B_MA`, `THOIGIAN_BD`, `THOIGIAN_KT`) VALUES
('B01', '2023-10-02 07:00:00', '2023-10-02 20:00:00'),
('B01', '2023-10-02 07:00:00', '2023-10-02 20:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongke`
--

CREATE TABLE `thongke` (
  `NV_MA` varchar(10) NOT NULL,
  `DT_MA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongke`
--

INSERT INTO `thongke` (`NV_MA`, `DT_MA`) VALUES
('02', 'T08'),
('02', 'T09'),
('03', 'T09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thucan`
--

CREATE TABLE `thucan` (
  `TA_MA` varchar(10) NOT NULL,
  `LTA_MA` varchar(10) NOT NULL,
  `TA_TEN` char(20) DEFAULT NULL,
  `TA_HINHANH` varchar(100) NOT NULL,
  `TA_MOTA` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thucan`
--

INSERT INTO `thucan` (`TA_MA`, `LTA_MA`, `TA_TEN`, `TA_HINHANH`, `TA_MOTA`) VALUES
('M1', 'K01', 'Salad khai vị', 'lunch-2.jpg', 'Salat khai vị cầu vòng'),
('M10', 'T01', 'Thịt bắp bò Mỹ', 'dinner-1.jpg', NULL),
('M11', 'T01', 'Thăn ngoại bò Waygu', 'dinner-2.jpg', NULL),
('M12', 'T01', 'Thịt bò hữu cơ Obe', 'dinner-3.jpg', NULL),
('M13', 'T01', 'Thịt ba chỉ bò Mỹ', 'dinner-4.jpg', NULL),
('M14', 'T01', 'Thịt bò Mỹ', 'dinner-5.jpg', NULL),
('M15', 'K01', 'Cocktail Bloody Mary', 'drink-1.jpg', NULL),
('M16', 'K01', 'Cocktail Mojito', 'drink-2.jpg', NULL),
('M17', 'K01', 'Nước ép cam', 'drink-3.jpg', NULL),
('M18', 'K01', 'PEPSI', 'drink-4.jpg', NULL),
('M19', 'K01', 'Cocktail Fruit Seaso', 'drink-5.jpg', NULL),
('M2', 'S01', 'Súp kem bí đỏ', 'lunch-3.jpg', 'Súp kem bí đỏ vị béo'),
('M20', 'K01', 'Cocktail trái cây', 'drink-6.jpg', NULL),
('M21', 'K02', 'Bánh Macarons', 'dessert-1.jpg', NULL),
('M22', 'K02', 'Sữa chua hoa quả', 'dessert-2.jpg', NULL),
('M23', 'K02', 'Chocolate Souffle', 'dessert-3.jpg', NULL),
('M24', 'K02', 'Kem', 'dessert-4.jpg', NULL),
('M25', 'K02', 'Bánh Creme', 'dessert-5.jpg', NULL),
('M26', 'K02', 'Bánh flan', 'dessert-6.jpg', NULL),
('M27', 'R01', 'Rượu vang đỏ', 'wine-1.jpg', NULL),
('M28', 'R01', 'Rượu Cognac', 'wine-2.jpg', NULL),
('M29', 'R01', 'Rượu nho Sherry', 'wine-3.jpg', NULL),
('M3', 'S01', 'Sốt kem phô mai', 'lunch-5.jpg', 'Sốt kem phô mai '),
('M30', 'R01', 'Rượu vang trắng', 'wine-4.jpg', NULL),
('M31', 'R01', 'Rum trắng', 'wine-5.jpg', NULL),
('M32', 'R01', 'Tequila', 'wine-6.jpg', NULL),
('M33', 'R01', 'Whisky', 'wine-7.jpg', NULL),
('M34', 'R01', 'Vodka', 'wine-8.jpg', NULL),
('M35', 'L01', 'Combo nướng', 'breakfast-2.jpg', NULL),
('M36', 'L01', 'Combo nướng', 'breakfast-1.jpg', NULL),
('M37', 'L01', 'Combo Nướng 2', 'breakfast-3.jpg', NULL),
('M38', 'L01', 'Lẩu Đài Loan', 'breakfast-4.jpg', NULL),
('M39', 'L01', 'Combo Lẩu', 'breakfast-5.jpg', NULL),
('M4', 'S01', 'Sốt chấm', 'lunch-2.jpg', 'Sốt chấm ăn kèm'),
('M40', 'L01', 'Combo Lẩu nướng', 'breakfast-6.jpg', NULL),
('M41', 'L01', 'Combo nướng cho 2 ng', 'breakfast-7.jpg', NULL),
('M42', 'L01', 'Combo nướng cho 3 ng', 'breakfast-8.jpg', NULL),
('M5', 'K01', 'Há Cảo', 'lunch-4.jpg', NULL),
('M6', 'T01', 'Gỏi mực Thái Lan', 'lunch-6.jpg', NULL),
('M7', 'K01', 'Sủi Cảo', 'lunch-7.jpg', NULL),
('M8', 'K01', 'Bánh Bao Chiên', 'lunch-8.jpg', NULL),
('M9', 'T01', 'Thịt thăn vai', 'dinner-6.jpg', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AD_id`);

--
-- Chỉ mục cho bảng `apdung`
--
ALTER TABLE `apdung`
  ADD PRIMARY KEY (`KM_MA`,`HD_MA`),
  ADD KEY `FK_APDUNG2` (`HD_MA`);

--
-- Chỉ mục cho bảng `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`B_MA`),
  ADD KEY `FK_DAT` (`PDH_MA`);

--
-- Chỉ mục cho bảng `chitietban`
--
ALTER TABLE `chitietban`
  ADD PRIMARY KEY (`B_MA`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`HD_MA`);

--
-- Chỉ mục cho bảng `chitietphieu`
--
ALTER TABLE `chitietphieu`
  ADD PRIMARY KEY (`PX_MA`,`PNH_MAPHIEU`);

--
-- Chỉ mục cho bảng `chitietthucan`
--
ALTER TABLE `chitietthucan`
  ADD PRIMARY KEY (`TA_MA`);

--
-- Chỉ mục cho bảng `doanhthu`
--
ALTER TABLE `doanhthu`
  ADD PRIMARY KEY (`DT_MA`);

--
-- Chỉ mục cho bảng `gom`
--
ALTER TABLE `gom`
  ADD PRIMARY KEY (`NL_MA`,`TA_MA`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`HD_MA`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`KH_MA`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`KM_MA`);

--
-- Chỉ mục cho bảng `loainhanvien`
--
ALTER TABLE `loainhanvien`
  ADD PRIMARY KEY (`LNV_MA`);

--
-- Chỉ mục cho bảng `loai_thuc_an`
--
ALTER TABLE `loai_thuc_an`
  ADD PRIMARY KEY (`LTA_MA`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MN_MA`);

--
-- Chỉ mục cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD PRIMARY KEY (`NL_MA`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`NV_MA`);

--
-- Chỉ mục cho bảng `phieudathang`
--
ALTER TABLE `phieudathang`
  ADD PRIMARY KEY (`PDH_MA`);

--
-- Chỉ mục cho bảng `phieunhaphang`
--
ALTER TABLE `phieunhaphang`
  ADD PRIMARY KEY (`PNH_MAPHIEU`);

--
-- Chỉ mục cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`PX_MA`);

--
-- Chỉ mục cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  ADD PRIMARY KEY (`Q_MA`);

--
-- Chỉ mục cho bảng `thanhpho_tinh`
--
ALTER TABLE `thanhpho_tinh`
  ADD PRIMARY KEY (`TP_MA`);

--
-- Chỉ mục cho bảng `thongke`
--
ALTER TABLE `thongke`
  ADD PRIMARY KEY (`NV_MA`,`DT_MA`);

--
-- Chỉ mục cho bảng `thucan`
--
ALTER TABLE `thucan`
  ADD PRIMARY KEY (`TA_MA`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `AD_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `KH_MA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `MN_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phieudathang`
--
ALTER TABLE `phieudathang`
  MODIFY `PDH_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  MODIFY `Q_MA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `apdung`
--
ALTER TABLE `apdung`
  ADD CONSTRAINT `FK_APDUNG` FOREIGN KEY (`KM_MA`) REFERENCES `khuyenmai` (`KM_MA`),
  ADD CONSTRAINT `FK_APDUNG2` FOREIGN KEY (`HD_MA`) REFERENCES `hoadon` (`HD_MA`);
--
-- Cơ sở dữ liệu: `taxi`
--
CREATE DATABASE IF NOT EXISTS `taxi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `taxi`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenxe`
--

CREATE TABLE `chuyenxe` (
  `CX_MA` int(11) NOT NULL,
  `KH_MA` int(11) NOT NULL,
  `TX_MA` int(11) NOT NULL,
  `TD_DATE` datetime NOT NULL,
  `CX_SOKM` float NOT NULL,
  `CX_THANHTIEN` float(8,2) NOT NULL,
  `CX_TDDIEMDI_X` text NOT NULL,
  `CX_TDDIEMDI_Y` text NOT NULL,
  `CX_TDDIEMDEN_X` text NOT NULL,
  `CX_TDDIEMDEN_Y` text NOT NULL,
  `CX_TRANGTHAI` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyenxe`
--

INSERT INTO `chuyenxe` (`CX_MA`, `KH_MA`, `TX_MA`, `TD_DATE`, `CX_SOKM`, `CX_THANHTIEN`, `CX_TDDIEMDI_X`, `CX_TDDIEMDI_Y`, `CX_TDDIEMDEN_X`, `CX_TDDIEMDEN_Y`, `CX_TRANGTHAI`) VALUES
(1, 3, 6, '2023-09-28 00:00:00', 4, 150000.00, '10.03002', '105.77202', '10.02914', '105.77167', 2),
(2, 1, 6, '2023-09-22 08:00:00', 4, 160000.00, '10.1111111', '10.000000', '10.33333', '10.66666', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `DG_MA` int(11) NOT NULL,
  `CX_MA` int(11) NOT NULL,
  `TC_MA` int(11) NOT NULL,
  `DG_SAO` decimal(5,0) NOT NULL,
  `DG_NOIDUNG` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`DG_MA`, `CX_MA`, `TC_MA`, `DG_SAO`, `DG_NOIDUNG`) VALUES
(1, 1, 1, 4, 'Oke');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dgtieuchi`
--

CREATE TABLE `dgtieuchi` (
  `DG_MA` int(11) NOT NULL,
  `TC_MA` int(11) NOT NULL,
  `TX_MA` int(11) NOT NULL,
  `DGTC_DIEM` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dgtieuchi`
--

INSERT INTO `dgtieuchi` (`DG_MA`, `TC_MA`, `TX_MA`, `DGTC_DIEM`) VALUES
(1, 2, 2, 6),
(3, 4, 2, 10),
(2, 3, 3, 8),
(4, 4, 4, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gia`
--

CREATE TABLE `gia` (
  `TD_DATE` datetime NOT NULL,
  `GC_MA` int(11) NOT NULL,
  `LX_MA` int(11) NOT NULL,
  `G_TIEN` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gia`
--

INSERT INTO `gia` (`TD_DATE`, `GC_MA`, `LX_MA`, `G_TIEN`) VALUES
('2023-09-28 00:00:00', 1, 1, 15000.00),
('2023-09-28 00:00:00', 1, 2, 20000.00),
('2023-09-28 00:00:00', 1, 3, 10000.00),
('2023-09-28 00:00:00', 1, 4, 12000.00),
('2023-09-28 00:00:00', 1, 5, 15000.00),
('2023-09-28 00:00:00', 1, 6, 15000.00),
('2023-09-28 00:00:00', 1, 7, 12000.00),
('2023-09-28 00:00:00', 1, 8, 10000.00),
('2023-09-28 00:00:00', 1, 9, 15000.00),
('2023-09-28 00:00:00', 1, 10, 10000.00),
('2023-09-28 00:00:00', 2, 1, 10000.00),
('2023-09-28 00:00:00', 2, 2, 15000.00),
('2023-09-28 00:00:00', 2, 3, 7000.00),
('2023-09-28 00:00:00', 2, 4, 10000.00),
('2023-09-28 00:00:00', 2, 5, 10000.00),
('2023-09-28 00:00:00', 2, 6, 10000.00),
('2023-09-28 00:00:00', 2, 7, 10000.00),
('2023-09-28 00:00:00', 2, 8, 8000.00),
('2023-09-28 00:00:00', 2, 9, 10000.00),
('2023-09-28 00:00:00', 2, 10, 7000.00),
('2023-09-28 00:00:00', 3, 1, 5000.00),
('2023-09-28 00:00:00', 3, 2, 10000.00),
('2023-09-28 00:00:00', 3, 3, 5000.00),
('2023-09-28 00:00:00', 3, 4, 8000.00),
('2023-09-28 00:00:00', 3, 5, 5000.00),
('2023-09-28 00:00:00', 3, 6, 8000.00),
('2023-09-28 00:00:00', 3, 7, 8000.00),
('2023-09-28 00:00:00', 3, 8, 5000.00),
('2023-09-28 00:00:00', 3, 9, 5000.00),
('2023-09-28 00:00:00', 3, 10, 5000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giacuoc`
--

CREATE TABLE `giacuoc` (
  `GC_MA` int(11) NOT NULL,
  `GC_CANTREN` float NOT NULL,
  `GC_CANDUOI` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giacuoc`
--

INSERT INTO `giacuoc` (`GC_MA`, `GC_CANTREN`, `GC_CANDUOI`) VALUES
(1, 5, 0),
(2, 10, 6),
(3, 50, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `KH_MA` int(11) NOT NULL,
  `QH_MA` int(11) NOT NULL,
  `KH_TEN` varchar(50) NOT NULL,
  `KH_SDT` varchar(10) NOT NULL,
  `KH_EMAIL` varchar(30) NOT NULL,
  `KH_USERNAME` varchar(30) NOT NULL,
  `KH_PASSWORD` varchar(100) NOT NULL,
  `KH_GIOITINH` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`KH_MA`, `QH_MA`, `KH_TEN`, `KH_SDT`, `KH_EMAIL`, `KH_USERNAME`, `KH_PASSWORD`, `KH_GIOITINH`) VALUES
(1, 1, 'Duy Chủ Tịch', '0939826024', 'duybii922002@gmail.com', 'duychutich', '202cb962ac59075b964b07152d234b70', 1),
(2, 1, 'Nguyễn Đỗ Phúc Vinh', '0123456789', 'vinhtop8@gmail.com', 'vinhtop8', '202cb962ac59075b964b07152d234b70', 1),
(3, 1, 'Nguyễn Thị Phương Thư', '0987654321', 'pthuxinhdep@gmail.com', 'phuongthu', '202cb962ac59075b964b07152d234b70', 0),
(5, 1, 'Trần Thanh Kiệp', '0135792468', 'kiep@gmail.com', 'kiep', '202cb962ac59075b964b07152d234b70', 1),
(6, 14, 'D', '0123456789', 'duybii922002@gmail.com', 'd', '202cb962ac59075b964b07152d234b70', 1),
(7, 1, 'V', '0123456789', 'vinhtop8@gmail.com', 'v', '202cb962ac59075b964b07152d234b70', 1),
(8, 3, 'Yii', '0939826024', 'duybii922002@gmail.com', 'Duy', '202cb962ac59075b964b07152d234b70', 1),
(9, 1, 'Kiệp Lặc', '0147258369', 'kiep123@gmail.com', 'kieplac', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaixe`
--

CREATE TABLE `loaixe` (
  `LX_MA` int(11) NOT NULL,
  `LX_MODEL` varchar(30) NOT NULL,
  `LX_SOCHO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaixe`
--

INSERT INTO `loaixe` (`LX_MA`, `LX_MODEL`, `LX_SOCHO`) VALUES
(1, 'HATCH BACK', 4),
(2, 'SEDAN', 4),
(3, 'SUV', 7),
(4, 'MPV', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `NV_ID` int(11) NOT NULL,
  `QH_MA` int(11) DEFAULT NULL,
  `VT_MA` int(11) DEFAULT NULL,
  `NV_TEN` varchar(50) NOT NULL,
  `NV_SDT` varchar(10) NOT NULL,
  `NV_EMAIL` varchar(30) NOT NULL,
  `NV_USERNAME` varchar(30) NOT NULL,
  `NV_PASSWORD` varchar(100) NOT NULL,
  `NV_GIOITINH` tinyint(1) NOT NULL,
  `NV_HINHANH` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`NV_ID`, `QH_MA`, `VT_MA`, `NV_TEN`, `NV_SDT`, `NV_EMAIL`, `NV_USERNAME`, `NV_PASSWORD`, `NV_GIOITINH`, `NV_HINHANH`) VALUES
(1, 3, 2, 'Nguyễn Thị Lan', '0123456789', 'lan@gmail.com', 'lan', '123', 0, NULL),
(2, 5, 2, 'Nguyễn Thị Thắm', '0123456788', 'tham@gmail.com', 'tham', '123', 0, NULL),
(3, 8, 2, 'Huỳnh Thạch Thảo', '0123456787', 'thao@gmail.com', 'thao', '123', 0, NULL),
(4, 6, 1, 'Trần Minh Khéo', '0123456786', 'kheo@gmail.com', 'kheo', '123', 1, NULL),
(5, 3, 2, 'Yii Quản Lý', '0123456783', 'yii@gmail.com', 'yii', '202cb962ac59075b964b07152d234b70', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phutrach`
--

CREATE TABLE `phutrach` (
  `TX_MA` int(11) NOT NULL,
  `TD_DATE` datetime NOT NULL,
  `X_MA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phutrach`
--

INSERT INTO `phutrach` (`TX_MA`, `TD_DATE`, `X_MA`) VALUES
(2, '2023-09-22 08:00:00', 2),
(3, '2023-09-22 00:00:00', 3),
(4, '2023-09-22 08:00:00', 4),
(5, '2023-09-22 08:00:00', 5),
(6, '2023-09-22 08:00:00', 6),
(7, '2023-09-22 08:00:00', 7),
(8, '2023-09-22 00:00:00', 8),
(9, '2023-09-22 08:00:00', 9),
(10, '2023-09-22 08:00:00', 10),
(25, '2023-10-20 00:00:00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanhuyen`
--

CREATE TABLE `quanhuyen` (
  `QH_MA` int(11) NOT NULL,
  `TP_MA` int(11) NOT NULL,
  `QH_TEN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quanhuyen`
--

INSERT INTO `quanhuyen` (`QH_MA`, `TP_MA`, `QH_TEN`) VALUES
(1, 1, 'Quận Ninh Kiều'),
(2, 1, 'Quận Cái Răng'),
(3, 1, 'Quận Bình Thủy'),
(4, 1, 'Quận Ô Môn'),
(5, 1, 'Huyện Phong Điền'),
(6, 1, 'Huyện Thốt Nốt'),
(7, 1, 'Huyện Cờ Đỏ'),
(8, 2, 'Thị xã Vĩnh Châu'),
(9, 2, 'Huyện Mỹ Xuyên'),
(10, 2, 'Huyện Kế Sách'),
(11, 2, 'Huyện Trần Đề'),
(12, 2, 'Huyện Châu Thành'),
(13, 2, 'Huyện Long Phú'),
(14, 2, 'Huyện Mỹ Tú'),
(15, 2, 'Thị xã Ngã Năm'),
(16, 2, 'Huyện Thạch Trị'),
(17, 2, 'Huyện Cù Lao Dung'),
(18, 4, 'Huyện Bình Tân'),
(19, 4, 'Huyện Long Hồ'),
(20, 4, 'Huyện Mang Thít'),
(21, 4, 'Huyện Tam Bình'),
(22, 4, 'Huyện Trà Ôn'),
(23, 4, 'Huyện Vũng Liêm'),
(24, 4, 'Thị Xã Bình Minh'),
(25, 3, 'Huyện Châu Thành'),
(26, 3, 'Huyện Châu Thành A'),
(27, 3, 'Thị xã Ngã Bảy'),
(28, 3, 'huyện Phụng Hiệp'),
(29, 3, 'Thành phố Vị Thanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taixe`
--

CREATE TABLE `taixe` (
  `TX_MA` int(11) NOT NULL,
  `VT_MA` int(11) NOT NULL,
  `TX_TEN` varchar(30) NOT NULL,
  `TX_BANGLAI` char(3) NOT NULL,
  `TX_SDT` char(10) NOT NULL,
  `TX_USERNAME` varchar(30) NOT NULL,
  `TX_PASSWORD` varchar(100) NOT NULL,
  `TX_GIOITINH` tinyint(1) NOT NULL,
  `TX_HINHANH` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taixe`
--

INSERT INTO `taixe` (`TX_MA`, `VT_MA`, `TX_TEN`, `TX_BANGLAI`, `TX_SDT`, `TX_USERNAME`, `TX_PASSWORD`, `TX_GIOITINH`, `TX_HINHANH`) VALUES
(2, 1, 'Phước Vinh', 'C2', '01', 'vinh', '123', 1, NULL),
(3, 1, 'Trần Văn Hùng', 'C1', '02', 'hung', '123', 1, NULL),
(4, 1, 'Trần Thị Linh', 'D1', '03', 'linh', '123', 0, NULL),
(5, 1, 'Lê Dương Bảo Lâm', 'C2', '0123456789', 'lam', '202cb962ac59075b964b07152d234b70', 1, NULL),
(6, 1, 'Hiếu Thứ Hai', 'C1', '0939123456', 'hieuthuhai', '202cb962ac59075b964b07152d234b70', 1, NULL),
(7, 1, 'Nguyễn Thanh Tùng', 'C2', '0939456789', 'sontungmtp', '202cb962ac59075b964b07152d234b70', 1, NULL),
(8, 1, 'Trần Phương Ly', 'C1', '0939246357', 'phuongly', '202cb962ac59075b964b07152d234b70', 0, NULL),
(9, 1, 'Ngô Kiến Huy', 'D1', '0939147289', 'ngokienhuy', '202cb962ac59075b964b07152d234b70', 1, NULL),
(10, 1, 'Ninh Dương Lan Ngọc', 'C1', '0939258147', 'lanngoc', '202cb962ac59075b964b07152d234b70', 0, NULL),
(11, 1, 'Lâm Vĩ Dạ', 'C1', '0939369369', 'vida', '202cb962ac59075b964b07152d234b70', 0, NULL),
(12, 1, 'Bùi Thị Bích Phương', 'C2', '0939111111', 'bichphuong', '202cb962ac59075b964b07152d234b70', 0, NULL),
(13, 1, 'Huỳnh Trấn Thành', 'D1', '0939222222', 'tranthanh', '202cb962ac59075b964b07152d234b70', 1, NULL),
(14, 1, 'Nguyễn Tiến Luật', 'D1', '0939258258', 'tienluat', '202cb962ac59075b964b07152d234b70', 1, NULL),
(15, 1, 'Kiều Minh Tuấn', 'C1', '0939888888', 'minhtuan', '202cb962ac59075b964b07152d234b70', 1, NULL),
(16, 1, 'Huỳnh Lập', 'D1', '0939999999', 'huynhlap', '202cb962ac59075b964b07152d234b70', 1, NULL),
(17, 1, 'Nguyễn Việt Hoàng', 'C1', '0939147278', 'mono', '202cb962ac59075b964b07152d234b70', 1, NULL),
(18, 1, 'Võ Hoài Linh', 'D1', '0939258166', 'hoailinh', '202cb962ac59075b964b07152d234b70', 1, NULL),
(19, 1, 'Nguyễn Trúc Nhân', 'C2', '0939369399', 'trucnhan', '202cb962ac59075b964b07152d234b70', 1, NULL),
(20, 1, 'Vinh Râu', 'D1', '0939111222', 'vinhrau', '202cb962ac59075b964b07152d234b70', 1, NULL),
(21, 1, 'Lê Nguyễn Trung Đan', 'D1', '0939222333', 'binz', '202cb962ac59075b964b07152d234b70', 1, NULL),
(22, 1, 'Phạm Hoàng Khoa', 'C1', '0939258999', 'karik', '202cb962ac59075b964b07152d234b70', 1, NULL),
(23, 1, 'Nghiêm Vũ Hoàng Long', 'C1', '0939888999', 'mck', '202cb962ac59075b964b07152d234b70', 1, NULL),
(24, 1, 'Thịnh Suy', 'D1', '0939999111', 'thinhsuy', '202cb962ac59075b964b07152d234b70', 1, NULL),
(25, 1, 'John Cenna', 'C1', '0858801302', 'johncenna', '202cb962ac59075b964b07152d234b70', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhpho`
--

CREATE TABLE `thanhpho` (
  `TP_MA` int(11) NOT NULL,
  `TP_TEN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhpho`
--

INSERT INTO `thanhpho` (`TP_MA`, `TP_TEN`) VALUES
(1, 'Cần Thơ'),
(2, 'Sóc Trăng'),
(3, 'Hậu Giang'),
(4, 'Vĩnh Long');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoidiem`
--

CREATE TABLE `thoidiem` (
  `TD_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thoidiem`
--

INSERT INTO `thoidiem` (`TD_DATE`) VALUES
('2023-09-22 08:00:00'),
('2023-09-28 00:00:00'),
('2023-10-02 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tieuchi`
--

CREATE TABLE `tieuchi` (
  `TC_MA` int(11) NOT NULL,
  `TC_TEN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tieuchi`
--

INSERT INTO `tieuchi` (`TC_MA`, `TC_TEN`) VALUES
(1, 'Tệ'),
(2, 'Tốt '),
(3, 'Bình thường '),
(4, 'Rất tốt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthai`
--

CREATE TABLE `trangthai` (
  `TX_MA` int(11) NOT NULL,
  `TD_DATE` datetime NOT NULL,
  `TT_TRANGTHAI` tinyint(1) NOT NULL,
  `TT_TOADOX` text NOT NULL,
  `TT_TOADOY` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`TX_MA`, `TD_DATE`, `TT_TRANGTHAI`, `TT_TOADOX`, `TT_TOADOY`) VALUES
(2, '2023-10-02 00:00:00', 1, '10.032729', '105.774329'),
(3, '2023-10-02 00:00:00', 1, '10.02780', '105.77006'),
(4, '2023-10-02 00:00:00', 1, '10.030492', '105.76904'),
(5, '2023-10-02 00:00:00', 0, '10.035384', '105.780897'),
(6, '2023-10-02 00:00:00', 0, '10.056775', '105.778673'),
(7, '2023-10-02 00:00:00', 1, '10.0314', '105.775036'),
(8, '2023-10-02 00:00:00', 1, '10.024951', '105.768342'),
(9, '2023-10-02 00:00:00', 1, '10.024362', '105.760993'),
(10, '2023-10-02 00:00:00', 0, '10.043413', '105.765896'),
(11, '2023-10-02 00:00:00', 0, '10.035765', '105.775423'),
(12, '2023-10-02 00:00:00', 0, '10.038729', '105.760639'),
(13, '2023-10-02 00:00:00', 1, '10.032002', '105.762538'),
(14, '2023-10-02 00:00:00', 0, '10.047543', '105.782161'),
(15, '2023-10-02 00:00:00', 0, '10.034444', '105.748386'),
(16, '2023-10-02 00:00:00', 0, '10.026412', '105.780573'),
(17, '2023-10-02 00:00:00', 1, '10.039602', '105.769908'),
(18, '2023-10-02 00:00:00', 0, '10.036039', '105.766003'),
(19, '2023-10-02 00:00:00', 1, '10.02788', '105.766861'),
(20, '2023-10-02 00:00:00', 0, '10.035012', '105.785723'),
(21, '2023-10-02 00:00:00', 0, '10.046654', '105.760853'),
(22, '2023-10-02 00:00:00', 0, '10.031687', '105.758069'),
(23, '2023-10-02 00:00:00', 1, '10.021414', '105.754523'),
(24, '2023-10-02 00:00:00', 1, '10.031562', '105.787053');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `VT_MA` int(11) NOT NULL,
  `VT_TEN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`VT_MA`, `VT_TEN`) VALUES
(1, 'Tài xế'),
(2, 'Quản lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `X_MA` int(11) NOT NULL,
  `LX_MA` int(11) NOT NULL,
  `X_BIENSO` varchar(10) NOT NULL,
  `X_MOTA` text NOT NULL,
  `X_HINHANH` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`X_MA`, `LX_MA`, `X_BIENSO`, `X_MOTA`, `X_HINHANH`) VALUES
(1, 1, '65A-12345', 'Mitsubishi Mirage màu xám', 'xe1.jpg'),
(2, 1, '65A-12346', 'Hyundai Grand i10 màu trắng', 'xe2.jpg'),
(3, 1, '65A-12347', 'Ford Fiesta màu trắng', 'xe3.jpg'),
(4, 2, '65A-12348', 'Toyota Vios màu đen', 'xe4.jpg'),
(5, 2, '65A-12349', 'Honda City màu trắng', 'xe5.jpg'),
(6, 2, '65A-12340', 'Hyundai Accent màu đỏ', 'xe6.jpg'),
(7, 3, '65A-13345', 'Toyota Corolla Cross màu đen', 'xe7.jpg'),
(8, 3, '65A-13445', 'Honda CR-V màu xám', 'xe8.jpg'),
(9, 4, '65A-13455', 'Mitsubishi Xpander màu đen', 'xe9.jpg'),
(10, 4, '65A-12445', 'Toyota Avanza màu đen', 'xe10.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chuyenxe`
--
ALTER TABLE `chuyenxe`
  ADD PRIMARY KEY (`CX_MA`),
  ADD KEY `FK_DAT_XE` (`KH_MA`),
  ADD KEY `FK_THUC_HIEN_BOI` (`TX_MA`),
  ADD KEY `FK_THUC_HIEN_LUC` (`TD_DATE`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`DG_MA`),
  ADD KEY `FK_THEO_TIEU_CHI` (`TC_MA`,`CX_MA`) USING BTREE,
  ADD KEY `FK_DANH_GIA_CHO` (`CX_MA`);

--
-- Chỉ mục cho bảng `dgtieuchi`
--
ALTER TABLE `dgtieuchi`
  ADD UNIQUE KEY `FK_CO_DG` (`TX_MA`,`TC_MA`,`DG_MA`) USING BTREE,
  ADD KEY `co_tieu_chi` (`TC_MA`);

--
-- Chỉ mục cho bảng `gia`
--
ALTER TABLE `gia`
  ADD PRIMARY KEY (`TD_DATE`,`GC_MA`,`LX_MA`),
  ADD KEY `FK_CO_CHI_TIET_GIA` (`GC_MA`),
  ADD KEY `FK_THEO` (`LX_MA`);

--
-- Chỉ mục cho bảng `giacuoc`
--
ALTER TABLE `giacuoc`
  ADD PRIMARY KEY (`GC_MA`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`KH_MA`),
  ADD KEY `FK_CO_DIA_CHI` (`QH_MA`);

--
-- Chỉ mục cho bảng `loaixe`
--
ALTER TABLE `loaixe`
  ADD PRIMARY KEY (`LX_MA`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`NV_ID`),
  ADD KEY `FK_CO_VAI_TRO` (`VT_MA`),
  ADD KEY `FK_DIA_CHI_NV` (`QH_MA`);

--
-- Chỉ mục cho bảng `phutrach`
--
ALTER TABLE `phutrach`
  ADD PRIMARY KEY (`TX_MA`),
  ADD KEY `FK_DUOC_PHU_TRACH` (`X_MA`),
  ADD KEY `FK_PHU_TRACH_TAI_TD` (`TD_DATE`);

--
-- Chỉ mục cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD PRIMARY KEY (`QH_MA`),
  ADD KEY `FK_BAO_GOM` (`TP_MA`);

--
-- Chỉ mục cho bảng `taixe`
--
ALTER TABLE `taixe`
  ADD PRIMARY KEY (`TX_MA`),
  ADD KEY `vitri` (`VT_MA`);

--
-- Chỉ mục cho bảng `thanhpho`
--
ALTER TABLE `thanhpho`
  ADD PRIMARY KEY (`TP_MA`);

--
-- Chỉ mục cho bảng `thoidiem`
--
ALTER TABLE `thoidiem`
  ADD PRIMARY KEY (`TD_DATE`);

--
-- Chỉ mục cho bảng `tieuchi`
--
ALTER TABLE `tieuchi`
  ADD PRIMARY KEY (`TC_MA`);

--
-- Chỉ mục cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`TX_MA`,`TD_DATE`),
  ADD KEY `FK_TRANG_THAI_TAI_TD` (`TD_DATE`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`VT_MA`);

--
-- Chỉ mục cho bảng `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`X_MA`),
  ADD KEY `FK_THUOC_LOAI` (`LX_MA`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chuyenxe`
--
ALTER TABLE `chuyenxe`
  ADD CONSTRAINT `FK_DAT_XE` FOREIGN KEY (`KH_MA`) REFERENCES `khachhang` (`KH_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_THUC_HIEN_BOI` FOREIGN KEY (`TX_MA`) REFERENCES `taixe` (`TX_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_THUC_HIEN_LUC` FOREIGN KEY (`TD_DATE`) REFERENCES `thoidiem` (`TD_DATE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `FK_DANH_GIA_CHO` FOREIGN KEY (`CX_MA`) REFERENCES `chuyenxe` (`CX_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_THEO_TIEU_CHI` FOREIGN KEY (`TC_MA`) REFERENCES `tieuchi` (`TC_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `dgtieuchi`
--
ALTER TABLE `dgtieuchi`
  ADD CONSTRAINT `FK_CO_DG` FOREIGN KEY (`TX_MA`) REFERENCES `taixe` (`TX_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_DG_THEO` FOREIGN KEY (`TC_MA`) REFERENCES `tieuchi` (`TC_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `co_tieu_chi` FOREIGN KEY (`TC_MA`) REFERENCES `tieuchi` (`TC_MA`);

--
-- Các ràng buộc cho bảng `gia`
--
ALTER TABLE `gia`
  ADD CONSTRAINT `FK_CO_CHI_TIET_GIA` FOREIGN KEY (`GC_MA`) REFERENCES `giacuoc` (`GC_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_CO_GIA_TAI_TD` FOREIGN KEY (`TD_DATE`) REFERENCES `thoidiem` (`TD_DATE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_THEO` FOREIGN KEY (`LX_MA`) REFERENCES `loaixe` (`LX_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `FK_CO_DIA_CHI` FOREIGN KEY (`QH_MA`) REFERENCES `quanhuyen` (`QH_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_CO_VAI_TRO` FOREIGN KEY (`VT_MA`) REFERENCES `vaitro` (`VT_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_DIA_CHI_NV` FOREIGN KEY (`QH_MA`) REFERENCES `quanhuyen` (`QH_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `phutrach`
--
ALTER TABLE `phutrach`
  ADD CONSTRAINT `FK_DUOC_PHU_TRACH` FOREIGN KEY (`X_MA`) REFERENCES `xe` (`X_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_PHU_TRACH` FOREIGN KEY (`TX_MA`) REFERENCES `taixe` (`TX_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD CONSTRAINT `FK_BAO_GOM` FOREIGN KEY (`TP_MA`) REFERENCES `thanhpho` (`TP_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `taixe`
--
ALTER TABLE `taixe`
  ADD CONSTRAINT `vitri` FOREIGN KEY (`VT_MA`) REFERENCES `vaitro` (`VT_MA`);

--
-- Các ràng buộc cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD CONSTRAINT `FK_CO_TINH_TRANG` FOREIGN KEY (`TX_MA`) REFERENCES `taixe` (`TX_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_TRANG_THAI_TAI_TD` FOREIGN KEY (`TD_DATE`) REFERENCES `thoidiem` (`TD_DATE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `FK_THUOC_LOAI` FOREIGN KEY (`LX_MA`) REFERENCES `loaixe` (`LX_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Cơ sở dữ liệu: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
