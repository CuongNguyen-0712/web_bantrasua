<?php
namespace admin;

use PDO;
use Database;

class Base_Model {
    protected $pdo;
    
    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    // Select hoặc đọc dữ liệu
    protected function select($query, $params = []) {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insert dữ liệu
    protected function insert($query, $params = []) {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $this->pdo->lastInsertId();
    }

    // Cập nhật dữ liệu
    protected function update($query, $params = []) {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->rowCount();
    }

    // Xóa dữ liệu
    protected function delete($query, $params = []) {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->rowCount();
    }
}
?>