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
}
?>