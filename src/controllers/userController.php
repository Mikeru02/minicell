<?php
require_once 'src/models/user.php';

class UserController{
    private $user;

    public function __construct(){
        $this->user = new User();
    }

    public function create($mobile_number, $password){

    }

    public function update($userId, $username, $name, $phone_number, $birthdate, $password){
        $this->user->update($userId, $username, $name, $phone_number, $birthdate, $password);
    }

    public function checkCart($userId, $prodId, $size,$quantity){
        $result = $this->user->checkCart($userId, $prodId, $size,$quantity);
        return $result;
    }

    public function getCart($userId){
        $result = $this->user->getCart($userId);
        return $result;
    }

    public function addToCart($userId, $prodId, $size,$quantity){
        $result = $this->user->addToCart($userId, $prodId, $size,$quantity);
        return $result;
    }

    public function updateCart($cartId, $quantity){
        $result = $this->user->updateCart($cartId, $quantity);
        return $result;
    }

    public function removeCart($cartId){
        $result = $this->user->removeToCart($cartId);
        return $result;
    }

    public function getProdCart($cartId){
        $result = $this->user->getProdCart($cartId);
        return $result;
    }

    public function postReview($userId, $rating, $orderId, $content){
        $result = $this->user->postReview($userId, $rating, $orderId, $content);
        return $result;
    }

    public function addAddress($userId, $fullname, $phonenum, $houseNum,  $streetName, $brgy, $city, $prov, $zip){
        $result = $this->user->addAddress($userId, $fullname, $phonenum, $houseNum, $streetName, $brgy, $city, $prov, $zip);
        return $result;
    }

    public function getAddress($userId){
        $result = $this->user->getAddress($userId);
        return $result;
    }

    public function removeAddress($id){
        $result = $this->user->removeAddress($id);
        return $result;
    }

    public function updateAddress($userId){

    }
}
?>