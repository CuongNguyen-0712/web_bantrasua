<?php

namespace user;  //Sử dụng namespace sử dụng với mục đích phân quyền, của bên nào vui lòng sử dụng namespace user/admin

// Sử dụng namespace thì có thể viết tắt các model qua lại qua use

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

        if (isset($_POST['email']) && isset($_POST['pass'])) {
            $this->email = $_POST['email'];
            $this->password = $_POST['pass'];

            $this->loginModel = $this->model("Auth_Model");
            $result = $this->loginModel->checkLogin($this->email, $this->password);

            if (!empty($result)) {
                $_SESSION['user'] = [
                    'email' => $result['email'],
                    'role' => 'user',
                    'id' => $result['id']
                ];

                header("Location: /web_bantrasua/myapp/user/home/index");
                exit;
            } else {
                $_SESSION['error'] = "Sai tài khoản hoặc mật khẩu";
                header("Location: /web_bantrasua/myapp/user/auth/login");
                exit;
            }
        }
    }
    public function logout()
    {
        session_destroy();
        header("Location: /web_bantrasua/myapp/user/home/index");
        exit;
    }
}
