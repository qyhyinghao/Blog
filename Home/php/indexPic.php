<?php 

    include_once '../../Common/mysql.php';
    include_once '../../Common/function.php';
    header('Content-Type: text/html; charset=utf-8');
    initDb();
    $sql = "select *from pics order by id desc";   
    $pics = findAll($sql);

    echo json_encode($pics);
?>