<?php

namespace user;

class Home_Controller extends Controller
{

    protected $categoryModel;
    protected $productModel;
    protected $userModel;

    public function index()
    {
        $this->showCategory();
    }
    public function userContent()
    {

        $view = $_GET['view'] ?? '';


        $allowedViews = ['logined-content', 'aboutUs'];

        if (!in_array($view, $allowedViews)) {
            http_response_code(403);
            echo "Không được phép truy cập";
            exit;
        }


        $filePath =  "C:/xampp/htdocs/web_bantrasua/old/pages/user/{$view}.html";

        if (file_exists($filePath)) {

            header('Content-Type: text/html; charset=utf-8');
            readfile($filePath);
        } else {
            http_response_code(404);
            echo "Không tìm thấy nội dung";
        }
    }

    public function __construct()
    {
        $this->categoryModel = $this->model("Category_Model");
        $this->productModel = $this->model("Product_Model");
        $this->userModel = $this->model("User_Model");
    }

    public function showCategory()
    {
        // Lấy thông tin người dùng đã đăng nhập (nếu có)
        $userData = null;
        if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) {
            $userData = $this->userModel->getById($_SESSION['user']['id']);
        }
        // Lấy category  
        $categories = $this->categoryModel->getCategory();

        // Lấy product
        $products = $this->productModel->getProduct();

        $this->view('index', [
            "categories" => $categories,
            "products" => $products,
            "userData" => $userData
        ]);
    }

    public function showProductByCategory($category_id)
    {
        $productCategory = $this->productModel->getProductByCategory($category_id);

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 6;
        $offset = ($page - 1) * $limit;
        $productList =  $this->productModel->getProductPagination($limit, $offset);
        $totalProductData = $this->productModel->getTotalProduct();  //lấy theo mảng nên mới gọi ra như vầy, khong phải code thừa đừng xóa nhé
        $totalProduct = $totalProductData[0]['total'];
        $totalPage = ceil($totalProduct / $limit);


        $this->view("productCategory", [
            "totalPage" => $totalPage,
            "page" => $page,
            "productList" => $productList,
            "productCategory" => $productCategory,
            "categoryID" => $category_id
        ]);
    }

    public function showProductByID($product_id)
    {
        $productID = $this->productModel->getProductByID($product_id);
        $this->view('productID', ["productID" => $productID]);
    }



    public function search()
    {
        // Lấy các tham số tìm kiếm từ form
        $searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $minPrice = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
        $maxPrice = isset($_GET['max_price']) ? (int)$_GET['max_price'] : 0;
        $isAdvancedSearch = isset($_GET['advanced']) && $_GET['advanced'] == 1;

        // Lấy danh sách category để hiển thị trong form tìm kiếm
        $categories = $this->categoryModel->getCategory();

        // Xử lý tìm kiếm
        if (!empty($searchTerm) || !empty($category) || ($minPrice > 0 || $maxPrice > 0)) {
            // Xử lý tìm kiếm theo tên danh mục (coffee, trà, trà sữa, ...)
            if (!empty($searchTerm) && empty($category)) {
                // Tìm danh mục theo tên
                $foundCategory = null;
                $exactMatch = false;

                foreach ($categories as $cat) {
                    // Kiểm tra nếu là match chính xác (không phân biệt hoa thường)
                    if (strcasecmp($cat['name'], $searchTerm) === 0) {
                        $foundCategory = $cat['id'];
                        $exactMatch = true;
                        break;
                    }
                    // Hoặc tìm theo chuỗi con (không phân biệt hoa thường)
                    else if ($foundCategory === null && stripos($cat['name'], $searchTerm) !== false) {
                        $foundCategory = $cat['id'];
                    }
                }

                // Nếu tìm thấy danh mục phù hợp với từ khóa tìm kiếm (ưu tiên match chính xác)
                if ($exactMatch || $foundCategory !== null) {
                    // Sử dụng cùng logic và định dạng của showProductByCategory
                    $productCategory = $this->productModel->getProductByCategory($foundCategory);

                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $limit = 6;
                    $offset = ($page - 1) * $limit;

                    // Thay vì lấy tất cả sản phẩm, chỉ lấy sản phẩm của danh mục tìm thấy
                    $totalProductData = $this->productModel->getTotalProductByCategory($foundCategory);
                    $totalProduct = $totalProductData[0]['total'];
                    $totalPage = ceil($totalProduct / $limit);

                    // Phân trang cho sản phẩm trong danh mục
                    $productList = $this->productModel->getProductByCategoryPagination($foundCategory, $limit, $offset);

                    $this->view("productCategory", [
                        "totalPage" => $totalPage,
                        "page" => $page,
                        "productList" => $productList,
                        "productCategory" => $productCategory,
                        "categoryID" => $foundCategory,
                        "categoryName" => $categories[array_search($foundCategory, array_column($categories, 'id'))]['name']
                    ]);

                    return;
                }
            }

            // Nếu chỉ tìm theo category (tìm kiếm cơ bản)
            if (!$isAdvancedSearch && !empty($category) && empty($searchTerm) && $minPrice == 0 && $maxPrice == 0) {
                return $this->showProductByCategory($category);
            }

            // Tìm kiếm sản phẩm với các điều kiện
            $searchResults = $this->productModel->searchProducts($searchTerm, $category, $minPrice, $maxPrice);

            // Kiểm tra xem chỉ còn lại 1 sản phẩm duy nhất không
            if (count($searchResults) == 1) {
                // Nếu chỉ có 1 kết quả, chuyển hướng đến trang chi tiết sản phẩm
                return $this->showProductByID($searchResults[0]['id']);
            } else {
                // Thiết lập phân trang giống như trong showProductByCategory
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $limit = 6;
                $offset = ($page - 1) * $limit;

                // Nếu có nhiều kết quả, giới hạn kết quả hiển thị theo phân trang
                $totalProduct = count($searchResults);
                $totalPage = ceil($totalProduct / $limit);

                // Chỉ lấy phần dữ liệu cần thiết cho trang hiện tại
                $productCategory = array_slice($searchResults, $offset, $limit);

                // Hiển thị trang kết quả tìm kiếm với nhiều sản phẩm
                $this->view('productCategory', [
                    "totalPage" => $totalPage,
                    "page" => $page,
                    "productList" => $searchResults, // Đầy đủ danh sách để đảm bảo tương thích
                    "productCategory" => $productCategory, // Chỉ hiển thị các sản phẩm trong trang hiện tại
                    "searchTerm" => $searchTerm,
                    "categories" => $categories,
                    "selectedCategory" => $category,
                    "minPrice" => $minPrice,
                    "maxPrice" => $maxPrice,
                    "isSearch" => true
                ]);
            }
        } else {
            // Nếu không có điều kiện tìm kiếm, quay về trang chủ
            header('Location: index.php?url=user/home/index');
            exit;
        }
    }

    // Add new method to redirect to order page with product details
    public function orderProduct($product_id)
    {
        // Redirect to the Order_Controller's viewProduct method with the product_id
        header("Location: index.php?url=order/viewProduct&id=" . $product_id);
        exit();
    }
}
