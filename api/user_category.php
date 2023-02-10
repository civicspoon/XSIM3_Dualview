<?php
    // include_once '../class/category.php';

    // $category = new Category();
    //         $stmt = $category->list();
    //         $row = mysqli_fetch_row($stmt);
    //       //*  print_r($row);
    //         if($row!=0){
    //             while ($row = $stmt -> fetch_row()) {
    //                 echo "<tr>".$row[2]. $row[3]."</tr>";
    //                 echo "<tr>".$row[4]. $row[3]."</tr>";
    //               }
    //               $stmt -> free_result();
    //             }
                  
    
        
    $mysqli = new mysqli("localhost","root","","xsim2");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "SELECT *FROM category ORDER BY sort";
$admin_path = '';

if ($result = $mysqli -> query($sql)) {
    print "<tr>";
  while ($row = $result -> fetch_row()) {
    echo "<a href='index.php?page_id=14&category=".$row['0']."'   class='col btn card  hrshadow m-1 text-center'>";
    echo '<img class="m-2" src="src/ico/'.$row[5].'" width="100px">'. "<hr><strong>".$row[2]."</strong><br>".$row[3].'</a>';
     //echo "<tr>".$row[4]. $row[3]."</tr>";
  } }
//   if ($result = $mysqli -> query($sql)) {
//   print "</tr>";  print "<tr>";
//   while ($row = $result -> fetch_row()) {

//     echo '<td ><img src="src/ico/'.$row[5].'" width="100px"></td>';
 
//   } print "</tr>";}
  $result -> free_result();


$mysqli -> close();
?>
