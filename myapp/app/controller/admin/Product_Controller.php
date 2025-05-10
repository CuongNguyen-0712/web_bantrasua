<?php

namespace admin;

class Product_Controller extends Controller
{
    protected $productModel;
    public function __construct()
    {
        $this->productModel = $this->model('Product_Model');
    }
    public function index()
    {
        // Thiết lập giới hạn mỗi trang
        $limit = 5;

        // Lấy trang hiện tại từ query string (?page=), mặc định là 1
        $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

        // Tính offset
        $offset = ($currentPage - 1) * $limit;

        // Lấy danh sách sản phẩm có phân trang
        $products = $this->productModel->getProductsByPage($limit, $offset);

        // Lấy tổng số sản phẩm để phân trang
        $totalProducts = $this->productModel->getTotalProducts();
        $totalPages = ceil($totalProducts / $limit);

        // Truyền dữ liệu sang view
        $this->view('product', [
            'products' => $products,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'totalProducts' => $totalProducts,
            'offset' => $offset,
        ]);
    }

    public function add()
    {
        $sizes = $this->productModel->getAllSizes(); // nếu có
        $categories = $this->productModel->getAllCategories();
        $this->view('product-add', [
            'sizes' => $sizes,
            'categories' => $categories
        ]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $categoryName = $_POST['category'];
            $costDefault = $_POST['price'];
            $description = $_POST['description'];
            $prices = $_POST['prices']; // mảng [size_id => giá]

            // Xử lý ảnh (nếu có)
            $imgPath = null; // Đường dẫn hình ảnh mặc định

            $imgDir = 'public/assets/img/';
            $existingFiles = scandir($imgDir);
            $fileName = basename($_FILES['image']['name']);

            if (in_array($fileName, $existingFiles)) {
                // Ảnh đã tồn tại, không cần tạo mới
                $imgPath = '/web_bantrasua/myapp/public/assets/img/' . $fileName;
            } else {
                // Tạo tên mới tránh trùng
                $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                $newFileName = uniqid('product_', true) . '.' . $ext;
                $destination = $imgDir . $newFileName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                    $imgPath = '/web_bantrasua/myapp/public/assets/img/' . $newFileName;
                } else {
                    echo "Lỗi upload hình ảnh.";
                    return;
                }
            }
            // Lấy category_id từ tên
            $categoryId = $this->productModel->getCategoryIdByName($categoryName);

            // Thêm sản phẩm và lấy product_id
            $productId = $this->productModel->insertProduct($name, $categoryId, $costDefault, $description, $imgPath);

            // Thêm giá theo từng size
            foreach ($prices as $sizeId => $price) {
                $this->productModel->insertProductSize($productId, $sizeId, $price);
            }

            // Chuyển hướng
            header('Location: /web_bantrasua/myapp/admin/product');
            exit;
        }
    }

    public function edit($id)
    {
        $product = $this->productModel->getProductById($id);
        $categories = $this->productModel->getAllCategories();
        $sizes = $this->productModel->getAllSizes();
        $productSizes = $this->productModel->getProductSizes($id); // Trả về mảng size_id => giá

        $this->view('product-change', [
            'product' => $product,
            'categories' => $categories,
            'sizes' => $sizes,
            'productSizes' => $productSizes
        ]);
    }

    public function delete($productId)
    {
        if ($this->productModel->hasBeenSold($productId)) {
            $this->productModel->deactivateProduct($productId);
            header('Location: /web_bantrasua/myapp/admin/product');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['confirm'])) {
                $this->productModel->deleteProduct($productId);
            }

            header('Location: /web_bantrasua/myapp/admin/product');
            exit;
        }

        $this->view('del-box', [
            'productId' => $productId
        ]);
    }


    public function update($productId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $categoryId = $_POST['category'];
            $costDefault = $_POST['price'];
            $description = $_POST['description'];
            $active = $_POST['active'];
            $prices = $_POST['prices']; // mảng [size_id => giá]

            // Xử lý ảnh (nếu có)
            $currentImg = $_POST['current_image'];
            $removeFlag = $_POST['remove_image'];

            if ($removeFlag == '1') {
                if ($currentImg) {
                    @unlink($currentImg);
                }
                $imgPath = null;
            } elseif (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imgDir = 'public/assets/img/';
                $existingFiles = scandir($imgDir);
                $fileName = basename($_FILES['image']['name']);

                if (in_array($fileName, $existingFiles)) {
                    // Ảnh đã tồn tại, không cần tạo mới
                    $imgPath = '/web_bantrasua/myapp/public/assets/img/' . $fileName;
                } else {
                    // Tạo tên mới tránh trùng
                    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                    $newFileName = uniqid('product_', true) . '.' . $ext;
                    $destination = $imgDir . $newFileName;

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                        $imgPath = '/web_bantrasua/myapp/public/assets/img/' . $newFileName;
                    } else {
                        echo "Lỗi upload hình ảnh.";
                        return;
                    }
                }
            } else {
                $imgPath = $currentImg;
            }


            // Cập nhật sản phẩm
            $this->productModel->updateProduct($productId, $name, $categoryId, $costDefault, $description, $imgPath, $active);

            // Cập nhật giá theo từng size
            foreach ($prices as $sizeId => $price) {
                if ($price) { // chỉ cập nhật nếu có giá
                    $this->productModel->updateProductSize($productId, $sizeId, $price);
                }
            }
            header('Location: /web_bantrasua/myapp/admin/product');
            exit;
        }
    }
}
