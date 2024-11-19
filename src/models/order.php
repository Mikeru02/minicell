<?php
require_once 'src/config/database.php';

class Order{
    public function create($orderId, $userId, $address, $payment, $email,$subtotal){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "INSERT INTO orders (id, userId, date, shipping_address, payment_option, email_address, subtotal, status) VALUES ('$orderId', '$userId', NOW(), '$address', '$payment', '$email', '$subtotal', 'order placed')";
            $result = mysqli_query($conn, $query);
            return $result;
        } finally{
            $database->close();
        }
    }

    public function addProdOrders($orderId, $productId, $quantity, $size){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "INSERT INTO order_details (orderId, productId, quantity, size) VALUES ('$orderId', '$productId', '$quantity', '$size')";
            $result = mysqli_query($conn, $query);
            return $result;
        } finally{
            $database->close();
        }
    }

    public function fetchOrders($userId){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "SELECT * FROM orders WHERE userId='$userId'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return$row;
        } finally{
            $database->close();
        }
    }

    public function fetchOrderDetails($orderId){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "SELECT * FROM order_details WHERE orderId='$orderId'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return$row;
        } finally{
            $database->close();
        }
    }

    public function updateOrderStatus($orderId, $status){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "UPDATE orders SET status='$status' WHERE id='$orderId'";
            $result = mysqli_query($conn, $query);
            return $result;
        } finally{
            $database->close();
        }
    }
}
?>