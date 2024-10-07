<?php

require_once 'src/controllers/landingController.php';
require_once  'src/controllers/signUpController.php';

if ($_SERVER['REQUEST_URI'] == '/minicell/index.php/signUp'){
    $controller = new SignUpController();
    $controller->index();
}else {
    $controller = new LandingController();
    $controller->index();
}

