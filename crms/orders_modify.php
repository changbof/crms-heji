<?php
/**
 * Created by PhpStorm.
 * User: ABO
 * CreateTime: 14-5-4 上午11:01
 * Description:
 */ 
require ('../include/init.inc.php');
$ordersId = '';

extract ( $_REQUEST, EXTR_IF_EXISTS );
Common::checkParam($ordersId);

$orders = Orders::getOrdersById ( $ordersId );
$ordersstatus_options = Dict::getDictForOptionsByKeyName('ordersstatus');

Template::assign ('orders',$orders);
Template::assign ('ordersstatus_array',$ordersstatus_options);
Template::display('crms/orders_modify.tpl' );