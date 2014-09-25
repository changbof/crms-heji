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
	if(CheckSysCode($_SESSION["userid"],$_GET["code"])==0){
			echo("<item>");
			get_node_str("From",10000);
			get_node_str("To",$_SESSION["userid"]);
			get_node_str("Content","您被迫下线！原因：此帐号在别处登录。");
			get_node_str("Type",8);
			get_node_str("IsConfirm",0);
			get_node_str("AddTime","");
			echo("</item>");
	}else{
		CheckUserStatus();
		UpdateUserOnlineTime($_SESSION["userid"]);
		$records = $db->get_all("select * from im_usermsg where isread = 2 and toid = ".$_SESSION["userid"]." and fromid not in (select friendid from im_userfriend where isblocked = 1 and userid = ".$_SESSION["userid"].")");
		if(count($records)>0){
			foreach($records as $record){
				echo("<item>");
				get_node_str("From",$record["fromid"]);
				get_node_str("To",$_SESSION["userid"]);
				get_node_str("Content",$record["msgcontent"]);
				get_node_str("Type",$record["typeid"]);
				get_node_str("IsConfirm",$record["isconfirm"]);
				get_node_str("AddTime",$record["msgaddtime"]);
				echo("</item>");
				$db->update("im_usermsg",array("isread"=>1),"id=".$record["id"]);
			}
		}
		$db->delete("im_usersysmsg","isread=1");
		$records = $db->get_all("select * from im_usersysmsg where isread = 2 and toid = ".$_SESSION["userid"]);
		if(count($records)>0){
			foreach($records as $record){
				echo("<item>");
				get_node_str("From",$record["fromid"]);
				get_node_str("To",$_SESSION["userid"]);
				get_node_str("Content",$record["msgcontent"]);
				get_node_str("Type",$record["typeid"]);
				get_node_str("IsConfirm",$record["isconfirm"]);
				get_node_str("AddTime",$record["msgaddtime"]);
				echo("</item>");
				$db->update("im_usersysmsg",array("isread"=>1),"id=".$record["id"]);
				if($record["typeid"]==7)break;
			}
		}
	}
	echo("</list>");
	
	
?>