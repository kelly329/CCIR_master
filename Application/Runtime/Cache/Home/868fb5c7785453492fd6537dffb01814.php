<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>校内比赛首页</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>xnsy.css">
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>date.css">
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>barstyle.css">
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

<div class="clean"></div>

<div class="content"><!--主体-->
    <div class="container">
        <!--轮播-->
        <div id="myCarousel" class="carousel slide">
            <!-- 轮播（Carousel）指标 -->
            <ul class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ul>
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?php echo (HOME_IMG_URL); ?>gimages/carousel3.png" >
                </div>
                <div class="item">
                    <img src="<?php echo (HOME_IMG_URL); ?>gimages/carousel2.png" >
                </div>
                <div class="item">
                    <img src="<?php echo (HOME_IMG_URL); ?>gimages/carousel1.png" >
                </div>
            </div>
            <!-- 轮播（Carousel）导航 -->
            <a class="carousel-control left" href="#myCarousel"
               data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#myCarousel"
               data-slide="next">&rsaquo;</a>
        </div>

        <!--日历-->

        <div id="Demo">
            <div id="CalendarMain">
                <div id="title">
                    <a class="selectBtn month" href="javascript:" onclick="CalendarHandler.CalculateLastMonthDays();">&lt;</a>
                    <a class="selectBtn selectYear" href="javascript:" onclick="CalendarHandler.CreateSelectYear(CalendarHandler.showYearStart);">2016年</a>
                    <a class="selectBtn selectMonth" onclick="CalendarHandler.CreateSelectMonth()">4月</a>
                    <a class="selectBtn nextMonth" href="javascript:" onclick="CalendarHandler.CalculateNextMonthDays();">&gt;</a>
                    <a class="selectBtn currentDay" href="javascript:" onclick="CalendarHandler.CreateCurrentCalendar(0,0,0);" style="display: none;">今天</a>
                </div>
                <div id="context" style="height: 235px;">
                    <div class="week">
                        <h3 style="width: 42.8571px;"> 一 </h3>
                        <h3 style="width: 42.8571px;"> 二 </h3>
                        <h3 style="width: 42.8571px;"> 三 </h3>
                        <h3 style="width: 42.8571px;"> 四 </h3>
                        <h3 style="width: 42.8571px;"> 五 </h3>
                        <h3 style="width: 42.8571px;"> 六 </h3>
                        <h3 style="width: 42.8571px;"> 日 </h3>
                    </div>
                    <div id="center" style="height: 205px;">
                        <div id="centerMain">
                            <div id="selectYearDiv" style="height: 205px; width: 300px;"></div>
                            <div id="centerCalendarMain" style="height: 205px; width: 300px;">
                                <div id="dateContainer" style="height: 410px; width: 300px; margin-left: 0px; margin-top: 0px; display: block;">
                                    <div class="dayItem" style="height: 205px; width: 300px; visibility: visible;">
                                        <div class="date-item lastItem" ><a>28</a></div>
                                        <div class="date-item lastItem" ><a>29</a></div>
                                        <div class="date-item lastItem" ><a>30</a></div>
                                        <div class="date-item lastItem" ><a>31</a></div>
                                        <div class="date-item" ><a>1</a></div>
                                        <div class="date-item" ><a>2</a></div>
                                        <div class="date-item" ><a>3</a></div>
                                        <div class="date-item" ><a>4</a></div>
                                        <div class="date-item" ><a>5</a></div>
                                        <div class="date-item" ><a>6</a></div>
                                        <div class="date-item" ><a>7</a></div>
                                        <div class="date-item" ><a>8</a></div>
                                        <div class="date-item" ><a>9</a></div>
                                        <div class="date-item" ><a>10</a></div>
                                        <div class="date-item" ><a>11</a></div>
                                        <div class="date-item" ><a>12</a></div>
                                        <div class="date-item" ><a>13</a></div>
                                        <div class="date-item urrentItem" ><a>14</a></div>
                                        <div class="date-item" ><a>15</a></div>
                                        <div class="date-item" ><a>16</a></div>
                                        <div class="date-item" ><a>17</a></div>
                                        <div class="date-item" ><a>18</a></div>
                                        <div class="date-item " ><a >19</a></div>
                                        <div class="date-item" ><a>20</a></div>
                                        <div class="date-item" ><a>21</a></div>
                                        <div class="date-item" ><a>22</a></div>
                                        <div class="date-item" ><a>23</a></div>
                                        <div class="date-item" ><a>24</a></div>
                                        <div class="date-item" ><a>25</a></div>
                                        <div class="date-item" ><a>26</a></div>
                                        <div class="date-item" ><a>27</a></div>
                                        <div class="date-item" ><a style="margin-left: 9px; margin-top: 4.5px;">28</a></div>
                                        <div class="date-item" ><a>29</a></div>
                                        <div class="date-item" ><a>30</a></div>
                                        <div class="date-item lastItem" ><a>1</a></div>
                                        <div class="date-item lastItem" ><a>2</a></div>
                                        <div class="date-item lastItem" ><a>3</a></div>
                                        <div class="date-item lastItem" ><a>4</a></div>
                                        <div class="date-item lastItem" ><a>5</a></div>
                                        <div class="date-item lastItem" ><a>6</a></div>
                                        <div class="date-item lastItem" ><a>7</a></div>
                                        <div class="date-item lastItem" ><a>8</a></div></div></div>
                            </div>
                            <div id="selectMonthDiv" style="height: 205px; width: 300px;"></div>
                        </div>
                    </div>
                    <div id="foots"><a id="footNow">本地时间 15:53:02</a></div>
                </div>
            </div></div>



        <!--信息-->
        <div class="item-row">
            <div class="item-card">
                <div class="item-img"><a href="xnxq.html"><img src="<?php echo (HOME_IMG_URL); ?>gimages/item1.png"></a></div>
                <div class="item-word">
                    <a href="xnxq.html">美柚手机app界面设计大赛</a>
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
                <div class="item-img"><a href="xnxq.html"><img src="<?php echo (HOME_IMG_URL); ?>gimages/item.png"></a></div>
                <div class="item-word">
                    <a href="xnxq.html">大学生广告大赛——AE动效</a>
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
                <div class="item-img"><a href="xnxq.html"><img src="<?php echo (HOME_IMG_URL); ?>gimages/item1.png"></a></div>
                <div class="item-word">
                    <a href="xnxq.html">联想新年贺卡设计大赛</a>
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
                <div class="item-img"><a href="xnxq.html"><img src="<?php echo (HOME_IMG_URL); ?>gimages/item.png"></a></div>
                <div class="item-word">
                    <a href="xnxq.html">美柚手机app界面设计大赛</a>
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
                <div class="item-img"><a href="xnxq.html"><img src="<?php echo (HOME_IMG_URL); ?>gimages/item1.png"></a></div>
                <div class="item-word">
                    <a href="xnxq.html">大学生广告大赛——AE动效</a>
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
                <div class="item-img"><a href="xnxq.html"><img src="<?php echo (HOME_IMG_URL); ?>gimages/item.png"></a></div>
                <div class="item-word">
                    <a href="xnxq.html">联想新年贺卡设计大赛</a>
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
        <div class="more"><a href="/CCIR_master/index.php/Home/Contest/inschoolist">MORE</a></div>
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
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--<script src="<?php echo (HOME_JS_URL); ?>bootstrap.min.js"></script>-->
<script src="<?php echo (HOME_JS_URL); ?>date.js"></script>
</body>
</html>