<?php
 $dsn="mysql:host=localhost;dbname=login_pra;charset=utf8";
$pdo=new PDO($dsn,'root','');
print_r($_POST);
$update_login="update `login`
 set 
 `acc`='{$_POST['acc']}',
 `pw`='{$_POST['pw']}',
 `email`='{$_POST['email']}'
 where
 `id`='{$_POST['id']}'
 ";
 $pdo->exec($update_login);
$update_member="update `mem`
 set 
 `name`='{$_POST['name']}',
 `birthday`='{$_POST['birthday']}',
 `addr`='{$_POST['addr']}',
 `education`='{$_POST['education']}',
 `role`='{$_POST['role']}'
 where
 `login_id`='{$_POST['id']}'
 ";
 $pdo->exec($update_member);



header('location:admin.php');
?>