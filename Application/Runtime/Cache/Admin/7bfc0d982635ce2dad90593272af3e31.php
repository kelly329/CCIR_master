<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <title>校园比赛信息推荐网后台管理系统</title>
    <meta name="keywords" content="校园比赛,校园比赛信息推荐网管理系统">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <link href="<?php echo (ADMIN_CSS_URL); ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo (ADMIN_CSS_URL); ?>font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo (ADMIN_CSS_URL); ?>animate.min.css" rel="stylesheet">
    <link href="<?php echo (ADMIN_CSS_URL); ?>style.min862f.css?version=201706" rel="stylesheet">
    <link href="<?php echo (ADMIN_CSS_URL); ?>page.css" rel="stylesheet">
    <script src="<?php echo (ADMIN_JS_URL); ?>jquery.min.js"></script>
    <script src="<?php echo (ADMIN_JS_URL); ?>content.index.js"></script>
    <script src="<?php echo (ADMIN_JS_URL); ?>plugins/zeromodel/zeroModal.min.js"></script>
    <style>
        .margin-top {
            margin-top: 10px;
        }

        .tag-selected {
            background: #1ab394 !important;
            color: white !important;
        }

        .overy {
            overflow-y: auto;
        }
    </style>
</head>

<body class="gray-bg top-navigation" style="min-height: 450px;">

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-header">
                    <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse"
                            class="navbar-toggle collapsed" style="background-color:#1ab394" type="button">
                        <i class="fa fa-reorder"></i>
                    </button>
                    <a href="<?php echo U('Index/index');?>" class="navbar-brand">校园比赛信息网后台管理</a>
                </div>

                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <!--<?php if(is_array($_SESSION['edminInfo']['privilege'])): foreach($_SESSION['edminInfo']['privilege'] as $k1=>$v1): ?>-->
                            <!--<?php if($v1["level"] == 1): ?>-->
                                <!--<li class="dropdown">-->
                                    <!--<a aria-expanded="false" role="button" href="#" class="dropdown-toggle"-->
                                       <!--data-toggle="dropdown"><?php echo ($v1["privilegename"]); ?> <span class="caret"></span></a>-->
                                    <!--<ul role="menu" class="dropdown-menu">-->
                                        <!--<?php if(is_array($_SESSION['edminInfo']['privilege'])): foreach($_SESSION['edminInfo']['privilege'] as $k2=>$v2): ?>-->
                                            <!--<?php if($v2['fatherid'] == $v1['pid']): ?>-->
                                                <!--<li>-->
                                                    <!--<a href="/CCIR_master/index.php/Admin/<?php echo ($v2["controller"]); ?>/<?php echo ($v2["action"]); ?>"><?php echo ($v2["privilegename"]); ?></a>-->
                                                <!--</li>-->
                                            <!--<?php endif; ?>-->
                                        <!--<?php endforeach; endif; ?>-->
                                    <!--</ul>-->
                                <!--</li>-->
                            <!--<?php endif; ?>-->
                        <!--<?php endforeach; endif; ?>-->
                        <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle"
                        data-toggle="dropdown"> 比赛管理 <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                        <li><a href="<?php echo U('Contest/contestlist');?>">比赛信息管理</a></li>
                            <li><a href="<?php echo U('Type/typeList');?>">比赛类型管理</a></li>
                            <li><a href="<?php echo U('Contest/community');?>">比赛评论管理</a></li>
                        </ul>
                        </li>

                        <li class="dropdown">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle"
                               data-toggle="dropdown"> 用户管理 <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="<?php echo U('FUser/userlist');?>">用户信息管理</a></li>
                                <li><a href="<?php echo U('Fuser/recommendlst');?>">用户推荐比赛信息</a></li>
                                <!--<li><a href="<?php echo U('Privilege/privilegeList');?>">权限管理</a></li>-->
                                <!--<li><a href="<?php echo U('System/logdetail');?>">查看系统日志</a></li>-->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle"
                               data-toggle="dropdown"> 组队管理 <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="<?php echo U('Post/answer');?>">发起组队管理</a></li>
                                <!--<li><a href="<?php echo U('Role/role');?>"></a></li>-->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle"
                               data-toggle="dropdown"> 系统管理 <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="<?php echo U('Privilege/privilegeList');?>">权限管理</a></li>
                                <li><a href="<?php echo U('Role/role');?>">角色管理</a></li>
                                <li><a href="<?php echo U('System/users');?>">后台用户管理</a></li>
                                <li><a href="<?php echo U('System/opinion');?>">查看意见反馈</a></li>
                                <li><a href="<?php echo U('System/reviewLogs');?>">查看系统日志</a></li>
                                <!--<li><a href="<?php echo U('System/logdetail');?>">系统基本配置</a></li>-->
                            </ul>
                        </li>

                    </ul>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle"
                               data-toggle="dropdown"><?php echo ($_SESSION['username']); ?> <span
                                    class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li>
                                    <a href="<?php echo U('System/edituserinfo');?>">
                                        <i class="fa fa-cogs"></i> 修改信息
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo U('System/newlist');?>">
                                        <i class="fa fa-rss"></i> 系统公告
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo U('System/feedbacklist');?>">
                                        <i class="fa fa-stack-overflow"></i> 帮助与反馈
                                    </a>
                                </li>
                            </ul>

                        </li>
                        |
                        <li>
                            <a href="<?php echo U('User/logout');?>">
                                <i class="fa fa-sign-out"></i> 退出
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>