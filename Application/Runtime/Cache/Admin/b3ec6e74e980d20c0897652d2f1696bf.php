<?php if (!defined('THINK_PATH')) exit();?><div class="wrapper wrapper-content animated fadeInDown">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-11 p-xs">
                <div class="pull-left m-r-md">
                    <i class="fa  fa-mortar-board text-navy mid-icon"></i>
                </div>
                <h2>前端用户管理</h2>
                <span>前端用户信息的管理</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-1 col-lg-1 col-md-1">

                        </div>
                        <div class="col-sm-7 col-lg-5 col-md-5"></div>
                        <div class="col-sm-5 col-lg-5 col-md-5 ">
                            <form action="/CCIR_master/index.php/Admin/School/stu" method="get">
                                <div class="col-sm-6 col-lg-6 col-md-6 pull-right">
                                    <div class="input-group">
                                        <input type="text" placeholder="请输入学生名" class="input-sm form-control"
                                               name="name" value="<?php echo ($_GET['name']); ?>">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"><i
                                                class="fa fa-search"></i></button> </span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-6 col-md-6 ">
                                    <div class="input-group">
                                        <input type="text" placeholder="请输入学校全名" class="input-sm form-control"
                                               name="school" value="<?php echo ($_GET['school']); ?>">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="margin-top"></div>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>学生用户</th>
                            <th>所属学校</th>
                            <th>所属班级</th>
                            <th>上次登录时间</th>
                            <th>状态</th>
                            <th>管理/编辑</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                                <td><?php echo ($key+1+$vo["p"]); ?></td>
                                <td><?php echo ($vo["name"]); ?></td>
                                <td><?php echo ($vo["schoolname"]); ?></td>
                                <td><?php echo ($vo["classname"]); ?></td>
                                <td><?php echo ($vo["lasttime"]); ?></td>
                                <td>
                                    <?php if($vo["schoolid"] == '1000000'): ?><!--对于散客-->
                                        <?php if($vo["outdate"] == '1'): ?><span class="label label-warning">过期</span><?php endif; ?>
                                        <?php if($vo["status"] == '-1'): ?><span class="label label-danger">散客：禁用</span>
                                        <?php elseif($vo["status"] == '6'): ?>
                                            <?php if($vo["try"] == '1'): ?><span class="label label-success">散客：试用中</span>
                                            <?php else: ?>
                                                <span class="label label-success">散客：正常</span><?php endif; ?>
                                        <?php else: ?>
                                            <span class="label label-danger">散客：未知状态</span><?php endif; ?>                                       
                                    <?php else: ?>
                                    <!--普通用户-->
                                        <?php if($vo["status"] == '0'): ?><span class="label label-danger">禁用</span>
                                        <?php elseif($vo["status"] == '1'): ?>
                                            <span class="label label-success">正常</span>
                                        <?php elseif($vo["status"] == '2'): ?>
                                            <span class="label label-defaul">已经毕业</span>
                                        <?php elseif($vo["status"] == '3'): ?>
                                            <span class="label label-warning">学校未缴费</span>
                                        <?php else: ?>
                                            <span class="label label-danger">未知状态</span><?php endif; endif; ?>
                                </td>
                                <td>
                                    <?php if($vo["schoolid"] == '1000000'): ?><!--对于散客-->
                                        <?php if($vo["status"] == '6'): ?><a href="/CCIR_master/index.php/Admin/School/closeuser/id/<?php echo ($vo['userid']); ?>/s/1<?php echo getRightUrl();?>" class="text-navy">禁用 </a>
                                        <?php elseif($vo["status"] == '-1'): ?>
                                            <a class="text-navy" href="/CCIR_master/index.php/Admin/School/openuser/id/<?php echo ($vo['userid']); ?>/s/1<?php echo getRightUrl();?>">激活 </a>
                                        <?php else: ?>
                                            <a class="text-navy">未知</a><?php endif; ?>
                                    <?php else: ?>
                                        <!--普通用户-->
                                        <?php if($vo["status"] == '0'): ?><a class="text-navy" href="/CCIR_master/index.php/Admin/School/openuser/id/<?php echo ($vo['userid']); echo getRightUrl();?>">激活 </a>
                                        <?php elseif(($vo["status"] == '2') OR ($vo["status"] == '3')): ?>
                                            <a class="text-navy">查看</a>
                                        <?php elseif($vo["status"] == '1'): ?>
                                            <a href="/CCIR_master/index.php/Admin/School/closeuser/id/<?php echo ($vo['userid']); echo getRightUrl();?>" class="text-navy">禁用 </a>
                                        <?php else: ?>
                                            <a class="text-navy">未知</a><?php endif; endif; ?>/
                                    <a class="text-navy" href="/CCIR_master/index.php/Admin/School/userdetail/id/<?php echo ($vo["userid"]); ?>/klass/<?php echo ($vo["classid"]); ?>/type/1">编辑</a>
                                </td>
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