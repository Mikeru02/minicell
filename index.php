<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    $_SESSION['admin_logged_in'] = false;
}
if (!isset($_SESSION['user_logged_in'])) {
    $_SESSION['user_logged_in'] = false;
}

require_once 'src/controllers/pagesController.php';

if ($_SERVER['REQUEST_URI'] == '/minicell/index.php') {
    $controller = new LandingController();
    $controller->index();
}
else if($_SERVER['REQUEST_URI'] == '/minicell/index.php/faqs'){
    $controller = new FAQSController();
    $controller->index();
}
else if($_SERVER['REQUEST_URI'] == '/minicell/index.php/products'){
    $controller = new CartController();
    $controller->fetchProducts();
}
else if($_SERVER['REQUEST_URI'] == '/minicell/index.php/cart'){
    $controller = new CartController();
    $controller->index();
}
else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/removetocart'){
    $controller = new CartController();
    $controller->deleteProduct();
}
else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/updatecart'){
    $controller = new CartController();
    $controller->updateCart();
}
else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/signUp'){
    $controller = new SignUpController();
    $controller->index();
} else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/login'){
    $controller = new LogInController();
    $controller->index();
}
else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/admin'){
    $controller = new AdminLoginController();
    $controller->index();
}
else if (preg_match('/^\/minicell\/index\.php\/adminpage/', $_SERVER['REQUEST_URI'])) {
    if ($_SESSION['admin_logged_in'] === true) {
        $controller = new AdminPageController();
        $controller->index();
    } else {
        $controller = new NotFoundController();
        $controller->index();
    }
}
else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/logout') {
    if ($_SESSION['admin_logged_in'] === true){
        $controller = new AdminPageController();
        $controller->logout();
    }
    else if ($_SESSION['user_logged_in'] === true){
        $controller = new HomePageController();
        $controller->logout();
    }
}
else if (preg_match('/\/minicell\/index\.php\/homepage\/(\w+)/', $_SERVER['REQUEST_URI'], $matches)){
    if ($_SESSION['user_logged_in'] === true){
        $controller = new HomePageController();
        $controller->prod($matches[1]);
    }else{
        $controller = new NotFoundController();
        $controller->index();
    }
}
else if (preg_match('/\/minicell\/index\.php\/homepage/', $_SERVER['REQUEST_URI'])){
    if ($_SESSION['user_logged_in'] === true){
        $controller = new HomePageController();
        $controller->index();
    }else{
        $controller = new NotFoundController();
        $controller->index();
    }
}
else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/account') {
    if ($_SESSION['user_logged_in'] === true){
        $controller = new HomePageController();
        $controller->account();
    } 
}
else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/addtocart') {
    if ($_SESSION['user_logged_in'] === true){
        $controller = new HomePageController();
        $controller->addtocart();
    } 
}
else{
    $controller = new NotFoundController();
    $controller->index();
}