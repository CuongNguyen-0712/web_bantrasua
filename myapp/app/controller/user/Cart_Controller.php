<?php

namespace User;

class Cart_Controller extends Controller
{

    protected $addressModel;
    protected $productModel;

    public function __construct()
    {
        $this->addressModel = $this->model("Cart_Model");
        $this->productModel = $this->model("Product_Model");
    }

    public function store()
    {
        $this->showAddressAndPhoneNumber();
    }

    public function showAddressAndPhoneNumber()
    {
        $user_id = $_SESSION['user']['id'] ?? null;

        if (isset($_SESSION['user'])) {

            $address = $this->addressModel->getAddress($user_id);
            $phoneNumber = $this->addressModel->getPhoneNumber($user_id);
            $userName = $this->addressModel->getUserName($user_id);

            $addressFinal = $_SESSION['new_Address'][$user_id] ?? $address;

            $this->view('cart&payment', ["address" => $addressFinal, "phone" => $phoneNumber, "user_name" => $userName]);
            $this->view('address', ["address" => $addressFinal]);
        }
    }

    public function saveAddress()
    {
        if (isset($_POST['newAddress'])) {
            $user_id = $_SESSION['user']['id'];
            $addressArray = explode(",", $_POST['newAddress']);
            $_SESSION['new_Address'][$user_id] = [
                'street' => $addressArray[0],
                'ward' =>  $addressArray[1],
                'district' =>  $addressArray[2],
                'province' =>  $addressArray[3],
            ];
            header("Location: /web_bantrasua/myapp/user/cart/store");
            exit;
        }
    }

    // Phương thức thêm sản phẩm vào giỏ hàng
    public function add()
    {
        // Khởi tạo giỏ hàng nếu chưa có
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Xử lý request AJAX dạng JSON
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            // Đọc input JSON
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            // Lấy thông tin sản phẩm từ request
            $product_id = $decoded['id'];
            $product_name = $decoded['name'];
            $product_image = $decoded['image'];
            $product_size = $decoded['size'];
            $product_price = $decoded['price'];
            $quantity = $decoded['quantity'];
            $ice = $decoded['ice'];
            $sweet = $decoded['sweet'];
            $toppings = $decoded['toppings'];
        } else {
            // Xử lý request POST thông thường
            $product_id = $_POST['product_id'] ?? null;
            $product_name = $_POST['product_name'] ?? '';
            $product_image = $_POST['product_image'] ?? '';
            $product_size = $_POST['product_size'] ?? 'M';
            $product_price = $_POST['product_price'] ?? 0;
            $quantity = $_POST['product_quantity'] ?? 1;

            // Xử lý thông tin Ice và Sweet levels
            $ice_level_id = $_POST['ice_level'] ?? 2; // Mặc định là bình thường
            $sweet_level_id = $_POST['sweet_level'] ?? 2; // Mặc định là bình thường

            // Tạo đối tượng ice và sweet
            $ice = [
                'levelId' => $ice_level_id
            ];

            $sweet = [
                'levelId' => $sweet_level_id
            ];

            // Xử lý toppings
            $toppings = [];
            if (isset($_POST['toppings'])) {
                $topping_ids = json_decode($_POST['toppings'], true);

                if (count($topping_ids) > 0) {
                    // Lấy thông tin các topping từ database
                    $dbToppings = $this->productModel->getSpecificToppings($topping_ids);

                    foreach ($dbToppings as $dbTopping) {
                        $toppings[] = [
                            'id' => $dbTopping['id'],
                            'name' => $dbTopping['name'],
                            'price' => $dbTopping['price']
                        ];
                    }
                }
            }
        }

        // Tạo một ID duy nhất cho sản phẩm trong giỏ hàng (kết hợp ID sản phẩm, kích cỡ, đá, ngọt và topping)
        $cart_item_id = $product_id . '_' . $product_size;
        $cart_item_id .= '_ice' . $ice['levelId'];
        $cart_item_id .= '_sweet' . $sweet['levelId'];

        // Thêm mã của các topping vào cart_item_id
        $topping_ids = array_map(function ($topping) {
            return $topping['id'];
        }, $toppings);
        sort($topping_ids); // Sắp xếp để đảm bảo thứ tự không ảnh hưởng
        $cart_item_id .= '_toppings' . implode('-', $topping_ids);

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $found = false;
        foreach ($_SESSION['cart'] as $key => $cart_item) {
            if (isset($cart_item['cart_item_id']) && $cart_item['cart_item_id'] === $cart_item_id) {
                // Cập nhật số lượng
                $_SESSION['cart'][$key]['quantity'] += $quantity;
                // Cập nhật tổng giá
                $_SESSION['cart'][$key]['totalPrice'] = $_SESSION['cart'][$key]['price'] * $_SESSION['cart'][$key]['quantity'];
                $found = true;
                break;
            }
        }

        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
        if (!$found) {
            // Lấy tên của mức độ đá và ngọt từ database
            $ice_level_name = 'Bình thường'; // Mặc định
            $sweet_level_name = 'Bình thường'; // Mặc định

            $specificIceIds = [1, 2, 3];
            $ice_levels = $this->productModel->getIceLevels($specificIceIds);
            foreach ($ice_levels as $level) {
                if ($level['id'] == $ice['levelId']) {
                    $ice_level_name = $level['name'];
                    break;
                }
            }
            $specificSweetIds = [4, 5, 6];
            $sweet_levels = $this->productModel->getSweetLevels($specificSweetIds);
            foreach ($sweet_levels as $level) {
                if ($level['id'] == $sweet['levelId']) {
                    $sweet_level_name = $level['name'];
                    break;
                }
            }

            // Tạo thông tin chi tiết sản phẩm
            $product_detail = [
                'cart_item_id' => $cart_item_id,
                'id' => $product_id,
                'name' => $product_name,
                'image' => $product_image,
                'size' => $product_size,
                'ice' => [
                    'levelId' => $ice['levelId'],
                    'name' => $ice_level_name
                ],
                'sweet' => [
                    'levelId' => $sweet['levelId'],
                    'name' => $sweet_level_name
                ],
                'toppings' => $toppings,
                'price' => (float)$product_price,
                'quantity' => (int)$quantity,
                'totalPrice' => (float)$product_price * (int)$quantity
            ];

            // Thêm vào giỏ hàng
            $_SESSION['cart'][] = $product_detail;
        }

        // Trả về kết quả
        if ($contentType === "application/json") {
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'message' => 'Sản phẩm đã được thêm vào giỏ hàng',
                'cart_count' => count($_SESSION['cart'])
            ]);
            exit;
        } else {
            // Chuyển hướng đến trang giỏ hàng
            header('Location: /web_bantrasua/myapp/user/cart/index');
            exit;
        }
    }

    // Phương thức hiển thị giỏ hàng
    public function index()
    {
        $data['address'] = $this->addressModel->getAddress($_SESSION['user']['id']);
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $cart = $_SESSION['cart'];
        print_r($cart);
        // $subtotal = $this->calculateSubtotal($cart);
        // $tax = $subtotal * 0.1; // 10% thuế
        // $shipping = 15000; // Phí vận chuyển cố định
        // $total = $subtotal + $tax + $shipping;

        // $this->view('cart&payment', [
        //     'cart' => $cart,
        //     'subtotal' => $subtotal,
        //     'tax' => $tax,
        //     'shipping' => $shipping,
        //     'total' => $total
        // ]);
    }

    // Phương thức tính tổng giá trị giỏ hàng
    private function calculateSubtotal($cart)
    {
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['totalPrice'];
        }
        return $subtotal;
    }

    // Phương thức xóa sản phẩm khỏi giỏ hàng
    public function remove()
    {
        $cart_item_id = $_GET['id'] ?? '';

        if (!empty($cart_item_id) && isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['cart_item_id'] === $cart_item_id) {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']); // Đánh số lại mảng
                    break;
                }
            }
        }

        // Chuyển hướng về trang giỏ hàng
        header('Location: index.php?url=user/cart');
        exit;
    }

    // Phương thức cập nhật số lượng sản phẩm trong giỏ hàng
    public function update()
    {
        $cart_item_id = $_POST['cart_item_id'] ?? '';
        $quantity = (int)($_POST['quantity'] ?? 1);

        if ($quantity < 1) {
            $quantity = 1;
        }

        if (!empty($cart_item_id) && isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['cart_item_id'] === $cart_item_id) {
                    $_SESSION['cart'][$key]['quantity'] = $quantity;
                    $_SESSION['cart'][$key]['totalPrice'] = $_SESSION['cart'][$key]['price'] * $quantity;
                    break;
                }
            }
        }

        // Trả về dạng JSON nếu là request AJAX
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'cart' => $_SESSION['cart'],
                'subtotal' => $this->calculateSubtotal($_SESSION['cart'])
            ]);
            exit;
        }

        // Chuyển hướng về trang giỏ hàng
        header('Location: index.php?url=user/cart');
        exit;
    }

    // Phương thức xóa toàn bộ giỏ hàng
    public function clear()
    {
        $_SESSION['cart'] = [];

        // Chuyển hướng về trang giỏ hàng
        header('Location: index.php?url=user/cart');
        exit;
    }
}
