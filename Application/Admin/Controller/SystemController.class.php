<?php
/**
 * Created by PhpStorm.
 * User: NaDou329
 * Date: 2017/12/4
 * Time: 11:25
 */

namespace Admin\Controller;

use Think\Controller;
use Think\Verify;

class SystemController extends CommonController
{
    //用户修改个人信息,页面渲染
    public function edituserinfo()
    {
        $con['adminId'] = $_SESSION['id'];
        $info = M('admin')->where($con)->find();
        $this->assign('info', $info);
        $this->display('Public/header');
        $this->display('User/userinfo');
        $this->display('Public/footer');
    }

    //后台用户界面
    public function users()
    {
        $num = 4;
        $tag = M('role')->select();
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }
        if (IS_GET || !empty($_GET['type'])) {
            if ($_GET['type'] == 1) {
                $con['isBan'] = 0;
            }
            if ($_GET['type'] == 2) {
                $con['isBan'] = 1;
            }
            if (!empty($_GET['username'])) {
                $con['username'] = array('LIKE', "%" . $_GET['username'] . "%");
            }
        }
        if (!empty($_GET['roleId'])) {
            $con['c_admin.roleId'] = $_GET['roleId'];
        }
        //分页
        $list = M('admin')->join('c_role on c_admin.roleId=c_role.roleId')->where($con)->order('lastime asc')->limit($num)->page($_GET['p'], $num)->select();
        $count = M('admin')->join('c_role on c_admin.roleId=c_role.roleId')->where($con)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $num);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('tag', $tag);
        $this->assign('list', $list);
        $this->display('Public/header');
        $this->display();
        $this->display('Public/footer');
    }

    //添加用户界面,界面显示
    public function addusr()
    {
        $tag = $tag = M('role')->field('roleId,rolename')->order('roleId')->select();
        $this->assign('role', $tag);
        $this->display('Public/header');
        $this->display('System/usrbase');
        $this->display('Public/footer');
    }

    //添加用户执行方法
    public function addusers()
    {
        $res = JsonParse('1', '用户添加失败。');
        if (IS_POST) {
            $con['username'] = $_POST['username'];
            $con['nickname'] = $_POST['nickname'];
            $con['password'] = md5($_POST['password']);
            $con['roleId'] = $_POST['roleId'];
            $con['enrolltime'] = time();
            if (!D('User')->checkusername($con['username'])) {
                $res = JsonParse('2', '用户名已存在,请重新输入。');
            } else {
                if (M('admin')->add($con)) {
                    $data['username'] = $_POST['username'];
                    $id = M('admin')->where($data)->getField('adminid');
//                    WriteLog($id);
                    $res = JsonParse('0', '用户添加成功');
                }
            }
        }
        $this->ajaxReturn($res);
    }

    //禁用后台管理员
    public function closeuser()
    {
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }
        if (empty($_GET['type'])) {
            $_GET['type'] = 0;
        }
        $con['adminId'] = $_GET['id'];
        $reset['isBan'] = 1;
        if (M('admin')->where($con)->save($reset)) {
            alertToUrl(__CONTROLLER__ . '/users' . getRightUrl(), '用户已禁用');
        } else {
            alertToBack('网络错误');
        }
    }

    //启用后台管理员
    public function openuser()
    {
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }
        if (empty($_GET['type'])) {
            $_GET['type'] = 0;
        }
        $con['adminId'] = $_GET['id'];
        $reset['isBan'] = 0;
        if (M('admin')->where($con)->save($reset)) {
            alertToUrl(__CONTROLLER__ . '/users' . getRightUrl(), '用户已启用');
        } else {
            alertToBack('网络错误');
        }
    }

    //管理员或年级管理员修改用户权限
    public function userinfo()
    {
        $con['adminId'] = $_GET['id'];
        $tag = M('role')->field('roleid,rolename')->where($con)->order('roleid')->select();
        $info = M('admin')->where($con)->find();
        $this->assign('info', $info);
        $this->assign('role', $tag);//角色列表
        $this->display('Public/header');
        $this->display('System/usrinfo');
        $this->display('Public/footer');
    }

    //修改用户信息,修改后台用户信息,非本人操作
    public function editinfo()
    {
        $admin = M('admin');
        if (IS_POST) {
            $data['adminId'] = I('adminid');
            $data['nickname'] = I('nickname');
            $data['username'] = I('username');
            $data['roleId'] = I('roleid');
            if ($admin->create($data)) {
                if ($admin->save()) {
                    alertToUrl(__CONTROLLER__ . '/users' . getRightUrl(), '修改用户信息成功');
//            WriteLog($_POST['id']);
                } else {
                    alertToBack('网络错误');
                }
            } else {
                $this->error($admin->getError());
            }
            return;
        }

    }

    //意见反馈
    public function opinion()
    {
        $num = 25;
        if (!empty($_GET['type']) && $_GET['type'] != 4 && $_GET['type'] != 3) {
            $con['tag'] = $_GET['type'];
        } else if ($_GET['type'] == '3') {
            $con['tag'] = '0';
        }
        if (!empty($_GET['username'])) {
            $con['userName'] = array('like', '%' . $_GET['username'] . '%');
        }
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }

        $list = M('feedback')->alias('a')->join('c_user b on b.userId=a.userId')->where($con)->order('id desc')
            ->field('a.id,a.userId,username,content,a.time,tag')->limit($num)->page($_GET['p'], $num)->select();

        for ($i = 0; $i < count($list); $i++) {
            $list[$i]['p'] = (intval($_GET['p']) - 1) * $num;
        }
        $this->assign('list', $list);// 赋值数据集
        //分页
        $count = M('feedback')->alias('a')->join(' c_user on c_user.userId=a.userId')->where($con)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $num);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page', $show);// 赋值分页输出
        $this->display('Public/header');
        $this->display();
        $this->display('Public/footer');
    }

    //意见反馈细节
    public function opiniondetail()
    {
        if (IS_GET && $_GET['action']) {
            if ($_GET['action'] == 1) {
                $con['tag'] = 1;
            } else if ($_GET['action'] == 2) {
                $con['tag'] = 2;
            }
            M('feedback')->where("c_feedback.id=" . $_GET['id'])->save($con);
        }
        $info = M('feedback')->join('c_user on c_user.userId=c_feedback.userId')
            ->where("c_feedback.id=" . $_GET['id'])
            ->field('c_feedback.id,c_feedback.userId,username,contact,content,c_feedback.time,tag')->select();
        $user_comment = M('feedback_answer')->join('c_user on c_user.userId=c_feedback_answer.userId')
            ->where("feedbackId=" . I('get.id') . ' and c_feedback_answer.role = 0')
            ->field('aid,username,content,c_feedback_answer.time,c_feedback_answer.role')->select();
        $edmin_comment = M('feedback_answer')->join(' c_admin on adminId=c_feedback_answer.userId')
            ->where("feedbackId=" . I('get.id') . ' and c_feedback_answer.role = 1')
            ->field('aid,username,content,c_feedback_answer.time,c_feedback_answer.role')->select();
        $this->assign('info', $info[0]);
        $this->assign('comment', array_merge($edmin_comment, $user_comment));//数组合并
        $this->display('Public/header');
        $this->display();
        $this->display('Public/footer');
    }

    //管理员回复意见反馈
    public function comment()
    {
        if (I('post.comment')) {
            $con['content'] = I('post.comment');
            $con['feedbackId'] = I('get.id');
            $con['userid'] = session('id');
            $con['time'] = time();
            $con['role'] = 1;
            $tag = M('feedback_answer')->add($con);
            if ($tag) {
                alertToUrl(__CONTROLLER__ . '/opiniondetail/id/' . $con['feedbackId'], '回复成功');
            } else {
                alertToUrl(__CONTROLLER__ . '/opiniondetail/id/' . $con['feedbackId'], '回复失败,请稍后再试');
            }
        }
    }


    /**
     * @date 20171112
     * @auth 张娜
     * @desc 查看日志记录
     * @fix  张娜 20171220 完善功能
     */
    public function reviewLogs()
    {
        $con = [];
        if (empty(I('page'))) {
            $pages = 1;
        } else {
            $pages = I('page');
        }
        $pagenum = 25;
        $offset = ($pages - 1) * $pagenum;
        if (!empty($_GET['startime']) || !empty($_GET['endtime'])) {
            $start = !empty($_GET['startime']) ? strtotime($_GET['startime']) : "0";
            $end = !empty($_GET['endtime']) ? strtotime(date('Y-m-d 23:59:59', strtotime($_GET['endtime']))) : time();
            $con['time'] = array(array('gt', $start), array('lt', $end));
        } else {
            $_GET['startime'] = getDay(1);
            $start = getDay(1, 1, 1);//昨天,时间戳,0时开始
            $_GET['endtime'] = getDay();
            $end = getDay(0, 1, 1);//今天,时间戳,0时结束
            $con['time'] = array(array('gt', $start), array('lt', $end));
        }
        $account = I('username');
        if (!empty($account)) {
            $con['username'] = array('like', '%' . $account . '%');
        }

        $Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化ip分类
//        $roleId = $this->roleId;
        $roleId = $_SESSION['roleid'];
        //显示系统角色权限,用户只能看到自己权限下的日志记录。
        if (!empty($roleId)) {
            switch ($roleId) {
                //现在超级管理员角色id为10之后数据更新后再进行修改
                case '10':
                    break;//超级管理员可以所有人
                //其他待定角色待定
                //现在就是看超级管理员之外的
                default:
                    $con['roleId'] = array('neq', '10');
                    break;//除了超级管理员外不能看到日志
            }
        }
        $log = M('log');
        $info = $log->alias('a')->join('c_admin b on a.userid=b.adminid')
            ->where($con)->order('time desc')->limit($offset, $pagenum)
            ->field('logid as id,username,time,c,a,ip')->select();
        if (!empty($info)) {
            foreach ($info as $key => $val) {
                $info[$key]['page'] = (intval($pages) - 1) * $pagenum;//为了序号的分页
                //获取某个ip地址所在位置
                $ip_info = $Ip->getlocation($info[$key]['ip']);
                $info[$key]['city'] = $ip_info['country'];
            }

        }
        $this->assign('list', $info);

        $count = M('log')->alias('a')->join('c_admin b on a.userId=b.adminId')->where($con)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $pagenum);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page', $show);// 赋值分页输出
        $this->display('Public/header');
        $this->display();
        $this->display('Public/footer');
    }

    /**
     * @date 20171112
     * @auth 张娜
     * @desc 查看日志记录详情
     * @fix  张娜 20171220 整体优化代码
     */
    public function logdetail()
    {
        $Ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化ip分类
        $role = $_SESSION['roleid'];
        $id = I('id');
        if (!empty($role) && !empty($id)) {
            $con['logId'] = $id;
            switch ($role) {
                //TODO 根据角色判断权限问题
                case '10':
                    break;//超级管理员可以所有人
                //其他待定角色待定
                default:
                    $con['roleId'] = array('neq', '10');
                    break;//除了超级管理员外不能看到日志
            }
        }
        //获取当前日志的人员名单。
        $log = M('log');
        $log_role = $log->alias('a')->join('c_admin b on a.userId=b.adminId')->where($con)->getField('roleId');
        if ($log_role) {
            $info = $log->alias('a')->join('c_admin b on a.userId=b.adminId')
                ->join('c_role  c on b.roleId=c.roleId')
                ->where($con)->order('time desc')
                ->find();
        }
        if (!empty($info)) {
            $ip_info = $Ip->getlocation($info['ip']);
            $info['city'] = $ip_info['country'];
            $info['agent'] = getOS($info['agent']) . " - " . get_client_browser($info['agent'], " - ");
        } else {
            alertToBack('日志不存在');
        }
        $this->assign("info", $info);
        $this->display('Public/header');
        $this->display();
        $this->display('Public/footer');
    }


    //公告列表页
    public function newlist()
    {
//        //判断是否显示发布区域,只有超级管理员和管理员才能发布
//        $tag = $_SESSION['edminInfo']['role'];
//        if ($tag == 1 || $tag == 2) {
//            $flag = 1;
//        }
//        $con['isDone'] = 1;
//        if ($_GET['type']) {
//            $con['tag'] = $_GET['type'];
//        }
//        if (!empty($_SESSION['edminInfo']['school'])) {
//            $con['schoolId'] = array('like', array('%' . $_SESSION['edminInfo']['school'] . '%','1'),'OR');//用tp的写法，学校管理员可以看到全局的公告
//        }
//        $where = " endtime > " . time() . " or endtime =0";
//        $order = 'level desc,time desc';
//        if (!empty($_GET['order'])) {
//            switch ($_GET['order']) {
//                case 'outdate':
//                    $where = "endtime <" . time() . ' and endtime!=0';//忘了怎么写数组形式。。。就这样吧。。。
//                    break;
//                case 'time':
//                    $order = "time desc";
//                    break;
//                case 'level':
//                    $order = "level desc";
//                    break;
//                case 'longterm':
//                    $where = "endtime =0";
//                    break;
//            }
//        }
//        $type = M('system_variables')->where("type='edmin_news_type'")->select();
//        $list = M('edmin_news')->join('system_variables on id = tag')->where($where)->where($con)->order($order)->select();
//        $title = array('title' => '系统公告专区', 'subtitle' => '查看所有系统消息。', 'tag' => '0');
//        $this->assign('title', $title);
//        $this->assign('type', $type);
//        $this->assign('flag', $flag);
//        $this->assign('list', $list);
        $this->display('Public/header');
        $this->display();
        $this->display('Public/footer');
    }


}