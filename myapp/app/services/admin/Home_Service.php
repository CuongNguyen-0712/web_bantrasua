<?php
namespace admin;
require_once APP_ROOT . "/app/model/admin/Home_Model.php";

use PDO;
use Config;

class Home_Service {
    private $conn;
    public function __construct()
    {
        $config = Config::getDatabaseConfig();
        $this->conn = new PDO(
            "mysql:host={$config['host']};dbname={$config['name']}",
            $config['user'],
            $config['pass']
        );
    }
    public function getAllAccount(){    
            $accounts = [];

            $sql = "SELECT * FROM `account`";
            $stmt = $this->conn->query($sql);
            while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){
                $account = new Home_Model($row['username'], $row['email'], $row['password']);
                $accounts[] = $account;
            }

            return $accounts;
        }
}
?>