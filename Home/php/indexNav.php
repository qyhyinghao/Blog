<?php 

    include_once '../../Common/mysql.php';
    include_once '../../Common/function.php';
    header('Content-Type: text/html; charset=utf-8');
    initDb();
    $sql = "select *from nav order by nav_order asc,id desc";   
    $navs = findAll($sql);
    echo json_encode($navs);
?>