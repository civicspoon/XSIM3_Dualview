<?php 
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
               //session_start();
            }

          
        }  
    } 
?>