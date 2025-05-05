<?php

namespace user;

class Purchase_Controller extends Controller{

    protected $purchaseModel;

    public function __construct(){
        $this->purchaseModel = $this->model("Purchase_Model");
    }

    public function show(){

        $userID = $_SESSION['user']['id'];
        $orderID = $this->purchaseModel->getOrderID($userID);

        //lấy trạng thái đơn
        $status = $this->purchaseModel->getOrderStatus($orderID['id']);

        //trả về product_id, size_id
        $orderDetail = $this->purchaseModel->getOrderDetail($orderID['id']);

        //lấy thông tin sản phẩm
        $productInfo = [];
        foreach($orderDetail as $detail){
            $productName =  $this->purchaseModel->getProductName($detail['product_id']);
            $productSize =  $this->purchaseModel->getSizeName($detail['size_id']);
            if($productName && $productSize){
                $productInfo[] = ['name' => $productName['name'],
                                  'size' => $productSize['name']
                                 ]; 
            }
        }
        
        $this->view('purchase', ["status" => $status, 
                                 "productInfo" => $productInfo
                                 ]);



    }
}

?>