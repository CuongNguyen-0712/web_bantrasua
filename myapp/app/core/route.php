<?php

require_once APP_ROOT . '/config/config.php';

// Đây là phần autoload controller, việc nó là tự động xây dựng những controller, do phần này có phân quyền nên mới làm vậy để định dạng 
spl_autoload_register(function ($class) {
    $path = APP_ROOT . '/app/controller/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

spl_autoload_register(function ($class) {
    $path = APP_ROOT . '/app/model/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

function route()
{
    $url = $_GET['url'] ?? 'user/home/index';   //bây giờ params sẽ tới cần 3 đối số lần lượt là quyền hạn, controller và method
    $segments = explode('/', trim($url, '/'));

    $roleSegment = $segments[0] ?? 'user';         // admin hoặc user
    $controllerSegment = $segments[1] ?? 'home';
    $methodName = $segments[2] ?? 'index';
    $params = array_slice($segments, 3);

    $controllerName = ucfirst($controllerSegment) . '_Controller';
    $namespace = strtolower($roleSegment);
    $fullClassName = $namespace . '\\' . $controllerName; //điểm cần lưu ý để khi làm bên nhưng cái như controller, model cần chú ý namespace định dạng luồng phân quyền
    $controllerPath = APP_ROOT . "/app/controller/{$namespace}/{$controllerName}.php";

    // Danh sách các public route, nhớ kiểm tra phần này vì sẽ có khả năng bị block hoặc vướng lỗi kiểm tra nếu nhập đường dẫn khác ở đây
    $publicRoutes = [
        'user' => [
            'auth/login',
            'auth/handleLogin',
        ],
        'admin' => [
            'auth/login',
            'auth/handleLogin',
        ],
    ];

    $currentRoute = "{$controllerSegment}/{$methodName}";
    $isPublicRoute = in_array($currentRoute, $publicRoutes[$namespace] ?? []);

    // 🔒 Phân quyền
    if (!isset($_SESSION['user'])) {
        if (!$isPublicRoute) {
            header("Location: /web_bantrasua/myapp/{$namespace}/auth/login");
            exit;
        }
    } else {
        $role = $_SESSION['user']['role'];
        if ($namespace === 'admin' && $role !== 'admin') {
            echo "⛔ Bạn không có quyền truy cập trang quản trị!";
            exit;
        }
        if ($namespace === 'user' && $role !== 'user') {
            echo "⛔ Bạn không có quyền truy cập trang người dùng!";
            exit;
        }
    }

    // Gọi controller và method
    if (file_exists($controllerPath)) {
        require_once $controllerPath;
        if (class_exists($fullClassName)) {
            $controller = new $fullClassName();
            if (method_exists($controller, $methodName)) {
                call_user_func_array([$controller, $methodName], $params);
            } else {
                echo "⚠️ Method '$methodName' không tồn tại trong '$fullClassName'.";
            }
        } else {
            echo "⚠️ Lớp '$fullClassName' không tồn tại.";
        }
    } else {
        echo "⚠️ Không tìm thấy file: $controllerPath";
    }
}
