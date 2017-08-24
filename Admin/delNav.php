<?php

    include_once '../Common/function.php';
    include_once '../Common/mysql.php';

    initDb();
    checkLogin();

    $id = isset($_GET['id'])?$_GET['id']:0;

    $sql = "delete from nav where id = '{$id}'";
    $rs = mysql_query($sql);

    if($rs){
        jump('导航删除成功','Admin/nav.php',2);
    }else{
        back('导航删除失败');
    }


?>