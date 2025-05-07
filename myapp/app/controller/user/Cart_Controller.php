<?php

namespace User;

class Cart_Controller extends Controller{

    protected $addressModel;
    protected $productModel;
    
    public function __construct(){
        $this->addressModel = $this->model("Cart_Model");
        $this->productModel = $this->model("Product_Model");
    }

    public function store(){
        $this->showAddressAndPhoneNumber();

    }
    
    public function showAddressAndPhoneNumber(){
        $user_id = $_SESSION['user']['id'] ?? null;

        if( isset($_SESSION['user']) ){

            $address = $this->addressModel->getAddress($user_id);
            $phoneNumber = $this->addressModel->getPhoneNumber($user_id);
            $userName = $this->addressModel->getUserName($user_id);

            $addressFinal = $_SESSION['new_Address'][$user_id] ?? $address;

            $this->view('cart&payment', ["address" => $addressFinal, "phone" => $phoneNumber, "user_name" => $userName]);
            $this->view('address', ["address" => $addressFinal]);
        }
    }
    public function saveAddress(){
        if( isset($_POST['newAddress']) ){
            $user_id = $_SESSION['user']['id'];
            $addressArray = explode(",", $_POST['newAddress']);
            $_SESSION['new_Address'][$user_id] = [ 'street' => $addressArray[0],
                                         'ward' =>  $addressArray[1],
                                         'district' =>  $addressArray[2],
                                         'province' =>  $addressArray[3],
            ];
            header("Location: /web_bantrasua/myapp/user/Cart/store");
            exit;
        }
    }

    public function showCart(){
        $cart = $_SESSION['cart'] ?? [];

        $this->view('cart&payment', ["cart" => $cart] );
    }

}
?>