<?php
require ('../include/init.inc.php');
$method = $page_no = $product_id = '';
$keyword = '';
extract ( $_GET, EXTR_IF_EXISTS );

$current_user_info=UserSession::getSessionInfo();
$user_group = $current_user_info['user_group'];
$current_user_id = $current_user_info['user_id'];

//START 数据库查询及分页数据
$row_count = Product::count ($keyword);
$page_size = 30;
$page_no=$page_no<1?1:$page_no;
$total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
$total_page=$total_page<1?1:$total_page;
$page_no=$page_no>($total_page)?($total_page):$page_no;
$start = ($page_no - 1) * $page_size;
$products = Product::getProducts($keyword,$start,$page_size);


if ($method == 'del' && ! empty ( $product_id )) {
	
	$product = Product::getProductById($product_id);
	
	//是超级管理员组的成员或者是Product的创建者且状态为未审核(status=2)
	if($user_group ==1 ){
		$result = Product::delProduct ( $product_id );
		if ($result>0) {
			SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'Product',$product_id, json_encode($product) );
			Common::exitWithSuccess ('产品删除成功','crms/products.php');
		}else{
			OSAdmin::alert("error");
		}
	}else{
		OSAdmin::alert("error",ErrorMessage::PRODUCT_NOT_OWNER);
	}
}



$confirm_html = OSAdmin::renderJsConfirm("icon-remove");
$page_html=Pagination::showPager("products.php?k=$k&keyword=$keyword",$page_no,$page_size,$row_count);

Template::assign ('_GET',$_GET);
Template::assign ( 'page_html', $page_html );
Template::assign ( 'products', $products );
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::display ( 'crms/products.tpl' );
