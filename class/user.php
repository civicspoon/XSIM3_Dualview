<?php
    include_once '../config/database.php';

    class User extends Database{
        public function read(){
            $sql = mysqli_query($this->conn,"SELECT * FROM user limit 500 ");
            return $sql;
        
        }
    }

 
?>