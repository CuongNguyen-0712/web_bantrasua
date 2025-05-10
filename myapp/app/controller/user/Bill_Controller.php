<!-- <?php



class Bill_Controller extends Controller{

    public function show(){
        $last_order = $_SESSION['last_order'];
        $this->view('bill', [ "cart" => $last_order['cart'],
                            "address" => $last_order['address'],
                            "totalBill" => $last_order['totalBill'],
                            "ship" => $last_order['ship'],
                            "payment" => $last_order['payment'] ]);
    }
}
?> -->