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
      <?php include_once 'component/sidebar.php' ?>

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



