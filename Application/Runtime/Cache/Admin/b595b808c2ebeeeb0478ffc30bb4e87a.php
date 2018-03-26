<?php if (!defined('THINK_PATH')) exit();?><div class="wrapper wrapper-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 pull-left">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo ($_SESSION['username']); ?><span style="font-weight:lighter;">,欢迎您</span></h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo ($_SESSION['logintime']); ?></h1>
                        <small>登录时间</small>
                    </div>
                </div>
            </div>
        </div>