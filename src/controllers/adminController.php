<?php
require_once 'src/models/user.php';

class AdminController{
    private $user;

    public function __construct(){
        $this->user = new User();
    }
    public function index(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mobile_num = $_POST['mobile_num'];
            $password = $_POST['password'];
            $result = $this->user->get($mobile_num, $password);

            if ($result) {
                // Success message or redirect after successful sign-up
                //require_once 'src/views/adminpage/adminpage.php';
                $_SESSION['admin_logged_in'] = true;
                header('Location: /minicell/index.php/adminpage');
                exit(); 
            } else {
                echo "Failed to register user.";
            }
        } else {
            require_once 'src/views/adminpage/adminlogin.php';
        }
        
    }
    public function logout() {
        session_start(); // Start the session
        $_SESSION['admin_logged_in'] = false; // Set logged in status to false
        session_destroy(); // Destroy the session
        header('Location: /minicell/index.php'); // Redirect to the homepage or login page
        exit();
    }
    
}
?>