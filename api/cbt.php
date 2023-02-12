<?php
    include_once '../class/cbt.php';

    $cbt = new CBT();
    if($_POST['record']=1){
        $uid = $_POST['uid'];
        $img = $_POST['img'];
        $timerec = $_POST['timerec'];
        $score = $_POST['score'];
        $stmt = $cbt->insert($uid,$img,$score,$timerec);
        if($stmt === TRUE){
            echo '1';
        }else{
            echo '0';
        }
    }
?>