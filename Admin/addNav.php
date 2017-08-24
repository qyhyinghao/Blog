<?php 

    // echo 'addNav';
    include_once '../Common/function.php';
    include_once '../Common/mysql.php';
    initDb();
    checkLogin();
    if(!empty($_POST)){
        $nav_name = trim($_POST['nav_name']);
        $nav_url = trim($_POST['nav_url']);
        $nav_order = $_POST['nav_order'];
        //合法性验证
        if(empty($nav_name)){
            back('请输入导航名称');
        }
        if(empty($nav_url)){
            back('请输入导航地址');
        }
        if(empty($nav_order)){
            back('请输入导航排序');
        }
        //组织sql语句
        $update_time = time();

        $sql = "insert into nav values(null,'{$nav_name}','{$nav_url}','{$nav_order}','{$update_time}')";
        
        $rs = mysql_query($sql);

        if($rs){
            jump('导航添加成功','Admin/nav.php',2);
        }else{
            back('导航添加失败');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>添加官网导航菜单</title>
 <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
<div class="top">
  <h2>添加官网导航菜单</h2>
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
    <label for="txtname">导航名称：</label>
    <input type="text"  name="nav_name"  /><br>
    <label for="txtpswd">导航地址：</label>
    <input type="text"  name="nav_url"  /><br>
    <label for="txtpswd">导航排序：</label>
    <input type="text"  name="nav_order" value="" placeholder="正数排序" /><br>
    <div class="btn">
      <input type="reset" />
      <input type="submit" value="添加" />
    </div>
  </form>
</div>
</body>
</html>