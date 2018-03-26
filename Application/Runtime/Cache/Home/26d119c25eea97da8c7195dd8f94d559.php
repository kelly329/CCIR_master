<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>

    <title>组队社区</title>

    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
    <meta http-equiv="description" content="This is my page">
    <!--
    <link rel="stylesheet" type="text/css" href="styles.css">
    -->
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>Inschooldet.css">
    <script type="text/javascript" src="<?php echo (HOME_JS_URL); ?>jquery-3.1.1.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS_URL); ?>bootstrap.js"></script>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://at.alicdn.com/t/font_234130_nem7eskcrkpdgqfr.css">



    <style type="text/css">
        .article-type-cpt {
            width: 191px;
            margin-bottom: 1px;
            margin-right: 1px;
            height: 84px;
            float: left;
            overflow: hidden;
            position: relative;
        }
    </style>
</head>

<body>
<div class="nav-box" style="margin-left: 10px">
    <div class="container">
        <div class="logo"><img src="<?php echo (HOME_IMG_URL); ?>logo.png"></div>
        <div class="navbar">
            <ul class="navbar-nav">
                <li ><a href="<?php echo U('Index/index');?>">首页</a></li>
                <li ><a href="<?php echo U('Contest/incontest');?>">校内比赛</a></li>
                <li ><a href="<?php echo U('Contest/offcontest');?>">校外比赛</a></li>
                <li class="active"><a href="<?php echo U('Group/group');?>">组队社区</a></li>
                <li ><a href="<?php echo U('Recommend/dorecommend');?>">推荐比赛</a></li>
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

<div class="container">
    <div class="row">

    </div>
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <form role="form">
                <div class="row">
                    <div class="form-group">
                        <textarea rows="5" cols="10" class="form-control" placeholder="填写组队内容吧，最好说明比赛名称，方便大家尽快找到你"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div style="margin-top: 5px;float: left;">
                        <label for="name">发布天数</label>
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div style="margin-top: 33px;margin-left: 33px;float: left;">
                        <input type="file" accept="image/jpg,image/png,image/gif" id="imgFile"/>
                    </div>
                    <div class="btn-group" style="margin-top: 33px;float: left;">
                        <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown">
                            标签<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">第一个</a></li>
                            <li><a href="#">第二个</a></li>
                            <li><a href="#">第三个</a></li>
                            <li><a href="#">第四个</a></li>
                            <li><a href="#">第五个</a></li>
                        </ul>
                    </div>
                    <div style="margin-top: 43px;float: left;margin-left: 190px">
                        <font size="3">0/140字</font>
                    </div>
                    <div style="margin-top: 29px;float: left;margin-left: 10px">
                        <button type="button" class="btn btn-primary"
                                data-toggle="button"> 发布组队
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- 热门标签 -->
    <div class="row">
        <div style="margin-top: 20px;margin-left: 60px;float: left;"><img alt="" src="<?php echo (HOME_IMG_URL); ?>fang.png" style="width: 20px; height: 20px;"><font style="font-weight:bold;margin-left: 10px">热门标签</font></div>
    </div>
    <div class="row">
        <a href="#">
            <img alt="" style="width: 210px;height:90px; margin-left: 57px;margin-top: 20px" src="<?php echo (HOME_IMG_URL); ?>qiaoqiao.jpg">
            <font style="color:#FFFFFF;margin-left: -140px">创新创业类</font>
        </a>
        <a href="#">
            <img alt="" style="width: 210px;height:90px; margin-left: 73px;margin-top: 20px" src="<?php echo (HOME_IMG_URL); ?>qiaoqiao.jpg">
        </a>
        <a href="#">
            <img alt="" style="width: 210px;height:90px; margin-left: 7px;margin-top: 20px" src="<?php echo (HOME_IMG_URL); ?>qiaoqiao.jpg">
        </a>
        <a href="#">
            <img alt="" style="width: 210px;height:90px; margin-left: 7px;margin-top: 20px" src="<?php echo (HOME_IMG_URL); ?>qiaoqiao.jpg">
        </a>
        <a href="#">
            <img alt="" style="width: 210px;height:90px; margin-left: 7px;margin-top: 20px" src="<?php echo (HOME_IMG_URL); ?>qiaoqiao.jpg">
        </a>
    </div>
    <div class="row">
        <a href="#">
            <img alt="" style="width: 210px;height:90px; margin-left: 57px;margin-top: 3px" src="<?php echo (HOME_IMG_URL); ?>qiaoqiao.jpg">
        </a>
        <a href="#">
            <img alt="" style="width: 210px;height:90px; margin-left: 7px;margin-top: 3px" src="<?php echo (HOME_IMG_URL); ?>qiaoqiao.jpg">
        </a>
        <a href="#">
            <img alt="" style="width: 210px;height:90px; margin-left: 7px;margin-top: 3px" src="<?php echo (HOME_IMG_URL); ?>qiaoqiao.jpg">
        </a>
        <a href="#">
            <img alt="" style="width: 210px;height:90px; margin-left: 7px;margin-top: 3px" src="<?php echo (HOME_IMG_URL); ?>qiaoqiao.jpg">
        </a>
        <a href="#">
            <img alt="" style="width: 210px;height:90px; margin-left: 7px;margin-top: 3px" src="<?php echo (HOME_IMG_URL); ?>qiaoqiao.jpg">
        </a>
    </div>
    <!-- 全部 -->
    <div class="row">
        <div style="margin-top: 30px;margin-left: 60px;float: left;"><img alt="" src="<?php echo (HOME_IMG_URL); ?>fang.png" style="width: 20px; height: 20px;"><font style="font-weight:bold;margin-left: 10px">全部</font></div>
    </div>
    <div class="row" style="margin-left: 57px;">
        <div class="col-md-7" style="padding-top: 10px;">
            <ol class="breadcrumb" style="">
                <li><a href="#">全部</a></li>
                <li><a href="#">最新</a></li>
                <li class="active">最热</li>
            </ol>
        </div>
        <div class="col-md-3" style="padding-top: 0px;">
            <form class="navbar-form navbar-left" role="search" >
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
        </div>
        <div class="col-md-2">
            <a href="#" class="btn btn-primary" role="button" style="margin-top: 7px">搜索</a>
        </div>
    </div>
    <!-- 下半部分 -->
    <div class="row">
        <div class="panel panel-success" style="margin-left: 60px">
            <div class="panel-body">
                <div class="row">
                    <h3 class="panel-title" style="margin-left: 20px;margin-bottom: 20px"><strong>最新组队</strong><sup><img src="img/subsecond.png" style="width: 20px;height: 20px;"/></sup></h3>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <img alt="" src="<?php echo (HOME_IMG_URL); ?>personimg.jpeg" style="width: 80px;height: 80px">
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <font style="color: red;">LOGO大师</font>
                            <img alt="" src="<?php echo (HOME_IMG_URL); ?>clock.png" style="margin-left: 20px;width: 11px;height: 11px">
                            <font style="color: #D0D0D0;font-size: 5px" >2017.11.27</font>
                            <font style="color: #D0D0D0;font-size: 5px;margin-left: 8px" >11:11:11</font>
                        </div>
                        <div class="row">
                            <font>校内微电影比赛，作品准备阶段，前期拍摄、后期影视剪辑 我们已经有了相关专业的同学了  拍摄设备基本齐全。现在还缺演员2名，男女校内微电影比赛，作品准备阶段，前期拍摄、后期影视剪辑 我们已经有了相关专业的同学了  拍摄设备基本齐全。现在还缺演员2名，男女校内微电影比赛，作品准备阶段，前期拍摄、后期影视剪辑 我们已经有了相关专业的同学了  拍摄设备基本齐全。现在还缺演员2名，男女</font>
                        </div>
                        <div class="row">
                            <img alt="" src="<?php echo (HOME_IMG_URL); ?>contentimg.jpg" style="width: 350px;height: 150px">
                        </div>
                        <div class="row">
                            <div style="margin-top: 20px;float: left;"><a onclick="showhidediv('hideDiv')"><img alt="" src="<?php echo (HOME_IMG_URL); ?>comment_2x.png" style="width: 20px; height: 20px;"/><font size="1">33</font></a></div>
                            <div style="margin-top: 20px;margin-left: 60px;float: left;"><a href="#"><img alt="" src="<?php echo (HOME_IMG_URL); ?>like_2x.png" style="width: 20px; height: 20px;"><font size="1">30</font></a></div>
                            <div style="margin-top: 20px;margin-left: 60px;float: left;"><a href="#"><img alt="" src="<?php echo (HOME_IMG_URL); ?>star83.png" style="width: 20px; height: 20px;"/><font size="1">2</font></a></div>
                            <div style="margin-top: 20px;margin-left: 60px;float: left;"><a href="#"><img alt="" src="<?php echo (HOME_IMG_URL); ?>share_2x.png" style="width: 20px; height: 20px;"><font size="1">6</font></a></div>
                            <p class="text-right" style="margin-top: 20px"><a href="#"><b>更多...</b></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 评论隐藏 -->
    <div id="hideDiv" n="hideDiv" style="display:none;">
        <div class="row" style="margin-left: 50px;">
            <form role="form">
                <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <div style="float: left;"><a href="#"><img alt="" src="<?php echo (HOME_IMG_URL); ?>face.png" style="width: 20px; height: 20px;"/></a></div>
                <div style="margin-left: 60px;float: left;"><a href="#"><img alt="" src="<?php echo (HOME_IMG_URL); ?>panel.png" style="width: 20px; height: 20px;"></a></div>
                <button type="button" class="btn btn-primary"
                        data-toggle="button" style="margin-left: 1050px;margin-top: -20px"> 评论</button>
            </form>
        </div>
        <!-- 显示评论 -->
        <div class="row">
            <HR style="FILTER: progid:DXImageTransform.Microsoft.Shadow(color:#987cb9,direction:145,strength:15)" width="90%" color=#987cb9 SIZE=2>
            <ul class="nav nav-pills" style="margin-left: 57px">
                <li class="active"><a href="#">全部</a></li>
                <li><a href="#">关注的人</a></li>
                <li><a href="#">陌生人</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-2" style="float: left;margin-left: 57px;margin-top: 25px"><a href="#"><img alt="" src="<?php echo (HOME_IMG_URL); ?>header.png" style="width: 30px; height: 30px;"/><font style="color: red;margin-left: 7px">LOGO大师</font></a></div>
            <div class="col-md-9" style="margin-top: 25px"><font>校内微电影比赛，作品准备阶段，前期拍摄、后期影视剪辑 我们已经有了相关专业的同学了  拍摄设备基本齐全。现在还缺演员2名，男女校内微电影比赛，作品准备阶段，前期拍摄、后期影视剪辑 我们已经有了相关专业的同学了  拍摄设备基本齐全。现在还缺演员2名，男女校内微电影比赛，作品准备阶段，前期拍摄、后期影视剪辑 我们已经有了相关专业的同学了  拍摄设备基本齐全。现在还缺演员2名，男女</font></div>
        </div>
        <div class="row" style="margin-left: 1020px;margin-top: 10px">
            <a href="#"><font>回复</font></a>
            <a href="#"><img alt="" src="<?php echo (HOME_IMG_URL); ?>zan1.png" style="width: 20px; height: 20px;margin-bottom: 4px;margin-left: 15px"/></a>
        </div>
    </div>
</div>
<script>
    $(function (){
        $("[data-toggle='popover']").popover();
    });

</script>
<script language="javascript">
    //创建一个showhidediv的方法，直接跟ID属性
    function showhidediv(id){
        var sbtitle=document.getElementById(id);
        if(sbtitle){
            if(sbtitle.style.display=='block'){
                sbtitle.style.display='none';
            }else{
                sbtitle.style.display='block';
            }
        }
    }
</script>
</body>
</html>