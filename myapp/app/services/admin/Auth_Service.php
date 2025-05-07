<?php 
    namespace admin;
    use PDO;
    use Config;

    class Auth_Service{
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

        public function checkLogin($username, $password){
            $sql =  "select * from `account` where email = ? and password = ? and is_admin = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$username, $password]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>