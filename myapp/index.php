<?php
// Đặt thời gian tồn tại của session là 1 ngày
ini_set('session.gc_maxlifetime', 86400);
session_set_cookie_params(86400);

session_start();
// Bật hiển thị lỗi (giúp debug)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// session_start();
// Load các file cần thiết

require_once('./config/config.php');    
require_once('./lib/database.php');
require_once('./app/core/route.php');

// Chạy route (điều hướng controller)
route();

$url = $_GET['url'] ?? 'home/index';
$url = explode('/', $url);

$controllerName = ucfirst($url[0]) . 'Controller';
$actionName = $url[1] ?? 'index';







