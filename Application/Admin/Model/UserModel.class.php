<?php
/**
 * Created by PhpStorm.
 * User: NaDou329
 * Date: 2017/12/4
 * Time: 00:41
 */
namespace Admin\Model;

use Think\Model;

class UserModel extends Model
{
    //后台用户登录判断
    public function checkuser($usrname, $pwd)
    {
        $con['username'] = $usrname;
        $con['password'] = $pwd;
        $user = M('admin')->where($con)->find();
        if ($user) {
            if ($user['iaBan']==0) {
                $data['lastime'] = time();
                $data['lastip'] = $_SERVER["REMOTE_ADDR"];
                if (M('admin')->where($con)->save($data)) {
                    $user = M('admin')->where($con)->find();
                    $logintime = date("Y-m-d H:i:s", $user['lastime']);
                    session('id',$user['adminid']);
                    session('username',$usrname);
                    session('logintime',$logintime);
                    session('roleid',$user['roleid']);
                    $this->getpri($user['roleid']);
                    return 3;//登陆成功
                } else {
                    return 4;//session写入错误
                }
            } else {
                return 2;//该用户未激活,请联系超级管理员
            }
        } else {
            return 1;//该用户不存在
        }
    }
    //获得用户权限并存入缓存
    public function getpri($roleid){
        $role=D('role');
        $pri=D('privilege');
        $role->field('rolename,privilege')->find($roleid);
        session('rolename',$role->rolename);
        if($role->privilege=='*'){
            session('privilege','*');
            $menu=$pri->where("pid=0")->select();
            foreach ($menu as $k => $v) {
                $menu[$k]['sub']=$pri->where('pid='.$v['privilegeid'])->select();
            }
            session('menu',$menu);

        }else{
            //Admin/Admin/add,Admin/Article/add
            $pris=$pri->field('privilegeid,pid,privilegename,controller,action,CONCAT("Admin","/",controller,"/",action) url')
                ->where("privilegeid IN({$role->privilege})")->select();
            $_pris=array();
            $menu=array();
            foreach($pris as $k=>$v){
                $_pris[]=$v['url'];
                if($v['pid']==0){
                    $menu[]=$v;
                }
            }
            //登录权限的url
            session('privilege',$role->privilege);
            foreach ($menu as $k => $v) {
                foreach ($pris as $k1 => $v1) {
                    if($v1['pid']==$v['privilegeid']){
                        $menu[$k]['sub'][]=$v1;
                    }
                }
            }
            session('menu',$menu);
        }
    }
    /**
     * 检查后台用户名是否存在
     * Author:张娜
     * @param $username 用户名
     * @return boolean true 表示已经存在
     */
    public function checkusername($username)
    {
        $con['username'] = $username;
        if (M('admin')->where($con)->count("username") != 0) {
            return false;
        } else {
            return true;
        }
    }
}