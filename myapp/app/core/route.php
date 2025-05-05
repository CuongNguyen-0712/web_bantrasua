<?php

require_once APP_ROOT . '/config/config.php';

function isAdminRoute($controllerName)
{
    return strpos(strtolower($controllerName), 'admin') !== false;
}

function isAuthenticated()
{
    return isset($_SESSION['user']);
}

function isAdmin()
{
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
}

function route()
{
    $url = $_GET['url'] ?? 'home/index';
    $segments = explode('/', trim($url, '/'));

    $controllerName = ucfirst($segments[0]) . '_Controller';
    $controllerFolder = isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin' ? 'admin' : 'user';
    $methodName = $segments[1] ?? 'index';
    $params = array_slice($segments, 2);

    // 🔐 PHÂN QUYỀN
    if (isAdminRoute($controllerName)) {
        if (!isAuthenticated()) {
            echo "❌ Bạn chưa đăng nhập!";
            return;
        }
        if (!isAdmin()) {
            echo "⛔ Bạn không có quyền truy cập admin!";
            return;
        }
    }

    // ✅ Tiếp tục routing nếu hợp lệ
    $controllerPath = APP_ROOT . "/app/controller/{$controllerFolder}/{$controllerName}.php";

    if (file_exists($controllerPath)) {
        require_once $controllerPath;

        if (class_exists($controllerName)) {
            $controller = new $controllerName();

            if (method_exists($controller, $methodName)) {
                call_user_func_array([$controller, $methodName], $params);
            } else {
                echo "⚠️ Method '$methodName' not found in $controllerName.";
            }
        } else {
            echo "⚠️ Controller class '$controllerName' not found.";
        }
    } else {
        echo "⚠️ Controller file not found: $controllerPath";
    }
}

