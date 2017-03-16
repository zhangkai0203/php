<?php

/**
 * Class DB
 *   单例模式   只能new 一次的类   三私一公原则
 */
 class DB{
     //实例化保存的new
     private static $instance;
     //初始化默认值
     private function __construct(){

     }
     //防止被克隆
     private function __clone(){

     }
     //判断是被实例化
     public static function getInstance(){
         if(!(self::$instance instanceof self)){
             self::$instance = new self();
         }
         return self::$instance;
     }
 }
 $db = DB::getInstance();