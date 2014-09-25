<?php
	require_once("../data/function.php");
	require_once("../data/cmd.php");
	require_once("../data/db.php");

	send_no_cache_header();
	CheckLogin();
	$db = new DB_MYSQL();
	$db->connect();

	if(isset($_GET["op"])){
		if("del"==trim($_GET["op"])){
			$id = $_GET["id"];
			$user = $db->get_One("select userid,userpower from im_user where userid = ".$id);
			if($user&&$user["userpower"]>$_SESSION["userpower"]){
				$db->delete("user","userid = ".$id);
				$db->delete("userfriend","userid = ".$id." or friendid = ".$id);
				$db->delete("usermsg","fromid = ".$id." or toid = ".$id);
				$db->delete("usersysmsg","fromid = ".$id." or toid = ".$id);
				$db->delete("userconfig","userid = ".$id);
				$db->delete("usergroup","userid = ".$id);
				$db->update("im_usernum",array("isok"=>1),"num = ".$id);
			}
		}
	}
	
	$key = isset($_GET["k"])?addslashes($_GET["k"]):"";

	$p = intval($_GET["p"]);
	$page_size = 7;

	$condition = "1";
	if(!empty($key)){
		$condition = "userid like '%".$key."%' or username like '%".$key."%' or useremail like '%".$key."%'";
	}

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
	if($p<1||$p>$page_count)$p = $page_count;
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
function goSearch()
{
	showLoading();
	location.href = "?k="+$F("txtKey").toString().escapeEx();
}
</script>
</head>
<body> 
<?php
if($_SESSION["userpower"]>1)die("没有权限！");
?>
<div style="width:540px;height:15px;text-indent:6px">
	<span class="gray">用户信息</span>&nbsp;&nbsp;<a onclick="showLoading()" href="othermanage.php">系统管理</a>
</div>
<div style="width:548px;height:23px">
	<div style="text-indent:5px;float:left">
		<input type="text" style="width:120px;height:14px" id="txtKey" value="<?php echo($key);?>" />
		<input class="button1" type="button" onclick="goSearch();" value="搜索" />&nbsp;
		<input class="button1" type="button" onclick="Elem.Value('txtKey');goSearch();" value="全部" />
	</div>
	<div style="float:right;padding-right:5px">
		到
		<select onchange="showLoading();location.href='?k=<?php echo($key);?>&p='+this.value" >
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
			<a onclick="showLoading();" href="?p=1&k=<?php echo($key);?>">首页</a>
			<a onclick="showLoading();" href="?p=<?php echo($p-1);?>&k=<?php echo($key);?>">上页</a>
		<?php }else{?>
			<span class="gray">首页</span>
			<span class="gray">上页</span>
		<?php }
		if($p!=$page_count){?>
			<a onclick="showLoading();" href="?p=<?php echo($p+1);?>&k=<?php echo($key);?>">下页</a>
			<a onclick="showLoading();" href="?p=<?php echo($page_count);?>&k=<?php echo($key);?>">末页</a>
		<?php }else{?>
			<span class="gray">下页</span>
			<span class="gray">末页</span>
		<?php }?>
	</div>
</div>

<div style="width:548px;height:400px;overflow:auto">
<?php
$users = $db->get_all("select * from im_user where ".$condition." order by id asc limit ".($p-1)*$page_size.",".$page_size);
if(count($users)>0){
?>
<table align="center" width="98%" border="0" cellpadding="0" cellspacing="1" style="background-color:#bed6e0">
	<tr>
		<td style="background-color:#e0edff;height:21px;width:65px;text-align:center">头像</td>
		<td style="background-color:#e0edff;text-align:center">基本信息</td>
		<td style="background-color:#e0edff;width:80px;text-align:center">角色</td>
		<td style="background-color:#e0edff;width:150px;text-align:center">邮箱</td>
		<td style="background-color:#e0edff;width:60px;text-align:center">操作</td>
	</tr>
<?php
	$flag = 1;
	foreach($users as $user){
		if($flag %2 == 1){
			$tdColor  = "fff";
		}else{
			$tdColor  = "e0edff";
		}
?>
	<tr>
		<td style="background-color:#<?php echo($tdColor);?>;height:21px;text-align:center">
			<a target="_blank" href="../userface/<?php echo($user["userface"])?>"><img title="<?php echo($user["username"])?>" src="../userface/<?php echo($user["userface"])?>" style="width:50px;height:50px;border:0"/></a>
		</td>
		<td style="background-color:#<?php echo($tdColor);?>;text-align:center">
			<?php echo($user["username"])?><br />(<?php echo($user["userid"])?>)[<?php if(1==$user["usergender"]){?>男<?php }else{?>女<?php }?>]
		</td>
		<td style="background-color:#<?php echo($tdColor);?>;text-align:center">
			<?php switch($user["userpower"]){
				case 0:
					echo "超级管理员";
					break;
				case 1:
					echo "一般管理员";
					break;
				case 2:
					echo "一般用户";
					break;
				case 3:
					echo "匿名用户";
					break;
			}?>
		</td>
		<td style="background-color:#<?php echo($tdColor);?>;text-align:center">
			<a href="mailto:<?php echo($user["useremail"])?>"><?php echo($user["useremail"])?></a>
		</td>
		<td style="background-color:#<?php echo($tdColor);?>;text-align:center">
			<?php if($_SESSION["userpower"]<$user["userpower"]){?>
				<a onclick="if(!confirm('你真的要删除[<?php echo($user["userid"]);?>]这位用户(无法还原)？'))return false;else showLoading();" href="?p=<?php echo($p);?>&op=del&id=<?php echo($user["userid"]);?>&k=<?php echo($key);?>">删除</a>
			<?php }else{?>
				<span class="gray">删除</span>
			<?php } ?>
		</td>
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
