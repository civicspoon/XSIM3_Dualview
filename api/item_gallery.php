<?php 
    include_once '../class/gallery.php';

    $list = new ItemType();
   

    if(isset($_POST['getlist'])){
        $type_id = $_POST['type'];
        $stmt = $list->item_list($type_id);
        $res = mysqli_fetch_array($stmt);
        print_r($res);

    }

    if(isset($_POST['insert'])){
        
    }
?>