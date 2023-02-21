<?php
include_once '../class/xrayimage.php';
$Xrayimg = new XIMG();

/* Get the name of the uploaded file */
$topview = $_FILES['topview']['name'];
$sideview = $_FILES['sideview']['name'];
$catid = $_POST['catid'];
$typeid = $_POST['typeid'];

/* Choose where to save the uploaded file */
$topviewlocation = "../xrayimg/".$topview;
$sideviewlocation = "../xrayimg/".$sideview;
/* Save the uploaded file to the local filesystem */
if(!file_exists($topviewlocation) || !file_exists($sideviewlocation)){
if (move_uploaded_file($_FILES['topview']['tmp_name'], $topviewlocation) ) { 
    if ( move_uploaded_file($_FILES['sideview']['tmp_name'], $sideviewlocation) ) { 

        $stmt = $Xrayimg->upload($catid,$topview,$sideview,$typeid);
          echo 'Success'; 
        } else { 
          
          echo 'Failure'; 
        } 
     
} else { 
  echo 'Failure'; 
  }
} /////// File Exist 
else{
  echo "Duplicate File";
}

?>