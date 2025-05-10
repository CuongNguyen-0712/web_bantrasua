<?php

namespace user;

class User_Controller extends Controller
{
    protected $userModel;
    protected $userModel1;
    public function __construct()
    {
        $this->userModel = $this->model('User_Model');
        $this->userModel1 = $this->model('Cart_Model');
    }

    public function info()
    {
        if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) {
            $_SESSION['old'] = $this->userModel->getById($_SESSION['user']['id']);
            $_SESSION['userAddress'] = $this->userModel1->getAddress($_SESSION['user']['id']);
        }
        $this->view('info', []);
    }

    // Lưu thông tin cá nhân cập nhật
    public function save()
    {
        $errors = [];
        $old = $_POST;

        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone_number = trim($_POST['phone_number'] ?? '');
        $province = trim($_POST['province'] ?? '');
        $district = trim($_POST['district'] ?? '');
        $ward = trim($_POST['ward'] ?? '');
        $street = trim($_POST['street'] ?? '');

        // Validate
        if (
            $username === '' ||
            !filter_var($email, FILTER_VALIDATE_EMAIL) ||
            !preg_match('/^[0-9]{10,11}$/', $phone_number) ||
            $province === '' ||
            $district === '' ||
            $ward === '' ||
            $street === ''
        ) {
            $errors[] = 'Vui lòng nhập đầy đủ thông tin.';
        }


        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $old;
            header('Location: /web_bantrasua/myapp/user/user/info');
            exit;
        }

        // Gọi model để cập nhật thông tin người dùng (ví dụ user đang đăng nhập)
        $userId = $_SESSION['user']['id'] ?? null;

        if ($userId) {
            $this->userModel->update($userId, [
                'username' => $username,
                'email' => $email,
                'phone_number' => $phone_number,
            ]);
            $this->userModel1->update($userId, [
                'province' => $province,
                'district' => $district,
                'ward' => $ward,
                'street' => $street
            ]);
            if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) {
                $_SESSION['old'] = $this->userModel->getById($_SESSION['user']['id']);
                $_SESSION['userAddress'] = $this->userModel1->getAddress($_SESSION['user']['id']);
            }
            $_SESSION['success'] = 'Cập nhật thông tin thành công!';
        }

        header('Location: /web_bantrasua/myapp/user/user/info');
        exit;
    }


    public function register()
    {
        unset($_SESSION['success']);
        unset($_SESSION['errorRegister']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';
            $isMember = isset($_POST['is_member']) ? 1 : 0;

            if ($password !== $confirm_password) {
                $_SESSION['errorRegister'] = "Mật khẩu không khớp!";
                return $this->view('register', []);
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['errorRegister'] = "Email không hợp lệ!";
                return $this->view('register', []);
            }

            // Gọi model để lưu
            $success = $this->userModel->register($name, $email, $password, $isMember);
            if ($success) {
                $id = $this->userModel->returnIdUserAfterRegister();
                $_SESSION['user'] = [
                    'email' => $email,
                    'role' => 'user',
                    'id' => $id['id']
                ];
                header("Location: /web_bantrasua/myapp/user/home/index");
                exit;
            } else {
                $_SESSION['errorRegister'] = "Đăng ký thất bại. Email có thể đã tồn tại.";
                return $this->view('register', []);
            }
        } else {
            // GET request: hiển thị form

            $this->view('register', []);;
        }
    }


    public function showRegister()
    {
        $this->view('register', []);
    }
}
