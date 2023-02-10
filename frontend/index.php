<?php 
session_start();
  if(!isset($_SESSION['UID'])){
    header("LOCATION: ../index.html");
    exit(0);
  }

  
  include_once '../class/page.php';
  $getpage = new getPages();
  if(isset($_GET['page_id'])){
  $page = $getpage->read($_GET['page_id']);

    if ($page){
        
        foreach($page as $row){
            $url = $row["url"];
            $title =$row["title"];
          // $title = $row['title'];
        }
      
    }
 
  } else {
    $page = $getpage->read(1);
 
    if ($page){
        
        foreach($page as $row){
            $url = $row["url"];
            $title =$row["title"];
          // $title = $row['title'];
        }
      
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>X-Sim2</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!---fontawsom -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<style>
  body {
    background-image: url('../src/bg.jpg');
    background-repeat: no-repeat;
    overflow: auto;
  }
  
</style>


</head>
<body>


<?php include_once 'component/navbar.php'; ?>

<div class="container-fluid p-5">
  <h1> <a class="blog-header-logo text-dark" href="#"><img src="../src/logo.png" height="100ppx"></a> <?php echo $title ?></h1>
  <div class="row p-3 ">
  <input type="text" hidden="true" name="session" id="session" value="<?php if(isset($_GET['session'])){echo $_GET['session']; } ?>">

    <?php
    include $url;
    //include 'component/main.php';
    //include 'component/getdatabase_token.php';
    //echo "Database Token ". $dbtoken;
 
   // echo $bytes;
    ?>




   
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="alertmodal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
         
            <div class="modal-body" id="modalbody">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                           </div>
        </div>
    </div>
  </div>


  
<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="usersetting" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content"><form action="" autocomplete="off">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId"><i class="fa fa-gear" aria-hidden="true"></i> User Setting</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Change <div class="mb-2">
                  <label for="" class="form-label">Old Password</label>
                  <input autocomplete="off" type="password" class="form-control" name="" id="oldpass" placeholder="">
                </div>
                 <div class="mb-2">
                  <label for="" class="form-label">New Password</label>
                  <input autocomplete="off" type="password" class="form-control" name="" id="newpass" placeholder="">
                </div>
             <div class="mb-2">
                  <label for="" class="form-label">Repeat New Password</label>
                  <input autocomplete="off" type="password" class="form-control" name="" id="rep" placeholder="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Change password</button>
            </div></form>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#logout">
    Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-info-circle" aria-hidden="true"></i> Log-off</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <center><i class="fa fa-info-circle text-danger" style="font-size: 76px;" aria-hidden="true"></i><br>Log-Off Confirm</center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="logoff.php"><button type="button" class="btn btn-danger">Confirm</button></a>
            </div>
        </div>
    </div>
</div>
<!-- Optional: Place to the bottom of scripts -->
<script>
    const usersetting = new bootstrap.Modal(document.getElementById('usersetting'))

</script>

</body>
</html>
