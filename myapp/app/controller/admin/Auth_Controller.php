<?php

namespace admin;

require_once APP_ROOT . "/app/services/admin/Auth_Service.php";

class Auth_Controller
{
    public function login()
    {
        include APP_ROOT . "/app/view/admin/login.php";
    }


    public function handleLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $home_service = new Auth_Service();
        $result = $home_service->checkLogin($username, $password);

        if (!empty($result)) {
            $_SESSION['user'] = [
                'username' => $username,
                'role' => 'admin'
            ];
            header("Location: /web_bantrasua/myapp/admin/home/index");
            exit;
        } else {
            $_SESSION['error'] = "Sai tài khoản hoặc mật khẩu";
            header("Location: /web_bantrasua/myapp/admin/auth/login");
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /web_bantrasua/myapp/admin/auth/login");
        exit;
    }
}