<?php
  session_start();
  unset($_SESSION['login']);
  unset($_SESSION['responsible']);
  header("Location:index.php");
  exit();
 ?>
