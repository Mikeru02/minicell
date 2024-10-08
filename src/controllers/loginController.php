<?php
require_once 'src/models/user.php'; // Ensure to require the User model

class LogInController {
    private $user;

    public function __construct() {
        $this->user = new User(); // Instantiate the User model
    }

    public function index() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mobile_num = $_POST['mobile_num'];
            $password = $_POST['password'];
            $result = $this->user->get($mobile_num, $password);

            if ($result) {
                // Success message or redirect after successful sign-up
                require_once 'src/views/signUpSuccess/signUpSuccess.php';
            } else {
                echo "Failed to register user.";
            }
        } else {
            require_once 'src/views/loginpage/loginpage.php';
        }
    }
}
?>