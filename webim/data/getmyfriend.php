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
	$records = $db->get_all("select a.isblocked,a.groupid as gid,a.customname as cname,b.* from im_userfriend a inner join im_user b on a.friendid = b.userid where a.userid = ".$_SESSION["userid"]);
	if(count($records)>0){
		foreach($records as $record){
			echo("<item>");
			get_node_str("f",$record["userface"]);
			get_node_str("id",$record["userid"]);
			get_node_str("n",$record["username"]);
			get_node_str("e",$record["useremail"]);
			get_node_str("sn",$record["usersign"]);
			get_node_str("s",$record["userstatus"]);
			get_node_str("g",$record["gid"]);
			get_node_str("b",$record["isblocked"]);
			get_node_str("cn",$record["cname"]);
			get_node_str("u",$record["usergender"]);
			echo("</item>");
		}
	}
	echo("</list>");
	
?>