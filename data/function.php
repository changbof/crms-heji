<?php
session_start();
date_default_timezone_set("Asia/Shanghai");

function get_file_ext($file_name){
	$extend =explode("." , $file_name);
	$va=count($extend)-1;
	return $extend[$va];
} 

function send_no_cache_header(){
	header ("Content-Type:text/html; charset=UTF-8");
	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header ("Last-Modified: ". gmdate ("D, d M Y H:i:s") . "GMT");
	header ("Cache-Control: no-store, no-cache, must-revalidate");
	header ("Cache-Control: post-check=0, pre-check=0", false );
	header ("Pragma: no-cache");
}

function get_safe_str($str){
	return htmlspecialchars(trim($str));
}
function escapeString($str){
    return mysql_escape_string($str); 
}
function get_node_str($key,$value){
	echo("<".$key.">");
	if(trim($value)!=""){
		echo ($value);
	}
	echo("</".$key.">");
}
?>