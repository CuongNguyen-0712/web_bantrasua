<?php
    require_once "../myapp/lib/database.php";
    require_once "../myapp/config/config.php";
    require_once "../myapp/core/route.php";
    require_once APP_ROOT . "/app/controller/admin/Home_Controller.php";
    require_once "../myapp/app/Bridge.php";
    $pdo = Database::getInstance();
    route();
?>