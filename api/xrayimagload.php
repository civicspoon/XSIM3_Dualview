<?php 
include '../class/xrayimage.php';

$ximg = new XIMG();

  
        $stmt = $ximg->preloadImg();
        $row = mysqli_fetch_row($stmt);
        
         if($row!=0){
          $resultArray = array();
                while($result = mysqli_fetch_array($stmt,MYSQLI_ASSOC))
        {
          array_push($resultArray,$result);
        }
     

        echo json_encode($resultArray);

            }
        
?> 