<?php

class Login_Controller extends Controller {

    protected $loginModel;
    protected $email;
    protected $password;

    public function index() {
        
        $this->view("login", []);

        if (isset($_POST['submitType'])) {
            if (isset($_POST['email']) && isset($_POST['pass'])) {
                $this->email = $_POST['email'];
                $this->password = $_POST['pass'];
                
                $this->loginModel = $this->model("login_model");
                $result = $this->loginModel->checkLogin($this->email, $this->password);
                
                if (!empty($result)) {
                    $_SESSION['user'] = $result;//gắn link trang chủ đã đăng nhập
                    header("Location: home/index");
                    exit;
                } else {
                    $_SESSION['login_error'] = "Sai tài khoản hoặc mật khẩu";
                    header("Location: /web_bantrasua/myapp/app/login/index");
                    exit;
                }
            }
        }
    }
}
?>