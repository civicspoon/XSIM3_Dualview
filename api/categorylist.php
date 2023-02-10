<?php
        
    
        
    $mysqli = new mysqli("localhost","root","","xsim2");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "SELECT *FROM category ORDER BY sort";
$admin_path = '';

if ($result = $mysqli -> query($sql)) {
    print "<option selected disable>---Please Choose item's category---</option>";
  while ($row = $result -> fetch_row()) {
    echo "<option value ='".$row['0']."'>".$row[2]."</option>";
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
