<?php

/**
 * Class myclass
 * 魔术方法：当一个类被当成字符串时被调用  __toString
 */
class myclass{
    public function __toString()
    {
        return "aa";
    }
}
$obj = new myclass();
echo $obj;