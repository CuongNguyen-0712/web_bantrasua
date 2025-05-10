<?php

namespace admin;

class User_Controller extends Controller
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('User_Model');
    }

    public function index()
    {
        $limit = 4;
        $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

        $offset = ($currentPage - 1) * $limit;

        $users = $this->userModel->getUsersByPage($limit, $offset);

        $totalUsers = $this->userModel->getTotalUsers();
        $totalPages = ceil($totalUsers / $limit);

        $this->view('user', [
            'users' => $users,
            'offset' => $offset,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'totalUsers' => $totalUsers
        ]);
    }

    public function handleLock()
    {
        $id = $_POST['id'] ?? null;
        $status = $_POST['status'] ?? '';

        if (is_numeric($id) && ($status === '0' || $status === '1')) {
            $this->userModel->updateLockUser($id, $status);

            $_SESSION['success'] = $status === '0'
                ? 'Khóa người dùng thành công'
                : 'Mở khóa người dùng thành công';
        } else {
            $_SESSION['error'] = 'Có lỗi, vui lòng thử lại';
        }

        header('Location: /web_bantrasua/myapp/admin/user/index');
        exit();
    }

    public function handleAdd()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        if (!$username || !$email || !$phone || !$password) {
            $_SESSION['error'] = 'Vui lòng nhập thông tin đầy đủ';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Vui lòng nhập đúng cú pháp email';
        } else {
            $this->userModel->addUser($username, $email, $phone, $password);
            $_SESSION['success'] = 'Thêm người dùng thành công';
        }
        header('Location: /web_bantrasua/myapp/admin/user/index');
        exit();
    }

    public function handleModify()
    {
        $id = $_POST['id'] ?? null;
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        if (!$id || !$username || !$email || !$phone) {
            $_SESSION['error'] = 'Vui lòng nhập thông tin đầy đủ';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Vui lòng nhập đúng cú pháp email';
        } else {
            $this->userModel->modifyUser($id, $username, $email, $phone);
            $_SESSION['success'] = 'Cập nhật người dùng thành công';
        }
        header('Location: /web_bantrasua/myapp/admin/user/index');
        exit();
    }
}