<?php
    $get_id=$_GET['id'];
    include("connect.php");
    $link=connect();
    $sql="select account,name,password from member where id=$get_id";
    $result=mysqli_query($link,$sql);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>改變密碼介面</title>
    <link rel="stylesheet" href="style/stylea.css">
    <link rel="stylesheet" href="header/style.css">
    <style media="screen">
      .show{
        margin-top:30px;
      }
      .table1{
        border: dotted 5px rgba(242, 3, 255,0.7);
        margin-bottom: 50px;
      }
      .table2{
        border: dotted 5px rgba(162, 19, 19,0.7);
      }
      .error{
        color:red;
        text-align: center;
      }
      .true{
        color:blue;
        text-align: center;
      }
    </style>
  </head>
  <body>
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
            <a href="#">管制藥品</a>
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
        <div class="centeraa">
          <nav>
            <ul>
              <li id="link">
                  權限管理:負責人:
              </li>
              <li>
                  帳號密碼
              </li>
            </ul>
          </nav>
        </div>

        <div class="show">
            <table  align='center'class="table1" >
              <tr>
                <th>員工編號</th>
                <th>姓名</th>
              </tr>
              <?php
                while($row=mysqli_fetch_assoc($result)){
                  echo "<tr>";
                  echo "<td>";
                  echo $row['account'];
                  echo "</td>";
                  echo "<td>";
                  echo $row['name'];
                  echo "</td>";
                  echo "</tr>";
                  $get_password=$row['password'];
                }
               ?>
             </table>
             <form class="" action="update_password.php" method="post">
               <table align='center' class="table2">
               <tr>
                 <th>原密碼</th>
                 <td>
                     <?php echo $get_password; ?>
                 </td>
               </tr>
               <tr>
                 <th>新密碼</th>
                 <td>
                   <input type="password" name="input_new_password" value="">
                 </td>
               </tr>
               <tr>
                 <th>再次輸入新密碼</th>
                 <td>
                   <input type="password" name="input_new_password_again" value="">
                 </td>
               </tr>
               <tr>
                 <td colspan="2" align='center'>
                  <input type="submit" name="" value="更改密碼">
                  <input type="hidden" name="id" value="<?php echo $get_id; ?>">
                 </td>
               </tr>
               <?php
                 mysqli_free_result($result);
                 mysqli_close($link);
                ?>
              </table>
           </form>
        </div>
        <?php
        if(isset($_GET['error'])){
          if($_GET['error']==1){
            echo "<h1 class='error'>";
            echo "帳號有一為空";
            echo "</h1>";
          }
          if($_GET['error']==2){
            echo "<h1 class='error'>";
            echo "兩次密碼並不相等";
            echo "</h1>";
          }
          if($_GET['error']==3){
            echo "<h1 class='error'>";
            echo "修改失敗";
            echo "</h1>";
          }
        }
        if(isset($_GET['true'])){
          if($_GET['true']=='1'){
            echo "<h1 class='true'>";
            echo "修改成功";
            echo "</h1>";
          }
        }
         ?>
      </div>
    </div>

  </body>
</html>
