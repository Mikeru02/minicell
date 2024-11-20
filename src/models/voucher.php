<?php
require_once 'src/config/database.php';

class Voucher{
    public function create($code, $name, $desc,$valid){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "INSERT INTO vouchers (code, name, description, validity) VALUES ('$code','$name','$desc', '$valid')";
            $result = mysqli_query($conn, $query);
            return $result;
        }finally{
            $database->close();
        }
    }

    public function fetchVoucher(){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "SELECT * FROM vouchers";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $row;
        }finally{
            $database->close();
        }
    }
}
?>