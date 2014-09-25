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
	$records = $db->get_all("select * from im_usergroup where userid = -1 or userid = ".$_SESSION["userid"]);
	if(count($records)>0){
		foreach($records as $record){
			echo("<item>");
			get_node_str("Name",$record["groupname"]);
			get_node_str("ID",$record["id"]);
			echo("</item>");
		}
	}
	echo("</list>");
	
	
?>