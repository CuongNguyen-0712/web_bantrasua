<?php

namespace admin;

class Order_Controller extends Controller
{
    protected $ordersModel;

    public function __construct()
    {
        $this->ordersModel = $this->model('Order_Model');
    }

    public function index()
    {
        // Thiết lập giới hạn mỗi trang
        $limit = 5;

        // Lấy trang hiện tại từ query string (?page=), mặc định là 1
        $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

        // Tính offset
        $offset = ($currentPage - 1) * $limit;

        // // Lấy dữ liệu hóa đơn có phân trang
        // $orders = $this->ordersModel->getOrdersByPage($limit, $offset);

        $filters = [
            'status' => $_GET['status'] ?? null,
            'district' => $_GET['district'] ?? null,
            'sort' => $_GET['sort'] ?? null,
            'from_date' => $_GET['from_date'] ?? '',
            'to_date' => $_GET['to_date'] ?? '',
        ];

        // Lấy danh sách đơn hàng theo filter
        $orders = $this->ordersModel->getFilteredOrders($filters, $limit, $offset);

        $addressModel = $this->model('Address_Model');
        $districts = $addressModel->getAllDistricts();
        $statuses = $this->ordersModel->getOrderStatuses();

        // // Lấy tổng số đơn hàng để phân trang
        // $totalOrders = $this->ordersModel->getTotalOrders();

        $totalOrders = $this->ordersModel->countFilteredOrders($filters);
        $totalPages = ceil($totalOrders / $limit);

        // Truyền dữ liệu sang view
        $this->view('orders', [
            'orders' => $orders,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'totalOrders' => $totalOrders,
            'offset' => $offset,
            'districts' => $districts,
            'statuses' => $statuses
        ]);
    }

    public function detail($orderId) {
        $order = $this->ordersModel->getOrderById($orderId);
        $details = $this->ordersModel->getOrderDetails($orderId);
        foreach ($details as &$detail) {
            $detail['toppings'] = $this->ordersModel->getToppings($orderId, $detail['product_id'], $detail['size_id']);
            $detail['ice']= $this->ordersModel->getIce($orderId, $detail['product_id'], $detail['size_id']);
            $detail['sugar'] = $this->ordersModel->getSugar($orderId, $detail['product_id'], $detail['size_id']);
        }


    
        // Nếu không tìm thấy đơn hàng
        if (!$order) {
            $this->view('404', []); // hoặc chuyển hướng về danh sách
            return;
        }

        $this->view('orders-detail', [
            'order' => $order,
            'details' => $details,
        ]);
    }

    //Đây là code chatGPT
    public function updateStatus() {
        $data = json_decode(file_get_contents('php://input'), true);
        $orderId = $data['orderId'] ?? null;
        $status = $data['status'] ?? null;
    
        if ($orderId && $status) {
            $success = $this->ordersModel->updateStatus($orderId, $status);
            echo json_encode(['success' => $success]);
        } else {
            echo json_encode(['success' => false]);
        }
    }
    
}
