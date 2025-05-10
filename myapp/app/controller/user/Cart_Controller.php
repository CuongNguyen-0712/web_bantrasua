<?php

namespace user;

class Cart_Controller extends Controller
{

    protected $cartModel;
    protected $productModel;
    protected $purchaseModel;

    public function __construct()
    {
        $this->cartModel = $this->model("Cart_Model");
        $this->productModel = $this->model("Product_Model");
        $this->purchaseModel = $this->model("Purchase_Model");
    }

    public function store()
    {
        $this->showAddressAndPhoneNumber();
    }

    public function showAddressAndPhoneNumber()
    {
        $user_id = $_SESSION['user']['id'] ?? null;
        $cart = $_SESSION['cart'] ?? [];
        $totalBill = 0;

        if (!empty($_SESSION['cart'])) {
            $total = 0;
            foreach ($_SESSION['cart'] as $item) {
                $total += $item['price'] * $item['quantity'];
            }
            $ship = 30000;
            $totalBill = $total + $ship;
        }


        if (isset($_SESSION['user'])) {

            $address = $this->cartModel->getAddress($user_id);
            $phoneNumber = $this->cartModel->getPhoneNumber($user_id);
            $userName = $this->cartModel->getUserName($user_id);

            $addressFinal = $_SESSION['new_Address'][$user_id] ?? $address;
            $_SESSION['address'] = $addressFinal;

            $this->view('cart&payment', [
                "address" => $addressFinal,
                "phone" => $phoneNumber,
                "user_name" => $userName,
                "cart" => $cart,
                "totalBill" => $totalBill
            ]);

            $this->view('address', ["address" => $addressFinal]);
        }
    }

    public function saveAddress()
    {
        if (isset($_POST['newAddress'])) {
            $user_id = $_SESSION['user']['id'];
            $addressArray = explode(",", $_POST['newAddress']);     //vui lòng nhập đủ 4 đối số
            $_SESSION['new_Address'][$user_id] = [
                'street' => $addressArray[0],
                'ward' =>  $addressArray[1],
                'district' =>  $addressArray[2],
                'province' =>  $addressArray[3],
            ];
            header("Location: /web_bantrasua/myapp/user/Cart/store");
            exit;
        }
    }
}
