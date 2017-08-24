<?php

    // echo 'list.php';
    include_once '../Common/function.php';
    include_once '../Common/mysql.php';
    initDb();
    checkLogin();

    //组织sql语句
    // 左连接获得username
    $sql = "select n.*,u.username from news as n left join user as u on n.user_id = u.user_id";
    $result = findAll($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>新闻列表</title>
  <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
<div class="top">
  <h2>新闻列表</h2>
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
  <table>
  <tr>
    <td><label for="txtname">ID</label></td>
    <td><label for="txtname">标&nbsp;&nbsp;&nbsp;题</label></td>
    <td><label for="txtname">内&nbsp;&nbsp;&nbsp;容</label></td>
    <td><label for="txtname">用户名</label></td>
    <td><label for="txtname">发布时间</label></td>
    <td><label for="txtname">操作</label></td>
  </tr>

    <?php
        if(!empty($result)){
            foreach($result as $k => $v){
         
    ?>
  <tr>
    <td><label for="txtname"><?php echo $v['user_id'] ?></label></td>
    <td><label for="txtname"><?php echo $v['title'] ?></label></td>
    <td><label for="txtname"><?php echo $v['content'] ?></label></td>
    <td><label for="txtname"><?php echo $v['username'] ?></label></td>
    <td><label for="txtname"><?php echo date('Y年m月d日 H:i:s',$v['addtime']) ?></label></td>
                <!-- Y年m月d日 H:i:s -->
    <td><label for="txtname">&nbsp;<a href="detail.php?news_id=<?php echo $v['news_id'] ?>">查看</a> | <a href="editNews.php?news_id=<?php echo $v['news_id'] ?>">修改</a> | <a href="delNews.php?news_id=<?php echo $v['news_id'] ?>" onclick="if(!confirm('确定删除该新闻吗？')){return false;}">删除</a></label></td>
  </tr>
<?php
          }
    }else{
?>

  <tr>
    <td colspan="6"><label for="txtname">暂无新闻</label></td>
  </tr> 
  <?php } ?>
</table>
</div>
</body>
</html>