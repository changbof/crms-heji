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
	$record = $db->get_One("select * from im_user where userid = ".$_SESSION["userid"]);
	if($record){
			echo("<item>");
			get_node_str("f",$record["userface"]);
			get_node_str("id",$_SESSION["userid"]);
			get_node_str("n",$_SESSION["username"]);
			get_node_str("e",$_SESSION["useremail"]);
			get_node_str("sn",$record["usersign"]);
			get_node_str("s",$record["userstatus"]);
			get_node_str("g","");
			get_node_str("b","");
			get_node_str("cn",$_SESSION["username"]);
			get_node_str("u",$record["usergender"]);
			echo("</item>");
	}
	echo("</list>");
	
	
?>

