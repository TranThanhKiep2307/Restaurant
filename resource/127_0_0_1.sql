-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 10:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AD_id` int(11) NOT NULL,
  `AD_ten` varchar(30) NOT NULL,
  `AD_username` varchar(30) NOT NULL,
  `AD_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AD_id`, `AD_ten`, `AD_username`, `AD_password`) VALUES
(1, 'FOXXOF', 'fox', 'fox');

-- --------------------------------------------------------

--
-- Table structure for table `apdung`
--

CREATE TABLE `apdung` (
  `KM_MA` char(10) NOT NULL,
  `HD_MA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ban`
--

CREATE TABLE `ban` (
  `B_MA` varchar(10) NOT NULL,
  `PDH_MA` varchar(10) NOT NULL,
  `B_VITRI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ban`
--

INSERT INTO `ban` (`B_MA`, `PDH_MA`, `B_VITRI`) VALUES
('B01', '002', 1),
('B02', '003', 2);

-- --------------------------------------------------------

--
-- Table structure for table `chitietban`
--

CREATE TABLE `chitietban` (
  `B_MA` varchar(10) NOT NULL,
  `CTB_TINHTRANG` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietban`
--

INSERT INTO `chitietban` (`B_MA`, `CTB_TINHTRANG`) VALUES
('B01', 'Đã đặt'),
('B02', 'Trống ');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `HD_MA` varchar(10) NOT NULL,
  `CTHD_SOLUONGMON` int(11) DEFAULT NULL,
  `CTHD_TONGTIEN` int(11) DEFAULT NULL,
  `CTHD_SOLUONGBAN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`HD_MA`, `CTHD_SOLUONGMON`, `CTHD_TONGTIEN`, `CTHD_SOLUONGBAN`) VALUES
('002', 1, 59, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieu`
--

CREATE TABLE `chitietphieu` (
  `PX_MA` varchar(10) NOT NULL,
  `PNH_MAPHIEU` varchar(10) NOT NULL,
  `CTDX_SOLUONG` int(11) DEFAULT NULL,
  `CTDX_GIA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietphieu`
--

INSERT INTO `chitietphieu` (`PX_MA`, `PNH_MAPHIEU`, `CTDX_SOLUONG`, `CTDX_GIA`) VALUES
('01', 'P01', 1, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `chitietthucan`
--

CREATE TABLE `chitietthucan` (
  `TA_MA` varchar(10) NOT NULL,
  `CTTA_DONGIA` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietthucan`
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
-- Table structure for table `doanhthu`
--

CREATE TABLE `doanhthu` (
  `DT_MA` varchar(10) NOT NULL,
  `DT_TONGTIEN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doanhthu`
--

INSERT INTO `doanhthu` (`DT_MA`, `DT_TONGTIEN`) VALUES
('T08', 70000000),
('T09', 100000000);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `GH_MA` int(11) NOT NULL,
  `TA_MA` varchar(10) NOT NULL,
  `KH_MA` int(11) NOT NULL,
  `GH_MASS` varchar(100) NOT NULL,
  `GH_SL` int(11) NOT NULL,
  `GH_GIA` varchar(255) NOT NULL,
  `GH_GHICHU` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`GH_MA`, `TA_MA`, `KH_MA`, `GH_MASS`, `GH_SL`, `GH_GIA`, `GH_GHICHU`) VALUES
(1, 'M9', 3, '10pbh1ftrs8jgfgdv35j0dpaba', 4, '', ''),
(2, 'M9', 3, 'jlhp1omnnb3dinkp23g164apcu', 2, '', ''),
(3, 'M7', 0, 'jlhp1omnnb3dinkp23g164apcu', 222, '', ''),
(4, 'M14', 3, 'jlhp1omnnb3dinkp23g164apcu', 1111, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gom`
--

CREATE TABLE `gom` (
  `NL_MA` varchar(10) NOT NULL,
  `TA_MA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gom`
--

INSERT INTO `gom` (`NL_MA`, `TA_MA`) VALUES
('R01', 'M1');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `HD_MA` varchar(10) NOT NULL,
  `NV_MA` varchar(10) NOT NULL,
  `KH_MA` varchar(10) NOT NULL,
  `HD_NGAYLAP` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`HD_MA`, `NV_MA`, `KH_MA`, `HD_NGAYLAP`) VALUES
('001', '01', '001', '2023-09-13'),
('002', '02', '003', '2023-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `KH_MA` int(10) NOT NULL,
  `Q_MA` int(11) NOT NULL,
  `KH_TEN` char(20) DEFAULT NULL,
  `KH_SDT` decimal(10,0) DEFAULT NULL,
  `KH_EMAIL` varchar(20) DEFAULT NULL,
  `KH_DIACHI` text DEFAULT NULL,
  `KH_USERNAME` varchar(8) DEFAULT NULL,
  `KH_PASSWORD` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`KH_MA`, `Q_MA`, `KH_TEN`, `KH_SDT`, `KH_EMAIL`, `KH_DIACHI`, `KH_USERNAME`, `KH_PASSWORD`) VALUES
(1, 2, 'Trần Thanh Kiệp', 123456789, 'kiep@gmail.com', 'Chợ nổi Cái Răng', 'kiep', '123'),
(2, 1, 'Nguyễn Phương Thư', 796998944, 'thu@gmail.com', 'Đối diện trường Tiểu học An Bình 3', 'thu', '123'),
(3, 3, 'Nguyễn Ngọc Kiều Hân', 372002556, 'han@gmail.com', 'Nhà trọ Hồng Đăng ', 'han ', '123'),
(4, 1, 'hanne', 567839027, 'hanb2003783@student.', 'dsaihfoe', 'hanne', '125'),
(5, 2, 'Nguyễn Nhật Đăng', 796998947, 'ctv01@h.h', 'Cần Thơ', 'ctv01', '12345'),
(6, 1, 'Nguyễn Nhật', 12587496, 'nhat@gmail.com', 'Cần Thơ', 'nhat', 'nhat');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `KM_MA` char(10) NOT NULL,
  `KM_THOIHAN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`KM_MA`, `KM_THOIHAN`) VALUES
('KM1', '2024-10-01'),
('KM2', '2023-12-14'),
('KM3', '2023-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `loainhanvien`
--

CREATE TABLE `loainhanvien` (
  `LNV_MA` varchar(10) NOT NULL,
  `LNV_TEN` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loainhanvien`
--

INSERT INTO `loainhanvien` (`LNV_MA`, `LNV_TEN`) VALUES
('KT', 'Kế Toán'),
('PV', 'Phục vụ'),
('QL', 'Quản lý'),
('ĐB', 'Đầu bếp'),
('ĐH', 'Điều hành');

-- --------------------------------------------------------

--
-- Table structure for table `loai_thuc_an`
--

CREATE TABLE `loai_thuc_an` (
  `LTA_MA` varchar(10) NOT NULL,
  `LTA_TEN` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loai_thuc_an`
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
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MN_MA` int(11) NOT NULL,
  `MN_TEN` varchar(30) NOT NULL,
  `MN_HINHANH` varchar(100) NOT NULL,
  `MN_MOTA` text DEFAULT NULL,
  `MN_GIA` float NOT NULL,
  `MN_TINHTRANG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MN_MA`, `MN_TEN`, `MN_HINHANH`, `MN_MOTA`, `MN_GIA`, `MN_TINHTRANG`) VALUES
(1, 'Combo1', 'breakfast-1.jpg', '', 60000, 0),
(2, 'Combo2', 'breakfast-2.jpg', '<p>test c&aacute;i đi</p>', 20000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nguyenlieu`
--

CREATE TABLE `nguyenlieu` (
  `NL_MA` varchar(10) NOT NULL,
  `NL_TEN` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguyenlieu`
--

INSERT INTO `nguyenlieu` (`NL_MA`, `NL_TEN`) VALUES
('BC', 'Ba chỉ heo'),
('BCB', 'Ba chỉ bò'),
('C01', 'Cá'),
('R01', 'Rau');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
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
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`NV_MA`, `LNV_MA`, `Q_MA`, `NV_TEN`, `NV_SDT`, `NV_EMAIL`, `NV_DIACHI`, `NV_USERNAME`, `NV_PASSWORD`) VALUES
('01', 'PV', '01', 'Nguyễn Thị Lan', 123456789, 'lan@gmail.com', 'Lộ Vòng Cung', 'lan', '123'),
('02', 'KT', '01', 'Nguyễn Thị Thắm', 123456789, 'tham@gmail.com', 'Đường 3/2', 'tham', '123'),
('03', 'QL', '02', 'Huỳnh Thạch Thảo', 123456787, 'thao@gmail.com', 'Đường 3/2, số nhà 37', 'thao', '123');

-- --------------------------------------------------------

--
-- Table structure for table `phieudathang`
--

CREATE TABLE `phieudathang` (
  `PDH_MA` int(11) NOT NULL,
  `PDH_SONGUOI` int(11) NOT NULL,
  `PDH_TENKH` varchar(30) NOT NULL,
  `PDH_EMAILKH` varchar(100) NOT NULL,
  `PDH_SDTKH` varchar(12) NOT NULL,
  `MN_MA` int(11) NOT NULL,
  `PDH_SLMENU` int(11) NOT NULL,
  `PDH_TG` time DEFAULT NULL,
  `PDH_NGAYLAP` date DEFAULT NULL,
  `PDH_GHICHU` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieudathang`
--

INSERT INTO `phieudathang` (`PDH_MA`, `PDH_SONGUOI`, `PDH_TENKH`, `PDH_EMAILKH`, `PDH_SDTKH`, `MN_MA`, `PDH_SLMENU`, `PDH_TG`, `PDH_NGAYLAP`, `PDH_GHICHU`) VALUES
(1, 1, 'kiep', 'kiep@gmail.com', '12345698', 2, 2, '10:00:00', '2023-10-14', 'NOT'),
(2, 1, 'Nguyễn', 'nguyen@gmail.com', '12547896', 1, 3, '13:00:00', '2023-10-15', 'not'),
(3, 1, 'kiep', 'kiep@gmail.com', '12345698', 2, 4, '10:00:00', '2023-10-14', 'not'),
(4, 3, 'Trần Thanh Kiệp', 'ttkcaptianlp23@gmail.com', '0858801302', 2, 5, '11:35:00', '2023-11-02', 'cc');

-- --------------------------------------------------------

--
-- Table structure for table `phieunhaphang`
--

CREATE TABLE `phieunhaphang` (
  `PNH_MAPHIEU` varchar(10) NOT NULL,
  `NV_MA` varchar(10) NOT NULL,
  `PNH_NGAYNHAP` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieunhaphang`
--

INSERT INTO `phieunhaphang` (`PNH_MAPHIEU`, `NV_MA`, `PNH_NGAYNHAP`) VALUES
('P01', '02', '2023-10-02'),
('P02', '02', '2023-10-02'),
('P03', '02', '2023-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `PX_MA` varchar(10) NOT NULL,
  `NV_MA` varchar(10) NOT NULL,
  `PX_NGAYKT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phieuxuat`
--

INSERT INTO `phieuxuat` (`PX_MA`, `NV_MA`, `PX_NGAYKT`) VALUES
('P01', '02', '2023-10-03'),
('P02', '02', '2023-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `quan_huyen`
--

CREATE TABLE `quan_huyen` (
  `Q_MA` int(10) NOT NULL,
  `Q_TEN` char(20) DEFAULT NULL,
  `TP_MA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quan_huyen`
--

INSERT INTO `quan_huyen` (`Q_MA`, `Q_TEN`, `TP_MA`) VALUES
(1, 'Ninh Kiều', '1'),
(2, 'Cái Răng', '1'),
(3, 'Bình Thủy', '3');

-- --------------------------------------------------------

--
-- Table structure for table `thanhpho_tinh`
--

CREATE TABLE `thanhpho_tinh` (
  `TP_MA` varchar(10) NOT NULL,
  `TP_TEN` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thanhpho_tinh`
--

INSERT INTO `thanhpho_tinh` (`TP_MA`, `TP_TEN`) VALUES
('01', 'Cần Thơ'),
('02', 'Vị Thanh');

-- --------------------------------------------------------

--
-- Table structure for table `thoidiem`
--

CREATE TABLE `thoidiem` (
  `B_MA` varchar(10) NOT NULL,
  `THOIGIAN_BD` datetime DEFAULT NULL,
  `THOIGIAN_KT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thoidiem`
--

INSERT INTO `thoidiem` (`B_MA`, `THOIGIAN_BD`, `THOIGIAN_KT`) VALUES
('B01', '2023-10-02 07:00:00', '2023-10-02 20:00:00'),
('B01', '2023-10-02 07:00:00', '2023-10-02 20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `thongke`
--

CREATE TABLE `thongke` (
  `NV_MA` varchar(10) NOT NULL,
  `DT_MA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thongke`
--

INSERT INTO `thongke` (`NV_MA`, `DT_MA`) VALUES
('02', 'T08'),
('02', 'T09'),
('03', 'T09');

-- --------------------------------------------------------

--
-- Table structure for table `thucan`
--

CREATE TABLE `thucan` (
  `TA_MA` varchar(10) NOT NULL,
  `LTA_MA` varchar(10) NOT NULL,
  `TA_TEN` char(20) DEFAULT NULL,
  `TA_HINHANH` varchar(100) NOT NULL,
  `TA_MOTA` text DEFAULT NULL,
  `TA_TINHTRANG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thucan`
--

INSERT INTO `thucan` (`TA_MA`, `LTA_MA`, `TA_TEN`, `TA_HINHANH`, `TA_MOTA`, `TA_TINHTRANG`) VALUES
('M1', 'K01', 'Salad khai vị', 'lunch-2.jpg', 'Salat khai vị cầu vòng', 0),
('M10', 'T01', 'Thịt bắp bò Mỹ', 'dinner-1.jpg', NULL, 0),
('M11', 'T01', 'Thăn ngoại bò Waygu', 'dinner-2.jpg', NULL, 0),
('M12', 'T01', 'Thịt bò hữu cơ Obe', 'dinner-3.jpg', NULL, 0),
('M13', 'T01', 'Thịt ba chỉ bò Mỹ', 'dinner-4.jpg', NULL, 0),
('M14', 'T01', 'Thịt bò Mỹ', 'dinner-5.jpg', NULL, 0),
('M15', 'K01', 'Cocktail Bloody Mary', 'drink-1.jpg', NULL, 0),
('M16', 'K01', 'Cocktail Mojito', 'drink-2.jpg', NULL, 0),
('M17', 'K01', 'Nước ép cam', 'drink-3.jpg', NULL, 0),
('M18', 'K01', 'PEPSI', 'drink-4.jpg', NULL, 0),
('M19', 'K01', 'Cocktail Fruit Seaso', 'drink-5.jpg', NULL, 0),
('M2', 'S01', 'Súp kem bí đỏ', 'lunch-3.jpg', 'Súp kem bí đỏ vị béo', 0),
('M20', 'K01', 'Cocktail trái cây', 'drink-6.jpg', NULL, 0),
('M21', 'K02', 'Bánh Macarons', 'dessert-1.jpg', NULL, 0),
('M22', 'K02', 'Sữa chua hoa quả', 'dessert-2.jpg', NULL, 0),
('M23', 'K02', 'Chocolate Souffle', 'dessert-3.jpg', NULL, 0),
('M24', 'K02', 'Kem', 'dessert-4.jpg', NULL, 0),
('M25', 'K02', 'Bánh Creme', 'dessert-5.jpg', NULL, 0),
('M26', 'K02', 'Bánh flan', 'dessert-6.jpg', NULL, 0),
('M27', 'R01', 'Rượu vang đỏ', 'wine-1.jpg', NULL, 0),
('M28', 'R01', 'Rượu Cognac', 'wine-2.jpg', NULL, 0),
('M29', 'R01', 'Rượu nho Sherry', 'wine-3.jpg', NULL, 0),
('M3', 'S01', 'Sốt kem phô mai', 'lunch-5.jpg', 'Sốt kem phô mai ', 0),
('M30', 'R01', 'Rượu vang trắng', 'wine-4.jpg', NULL, 0),
('M31', 'R01', 'Rum trắng', 'wine-5.jpg', NULL, 0),
('M32', 'R01', 'Tequila', 'wine-6.jpg', NULL, 0),
('M33', 'R01', 'Whisky', 'wine-7.jpg', NULL, 0),
('M34', 'R01', 'Vodka', 'wine-8.jpg', NULL, 0),
('M35', 'L01', 'Combo nướng', 'breakfast-2.jpg', NULL, 0),
('M36', 'L01', 'Combo nướng', 'breakfast-1.jpg', NULL, 0),
('M37', 'L01', 'Combo Nướng 2', 'breakfast-3.jpg', NULL, 0),
('M38', 'L01', 'Lẩu Đài Loan', 'breakfast-4.jpg', NULL, 0),
('M39', 'L01', 'Combo Lẩu', 'breakfast-5.jpg', NULL, 0),
('M4', 'S01', 'Sốt chấm', 'lunch-2.jpg', 'Sốt chấm ăn kèm', 0),
('M40', 'L01', 'Combo Lẩu nướng', 'breakfast-6.jpg', NULL, 0),
('M41', 'L01', 'Combo nướng cho 2 ng', 'breakfast-7.jpg', NULL, 0),
('M42', 'L01', 'Combo nướng cho 3 ng', 'breakfast-8.jpg', NULL, 0),
('M5', 'K01', 'Há Cảo', 'lunch-4.jpg', NULL, 0),
('M6', 'T01', 'Gỏi mực Thái Lan', 'lunch-6.jpg', NULL, 0),
('M7', 'K01', 'Sủi Cảo', 'lunch-7.jpg', NULL, 0),
('M8', 'K01', 'Bánh Bao Chiên', 'lunch-8.jpg', NULL, 0),
('M9', 'T01', 'Thịt thăn vai', 'dinner-6.jpg', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AD_id`);

--
-- Indexes for table `apdung`
--
ALTER TABLE `apdung`
  ADD PRIMARY KEY (`KM_MA`,`HD_MA`),
  ADD KEY `FK_APDUNG2` (`HD_MA`);

--
-- Indexes for table `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`B_MA`),
  ADD KEY `FK_DAT` (`PDH_MA`);

--
-- Indexes for table `chitietban`
--
ALTER TABLE `chitietban`
  ADD PRIMARY KEY (`B_MA`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`HD_MA`);

--
-- Indexes for table `chitietphieu`
--
ALTER TABLE `chitietphieu`
  ADD PRIMARY KEY (`PX_MA`,`PNH_MAPHIEU`);

--
-- Indexes for table `chitietthucan`
--
ALTER TABLE `chitietthucan`
  ADD UNIQUE KEY `TA_MA` (`TA_MA`) USING BTREE;

--
-- Indexes for table `doanhthu`
--
ALTER TABLE `doanhthu`
  ADD PRIMARY KEY (`DT_MA`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`GH_MA`),
  ADD KEY `FK_COTHUCAN` (`TA_MA`),
  ADD KEY `FK_COKH` (`KH_MA`);

--
-- Indexes for table `gom`
--
ALTER TABLE `gom`
  ADD PRIMARY KEY (`NL_MA`,`TA_MA`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`HD_MA`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`KH_MA`),
  ADD KEY `Q_MA` (`Q_MA`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`KM_MA`);

--
-- Indexes for table `loainhanvien`
--
ALTER TABLE `loainhanvien`
  ADD PRIMARY KEY (`LNV_MA`);

--
-- Indexes for table `loai_thuc_an`
--
ALTER TABLE `loai_thuc_an`
  ADD PRIMARY KEY (`LTA_MA`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MN_MA`);

--
-- Indexes for table `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD PRIMARY KEY (`NL_MA`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`NV_MA`);

--
-- Indexes for table `phieudathang`
--
ALTER TABLE `phieudathang`
  ADD PRIMARY KEY (`PDH_MA`),
  ADD KEY `FK_COMENU` (`MN_MA`);

--
-- Indexes for table `phieunhaphang`
--
ALTER TABLE `phieunhaphang`
  ADD PRIMARY KEY (`PNH_MAPHIEU`);

--
-- Indexes for table `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`PX_MA`);

--
-- Indexes for table `quan_huyen`
--
ALTER TABLE `quan_huyen`
  ADD PRIMARY KEY (`Q_MA`),
  ADD KEY `TP_MA` (`TP_MA`);

--
-- Indexes for table `thanhpho_tinh`
--
ALTER TABLE `thanhpho_tinh`
  ADD PRIMARY KEY (`TP_MA`);

--
-- Indexes for table `thongke`
--
ALTER TABLE `thongke`
  ADD PRIMARY KEY (`NV_MA`,`DT_MA`);

--
-- Indexes for table `thucan`
--
ALTER TABLE `thucan`
  ADD PRIMARY KEY (`TA_MA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AD_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `GH_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `KH_MA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `MN_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `phieudathang`
--
ALTER TABLE `phieudathang`
  MODIFY `PDH_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quan_huyen`
--
ALTER TABLE `quan_huyen`
  MODIFY `Q_MA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apdung`
--
ALTER TABLE `apdung`
  ADD CONSTRAINT `FK_APDUNG` FOREIGN KEY (`KM_MA`) REFERENCES `khuyenmai` (`KM_MA`),
  ADD CONSTRAINT `FK_APDUNG2` FOREIGN KEY (`HD_MA`) REFERENCES `hoadon` (`HD_MA`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`Q_MA`) REFERENCES `quan_huyen` (`Q_MA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
