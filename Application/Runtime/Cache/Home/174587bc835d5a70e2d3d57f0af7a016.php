<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>校内首页</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <!--<link href="<?php echo (HOME_CSS_URL); ?>bootstrap.min.css" rel="stylesheet">-->
    <!--<link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>xnsy.css">-->
    <!--<link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>barstyle.css">-->
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>xwsy.css">
</head>
<body>
<div class="gotop"><a href="#top"><img src="<?php echo (HOME_IMG_URL); ?>gimages/top.png" ></a></div>
<!--导航-->
<div class="nav-box">
    <div class="container">
        <div class="logo"><img src="<?php echo (HOME_IMG_URL); ?>gimages/logo.png" width="100%" height="100%"></div>
        <div class="navbar">
            <ul class="navbar-nav">
                <li ><a href="<?php echo U('Index/index');?>">首页</a></li>
                <li ><a href="<?php echo U('Contest/incontest');?>">校内比赛</a></li>
                <li ><a href="<?php echo U('Contest/offcontest');?>">校外比赛</a></li>
                <li><a href="<?php echo U('Group/group');?>">组队社区</a></li>
                <li><a href="<?php echo U('Recommend/dorecommend');?>">推荐比赛</a></li>
            </ul>
        </div>
        <form class="form-search" method="get" action="/CCIR_master/index.php/Home/Contest/search">
            <div class="search">
                <input class="input-search" type="text" name="title"/>
                <button type="submit" class="search-btn">
                    <img src="<?php echo (HOME_IMG_URL); ?>search.png" width="32px" height="32px">
                </button>
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
</div><!--导航-->
<!--<div class="colorline"><h3>校内比赛</h3></div>-->

<div class="clean"></div>

<div class="content"><!--主体-->
    <div class="container">

        <!--信息-->

        <div class="down-con">
            <div class="left-con">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="l-item">
                    <img src="/CCIR_master/<?php echo ($vo["picurl"]); ?>" width="350px" height="200px">
                    <div class="l-text">
                        <h3><?php echo ($vo["title"]); ?></h3>
                        <div class="tw"><img src="<?php echo (HOME_IMG_URL); ?>gimages/xw1.png" width="20px" height="20px"><p>截至日期：<?php echo ($vo["starttime"]); ?></p></div>
                        <div class="tw"><img src="<?php echo (HOME_IMG_URL); ?>gimages/xw2.png" width="20px" height="20px"><p>大赛名称：<?php echo ($vo["endtime"]); ?></p></div>
                        <div class="tw"><img src="<?php echo (HOME_IMG_URL); ?>gimages/xw3.png" width="20px" height="20px"><p>类型：<?php echo ($vo["typename"]); ?></p></div>
                        <div class="l-btn">
                            <a href="/CCIR_master/index.php/Home/Contest/<?php if($vo['maintype'] == 1): ?>detailContest<?php elseif($vo['maintype'] == 2): ?>offcontestdetail<?php endif; ?>/id/<?php echo ($vo['contestid']); ?>">详细情况
                            </a></div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>


                <div class="more"><a href="xwlb.html">More</a></div>
            </div>
            <div class="right-con">
                <div class="r-item">
                    <h3>比赛类别</h3>
                    <div style="height:160px;">
                        <?php if(is_array($types)): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="r-tip" href="#"><?php echo ($vo["typename"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        <a class="r-tip-1" href="#">更多...</a>
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
        <!--信息-->
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>