<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>白金會員中心</title>
</head>
<body>
<h1>白金會員中心</h1>
<?php
if(isset($_COOKIE['login'])){
 $dsn="mysql:host=localhost;dbname=login_pra;charset=utf8";
$pdo=new PDO ($dsn,'root','');
$sql="SELECT `name` FROM `login`,`mem` WHERE `login`.`id`=`mem`.`login_id` && `login`.`acc`='{$_COOKIE['login']}'";
$user=$pdo->query($sql)->fetch();
}
?>

<p>尊爵的<?=$user['name'];?>你好，歡迎你</p>
<a href="logout.php">登出</a>
</body>
</html>