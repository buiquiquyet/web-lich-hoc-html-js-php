-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 28, 2024 lúc 03:59 AM
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
-- Cơ sở dữ liệu: `androi_web2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bomon`
--

CREATE TABLE `bomon` (
  `idbomon` int(11) NOT NULL,
  `idkhoa` int(11) NOT NULL,
  `tenbomon` varchar(100) NOT NULL,
  `ngaytao` datetime NOT NULL,
  `ngaysua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bomon`
--

INSERT INTO `bomon` (`idbomon`, `idkhoa`, `tenbomon`, `ngaytao`, `ngaysua`) VALUES
(1, 1, 'CNTT', '2021-04-15 09:40:29', '2021-05-05 07:49:24'),
(2, 1, 'CNTT2', '2021-04-15 09:40:29', '2021-04-15 09:40:34'),
(3, 1, 'CNTT3', '2021-04-15 09:40:29', '2021-04-15 09:40:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buoihoc`
--

CREATE TABLE `buoihoc` (
  `idbuoihoc` int(11) NOT NULL,
  `idtkb` int(11) DEFAULT NULL,
  `sophong` varchar(10) NOT NULL,
  `tietbatdau` int(11) NOT NULL,
  `tietketthuc` int(11) NOT NULL,
  `ngay` date DEFAULT NULL,
  `trangthai` int(11) NOT NULL,
  `ttgiaovien` int(11) NOT NULL,
  `decuongbaigiang` int(11) NOT NULL DEFAULT 0,
  `giaotrinh` int(11) NOT NULL DEFAULT 0,
  `decuongchitiet` int(11) NOT NULL DEFAULT 0,
  `dieukienphong` int(11) NOT NULL DEFAULT 0,
  `chuthich` text NOT NULL,
  `ngaytao` datetime DEFAULT NULL,
  `ngaysua` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `buoihoc`
--

INSERT INTO `buoihoc` (`idbuoihoc`, `idtkb`, `sophong`, `tietbatdau`, `tietketthuc`, `ngay`, `trangthai`, `ttgiaovien`, `decuongbaigiang`, `giaotrinh`, `decuongchitiet`, `dieukienphong`, `chuthich`, `ngaytao`, `ngaysua`) VALUES
(2, 2, 'A301', 14, 15, '2023-03-19', 1, 0, 0, 0, 0, 0, '', NULL, NULL),
(4, 4, 'A101', 3, 4, '2023-03-13', 1, 0, 0, 0, 0, 0, '', NULL, NULL),
(20, 20, 'A101', 7, 8, '2023-03-13', 1, 0, 0, 0, 0, 0, '', NULL, NULL),
(24, 24, 'A102', 1, 1, '2023-03-20', 1, 0, 0, 0, 0, 0, '', NULL, NULL),
(27, 27, 'A102', 5, 6, '2023-03-20', 1, 0, 0, 0, 0, 0, '', NULL, NULL),
(32, 32, 'A101', 7, 8, '2023-03-20', 1, 0, 0, 0, 0, 0, '', NULL, NULL),
(42, 42, 'A101', 7, 10, '2023-03-23', 1, 0, 0, 0, 0, 0, '', NULL, NULL),
(44, 44, 'A101', 2, 5, '2023-03-20', 1, 0, 0, 0, 0, 0, '', NULL, NULL),
(46, 46, 'A101', 1, 1, '2023-03-28', 1, 0, 0, 0, 0, 0, '', NULL, NULL),
(48, 48, 'A101', 1, 1, '2023-03-27', 1, 0, 0, 0, 0, 0, '', NULL, NULL),
(49, 49, 'A101', 1, 1, '2021-01-01', 1, 0, 0, 0, 0, 0, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangkyhoc`
--

CREATE TABLE `dangkyhoc` (
  `iddangky` int(11) NOT NULL,
  `idlophoc` int(11) DEFAULT NULL,
  `idsinhvien` varchar(7) DEFAULT NULL,
  `ngaytao` datetime NOT NULL,
  `ngaysua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dangkyhoc`
--

INSERT INTO `dangkyhoc` (`iddangky`, `idlophoc`, `idsinhvien`, `ngaytao`, `ngaysua`) VALUES
(2, 3, '1700514', '2021-04-05 21:04:35', '2021-04-07 11:24:55'),
(3, 3, '2000212', '2021-04-05 21:04:54', '2021-04-06 03:04:31'),
(4, 3, '1700515', '2021-04-05 21:04:54', '2021-04-06 15:35:17'),
(5, 4, '1700557', '2021-04-06 05:34:34', '2021-04-06 15:44:17'),
(6, 2, '2000123', '2021-04-07 15:49:18', '2021-04-07 15:49:18'),
(7, 5, '1700557', '2021-04-07 15:15:22', '2021-04-07 15:15:22'),
(8, 4, '2000134', '2021-04-07 15:29:41', '2021-04-07 15:29:41'),
(9, 3, '2000135', '2021-04-07 15:41:41', '2021-04-07 15:41:41'),
(10, 2, '1700515', '2021-04-20 03:39:27', '2021-04-20 04:05:25'),
(11, 2, '1700550', '2021-04-20 03:39:27', '2021-04-20 03:39:27'),
(12, 2, '1700557', '2021-04-20 03:39:27', '2021-04-20 03:39:27'),
(13, 2, '1700566', '2021-04-20 03:39:27', '2021-04-20 03:39:27'),
(14, 2, '2000121', '2021-04-20 03:39:27', '2021-04-20 03:39:27'),
(15, 2, '2000124', '2021-04-20 03:39:27', '2021-04-20 03:39:27'),
(16, 2, '2000125', '2021-04-20 03:39:27', '2021-04-20 03:39:27'),
(17, 2, '2000131', '2021-04-20 03:39:27', '2021-04-20 03:39:27'),
(18, 2, '2000133', '2021-04-20 03:39:27', '2021-04-20 03:39:27'),
(19, 2, '2000134', '2021-04-20 03:39:27', '2021-04-20 03:39:27'),
(20, 2, '2000135', '2021-04-20 03:39:27', '2021-04-20 03:39:27'),
(21, 2, '2000137', '2021-04-20 03:39:27', '2021-04-20 03:39:27'),
(22, 2, '2000219', '2021-04-20 03:39:27', '2021-04-20 03:39:27'),
(23, 2, '2000242', '2021-04-20 03:39:27', '2021-04-20 03:39:27'),
(24, 2, '2000245', '2021-04-20 03:39:27', '2021-04-20 03:39:27'),
(25, 2, '2000445', '2021-04-20 03:39:27', '2021-04-20 03:39:27'),
(27, 11, '1700514', '2021-05-06 03:43:57', '2021-05-06 03:43:57'),
(28, 22, '1700666', '2021-05-06 03:43:57', '2021-06-07 02:58:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daythay`
--

CREATE TABLE `daythay` (
  `iddaythay` int(11) NOT NULL,
  `idbuoihoc` int(11) DEFAULT NULL,
  `idgiaovien` varchar(8) DEFAULT NULL,
  `ngaytao` datetime NOT NULL,
  `ngaysua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `daythay`
--

INSERT INTO `daythay` (`iddaythay`, `idbuoihoc`, `idgiaovien`, `ngaytao`, `ngaysua`) VALUES
(6, 1533, '01007005', '2021-05-20 16:09:02', '2021-05-20 16:12:08'),
(7, 1504, '01007029', '2021-05-21 03:41:46', '2021-05-21 06:01:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `idgiaovien` varchar(8) NOT NULL,
  `hoten` text NOT NULL,
  `idkhoa` int(11) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `ngaytao` datetime NOT NULL,
  `ngaysua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`idgiaovien`, `hoten`, `idkhoa`, `sdt`, `ngaytao`, `ngaysua`) VALUES
('01007002', 'Phạm Văn Kiên', 1, '0923423443', '2021-04-05 21:02:35', '2021-04-27 10:40:01'),
('01007003', 'Phạm Thị Hường', 1, '0363433432', '2021-04-05 21:02:35', '2021-05-06 03:26:23'),
('01007005', 'Hoàng Thị Ngọc Diệp', 1, '0954534323', '2021-04-05 21:02:35', '2021-04-27 10:11:02'),
('01007023', 'Nguyễn Thị Ánh Tuyết', 1, '0982198313', '2021-04-07 15:25:19', '2021-04-27 10:00:01'),
('01007027', 'Vũ Bảo Tạo', 1, '0999999999', '2021-04-05 21:02:35', '2021-04-05 21:02:35'),
('01007029', 'Hoàng Thị Ngát', 1, '0921982179', '2021-04-07 15:25:19', '2021-04-27 10:26:01'),
('01007033', 'Hoàng Thị An', 1, '0999999999', '2021-04-05 21:02:35', '2021-04-05 21:02:35'),
('01007039', 'Nguyễn Thị Bích Ngọc', 1, '0999999999', '2021-04-05 21:02:35', '2021-04-05 21:02:35'),
('01021007', 'Phạm Thị Tâm', 1, '0999999999', '2021-04-05 21:02:35', '2021-04-05 21:02:35'),
('1', 'gvck 1', 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('10', 'gvtphh 1', 4, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('11', 'gvtphh 2', 4, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('11101123', 'kien1234', 1, '0999999999', '2021-04-17 09:26:40', '2021-04-17 09:26:40'),
('11111111', 'Vũ Đức Kiên', 1, '0933111111', '2021-04-26 04:32:25', '2021-04-26 04:32:25'),
('11111112', 'kien1234', 1, '0933111112', '2021-04-26 04:26:28', '2021-04-26 04:26:28'),
('11123212', 'kien123', 1, '0933116765', '2021-04-26 04:24:32', '2021-04-26 04:42:32'),
('12', 'gvtphh 3', 4, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('13', 'gvtphh 4', 4, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('2', 'gvck 2', 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('3', 'gvck 3', 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('4', 'gvck 4', 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('5', 'gvck 5', 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('6', 'gvdien 1', 3, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('7', 'gvdien 2', 3, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('8', 'gvdien 3', 3, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('9', 'gvdien 4', 3, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `user`, `pass`) VALUES
(1, 'bb', '21ad0bd836b90d08f4cf640b4c298e7c');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `idkhoa` int(11) NOT NULL,
  `tenkhoa` varchar(50) DEFAULT NULL,
  `ngaytao` datetime DEFAULT NULL,
  `ngaysua` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`idkhoa`, `tenkhoa`, `ngaytao`, `ngaysua`) VALUES
(1, 'Công nghệ thông tin', '2021-04-15 09:45:41', '2021-04-15 10:10:57'),
(2, 'Cơ khí', '2021-04-15 09:45:41', '2021-05-05 06:01:50'),
(3, 'Điện', '2021-04-15 09:45:41', '2021-04-15 09:45:41'),
(4, 'Thực phẩm và Hóa Học', '2021-04-15 09:45:41', '2021-04-15 09:45:41'),
(5, 'May và Thời trang', '2021-04-15 09:45:41', '2021-04-15 09:45:41'),
(6, 'Ô tô', '2021-04-15 09:45:41', '2021-04-15 09:45:41'),
(7, 'Kinh tế', '2021-04-15 09:45:41', '2021-04-15 09:45:41'),
(8, 'Du lịch và Ngoại ngữ', '2021-04-15 09:45:41', '2021-04-15 09:45:41'),
(9, 'Giáo dục Chính trị và Thể chất', '2021-04-15 09:45:41', '2021-04-15 09:45:41'),
(10, 'Khoa học cơ bản', '2021-04-15 09:45:41', '2021-04-15 09:45:41'),
(11, 'Quản trị kinh doanh', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kyhoc`
--

CREATE TABLE `kyhoc` (
  `idkyhoc` int(11) NOT NULL,
  `kyhoc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `kyhoc`
--

INSERT INTO `kyhoc` (`idkyhoc`, `kyhoc`) VALUES
(1, '2021 - Kỳ 1'),
(2, '2021 - Kỳ 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `idlop` int(11) NOT NULL,
  `idkhoa` int(11) NOT NULL,
  `tenlop` varchar(100) NOT NULL,
  `ngaytao` datetime DEFAULT NULL,
  `ngaysua` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`idlop`, `idkhoa`, `tenlop`, `ngaytao`, `ngaysua`) VALUES
(1, 1, 'DK8-CNTT', '2021-04-15 09:46:42', '2021-04-15 09:46:42'),
(2, 1, 'DK9-CNTT', '2021-04-15 09:46:42', '2021-04-15 09:46:42'),
(3, 1, 'DK10-CNTT', '2021-04-15 09:46:42', '2021-04-15 09:46:42'),
(4, 1, 'DK11-CNTT1', '2021-04-15 09:46:42', '2021-04-15 09:46:42'),
(5, 1, 'DK11-CNTT2', '2021-04-15 09:46:42', '2021-04-15 09:46:42'),
(6, 1, 'DK11LT-CNTT', '2021-04-15 09:46:42', '2021-04-15 09:46:42'),
(7, 1, 'CK15-CNTT', '2021-04-15 09:46:42', '2021-04-15 09:46:42'),
(9, 2, 'Cơ khí 1', NULL, NULL),
(10, 2, 'Cơ khí 2', NULL, NULL),
(11, 2, 'Cơ khí 3', NULL, NULL),
(12, 2, 'Cơ khí 4', NULL, NULL),
(13, 3, 'Điện 1', NULL, NULL),
(14, 3, 'Điện 2', NULL, NULL),
(15, 4, 'Thực phẩm khóa học 1', NULL, NULL),
(16, 4, 'Thực phẩm khóa học 2', NULL, NULL),
(17, 5, 'May và thời trang', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `idlophoc` int(11) NOT NULL,
  `idlop` int(11) NOT NULL,
  `idmonhoc` int(11) NOT NULL,
  `idkhoa` int(11) NOT NULL,
  `tenlophoc` text DEFAULT NULL,
  `idgiaovien` varchar(8) DEFAULT NULL,
  `tongsotiet` int(11) NOT NULL,
  `sotietday` int(11) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `sosv` int(11) DEFAULT NULL,
  `idkyhoc` int(11) NOT NULL,
  `ngaytao` datetime NOT NULL,
  `ngaysua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`idlophoc`, `idlop`, `idmonhoc`, `idkhoa`, `tenlophoc`, `idgiaovien`, `tongsotiet`, `sotietday`, `ngaybatdau`, `sosv`, `idkyhoc`, `ngaytao`, `ngaysua`) VALUES
(2, 5, 6, 1, 'DK11-CNTT2-Lập trình C#', '01007027', 0, 0, '2023-03-19', NULL, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 2, 1, 'DK8-CNTT-Phát triển ứng dụng di động', '01007002', 0, 0, '2023-03-13', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 1, 2, 1, 'DK8-CNTT-Phát triển ứng dụng di động', '01007002', 0, 0, '2023-03-13', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 1, 2, 1, 'DK8-CNTT-Phát triển ứng dụng di động', '01007002', 0, 0, '2023-03-20', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 1, 2, 1, 'DK8-CNTT-Phát triển ứng dụng di động', '01007002', 0, 0, '2023-03-20', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 1, 2, 1, 'DK8-CNTT-Phát triển ứng dụng di động', '01007002', 0, 0, '2023-03-20', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 1, 2, 1, 'DK8-CNTT-Phát triển ứng dụng di động', '01007002', 0, 0, '2023-03-20', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 1, 2, 1, 'DK8-CNTT-Phát triển ứng dụng di động', '01007002', 0, 0, '2023-03-23', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 1, 2, 1, 'DK8-CNTT-Phát triển ứng dụng di động', '01007002', 0, 0, '2023-03-20', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 16, 14, 4, 'Thực phẩm khóa hoc 2-Kĩ năng mềm', '13 ', 0, 0, '2023-03-28', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 12, 9, 2, 'Cơ khí 4-Thực hành máy', '5 ', 0, 0, '2023-03-27', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 1, 2, 1, 'DK8-CNTT-Phát triển ứng dụng di động', '01007002', 0, 0, '2021-01-01', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `idmonhoc` int(11) NOT NULL,
  `idkhoa` int(11) NOT NULL,
  `tenmon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`idmonhoc`, `idkhoa`, `tenmon`) VALUES
(2, 1, 'Phát triển ứng dụng di động'),
(3, 1, 'Lập trình python'),
(4, 1, 'Phân tích và thiết kế hướng đối tượng'),
(5, 1, 'Tiếng anh chuyên ngành công nghệ thông tin'),
(6, 1, 'Lập trình C#'),
(7, 1, 'Kiến trúc phần mềm'),
(8, 2, 'Vật liệu ứng dụng'),
(9, 2, 'Thực hành máy'),
(10, 2, 'Lắp ráp phụ kiện'),
(11, 3, 'Vi xử lí điều khiển'),
(12, 3, 'Máy điện'),
(13, 4, 'Lịch sử đảng'),
(14, 4, 'Kĩ năng mềm'),
(15, 4, 'Tin học'),
(16, 4, 'Thực hành thực phẩm'),
(17, 4, 'Triết học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nghile`
--

CREATE TABLE `nghile` (
  `ngaynghi` date NOT NULL,
  `lydo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nghile`
--

INSERT INTO `nghile` (`ngaynghi`, `lydo`) VALUES
('2021-11-20', 'Ngày nhà giáo Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `sophong` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`sophong`) VALUES
('A101'),
('A102'),
('A103'),
('A104'),
('A105'),
('A106'),
('A107'),
('A108'),
('A109'),
('A201'),
('A202'),
('A203'),
('A204'),
('A205'),
('A206'),
('A207'),
('A208'),
('A209'),
('A301'),
('A302'),
('A303'),
('A304'),
('A305'),
('A306'),
('A307'),
('A308'),
('A309'),
('A401'),
('A402'),
('A403'),
('A404'),
('A405'),
('A406'),
('A407'),
('A408'),
('A409'),
('A501'),
('A502'),
('A503'),
('A504'),
('A505'),
('A506'),
('A507'),
('A508'),
('A509');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `idsinhvien` varchar(7) NOT NULL,
  `hoten` text DEFAULT NULL,
  `idlop` int(11) DEFAULT NULL,
  `ngaytao` datetime NOT NULL,
  `ngaysua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`idsinhvien`, `hoten`, `idlop`, `ngaytao`, `ngaysua`) VALUES
('1700514', 'Vũ Đức Kiên', 2, '2021-04-05 21:01:50', '2021-04-17 04:15:54'),
('1700515', 'Vũ Đức Hùng', 1, '2021-04-05 21:01:50', '2021-04-17 04:15:08'),
('1700550', 'Nguyễn Nhật Phương', 1, '2021-04-07 15:06:08', '2021-04-08 05:48:06'),
('1700555', 'Lý Văn Lân', 6, '2021-04-16 15:58:37', '2021-04-17 04:32:20'),
('1700557', 'Vũ Đức Kiên', 1, '2021-04-06 04:18:04', '2021-04-17 05:05:04'),
('1700666', 'Lỗ Văn Dũng', 2, '2021-04-16 15:23:42', '2021-04-16 15:23:42'),
('1708987', 'Tô Văn Phương', 4, '2021-04-17 04:59:22', '2021-04-17 04:59:22'),
('1711111', 'kien1234', 3, '2021-04-17 09:29:15', '2021-04-17 09:00:16'),
('1888888', 'kien1234', 1, '2021-05-02 07:54:40', '2021-05-06 03:13:23'),
('2000121', ' Vũ Mạnh Cường', 1, '2021-04-05 21:01:50', '2021-04-06 04:39:05'),
('2000123', ' Lê Văn Phong', 1, '2021-04-05 21:01:50', '2021-04-06 04:39:05'),
('2000124', 'Lê Văn Công', 1, '2021-04-05 21:01:50', '2021-04-06 04:39:05'),
('2000125', 'Phạm Nhật Vượng', 1, '2021-04-05 21:01:50', '2021-04-06 04:39:05'),
('2000131', ' Vũ Tuấn Cường', 1, '2021-04-05 21:01:50', '2021-04-06 04:39:05'),
('2000133', ' Bùi Văn Phong', 1, '2021-04-05 21:01:50', '2021-04-06 04:39:05'),
('2000134', 'Lê Thị Dung', 1, '2021-04-05 21:01:50', '2021-04-06 04:39:05'),
('2000135', 'Phạm Nhật Long', 1, '2021-04-05 21:01:50', '2021-04-06 04:39:05'),
('2000137', 'Lê Thị Linh', 1, '2021-04-05 21:01:50', '2021-04-06 04:39:05'),
('2000139', ' Bùi Văn Bá', 7, '2021-04-05 21:01:50', '2021-04-06 04:39:05'),
('2000212', ' Vũ Tiến Hùng', 7, '2021-04-05 21:01:50', '2021-04-06 04:39:05'),
('2000219', ' Vũ Tiến Dũng', 1, '2021-04-05 21:01:50', '2021-04-06 04:39:05'),
('2000242', ' Lê Nhật Hùng', 1, '2021-04-05 21:01:50', '2021-04-06 04:39:05'),
('2000245', ' Ngô Tiến Dũng', 1, '2021-04-05 21:01:50', '2021-04-06 04:39:05'),
('2000445', 'Trần Nhật Long', 1, '2021-04-05 21:01:50', '2021-04-06 04:39:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sv`
--

CREATE TABLE `sv` (
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `c` int(11) NOT NULL,
  `d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sv`
--

INSERT INTO `sv` (`a`, `b`, `c`, `d`) VALUES
(2, 2, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `idquanly` varchar(20) NOT NULL,
  `matkhau` varchar(100) DEFAULT NULL,
  `hoten` varchar(50) DEFAULT NULL,
  `ngaytao` datetime NOT NULL,
  `ngaysua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`idquanly`, `matkhau`, `hoten`, `ngaytao`, `ngaysua`) VALUES
('admin', '$2y$10$TXjme70uBJU7/u9baF3oV..qLV0HjbQm7q4eo3ibLeWaLdvuXpvkm', 'admin', '2021-04-05 21:01:27', '2021-04-05 21:01:27'),
('huong', '$2y$10$CEYC.MPHofdbjpm268bKSOYCXeMN2XIZabcgw3ze7FCON3u14fak6', 'Phạm Thị Hường', '2021-04-11 17:41:16', '2021-04-11 17:58:16'),
('kien', '$2y$10$j1KofGQU2GXWAYh94rZoDuIX7aq87a.kcbDpylYpubuysDEJOg1HW', 'kien', '2021-04-08 17:24:16', '2021-04-08 17:24:16'),
('kien123', '$2y$10$TaT.4LBjauEg4qeshC4IQe76mGFhj7d.zBk5KqbqjHkWGMHWPWoLK', 'kien1234', '2021-04-05 16:26:09', '2021-04-05 16:04:11'),
('kien123456', '$2y$10$mgI2pPj/jFWxTvOP2DsOau8x48.j1d72vB6FofRnKE3YmZg5WSMc2', 'kien1234', '2021-04-06 04:00:07', '2021-04-06 04:00:07'),
('kien123kkk', '$2y$10$i2InMXHfNZeHGqh2CKtnIObRfS2oDaWYqmsHvAhXxJ3qSjYdvKUhe', 'Lý Văn Lân', '2021-06-07 06:25:56', '2021-06-07 06:25:56'),
('kienkkk', '$2y$10$/K3auYp4FQKoHj1j8cc6k.MC2qLE.X3vtZZgggTMY7wbovPeOdGL2', 'Vũ Đức Kiên', '2021-04-07 14:51:12', '2021-04-08 15:15:23'),
('kienkkk123', '$2y$10$oXWFsWHNtZFCg8oeV/XgqeEiJeoydUC48L1noBJ9zzwkPvSUqR/7u', 'Lý Văn Lân', '2021-06-07 06:10:56', '2021-06-07 06:10:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoikhoabieu`
--

CREATE TABLE `thoikhoabieu` (
  `idtkb` int(11) NOT NULL,
  `thu` int(11) NOT NULL,
  `idlophoc` int(11) NOT NULL,
  `sophong` varchar(10) NOT NULL,
  `tietbatdau` int(11) NOT NULL,
  `tietketthuc` int(11) NOT NULL,
  `idkyhoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thoikhoabieu`
--

INSERT INTO `thoikhoabieu` (`idtkb`, `thu`, `idlophoc`, `sophong`, `tietbatdau`, `tietketthuc`, `idkyhoc`) VALUES
(2, 8, 2, 'A301', 14, 15, 2),
(4, 2, 4, 'A101', 3, 4, 1),
(20, 2, 20, 'A101', 7, 8, 1),
(24, 2, 24, 'A102', 1, 1, 1),
(27, 2, 27, 'A102', 5, 6, 1),
(32, 2, 32, 'A101', 7, 8, 1),
(42, 5, 42, 'A101', 7, 10, 1),
(44, 2, 44, 'A101', 2, 5, 1),
(46, 3, 46, 'A101', 1, 1, 1),
(48, 2, 48, 'A101', 1, 1, 1),
(49, 6, 49, 'A101', 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vang`
--

CREATE TABLE `vang` (
  `id` int(11) NOT NULL,
  `idbuoihoc` int(11) DEFAULT NULL,
  `idsinhvien` varchar(7) DEFAULT NULL,
  `trangthai` int(11) DEFAULT NULL,
  `ngaytao` datetime DEFAULT NULL,
  `ngaysua` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vang`
--

INSERT INTO `vang` (`id`, `idbuoihoc`, `idsinhvien`, `trangthai`, `ngaytao`, `ngaysua`) VALUES
(6, 3, '1700515', 2, '2021-04-15 09:48:11', '2021-04-15 09:48:11'),
(8, 3, '1700557', 2, '2021-04-15 09:48:11', '2021-04-15 09:48:11'),
(19, 1, '2000212', 1, '2021-04-15 09:48:11', '2021-04-15 09:48:11'),
(25, 1, '1700557', 1, '2021-04-15 09:48:11', '2021-04-15 09:48:11'),
(27, 3, '2000123', 2, '2021-04-15 09:48:11', '2021-04-15 09:48:11'),
(29, 2, '2000123', 1, NULL, NULL),
(35, 1463, '1700557', 2, NULL, NULL),
(36, 1454, '1700557', 2, NULL, NULL),
(37, 1497, '1700514', 1, NULL, NULL),
(38, 1497, '2000212', 2, NULL, NULL),
(39, 1497, '1700515', 1, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bomon`
--
ALTER TABLE `bomon`
  ADD PRIMARY KEY (`idbomon`);

--
-- Chỉ mục cho bảng `buoihoc`
--
ALTER TABLE `buoihoc`
  ADD PRIMARY KEY (`idbuoihoc`);

--
-- Chỉ mục cho bảng `dangkyhoc`
--
ALTER TABLE `dangkyhoc`
  ADD PRIMARY KEY (`iddangky`);

--
-- Chỉ mục cho bảng `daythay`
--
ALTER TABLE `daythay`
  ADD PRIMARY KEY (`iddaythay`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`idgiaovien`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`idkhoa`);

--
-- Chỉ mục cho bảng `kyhoc`
--
ALTER TABLE `kyhoc`
  ADD PRIMARY KEY (`idkyhoc`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`idlop`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`idlophoc`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`idmonhoc`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`idsinhvien`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`idquanly`);

--
-- Chỉ mục cho bảng `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  ADD PRIMARY KEY (`idtkb`);

--
-- Chỉ mục cho bảng `vang`
--
ALTER TABLE `vang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bomon`
--
ALTER TABLE `bomon`
  MODIFY `idbomon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `buoihoc`
--
ALTER TABLE `buoihoc`
  MODIFY `idbuoihoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `dangkyhoc`
--
ALTER TABLE `dangkyhoc`
  MODIFY `iddangky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `daythay`
--
ALTER TABLE `daythay`
  MODIFY `iddaythay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `idkhoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `kyhoc`
--
ALTER TABLE `kyhoc`
  MODIFY `idkyhoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `idlop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `idlophoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `idmonhoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  MODIFY `idtkb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `vang`
--
ALTER TABLE `vang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
