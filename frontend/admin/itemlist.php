<div class="container">
<div class="row">
            <div class="col-3">
            <button class="btn btn-secondary btn-lg" onclick="history.back()"><i class="fa fa-backward" aria-hidden="true"></i> Go Back</button>
            </div>
            <div class="col-6"></div>
            <div class="col-3 text-end">
            <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#newitemmodal">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Item</button>
            </div>
        </div>

<?php 
   
    include ('../class/gallery.php');

    $list = new ItemType();
    $type_id = $_GET['type_id'];
  
        //$type_id = $_POST['type'];
        $stmt = $list->item_list($type_id);
        //$res = mysqli_fetch_array($stmt);
        //print_r($res);
      // $row = mysqli_num_rows($stmt);
      $resarray =  array();
        $itemperrow = 4;
       
     if ($stmt) {
          while ($row = $stmt -> fetch_array()) {
            array_push($resarray,$row) ;
          }   
        //  print_r($resarray);
     }
        $i_row =0;
        echo '<div class="row justify-content-between">';
 for($i=0;$i<count($resarray);$i++){

    if($resarray[$i]['xray1']!=''){
        $x1 = '<i class="fa fa-check-circle-o" aria-hidden="true"></i>';
    }else{
        $x1 = '';
    }
    if($resarray[$i]['xray2']!=''){
        $x2 = '<i class="fa fa-check-circle-o" aria-hidden="true"></i>';
    }else{
        $x2 = '';
    }
    if($resarray[$i]['xray3']!=''){
        $x3 = '<i class="fa fa-check-circle-o" aria-hidden="true"></i>';
    }else{
        $x3 = '';
    }
    if($resarray[$i]['xray4']!=''){
        $x4 = '<i class="fa fa-check-circle-o" aria-hidden="true"></i>';
    }else{
        $x4 = '';
    }

        echo '<div class="col card m-2 p-2  rounded">'.
             '<p><strong>Item id : </strong>'.$type_id.'-'.
             $resarray[$i]['id'].''.
             '<p><strong> Item Name : </strong>'.$resarray[$i]['name'].'</p>'.
             '<a href="" onclick="showEdit()" ><center><img src="'.$resarray[$i]['img'].'" width="170px"></center></a>'.
             '<strong><u>X-Ray Images</u></strong>'.
             '<div class="row text-center">'.        
             '<div class="col-3">Side A</div>'.
             '<div class="col-3">Side B</div>'.
             '<div class="col-3">Side C</div>'.
             '<div class="col-3">Side D</div>'.
          '</div>'.
             '<div class="row text-center">'.        
                '<div class="col-3">'.$x1.'</div>'.
                '<div class="col-3">'.$x2.'</div>'.
                '<div class="col-3">'.$x3.'</div>'.
                '<div class="col-3">'.$x4.'</div>'.
             '</div>'.
             '<div class="row">'.        
                '<div class="col-12"><a class="btn btn-block btn-info">Edit</a></div>'.
             '</div>'.
             
             '</div>';
        $i_row++;
 
    if($i_row==$itemperrow){
        echo '</div><div class="row justify-content-between">';
        $i_row=0;
    }

 }
   echo "</div>";
      
    
?>
</div>

<!-- add new item modal -->

<!-- Modal trigger button -->


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="newitemmodal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitleId"><i class="fa fa-plus-square-o" aria-hidden="true"></i> New item</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

</script>

<!-- Edit Item Modal -->

<!-- Modal trigger button -->
<!-- <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
  Launch
</button> -->

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="editmodal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
   

  function showEdit(){
   
        $("#editmodal").modal("show");
    }

</script>