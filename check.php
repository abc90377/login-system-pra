<?php
/******登入檢查******
 * 1. 連線資料庫
 * 2. 取得表單傳遞的帳密資料
 * 3. 比對會員資料表中是否有相符的資料
 * 4. 取得會員資料
 * 5. 檢查會員身份及權限
 * 6. 依據會員身份導向不同的頁面
 */


$dsn="mysql:host=localhost;dbname=login_pra;charset=utf8";
$pdo=new PDO($dsn,'root','');
$acc=$_POST['acc'];
$pw=$_POST['pw'];
$sql="select * from `login` where `acc`='$acc' && `pw`='$pw'";
$check=$pdo->query($sql)->fetch();
$rolecheck="select * from `login`,`mem` where `login`.`acc`='$acc' && `login`.`id`=`mem`.`login_id`";
$user=$pdo->query($rolecheck)->fetch();
$role=$user['role'];
$name=$user['name'];
session_start();
$_SESSION['login']=$acc;
if ($check) {
    switch ($role) {
        case '會員':
            header("location:mem.php?name=$name");
            break;
        case '管理員':
            header("location:admin.php?name=$name");
            break;
        case 'vip':
            header("location:vip.php?name=$name");
            break;
        

    }
}else {
    header('location:index.php?meg=帳號或密碼錯誤');
}


?>