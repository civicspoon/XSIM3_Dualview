<?php 
    include_once '../config/database.php';

    class CBT extends Database{
        public function insert($uid,$img,$score,$timerec){
            $uid = Utils($uid);
            $img = Utils($img);
            $score = Utils($score);
            $timerec = Utils($timerec);
            $sql = mysqli_query($this->conn,"INSERT INTO `cbt`(`user_id`,  `time_record`, `image_count`, `score`) VALUES ('$uid','$timerec','$img','$score')");
            return $sql;
        }
    }
?>