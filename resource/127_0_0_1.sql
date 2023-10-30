-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2023 lúc 09:39 AM
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
-- Cơ sở dữ liệu: `restaurant`
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
