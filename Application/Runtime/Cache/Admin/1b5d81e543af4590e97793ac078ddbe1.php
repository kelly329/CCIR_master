<?php if (!defined('THINK_PATH')) exit();?><div class="wrapper wrapper-content animated fadeInDown">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-11 p-xs">
                <div class="pull-left m-r-md">
                    <i class="fa  fa-mortar-board text-navy mid-icon"></i>
                </div>
                <h2>用户信息</h2>
                <span>管理用户及编辑用户信息</span>
            </div>
        </div>
    </div>


    <form id="form" action="/CCIR_master/index.php/Admin/FUser/editinfo/id/<?php echo ($info["userid"]); ?>" method="post"
          enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <!--一行内容-->
                        <div class="row">
                            <div class="col-lg-12 ">
                                <h2>
                                    <?php echo ($info["username"]); ?>
                                    <img src="/CCIR_master/<?php echo ($info["image"]); ?>" height="30" style="max-width: 500px"
                                         id="preview"/>
                                    <span class="btn btn-white btn-xs" style="margin-left: 10px">
                                       <?php echo ($info["college"]); ?>
                                    </span>
                                    <span class="btn btn-white btn-xs" style="margin-left: 10px">
                                       <?php echo ($info["major"]); ?>
                                    </span>
                                    <span class="btn btn-white btn-xs" style="margin-left: 10px">
                                       <?php echo ($info["grade"]); ?>
                                    </span>
                                    <span class="btn btn-white btn-xs" style="margin-left: 10px">
                                        <?php echo $info['sex']=='0'?'女':'男'?>
                                    </span>
                                    <span class="btn btn-white btn-xs" style="margin-left: 10px">
                                      <?php echo ($info["protrait"]); ?>
                                    </span>
                                </h2>
                                <div class="col-sm-3">
                                    <label>用户昵称</label>
                                    <input class="form-control" name="nickname" type="text" value="<?php echo ($info["nickname"]); ?>"
                                           required>
                                </div>
                                <div class="col-sm-3">
                                    <label>用户密码</label>
                                    <input class="form-control" name="password" type="text" value="<?php echo ($info["password"]); ?>"
                                           disabled>
                                </div>
                                <div class="col-sm-3">
                                    <label>用户邮箱</label>
                                    <input class="form-control" name="email" type="text" value="<?php echo ($info["email"]); ?>"
                                           required>
                                </div>
                                <div class="col-sm-3">
                                    <label>用户登录时间</label>
                                    <input class="form-control" name="last" type="text" value="<?php echo ($info["lastime"]); ?>"
                                           disabled>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                        <div style="height: 10px;width: 100%"></div>
                        <!--中间行-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">用户感兴趣比赛类型</label>
                                        <label class="font-primary" style="color:lightskyblue; text-align:right; margin-top:10px">
                                            (添加兴趣时请把相应的主兴趣添加,否则将无法生效)</label>
                                </div>

                                <?php if(is_array($type)): foreach($type as $k1=>$v1): ?><div class="form-group">
                                        <div class="col-sm-offset-1 col-sm-11">
                                            <?php if(($v1['level'] == 1) AND ($v1['pid'] != NULL)): ?><label class=" checkbox-inline"><input type="checkbox" name="pri[]" value="<?php echo ($v1['typeid']); ?>"
                                                    <?php if (in_array($v1['typeid'],explode(',',$info['typelist']))){?>
                                                    checked
                                                    <?php } ?>
                                                    /><?php echo ($v1['typename']); ?>(主分类)
                                                </label><?php endif; ?>
                                        </div>
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <?php if($v1['level'] == 2): ?><label class="checkbox-inline">
                                                    <input type="checkbox" name="pri[]"
                                                           value="<?php echo ($v1['typeid']); ?>" <?php if (in_array($v1['typeid'],explode(',',$info['typelist']))){?>
                                                    checked
                                                    <?php } ?>/> <?php echo ($v1['typename']); ?>(子分类)
                                                </label><?php endif; ?>
                                        </div>
                                        <div class="col-sm-offset-1 col-sm-9">
                                            <?php if($v1['pid'] == NULL): ?><div class="pribox"><input type="checkbox"  name="pri[]" value="<?php echo ($v1['typeid']); ?>" <?php if (in_array($v1['typeid'],explode(',',$info['typelist']))){?>
                                                    checked
                                                    <?php } ?>
                                                    />  <?php echo ($v1['typename']); ?>(普通分类)</div><?php endif; ?>
                                        </div>
                                    </div><?php endforeach; endif; ?>
                            </div>
                        </div>
                        <div style="height: 30px;width: 100%"></div>
                        <!--提交行-->
                        <div class="row">
                            <div class="col-sm-2 pull-right">
                                <button class="btn btn-success" type="submit">确定修改</button>
                            </div>
                            <div class="col-sm-1 pull-right">
                                <a href="/CCIR_master/index.php/Admin/FUser/reset/id/<?php echo ($info["userid"]); ?>">
                                    <button class="btn btn-warning" type="button">重置密码</button>
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </form>
</div>