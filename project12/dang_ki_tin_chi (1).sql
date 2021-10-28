-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2021 lúc 03:19 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dang_ki_tin_chi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `admin_role` varchar(30) NOT NULL,
  `lop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_role`, `lop_id`) VALUES
('admin1', 'admin@gmail.com', 'admin', 'admin', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dang_ki_tin_chi`
--

CREATE TABLE `dang_ki_tin_chi` (
  `lop_id` int(11) NOT NULL,
  `lop_hoc_phan` varchar(30) NOT NULL,
  `lop_ten_hoc_phan` varchar(30) NOT NULL,
  `lop_trang_thai` varchar(30) NOT NULL,
  `lop_max_sv` int(11) NOT NULL,
  `lop_current_sv` int(11) NOT NULL,
  `lop_ten_phong` varchar(30) NOT NULL,
  `lop_tuan_hoc` date NOT NULL,
  `lop_gio_hoc` int(11) NOT NULL,
  `lop_trang_thai_dang_ki` varchar(30) NOT NULL,
  `mh_id` varchar(30) NOT NULL,
  `gv_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dang_ki_tin_chi`
--

INSERT INTO `dang_ki_tin_chi` (`lop_id`, `lop_hoc_phan`, `lop_ten_hoc_phan`, `lop_trang_thai`, `lop_max_sv`, `lop_current_sv`, `lop_ten_phong`, `lop_tuan_hoc`, `lop_gio_hoc`, `lop_trang_thai_dang_ki`, `mh_id`, `gv_id`) VALUES
(9, 'khoa hoc', 'toan 1', 'chua hoc', 70, 50, '233-A3', '2021-07-14', 7, 'mở', 'mh1', 'gv1'),
(10, 'khoahoc', 'toan 2', 'chua hoc', 69, 45, '235-A3', '2021-08-10', 13, 'mở', 'mh2', 'gv2'),
(11, 'cntt', 'nhap mon cntt', 'chua hoc', 45, 43, '243-B5', '2021-06-15', 9, 'đóng', 'mh3', 'gv3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giao_vien`
--

CREATE TABLE `giao_vien` (
  `gv_id` varchar(30) NOT NULL,
  `gv_email` varchar(30) NOT NULL,
  `gv_password` varchar(30) NOT NULL,
  `gv_ten` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giao_vien`
--

INSERT INTO `giao_vien` (`gv_id`, `gv_email`, `gv_password`, `gv_ten`) VALUES
('gv1', 'lethily@gmail.com', 'lethily', 'le thi ly'),
('gv2', 'admin@gmail.com', 'admin', 'admin'),
('gv3', 'ducmanh@gmail.com', 'ducmanh', 'pham duc manh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `mh_id` varchar(30) NOT NULL,
  `mh_ten_mon` varchar(30) NOT NULL,
  `mh_thoi_gian_hoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mon_hoc`
--

INSERT INTO `mon_hoc` (`mh_id`, `mh_ten_mon`, `mh_thoi_gian_hoc`) VALUES
('mh1', 'toan 1', 3),
('mh10', 'bong chuyen', 2),
('mh2', 'toan 2', 6),
('mh3', 'nhap mon cntt ', 3),
('mh4', 'bong da', 2),
('mh5', 'triet hoc', 3),
('mh6', 'phap luat dai cuong', 2),
('mh7', 'phan tich thiet ke he thong', 4),
('mh8', 'co so du lieu', 4),
('mh9', 'vat ly', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `relation_sv_mh`
--

CREATE TABLE `relation_sv_mh` (
  `sv_id` varchar(30) NOT NULL,
  `lop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `relation_sv_mh`
--

INSERT INTO `relation_sv_mh` (`sv_id`, `lop_id`) VALUES
('sv6', 9),
('sv7', 11),
('sv8', 11),
('sv5', 11),
('sv6', 10),
('sv5', 9),
('sv5', 10),
('sv6', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinh_vien`
--

CREATE TABLE `sinh_vien` (
  `sv_id` varchar(30) NOT NULL,
  `sv_email` varchar(30) NOT NULL,
  `sv_password` varchar(100) NOT NULL,
  `sv_full_name` varchar(50) NOT NULL,
  `sv_lop` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sinh_vien`
--

INSERT INTO `sinh_vien` (`sv_id`, `sv_email`, `sv_password`, `sv_full_name`, `sv_lop`) VALUES
('id1', 'admin@gmail.com', 'admin', 'admin', '61th1'),
('id2', 'minh@gmail.com', 'minh', 'minh', '61th1'),
('id3', 'manh@gmail.com', 'manh', 'manh', '61th1'),
('id4', 'loi@gmail.com', 'loi', 'loi', '61th1'),
('sv5', 'test1@gmail.com', 'test1', 'test1', '61ht'),
('sv6', 'test2@gmail.com', 'test2', 'test   2', '62th5'),
('sv7', 'test3@gmail.com', 'test3', 'test   3', '60th2'),
('sv8', 'test4@gmail.com', 'test4', 'test   4', '57kt2');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dang_ki_tin_chi`
--
ALTER TABLE `dang_ki_tin_chi`
  ADD PRIMARY KEY (`lop_id`),
  ADD KEY `gv_id` (`gv_id`),
  ADD KEY `mh_id` (`mh_id`);

--
-- Chỉ mục cho bảng `giao_vien`
--
ALTER TABLE `giao_vien`
  ADD PRIMARY KEY (`gv_id`);

--
-- Chỉ mục cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD PRIMARY KEY (`mh_id`);

--
-- Chỉ mục cho bảng `relation_sv_mh`
--
ALTER TABLE `relation_sv_mh`
  ADD KEY `sv_id` (`sv_id`),
  ADD KEY `lop_id` (`lop_id`);

--
-- Chỉ mục cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD PRIMARY KEY (`sv_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dang_ki_tin_chi`
--
ALTER TABLE `dang_ki_tin_chi`
  MODIFY `lop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dang_ki_tin_chi`
--
ALTER TABLE `dang_ki_tin_chi`
  ADD CONSTRAINT `dang_ki_tin_chi_ibfk_2` FOREIGN KEY (`gv_id`) REFERENCES `giao_vien` (`gv_id`),
  ADD CONSTRAINT `dang_ki_tin_chi_ibfk_3` FOREIGN KEY (`mh_id`) REFERENCES `mon_hoc` (`mh_id`);

--
-- Các ràng buộc cho bảng `relation_sv_mh`
--
ALTER TABLE `relation_sv_mh`
  ADD CONSTRAINT `relation_sv_mh_ibfk_1` FOREIGN KEY (`sv_id`) REFERENCES `sinh_vien` (`sv_id`),
  ADD CONSTRAINT `relation_sv_mh_ibfk_2` FOREIGN KEY (`lop_id`) REFERENCES `dang_ki_tin_chi` (`lop_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
