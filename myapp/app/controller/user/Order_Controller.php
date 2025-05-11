<?php

namespace user;
// require_once __DIR__ . '/../../core/Controller.php';

class Order_Controller extends Controller
{
    protected $orderModel;
    protected $userModel;
    protected $productModel;
    
    public function __construct()
    {
        $this->orderModel = $this->model('Order_Model');
        $this->userModel = $this->model('User_Model');
        $this->productModel = $this->model('Product_Model');
    }

    public function infomation()
    {
        require_once __DIR__ . '/../../views/order.php';
    }

    // Phương thức hiển thị chi tiết sản phẩm và các tùy chọn
    public function viewProduct()
    {
        // Lấy product_id từ query string
        $product_id = isset($_GET['id']) ? intval($_GET['id']) : null;
        
        if (!$product_id) {
            header('Location: index.php?url=user/home/index');
            exit;
        }
        
        // Lấy thông tin sản phẩm
        $product = $this->productModel->getProductByID($product_id);
        
        if (empty($product)) {
            header('Location: index.php?url=user/home/index');
            exit;
        }
        
        $product = $product[0];
        
        // Map các trường dữ liệu để phù hợp với view
        // Nếu tên trường trong DB khác với tên trong view, cần map lại ở đây
        if (isset($product['cost_default']) && !isset($product['price'])) {
            $product['price'] = $product['cost_default'];
        }
        
        // Lấy thông tin về kích cỡ
        $sizes = $this->productModel->getProductSizes();
        
        // Lấy thông tin về mức độ đá
        $specificIceIds = [1, 2, 3];
        $iceLevels = $this->productModel->getIceLevels($specificIceIds);
        
        // Lấy thông tin về mức độ ngọt
        $specificSweetIds = [4, 5, 6];
        $sweetLevels = $this->productModel->getSweetLevels($specificSweetIds);
        
        // Lấy các topping với
        $specificToppingIds = [8, 9, 10];
        $toppings = $this->productModel->getSpecificToppings($specificToppingIds);
        
        // // Đảm bảo giá của topping
        // foreach ($toppings as &$topping) {
        //     $topping['price'] = 7000;
        // }
        
        // Truyền dữ liệu vào view
        $data = [
            'product' => $product,
            'sizes' => $sizes,
            'iceLevels' => $iceLevels,
            'sweetLevels' => $sweetLevels,
            'toppings' => $toppings
        ];
        
        $this->view("order", $data);
    }
    // public function add() {
    //     // Khởi tạo giỏ hàng nếu chưa có
    //     if (!isset($_SESSION['cart'])) {
    //         $_SESSION['cart'] = [];
    //     }
        
    //     // Xử lý request AJAX dạng JSON
    //     $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        
    //     if ($contentType === "application/json") {
    //         // Đọc input JSON
    //         $content = trim(file_get_contents("php://input"));
    //         $decoded = json_decode($content, true);
            
    //         // Lấy thông tin sản phẩm từ request
    //         $product_id = $decoded['id'];
    //         $product_name = $decoded['name'];
    //         $product_image = $decoded['image'];
    //         $product_size = $decoded['size'];
    //         $product_price = $decoded['price'];
    //         $quantity = $decoded['quantity'];
    //         $ice = $decoded['ice'];
    //         $sweet = $decoded['sweet'];
    //         $toppings = $decoded['toppings'];
            
    //     } else {
    //         // Xử lý request POST thông thường
    //         $product_id = $_POST['product_id'] ?? null;
    //         $product_name = $_POST['product_name'] ?? '';
    //         $product_image = $_POST['product_image'] ?? '';
    //         $product_size = $_POST['product_size'] ?? 'M';
    //         $product_price = $_POST['product_price'] ?? 0;
    //         $quantity = $_POST['product_quantity'] ?? 1;
            
    //         // Xử lý thông tin Ice và Sweet levels
    //         $ice_level_id = $_POST['ice_level'] ?? 2; // Mặc định là bình thường
    //         $sweet_level_id = $_POST['sweet_level'] ?? 2; // Mặc định là bình thường
            
    //         // Tạo đối tượng ice và sweet
    //         $ice = [
    //             'componentId' => 1,
    //             'levelId' => $ice_level_id
    //         ];
            
    //         $sweet = [
    //             'componentId' => 2,
    //             'levelId' => $sweet_level_id
    //         ];
            
    //         // Xử lý toppings
    //         $toppings = [];
    //         if (isset($_POST['toppings'])) {
    //             $topping_ids = json_decode($_POST['toppings'], true);
                
    //             if (count($topping_ids)>0) {
    //                 // Lấy thông tin các topping từ database
    //                 $dbToppings = $this->productModel->getSpecificToppings($topping_ids);
                    
    //                 foreach ($dbToppings as $dbTopping) {
    //                     $toppings[] = [
    //                         'id' => $dbTopping['id'],
    //                         'name' => $dbTopping['name'],
    //                         'price' => $dbTopping['price']
    //                     ];
    //                 }
    //             }
    //         }
    //     }
        
    //     // Tạo một ID duy nhất cho sản phẩm trong giỏ hàng (kết hợp ID sản phẩm, kích cỡ, đá, ngọt và topping)
    //     $cart_item_id = $product_id . '_' . $product_size;
    //     $cart_item_id .= '_ice' . $ice['levelId'];
    //     $cart_item_id .= '_sweet' . $sweet['levelId'];
        
    //     // Thêm mã của các topping vào cart_item_id
    //     $topping_ids = array_map(function($topping) {
    //         return $topping['id'];
    //     }, $toppings);
    //     sort($topping_ids); // Sắp xếp để đảm bảo thứ tự không ảnh hưởng
    //     $cart_item_id .= '_toppings' . implode('-', $topping_ids);
        
    //     // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    //     $found = false;
    //     foreach ($_SESSION['cart'] as $key => $cart_item) {
    //         if (isset($cart_item['cart_item_id']) && $cart_item['cart_item_id'] === $cart_item_id) {
    //             // Cập nhật số lượng
    //             $_SESSION['cart'][$key]['quantity'] += $quantity;
    //             // Cập nhật tổng giá
    //             $_SESSION['cart'][$key]['totalPrice'] = $_SESSION['cart'][$key]['price'] * $_SESSION['cart'][$key]['quantity'];
    //             $found = true;
    //             break;
    //         }
    //     }
        
    //     // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
    //     if (!$found) {
    //         // Lấy tên của mức độ đá và ngọt từ database
    //         $ice_level_name = 'Bình thường'; // Mặc định
    //         $sweet_level_name = 'Bình thường'; // Mặc định
            
    //         $specificIceIds = [4, 5, 6];
    //         $ice_levels = $this->productModel->getIceLevels($specificIceIds);
    //         foreach ($ice_levels as $level) {
    //             if ($level['id'] == $ice['levelId']) {
    //                 $ice_level_name = $level['name'];
    //                 break;
    //             }
    //         }
    //         $specificSweetIds = [7, 8, 9];
    //         $sweet_levels = $this->productModel->getSweetLevels($specificSweetIds);
    //         foreach ($sweet_levels as $level) {
    //             if ($level['id'] == $sweet['levelId']) {
    //                 $sweet_level_name = $level['name'];
    //                 break;
    //             }
    //         }
            
    //         // Tạo thông tin chi tiết sản phẩm
    //         $product_detail = [
    //             'cart_item_id' => $cart_item_id,
    //             'id' => $product_id,
    //             'name' => $product_name,
    //             'image' => $product_image,
    //             'size' => $product_size,
    //             'ice' => [
    //                 'levelId' => $ice['levelId'],
    //                 'name' => $ice_level_name
    //             ],
    //             'sweet' => [
    //                 'levelId' => $sweet['levelId'],
    //                 'name' => $sweet_level_name
    //             ],
    //             'toppings' => $toppings,
    //             'price' => (float)$product_price,
    //             'quantity' => (int)$quantity,
    //             'totalPrice' => (float)$product_price * (int)$quantity
    //         ];
            
    //         // Thêm vào giỏ hàng
    //         $_SESSION['cart'][] = $product_detail;
    //     }
        
    //     // Trả về kết quả
    //     if ($contentType === "application/json") {
    //         header('Content-Type: application/json');
    //         echo json_encode([
    //             'success' => true,
    //             'message' => 'Sản phẩm đã được thêm vào giỏ hàng',
    //             'cart_count' => count($_SESSION['cart'])
    //         ]);
    //         exit;
    //     } else {
    //         // Chuyển hướng đến trang giỏ hàng
    //         header('Location: /web_bantrasua/myapp/user/cart/index ');
    //         exit;
    //     }
    // }

    public function index()
    {
        $product_id = isset($_GET['id']) ? intval($_GET['id']) : null;
        
        if ($product_id) {
            $this->viewProduct();
        } else {
            header('Location: index.php?url=user/home/index');
            exit;
        }
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
            include __DIR__ . '/../../view/user/checkout.php';
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
            } catch (\Exception $e) {
                $error = "Lỗi đặt hàng: " . $e->getMessage();
            }
        }

        // Truyền biến vào view
        include __DIR__ . '/../../view/user/checkout.php';
    }



    public function success()
    {
        $order_id = $_GET['id'] ?? 0;
        $details = $this->orderModel->getDetails($order_id);
        include __DIR__ . '/../../view/user/success.php';
    }
}






