<?php
/**
 * Created by PhpStorm.
 * User: Chan
 * Date: 16/12/12
 * Time: 下午3:48
 */

namespace Admin\Controller;

use Think\Controller;
use Think\Page;
use Component\Classify;//无极分类


class FuserController extends CommonController
{
    //显示前端用户列表
    public function userlist()
    {
        $num = 25;
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }
        if (!empty($_GET['username'])) {
            $con['userName'] = array('like', '%' . $_GET['username'] . '%');
        }
        $user = M('user');
        $data = $user->where($con);
        $list = $data->order('lastime desc')->page($_GET['p'], $num)->select();
        $this->assign('list', $list);// 赋值数据集
        //分页
        $count = M('user')->where($con)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $num);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page', $show);// 赋值分页输出
        $this->display('public/header');
        $this->display();
        $this->display('public/footer');

    }

    //添加老师
    public function addteachers()
    {
        if (!empty($_POST)) {
            $data['name'] = $_POST['username'];
            $data['idcard'] = $_POST['idcard'];
            $data['schoolId'] = $_POST['school'];
            switch ($_POST['sex']) {
                case '1':
                    $data['sex'] = '男';
                    break;
                case '2':
                    $data['sex'] = '女';
                    break;
            }
            if (D('user')->adduser($data, 'user_type_teacher')) {
                $userid = M('user')->where($data)->order('enrollTime desc')->getField('userId');
                WriteLog($userid);
                alertToBack('添加成功');
            } else {
                alertToBack('添加失败');
            }
        }
        $this->display('public/header');
        $this->display();
        $this->display('public/footer');
    }

    //重置密码
    public function reset()
    {
        $con['userId'] = $_GET['id'];
        $reset['password'] = sha1(md5('123123'));//默认密码
        $flag = M('user')->where($con)->save($reset);
        if ($flag || $flag === 0) {
            alertToBack('重置密码成功,密码重置为默认密码。');
        } else {
            alertToBack('网络错误');
        }
    }

    /**
     * 修改用户信息
     * Author: 张娜
     */
    public function userinfo()
    {
        $con['userId'] = $_GET['id'];
        $info = M('user')->where($con)->find();
        $typeList = D('type')->select();
        $classify = new Classify();
        $Data = $classify->typetree($typeList);
        $this->assign('type', $Data);
        $this->assign('info', $info);
        $this->display('Public/header');
        $this->display('FUser/userinfo');
        $this->display('Public/footer');

    }

    //修改用户信息
    public function editinfo()
    {
        $new['nickname'] = $_POST['nickname'];
        $con['userId'] = $_GET['id'];

        if (M('user')->where($con)->save($new) !== false) {
            alertToUrl(__CONTROLLER__ . '/userinfo/id/' . $con['userId'], '修改成功');
        } else {
            alertToBack('网路错误');
        }
    }

    /**s
     * 启用用户
     * Author: 张娜
     */
    public function openuser()
    {
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }

        $con['userId'] = $_GET['id'];
        $reset['status'] = 1;
        if (M('user')->where($con)->save($reset)) {
            alertToUrl(__CONTROLLER__ . '/userlist' . getRightUrl(), '用户已启用');
        } else {
            alertToBack('网络错误');
        }
    }

    /**
     * 禁用用户
     * Author: 张娜
     */
    public function closeuser()
    {
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }
        $con['userId'] = $_GET['id'];
        $reset['status'] = 0;
        if (M('user')->where($con)->save($reset)) {
            alertToUrl(__CONTROLLER__ . '/userlist' . getRightUrl(), '用户已禁用');
        } else {
            alertToBack('网络错误');
        }
    }

   /**
    * 用户推荐比赛管理
    */
   public function recommendlst(){
       $num = 20;
       if(!empty($_GET['type']&&$_GET['type']!=4&&$_GET['type']!=3)){
           $con['ispass']=$_GET['type'];
       }else if($_GET['type']=='3'){
           $con['ispass'] = '0';
       }
       if(!empty($_GET['title'])){
           $con['title'] = array('like','%'.$_GET['title'].'%');
       }
       if(empty($_GET['p'])){
           $_GET['p'] = 1;
       }
       $recommend = M('recommend');
       $list = $recommend->join('c_user on c_user.userId=c_recommend.userId')->where($con)->order('c_recommend.createtime desc')->limit($num)->page($_GET['p'],$num)->select();
       $this->assign('list',$list);
       $count = $recommend->join('c_user on c_user.userId=c_recommend.userId')->where($con)->count();
       $Page = new\Think\Page($count,$num);
       $show = $Page->show();
       $this->assign('page',$show);
       $this->display('Public/header');
       $this->display('FUser/recommendlst');
       $this->display('Public/footer');
   }

   /**
    * 用户推荐比赛信息详情
    */

    public function recommendetail(){
        if (IS_GET && $_GET['action']) {
            if ($_GET['action'] == 1) {
                $con['ispass'] = 1;
            } else if ($_GET['action'] == 2) {
                $con['ispass'] = 2;
            }
            M('recommend')->where("c_recommend.id=" . $_GET['id'])->save($con);
        }
        $info = M('recommend')->join('c_user on c_user.userId=c_recommend.userId')->where("c_recommend.id=" . $_GET['id'])
            ->find();
        $typed = $info['typeid'];
        $type = M('type')->where("typeId=".$typed)->find();
        $this->assign("type",$type);
        $this->assign('info',$info);
        $this->display('Public/header');
        $this->display('FUser/recommendetail');
        $this->display('Public/footer');
    }
}













