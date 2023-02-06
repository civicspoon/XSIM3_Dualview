<?php 
    define("DBHOST","localhost");
    define("DBUSER","root");
    define("DBPASS","");
    define("DBNAME","xsim2");

    function Utils($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        $data = strip_tags($data);

        return($data);

    }

    function createToken(){
        $bytes = random_bytes(20);    
        return (bin2hex($bytes));  
    }

?>