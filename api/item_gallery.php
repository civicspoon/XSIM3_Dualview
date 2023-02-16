<?php 
    include_once '../class/gallery.php';

    $list = new ItemType();
   

    if(isset($_POST['getlist'])){
        $type_id = $_POST['type'];
        $stmt = $list->item_list($type_id);
        $res = mysqli_fetch_array($stmt);
        print_r($res);

    }

    if(isset($_FILES['file']['name'])){


     


        /* Getting file name */
        $filename = $_FILES['file']['name'];
    
        /* Location */
        $location = $filename;
        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
        $imageFileType = strtolower($imageFileType);
    
        /* Valid extensions */
        $id = strtoupper(Utils($_POST['id']));
        $itemname = Utils($_POST['itemname']);
        $catid = Utils($_POST['catid']);
    
        $response = 0;
    
               /* Upload file */
               if(move_uploaded_file($_FILES['file']['tmp_name'],'../src/typeimg/'.$filename)){
                 
               
                 $stmt = $list->insert($id,$itemname,$catid,$filename);

            
                    
                     echo "Success";
                 //echo  $data;
              }else{
               
                echo ($errors);
              }  
            }             
    
    

?>