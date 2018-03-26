<?php if (!defined('THINK_PATH')) exit();?><div class="wrapper wrapper-content animated fadeInDown">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>添加分类</h2>
            <hr/>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="/CCIR_master/index.php/Admin/Type/typeAdd">
                <!--<div class="form-group">-->
                    <!--<label class="col-sm-2 control-label">序号</label>-->
                     <!--<div class="col-sm-10">-->
                        <!--<input type="text" class="form-control" name="privilegeId">-->
                    <!--</div>-->
                <!--</div>-->
                <div class="form-group">
                    <label class="col-sm-2 control-label">上级分类</label>

                    <div class="col-sm-10">
                        <select name="pid" class="form-control">
                       <option value="10000">无 (本身为普通分类)</option>
                        <option value="0">顶级分类</option>

                        <?php foreach ($list as $k => $v): ?>   
                        <option value="<?php echo $v['typeid']; ?>"><?php echo str_repeat('-', 8*($v['level']-1)).$v['typename']; ?></option>
                        <?php endforeach; ?>                    </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分类名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="typename">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-11 col-sm-1">
                        <button type="submit" class="btn btn-primary" style="width:100%">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>