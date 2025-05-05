<?php
<<<<<<< HEAD
namespace admin;
=======

namespace admin;

>>>>>>> c38c20f (fix merge conflic)
require_once APP_ROOT . "/app/model/admin/Home_Model.php";

use PDO;
use Config;

<<<<<<< HEAD
class Home_Service {
=======
class Home_Service
{
>>>>>>> c38c20f (fix merge conflic)
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
<<<<<<< HEAD
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
=======
    public function getAllAccount()
    {
        $accounts = [];

        $sql = "SELECT * FROM `account`";
        $stmt = $this->conn->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $account = new Home_Model($row['username'], $row['email'], $row['password']);
            $accounts[] = $account;
        }

        return $accounts;
    }
>>>>>>> c38c20f (fix merge conflic)
}
