<?php 
    include_once '../class/gallery.php';

    $insert_item = new ItemType();



    /* Getting file name */
    $filename = $_FILES['file']['name'];
    $x1 = $_FILES['x1']['name'];
    $x2 = $_FILES['x2']['name'];
    $x3 = $_FILES['x3']['name'];
    $x4 = $_FILES['x4']['name'];

    /* Location */
    $location = $filename;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);

    /* Valid extensions */
    $id = strtoupper(Utils($_POST['id']));
    $itemname = Utils($_POST['itemname']);
    $type = Utils($_POST['type']);
 

    $response = 0;

           /* Upload file */
          move_uploaded_file($_FILES['file']['tmp_name'],'../src/iitemimg/'.$filename);
            move_uploaded_file($_FILES['x1']['tmp_name'],'../src/iitemimg/'.$x1);
                move_uploaded_file($_FILES['x2']['tmp_name'],'../src/iitemimg/'.$x2);
                  move_uploaded_file($_FILES['x3']['tmp_name'],'../src/iitemimg/'.$x3);
                        move_uploaded_file($_FILES['x4']['tmp_name'],'../src/iitemimg/'.$x4);
           
             $stmt = $insert_item->insert_item($id,$itemname,$filename,$x1,$x2,$x3,$x4,$type);

        
                
                 echo "Success";
             //echo  $data;
       
      
     
            
    
        ?>