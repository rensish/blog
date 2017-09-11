<?php
/*快速排序*/
$arr = array(9,2,324,34,24,9,9,10);
function quickRang($arr){
	if(!is_array($arr)) return false;
	$length = count($arr);
	if($length <= 1) return $arr;
	$left = $right = array();
	for($i=1;$i<$length;$i++){
		if($arr[$i] < $arr[0]){
			$left[] = $arr[$i];
		}else{
			$right[] = $arr[$i];
		}
	}
	$left = quickRang($left);
	$right = quickRang($right);
	return array_merge($right,array($arr[0]),$left);
}
$res = quickRang($arr);
echo '<pre>';
print_r($res);exit;