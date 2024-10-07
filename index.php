<?php

require_once 'src/controllers/landingController.php';
require_once  'src/controllers/loginController.php';

if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/login'){
    $controller = new LoginController();
    $controller->index();
}else {
    $controller = new LandingController();
    $controller->index();
}

