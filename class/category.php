<?php 
    include_once '../config/database.php';

    class Category extends Database{
        
        public function list(){
            $sql = mysqli_query($this->conn,"SELECT * FROM `category` ORDER BY `category`.`sort` ASC");
            return $sql;
        }

        public function type($cat_id){
            $sql = mysqli_query($this->conn,"SELECT * FROM `type` WHERE category = '$cat_id'");
            return $sql;
        }
    }
?>