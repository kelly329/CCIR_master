<?php if (!defined('THINK_PATH')) exit();?><div class="wrapper wrapper-content animated fadeInDown">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-11 p-xs">
                <div class="pull-left m-r-md">
                    <i class="fa  fa-address-card-o text-navy mid-icon"></i>
                </div>
                <h2>前端用户管理</h2>
                <span>管理前端用户信息</span>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">

                        <div class="col-sm-7"></div>
                        <form action="/CCIR_master/index.php/Admin/FUser/userlist" method="get">
                            <!--<div class="col-sm-2 pull-left">-->
                                <!--<div class="input-group">-->
                                    <!--<input type="text" placeholder="请输入学校全名" class="input-sm form-control" name="school"-->
                                           <!--value="<?php echo ($_GET['school']); ?>">-->
                                <!--</div>-->
                            <!--</div>-->
                            <div class="col-sm-4 pull-left">
                                <div class="input-group">
                                    <input type="text" placeholder="请输入用户名" class="input-sm form-control" name="name"
                                           value="<?php echo ($_GET['name']); ?>">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"><i
                                                class="fa fa-search"></i></button> </span>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="margin-top"></div>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>用户</th>
                            <th>用户头像</th>
                            <th>上次登录时间</th>
                            <th>状态</th>
                            <th>管理/编辑</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                                <td><?php echo ($key+1+$vo["p"]); ?></td>
                                <td><?php echo ($vo["username"]); ?></td>
                                <td>
                                    <?php if($vo['image'] != ''): ?><img src="/CCIR_master/<?php echo ($vo["image"]); ?>" height="30">
                                        <?php else: ?>
                                        暂无头像<?php endif; ?>
                                </td>
                                <td style="max-width: 300px"><?php echo ($vo["lastime"]); ?></td>
                                <td>
                                    <?php if($vo["status"] == '1'): ?><span class="label label-success">正常</span>
                                        <?php else: ?>
                                        <span class="label label-danger">停用</span><?php endif; ?>
                                </td>
                                <td>
                                    <?php if($vo["status"] == '0'): ?><a class="text-navy"
                                           href="/CCIR_master/index.php/Admin/FUser/openuser/id/<?php echo ($vo['userid']); echo getRightUrl();?>">激活 </a>
                                        <?php else: ?>
                                        <a href="/CCIR_master/index.php/Admin/FUser/closeuser/id/<?php echo ($vo['userid']); echo getRightUrl();?>"
                                           class="text-navy">禁用 </a><?php endif; ?>
                                    /
                                    <a class="text-navy" href="/CCIR_master/index.php/Admin/FUser/userinfo/id/<?php echo ($vo["userid"]); ?>">编辑</a></td>
                            </tr><?php endforeach; endif; ?>
                        </tbody>
                    </table>
                    <div class="page-container">
                        <div class="page"><?php echo ($page); ?></div>
                        <div class="clear"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>