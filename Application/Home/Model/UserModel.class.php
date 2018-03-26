<?php
/**
 * Created by PhpStorm.
 * User: NaDou329
 * Date: 2017/12/4
 * Time: 00:41
 */

namespace Home\Model;

use Think\Model;

class UserModel extends Model
{
    protected $_validate = array(
        array('userName','require','用户名已存在！',1),  // 都有时间都验证
    );
    //后台用户登录判断
    public function checkuser($usrname, $pwd)
    {
        $con['userName'] = $usrname;
        $con['password'] = $pwd;
        $user = M('user')->where($con)->find();
        if ($user) {
            if ($user['status'] == 1) {
                $data['lastime'] = time();
                $data['lastip'] = $_SERVER["REMOTE_ADDR"];
                if (M('user')->where($con)->save($data)) {
                    $user = M('user')->where($con)->find();
                    $arr = array('username' => $user['username'],
                        'userId' => $user['userid'],
                        'logintime' => date("Y-m-d H:i:s", $user['lastime']),
                        'image' =>$user['image']
                    );
                    //设置session过期时间
                    session(array('name' => 'userInfo', 'expire' => time() + 0.2 * 1800));
                    session('userInfo',$arr);
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
}