<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse rounded-3">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <h4><i class="fa fa-user-circle-o" aria-hidden="true"></i> Admin</h4>
        <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../frontend/index.php?page_id=6&admin_page=7">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../frontend/index.php?page_id=6&admin_page=8">
            <span data-feather="file"></span>
           Report
          </a>
        </li>
        <hr><?php  if($_SESSION['ROLE']==1){ echo '
        <h4><i class="fa fa-mortar-board" aria-hidden="true"></i> Training Course</h4>
       
       <li class="nav-item">
          <a class="nav-link" href="../frontend/index.php?page_id=6&admin_page=11">
            <span data-feather="shopping-cart"></span>
            Course Config
          </a>
        </li>        
        <hr>
        <h4><i class="fa fa-image" aria-hidden="true"></i> Xray Image</h4>
        <li class="nav-item">
          <a class="nav-link" href="../frontend/index.php?page_id=6&admin_page=9">
            <span data-feather="users"></span>
            Category
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../frontend/index.php?page_id=6&admin_page=16">
            <span data-feather="users"></span>
            X-Ray images
          </a>
        </li>


      </ul>
';
   }
?>   
    </div>
  </nav>
