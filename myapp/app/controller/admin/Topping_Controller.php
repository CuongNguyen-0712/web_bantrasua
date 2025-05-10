<?php 
namespace admin;

class Topping_Controller extends Controller
{
    private $toppingModel;

    public function __construct()
    {
        $this->toppingModel = $this->model('Topping_Model');
    }

    public function index()
    {
        // Thiết lập giới hạn mỗi trang
        $limit = 10;

        // Lấy trang hiện tại từ query string (?page=), mặc định là 1
        $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

        // Tính offset
        $offset = ($currentPage - 1) * $limit;

        // Lấy danh sách topping có phân trang
        $toppings = $this->toppingModel->getToppingsByPage($limit, $offset);

        // Lấy tổng số topping để phân trang
        $totalToppings = $this->toppingModel->getTotalToppings();
        $totalPages = ceil($totalToppings / $limit);

        // Truyền dữ liệu sang view
        $this->view('topping', [
            'toppings' => $toppings,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'totalToppings' => $totalToppings,
            'offset' => $offset,
        ]);
    }

    public function add()
    {
        $this->view('topping-add');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $cost = $_POST['cost'];

            // Lấy ID topping mới
            $toppingId = $this->toppingModel->getNewToppingId();
            // Lưu topping vào cơ sở dữ liệu
            $this->toppingModel->insertTopping($toppingId , $name, $cost);

            // Chuyển hướng về trang danh sách topping
            header('Location: /web_bantrasua/myapp/admin/topping');
            exit();
        }
    }

    public function edit($toppingId)
    {
        $topping = $this->toppingModel->getToppingById($toppingId);
        $this->view('topping-change', ['topping' => $topping]);

    }

    public function update($toppingId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $cost = $_POST['cost'];

            // Cập nhật topping vào cơ sở dữ liệu
            $this->toppingModel->updateTopping($toppingId, $name, $cost);

            // Chuyển hướng về trang danh sách topping
            header('Location: /web_bantrasua/myapp/admin/topping');
            exit();
        }
    }

    public function delete($toppingId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['confirm'])) {
                $this->toppingModel->deleteTopping($toppingId);
            }

            header('Location: /web_bantrasua/myapp/admin/topping');
            exit;

        }
        $this->view('del-topping', ['toppingId' => $toppingId]);
    }

}
?>