<?php
require_once 'src/config/database.php';

class Order{
    public function create($userId, $productId, $address, $payment, $email){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "INSERT INTO orders (userId, productId, date, shipping_address, payment_option, email_address) VALUES ('$userId', '$productId', NOW(), '$address', '$payment', '$email')";
            $result = mysqli_query($conn, $query);
            return $result;
        } finally{
            $database->close();
        }
    }
}
?>