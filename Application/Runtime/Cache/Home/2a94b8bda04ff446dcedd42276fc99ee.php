<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>校园比赛信息推荐网首页</title>
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
    <meta http-equiv="description" content="This is my page">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://at.alicdn.com/t/font_234130_nem7eskcrkpdgqfr.css">
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>Inschooldet.css">
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>date.css">

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        ul {
            list-style: none;
        }

        /*	#schedule-box{
                width: 320px;
                margin: 0 auto;
                padding: 35px 20px;
                font-size: 13px;
            }*/
        .schedule-hd {
            display: flex;
            justify-content: space-between;
            padding: 0 15px;
        }

        .today {
            flex: 1;
            text-align: center;
        }

        .ul-box {
            overflow: hidden;
        }

        .ul-box > li {
            float: left;
            width: 14.28%;
            text-align: center;
            padding: 5px 0;
        }

        .other-month {
            color: #999999;
        }

        .current-month {
            color: #333333;
        }

        .today-style {
            border-radius: 50%;
            background: #58d321;
        }

        .arrow {
            cursor: pointer;
        }

        .dayStyle {
            display: inline-block;
            width: 35px;
            height: 25px;
            border-radius: 50%;
            text-align: center;
            line-height: 25px;
            cursor: pointer;
        }

        .current-month > .dayStyle:hover {
            background: #00BDFF;
            color: #ffffff;
        }

        .today-flag {
            background: #CE0000;
            color: #fff;
        }

        .boxshaw {
            box-shadow: 2px 2px 15px 2px #e3e3e3;
        }

        .selected-style {
            background: #00BDFF;
            color: #ffffff;
        }

        #h3Ele {
            text-align: center;
            padding: 10px;
        }

        .panel-success {
            border-color: white;
            -webkit-box-shadow: 0.7px 0.7px 0.7px 0.7px #333333;
            -moz-box-shadow: 0.7px 0.7px 0.7px 0.7px #333333;
        }
        .line-limit-length {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap; //文本不换行，这样超出一行的部分被截取，显示...
        }
        a{
            text-decoration:none;
            color:#fff;
        }

    </style>
</head>

<body>
<div class="nav-box" style="margin-left: 10px">
    <div class="container">
        <div class="logo"><img src="<?php echo (HOME_IMG_URL); ?>logo.png"></div>
        <div class="navbar">
            <ul class="navbar-nav">
                <li class="active"><a href="<?php echo U('Index/index');?>">首页</a></li>
                <li ><a href="<?php echo U('Contest/incontest');?>">校内比赛</a></li>
                <li ><a href="<?php echo U('Contest/offcontest');?>">校外比赛</a></li>
                <li><a href="sh.html">组队社区</a></li>
                <li><a href="<?php echo U('Recommend/dorecommend');?>">推荐比赛</a></li>
            </ul>
        </div>
<!--导航-->
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
    <!--轮播图-->
    <div class="row" style="margin-right:0px;margin-left:0px; margin-bottom:20px">
        <div id="myCarousel" class="carousel slide" style="width: 100%;height: 350px;">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators" style="bottom:-30px">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- 轮播(carousel)项目 -->
            <div class="carousel-inner">
                <div class="item active">
                    <img alt="First slide" src="<?php echo (HOME_IMG_URL); ?>carousel_1.jpg" style="width: 100%;height: 380px;">
                </div>
                <div class="item">
                    <img alt="Second slide" src="<?php echo (HOME_IMG_URL); ?>carousel_2.jpg" style="width: 100%;height: 380px;">
                </div>
                <div class="item">
                    <img alt="Third slide" src="<?php echo (HOME_IMG_URL); ?>carousel_3.jpg" style="width: 100%;height: 380px;">
                </div>
            </div>
        </div>
    </div>
    <!--轮播图结束-->

    <div class="row" style="margin-top: 50px; margin-left:0px;">
        <div class="col-md-8" style="margin-right: 50px">
            <div class="row">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <div class="row">
                            <h3 class="panel-title" style="margin-left: 20px;margin-bottom: 20px">
                                <strong>最新比赛</strong>
                                <sup>
                                <img src="<?php echo (HOME_IMG_URL); ?>new_v1@2x.png" style="width: 30px;height: 15px;"/>
                                </sup>
                            </h3>
                        </div>
                        <!--最新比赛信息展示-->
                        <?php if(is_array($contestInfo)): $i = 0; $__LIST__ = $contestInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row">
                                <div class="col-md-6">
                                    <div class="row">

                                        <img alt="" src="<?php echo (HOME_IMG_URL); ?>hot.png" style="margin-left: 50px"/>
                                        <b style="margin-left: 3px;font-size: 16px;"><?php echo ($vo["title"]); ?></b>
                                    </div>
                                    <div class="row">
                                        <p style="margin-top: 10px;margin-left: 70px">类别：<?php echo ($vo["typename"]); ?> 日期：<?php echo ($vo["endtime"]); ?></p>
                                    </div>
                                    <div class="row">
                                        <p style="margin-top: 5px;margin-left: 70px">竞赛简介</p>
                                        <p style="margin-left: 70px" class="line-limit-length"><?php echo ($vo["shortdesc"]); ?></p>
                                    </div>
                                    <div class="row">
                                        <img alt="" src="<?php echo (HOME_IMG_URL); ?>comment_2x.png"
                                             style="margin-top: 5px;margin-left: 70px;width: 20px; height: 20px;"/><?php echo ($vo["postnum"]); ?>
                                        <img alt="" src="<?php echo (HOME_IMG_URL); ?>like_2x.png"
                                             style="margin-top: 5px;margin-left: 70px;width: 20px; height: 20px;"><?php echo ($vo["thumbnumbers"]); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a href="/CCIR_master/index.php/Home/Contest/<?php if($vo['maintype'] == 1): ?>detailContest<?php else: ?>offcontestdetail<?php endif; ?>/id/<?php echo ($vo['contestid']); ?>">
                                        <img alt="" src="/CCIR_master/<?php echo ($vo["picurl"]); ?>" style="margin-top: 17px;width: 350px; height: 160px;">
                                    </a>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>

                        <div class="row">
                            <p class="text-right" style="margin-top: 17px;margin-right: 20px"><b>更多...</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <div class="row">
                            <h3 class="panel-title" style="margin-left: 20px;margin-bottom: 20px">
                                <strong>最新组队</strong><sup><img src="<?php echo (HOME_IMG_URL); ?>subsecond.png"
                                                               style="width: 20px;height: 20px;"/></sup></h3>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <img alt="" src="<?php echo (HOME_IMG_URL); ?>persion1.jpeg" style="width: 80px;height: 80px">
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <font style="color: red;">LOGO大师</font>
                                    <img alt="" src="<?php echo (HOME_IMG_URL); ?>clock.png" style="margin-left: 20px;width: 11px;height: 11px">
                                    <font style="color: #D0D0D0;font-size: 5px">2017.11.27</font>
                                    <font style="color: #D0D0D0;font-size: 5px;margin-left: 8px">11:11:11</font>
                                </div>
                                <div class="row">
                                    <font>校内微电影比赛，作品准备阶段，前期拍摄、后期影视剪辑 我们已经有了相关专业的同学了
                                        拍摄设备基本齐全。现在还缺演员2名，男女校内微电影比赛，作品准备阶段，前期拍摄、后期影视剪辑 我们已经有了相关专业的同学了
                                        拍摄设备基本齐全。现在还缺演员2名，男女校内微电影比赛，作品准备阶段，前期拍摄、后期影视剪辑 我们已经有了相关专业的同学了
                                        拍摄设备基本齐全。现在还缺演员2名，男女</font>
                                </div>
                                <div class="row">
                                    <img alt="" src="<?php echo (HOME_IMG_URL); ?>contentimg.jpg" style="width: 350px;height: 150px">
                                </div>
                                <div class="row">
                                    <div style="margin-top: 20px;float: left;">
                                        <img alt="" src="<?php echo (HOME_IMG_URL); ?>comment_2x.png" style="width: 20px; height: 20px;"/>
                                        <font size="1">33</font></div>
                                    <div style="margin-top: 20px;margin-left: 60px;float: left;"><img alt="" src="<?php echo (HOME_IMG_URL); ?>like_2x.png" style="width: 20px; height: 20px;">
                                        <font size="1">30</font></div>
                                    <div style="margin-top: 20px;margin-left: 60px;float: left;"><img alt="" src="<?php echo (HOME_IMG_URL); ?>star83.png" style="width: 20px; height: 20px;"/>
                                        <font size="1">2</font></div>
                                    <div style="margin-top: 20px;margin-left: 60px;float: left;"><img alt="" src="<?php echo (HOME_IMG_URL); ?>share_2x.png" style="width: 20px; height: 20px;"><font
                                            size="1">6</font></div>
                                    <p class="text-right" style="margin-top: 20px"><b>更多...</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div id='schedule-box' class="boxshaw">
                </div>
            </div>
            <div class="row">
                <div class="panel panel-success" style="margin-top: 20px;width: 322px">
                    <div class="panel-body">
                        <div class="row" style="margin-left: 2px">
                            <font size="4">比赛类别</font>
                        </div>
                        <div class="row" style="margin-top: 11px; float: left">
                            <ul class="tag-list" style="padding: 0;">
                                <li class="label label-danger" style="margin-left: 15px;"><a <?php if(empty($_GET['typeId'])){echo 'class="tag-selected"';}; ?>
                                    href="<?php echo valueChange('typeId',0)?>">全部</a>
                                </li>

                            </ul>
                        </div>
                        <?php if(is_array($type)): foreach($type as $key=>$vo): ?><div class="row" style="margin-top: 11px; margin-left:5px;float: left">

                            <ul class="tag-list" style="padding: 0; ">
                                <!--<li class="label label-danger" style="margin-left: 15px;"><span <?php if(empty($_GET['typeId'])){echo 'class="tag-selected"';}; ?>-->
                                    <!--href="<?php echo valueChange('typeId',0)?>">全部</span>-->
                                <!--</li>-->

                                    <li class="label label-default" style="margin-left: 20px;">
                                        <a <?php if($vo['typeid']==$_GET['typeId']){echo 'class="tag-selected"';} ?>
                                        href="<?php echo valueChange('typeId',$vo['typeid'])?>"><?php echo ($vo["typename"]); ?></a>
                                    </li>

                            </ul>
                        </div><?php endforeach; endif; ?>

                        <!--<div class="row" style="margin-top: 11px; float: left">-->
                            <!--<a href=""><b style="margin-left: 29px;margin-top: 6px">更多...</b></a>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-success" style="margin-top: 20px;width: 322px">
                    <div class="panel-body">
                        <div class="row" style="margin-left: 2px">
                            <font size="4">猜你喜欢</font>
                        </div>
                        <div class="row" style="background-color: #9D9D9D;margin-top: 15px;height: 75px">
                            <div class="col-md-2">
                                <img alt="" src="<?php echo (HOME_IMG_URL); ?>palmolive.png"
                                     style="width: 65px;height: 65px;margin-left: 0px;margin-top: 5px">
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <p style="margin-top: 10px;margin-left: 50px;font-size: 16px">Palmolive包装品牌设计</p>
                                </div>
                                <div class="row">
                                    <font style="margin-top: 10px;margin-left: 50px;" size="1">类别：设计</font>
                                    <font style="margin-top: 10px;margin-left: 3px;" size="1">日期：2016.03.29</font>

                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px;height: 75px">
                            <div class="col-md-2">
                                <img alt="" src="<?php echo (HOME_IMG_URL); ?>game.png"
                                     style="width: 65px;height: 65px;margin-left: 0px;margin-top: 5px">
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <p style="margin-top: 10px;margin-left: 50px;font-size: 16px">game设计</p>
                                </div>
                                <div class="row">
                                    <font style="margin-top: 10px;margin-left: 50px;" size="1">类别：设计</font>
                                    <font style="margin-top: 10px;margin-left: 3px;" size="1">日期：2016.03.29</font>

                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px;height: 75px;background-color: #BEBEBE">
                            <div class="col-md-2">
                                <img alt="" src="<?php echo (HOME_IMG_URL); ?>natural.png"
                                     style="width: 65px;height: 65px;margin-left: 0px;margin-top: 5px">
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <p style="margin-top: 10px;margin-left: 50px;font-size: 16px">natural设计</p>
                                </div>
                                <div class="row">
                                    <font style="margin-top: 10px;margin-left: 50px;" size="1">类别：设计</font>
                                    <font style="margin-top: 10px;margin-left: 3px;" size="1">日期：2016.03.29</font>

                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px;height: 75px;">
                            <div class="col-md-2">
                                <img alt="" src="<?php echo (HOME_IMG_URL); ?>city.png"
                                     style="width: 65px;height: 65px;margin-left: 0px;margin-top: 5px">
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <p style="margin-top: 10px;margin-left: 50px;font-size: 16px">city设计</p>
                                </div>
                                <div class="row">
                                    <font style="margin-top: 10px;margin-left: 50px;" size="1">类别：设计</font>
                                    <font style="margin-top: 10px;margin-left: 3px;" size="1">日期：2016.03.29</font>

                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px;height: 75px;background-color: #D0D0D0">
                            <div class="col-md-2">
                                <img alt="" src="<?php echo (HOME_IMG_URL); ?>sing.png"
                                     style="width: 65px;height: 65px;margin-left: 0px;margin-top: 5px">
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <p style="margin-top: 10px;margin-left: 50px;font-size: 16px">校园歌手大赛</p>
                                </div>
                                <div class="row">
                                    <font style="margin-top: 10px;margin-left: 50px;" size="1">类别：设计</font>
                                    <font style="margin-top: 10px;margin-left: 3px;" size="1">日期：2016.03.29</font>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****************************** -->
    <div class="row">
        <div class="panel panel-success">
            <div class="panel-body">
                <div class="row">
                    <h3 class="panel-title" style="margin-left: 20px;margin-bottom: 20px"><strong>最热比赛</strong><sup><img
                            src="<?php echo (HOME_IMG_URL); ?>book.png" style="width: 15px;height: 15px;"/></sup></h3>
                </div>

                <div class="row">
                    <?php if(is_array($hotinfo)): $i = 0; $__LIST__ = $hotinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/CCIR_master/index.php/Home/Contest/<?php if($vo['maintype'] == 1): ?>detailContest<?php elseif($vo['maintype'] == 2): ?>offcontestdetail<?php endif; ?>/id/<?php echo ($vo['contestid']); ?>">
                    <div class="col-md-5">
                        <img alt="" src="/CCIR_master/<?php echo ($vo["picurl"]); ?>" style="margin-left: 50px;padding-left:20px;width: 500px;height: 150px">
                    </div>
                        </a><?php endforeach; endif; else: echo "" ;endif; ?>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-1" style="margin-top: 130px;">
                        <b>更多...</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="background-color: #7d0022;height: 100px">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="margin-top: 35px;margin-left: 90px">
            <a href="#"><font color="white">合作推广</font></a>
            <a href="#" style="margin-left: 40px"><font color="white">关于我们</font></a>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
</body>
<script src="<?php echo (HOME_JS_URL); ?>schedule.js"></script>
<script>
    var mySchedule = new Schedule({
        el: '#schedule-box',
        //date: '2018-9-20',
        clickCb: function (y, m, d) {
            document.querySelector('#h3Ele').innerHTML = '日期：' + y + '-' + m + '-' + d
        },
        nextMonthCb: function (y, m, d) {
            document.querySelector('#h3Ele').innerHTML = '日期：' + y + '-' + m + '-' + d
        },
        nextYeayCb: function (y, m, d) {
            document.querySelector('#h3Ele').innerHTML = '日期：' + y + '-' + m + '-' + d
        },
        prevMonthCb: function (y, m, d) {
            document.querySelector('#h3Ele').innerHTML = '日期：' + y + '-' + m + '-' + d
        },
        prevYearCb: function (y, m, d) {
            document.querySelector('#h3Ele').innerHTML = '日期：' + y + '-' + m + '-' + d
        }
    });
</script>

</html>
<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>