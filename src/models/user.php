<?php
require_once 'src/config/database.php';

class User{
    public function create($email_add, $password){
        $database = new Database();
        $conn = $database->connect();
        $userId = $this->generateId();
        $hassed_password = hash('sha256', $password);

        try{
            $query = "INSERT INTO users (id, email_address, password, role) VALUES ('$userId', '$email_add', '$hassed_password', 'user')";
            $result = mysqli_query($conn, $query);
            return $result;
        } finally{
            $database->close();
        }
    }

    public function generateId(){
        $database = new Database();
        $conn = $database->connect();

        $year = date('Y');

        $query = "SELECT COUNT(*) as user_count FROM users";
        $query_max = "SELECT MAX(id) as max_id FROM users";

        $result = mysqli_query($conn, $query);
        $max_result = mysqli_query($conn, $query_max);

        $row = mysqli_fetch_assoc($result);
        $maxIdRow = mysqli_fetch_assoc($max_result);

        $userCount = $row['user_count'] + 1; // Increment for the new user
        $maxId = $maxIdRow['max_id'];

        $userNumber = str_pad($userCount, 4, '0', STR_PAD_LEFT);
        $newId = "user_" . $year . $userNumber;

        while ($newId == $maxId){
            $userCount = $row['user_count'] + 1 + 1;
            $userNumber = str_pad($userCount, 4, '0', STR_PAD_LEFT);
            $newId = "user_". $year . $userNumber;
        }

        return $newId;
    }

    public function get($email_add, $password){
        $database = new Database();
        $conn = $database->connect();

        $query = "SELECT * FROM users WHERE email_address='$email_add'";
        $result = mysqli_query($conn, $query);

        $user = mysqli_fetch_assoc($result);

        $hassed_password = hash('sha256', $password);

        if ($user){
            if ($hassed_password == $user['password'] && $user['role'] == 'user'){
                return $user;
            }
            if ($hassed_password == $user['password'] && $user['role'] == 'admin'){
                return $user;
            }
        } else{
            return null;
        }
    }

    public function update($userId, $username, $name, $phone_num, $birtdate){
        $database = new Database();
        $conn = $database->connect();
        try{
            $query = "UPDATE users SET username='$username', name='$name', mobile_number='$phone_num', birthdate='$birtdate' WHERE id='$userId'";
            $result = mysqli_query($conn, $query);
            return $result;
        }finally{
            $database->close();
        }
    }

    public function checkCart($userId,$prodId, $size,$quantity){
        $database = new Database();
        $conn = $database->connect();
        try{
            $query = "SELECT * FROM cart WHERE userId='$userId' AND productId='$prodId' AND size='$size'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                return true; 
            } else {
                return false;
            }
        }finally{
            $database->close();
        }
    }

    public function getCart($userId,$prodId,$quantity){
        $database = new Database();
        $conn = $database->connect();
        try{
            $query = "SELECT * FROM cart WHERE userId='$userId'";
            $result = mysqli_query($conn, $query);
            return $result;
        }finally{
            $database->close();
        }
    }

    public function addToCart($userId,$prodId, $size, $quantity){
        $database = new Database();
        $conn = $database->connect();
        try{
            $query = "INSERT INTO cart (userId, productId, size, quantity, datetime) VALUES ('$userId','$prodId', '$size', '$quantity',NOW())";
            $result = mysqli_query($conn, $query);
            return $result;
        }finally{
            $database->close();
        }
    }

    public function updateCart($userId, $prodId, $size,$quantity){
        $database = new Database();
        $conn = $database->connect();
        try{
            $query = "UPDATE cart SET quantity='$quantity' WHERE productId='$prodId' AND userId='$userId' AND size='$size'";
            $result = mysqli_query($conn, $query);
            return $result;
        }finally{
            $database->close();
        }
    }
}
?>