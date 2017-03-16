<?php

/**
 * Class myclass
 * 魔术方法  var_dump()时使用
 */
class myclass{
    private $name;
    public function __construct($name){
        $this->name = $name;
    }
    public function __debugInfo(){
        return ["name"=>$this->name];
    }
}
echo "<pre>";
var_dump(new myclass("xiaoming"));