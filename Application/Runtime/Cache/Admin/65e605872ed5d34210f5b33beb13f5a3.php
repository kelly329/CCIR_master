<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>比赛信息推荐网后台登录</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="<?php echo (ADMIN_LOGIN_URL); ?>/style.css" />
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="<?php echo (ADMIN_LOGIN_URL); ?>/jquery.js"></script>
<script src="<?php echo (ADMIN_LOGIN_URL); ?>/verificationNumbers.js"></script>
<script src="<?php echo (ADMIN_LOGIN_URL); ?>/Particleground.js"></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
  //验证码
  createCode();
  //测试提交，对接程序删除即可
  $(".submit_btn").click(function(){
	  location.href="index.html";
	  });
});
</script>
</head>
<body>
<form action="/ccir_master/index.php/Admin/User/checkLogin" method="post">
<dl class="admin_login">
 <dt>
  <strong>比赛信息推荐网管理系统</strong>
  <em>Management System</em>
 </dt>
 <dd class="user_icon">
  <input type="text" name="username" placeholder="账号" class="login_txtbx"/>
 </dd>
 <dd class="pwd_icon">
  <input type="password" name="password" placeholder="密码" class="login_txtbx"/>
 </dd>
 <dd class="val_icon">
  <div class="checkcode">
    <input name="verify" type="text" id="J_codetext" placeholder="验证码" maxlength="4" class="login_txtbx">
    <!--<img src="/ccir_master/index.php/Admin/User/code" height="44" width="120" onclick="this.src='/ccir_master/index.php/Admin/User/verify/'+Math.random();" style="cursor:pointer;" />-->
   <img src="/ccir_master/index.php/Admin/User/code" height="45" width="160" id="code" onclick="this.src='<?php echo (CONTROLLER); ?>/code/'+Math.random();"style="cursor:pointer;" />
  </div>

  <!-- <input type="button" value="验证码核验" class="ver_btn" onClick="validate();"> -->
 </dd>
 <dd>
  <input type="submit" value="立即登陆" class="submit_btn"/>
 </dd>
 <dd>
  <p>© 2015-2016 DeathGhost 版权所有</p>
  <p>陕B2-20080224-1</p>
 </dd>
</dl>
</form>
</body>
</html>