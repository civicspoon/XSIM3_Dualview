<?php 
include '../class/user.php';

$user = new User();

  
        $stmt = $user->read();
        $row = mysqli_fetch_row($stmt);
        
         if($row!=0){

            $res = mysqli_fetch_all($stmt);
            echo json_encode($res,JSON_UNESCAPED_UNICODE);
        //     foreach($stmt as $row){
        //         echo $row["id"];
        //         echo $name =$row["name"];
                
        //         $role =$row["role_id"];
              // $title = $row['title'];
            }
        
?>