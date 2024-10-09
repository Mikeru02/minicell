<?php
require_once 'src/config/database.php';

class User{
    public function create($mobile_num, $password){
        $database = new Database();
        $conn = $database->connect();
        $userId = $this->generateId();

        try{
            $query = "INSERT INTO users (id, mobile_num, password, role) VALUES ('$userId', '$mobile_num', '$password', 'user')";
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
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);
        $userCount = $row['user_count'] + 1; // Increment for the new user

        $userNumber = str_pad($userCount, 4, '0', STR_PAD_LEFT);

        return $year . $userNumber;
    }

    public function get($mobile_num, $password){
        $database = new Database();
        $conn = $database->connect();

        $query = "SELECT * FROM users WHERE mobile_num='$mobile_num'";
        $result = mysqli_query($conn, $query);

        $user = mysqli_fetch_assoc($result);

        if ($password == $user['password'] && $user['role'] == 'user'){
            return $user;
        }else if ($password == $user['password'] && $user['role'] == 'admin'){
            return $user;
        }
    }
}
?>