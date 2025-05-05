<?php 

namespace User;

class Home_Controller extends Controller{

    protected $categoryModel;
    protected $productModel;

    public function index(){    
        $this->showCategory();
    }

    public function __construct(){
        $this->categoryModel = $this->model("Category_Model");
        $this->productModel = $this->model("Product_Model");
    }

    public function showCategory(){

        //lấy category  
        $categories = $this->categoryModel->getCategory();    
        
        //lấy product
        $products = $this->productModel->getProduct();

        $this->view('index', ["categories" => $categories,
                              "products" => $products]);
    }

    public function showProductByCategory($category_id){
        $productCategory = $this->productModel->getProductByCategory($category_id);

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 6;
        $offset = ($page - 1) * $limit;
        $productList =  $this->productModel->getProductPagination($limit, $offset);
        $totalProductData = $this->productModel->getTotalProduct();  //lấy theo mảng nên mới gọi ra như vầy, khong phải code thừa đừng xóa nhé
        $totalProduct = $totalProductData[0]['total'];
        $totalPage = ceil($totalProduct/$limit);

        $this->view("productCategory", ["totalPage" => $totalPage,
                                        "page" => $page,
                                        "productList" => $productList,
                                        "productCategory" => $productCategory,
                                        "categoryID" => $category_id]);
    }

    public function showProductByID($product_id){
        $productID = $this->productModel->getProductByID($product_id);
        $this->view('productID', ["productID" => $productID]);
    }
}
?>
