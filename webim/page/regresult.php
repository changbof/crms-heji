<?php
	require_once("../data/function.php");
	require_once("../data/cmd.php");
	require_once("../data/db.php");

	send_no_cache_header();
	$db = new DB_MYSQL();
	$db->connect();

	$strFace = "default.gif";
	if($_FILES["fileFace"]["name"]!=""){
		$upload_dir = "../userface/";
		$file_ext = get_file_ext($_FILES["fileFace"]["name"]);
		$file_allow = "jpg|jpeg|gif|png|";
		if(strpos($file_allow,$file_ext."|")===false){
			$strFace = "default.gif";
		}else{
			$strFace = date('YmdHi').mt_rand().'.'.$file_ext;
			if(!move_uploaded_file($_FILES["fileFace"]["tmp_name"],$upload_dir.$strFace)){
					$strFace = "default.gif";
			}
		}
	}else{
		$strFace = "default.gif";
	}

	$strEmail = get_safe_str($_POST["tbEmail"]);
	$strPass = get_safe_str($_POST["tbPass"]);
	$strNick = get_safe_str($_POST["tbNick"]);
	$strSign = get_safe_str($_POST["tbSign"]);
	$intGender = get_safe_str($_POST["rdGender"]);

	$recordNum = $db->get_One("select * from im_usernum where isok = 1 order by id asc limit 1");
	if($recordNum){
		$num = $recordNum["num"];
		$db->update("im_usernum",array("isok"=>2),"num=".$num);
		$user = array(
			"username" => $strNick,
			"userpass" => md5($strPass),
			"userid" => $num,
			"useremail" => $strEmail,
			"userface" => $strFace,
			"usersign" => $strSign==""?"没有哦！":$strSign,
			"usergender" => $intGender,
			"lastonlinetime" => date("Y-m-d H:i:s")
		);
		$recordUser = $db->insert("im_user",$user);
		if($recordUser){
			$message = array(
				"fromid" => 10000,
				"toid" => $num,
				"msgcontent" => "欢迎你的注册，有什么问题请发消息就可以了哦:-D！",
				"typeid" => 1,
				"msgaddtime" => date("Y-m-d H:i:s")
			);
			$db->insert("im_usermsg",$message);

			$config = array(
				"userid" => $num,	
			);
			$db->insert("im_userconfig",$config);

			AddFriend($num,10000);
			$regResult = "恭喜你，注册成功!";
			$regInfo = "由于暂时未开通取回密码功能，请牢记自己的帐号密码!";
		}else{
			$regResult = "Sorry，注册失败!";
			$regInfo = "服务器内部错误，请稍候再试!";
		}
	}else{
			$regResult = "Sorry，注册失败!";
			$regInfo = "由于注册人数已到达测试服务器上限，暂时无法注册!";
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/webimpage.css" type="text/css" rel="stylesheet" media="all">
<script type="text/javascript" src="../js/webimhelper.js"></script>
<script type="text/javascript" src="../js/webimpage.js"></script>
<title>注册新用户</title>
<script type="text/javascript">
	var uid = 7;
</script>
</head>
<body> 
<table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="85"align="center" style="font-size:16px;color:red"><?php echo $regResult;?></td>
  </tr>
  <tr>
    <td height="45"align="center"><?php echo $regInfo;?></td>
  </tr>
  <tr>
    <td height="85" align="center"><input class="button1" type="button" name="btnLogin" id="btnLogin" value="点击此处登录" onclick="winMax(6,3);winClose(event);"/></td>
  </tr>
</table>
</body>
</html>