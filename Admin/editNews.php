<?php

    include_once '../Common/function.php';
    include_once '../Common/mysql.php';
    initDb();
    checkLogin();

    $news_id = empty($_GET['news_id'])?0:$_GET['news_id'];

    if(!empty($_POST)){

       $title = trim($_POST['title']);
       $content = trim($_POST['content']);
       if(empty($title)){
           back('文章标题不能为空');
       }
       if(empty($content)){
            back('文章内容不能为空');
       }

       @session_start();
       $user_id = $_SESSION['user_id'];
       $updatetime = time();

       //组织sql语句

       $sql = "update news set user_id = '{$user_id}',title='{$title}',content='{$content}',addtime = '{$updatetime}' where news_id = '{$news_id}'";
       
       $rs = mysql_query($sql);
       if($rs){
           jump('文章修改成功','Admin/list.php',2);
       }else{
           back('文章修改失败');
       }


        
    }else{
       
       
        
            // 组织sql语句
        $sql = "select *from news where news_id = '{$news_id}'";
        $rs = findOne($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>修改新闻</title>
  <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
  <div class="top">
  <h2>修改新闻</h2>
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

  <?php if(!empty($rs)){

    ?>
  
    <input type="hidden" name="news_id" value="<?php echo $rs['news_id'] ?>">
    <label for="txtname">标题：</label>
    <input type="text" name="title" value="<?php echo $rs['title'] ?>" /><br>
    <label for="txtpswd">内容：</label>
    <textarea name="content"><?php echo $rs['content'] ?></textarea><br>
<?php
        }
     }
?>
    <div class="btn">
      <input type="reset" />
      <input type="submit" value="修改" />
    </div>
  </form>
</div>
</body>
</html>