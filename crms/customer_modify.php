<?php
require ('../include/init.inc.php');
$customerId = $a = $p = '';
$ordersId = '';
$customer_type = -1;

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
    $customer_type = $customer['type'];
//}
//沟通日志
$salelogs = Sale::getSaleLogs($vested,$customerId,'','',0,10);
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


//------处理客户类型-------------------------------------------
//Modify by Lvan(aboooo@139.com) at 20141121
//用户只能改变客户当前的阶段以后的阶段,即不能往回修改客户阶段
//
$readonly = ''; //是否只读
$odisabled = array(); //禁用的选项

if($customer_type < 5) { //要禁用的选项
    $od1 = array_slice($customertype_options, 5, null, true);
    //合并禁用选项
    foreach( $od1 as $key => $value ) {
        $odisabled[$key] = $value;
    }
}
//新客户不用过滤 Modify by Changbo at 20141119
if($customer_type > 0) {
    if(in_array($customer_type,array('5','6') )){
        $readonly = "readonly";
    }else if($customer_type >= 7) { //可选择
        $od4 = array_slice($customertype_options, 0, 7, true);
        //合并禁用选项
        foreach( $od4 as $key => $value ) {
            $odisabled[$key] = $value;
        }
    }
}

//过滤出"系统自动改变的客户类型"
/*
    5	出单
    6	退签
    7	成交
*/
//要禁用的选项
$od2 = array_intersect_key($customertype_options,array('5'=>'出单','6'=>'退签'));

foreach( $od2 as $key => $value ) {
    $odisabled[$key] = $value;
}
if(!empty($odisabled)){
    $odisabled = array_keys($odisabled);
}

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
Template::assign ( 'op_disabled',$odisabled);
Template::assign ( 'readonly',$readonly);
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