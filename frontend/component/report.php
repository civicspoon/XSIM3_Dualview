
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                Practical
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Test
              </a>
            </li>
           
          </ul>

       
        </div>
      </nav>

      <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>
        <?php 
     include("database_con.php");
     $con = new DB();

     $report =$con->DateSelectReport('1','2023-01-01','2023-12-31');
?>
  
<table  class="table table-striped">
  <tr style="text-align: center;">
	  <th align="center">No</th>
    <th align="center">Date Record</th>
    <th align="center">Time Used</th>


  </tr>
<?php
if (mysqli_num_rows($report) > 0) {
  $sn=1;
  while($data = mysqli_fetch_assoc($report)) {
 ?>
 <tr>
   <td align="center"><?php echo $sn; ?> </td>
   <td align="center"><?php echo date('d/m/Y',strtotime($data['Date'])); ?> </td>
   <td align="center"><?php echo $data['used_time']; ?> </td>

 <tr>
 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No Record Found</td>
    </tr>
 <?php } ?>
  </table>