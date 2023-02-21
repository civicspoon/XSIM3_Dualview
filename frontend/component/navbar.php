<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">X-SIM 2</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page"  href="index.php?page_id=1"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page_id=3"><i class="fa fa-image" aria-hidden="true" ></i> Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page_id=2"><i class="fa fa-book" aria-hidden="true" ></i> Report</a>
                </li>
                <?php 
                if(isset($_SESSION['ROLE'])){
                    if($_SESSION['ROLE']==1 || $_SESSION['ROLE']==2 || $_SESSION['ROLE']==3){
                    echo   '<li class="nav-item">
                    <a class="nav-link" href="index.php?page_id=6&admin_page=7"><i class="fa fa-book" aria-hidden="true" ></i> Admin</a>
                </li>';
                }}
                ?>

                <li class="nav-item">
                    <a  data-bs-toggle="modal" data-bs-target="#usersetting" class="nav-link" href="#"><i class="fa fa-gear" aria-hidden="true"></i> Setting</a>
                </li>
            </ul>
            <ul class="navbar-nav ">
               
                    <a class="nav-link" href="#"><?php echo $_SESSION['NAME']?></a>
                    <li class="nav-item">
                    <a data-bs-toggle="modal" data-bs-target="#logout" class="nav-link btn btn-danger text-light" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Log-off</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
