<?PHP 
    include_once '../config/config.php';

   class DB{
    public $conn; 
     function __construct()
     { 
         $connection  = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
         $this->conn=$connection;
         if($connection->connect_errno){
             echo "Not Connect Databaase";
         } else
         {
              
            }

          
        }  
         


  
       function last_cbt($uid){
        $last_cbt = mysqli_query($this->conn,"SELECT * FROM cbt Where user_id = '1' ORDER BY ID DESC LIMIT 1");
        return $last_cbt;
    }
    function today_cbt(){
        $res_cbt = mysqli_query($this->conn,"SELECT CAST(`record_date` as time) as 'time' , SEC_TO_TIME(`time_record`) AS 'rec_time',`image_count`,`score` FROM cbt Where user_id = '$_SESSION[UID]' AND date(`record_date`) = CURDATE() ORDER BY ID DESC ");
        return $res_cbt;
    }

public function DateSelectReport($uid,$formdate,$todate){
    $DateSelectReport = mysqli_query($this->conn,"SELECT Date(`record_date`) as 'Date' , SEC_TO_TIME(sum(`time_record`)) AS 'used_time' FROM `cbt` WHERE `record_date` BETWEEN '$formdate' AND '$todate' AND `user_id` = '$uid' group by Date(`record_date`) ORDER BY `record_date` desc;
    ");
    return $DateSelectReport;
}

public function news_list(){
    $new_list = mysqli_query($this->conn,"SELECT * FROM news ORDER BY ID DESC LIMIT 5");
    return $new_list;
}

    }////--------------------------------------------------------------END- Class--------------------------------------------------------//////

    
    function create_token(){
            $token = bin2hex(random_bytes(60));
            return $token;
            }