<?php

        
    $mysqli = new mysqli("localhost","root","aot#avsec","xsim2");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "SELECT *FROM category ORDER BY sort";
$admin_path = '';

if ($result = $mysqli -> query($sql)) {
    print "<tr>";
  while ($row = $result -> fetch_row()) {
    echo "<a href='index.php?page_id=6&admin_page=10&cat_id=".$row['0']."'   class='col btn card  hrshadow m-1 text-center'>";
    echo '<img class="m-2" src="src/ico/'.$row[5].'" width="100px">'. "<hr><strong>".$row[2]."</strong><br>".$row[3].'</a>';
  } }

  $result -> free_result();


$mysqli -> close();
?>
