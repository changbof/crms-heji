<?php
require ('../include/init.inc.php');
$method = $page_no = '';
$customerId = $vested = $sdate = $edate = $edate2 = $status = '';
$ordersId = '';

extract ( $_GET, EXTR_IF_EXISTS );

if($edate!=''){
    $edate2 = date('Y-m-d',strtotime("$edate +1 day"));
}

//当前用户信息
$current_user_info=UserSession::getSessionInfo();
$user_group = $current_user_info['user_group'];
$current_user_id = $current_user_info['user_id'];

//START 数据库查询及分页数据
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;

if($user_group==4){ //销售代表
	$vested = $current_user_id;
}else{ //营养师/物流部
	$vested = '';
}

$row_count = Orders::countSearch ($sdate, $edate2, $status,$ordersId,$customerId,$vested);
$total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
$total_page=$total_page<1?1:$total_page;
$page_no=$page_no>($total_page)?($total_page):$page_no;
$start = ($page_no - 1) * $page_size;
$myorders = Orders::getOrders($sdate, $edate2, $status,$ordersId,$customerId,$vested,$start,$page_size);

$ordersstatus_options = Dict::getDictForOptionsByKeyName('ordersstatus');
$ordersstatus_options['']="全部";

$confirm_html = OSAdmin::renderJsConfirm("icon-remove");
$page_html=Pagination::showPager("myorders.php?$sdate=$sdate&edate=$edate2&status=$status&ordersId=$ordersId&customerId=$customerId&search=$search",$page_no,$page_size,$row_count);
$orders_list = array("shipped","received","chargeback","canceling","cancel");

Template::assign ('_GET',$_GET);
Template::assign ( 'orders_list', $orders_list );
Template::assign ( 'myorders', $myorders );
Template::assign ( 'page_html', $page_html );
Template::assign ( 'osadmin_action_confirm', $confirm_html);
Template::assign ( 'ordersstatus_options', $ordersstatus_options );
Template::display ( 'crms/myorders.tpl' );
