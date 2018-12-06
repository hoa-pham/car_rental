<?php
    class Database{
        private $host = '127.0.0.1';
        private $db_name = "rentalCar";
        private $username = "root";
        private $password = "";
        public $conn;

        // get Connection
        public function getConnection(){
            $this->conn = null;

            try{
                $this->conn = new PDO(
                    "mysql:host=" .$this->host . ";dbname=" .$this->db_name,
                    $this->username, $this->password);
                }catch(PDOException $exception){
                    echo "Connection error: " . $exception->getMessage();
                }
                    return $this->conn;
            }
        }
    
?>