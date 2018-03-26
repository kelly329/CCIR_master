<?php if (!defined('THINK_PATH')) exit();?><div class="wrapper wrapper-content animated fadeInDown">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-11 p-xs">
                <div class="pull-left m-r-md">
                    <i class="fa  fa-mortar-board text-navy mid-icon"></i>
                </div>
                <h2>后台用户角色管理</h2>
                <span>管理后台角色,添加后台用户权限。</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-1">
                            <a href="/CCIR_master/index.php/Admin/Role/roleAdd">
                                <button type="button" class="btn btn-sm btn-primary">添加后台角色</button>
                            </a>
                        </div>
                        <div class="col-sm-7"></div>

                    </div>
                    <div class="margin-top"></div>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>角色名</th>
                            <th>角色人数</th>
                            <th>更新时间</th>
                            <th>编辑</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($info)): foreach($info as $key=>$vo): ?><tr>
                                <td><?php echo ($key+1+$vo["p"]); ?></td>

                                <td><?php echo ($vo["rolename"]); ?></td>
                                <td><?php echo ($vo["count"]); ?></td>
                                <td><?php echo ($vo["updatetime"]); ?></td>
                                <td><a class="text-navy" href="/CCIR_master/index.php/Admin/Role/roleEdit/id/<?php echo ($vo["roleid"]); ?>">编辑</a></td>
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