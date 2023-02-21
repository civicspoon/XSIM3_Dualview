<?php 
    include_once '../config/database.php';

    class XIMG extends Database{
        public function preloadImg(){
            $sql = mysqli_query($this->conn,"SELECT * FROM xrayimg ORDER BY RAND() limit 200");
            return $sql;
        }

        public function upload($category,$side1,$side2,$type){
            $sql = mysqli_query($this->conn,"INSERT INTO `xrayimg`( `category`, `side1`, `side2`, `type`) VALUES ('$category','$side1','$side2','$type')");
            return $sql;
        }
    }
?>