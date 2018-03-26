<?php if (!defined('THINK_PATH')) exit();?><div class="wrapper wrapper-content animated fadeInDown">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-11 p-xs">
                <div class="pull-left m-r-md">
                    <i class="fa fa-sitemap text-navy mid-icon"></i>
                </div>
                <h2>类型管理</h2>
                <span>管理员添加、编辑、删除类型，以控制比赛类型的显示。</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-1">
                            <a href="/CCIR_master/index.php/Admin/Type/typeAdd">
                                <button type="button" class="btn btn-sm btn-primary">添加类型</button>
                            </a>
                        </div>
                        <div class="col-sm-7"></div>

                    </div>
                    <div class="margin-top"></div>

                    <table class="table table-hover" align="center">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>类型名称</th>
                            <th>上一级导航序号</th>
                             <th>层级</th>
                            <th>操作／删除</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list)): foreach($list as $key=>$v1): ?><tr>
                                <td><?php echo ($v1["typeid"]); ?></td>
                                <td><?php echo str_repeat('-', 8*($v1['level']-1)); echo ($v1["typename"]); ?></td>
                                <td><?php echo ($v1["pid"]); ?></td>
                                 <td><?php echo ($v1["level"]); ?></td>
                                <td><a class="text-navy" href="/CCIR_master/index.php/Admin/Type/typeEdit/id/<?php echo ($v1["typeid"]); ?>">编辑</a>／
                                    <a class="text-navy" href="/CCIR_master/index.php/Admin/Type/typeDel/id/<?php echo ($v1["typeid"]); ?>">删除</a>
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