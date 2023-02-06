<?php
    include_once '../config/database.php';

    class getPages extends Database{
        public function read($pageid){
            $sql = mysqli_query($this->conn,"SELECT * from pages WHERE id =$pageid");
            return  $sql;
        }
    }

 
?>