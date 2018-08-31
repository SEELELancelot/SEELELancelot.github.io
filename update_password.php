<?php
  $id=$_POST['id'];
  $get_password=$_POST['input_new_password'];
  $get_password_again=$_POST['input_new_password_again'];
  if($get_password==""||$get_password_again==""){
    header("Location:change_password_view.php?id=$id&error=1");
    //密碼有一為空
    exit();
  }
  if($get_password!=$get_password_again){
    header("Location:change_password_view.php?id=$id&error=2");
    //密碼不相等
    exit();
  }
  include("connect.php");
  $link=connect();
  $sql="update member set password='$get_password_again' where id='$id' ";
  $b=mysqli_query($link,$sql);
  if($b){
    header("Location:change_password_view.php?id=$id&true=1");
    //修改成功
  }else {
    header("Location:change_password_view.php?id=$id&error=3");
    //修改失敗
  }

 ?>
