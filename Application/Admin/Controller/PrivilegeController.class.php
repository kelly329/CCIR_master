<?php
/**
 * Created by PhpStorm.
 * User: NaDou329
 * Date: 2017/12/7
 * Time: 11:02
 */

namespace Admin\Controller;

use Component\Classify;//无极分类
use Think\Controller;

class PrivilegeController extends CommonController
{
    //首页
    public function privilegeList()
    {
        $priList = D('privilege')->select();
        $classify = new Classify();
        $Data = $classify->tree($priList);
        $this->assign('list', $Data);
        $this->display('Public:header');
        $this->display();
        $this->display('Public:footer');
    }

    //添加系统权限
    public function privilegeAdd()
    {
        $pri = D('privilege');
        if (IS_POST) {
            $editData['privilegeId'] = I('privilegeId');
            $editData['pid'] = I('pid');
            $editData['privilegename'] = I('privilegename');
            $editData['controller'] = I('controller');
            $editData['action'] = I('action');
            $pid = $editData['pid'];
            $pInfo = $pri->where("privilegeId={$pid}")->find();
            $plevel = $pInfo['level'];
            $editData['level'] = $plevel + 1;
            $id = $pri->add($editData);
            if ($id) {
                $this->success('添加成功！', U('privilegeList'));
            } else {
                $this->error('添加失败！');
            }
        }

        $priList = D('privilege')->select();
        $classify = new Classify();
        $Data = $classify->tree($priList);
        $this->assign('list', $Data);
        $this->display('Public/header');
        $this->display();
        $this->display('Public/footer');

    }

    //修改权限
    public function privilegeEdit()
    {
        $model = D('privilege');
        if (IS_POST) {
            $editData['privilegeId'] = I('privilegeId');
            $editData['pid'] = I('pid');
            $editData['privilegename'] = I('privilegename');
            $editData['controller'] = I('controller');
            $editData['action'] = I('action');
            $pid = $editData['pid'];
            $pInfo = $model->where("privilegeId={$pid}")->find();
            $plevel = $pInfo['level'];
            $editData['level'] = $plevel + 1;
            $result = $model->save($editData);
            if ($result) {
                $this->success('修改权限成功！', U('privilegeList'));
            } else {
                $this->error('修改权限失败');
            }

        }
        $id = I('id');
        $priList = D('privilege')->select();
        $data = D('privilege')->find($id);
        $this->assign('data', $data);
        $classify = new Classify();
        $list = $classify->tree($priList);
        $children = $classify->getAllNode($priList, $id);
        $this->assign('children', $children);
        $this->assign('list', $list);
        $this->display('Public/header');
        $this->display();
        $this->display('Public/footer');
    }

}