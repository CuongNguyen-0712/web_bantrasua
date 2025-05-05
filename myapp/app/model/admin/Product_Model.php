<?php

namespace admin;

class Product_Model extends Base_Model
{
    public function getProductsByPage($limit, $offset) {
        $query = "SELECT p.id, p.name, p.cost_default, c.name AS , p.upload_time
        FROM product p
        JOIN category c ON p.category_id = c.id
        LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getTotalProducts() {
        $query = "SELECT COUNT(*) AS total FROM product";
        $result = $this->select($query);
        return $result[0]['total'] ?? 0;
    }
}
