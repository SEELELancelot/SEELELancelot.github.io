<?php
  $get_account=$_POST['account'];
  $get_password=$_POST['password'];
  include ("connect.php");
  $link=connect();
  $sql="select account,password,responsible from member where account='$get_account'";
  $result=mysqli_query($link,$sql);
  if($row=mysqli_fetch_assoc($result)){
    if($get_password==$row['password']){
      session_start();
      $_SESSION['login']='true';
      //一般用戶
      header("Location:index.php");
      if($row['responsible']=='true'){
        $_SESSION['responsible']='true';
          //管理者
      }
      exit();
    }
  }
  header("Location:index.php?error=1");

 ?>
