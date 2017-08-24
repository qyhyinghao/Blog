<?php

    include_once '../Common/function.php';
    include_once '../Common/mysql.php';
    initDb();
    checkLogin();

    $news_id = empty($_GET['news_id'])?0:$_GET['news_id'];

    $sql = "delete from news where news_id = '{$news_id}'";

    $rs = mysql_query($sql);

    if($rs){
        jump('文章删除成功','Admin/list.php',2);
    }else{
        back('文章删除失败');
    }

?>