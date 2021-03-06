<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>校内比赛列表</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>xnsy.css">
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>barstyle.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="<?php echo (HOME_JS_URL); ?>js/bootstrap.min.js"></script>-->


    <style>
        .colorline{background-image: url(<?php echo (HOME_IMG_URL); ?>gimages/colorline.png);}
    </style>
</head>
<body>
<div class="gotop"><a href="#top"><img src="<?php echo (HOME_IMG_URL); ?>gimages/top.png" ></a></div>
<!--导航-->
<div class="nav-box" style="margin-left: 10px">
    <div class="container">
        <div class="logo"><img src="<?php echo (HOME_IMG_URL); ?>logo.png"></div>
        <div class="navbar">
            <ul class="navbar-nav">
                <li ><a href="<?php echo U('Index/index');?>">首页</a></li>
                <li class="active"><a href="<?php echo U('Contest/incontest');?>">校内比赛</a></li>
                <li ><a href="<?php echo U('Contest/offcontest');?>">校外比赛</a></li>
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

<!--导航-->
<div class="colorline"><h3>校内比赛</h3></div>

<div class="clean"></div>

<div class="content"><!--主体-->
    <div class="container">

        <!--信息-->
        <div class="item-row">
            <div class="item-card">
                <div class="item-img"><a href="xnxq.html"><img src="<?php echo (HOME_IMG_URL); ?>gimages/item1.png"></a></div>
                <div class="item-word">
                    <h3>美柚手机app界面设计大赛</h3>
                    <div class="red-line"></div>
                    <p>用你的神来之笔粉刷她们的菜单栏，带上你对女性的美好想象装扮他们的手机界面。只要你的设计贴合没有品牌形象，击中她们的爱美小心脏，你就是女儿国的颜值担当！</p>
                </div>
                <div class="item-icon">
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon1.png" width="18px" height="18px"><a href="#">12</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon2.png" width="18px" height="18px"><a href="#">32</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon3.png" width="18px" height="18px"><a href="#">10</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon4.png" width="18px" height="18px"><a href="#">6</a></div>
                </div>
            </div>
            <div class="item-card">
                <div class="item-img"><img src="<?php echo (HOME_IMG_URL); ?>gimages/item.png"></div>
                <div class="item-word">
                    <h3>大学生广告大赛——AE动效</h3>
                    <div class="red-line"></div>
                    <p>使用Adobe AfterEffects、Photoshop创造有趣的动画、特效吧！</p>
                </div>
                <div class="item-icon">
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon1.png" width="18px" height="18px"><a href="#">12</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon2.png" width="18px" height="18px"><a href="#">32</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon3.png" width="18px" height="18px"><a href="#">10</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon4.png" width="18px" height="18px"><a href="#">6</a></div>
                </div>
            </div>
            <div class="item-card-right">
                <div class="item-img"><img src="<?php echo (HOME_IMG_URL); ?>gimages/item1.png"></div>
                <div class="item-word">
                    <h3>联想新年贺卡设计大赛</h3>
                    <div class="red-line"></div>
                    <p>每天键盘里的交流与问候少了些许温度，或者一直贺卡能让我们在喧嚣的闹市中得到一丝温暖，贺出创意，寄送温暖，我们期待你的作品</p>
                </div>
                <div class="item-icon">
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon1.png" width="18px" height="18px"><a href="#">12</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon2.png" width="18px" height="18px"><a href="#">32</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon3.png" width="18px" height="18px"><a href="#">10</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon4.png" width="18px" height="18px"><a href="#">6</a></div>
                </div>
            </div>
            <div class="item-card">
                <div class="item-img"><img src="<?php echo (HOME_IMG_URL); ?>gimages/item.png"></div>
                <div class="item-word">
                    <h3>美柚手机app界面设计大赛</h3>
                    <div class="red-line"></div>
                    <p>用你的神来之笔粉刷她们的菜单栏，带上你对女性的美好想象装扮他们的手机界面。只要你的设计贴合没有品牌形象，击中她们的爱美小心脏，你就是女儿国的颜值担当！</p>
                </div>
                <div class="item-icon">
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon1.png" width="18px" height="18px"><a href="#">12</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon2.png" width="18px" height="18px"><a href="#">32</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon3.png" width="18px" height="18px"><a href="#">10</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon4.png" width="18px" height="18px"><a href="#">6</a></div>
                </div>
            </div>
            <div class="item-card">
                <div class="item-img"><img src="<?php echo (HOME_IMG_URL); ?>gimages/item1.png"></div>
                <div class="item-word">
                    <h3>大学生广告大赛——AE动效</h3>
                    <div class="red-line"></div>
                    <p>使用Adobe AfterEffects、Photoshop创造有趣的动画、特效吧！</p>
                </div>
                <div class="item-icon">
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon1.png" width="18px" height="18px"><a href="#">12</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon2.png" width="18px" height="18px"><a href="#">32</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon3.png" width="18px" height="18px"><a href="#">10</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon4.png" width="18px" height="18px"><a href="#">6</a></div>
                </div>
            </div>
            <div class="item-card-right">
                <div class="item-img"><img src="<?php echo (HOME_IMG_URL); ?>gimages/item.png"></div>
                <div class="item-word">
                    <h3>联想新年贺卡设计大赛</h3>
                    <div class="red-line"></div>
                    <p>每天键盘里的交流与问候少了些许温度，或者一直贺卡能让我们在喧嚣的闹市中得到一丝温暖，贺出创意，寄送温暖，我们期待你的作品</p>
                </div>
                <div class="item-icon">
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon1.png" width="18px" height="18px"><a href="#">12</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon2.png" width="18px" height="18px"><a href="#">32</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon3.png" width="18px" height="18px"><a href="#">10</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon4.png" width="18px" height="18px"><a href="#">6</a></div>
                </div>
            </div>
            <div class="item-card">
                <div class="item-img"><img src="<?php echo (HOME_IMG_URL); ?>gimages/item1.png"></div>
                <div class="item-word">
                    <h3>美柚手机app界面设计大赛</h3>
                    <div class="red-line"></div>
                    <p>用你的神来之笔粉刷她们的菜单栏，带上你对女性的美好想象装扮他们的手机界面。只要你的设计贴合没有品牌形象，击中她们的爱美小心脏，你就是女儿国的颜值担当！</p>
                </div>
                <div class="item-icon">
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon1.png" width="18px" height="18px"><a href="#">12</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon2.png" width="18px" height="18px"><a href="#">32</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon3.png" width="18px" height="18px"><a href="#">10</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon4.png" width="18px" height="18px"><a href="#">6</a></div>
                </div>
            </div>
            <div class="item-card">
                <div class="item-img"><img src="<?php echo (HOME_IMG_URL); ?>gimages/item.png"></div>
                <div class="item-word">
                    <h3>大学生广告大赛——AE动效</h3>
                    <div class="red-line"></div>
                    <p>使用Adobe AfterEffects、Photoshop创造有趣的动画、特效吧！</p>
                </div>
                <div class="item-icon">
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon1.png" width="18px" height="18px"><a href="#">12</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon2.png" width="18px" height="18px"><a href="#">32</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon3.png" width="18px" height="18px"><a href="#">10</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon4.png" width="18px" height="18px"><a href="#">6</a></div>
                </div>
            </div>
            <div class="item-card-right">
                <div class="item-img"><img src="<?php echo (HOME_IMG_URL); ?>gimages/item1.png"></div>
                <div class="item-word">
                    <h3>联想新年贺卡设计大赛</h3>
                    <div class="red-line"></div>
                    <p>每天键盘里的交流与问候少了些许温度，或者一直贺卡能让我们在喧嚣的闹市中得到一丝温暖，贺出创意，寄送温暖，我们期待你的作品</p>
                </div>
                <div class="item-icon">
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon1.png" width="18px" height="18px"><a href="#">12</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon2.png" width="18px" height="18px"><a href="#">32</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon3.png" width="18px" height="18px"><a href="#">10</a></div>
                    <div class="red-icon"><img src="<?php echo (HOME_IMG_URL); ?>gimages/icon4.png" width="18px" height="18px"><a href="#">6</a></div>
                </div>
            </div>
        </div><!--信息-->
        <div class="clean"></div>
        <!--翻页-->
        <div class="pagination">
            <ul>
                <li class="disabled"><a href="#">Prev</a></li>
                <li class="pactive"><a href="xnlb.html">1</a></li>
                <li><a href="xnlb2.html">2</a></li>
                <li><a href="xnlb.html">3</a></li>
                <li><a href="xnlb2.html">4</a></li>
                <li><a href="xnlb.html">5</a></li>
                <li><a href="xnlb2.html">Next</a></li>
            </ul>
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


</body>
</html>