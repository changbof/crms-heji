<?php
	require_once("../data/function.php");
	require_once("../data/cmd.php");
	require_once("../data/db.php");

	send_no_cache_header();
	$db = new DB_MYSQL();
	$db->connect();

	$strFace = "";
	if(!empty($_FILES["fileFace"]["name"])){
		$upload_dir = "../userface/";
		$file_ext = get_file_ext($_FILES["fileFace"]["name"]);
		$file_allow = "jpg|jpeg|gif|png|";
		if(strpos($file_allow,$file_ext."|")===false){
			$strFace = "";
		}else{
			$strFace = date('YmdHi').mt_rand().'.'.$file_ext;
			if(!move_uploaded_file($_FILES["fileFace"]["tmp_name"],$upload_dir.$strFace)){
					$strFace = "";
			}
		}
	}else{
		$strFace = "";
	}
	$strOldPass  = get_safe_str($_POST["tbOldPass"]);
	$strPass = get_safe_str($_POST["tbPass"]);
	$strNick = get_safe_str($_POST["tbNick"]);
	$strSign = get_safe_str($_POST["tbSign"]);
	$intGender = get_safe_str($_POST["rdGender"]);

	$user = $db->get_One("select * from im_user where userid = ".$_SESSION["userid"]);
	if(!$user){
		$modifyResult = "Sorry，修改失败!";
		$modifyInfo = "由于某些神秘的原因，使得您的资料不完整!";
	}else{
		if(!empty($strPass)){
			if(md5($strOldPass) == $user["userpass"]){
				$db->update("im_user",array("userpass"=>md5($strPass)),"userid = ".$_SESSION["userid"]);
				$modifyInfo = "您的密码已经修改，下次请使用新密码登录!";
			}else{
				$modifyInfo = "您提供的原密码不正确，密码没有修改!";
			}
		}
		$userNew = array(
			"username" => $strNick,
			"usersign" => $strSign,
			"usergender" => $intGender
		);
		$flag = false;
		if(!empty($strFace))$userNew["userface"] = $strFace;
		if($db->update("im_user",$userNew,"userid = ".$_SESSION["userid"])){
			$modifyResult = "您的个人资料已保存!";
			$flag = true;
			UpdateUserProfile($_SESSION["userid"],$strNick,$strSign,$strFace,"");
		}else{
			$modifyResult = "Sorry，修改失败!";
			$modifyInfo = "服务器内部错误!";
		}
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/webimpage.css" type="text/css" rel="stylesheet" media="all">
<script type="text/javascript" src="../js/webimhelper.js"></script>
<script type="text/javascript" src="../js/webimpage.js"></script>
<title>编辑个人资料</title>
<script type="text/javascript">
	var uid = 10;
</script>
</head>
<body> 
<table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="85"align="center" style="font-size:16px;color:red"><?php echo($modifyResult);?></td>
  </tr>
  <tr>
    <td height="45"align="center"><?php echo($modifyInfo);?></td>
  </tr>
  <tr>
    <td height="85" align="center"><input class="button1" type="button" name="btnLogin" id="btnLogin" value="关闭" onclick="winClose(event);"/></td>
  </tr>
</table>
<?php if($flag){?>
<script type="text/javascript">
	parent._webIM.Profile.UserName = "<?php echo($strNick);?>";
	parent._webIM.Profile.UserSign = "<?php echo($strSign);?>";
	<?php if(!empty($strFace)){?>parent._webIM.Profile.UserFace = "<?php echo($strFace);?>";<?php }?>
	parent._webIM.CMD.renderMyUserInfo();
</script>
<?php } ?>
</body>
</html>