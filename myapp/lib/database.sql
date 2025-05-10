-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 09, 2025 lúc 05:23 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `clover_tea`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 1,
  `create_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `email`, `password`, `phone_number`, `is_admin`, `status`, `create_time`) VALUES
(1, 'Hoàng Mạnh Hà', 'hmh@gmail.com', 'zxcvbn', '0345621143', 0, 1, '2025-06-03 17:00:00'),
(2, 'Nguyễn Quốc Cường', 'cuong0712@gmail.com', 'cuongcoder', '0932844370', 0, 1, '2025-04-07 03:11:03'),
(3, 'Trần Nguyễn Thanh Trúc', 'tntt050@gmail.com', 'gnasche.tntt', '0121213349', 0, 1, '2025-04-07 03:11:03'),
(4, 'Trần Đỗ Dáng Thơ', 'therchan@gmail.com', 'jdkljklj', '0121092455', 0, 1, '2025-04-07 03:36:37'),
(5, 'Nguyễn Tiến An', 'Zair0u123@gmail.com', 'Zair0u', '0909992937', 0, 1, '2025-04-07 03:36:37'),
(6, 'Nguyễn Văn A', 'abc@gmail.com', '123', '0453524657', 0, 1, '2025-04-07 03:41:48'),
(7, 'Bùi Minh Quang', 'bmq@gmail.com', 'bmq123', '0902823740', 0, 1, '2025-04-07 05:09:19'),
(8, 'Đoàn Duy Băng', 'ddb@gmail.com', 'ddb123', '0921275680', 0, 1, '2025-04-07 05:46:42'),
(9, 'Nguyễn Văn Hưng', 'hungnv382@gmail.com', 'mkw8z7rt', '0911234567', 0, 1, '2025-04-07 05:48:47'),
(10, 'Trần Thị Mai', 'maitran916@gmail.com', 'abc123qwe', '0923456789', 0, 1, '2025-04-07 05:48:47'),
(11, 'Hoài Linh', 'hoailinh.302@gmail.com', 'zxcv0987', '0934567890', 0, 1, '2025-04-07 05:48:47'),
(12, 'Jack 5C', 'jackvn2024@gmail.com', 'jack12345', '0945678901', 0, 1, '2025-04-07 05:48:47'),
(13, 'Hiền Hồ', 'hienho.drama@gmail.com', 'passhiho21', '0956789012', 0, 1, '2025-04-07 05:48:47'),
(14, 'Ngô Thanh Vân', 'vanngo876@gmail.com', 'ntv_2024pass', '0967890123', 0, 1, '2025-04-07 05:48:47'),
(15, 'Sơn Tùng M-TP', 'mtp.sky999@gmail.com', 'tungmtp_678', '0978901234', 0, 1, '2025-04-07 05:48:47'),
(16, 'Thiều Bảo Trâm', 'tbt1203@gmail.com', 'tram_bao456', '0989012345', 0, 1, '2025-04-07 05:48:47'),
(17, 'Chi Pu', 'chichichi97@gmail.com', 'chipu_pass', '0990123456', 0, 1, '2025-04-07 05:48:47'),
(18, 'Trấn Thành', 'tranthanh.official@gmail.com', 'tthanh888', '0901234567', 0, 1, '2025-04-07 05:48:47'),
(19, 'Đức Phúc', 'phucidol777@gmail.com', 'matngoc123', '0922223333', 0, 1, '2025-04-07 05:49:31'),
(20, 'Vũ Khắc Tiệp', 'vkt_mrshow@gmail.com', 'luxurytime123', '0955151515', 0, 1, '2025-04-07 05:49:31'),
(21, 'K-ICM', 'kicmbeats24@gmail.com', 'icm_drama909', '0911223344', 0, 1, '2025-04-07 05:49:31'),
(22, 'Đông Nhi', 'dongnhi_official@gmail.com', 'dncoolpass', '0967891234', 0, 1, '2025-04-07 05:50:06'),
(23, 'Noo Phước Thịnh', 'noooffical.musician@gmail.com', 'noo1990pass', '0978904321', 0, 1, '2025-04-07 05:50:06'),
(24, 'Lý Hải', 'lyhai.star2024@gmail.com', 'cachnoi_2010', '0931223344', 0, 1, '2025-04-07 05:50:06'),
(25, 'Ngọc Trinh', 'ngoctrinhofficial@gmail.com', 'ngoc_trinh_1991', '0909876543', 0, 1, '2025-04-07 05:50:06'),
(26, 'admin', 'admin', '1', '0922334455', 1, 1, '2025-04-07 05:50:06'),
(27, 'Quang Hà', 'quangha.music@gmail.com', 'quangha_2024', '0912556677', 0, 1, '2025-04-07 05:50:06'),
(28, 'Bảo Thy', 'baothy.official98@gmail.com', 'baothy2024', '0967665443', 0, 1, '2025-04-07 05:50:06'),
(29, 'Hương Giang', 'huonggiangidol@gmail.com', 'hgidol888', '0977889990', 0, 1, '2025-04-07 05:50:06'),
(30, 'Hồ Văn Cường', 'hocu_baobao@gmail.com', 'cuonglv_tinhte', '0960001111', 0, 1, '2025-04-07 05:51:12'),
(31, 'Phi Nhung', 'phinhung.legacy@gmail.com', 'meconlacloi', '0909876583', 0, 1, '2025-04-07 05:51:12'),
(32, 'Thủy Tiên', 'thuytien.charity2024@gmail.com', 'hoasungnuoc', '0939988776', 0, 1, '2025-04-07 05:51:12'),
(33, 'Công Vinh', 'cv9.legend@gmail.com', 'cv9vungoi', '0980002233', 0, 1, '2025-04-07 05:51:12'),
(34, 'Nathan Lee', 'lee_richboy@gmail.com', 'lee_vachmat', '0944888555', 0, 1, '2025-04-07 05:51:12'),
(35, 'Cris Phan', 'crisphan.vlog@gmail.com', 'cris123vlog', '0912444666', 0, 1, '2025-04-07 05:51:12'),
(36, 'Mai Tài Phến', 'maiphenday@gmail.com', 'phen_lovegg', '0933444555', 0, 1, '2025-04-07 05:51:12'),
(37, 'Quỳnh Thư', 'qthu_dienbien@gmail.com', 'thu_ghen123', '0901555777', 0, 1, '2025-04-07 05:51:12'),
(38, 'Hồ Ngọc Hà', 'hohangocha.2024@gmail.com', 'hohohahoho', '0988111222', 0, 1, '2025-04-07 05:51:44'),
(39, 'Cris Devil Gamer', 'crisdevil999@gmail.com', 'devilgame123', '0944556677', 0, 1, '2025-04-07 05:51:44'),
(40, 'Viruss', 'viruss_music_ytb@gmail.com', 'pianodrama2024', '0911778899', 0, 1, '2025-04-07 05:51:44'),
(41, 'MisThy', 'misthy.livestream@gmail.com', 'thymiss666', '0933445566', 0, 1, '2025-04-07 05:51:44'),
(42, 'Xoài Non', 'xoainon.official@gmail.com', 'nonx2024', '0929988776', 0, 1, '2025-04-07 05:51:44'),
(43, 'Xemesis', 'xemesis.richkid@gmail.com', 'xemethongbao', '0903333444', 0, 1, '2025-04-07 05:51:44'),
(44, 'Wowy', 'wowywowywow@gmail.com', 'wowy_rap2024', '0966447888', 0, 1, '2025-04-07 05:51:44'),
(45, 'Binz', 'binzdaogirlz@gmail.com', 'binz4life', '0910011223', 0, 1, '2025-04-07 05:51:44'),
(46, 'Tóc Tiên', 'toctienqueen@gmail.com', 'tientien123', '0959009880', 0, 1, '2025-04-07 05:51:44'),
(47, 'Trịnh Thăng Bình', 'ttb_musicvn@gmail.com', 'thangbinhx2', '0932991001', 0, 1, '2025-04-07 05:51:44'),
(48, 'Karik', 'karik.real@gmail.com', 'karikflow2024', '0988445566', 0, 1, '2025-04-07 05:58:35'),
(49, 'Rhymastic', 'rhymastic.rapper@gmail.com', 'raplife321', '0907888999', 0, 1, '2025-04-07 05:58:35'),
(50, 'Erik', 'erikidol9x@gmail.com', 'erikvoice_89', '0913999444', 0, 1, '2025-04-07 05:58:35'),
(51, 'AMEE', 'amee.cutegirl@gmail.com', 'saogioemkhoc', '0923445566', 0, 1, '2025-04-07 05:58:35'),
(52, 'Bích Phương', 'bichphuong.drama@gmail.com', 'bpquayxe', '0966112233', 0, 1, '2025-04-07 05:58:35'),
(53, 'Min', 'min.musicvn@gmail.com', 'vutrongmin123', '0977334455', 0, 1, '2025-04-07 05:58:35'),
(54, 'JustaTee', 'justa.tee88@gmail.com', 'tee_ttl999', '0955443322', 0, 1, '2025-04-07 05:58:35'),
(55, 'Touliver', 'touliver.boss@gmail.com', 'spaceboiz', '0933111222', 0, 1, '2025-04-07 05:58:35'),
(56, 'Suboi', 'suboi.queen@gmail.com', 'suboixrap', '0919888777', 0, 1, '2025-04-07 05:58:35'),
(57, 'Kay Trần', 'kaytran.dancer@gmail.com', 'kay4real123', '0944992233', 0, 1, '2025-04-07 05:58:35'),
(58, 'MONO', 'mono.dripboy@gmail.com', 'emlaai123', '0911002200', 0, 1, '2025-04-07 05:58:35'),
(59, 'HIEUTHUHAI', 'hieuthu2.flow@gmail.com', 'bocute2024', '0922113344', 0, 1, '2025-04-07 05:58:35'),
(60, 'Tăng Duy Tân', 'tdt.chill@gmail.com', 'ngaykhongem', '0933004455', 0, 1, '2025-04-07 05:58:35'),
(61, 'Hồ Quang Hiếu', 'hiquanghieu.music@gmail.com', 'conbuonvohinh', '0944115566', 0, 1, '2025-04-07 05:58:35'),
(62, 'Lâm Khánh Chi', 'lamkhanhchi.princess@gmail.com', 'chi_la_congchua', '0955226677', 0, 1, '2025-04-07 05:58:35'),
(63, 'Angela Phương Trinh', 'phuongtrinhidol@gmail.com', 'trinhthanhthan', '0966337788', 0, 1, '2025-04-07 05:58:35'),
(64, 'BB Trần', 'bbtran.funboy@gmail.com', 'bbtranchill', '0977448899', 0, 1, '2025-04-07 05:58:35'),
(65, 'Hải Tú', 'haitu.skyentertain@gmail.com', 'cogaikhongcamxuc', '0988559900', 0, 1, '2025-04-07 05:58:35'),
(66, 'Đen Vâu', 'denvau.rapper@gmail.com', 'den_den_em_em', '0999660011', 0, 1, '2025-04-07 05:58:35'),
(67, 'PewPew', 'pewpew.stream@gmail.com', 'banhmimy999', '0900778899', 0, 1, '2025-04-07 05:58:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `account_id` int(11) NOT NULL,
  `street` varchar(45) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
  `district` varchar(45) DEFAULT NULL,
  `ward` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`account_id`, `street`, `province`, `district`, `ward`) VALUES
(1, 'F19/5D', 'Cần Thơ', 'Cà Ram', 'Bung Chen'),
(2, '21 Phan Huy Ích', 'TP.HCM', 'Tân Phú', 'Đồng Xoài'),
(3, '19 Đồng Khởi', 'TP.HCM', 'Hoóc Môn', 'Bảo Kim'),
(4, '22 Hữu Trần', 'Cần Thơ', 'Tuấn Quốc', 'Quốc Tuấn'),
(5, '20 Nguyễn Thị Tú', 'TP.HCM', 'Bình Chánh', 'Đỉnh Ngọc'),
(6, '24 Đường Lý Tự Trọng', 'Hà Nội', 'Hoàn Kiếm', 'Phan Chu Trinh'),
(7, '10 Đường Đinh Tiên Hoàng', 'TP.HCM', 'Quận 1', 'Bến Nghé'),
(8, '45 Đường Nguyễn Văn Cừ', 'Quảng Ninh', 'Hạ Long', 'Bãi Cháy'),
(9, '88 Đường Trần Hưng Đạo', 'Hà Nội', 'Ba Đình', 'Cống Vị'),
(10, '13 Đường Nguyễn Huệ', 'Đà Nẵng', 'Sơn Trà', 'Mỹ An'),
(11, '25 Đường Trần Phú', 'Bình Dương', 'Thủ Dầu Một', 'Phú Hòa'),
(12, '17 Đường Nguyễn Du', 'Hà Nội', 'Hoàng Mai', 'Định Công'),
(13, '39 Đường Bà Triệu', 'TP.HCM', 'Quận 5', 'Phú Thọ'),
(14, '3 Đường Lê Lợi', 'Cần Thơ', 'Ninh Kiều', 'An Phú'),
(15, '50 Đường Tôn Thất Tùng', 'TP.HCM', 'Quận 3', 'Trung Sơn'),
(16, '12 Đường Nguyễn Chí Thanh', 'Hà Nội', 'Đống Đa', 'Khâm Thiên'),
(17, '8 Đường Lê Thánh Tôn', 'TP.HCM', 'Quận 1', 'Bến Thành'),
(18, '14 Đường Nguyễn Ái Quốc', 'Bắc Giang', 'TP Bắc Giang', 'Hoàng Hoa Thám'),
(19, '28 Đường Trường Chinh', 'Hải Phòng', 'Lê Chân', 'Quán Toan'),
(20, '32 Đường Phan Đình Phùng', 'TP.HCM', 'Quận 10', 'Hòa Hưng'),
(21, '41 Đường Cao Thắng', 'Bắc Ninh', 'TP Bắc Ninh', 'Suối Hoa'),
(22, '6 Đường Phan Văn Trị', 'Hà Nội', 'Cầu Giấy', 'Dịch Vọng Hậu'),
(23, '9 Đường Lê Văn Lương', 'Thái Bình', 'TP Thái Bình', 'Trần Lãm'),
(24, '18 Đường Nguyễn Trãi', 'TP.HCM', 'Quận 10', 'Hòa Thạnh'),
(25, '29 Đường Nguyễn Thị Minh Khai', 'Vĩnh Long', 'TP Vĩnh Long', 'Tân Hội'),
(26, '37 Đường Hoàng Diệu', 'TP.HCM', 'Quận 4', 'Tân Thuận Đông'),
(27, '42 Đường Bến Vân Đồn', 'Nghệ An', 'TP Vinh', 'Hưng Bình'),
(28, '16 Đường Tây Sơn', 'Bến Tre', 'TP Bến Tre', 'Phú Tân'),
(29, '26 Đường Nguyễn Tất Thành', 'Thừa Thiên Huế', 'TP Huế', 'Phú Nhuận'),
(30, '11 Đường Ngô Quyền', 'Hà Nội', 'Long Biên', 'Cự Lộc'),
(31, '5 Đường Cầu Giấy', 'Quảng Ngãi', 'TP Quảng Ngãi', 'Trần Quang Diệu'),
(32, '21 Đường Võ Văn Kiệt', 'TP.HCM', 'Quận 5', 'Phú Thọ Hòa'),
(33, '60 Đường Lê Thị Hồng Gấm', 'Hải Dương', 'TP Hải Dương', 'Ngọc Lâm'),
(34, '35 Đường Xuân Thủy', 'TP.HCM', 'Quận 6', 'Vĩnh Lộc A'),
(35, '50 Đường Lê Lai', 'Vĩnh Phúc', 'TP Vĩnh Yên', 'Hội Hợp'),
(36, '10 Đường Lê Lợi', 'Hà Nội', 'Quận Thanh Xuân', 'Hạ Đình'),
(37, '12 Đường Nguyễn Trãi', 'Đà Nẵng', 'Quận Hải Châu', 'Thuận Phước'),
(38, '22 Đường Phan Đình Phùng', 'Bắc Giang', 'TP Bắc Giang', 'Hoàng Văn Thụ'),
(39, '35 Đường Trần Quang Khải', 'Quảng Bình', 'TP Đồng Hới', 'Nam Lý'),
(40, '14 Đường Nguyễn Du', 'Hà Nội', 'Quận Hoàn Kiếm', 'Hàng Bông'),
(41, '16 Đường Lý Thái Tổ', 'Hồ Chí Minh', 'Quận 4', 'Tân Thuận Tây'),
(42, '8 Đường Ngô Quyền', 'Hải Phòng', 'Quận Lê Chân', 'Vĩnh Niệm'),
(43, '45 Đường Nguyễn Thị Minh Khai', 'Quảng Nam', 'TP Tam Kỳ', 'Tân An'),
(44, '18 Đường Đoàn Kết', 'Hải Dương', 'TP Hải Dương', 'Nguyễn Trãi'),
(45, '6 Đường Ngọc Lâm', 'Bắc Ninh', 'TP Bắc Ninh', 'Đáp Cầu'),
(46, '21 Đường Lê Hồng Phong', 'Quảng Ngãi', 'TP Quảng Ngãi', 'Trung Hòa'),
(47, '9 Đường Nguyễn Tri Phương', 'TP.HCM', 'Quận 10', 'Hòa Thạnh'),
(48, '50 Đường Mạc Thị Bưởi', 'Bà Rịa - Vũng Tàu', 'TP Vũng Tàu', 'Thắng Tam'),
(49, '11 Đường Nguyễn Thị Minh Khai', 'Cần Thơ', 'Ninh Kiều', 'Cái Khế'),
(50, '23 Đường Bà Triệu', 'Hà Nội', 'Quận Hai Bà Trưng', 'Bạch Mai'),
(51, '15 Đường Nguyễn Du', 'Thanh Hóa', 'TP Thanh Hóa', 'Đông Hương'),
(52, '34 Đường Nguyễn Văn Cừ', 'Tiền Giang', 'TP Mỹ Tho', 'Tân Mỹ'),
(53, '27 Đường Lý Tự Trọng', 'Vĩnh Long', 'TP Vĩnh Long', 'Tân Hòa'),
(54, '50 Đường Hoàng Diệu', 'Hà Nội', 'Quận Ba Đình', 'Đội Cấn'),
(55, '8 Đường Trần Thị Bính', 'Nghệ An', 'TP Vinh', 'Quán Bàu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Coffee'),
(3, 'Trà'),
(1, 'Trà sữa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `order_date` timestamp NULL DEFAULT current_timestamp(),
  `province` varchar(45) NOT NULL,
  `district` varchar(45) NOT NULL,
  `ward` varchar(45) NOT NULL,
  `street` varchar(45) NOT NULL,
  `shipping_fee` decimal(10,2) UNSIGNED DEFAULT 0.00,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `payment_method_id`, `status_id`, `total_price`, `order_date`, `province`, `district`, `ward`, `street`, `shipping_fee`, `account_id`) VALUES
(1, 1, 1, 277000, '2025-04-07 12:59:40', 'TP.HCM', 'Quận 10', 'Phường 9', '213/4 Lí Thái Tổ', '50000.00', 1),
(2, 1, 1, 430000, '2025-04-07 13:03:32', 'TP.HCM', 'Quận 4', 'Phường 4', '210/4 Lý Thường Kiệt', '15000.00', 2),
(3, 1, 1, 1000000, '2025-04-07 13:07:04', 'TP.HCM', 'Quận 2', 'Phường 6', '27 Hai Bà Trưng', '25000.00', 3),
(4, 1, 1, 1234000, '2025-04-07 13:07:04', 'TP.HCM', 'Quận 5', 'Phường 14', '19 An Dương Vương', '55000.00', 4),
(5, 1, 1, 600000, '2025-04-07 13:07:04', 'TP.HCM', 'Quận 6', 'Phường 1', '19 Alibaba', '25000.00', 5),
(6, 1, 1, 345000, '2025-04-07 13:08:27', 'TP.HCM', 'Quận 9', 'Phường 9', '235 Kilibbi', '12000.00', 6),
(7, 4, 1, 278000, '2025-04-07 13:17:33', 'TP Cần Thơ', 'Ninh Kiều', 'An Phú', '3 Đường Lê Lợi', '15000.00', 7),
(8, 1, 2, 189000, '2025-04-07 13:17:33', 'TP.HCM', 'Quận 1', 'Bến Nghé', '10 Đường Đinh Tiên Hoàng', '12000.00', 8),
(9, 3, 3, 450000, '2025-04-07 13:17:33', 'Quảng Ninh', 'Hạ Long', 'Bãi Cháy', '45 Đường Nguyễn Văn Cừ', '18000.00', 9),
(10, 2, 1, 327000, '2025-04-07 13:17:33', 'Hà Nội', 'Ba Đình', 'Cống Vị', '88 Đường Trần Hưng Đạo', '10000.00', 10),
(11, 1, 4, 300000, '2025-04-07 13:17:33', 'Đà Nẵng', 'Sơn Trà', 'Mỹ An', '13 Đường Nguyễn Huệ', '14000.00', 11),
(12, 4, 2, 520000, '2025-04-07 13:17:33', 'Bình Dương', 'Thủ Dầu Một', 'Phú Hòa', '25 Đường Trần Phú', '17000.00', 12),
(13, 3, 1, 412000, '2025-04-07 13:17:33', 'Hà Nội', 'Hoàng Mai', 'Định Công', '17 Đường Nguyễn Du', '13000.00', 13),
(14, 1, 3, 245000, '2025-04-07 13:17:33', 'TP.HCM', 'Quận 5', 'Phú Thọ', '39 Đường Bà Triệu', '16000.00', 14),
(15, 2, 1, 398000, '2025-04-07 13:17:33', 'TP Cần Thơ', 'Ninh Kiều', 'An Phú', '3 Đường Lê Lợi', '15000.00', 15),
(16, 4, 4, 220000, '2025-04-07 13:17:33', 'TP.HCM', 'Quận 3', 'Trung Sơn', '50 Đường Tôn Thất Tùng', '11000.00', 16),
(17, 3, 2, 360000, '2025-04-07 13:17:33', 'Hà Nội', 'Đống Đa', 'Khâm Thiên', '12 Đường Nguyễn Chí Thanh', '12500.00', 17),
(18, 1, 1, 405000, '2025-04-07 13:17:33', 'TP.HCM', 'Quận 1', 'Bến Thành', '8 Đường Lê Thánh Tôn', '10000.00', 18),
(19, 4, 1, 342000, '2025-04-07 13:17:33', 'Bắc Giang', 'TP Bắc Giang', 'Hoàng Hoa Thám', '14 Đường Nguyễn Ái Quốc', '13500.00', 19),
(20, 2, 2, 298000, '2025-04-07 13:17:33', 'Hải Phòng', 'Lê Chân', 'Quán Toan', '28 Đường Trường Chinh', '15000.00', 20),
(21, 1, 1, 399000, '2025-04-07 13:17:33', 'TP.HCM', 'Quận 10', 'Hòa Hưng', '32 Đường Phan Đình Phùng', '16000.00', 21),
(22, 3, 4, 476000, '2025-04-07 13:17:33', 'Bắc Ninh', 'TP Bắc Ninh', 'Suối Hoa', '41 Đường Cao Thắng', '14500.00', 22),
(23, 4, 3, 218000, '2025-04-07 13:17:33', 'Hà Nội', 'Cầu Giấy', 'Dịch Vọng Hậu', '6 Đường Phan Văn Trị', '12500.00', 23),
(24, 1, 2, 510000, '2025-04-07 13:17:33', 'Thái Bình', 'TP Thái Bình', 'Trần Lãm', '9 Đường Lê Văn Lương', '17000.00', 24),
(25, 2, 1, 351000, '2025-04-07 13:17:33', 'TP.HCM', 'Quận 10', 'Hòa Thạnh', '18 Đường Nguyễn Trãi', '15000.00', 25),
(26, 3, 3, 275000, '2025-04-07 13:17:33', 'Vĩnh Long', 'TP Vĩnh Long', 'Tân Hội', '29 Đường Nguyễn Thị Minh Khai', '12000.00', 26),
(27, 2, 1, 289000, '2025-04-07 13:19:11', 'TP.HCM', 'Quận 9', 'Phường 9', '235 Kilibbi', '12000.00', 1),
(28, 1, 2, 455000, '2025-04-07 13:19:11', 'Hà Nội', 'Ba Đình', 'Liễu Giai', '123 Đội Cấn', '15000.00', 1),
(29, 4, 3, 382000, '2025-04-07 13:19:11', 'Đà Nẵng', 'Hải Châu', 'Hòa Cường Bắc', '98 Nguyễn Hữu Thọ', '10000.00', 1),
(30, 3, 4, 197000, '2025-04-07 13:19:11', 'Bắc Giang', 'TP Bắc Giang', 'Dĩnh Kế', '17 Lê Lợi', '13000.00', 1),
(31, 1, 1, 523000, '2025-04-07 13:19:11', 'TP.HCM', 'Quận 1', 'Bến Nghé', '88 Nguyễn Huệ', '14000.00', 1),
(32, 4, 1, 340000, '2025-04-07 13:19:19', 'Hải Phòng', 'Ngô Quyền', 'Máy Tơ', '45 Trần Phú', '12000.00', 3),
(33, 3, 2, 289000, '2025-04-07 13:19:19', 'Nghệ An', 'TP Vinh', 'Hưng Dũng', '22 Nguyễn Trãi', '13000.00', 3),
(34, 1, 3, 417000, '2025-04-07 13:19:19', 'Thái Bình', 'TP Thái Bình', 'Phú Xuân', '11 Trần Thái Tông', '11000.00', 3),
(35, 2, 1, 369000, '2025-04-07 13:19:19', 'TP.HCM', 'Quận 3', 'Phường 4', '73 Võ Thị Sáu', '10000.00', 3),
(36, 4, 2, 510000, '2025-04-07 13:19:25', 'Quảng Ninh', 'Hạ Long', 'Bãi Cháy', '78 Hạ Long', '17000.00', 4),
(37, 1, 1, 230000, '2025-04-07 13:19:25', 'Đắk Lắk', 'Buôn Ma Thuột', 'Tân Lợi', '55 Lê Duẩn', '10000.00', 4),
(38, 3, 4, 475000, '2025-04-07 13:19:25', 'TP.HCM', 'Bình Thạnh', 'Phường 25', '12 Nguyễn Hữu Cảnh', '15000.00', 4),
(39, 2, 3, 298000, '2025-04-07 13:19:25', 'Vĩnh Phúc', 'TP Vĩnh Yên', 'Đồng Tâm', '19 Trần Quốc Toản', '13000.00', 4),
(40, 1, 1, 360000, '2025-04-07 13:19:25', 'Bến Tre', 'TP Bến Tre', 'Phú Tân', '26 Nguyễn Trung Trực', '11000.00', 4),
(41, 3, 1, 419000, '2025-04-07 13:19:25', 'Hà Nội', 'Hoàng Mai', 'Giáp Bát', '67 Giải Phóng', '14000.00', 4),
(42, 4, 2, 301000, '2025-04-07 13:19:25', 'TP.HCM', 'Quận 7', 'Tân Phong', '38 Nguyễn Văn Linh', '12000.00', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `size_id`, `quantity`, `subtotal`) VALUES
(1, 1, 1, 2, 118000),
(1, 2, 1, 1, 109000),
(2, 1, 1, 1, 59000),
(2, 2, 1, 2, 218000),
(2, 3, 1, 3, 177000),
(3, 1, 1, 5, 295000),
(3, 2, 2, 5, 600000),
(3, 8, 2, 1, 45000),
(3, 10, 2, 1, 59000),
(4, 1, 2, 2, 118000),
(4, 2, 1, 1, 109000),
(4, 2, 2, 1, 120000),
(4, 3, 1, 1, 59000),
(4, 3, 2, 1, 64000),
(4, 4, 1, 2, 124000),
(4, 5, 1, 1, 79000),
(4, 5, 2, 1, 89000),
(4, 6, 1, 2, 158000),
(4, 6, 2, 1, 92000),
(4, 7, 1, 2, 138000),
(4, 7, 2, 1, 79000),
(4, 8, 1, 1, 39000),
(4, 8, 2, 2, 90000),
(5, 1, 2, 1, 64000),
(5, 2, 1, 1, 109000),
(5, 4, 1, 1, 62000),
(5, 5, 2, 1, 89000),
(5, 6, 2, 1, 92000),
(5, 7, 1, 1, 69000),
(5, 8, 2, 1, 45000),
(6, 8, 2, 1, 45000),
(6, 9, 2, 1, 79000),
(6, 10, 2, 1, 49000),
(6, 11, 2, 1, 70000),
(6, 16, 2, 1, 62000),
(6, 17, 1, 1, 69000),
(7, 8, 2, 1, 45000),
(7, 10, 1, 1, 49000),
(7, 14, 1, 1, 69000),
(7, 16, 2, 1, 62000),
(7, 18, 1, 1, 53000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail_topping`
--

CREATE TABLE `order_detail_topping` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `topping_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail_topping`
--

INSERT INTO `order_detail_topping` (`order_id`, `product_id`, `size_id`, `topping_id`) VALUES
(1, 1, 1, 1),
(1, 1, 1, 5),
(1, 1, 1, 7),
(1, 2, 1, 1),
(1, 2, 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(3, 'Chưa xác nhận'),
(1, 'Đã giao'),
(4, 'Đã hủy'),
(2, 'Đã xác nhận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`) VALUES
(1, 'Tiền mặt'),
(4, 'Ví MoMo'),
(2, 'Ví ShopeePay'),
(3, 'Ví ZaloPay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cost_default` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `img_url` varchar(2083) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `cost_default`, `description`, `is_active`, `upload_time`, `img_url`, `category_id`) VALUES
(1, 'Trà sữa Clover Tea	', 59000, '', 1, '2025-02-21 17:00:00', NULL, 1),
(2, 'Mỹ Nhân Thanh Trà', 109000, NULL, 1, '2025-02-21 17:00:00', NULL, 3),
(3, 'Americano', 59000, '', 1, '2025-02-21 17:00:00', NULL, 2),
(4, 'Espresso', 49000, '', 1, '2025-02-21 17:00:00', NULL, 2),
(5, 'Trà Nhãn Hoa Mộc Lê', 79000, NULL, 1, '2025-02-21 17:00:00', NULL, 3),
(6, 'Trà sữa Bá Tước', 79000, NULL, 1, '2025-02-21 17:00:00', NULL, 1),
(7, 'Trà sữa Olong Quế Hoa', 69000, NULL, 1, '2025-02-21 17:00:00', NULL, 1),
(8, 'Hồng trà sữa', 39000, NULL, 1, '2025-02-21 17:00:00', NULL, 1),
(9, 'Trà sữa Vân Nam', 69000, NULL, 1, '2025-02-21 17:00:00', NULL, 1),
(10, 'Trà sữa Trân Châu Hoàng Kim', 49000, NULL, 1, '2025-02-21 17:00:00', NULL, 1),
(11, 'Clover Trà Xanh', 59000, NULL, 1, '2025-02-21 17:00:00', NULL, 3),
(12, 'Olong Đào Tiên', 49000, NULL, 1, '2025-02-21 17:00:00', NULL, 3),
(13, 'Hồng Long Pha Lê Tuyết', 49000, NULL, 1, '2025-02-21 17:00:00', NULL, 3),
(14, 'Bách Thảo Trà Mộc', 69000, NULL, 1, '2025-02-21 17:00:00', NULL, 3),
(15, 'Cappuchino', 59000, NULL, 1, '2025-02-21 17:00:00', NULL, 2),
(16, 'Latte', 49000, NULL, 1, '2025-02-21 17:00:00', NULL, 2),
(17, 'Macchiato', 69000, NULL, 1, '2025-02-21 17:00:00', NULL, 2),
(18, 'Cold Brew', 49000, NULL, 1, '2025-02-21 17:00:00', NULL, 2),
(31, 'a cc', 2, 'C rat ngan', 1, '2025-05-09 01:59:48', '/web_bantrasua/myapp/public/assets/img/product_681d6dde1e2104.86079709.jpg', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_size`
--

CREATE TABLE `product_size` (
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_size`
--

INSERT INTO `product_size` (`product_id`, `size_id`, `cost`) VALUES
(1, 1, 59000),
(1, 2, 64000),
(2, 1, 109000),
(2, 2, 120000),
(3, 1, 59000),
(3, 2, 64000),
(4, 1, 49000),
(4, 2, 62000),
(5, 1, 79000),
(5, 2, 89000),
(6, 1, 79000),
(6, 2, 92000),
(7, 1, 69000),
(7, 2, 79000),
(8, 1, 39000),
(8, 2, 45000),
(9, 1, 69000),
(9, 2, 79000),
(10, 1, 49000),
(10, 2, 59000),
(11, 1, 59000),
(11, 2, 70000),
(12, 1, 49000),
(12, 2, 59000),
(13, 1, 49000),
(13, 2, 59000),
(14, 1, 69000),
(14, 2, 75000),
(15, 1, 59000),
(15, 2, 70000),
(16, 1, 49000),
(16, 2, 62000),
(17, 1, 69000),
(17, 2, 85000),
(18, 1, 49000),
(18, 2, 62000),
(31, 1, 6),
(31, 2, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `name`) VALUES
(2, 'L'),
(1, 'M');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topping`
--

CREATE TABLE `topping` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `topping`
--

INSERT INTO `topping` (`id`, `name`, `cost`) VALUES
(1, 'Đá ít', 0),
(2, 'Đá vừa', 0),
(3, 'Đá nhiều', 0),
(4, 'Ngọt ít', 0),
(5, 'Ngọt vừa', 0),
(6, 'Ngọt nhiều', 0),
(7, 'Chân Nguyên Đan', 3000),
(8, 'Hạt thủy tinh củ năng', 5000),
(9, 'Chân châu đơn', 7000),
(10, 'Kem cheese khứ hồi', 10000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `number_UNIQUE` (`phone_number`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`account_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_order_account1_idx` (`account_id`),
  ADD KEY `fk_order_status` (`status_id`),
  ADD KEY `fk_order_payment` (`payment_method_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`,`size_id`),
  ADD KEY `fk_order_details_product_size1_idx1` (`product_id`,`size_id`);

--
-- Chỉ mục cho bảng `order_detail_topping`
--
ALTER TABLE `order_detail_topping`
  ADD PRIMARY KEY (`order_id`,`product_id`,`size_id`,`topping_id`),
  ADD KEY `topping_id` (`topping_id`);

--
-- Chỉ mục cho bảng `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD KEY `fk_product_category` (`category_id`);

--
-- Chỉ mục cho bảng `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`product_id`,`size_id`),
  ADD KEY `fk_product_size_product1_idx` (`product_id`),
  ADD KEY `fk_product_size_size1` (`size_id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_address_account1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_account1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `fk_order_payment` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`),
  ADD CONSTRAINT `fk_order_status` FOREIGN KEY (`status_id`) REFERENCES `order_status` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_details_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `fk_order_details_product_size1` FOREIGN KEY (`product_id`,`size_id`) REFERENCES `product_size` (`product_id`, `size_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `order_detail_topping`
--
ALTER TABLE `order_detail_topping`
  ADD CONSTRAINT `order_detail_topping_ibfk_1` FOREIGN KEY (`order_id`,`product_id`,`size_id`) REFERENCES `order_details` (`order_id`, `product_id`, `size_id`),
  ADD CONSTRAINT `order_detail_topping_ibfk_2` FOREIGN KEY (`topping_id`) REFERENCES `topping` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `fk_product_size_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_product_size_size1` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
