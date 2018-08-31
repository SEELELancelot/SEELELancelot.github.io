<?php
  session_start();
  include("connect.php");
  if(!isset($_SESSION['login'])){
    header("Location:index.php");
  }

  $link=connect();
  $show_per_page=3;//每頁顯示量
  $sql_num="select id from member";
  $result_num=mysqli_query($link,$sql_num);
  $total_num=mysqli_num_rows($result_num);//總共有多少筆資料
  mysqli_free_result($result_num);
  $total_page=ceil($total_num/$show_per_page); //總共有幾頁

  $page=1;
  if(isset($_GET['page'])){
    if($_GET['page']>=1&&$_GET['page']<=$total_page){
        $page=$_GET['page'];  //超過默認第一頁
    }

  }
  $start_num=($page-1)*$show_per_page;
  $sql="select id,account,responsible,name,password from member limit $start_num,$show_per_page";
  $result=mysqli_query($link,$sql);
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>管理用戶</title>
     <link rel="stylesheet" href='style/stylea.css'>
     <link rel="stylesheet" href="header/style.css">
   </head>
   <body>
     <div class="wrapper">

       <nav id="nav1">
         <ul>
           <li>
             <a href="insert_new_user/insert_new_user.php">新增一般使用者</a>
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
         <div class="content">
           <p align='center' style="color:rgb(94, 0, 213);font-size:32px;">
             全部總共有
             <?php echo $total_num."筆資料" ?>

           </p>
            <table border="1" align='center'>
              <tr>
                <th>員工帳號</th>
                <th>員工姓名</th>
                <th>員工密碼</th>
                <th>負責人</th>
                <th>修改密碼</th>
              </tr>
              <?php
                while ($row=mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>";
                  echo $row['account'];
                  echo "</td>";
                  echo "<td>";
                  echo $row['name'];
                  echo "</td>";
                  echo "<td>";
                  echo $row['password'];
                  echo "</td>";
                  ?>
                  <td>
                     <input type="checkbox" name="" value=""
                      <?php
                        if($row['responsible']=='true'){
                          echo "checked";
                        }
                       ?>
                      >
                   </td>
                   <?php


                     if(isset($_SESSION['responsible'])){
                       ?>
                       <td>
                        <form class="" action="change_password_view.php?id=<?php echo $row['id']; ?>" method="post">
                            <input type="submit" name="" value="修改密碼">

                        </form>
                       </td>
                       <?php
                     }
                     else {
                       echo "<td>";
                       echo "No";
                       echo "</td>";
                     }
                    ?>
                  <?php
                  echo "</tr>";
                }
                mysqli_free_result($result);
                mysqli_close($link);
               ?>
            </table>

            <form class="" action="" method="get" style="margin-top:20px;" align='center'>
              查詢第幾頁:
                <input type="text" name="page" value="">
                <input type="submit" name="" value="Go">
            </form>
            <p align='center' style="color:blue;font-size:32px;">
              全部總共有
              <?php echo $total_page."頁" ?>
            </p>
            <?php
              if(isset($_SESSION['login'])){
                ?>
                  <form class="" action="login_out.php" method="post" align='center'>
                    <input type="submit" name="" value="登出" >
                  </form>
                <?php
              }
             ?>
         </div>
       </div>
     </div>
   </body>
 </html>
