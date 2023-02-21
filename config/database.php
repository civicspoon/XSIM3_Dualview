<?PHP 
    include_once 'config.php';


    class Database{
       public $conn; 
        function __construct()
        { 
            $connection  = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
            $this->conn=$connection;
            if($connection->connect_errno){
                echo "Not Connect Databaase";
            } else
            {
                $intRejectTime = 30;
                $stmt = mysqli_query($this->conn,"UPDATE user SET active = '0', last_login = '0000-00-00 00:00:00'  WHERE 1 AND DATE_ADD(last_login, INTERVAL $intRejectTime MINUTE) <= NOW() ");
                
                if(isset($_SESSION['UID'])){
                    $sql = mysqli_query($this->conn,"UPDATE `user` SET `last_login`= now() WHERE id = '$_SESSION[UID]'");
                }
               //session_start();
            }

          
        }   
    } 
?>