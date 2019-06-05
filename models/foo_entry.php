<?php

    class Foo_entry {

        private $conn;
        private $table = 'entries';

        public $id;
        public $a;
        public $b;
        public $c;

        public function __construct($db){
            $this->conn =  $db;
        }

        public function read($id){
            $query  = 'SELECT id, a, b, c FROM foo.entries WHERE id=' . $id;

            $stmt = $this->conn->prepare($query);
            $stmt->execute();   

            $row = $stmt->fetch();
            
            $this->id = $row['id'];
            $this->a = $row['a'];
            $this->b = $row['b'];
            $this->c = $row['c'];

            return $stmt;
        }

        public function getEntryCount(){
            $query  = 'SELECT COUNT(*) FROM foo.entries';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();   

            $row = $stmt->fetch();
            return $row[0];
        }
        

    }

?>