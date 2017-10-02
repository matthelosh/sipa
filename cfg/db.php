<?php
  $host = 'localhost';
  $db = 'spa';
  $user = 'spaUser';
  $pass = 'spa123';

  $con = mysqli_connect($host, $user, $pass, $db);
  if(!$con) {
    echo 'DB not connected';
  }else{
    // echo 'Database tersambung';
  }
?>
