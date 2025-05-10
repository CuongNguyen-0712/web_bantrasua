<?php

namespace admin;

class Auth_Controller extends Controller
{

    protected $loginModel;
    protected $email;
    protected $password;

    public function login()
    {
        $this->view('login', []);
    }

    public function handleLogin()
    {
        if (isset($_POST['email']) && isset($_POST['adminPass'])) {
            $this->email = $_POST['email'];
            $this->password = $_POST['adminPass'];

            $this->loginModel = $this->model('Login_Model');
            $result = $this->loginModel->checkLogin($this->email, $this->password);
            if (!empty($result)) {
                $_SESSION['user'] = [
                    'username' => $result['username'],
                    'email' => $this->email,
                    'id' => $result['id'],
                    'role' => 'admin'
                ];
                header('Location: /web_bantrasua/myapp/admin/home/index');
                exit();
            } else {
                $_SESSION['error'] = "Sai tài khoản hoặc mật khẩu";
                header('Location: /web_bantrasua/myapp/admin/auth/login');
                exit();
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /web_bantrasua/myapp/admin/auth/login");
        exit;
    }
}
