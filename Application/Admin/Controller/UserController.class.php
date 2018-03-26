<?php

namespace Admin\Controller;

use Think\Controller;
use Think\Verify;

class UserController extends Controller
{
    //验证码
    public function code()
    {
        ob_clean();
        $config = array(
            'useCurve' => false,            // 是否画混淆曲线
            'useNoise' => true,            // 是否添加杂点
            'length' => 3,               // 验证码位数
            'fontSize' => 18,              // 验证码字体大小(px)
            'imageH' => 35,               // 验证码图片高度
            'imageW' => 150,               // 验证码图片宽度
            'fontttf' => '5.ttf'  //验证码字体库
        );
        $verify = new Verify($config);
        $verify->entry();
    }

    //登录
    public function login()
    {
        $this->display();
    }

    //登录测试
    public function index()
    {
        $this->display();
    }


    //退出登录
    public function logout()
    {
        WriteLog("");
        session('id', null);
        session('username', null);
        session('logintime', null);
        alertToUrl(__CONTROLLER__ . '/login', '退出成功');
    }

    //保存用户信息
    public function saveuser()
    {
        $res['tag'] = 1;
        if (IS_POST) {
            $con['adminId'] = $_SESSION['id'];
            $con['username'] = $_POST['username'];
            if (!empty($_POST['password'])) {
                $con['password'] = $_POST['password'];
            }
            $result = M('admin')->save($con);
            if (false !== $result || 0 !== $result) {
                $res = JsonParse('0', '成功');
                $_SESSION['username'] = $con['username'];
            }
        }
        $this->ajaxReturn($res);
    }

    //判断是否可以登录
    public function checkLogin()
    {
        if (!empty($_POST)) {
            $verify = new Verify();
            if ($verify->check($_POST['code'])) {
                $flag = D('User')->checkuser($_POST['username'], md5($_POST['password']));
                switch ($flag) {
                    case 3:
                        WriteLog();
                        $this->success('登录成功！', U("Index/index"));
                        break;
                    case 2:
                        $this->error('该用户未激活，请联系超级管理员！', U("User/login"));
                        break;
                    case 4:
                        $this->error('网络错误，请重试！', U("User/login"));
                        break;
                    default:
                        $this->error('用户名或密码错误！', U("User/login"));
                        break;
                }

            } else {
                $this->error('验证码错误！', U("User/login"));
            }
        }
    }

}