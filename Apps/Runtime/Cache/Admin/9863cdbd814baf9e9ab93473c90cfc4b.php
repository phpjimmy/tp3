<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>
    <head>
	<title>登录</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
      
	<form action="<?php echo U('Admin/Login/login');?>">
            <input type='text' name='loginid' placeholder='请输入帐号' value='<?php echo ($last_login_id); ?>' /><br>
	    <input type='password' name='password' placeholder='请输入密码' /><br>
	    <input type='text' name='verify' placeholder='请输入验证码' /><br>
	    <img src="<?php echo U('Login/verify');?>" /><br>
	    <input type='submit' value='登录'/>
	</form>
	
    </body>
</html>