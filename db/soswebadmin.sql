-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 15, 2018 lúc 06:57 AM
-- Phiên bản máy phục vụ: 10.1.35-MariaDB
-- Phiên bản PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `soswebadmin`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachbaocao`
--

CREATE TABLE `danhsachbaocao` (
  `ID` int(11) NOT NULL,
  `NGUOI_BAO_CAO` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NGUOI_BI_BAO_CAO` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `KINH_DO` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `VI_DO` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `GHI_CHU` text COLLATE utf8_unicode_ci NOT NULL,
  `NGAY_BAO_CAO` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhsachbaocao`
--

INSERT INTO `danhsachbaocao` (`ID`, `NGUOI_BAO_CAO`, `NGUOI_BI_BAO_CAO`, `KINH_DO`, `VI_DO`, `GHI_CHU`, `NGAY_BAO_CAO`) VALUES
(1, '123456780', '2', '16.063502', '108.209799', 'Quay roi nhieu lan', '2018-10-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvi`
--

CREATE TABLE `donvi` (
  `MA_DON_VI` int(11) NOT NULL,
  `TEN_DON_VI` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DIA_CHI` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donvi`
--

INSERT INTO `donvi` (`MA_DON_VI`, `TEN_DON_VI`, `DIA_CHI`) VALUES
(1, 'Đơn Vị 1', 'Liên Chiểu - Đà Nẵng'),
(2, 'Đơn Vị 2', 'Hải Châu - Đà Nẵng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsu`
--

CREATE TABLE `lichsu` (
  `ID` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NGUOI_DUNG` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `THOI_GIAN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DIA_DIEM` text COLLATE utf8_unicode_ci NOT NULL,
  `NOI_DUNG` text COLLATE utf8_unicode_ci NOT NULL,
  `GUI_CHO_CONG_AN` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `location`
--

CREATE TABLE `location` (
  `USER` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `LATITUDE` text COLLATE utf8_unicode_ci NOT NULL,
  `LONGITUDE` text COLLATE utf8_unicode_ci NOT NULL,
  `TIME` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `ID` int(11) NOT NULL,
  `SO_CMND` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NGAY_DANG_KY` date DEFAULT NULL,
  `HO_VA_TEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DIEN_THOAI` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NGAY_SINH` date DEFAULT NULL,
  `HINH_ANH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`ID`, `SO_CMND`, `NGAY_DANG_KY`, `HO_VA_TEN`, `DIEN_THOAI`, `NGAY_SINH`, `HINH_ANH`) VALUES
(1, '123456780', '0018-09-24', 'Lori Lynch', '021121222', NULL, ''),
(2, '123456789', '2018-09-25', 'Lori Lynch', '021121222', '1997-12-12', 'lori.png'),
(3, '2121117313', '2018-10-23', 'Phan Đặng Hải Vũ', '01654525110', NULL, ''),
(4, '2121117314', '2018-10-23', 'Phạm Xuân Nam', '012654553', '1997-11-13', 'xnam.png'),
(5, '123123', '2018-10-26', 'vu aaaaaaaa', 'aa', NULL, ''),
(6, '111111111', '2018-12-02', 'Lee Phuc', '03212312', NULL, ''),
(7, 'aaaa', '2018-12-02', 'aaaaaaa', 'aa', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoanadmin`
--

CREATE TABLE `taikhoanadmin` (
  `TEN_DANG_NHAP` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MAT_KHAU` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `QUYEN` int(11) NOT NULL,
  `HINH_ANH` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoanadmin`
--

INSERT INTO `taikhoanadmin` (`TEN_DANG_NHAP`, `MAT_KHAU`, `QUYEN`, `HINH_ANH`) VALUES
('admin', 'admin', 0, ''),
('admin', 'admin', 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan_block`
--

CREATE TABLE `taikhoan_block` (
  `ID` int(11) NOT NULL,
  `TU_NGAY` date NOT NULL,
  `DEN_NGAY` date NOT NULL,
  `LY_DO` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan_block`
--

INSERT INTO `taikhoan_block` (`ID`, `TU_NGAY`, `DEN_NGAY`, `LY_DO`) VALUES
(2, '2018-11-08', '2018-11-16', 'Lam dung'),
(2, '2018-11-10', '2018-11-29', 'Lý do chi đó');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan_canhsat`
--

CREATE TABLE `taikhoan_canhsat` (
  `SO_TAI_KHOAN` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `HO_VA_TEN` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `TEN_DANG_NHAP` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MAT_KHAU` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DON_VI` int(11) NOT NULL,
  `HINH_ANH` text COLLATE utf8_unicode_ci NOT NULL,
  `NGAY_KICH_HOAT` date NOT NULL,
  `TINH_TRANG` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan_canhsat`
--

INSERT INTO `taikhoan_canhsat` (`SO_TAI_KHOAN`, `HO_VA_TEN`, `TEN_DANG_NHAP`, `MAT_KHAU`, `DON_VI`, `HINH_ANH`, `NGAY_KICH_HOAT`, `TINH_TRANG`) VALUES
('HC-001', 'Nguyen Hai Anh', 'nguyenhaianh', '123', 2, '', '0000-00-00', 0),
('HC-002', 'Phan Nguyen Minh Trung', 'phannminhtrung', '123', 2, '', '0000-00-00', 0),
('LC-001', 'Phan Dang Hai Vu', 'phandhaivu', '123', 1, '', '0000-00-00', 1),
('TC-004', 'Hải Vũ', 'vugalopg', '1111', 2, '911512_high-resolution-computer-theme-light-blue-wallpapers-hd-17-full_1920x1080_h.jpg', '2018-11-09', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan_nguoidung`
--

CREATE TABLE `taikhoan_nguoidung` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MAT_KHAU` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NGUOI_DUNG` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NGAY_KICH_HOAT` date DEFAULT NULL,
  `TINH_TRANG` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan_nguoidung`
--

INSERT INTO `taikhoan_nguoidung` (`ID`, `EMAIL`, `MAT_KHAU`, `NGUOI_DUNG`, `NGAY_KICH_HOAT`, `TINH_TRANG`) VALUES
(1, 'vuphan@gmail.com', '12345', '1', '2018-12-02', 1),
(2, 'doe@example.com', '123456', '2', '2018-12-02', 1),
(4, 'vugalopg@gmail.com', '123', '3', '2018-11-07', 1),
(5, 'xnam7799@gmail.com', '123123', '4', '2018-12-02', 1),
(6, 'aaaaa@gmail.com', '4297f44b13955235245b', '5', '2018-12-02', 1),
(8, 'phuclce@gmail.com', '11111', '6', '2018-12-02', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhsachbaocao`
--
ALTER TABLE `danhsachbaocao`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `taikhoan_canhsat`
--
ALTER TABLE `taikhoan_canhsat`
  ADD PRIMARY KEY (`SO_TAI_KHOAN`);

--
-- Chỉ mục cho bảng `taikhoan_nguoidung`
--
ALTER TABLE `taikhoan_nguoidung`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhsachbaocao`
--
ALTER TABLE `danhsachbaocao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `taikhoan_nguoidung`
--
ALTER TABLE `taikhoan_nguoidung`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
