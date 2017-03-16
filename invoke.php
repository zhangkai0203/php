<?php

/**
 * Class myclass
 *  魔术方法：当一个类被当成方法调用的时候 __invoke 被调用
 */
class myclass{
    public function __invoke(){
         var_dump("aaa");
    }
}

$obj = new myclass();
$obj();