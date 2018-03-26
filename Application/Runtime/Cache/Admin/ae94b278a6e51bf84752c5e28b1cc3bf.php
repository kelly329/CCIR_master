<?php if (!defined('THINK_PATH')) exit();?><div class="row">
    <div class="col-sm-12">
        <div class="wrapper wrapper-content animated fadeInDown">

            <div class="ibox-content m-b-sm border-bottom">
                <div class="p-xs">
                    <div class="pull-left m-r-md">
                        <i class="fa fa-question text-navy mid-icon"></i>
                    </div>
                    <h2><?php echo ($title["title"]); ?></h2>
                    <span>前端用户名:<?php echo getUserName($title['userid']);?></span><span class="pull-right">发布时间: <?php echo ($title["questiontime"]); ?></span>
                </div>
            </div>
            <?php if(isset($info)): ?><div class="ibox-content forum-container">
                    <?php if(is_array($info)): foreach($info as $key=>$vo): ?><div class="forum-item  <?php echo empty($vo['best'])?'':'active';?>">
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="forum-icon">
                                        <i class="fa fa-quote-left"></i>
                                    </div>
                                    <div class="forum-sub-title">
                                        用户: <?php echo getUserName($vo['userid']);?><span class="pull-right"><?php echo ($vo["answertime"]); ?></span>
                                    </div>
                                        <span
                                                class="forum-item-title"><?php echo ($vo["answercontent"]); ?></span>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            <?php echo (int)$vo['thumbupnumbers']; ?>
                                        </span>
                                    <div>
                                        <small>点赞数</small>
                                    </div>
                                </div>
                                <a href="/CCIR_master/index.php/Admin/Post/delelteanswer/id/<?php echo ($vo["commid"]); ?>/question/<?php echo ($vo["groupid"]); ?>">
                                    <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                        <div>
                                            <small>删除</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div><?php endforeach; endif; ?>
                    <div class="page-container">
                        <div class="page"><?php echo ($page); ?></div>
                        <div class="clear"></div>
                    </div>
                </div><?php endif; ?>
        </div>
    </div>
</div>