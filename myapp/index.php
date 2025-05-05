<?php
    require_once "../myapp/lib/database.php";
    require_once "../myapp/config/config.php";
    require_once "../myapp/core/route.php";
    require_once APP_ROOT . "/app/controller/admin/Home_Controller.php";
    require_once "../myapp/app/Bridge.php";
    $pdo = Database::getInstance();
    
    //Nếu lần đầu sẽ không có sẵn session nhưng những lần khác kiểm tra vui lòng session_datroy để tránh lỗi

// Đặt thời gian tồn tại của session là 1 ngày
ini_set('session.gc_maxlifetime', 86400);
session_set_cookie_params(86400);

// Bật hiển thị lỗi (giúp debug)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Chạy route (điều hướng controller)
route();

?>








