<?php
namespace user;
use Exception;
use Database;
use PDO;

class Confirm_Controller extends Controller{

    protected $confirmModel;

    public function __construct(){
        $this->confirmModel = $this->model('Confirm_Model');
    }


    public function show(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
           
            if( !isset($_POST['payment_method']) ){
                echo "<script>alert('Vui lòng chọn phương thức thanh toán');  window.history.back();</script>";
                return;
            }

            if( !isset($_POST['checkboxid']) ){
                echo "<script>alert('Vui lòng đồng ý điều khoản và chính sách');  window.history.back();</script>";
                return;
            }

           $payment_id = $_POST['payment_method'];
           $_SESSION['payment_id'] = $payment_id;
           $payment_name = $this->confirmModel->getPaymentMethodName($payment_id);

           $address = $_SESSION['address'] ?? null;

           $cart = $_SESSION['cart'] ?? [];

            if( !empty($_SESSION['cart']) ){
                $total = 0;
                foreach ($_SESSION['cart'] as $item) {
                    $total += $item['price'] * $item['quantity'];
                }
                $ship = 30000;
                $totalBill = $total + $ship;
                $_SESSION['ship'] = $ship;
                $_SESSION['totalBill'] = $totalBill;
            }

            $this->view('confirm', ["payment" => $payment_name,
                                    "address" => $address,
                                    "cart" => $cart,
                                    "totalBill" => $totalBill ]);
        }
    }

    public function handleConfirm(){
        $account_id = $_SESSION['user']['id'];
        $address = $_SESSION['address'];
        $payment_id = $_SESSION['payment_id'];
        $totalBill = $_SESSION['totalBill'];
        $ship = $_SESSION['ship'];
        $cart = $_SESSION['cart'];
        
        if (!isset($_SESSION['user'], $_SESSION['address'], $_SESSION['payment_id'], $_SESSION['totalBill'], $_SESSION['ship'], $_SESSION['cart'])) {
            echo "<script>alert('Thông tin đơn hàng không đầy đủ. Vui lòng thử lại.'); window.location.href='/web_bantrasua/myapp/user/Cart/store';</script>";
            return;
        }

        try {
            $db = Database::getInstance();

            $orderId =$this->confirmModel->insertOrder($account_id, $address, $payment_id, $totalBill, $ship);

            $this->confirmModel->insertOrderDetail($orderId, $cart);
       
        } catch (Exception $e) {
       
        // hiển thị thông báo nếu có lỗi
        echo "<script>alert('Đã xảy ra lỗi khi đặt hàng: " . $e->getMessage() . "'); window.history.back();</script>";
        return;
        }

        $this->view('bill', ['cart' => $cart,
                            'address' => $address,
                            'totalBill' => $totalBill,
                            'ship' => $ship,
                            'payment' => $this->confirmModel->getPaymentMethodName($payment_id) ]);
        unset($_SESSION['cart'], $_SESSION['totalBill'], $_SESSION['totalProduct'], $_SESSION['payment_id']);

    }
}

?>