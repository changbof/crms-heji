<?php
require ('../include/init.inc.php');
$sdate = $edate = $vested = '';
$type = '0';

$sdate = date('Y-m-01');
$edate = date('Y-m-d');

extract ( $_GET, EXTR_IF_EXISTS );

if(empty($_GET)){
	$_GET['sdate'] = $sdate;
	$_GET['edate'] = $edate;
}

$user_info=UserSession::getSessionInfo();
//销售代表只能统计自己的
if($user_info['user_group']==4){
	$vested = $user_info['user_id'];
	$saler_options_list[$vested] = $user_info['real_name'];

}else{
	//取销售代表
	$saler_options_list = User::getUserForOptions(4);
	$saler_options_list['']="全部";
	ksort($saler_options_list);
}
$statOrders = Orders::statOrders($sdate." 00:00:00",$edate." 23:59:59",$vested,$type);

Template::assign ('saler_options_list',$saler_options_list);
Template::assign ('statOrders',$statOrders);
Template::assign ( '_GET', $_GET );
Template::display ('crms/stat_orders.tpl');
