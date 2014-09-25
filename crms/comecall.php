<?php
require ('../include/init.inc.php');
$cometel = '';
extract ( $_REQUEST, EXTR_IF_EXISTS );

Common::checkParam($cometel);

$nowTime = date('Y-m-d H:i:s');
$user_info=UserSession::getSessionInfo();

//添加来电记录
$input_data = array (
	'cometel_phone' => $cometel,
	'guest_name' 	=> "客户来电", 
	'cometel_time'	=> $nowTime,
	'vested' 		=> $user_info['user_id'], 
	'client_ip'		=> Common::getClientIp(),
	'cometel_response'=> 0 ,
 );

$customer = Customer::getCustomerByPhone ( $cometel );

if(!empty($customer)){
	$input_data['guest_name'] = $customer['name'];
	$input_data['guest_sex'] = $customer['sex'];
	$input_data['customer_id'] = $customer['id'];
}else{
	$customer['mobile'] = $cometel;
	$customer['name'] = '新客户';
}

$newId = Customer::addComeTel( $input_data );

SysLog::addLog ( UserSession::getUserName(), 'ADD', 'ComeTel' ,$newId, json_encode($input_data) );

$customertype_options = Dict::getDictForOptionsByKeyName('customertype');
$sex_options = Dict::getDictForOptionsByKeyName('sex');

$user_options_list = User::getUserForOptions();

Template::assign ( 'user_options_list',$user_options_list );
Template::assign ( 'sex_options',$sex_options );
Template::assign ( 'customertype_options',$customertype_options );
Template::assign ( 'user_info',$user_info );
Template::assign ( 'customer',$customer );
Template::display( 'crms/comecall.tpl' );