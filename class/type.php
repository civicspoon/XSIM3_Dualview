<?php 
    include_once '../config/database.php';

    class ItemType extends Database{
        
        public function list($category){
            $sql = mysqli_query($this->conn,"SELECT * FROM `type` WHERE category = '$category' ORDER BY id LIMIT ");
            return $sql;
        }
    }
?>