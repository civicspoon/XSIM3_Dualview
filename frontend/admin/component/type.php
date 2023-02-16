<div class="container-fluid">
        <div class="row">
            <div class="col-3">
            <button class="btn btn-secondary btn-lg" onclick="history.back()"><i class="fa fa-backward" aria-hidden="true"></i> Go Back</button>
            </div>
            <div class="col-6"></div>
            <div class="col-3 text-end">
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Item Type
            </button>
            </div>
        </div>
        <div class="row mt-2">
    <?php 
        include_once ('../config/config.php');

        $con = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
            
        if(isset($_GET['page'])){
            $page =$_GET['page'];
        }else{
            $page = 1;
        }

        $record_show = 5 ;
        $offset = ($page-1)*$record_show; /// เริ่มที่ record
    
        $sql_cat = "SELECT * FROM type WHERE category = '".$_GET['cat_id']."'";

        $cat_row =  mysqli_query($con,$sql_cat);    
        $total_row = mysqli_num_rows($cat_row);
        $total_page = ceil($total_row/$record_show); // all page    
        $sql_cat .= "LIMIT $offset , $record_show";
        // query total 

        $res = mysqli_query($con,$sql_cat);
    ?>
    <div class="table-responsive-md card p-2 shadow">
        <table class="table table-light table-striped table-hover text-center">
            <thead  >
                <tr >
                    <th style="width: 100px;" class="bg-success text-white"  scope="col">ID</th>
                    <th  class="bg-success text-white"  scope="col">Name</th>
                    <th class="bg-success text-white"  scope="col">Image</th>
                    <th style="width: 150px;" class="bg-success text-white"  scope="col">Add</th>
                </tr>
            </thead>
            <tbody>

    
    <?php
    while($result=mysqli_fetch_array($res,MYSQLI_ASSOC)){
        echo  '<tr class=""> <td scope="row">'.
        $result['id']. 
        '</td scope="row">'. 
        '<td scope="row">'.
        $result['type']. 
        '</td scope="row">'. 
        '<td scope="row"> <img src="../src/typeimg/'.
        $result['img']. 
        '" width="150px"></td scope="row">'. 
        '<td scope="row">'.
    '<a class="btn btn-secondary btn-sm "  href="'.$_SERVER['SCRIPT_NAME'].'?page_id=6&admin_page=15&type_id='.$result['id'].'"   role="button"> <i class="fa fa-plus-square-o" aria-hidden="true"></i> New Item</a>'.
        '</td scope="row">';
    }


    ?>
            </tbody>
        </table>
    </div>


    Total <?php echo $total_row;?> Record : <?php echo $total_page;?> Page :
    <nav aria-label="Page navigation">
    <ul class="pagination">
    <?php
    $prev_page = $page-1;
    $next_page  = $page+1;
    //echo $_SERVER['SCRIPT_NAME'];
    $page_id = $_GET['page_id'];
    $admin_page = $_GET['admin_page'];
    $cat_id = $_GET['cat_id'];
    if($prev_page)
    {
        echo "  <li class='page-item'> <a  class='page-link' href='$_SERVER[SCRIPT_NAME]?page_id=$page_id&admin_page=$admin_page&cat_id=$cat_id&page=$prev_page'><< Back</a></li> ";
    }

    for($i=1; $i<=$total_page; $i++){
        if($i != $page)
        {
            echo "  <li class='page-item'> <a class='page-link' href='$_SERVER[SCRIPT_NAME]?page_id=$page_id&admin_page=$admin_page&cat_id=$cat_id&page=$i'>$i</a> </li>";
        }
        else
        {
            echo "<li class='page-item active page-link' aria-current='page'><b>  $i </b></li>";
        }
    }
    if($page!=$total_page)
    {
        echo "  <li class='page-item'> <a class='page-link' href='$_SERVER[SCRIPT_NAME]?page_id=$page_id&admin_page=$admin_page&cat_id=$cat_id&page=$next_page'>Next>></a> </li>";
    }

    ?>  </ul>
    </nav>
    </div>
</div>

<!-- Modal trigger button -->


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal modal-lg fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Add New Item Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <form action="" method="post" id="insertform" enctype="multipart/form-data">
                    <input type="text" id="cat_id" name="cat_id" hidden value="<?PHP echo $_GET['cat_id'] ?>" required>
                <div class="row p-2">
                    <div class="col-3">
                        Item Type Code <p class="badge"></p>
                    </div>                    
                    <div class="col-3">
                        <input type="text" name="" class="form-control" id="typeid" maxlength="5" style="width: 100px;text-transform: uppercase" placeholder="Max 5 Char" required >
                    </div>
                    <div class="col-2">
                        Item Name
                    </div>
                    <div class="col-4">
                        <input type="text"  id="itemname" name="" class="form-control" id="" maxlength="5" placeholder="Item Name" required>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-3">
                        <i class="fa fa-image" aria-hidden="true"></i> Image
                    </div>
                    <div class="col-9">
                        <input type="file" id="typeimage" name="" class="form-control" accept="image/*" id="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'))
 
    $(document).ready( function(){
        $('#insertform').on('submit',function(e){
            e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax
                var fd = new FormData(); // เตรียมข้อมูล form สำหรับส่งด้วย  FormData Object

                var files = $('#typeimage')[0].files; //เป็นการดึงข้อมูลรูปภาพเพื่อเตรียมเช็คไฟล์ก่อนทำงานส่วน Ajax
			
                // เช็คว่ามีไฟล์รูปภาพอยู่หรือไม่
                if(files.length > 0 ){

                    fd.append('file',files[0]); //ใช้ในการแทรกค่าไฟล์รูปภาพใน element 
                    id = document.getElementById("typeid").value
                    itemname = document.getElementById("itemname").value
                    catid = document.getElementById("cat_id").value
                    fd.append('id',id)
                    fd.append('itemname',itemname)
                    fd.append('catid',catid)
                 
                    $.ajax({
                        url:'../api/item_gallery.php', //ให้ระบุชื่อไฟล์ PHP ที่เราจะส่งค่าไป
                        type:'post',
                        data:
                            fd
                            , //ข้อมูลจาก input ที่ส่งเข้าไปที่ PHP
                        contentType: false,
                        processData: false,
                        success: function(response){ //หากทำงานสำเร็จ จะรับค่ามาจาก JSON หลังจากนั้นก็ให้ทำงานตามที่เรากำหนดได้
				
                         
                                alert(response);
                                document.getElementById('insertform').reset()

                   ////
                  
                            
                        }
                    })
                }
        })
        
    })
</script>