<?php 
    include_once '../config/database.php';

    class XIMG extends Database{
        public function preloadImg(){
            $sql = mysqli_query($this->conn,"SELECT * FROM forshow ORDER BY RAND()");
            return $sql;
        }
    }
?>