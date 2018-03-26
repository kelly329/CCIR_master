<?php

namespace Admin\Controller;

use Think\Controller;
use Component\Classify;//无极分类

class PostController extends CommonController
{
    /**
     * 组队管理列表页
     * Author:张娜
     * History:张娜 显示所有分答 并先按评论数 再按点赞数从高到低排序
     * Param:$_GET['p'] 列表页数 不传默认为1
     * */
    public function answer()
    {
        $num = 25;
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }
        if (!empty($_GET['typeId'])) {
            $con['typeId'] = $_GET['typeId'];
        }
        if (!empty($_GET['isdone'])) {
            $con['isdone'] = $_GET['isdone'];
        }
        if (!empty($_GET['title'])) {
            $con['title'] = array('like', "%" . $_GET['title'] . "%");
        }
        //通过点赞数来排序
        $list = M('group')->join('left join c_comment_group on c_group.groupId = c_comment_group.groupId')
            ->group('c_group.groupId')
            ->where('delStatus !=-1')
            ->where($con)
            ->field('title,typeId,questionDescription as topicName,c_group.groupId,sum(c_comment_group.thumbUpNumbers) as thumbUpNumbers,isdone')
            ->order('count(c_comment_group.groupId) desc,sum(c_comment_group.thumbUpNumbers) desc')
            ->limit($num)->page($_GET['p'], $num)->select();
        for ($i = 0; $i < count($list); $i++) {
            $list[$i]['p'] = (intval($_GET['p']) - 1) * $num;
            $list[$i]['posts'] = M('comment_group')->where('groupId = \'' . $list[$i]['groupid'] . '\'')->count();
        }

        $typeList = D('type')->select();
        $classify = new Classify();
        $Data = $classify->typetree($typeList);
        $this->assign('type', $Data);

        $this->assign('list', $list);
        //分页
        $count = M('group')->where('delStatus != -1')->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $num);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page', $show);// 赋值分页输出
        $this->display('public/header');
        $this->display('Post/post');
        $this->display('public/footer');
    }

    //社区管理
    public function community()
    {
        $num = 25;
        if (!empty($_GET['bookname'])) {
            $con['name'] = array('like', "%" . $_GET['bookname'] . "%");
        }
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }
        //通过帖子数和点赞数来排序
        $list = M('forum_topic')->join('books on id = forum_topic.bookId')
            ->field('topicId,topicName,remark,postNum as posts,thumbNumbers as \'like\'')
            ->where($con)->order('posts desc,thumbNumbers desc')->limit($num)->page($_GET['p'], $num)->select();

        $totalnum = M('forum_post')->count();
        $this->assign('list', $list);
        //分页
        $count = M('forum_topic')->join('books on id = forum_topic.bookId')->where($con)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $num);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('totalnum', $totalnum);// 赋值分页输出
        $this->display('Public/header');
        $this->display('Post/community');
        $this->display('Public/footer');
    }

    //删除分答问题
    public function deleltepost()
    {
        $con['groupId'] = $_GET['id'];
//        WriteLog($arr['id'] = $_GET['id']);
        if (empty($_GET['page'])) {
            $p = 1;
        } else {
            $p = $_GET['page'];
        }
        $new['delStatus'] = '-1';
        if (M('group')->where($con)->save($new)) {
            alertToUrl(__CONTROLLER__ . '/answer/p/' . $p, '删除成功');
        } else {
            alertToUrl(__CONTROLLER__ . '/answer/p/' . $p, '删除失败');
        }
    }

    //组队回答详情
    public function postdetail()
    {
        $num = 15;
        $con['groupId'] = $_GET['id'];
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }
        if (empty($_GET['page'])) {
            $p = 1;
        } else {
            $p = $_GET['page'];
        }
        $info = M('comment_group')->join('c_group on c_group.groupId = c_comment_group.groupId')
            ->where('c_comment_group.groupId=\'' . I('get.id') . '\'')
            ->field('questionDescription,answerContent,commId,c_comment_group.thumbUpNumbers,answerTime,c_comment_group.userId')
            ->limit($num)->page($_GET['p'], $num)->select();

        $title = M('group')
            ->where('c_group.groupId=\'' . I('get.id') . '\'')
            ->field('title, questionDescription,userId,questionTime')->select();;
        $title[0]['title'] = '问题:' . $title[0]['title'];
        $this->assign('info', $info);
        $this->assign('title', $title[0]);
        $count = M('comment_group')->where($con)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $num);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page', $show);// 赋值分页输出
        $this->display('public/header');
        $this->display('Post/detail');
        $this->display('public/footer');
    }

    //删除组队回答
    public function delelteanswer()
    {
        $con['commId'] = I('get.id');
        if (empty($_GET['page'])) {
            $p = 1;
        } else {
            $p = $_GET['page'];
        }
        if (M('comment_group')->where($con)->delete()) {
            alertToUrl(__CONTROLLER__ . '/postdetail/id/' . $_GET['question'], '删除成功');
        } else {
            alertToUrl(__CONTROLLER__ . '/postdetail/id/' . $_GET['question'], '删除失败');
        }
    }


    //删除社区帖子
    public function deletecomment()
    {
        $con['postId'] = $_GET['id'];
//        WriteLog($arr['id']=$_GET['id']);
        if (empty($_GET['page'])) {
            $p = 1;
        } else {
            $p = $_GET['page'];
        }
//        $new['checkState']='-1';
        if (M('forum_post')->where($con)->delete()) {
            alertToUrl(__CONTROLLER__ . '/communication/id/' . $_GET['topic'], '删除成功');
        } else {
            alertToUrl(__CONTROLLER__ . '/communication/id/' . $_GET['topic'], '删除失败');
        }
    }

    //书本题库
    public function test()
    {
        $this->display();
    }

    //书本任务
    public function tasks()
    {
        $this->display();
    }
}