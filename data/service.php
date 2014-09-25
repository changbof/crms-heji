<?php
	require_once("function.php");
	require_once("cmd.php");
	require_once("db.php");

	send_no_cache_header();
	$db = new DB_MYSQL();
	$db->connect();

	switch($_GET["t"]){
		case "0"://��¼
			$email = $_POST["email"];
			$pass = get_safe_str($_POST["pass"]);
			$us = get_safe_str($_POST["us"]);
			$num = 0;
			$rnd = 0;
			if($email =="" && $pass ==""){
				$num = 4;
			}else{
				$record = $db->get_One("select * from im_user where useremail = '".$email."'");
				if($record){
					//if($record["userpass"] == md5($pass)){ //�����crmsϵͳ�������Ѿ�md5�����ˡ�
					if($record["userpass"] == $pass){
						$_SESSION["userid"] = $record["userid"];
						$_SESSION["username"] = $record["username"];
						$_SESSION["useremail"] = $record["useremail"];
						$_SESSION["userpower"] = $record["userpower"];
						$rnd = mt_rand();
						$_SESSION["syscode"] = $rnd;
						$db->update("im_user",array("syscode"=>$rnd),"userid=".$record["userid"]);
						UpdateUserOnlineTime($record["userid"]);
						UpdateUserProfile($record["userid"],"","","",$us);
						$num = 1;
					}else{
						$num = 2;
					}
				}else{
					$num = 2;
				}
			}
			header('Content-Type: text/xml'); 
			echo('<?xml version="1.0" encoding="utf-8"?>');
			echo('<result>');
			echo("<num>".$num."</num>");
			echo("<code>".$rnd."</code>");
			echo('</result>');
		break;
		case "1"://email�Ƿ����
			$count = $db->count("im_user","*","useremail='".get_safe_str($_POST["email"])."'");
			header('Content-Type: text/xml'); 
			echo('<?xml version="1.0" encoding="utf-8"?>');
			echo('<result>');
			echo('<num>'.$count.'</num>');
			echo('</result>');
		break;
		case "2":
			UpdateUserOnlineTime($_SESSION["userid"]);
			UpdateUserProfile($_SESSION["userid"],"","","",7);
			unset($_SESSION["userid"]);
			unset($_SESSION["username"] );
			unset($_SESSION["useremail"] );
			unset($_SESSION["userpower"] );
			unset($_SESSION["syscode"] );
			//session_unset();
		case "3"://������Ϣ
			$fromid = get_safe_str($_POST["from"]);
			$toid = get_safe_str($_POST["to"]);
			$msgcontent = get_safe_str($_POST["content"]);
			$typeid = get_safe_str($_POST["type"]);
			$message = array(
				"fromid" => $fromid,
				"toid" => $toid,
				"msgcontent" => $msgcontent,
				"typeid" => $typeid,
				"msgaddtime" => date("Y-m-d H:i:s")
			);
			$db->insert("im_usermsg",$message);
		break;
		case "4"://�޸ı�������״̬
			$username = get_safe_str($_POST["username"]);
			$usersign = get_safe_str($_POST["usersign"]);
			$userface = get_safe_str($_POST["userface"]);
			$userstatus = get_safe_str($_POST["userstatus"]);
			UpdateUserProfile($_SESSION["userid"],$username,$usersign,$userface,$userstatus);
		break;
		case "5"://������Ӻ�������
			$toid = get_safe_str($_POST["to"]);
			AddFriend($_SESSION["userid"],$toid);
		break;
		case "6"://ɾ������
			if($_SESSION["userpower"]>2)die("0");
			$toid = get_safe_str($_POST["to"]);
			DelFriend($_SESSION["userid"],$toid);
		break;
		case "7"://���κ���
			if($_SESSION["userpower"]>2)die("0");
			$toid = get_safe_str($_POST["to"]);
			$isblock = get_safe_str($_POST["s"]);
			$db->update("im_userfriend",array("isblocked"=>$isblock),"userid = ".$_SESSION["userid"]." and friendid = ".$toid);
		break;
		case "8"://�޸ĺ����ǳ�
			if($_SESSION["userpower"]>2)die("0");
			$toid = get_safe_str($_POST["to"]);
			$customname = get_safe_str($_POST["n"]);
			$db->update("im_userfriend",array("customname"=>$customname),"userid = ".$_SESSION["userid"]." and friendid = ".$toid);
		break;
		case "9"://��������
			if($_SESSION["userpower"]>2)die("0");
			$groupname = get_safe_str($_POST["n"]);
			$cnt = $db->count("im_usergroup","id","groupname='".$groupname."' and (userid = -1 or userid = ".$_SESSION["userid"].")");
			if($cnt<1){
				$db->insert("im_usergroup",array("userid"=>$_SESSION["userid"],"groupname"=>$groupname));
			}
		break;
		case "10"://ɾ����
			$gid = get_safe_str($_POST["id"]);
			$db->update("im_userfriend",array("groupid"=>1),"userid = ".$_SESSION["userid"]." and groupid = ".$gid);
			$db->delete("im_usergroup","id = ".$gid." and userid = ".$_SESSION["userid"]);
		break;
		case "11"://�޸���
			$gid = get_safe_str($_POST["id"]);
			$groupname = get_safe_str($_POST["n"]);
			$db->update("im_usergroup",array("groupname"=>$groupname),"userid = ".$_SESSION["userid"]." and groupid = ".$gid);
		break;
		case "12"://�޸ĺ��ѷ���
			$id = get_safe_str($_POST["id"]);
			$gid = get_safe_str($_POST["gid"]);
			$db->update("im_userfriend",array("groupid"=>$gid),"userid = ".$_SESSION["userid"]." and friendid = ".$id);
		break;
	}
	
?>