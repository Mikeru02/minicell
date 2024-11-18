<?php
require_once 'src/models/product.php';

class ProductController{
    private $product;   

    public function __construct(){
        $this->product = new Product();
    }
    
    public function create($image_dir, $image_dir1, $image_dir2, $image_dir3, $name, $desc, $price, $category, $small, $medium, $large, $materials, $status){
        $result = $this->product->create($image_dir, $image_dir1, $image_dir2, $image_dir3, $name, $desc, $price, $category, $small, $medium, $large, $materials, $status);
        return $result;
    }

    public function update($id, $image_dir, $image_dir1, $image_dir2, $image_dir3, $name, $desc, $price, $category, $small, $medium, $large, $materials, $status){
        $result = $this->product->update($id, $image_dir, $image_dir1, $image_dir2, $image_dir3, $name, $desc, $price, $category, $small, $medium, $large, $materials, $status);
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

    public function getSpecific($productId){
        $result = $this->product->getSpecific($productId);
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

    public function removeProd($userId,$prodId){
        
    }
}
?>