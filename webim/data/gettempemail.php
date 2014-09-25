<?php
	require_once("function.php");
	require_once("cmd.php");
	require_once("db.php");

	send_no_cache_header();
	$db = new DB_MYSQL();
	$db->connect();

	$record = $db->get_One("select * from im_user where userpower = 3 and userstatus = 7");
	if($record){
			echo($record["useremail"]);
	}else{
			echo("");
	}
	
	
?>
