<?php
$title='管理中心';
include_once('header.php');
?>
<table class='table table-light '>
<thead>
<tr>
<td>姓名</td>
<td>帳號</td>
<td>密碼</td>
<td>信箱</td>
<td>生日</td>
<td>地址</td>
<td>學歷</td>
<td>身分</td>
</thead>
</tr>
<tbody>
<?php
$dsn="mysql:host=localhost;dbname=login_pra;charset=utf8";
$pdo=new PDO($dsn,'root','');

$amount='SELECT COUNT(*) FROM `login`,`mem` where `login`.`id`=`mem`.`login_id` ';

$sql='select `name`,`acc`,`pw`,`email`,`birthday`,`addr`,`education`,`role` from `login`,`mem` where `login`.`id`=`mem`.`login_id` ';
$users=$pdo->query($sql)->fetchALL();
// print_r($users);
foreach($users as $user){

echo "</tr>";
echo "<td>".$user['name']."</td>";
echo "<td>".$user['acc']."</td>";
echo "<td>".$user['pw']."</td>";
echo "<td>".$user['email']."</td>";
echo "<td>".$user['birthday']."</td>";
echo "<td>".$user['addr']."</td>";
echo "<td>".$user['education']."</td>";
echo "<td>".$user['role']."</td>";
echo "</tr>";
}







?>
</tbody>
</table>
<?
include_once('footer.php');   
?>