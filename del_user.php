<?php
include_once("header.php");
$title="刪除使用者";
$dsn="mysql:host=localhost;dbname=login_pra;charset=utf8";
$pdo=new PDO($dsn,'root','');
$sql1="delete from `login` where `id`='{$_GET['id']}'";
$sql1="delete from `mem` where `login_id`='{$_GET['id']}'";
echo "<div>
是否刪除使用者id={$_GET['id']}的帳號資料?
<a href='?id={$_GET['id']}&asn=yes'>確定</a>
<a href='?id={$_GET['id']}&asn=no'>取消</a>

</div>";
if (isset($_GET['asn'])) {
    if($_GET['asn']=='yes'){
        $pdo->exec($sql1);
        $pdo->exec($sql2);
        header('location:admin.php');

    }else if ($_GET['asn']=='no') {
        header('location:admin.php');
    } 
}
include_once("footer.php");

?>