<?php if (!defined('THINK_PATH')) exit();?><style>
    .tag-selected {
        background: #1ab394 !important;
        color: white !important;
    }

    .bookimg {
        height: 250px;
        width: 175px;
    }
</style>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-3 animated fadeInLeft">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="file-manager">
                        <h2>比赛信息管理列表</h2>
                         <form action="/CCIR_master/index.php/Admin/Contest/contestlist">
                             <h5 class="tag-title">比赛名称</h5>
                                <div class="input-group">
                                    <?php if(empty($title) == true): ?><input type="text" placeholder="按照比赛名称搜索书籍" name="title" class="input-sm form-control">
                                    <?php else: ?>
                                    <input type="text" value="<?php echo ($title); ?>" name="title" class="input-sm form-control"><?php endif; ?>
                                      <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"><i
                                                class="fa fa-search"></i></button>
                                                <a href="<?php echo U('contest/contestlist');?>"><button type="button" class="btn btn-sm btn-default"><i class="fa fa-times"></i></button></a>
                                    </span>
                                </div>
                        </form>
                        <h5 class="tag-title">比赛主分类</h5>
                        <ul class="tag-list" style="padding: 0">
                            <li><a <?php if(empty($_GET['maintype'])){echo 'class="tag-selected"';}; ?>
                                href="<?php echo valueChange('maintype',0)?>">全部</a>
                            </li>
                            <?php if(is_array($maintype)): foreach($maintype as $key=>$vo): ?><li><a <?php if($vo['maintype']==$_GET['maintype']){echo 'class="tag-selected"';} ?>
                                    href="<?php echo valueChange('maintype',$vo['maintype'])?>">
                                    <?php if($vo['maintype'] == 1): ?>校内<?php else: ?>校外<?php endif; ?>
                                    </a>
                                </li><?php endforeach; endif; ?>
                        </ul>
                        <div class="clearfix"></div>
                        <h5 class="tag-title">比赛是否推荐</h5>
                        <ul class="tag-list" style="padding: 0">
                            <li><a <?php if(empty($_GET['isrecommend'])){echo 'class="tag-selected"';}; ?>
                                href="<?php echo valueChange('isrecommend',0)?>">全部</a>
                            </li>
                            <?php if(is_array($isrecommend)): foreach($isrecommend as $key=>$vo): ?><li><a <?php if($vo['isrecommend']==$_GET['isrecommend']){echo 'class="tag-selected"';} ?>
                                    href="<?php echo valueChange('isrecommend',$vo['isrecommend'])?>">
                                    <?php if($vo['isrecommend'] == 1): ?>推荐<?php else: ?>非推荐<?php endif; ?>
                                    </a>
                                </li><?php endforeach; endif; ?>
                        </ul>
                        <div class="clearfix"></div>
                        <h5 class="tag-title">比赛类型</h5>
                        <ul class="tag-list" style="padding: 0">
                            <li><a <?php if(empty($_GET['typeId'])){echo 'class="tag-selected"';}; ?>
                                href="<?php echo valueChange('typeId',0)?>">全部</a>
                            </li>
                            <?php if(is_array($type)): foreach($type as $key=>$vo): ?><li><a <?php if($vo['typeid']==$_GET['typeId']){echo 'class="tag-selected"';} ?>
                                href="<?php echo valueChange('typeId',$vo['typeid'])?>"><?php echo ($vo["typename"]); ?></a>
                            </li><?php endforeach; endif; ?>
                        </ul>
                        <div class="clearfix"></div>
                        <div class="clearfix" style="margin-top: 20px"></div>
                        <div class="hr-line-dashed"></div>
                        <a href="<?php echo U('contest/addcontest');?>">
                            <button class="btn btn-primary btn-block">上传比赛</button>
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9 animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="file-box">
                            <div class="file">
                                <a href="/CCIR_master/index.php/Admin/Contest/editcontest/id/<?php echo ($vo["contestid"]); ?>">
                                    <span class="corner"></span>
                                    <!--图片-->
                                    <div class="image">
                                        <img alt="<?php echo ($vo["title"]); ?>" class="img-responsive bookimg" src="/CCIR_master/<?php echo ($vo["picurl"]); ?>">
                                    </div>
                                    <!--书名-->
                                    <div class="file-name">
                                        <?php echo subtext($vo['title'],10);?>
                                        <br/>
                                    </div>
                                </a>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="page-container">
                <div class="page"><?php echo ($page); ?></div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.file-box').each(function () {
            animationHover(this, 'pulse');
        });
    });
</script>