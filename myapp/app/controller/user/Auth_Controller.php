<?php 
namespace user;  //Sử dụng namespace sử dụng với mục đích phân quyền, của bên nào vui lòng sử dụng namespace user/admin

use Database;
use user\Auth_Model;
// Sử dụng namespace thì có thể viết tắt các model qua lại qua use

class Auth_Controller{
    public function login(){
        include APP_ROOT ."/app/view/user/login.php";
    }

    public function handleLogin(){
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $pdo = Database::getInstance();
        $auth_model = new Auth_Model($pdo);
        $user = $auth_model->getUserInfo($username);

        if($user && $user['password'] == $password){
            echo($user['username']);
            $_SESSION['user'] = [
                'username' => $user['username'],
                'role' => 'user'
            ];
            header("Location: /web_bantrasua/myapp/user/home/index");
            exit;
        }
        else{
            $_SESSION['error'] = "Tên đăng nhập hoặc mật khẩu không đúng!";
            header("Location: /web_bantrasua/myapp/user/auth/login"); //Viết đúng đườmg dẫn
            exit;
        }
    }
}

?>