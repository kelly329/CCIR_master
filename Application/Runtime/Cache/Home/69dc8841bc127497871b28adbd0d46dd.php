<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>校外比赛首页</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->

    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>xwsy.css">
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>date.css">
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>page.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <link href="<?php echo (HOME_CSS_URL); ?>bootstrap.min.css" rel="stylesheet">
    <![endif]-->

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
                <li ><a href="<?php echo U('Contest/incontest');?>">校内比赛</a></li>
                <li class="active"><a href="<?php echo U('Contest/offcontest');?>">校外比赛</a></li>
                <li><a href="<?php echo U('Group/group');?>">组队社区</a></li>
                <li><a href="<?php echo U('Recommend/dorecommend');?>">推荐比赛</a></li>
            </ul>
        </div>
        <form class="form-search" method="get" action="/CCIR_master/index.php/Home/Contest/search">
            <div class="search">
                <input class="input-search" type="text" name="title"/> <button type="submit" class="search-btn"><img src="<?php echo (HOME_IMG_URL); ?>search.png" width="32px" height="32px"></button>
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
                        <a data-toggle="dropdown" href="#">
                            <img src="/CCIR_master/<?php echo ($_SESSION['userInfo']['image']); ?>" width="50px" height="50px" style="border-radius: 50px;margin-left: 20px" >
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                        </ul>
                    </li>
                </ul>
            </div><?php endif; ?>
        <!--<a href="admin/login.html" class='adminlogin'>后台管理入口</a>-->
    </div>
</div>
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
                    <img src="<?php echo (HOME_IMG_URL); ?>gimages/carousel4.png" >
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
                                        <div class="date-item currentItem" ><a>5</a></div>
                                        <div class="date-item" ><a>6</a></div>
                                        <div class="date-item" ><a>7</a></div>
                                        <div class="date-item" ><a>8</a></div>
                                        <div class="date-item" ><a>9</a></div>
                                        <div class="date-item" ><a>10</a></div>
                                        <div class="date-item" ><a>11</a></div>
                                        <div class="date-item" ><a>12</a></div>
                                        <div class="date-item" ><a>13</a></div>
                                        <div class="date-item" ><a>14</a></div>
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
                                        <div class="date-item " ><a style="margin-left: 9px; margin-top: 4.5px;">28</a></div>
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
        <div class="clean"></div>
        <!--分类-->
        <div class="item-nav">
            <ul class="i-nav">
                <li><a href="#">创业商业</a></li>
                <li class="active"><a href="xwlb.html">艺术爱好</a></li>
                <li><a href="#">游戏动漫</a></li>
                <li><a href="#">科技创新</a></li>
                <li><a href="#">广告公益</a></li>
                <li><a href="#">学科竞赛</a></li>
                <li><a href="#">其他比赛</a></li>
            </ul>
        </div>

        <div class="clean" style="clear: both"></div>
        <!--信息-->
        <div class="down-con">
            <div class="left-con">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="l-item">
                    <img src="/CCIR_master/<?php echo ($vo["picurl"]); ?>" width="350px" height="200px">
                    <div class="l-text">
                        <h3><?php echo ($vo["title"]); ?></h3>
                        <div class="tw"><img src="<?php echo (HOME_IMG_URL); ?>gimages/xw1.png" width="20px" height="20px"><p>开始日期：<?php echo ($vo["starttime"]); ?></p></div>
                        <div class="tw"><img src="<?php echo (HOME_IMG_URL); ?>gimages/xw2.png" width="20px" height="20px"><p>截止日期：<?php echo ($vo["endtime"]); ?></p></div>
                        <div class="tw"><img src="<?php echo (HOME_IMG_URL); ?>gimages/xw3.png" width="20px" height="20px"><p>分类：<?php echo ($vo["typename"]); ?></p></div>
                        <div class="l-btn"><a href="/CCIR_master/index.php/Home/Contest/<?php if($vo['maintype'] == 1): ?>detailContest<?php elseif($vo['maintype'] == 2): ?>offcontestdetail<?php endif; ?>/id/<?php echo ($vo['contestid']); ?>">详细情况</a></div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="page-container">
                    <div class="page"><?php echo ($page); ?></div>
                    <div class="clear"></div>
                </div>
                <div class="more"><a href="xwlb.html">More</a></div>
            </div>

            <div class="right-con">
                <div class="r-item">
                    <h3>比赛类别</h3>
                    <div style="height:160px;">
                        <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="r-tip" href="#"><?php echo ($vo["typename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <a class="r-tip-1" href="/CCIR_master/index.php/Home/Contest/offschoolist">更多...</a>
                    </div>
                </div>
                <div class="r-item">
                    <h3>猜你喜欢</h3>
                    <ul>
                        <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/xw5.jpg" width="60px" height="60px"><h4>自然风光摄影大赛</h4><br/><p>类别：摄影 日期：2016.06.24</p></li>
                        <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/xw6.jpg" width="60px" height="60px"><h4>游戏界面设计大赛</h4><br/><p>类别：设计 日期：2016.05.24</p></li>
                        <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/xw7.jpg" width="60px" height="60px"><h4>校园歌手大赛</h4><br/><p>类别：艺术 日期：2016.09.04</p></li>
                        <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/xw5.jpg" width="60px" height="60px"><h4>自然风光摄影大赛</h4><br/><p>类别：设计 日期：2016.06.24</p></li>
                        <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/xw6.jpg" width="60px" height="60px"><h4>游戏界面设计大赛</h4><br/><p>类别：设计 日期：2016.06.24</p></li>
                        <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/xw7.jpg" width="60px" height="60px"><h4>校园歌手大赛</h4><br/><p>类别：艺术 日期：2016.09.04</p></li>
                        <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/xw5.jpg" width="60px" height="60px"><h4>自然风光摄影大赛</h4><br/><p>类别：设计 日期：2016.06.24</p></li>
                        <li><img src="<?php echo (HOME_IMG_URL); ?>gimages/xw6.jpg" width="60px" height="60px"><h4>游戏界面设计大赛</h4><br/><p>类别：设计 日期：2016.06.24</p></li>
                    </ul>
                </div>
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
<script src="<?php echo (HOME_JS_URL); ?>/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--<script src="<?php echo (HOME_JS_URL); ?>bootstrap.min.js"></script>-->
<script src="<?php echo (HOME_JS_URL); ?>date.js"></script>

</body>
</html>