<?php

namespace user;

class Purchase_Controller extends Controller{

    protected $purchaseModel;
    protected $productModel;

    public function __construct(){
        $this->purchaseModel = $this->model("Purchase_Model");
        $this->productModel = $this->model("Product_Model");
    }

    public function show() {
    $userID = $_SESSION['user']['id'] ?? null;
    $orders = $this->purchaseModel->getAllOrders($userID);

    $allProductInfo = [];
    $totalAllPrice = 0;

    foreach ($orders as $order) {
        $orderID = $order['id'];
        $status = $this->purchaseModel->getOrderStatus($orderID);
        $orderDetail = $this->purchaseModel->getOrderDetail($orderID);
        $orderTotal = 0;

        $productInfo = [];
        foreach ($orderDetail as $detail) {
            $productName = $this->purchaseModel->getProductName($detail['product_id']);
            $productSize = $this->purchaseModel->getSizeName($detail['size_id']);
            $toppingList = $this->purchaseModel->getToppingsByOrderDetailID($detail['order_id'], $detail['product_id'], $detail['size_id']);
            $img = $this->productModel->getProductByID($detail['product_id']);

            $toppingName = [];
            $toppingID = [];

            foreach ($toppingList as $topping) {
                $toppingName[] = $topping['name'];
                $toppingID[] = $topping['id'];
            }

            $quantity = $detail['quantity'];
            $productTotal = $detail['subtotal'];
            $orderTotal += $productTotal;

            if ($productName) {
                $productInfo[] = [
                    'name' => $productName['name'],
                    'size' => $productSize['name'],
                    'topping_name' => $toppingName,
                    'topping_id' => $toppingID,
                    'quantity' => $quantity,
                    'productTotal' => $productTotal,
                    'img' => $img
                ];
            }
        }

        $allProductInfo[] = [
            'order_id' => $orderID,
            'status' => $status,
            'productInfo' => $productInfo,
            'totalPrice' => $orderTotal
        ];

    }

    $this->view('purchase', [
        "orders" => $allProductInfo
    ]);
}

}

?>