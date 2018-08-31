<?php
    session_start();
    if(isset($_SESSION['login'])){
      header("Location:manager_account_password.php");
    }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>管理員介面</title>
    <link rel="stylesheet" href="style/stylea.css">

      <!-- <script type="text/javascript">
          function change_write(){
            <?php if(isset($_SESSION['login'])){
               ?>
            document.getElementById("right").innerHTML="歡迎xxx進入表單登錄作業系統請選擇您要使用的表單";
            <?php
                }
            ?>
          }
      </script> -->
  </head>
  <body onload="change_write()">
    <div class="wrapper">
      <nav id="nav1">
        <ul>
          <li>
            <a href="#">新增一般使用者</a>
          </li>
          <li>
            <a href="manager_account_password.php">設定</a>
          </li>
          <li>
            <a href="manage_medicine/medicine.php">管制藥品</a>
          </li>
          <li>
            <a href="#">抗病毒藥劑</a>
          </li>
          <li>
            <a href="#">公費疫苗</a>
          </li>
          <li>
            <a href="#">狂犬病疫苗</a>
          </li>
        </ul>
      </nav>
      <div class="right" id="right">
        <?php
          if(isset($_GET['error'])){
            if($_GET['error']==1){
              ?>
              <p style="color:red;font-size:24px;" align='center'>
                帳號或密碼錯誤
              </p>
            <?php
            }
          }
        ?>
        <form class="" action="inspect_password.php" method="post">
          <table border="1" align='center'>
            <tr>
              <td>
                輸入帳號
              </td>
              <td>
                <input type="text" name="account" value="">
              </td>
            </tr>
            <tr>
              <td>
                輸入密碼
              </td>
              <td>
                <input type="password" name="password" value="">
              </td>
            </tr>
            <tr>
              <td colspan="2" align='center'>
                <input type="submit" name="" value="確定提交">
              </td>
            </tr>
          </table>
        </form>

      </div>
    </div>
  </body>
</html>
