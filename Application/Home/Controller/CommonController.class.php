<?php
/**
 * Created by PhpStorm.
 * User: NaDou329
 * Date: 2018/1/4
 * Time: 14:30
 */
namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller
{
    public function __construct()
    {
        //首先判断session是否存在
        if (empty($_SESSION['userInfo'])) {
//            GoToUrl(__MODULE__ . "/user/login");
            alertToUrl(__MODULE__ . "/user/login", "还未登录，无法推荐比赛");
        }
        parent::__construct();

    }

}