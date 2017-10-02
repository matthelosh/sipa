<?php
session_start();


if(!isset($_SESSION['user'])){
  header('location: login.php');
}
include_once 'cfg/db.php';
include_once 'cfg/globalConf.php';


  include 'partials/head.php';

  include 'partials/side.php';

  include 'partials/content.php';

  include 'partials/foot.php';


?>
