<?php 

  // echo "php";
  include_once '../Common/function.php';
  include_once '../Common/mysql.php';
  initDb();
  checkLogin();
  
  $sql =" select count(*) as userNum from user";
  $rs = findOne($sql);
  $userNum = $rs['userNum'];

  $sql =" select count(*) as newsNum from news";
  $rs = findOne($sql);
  $newsNum = $rs['newsNum'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>后台首页</title>
  <link rel="stylesheet" href="../Public/css/basic.css" />
  <link rel="stylesheet" href="../Public/css/Admin-index.css">
</head>
<body>
<div class="top">
  <h2>后台首页</h2>
  <span>欢迎<b><?php getusername() ?></b>登录后台</span>
</div>
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
<div class="banner"><img src="../Public/img/index_banner.jpg" height="900" width="1440" alt=""></div>
<div class="info"><p>本站共有文章<b><?php echo $newsNum; ?></b>篇，注册会员<b><?php echo $userNum; ?></b>人</p></div>
</body>
</html>