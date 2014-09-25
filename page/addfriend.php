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
function chkEmail()
{
	if($("tb1").style.display=="none")return true;
	var email = $F("tbEmail").trim();
	if(email=="")
	{
		setTip("Email","请填写email地址","red");
		return false;
	}
	else if(!validEmail(email))
	{
		setTip("Email","错误的email地址","red");
		return false;
	}
	else if(!exsitEmail(email))
	{
		setTip("Email","不存在这样的用户","red");	
		return false;
	}
	setTip("Email","OK","gray");
	return true;
}
function chkAll()
{
	if(chkEmail())
	{
		showLoading();
		document.forms[0].submit();
	}
}
function setTip(s,msg,cn)
{
	var oSpan = $("span"+s);
	oSpan.className = cn;
	Elem.Value(oSpan,msg);
}
function validEmail(email)
{
    var regex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    return regex.test(email);
}
function exsitEmail(email)
{
	var ajax = new Ajax();
	ajax.send("../data/service.php?t=1","email="+email,null,"POST",false);
	return parseInt(Xml.First($T(ajax.req.responseXML,"result").item(0),"num"))!=0;
}
</script>
</head>
<body>
<?php
if($_SESSION["userpower"]>2){
	die("匿名用户无此功能！");
}
$t =		isset($_GET["t"])?intval($_GET["t"]):0;
$email =	isset($_GET["tbEmail"])?addslashes($_GET["tbEmail"]):"";
$gender =	isset($_GET["gender"])?intval($_GET["gender"]):0;
$face =		isset($_GET["face"])?intval($_GET["face"]):0;
$status =	isset($_GET["status"])?intval($_GET["status"]):0;
$p =		isset($_GET["p"])?intval($_GET["p"]):0;
$condition = "";
if($t>0){
	if($t==1){
		$condition = " useremail = '".$email."'";
	}else if($t==2){
		$condition = " 1";
		if($gender!=-1)$condition.=" and usergender = ".$gender;
		if($face!=-1){
			if($face==1){
				$condition.=" and userface <> 'default.gif'";
			}else{
				$condition.=" and userface = 'default.gif'";
			}	
		}
		if($status!=-1){
			if($status==1){
				$condition.=" and userstatus < 6";
			}else{
				$condition.=" and userstatus > 5";
			}
		}
	}
	$page_size = 10;
	$amount = $db->count("im_user","id",$condition);
	if($amount){
		if($amount < $page_size){
			$page_count = 1;
			}
		if($amount % $page_size){
			$page_count = (int)($amount / $page_size) + 1;
		}else{
			$page_count = $amount / $page_size;
		}
	}
	else{
		$page_count = 1;
	}
	if($p<1||$p>$page_count)$p = 1;
?>
<table align="center" width="98%" border="0" cellpadding="0" cellspacing="1" style="background-color:#bed6e0">
<?php
	$users = $db->get_all("select * from im_user where ".$condition." order by id asc limit ".($p-1)*$page_size.",".$page_size);
	if(count($users)>0){
		$flag = 1;
		foreach($users as $user){
			if($flag %2 == 1){
				$tdColor  = "fff";
			}else{
				$tdColor  = "e0edff";
			}
?>
	<tr>
		<td style="height:22px;background-color:#<?php echo($tdColor);?>;width:25px;text-align:center"><script>document.write("<img title='"+["联机","忙碌","马上回来","离开","通话中","外出就餐","脱机","脱机"][<?php echo($user["userstatus"]);?>]+"' src='../images/m"+[0,1,2,2,1,2,3,3][<?php echo($user["userstatus"]);?>]+".gif' />")</script></td>
		<td style="background-color:#<?php echo($tdColor);?>;text-indent:3px"><a title="<?php echo($user["usersign"]);?>" href="javascript:void(0)"><?php echo($user["username"]);?></a>[<?php if($user["usergender"]==1){echo "男";}else{echo "女";}?>]</td>
		<td style="background-color:#<?php echo($tdColor);?>;width:80px;text-align:center"><a title="<?php echo($user["useremail"]);?>" href="addfriendsave.php?email=<?php echo($user["useremail"]);?>">加为好友</a></td>
	</tr>
<?php
			$flag++;
		}	
	}else{
		echo("<tr><td  style='height:25px;background-color:#fff' colspan='6'>&nbsp;没有任何记录！</td></tr>");
	}
?>
</table>
</div>
<div style="float:left;padding:7px 0 0 5px">
	<a href="addfriend.php">←重新查找</a>
</div>
<?php
	if(count($users)>0){
?>
<div style="float:right;padding:5px 5px 0 0">
	到
	<select onchange="showLoading();location.href='?face=<?php echo($face);?>&email=<?php echo($email);?>&status=<?php echo($status);?>&gender=<?php echo($gender);?>&t=<?php echo($t);?>&p='+this.value" >
	<?php
		for($i=1;$i<=$page_count;$i++){
			echo("<option value='".$i."'");
			if($i==$p)echo(" selected='selected' ");
			echo(">".$i."</option>");
		}
	?>
	</select>
	页&nbsp;
	共<?php echo($p);?>/<?php echo($page_count);?>页
	<?php if($p!=1){?>
		<a onclick="showLoading();" href="?p=1&face=<?php echo($face);?>&email=<?php echo($email);?>&status=<?php echo($status);?>&gender=<?php echo($gender);?>&t=<?php echo($t);?>">首页</a>
		<a onclick="showLoading();" href="?p=<?php echo($p-1);?>&face=<?php echo($face);?>&email=<?php echo($email);?>&status=<?php echo($status);?>&gender=<?php echo($gender);?>&t=<?php echo($t);?>">上页</a>
	<?php }else{?>
		<span class="gray">首页</span>
		<span class="gray">上页</span>
	<?php }
	if($p!=$page_count){?>
		<a onclick="showLoading();" href="?p=<?php echo($p+1);?>&face=<?php echo($face);?>&email=<?php echo($email);?>&status=<?php echo($status);?>&gender=<?php echo($gender);?>&t=<?php echo($t);?>">下页</a>
		<a onclick="showLoading();" href="?p=<?php echo($page_count);?>&face=<?php echo($face);?>&email=<?php echo($email);?>&status=<?php echo($status);?>&gender=<?php echo($gender);?>&t=<?php echo($t);?>">末页</a>
	<?php }else{?>
		<span class="gray">下页</span>
		<span class="gray">末页</span>
	<?php }?>
</div>
<?php
	}
}else{
?>
<form action="addfriend.php" method="get" name="form1" id="form1"> 
<div style="height:40px;text-indent:10px;line-height:40px"><strong>查找方式</strong></div>
<div style="height:30px;text-indent:10px"><label for="t1"><input type="radio" id="t1" value="1" name="t"/>精确查找<label></div>
<div style="height:30px;text-indent:10px"><label for="t2"><input type="radio" id="t2" checked="checked" value="2" name="t"/>按条件查找<label></div>
<div style="height:85px;display:none;padding:15px" id="tb1">
	<div style="height:30px">
		Email地址：<input name="tbEmail" type="text" class="input1" id="tbEmail" maxlength="50"/>
	</div>
	<div style="height:30px">
		<span id="spanEmail">示例：quguangyu@gmail.com</span></td>
	</div>
</div>
<div style="height:85px;padding:15px" id="tb2">
	<div style="height:30px">
		性别：<select name="gender"><option value="-1">不限</option><option value="1">男</option><option value="2">女</option></select>&nbsp;&nbsp;自定义头像：<select name="face"><option value="-1">不限</option><option value="1">是</option><option value="2">不是</option></select>
	</div>
	<div style="height:30px">
		在线状态：<select name="status"><option value="-1">不限</option><option value="1">在线</option><option value="2">不在线</option></select>
	</div>
  </tr>
</div>
<div style="height:35px;text-align:center">
        <input class="button1" type="button" name="btnSubmit" id="btnSubmit" value="确定" onclick="chkAll()"/>&nbsp;&nbsp; 
        <input class="button1" type="button" name="btnCancel" id="btnCancel" onclick="winClose(event);" value="取消" /></td>
</div>   
</form>

<script type="text/javascript">
$("t1").onclick = $("t2").onclick = function(){
	Elem.Hid("tb1","tb2");
	Elem.Show("tb"+this.value);
};
</script>
<?php
}	
?>
</div>
</body>
</html>