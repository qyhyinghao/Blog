<?php
    include_once '../Common/function.php';
    include_once '../Common/mysql.php';

    initDb();
    checkLogin();

    $id = isset($_GET['id'])?$_GET['id']:0;

    $sql = "select *from pics where id = '{$id}'";

    $rs = findOne($sql);

    if(!empty($rs)){

        $del = unlink('../Public/upload/'.$rs['pic_url']);
        
        $sql =" delete from pics where id = '{$id}'";
        $query = mysql_query($sql);

        if($query){
            jump('图片删除成功','Admin/picList.php',2);
        }else{
            back('图片删除失败');
        }
    }



?>