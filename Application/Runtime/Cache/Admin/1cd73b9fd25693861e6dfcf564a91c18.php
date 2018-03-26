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

    .hiden {
        display: none;
    }
</style>
<div class="wrapper wrapper-content animated fadeInDown">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-10 p-xs">
                <div class="pull-left m-r-md">
                    <i class="fa fa-sitemap text-navy mid-icon"></i>
                </div>
                <h2>用户信息修改</h2>
                <span>修改个人信息,账户不能修改~</span>
            </div>
        </div>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="form-group col-lg-4">
                <label>昵称</label>
                <input type="text" placeholder="请输入您的昵称" class="form-control" id="name" required
                       value="<?php echo ($info["username"]); ?>">
            </div>
            <div class="form-group col-lg-4"></div>
        </div>
        <div class="row hiden" id="pass_down">
            <div class="form-group col-lg-4 col-md-10 col-sm-10 col-xs-6">
                <label>密码</label>
                <input type="password" placeholder="请输入密码" class="form-control" id="pwd">
            </div>
            <div class="form-group col-lg-4 col-md-10 col-sm-10 col-xs-6">
                <label>确认密码</label>
                <input type="password" placeholder="请确认输入密码" class="form-control" id="pwds">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-10 col-md-10 col-sm-10 col-xs-6">
                    <span class="btn btn-sm btn-primary pull-right" type="button"
                          id="pass_btn"><strong>修改密码</strong></span>
            </div>
            <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <button class="btn btn-sm btn-primary " type="button" id="sub_btn"><strong>保存</strong></button>
            </div>
        </div>
    </div>
</div>
</div>
<script src="<?php echo (ADMIN_JS_URL); ?>encode/md5.js"></script>
<script src="<?php echo (ADMIN_JS_URL); ?>plugins/zeromodel/zeroModal.min.js"></script>

<script>
    $("#sub_btn").click(function () {
        //首先判断用户有没有修改密码。
        if ($("#pass_down").hasClass('hiden')) {
            if ($('name').val() == "") {
                alert('用户名不能为空哦~~');
            } else {
                $.ajax({
                    type: "post",
                    url: '<?php echo U("user/saveuser");?>',
                    data: {
                        username: $('#name').val(),
                    },
                    dataType: "json",
                    success: function (data) {
                        switch (data['tag']) {
                            case '0':
                                alert('用户信息修改成功。');
                                break;
                            case '2':
                                alert('用户名存在');
                                break;
                            default:
                                alert('网络错,请稍后重试');
                                break;
                        }
                    },
                    error: function (data) {
                        alert('网络错误');
                    }
                });
            }
        }
        //如果修改了密码
        else {
            if ($('#pwd').val() != $('#pwds').val() || $('#pwd').val().length < 6 || $('#pwds').val().length < 6) {
                alert('密码有误,请重新输入长度大于6位的密码。');
            } else if ($('name').val() == "") {
                alert('用户名不能为空哦~~');
            }
            else {
                $.ajax({
                    type: "post",
                    url: '<?php echo U("user/saveuser");?>',
                    data: {
                        username: $('#name').val(),
                        password: hex_md5($('#pwd').val()),
                    },
                    dataType: "json",
                    success: function (data) {
                        switch (data['tag']) {
                            case '0':
                                alert('用户信息修改成功,请重新登入系统');
                                location.href="<?php echo U('user/logout');?>";
                                break;
                            default:

                                alert('网络错,请稍后重试');
                                break;
                        }
                    },
                    error: function (data) {
                        alert('网络错误');
                    }
                });
            }
        }

    });

    $(function () {
        $('#pass_btn').click(function () {
            $('#pass_down').removeClass('hiden');
        })
    })


</script>