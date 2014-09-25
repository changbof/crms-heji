<?php
	require_once("../data/function.php");
	require_once("../data/cmd.php");
	require_once("../data/db.php");

	send_no_cache_header();
	CheckLogin();
	$db = new DB_MYSQL();
	$db->connect();

	$id = intval($_GET["id"]);
	$p = intval($_GET["p"]);
	$page_size = 17;

	$condition = "fromid = ".$_SESSION["userid"]." or toid = ".$_SESSION["userid"];
	if($id>1){
		$condition = "(fromid = ".$_SESSION["userid"]." and toid = ".$id.") or (toid = ".$_SESSION["userid"]." and fromid = ".$id.")";
	}
	$amount = $db->count("im_usermsg","id",$condition);
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
	if($p<1||$p>$page_count)$p = $page_count;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/webimpage.css" type="text/css" rel="stylesheet" media="all">
<script type="text/javascript" src="../js/webimhelper.js"></script>
<script type="text/javascript" src="../js/webimpage.js"></script>
<title>聊天记录</title>
<script type="text/javascript">
var uid = 9;
</script>
</head>
<body> 
<?php
if($_SESSION["userpower"]>2){
	die("匿名用户无此功能！");
}
?>
<div style="width:548px;height:23px">
	<div style="text-indent:5px;float:left">
		范围：<select onchange="showLoading();location.href='?id='+this.value">
			<option value="-1">全部</option>
			<?php
				$users = $db->get_all("select a.friendid,b.username from im_userfriend a inner join im_user b on a.friendid = b.userid where a.userid = ".$_SESSION["userid"]);
				if(count($users)>0){
					foreach($users as $user){
						echo ("<option value='".$user["friendid"]."'");
						if($user["friendid"]==$id)echo(" selected='selected' ");
						echo (">".GetCustomNameById($_SESSION["userid"],$user["friendid"])."</option>");
					}
				}
			?>
		</select>
	</div>
	<div style="float:right;padding-right:5px">
		<!--<a href="messagetxt.php?id=<?php echo($id);?>" target="_blank">下载到本地</a>&nbsp;-->
		到
		<select onchange="showLoading();location.href='?id=<?php echo($id);?>&p='+this.value" >
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
			<a onclick="showLoading();" href="?p=1&id=<?php echo($id);?>">首页</a>
			<a onclick="showLoading();" href="?p=<?php echo($p-1);?>&id=<?php echo($id);?>">上页</a>
		<?php }else{?>
			<span class="gray">首页</span>
			<span class="gray">上页</span>
		<?php }
		if($p!=$page_count){?>
			<a onclick="showLoading();" href="?p=<?php echo($p+1);?>&id=<?php echo($id);?>">下页</a>
			<a onclick="showLoading();" href="?p=<?php echo($page_count);?>&id=<?php echo($id);?>">末页</a>
		<?php }else{?>
			<span class="gray">下页</span>
			<span class="gray">末页</span>
		<?php }?>
	</div>
</div>
<div style="width:548px;height:400px;overflow:auto">
<?php
$msgs = $db->get_all("select * from im_usermsg where ".$condition." order by id asc limit ".($p-1)*$page_size.",".$page_size);
if(count($msgs)>0){
?>
<table align="center" width="98%" border="0" cellpadding="0" cellspacing="1" style="background-color:#bed6e0">
	<tr>
		<td style="background-color:#e0edff;height:21px;width:90px;text-align:center">发 送</td>
		<td style="background-color:#e0edff;width:90px;text-align:center">接 收</td>
		<td style="background-color:#e0edff;width:120px;text-align:center">时 间</td>
		<td style="background-color:#e0edff;text-align:center">内 容</td>
	</tr>
<?php
	$flag = 1;
	foreach($msgs as $msg){
		if($flag %2 == 1){
			$tdColor  = "fff";
		}else{
			$tdColor  = "e0edff";
		}
		if($msg["typeid"]==2&&trim($msg["msgcontent"])=="FLASH"){
			$msg_content = "<span class='gray'>闪屏振动</span>";
		}else{
			$msg_content = $msg["msgcontent"];
		}
?>
	<tr>
		<td style="background-color:#<?php echo($tdColor);?>;height:21px;text-align:center"><?php echo(GetCustomNameById($_SESSION["userid"],$msg["fromid"]));?></td>
		<td style="background-color:#<?php echo($tdColor);?>;text-align:center"><?php echo(GetCustomNameById($_SESSION["userid"],$msg["toid"]));?></td>
		<td style="background-color:#<?php echo($tdColor);?>;text-align:center"><?php echo($msg["msgaddtime"]);?></td>
		<td style="background-color:#<?php echo($tdColor);?>;text-indent:5px"><?php echo($msg_content);?></td>
	</tr>
<?php
		$flag++;
	}	
?>
</table>
</div>
<?php
}else{
	echo("<div style='padding:20px'>没有找到任何记录!</div></div>");
}

?>
</body>
</html>