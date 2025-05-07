<?php
namespace user;

use Database;
use PDO;

class Product_Model{

    public function getProduct(){
        $stmt = Database::getInstance()->prepare("SELECT * FROM product");
                        
        $stmt->execute();
        $result = $stmt->fetchAll(PDO:: FETCH_ASSOC);
        return $result;
    }

    public function getProductByCategory($category_id){
        $stmt = Database::getInstance()->prepare("SELECT *
                                                  FROM product 
                                                  WHERE category_id = ? ");

        $stmt->execute([$category_id]);
        $result = $stmt->fetchAll(PDO:: FETCH_ASSOC);
        return $result;
    }

    public function getProductByID($product_id){
        $stmt = Database::getInstance()->prepare("SELECT *
                                                  FROM product 
                                                  WHERE id = ? ");

        $stmt->execute([$product_id]);
        $result = $stmt->fetchAll(PDO:: FETCH_ASSOC);
        return $result;
    }

    public function getProductPagination($limit, $offset){
        $stmt = Database::getInstance()->prepare("SELECT * 
                                                  FROM product 
                                                  LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    

    public function getTotalProduct(){
        $stmt = Database::getInstance()->prepare("SELECT COUNT(*) AS total FROM product");

        $stmt->execute();
        $result = $stmt->fetchAll(PDO:: FETCH_ASSOC);
        return $result;
    }
    
}
?>