<?php 
    include_once '../config/database.php';

    class User_report extends Database{
        public function this_year($uid){
            $mysql = mysqli_query($this->conn,"SELECT sum(`image_count`) as 'imgcout' ,SUM(`score`) AS 'score' , SEC_TO_TIME(SUM(time_record)) as 'rectime' FROM `cbt` WHERE user_id = '$uid' AND YEAR(record_date) = YEAR(curdate())");
            return $mysql;
        }
        public function lastest($uid){
            $mysql = mysqli_query($this->conn,"SELECT * , SEC_TO_TIME(time_record) as 'rectime' FROM `cbt` WHERE user_id = '$uid' ORDER BY `cbt`.`id` DESC limit 10");
            return $mysql;
        }
    }
?>