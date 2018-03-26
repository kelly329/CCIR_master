<?php if (!defined('THINK_PATH')) exit();?><div class="wrapper wrapper-content animated fadeInDown">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-11 p-xs">
                <div class="pull-left m-r-md">
                    <i class="fa fa-sitemap text-navy mid-icon"></i>
                </div>
                <h2>系统权限管理</h2>
                <span>超级管理员添加、编辑、删除系统权限管理，以控制导航菜单的显示。</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-1">
                            <a href="/CCIR_master/index.php/Admin/Privilege/privilegeAdd">
                                <button type="button" class="btn btn-sm btn-primary">添加系统权限</button>
                            </a>
                        </div>
                        <div class="col-sm-7"></div>

                    </div>
                    <div class="margin-top"></div>

                    <table class="table table-hover" align="center">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>权限名称</th>
                            <th>控制器</th>
                            <th>动作(方法名)</th>
                            <th>上一级导航序号</th>
                            <!-- <th>层级</th> -->
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list)): foreach($list as $key=>$v1): ?><tr>
                                <td><?php echo ($v1["privilegeid"]); ?></td>
                                <td><?php echo str_repeat('-', 8*($v1['level']-1)); echo ($v1["privilegename"]); ?></td>
                                <td><?php echo ($v1["controller"]); ?></td>
                                <td><?php echo ($v1["action"]); ?></td>
                                <td><?php echo ($v1["pid"]); ?></td>
                                <!-- <td><?php echo ($v1["level"]); ?></td> -->
                                <td><a class="text-navy" href="/CCIR_master/index.php/Admin/Privilege/privilegeEdit/id/<?php echo ($v1["privilegeid"]); ?>">编辑</a></td>
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