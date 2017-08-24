<?php

    include_once '../Common/function.php';
    include_once '../Common/mysql.php';
    initDb();
    checkLogin();

    if(!empty($_POST)){

        $title = trim($_POST['title']);
        $content = trim($_POST['content']);

        if(empty($title)){
            back('请输入文章标题');
        }
        if(empty($content)){
            back('请输入文章内容');
        }
        @session_start();
        $user_id = $_SESSION['user_id'];

        //生成时间戳
        $addtime = time();
        //组织sql语句
        $sql = "insert into news values(null,'{$user_id}','{$title}','{$content}','{$addtime}')";

        $rs = mysql_query($sql);

        if($rs){
            jump('文字发布成功','Admin/list.php',2);
        }else{
            back('文章发布失败,请重新发布');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>发布新闻</title>
  <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
  <div class="top">
  <h2>发布新闻</h2>
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
<div class="main">
  <form class="form" action="" method="post">
    <label for="txtname">标题：</label>
    <input type="text"  name="title" /><br>
    <label for="txtpswd">内容：</label>
    <textarea name="content"></textarea><br>
    <div class="btn">
      <input type="reset" />
      <input type="submit" value="发布" />
    </div>
  </form>
</div>
</body>
</html>