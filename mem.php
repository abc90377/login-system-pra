<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>一般會員中心</title>
</head>
<body>
<h1>一般會員中心</h1> 
<?php
session_start();

if(isset($_SESSION['login'])){
 $dsn="mysql:host=localhost;dbname=login_pra;charset=utf8";
$pdo=new PDO ($dsn,'root','');
$sql="SELECT `name` FROM `login`,`mem` WHERE `login`.`id`=`mem`.`login_id` && `login`.`acc`='{$_SESSION['login']}'";
$user=$pdo->query($sql)->fetch();
}
?>
親愛的<?=$user['name'];?>你好，歡迎你
<a href="logout.php">登出</a>
</body>

</html>