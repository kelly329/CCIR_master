<?php if (!defined('THINK_PATH')) exit();?><div class="wrapper wrapper-content animated fadeInDown">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>添加权限</h2>
            <hr/>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="/CCIR_master/index.php/Admin/Privilege/privilegeAdd">
                <!--<div class="form-group">-->
                    <!--<label class="col-sm-2 control-label">序号</label>-->
                     <!--<div class="col-sm-10">-->
                        <!--<input type="text" class="form-control" name="privilegeId">-->
                    <!--</div>-->
                <!--</div>-->
                <div class="form-group">
                    <label class="col-sm-2 control-label">上级权限</label>

                    <div class="col-sm-10">
                        <select name="pid" class="form-control">
                       <option value="10000">无 (本身为普通权限)</option>
                        <option value="0">顶级权限</option>

                        <?php foreach ($list as $k => $v): ?>   
                        <option value="<?php echo $v['privilegeid']; ?>"><?php echo str_repeat('-', 8*($v['level']-1)).$v['privilegename']; ?></option>
                        <?php endforeach; ?>                    </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">权限名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="privilegename">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">控制器</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="controller">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">动作</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="action">
                    </div>
                </div>
              
               <!--  <div class="form-group">
                    <label class="col-sm-2 control-label">层级</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="level">
                    </div>
                </div> -->

                <!-- <?php if(is_array($priList)): foreach($priList as $k1=>$v1): ?><div class="form-group">
                        <div class="col-sm-offset-1 col-sm-11">
                            <?php if($v1['level'] == 1): ?><label class=" checkbox-inline"><input type="checkbox" name="pri[]" value="<?php echo ($v1['pid']); ?>"/><?php echo ($v1['privilegename']); ?>
                                </label><?php endif; ?>
                        </div>
                        <div class="col-sm-offset-3 col-sm-9">
                            <?php if($v1['level'] == 2): ?><label class="checkbox-inline">
                                    <input type="checkbox" name="pri[]" value="<?php echo ($v1['pid']); ?>"/> <?php echo ($v1['privilegename']); ?>
                                </label><?php endif; ?>
                        </div>
                    </div><?php endforeach; endif; ?> -->
                <div class="form-group">
                    <div class="col-sm-offset-11 col-sm-1">
                        <button type="submit" class="btn btn-primary" style="width:100%">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>