<?php if (!defined('THINK_PATH')) exit();?><div class="wrapper wrapper-content animated fadeInDown">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>添加角色</h2>
            <hr/>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="/CCIR_master/index.php/Admin/Role/roleAdd">
                <div class="form-group">
                    <label class="col-sm-2 control-label">角色名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="rolename">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">添加权限</label>
                    <div class="col-sm-10">
                        <p class="font-primary" style="color:red; text-align:right; margin-top:10px">
                            (添加权限时要把相应的主导航添加,不然显示不出来)</p>
                    </div>
                </div>
                <?php if(is_array($priList)): foreach($priList as $k1=>$v1): ?><div class="form-group">
                        <div class="col-sm-offset-1 col-sm-11">
                            <?php if($v1['level'] == 1 AND ($v1['pid'] != NULL)): ?><label class=" checkbox-inline"><input type="checkbox" name="pri[]" value="<?php echo ($v1['privilegeid']); ?>"/><?php echo ($v1['privilegename']); ?>(一级导航)
                                </label><?php endif; ?>
                        </div>
                        <div class="col-sm-offset-3 col-sm-9">
                            <?php if($v1['level'] == 2): ?><label class="checkbox-inline">
                                    <input type="checkbox" name="pri[]" value="<?php echo ($v1['privilegeid']); ?>"/> <?php echo ($v1['privilegename']); ?>(二级导航)
                                </label><?php endif; ?>
                        </div>
                         <div class="col-sm-offset-1 col-sm-9">
                            <?php if($v1['pid'] == NULL): ?><div class="pribox"><input type="checkbox" name="pri[]" value="<?php echo ($v1['privilegeid']); ?>"/>   <?php echo ($v1['privilegename']); ?>(普通权限)</div><?php endif; ?>
                        </div>
                    </div><?php endforeach; endif; ?>
                <div class="form-group">
                    <div class="col-sm-offset-11 col-sm-1">
                        <button type="submit" class="btn btn-primary" style="width:100%">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>