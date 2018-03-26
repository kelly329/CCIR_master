<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录
define('APP_PATH','./Application/');
define('SITEURL','/CCIR_master/');
//define('CONTROLLER', dirname('http://' . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"]));
define('ADMIN_FONT_URL', SITEURL . 'Public/Admin/fonts/');
define('ADMIN_EDITOR_URL', SITEURL . 'Public/Admin/plugins/simditor/');//simditor编辑器
//define('ADMIN_UEDITOR_URL', SITEURL . 'Public/Admin/plugins/ueditor/');// baidu编辑器
define('WANGEDITOR',SITEURL . 'Public/Admin/plugins/wangeditor/');//wang编辑器
//define('HOST_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/');//服务器路径

//后台开发静态文件定义
define('ADMIN_CSS_URL', SITEURL . 'Public/Admin/css/');
define('ADMIN_JS_URL', SITEURL . 'Public/Admin/js/');
define('ADMIN_IMG_URL', SITEURL . 'Public/Admin/img/');
define('ADMIN_LOGIN_URL', SITEURL . 'Public/Admin/loginjs/');

//前端静态文件定义
define('HOME_CSS_URL', SITEURL . 'Public/Home/css/');
define('HOME_JS_URL', SITEURL . 'Public/Home/js/');
define('HOME_IMG_URL', SITEURL . 'Public/Home/img/');
define('HOME_HIMG_URL', SITEURL . 'Public/Home/himages/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单