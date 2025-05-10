<?php 
namespace admin;

class Topping_Model extends Base_Model
{

    public function getToppingById($toppingId) {
        $query = "SELECT * FROM topping WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':id', $toppingId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getToppingsByPage($limit, $offset) {
        $query = "SELECT * FROM topping
        WHERE id > 6
        LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTotalToppings() {
        $query = "SELECT COUNT(*) AS total FROM topping WHERE id > 6";
        $result = $this->select($query);
        return $result[0]['total'] ?? 0;
    }

    public function getNewToppingId() {
        $query = "SELECT id FROM topping ORDER BY id DESC LIMIT 1";
        $result = $this->select($query);
        return $result[0]['id'] + 1;
    }

    public function insertTopping($toppingId, $name, $cost) {
        $query = "INSERT INTO topping (id, name, cost) VALUES (:id, :name, :cost)";
        return $this->insert($query, [
            ':id' => $toppingId,
            ':name' => $name,
            ':cost' => $cost,
        ]);
    }

    public function deleteTopping($toppingId) {
        $query1 = "DELETE FROM order_detail_topping WHERE topping_id = :id";
        $query2 = "DELETE FROM topping WHERE id = :id";

        $this->delete($query1, [':id' => $toppingId]);
        return $this->delete($query2, [':id' => $toppingId]);
    }

    public function updateTopping($toppingId, $name, $cost) {
        $query = "UPDATE topping SET name = :name, cost = :cost WHERE id = :id";
        return $this->update($query, [
            ':id' => $toppingId,
            ':name' => $name,
            ':cost' => $cost,
        ]);
    }
}
?>