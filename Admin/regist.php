<?php 
    include_once '../Common/mysql.php';
    include_once '../Common/function.php';

    initDb();

    if(!empty($_POST)){

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $password1 =trim( $_POST['password1']);
        $email = trim($_POST['email']);
        $mobile = trim($_POST['mobile']);

        //合法性验证
        if(empty($username)){
            back('用户名不能为空');
        }

        //逻辑型验证
        //查询数据库,看用户名是否已存在
        $sql = "select username from user where username = '{$username}'";
        $rs = findOne($sql);
        if(!empty($rs )){
            back('用户名已存在,请更换用户名');
        }

        if(empty($password)){
            back('密码不能为空');
        }
        if(empty($password1)){
            back('请再次输入密码');
        }
        if($password != $password1){
            back('两次输入密码不一致,请重新输入');
        }
        if(empty($email)){
            back('请输入您的邮箱');
        }
        if(empty($mobile)){
            back('请输入您的手机号码');
        }

       //生成时间戳
       $addtime = time();
       //md5加密
       $password = md5($password);

       //组织sql语句
       $sql = "insert into user values (null,'{$username}','{$password}','{$email}','{$mobile}','{$addtime}')";
       //执行mysql语句
       $rs = mysql_query($sql);


       if($rs){
           jump('注册成功','Admin/login.php',2);
       }else{
           back('注册失败,请重新');
       }

    }
?>

<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>后台注册页</title>
   <link rel="stylesheet" href="../Public/css/basic.css" />
 </head>
 <body>
  <div class="top"><h2>注册页面</h2></div>
  <div class="main">
    <form class="form" action="" method="post">
      <label for="txtname">用&ensp;户&ensp;名：</label>
      <input type="text" name="username" /><br>
      <label for="txtpswd">密&#12288;&#12288;码：</label>
      <input type="password" name="password" /><br>
      <label for="txtpswd">确认密码：</label>
      <input type="password" name="password1" /><br>  
      <label for="txtpswd">邮&#12288;&#12288;箱：</label>
      <input type="text" name="email" /><br>
      <label for="txtpswd">手&ensp;机&ensp;号：</label>
      <input type="text" name="mobile" /><br>
      <div class="btn">
        <input type="reset" />
        <input type="submit" value="注册" />
        <a href="login.php">已有账号？点击登录</a>
      </div>
    </form>
  </div>
</body>
</html>