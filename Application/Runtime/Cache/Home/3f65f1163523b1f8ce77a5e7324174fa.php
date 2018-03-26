<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>校内比赛首页</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>xnxq.css">
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>barstyle.css">


    <style type="text/css">
        .content{background-image: url(<?php echo (HOME_IMG_URL); ?>gimages/xwbg.png);background-repeat: no-repeat}
        .upitem{width: 33.3%;float: left;padding: 10px;padding-top: 35px;padding-left: 30px}
        .secondup{padding-left: 5px;}
        .upitem:nth-child(3){height: 100%;}
    </style>
</head>
<body>
<div class="gotop">
    <a href="#top"><img src="<?php echo (HOME_IMG_URL); ?>gimages/top.png" ></a>
    <div class="shareicon">
        <h4>分享</h4>
        <img src="<?php echo (HOME_IMG_URL); ?>gimages/wx.png" width="30px",height="30px">
        <img src="<?php echo (HOME_IMG_URL); ?>gimages/qq.png" width="30px",height="30px">
        <img src="<?php echo (HOME_IMG_URL); ?>gimages/kj.png" width="30px",height="30px">
        <img src="<?php echo (HOME_IMG_URL); ?>gimages/wb.png" width="30px",height="30px">
    </div>
</div>
<div class="nav-box" style="margin-left: 10px">
    <div class="container">
        <div class="logo"><img src="<?php echo (HOME_IMG_URL); ?>logo.png"></div>
        <div class="navbar">
            <ul class="navbar-nav">
                <li ><a href="<?php echo U('Index/index');?>">首页</a></li>
                <li ><a href="<?php echo U('Contest/incontest');?>">校内比赛</a></li>
                <li class="active"><a href="<?php echo U('Contest/offcontest');?>">校外比赛</a></li>
                <li><a href="<?php echo U('Group/group');?>">组队社区</a></li>
                <li><a href="<?php echo U('Recommend/dorecommend');?>">推荐比赛</a></li>
            </ul>
        </div>
<!--导航-->
    <!--<div class="nav-box" style="margin-left: 10px">-->
      <!--<div class="container">-->
        <!--<div class="logo"><img src="<?php echo (HOME_IMG_URL); ?>logo.png"></div>-->
        <!--<div class="navbar">-->
        <!--<ul class="navbar-nav">-->
        <!--<li class="active"><a href="<?php echo U('Index/index');?>">首页</a></li>-->
        <!--<li ><a href="<?php echo U('Contest/incontest');?>">校内比赛</a></li>-->
        <!--<li ><a href="<?php echo U('Contest/offcontest');?>">校外比赛</a></li>-->
        <!--<li><a href="sh.html">组队社区</a></li>-->
            <!--<li><a href="<?php echo U('Recommend/dorecommend');?>">推荐比赛</a></li>-->
        <!--</ul>-->
        <!--</div>-->
        <form class="form-search" method="get" action="/CCIR_master/index.php/Home/Contest/search">
             <div class="search">
                    <input class="input-search" type="text" name="title" /> <button type="submit" class="search-btn"><img src="<?php echo (HOME_IMG_URL); ?>search.png" width="32px" height="32px"></button>
              </div> 
        </form>

          <?php if($_SESSION['userInfo'] == '' ): ?><div class="login relogin">
           <div class="l1"><a href="<?php echo U('User/login');?>">登录</a></div>
           <div class="l2"><a href="<?php echo U('User/register');?>">注册</a></div>
          </div>
              <?php else: ?>
        <div style="margin: 10px;">
              <ul class="nav nav-pills">
                  <li class="dropdown all-camera-dropdown" style="color: #000000">
                      <a data-toggle="dropdown" href="">
                          <img src="/CCIR_master/<?php echo ($_SESSION['userInfo']['image']); ?>" width="50px" height="50px" style="border-radius: 50px;margin-left: 20px" >
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                          <li style="padding-top: 20px;padding-bottom: 10px;">
                              <a href="/CCIR_master/index.php/Home/User/personal/id/">
                                  <span class="glyphicon glyphicon-user" style="color: rgb(212, 106, 64);margin-right: 10px;"></span>
                                  我的主页
                              </a>
                          </li>
                          <li style="padding-top: 10px;padding-bottom: 10px;">
                              <a  href="https://www.baidu.com/">
                                  <span class="glyphicon glyphicon-bookmark" style="color: rgb(212, 106, 64);margin-right: 10px;"></span>
                                  关注的比赛
                              </a>
                          </li>
                           <li style="padding-top: 10px;padding-bottom: 10px;">
                              <a  href="#">
                                  <span class="glyphicon glyphicon-heart" style="color: rgb(212, 106, 64);margin-right: 10px;"></span>
                                  喜欢的比赛
                              </a>
                          </li>
                          <li style="padding-top: 10px;padding-bottom: 10px;">
                              <a href="#">
                                  <span class="glyphicon glyphicon-star" style="color: rgb(212, 106, 64);margin-right: 10px;"></span>
                                  点赞的比赛
                              </a>
                          </li>
                          <li style="padding-top: 10px;padding-bottom: 10px;">
                              <a href="#">
                                  <span class="glyphicon glyphicon-envelope" style="color: rgb(212, 106, 64);margin-right: 10px;"></span>
                                  发布的组队
                              </a>
                          </li>
                          <li style="padding-top: 10px;padding-bottom: 10px;">
                              <a href="#">
                                  <span class="glyphicon glyphicon-cog" style="color: rgb(212, 106, 64);margin-right: 10px;"></span>
                                  设置
                              </a>
                          </li>
                          <li style="padding-top: 10px;padding-bottom: 20px;">
                              <a href="<?php echo U('User/logout');?>">
                                  <span class="glyphicon glyphicon-log-out" style="color: rgb(212, 106, 64);margin-right: 10px;"></span>
                                  退出
                              </a>
                          </li>
                      </ul>
                </li>
            </ul>
        </div><?php endif; ?>
          <!--<a href="admin/login.html" class='adminlogin'>后台管理入口</a>-->
      </div>
    </div>

     <!--导航--> 


<div class="content" ><!--主体-->
    <div class="container">
        <div class="up">
            <div class="upitem">
                <img src="/CCIR_master/<?php echo ($contestinfo["picurl"]); ?>" width="308.4px" height="320px">
                <div class="icon">
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon1.png" width="18px" height="18px"><a href="#"><?php echo ($contestinfo["postnum"]); ?></a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon2.png" width="18px" height="18px"><a href="#"><?php echo ($contestinfo["thumbnumbers"]); ?></a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon3.png" width="18px" height="18px"><a href="#">10</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon4.png" width="18px" height="18px"><a href="#">6</a></div>
                </div>
            </div>
            <div class="upitem secondup">
                <h4><?php echo ($contestinfo["title"]); ?></h4>
                <p style="padding-right: 20px;"><?php echo ($contestinfo["shortdesc"]); ?></p>
                <br/>
                <div class="shm"><img src="<?php echo (HOME_IMG_URL); ?>gimages/mark.png" width="25px" height="25px">
                    <h4>比赛说明:</h4></div>
                <p>比赛类型：<?php echo ($contestinfo["typename"]); ?><br/>
                    开始时间：<?php echo ($contestinfo["starttime"]); ?><br/>
                    截止时间：<?php echo ($contestinfo["endtime"]); ?><br/>
                    信息来源：<?php echo ($contestinfo["sourcename"]); ?><br/><br/></p>

            </div>
            <div class="upitem">
                <div class="grade">
                    <div class="shm">
                        <img src="<?php echo (HOME_IMG_URL); ?>gimages/grade.png" width="30px" height="30px">
                        <h4>比赛奖项</h4></div>
                </div>
                <div class="grade"><div class="shm"><img src="<?php echo (HOME_IMG_URL); ?>gimages/reward.png" width="30px" height="30px">
                    <h4>比赛奖品</h4></div>
                </div>
                <div style="margin-left: 30px;"><?php echo htmlspecialchars_decode($contestinfo['awards']);?></div>
                <div class="bm-btn" style=""><a href="<?php echo ($contestinfo["sourcelink"]); ?>">报名</a></div>
            </div>
        </div>
        <div class="clean"></div>
        <img class="xqimg" src="<?php echo (HOME_IMG_URL); ?>gimages/xq.png">
        <div class="middle">
            <div class="midtext">
                <div class="text-item">
                    <?php echo htmlspecialchars_decode($contestinfo['content']);?>
                </div>
                <div></div>
            </div>

        </div>
        <div class="clean"></div>
        <div class="down">
            <div id="qq">
                <p>元芳，你怎么看？</p>
                <div class="message" contenteditable="true"></div>

                <div class="But">
                    <img src="<?php echo (HOME_IMG_URL); ?>gimages/3.gif" class="bq">
                    <span class="submit">发表</span>
                    <!--face begin-->
                    <div class="face">
                        <ul>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/1.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/2.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/3.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/4.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/5.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/6.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/7.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/8.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/9.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/10.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/11.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/12.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/13.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/14.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/15.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/16.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/17.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/18.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/19.gif" title="[织]"></li>
                            <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/20.gif" title="[织]"></li>

                        </ul>
                    </div>
                    <!--face end-->
                </div>
            </div>
            <!--qq end-->
            <div id="time1"></div>
            <!--msgCon begin-->
            <div class="msgCon">
            </div>
        </div>
    </div><!--container-->
</div><!--content-->
<footer>
    <div class="container">
        <div class="foot">
            <a href="#">合作推广</a>
            <a href="#">关于我们</a>
        </div>
    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>-->
<script src="<?php echo (HOME_JS_URL); ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo (HOME_JS_URL); ?>jquery-1.11.1.min.js"></script>
<script src="<?php echo (HOME_JS_URL); ?>bootstrap.min.js"></script>
<script src="<?php echo (HOME_JS_URL); ?>date.js"></script>
<script type="text/javascript">

    //点击小图片，显示表情
    $(".bq").click(function(e){
        $(".face").slideDown();//慢慢向下展开
        e.stopPropagation();   //阻止冒泡事件
    });

    //在桌面任意地方点击，他是关闭
    $(document).click(function(){
        $(".face").slideUp();//慢慢向上收
    });

    //点击小图标时，添加功能
    $(".face ul li").click(function(){
        var simg=$(this).find("img").clone();
        $(".message").append(simg);
    });

    //点击发表按扭，发表内容
    $("span.submit").click(function(){

        var txt=$(".message").html();
        if(txt==""){
            $('.message').focus();//自动获取焦点
            return;
        }

        $(".msgCon").prepend("<div class='msgBox'><dl><dt><img src='<?php echo (HOME_IMG_URL); ?>gimages/head.gif' width='50' height='50'/></dt><dd>神马都是浮云</dd></dl><div class='msgTxt'>"+txt+"</div></div>");
    });

</script>

</body>
</html>