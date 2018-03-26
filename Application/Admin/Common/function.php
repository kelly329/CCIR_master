<?php
/**
 * Created by PhpStorm.
 * User: NaDou329
 * Date: 2017/12/4
 * Time: 00:11
 */


/**
 * 拼接Ajax返回json数组
 * @param $tag 标志位
 * @param $msg 消息
 * @param $data 数据
 */
function JsonParse($tag = '0', $msg = '网络错误', $data = "")
{
    if($data){
        return array(
            'tag' => $tag,
            'msg' => $msg,
            'data' => $data,
        );
    }else{
        return array(
            'tag' => $tag,
            'msg' => $msg,
        );
    }

}




/**
 * 弹窗并跳转到上一页
 * @param string $message 提示信息
 */
function alertToBack($message)
{
    echo "<script>alert('$message');history.back();</script>";
    exit;
}


function GoToUrl($url)
{
    echo "<script>window.location.href='$url';</script>";
    exit;
}

//获取正确返回路径
function getRightUrl()
{
    $str = "";
    if (!empty($_GET['type'])) {
        $str .= '/type/' . $_GET['type'];
    }
    if (!empty($_GET['p'])) {
        $str .= '/p/' . $_GET['p'];
    }
    if (!empty($_GET['roleId'])) {
        $str .= '/roleId/' . $_GET['roleId'];
    }
    return $str;
}

/**
 * 限制字符字数
 * @param string $message 提示信息
 */
function subtext($text, $length)
{
    if (mb_strlen($text, 'utf8') > $length)
        return mb_substr($text, 0, $length, 'utf8') . '...';
    return $text;
}
/**
 * 结束时间和开始时间的获取
 * @param $yesterday 是否为昨天
 * @param $status 是否为时间戳,1是,0不是
 * @param $tag 是否要加上时分秒,昨天为0:0:0,今天为23:59:59
 */
function getDay($yesterday = false, $status = false, $tag = false)
{
    $time = time();
    if ($yesterday) {
        if ($tag) {
            $time = date('Y-m-d 0:0:0', $time - 24 * 60 * 60);
        } else {
            $time = date('Y-m-d', $time - 24 * 60 * 60);
        }
    } else {
        if ($tag) {
            $time = date('Y-m-d 23:59:59', $time);
        } else {
            $time = date('Y-m-d', $time);
        }
    }
    if ($status) {
        $time = strtotime($time);
    }
    return $time;

}


function getUserName($id)
{
    return $name = M('user')->where('userId=\'' . $id . '\'')->getField('username');
}






