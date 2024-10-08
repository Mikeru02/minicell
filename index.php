<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    $_SESSION['admin_logged_in'] = false;
}

require_once 'src/controllers/landingController.php';
require_once 'src/controllers/signUpController.php';
require_once 'src/controllers/loginController.php';
require_once 'src/controllers/notfoundController.php';
require_once 'src/controllers/productController.php';
require_once 'src/controllers/adminController.php';

if ($_SERVER['REQUEST_URI'] == '/minicell/index.php') {
    $controller = new LandingController();
    $controller->index();
}
else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/signUp'){
    $controller = new SignUpController();
    $controller->index();
} else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/login'){
    $controller = new LogInController();
    $controller->index();
}
else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/admin'){
    $controller = new AdminController();
    $controller->index();
}
else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/adminpage') {
    // Load the admin page after successful login
    if ($_SESSION['admin_logged_in'] === true){
        $controller = new ProductController();
        $controller->index();
        require_once 'src/views/adminpage/adminpage.php';
    }else{
        $controller = new NotFoundController();
        $controller->index();
    }
}
else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/logout') {
    $controller = new AdminController();
    $controller->logout();
}
else{
    $controller = new NotFoundController();
    $controller->index();
}