<?php

namespace Home\Controller;

use Think\Controller;
use Think\Controller\RestController;

class UserController extends RestController
{

    //登录
    public function login()
    {
        $this->display();
    }

    //登录验证
    public function checkLogin()
    {
        if (!empty($_POST)) {
            $flag = D('User')->checkuser($_POST['username'], md5($_POST['password']));
            switch ($flag) {
                case 3:
                    $this->success('登录成功！', U("Index/index"));
                    break;
                case 2:
                    $this->error('该用户未激活，请联系管理员！', U("User/login"));
                    break;
                case 4:
                    $this->error('网络错误，请重试！', U("User/login"));
                    break;
                default:
                    $this->error('用户名或密码错误！', U("User/login"));
                    break;
            }

        }
    }
    //退出登录
    public function logout()
    {
        session('userInfo', null);
        alertToUrl(__MODULE__ . "/index/index", "退出登录成功");
    }

    //注册用户
    public function register(){
        $user = M('user');
        if($_POST){
            $data['userName'] = I('username');
            $data['email'] = I('email');
            $data['password'] = md5(I('password'));
            $data['createTime'] = time();
            if ($user->create($data)) {
                if ($user->add()) {
                    alertToUrl(__MODULE__ . "/User/login", "注册成功");
                } else {
                    alertToUrl(__MODULE__ . "/User/register", "注册失败！");
                }

            } else {
                $this->error($user->getError());
            }

            return;
        }
        $this->display();
    }
    public function personal(){

        $this->display();
    }

    /**
     * 获取关注用户
     */
    public function followUser(){
        $userId = $_SESSION['userInfo']['userId'];
        //测试
        //$userId = 1
        $followId = I('get.id');
        if($followId==null || $followId==''){
            $resp = ['errcode'=>'404','msg'=>'未找到用户'];
            $this->response($resp,'json');
        }
        if(!M('user')->where('userId='.$followId)->find()){
            $resp = ['errcode'=>'404','msg'=>'未找到用户'];
            $this->response($resp,'json');
        }
        $arr = [
            'userId'=>$userId,
            'followUserId'=>$followId
        ];
        if (M('relation')->where($arr)->find()){
            $resp = ['errcode'=>'500','msg'=>'请勿重复关注用户'];
            $this->response($resp,'json');
        }
        if(M('relation')->add($arr)){
            $resp = ['errcode'=>'200','msg'=>'已关注'];
            $this->response($resp,'json');
        }else{
            $resp = ['errcode'=>'500','msg'=>'未知错误'];
            $this->response($resp,'json');
        }

    }
    /**
     * 取消关注用户
     */
    public function unfollowUser(){
        $userId = $_SESSION['userInfo']['userId'];
        //测试
        //$userId = 1
        $followId = I('get.id');
        if($followId==null || $followId==''){
            $resp = ['errcode'=>'404','msg'=>'未找到用户'];
            $this->response($resp,'json');
        }
        if(!M('user')->where('userId='.$followId)->find()){
            $resp = ['errcode'=>'404','msg'=>'未找到用户'];
            $this->response($resp,'json');
        }
        $arr = [
            'userId'=>$userId,
            'followUserId'=>$followId
        ];
        if (!M('relation')->where($arr)->find()){
            $resp = ['errcode'=>'500','msg'=>'你还没有关注Ta哟'];
            $this->response($resp,'json');
        }
        if(M('relation')->where($arr)->delete()){
            $resp = ['errcode'=>'200','msg'=>'已取消关注'];
            $this->response($resp,'json');
        }else{
            $resp = ['errcode'=>'500','msg'=>'未知错误'];
            $this->response($resp,'json');
        }

    }
    /**
     * 获取好友列表
     */
    public function  getFriendList(){
        //$userId = $_SESSION['userInfo']['userId'];
        $userId = 1;
        $type = $_GET['type'];
        switch ($type){
            case 1:
                //我关注的
                $arr = [
                    'userId'=>$userId,
                ];
                break;
            case 2:
                //关注我的
                $arr = [
                    'followUserId'=>$userId,
                ];
                break;
        }
        $result =  M('relation')->where($arr)->select();
        if($result){
            for($i=0;$i<count($result);$i++){
                $result[$i]['user'] = M('user')->where(['userId'=>$result[$i]['userid']])->field('userId,nickname,image')->find();
                $result[$i]['follow'] = M('user')->where(['userId'=>$result[$i]['followuserid']])->field('userId,nickname,image')->find();
            }
            $resp = ['errcode'=>'200','msg'=>'ok','data'=>$result];
            $this->response($resp,'json');
        }else{
            $resp = ['errcode'=>'404','msg'=>'没有结果'];
            $this->response($resp,'json');
        }
    }

    /**
     * 获取我发布的组队
     */
    public function pushgroup(){
        //$userId = $_SESSION['userInfo']['userId'];
        $userId =1;

        //检验用户是否有效
        $User = M('user');
        $userRes = $User->where('userId=' . $userId)->find();
        if (!$userRes) {
            $response = ['msg' => '用户不存在', 'errcode' => '500'];
            $this->response($response, 'json');
            exit(0);
        }
        $group = M('group');
        $con['userId'] = $userId;
        $con['delStatus'] = 1;
        $res = $group->where($con)->select();
        $response0 = [];
        if ($res) {
            foreach ($res as $item) {
                $temp0 = M('user')->where("userId=".$userId)->find();
                $item['groupboss']['nickname'] = $temp0['nickname'];
                $item['groupboss']['headimg'] = $temp0['image'];
                array_push($response0, $item);

            }
            $count = $group->where($con)->count();
            $return['list'] = $response0;
            $return['count'] = $count;
            $response = ['msg' => 'ok',
                'errcode' => '200',
                'data' => $return];
        } else {
            $response = ['msg' => '没有数据', 'errcode' => '500',];
        }
        $this->response($response, 'json');
    }

    /**
     * 获取关注的比赛列表
     */
    public function  focusContest(){
        //$userId = $_SESSION['userInfo']['userId'];
        $userId = 1;
        //检验用户是否有效
        $User = M('user');
        $userRes = $User->where('userId=' . $userId)->find();
        if (!$userRes) {
            $response = ['msg' => '用户不存在', 'errcode' => '500'];
            $this->response($response, 'json');
            exit(0);
        }
        $result =  M('focus_contest')->where("userId=".$userId)->select();
        if($result){
            foreach($result as $item){
                $contestinfo = M('contest')->where("contestId=".$item['contestid'])->find();
                $item['contestinfo'] = $contestinfo;
                $endresult[] = $item;
            }
            $resp = ['errcode'=>'200','msg'=>'ok','data'=>$endresult];
            $this->response($resp,'json');
        }else{
            $resp = ['errcode'=>'404','msg'=>'没有结果'];
            $this->response($resp,'json');
        }
    }

    /**
     * 用户推荐比赛
     */
    public function RecommendToUser(){
        //$userId = $_SESSION['userInfo']['userId'];
        $userId = 1;
        $con['userId'] = $userId;
        $user = M('user');
        $con['delStatus'] = 1;
        //获取用户感兴趣的类型
        $userInfo = $user->where($con)->find();
        $typelist = $userInfo['typelist'];
        $itype = explode(',',$typelist);
        dump($itype);
        //获取用户发布组队的类型
        $group = M('group');
        $grouptype = $group->where("userId=".$userId)->select();
        foreach ($grouptype as $item) {
            $gtype[] = $item['typeid'];
        }
        dump($gtype);
        //或许用户关注的比赛类型
        $focus = M('focus_contest');
        $focustype = $focus->where("userId=".$userId)->select();
        dump($focustype);
        foreach ($focustype as $item) {
            $contestInfo[] = M('contest')->field('typeId')->where("contestId=".$item['contestid'])->find();
        }
        foreach ($contestInfo as $item){
            $ftype[] = $item['typeid'];
        }
        $endres = array_merge(array_merge($itype,$gtype),$ftype);
        $conttype = array_count_values($endres);
        arsort($conttype);
        $endtype =array_slice($conttype,0,3);
        dump($endtype);
        foreach ($endtype as $item){
            $contestInfo[] = M('contest')->where("typeId=".$item)->order('endtime desc,thumbNumbers desc')->limit(3)->select();
        }
        dump($contestInfo);
        $resp = ['errcode'=>'200','msg'=>'ok','data'=>$contestInfo];
        $this->response($resp,'json');
    }

}