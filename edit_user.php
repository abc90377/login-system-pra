<?php
$title="會員資料修改";
include_once('header.php');
$dsn="mysql:host=localhost;dbname=login_pra;charset=utf8";
$pdo=new PDO($dsn,'root','');
$id=$_GET['id'];
$sql="select * from `login`,`mem` where `login`.`id`=`mem`.`login_id` && `login`.`id`='$id'";
$user=$pdo->query($sql)->fetch();
// print_r($user);
?>

<div class="container">

<form action="save_user.php" method="post" class="col-md-6 mt-5 ">
<div class="list-group ">
<input type="hidden" name="id" value="<?=$user['login_id'];?>">
<li class="list-group-item">帳號: <input type="text" name="acc" value="<?=$user['acc']?>"></li>  
<li class="list-group-item">密碼: <input type="password" name="pw" value="<?=$user['pw']?>"></li>  
<li class="list-group-item">信箱: <input type="text" name="email" value="<?=$user['email']?>"></li>  
<li class="list-group-item">姓名: <input type="text" name="name" value="<?=$user['name']?>"></li>  
<li class="list-group-item">生日: <input type="date" name="birthday" value="<?=$user['birthday']?>"></li>  
<li class="list-group-item">地址: <input type="text" name="addr" value="<?=$user['addr']?>"></li> 
<li class="list-group-item">學歷: 
    <select name="education" >
        <option <?=($user['education']=='國中')?'selected':"" ?>>國中</option>
        <option <?= ($user['education']=='高中')?"selected":"" ?>>高中</option>
        <option <?= ($user['education']=='大學')?"selected":"" ?>>大學</option>
        <option <?= ($user['education']=='碩士')?"selected":"" ?>>碩士</option>
        <option <?= ($user['education']=='博士')?"selected":""?>>博士</option>
    </select>
</li> 
<li class="list-group-item">身分: 
    <select name="role" >
        <option <?=($user['role']=='會員')?'selected':"" ?>>會員</option>
        <option <?= ($user['role']=='vip')?"selected":"" ?>>vip</option>
        <option <?= ($user['role']=='管理員')?"selected":"" ?>>管理員</option>
        
    </select>
</li> 


</div>
<input class="btn btn-primary m-3 d-inline-block " type="submit" value="提交">
<input class="btn btn-primary m-3 d-inline-block  " type="reset" value="重設">
</form>
</div>

<?php

include_once('footer.php');
?>