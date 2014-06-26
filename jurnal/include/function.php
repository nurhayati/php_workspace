<?php
class main{
	public static function coding($length){
	$var=md5(mt_rand(0,999)+date("d"));
	$code="";
	$i=0;
	while($i<$length){
		$code.=substr($var,mt_rand(0,strlen($var)-1),1);
		$i++;
	}
	return $code;
	}
}
?>