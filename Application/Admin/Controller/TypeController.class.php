<?php
/**
 * Created by PhpStorm.
 * User: NaDou329
 * Date: 2017/12/8
 * Time: 09:25
 */

namespace Admin\Controller;

use Component\Classify;//无极分类
use Think\Controller;

class TypeController extends CommonController
{
    //首页
    public function typeList()
    {
        $typeList = D('type')->select();
        $classify = new Classify();
        $Data = $classify->typetree($typeList);
        $this->assign('list', $Data);
        $this->display('Public:header');
        $this->display();
        $this->display('Public:footer');
    }

    //添加系统权限
    public function typeAdd()
    {
        $pri = D('type');
        if (IS_POST) {
            $editData['typeId'] = I('typeId');
            $editData['pid'] = I('pid');
            $editData['typeName'] = I('typename');
            $pid = $editData['pid'];
            $pInfo = $pri->where("typeId={$pid}")->find();
            $plevel = $pInfo['level'];
            $editData['level'] = $plevel + 1;
            $id = $pri->add($editData);
            if ($id) {
                $this->success('添加成功！', U('typeList'));
            } else {
                $this->error('添加失败！');
            }
        }

        $priList = D('type')->select();
        $classify = new Classify();
        $Data = $classify->typetree($priList);
        $this->assign('list', $Data);
        $this->display('Public/header');
        $this->display();
        $this->display('Public/footer');

    }

    //修改权限
    public function typeEdit()
    {
        $model = D('type');
        if (IS_POST) {
            $editData['typeId'] = I('typeId');
            $editData['pid'] = I('pid');
            $editData['typeName'] = I('typename');
            $pid = $editData['pid'];
            $pInfo = $model->where("typeId={$pid}")->find();
            $plevel = $pInfo['level'];
            $editData['level'] = $plevel + 1;
            $result = $model->save($editData);
            if ($result) {
                $this->success('修改成功！', U('typeList'));
            } else {
                $this->error('修改失败');
            }

        }
        $id = I('id');
        $priList = D('type')->select();
        $data = D('type')->find($id);
        $this->assign('data', $data);
        $classify = new Classify();
        $list = $classify->typetree($priList);
        $children = $classify->getAllNode($priList, $id);
        $this->assign('children', $children);
        $this->assign('list', $list);
        $this->display('Public/header');
        $this->display();
        $this->display('Public/footer');
    }

    //删除权限
    public function typeDel()
    {
        $type = M('type');
        $typeId = I('id');
        $typeInfo = $type->where("typeId={$typeId}")->find();
        $pid = $typeInfo['pid'];
        //如果是子分类直接删除，如果是父级分类把其所有的子分类删除
        if ($pid != 0) {
            $res = $type->delete($typeId);
        } else {
            $types = $type->where("pid={$typeId}")->select();
            if (!empty($types)) {
                foreach ($types as $item) {
                    $ids[] = $item['typeid'];
                }
                array_unshift($ids, $typeId);
                $ids = implode(',', $ids);
                $res = $type->delete($ids);
            } else {
                $res = $type->delete($typeId);
            }
        }
        if ($res) {
            $this->success('删除成功！', U('typeList'));
        } else {
            $this->error('删除失败');
        }
    }

}