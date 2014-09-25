<?php
require ('../include/init.inc.php');

//当前用户信息
$current_user_info=UserSession::getSessionInfo();
$user_group = $current_user_info['user_group'];
$current_user_id = $current_user_info['user_id'];


$ordersstatus_options = Dict::getDictForOptionsByKeyName('ordersstatus');
$confirm_html = OSAdmin::renderJsConfirm("icon-remove");
$orders_list = array("shipped","received","chargeback","canceling","cancel");

Template::assign ( 'orders_last', $orders_last );
Template::assign ( 'current_user_info', $current_user_info );
Template::assign ( 'osadmin_action_confirm', $confirm_html);
Template::assign ( 'ordersstatus_options', $ordersstatus_options );
Template::display ( 'crms/myorders.tpl' );
