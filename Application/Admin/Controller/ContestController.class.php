<?php
/**
 * Created by PhpStorm.
 * User: NaDou329
 * Date: 2017/12/4
 * Time: 12:16
 */

namespace Admin\Controller;

use Think\Controller;

use Component\Classify;//无极分类


class ContestController extends CommonController
{
    /**
     * 比赛信息展示列表页 添加筛选
     * Author: 张娜
     * Param: $_GET['type'] 比赛类型
     * Param: $_GET['title'] 比赛名称
     * Param: $_GET['p'] 列表页数 不传默认为1
     */
    public function contestlist()
    {

        $type = M('type')->select();
        $maintype = array('1', '2');
        $isrecommend = array('1', '2');
        $num = 16;
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }
        if (!empty($_GET['typeId'])) {
            $con['typeId'] = $_GET['typeId'];
        }
        if (!empty($_GET['maintype'])) {
            $con['maintype'] = $_GET['maintype'];
        }
        if(!empty($_GET['isrecommend'])){
            $con['isrecommend'] =$_GET['isrecommend'];
        }

        if (!empty($_GET['title'])) {
            $con['title'] = array('like', '%' . $_GET['title'] . '%');
            $this->assign('title', $_GET['title']);
        }
        $list = M('contest')->where($con)->limit($num)->page($_GET['p'], $num)->select();

        //分页
        $count = M('contest')->where($con)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $num);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('list', $list);
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('type', $type);
        $this->assign('maintype', $maintype);
        $this->assign('isrecommend',$isrecommend);
        $this->display('public/header');
        $this->display();
        $this->display('public/footer');
    }


    //添加比赛
    public function addContest()
    {
        $contest = D('contest');
//        dump($_POST);die;
        if (IS_POST) {
            $data['title'] = I('title');
            $data['content'] = I('content');
            $data['endtime'] = I('endtime');
            $data['starttime'] = I('starttime');
            $data['maintype'] = I('maintype');
            $data['sourcename'] = I('sourcename');
            $data['sourcelink'] = I('sourcelink');
            $data['typeId'] = I('typeId');
            $data['shortdesc'] = I('shortdesc');
            $data['awards'] = I('awards');
            $data['createtime'] = time();
            if ($_FILES['picurl']['tmp_name'] != '') {
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath = './Uploads/Contest/'; // 设置附件上传目录
                $upload->rootPath = './';
                // 上传文件
                $info = $upload->uploadOne($_FILES['picurl']);
                if (!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                } else {// 上传成功
                    $data['picurl'] = $info['savepath'] . $info['savename'];
                }
            }

            if ($contest->create($data)) {
                if ($contest->add()) {
                    $this->success('添加成功！', U('contestlist'));
                } else {
                    $this->error('添加失败！');
                }

            } else {
                $this->error($contest->getError());
            }

            return;
        }

        $typeList = D('type')->select();
        $classify = new Classify();
        $Data = $classify->typetree($typeList);
        $this->assign('type', $Data);
        $this->display('Public/header');
        $this->display();
        $this->display('Public/footer');
    }

    //比赛信息
    public function editcontest()
    {
        $contest = D('contest');
//        dump($_POST);die;
        if (IS_POST) {
            $data['contestId'] = I('contestId');
            $data['title'] = I('title');
            $data['content'] = I('content');
            $data['endtime'] = I('endtime');
            $data['starttime'] = I('starttime');
            $data['maintype'] = I('maintype');
            $data['sourcename'] = I('sourcename');
            $data['sourcelink'] = I('sourcelink');
            $data['typeId'] = I('typeId');
            $data['shortdesc'] = I('shortdesc');
            $data['awards'] = I('awards');
            $data['createtime'] = time();
            if ($_FILES['picurl']['tmp_name'] != '') {
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath = './Uploads/Contest/'; // 设置附件上传目录
                $upload->rootPath = './';
                // 上传文件
                $info = $upload->uploadOne($_FILES['picurl']);
                if (!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                } else {// 上传成功
                    $data['picurl'] = $info['savepath'] . $info['savename'];
                }
            }

            if ($contest->create($data)) {
                if ($contest->save() !== false) {
                    $this->success('修改比赛信息成功！', U('contestlist'));
                } else {
                    $this->error(' 修改比赛信息失败！');
                }

            } else {
                $this->error($contest->getError());
            }

            return;
        }

        $typeList = D('type')->select();
        $classify = new Classify();
        $Data = $classify->typetree($typeList);
        $this->assign('type', $Data);
        $con['contestId'] = $_GET['id'];
        $info = $contest->where($con)->find();
        $this->assign('info', $info);
        $typeId = $info['typeid'];
        $type = M('type')->where("typeId={$typeId}")->select();
        $this->assign('typeid', $type);
        $this->display('Public/header');
        $this->display();
        $this->display('Public/footer');
    }

    //比赛评论管理
    public function community()
    {
        $num = 25;
        if (!empty($_GET['title'])) {
            $con['title'] = array('like', "%" . $_GET['title'] . "%");
        }
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }
        //通过帖子数和点赞数来排序
        $list = M('contest')
            ->field('contestId,title,endtime,postNum as posts,thumbNumbers as \'like\'')
            ->where($con)->order('posts desc,thumbNumbers desc')->limit($num)->page($_GET['p'], $num)->select();

        $totalnum = M('comment_contest')->count();
        $this->assign('list', $list);
        //分页
        $count = M('contest')->where($con)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $num);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('totalnum', $totalnum);// 赋值分页输出
        $this->display('Public/header');
        $this->display('Contest/community');
        $this->display('Public/footer');
    }

    //比赛评论详情
    public function communication()
    {
        $num = 25;
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }
        $con['contestId'] = $_GET['id'];
        $info = M('contest')->where($con)->select();
        $list = M('comment_contest')->where($con)
            ->order('buildTime desc')->order('thumbUpNumbers desc')
            ->limit($num)->page($_GET['p'], $num)->select();
        $count = M('comment_contest')->where($con)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $num);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('info', $info[0]);
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('list', $list);

        $this->display('public/header');
        $this->display();
        $this->display('public/footer');
    }

    //删除评论
    public function deletecomment()
    {
        $con['commentId'] = $_GET['id'];
        $contestid['contestId'] = $_GET['topic'];
//        WriteLog($arr['id']=$_GET['id']);
        if (empty($_GET['page'])) {
            $p = 1;
        } else {
            $p = $_GET['page'];
        }
        $contestInfo = M('contest')->where($contestid)->find();
//        $new['checkState']='-1';
        if (M('comment_contest')->where($con)->delete()) {

            $re['postNum'] = $contestInfo['postnum'] - 1;
            M('contest')->where($contestid)->save($re);
            alertToUrl(__CONTROLLER__ . '/communication/id/' . $_GET['topic'], '删除成功');
        } else {
            alertToUrl(__CONTROLLER__ . '/communication/id/' . $_GET['topic'], '删除失败');
        }
    }

}