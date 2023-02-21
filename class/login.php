<?php 
include_once '../config/database.php';

    class LOGIN extends Database{
        public function login ($uid,$password){
            $uid = Utils($uid);
            $password = md5(Utils($password));


            $sql = mysqli_query($this->conn,"SELECT * FROM user WHERE id ='$uid' AND password ='$password' AND active = 0 ");
            return $sql;
        }

        public function insertToken($uid,$token){
            $sql = mysqli_query($this->conn,"INSERT INTO token(uid,token) VALUES('$uid','$token') ON DUPLICATE KEY UPDATE token = '$token' ");
            return $sql;
        }

        public function update_login($uid){
            $sql = mysqli_query($this->conn,"UPDATE `user` SET active = '1',`last_login`= now() WHERE id = '$uid'");
            return $sql;
        }
        public function logoff($uid){
            $sql = mysqli_query($this->conn,"UPDATE user SET active = '0'  WHERE id = '$uid'");
        }
    }

?>