<?php
require ('../include/init.inc.php');
$customerId = $a = $p = '';
$ordersId = '';

extract ( $_REQUEST, EXTR_IF_EXISTS );

Common::checkParam($customerId);

$user_info=UserSession::getSessionInfo();

$customer = Customer::getCustomerById ( $customerId );

if(empty($customer)){
	Common::exitWithError(ErrorMessage::CUSTOMER_NOT_EXIST,"crms/customers.php");
}
//$vested = $user_info['user_id'];
//if($a！=''){
	$vested = $customer['vested'] ;
//}
//沟通日志
$salelogs = Sale::getSaleLogs($vested,$customerId);
//历史订单
$orders = Orders::getOrders('','','',$ordersId,$customerId,$vested,0,10);

$customertype_options = Dict::getDictForOptionsByKeyName('customertype');
$sex_options = Dict::getDictForOptionsByKeyName('sex');
$income_options = Dict::getDictForOptionsByKeyName('income');
$source_options = Dict::getDictForOptionsByKeyName('source');
$personalitytype_options = Dict::getDictForOptionsByKeyName('personalitytype');
$personalitytraits_options = Dict::getDictForOptionsByKeyName('personalitytraits');
$dietpreference_options = Dict::getDictForOptionsByKeyName('dietpreference');
$dietfoods_options = Dict::getDictForOptionsByKeyName('dietfoods');
$diethobby_options = Dict::getDictForOptionsByKeyName('diethobby');
$dietsnacks_options = Dict::getDictForOptionsByKeyName('dietsnacks');
$diettaste_options = Dict::getDictForOptionsByKeyName('diettaste');
$link_relation_options = Dict::getDictForOptionsByKeyName('relation');
$labor_intensity_options = Dict::getDictForOptionsByKeyName('laborintensity');
$ordersstatus_options = Dict::getDictForOptionsByKeyName('ordersstatus');

$saler_options_list = User::getUserForOptions(4);

Template::assign ( 'a',$a);
Template::assign ( 'p',$p);
Template::assign ( 'customer',$customer);
Template::assign ( 'salelogs',$salelogs);
Template::assign ( 'orders',$orders);
Template::assign ( 'ordersId',$ordersId);

Template::assign ( 'sex_options',$sex_options);
Template::assign ( 'source_options',$source_options);
Template::assign ( 'income_options',$income_options);
Template::assign ( 'customertype_options',$customertype_options);
Template::assign ( 'personalitytype_options',$personalitytype_options);
Template::assign ( 'personalitytraits_options',$personalitytraits_options);
Template::assign ( 'dietpreference_options',$dietpreference_options);
Template::assign ( 'dietfoods_options',$dietfoods_options);
Template::assign ( 'diethobby_options',$diethobby_options);
Template::assign ( 'dietsnacks_options',$dietsnacks_options);
Template::assign ( 'diettaste_options',$diettaste_options);
Template::assign ( 'linkrelation_options',$link_relation_options);
Template::assign ( 'laborintensity_options',$labor_intensity_options);
Template::assign ( 'ordersstatus_options',$ordersstatus_options);
Template::assign ( 'saler_options_list',$saler_options_list);

Template::assign ( 'user_info', $user_info );
Template::display( 'crms/customer_modify.tpl' );