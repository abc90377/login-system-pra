<?php
//新增使用者資料進資料庫
$dsn="mysql:host=localhost;dbname=login_pra;charset=utf8";
$pdo=new PDO($dsn,'root','');
$acc=$_POST['acc'];
$pw=$_POST['pw'];
$email=$_POST['email'];
$name=$_POST['name'];
$birthday=$_POST['birthday'];
$addr=$_POST['addr'];
$education=$_POST['education'];

$insert_tologin="insert into `login`(`acc`,`pw`,`email`) values('$acc','$pw','$email')";
$pdo->exec($insert_tologin);//將資料插入login資料表
$sql="select * from `login` where `acc`='$acc' && `pw`='$pw'";
$logindata=$pdo->query($sql)->fetch();
// print_r($logindata);//印出login資料表,確認是否插入成功
$login_id=$logindata['id'];//找出新會員的login id
// echo $login_id;

$insert_tomem="insert into `mem`(`name`,`birthday`,`addr`,`education`,`login_id`) 
values ('$name','$birthday','$addr','$education','$login_id')";
$result=$pdo->exec($insert_tomem);//將新會員資料加入mem資料表,並使其login_id與login資料表的id相同,以建立關聯
if ($result) {
    header('location:index.php?meg=新增成功');
}else {
    header('location:index.php?meg=新增失敗');
}
?>