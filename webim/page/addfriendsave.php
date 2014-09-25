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
<title>添加联系人</title>
<script type="text/javascript">
var uid = 1;
</script>
</head>
<body>
<?php
if($_SESSION["userpower"]>2){
	die("匿名用户无此功能！");
}
if(isset($_GET["email"])){
	$email = get_safe_str($_GET["email"]);
	if($email==$_SESSION["useremail"]){
		$strResult = "<span class='red'>您不能加自己为好友!</span>";
	}else{
		$toid = GetUserIdByEmail($email);
		if(""==$toid){
			$strResult = "<span class='red'>该用户不存在!</span>";
		}else{
			$tmp = $db->count("im_userfriend","id","userid = ".$_SESSION["userid"]." and friendid = ".$toid);
			if($tmp>0){
				$strResult = "<span class='red'>您已经添加过这位好友!</span>";
			}else{
				$tmp = $db->count("im_usersysmsg","id","fromid = ".$_SESSION["userid"]." and toid = ".$toid);
				if($tmp>0){
					$strResult = "<span class='red'>请耐心等待好友回复，不要重复发送!</span>";
				}else{
					$message = array(
						"fromid" => $_SESSION["userid"],
						"toid" => $toid,
						"msgcontent" => $_SESSION["useremail"],
						"typeid" => 7,
						"msgaddtime" => date("Y-m-d H:i:s")
					);
					$db->insert("im_usersysmsg",$message);
					$strResult = "发送成功，请等待验证结果!";
				}
			}
		}
	}
?>
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="180" align="center"><?php echo($strResult);?><br /><br /><br />
	<a href="javascript:location.href='<?php echo($_SERVER["HTTP_REFERER"]);?>'">←返回上页</a></td>
  </tr>
  <tr>
    <td height="85" align="center">
        <input class="button1" type="button" name="btnCancel" id="btnCancel" onclick="winClose(event);" value="关闭" /></td>
  </tr>
</table>
<?php
}
?>
</body>
</html>