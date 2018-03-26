<?php if (!defined('THINK_PATH')) exit();?><style>
    .social-avatar .media-body a {
        display: inline-block;
    }
</style>
<div class="wrapper wrapper-content animated fadeInDown">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <a href="/CCIR_master/index.php/Admin/Fuser/recommendlst<?php echo $_GET['type']?'/type/'.$_GET['type']:'';?>">
                <div class="col-sm-11 p-xs">
                    <div class="pull-left m-r-md">
                         <i class="fa fa-sitemap text-navy mid-icon"></i> 
                    </div>
                    <h2>用户推荐比赛信息详情</h2>
                    <span>点击此处回到上一页</span>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="pull-right">
                        <label>管理员处理: </label>
                        <a href="/CCIR_master/index.php/Admin/Fuser/recommendetail/id/<?php echo ($info["id"]); ?>/action/1">
                            <button class="btn btn-success btn-xs" type="button">已解决</button>
                        </a>
                        <a href="/CCIR_master/index.php/Admin/Fuser/recommendetail/id/<?php echo ($info["id"]); ?>/action/2">
                            <button class="btn btn-danger btn-xs" type="button">已忽视</button>
                        </a>
                    </div>
                    <div class="small m-b-xs">
                            <h2><?php echo ($info["username"]); ?></h2>
                        <?php if(empty($info[email]) != true): ?><br/> 
                             <span>
                             <i class="fa fa-envelope-o"></i> <?php echo ($info["email"]); ?> |
                             </span>   
                        <?php else: ?>
                             <br/> 
                             <span>
                             <i class="fa fa-envelope-o"></i> <span>用户没有填写邮箱</span> |
                             </span><?php endif; ?>
                        
                        <span class="text-muted">
                        <i class="fa fa-clock-o"></i> <?php echo ($info["time"]); ?> 
                        </span>
                        <?php if($info["tag"] == '1'): ?><span class="label label-success">已处理</span>
                            <?php elseif($info["tag"] == '0'): ?>
                            <span class="label label-primary">待办</span>
                            <?php elseif($info["tag"] == '2'): ?>
                            <span class="label label-danger">已忽略</span><?php endif; ?>
                       
                    </div>
                    <div class="margin-top"></div>
                    <p>
                        <?php echo ($info["content"]); ?>
                    </p>
                  


                    <!--回复功能-->
                    <?php if($info[userid] != '0'): ?><form action="/CCIR_master/index.php/Admin/Fuser/comment/id/<?php echo ($info["id"]); ?>" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" name="comment"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-reply"></i> 回复 </button> </span>
                            </div>
                        </form><?php endif; ?>
                    <!--回复功能-->



                </div>
            </div>
            <!--回复内容-->
            <?php if($info[userid] != '0'): ?><div class="row">    
                <div class="col-lg-12">
                    <h2>管理员回复:</h2>
                    <?php if(is_array($comment)): foreach($comment as $key=>$vo): ?><div class="social-feed-box">
                            <div class="social-avatar">
                                <div class="media-body">
                                    <a> <?php echo ($vo["name"]); ?>
                                        <?php if($vo["role"] == '0'): ?><span class="label label-success">前台用户</span>
                                            <?php elseif($vo["role"] == '1'): ?>
                                            <span class="label label-warning">后台管理员</span><?php endif; ?>
                                    </a><span class="pull-right"><?php echo date("Y-m-d H:i:s", $vo['time'])?></span>
                                </div>
                            </div>
                            <div class="social-body">
                                <p>
                                    <?php echo ($vo["content"]); ?>
                                </p>
                            </div>
                        </div><?php endforeach; endif; ?>
                </div><?php endif; ?>


            </div>
        </div>
    </div>

</div>