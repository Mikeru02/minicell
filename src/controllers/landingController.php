<?php

require_once 'src/controllers/productController.php';

class LandingController{
    public function index(){
        $adminController = new ProductController();
        $products = $adminController->displayProducts();
        require_once 'src/views/landingpage/landingpage.php';
    }
}

class NotFoundController{
    public function index(){
        require_once 'src/views/notfound/notfound.php';
    }
}
?>