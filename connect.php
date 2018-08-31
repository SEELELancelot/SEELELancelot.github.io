<?php
function connect(){
  $localhost="localhost";
  $account="root";
  $password="";
  $database="medical";
  $link=mysqli_connect($localhost,$account,$password,$database);
  if($link){
    mysqli_query($link,"set names utf8");
  //  echo "連線成功";
    return $link;
  }
  else {
    die("連線失敗");
  }

}

 ?>
