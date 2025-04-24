<?php 
namespace user;

use PDO;

class Auth_Model{
    private $conn;
    
    public function __construct($pdo){
        $this->conn = $pdo;
    }
    public function getUserInfo($username){
        $stmt = $this->conn->prepare("SELECT * FROM `account` WHERE email = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>