<?php
// require_once APP_ROOT . "/app/services/admin/Home_Service.php";
require_once APP_ROOT . "/app/model/admin/admin.php";
require_once __DIR__ . "/../../../config/config.php";
// Của a CUuo7ng2   
class Home_Controller
{
    private $pdo;

    public function index()
    {
        try {
            $config = Config::getDatabaseConfig();
            $pdo = new PDO(
                "mysql:host={$config['host']};dbname={$config['name']}",
                $config['user'],
                $config['pass']
            );
        } catch (PDOException $e) {
            echo ($e->getMessage());
        }

        $home_model = new Home_Model($pdo);
        $accounts = $home_model->getAllAccount();

        include APP_ROOT . "/app/view/admin/index.php";
    }

    public function home()
    {

        include APP_ROOT . "/app/view/admin/admin.php";
    }
}
?>