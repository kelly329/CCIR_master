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
                <span>添加后台用户,只有超级管理员才有权限添加后台管理员</span>
            </div>
        </div>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-4  form-group">
                <label>用户名</label>
                <input type="text" placeholder="用户名将作为登录账号" class="form-control" id="username" required><span
                    id='result'
                    class='result-tag control-label'>用户名已存在</span>
            </div>
            <div class="form-group col-lg-4">
                <label>昵称</label>
                <input type="text" placeholder="请输入您的昵称" class="form-control" id="nickname" name="nickname" required>
            </div>
            <div class="form-group col-lg-4">
                <div class="col-lg-6">
                    <label>管理员角色分类</label>
                    <select class="form-control col-sm-6" id="level1" name="roleId" required>
                        <option value="">请选择</option>
                        <?php if(is_array($role)): foreach($role as $key=>$vo): ?><option value="<?php echo ($vo["roleid"]); ?>"><?php echo ($vo["rolename"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label>&nbsp;</label>
                    <div id="zhanwei"></div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-4">
                <label>密码</label>
                <input type="password" placeholder="请输入密码" class="form-control" id="password" required>
            </div>
            <div class="form-group col-lg-4">
                <label>确认密码</label>
                <input type="password" placeholder="请确认输入密码" class="form-control" id="passwords" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-12">
                <button class="btn btn-sm btn-primary pull-right" id="sub_btn"><strong>添 加</strong></button>
            </div>
        </div>
    </div>
</div>
</div>
<script src="<?php echo (ADMIN_JS_URL); ?>encode/md5.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>plugins/zeromodel/zeroModal.min.js"></script>

<script>
    $("#sub_btn").click(function () {
        var flag = 0;// 标识位
        if ($('#password').val() != $('#passwords').val()) {
            alert('两次输入密码不一致。请重新输入。');
        }
        else if ($('#password').val() == '' || $('#passwords').val() == '' || $('#username').val() == '' || $('#level1').val() == "") {
            zeroModal.error('所有选项不能为空。');
        }
        else if ($('#username').parent().hasClass('has-error')) {
            zeroModal.error('用户名已存在!给自己起一个独一无二的名字吧。');
        } else {
            flag = 1;
        }

        if (flag) {
            $.ajax({
                type: "post",
                url: '/CCIR_master/index.php/Admin/System/addusers',
                data: {
                    username: $('#username').val(),
                    nickname: $('#nickname').val(),
                    password: hex_md5($('#password').val()),
                    roleId: $('#level1').val(),
                },
                dataType: "json",
                success: function (data) {
                    switch (data['tag']) {
                        case '0':
                            zeroModal.success(data.msg);
                            break;
                        case '2':
                            zeroModal.error(data.msg);
                            break;
                        default:
                            zeroModal.error(data.msg);
                            break;

                    }
                },
                error: function (data) {
                    alert('网络错误');
                }
            });
        }
    });




</script>