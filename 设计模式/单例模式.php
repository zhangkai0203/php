<?php

/**
 * Class mysql 单例模式
 */
class mysql{

    private static $_instance;

    public function __construct(){
         if(!(self::$_instance instanceof self)){
             self::$_instance = new mysqli();
         }
    }

    public function __call($name, $arguments){
        echo "禁止拷贝";
    }

}





















?>