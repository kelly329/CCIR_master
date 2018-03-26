<?php

namespace Admin\Controller;

use Think\Controller;


//继承此类可以判断是否登录，只有登陆用户才能访问该方法
class CommonController extends Controller
{
    public function __construct()
    {
        //首先判断session是否存在
        if (empty($_SESSION['id'])) {
            GoToUrl(__MODULE__ . "/user/login");
        } else {
            $con['adminId'] = $_SESSION['id'];
        }
        //检查用户权限
        if ($_SESSION['privilege'] != '*') {
            $authList = explode(',', $_SESSION['privilege']);
            //检查用户权限
            $acheck['controller'] = strtolower(CONTROLLER_NAME);
            $acheck['action'] = strtolower(ACTION_NAME);
            $action = M('privilege')->where($acheck)->getField('privilegeid');
            if (!empty($action)) {
                if (!in_array($action, $authList)) {
                    alertToBack("对不起,您没有相关权限。");
                }
            }
        }
        //判断方法是否存在于数组,若是则记录日志,特殊情况特殊处理
        if (in_array(strtolower(ACTION_NAME), C('WriteLog.' . strtolower(CONTROLLER_NAME)))) {
            //获取传参的值
            if (!empty($_GET['id'])) {
                $arr['id'] = $_GET['id'];
            }
            WriteLog($arr['id']);
        }
        parent::__construct();
    }
}

?>