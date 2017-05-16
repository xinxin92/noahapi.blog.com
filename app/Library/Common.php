<?php
/**
 * 公共工具类
 */

namespace App\Library;

class Common {
    //获取客户端IP地址
    public static function getClientIp() {
        $ip = '';
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_CLIENTIP'])) {
            $ip = $_SERVER['HTTP_CLIENTIP'];
        } elseif (isset($_SERVER['HTTP_X_REAL_IP'])) {
            $ip = $_SERVER['HTTP_X_REAL_IP'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $pos = strpos($ip, '|');
        if ($pos) {
            $ip = substr($ip, 0, $pos);
        }
        $ip = trim($ip);
        return $ip;
    }

    //后台列表获取分页参数并处理
    public static function getPageMsg ($request=[], $size=100){
        if (isset($request['page']) && intval($request['page'])){
            $page = intval($request['page']);
        } else {
            $page = 1;
        }
        if (isset($request['page_size']) && intval($request['page_size'])){
            $pageSize = intval($request['page_size']);
        } else {
            $pageSize = $size;
        }
        //分页处理
        if ($page > 0) {
            $skip = $pageSize * ($page - 1);
        } else {
            $skip = $page;
        }
        $pageMsg['page'] = $page;
        $pageMsg['page_size'] = $pageSize;
        $pageMsg['skip'] = $skip;
        $pageMsg['limit'] = $pageSize;
        return $pageMsg;
    }

    //获取唯一订单号(32位)
    public static function createOrderNumber($params  =[]) {
        $microsecond = microtime(true) * 10000;  //获取微妙级当前时间戳
        $randomStr = str_pad(rand(0, 100000), 6, 0, STR_PAD_LEFT);  //取6位随机数，不足为以0填补
        $uniqueValue = $microsecond . $randomStr;
        if ($params) {
            foreach ($params as $param) {
                $uniqueValue = $uniqueValue.$param;
            }
        }
        return md5($uniqueValue);
    }

    // 过滤掉emoji表情
    public static function filterEmoji($str)
    {
        $str = preg_replace_callback(
            '/./u',
            function (array $match) {
                return strlen($match[0]) >= 4 ? '' : $match[0];
            },
            $str);

        return $str;
    }

}