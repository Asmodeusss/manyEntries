<?php

    class Database {
        private $host = "localhost";
        private $db_name = "foo";
        private $username = "root";
        private $password = "";
        private $conn;

        public function connect()
        {
            $this->conn = null;

            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbName=" . $this->db_name, $this->username, $this->password );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                echo "connecion error: " . $e->getMessage();
            }

            return $this->conn;
        }

    }

?>