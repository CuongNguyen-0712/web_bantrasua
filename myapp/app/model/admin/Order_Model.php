<?php

namespace admin;

class Order_Model extends Base_Model
{
    // public function getAllOrders()
    // {
    //     $query = "SELECT o.id, a.username AS customer_name, os.name AS status, o.total_price, o.order_date
    //     FROM `order` o,payment_method p,order_status os,account a
    //     WHERE o.status_id = os.id AND o.account_id = a.id";
    //     $result = $this->select($query);
    //     return $result ;
    // }

    // public function getOrdersByPage($limit, $offset) {
    //     $query = "SELECT o.id, a.username AS customer_name, os.name AS status, o.total_price, o.order_date
    //     FROM `order` o
    //     JOIN order_status os ON o.status_id = os.id
    //     JOIN account a ON o.account_id = a.id
    //     LIMIT :limit OFFSET :offset";
    //     $stmt = $this->pdo->prepare($query);
    //     $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
    //     $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // }

    // public function getTotalOrders() {
    //     $query = "SELECT COUNT(*) AS total FROM `order`";
    //     $result = $this->select($query);
    //     return $result[0]['total'] ?? 0;
    // }

    public function getOrderStatuses()
    {
        $query = "SELECT name FROM order_status";
        return $this->select($query);
    }

    public function getFilteredOrders($filters = [], $limit, $offset)
    {
        $conditions = [];
        $params = [];

        if (!empty($filters['status'])) {
            $conditions[] = 'os.name = :status';
            $params[':status'] = $filters['status'];
        }

        if (!empty($filters['district'])) {
            $conditions[] = 'o.district = :district';
            $params[':district'] = $filters['district'];
        }

        if (!empty($filters['from_date'])) {
            $conditions[] = 'o.order_date >= :from_date';
            $params[':from_date'] = $filters['from_date'];
        }

        if (!empty($filters['to_date'])) {
            $conditions[] = 'o.order_date <= :to_date';
            $params[':to_date'] = $filters['to_date'];
        }


        $where = count($conditions) ? 'WHERE ' . implode(' AND ', $conditions) : '';

        $order = '';
        if (!empty($filters['sort']) && in_array($filters['sort'], ['asc', 'desc'])) {
            $order = 'ORDER BY o.total_price ' . strtoupper($filters['sort']);
        }

        $query = "SELECT o.id, a.username AS customer_name, os.name AS status, o.total_price, o.order_date
                  FROM `order` o
                  JOIN account a ON o.account_id = a.id
                  JOIN order_status os ON o.status_id = os.id
                  $where
                  $order
                  LIMIT :limit OFFSET :offset";

        $stmt = $this->pdo->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function countFilteredOrders($filters = [])
    {
        $conditions = [];
        $params = [];

        if (!empty($filters['status'])) {
            $conditions[] = 'os.name = :status';
            $params[':status'] = $filters['status'];
        }

        if (!empty($filters['district'])) {
            $conditions[] = 'o.district = :district';
            $params[':district'] = $filters['district'];
        }

        if (!empty($filters['from_date'])) {
            $conditions[] = 'o.order_date >= :from_date';
            $params[':from_date'] = $filters['from_date'];
        }

        if (!empty($filters['to_date'])) {
            $conditions[] = 'o.order_date <= :to_date';
            $params[':to_date'] = $filters['to_date'];
        }

        $where = count($conditions) ? 'WHERE ' . implode(' AND ', $conditions) : '';

        $query = "SELECT COUNT(*) AS total
                FROM `order` o
                JOIN order_status os ON o.status_id = os.id
                $where";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchColumn();
    }

    public function getOrderById($orderId)
    {
        $query = "SELECT o.id, o.order_date, o.total_price, 
                         a.username, o.street, o.district, o.ward, o.province,
                         os.name AS status, p.name AS payment_method, o.shipping_fee
                  FROM `order` o
                  JOIN account a ON o.account_id = a.id
                  JOIN order_status os ON o.status_id = os.id
                  JOIN payment_method p ON o.payment_method_id = p.id
                  WHERE o.id = :order_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['order_id' => $orderId]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getOrderDetails($orderId)
    {
        $query = "SELECT od.product_id, od.size_id, p.name AS product_name, od.quantity, s.name AS size, od.subtotal, ps.cost AS price
                  FROM order_details od
                  JOIN size s ON od.size_id = s.id
                  JOIN product p ON od.product_id = p.id
                  JOIN product_size ps ON od.product_id = ps.product_id AND od.size_id = ps.size_id
                  WHERE od.order_id = :order_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['order_id' => $orderId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getToppings($orderID, $productId, $sizeId) {
        $query = "SELECT t.name, t.cost AS price_topping
                FROM order_detail_topping odt
                JOIN topping t ON odt.topping_id = t.id
                WHERE odt.order_id = :order_id AND odt.product_id = :product_id AND odt.size_id = :size_id";
        return $this->select($query, [
            ':order_id' => $orderID,
            ':product_id' => $productId,
            ':size_id' => $sizeId
        ]);
    }

    // 
    public function updateStatus($orderId, $status) {
        $query = "UPDATE `order`
        SET status_id = (
            SELECT id FROM order_status WHERE name = :status_name
        ) 
        WHERE id = :order_id";
        return $this->update($query, [':status_name' => $status, ':order_id' => $orderId]);
    }
    
}
