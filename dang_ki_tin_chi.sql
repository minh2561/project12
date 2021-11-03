-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2021 lúc 09:43 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

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
  `trang_thai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_role`, `trang_thai`) VALUES
('admin1', 'admin@gmail.com', 'admin', 'admin', 'Mở');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dang_ki_tin_chi`
--

CREATE TABLE `dang_ki_tin_chi` (
  `lop_id` int(11) NOT NULL,
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

INSERT INTO `dang_ki_tin_chi` (`lop_id`, `lop_ten_hoc_phan`, `lop_trang_thai`, `lop_max_sv`, `lop_current_sv`, `lop_ten_phong`, `lop_tuan_hoc`, `lop_gio_hoc`, `lop_trang_thai_dang_ki`, `mh_id`, `gv_id`) VALUES
(51, 'Toán 1', 'Chưa học', 50, 0, '1', '2021-11-04', 7, 'Đóng', 'mh01', 'gv01'),
(52, 'Toán 1', 'Chưa học', 50, 0, '2', '2021-11-04', 8, 'Đóng', 'mh01', 'gv02'),
(53, 'Toán 2', 'Chưa học', 50, 0, '1', '2021-11-04', 5, 'Mở', 'mh01', 'gv03'),
(54, 'Toán 2', 'Chưa học', 50, 0, '2', '2021-11-04', 5, 'Đóng', 'mh01', 'gv04'),
(55, 'Toán 3', 'Chưa học', 50, 0, '3', '2021-11-04', 5, 'Đóng', 'mh01', 'gv05'),
(56, 'Toán 3', 'Chưa học', 50, 0, '4', '2021-11-04', 5, 'Đóng', 'mh01', 'gv06'),
(57, 'Vật lý 1', 'Chưa học', 50, 0, 'A1', '2021-11-04', 5, 'Đóng', 'mh02', 'gv01'),
(58, 'Vật lý 2', 'Đã học', 50, 1, 'A2', '2021-11-05', 5, 'Mở', 'mh02', 'gv02'),
(59, 'Vật lý 3', 'Đã học', 50, 0, 'A3', '2021-11-06', 5, 'Mở', 'mh02', 'gv07'),
(60, 'Hóa 1', 'Chưa học', 50, 0, 'B2', '2021-11-05', 7, 'Đóng', 'mh03', 'gv06'),
(61, 'Hóa 2', 'Chưa học', 60, 0, 'B2', '2021-11-05', 10, 'Đóng', 'mh03', 'gv07'),
(62, 'Hóa 3', 'Đã học', 40, 0, 'B33', '2021-11-13', 7, 'Mở', 'mh03', 'gv04'),
(63, 'Sinh 1', 'Đã học', 50, 0, 'C1', '2021-11-13', 14, 'Mở', 'mh04', 'gv07'),
(64, 'Sinh 1', 'Đã học', 60, 0, 'C5', '2021-11-19', 7, 'Đóng', 'mh04', 'gv07'),
(65, 'Sinh 1', 'Đã học', 60, 0, 'C5', '2021-11-09', 13, 'Mở', 'mh04', 'gv04'),
(66, 'Sinh 2', 'Đã học', 80, 0, 'C2', '2021-11-13', 10, 'Mở', 'mh04', 'gv04'),
(68, 'Sử 1', 'Đã học', 60, 0, 'D1', '2021-11-19', 7, 'Mở', 'mh05', 'gv04'),
(69, 'Sử 1', 'Đã học', 60, 0, 'D2', '2021-11-17', 10, 'Đóng', 'mh05', 'gv06'),
(70, 'Sử 2', 'Đã học', 60, 0, 'D1', '2021-11-11', 9, 'Đóng', 'mh05', 'gv06'),
(71, 'Sử 3', 'Đã học', 40, 0, 'D5', '2021-11-19', 8, 'Đóng', 'mh05', 'gv05'),
(72, 'Địa 1', 'Chưa học', 70, 0, 'E1', '2021-11-17', 7, 'Đóng', 'mh06', 'gv01'),
(73, 'Địa 1', 'Chưa học', 70, 0, 'E2', '2021-11-18', 9, 'Đóng', 'mh06', 'gv06'),
(74, 'Địa 1', 'Đã học', 70, 0, 'E1', '2021-11-24', 14, 'Mở', 'mh06', 'gv04'),
(75, 'Địa 2', 'Đã học', 80, 0, 'E2', '2021-11-04', 10, 'Đóng', 'mh06', 'gv04'),
(76, 'Bóng đá', 'Đã học', 50, 0, 'F1', '2021-11-23', 15, 'Đóng', 'mh07', 'gv01'),
(77, 'Bóng chuyền', 'Đã học', 40, 0, 'F2', '2021-11-11', 8, 'Đóng', 'mh07', 'gv05'),
(78, 'Quần vợt', 'Đã học', 55, 0, 'F5', '2021-12-01', 16, 'Đóng', 'mh07', 'gv07'),
(79, 'Sức bền vật liệu', 'Đã học', 80, 0, 'G1', '2021-11-04', 7, 'Đóng', 'mh08', 'gv07'),
(80, 'Sức bền vật liệu', 'Đã học', 40, 0, 'G2', '2021-11-20', 10, 'Đóng', 'mh08', 'gv03'),
(81, 'Sức bền vật liệu', 'Đã học', 30, 0, 'G3', '2021-11-24', 9, 'Mở', 'mh08', 'gv10'),
(82, 'Tiếng anh 1', 'Đã học', 40, 0, 'H1', '2021-11-12', 7, 'Mở', 'mh09', 'gv04'),
(83, 'Tiếng anh 1', 'Đã học', 80, 0, 'H2', '2021-11-10', 9, 'Mở', 'mh09', 'gv05'),
(84, 'Tiếng anh 2', 'Đã học', 40, 0, 'H3', '2021-11-10', 12, 'Mở', 'mh09', 'gv09'),
(85, 'Tiếng anh chuyên ngành', 'Đã học', 60, 0, 'H1', '2021-11-09', 7, 'Mở', 'mh09', 'gv08'),
(86, 'Lập trình nâng cao', 'Đã học', 50, 0, 'I1', '2021-11-09', 7, 'Mở', 'mh10', 'gv07'),
(87, 'Lập trình nâng cao', 'Đã học', 60, 0, 'I2', '2021-11-08', 8, 'Mở', 'mh10', 'gv06'),
(88, 'Công nghệ Web', 'Đã học', 50, 0, 'I3', '2021-11-22', 10, 'Đóng', 'mh10', 'gv07'),
(89, 'Ngôn ngữ lập trình', 'Đã học', 50, 0, 'I2', '2021-11-09', 8, 'Đóng', 'mh10', 'gv06'),
(90, 'Hệ điều hành', 'Đã học', 50, 0, 'K1', '2021-11-03', 7, 'Đóng', 'mh11', 'gv06'),
(91, 'Hệ điều hành', 'Đã học', 50, 0, 'K2', '2021-11-10', 10, 'Đóng', 'mh11', 'gv06'),
(92, 'Hệ điều hành', 'Đã học', 50, 0, 'K1', '2021-11-09', 14, 'Mở', 'mh11', 'gv05'),
(93, 'Triết học', 'Đã học', 50, 0, 'L1', '2021-11-22', 7, 'Đóng', 'mh12', 'gv09'),
(94, 'Triết học', 'Đã học', 50, 0, 'L2', '2021-12-08', 10, 'Đóng', 'mh12', 'gv08'),
(95, 'Kinh tế chính trị Mác - Lê-nin', 'Đã học', 50, 0, 'L6', '2021-11-16', 10, 'Mở', 'mh12', 'gv03'),
(96, 'Giao tiếp và thuyết trình', 'Đã học', 50, 0, 'M6', '2021-11-09', 10, 'Đóng', 'mh13', 'gv08'),
(97, 'Giao tiếp và thuyết trình', 'Đã học', 50, 0, 'M4', '2021-11-03', 12, 'Đóng', 'mh13', 'gv04'),
(98, 'Giao tiếp và thuyết trình', 'Đã học', 40, 0, 'M1', '2021-11-09', 9, 'Mở', 'mh13', 'gv07'),
(99, 'Giao tiếp và thuyết trình', 'Đã học', 50, 0, 'M3', '2021-11-08', 133, 'Đóng', 'mh13', 'gv06');

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
('gv01', 'gv01@gmail.com', 'gv01', 'GV01'),
('gv02', 'gv02@gmail.com', 'gv02', 'GV02'),
('gv03', 'gv03@gmail.com', 'gv03', 'GV03'),
('gv04', 'gv04@gmail.com', 'gv04', 'GV04'),
('gv05', 'gv05@gmail.com', 'gv05', 'GV05'),
('gv06', 'gv06@gmail.com', 'gv06', 'GV06'),
('gv07', 'gv07@gmail.com', 'gv07', 'GV07'),
('gv08', 'gv08@gmail.com', 'gv08', 'GV08'),
('gv09', 'gv09@gmail.com', 'gv09', 'GV09'),
('gv10', 'gv10@gmail.com', 'gv10', 'GV10'),
('id1', 'admin@gmail.com', 'admin', 'admin');

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
('mh01', 'Toán', 3),
('mh02', 'Vật lý', 3),
('mh03', 'Hóa học', 3),
('mh04', 'Sinh học', 3),
('mh05', 'Sử', 3),
('mh06', 'Đia lí', 3),
('mh07', 'Thể chất', 3),
('mh08', 'Sức bền vật liệu', 3),
('mh09', 'Ngoại ngữ', 3),
('mh10', 'Lập trình', 3),
('mh11', 'Hệ điều hành', 3),
('mh12', 'Lý luận chính trị', 3),
('mh13', 'Kỹ năng mềm', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `relation_sv_mh`
--

CREATE TABLE `relation_sv_mh` (
  `sv_id` varchar(30) NOT NULL,
  `lop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('sv01', 'sv01@gmail.com', 'sv01', 'SV01', '61TH1'),
('sv02', 'sv02@gmail.com', 'sv02', 'SV02', '61TH1'),
('sv03', 'sv03@gmail.com', 'sv03', 'SV03', '61TH2'),
('sv04', 'sv04@gmail.com', 'sv04', 'SV04', '61TH2'),
('sv05', 'sv05@gmail.com', 'sv05', 'SV05', '61TH3'),
('sv06', 'sv06@gmail.com', 'sv06', 'SV06', '61TH3'),
('sv07', 'sv07@gmail.com', 'sv07', 'SV07', '61TH4'),
('sv08', 'sv08@gmail.com', 'sv08', 'SV08', '61TH4'),
('sv09', 'sv09@gmail.com', 'sv09', 'SV09', '61TH5'),
('sv10', 'sv10@gmail.com', 'sv10', 'SV10', '61TH5');

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
  MODIFY `lop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

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
