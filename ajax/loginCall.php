<?php
session_start();
include '../cfg/db.php';
$user = $_POST['username'];
$pass = md5($_POST['password']);

$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
$run = mysqli_query($con, $sql);

if(mysqli_num_rows($run) > 0 ){
  $result = mysqli_fetch_assoc($run);
  // echo json_encode($result);
  echo "ok";
  $_SESSION['user'] = $result['username'];
  $_SESSION['realname'] = $result['realname'];
} else {
  echo '0 result';
}


mysqli_close($con);
?>
