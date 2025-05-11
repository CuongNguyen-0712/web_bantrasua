<?php

namespace admin;

class Statistics_Model extends Base_Model
{
    public function getTotalCost()
    {
        $query = "SELECT SUM(total_price) AS total FROM `order`";
        $result = $this->select($query);
        return $result[0]['total'] ?? 0;
    }

    public function getTotalOrder()
    {
        $query = "SELECT COUNT(*) AS total FROM `order`";
        $result = $this->select($query);
        return $result[0]['total'] ?? 0;
    }

    public function getTotalMember()
    {
        $query = "SELECT COUNT(*) AS total FROM product";
        $result = $this->select($query);
        return $result[0]['total'] ?? 0;
    }

    public function getStatistics($start, $end)
    {
        $query = "WITH checkAcc AS (
                SELECT 
                a.id AS account_id, 
                a.username AS username, 
                SUM(o.total_price) AS totalCost, 
                COUNT(o.id) AS totalOrder 
                    FROM account a
                    JOIN `order` o ON o.account_id = a.id
                    WHERE o.order_date BETWEEN :start AND :end
                    GROUP BY a.id, o.id
                )

                SELECT *
                FROM checkAcc
                ORDER BY totalCost DESC
                LIMIT 5;
                ";
        $result = $this->select($query, [':start' => $start, ':end' => $end]);
        return $result;
    }

    public function getDetail($index)
    {
        $query = "SELECT   
        o.id AS order_id,
        p.name AS name,
        s.name AS size,
        COALESCE(GROUP_CONCAT(t.name SEPARATOR ', '), 'Không có') AS topping,
        od.quantity AS quantity,
        od.subtotal AS total,
        p.cost_default AS cost
        FROM order_details od
        JOIN `order` o ON o.id = od.order_id
        JOIN product_size ps ON ps.product_id = od.product_id AND ps.size_id = od.size_id
        JOIN product p ON p.id = od.product_id
        JOIN size s ON s.id = od.size_id
        LEFT JOIN order_detail_topping odt 
            ON odt.order_id = od.order_id 
            AND odt.product_id = ps.product_id 
            AND odt.size_id = ps.size_id
        LEFT JOIN topping t ON t.id = odt.topping_id
        WHERE o.account_id = :index
        GROUP BY o.id, od.product_id, od.size_id
        ORDER BY o.id DESC
        ";
        $result = $this->select($query, [':index' => $index]);
        return $result ?? [];
    }
}
