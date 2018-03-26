<?php if (!defined('THINK_PATH')) exit();?><div class="wrapper wrapper-content animated fadeInDown">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>修改权限</h2>
            <hr/>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="/CCIR_master/index.php/Admin/Privilege/privilegeEdit">
                <input type="hidden" name="privilegeId" value="<?php echo $data['privilegeid']; ?>" />
                <!--<div class="form-group">-->
                    <!--<label class="col-sm-2 control-label">序号</label>-->
                    <!--<div class="col-sm-10">-->
                        <!--<input type="text" class="form-control" name="privilegeId" value="<?php echo ($data["privilegeid"]); ?>">-->
                    <!--</div>-->
                <!--</div>-->
                <div class="form-group">
                    <label class="col-sm-2 control-label">上级权限</label>
                    <div class="col-sm-10">
                        <select name="pid" class="form-control">

                            <?php if ($data['pid'] == NULL):?>
                            <option value="10000">无 (本身为普通权限)</option>
                            <?php endif; ?>

                            <option value="0">顶级权限</option>
                            <?php if ($data['pid'] !== NULL):?>
                            <option value="10000">无 (本身为普通权限)</option>
                            <?php endif; ?>

                            <?php foreach ($list as $k => $v): ?>
                            <?php if($v['privilegeid'] == $data['id'] || in_array($v['privilegeid'], $children)) continue ; ?>
                            <option value="<?php echo $v['privilegeid']; ?>"
                            <?php
 if($v['privilegeid'] == $data['pid']): ?>selected="selected"

                            <?php endif; ?>
                            >
                            <?php echo str_repeat('-', 8*($v['level']-1)).$v['privilegename']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">权限名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="privilegename" value="<?php echo ($data["privilegename"]); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">控制器</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="controller" value="<?php echo ($data["controller"]); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">动作</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="action" value="<?php echo ($data["action"]); ?>">
                    </div>
                </div>

                <!--  <div class="form-group">
                     <label class="col-sm-2 control-label">层级</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" name="level" value="<?php echo ($data["level"]); ?>">
                     </div>
                 </div> -->


                <div class="form-group">
                    <div class="col-sm-offset-11 col-sm-1">
                        <button type="submit" class="btn btn-primary" style="width:100%">修改</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>