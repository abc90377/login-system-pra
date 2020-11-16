<?php
$title="忘記密碼";
include_once('header.php');?>
<form action="?" method="POST">
輸入您的電子郵件:<input type="text" name="email">
<input type="submit" value="查詢">

</form>

<?php
if (isset($_POST['email'])) {
    $dsn="mysql:host=localhost;dbname=login_pra;charset=utf8";
    $pdo=new PDO($dsn,'root','');
    $sql="SELECT `pw` FROM `login` WHERE `email`='{$_POST['email']}'";
    $user=$pdo->query($sql)->fetch();
    if (!empty($user['pw'])) {
        $res=$user['pw'];
    }else {
        $res="查無此人";
    }
echo $res;
}
include_once('header.php');
?>