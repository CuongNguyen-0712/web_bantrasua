<?php
namespace user;

class Process_Controller extends Controller{

    protected $processModel;

    public function __construct(){
        $this->processModel = $this->model("Purchase_Model");
    }

    public function show($orderID){
        $userID = $_SESSION['user']['id'];
        // $orderID = $this->processModel->getOrderID($userID);

        $totalPrice = $this->processModel->getOrderID($orderID);

        //lấy trạng thái đơn
        $status = $this->processModel->getOrderStatus($orderID);

        //trả về order_id, product_id, size_id, quantity, subtotal
        $orderDetail = $this->processModel->getOrderDetail($orderID);

        //lấy phương thức thanh toán
        $payment = $this->processModel->getPayment_Method($orderID);

        //lấy phí ship
        $shipping_fee = $this->processModel->getOrderID($orderID);

        
        //lấy thông tin sản phẩm
        $productInfo = [];
        foreach($orderDetail as $detail){
            $productName =  $this->processModel->getProductName($detail['product_id']);
            $productSize =  $this->processModel->getSizeName($detail['size_id']);
            $toppingList = $this->processModel->getToppingsByOrderDetailID($detail['order_id'], $detail['product_id'], $detail['size_id']);
            
            $toppingName = [];
            $toppingID = [];

            foreach($toppingList as $topping){
                $toppingName[] = $topping['name'];
                $toppingID[] = $topping['id'];
            }

            $quantity = $detail['quantity'];
            $productTotal = $detail['subtotal'];
            
            if($productName){
                $productInfo[] = ['name' => $productName['name'],
                'size' => $productSize['name'],
                'topping_name' => $toppingName,
                'topping_id' => $toppingID,
                'quantity' => $quantity,
                'productTotal' =>  $productTotal,]; 
            }
        }
        //tính tổng đơn
        $total = 0;
        foreach($orderDetail as $detail){
            $productTotal = $detail['subtotal'];
            $total += $productTotal;
        }
        
        $this->view('process', ["status" => $status, 
                                "productInfo" => $productInfo,
                                "totalPrice" => $totalPrice,
                                "payment" => $payment,
                                "ship" => $shipping_fee,
                                "total" => $total,
                                "order_id" => $orderID
                                 ]);

    }

}
?>