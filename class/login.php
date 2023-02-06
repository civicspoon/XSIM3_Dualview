<?php 
include_once '../config/database.php';

    class LOGIN extends Database{
        public function login ($uid,$password){
            $uid = Utils($uid);
            $password = md5(Utils($password));


            $sql = mysqli_query($this->conn,"SELECT * FROM user WHERE id ='$uid' AND password ='$password'");
            return $sql;
        }

        public function insertToken($uid,$token){
            $sql = mysqli_query($this->conn,"INSERT INTO token(uid,token) VALUES('$uid','$token') ON DUPLICATE KEY UPDATE token = '$token' ");
            return $sql;
        }
    }

?>