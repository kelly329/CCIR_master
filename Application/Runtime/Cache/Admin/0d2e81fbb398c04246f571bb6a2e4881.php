<?php if (!defined('THINK_PATH')) exit();?><link href="<?php echo (ADMIN_CSS_URL); ?>plugins/zeromodel/zeroModal.css" rel="stylesheet">
<style>
    .result-error {
        color: red !important;
        transition: color 1s;
    }
    .result-tag {
        position: absolute;
        margin-top: -25px;
        margin-left: 70%;
        color: transparent;
    }
</style>
<div class="wrapper wrapper-content animated fadeInDown">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-10 p-xs">
                <div class="pull-left m-r-md">
                    <i class="fa fa-sitemap text-navy mid-icon"></i>
                </div>
                <h2>后台用户管理</h2>
                <span>修改后台用户,只有管理员才有权限修改后台管理员</span>
            </div>
        </div>
    </div>
    <form id="form" action="/CCIR_master/index.php/Admin/System/editinfo" method="post" enctype="multipart/form-data">
        <input type="hidden"  name="adminid" value="<?php echo ($info["adminid"]); ?>"
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-2  form-group">
                    <label>登录账号</label>
                    <input type="text" placeholder="用户名将作为登录账号" class="form-control" name="username" id="username" value="<?php echo ($info["username"]); ?>"
                           >
                    <span id='result' class='result-tag control-label'>用户名已存在</span>
                </div>
                <div class="form-group col-lg-4">
                    <label>昵称</label>
                    <input type="text" placeholder="请输入您的昵称姓名" name="nickname" class="form-control" id="nickname" value="<?php echo ($info["nickname"]); ?>"
                           required>


                </div>
                <div class="form-group col-lg-6">
                    <div class="col-lg-5">
                        <label>管理员角色分类</label>
                        <select class="form-control col-sm-6" id="level1" name="roleid" required>
                            <option value="">请选择</option>
                            <?php if(is_array($role)): foreach($role as $key=>$vo): ?><option value="<?php echo ($vo["roleid"]); ?>"
                                <?php echo $vo['roleid']==$info['roleid']?'selected':'';?>><?php echo ($vo["rolename"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class="col-lg-7">
                        <label>&nbsp;</label>
                        <div id="zhanwei"></div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-sm btn-primary pull-right" id="save_btn"><strong>修改信息</strong></button>
                </div>
            </div>

        </div>
    </form>
</div>
</div>