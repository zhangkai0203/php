<?php
/**
 *   url 函数
 */

//$str = "abcd";
//base64编码字符串
//编码
//$st = base64_encode($str);
//解码
//echo base64_decode($st);

/**
 *    get_headers   获取网站相应的头部信息
 *    get_meta_tags 获取网站meta和content的信息
 */
echo "<pre>";
//$url = "http://www.youku.com";
/*print_r(get_headers($url));*/
//print_r(get_meta_tags($url));

/**
 *  http_build_query 生成url请求前的字符串
 */

$str = array(
           'name'=>'zhangsan',
           'age' =>23,
           'sex' =>'男'
);
echo $url = http_build_query($str);
//解析url放回其部分
print_r(parse_url($url));
$u = 'http://username:password@hostname/path?'.$url;
print_r(parse_url($u));

