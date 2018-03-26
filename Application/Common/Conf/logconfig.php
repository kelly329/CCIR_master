<?php
/**
 * Created by PhpStorm.
 * User: NaDou329
 * Date: 2017/10/13
 * Time: 20:08
 * Note: 需要连接的日志配置
 */
return array(
    /**
     * 日志配置系统
     * Note:筛选需要记录的控制器-方法
     * Author:张娜
     * @fix 张娜 20171220 完成日志的配置
     */
    'WriteLog'=>array(
        //'控制器'=>方法 lowercase 小写
        'user' =>array('checklogin','logout'),
        'contest'=>array(
            'addcontest',
            'editcontest',
        ),
        'fuser'=>array(
            'reset',
            'openuser',
            'colseuser',
            'editinfo'
        ),
        'privilege'=>array(
            'privilegeadd',
            'privilegeedit'
        ),
        'role'=>array(
            'roleadd',
            'roleedit'
        ),
        'system'=>array(
            'addusers',
            'closeuser',
            'openuser',
            'editinfo'
        ),
        'type'=>array(
            'typeadd',
            'typeedit',
            'typedel'
        ),
    ),

    /**
     * 日志记录组件的中文翻译
     * Note: 通过记录的的控制器-方法的配对来显示相应的中文名称
     * Author: 张娜
     * @fix 张娜 20171220 完成日志的配置
     */
    'user' =>array('checklogin'=>'登录','logout'=>'退出登录'),
    'contest'=>array(
        'addcontest'=>'添加比赛',
        'editcontest'=>'编辑比赛',
    ),
    'fuser'=>array(
        'reset'=>'重置密码',
        'openuser'=>'激活前端用户',
        'colseuser'=>'禁用前端用户',
        'editinfo'=>'编辑前端用户'
    ),
    'privilege'=>array(
        'privilegeadd'=>'添加权限',
        'privilegeedit'=>'编辑权限'
    ),
    'role'=>array(
        'roleadd'=>'添加角色',
        'roleedit'=>'编辑角色'
    ),
    'system'=>array(
        'addusers'=>'添加后台管理员',
        'closeuser'=>'禁用后台管理员',
        'openuser'=>'激活后台管理员',
        'editinfo'=>'修改后台管理员信息'
    ),
    'type'=>array(
        'typeadd'=>'添加比赛类型',
        'typeedit'=>'修改比赛类型',
        'typedel'=>'删除比赛类型'
    ),

);