<?php
namespace Home\Controller;
use Think\Controller;
use Component\Classify;
class IndexController extends Controller {

    public function index(){
        if(!empty($_GET['typeId'])){
            $con['typeId'] = $_GET['typeId'];
        } else{
            $con = 1;
        }
        $type = M("type")->limit(9)->select();
        $where['userId'] = $_SESSION['userInfo']['userId'];
        $userinfo = M('user')->where($where)->find();
        $contest = M('contest');
//        $contestInfo = $contest->join('c_type on c_contest.typeId=c_type.typeId')
//            ->limit(2)->order('createtime desc')->select();
        $contestInfo = $contest->where($con)->limit(2)->order('createtime desc')->select();
        foreach ($contestInfo as $item){
            $id = $item['typeid'];
            $types = M('type')->where("typeId={$id}")->find();
            $item['typename'] = $types['typename'];
            $result[] = $item;
        }
        $hotinfo = $contest->order('thumbUpNumbers desc')->order('postNum desc')->limit(2)->select();
        $classify = new Classify();
        $typelst = M('type')->select();
        $Data = $classify->typetree($typelst);
        $this->assign('list',$Data);
        $this->assign('type',$type);
        $this->assign('hotinfo',$hotinfo);
        $this->assign('userinfo',$userinfo);
        $this->assign('contestInfo',$result);
        $this->display();
    }
}