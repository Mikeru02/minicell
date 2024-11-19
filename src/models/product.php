<?php
require_once 'src/config/database.php';

class Product{
    public function create($image_dir, $image_dir1, $image_dir2, $image_dir3, $name, $desc, $price, $category, $small, $medium, $large, $material, $status){
        $database = new Database();
        $conn = $database->connect();
        $product_id = $this->generateId();

        try{
            $query = "INSERT INTO products (id, image, support1, support2, support3, name, description, price, category, materials, status) VALUES ('$product_id', '$image_dir', '$image_dir1', '$image_dir2', '$image_dir3', '$name','$desc', '$price', '$category', '$materials', '$status');";
            $result = mysqli_query($conn, $query);

            $query2 = "INSERT INTO products_sizes (id, small, medium, large) VALUES ('$product_id', '$small', '$medium', '$large');";
            $result2 = mysqli_query($conn, $query2);

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

        $max_query = 'SELECT MAX(id) as max_id FROM products;';
        $max_result = mysqli_query($conn, $max_query);
        $max_row = mysqli_fetch_assoc($max_result);
        $maxId = $max_row['max_id'];

        $productCount = $row['product_count'] + 1;

        $productNumber = str_pad($productCount, 4, '0', STR_PAD_LEFT);
        $newId = "product_" . $year . $productNumber;

        while ($newId == $maxId){
            $productCount = $row['product_count'] + 1 + 1;
            $productNumber = str_pad($productCount, 4, '0', STR_PAD_LEFT);
            $newId = "product_" . $year . $productNumber;
        }

        return $newId;
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

    public function getProduct($name) {
        $database = new Database();
        $conn = $database->connect();
    
        try {
            $query = "
                SELECT
                    products.id,
                    products.name,
                    products.description,
                    products.price,
                    products.category,
                    products.materials,
                    products_sizes.small,
                    products_sizes.medium,
                    products_sizes.large,
                    products.status
                FROM
                    products
                JOIN
                    products_sizes ON products.id = products_sizes.id
                WHERE
                    products.name = '$name';
            ";
            $result = mysqli_query($conn, $query);

            $row = mysqli_fetch_assoc($result);
            return $row;
        } finally {
            $database->close();
        }
    }

    public function getSpecific($productId){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "
                SELECT
                    products.id,
                    products.name,
                    products.image,
                    products.support1,
                    products.support2,
                    products.support3,
                    products.description,
                    products.price,
                    products.category,
                    products.materials,
                    products_sizes.small,
                    products_sizes.medium,
                    products_sizes.large,
                    products.status
                FROM
                    products
                JOIN
                    products_sizes ON products.id = products_sizes.id
                WHERE
                    products.id = '$productId';
            ";
            $result = mysqli_query($conn, $query);

            $row = mysqli_fetch_assoc($result);
            return $row;
        }finally {
            $database->close();
        }
    }

    public function update($id, $image_dir, $image_dir1, $image_dir2, $image_dir3, $name, $desc, $price, $category, $small, $medium, $large, $materials, $status){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "UPDATE products SET image='$image_dir', support1='$image_dir1', support2='$image_dir2', support3='$image_dir3', name='$name', description='$desc', category='$category', materials='$materials', status='$status' WHERE id='$id';";
            $result = mysqli_query($conn, $query);

            $query2 = "UPDATE products_sizes SET small='$small', medium='$medium', large='$large' WHERE id='$id';";
            $result2 = mysqli_query($conn, $query2);

            return $result;
        } finally{
            $database->close();
        }
    }

    public function delete($id){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "DELETE FROM products WHERE id='$id';";
            $result = mysqli_query($conn, $query);

            return $result;

        } finally{
            $database->close();
        }
    }

    public function getCategory($category){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "SELECT * FROM products WHERE category='$category'";
            $result = mysqli_query($conn, $query);

            $products = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $products[] = $row;
            }
            
            return $products;
        } finally{
            $database->close();
        }
    }

    public function getStocks($productId, $size){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "SELECT id, $size FROM products_sizes WHERE id='$productId'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            return $row;
        }finally{
            $database->close();
        }
    }

    public function updateStocks($productId, $size, $quantity){
        $database = new Database();
        $conn = $database->connect();

        try{
            $query = "UPDATE products_sizes SET $size='$quantity' WHERE id='$productId'";
            $result = mysqli_query($conn, $query);
            return $result;
        }finally{
            $database->close();
        }
    }
}
?>