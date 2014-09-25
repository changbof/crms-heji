<?php
	require_once("../data/function.php");
	require_once("../data/cmd.php");
	require_once("../data/db.php");

	send_no_cache_header();
	CheckLogin();
	$db = new DB_MYSQL();
	$db->connect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/webimpage.css" type="text/css" rel="stylesheet" media="all">
<script type="text/javascript" src="../js/webimhelper.js"></script>
<script type="text/javascript" src="../js/webimpage.js"></script>
<title>选项</title>
<script type="text/javascript">
var uid = 8;
</script>
</head>
<body> 
<?php
if($_SESSION["userpower"]>2){
	die("匿名用户无此功能！");
}
if(isset($_POST["btnSubmit"])){
	$disType = get_safe_str($_POST["rddistype"]);
	$orderType = get_safe_str($_POST["rdordertype"]);
	$chatSide = get_safe_str($_POST["rdchatside"]);
	$msgSendKey = get_safe_str($_POST["rdmsgsendkey"]);
	$msgShowTime = get_safe_str($_POST["rdmsgshowtime"]);

	$config = array(
		"distype"=> $disType,
		"ordertype"=> $orderType,
		"chatside"=> $chatSide,
		"msgsendkey"=> $msgSendKey,
		"msgshowtime"=> $msgShowTime
	);
	$db->update("im_userconfig",$config,"userid=".$_SESSION["userid"]);
	$saveResult = "保存成功!";
	$saveInfo = "部分设置需等到下次登录才能生效";
?>
<script type="text/javascript">
	parent._webIM.Config.ChatSide = parseInt("<?php echo($chatSide);?>");
	parent._webIM.Config.MsgSendKey = parseInt("<?php echo($msgSendKey);?>");
	parent._webIM.Config.MsgShowTime = parseInt("<?php echo($msgShowTime);?>");
	parent._webIM.CMD.renderMyFriend(<?php echo($orderType);?>,<?php echo($disType);?>,true);
</script>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="85" align="center" style="font-size:16px;color:red"><?php echo($saveResult);?></td>
  </tr>
  <tr>
    <td height="45" align="center"><?php echo($saveInfo);?></td>
  </tr>
  <tr>
    <td height="170"></td>
  </tr>
  <tr>
    <td height="85" align="center"><input class="button1" type="button" name="btnLogin" id="btnLogin" value="关闭" onclick="winClose(event);"/></td>
  </tr>
</table>
<?php
}else{
	$config = $db->get_One("select * from im_userconfig where userid = ".$_SESSION["userid"]);
	if(!$config){
		die("error");
	}else{
		$distype = $config["distype"];
		$ordertype = $config["ordertype"];
		$chatside = $config["chatside"];
		$msgsendkey = $config["msgsendkey"];
		$msgshowtime = $config["msgshowtime"];
?>
	<form action="option.php" method="post" name="form1" id="form1">
	<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td height="15" colspan="2"></td>
		</tr>
		<tr>
			<td height="25">&nbsp;好友列表：</td>
			<td><input name="rdordertype" type="radio" id="rdOrderType1" value="1" <?php if($ordertype==1){?> checked="checked" <?php } ?>/>
				<label for="rdOrderType1">状态排序</label>
				<input name="rdordertype" type="radio" id="rdOrderType2" value="2" <?php if($ordertype==2){?> checked="checked" <?php } ?>/>
				<label for="rdOrderType2">分组排序</label></td>
		</tr>
		<tr>
			<td width="70" height="25">&nbsp;好友列表：</td>
			<td><input name="rddistype" id="rdDisType1" type="radio" value="1" <?php if($distype==1){?> checked="checked" <?php } ?>/>
				<label for="rdDisType1">简要信息</label>
				<input name="rddistype" id="rdDisType2" type="radio" value="2" <?php if($distype==2){?> checked="checked" <?php } ?>/>
				<label for="rdDisType2">详细信息</label></td>
		</tr>
		<tr>
			<td height="25">&nbsp;聊天窗口：</td>
			<td><input name="rdchatside" type="radio" id="rdChatSide1" value="1" <?php if($chatside==1){?> checked="checked" <?php } ?>/>
				<label for="rdChatSide1">显示参与者图片</label>
				<input name="rdchatside" type="radio" id="rdChatSide2" value="2" <?php if($chatside==2){?> checked="checked" <?php } ?>/>
				<label for="rdChatSide2">隐藏参与者图片</label></td>
		</tr>
		<tr>
			<td height="25">&nbsp;聊天窗口：</td>
			<td><input name="rdmsgshowtime" type="radio" id="rdMsgShowTime1" value="1" <?php if($msgshowtime==1){?> checked="checked" <?php } ?>/>
				<label for="rdMsgShowTime1">显示消息发送时间</label>
				<input name="rdmsgshowtime" type="radio" id="rdMsgShowTime2" value="2" <?php if($msgshowtime==2){?> checked="checked" <?php } ?>/>
				<label for="rdMsgShowTime2">隐藏消息发送时间</label></td>
		</tr>
		<tr>
			<td height="25">&nbsp;聊天窗口：</td>
			<td><input name="rdmsgsendkey" type="radio" id="rdMsgSendKey1" value="1" <?php if($msgsendkey==1){?> checked="checked" <?php } ?>/>
				<label for="rdMsgSendKey1">Enter发送消息</label>
				<input name="rdmsgsendkey" type="radio" id="rdMsgSendKey2" value="2" <?php if($msgsendkey==2){?> checked="checked" <?php } ?>/>
				<label for="rdMsgSendKey2">Ctrl+Enter发送消息</label></td>
		</tr>
		<tr>
			<td height="180" colspan="2" align="center"></td>
		</tr>
		<tr>
			<td height="35" colspan="2" align="center">
					<input class="button1" type="submit" name="btnSubmit" id="btnSubmit" value="确定"/>&nbsp;&nbsp; 
					<input class="button1" type="button" name="btnCancel" id="btnCancel" onclick="winClose(event);" value="取消" /></td>
		</tr>
	</table>    
	</form>
<?php
	}
}

?>
</body>
</html>