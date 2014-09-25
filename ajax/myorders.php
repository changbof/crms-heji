<?php
require ('../include/init.inc.php');
$page_no = '';
$method = $customerId = $saleId = '';
//订单信息
$ordersId = $ordersItemId = '';
$orders_num = $discount = $payment_sum = $product_price = 0;
$orders_title = $status = $gift = '';
$sdate = $edate = '';

extract ( $_REQUEST, EXTR_IF_EXISTS );

print_r($sdate);
//当前用户信息
$current_user_info=UserSession::getSessionInfo();
$user_group = $current_user_info['user_group'];
$current_user_id = $current_user_info['user_id'];

//我的订单
if( $method=='ajax_getMyOrders'){

	//START 数据库查询及分页数据
	$page_size = PAGE_SIZE;
	$page_no=$page_no<1?1:$page_no;

	if($user_group==4){ //销售代表
		$vested = $current_user_id;
		$row_count = Orders::countSearch ($sdate, $edate, $status,$customerId,$vested);
	}else{ //营养师/物流部
		$vested = '';
		$row_count = Orders::countSearch ($sdate, $edate, $status,$customerId,$vested);
	}

	$total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
	$total_page=$total_page<1?1:$total_page;
	$page_no=$page_no>($total_page)?($total_page):$page_no;
	$start = ($page_no - 1) * $page_size;

	if($user_group==4){
		$vested = $current_user_id;
		$myorders = Orders::getOrders($sdate, $edate, $status,$ordersId,$customerId,$vested,$start,$page_size);
	}else{
		$vested = '';
		$myorders = Orders::getOrders($sdate, $edate, $status,$ordersId,$customerId,$vested,$start,$page_size);
	}

	echo json_encode(array(
			"sEcho" => $page_no,
			"iTotalRecords" => $row_count,
			"iTotalDisplayRecords" => $start,
			"aaData" => $myorders
		));
}

if ( $method=="ajax_modifyOrders" ) {
	//考虑状态为"确认"后的状态将都不能修改(除"取消"外)
	if( $ordersId =="" || $orders_num==0 || $orders_num==0 ) {		
		OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
	}else{
		$orders = Orders::getOrdersById($ordersId);

		$update_data = array (
			'orders_num'	=> $orders_num,
			'discount'		=> $discount,
			'payment_sum'	=> $payment_sum,
			'gift'			=> $gift,
		);

		$cnt = Orders::updateOrders( $orders_id, $update_data );
		
		if ($cnt>0) {
			SysLog::addLog ( UserSession::getUserName(), 'UPDATE', 'Orders' ,$ordersId, json_encode($orders) );
			$result = array("result"=>1,"msg"=> "订单修改成功,请注意跟踪订单状态,及时处理!");
		}else{
			$result = array("result"=>0,"msg"=> "订单修改失败，请刷新页面后重新提交！");
		}
		echo json_encode($result);
	}
}



?>