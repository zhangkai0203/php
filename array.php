<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/11
 * Time: 16:28
 */

$arr = array(
    array('id'=>1,'name'=>'zhangsan'),
    array('id'=>2,'name'=>'xiaoming'),
    array('id'=>3,'name'=>'xiaohua'),
);

$data = array_column($arr,'name');
print_r($data);