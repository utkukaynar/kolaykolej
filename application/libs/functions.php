<?php

function permalink($str) {
	$search = array(" ","ı","İ","ş","Ş","ü","Ü","ğ","Ğ","ö","Ö","ç","Ç");
	$replace = array("-","i","i","s","s","u","u","g","g","o","o","c","c");
	
	$str = str_replace($search, $replace, $str);
	$str = strtolower($str);
	$str = preg_replace('@[^A-Za-z0-9\-_]+@i', '', $str);
	
	return $str;
}

function commaEntity($str) {
	$str = str_replace("'", '&rsquo;', $str);
	$str = str_replace(chr(34), '&quot;', $str);
	
	return $str;
}

function arrayFlatten($arr) {
    $arr = array_values($arr);
	
    while ( list($k, $v) = each($arr) ) {
        if ( is_array($v) ) {
            array_splice($arr, $k, 1, $v);
            next($arr);
        }
    }
	
    return $arr;
}

function stripTagsDeep($value){
	return is_array($value) ? array_map('stripTagsDeep', $value) : strip_tags($value);
}

function arrayAlign($arr1) {
	$arr2 = array();
	
	foreach ($arr1 as $row) {
		$arr2[$row->id] = $row->name;
	}
	
    return $arr2;
}
