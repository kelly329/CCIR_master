<?php
//自己定义的函数写到这里

/**
 * @auth 张娜 20171111
 * @param int $type
 * @return mixed
 * @desc 获取ip地址
 */
function getClientIp($type = 0)
{
    $type = $type ? 1 : 0;
    static $ip = NULL;
    if ($ip !== NULL) return $ip[$type];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $pos = array_search('unknown', $arr);
        if (false !== $pos) unset($arr[$pos]);
        $ip = trim($arr[0]);
    } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    // IP地址合法验证
    $long = sprintf("%u", ip2long($ip));
    $ip = $long ? array($ip, $long) : array('0.0.0.0', 0);
    return $ip[$type];
}

/**
 * @auth 张娜 20171111
 * @param string $data相关的id值
 * @return bool
 * @desc 写入日志
 */
function WriteLog($data = "")
{
    if (C('OPERATION_ON')) {
        $arr['userId'] = $_SESSION['id'];
        $arr['ip'] = getClientIp();
        $arr['time'] = strtotime(date("Y-m-d H:i:s"));
        //全部转换为小写以免有其他的问题
        $arr['c'] = strtolower(CONTROLLER_NAME);
        $arr['a'] = strtolower(ACTION_NAME);
        $arr['agent'] = $_SERVER['HTTP_USER_AGENT'];
        //获取传参的值
        if (!empty($data)) {
            $arr['id'] = $data;
        }
        if (M('log')->add($arr)) {
            return true;
        } else {
            \Think\Log::write(date("Y-m-d H:i:s") . $arr['c'] . '的' . $arr['a'] . '系统日志记录失败', 'WARN', true);
        }
    }
}

/**
 * @auth 张娜 20171111
 * @param $agent 客户端信息
 * @return string 操作系统
 * @desc 获取用户操作系统
 */
function getOS($agent)
{
    $agent = strtolower($agent);
    if (strpos($agent, 'windows nt')) {
        $platform = 'Windows';
    } elseif (strpos($agent, 'macintosh')) {
        $platform = 'Macintosh';
    } elseif (strpos($agent, 'ipod')) {
        $platform = 'Ipod';
    } elseif (strpos($agent, 'ipad')) {
        $platform = 'Ipad';
    } elseif (strpos($agent, 'iphone')) {
        $platform = 'Iphone';
    } elseif (strpos($agent, 'android')) {
        $platform = 'Android';
    } elseif (strpos($agent, 'unix')) {
        $platform = 'Unix';
    } elseif (strpos($agent, 'linux')) {
        $platform = 'Linux';
    } else {
        $platform = 'other';
    }
    return $platform;
}

/**
 * @auth 张娜
 * @param string $agent 客户端信息
 * @param null $glue 胶水
 * @return array|bool|string 浏览器信息
 * @desc  获取浏览器信息
 */
function get_client_browser($agent = "", $glue = null)
{
    $browser = array();
    if (empty($agent)) {
        $agent = $_SERVER['HTTP_USER_AGENT']; //获取客户端信息
    }

    /* 定义浏览器特性正则表达式 */
    $regex = array(
        'ie' => '/(MSIE) (\d+\.\d)/',
        'chrome' => '/(Chrome)\/(\d+\.\d+)/',
        'firefox' => '/(Firefox)\/(\d+\.\d+)/',
        'opera' => '/(Opera)\/(\d+\.\d+)/',
        'safari' => '/Version\/(\d+\.\d+\.\d) (Safari)/',
    );
    foreach ($regex as $type => $reg) {
        preg_match($reg, $agent, $data);
        if (!empty($data) && is_array($data)) {
            $browser = $type === 'safari' ? array($data[2], $data[1]) : array($data[1], $data[2]);
            break;
        }
    }
    return empty($browser) ? false : (is_null($glue) ? $browser : implode($glue, $browser));
}

function alertToUrl($url, $message)
{
    echo "<script>alert('$message');window.location.href='$url';</script>";
    exit;
}

//根据变量修改变量值
function valueChange($keyword, $values)
{
    $urls = __SELF__;
    if (strpos($urls, $keyword) === false) {
        //如果存在.html结尾,先把html去掉,再修改url。
        if (strpos($urls, '.html') > 0) {
            $urls = substr($urls, 0, strlen($urls) - 5);
        }
        //如果存在get参数,在get参数里面替换
        if (count(explode("?", $urls)) > 1) {
            $arr = explode("?", $urls);
            $arr[0] .= '/' . $keyword . '/' . $values;
            $urls = implode("?", $arr);
        } else {
            $urls .= '/' . $keyword . '/' . $values;
        }
    } else {
        $urls = str_replace($keyword . '/' . $_GET[$keyword], $keyword . '/' . $values, $urls);
    }
    //页码
    $parr = explode("/p/", $urls);
    if (count($parr) > 1) {
        $arr2 = explode("/", $parr[1]);
        if (count($arr2) > 1) {
            array_shift($arr2);
            $parr[1] = implode("/", $arr2);
            $parr[0] .= '/p/1';
            $urls = implode("/", $parr);
        } else {
            $parr[0] .= '/p/1';
            $urls = $parr[0];
        }
    }
    echo $urls;
}

?>
