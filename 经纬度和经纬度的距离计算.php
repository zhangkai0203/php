<?php


/**
 *  经纬度和经纬度的距离计算
 *  1公里=1000米,1里=500米.
 * @param $lat1         经度
 * @param $lng1         纬度
 * @param $lat2         经度
 * @param $lng2         纬度
 * @param bool $miles   是否转换成米
 * @param float $r      平均地球半径
 * @return float        返回距离
 */
function distance($lat1, $lng1, $lat2, $lng2, $miles = true,$r = 6372.797){
	$pi80 = M_PI / 180;
	$lat1 *= $pi80;
	$lng1 *= $pi80;
	$lat2 *= $pi80;
	$lng2 *= $pi80;
	$dlat = $lat2 - $lat1;
	$dlng = $lng2 - $lng1;
	$a = sin($dlat/2)*sin($dlat/2)+cos($lat1)*cos($lat2)*sin($dlng/2)*sin($dlng/2);
	$c = 2 * atan2(sqrt($a), sqrt(1 - $a));
	$km = $r * $c;
	return ($miles ? ($km * 1000) : $km);
} 

echo distance('39.983540','116.387190','39.976299','116.328995');














