<?php

namespace user;
use Database;
use PDO;

class Purchase_Model{

    public function getOrderID($orderID){
        $stmt = Database::getInstance()->prepare("SELECT id, total_price, shipping_fee
                                                  FROM `order` 
                                                  WHERE id = ?");

        $stmt->execute([$orderID]);
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
        $stmt = Database::getInstance()->prepare("SELECT order_id, product_id, size_id, quantity, subtotal
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

    public function getToppingsByOrderDetailID($orderDetailID, $productID, $sizeID){
        $stmt = Database::getInstance()->prepare("SELECT t.name as name, t.id as id
                                                  FROM order_detail_topping odt 
                                                  JOIN topping t ON odt.topping_id = t.id 
                                                  WHERE odt.order_id = ? AND odt.product_id = ? AND odt.size_id = ?");
        $stmt->execute([$orderDetailID, $productID, $sizeID]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function getPayment_Method($orderID){
        $stmt = Database::getInstance()->prepare("SELECT p.name 
                                                  FROM `order` o JOIN payment_method p ON o.payment_method_id = p.id
                                                  WHERE o.id = ? ");
        $stmt->execute([$orderID]);
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

    public function getAllOrders($userID){
        $stmt = Database::getInstance()->prepare("SELECT id
                                                  FROM `order` 
                                                  WHERE account_id = ?");

        $stmt->execute([$userID]);
        $result = $stmt->fetchAll(PDO:: FETCH_ASSOC);
        return $result;
    }

}

?>