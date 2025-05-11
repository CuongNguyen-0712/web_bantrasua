-- Tạo bảng cho mức độ (level)
CREATE TABLE IF NOT EXISTS `level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Thêm dữ liệu mức độ
INSERT INTO `level` (`id`, `name`, `description`) VALUES
(1, 'Ít', 'Mức độ ít'),
(2, 'Bình thường', 'Mức độ bình thường'),
(3, 'Nhiều', 'Mức độ nhiều');

-- Tạo bảng quan hệ giữa thành phần và mức độ
CREATE TABLE IF NOT EXISTS `product_component_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `component_id` int(11) NOT NULL, -- 1: đá, 2: sữa (ngọt)
  `level_id` int(11) NOT NULL,     -- 1: ít, 2: bình thường, 3: nhiều
  `default_selected` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `component_id` (`component_id`),
  KEY `level_id` (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Thêm dữ liệu quan hệ giữa đá (ID 1) và mức độ
INSERT INTO `product_component_level` (`component_id`, `level_id`, `default_selected`) VALUES
(1, 1, 0), -- Đá ít
(1, 2, 1), -- Đá bình thường (mặc định)
(1, 3, 0); -- Đá nhiều

-- Thêm dữ liệu quan hệ giữa sữa (ID 2) và mức độ
INSERT INTO `product_component_level` (`component_id`, `level_id`, `default_selected`) VALUES
(2, 1, 0), -- Sữa ít
(2, 2, 1), -- Sữa bình thường (mặc định)
(2, 3, 0); -- Sữa nhiều

-- Cập nhật dữ liệu topping để có ID đúng và giá 7000
UPDATE `topping` SET `price` = 7000 WHERE `id` IN (3, 4, 5);

-- Thêm các topping nếu chưa có
INSERT INTO `topping` (`id`, `name`, `price`) 
SELECT 3, 'Trân châu đen', 7000 
FROM dual 
WHERE NOT EXISTS (SELECT 1 FROM `topping` WHERE `id` = 3);

INSERT INTO `topping` (`id`, `name`, `price`) 
SELECT 4, 'Hạt thủy tinh củ năng', 7000 
FROM dual 
WHERE NOT EXISTS (SELECT 1 FROM `topping` WHERE `id` = 4);

INSERT INTO `topping` (`id`, `name`, `price`) 
SELECT 5, 'Kem Cheese khứ hồi', 7000 
FROM dual 
WHERE NOT EXISTS (SELECT 1 FROM `topping` WHERE `id` = 5); 