<?PHP
include_once ('../class/login.php');
session_start();
$Logoff = new LOGIN();
$Logoff->logoff($_SESSION['UID']);
    session_destroy();
    
    header("LOCATION:../index.html")
?>