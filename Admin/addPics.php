<?php
    include_once '../Common/function.php';
    include_once '../Common/mysql.php';
    initDb();
    checkLogin();

    if(!empty($_FILES)){
        
        if(!empty($_FILES['pic'])&&$_FILES['pic']['error'] === 0){

            $ext = strrchr($_FILES['pic']['name'],'.');

            $picNew = time().mt_rand(1000,9999).$ext;

            
            $uploadDir = '../Public/upload/';
            //move_uploaded_file:将上传的文件移动到新位置
            //第一个参数是$_FIFES临时文件夹里面的名字
            //第二个参数是图片移动的目的地
            $rs = move_uploaded_file($_FILES['pic']['tmp_name'],$uploadDir.$picNew);

            if($rs){

                $addtime = time();
                $sql = "insert into pics values(null,'{$picNew}','{$addtime}')";

                $query = mysql_query($sql);

                if($query){
                    jump('图片上传成功','Admin/picList.php',2);
                }else{
                    back('图片上传失败'); 
                }
            }else{
                back('图片上传失败');
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>图片上传</title>
 <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
<div class="top">
 <h2>图片上传页</h2>
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
  <form class="form" action="" method="post" enctype="multipart/form-data">
    <label for="txtname">选择图片：</label>
    <input type="file" multiple name="pic"><br>
    <div class="btn"><input type="submit"></div>
  </form>
</div>
</body>
</html>