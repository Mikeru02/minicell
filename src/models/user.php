<?php
require_once 'src/config/database.php';

class User{
    public function create($mobile_num, $password){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "INSERT INTO users (mobile_num, password) VALUES ('$mobile_num', '$password')";
            $result = mysqli_query($conn, $query);
            return $result;
        } finally{
            $database->close();
        }
    }
}
?>