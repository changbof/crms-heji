<?php
	require_once("function.php");
	require_once("cmd.php");
	require_once("db.php");

	send_no_cache_header();
	CheckLogin();
	$db = new DB_MYSQL();
	$db->connect();

	header('Content-Type: text/xml'); 
	echo('<?xml version="1.0" encoding="utf-8"?>');
	echo("<list>");
	$record = $db->get_One("select a.*,b.userpower from im_userconfig a inner join im_user b on a.userid = b.userid where a.userid=".$_SESSION["userid"]);
	if($record){
		echo("<item>");
		get_node_str("DisType",$record["distype"]);
		get_node_str("OrderType",$record["ordertype"]);
		get_node_str("ChatSide",$record["chatside"]);
		get_node_str("MsgSendKey",$record["msgsendkey"]);
		get_node_str("MsgShowTime",$record["msgshowtime"]);
		get_node_str("UserPower",$record["userpower"]);
		echo("</item>");
	}
	echo("</list>");
	
	
?>