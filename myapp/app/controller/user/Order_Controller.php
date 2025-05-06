<?php

namespace user;
// require_once __DIR__ . '/../../core/Controller.php';

class Order_Controller extends Controller
{
    protected $orderModel;
    protected $userModel;

    public function __construct()
    {
        $this->orderModel = $this->model('order');
        $this->userModel = $this->model('user');
    }

    public function infomation()
    {
        require_once __DIR__ . '/../../views/order.php';

    }

    private function calculateSubtotal($cart)
    {
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        return $subtotal;
    }

    public function checkout()
    {

        // Fake giỏ hàng nếu chưa có (chỉ dùng để test)
        // if (!isset($_SESSION['cart'])) {
        //     $_SESSION['cart'] = [
        //         [
        //             'id' => 1,
        //             'name' => 'Trà sữa truyền thống',
        //             'image' => 'trasua.jpg',
        //             'size' => 'L',
        //             'price' => 35000,
        //             'quantity' => 2,
        //             'topping_id' =>[
        //                 'Đá', 'Đường'
        //             ]
        //         ],
        //         [
        //             'id' => 2,
        //             'name' => 'Trà đào cam sả',
        //             'image' => 'trasua_moi-Photoroom.png',
        //             'size' => 'M',
        //             'price' => 40000,
        //             'quantity' => 1,
        //             'topping_id' =>[
        //                 'Đá', 'Đường'
        //             ]
        //         ]
        //     ];
        // }
        // if (!isset($_SESSION['user_id'])) {
        //     $_SESSION['user_id'] = 1; // ID user giả định
        // }


         
        // Nếu giỏ hàng trống
        if (empty($_SESSION['cart'])) {
            $error = "Giỏ hàng của bạn đang trống!";
            $cart = [];
            $userInfo = [];
            $subtotal = 0;
            $shipping_fee = 0;
            $total = 0;
            include __DIR__ . '/../../views/order/checkout.php';
            return;
        }

        $cart = $_SESSION['cart'];
        $userInfo = $this->userModel->getById($_SESSION['user_id']);
        // Fake thông tin người dùng nếu chưa có CSDL hoặc model
        // $userInfo = [
        //     'full_name' => 'Nguyễn Văn A',
        //     'email' => 'vana@example.com',
        //     'phone' => '0123456789',
        //     'address' => '123 Đường ABC, Quận 1, TP.HCM'
        // ];

        $subtotal = $this->calculateSubtotal($cart);
        $shipping_fee = 15000;
        $total = $subtotal + $shipping_fee;
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'total_price' => $total,
                'payment' => $_POST['payment'],
                'status' => 'Chưa xử lý',
                // 'province'      => $_POST['province'],
                // 'district'      => $_POST['district'],
                // 'ward'          => $_POST['ward'],
                // 'street'        => $_POST['street'],
                'shipping_fee' => $shipping_fee,
                'note' => $_POST['note'] ?? '',
                'topping_id' =>isset($_POST['topping']) ? $_POST['topping'] : [],
                'account_id' => $_SESSION['user_id']
            ];

            try {
                $orderId = $this->orderModel->create($data, $cart);
                unset($_SESSION['cart']);
                header("Location: index.php?url=order/success&id=$orderId");
                exit;
            } catch (Exception $e) {
                $error = "Lỗi đặt hàng: " . $e->getMessage();
            }
        }

        // Truyền biến vào view
        include __DIR__ . '/../../views/order/checkout.php';
    }



    public function success()
    {
        $order_id = $_GET['id'] ?? 0;
        $details = $this->orderModel->getDetails($order_id);
        include __DIR__ . '/../../views/order/success.php';

    }

    public function index(){
        $this->view("order", []);
    }
}






