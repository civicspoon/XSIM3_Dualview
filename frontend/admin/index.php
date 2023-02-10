<?PHP 
  include_once '../class/page.php';
  $getpage = new getPages();
  if(isset($_GET['admin_page'])){
  $page = $getpage->read($_GET['admin_page']);

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
  <div class="container-fluid">
    <div class="row">
      <?php include_once 'component/sidebar.html' ?>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2"><?php echo $title ?></h1>
        </div>
   <?php          
        include $url;
    ?>
      </main>
    </div>
  </div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js"
    integrity="sha384-EbSscX4STvYAC/DxHse8z5gEDaNiKAIGW+EpfzYTfQrgIlHywXXrM9SUIZ0BlyfF"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    integrity="sha384-i+dHPTzZw7YVZOx9lbH5l6lP74sLRtMtwN2XjVqjf3uAGAREAF4LMIUDTWEVs4LI"
    crossorigin="anonymous"></script>

