<?php
require ('../include/init.inc.php');
$customerId = $ordersId = $a = '';

extract ( $_REQUEST, EXTR_IF_EXISTS );

if($customerId==""){
	OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
}
if(!$ordersId==''){
	$items = Orders::getItemsForOrdersId($ordersId);
	$orders = Orders::getOrdersById($ordersId);
    $gift = $orders['gift'];
}

//获取产品信息:营养素
$product_type = 'single';
$products = Product::getProductForSelect($product_type);

Template::assign ('customerId',$customerId);
Template::assign ('ordersId',$ordersId);
Template::assign ('remark',$gift);
Template::assign ('products',$products);
Template::assign ('items',$items);
Template::assign ('a',$a);
Template::display('crms/orders_item_add.tpl' );