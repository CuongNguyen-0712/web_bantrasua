<?php

namespace user;

class User_Controller extends Controller
{
    // protected $userModel;
    // public function __construct()
    // {
    //     $this->userModel = $this->model('user');
    // }

    public function info()
    {
        $this->view('info',[]);
    }

    // Lưu thông tin cá nhân cập nhật
    public function save()
    {
        $errors = [];
        $old = $_POST;

        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $city = trim($_POST['city'] ?? '');
        $district = trim($_POST['district'] ?? '');
        $ward = trim($_POST['ward'] ?? '');
        $address = trim($_POST['address'] ?? '');

        // Validate
        if (
            $name === '' ||
            !filter_var($email, FILTER_VALIDATE_EMAIL) ||
            !preg_match('/^[0-9]{10,11}$/', $phone) ||
            $city === '' ||
            $district === '' ||
            $ward === '' ||
            $address === ''
        ) {
            $errors[] = 'Vui lòng nhập đầy đủ thông tin.';
        }
        

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $old;
            header('Location: index.php?url=user/info');
            exit;
        }

        // Gọi model để cập nhật thông tin người dùng (ví dụ user đang đăng nhập)
        $userId = $_SESSION['user_id'] ?? null;

        if ($userId) {
            $this->userModel->update($userId, [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'city' => $city,
                'district' => $district,
                'ward' => $ward,
                'address' => $address
            ]);



            $_SESSION['success'] = 'Cập nhật thông tin thành công!';
        }

        header('Location: index.php?url=user/info');
        exit;
    }


    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';
            $isMember = isset($_POST['is_member']) ? 1 : 0;

            if ($password !== $confirm_password) {
                $error = "Mật khẩu không khớp!";
                require_once __DIR__ . '/../../view/register.php';
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Email không hợp lệ!";
                require_once __DIR__ . '/../../view/register.php';

                return;
            }

            // Gọi model để lưu
            $success = $this->userModel->register($name, $email, $password, $isMember);

            if ($success) {
                $_SESSION['success'] = 'Đăng ký tài khoản thành công!';
                require_once __DIR__ . '/../../view/register.php';
                unset($_SESSION['success']); // Xóa sau khi hiển thị
                return;
            } else {
                $error = "Đăng ký thất bại. Email có thể đã tồn tại.";
                require_once __DIR__ . '/../../view/register.php';

                return;
            }
        } else {
            // GET request: hiển thị form

            require_once __DIR__ . '/../../view/register.php';
        }
    }
}




