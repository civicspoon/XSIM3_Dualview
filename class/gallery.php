<?php 
    include_once '../config/database.php';

    class ItemType extends Database{
        
        public function list($category){
            $sql = mysqli_query($this->conn,"SELECT * FROM `gallery` WHERE category = '$category'");
            return $sql;
        }

        public function item_list($type){
            $sql = mysqli_query($this->conn,"SELECT * FROM gallery WHERE type = '$type'");
            return $sql;
        }
    }
?>