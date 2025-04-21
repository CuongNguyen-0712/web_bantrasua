-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: clover_tea
-- ------------------------------------------------------
-- Server version	9.1.0
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!50503 SET NAMES utf8 */
;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */
;
/*!40103 SET TIME_ZONE='+00:00' */
;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;
--
-- Table structure for table `account`
--
DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `account` (
    `id` int NOT NULL AUTO_INCREMENT,
    `username` varchar(50) DEFAULT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(32) NOT NULL,
    `phone_number` varchar(10) DEFAULT NULL,
    `is_admin` tinyint(1) DEFAULT '0',
    `status` tinyint(1) DEFAULT '1',
    `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `id_UNIQUE` (`id`),
    UNIQUE KEY `email_UNIQUE` (`email`),
    UNIQUE KEY `number_UNIQUE` (`phone_number`),
    UNIQUE KEY `username_UNIQUE` (`username`)
    /*!80000 INVISIBLE */
) ENGINE = InnoDB AUTO_INCREMENT = 68 DEFAULT CHARSET = utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `account`
--
LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */
;
INSERT INTO `account`
VALUES (
        1,
        'Hoàng Mạnh Hà',
        'hmh@gmail.com',
        'zxcvbn',
        '0345621143',
        0,
        1,
        '2025-06-03 17:00:00'
    ),
    (
        2,
        'Nguyễn Quốc Cường',
        'cuong0712@gmail.com',
        'cuongcoder',
        '0932844370',
        0,
        1,
        '2025-04-07 03:11:03'
    ),
    (
        3,
        'Trần Nguyễn Thanh Trúc',
        'tntt050@gmail.com',
        'gnasche.tntt',
        '0121213349',
        0,
        1,
        '2025-04-07 03:11:03'
    ),
    (
        4,
        'Trần Đỗ Dáng Thơ',
        'therchan@gmail.com',
        'jdkljklj',
        '0121092455',
        0,
        1,
        '2025-04-07 03:36:37'
    ),
    (
        5,
        'Nguyễn Tiến An',
        'Zair0u123@gmail.com',
        'Zair0u',
        '0909992937',
        0,
        1,
        '2025-04-07 03:36:37'
    ),
    (
        6,
        'Nguyễn Văn A',
        'abc@gmail.com',
        '123',
        '0453524657',
        0,
        1,
        '2025-04-07 03:41:48'
    ),
    (
        7,
        'Bùi Minh Quang',
        'bmq@gmail.com',
        'bmq123',
        '0902823740',
        0,
        1,
        '2025-04-07 05:09:19'
    ),
    (
        8,
        'Đoàn Duy Băng',
        'ddb@gmail.com',
        'ddb123',
        '0921275680',
        0,
        1,
        '2025-04-07 05:46:42'
    ),
    (
        9,
        'Nguyễn Văn Hưng',
        'hungnv382@gmail.com',
        'mkw8z7rt',
        '0911234567',
        0,
        1,
        '2025-04-07 05:48:47'
    ),
    (
        10,
        'Trần Thị Mai',
        'maitran916@gmail.com',
        'abc123qwe',
        '0923456789',
        0,
        1,
        '2025-04-07 05:48:47'
    ),
    (
        11,
        'Hoài Linh',
        'hoailinh.302@gmail.com',
        'zxcv0987',
        '0934567890',
        0,
        1,
        '2025-04-07 05:48:47'
    ),
    (
        12,
        'Jack 5C',
        'jackvn2024@gmail.com',
        'jack12345',
        '0945678901',
        0,
        1,
        '2025-04-07 05:48:47'
    ),
    (
        13,
        'Hiền Hồ',
        'hienho.drama@gmail.com',
        'passhiho21',
        '0956789012',
        0,
        1,
        '2025-04-07 05:48:47'
    ),
    (
        14,
        'Ngô Thanh Vân',
        'vanngo876@gmail.com',
        'ntv_2024pass',
        '0967890123',
        0,
        1,
        '2025-04-07 05:48:47'
    ),
    (
        15,
        'Sơn Tùng M-TP',
        'mtp.sky999@gmail.com',
        'tungmtp_678',
        '0978901234',
        0,
        1,
        '2025-04-07 05:48:47'
    ),
    (
        16,
        'Thiều Bảo Trâm',
        'tbt1203@gmail.com',
        'tram_bao456',
        '0989012345',
        0,
        1,
        '2025-04-07 05:48:47'
    ),
    (
        17,
        'Chi Pu',
        'chichichi97@gmail.com',
        'chipu_pass',
        '0990123456',
        0,
        1,
        '2025-04-07 05:48:47'
    ),
    (
        18,
        'Trấn Thành',
        'tranthanh.official@gmail.com',
        'tthanh888',
        '0901234567',
        0,
        1,
        '2025-04-07 05:48:47'
    ),
    (
        19,
        'Đức Phúc',
        'phucidol777@gmail.com',
        'matngoc123',
        '0922223333',
        0,
        1,
        '2025-04-07 05:49:31'
    ),
    (
        20,
        'Vũ Khắc Tiệp',
        'vkt_mrshow@gmail.com',
        'luxurytime123',
        '0955151515',
        0,
        1,
        '2025-04-07 05:49:31'
    ),
    (
        21,
        'K-ICM',
        'kicmbeats24@gmail.com',
        'icm_drama909',
        '0911223344',
        0,
        1,
        '2025-04-07 05:49:31'
    ),
    (
        22,
        'Đông Nhi',
        'dongnhi_official@gmail.com',
        'dncoolpass',
        '0967891234',
        0,
        1,
        '2025-04-07 05:50:06'
    ),
    (
        23,
        'Noo Phước Thịnh',
        'noooffical.musician@gmail.com',
        'noo1990pass',
        '0978904321',
        0,
        1,
        '2025-04-07 05:50:06'
    ),
    (
        24,
        'Lý Hải',
        'lyhai.star2024@gmail.com',
        'cachnoi_2010',
        '0931223344',
        0,
        1,
        '2025-04-07 05:50:06'
    ),
    (
        25,
        'Ngọc Trinh',
        'ngoctrinhofficial@gmail.com',
        'ngoc_trinh_1991',
        '0909876543',
        0,
        1,
        '2025-04-07 05:50:06'
    ),
    (
        26,
        'Ngô Kiến Huy',
        'ngokhuy1992@gmail.com',
        'lacasinhxao',
        '0922334455',
        0,
        1,
        '2025-04-07 05:50:06'
    ),
    (
        27,
        'Quang Hà',
        'quangha.music@gmail.com',
        'quangha_2024',
        '0912556677',
        0,
        1,
        '2025-04-07 05:50:06'
    ),
    (
        28,
        'Bảo Thy',
        'baothy.official98@gmail.com',
        'baothy2024',
        '0967665443',
        0,
        1,
        '2025-04-07 05:50:06'
    ),
    (
        29,
        'Hương Giang',
        'huonggiangidol@gmail.com',
        'hgidol888',
        '0977889990',
        0,
        1,
        '2025-04-07 05:50:06'
    ),
    (
        30,
        'Hồ Văn Cường',
        'hocu_baobao@gmail.com',
        'cuonglv_tinhte',
        '0960001111',
        0,
        1,
        '2025-04-07 05:51:12'
    ),
    (
        31,
        'Phi Nhung',
        'phinhung.legacy@gmail.com',
        'meconlacloi',
        '0909876583',
        0,
        1,
        '2025-04-07 05:51:12'
    ),
    (
        32,
        'Thủy Tiên',
        'thuytien.charity2024@gmail.com',
        'hoasungnuoc',
        '0939988776',
        0,
        1,
        '2025-04-07 05:51:12'
    ),
    (
        33,
        'Công Vinh',
        'cv9.legend@gmail.com',
        'cv9vungoi',
        '0980002233',
        0,
        1,
        '2025-04-07 05:51:12'
    ),
    (
        34,
        'Nathan Lee',
        'lee_richboy@gmail.com',
        'lee_vachmat',
        '0944888555',
        0,
        1,
        '2025-04-07 05:51:12'
    ),
    (
        35,
        'Cris Phan',
        'crisphan.vlog@gmail.com',
        'cris123vlog',
        '0912444666',
        0,
        1,
        '2025-04-07 05:51:12'
    ),
    (
        36,
        'Mai Tài Phến',
        'maiphenday@gmail.com',
        'phen_lovegg',
        '0933444555',
        0,
        1,
        '2025-04-07 05:51:12'
    ),
    (
        37,
        'Quỳnh Thư',
        'qthu_dienbien@gmail.com',
        'thu_ghen123',
        '0901555777',
        0,
        1,
        '2025-04-07 05:51:12'
    ),
    (
        38,
        'Hồ Ngọc Hà',
        'hohangocha.2024@gmail.com',
        'hohohahoho',
        '0988111222',
        0,
        1,
        '2025-04-07 05:51:44'
    ),
    (
        39,
        'Cris Devil Gamer',
        'crisdevil999@gmail.com',
        'devilgame123',
        '0944556677',
        0,
        1,
        '2025-04-07 05:51:44'
    ),
    (
        40,
        'Viruss',
        'viruss_music_ytb@gmail.com',
        'pianodrama2024',
        '0911778899',
        0,
        1,
        '2025-04-07 05:51:44'
    ),
    (
        41,
        'MisThy',
        'misthy.livestream@gmail.com',
        'thymiss666',
        '0933445566',
        0,
        1,
        '2025-04-07 05:51:44'
    ),
    (
        42,
        'Xoài Non',
        'xoainon.official@gmail.com',
        'nonx2024',
        '0929988776',
        0,
        1,
        '2025-04-07 05:51:44'
    ),
    (
        43,
        'Xemesis',
        'xemesis.richkid@gmail.com',
        'xemethongbao',
        '0903333444',
        0,
        1,
        '2025-04-07 05:51:44'
    ),
    (
        44,
        'Wowy',
        'wowywowywow@gmail.com',
        'wowy_rap2024',
        '0966447888',
        0,
        1,
        '2025-04-07 05:51:44'
    ),
    (
        45,
        'Binz',
        'binzdaogirlz@gmail.com',
        'binz4life',
        '0910011223',
        0,
        1,
        '2025-04-07 05:51:44'
    ),
    (
        46,
        'Tóc Tiên',
        'toctienqueen@gmail.com',
        'tientien123',
        '0959009880',
        0,
        1,
        '2025-04-07 05:51:44'
    ),
    (
        47,
        'Trịnh Thăng Bình',
        'ttb_musicvn@gmail.com',
        'thangbinhx2',
        '0932991001',
        0,
        1,
        '2025-04-07 05:51:44'
    ),
    (
        48,
        'Karik',
        'karik.real@gmail.com',
        'karikflow2024',
        '0988445566',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        49,
        'Rhymastic',
        'rhymastic.rapper@gmail.com',
        'raplife321',
        '0907888999',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        50,
        'Erik',
        'erikidol9x@gmail.com',
        'erikvoice_89',
        '0913999444',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        51,
        'AMEE',
        'amee.cutegirl@gmail.com',
        'saogioemkhoc',
        '0923445566',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        52,
        'Bích Phương',
        'bichphuong.drama@gmail.com',
        'bpquayxe',
        '0966112233',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        53,
        'Min',
        'min.musicvn@gmail.com',
        'vutrongmin123',
        '0977334455',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        54,
        'JustaTee',
        'justa.tee88@gmail.com',
        'tee_ttl999',
        '0955443322',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        55,
        'Touliver',
        'touliver.boss@gmail.com',
        'spaceboiz',
        '0933111222',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        56,
        'Suboi',
        'suboi.queen@gmail.com',
        'suboixrap',
        '0919888777',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        57,
        'Kay Trần',
        'kaytran.dancer@gmail.com',
        'kay4real123',
        '0944992233',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        58,
        'MONO',
        'mono.dripboy@gmail.com',
        'emlaai123',
        '0911002200',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        59,
        'HIEUTHUHAI',
        'hieuthu2.flow@gmail.com',
        'bocute2024',
        '0922113344',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        60,
        'Tăng Duy Tân',
        'tdt.chill@gmail.com',
        'ngaykhongem',
        '0933004455',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        61,
        'Hồ Quang Hiếu',
        'hiquanghieu.music@gmail.com',
        'conbuonvohinh',
        '0944115566',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        62,
        'Lâm Khánh Chi',
        'lamkhanhchi.princess@gmail.com',
        'chi_la_congchua',
        '0955226677',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        63,
        'Angela Phương Trinh',
        'phuongtrinhidol@gmail.com',
        'trinhthanhthan',
        '0966337788',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        64,
        'BB Trần',
        'bbtran.funboy@gmail.com',
        'bbtranchill',
        '0977448899',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        65,
        'Hải Tú',
        'haitu.skyentertain@gmail.com',
        'cogaikhongcamxuc',
        '0988559900',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        66,
        'Đen Vâu',
        'denvau.rapper@gmail.com',
        'den_den_em_em',
        '0999660011',
        0,
        1,
        '2025-04-07 05:58:35'
    ),
    (
        67,
        'PewPew',
        'pewpew.stream@gmail.com',
        'banhmimy999',
        '0900778899',
        0,
        1,
        '2025-04-07 05:58:35'
    );
/*!40000 ALTER TABLE `account` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `address`
--
DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `address` (
    `account_id` int NOT NULL,
    `street` varchar(45) DEFAULT NULL,
    `province` varchar(45) DEFAULT NULL,
    `district` varchar(45) DEFAULT NULL,
    `ward` varchar(45) DEFAULT NULL,
    PRIMARY KEY (`account_id`),
    CONSTRAINT `fk_address_account1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `address`
--
LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */
;
INSERT INTO `address`
VALUES (1, 'F19/5D', 'Cần Thơ', 'Cà Ram', 'Bung Chen'),
    (
        2,
        '21 Phan Huy Ích',
        'TP.HCM',
        'Tân Phú',
        'Đồng Xoài'
    ),
    (
        3,
        '19 Đồng Khởi',
        'TP.HCM',
        'Hoóc Môn',
        'Bảo Kim'
    ),
    (
        4,
        '22 Hữu Trần',
        'Cần Thơ',
        'Tuấn Quốc',
        'Quốc Tuấn'
    ),
    (
        5,
        '20 Nguyễn Thị Tú',
        'TP.HCM',
        'Bình Chánh',
        'Đỉnh Ngọc'
    ),
    (
        6,
        '24 Đường Lý Tự Trọng',
        'Hà Nội',
        'Hoàn Kiếm',
        'Phan Chu Trinh'
    ),
    (
        7,
        '10 Đường Đinh Tiên Hoàng',
        'TP.HCM',
        'Quận 1',
        'Bến Nghé'
    ),
    (
        8,
        '45 Đường Nguyễn Văn Cừ',
        'Quảng Ninh',
        'Hạ Long',
        'Bãi Cháy'
    ),
    (
        9,
        '88 Đường Trần Hưng Đạo',
        'Hà Nội',
        'Ba Đình',
        'Cống Vị'
    ),
    (
        10,
        '13 Đường Nguyễn Huệ',
        'Đà Nẵng',
        'Sơn Trà',
        'Mỹ An'
    ),
    (
        11,
        '25 Đường Trần Phú',
        'Bình Dương',
        'Thủ Dầu Một',
        'Phú Hòa'
    ),
    (
        12,
        '17 Đường Nguyễn Du',
        'Hà Nội',
        'Hoàng Mai',
        'Định Công'
    ),
    (
        13,
        '39 Đường Bà Triệu',
        'TP.HCM',
        'Quận 5',
        'Phú Thọ'
    ),
    (
        14,
        '3 Đường Lê Lợi',
        'Cần Thơ',
        'Ninh Kiều',
        'An Phú'
    ),
    (
        15,
        '50 Đường Tôn Thất Tùng',
        'TP.HCM',
        'Quận 3',
        'Trung Sơn'
    ),
    (
        16,
        '12 Đường Nguyễn Chí Thanh',
        'Hà Nội',
        'Đống Đa',
        'Khâm Thiên'
    ),
    (
        17,
        '8 Đường Lê Thánh Tôn',
        'TP.HCM',
        'Quận 1',
        'Bến Thành'
    ),
    (
        18,
        '14 Đường Nguyễn Ái Quốc',
        'Bắc Giang',
        'TP Bắc Giang',
        'Hoàng Hoa Thám'
    ),
    (
        19,
        '28 Đường Trường Chinh',
        'Hải Phòng',
        'Lê Chân',
        'Quán Toan'
    ),
    (
        20,
        '32 Đường Phan Đình Phùng',
        'TP.HCM',
        'Quận 10',
        'Hòa Hưng'
    ),
    (
        21,
        '41 Đường Cao Thắng',
        'Bắc Ninh',
        'TP Bắc Ninh',
        'Suối Hoa'
    ),
    (
        22,
        '6 Đường Phan Văn Trị',
        'Hà Nội',
        'Cầu Giấy',
        'Dịch Vọng Hậu'
    ),
    (
        23,
        '9 Đường Lê Văn Lương',
        'Thái Bình',
        'TP Thái Bình',
        'Trần Lãm'
    ),
    (
        24,
        '18 Đường Nguyễn Trãi',
        'TP.HCM',
        'Quận 10',
        'Hòa Thạnh'
    ),
    (
        25,
        '29 Đường Nguyễn Thị Minh Khai',
        'Vĩnh Long',
        'TP Vĩnh Long',
        'Tân Hội'
    ),
    (
        26,
        '37 Đường Hoàng Diệu',
        'TP.HCM',
        'Quận 4',
        'Tân Thuận Đông'
    ),
    (
        27,
        '42 Đường Bến Vân Đồn',
        'Nghệ An',
        'TP Vinh',
        'Hưng Bình'
    ),
    (
        28,
        '16 Đường Tây Sơn',
        'Bến Tre',
        'TP Bến Tre',
        'Phú Tân'
    ),
    (
        29,
        '26 Đường Nguyễn Tất Thành',
        'Thừa Thiên Huế',
        'TP Huế',
        'Phú Nhuận'
    ),
    (
        30,
        '11 Đường Ngô Quyền',
        'Hà Nội',
        'Long Biên',
        'Cự Lộc'
    ),
    (
        31,
        '5 Đường Cầu Giấy',
        'Quảng Ngãi',
        'TP Quảng Ngãi',
        'Trần Quang Diệu'
    ),
    (
        32,
        '21 Đường Võ Văn Kiệt',
        'TP.HCM',
        'Quận 5',
        'Phú Thọ Hòa'
    ),
    (
        33,
        '60 Đường Lê Thị Hồng Gấm',
        'Hải Dương',
        'TP Hải Dương',
        'Ngọc Lâm'
    ),
    (
        34,
        '35 Đường Xuân Thủy',
        'TP.HCM',
        'Quận 6',
        'Vĩnh Lộc A'
    ),
    (
        35,
        '50 Đường Lê Lai',
        'Vĩnh Phúc',
        'TP Vĩnh Yên',
        'Hội Hợp'
    ),
    (
        36,
        '10 Đường Lê Lợi',
        'Hà Nội',
        'Quận Thanh Xuân',
        'Hạ Đình'
    ),
    (
        37,
        '12 Đường Nguyễn Trãi',
        'Đà Nẵng',
        'Quận Hải Châu',
        'Thuận Phước'
    ),
    (
        38,
        '22 Đường Phan Đình Phùng',
        'Bắc Giang',
        'TP Bắc Giang',
        'Hoàng Văn Thụ'
    ),
    (
        39,
        '35 Đường Trần Quang Khải',
        'Quảng Bình',
        'TP Đồng Hới',
        'Nam Lý'
    ),
    (
        40,
        '14 Đường Nguyễn Du',
        'Hà Nội',
        'Quận Hoàn Kiếm',
        'Hàng Bông'
    ),
    (
        41,
        '16 Đường Lý Thái Tổ',
        'Hồ Chí Minh',
        'Quận 4',
        'Tân Thuận Tây'
    ),
    (
        42,
        '8 Đường Ngô Quyền',
        'Hải Phòng',
        'Quận Lê Chân',
        'Vĩnh Niệm'
    ),
    (
        43,
        '45 Đường Nguyễn Thị Minh Khai',
        'Quảng Nam',
        'TP Tam Kỳ',
        'Tân An'
    ),
    (
        44,
        '18 Đường Đoàn Kết',
        'Hải Dương',
        'TP Hải Dương',
        'Nguyễn Trãi'
    ),
    (
        45,
        '6 Đường Ngọc Lâm',
        'Bắc Ninh',
        'TP Bắc Ninh',
        'Đáp Cầu'
    ),
    (
        46,
        '21 Đường Lê Hồng Phong',
        'Quảng Ngãi',
        'TP Quảng Ngãi',
        'Trung Hòa'
    ),
    (
        47,
        '9 Đường Nguyễn Tri Phương',
        'TP.HCM',
        'Quận 10',
        'Hòa Thạnh'
    ),
    (
        48,
        '50 Đường Mạc Thị Bưởi',
        'Bà Rịa - Vũng Tàu',
        'TP Vũng Tàu',
        'Thắng Tam'
    ),
    (
        49,
        '11 Đường Nguyễn Thị Minh Khai',
        'Cần Thơ',
        'Ninh Kiều',
        'Cái Khế'
    ),
    (
        50,
        '23 Đường Bà Triệu',
        'Hà Nội',
        'Quận Hai Bà Trưng',
        'Bạch Mai'
    ),
    (
        51,
        '15 Đường Nguyễn Du',
        'Thanh Hóa',
        'TP Thanh Hóa',
        'Đông Hương'
    ),
    (
        52,
        '34 Đường Nguyễn Văn Cừ',
        'Tiền Giang',
        'TP Mỹ Tho',
        'Tân Mỹ'
    ),
    (
        53,
        '27 Đường Lý Tự Trọng',
        'Vĩnh Long',
        'TP Vĩnh Long',
        'Tân Hòa'
    ),
    (
        54,
        '50 Đường Hoàng Diệu',
        'Hà Nội',
        'Quận Ba Đình',
        'Đội Cấn'
    ),
    (
        55,
        '8 Đường Trần Thị Bính',
        'Nghệ An',
        'TP Vinh',
        'Quán Bàu'
    );
/*!40000 ALTER TABLE `address` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `order`
--
DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `order` (
    `id` int NOT NULL AUTO_INCREMENT,
    `total_price` int NOT NULL,
    `payment` enum(
        'Tiền mặt',
        'Ví ShopeePay',
        'Ví ZaloPay',
        'Ví MoMo'
    ) NOT NULL DEFAULT 'Tiền mặt',
    `status` enum('Đã giao', 'Đã xác nhận', 'Chưa xử lý', 'Đã hủy') NOT NULL DEFAULT 'Đã giao',
    `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `province` varchar(45) NOT NULL,
    `district` varchar(45) NOT NULL,
    `ward` varchar(45) NOT NULL,
    `street` varchar(45) NOT NULL,
    `shipping_fee` decimal(10, 2) unsigned DEFAULT '0.00',
    `account_id` int NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `id_UNIQUE` (`id`),
    KEY `fk_order_account1_idx` (`account_id`),
    CONSTRAINT `fk_order_account1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 43 DEFAULT CHARSET = utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `order`
--
LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */
;
INSERT INTO `order`
VALUES (
        1,
        277000,
        'Tiền mặt',
        'Đã giao',
        '2025-04-07 12:59:40',
        'TP.HCM',
        'Quận 10',
        'Phường 9',
        '213/4 Lí Thái Tổ',
        50000.00,
        1
    ),
    (
        2,
        430000,
        'Tiền mặt',
        'Đã giao',
        '2025-04-07 13:03:32',
        'TP.HCM',
        'Quận 4',
        'Phường 4',
        '210/4 Lý Thường Kiệt',
        15000.00,
        2
    ),
    (
        3,
        1000000,
        'Tiền mặt',
        'Đã giao',
        '2025-04-07 13:07:04',
        'TP.HCM',
        'Quận 2',
        'Phường 6',
        '27 Hai Bà Trưng',
        25000.00,
        3
    ),
    (
        4,
        1234000,
        'Tiền mặt',
        'Đã giao',
        '2025-04-07 13:07:04',
        'TP.HCM',
        'Quận 5',
        'Phường 14',
        '19 An Dương Vương',
        55000.00,
        4
    ),
    (
        5,
        600000,
        'Tiền mặt',
        'Đã giao',
        '2025-04-07 13:07:04',
        'TP.HCM',
        'Quận 6',
        'Phường 1',
        '19 Alibaba',
        25000.00,
        5
    ),
    (
        6,
        345000,
        'Tiền mặt',
        'Đã giao',
        '2025-04-07 13:08:27',
        'TP.HCM',
        'Quận 9',
        'Phường 9',
        '235 Kilibbi',
        12000.00,
        6
    ),
    (
        7,
        278000,
        'Ví MoMo',
        'Đã giao',
        '2025-04-07 13:17:33',
        'TP Cần Thơ',
        'Ninh Kiều',
        'An Phú',
        '3 Đường Lê Lợi',
        15000.00,
        7
    ),
    (
        8,
        189000,
        'Tiền mặt',
        'Đã xác nhận',
        '2025-04-07 13:17:33',
        'TP.HCM',
        'Quận 1',
        'Bến Nghé',
        '10 Đường Đinh Tiên Hoàng',
        12000.00,
        8
    ),
    (
        9,
        450000,
        'Ví ZaloPay',
        'Chưa xử lý',
        '2025-04-07 13:17:33',
        'Quảng Ninh',
        'Hạ Long',
        'Bãi Cháy',
        '45 Đường Nguyễn Văn Cừ',
        18000.00,
        9
    ),
    (
        10,
        327000,
        'Ví ShopeePay',
        'Đã giao',
        '2025-04-07 13:17:33',
        'Hà Nội',
        'Ba Đình',
        'Cống Vị',
        '88 Đường Trần Hưng Đạo',
        10000.00,
        10
    ),
    (
        11,
        300000,
        'Tiền mặt',
        'Đã hủy',
        '2025-04-07 13:17:33',
        'Đà Nẵng',
        'Sơn Trà',
        'Mỹ An',
        '13 Đường Nguyễn Huệ',
        14000.00,
        11
    ),
    (
        12,
        520000,
        'Ví MoMo',
        'Đã xác nhận',
        '2025-04-07 13:17:33',
        'Bình Dương',
        'Thủ Dầu Một',
        'Phú Hòa',
        '25 Đường Trần Phú',
        17000.00,
        12
    ),
    (
        13,
        412000,
        'Ví ZaloPay',
        'Đã giao',
        '2025-04-07 13:17:33',
        'Hà Nội',
        'Hoàng Mai',
        'Định Công',
        '17 Đường Nguyễn Du',
        13000.00,
        13
    ),
    (
        14,
        245000,
        'Tiền mặt',
        'Chưa xử lý',
        '2025-04-07 13:17:33',
        'TP.HCM',
        'Quận 5',
        'Phú Thọ',
        '39 Đường Bà Triệu',
        16000.00,
        14
    ),
    (
        15,
        398000,
        'Ví ShopeePay',
        'Đã giao',
        '2025-04-07 13:17:33',
        'TP Cần Thơ',
        'Ninh Kiều',
        'An Phú',
        '3 Đường Lê Lợi',
        15000.00,
        15
    ),
    (
        16,
        220000,
        'Ví MoMo',
        'Đã hủy',
        '2025-04-07 13:17:33',
        'TP.HCM',
        'Quận 3',
        'Trung Sơn',
        '50 Đường Tôn Thất Tùng',
        11000.00,
        16
    ),
    (
        17,
        360000,
        'Ví ZaloPay',
        'Đã xác nhận',
        '2025-04-07 13:17:33',
        'Hà Nội',
        'Đống Đa',
        'Khâm Thiên',
        '12 Đường Nguyễn Chí Thanh',
        12500.00,
        17
    ),
    (
        18,
        405000,
        'Tiền mặt',
        'Đã giao',
        '2025-04-07 13:17:33',
        'TP.HCM',
        'Quận 1',
        'Bến Thành',
        '8 Đường Lê Thánh Tôn',
        10000.00,
        18
    ),
    (
        19,
        342000,
        'Ví MoMo',
        'Đã giao',
        '2025-04-07 13:17:33',
        'Bắc Giang',
        'TP Bắc Giang',
        'Hoàng Hoa Thám',
        '14 Đường Nguyễn Ái Quốc',
        13500.00,
        19
    ),
    (
        20,
        298000,
        'Ví ShopeePay',
        'Đã xác nhận',
        '2025-04-07 13:17:33',
        'Hải Phòng',
        'Lê Chân',
        'Quán Toan',
        '28 Đường Trường Chinh',
        15000.00,
        20
    ),
    (
        21,
        399000,
        'Tiền mặt',
        'Đã giao',
        '2025-04-07 13:17:33',
        'TP.HCM',
        'Quận 10',
        'Hòa Hưng',
        '32 Đường Phan Đình Phùng',
        16000.00,
        21
    ),
    (
        22,
        476000,
        'Ví ZaloPay',
        'Đã hủy',
        '2025-04-07 13:17:33',
        'Bắc Ninh',
        'TP Bắc Ninh',
        'Suối Hoa',
        '41 Đường Cao Thắng',
        14500.00,
        22
    ),
    (
        23,
        218000,
        'Ví MoMo',
        'Chưa xử lý',
        '2025-04-07 13:17:33',
        'Hà Nội',
        'Cầu Giấy',
        'Dịch Vọng Hậu',
        '6 Đường Phan Văn Trị',
        12500.00,
        23
    ),
    (
        24,
        510000,
        'Tiền mặt',
        'Đã xác nhận',
        '2025-04-07 13:17:33',
        'Thái Bình',
        'TP Thái Bình',
        'Trần Lãm',
        '9 Đường Lê Văn Lương',
        17000.00,
        24
    ),
    (
        25,
        351000,
        'Ví ShopeePay',
        'Đã giao',
        '2025-04-07 13:17:33',
        'TP.HCM',
        'Quận 10',
        'Hòa Thạnh',
        '18 Đường Nguyễn Trãi',
        15000.00,
        25
    ),
    (
        26,
        275000,
        'Ví ZaloPay',
        'Chưa xử lý',
        '2025-04-07 13:17:33',
        'Vĩnh Long',
        'TP Vĩnh Long',
        'Tân Hội',
        '29 Đường Nguyễn Thị Minh Khai',
        12000.00,
        26
    ),
    (
        27,
        289000,
        'Ví ShopeePay',
        'Đã giao',
        '2025-04-07 13:19:11',
        'TP.HCM',
        'Quận 9',
        'Phường 9',
        '235 Kilibbi',
        12000.00,
        1
    ),
    (
        28,
        455000,
        'Tiền mặt',
        'Đã xác nhận',
        '2025-04-07 13:19:11',
        'Hà Nội',
        'Ba Đình',
        'Liễu Giai',
        '123 Đội Cấn',
        15000.00,
        1
    ),
    (
        29,
        382000,
        'Ví MoMo',
        'Chưa xử lý',
        '2025-04-07 13:19:11',
        'Đà Nẵng',
        'Hải Châu',
        'Hòa Cường Bắc',
        '98 Nguyễn Hữu Thọ',
        10000.00,
        1
    ),
    (
        30,
        197000,
        'Ví ZaloPay',
        'Đã hủy',
        '2025-04-07 13:19:11',
        'Bắc Giang',
        'TP Bắc Giang',
        'Dĩnh Kế',
        '17 Lê Lợi',
        13000.00,
        1
    ),
    (
        31,
        523000,
        'Tiền mặt',
        'Đã giao',
        '2025-04-07 13:19:11',
        'TP.HCM',
        'Quận 1',
        'Bến Nghé',
        '88 Nguyễn Huệ',
        14000.00,
        1
    ),
    (
        32,
        340000,
        'Ví MoMo',
        'Đã giao',
        '2025-04-07 13:19:19',
        'Hải Phòng',
        'Ngô Quyền',
        'Máy Tơ',
        '45 Trần Phú',
        12000.00,
        3
    ),
    (
        33,
        289000,
        'Ví ZaloPay',
        'Đã xác nhận',
        '2025-04-07 13:19:19',
        'Nghệ An',
        'TP Vinh',
        'Hưng Dũng',
        '22 Nguyễn Trãi',
        13000.00,
        3
    ),
    (
        34,
        417000,
        'Tiền mặt',
        'Chưa xử lý',
        '2025-04-07 13:19:19',
        'Thái Bình',
        'TP Thái Bình',
        'Phú Xuân',
        '11 Trần Thái Tông',
        11000.00,
        3
    ),
    (
        35,
        369000,
        'Ví ShopeePay',
        'Đã giao',
        '2025-04-07 13:19:19',
        'TP.HCM',
        'Quận 3',
        'Phường 4',
        '73 Võ Thị Sáu',
        10000.00,
        3
    ),
    (
        36,
        510000,
        'Ví MoMo',
        'Đã xác nhận',
        '2025-04-07 13:19:25',
        'Quảng Ninh',
        'Hạ Long',
        'Bãi Cháy',
        '78 Hạ Long',
        17000.00,
        4
    ),
    (
        37,
        230000,
        'Tiền mặt',
        'Đã giao',
        '2025-04-07 13:19:25',
        'Đắk Lắk',
        'Buôn Ma Thuột',
        'Tân Lợi',
        '55 Lê Duẩn',
        10000.00,
        4
    ),
    (
        38,
        475000,
        'Ví ZaloPay',
        'Đã hủy',
        '2025-04-07 13:19:25',
        'TP.HCM',
        'Bình Thạnh',
        'Phường 25',
        '12 Nguyễn Hữu Cảnh',
        15000.00,
        4
    ),
    (
        39,
        298000,
        'Ví ShopeePay',
        'Chưa xử lý',
        '2025-04-07 13:19:25',
        'Vĩnh Phúc',
        'TP Vĩnh Yên',
        'Đồng Tâm',
        '19 Trần Quốc Toản',
        13000.00,
        4
    ),
    (
        40,
        360000,
        'Tiền mặt',
        'Đã giao',
        '2025-04-07 13:19:25',
        'Bến Tre',
        'TP Bến Tre',
        'Phú Tân',
        '26 Nguyễn Trung Trực',
        11000.00,
        4
    ),
    (
        41,
        419000,
        'Ví ZaloPay',
        'Đã giao',
        '2025-04-07 13:19:25',
        'Hà Nội',
        'Hoàng Mai',
        'Giáp Bát',
        '67 Giải Phóng',
        14000.00,
        4
    ),
    (
        42,
        301000,
        'Ví MoMo',
        'Đã xác nhận',
        '2025-04-07 13:19:25',
        'TP.HCM',
        'Quận 7',
        'Tân Phong',
        '38 Nguyễn Văn Linh',
        12000.00,
        4
    );
/*!40000 ALTER TABLE `order` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `order_details`
--
DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `order_details` (
    `order_id` int NOT NULL,
    `product_id` int NOT NULL,
    `size` enum('M', 'L') NOT NULL,
    `quantity` int unsigned NOT NULL,
    `price` int NOT NULL,
    `subtotal` int GENERATED ALWAYS AS ((`quantity` * `price`)) STORED,
    PRIMARY KEY (`order_id`, `product_id`, `size`),
    KEY `fk_order_details_product_size1_idx` (`product_id`, `size`),
    CONSTRAINT `fk_order_details_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
    CONSTRAINT `fk_order_details_product_size1` FOREIGN KEY (`product_id`, `size`) REFERENCES `product_size` (`product_id`, `size`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `order_details`
--
LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */
;
INSERT INTO `order_details` (
        `order_id`,
        `product_id`,
        `size`,
        `quantity`,
        `price`
    )
VALUES (1, 1, 'M', 2, 59000),
    (1, 2, 'M', 1, 109000),
    (2, 1, 'M', 1, 59000),
    (2, 2, 'M', 2, 109000),
    (2, 3, 'M', 3, 59000),
    (3, 1, 'M', 5, 59000),
    (3, 2, 'L', 5, 120000),
    (3, 8, 'L', 1, 45000),
    (3, 10, 'L', 1, 59000),
    (4, 1, 'L', 2, 59000),
    (4, 2, 'M', 1, 109000),
    (4, 2, 'L', 1, 120000),
    (4, 3, 'M', 1, 59000),
    (4, 3, 'L', 1, 64000),
    (4, 4, 'M', 2, 62000),
    (4, 5, 'M', 1, 79000),
    (4, 5, 'L', 1, 89000),
    (4, 6, 'M', 2, 79000),
    (4, 6, 'L', 1, 92000),
    (4, 7, 'M', 2, 69000),
    (4, 7, 'L', 1, 79000),
    (4, 8, 'M', 1, 39000),
    (4, 8, 'L', 2, 45000),
    (5, 1, 'L', 1, 64000),
    (5, 2, 'M', 1, 109000),
    (5, 4, 'M', 1, 62000),
    (5, 5, 'L', 1, 89000),
    (5, 6, 'L', 1, 92000),
    (5, 7, 'M', 1, 69000),
    (5, 8, 'L', 1, 45000),
    (6, 8, 'L', 1, 45000),
    (6, 9, 'L', 1, 79000),
    (6, 10, 'L', 1, 49000),
    (6, 11, 'L', 1, 70000),
    (6, 16, 'L', 1, 62000),
    (6, 17, 'M', 1, 69000),
    (7, 8, 'L', 1, 45000),
    (7, 10, 'M', 1, 49000),
    (7, 14, 'M', 1, 69000),
    (7, 16, 'L', 1, 62000),
    (7, 18, 'M', 1, 53000);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `product`
--
DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `product` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
    `category` enum('Trà', 'Trà sữa', 'Coffee') NOT NULL,
    `cost_default` int DEFAULT NULL,
    `description` text,
    `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `img_url` varchar(2083) DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE = InnoDB AUTO_INCREMENT = 19 DEFAULT CHARSET = utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `product`
--
LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */
;
INSERT INTO `product`
VALUES (
        1,
        'Trà sữa Clover Tea	',
        'Trà sữa',
        59000,
        '',
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        2,
        'Mỹ Nhân Thanh Trà',
        'Trà',
        109000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        3,
        'Americano',
        'Coffee',
        59000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        4,
        'Espresso',
        'Coffee',
        49000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        5,
        'Trà Nhãn Hoa Mộc Lê',
        'Trà',
        79000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        6,
        'Trà sữa Bá Tước',
        'Trà sữa',
        79000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        7,
        'Trà sữa Olong Quế Hoa',
        'Trà sữa',
        69000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        8,
        'Hồng trà sữa',
        'Trà sữa',
        39000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        9,
        'Trà sữa Vân Nam',
        'Trà sữa',
        69000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        10,
        'Trà sữa Trân Châu Hoàng Kim',
        'Trà sữa',
        49000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        11,
        'Clover Trà Xanh',
        'Trà',
        59000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        12,
        'Olong Đào Tiên',
        'Trà',
        49000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        13,
        'Hồng Long Pha Lê Tuyết',
        'Trà',
        49000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        14,
        'Bách Thảo Trà Mộc',
        'Trà',
        69000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        15,
        'Cappuchino',
        'Coffee',
        59000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        16,
        'Latte',
        'Coffee',
        49000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        17,
        'Macchiato',
        'Coffee',
        69000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    ),
    (
        18,
        'Cold Brew',
        'Coffee',
        49000,
        NULL,
        '2025-02-21 17:00:00',
        NULL
    );
/*!40000 ALTER TABLE `product` ENABLE KEYS */
;
UNLOCK TABLES;
--
-- Table structure for table `product_size`
--
DROP TABLE IF EXISTS `product_size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */
;
/*!50503 SET character_set_client = utf8mb4 */
;
CREATE TABLE `product_size` (
    `product_id` int NOT NULL,
    `size` enum('M', 'L') NOT NULL,
    `cost` int NOT NULL,
    PRIMARY KEY (`product_id`, `size`),
    KEY `fk_product_size_product1_idx` (`product_id`),
    CONSTRAINT `fk_product_size_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */
;
--
-- Dumping data for table `product_size`
--
LOCK TABLES `product_size` WRITE;
/*!40000 ALTER TABLE `product_size` DISABLE KEYS */
;
INSERT INTO `product_size`
VALUES (1, 'M', 59000),
    (1, 'L', 64000),
    (2, 'M', 109000),
    (2, 'L', 120000),
    (3, 'M', 59000),
    (3, 'L', 64000),
    (4, 'M', 49000),
    (4, 'L', 62000),
    (5, 'M', 79000),
    (5, 'L', 89000),
    (6, 'M', 79000),
    (6, 'L', 92000),
    (7, 'M', 69000),
    (7, 'L', 79000),
    (8, 'M', 39000),
    (8, 'L', 45000),
    (9, 'M', 69000),
    (9, 'L', 79000),
    (10, 'M', 49000),
    (10, 'L', 59000),
    (11, 'M', 59000),
    (11, 'L', 70000),
    (12, 'M', 49000),
    (12, 'L', 59000),
    (13, 'M', 49000),
    (13, 'L', 59000),
    (14, 'M', 69000),
    (14, 'L', 75000),
    (15, 'M', 59000),
    (15, 'L', 70000),
    (16, 'M', 49000),
    (16, 'L', 62000),
    (17, 'M', 69000),
    (17, 'L', 85000),
    (18, 'M', 49000),
    (18, 'L', 62000);
/*!40000 ALTER TABLE `product_size` ENABLE KEYS */
;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */
;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */
;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */
;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;
-- Dump completed on 2025-04-07 22:03:07