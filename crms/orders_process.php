<?php
/**
 * Created by PhpStorm.
 * User: ABO
 * CreateTime: 14-5-4 上午11:01
 * Description:
 */ 
require ('../include/init.inc.php');
$ordersId = $a = '';

extract ( $_REQUEST, EXTR_IF_EXISTS );
Common::checkParam($ordersId);

//当前用户信息
$current_user_info=UserSession::getSessionInfo();
$orders_list = array("shipped","received","chargeback","canceling","cancel");
$ordersstatus_options = Dict::getDictForOptionsByKeyName('ordersstatus');
$expressCompany_options = Dict::getDictForOptionsByKeyName('expresscompany');
$expressCompany_options['']="－请选择－";

$orders = Orders::getOrdersById ( $ordersId );

Template::assign ('a',$a);
Template::assign ('orders',$orders);
Template::assign ( 'orders_list', $orders_list );
Template::assign ('current_user_info', $current_user_info );
Template::assign ('ordersstatus_array',$ordersstatus_options);
Template::assign ('expressCompany_options',$expressCompany_options);
Template::display('crms/orders_process.tpl' );