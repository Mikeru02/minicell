<?php
require_once 'src/config/database.php';

class Product{
    public function create($image, $name, $desc, $price, $status){
        $database = new Database();
        $conn = $database->connect();
        $product_id = $this->generateId();

        try{
            $query = "INSERT INTO products (id, image, name, description, price, status) VALUES ('$product_id', '$image', '$name','$desc', '$price', '$status')";
            $result = mysqli_query($conn, $query);
            return $result;
        }finally{
            $database->close();
        }
    }

    public function generateId(){
        $database = new Database();
        $conn = $database->connect();

        $year = date('Y');

        $query = "SELECT COUNT(*) as product_count FROM products";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);
        $productCount = $row['product_count'] + 1;
        $numbersOfZeros = 4;

        if ($productCount < 10){
            $numbersOfZeros = 4;
        }else if ($productCount < 100){
            $numbersOfZeros = 3;
        }

        $userNumber = str_pad($productCount, $numbersOfZeros, '0', STR_PAD_LEFT);

        return $year . $userNumber;
    }

    public function get(){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "SELECT * FROM products";
            $result = mysqli_query($conn, $query);

            $products = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
            
            return $products;
        }finally{
            $database->close();
        }
    }
}
?>