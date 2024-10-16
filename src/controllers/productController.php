<?php
require_once 'src/models/product.php';

class ProductController{
    private $product;   

    public function __construct(){
        $this->product = new Product();
    }
    
    public function index(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $material = $_POST['material'];
            $status = $_POST['status'];

            $image = $_FILES['img']['name'];
            $temporary = $_FILES['img']['tmp_name'];

            $image_dir = 'src/uploads/'. $image;

            move_uploaded_file($temporary, $image_dir);

            $result = $this->product->create($image_dir, $name, $desc, $price, $category, $material, $status);

            if (!$result) {
                echo "Failed to register product.";
            } else{
                header('Location: /minicell/index.php/adminpage');
                exit();
            }
        } else {
            require_once 'src/views/adminpage/adminpage.php';
        }
    }

    public function displayProducts(){
        $products = $this->product->get();
        return $products;
    }
}
?>