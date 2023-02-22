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

        public function admin_all_user($dep){
            $res = array();
            $sql = mysqli_query($this->conn,"SELECT COUNT(`id`) as 'alluser' FROM `user` WHERE `department_id` = '$dep'");
            $result = $sql->fetch_array();
            $res["alluser"] = $result[0];
          
            $sql = mysqli_query($this->conn,"SELECT COUNT(`id`) FROM `user` WHERE `department_id` = '$dep' AND DATE(`last_login`)= CURDATE();");
            $result = $sql->fetch_array();
            $res["todaylogin"] = $result[0];

            $neverlogin= mysqli_query($this->conn,"SELECT COUNT(`id`) FROM `user` WHERE `department_id` = '$dep' AND `last_login`= '0000-00-00 00:00:00';");
            $result = $neverlogin->fetch_array();
            $res["neverlogin"] = $result[0];
            
            $res = json_encode($res);
            return $res;
        }

        public function list_by_hour($dep,$range){
            $sql= mysqli_query($this->conn,"SELECT user.id,user.name as name, SUM(`time_record`) AS totalSum ,SEC_TO_TIME(SUM(`time_record`)) 
                                            FROM cbt 
                                            INNER JOIN user on user.id = cbt.user_id  
                                            WHERE YEAR(`record_date`)=YEAR(CURDATE()) AND user.department_id = '$dep'
                                            GROUP BY `user_id` HAVING totalSum between '$range' ORDER BY SEC_TO_TIME(SUM(`time_record`)) DESC");
            return $sql;

        }
    }


    /// TEMP SQL 
    // LIST รายชื่อพนักงาน ตามชั่วโมง SELECT `user_id`, SUM(`time_record`) AS totalSum FROM cbt INNER JOIN user on user.id = cbt.user_id GROUP BY `user_id` HAVING totalSum > 71999;

?>