<?php if (!defined('THINK_PATH')) exit();?><div class="row">
    <div class="col-sm-12">
        <div class="wrapper wrapper-content animated fadeInDown">
            <div class="ibox-content m-b-sm border-bottom">
                <div class="p-xs">
                    <div class="pull-left m-r-md">
                        <i class="fa fa-globe text-navy mid-icon"></i>
                    </div>
                    <h2>海洋社区管理</h2>
                    <span>统计海洋社区的帖子情况,默认为按照帖子数进行排序。</span>
                </div>
            </div>
            <div class="ibox-content forum-container">

                <div class="forum-title" style="overflow: hidden">

                    <div class="pull-right forum-desc col-lg-3 col-md-3 col-sm-3">
                        <form action="/CCIR_master/index.php/Admin/Contest/community">
                            <div class="pull-left">
                                <div class="input-group">
                                    <input type="text" placeholder="搜索书籍社区" class="input-sm form-control"
                                           name="bookname" value="<?php echo ($_GET['bookname']); ?>">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"><i
                                                class="fa fa-search"></i></button> </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if(is_array($list)): foreach($list as $key=>$vo): ?><div class="forum-item">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="forum-icon">
                                    <i class="fa fa-bookmark"></i>
                                </div>
                                <a href="/CCIR_master/index.php/Admin/Contest/communication/id/<?php echo ($vo["topicid"]); ?>" class="forum-item-title"><?php echo ($vo["topicname"]); ?></a>
                                <div class="forum-sub-title"> <?php echo ($vo["remark"]); ?></div>
                            </div>
                            <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            <?php echo ($vo["posts"]); ?>
                                        </span>
                                <div>
                                    <small>帖子</small>
                                </div>
                            </div>
                            <div class="col-sm-1 forum-info">
                                        <span class="views-number">
                                            <?php echo $vo['like']?$vo['like']:'0'; ?>
                                        </span>
                                <div>
                                    <small>点赞数</small>
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
    </div>
</div>