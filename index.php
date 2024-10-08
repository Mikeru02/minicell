<?php

require_once 'src/controllers/landingController.php';
require_once 'src/controllers/signUpController.php';
require_once 'src/controllers/loginController.php';
require_once 'src/controllers/notfoundController.php';
require_once 'src/controllers/productController.php';

if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/signUp'){
    $controller = new SignUpController();
    $controller->index();
} else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/login'){
    $controller = new LogInController();
    $controller->index();
}

else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php') {
    $controller = new LandingController();
    $controller->index();
}

else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/admin'){
    $controller = new ProductController();
    $controller->index();
}

else{
    $controller = new NotFoundController();
    $controller->index();
}