<?php
class Database{
    private $host = 'localhost';
    private $database_name = 'minicell_db';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function connect(){
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database_name);

        return $this->conn;
    }

    public function close(){
        if ($this->conn){
            $this->conn->close();
        }
    }
}
?>