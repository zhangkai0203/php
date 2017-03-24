<?php

/**
 * 字符串截取功能
 * @param $str   要截取的字符串
 * @param int $start 开始位置
 * @param int $length 截取的长度
 * @param string $charset 字符类型
 * @param bool $suffix 是否有省略号
 * @return string 处理后的字符串
 */
function msubstr($str, $start=0, $length=15, $charset="utf-8", $suffix=true) {
    if(function_exists("mb_substr")) {
        return mb_substr($str, $start, $length, $charset);
    } elseif(function_exists('iconv_substr')) {
        return iconv_substr($str,$start,$length,$charset);
    }
    $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    if($suffix) {
        return $slice."…";
    }
    return $slice;
}

/**
 * 字符串查找功能
 * @param $data  查找的字符串
 * @param $str   查找的字符
 * @param int $type  查找第几次出现
 * @return int|void  放回查找的位置
 */
function get_strpos($data,$str,$type=0){
    //判断是否为空
    if(empty($str) && empty($data)){
        return;
    }
    //因为strpos查找对中文有乱码，所以使用mb_stripos
    if(function_exists("mb_stripos")){
        //不区分大小写查找
        $s= mb_stripos($data,$str,$type);
    }else{
        //不区分大小写查找
        $s =  stripos($data,$str,$type);
    }
    //判断是否查找成功
    if($s){
        return $s;
    }else{
        return;
    }
}





















