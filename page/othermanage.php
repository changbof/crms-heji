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
<title>管理</title>
<script type="text/javascript">
var uid = 12;
</script>
</head>
<body> 
<?php
if($_SESSION["userpower"]>0)die("没有权限！");
?>
<div style="width:540px;height:15px;text-indent:6px">
	<a onclick="showLoading()" href="usermanage.php">用户管理</a>&nbsp;&nbsp;<span class="gray">系统信息</span>
</div>
<div style="float:left;width:100%;height:388px;overflow:auto;padding-top:10px">
	<ul style="line-height:150%;font-size:13px">
		<li>总注册人数：<?php echo ($db->count("im_user","id"));?>人</li>
		<li>剩余帐号数：<?php echo ($db->count("im_usernum","id","isok=1"));?>人</li>
		<li>超级管理员：<?php echo ($db->count("im_user","id","userpower=0"));?>人</li>
		<li>一般管理员：<?php echo ($db->count("im_user","id","userpower=1"));?>人</li>
		<li>匿名用户数：<?php echo ($db->count("im_user","id","userpower=3"));?>人</li>
		<li>文本消息数：<?php echo ($db->count("im_usermsg","id"));?>条</li>
		<li>系统消息数：<?php echo ($db->count("im_usersysmsg","id"));?>条</li>
		<li>自定义头像：<?php echo ($db->count("im_user","id","userface!='default.gif'"));?>个</li>
	</ul>
</div>
</body>
</html>
