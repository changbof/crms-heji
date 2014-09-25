<?php
require ('../include/init.inc.php');
$customerId = $saleId = $address = $mobile = $telphone = $orders_tel = $other_tel = '';

extract ( $_REQUEST, EXTR_IF_EXISTS );

if($customerId=="" && $mobile==""){
	OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
}


$orders_tel = $mobile;

if(!$telphone==""){
	$other_tel = $telphone;
}
//获取产品信息
$product_type = 'suite';
$products = Product::getProductForSelect($product_type);

Template::assign ('saleId',$saleId);
Template::assign ('customerId',$customerId);
Template::assign ('products',$products);
Template::assign ('address',$address);
Template::assign ('orders_tel',$orders_tel);
Template::assign ('other_tel',$other_tel);
Template::display('crms/orders_add.tpl' );