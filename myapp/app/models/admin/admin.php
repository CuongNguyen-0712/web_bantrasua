<?php
require_once APP_ROOT . "/app/model/admin/admin.php";
class Home_Model
{
    private $conn;

    // private $username;
    // private $email;
    // private $password;

    // public function __construct($username, $email, $password){
    //     $this->username =  $username;
    //     $this->email =  $email;
    //     $this->password =  $password;
    // }


    public function __construct($pdo)
    {
        $this->conn = $pdo;
    }

    public function getAllAccount()
    {
        $sql = "SELECT* from `account`";
        $stmt = $this->conn->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $accounts[] = [
                'username' => $row['username'],
                'email' => $row['email'],
                'password' => $row['password'],
            ];
        }

        return $accounts;
    }

    // public function getUserName(){
    //     return $this->username;
    // }
    // public function getEmail(){
    //     return $this->email;
    // }
    // public function getPassWord(){
    //     return $this->password;
    // }
}

?>