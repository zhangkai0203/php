<?php
//开始时间
echo $start = microtime();
echo "<br/>";
$sum = 0;
for($i=1;$i<10000000;$i++){
     $sum += $i;
}

echo $sum;
echo "<br/>";

echo microtime()-$start;







