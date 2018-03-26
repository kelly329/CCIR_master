<?php

namespace Home\Controller;

use Think\Controller;
use Think\Page;

class ContestController extends Controller
{
    public function detailContest(){
        $id = $_GET['id'];
        $contestinfo = M('contest')->join('c_type on c_contest.typeId=c_type.typeId')->where("contestId={$id}")->find();
        $this->assign('contestinfo',$contestinfo);
        $this->display("inschooldetail");
    }

    public function inContestlist(){
//        $con = [];
//        if (empty(I('page'))) {
//            $pages = 1;
//        } else {
//            $pages = I('page');
//        }
//        $pagenum = 8;
//        $offset = ($pages - 1) * $pagenum;
//        if (!empty($_GET['startime']) || !empty($_GET['endtime'])) {
//            $start = !empty($_GET['startime']) ? strtotime($_GET['startime']) : "0";
//            $end = !empty($_GET['endtime']) ? strtotime(date('Y-m-d 23:59:59', strtotime($_GET['endtime']))) : time();
//            $con['time'] = array(array('gt', $start), array('lt', $end));
//        } else {
//            $_GET['startime'] = getDay(1);
//            $start = getDay(1, 1, 1);//昨天,时间戳,0时开始
//            $_GET['endtime'] = getDay();
//            $end = getDay(0, 1, 1);//今天,时间戳,0时结束
//            $con['time'] = array(array('gt', $start), array('lt', $end));
//        }
//        $title = I('title');
//        if (!empty($account)) {
//            $con['title'] = array('like', '%' . $title . '%');
//        }
        $num = 6;
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }
        $con = [];
        $con['maintype'] = 1;
        //分页
        $list = M('contest')->where($con)->order('endtime desc')->limit($num)->page($_GET['p'], $num)->select();
        $count = M('contest')->where($con)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $num);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('list', $list);
        $this->display("inschoolist");
    }
    public function incontest(){

        $this->display("incontest");
    }

    public function offcontestdetail(){
        $id = $_GET['id'];
        $contestinfo = M('contest')->join('c_type on c_contest.typeId=c_type.typeId')->where("contestId={$id}")->find();
        $this->assign('contestinfo',$contestinfo);
        $this->display("offcontestdetail");
    }

    public function search(){
        $num = 5;
        $type = M('type');
        $types = $type->limit(6)->select();
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }
        if (!empty($_GET['title'])) {
            $con['title'] = array('LIKE', "%" . $_GET['title'] . "%");
        }
        $contest = M('contest');
        $list = $contest->where($con)->order('c_contest.endtime desc')->limit($num)->page($_GET['p'],$num)->select();
        foreach($list as $item){
            $typeInfo = $type->where("typeId=".$item['typeid'])->find();
            $item['typename'] = $typeInfo['typename'];
            $result[] = $item;
        }
        $this->assign('list',$result);
        $this->assign('types',$types);
        $count = $contest->where($con)->count();
        $Page = new\Think\Page($count,$num);
        $show = $Page->show();
        $this->assign('page',$show);
        $this->display();

    }
    public function offcontest(){
        $num = 6;
        if (empty($_GET['p'])) {
            $_GET['p'] = 1;
        }
        $type = M('type')->limit(6)->select();

        $con = [];
        $con['maintype'] = 2;
        //分页
        $list = M('contest')->where($con)->order('endtime desc')->limit($num)->page($_GET['p'], $num)->select();
        $count = M('contest')->where($con)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, $num);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page', $show);// 赋值分页输出
        $this->assign('list', $list);
        $this->assign('type',$type);
        $this->display("offcontest");
    }
    public function offschoolist(){
        $this->diaplay('offschoolist');
    }

}