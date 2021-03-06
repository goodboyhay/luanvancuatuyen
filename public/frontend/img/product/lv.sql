-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 30, 2020 lúc 11:14 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `binhluan` longtext NOT NULL,
  `idnguoidung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `idhoadon` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Error reading data for table lv.chitiethoadon: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `lv`.`chitiethoadon`' at line 1

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `idnguoidung` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `danhgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachxemsau`
--

CREATE TABLE `danhsachxemsau` (
  `idnguoidung` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachyeuthich`
--

CREATE TABLE `danhsachyeuthich` (
  `idnguoidung` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang`
--

CREATE TABLE `hang` (
  `id` int(11) NOT NULL,
  `mahang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Error reading data for table lv.hang: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `lv`.`hang`' at line 1

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `id` int(11) NOT NULL,
  `img` varchar(30) NOT NULL,
  `idsanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`id`, `img`, `idsanpham`) VALUES
(3, '11promax1.jpg', 1),
(7, '11promax2.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `ma` int(11) NOT NULL,
  `idnguoidung` int(11) NOT NULL,
  `idnguoiban` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `tienchuathue` int(11) NOT NULL,
  `thue` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `ten` varchar(30) NOT NULL,
  `sdt` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tenshop` varchar(30) NOT NULL,
  `avatar` varchar(30) NOT NULL,
  `token` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `username`, `password`, `ten`, `sdt`, `email`, `tenshop`, `avatar`, `token`, `created_at`, `update_at`) VALUES
(1, 'qư', '1', '', '', '', 'Điện Thoại Độc', '', 0, '2020-06-25 19:26:04', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `idnguoidung` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `ma` varchar(30) NOT NULL,
  `ten` varchar(30) NOT NULL,
  `avatar` varchar(30) NOT NULL,
  `gia` double NOT NULL,
  `mota` longtext NOT NULL,
  `manhinh` varchar(10) NOT NULL,
  `ram` varchar(10) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `bonho` varchar(10) NOT NULL,
  `idnguoidung` int(11) NOT NULL,
  `idhang` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ma`, `ten`, `avatar`, `gia`, `mota`, `manhinh`, `ram`, `pin`, `bonho`, `idnguoidung`, `idhang`, `tinhtrang`, `view`, `created_at`, `update_at`) VALUES
(1, 'iphone11promax', 'IPHONE 11 PRO MAX', 'iphone11promax.jpg', 0, '', '', '', '', '', 1, 1, 0, 4, '2020-06-25 19:40:15', NULL),
(4, 'iphone11promax', 'IPHONE 11', 'iphone11.jpg', 0, '', '', '', '', '', 1, 1, 0, 2, '2020-06-25 19:40:18', NULL),
(5, 'iphone11promax', 'IPHONE X', 'iphonex.jpg', 0, '', '', '', '', '', 1, 1, 0, 1, '2020-06-25 19:35:43', NULL),
(6, 'iphonese2', 'IPHONE SE 2', 'iphonese2.jpg', 0, '', '', '', '', '', 1, 1, 0, 9, '2020-06-30 19:03:51', NULL),
(7, '', 'SAMSUNG GALAXY ZLIP', 'ssgalaxyzlip.jpg', 0, '', '', '', '', '', 1, 2, 0, 4, '2020-06-30 19:04:59', NULL),
(8, '', 'SAMSUNG S10+', 'sss10.jpg', 0, '', '', '', '', '', 1, 2, 0, 0, '2020-06-30 21:10:53', NULL),
(9, '', 'SAMSUNG GALAXY S20	PLUS', 'sss20plus.jpg', 0, '', '', '', '', '', 1, 2, 0, 0, '2020-06-30 21:11:31', NULL),
(10, '', 'SAMSUNG GALAXY S20 Ultra', 'ssgalaxys20ultra.jpg', 0, '', '', '', '', '', 1, 2, 0, 0, '2020-06-30 21:12:18', NULL),
(11, '', 'OPPO A9', 'oppoa9.jpg', 0, '', '', '', '', '', 1, 3, 0, 0, '2020-06-30 21:12:42', NULL),
(12, '', 'OPPO A92', 'oppoa92.jpg', 0, '', '', '', '', '', 1, 3, 0, 0, '2020-06-30 21:12:53', NULL),
(13, '', 'OPPO FIND X2', 'oppofindx2.jpg', 0, '', '', '', '', '', 1, 3, 0, 0, '2020-06-30 21:13:12', NULL),
(14, '', 'OPPO RENO 3 PRO', 'opporeno3pro.jpg', 0, '', '', '', '', '', 1, 3, 0, 0, '2020-06-30 21:13:31', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idsanpham` (`idsanpham`,`idnguoidung`),
  ADD KEY `idnguoidung` (`idnguoidung`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD UNIQUE KEY `idhoadon` (`idhoadon`,`idsanpham`),
  ADD KEY `idsanpham` (`idsanpham`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD UNIQUE KEY `idnguoidung` (`idnguoidung`,`idsanpham`),
  ADD KEY `idsanpham` (`idsanpham`);

--
-- Chỉ mục cho bảng `danhsachxemsau`
--
ALTER TABLE `danhsachxemsau`
  ADD UNIQUE KEY `idnguoidung` (`idnguoidung`,`idsanpham`),
  ADD KEY `idsanpham` (`idsanpham`);

--
-- Chỉ mục cho bảng `danhsachyeuthich`
--
ALTER TABLE `danhsachyeuthich`
  ADD UNIQUE KEY `idnguoidung` (`idnguoidung`,`idsanpham`),
  ADD KEY `idsanpham` (`idsanpham`);

--
-- Chỉ mục cho bảng `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsanpham` (`idsanpham`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idnguoidung` (`idnguoidung`,`idnguoiban`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD UNIQUE KEY `idnguoidung` (`idnguoidung`,`idsanpham`),
  ADD KEY `idsanpham` (`idsanpham`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_ibfk_2` (`idhang`),
  ADD KEY `idnguoidung` (`idnguoidung`,`idhang`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hang`
--
ALTER TABLE `hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`idnguoidung`) REFERENCES `nguoidung` (`id`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`idhoadon`) REFERENCES `hoadon` (`id`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`idnguoidung`) REFERENCES `nguoidung` (`id`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `danhsachxemsau`
--
ALTER TABLE `danhsachxemsau`
  ADD CONSTRAINT `danhsachxemsau_ibfk_1` FOREIGN KEY (`idnguoidung`) REFERENCES `nguoidung` (`id`),
  ADD CONSTRAINT `danhsachxemsau_ibfk_2` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `danhsachyeuthich`
--
ALTER TABLE `danhsachyeuthich`
  ADD CONSTRAINT `danhsachyeuthich_ibfk_1` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `danhsachyeuthich_ibfk_2` FOREIGN KEY (`idnguoidung`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_ibfk_1` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`idnguoidung`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`idnguoidung`) REFERENCES `nguoidung` (`id`),
  ADD CONSTRAINT `phieunhap_ibfk_2` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idnguoidung`) REFERENCES `nguoidung` (`id`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`idhang`) REFERENCES `hang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
