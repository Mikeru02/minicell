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
    $controller = new AdminPageController();
    $controller->logout();
}
else if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/homepage'){
    if ($_SESSION['user_logged_in'] === true){
        require_once 'src/views/homepage/homepage.php';
    }else{
        $controller = new NotFoundController();
        $controller->index();
    }
}
else{
    $controller = new NotFoundController();
    $controller->index();
}