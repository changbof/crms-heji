<?php
	require_once("data/function.php");
	require_once("data/db.php");
	require_once("data/cmd.php");
	send_no_cache_header();
	$db = new DB_MYSQL();
	$db->connect();
	$user_num = 50;					//帐号数量
	$admin_name = "admin";			//管理员昵称
	$admin_pass = "admin";			//管理员密码
	$admin_email = "test@test.com";	//管理员邮箱
	$default_group = "默认";			//默认分组名称
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>QGYWEBIM初始化</title>
</head>
<body> 
<h1>警告：继续操作会导致所有数据被重置！</h1>
<p>
	<span style="color:red">执行本操作前，请确保你已经完成下列操作：</span>
	<ol>
		<li>新建一个编码为utf8的数据库，如webim；</li>
		<li>导入网站根目录下的webim.sql，创建表结构；</li>
		<li>根据实际情况修改data/db.php中的数据连接配置。</u></li>
	</ol>
</p>
<p>
	本页面可以写入一些初始数据，但同时也会清空所有数据。请在使用完此页面后移除根目录下的install.php文件！
</p>
<?php
if(!isset($_GET["isok"])){
?>
<button onclick="if(confirm('真的要继续？现有数据都没了哦！')){location.href='?isok=true'}">我知道了，继续</button>
<?php }else{
	$db->delete("im_user","id>0");
	$db->delete("im_userconfig","id>0");
	$db->delete("im_userfriend","id>0");
	$db->delete("im_usergroup","id>0");
	$db->delete("im_usermsg","id>0");
	$db->delete("im_usernum","id>0");
	$db->delete("im_usersysmsg","id>0");
	for($i=0;$i<$user_num;$i++){
		$db->insert("im_usernum",array("id"=>$i+1,"num"=>10000+$i));
	}
	$db->insert("im_usergroup",array("id"=>1,"groupname"=>$default_group,"userid"=>-1));
	$user = array(
		"id" => 1,
		"username" => $admin_name,
		"userpass" => md5($admin_pass),
		"userid" => 10000,
		"useremail" => $admin_email,
		"userpower" => 0,
		"usergender" => 1,
		"lastonlinetime" => date("Y-m-d H:i:s")
	);
	$db->insert("im_user",$user);
	$user = array(
		"id" => 2,
		"username" => "admin's friend",
		"userpass" => md5($admin_pass),
		"userid" => 10001,
		"useremail" => "1@1.com",
		"userpower" => 2,
		"usergender" => 1,
		"lastonlinetime" => date("Y-m-d H:i:s")
	);
	$db->insert("im_user",$user);
	$db->update("im_usernum",array("isok"=>2),"num=10000");
	$db->insert("im_userconfig",array("id"=>1,"userid" => 10000));
	$db->update("im_usernum",array("isok"=>2),"num=10001");
	$db->insert("im_userconfig",array("id"=>2,"userid" => 10001));
	AddFriend(10000,10001);
?>
<span style="color:Red">完成，请手动移除本文件</span>
<?php }?>
</body>
</html>