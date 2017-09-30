<?php 
require ('./include/init.inc.php');
$user_info = UserSession::getSessionInfo();
$menus = MenuUrl::getMenuByIds($user_info['shortcuts']);
$nowdate=date('Y-m-d');
$statOrders=Orders::statOrders($nowdate.' 00:00:00',$nowdate.' 23:59:59',$user_info['user_id'],'()');
$myNotes=QuickNote::getNotes($user_info['user_id'],'',0,5);
$sysNotes=QuickNote::getNotes('0','',0,5);
$order="";

if($user_info['user_group']==5)
{
    $order="'new'";	
}elseif($user_info['user_group']==6)
{
	$order="'verifying','audited','shipped'";
}elseif($user_info['user_group']==7){
	$order="'canceling'";
}
if($order!="")
{
	$orderlist=Orders::getzdOrders($order);
	Template::assign('orderlist',$orderlist);
}
Template::assign('myNotes',$myNotes);
Template::assign('sysNotes',$sysNotes);
Template::assign('statOrders',$statOrders);
Template::assign('menus' ,$menus);
Template::display('index.tpl');
