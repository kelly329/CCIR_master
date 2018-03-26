<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>推荐比赛</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>xnxq.css"/>
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>date.css"/>
    <link rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>barstyle.css"/>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <style type="text/css">
        /*.content{background-image: url('gimages/xwbg.png');background-repeat: no-repeat}*/
        body{
            background-color: #e6e6e6;
        }
        .backgroundwhite{
            background-color: white;
        }
        .formcolor{
            background-color: #e6e6e6;
        }
        #btn1{
            background-color: #7d0022;
        }
    </style>
</head>
<body>
<div class="gotop">
    <a href="#top">
        <img src="gimages/top.png" />
    </a>

    <div class="shareicon">
        <h4>分享</h4>
        <img src="gimages/wx.png" width="30px" height="30px" />
        <img src="gimages/qq.png" width="30px" height="30px" />
        <img src="gimages/kj.png" width="30px" height="30px" />
        <img src="gimages/wb.png" width="30px" height="30px" />
    </div>
</div>
<div class="nav-box" style="margin-left: 10px">
    <div class="container">
        <div class="logo"><img src="<?php echo (HOME_IMG_URL); ?>logo.png"></div>
        <div class="navbar">
            <ul class="navbar-nav">
                <li ><a href="<?php echo U('Index/index');?>">首页</a></li>
                <li ><a href="<?php echo U('Contest/incontest');?>">校内比赛</a></li>
                <li ><a href="<?php echo U('Contest/offcontest');?>">校外比赛</a></li>
                <li><a href="<?php echo U('Group/group');?>">组队社区</a></li>
                <li class="active"><a href="<?php echo U('Recommend/dorecommend');?>">推荐比赛</a></li>
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

<!--导航 end-->

<div class="clean"></div>

<div class="content">
    <!--主体-->
    <div class="container">
        <form id="form" action="/CCIR_master/index.php/Home/Recommend/doRecommend" method="post"
              enctype="multipart/form-data">

            <!-- <div class=" backgroundwhite well well-sm"><p class="text-muted" style="font-size: 20px">上传比赛</p></div> -->

            <div class="backgroundwhite well well-lg" style="margin-top: 30px;">
                <p class="text-muted" style="font-size: 20px">推荐比赛</p>
            </div>

            <!-- 中间比赛信息 -->
            <div class="backgroundwhite panel panel-default middle">
                <div class="backgroundwhite panel-heading " style="padding-left: 30px; padding-top: 15px;">
                    <p class="text-muted" style="font-size: 17px">比赛信息</p>
                </div>
                <div class="panel-body">
                    <!-- 第一个输入框输入比赛名称 -->
                    <div style="margin-bottom: 20px;margin-top: 20px;">
                        <div class="row">
                            <div class="col-md-1">
                                <p style="color: red;padding-left: 70px; padding-top: 10px;">*</p>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name = "title" class="form-control formcolor input-lg" placeholder="请输入比赛名称" required="true" />
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-md-2">
                                <span class="glyphicon glyphicon-exclamation-sign" style="color: red; margin-right: 10px; margin-top: 10px;"></span>
                                <font color="red">必填项</font>
                            </div>
                        </div>
                    </div>
                    <!-- 第一个输入框结束 -->
                    <!-- 比赛类别选择 -->
                    <div style="margin-bottom: 20px; margin-top: 40px;">
                        <div class="row">
                            <div class="col-md-1">
                                <p style="color: red;padding-left: 70px; padding-top: 10px;">*</p>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control input-lg" name="maintype" placeholder="选择比赛范围">
                                        <!-- <option id="disabledSelect">选择比赛范围</option>  -->
                                        <option value="1">校内</option>
                                        <option value="2">校外</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control input-lg"  name="typeId" placeholder="选择比赛范围">
                                        <option id="disabledSelect">比赛类别</option>
                                        <?php if(is_array($type)): foreach($type as $co=>$vo): ?><option value="<?php echo ($co+1); ?>"
                                            ><?php echo str_repeat('-', 8*($vo['level']-1)).$vo['typename']; ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <span class="glyphicon glyphicon-exclamation-sign" style="color: red; margin-right: 10px; margin-top: 10px;"></span>
                                <font color="red">必填项</font>
                            </div>
                        </div>
                    </div>
                    <!-- 类别选择结束 -->

                    <!-- 上传图片 -->
                    <ul class="list-group " style="width: 80%;margin-left: 95px; margin-bottom: 20px; margin-top: 30px;">
                        <li class="list-group-item ">
                            <p class="text-muted" style="font-size: 17px; margin-left: 15px;">上传图片</p>
                        </li>
                        <li class="list-group-item">
                            <!-- 上传图片 图片显示框 -->

                            <div class="form-group">
                                <div class="uploadimage"></div>
                                <div class="col-xs-7">

                                    <input id="logo" type="file" name="picurl"   class="file-loading" />
                                    <!--<input type="text" name="htestlogo" id="htestlogo" onchange="addFile(this)" />-->
                                </div>
                            </div>
                            <!-- 上传图片显示框 end -->

                        </li>
                    </ul>
                    <!-- 上传图片 end -->
                    <ul class="list-group " style="width: 80%;margin-left: 95px; margin-bottom: 20px; margin-top: 30px;">
                        <li class="list-group-item ">
                            <p class="text-muted" style="font-size: 17px; margin-left: 15px;">上传相关文件</p>
                        </li>
                        <li class="list-group-item">
                            <!-- 上传图片 图片显示框 -->

                            <div class="form-group">
                                <div class="uploadimage"></div>
                                <div class="col-xs-7">

                                    <input id="testlogo" type="file" name="texturl"   class="file-loading" />
                                    <!--<input type="text" name="htestlogo" id="htestlogo" onchange="addFile(this)" />-->
                                </div>
                            </div>
                            <!-- 上传图片显示框 end -->

                        </li>
                    </ul>

                    <!-- 内容框 -->
                    <ul class="list-group" style="width: 80%;margin-left: 95px; margin-bottom: 20px; margin-top: 50px;">
                        <li class="list-group-item">
                            <p class="text-muted" style="font-size: 15px; margin-left: 15px;">注：如果您是某个组织，想要使用此推荐比赛，请留下比赛详细内容。

                                如果您不方便，请留下比赛信息来源链接，以及简要说明。
                            </p>
                        </li>
                        <li class="list-group-item">
                            <div class="" style="overflow:auto;">
                                <textarea  name="content" class="form-control" rows="5"></textarea>
                            </div>
                        </li>
                    </ul>
                    <!-- 内容框 end -->
                </div>
            </div>
            <!-- 中间比赛信息 end -->

            <!-- 发布 -->

            <div class="backgroundwhite well well-lg" style="margin-top: 25px;">
                <button id="btn1" type="submit" class="btn btn-default btn-lg btn-block" style="width: 30%; margin-left: 380px;color: white;">
                    发  布
                </button>
            </div>
            <!-- 发布 end -->
        </form>


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

<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>