<?php if (!defined('THINK_PATH')) exit();?><div class="wrapper wrapper-content animated fadeInDown">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-11 p-xs">
                <div class="pull-left m-r-md">
                    <i class="fa  fa-mortar-board text-navy mid-icon"></i>
                </div>
                <h2>学生信息</h2>
                <span>管理学生及编辑学生信息</span>
            </div>
        </div>
    </div>
    <!--<?php dump($info);?>-->
    <form action="/CCIR_master/index.php/Admin/FUser/editinfo/id/<?php echo ($info["userid"]); ?>" method="post">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2><?php echo ($info["username"]); ?><span
                                        class="btn btn-white btn-xs"
                                        style="margin-left: 10px"><?php echo ($info["schoolname"]); ?></span>
                                    <!--<span-->
                                        <!--class="btn btn-white btn-xs"-->
                                        <!--style="margin-left: 10px"><?php echo getStuClass($info['classid'])?>-->
                                    <!--</span>-->
                                    <span
                                        class="btn btn-white btn-xs"
                                        style="margin-left: 10px"><?php echo $info['type']=='user_type_student'?'学生':'老师'?></span><span
                                        class="btn btn-white btn-xs"
                                        style="margin-left: 10px"><?php echo ($info["sex"]); ?></span>
                                </h2>
                                <!--<div class="col-sm-6" id="grade1">-->
                                <div class="col-sm-4 form-group">
                                    <label>班级年级</label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <select class="form-control" name="grade" id="grade">
                                                <?php if(is_array($grade)): foreach($grade as $key=>$vo): ?><option value="<?php echo ($vo["gradeid"]); ?>"
                                                    <?php echo $info['gradeid']==$vo['gradeid']?'selected':''; ?>
                                                    ><?php echo ($vo["gradename"]); ?></option><?php endforeach; endif; ?>
                                            </select></div>
                                        <div class="col-sm-6">
                                            <select class="form-control col-sm-2" name="classes" id="klass">
                                                <?php if(is_array($class)): foreach($class as $key=>$vo): ?><option value="<?php echo ($vo["classid"]); ?>"
                                                    <?php echo $info['classid']==$vo['classid']?'selected':''; ?>
                                                    ><?php echo ($vo["classname"]); ?></option><?php endforeach; endif; ?>
                                            </select></div>
                                    </div>
                                    <!--<input class="form-control" name="" type="text"-->
                                    <!--value="<?php echo getStuClass($info['classid'])?>" readonly>-->
                                </div>
                                <div class="col-sm-3">
                                    <label>身份证后六位</label>
                                    <input class="form-control" name="idcard" type="text" value="<?php echo ($info["idcard"]); ?>"
                                           required>
                                </div>

                                <div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2 pull-right">
                                <button class="btn btn-success" type="submit">确定修改</button>
                            </div>
                            <div class="col-sm-1 pull-right">
                                <a href="/CCIR_master/index.php/Admin/FUser/reset/id/<?php echo ($info["userid"]); ?>/klass/<?php echo ($vo["classid"]); ?>">
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
<script>
    $('#grade').change(function () {
        $.ajax({
            url: '/CCIR_master/index.php/Admin/FUser/getGradeClass',
            type: 'post',
            data: {'grade': $('#grade').val()},
            success: function (data) {
                var node = "";
                for (var i = 0; i < data.length; i++) {
                    node += "<option value=" + data[i]['classid'] + ">" + data[i]['classname'] + "</option> ";
                }
                $("#klass").empty();
                $('#klass').html(node);
            },
        })
//        console.log($('#grade').val());
    })
    //    $('#klass').change(function () {
    //        console.log($('#klass option:selected').val());
    //    })
</script>