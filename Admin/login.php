<?php 
    // echo 'login.php';
    include_once '../Common/function.php';
    include_once '../Common/mysql.php';

    initDb();

    if(!empty($_POST)){

        //合法性验证

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if(empty($username)){
            back('请输入用户名');
        }
        if(empty($password)){
            back('请输入密码');
        }

        //逻辑型验证
        $sql = "select *from user where username = '{$username}'";

        $rs = findOne($sql);

        if(empty($rs)){
            back('用户名不存在');
        }else{

            $password = md5($password);
            if($password ===$rs['password'] ){

                //保存session数据
                session_start();
                $_SESSION['username'] = $rs['username'];
                $_SESSION['user_id'] = $rs['user_id'];

                jump('登录成功','Admin/index.php',2);
            }else{
                back('密码不正确');
            }
            
        }

    }

?>
<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>后台登录页</title>
   <link rel="stylesheet" href="../Public/css/basic.css" />
 </head>
 <body>
    <div class="top"><h2>后台登录</h2></div>
    <div class="main">
      <form class="form" action="" method="post">
        <label for="txtname">账号：</label>
        <input type="text"  name="username" value="" /><br>
        <label for="txtpswd">密码：</label>
        <input type="password"  name="password" /><br>
        <div class="btn">
          <input type="reset" />
          <input type="submit" value="登录" />
          <a href="regist.php">没有账号？点击注册</a>
        </div>
      </form>
    </div>
 </body>
 </html>