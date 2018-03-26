<?php
/**
 * Created by PhpStorm.
 * User: NaDou329
 * Date: 2017/12/7
 * Time: 10:12
 */

namespace Admin\Controller;

use Think\Controller;
use Component\Classify;


class RoleController extends CommonController
{
    //首页
    public function role()
    {
        $role = M('role')->select();
        for ($i = 0; $i < count($role); $i++) {
            $role[$i]['updatetime'] = date('Y-m-d H:i:s', $role[$i]['updatetime']);
            $role[$i]['count'] = M('admin')->where('roleId=' . $role[$i]['roleid'])->count();
        }
        $this->assign('info', $role);
        $this->display('Public:header');
        $this->display();
        $this->display('Public:footer');
    }

    //添加用户角色
    public function roleAdd()
    {
        if (!empty($_POST)) {
            $con['privilege'] = implode($_POST['pri'], ',');
            $con['rolename'] = $_POST['rolename'];
            $con['updatetime'] = time();
            if (M('role')->add($con) || M('role')->add($con) === 0) {
                alertToUrl(__CONTROLLER__ / role, '角色修改成功，将会在下次进入系统生效');

            } else {
                alertBack("角色修改失败");
            }
        } else {
            $priList = D('privilege')->select();
            $classify = new Classify();
            $Data = $classify->tree($priList);
            $this->assign('priList', $Data);
            $this->display('Public/header');
            $this->display();
            $this->display('Public/footer');
        }
    }

    //编辑角色权限
    public function roleEdit()
    {
        if (!empty($_POST)) {
            $con['privilege'] = implode($_POST['pri'], ',');
            $con['roleId'] = $_GET['id'];
            $con['rolename'] = $_POST['rolename'];
            $con['updatetime'] = time();
            if (M('role')->save($con) || M('role')->save($con) === 0) {
                alertToUrl(__ACTION__ . '/id/' . $_GET['id'], '角色修改成功,将会在下次进入系统时生效');
            } else {
                alertToBack('角色修改失败');
            }
        } else {
            $priList = D('privilege')->select();
            $info = D('role')->find($_GET['id']);
            $classify = new Classify();
            $Data = $classify->tree($priList);
            $this->assign('priList', $Data);
            $this->assign('info', $info);
            $this->display('Public/header');
            $this->display();
            $this->display('Public/footer');
        }
    }
}