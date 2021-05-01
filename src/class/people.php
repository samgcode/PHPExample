<?php
    class People{

        // Connection
        private $conn;

        // Table
        private $db_table = "People";

        // Columns
        public $id;
        public $name;
        public $email;
        public $password;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getPeople(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }   

        // CREATE
        public function addPerson(){
            $sqlQuery = "INSERT INTO ". $this->db_table ."
                    SET
                        name = :name, 
                        email = :email, 
                        password = :password";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->password=htmlspecialchars(strip_tags($this->password));
        
            // bind data
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":password", $this->password);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }


        // UPDATE
        public function updatePerson(){
            $sqlQuery = "UPDATE ". $this->db_table ."
                    SET
                        name = :name, 
                        email = :email, 
                        password = :password
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->password=htmlspecialchars(strip_tags($this->password));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
    }
?>