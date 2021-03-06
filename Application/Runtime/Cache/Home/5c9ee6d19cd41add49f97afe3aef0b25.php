<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<title>北师比信息推荐网登录/注册</title>

<link href="<?php echo (HOME_CSS_URL); ?>style_log.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo (HOME_CSS_URL); ?>style.css">
<link rel="stylesheet" type="text/css" href="<?php echo (HOME_CSS_URL); ?>userpanel.css">
<link rel="stylesheet" type="text/css" href="<?php echo (HOME_CSS_URL); ?>jquery.ui.all.css">
</head>


<!--用百度的静态资源库的cdn安装bootstrap环境-->
<!-- Bootstrap 核心 CSS 文件 -->
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<!--font-awesome 核心我CSS 文件-->
<link href="http://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<!-- 在bootstrap.min.js 之前引入 -->
<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
<!-- Bootstrap 核心 JavaScript 文件 -->
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!--jquery.validate-->
<script type="text/javascript" src="<?php echo (HOME_JS_URL); ?>jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo (HOME_JS_URL); ?>message.js" ></script>
<style type="text/css">
    body {
        background: url(<?php echo (HOME_IMG_URL); ?>logbg.png) no-repeat;
        background-size: cover;
        font-size: 16px;
    }

    .form {
        background: rgba(255, 255, 255, 0.2);
        width: 450px;
        margin: 200px auto;
    }

    #login_form {
        display: block;
    }

    #register_form {
        display: none;
    }

    .fa {
        display: inline-block;
        top: 27px;
        left: 6px;
        position: relative;
        color: #ccc;
    }

    input[type="text"], input[type="password"] {
        padding-left: 26px;
    }

    .checkbox {
        padding-left: 21px;
    }

    .btn-danger {
        background-color: #a40000;
    }

    .alink {
        color: #a40000
    }
</style>
</head>
<body>

<div class="container">
    <div class="form row">
        <form class="form-horizontal col-sm-offset-2 col-md-offset-2" id="login_form" action="/CCIR_master/index.php/Home/User/checkLogin" method="post">
            <div class="col-sm-10 col-md-10">
                <div class="form-horizontal col-sm-offset-2 col-md-offset-2">
                    <img src="<?php echo (HOME_IMG_URL); ?>logo.png" style="width: 120px;margin-top: 30px;"></div>
                <div class="form-group">
                    <i class="fa fa-user fa-lg"></i>
                    <input class="form-control required" type="text" placeholder="请输入用户名" name="username"
                           autofocus="autofocus" maxlength="20"/>
                </div>
                <div class="form-group">
                    <i class="fa fa-lock fa-lg"></i>
                    <input class="form-control required" type="password" placeholder="请输入密码" name="password"
                           maxlength="20"/>
                </div>
                <div class="form-group" style="color:#a40000">

                    <input class="btn btn-lg btn-danger btn-block" type="submit" value="登录"/>
                </div>

                <div class="form-group">
                    <label class="checkbox">
                        <input type="checkbox" name="记住密码" value="1"/> 记住密码
                    </label>
                    <hr/>
                    还没有账户吗？点击<a href="javascript:;" id="register_btn" class="alink">注册</a>成为用户
                </div>
            </div>
        </form>

        <form class="form-horizontal col-sm-offset-3 col-md-offset-3" id="register_form" action="/CCIR_master/index.php/Home/User/register" method="post">
            <h3 class="form-title"> 注 册 你 的 账 户</h3>
            <div class="col-sm-9 col-md-9">
                <div class="form-group">
                    <i class="fa fa-user fa-lg"></i>
                    <input class="form-control required" type="text" placeholder="用户名" name="username"
                           autofocus="autofocus"/>
                </div>
                <div class="form-group">
                    <i class="fa fa-lock fa-lg"></i>
                    <input class="form-control required" type="password" placeholder="密码" id="register_password"
                           name="password"/>
                </div>
                <div class="form-group">
                    <i class="fa fa-check fa-lg"></i>
                    <input class="form-control required" type="password" placeholder="再次输入密码" name="rpassword"/>
                </div>
                <div class="form-group">
                    <i class="fa fa-envelope fa-lg"></i>
                    <input class="form-control eamil" type="text" placeholder="邮箱" name="email"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-danger pull-right" value="提 交"/>
                    <input type="button" class="btn btn pull-left" id="back_btn" value="返回"/>
                </div>
            </div>
        </form>
    </div>



</div>
<script type="text/javascript" src="<?php echo (HOME_JS_URL); ?>main.js"></script>
<script type="text/javascript">
    $(function () {
        $("#register_btn").click(function () {
            $("#register_form").css("display", "block");
            $("#login_form").css("display", "none");
        });
        $("#back_btn").click(function () {
            $("#register_form").css("display", "none");
            $("#login_form").css("display", "block");
        });
    });
</script>
</body>
</html>