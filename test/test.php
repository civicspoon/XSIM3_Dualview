<?php
$mysqli = new mysqli("localhost","root","aot#avsec","xsim");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}else{
    echo 'success';
}
?>