<?php
    include_once '../Common/function.php';
    include_once '../Common/mysql.php';
    initDb();
    checkLogin();

    $id = isset($_GET['id'])?$_GET['id']:0;

    if(!empty($_POST)){

        $id = $_POST['id'];
        $nav_name = trim($_POST['nav_name']);

        $nav_url = trim($_POST['nav_url']);
        $nav_order = trim($_POST['nav_order']);

        //合法性验证
        if(empty($nav_name)){
            back('导航名称不能为空');
        }
        if(empty($nav_url)){
            back('导航地址不能为空');
        }
        if(empty($nav_order)){
            back('导航排序不能为空');
        }
        //重新生成时间戳
        $update_time = time();

        //组织sql语句
        //由于主键一样,因此采用update语句更新数据库
        $sql = "update  nav set nav_name ='{$nav_name}', nav_url= '{$nav_url}',nav_order= '{$nav_order}',update_time = '{$update_time}' where id = '{$id}'";
        $rs = mysql_query($sql);

        if($rs){
            jump('导航修改成功','Admin/nav.php',2);
        }else{
            back('导航修改失败');
        }

    }else{

        $sql = "select *from nav where id = '{$id}'";
        $result = findOne($sql);
        
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>修改导航菜单</title>
  <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
  <div class="top">
  <h2>修改导航菜单</h2>
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
<?php
  if(!(empty($result))){

  
    ?>
 
    <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
    <label for="txtname">菜单名称：</label>
    <input type="text" name="nav_name" value="<?php echo $result['nav_name'] ?>" /><br>
    <label for="txtpswd">菜单地址：</label>
    <textarea name="nav_url"><?php echo $result['nav_url'] ?></textarea><br>
    <label for="txtpswd">菜单排序：</label>
    <input type="text" name="nav_order" value="<?php echo $result['nav_order'] ?>" />

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