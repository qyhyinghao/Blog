<?php

    include_once '../Common/function.php';
    include_once '../Common/mysql.php';
    initDb();
    checkLogin();


    $news_id = empty($_GET['news_id'])?0:$_GET['news_id'];

    // 组织sql语句
    $sql = "select *from news where news_id = '{$news_id}'";
    $rs = findOne($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>新闻详情</title>
 <link rel="stylesheet" href="../Public/css/basic.css" />
 <link rel="stylesheet" href="../Public/css/Admin-detail.css" />
</head>
<body>
<div class="top"><h2>文章列表页面</h2></div>
<div class="nav">
  <ul>
   <li><a href="index.php">后台首页</a></li>
   <li><a href="addNews.php">发布文章</a></li>
   <li><a href="list.php">文章列表</a></li>
   <li><a href="addNav.php">导航添加</a></li>
   <li><a href="nav.php">导航列表</a></li>
   <li><a href="addPics.php">上传图片</a></li>
   <li><a href="picList.php">相册列表</a></li>
   <li><a href="logout.php">退出后台</a></li>
 </ul>
</div>
<div class="main">

<?php if(!(empty($rs))){

?>
  <h3><?php echo $rs['title'] ?></h3>
  <p><font size="2"><?php echo date('Y年m月d日 H:i:s',$rs['addtime']) ?></font></p>
  <hr width="100%" align="left" />
  <div class="con">
    <p><?php echo $rs['content'] ?></p>
  </div>
<?php
}
  ?>
</div>
</body>
</html>