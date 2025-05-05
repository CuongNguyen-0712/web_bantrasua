<?php
require_once APP_ROOT . "/app/model/admin/admin.php";
require_once __DIR__ . "/../../../config/config.php";

class Home_Service
{

    public function getAllAccount()
    {
        try {
            $config = Config::getDatabaseConfig();
            $conn = new PDO(
                "mysql:host={$config['host']};dbname={$config['name']}",
                $config['user'],
                $config['pass']
            );

            $accounts = [];

            $sql = "SELECT * FROM `account`";
            $stmt = $conn->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $account = new Home_Model($row['username'], $row['email'], $row['password']);
                $accounts[] = $account;
            }

            return $accounts;
        } catch (PDOException $e) {
            $accounts = [];
            echo $e->getMessage();
            return $accounts;
        }
    }
}
?>