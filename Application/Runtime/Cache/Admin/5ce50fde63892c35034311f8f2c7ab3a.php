<?php if (!defined('THINK_PATH')) exit();?><style>
    .social-avatar .media-body a {
        display: inline-block;
    }
    .pull-left{margin-top: 10px;}
    .pull-left label{font-size: 15px}
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
                <div class="ibox-content" style="padding-left: 100px;">

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
                        <i class="fa fa-clock-o"></i> <?php echo ($info["createtime"]); ?>
                        </span>
                        <?php if($info["ispass"] == '1'): ?><span class="label label-success">审核通过</span>
                            <?php elseif($info["ispass"] == '2'): ?>
                            <span class="label label-danger">审核不通过</span><?php endif; ?>
                       
                    </div>
                    <div class="margin-top"></div>
                    <div class="pull-left">
                        <label >比赛图片</label>
                        <img  width="80%" alt="<?php echo ($info["title"]); ?>" class="img-responsive bookimg" src="/CCIR_master/<?php echo ($info["picurl"]); ?>">
                    </div>
                    <br/>
                    <div style="clear: both"></div>
                    <div class="pull-left">
                        <label>比赛标题: </label>
                        <span><?php echo ($info["content"]); ?></span>
                    </div>
                    <br/>
                   <div style="clear: both"></div>
                    <div class="pull-left">
                        <label>比赛范围: </label>
                        <?php if($info["maintype"] == '1'): ?><span class="label label-success">校内</span>
                            <?php elseif($info["maintype"] == '2'): ?>
                            <span class="label label-danger">校外</span><?php endif; ?>
                    </div>
                    <div style="clear: both"></div>
                    <div class="pull-left">
                        <label>比赛类型: </label>
                       <span><?php echo ($type["typename"]); ?></span>
                    </div>
                    <div style="clear: both"></div>
                    <div class="pull-left">
                        <label>比赛文档(点击下载文件)： </label>
                        <a href="/CCIR_master/<?php echo ($info["texturl"]); ?>">比赛文档信息</a>
                    </div>
                    <div style="clear: both"></div>
                    <div class="pull-left">
                        <label>比赛说明内容： </label>
                       <span><?php echo ($info["content"]); ?></span>
                    </div>
                    <div style="clear: both"></div>
                    <div class="pull-right">
                        <h3>管理员进行处理: </h3>
                        <a href="/CCIR_master/index.php/Admin/Fuser/recommendetail/id/<?php echo ($info["id"]); ?>/action/1">
                            <button class="btn btn-success btn-xs" type="button">审核通过</button>
                        </a>
                        <a href="/CCIR_master/index.php/Admin/Fuser/recommendetail/id/<?php echo ($info["id"]); ?>/action/2">
                            <button class="btn btn-danger btn-xs" type="button">审核不通过</button>
                        </a>
                    </div>
                    <div style="clear: both"></div>

                </div>
            </div>



            </div>
        </div>
    </div>

</div>