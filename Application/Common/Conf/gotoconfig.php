<?php
/**
 * Created by PhpStorm.
 * User: NaDou329
 * Date: 2017/10/14
 * Time: 15:20
 */
return array(
    /**
     * 日志跳转配置
     * Note: 由后台获取Controller和action然后对应的跳转链接通过键值对显示，再拼接id，进行跳转显示
     * Author: 张娜
     */
    "Goto" => array(
        'contest' => array(
            'addcontest' => SITEURL . 'Contest/addContest/',
            'editcontest' => SITEURL . 'Contest/editContest/id',
        ),
        'fuser'=>array(
            'reset' => SITEURL . 'FUser/reset/id',
            'openuser' => SITEURL . 'FUser/openuser/id',
            'colseuser'=> SITEURL . 'FUser/colseuser/id',
            'editinfo'=> SITEURL . 'FUser/editinfo/id',
        ),
        'privilege'=>array(
            'privilegeadd'=> SITEURL . 'Privilege/privilegeAdd/',
            'privilegeedit'=> SITEURL . 'Privilege/privilegeEdit/id',
        ),
        'role'=>array(
            'roleadd'=> SITEURL . 'Role/roleAdd/',
            'roleedit'=> SITEURL . 'Role/roleEdit/id',
        ),
        'system'=>array(
            'addusers'=> SITEURL . 'System/addusers/',
            'closeuser'=> SITEURL . 'System/colseuser/id',
            'openuser'=> SITEURL . 'System/openuser/id',
            'editinfo'=> SITEURL . 'System/editinfo/id',
        ),
        'type'=>array(
            'typeadd'=> SITEURL . 'Type/typeAdd/',
            'typeedit'=> SITEURL . 'Type/typeEdit/id',
            'typedel'=> SITEURL . 'Type/typeDel/id',
        ),
    )
);