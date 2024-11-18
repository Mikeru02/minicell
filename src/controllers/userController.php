<?php
require_once 'src/models/user.php';

class UserController{
    private $user;

    public function __construct(){
        $this->user = new User();
    }

    public function create($mobile_number, $password){

    }

    public function update($userId, $username, $name, $phone_number, $birthdate){
        $this->user->update($userId, $username, $name, $phone_number, $birthdate);
    }

    public function checkCart($userId, $prodId, $size,$quantity){
        $result = $this->user->checkCart($userId, $prodId, $size,$quantity);
        return $result;
    }

    public function getCart($userId,$prodId, $quantity){
        $result = $this->user->getCart($userId,$prodId, $quantity);
        return $result;
    }

    public function addToCart($userId, $prodId, $size,$quantity){
        $result = $this->user->addToCart($userId, $prodId, $size,$quantity);
        return $result;
    }

    public function updateCart($userId, $prodId, $size,$quantity){
        $result = $this->user->updateCart($userId, $prodId, $size,$quantity);
        return $result;
    }
}
?>