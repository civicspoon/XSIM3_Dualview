<?php 
    include_once '../class/category.php';

    $DropDwn = new Category();
    if(isset($_GET['cat'])){
        $stmt = $DropDwn->list();
        echo '<option selected disabled>-- Select Category --</option>';
       while($row = $stmt->fetch_row()){
        echo "<option value ='".$row['0']."'>".$row[2]."</option>";
       }

    }

    if(isset($_GET['cat_id'])){
        $stmt = $DropDwn->type($_GET['cat_id']);
        echo '<option selected disabled>-- Select Item Type --</option>';
       while($row = $stmt->fetch_row()){
        echo "<option value ='".$row['0']."'>".$row[1]."</option>";
       }

    }
?>