<?PHP 
include_once '../class/login.php';

$login = new LOGIN();
$token = createToken();
$stmt = $login->login($_POST['uid'],$_POST['password']);
$row = mysqli_fetch_row($stmt);
if($row!=0){
    foreach($stmt as $row){
        $uid = $row["id"];
        $name =$row["name"];
        
        $role =$row["role_id"];
      // $title = $row['title'];
    }
    session_start();
     $_SESSION['UID'] = $_POST['uid'];
     $_SESSION['NAME'] = $name;
     $_SESSION['ROLE'] = $role;
    $login->insertToken($_POST['uid'],$token);
    echo $token;
}else{
    echo 0;
}


?>