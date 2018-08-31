<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>醫療登入介面</title>
    <style media="screen" >

      table td,input{
        font-size: 30px;
      }
    </style>
  </head>
    <body>
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
  </body>
</html>
