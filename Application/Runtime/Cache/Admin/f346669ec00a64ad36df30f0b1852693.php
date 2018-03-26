<?php if (!defined('THINK_PATH')) exit();?><link href="<?php echo (ADMIN_EDITOR_URL); ?>styles/simditor.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>newstyle.css"/>

<div class="setting-top row" style="margin-left: 0;">
    <div class="col-lg-6 col-lg-offset-3 top_title">
        <p>添加比赛信息</p>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight article content-margin">
    <div class="row">
        <div class="ibox">
            <div class="ibox-content">
                <form id="form" action="/CCIR_master/index.php/Admin/Contest/addContest" method="post"
                      enctype="multipart/form-data">
                    <div class="text-center article-title">

                        <!--<hr>-->
                        <!--上传图片-->
                        <div class="form-group">
                            <div class="col-lg-1 col-lg-offset-2 content-center">
                                <span class="label-name label_title">图片:</span>
                            </div>
                            <div class="col-lg-7">
                                <div class="uploadimage">
                                    <!--<a class="uploadBtn_img">-->
                                    <!--<input type="file" id="file" name="imgsrc"/>-->
                                    <!--</a>-->
                                    <!--<img src="<?php echo ($info["picurl"]); ?>" height="250" style="max-width: 500px"-->
                                         <!--id="preview"/>-->
                                    <img src="$info['imgsrc']" height="250" style="max-width: 500px"
                                         id="preview"/>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                    </div>
                    <!--<input type="text" class="hidden" value="<?php echo ($info["id"]); ?>" name="id" >-->
                    <?php if($info['picurl']): endif; ?>
                    <div class="row">
                        <div class="form-groups">
                            <label class="col-lg-2 col-lg-offset-1 control-label label_title">
                                <?php if(!empty($info['picurl'])): ?><span class="text-navy">已有图片</span><?php endif; ?>
                                <span>上传图片</span>
                            </label>
                            <div class="col-lg-7">
                                <input type="file" id="imgsrc" name="picurl" accept="image/*"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-groups">
                            <label class="col-lg-2 col-lg-offset-1 control-label label_title">是否推荐:</label>
                            <div class="col-lg-7">
                                <select id="isrecommend" name="isrecommend" required>
                                    <option value="">请选择</option>
                                    <option value="1"
                                    <?php if($info['isrecommend']==1){echo'selected';} ?>>推荐</option>
                                    <option value="2"
                                    <?php if($info['isrecommend']==2){echo'selected';} ?>>不推荐</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-groups">
                            <label class="col-lg-2 col-lg-offset-1 control-label label_title">比赛名称：</label>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" value="<?php echo ($info["title"]); ?>"
                                       id="input_title" name="title" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-groups">
                            <label class="col-lg-2 col-lg-offset-1 control-label label_title">比赛开始时间:</label>
                            <div class="col-lg-6">
                                <input type="date" class="new_form-control" value="<?php echo ($info["starttime"]); ?>"
                                       id="input_time_year" name="starttime" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-groups">
                            <label class="col-lg-2 col-lg-offset-1 control-label label_title">报名截止时间:</label>
                            <div class="col-lg-6">
                                <input type="date" class="new_form-control" value="<?php echo ($info["endtime"]); ?>"
                                       id="input_time" name="endtime" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-groups">
                            <label class="col-lg-2 col-lg-offset-1 control-label label_title">信息来源：</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" value="<?php echo ($info["sourcelink"]); ?>"
                                       id="sourcename" name="sourcename" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-groups">
                            <label class="col-lg-2 col-lg-offset-1 control-label label_title">报名地址:</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control"
                                       value="<?php echo ($info["sourcelink"]); ?>"
                                       id="input_sourcelink" name="sourcelink" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-groups">
                            <label class="col-lg-2 col-lg-offset-1 control-label label_title">主要类型:</label>
                            <div class="col-lg-7">
                                <select id="suit" name="suit" required>
                                    <option value="">请选择</option>
                                    <option value="1"
                                    <?php if($info['maintype']==1){echo'selected';} ?>>校内</option>
                                    <option value="2"
                                    <?php if($info['maintype']==2){echo'selected';} ?>>校外</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-groups">
                            <label class="col-lg-2 col-lg-offset-1 control-label label_title">选择比赛分类</label>
                            <div class="col-lg-7">
                                <select id="type" name="typeId" required>
                                    <option value="">请选择</option>
                                    <?php if(is_array($type)): foreach($type as $co=>$vo): ?><option value="<?php echo ($co+1); ?>"
                                        <?php if($vo['typeid']==$info['typeid']){echo 'selected';}?>
                                        ><?php echo str_repeat('-', 8*($vo['level']-1)).$vo['typename']; ?></option><?php endforeach; endif; ?>

                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-groups-2">
                            <label class="col-lg-2 col-lg-offset-1 control-label label_title">比赛简介:</label>
                            <div class="col-lg-7">
										<textarea placeholder="请填写该比赛相关简介。" class="form-control" rows="10"style="resize: none;" name="shortdesc"
                                                  id="input_shortdesc" required><?php echo ($info["shortdesc"]); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-groups-2">
                            <label class="col-lg-2 col-lg-offset-1 control-label label_title">比赛奖项描述:</label>
                            <div class="col-lg-7">
                                <textarea id="awards" placeholder="请填写该比赛的奖项信息。" name="awards"><?php echo ($info["awards"]); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-groups-2">
                            <label class="col-lg-2 col-lg-offset-1 control-label label_title">比赛内容:</label>
                            <div class="col-lg-7">
                                <textarea id="content" placeholder="请填写该比赛具体内容。" name="content"><?php echo ($info["content"]); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 70px;">
                        <div class="col-lg-3 col-lg-offset-6">
                            <input type="submit" id='sub_btn' class="btn btn-primary " value="保存" id="save">
                            <span class="save_sucess"> 保存成功</span>
                        </div>

                    </div>
                </form>
            </div>

        </div>


    </div>
</div>
<!--<script type="text/javascript" charset="utf-8" src="<?php echo (ADMIN_UEDITOR_URL); ?>/ueditor.config.js"></script>-->
<!--<script type="text/javascript" charset="utf-8" src="<?php echo (ADMIN_UEDITOR_URL); ?>/ueditor.all.min.js"> </script>-->
<!--<script type="text/javascript" charset="utf-8" src="<?php echo (ADMIN_UEDITOR_URL); ?>/lang/zh-cn/zh-cn.js"></script>-->
<!--<script type="text/javascript" src="<?php echo (ADMIN_EDITOR_URL); ?>scripts/module.js"></script>-->
<!--<script type="text/javascript" src="<?php echo (ADMIN_EDITOR_URL); ?>scripts/uploader.js"></script>-->
<!--<script type="text/javascript" src="<?php echo (ADMIN_EDITOR_URL); ?>scripts/simditor.js"></script>-->
<script type="text/javascript" charset="utf-8" src="/CCIR_master/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/CCIR_master/Public/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/CCIR_master/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
    $(document).ready(function () {
        $("#imgsrc").change(function () {
            var objUrl = getObjectURL(this.files[0]);
            if (objUrl) {
                $("#preview").attr("src", objUrl);
            }
        });

        function getObjectURL(file) {
            var url = null;
            if (window.createObjectURL != undefined) { // basic
                url = window.createObjectURL(file);
            } else if (window.URL != undefined) { // mozilla(firefox)
                url = window.URL.createObjectURL(file);
            } else if (window.webkitURL != undefined) { // webkit or chrome
                url = window.webkitURL.createObjectURL(file);
            }
            return url;
        }

//        var editor = new Simditor({
//            textarea: $('#content'),
//            toolbar: toolbar,  //工具栏
//            upload: {
//                url: "<?php echo U('upload/RoImgupload');?>", //文件上传的接口地址
//                params: null, //键值对,指定文件上传接口的额外参数,上传的时候随文件一起提交
//                fileKey: 'upload_file', //服务器端获取文件数据的参数名
//                connectionCount: 3,
//                leaveConfirm: '正在上传文件'
//            }
//        });

    });

</script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('content',{initialFrameWidth:900,initialFrameHeight:400,});
    UE.getEditor('awards',{initialFrameWidth:900,initialFrameHeight:400,});
    $(".btype").hide();
    $(".btype").eq(0).show();
    $("#atype input").click(function(){
        var i=$(this).index();
        $(".btype").hide();
        $(".btype").eq(i).show();
    });

</script>