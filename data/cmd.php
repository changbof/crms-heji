<?php
//检查是否登陆
function CheckLogin(){
	if(!isset($_SESSION["userid"])||""==$_SESSION["userid"]){
		die("请先登录！");
	}
}

//将用户最后登陆时间设置为当前时间
function UpdateUserOnlineTime($id){
	global $db;
	$db->update("im_user",array("lastonlinetime"=>date("Y-m-d H:i:s")),"userid=".$id);
}

//更改用户信息，并向该用户在线好友广播此消息
function UpdateUserProfile($id,$username,$usersign,$userface,$userstatus){
	global $db;
	$user = array();
	if(""!=$username)$user["username"] = $username;
	if(""!=$usersign)$user["usersign"] = $usersign;
	if(""!=$userface)$user["userface"] = $userface;
	if(""!=$userstatus)$user["userstatus"] = $userstatus;
	if(count($user)>0){
		$db->update("im_user",$user,"userid=".$id);
		$friends = $db->get_all("select a.*,b.userid as uid,b.userstatus from im_userfriend a inner join im_user b on a.friendid = b.userid where b.userstatus <> 7 and a.userid =".$id);
		if(count($friends)>0){
			foreach($friends as $friend){
				if(($db->count("im_usersysmsg","id","fromid = ".$id." and toid = ".$friend["uid"]." and typeid=5"))<1){
					$message = array(
						"fromid" => $id,
						"toid" => $friend["uid"],
						"msgcontent" => "",
						"typeid" => 5,
						"msgaddtime" => date("Y-m-d H:i:s")
					);
					$db->insert("im_usersysmsg",$message);
				}
			}
		}
	}
}

//将最后登陆时间在1分钟之前的用户状态设置为下线
function CheckUserStatus(){
	global $db;
	$friends = $db->get_all("select * from im_user where userstatus <> 7");
	if(count($friends)>0){
		foreach($friends as $friend){
			if(round((mktime()-strtotime($friend["lastonlinetime"]))/60)>1){
				UpdateUserProfile($friend["userid"],"","","",7);
			}
		}
	}
}

//删除好友操作
function DelFriend($fromid,$toid){
	global $db;
	if($db->count("im_userfriend","*","userid=".$fromid." and friendid = ".$toid)>0){
		$db->delete("im_userfriend","userid = ".$fromid." and friendid = ".$toid);
		$db->delete("im_userfriend","userid = ".$toid." and friendid = ".$fromid);
		ChangeFriendList($fromid,$toid,4);
	}
}

//检测是否登陆检验码
function CheckSysCode($uid,$code){
	global $db;
	$ret = 0;
	$record = $db->get_One("select syscode from im_user where userid = ".$uid);
	if($record&&$record["syscode"]==$code){
		$ret = 1;
	}
	return $ret;
}

//发送好友改变消息,t:3添加4删除
function ChangeFriendList($fromid,$toid,$t=3){
	global $db;
	$record = $db->get_One("select userstatus from im_user where userid=".$toid);
	if($record&&$record["userstatus"]<7){
			$message = array(
				"fromid" => $fromid,
				"toid" => $toid,
				"msgcontent" => "",
				"typeid" => $t,
				"msgaddtime" => date("Y-m-d H:i:s")
			);
			$db->insert("im_usersysmsg",$message);
	}
}

//添加好友操作
function AddFriend($fromid,$toid){
	global $db;
	if($db->count("im_userfriend","*","userid=".$fromid." and friendid = ".$toid)<1){
		$record1 = array(
			"userid" => $fromid,
			"friendid" => $toid,	
		);
		$record2 = array(
			"userid" => $toid,
			"friendid" => $fromid,	
		);
		$db->insert("im_userfriend",$record1);
		$db->insert("im_userfriend",$record2);
		ChangeFriendList($fromid,$toid,3);
	}
}

function GetUserIdByEmail($email){
	global $db;
	$result = $db->get_One("select userid from im_user where useremail = '".$email."'");
	if($result){
		return $result["userid"];
	}else{
		return "";
	}
}

function GetCustomNameById($fromid,$toid){
	global $db;
	$user = $db->get_One("select username from im_user where userid = ".$toid);
	$username = $user?$user["username"]:"";
	$friend = $db->get_One("select customname from im_userfriend where friendid = ".$toid." and userid = ".$fromid);
	$customname = $friend?$friend["customname"]:"";
	return !empty($customname)?$customname:$username;
}
?>