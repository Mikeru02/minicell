<?php
require_once 'src/models/product.php';

class ProductController{
    private $product;   

    public function __construct(){
        $this->product = new Product();
    }
    
    public function create($image_dir, $name, $desc, $price, $category, $small, $medium, $large, $materials, $status){
        $result = $this->product->create($image_dir, $name, $desc, $price, $category, $small, $medium, $large, $materials, $status);
        return $result;
    }

    public function update($id, $image_dir, $name, $desc, $price, $category, $small, $medium, $large, $materials, $status){
        $result = $this->product->update($id, $image_dir, $name, $desc, $price, $category, $small, $medium, $large, $materials, $status);
        return $result;
    }

    public function delete($id){
        $result = $this->product->delete($id);
        return $result;
    }

    public function getProd($searchName) {
        $result = $this->product->getProduct($searchName);
        return $result;
    }

    public function displayProducts(){
        $products = $this->product->get();
        return $products;
    }

    public function getCategory($category){
        $result = $this->product->getCategory($category);
        return $result;
    }
}
?>