<?php if (!defined('THINK_PATH')) exit();?><div class="row">
    <div class="col-sm-12">
        <div class="wrapper wrapper-content animated fadeInDown">
            <div class="ibox-content m-b-sm border-bottom">
                <div class="p-xs">
                    <div class="pull-left m-r-md">
                        <i class="fa fa-question text-navy mid-icon"></i>
                    </div>
                    <h2>组队管理</h2>
                    <span>统计组队情况</span>
                </div>
            </div>
            <div class="ibox-title m-b-xs">
                <span>分类筛选：</span>
                <ul class="tag-list" style="padding: 0">
                    <li><a <?php if(empty($_GET['typeId'])){echo 'class="tag-selected"';}; ?>
                        href="<?php echo valueChange('typeId',0)?>">全部</a>
                    </li>
                    <?php if(is_array($type)): foreach($type as $key=>$vo): ?><li><a <?php if($vo['typeid']==$_GET['typeId']){echo 'class="tag-selected"';} ?>
                            href="<?php echo valueChange('typeId',$vo['typeid'])?>"><?php echo ($vo["typename"]); ?></a>
                        </li><?php endforeach; endif; ?>
                    <!---->
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="ibox-content forum-container">

                <div class="col-sm-3 col-lg-4 col-md-3 pull-right">
                    <form action="/CCIR_master/index.php/Admin/Post/answer" method="get">
                        <div class="input-group">
                            <input type="text" placeholder="根据组队标题筛选" class="input-sm form-control"
                                   name="title" value="<?php echo ($_GET['title']); ?>">
                            <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"><i
                                                class="fa fa-search"></i></button> </span>
                        </div>
                    </form>
                </div>

                <div class="  pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                data-toggle="dropdown">
                            进度筛选 <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo valueChange('isdone',1)?>">只显示正在进行</a></li>
                            <li><a href="<?php echo valueChange('isdone',2)?>">只显示已经结束</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo valueChange('isdone',0)?>">显示全部</a></li>
                        </ul>
                    </div>

                </div>
                <div style="height: 30px;width: 100%"></div>
                <?php if(is_array($list)): foreach($list as $key=>$vo): ?><a href="">
                        <div class="forum-item  <?php echo empty($vo['isdone'])?'':'active';?>  ">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="forum-icon">
                                        <i class="fa fa-bookmark"></i>
                                    </div>
                                    <a href="/CCIR_master/index.php/Admin/Post/postdetail/id/<?php echo ($vo["groupid"]); ?>/page/<?php echo ($_GET['p']); ?>"
                                       class="forum-item-title"><?php echo ($vo["title"]); ?></a>
                                    <div class="forum-sub-title">
                                        组队进程:
                                        <?php if($vo['isdone'] == 1): ?>正在进行<?php else: ?>已结束<?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            <?php echo ($vo["posts"]); ?>
                                        </span>
                                    <div>
                                        <small>评论数</small>
                                    </div>
                                </div>
                                <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            <?php echo $vo['thumbupnumbers']?$vo['thumbupnumbers']:0;?>
                                        </span>
                                    <div>
                                        <small>点赞数</small>
                                    </div>
                                </div>
                                <a href="/CCIR_master/index.php/Admin/Post/deleltepost/id/<?php echo ($vo["groupid"]); ?>/page/<?php echo ($_GET['p']); ?>">
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
            </div>

        </div>
    </div>
</div>