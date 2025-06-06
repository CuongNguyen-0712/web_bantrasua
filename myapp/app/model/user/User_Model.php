<?php

namespace user;

use Database;
use PDO;

class User_Model
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance(); // Giả sử trả về PDO
    }

    // Sửa chỗ dùng fetch() sai cách
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM account WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function returnIdUserAfterRegister()
    {
        $stmt = $this->db->prepare("SELECT account.id FROM account ORDER BY account.id DESC LIMIT 1 ");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE account SET username = ?, phone_number = ?, email = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['username'],
            $data['phone_number'],
            $data['email'],
            $id
        ]);
    }

    public static function register($name, $email, $password)
    {
        $db = Database::getInstance();

        // Kiểm tra email đã tồn tại chưa
        $checkSql = "SELECT id FROM account WHERE email = :email";
        $checkStmt = $db->prepare($checkSql);
        $checkStmt->execute(['email' => $email]);

        if ($checkStmt->fetch(PDO::FETCH_ASSOC)) {
            // Email đã tồn tại
            return ['success' => false, 'message' => 'Email đã được đăng ký.'];
        }

        // Nếu chưa tồn tại, tiến hành đăng ký
        $sql = "INSERT INTO account (username, email, password) 
                VALUES (:username, :email, :password)";
        $stmt = $db->prepare($sql);

        $success = $stmt->execute([
            'username' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        $rawData = "SELECT id FROM account WHERE email = :email";
        $rawStmt = $db->prepare($rawData);
        $rawStmt->execute(['email' => $email]);
        $id = $rawStmt->fetch(PDO::FETCH_ASSOC);

        $insertSql = "INSERT INTO address (account_id) VALUES (:id)";
        $insertStmt = $db->prepare($insertSql);
        $insertStmt->execute(['id' => $id['id']]);

        return ['success' => $success, 'message' => $success ? 'Đăng ký thành công!' : 'Đăng ký thất bại.'];
    }

    public static function updateInfo($id, $data)
    {
        $db = Database::getInstance();
        $sql = "UPDATE account  SET 
                    name = ?, 
                    phone = ?, 
                    email = ?, 
                    district = ?, 
                    city = ?, 
                    address = ?, 
                    ward = ? 
                WHERE id = ?";

        $stmt = $db->prepare($sql);
        return $stmt->execute([
            $data['name'],
            $data['phone'],
            $data['email'],
            $data['district'],
            $data['city'],
            $data['address'],
            $data['ward'],
            $id
        ]);
    }
}
