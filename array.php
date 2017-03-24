<?php
echo "<pre>";
/**
 *  array_column  放回数组中某一列的值
 */
/*$arr = array(
    array('id'=>1,'name'=>'zhangsan'),
    array('id'=>2,'name'=>'xiaoming'),
    array('id'=>3,'name'=>'xiaohua'),
);
$data = array_column($arr,'name');
print_r($data);*/
//Array ( [0] => zhangsan [1] => xiaoming [2] => xiaohua )


/**
 *  把数组中的key当成变量 extract
 */
/*$array = array('a'=>"aa",'b'=>"bb","c"=>"cc");
extract($array);
echo "a=={$a}";
echo "b=={$b}";
echo "c=={$c}";
*/
//explode  分割字符串 已什么分割  要分割的字符串  分成几个数组
//$str = "xiaoming zhangsan xiaowang xiaoji";
//$arr = explode(' ',$str);
//把数组拼接成字符串
//print_r(implode(",",$arr));

echo $password = crypt('mypassword');


