<?php
$title="會員註冊";
include_once('header.php');
?>

<div class="container">

<form action="add_user.php" method="post" class="col-md-6 mt-5 ">
<div class="list-group ">
<li class="list-group-item">帳號: <input type="text" name="acc"></li>  
<li class="list-group-item">密碼: <input type="password" name="pw"></li>  
<li class="list-group-item">信箱: <input type="text" name="email"></li>  
<li class="list-group-item">姓名: <input type="text" name="name"></li>  
<li class="list-group-item">生日: <input type="date" name="birthday"></li>  
<li class="list-group-item">地址: <input type="text" name="addr"></li> 
<li class="list-group-item">學歷: 
    <select name="education" >
        <option>國中</option>
        <option>高中</option>
        <option>大學</option>
        <option>碩士</option>
        <option>博士</option>
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