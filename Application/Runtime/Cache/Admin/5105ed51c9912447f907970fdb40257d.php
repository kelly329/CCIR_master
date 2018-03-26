<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>newstyle.css">
<style>
    .ibox-content {
        border-style: none;
    }

    .forum-item .forum-sub-title {
        margin-left: 0;
        margin-top: 10px;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="wrapper wrapper-content animated fadeInDown">
            <div class="ibox-content m-b-sm border-bottom">
                <div class="p-xs">
                    <div class="pull-left m-r-md">
                        <i class="fa fa-stack-overflow text-navy mid-icon"></i>
                    </div>
                    <h2>系统公告专区</h2>
                    <span>查看所有系统消息。</span>
                </div>
            </div>

            <div class="ibox-content forum-container">
                <div class="row">
                    <div class="col-sm-3 animated fadeInDown">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <div class="file-manager">
                                    <h2>快速筛选</h2>
                                    <h5 class="tag-title">分类</h5>
                                    <ul class="tag-list" style="padding: 0">
                                        <li><a <?php if(empty($_GET['type'])){echo 'class="tag-selected"';}; ?>
                                            href="<?php echo(valueChange('type',0)) ?>">全部问题</a>
                                        </li>
                                        <?php if(is_array($type)): foreach($type as $key=>$vo): ?><li><a <?php if($vo['id']==$_GET['type']){echo 'class="tag-selected"';} ?>
                                                href="<?php echo(valueChange('type',$vo['id'])) ?>"><?php echo ($vo["name"]); ?></a>
                                            </li><?php endforeach; endif; ?>
                                    </ul>
                                    <div class="clearfix"></div>
                                    <h5 class="tag-title">排序方式</h5>
                                    <ul class="tag-list" style="padding: 0">
                                        <li><a <?php if('level'==$_GET['order']){echo 'class="tag-selected"';} ?>
                                            href="<?php echo(valueChange('order','level')) ?>">按重要性排序</a>
                                        </li>
                                        <li><a <?php if('time'==$_GET['order']){echo 'class="tag-selected"';} ?>
                                            href="<?php echo(valueChange('order','time')) ?>">按时间倒排序</a>
                                        </li>
                                        <li><a <?php if('outdate'==$_GET['order']){echo 'class="tag-selected"';} ?>
                                            href="<?php echo(valueChange('order','outdate')) ?>">查看以往公告</a>
                                        </li>
                                        <li><a <?php if('longterm'==$_GET['order']){echo 'class="tag-selected"';} ?>
                                            href="<?php echo(valueChange('order','longterm')) ?>">查看长期公告</a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                    <?php if($flag == '1'): ?><div class="hr-line-dashed"></div>
                                        <a href="<?php echo U('system/news');?>">
                                            <button class="btn btn-primary btn-block">发布系统公告</button>
                                        </a>
                                        <?php if($title["tag"] == '0'): ?><a href="<?php echo U('system/newsnotdone');?>">
                                                <button class="btn btn-primary btn-block">进入草稿箱</button>
                                            </a><?php endif; ?>
                                        <div class="clearfix"></div><?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 animated fadeInDown">
                        <div class="row">
                            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><div class="forum-item">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <?php if($title["tag"] == '1'): ?><a href="/CCIR_master/index.php/Admin/System/editNew/id/<?php echo ($vo["newid"]); ?>"
                                                   class="forum-item-title">
                                                    <?php else: ?>
                                                    <a href="/CCIR_master/index.php/Admin/System/newdetail/id/<?php echo ($vo["newid"]); ?>"
                                                       class="forum-item-title"><?php endif; ?>
                                            <?php echo ($vo["title"]); ?>
                                            <span class="label label-primary"><?php echo ($vo["name"]); ?></span>
                                            <?php if(($vo["level"] == '1')): ?><span class="label label-info">重要</span>
                                                <?php elseif(($vo["level"] == '2')): ?>
                                                <span class="label label-warning">紧急</span>
                                                <?php elseif(($vo["level"] == '3')): ?>
                                                <span class="label label-danger">置顶!</span><?php endif; ?>

                                            </a>
                                            <div class="forum-sub-title">
                                                <span><i
                                                        class="fa fa-calendar-check-o"></i>开始时间:<?php echo date("Y-m-d",$vo['time']);?>
                                                </span>
                                                 <span><i
                                                         class="fa fa-calendar-check-o"></i>结束时间:<span><?php echo $vo['endtime']?date("Y-m-d",$vo['endtime']):'长期公告';?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><?php endforeach; endif; ?>
                            <div class="page-container">
                                <div class="page"><?php echo ($page); ?></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="page-container">
                        <div class="page"><?php echo ($page); ?></div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>