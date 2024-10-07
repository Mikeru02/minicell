<?php
require_once '../models/user.php';

class UserController{
    public function signUp(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $mobile_num = $_POST['mobile_num'];
            $password = $_POST['password'];

            $user = new User();
            if ($user->create($mobile_num, $password)){
                echo 'Sign Up successfull';
            }

            mysqli_close($user);
        }
    }
}
?>