<?php
require_once __DIR__ . '/../config/config.php';

class Database {
    private static $instance = null;
    private $pdo;
    
    private function __construct() {
        $config = Config::getDatabaseConfig();  

        try {
            // Kết nối ban đầu không có db
            $pdo = new PDO(
                "mysql:host={$config['host']}",
                $config['user'],
                $config['pass']
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Kiểm tra DB tồn tại
            $stmt = $pdo->query("SHOW DATABASES LIKE '{$config['name']}'");
            if ($stmt->rowCount() == 0) {
                // Tạo database nếu chưa có
                $pdo->exec("CREATE DATABASE {$config['name']}");
                
                // Dùng db và import từ file
                $pdo->exec("USE {$config['name']}");
                $sqlPath = __DIR__ . "/database.sql";
                if (file_exists($sqlPath)) {
                    $sql = file_get_contents($sqlPath);
                    $pdo->exec($sql);
                } else {
                    throw new Exception("File database.sql không tồn tại.");
                }
            }

            // Kết nối chính thức có db
            $this->pdo = new PDO(
                "mysql:host={$config['host']};dbname={$config['name']}",
                $config['user'],
                $config['pass']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("Kết nối database thất bại: " . $e->getMessage());
        }   
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }
}