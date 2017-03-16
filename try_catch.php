<?php
/**
 *  php 捕获异常的方式
 */
$a = 1;
$b = 2;

try{
    if($a<$b){
        throw new Exception("a小于b");
    }
}catch (Exception $err){
    echo $err->getMessage();
}