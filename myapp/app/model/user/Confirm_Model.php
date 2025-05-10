<?php

namespace user;
use PDO;
use Database;
use Exception;

class Confirm_Model{

    public function getPaymentMethodName($payment_id){
        $stmt = Database::getInstance()->prepare("SELECT name 
                                                  FROM payment_method 
                                                  WHERE id = ? ");

        $stmt->execute([$payment_id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function insertOrder($account_id, $address, $payment_id, $totalBill, $ship){
        $db = Database::getInstance();

        try {
            //  Insert order
            $stmt = $db->prepare("INSERT INTO `order` 
                                    (account_id, payment_method_id, total_price, shipping_fee, province, district, ward, street) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $account_id,
                $payment_id,
                $totalBill,
                $ship,
                $address['province'],
                $address['district'],
                $address['ward'],
                $address['street']
            ]);
            $order_id = $db->lastInsertId();
            return $order_id;

        } catch (Exception $e) {
            // xuất lỗi ra để kiểm tra
            error_log("Lỗi khi insert đơn hàng: " . $e->getMessage());
            throw $e; 
        }
    }

    public function insertOrderDetail($order_id, $cart){
    $db = Database::getInstance();

    try{
        foreach ($cart as $item) {
            $sizeID = $this->getSizeID($item['size']);
            if (!$sizeID) {
                throw new Exception("Size '{$item['size']}' không tồn tại trong bảng 'size'");
            }

            $stmtDetail = $db->prepare("INSERT INTO order_details
                                        (order_id, product_id, size_id, quantity, subtotal) 
                                        VALUES (?, ?, ?, ?, ?)");
            $stmtDetail->execute([
                $order_id,
                $item['id'],
                $sizeID['id'],
                $item['quantity'],
                (int)$item['price']
            ]);

            if (!empty($item['toppings'])) {
                foreach ($item['toppings'] as $topping) {
                    if (!isset($topping['name'])) {
                        throw new Exception("Topping không có key 'name'");
                    }

                    $toppingID = $this->getToppingID($topping['name']);
                    if (!$toppingID) {
                        throw new Exception("Topping '{$topping['name']}' không tồn tại trong bảng 'topping'");
                    }

                    $stmtTopping = $db->prepare("INSERT INTO order_detail_topping
                                                (order_id, product_id, size_id, topping_id) 
                                                VALUES (?, ?, ?, ?)");
                    $stmtTopping->execute([
                        $order_id,
                        $item['id'],
                        $sizeID['id'],
                        $toppingID['id']
                    ]);
                }
            }
        }

        } catch (Exception $e) {
            echo "Insert order lỗi: " . $e->getMessage();
            throw $e; 
        }
    }


    public function getSizeID($sizeName){
        $stmt = Database::getInstance()->prepare("SELECT id 
                                                  FROM size 
                                                  WHERE name = ? ");

        $stmt->execute([$sizeName]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getToppingID($toppingName){
        $stmt = Database::getInstance()->prepare("SELECT id 
                                                  FROM topping 
                                                  WHERE name = ? ");

        $stmt->execute([$toppingName]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

}

?>