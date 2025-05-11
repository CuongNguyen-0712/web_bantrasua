<?php

namespace user;

use Database;
use PDO;

class Product_Model
{

    public function getProduct()
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM product where is_active = 1");

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getProductByCategory($category_id)
    {
        $stmt = Database::getInstance()->prepare("SELECT *
                                                  FROM product 
                                                  WHERE category_id = ? and is_active = 1");

        $stmt->execute([$category_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getProductByID($product_id)
    {
        $stmt = Database::getInstance()->prepare("SELECT *
                                                  FROM product 
                                                  WHERE id = ? and is_active = 1");

        $stmt->execute([$product_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getProductPagination($limit, $offset)
    {
        $stmt = Database::getInstance()->prepare("SELECT * 
                                                  FROM product 
                                                  LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function getTotalProduct()
    {
        $stmt = Database::getInstance()->prepare("SELECT COUNT(*) AS total FROM product");

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Phương thức lấy các kích cỡ có sẵn cho sản phẩm
    public function getProductSizes()
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM product_size");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Nếu không có kết quả hoặc thiếu trường name, sử dụng mặc định
        if (empty($result) || !isset($result[0]['name'])) {
            return $this->getDefaultSizes();
        }

        return $result;
    }

    // Phương thức mặc định khi không có dữ liệu size từ database
    public function getDefaultSizes()
    {
        return [
            [
                'id' => 1,
                'name' => 'M',
                'price_difference' => 0
            ],
            [
                'id' => 2,
                'name' => 'L',
                'price_difference' => 5000
            ]
        ];
    }
    // Phương thức lấy các kích cỡ có sẵn cho một sản phẩm cụ thể
    public function getProductSizesByProductID($product_id)
    {
        $stmt = Database::getInstance()->prepare("SELECT ps.* 
                                                 FROM product_size ps
                                                 JOIN product_size_relation psr ON ps.id = psr.size_id
                                                 WHERE psr.product_id = ?");
        $stmt->execute([$product_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Phương thức lấy tất cả các topping
    public function getAllToppings()
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM topping");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Phương thức lấy các topping có sẵn cho một sản phẩm cụ thể
    public function getToppingsByProductID($product_id)
    {
        $stmt = Database::getInstance()->prepare("SELECT t.* 
                                                 FROM topping t
                                                 JOIN product_topping_relation ptr ON t.id = ptr.topping_id
                                                 WHERE ptr.product_id = ?");
        $stmt->execute([$product_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Phương thức lấy tất cả các mức độ
    public function getLevels()
    {
        $stmt = Database::getInstance()->prepare("SELECT * FROM level ORDER BY id");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Phương thức lấy các mức độ cho một thành phần cụ thể
    public function getComponentLevels($component_id)
    {
        $stmt = Database::getInstance()->prepare("SELECT l.*, pcl.default_selected 
                                                 FROM level l
                                                 JOIN product_component_level pcl ON l.id = pcl.level_id
                                                 WHERE pcl.component_id = ?
                                                 ORDER BY l.id");
        $stmt->execute([$component_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Phương thức lấy mức độ của đá (component_id = 1)
    public function getIceLevels($ice_ids)
    {
        $placeholders = implode(',', array_fill(0, count($ice_ids), '?'));
        $stmt = Database::getInstance()->prepare("SELECT * FROM topping WHERE id IN ($placeholders)");
        $stmt->execute($ice_ids);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Phương thức lấy mức độ của sữa/ngọt (component_id = 2)
    public function getSweetLevels($sweet_ids)
    {
        $placeholders = implode(',', array_fill(0, count($sweet_ids), '?'));
        $stmt = Database::getInstance()->prepare("SELECT * FROM topping WHERE id IN ($placeholders)");
        $stmt->execute($sweet_ids);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Phương thức lấy các topping cụ thể theo ID
    public function getSpecificToppings($topping_ids)
    {
        $placeholders = implode(',', array_fill(0, count($topping_ids), '?'));
        $stmt = Database::getInstance()->prepare("SELECT * FROM topping WHERE id IN ($placeholders)");
        $stmt->execute($topping_ids);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getSpecificToppings1($topping_ids)
    {
        $placeholders = implode(',', array_fill(0, count($topping_ids), '?'));
        $stmt = Database::getInstance()->prepare("SELECT * FROM topping WHERE id IN ($placeholders)");
        $stmt->execute($topping_ids);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    // Phương thức tìm kiếm sản phẩm theo nhiều điều kiện
    public function searchProducts($searchTerm, $category_id, $minPrice, $maxPrice)
    {
        $conditions = [];
        $params = [];

        // Sử dụng JOIN để có thể tìm kiếm theo cả tên danh mục
        $sql = "SELECT p.* FROM product p 
                LEFT JOIN category c ON p.category_id = c.id
                WHERE 1=1";

        // Tìm kiếm theo tên sản phẩm hoặc tên danh mục (tương đối)
        if (!empty($searchTerm)) {
            $conditions[] = "(p.name LIKE ? OR c.name LIKE ?)";
            $params[] = "%$searchTerm%";
            $params[] = "%$searchTerm%";
        }

        // Tìm kiếm theo danh mục
        if (!empty($category_id)) {
            $conditions[] = "p.category_id = ?";
            $params[] = $category_id;
        }

        // Thêm điều kiện vào câu truy vấn
        if (!empty($conditions)) {
            $sql .= " AND " . implode(" AND ", $conditions);
        }

        // Thực hiện truy vấn
        $stmt = Database::getInstance()->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
