<?php
require_once 'src/models/user.php';

class LogInController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mobile_num = $_POST['mobile_num'];
            $password = $_POST['password'];
            $result = $this->user->get($mobile_num, $password);

            if ($result) {
                require_once 'src/views/signUpSuccess/signUpSuccess.php';
            } else {
                echo "Failed to login user.";
            }
        } else {
            require_once 'src/views/loginpage/loginpage.php';
        }
    }
}
?>