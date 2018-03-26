<?php if (!defined('THINK_PATH')) exit();?><div class="wrapper wrapper-content animated fadeInDown">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-11 p-xs">
                <div class="pull-left m-r-md">
                    <i class="fa fa-sitemap text-navy mid-icon"></i>
                </div>
                <h2>系统日志记录详情</h2>
                <span>查看用户数据行为,查看相关行为动作详情。</span>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <table class="table table-hover">
                        <thead>

                        </thead>
                        <tr>
                            <td>用户名</td>
                            <td><?php echo ($info["username"]); ?>
                                <?php if($info["role"] == '1'): ?><span
                                        class="label label-primary"><?php echo ($info["rolename"]); ?></span>
                                    <?php elseif($info["role"] == '2'): ?>
                                    <span class="label label-success"><?php echo ($info["rolename"]); ?></span>
                                    <?php elseif(($info["role"] == '3') or ($info["role"] == '5')): ?>
                                    <span class="label label-info"><?php echo ($info["rolename"]); ?></span>
                                    <?php else: ?>
                                    <span class="label label-warning"><?php echo ($info["rolename"]); ?></span><?php endif; ?>
                            </td>
                        </tr>
                        <?php if(($info["role"] == '3') or ($info["role"] == '5')): ?><tr>
                                <td>所属学校</td>
                                <td><?php echo ($info["schoolname"]); ?></td>
                            </tr><?php endif; ?>
                        <tr>
                            <td>操作时间</td>
                            <td><?php echo date('Y-m-d H:i:s',$info['time']);?></td>
                        </tr>
                        <tr>
                            <td>操作动作</td>
                            <?php if(array_key_exists($info['a'],C('Goto.'.$info['c']))): if($info['c'] == 'upload' ): ?><!--如果有上传文件-->
                                    <td>
                                        <a href="<?php echo C('Goto.'.$info['c'])[$info['a']]; echo ($info["tagid"]); ?>"><?php echo(C($info['c'].".".$info['a']));?></a>
                                        <a href="/CCIR_master/<?php echo ($info['file']); ?>">批量上传的文件</a>
                                    </td>
                                    <?php else: ?>
                                    <!--如果存在有跳转的userid-->
                                    <td>
                                        <a href="<?php echo C('Goto.'.$info['c'])[$info['a']]; echo ($info["tagid"]); ?>"><?php echo(C($info['c'].".".$info['a']));?></a>
                                    </td><?php endif; ?>
                                <?php else: ?>
                                <td><?php echo(C($info['c'].".".$info['a']));?></td><?php endif; ?>


                        </tr>
                        <tr>
                            <td>操作地点</td>
                            <td><?php echo ($info["city"]); ?></td>
                        </tr>
                        <tr>
                            <td>操作ip</td>
                            <td><?php echo ($info["ip"]); ?></td>
                        </tr>
                        <tr>
                            <td>浏览器相关详情</td>
                            <td><?php echo ($info["agent"]); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>