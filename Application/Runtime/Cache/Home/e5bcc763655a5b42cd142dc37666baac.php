<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>个人主页</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <script src="<?php echo (HOME_JS_URL); ?>jquery1.min.js"></script>
    <script src="<?php echo (HOME_JS_URL); ?>jquery.scrollzer.min.js"></script>
    <script src="<?php echo (HOME_JS_URL); ?>jquery.scrolly.min.js"></script>
    <script src="<?php echo (HOME_JS_URL); ?>skel.min.js"></script>
    <script src="<?php echo (HOME_JS_URL); ?>skel-layers.min.js"></script>
    <script src="<?php echo (HOME_JS_URL); ?>init.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS_URL); ?>jquery-1.7.2.min.js"></script>
    <!-- 弹出框 -->
    <link rel="stylesheet" href="<?php echo (HOME_JS_URL); ?>index(3).css">
    <script type="text/javascript" src="<?php echo (HOME_JS_URL); ?>jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS_URL); ?>jquery.reveal.js"></script>
    <link rel="stylesheet" href="<?php echo (HOME_JS_URL); ?>skel.css" />
    <link rel="stylesheet" href="<?php echo (HOME_JS_URL); ?>style.css" />
    <link href="<?php echo (HOME_CSS_URL); ?>bootstrap.min.css" rel="stylesheet">


</head>
<body>

<div id="wrapper">
    <!-- Header -->
    <section id="header" class="skel-layers-fixed">
        <header>
						<span class="image avatar">
                            <!--<a href="#" data-reveal-id="myModals" data-animation="fade">-->
                                <a href="gerenxinxi.php">
                             <img src="uploads/<?php echo $row['face']?>" alt="" />
                             </a>
                        </span>
            <h1><a href="" target="_blank">昵称</a></h1>
            <p><?php echo $row['user_profile']?></p>
        </header>
        <nav id="nav">
            <ul>
                <li><a href="#one" class="active">比赛经历</a></li>
                <li><a href="#two">我关注的人</a></li>
                <li><a href="#three">谁关注我</a></li>
                <li><a href="#four">我的动态</a></li>
                <li><a href="#five">个性标签</a></li>
                <li><a href="#six">我的收藏</a></li>
            </ul>
        </nav>
        <footer>
            <ul class="icons">
                <li ><a href="webindex.php">首页</a></li>
                <li ><a href="xnsy.php">校内比赛</a></li>
                <li><a href="xwsy.php">校外比赛</a></li>
                <li><a href="sh.php">组队社区</a></li>
            </ul>
        </footer>
    </section>

    <!-- Main -->
    <div id="main">
        <!-- One -->
        <!-- 比赛经历 -->
        <script type="text/javascript">
            $(document).ready(function(e) {
                var h = $(".about4_main ul li:first-child").height()/2;<!--第一个li高度的一半-->
                var h1 = $(".about4_main ul li:last-child").height()/2;<!--最后一个li高度的一半-->
                $(".line").css("top",h);
                $(".line").height($(".about4_main").height()-h1-h);
            });
        </script>
        <section id="one">
            <div class="container">

                <div class="about4"><h3>我的比赛经历</h3>
                    <div class="about4_main">
                        <div class="line"></div>
                        <ul>
                            <li>
                                <b>2015年ACM比赛</b>
                            </li>
                            <li>
                                <b>2014数码创意大赛</b>
                            </li>
                            <li>
                                <b>2013年院刊设计大赛</b>
                            </li>
                            <li>
                                <b>2012年微电影大赛</b>
                            </li>
                            <li>
                                <a href="#">...more</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>



        <!-- Two -->
        <section id="two">
            <div class="container">
                <h3>我关注的人</h3>
                <div class="table-wrapper">
                    <table>
                        <thead>
                        <tr>
                            <div class="ABC"><a href="#a">A</a></div>
                            <div class="ABC"><a href="#b">B</a></div>
                            <div class="ABC"><a href="#c">C</a></div>
                            <div class="ABC"><a href="#d">D</a></div>
                            <div class="ABC"><a href="#e">E</a></div>
                            <div class="ABC"><a href="#f">F</a></div>
                            <div class="ABC"><a href="#g">G</a></div>
                            <div class="ABC"><a href="#h">H</a></div>
                            <div class="ABC"><a href="#i">I</a></div>
                            <div class="ABC"><a href="#j">J</a></div>
                            <div class="ABC"><a href="#k">K</a></div>
                            <div class="ABC"><a href="#l">L</a></div>
                            <div class="ABC"><a href="#m">M</a></div>
                            <div class="ABC"><a href="#n">N</a></div>
                            <div class="ABC"><a href="#o">O</a></div>
                            <div class="ABC"><a href="#p">P</a></div>
                            <div class="ABC"><a href="#q">Q</a></div>
                            <div class="ABC"><a href="#r">R</a></div>
                            <div class="ABC"><a href="#s">S</a></div>
                            <div class="ABC"><a href="#t">T</a></div>
                            <div class="ABC"><a href="#u">U</a></div>
                            <div class="ABC"><a href="#v">V</a></div>
                            <div class="ABC"><a href="#w">W</a></div>
                            <div class="ABC"><a href="#x">X</a></div>
                            <div class="ABC"><a href="#y">Y</a></div>
                            <div class="ABC"><a href="#z">Z</a></div>
                            <!-- <th><td>A</td></th> -->
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th  id="a"><font color="#990000">A</font></th>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <th  id="b"><font color="#990000">B</font></th>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <th  id="c"><font color="#990000">C</font></th>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">hhhhh</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <th  id="d"><font color="#990000">D</font></th>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>


        <!-- Three -->
        <section id="three">
            <div class="container">
                <h3>谁关注我</h3>
                <div class="table-wrapper">
                    <table>
                        <thead>
                        <tr>
                            <div class="ABC"><a href="#a">A</a></div>
                            <div class="ABC"><a href="#b">B</a></div>
                            <div class="ABC"><a href="#c">C</a></div>
                            <div class="ABC"><a href="#d">D</a></div>
                            <div class="ABC"><a href="#e">E</a></div>
                            <div class="ABC"><a href="#f">F</a></div>
                            <div class="ABC"><a href="#g">G</a></div>
                            <div class="ABC"><a href="#h">H</a></div>
                            <div class="ABC"><a href="#i">I</a></div>
                            <div class="ABC"><a href="#j">J</a></div>
                            <div class="ABC"><a href="#k">K</a></div>
                            <div class="ABC"><a href="#l">L</a></div>
                            <div class="ABC"><a href="#m">M</a></div>
                            <div class="ABC"><a href="#n">N</a></div>
                            <div class="ABC"><a href="#o">O</a></div>
                            <div class="ABC"><a href="#p">P</a></div>
                            <div class="ABC"><a href="#q">Q</a></div>
                            <div class="ABC"><a href="#r">R</a></div>
                            <div class="ABC"><a href="#s">S</a></div>
                            <div class="ABC"><a href="#t">T</a></div>
                            <div class="ABC"><a href="#u">U</a></div>
                            <div class="ABC"><a href="#v">V</a></div>
                            <div class="ABC"><a href="#w">W</a></div>
                            <div class="ABC"><a href="#x">X</a></div>
                            <div class="ABC"><a href="#y">Y</a></div>
                            <div class="ABC"><a href="#z">Z</a></div>
                            <!-- <th><td>A</td></th> -->
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th  id="a"><font color="#990000">A</font></th>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <th  id="b"><font color="#990000">B</font></th>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <th  id="c"><font color="#990000">C</font></th>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">hhhhh</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <th  id="d"><font color="#990000">D</font></th>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        <tr>
                            <td><img src="images/head.gif" height="50" width="50" alt=""></td>
                            <td><h5><font color="#990000">Adobe资源库</font></h5>
                                <br/>
                                <h6>123</h6>
                            </td>
                            <td><h6>2016年12月13日</h6></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Four -->
        <section id="four">
            <div class="container">
                <h3>我的动态</h3>
                <div class="kuai">
                    <div><h4><font color="#990000">LOGO大师</font></h4></div>
                    <div><img src="images/timg.png" width="15px" height="15px" margin="auto"><font size="3em"><B>2016年4月20日</B></font></div>
                    <div id="xianzhib"><h5>论坛（forum） ，简单理解为发帖回帖讨论的平台。是Internet上的一种电子信息服务系统。它提供一块公共电子白板，每个用户都可以在上面书写，可发布信息或提出看法。它是一种交互性强，内容丰富而及时的Internet电子信息服务系统，用户在BBS站点上可以获得各种信息服务、发布信息、进行讨论、聊天等等。</h5></div>
                    <div>&nbsp;
                        <div class="iconb"><a href="#"><img src="images/icon1.png">评论111</a></div>
                        <div class="iconb"><a href="#"><img src="images/icon2.png">点赞111</a></div>
                        <div class="iconb"><a href="#"><img src="images/icon3.png">分享111</a></div>
                        <div class="iconb"><a href="#"><img src="images/icon4.png">收藏111</a></div>
                    </div>
                </div>

                <div class="kuai">
                    <div><h4><font color="#990000">LOGO大师</font></h4></div>
                    <div><img src="images/timg.png" width="15px" height="15px" margin="auto"><font size="3em"><B>2016年4月20日</B></font></div>
                    <div id="xianzhib"><h5>论坛（forum） ，简单理解为发帖回帖讨论的平台。是Internet上的一种电子信息服务系统。它提供一块公共电子白板，每个用户都可以在上面书写，可发布信息或提出看法。它是一种交互性强，内容丰富而及时的Internet电子信息服务系统，用户在BBS站点上可以获得各种信息服务、发布信息、进行讨论、聊天等等。</h5></div>
                    <div>&nbsp;
                        <div class="iconb"><a href="#"><img src="images/icon1.png">评论111</a></div>
                        <div class="iconb"><a href="#"><img src="images/icon2.png">点赞111</a></div>
                        <div class="iconb"><a href="#"><img src="images/icon3.png">分享111</a></div>
                        <div class="iconb"><a href="#"><img src="images/icon4.png">收藏111</a></div>
                    </div>
                </div>

                <div class="kuai">
                    <div><h4><font color="#990000">LOGO大师</font></h4></div>
                    <div><img src="images/timg.png" width="15px" height="15px" margin="auto"><font size="3em"><B>2016年4月20日</B></font></div>
                    <div id="xianzhib"><h5>论坛（forum） ，简单理解为发帖回帖讨论的平台。是Internet上的一种电子信息服务系统。它提供一块公共电子白板，每个用户都可以在上面书写，可发布信息或提出看法。它是一种交互性强，内容丰富而及时的Internet电子信息服务系统，用户在BBS站点上可以获得各种信息服务、发布信息、进行讨论、聊天等等。</h5></div>
                    <div>&nbsp;
                        <div class="iconb"><a href="#"><img src="images/icon1.png">评论111</a></div>
                        <div class="iconb"><a href="#"><img src="images/icon2.png">点赞111</a></div>
                        <div class="iconb"><a href="#"><img src="images/icon3.png">分享111</a></div>
                        <div class="iconb"><a href="#"><img src="images/icon4.png">收藏111</a></div>
                    </div>
                </div>
            </div>
        </section>
        <!--
       <div class="more"><a href="#">更多...</a></div>


					<!-- Five -->
        <section id="five">
            <div class="container">
                <h3>个性标签</h3>
                <div id="mybiao">
                    <div class="mybiaoqian"><a>美</a></div>
                    <div class="mybiaoqian"><a>很美</a></div>
                    <div class="mybiaoqian"><a>非常美</a></div>
                    <div class="mybiaoqian"><a>特别美</a></div>
                    <div class="mybiaoqian"><a>超级美</a></div>
                    <div class="mybiaoqian"><a>超级无敌美</a></div>
                    <div class="mybiaoqian"><a>宇宙超级无敌美</a></div>
                    <div class="mybiaoqian"><a>哈哈</a></div>
                    <div class="mybiaoqian"><a>呵呵</a></div>
                    <div class="mybiaoqian"><a href="gerenxinxi.php" target="_blank">+</a></div>
                </div>
            </div>
        </section>


        <!-- six -->
        <section id="six">
            <div class="container">
                <h3>我的收藏</h3>
                <p><h6>某年的某月的某日，我收藏了某些珍贵的东西</h6></p>
                <div class="features">
                    <article>
                        <a href="#" class="image"><img src="images/pic01.jpg" alt="" /></a>
                        <div class="inner">
                            <h4>这是标题</h4>
                            <p><a>我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美</a></p>
                        </div>
                    </article>
                    <article>
                        <a href="#" class="image"><img src="images/pic02.jpg" alt="" /></a>
                        <div class="inner">
                            <h4>这是传说中的标题</h4>
                            <p><a>我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美</a></p>
                        </div>
                    </article>
                    <article>
                        <a href="#" class="image"><img src="images/pic03.jpg" alt="" /></a>
                        <div class="inner">
                            <h4>噢噢这就是标题</h4>
                            <p><a>我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美我太美</a></p>
                        </div>
                    </article>
                </div>
            </div></section>
        <!--</div>

            <section class="banquan">
                ©2016 北师比赛网
            </section>
        </div>	!-->

        <div id="myModals" class="reveal-modal">
            <!--<iframe src="touxianggenggai.php" width="800" height="800"></iframe>-->
            <div width="800" height="800">
                <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    <style>
        canvas {
            border: solid thin #555;
            cursor: pointer;
        }

        #canvasContainer {
            position: relative;
        }

        #picker {
            position: absolute;
            border: solid thin #555;
            cursor: move;
            overflow: hidden;
            z-index: 2;
        }

        #resize {
            width: 0;
            height: 0;
            border-bottom: 15px solid rgba(200,200,200,0.8);
            border-left: 15px solid transparent;
            right: 0;
            bottom: 0;
            position: absolute;
            cursor: se-resize;
            z-index: 3;
        }
    </style>
    <script src="<?php echo (HOME_IMG_URL); ?>jquery.js"></script>
    <script>
        $(function () {
            var canvas = document.getElementById("container"),
                context = canvas.getContext("2d"),
                //文件服务器地址
                fileServer = null,
                //适配环境，随时修改事件名称
                eventName = { down: "mousedown", move: "mousemove", up: "mouseup", click: "click" };
            //////////canvas尺寸配置
            var canvasConfig = {
                //容器canvas尺寸
                width: 500,
                height: 300,
                //原图放大/缩小
                zoom: 1,
                //图片对象
                img: null,
                //图片完整显示在canvas容器内的尺寸
                size: null,
                //图片绘制偏移，为了原图不移出框外，这个只能是负值or 0
                offset: { x: 0, y: 0 },
                //当前应用的滤镜
                filter: null
            }
            canvas.width = canvasConfig.width;
            canvas.height = canvasConfig.height;
            ///////////设置选择工具配置
            var config = {
                //图片选择框当前大小、最大大小、最小大小
                pickerSize: 100,
                minSize: 50,
                maxSize: 200,
                x: canvas.width / 2 - 100 / 2,
                y: canvas.height / 2 - 100 / 2
            }
            /////////////结果canvas配置
            var resCanvas = [$("#res1")[0].getContext("2d"), $("#res2")[0].getContext("2d"), $("#res3")[0].getContext("2d")];
            //结果canvas尺寸配置
            var resSize = [100, 50, 32]
            resSize.forEach(function (size, i) {
                $("#res" + (i + 1))[0].width = size;
                $("#res" + (i + 1))[0].height = size;
            });
            //////// 滤镜配置
            var filters = [];
            filters.push({
                name: "灰度", func: function (pixelData) {
                    //r、g、b、a
                    //灰度滤镜公式： gray=r*0.3+g*0.59+b*0.11
                    var gray;
                    for (var i = 0; i < canvasConfig.width * canvasConfig.height; i++) {
                        gray = pixelData[4 * i + 0] * 0.3 + pixelData[4 * i + 1] * 0.59 + pixelData[4 * i + 2] * 0.11;
                        pixelData[4 * i + 0] = gray;
                        pixelData[4 * i + 1] = gray;
                        pixelData[4 * i + 2] = gray;
                    }
                }
            });
            filters.push({
                name: "黑白", func: function (pixelData) {
                    //r、g、b、a
                    //黑白滤镜公式： 0 or 255
                    var gray;
                    for (var i = 0; i < canvasConfig.width * canvasConfig.height; i++) {
                        gray = pixelData[4 * i + 0] * 0.3 + pixelData[4 * i + 1] * 0.59 + pixelData[4 * i + 2] * 0.11;
                        if (gray > 255 / 2) {
                            gray = 255;
                        }
                        else {
                            gray = 0;
                        }
                        pixelData[4 * i + 0] = gray;
                        pixelData[4 * i + 1] = gray;
                        pixelData[4 * i + 2] = gray;
                    }
                }
            });
            filters.push({
                name: "反色", func: function (pixelData) {
                    for (var i = 0; i < canvasConfig.width * canvasConfig.height; i++) {
                        pixelData[i * 4 + 0] = 255 - pixelData[i * 4 + 0];
                        pixelData[i * 4 + 1] = 255 - pixelData[i * 4 + 1];
                        pixelData[i * 4 + 2] = 255 - pixelData[i * 4 + 2];
                    }
                }
            });
            filters.push({ name: "无", func: null });
            // 添加滤镜按钮
            filters.forEach(function (filter) {
                var button = $("<button>" + filter.name + "</button>");
                button.on(eventName.click, function () {
                    canvasConfig.filter = filter.func;
                    //重绘
                    draw(context, canvasConfig.img, canvasConfig.size);
                })
                $("#filters").append(button);
            });
            //下载生成的图片(只下载第一张)
            $("#download").on(eventName.click, function () {

                //将mime-type改为image/octet-stream，强制让浏览器直接download
                var _fixType = function (type) {
                    type = type.toLowerCase().replace(/jpg/i, 'jpeg');
                    var r = type.match(/png|jpeg|bmp|gif/)[0];
                    return 'image/' + r;
                };
                var saveFile = function (data, filename) {
                    var save_link = document.createElementNS('http://www.w3.org/1999/xhtml', 'a');
                    save_link.href = data;
                    save_link.download = filename;
                    var event = document.createEvent('MouseEvents');
                    event.initMouseEvent('click', true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
                    save_link.dispatchEvent(event);
                };
                var imgData = $("#res1")[0].toDataURL("png");
                imgData = imgData.replace(_fixType("png"), 'image/octet-stream');//base64
                saveFile(imgData, "头像created on" + new Date().getTime() + "." + "png");
            });
            //上传图片
            $("#upload").on(eventName.click, function () {
                var imgData = $("#res1")[0].toDataURL("png");
                imgData = imgData.replace(/^data:image\/(png|jpg);base64,/, "");
                if (!fileServer) {
                    alert("请配置文件服务器地址");
                    return;
                }

                var blobBin = atob(imgData);
                var array = [];
                for (var i = 0; i < blobBin.length; i++) {
                    array.push(blobBin.charCodeAt(i));
                }
                var blob = new Blob([new Uint8Array(array)], { type: 'image/png' });
                var file = new File([blob], "userlogo.png", { type: 'image/png' });
                var formdata = new FormData();
                formdata.append("userlogo", file);
                $.ajax({
                    type: 'POST',
                    url: fileServer,
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function (msg) {
                        $("#uploadres").text(JSON.stringify(msg));
                    }
                });
            });
            //绑定选择图片事件
            $("#fileinput").change(function () {
                var file = this.files[0],
                    URL = (window.webkitURL || window.URL),
                    url = URL.createObjectURL(file),
                    img = new Image();
                img.src = url;
                img.onload = function () {
                    canvasConfig.img = img;
                    canvasConfig.size = getFixedSize(img, canvas);
                    draw(context, img, canvasConfig.size);
                    setPicker();
                }

            });
            //移动选择框
            //绑定鼠标在选择工具上按下的事件
            $("#picker").on(eventName.down, function (e) {
                e.stopPropagation();
                var start = { x: e.clientX, y: e.clientY, initX: config.x, initY: config.y };
                $("#canvasContainer").on(eventName.move, function (e) {
                    // 将x、y限制在框内
                    config.x = Math.min(Math.max(start.initX + e.clientX - start.x, 0), canvasConfig.width - config.pickerSize);
                    config.y = Math.min(Math.max(start.initY + e.clientY - start.y, 0), canvasConfig.height - config.pickerSize);
                    setPicker();
                })
            });
            //原图移动事件
            $("#container").on(eventName.down, function (e) {
                e.stopPropagation();
                var start = { x: e.clientX, y: e.clientY, initX: canvasConfig.offset.x, initY: canvasConfig.offset.y };
                var size = canvasConfig.size;
                $("#canvasContainer").on(eventName.move, function (e) {
                    // 将x、y限制在框内
                    // 坐标<0  当图片大于容器  坐标>容器-图片   否则不能移动
                    canvasConfig.offset.x = Math.max(Math.min(start.initX + e.clientX - start.x, 0), Math.min(canvasConfig.width - size.width * canvasConfig.zoom, 0));
                    canvasConfig.offset.y = Math.max(Math.min(start.initY + e.clientY - start.y, 0), Math.min(canvasConfig.height - size.height * canvasConfig.zoom, 0));
                    //重绘蒙版
                    draw(context, canvasConfig.img, canvasConfig.size);
                })
            });
            //改变选择框大小事件
            $("#resize").on(eventName.down, function (e) {
                e.stopPropagation();
                var start = { x: e.clientX, init: config.pickerSize };
                $("#canvasContainer").on(eventName.move, function (e) {
                    config.pickerSize = Math.min(Math.max(start.init + e.clientX - start.x, config.minSize), config.maxSize);
                    $("#picker").css({ width: config.pickerSize, height: config.pickerSize });
                    draw(context, canvasConfig.img, canvasConfig.size);
                })
            });
            $(document).on(eventName.up, function (e) {
                $("#canvasContainer").unbind(eventName.move);
            })
            //原图放大、缩小
            $("#bigger").on(eventName.click, function () {
                canvasConfig.zoom = Math.min(3, canvasConfig.zoom + 0.1);
                //重绘蒙版
                draw(context, canvasConfig.img, canvasConfig.size);
            })
            $("#smaller").on(eventName.click, function () {
                canvasConfig.zoom = Math.max(0.4, canvasConfig.zoom - 0.1);
                //重绘蒙版
                draw(context, canvasConfig.img, canvasConfig.size);
            })

            // 定位选择工具
            function setPicker() {
                $("#picker").css({
                    width: config.pickerSize + "px", height: config.pickerSize + "px",
                    top: config.y, left: config.x
                });
                //重绘蒙版
                draw(context, canvasConfig.img, canvasConfig.size);
            }
            //绘制canvas中的图片和蒙版
            function draw(context, img, size) {
                var pickerSize = config.pickerSize,
                    zoom = canvasConfig.zoom,
                    offset = canvasConfig.offset;
                context.clearRect(0, 0, canvas.width, canvas.height);
                context.drawImage(img, 0, 0, img.width, img.height, offset.x, offset.y, size.width * zoom, size.height * zoom);
                //绘制挖洞后的蒙版
                context.save();
                context.beginPath();
                pathRect(context, config.x, config.y, pickerSize, pickerSize);
                context.rect(0, 0, canvas.width, canvas.height);
                context.closePath();
                context.fillStyle = "rgba(255,255,255,0.9)";
                context.fill();
                context.restore();
                //绘制结果
                var imageData = context.getImageData(config.x, config.y, pickerSize, pickerSize)
                resCanvas.forEach(function (resContext, i) {
                    resContext.clearRect(0, 0, resSize[i], resSize[i]);
                    resContext.drawImage(canvas, config.x, config.y, pickerSize, pickerSize, 0, 0, resSize[i], resSize[i]);
                    //添加滤镜效果
                    if (canvasConfig.filter) {
                        var imageData = resContext.getImageData(0, 0, resSize[i], resSize[i]);
                        var temp = resContext.getImageData(0, 0, resSize[i], resSize[i]);// 有的滤镜实现需要temp数据
                        canvasConfig.filter(imageData.data, temp);
                        resContext.putImageData(imageData, 0, 0, 0, 0, resSize[i], resSize[i]);
                    }
                });
            }
            //逆时针用路径自己来绘制矩形，这样可以控制方向，以便挖洞
            // 起点x，起点y，宽度，高度
            function pathRect(context, x, y, width, height) {
                context.moveTo(x, y);
                context.lineTo(x, y + height);
                context.lineTo(x + width, y + height);
                context.lineTo(x + width, y);
                context.lineTo(x, y);
            }
            // 根据图片和canvas的尺寸，确定图片显示在canvas中的尺寸
            function getFixedSize(img, canvas) {
                var cancasRate = canvas.width / canvas.height,
                    imgRate = img.width / img.height, width = img.width, height = img.height;
                if (cancasRate >= imgRate && img.height > canvas.height) {
                    height = canvas.height;
                    width = imgRate * height;
                }
                else if (cancasRate < imgRate && img.width > canvas.width) {
                    width = canvas.width;
                    height = width / imgRate;
                }
                return { width: width, height: height };
            }
        });
    </script>
</head>
<body>
<input id="fileinput" type="file" /><br />
<br />
<div id="canvasContainer">
    <canvas id="container"></canvas>
    <div id="picker">
        <div id="resize"></div>
    </div>
</div>
<br />
<button id="bigger" style="border:none;background-color:#eee"><img src="<?php echo (HOME_IMG_URL); ?>jia.png" height="15" width="15"></button>
<button id="smaller" style="border:none;background-color:#eee"><img src="<?php echo (HOME_IMG_URL); ?>jian.png" height="15" width="15"></button>
<p><h6>结果：</h6></p>
<div>
    <canvas id="res1"></canvas>
    <canvas id="res2"></canvas>
    <canvas id="res3"></canvas>
    <button id="download"style="border:none;background-color:#eee"><img src="<?php echo (HOME_IMG_URL); ?>xiazai.png" height="15" width="15"></button>
    <button id="upload"style="border:none;background-color:#eee"><img src="<?php echo (HOME_IMG_URL); ?>baocun.png" height="15" width="15"></button>
    <h6>(只上传/下载第一张图片)</h6>
    <div id="uploadres"></div>
</div>
<p><h6>滤镜：</h6></p>
<div id="filters"></div>
</body>
</html>

            </div>
        </div>
</body>
</html>