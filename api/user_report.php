<?php 
    include_once '../class/user_report.php';
    $user_report = new User_report();
    if(isset($_GET['user_report'])){
        $stmt = $user_report->this_year($_GET['uid']);
        $res = $stmt->fetch_array();        
        echo json_encode($res);
    }
    if(isset($_GET['lastest'])){
        $stmt = $user_report->lastest($_GET['uid']);
        while($row = $stmt->fetch_array()){
            echo '<tr>'.
            '<td>'.dateconvert($row[2]).'</td>'.
            '<td>'.$row[8].'</td>'.
            '<td>'.$row[4].'</td>'.
            '<td>'.$row[5].'</td>'.
            '</tr>';
        }
    }
    
    function dateconvert($date){
        $newdate=date_create($date);
    return date_format($newdate,"วันที่ d/m/Y เวลา H:i:s");
    }
?>