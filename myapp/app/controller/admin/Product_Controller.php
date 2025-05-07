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
}
