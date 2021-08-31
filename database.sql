-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 01, 2021 lúc 12:18 AM
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
-- Cơ sở dữ liệu: `middle`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `can_bo`
--

CREATE TABLE `can_bo` (
  `id` int(11) NOT NULL,
  `ho_va_ten` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `so_dien_thoai` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dia_chi` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_chuc_vu` int(11) NOT NULL,
  `id_don_vi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `can_bo`
--

INSERT INTO `can_bo` (`id`, `ho_va_ten`, `email`, `so_dien_thoai`, `dia_chi`, `id_chuc_vu`, `id_don_vi`) VALUES
(1, 'Nguyễn Thanh Tùng', 'tungnt@tlu.edu.vn', '012345678', 'Thanh Xuân, Hà Nội', 1, 1),
(5, 'Kiều Tuấn Dũng', 'dungkt@wru.vn', '0123456', 'Hà Nội', 2, 1),
(6, 'Cù Việt Dũng', 'duncv@wru.vn', '12345678', 'Thanh Xuân', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `id` int(11) NOT NULL,
  `ten_chuc_vu` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chuc_vu`
--

INSERT INTO `chuc_vu` (`id`, `ten_chuc_vu`, `mo_ta`) VALUES
(1, 'TRƯỞNG KHOA', 'TRƯỞNG KHOA'),
(2, 'PHÓ TRƯỞNG KHOA', 'PHÓ TRƯỞNG KHOA');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_vi`
--

CREATE TABLE `don_vi` (
  `id` int(11) NOT NULL,
  `ten_don_vi` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mo_ta` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `don_vi`
--

INSERT INTO `don_vi` (`id`, `ten_don_vi`, `mo_ta`) VALUES
(1, 'PHÒNG KHOA HỌC CÔNG NGHỆ', 'PHÒNG KHOA HỌC CÔNG NGHỆ'),
(2, 'PHÒNG CHÍNH TRỊ VÀ CÔNG TÁC SINH VIÊN', 'PHÒNG CHÍNH TRỊ VÀ CÔNG TÁC SINH VIÊN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_tri_vien`
--

CREATE TABLE `quan_tri_vien` (
  `id` int(11) NOT NULL,
  `ho_va_ten` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mat_khau` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `quan_tri_vien`
--

INSERT INTO `quan_tri_vien` (`id`, `ho_va_ten`, `email`, `mat_khau`) VALUES
(1, 'Phạm Trung Kiên', 'kienpt@gmail.com', '$2y$10$qSXk7JvhBQHIo6luPUi7K.zWIJU.Y0CDSJtrpA.18hwO6gtZg52Ci');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `can_bo`
--
ALTER TABLE `can_bo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_chuc_vu` (`id_chuc_vu`),
  ADD KEY `id_don_vi` (`id_don_vi`);

--
-- Chỉ mục cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_vi`
--
ALTER TABLE `don_vi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quan_tri_vien`
--
ALTER TABLE `quan_tri_vien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `can_bo`
--
ALTER TABLE `can_bo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `don_vi`
--
ALTER TABLE `don_vi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `quan_tri_vien`
--
ALTER TABLE `quan_tri_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `can_bo`
--
ALTER TABLE `can_bo`
  ADD CONSTRAINT `can_bo_ibfk_1` FOREIGN KEY (`id_chuc_vu`) REFERENCES `chuc_vu` (`id`),
  ADD CONSTRAINT `can_bo_ibfk_2` FOREIGN KEY (`id_don_vi`) REFERENCES `don_vi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
