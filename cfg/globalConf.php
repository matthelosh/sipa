<?php
$sql="SELECT * FROM users WHERE username = '$_SESSION[user]'";
$run = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($run);
$SPA = array('nama'=>'PAMDES');

?>
