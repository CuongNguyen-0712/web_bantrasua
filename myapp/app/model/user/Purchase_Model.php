<?php

namespace user;
use Database;
use PDO;

class Purchase_Model{

    public function getOrderID($userID){
        $stmt = Database::getInstance()->prepare("SELECT id FROM `order` WHERE account_id = ?");

        $stmt->execute([$userID]);
        $result = $stmt->fetch(PDO:: FETCH_ASSOC);
        return $result;
    }

    public function getOrderStatus($orderID){
        $stmt = Database::getInstance()->prepare("SELECT name FROM order_status WHERE id = ?");

        $stmt->execute([$orderID]);
        $result = $stmt->fetch(PDO:: FETCH_ASSOC);
        return $result;
    }

    public function getOrderDetail($orderID){
        $stmt = Database::getInstance()->prepare("SELECT product_id, size_id
                                                  FROM order_details 
                                                  WHERE order_id = ?");

        $stmt->execute([$orderID]);
        $result = $stmt->fetchAll(PDO:: FETCH_ASSOC);
        return $result;
    }

    public function getProductName($productID){
        $stmt = Database::getInstance()->prepare("SELECT name FROM product WHERE id = ?");

        $stmt->execute([$productID]);
        $result = $stmt->fetch(PDO:: FETCH_ASSOC);
        return $result;
    }

    public function getSizeName($sizeID){
        $stmt = Database::getInstance()->prepare("SELECT name FROM size WHERE id = ?");

        $stmt->execute([$sizeID]);
        $result = $stmt->fetch(PDO:: FETCH_ASSOC);
        return $result;
    }

}

?>