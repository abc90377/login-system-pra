<?php
include_once('header.php');
?>
<?php
session_start();
if(isset($_SESSION['login'])){
  $dsn="mysql:host=localhost;dbname=login_pra;charset:utf8";
  $pdo=new PDO ($dsn,'root','');
  $sql="SELECT `role` FROM `login`,`mem` WHERE `login`.`id`=`mem`.`login_id` && `login`.`acc`='{$_SESSION['login']}'";
  $user=$pdo->query($sql)->fetch();
  switch ($user['role']) {
    case '會員':
      header("location:mem.php");
      break;
    case 'vip':
      header("location:vip.php");
      break;
    case '管理員':
      header("location:admin.php");
      break;
    
  
  }
  } 
  
  
  ?>

  <div class="container mt-5">
    <div class="col-6 border bg-light m-auto" style="height:300px;box-shadow:1px 1px 10px #185761">
      <h5 class="text-center py-3 border-bottom">會員登入</h5>
      <?php
      if (!empty($_GET['meg'])) {
        echo $_GET['meg'];
      }
      ?>
      <form action="check.php" class="mt-3 col-6 mx-auto" method="post">
        <p class="text-center">帳號：<input type="text" name="acc"></p>
        <p class="text-center">密碼：<input type="password" name="pw"></p>
        <p class="d-flex justify-content-around" style="font-size:0.87rem">
          <a href="forget_pw.php">忘記密碼?</a>
          <a href="register.php">註冊新帳號</a>
        </p>
        <p class="text-center"><input type="submit" value="登入"></p>
      </form>
    </div>
  </div>
  <?php
  include_once('footer.php');
  ?>