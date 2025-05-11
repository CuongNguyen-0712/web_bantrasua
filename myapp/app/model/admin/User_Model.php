<?php

namespace admin;

class User_Model extends Base_Model
{
    public function getUsersByPage($limit, $offset)
    {
        $query = "SELECT a.id, a.username, a.email, a.phone_number, a.password, a.status, a.create_time
        FROM account a
        where a.is_admin = 0
        LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTotalUsers()
    {
        $query = "SELECT COUNT(*) AS total FROM account";
        $result = $this->select($query);
        return $result[0]['total'] ?? 0;
    }

    public function updateLockUser($id, $status)
    {
        $query = "UPDATE account SET status = :status WHERE id = :id";
        $this->update($query, [':id' => $id, 'status' => $status]);
    }

    public function addUser($username, $email, $phone, $password)
    {
        $query = "INSERT INTO account (username, email, phone_number, password) VALUES (:username, :email, :phone, :password)";
        $this->insert($query, [':username' => $username, ':email' => $email, ':phone' => $phone, ':password' => $password]);
    }

    public function modifyUser($id, $username, $email, $phone)
    {
        $query = "UPDATE account SET username = :username, email = :email, phone_number = :phone WHERE id = :id";
        $this->update($query, [':id' => $id, ':username' => $username, ':email' => $email, ':phone' => $phone]);
    }
}
