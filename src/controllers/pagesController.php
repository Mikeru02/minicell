<?php
require_once 'src/controllers/productController.php';
require_once 'src/controllers/userController.php';
require_once 'src/models/user.php';
require_once 'src/models/product.php';

// Admin Login
class AdminLoginController{
    public function index(){
        $this->user = new User();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mobile_num = $_POST['mobile_num'];
            $password = $_POST['password'];
            $result = $this->user->get($mobile_num, $password);

            if ($result) {
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
}

// Admin Page
class AdminPageController{
    public function index() {
        $controller = new ProductController();

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $result = $controller->getProd($searchTerm);
        }
        elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (isset($_POST['method']) && $_POST['method'] === 'DELETE'){
                $result = $controller->delete($_POST['product_id']);

                header('Location: /minicell/index.php/adminpage');
                exit();
            }
            
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $material = $_POST['material'];
            $small = $_POST['small'];
            $medium = $_POST['medium'];
            $large = $_POST['large'];
            $status = $_POST['status'];

            $image = $_FILES['img']['name'];
            $temporary = $_FILES['img']['tmp_name'];
            $image_dir = 'src/uploads/'. $image;
            move_uploaded_file($temporary, $image_dir);

            $image1 = $_FILES['img1']['name'];
            $temporary1 = $_FILES['img1']['tmp_name'];
            $image_dir1 = 'src/uploads/'. $image1;
            move_uploaded_file($temporary1, $image_dir1);

            $image2 = $_FILES['img2']['name'];
            $temporary2 = $_FILES['img2']['tmp_name'];
            $image_dir2 = 'src/uploads/'. $image2;
            move_uploaded_file($temporary2, $image_dir2);

            $image3 = $_FILES['img3']['name'];
            $temporary3 = $_FILES['img3']['tmp_name'];
            $image_dir3 = 'src/uploads/'. $image3;
            move_uploaded_file($temporary3, $image_dir3);

            $existingProduct = $controller->getProd($name);

            if ($existingProduct) {
                $result = $controller->update($existingProduct['id'], $image_dir, $image_dir1, $image_dir2, $image_dir3, $name, $desc, $price, $category, $small, $medium, $large, $material, $status);
            } else {
                $result = $controller->create($image_dir, $image_dir1, $image_dir2, $image_dir3, $name, $desc, $price, $category, $small, $medium, $large, $material, $status);
            }

            header('Location: /minicell/index.php/adminpage');
            exit();
        }


        require_once 'src/views/adminpage/adminpage.php';
    }

    public function logout() {
        // session_start();
        $_SESSION['admin_logged_in'] = false; 
        session_destroy();
        header('Location: /minicell/index.php');
        exit();
    }
}

// Landing Page
class LandingController{
    public function index(){
        $controller = new ProductController();
        $products = $controller->displayProducts();
        require_once 'src/views/landingpage/landingpage.php';
    }
}

// Login Page
class LogInController {
    public function index() {
        $this->user = new User();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email_add = $_POST['email_add'];
            $password = $_POST['password'];
            $result = $this->user->get($email_add, $password);

            if ($result) {
                $_SESSION['user_logged_in'] = true;
                $_SESSION['user'] = $result;
                require_once 'src/views/loginsuccess/loginsuccess.php';
            } else {
                require_once 'src/views/loginfailed/loginfailed.php';
            }
        } else {
            require_once 'src/views/loginpage/loginpage.php';
        }
    }
}

// Sign Up Page
class SignUpController {
    public function index() {
        $this->user = new User();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email_add = $_POST['email_add'];
            $password = $_POST['password'];
            $result = $this->user->create($email_add, $password);

            if ($result) {
                // Success message or redirect after successful sign-up
                require_once 'src/views/signUpSuccess/signUpSuccess.php';
            } else {
                echo "Failed to register user.";
            }
        } else {
            require_once 'src/views/signUpPage/signUpPage.php';
        }
    }
}

// Home page
class HomePageController{
    public function index(){
        $controller = new ProductController();
        $products = $controller->displayProducts();
        $result = [];

        if ($_SERVER['REQUEST_METHOD'] == 'GET'  && isset($_GET['category'])){
            $category = strtolower($_GET['category']);
            $result = $controller->getCategory($category);
        }
        require_once 'src/views/homepage/homepage.php';
    }
    public function account(){
        $controller = new UserController();

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $userId = $_SESSION['user']['id'];
            $username = $_POST['username'];
            $name = $_POST['name'];
            $phone_num = $_POST['phone'];
            $birthdate = $_POST['birthdate'];
            $result = $controller->update($userId, $username, $name, $phone_num, $birthdate);

            header('Location: /minicell/index.php/homepage');
            exit();
        }
        require_once 'src/views/accountpage/account.php';
    }
    public function logout(){
        $_SESSION['user_logged_in'] = false; 
        session_destroy();
        header('Location: /minicell/index.php');
        exit();
    }
    public function prod($matches){
        $controller = new ProductController();
        $product = $controller->getSpecific($matches);
        require_once 'src/views/viewproduct/viewproduct.php';
    }
}


// Not Found Page
class NotFoundController{
    public function index(){
        require_once 'src/views/notfound/notfound.php';
    }
}
?>