<?php


class Order
{
    public static function create($data, $cart)
    {
        $db = Database::getInstance(); // PDO object
        $db->beginTransaction();

        try {
            // Tạo đơn hàng
            $sql = "INSERT INTO orders (total_price, payment, status, province, district, ward, street, shipping_fee, note, account_id)
                    VALUES (:total_price, :payment, :status, :province, :district, :ward, :street, :shipping_fee, :note, :account_id)";
            $stmt = $db->prepare($sql);
          

            // Lấy ID đơn hàng mới tạo
            $orderId = $db->lastInsertId();

            // Tạo chi tiết đơn hàng
            foreach ($cart as $item) {
                $sqlDetail = "INSERT INTO order_details (order_id, product_id, size, quantity, price, subtotal)
                              VALUES (:order_id, :product_id, :size, :quantity, :price, :subtotal)";
                $stmtDetail = $db->prepare($sqlDetail);

                $stmtDetail->execute([
                    'order_id' => $orderId,
                    'product_id' => $item['id'],
                    'size' => $item['size'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $item['price'] * $item['quantity']
                ]);
            }

            $db->commit();
            return $orderId;
        } catch (Exception $e) {
            $db->rollBack();
            throw $e;
        }
    }

    public static function getByAccount($account_id)
    {
        $db = Database::getInstance();
        return $db->fetchAll("SELECT * FROM `order` WHERE account_id = ?", [$account_id]);
    }



    public static function getDetails($order_id)
    {
        $db = Database::getInstance();
        $sql = "SELECT * FROM order_details WHERE order_id = :order_id";
        $stmt = $db->prepare($sql);
        $stmt->execute(['order_id' => $order_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}