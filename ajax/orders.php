<?php
require ('../include/init.inc.php');
$method = '';
$customerId = $saleId = $ordersId = '';
//订单信息
$ordersItemId = $product_id = $orders_titleId = '';
$orders_num = $discount = $payment_sum = $product_price = $item_num = 0;
$orders_title = $status = $gift = $note = '';
$productName = $item_spec = $item_remark = '';
$shipped_express = $express_no = $orders_address = $o_address = $orders_tel = $o_mobile = '';
$customer_type='';
$nutrientscase='';
$express_no='';
$doModify=true;

//沟通记录
$sale_id = $sale_date = $sale_product = $sale_content = $sale_analysis = $sale_effect = $orders_id = $vested = $remark = '';

extract ( $_REQUEST, EXTR_IF_EXISTS );

$current_user_id = UserSession::getUserId();

//添加/修改沟通记录
if ($method=="ajax_addSaleLog") {
	$sale_content = Common::filterText($sale_content);
	$sale_analysis = Common::filterText($sale_analysis);
	$remark = Common::filterText($remark);
	if($customerId=="" || $sale_content=="" ){
		$result = array("result"=>0,"msg"=> ErrorMessage::NEED_PARAM."请检查: 沟通简要等信息是否正确填写!" );
	}else{
		$ctype = Dict::getDictForOptionsByKeyName('customertype');

		$sale_content = htmlspecialchars($sale_content);
		$sale_analysis = htmlspecialchars($sale_analysis);
		$remark = htmlspecialchars($remark);
		$saleDate = date('Y-m-d H:i:s');
		$input_data = array (
			'sale_content'	=> $sale_content , 
			'sale_analysis'	=> $sale_analysis ,
			'remark'		=> $remark , 
		);

        if($customer_type!="") {
            $sale_effect = $ctype[$customer_type];
            $input_data['sale_effect'] =  $sale_effect;

            //根据客户分类计算过期日期
            $sp_expiration = SystemParam::getValue($customer_type);
            $d = $saleDate . " +" . $sp_expiration['param_value'] . " day";
            $expiration_date = date('Y-m-d H:i:s', strtotime($d));
            $customer_data = array(
                'type' => $customer_type,
                'expiration_date' => $expiration_date,
                'last_vested' => $current_user_id,
                'last_sale_date' => $saleDate,
            );
            Customer::updateCustomer($customerId, $customer_data);
		}

		//修改沟通日志
		if(!$sale_id==''){
			$salelog = Sale::getSaleLogById($sale_id);

			$rst = Sale::updateSaleLog($sale_id, $input_data );
			if ($rst>0) {
				SysLog::addLog ( UserSession::getUserName(), 'Modify', 'Sale' ,$sale_id, json_encode($input_data) );
				$result = array("result"=>1,"msg"=> "修改沟通记录成功","newid"=>$sale_id,"sale_date"=>$salelog['sale_date'],"remark"=>"[".$sale_effect."]".$remark);
			}else{
				$result = array("result"=>0,"msg"=> "修改沟通记录不成功，请检查数据后重新提交！");
			}
		}else{  //新增沟通日志
			$input_data['customer_id'] 	= $customerId;
			$input_data['sale_date'] 	= $saleDate;
			$input_data['vested']		= $current_user_id;
			$rst = Sale::addSaleLog( $input_data );

			if ($rst>0) {
				SysLog::addLog ( UserSession::getUserName(), 'ADD', 'Sale' ,$rst, json_encode($input_data) );
				$result = array("result"=>1,"msg"=> "添加沟通记录成功","newid"=>$rst,"sale_date"=>$saleDate,"remark"=>$remark);
			}else{
				$result = array("result"=>0,"msg"=> "添加沟通记录不成功，请检查数据后重新提交！");
			}
		}
	}
	echo json_encode($result);
}

if ( $method=="ajax_addOrders" ) {

	$remark = Common::filterText($remark);

	if($customerId=='' || $orders_title =="" || $payment_sum==0 ||
		$orders_address=="" || $orders_tel=="") {		
		$result = array("result"=>0,"msg"=> ErrorMessage::NEED_PARAM."，请检查:产品、金额、收货地址、电话等信息！" );
	}else{
		//判断是否有相同产品没有组方确认，若有，不能增加
		$hasOds = Orders::hasOrders($orders_title,$orders_titleId);
		$nowTime = date('Y-m-d H:i:s');
		$ordersNo = date('YmdHis').Common::randomNumber();

		$input_data = array(
			'orders_no'		=> $ordersNo,
			'customer_id'	=> $customerId,
			'product_id'	=> $orders_titleId,
			'orders_title'	=> $orders_title,
			'orders_price'	=> $product_price,
			'orders_num'	=> $orders_num,
			'discount'		=> $discount,
			'payment_sum'	=> $payment_sum,
			'gift'			=> $gift,
			'orders_address'=> $orders_address,
			'orders_tel'	=> $orders_tel,
			'status'		=> 'new',
			'vested'		=> $current_user_id,
			'orders_date'	=> $nowTime,
			'update_time'	=> $nowTime,
		);
		$customer_data = array();
		//若收货地址与原地址不同,则修改客户信息中的地址
		if($orders_address!='' && $orders_address != $o_address ){
			$customer_data['address'] = $orders_address;
		}
		if($orders_tel!='' && $orders_tel != $o_mobile ){
			$customer_data['mobile'] = $orders_tel;
		}
		if(!empty($customer_data)){
			Customer::updateCustomer($customerId,$customer_data);
		}

		$orders_id = Orders::addOrders( $input_data );
		
		if ($orders_id>0) {
			if(!$saleId==""){
				//关联沟通日志
				Sale::updateSaleLog($saleId,array("orders_id"=>$orders_id));
			}
			SysLog::addLog ( UserSession::getUserName(), 'ADD', 'Orders' ,$orders_id, json_encode($input_data) );
			$result = array("result"=>1,"msg"=> "已成功生成新订单,请注意跟踪状态,及时处理!","newId"=>"$orders_id","date"=>$nowTime,"ordersNo"=>$ordersNo);
		}else{
			$result = array("result"=>0,"msg"=> "订购失败，请刷新页面后重新提交！");
		}
	}
	echo json_encode($result);
}

//修改订单信息
if ( $method=="ajax_modifyOrders" ) {
	//考虑状态为"确认"后的状态将都不能修改(除"取消"外)
	if( $ordersId=='' || $payment_sum==0 || $orders_address=="" || $orders_tel=="") {		
		$result = array("result"=>0,"msg"=> ErrorMessage::NEED_PARAM."，请检查:产品、金额、收货地址、电话等信息！" );
	}else{
		$nowTime = date('Y-m-d H:i:s');
		$orders = Orders::getOrdersById($ordersId);
		$update_data = array (
			'orders_price'	=> $product_price,
			'orders_num'	=> $orders_num,
			'discount'		=> $discount,
			'payment_sum'	=> $payment_sum,
			'gift'			=> $gift,
			'orders_address'=> $orders_address,
			'orders_tel'	=> $orders_tel,
			'update_time'	=> $nowTime,
		);
		if($status!=''){//取消申请中[销售代表]
			$update_data['status'] = $status;
			if($status=='canceling'){
				$update_data['cancel_date'] = $nowTime;
				$update_data['cancel_note'] = $note;
			}
		}
		$cnt = Orders::updateOrders( $ordersId, $update_data );
		if ($cnt>0) {
            //更新订单地址到客户信息的地址
            if($doModify){
                $cid = $orders['customer_id'];
                Customer::updateCustomer($cid,array('address'=>$orders_address));
            }
			SysLog::addLog ( UserSession::getUserName(), 'UPDATE', 'Orders' ,$ordersId, json_encode($orders) );
			$result = array("result"=>1,"msg"=> "订单修改成功,请注意跟踪订单状态,及时处理!");
		}else{
			$result = array("result"=>0,"msg"=> "订单修改失败，请刷新页面后重新提交！");
		}
	}
	echo json_encode($result);
}

//处理订单流程状态
if ( $method=="ajax_processOrders" ) {

	if( $ordersId == "" || $status =="" || $customerId =="") {
		$result = array("result"=>0,"msg"=> ErrorMessage::NEED_PARAM );
	}else{
		$nowTime = date('Y-m-d H:i:s');
		$ordersstatus_options = Dict::getDictForOptionsByKeyName('ordersstatus');
		$msg = $ordersstatus_options[$status];

		$orders_data = array(
			'status'		=> $status,
			'update_time'	=> $nowTime,
		);
		$success = false;

		switch($status){
			case 'determine': //第二步:组方完成[营养师]
				$orders_data['dispense_date'] = $nowTime;
				break;
			case 'verifying': //第三步:客户确认完成[销售代表]
				$orders_data['determine_date'] = $nowTime;
				break;
			case 'audited': //第四步:审核完成[物流部] 审核通过
                $orders_data['verify_date'] = $nowTime;
                $orders_data['verify_note'] = $note;
                $orders_data['shipped_express'] = $shipped_express;
                $orders_data['nutrientscase'] = $nutrientscase;

                $customer_type = 5; //出单客户
                break;
			case 'unaudited': //第四步:审核完成[物流部] 审核不通过
				$orders_data['verify_date'] = $nowTime;
				$orders_data['verify_note'] = $note;
                $orders_data['shipped_express'] = $shipped_express;
                $orders_data['nutrientscase'] = $nutrientscase;
				break;
			case 'shipped': //第五步:已发货[仓储部]
				$orders_data['shipped_date'] 	= $nowTime;
				$orders_data['shipped_express']	= $shipped_express;
                $orders_data['express_no']	= $express_no;
				break;
			case 'reach': //第六步:到达当地[物流部]
				$orders_data['reach_date'] 	= $nowTime;
				break;
			case 'received': //第七步:已签收[物流部]
				$orders_data['receive_date'] = $nowTime;
				$orders_data['finish_date'] = $nowTime;
				$orders_data['finished'] = 'end';

                $customer_type = 7; //成交客户
				$success = true ;
				break;
			case 'refused': //第七步:退签[物流部]
				$orders_data['refused_date'] = $nowTime;
				$orders_data['refused_note'] = $note;
				$orders_data['finish_date'] = $nowTime;
                $orders_data['finished'] = 'interrupt';

                $customer_type = 6; //退单客户
				break;
			case 'canceling': //第1-4步:取消申请中[销售代表] 发货后不可取消
				$orders_data['cancel_date'] = $nowTime;
				$orders_data['cancel_note'] = $note;
				break;
			case 'cancel': //取消审核[销售经理]
				$orders_data['finish_date'] = $nowTime;
				$orders_data['finished'] = 'interrupt';
				break;
		}
		if($gift!=""){
			$orders_data['gift'] = $gift;
		}
		if($orders_address!=''){
			$orders_data['orders_address'] = $orders_address;
            //更新订单地址到客户信息表
            if($doModify){
                $cid = $orders['customer_id'];
                Customer::updateCustomer($cid,array('address'=>$orders_address));
            }
		}

		$cnt = Orders::updateOrders( $ordersId, $orders_data);

		if ($cnt>0) {
            //更新订单地址到客户信息的地址
            if($orders_address!=''&& $doModify){
                Customer::updateCustomer($customerId,array('address'=>$orders_address));
            }
            //根据订单状态对应到客户分类来计算过期日期
            if($customer_type!=''){
                $sp_expiration = SystemParam::getValue($customer_type);
                $d = $nowTime." +".$sp_expiration['param_value']." day";
                $expiration_date = date('Y-m-d H:i:s',strtotime($d));
                if($success){ //成交
                    $customer_data = array (
                        'type'				=> $customer_type ,
                        'expiration_date'	=> $expiration_date ,
                        'updater'		    => $current_user_id ,
                        "update_date"       => $nowTime,
                        "last_sale_date"    => $nowTime,
                        "transactions[+]"   => 1 ,
                    );
                }else{
                    $customer_data = array (
                        'type'				=> $customer_type ,
                        'expiration_date'	=> $expiration_date ,
                        'updater'		    => $current_user_id,
                        "update_date"       => $nowTime,
                        "last_sale_date"    => $nowTime,
                    );
                }
                $n2 = Customer::updateCustomer($customerId,$customer_data);
                if($n2>0) {
                    SysLog::addLog(UserSession::getUserName(), 'UPDATE', 'Customer', $customerId, json_encode($customer_data));
                }
            }

			SysLog::addLog ( UserSession::getUserName(), 'UPDATE', 'Orders' ,$ordersId, '更新订单状态[status]为'.$msg.':'.$status );
			$result = array("result"=>1,"msg"=> "操作成功,请注意跟踪订单状态,及时处理!");
		}else{
			$result = array("result"=>0,"msg"=> "操作失败，请刷新页面后重新提交！");
		}
	}
	echo json_encode($result);
}

//删除订单: 只限取消的订单才能删除
if ( $method=="ajax_deleteOrders" ) {

	$remark = Common::filterText($remark);

	if( $ordersId == "" || !$status =="new") {		
		$result = array("result"=>0,"msg"=> ErrorMessage::NEED_PARAM );
	}else{

		$ordersItem = Orders::getOrdersById($ordersId);

		$cnt = Orders::delOrdersById( $ordersId );
		
		if ($cnt>0) {
			SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'Orders' ,$ordersId, json_encode($ordersItem) );
			$result = array("result"=>1,"msg"=> "订单删除成功!");
		}else{
			$result = array("result"=>0,"msg"=> "订单删除失败，请刷新页面后重新提交！");
		}
	}
	echo json_encode($result);
}

//组方:
if ( $method=="ajax_addOrdersItem" ) {
	if($customerId=="" || $ordersId == 0 || $product_id =="-1" || $product_id ==""
		|| $item_num==0 || $productName=="") {		
		$result = array("result"=>0,"msg"=> ErrorMessage::NEED_PARAM."请检查:订单、产品、数量等信息");
	}else{
		//同一订单中不能有同一产品或营养素
		$hasPO = Orders::hasProductInOrders($ordersId,$product_id);
		if($hasPO){
			$result = array("result"=>0,"msg"=> "此订单中已存在同一营养素!");
		}else{
			$nowTime = date('Y-m-d H:i:s');
			$input_data = array(
				'orders_id'		=> $ordersId ,
				'product_id'	=> $product_id ,
				'product_name'	=> $productName ,
				'item_num'		=> $item_num ,
				'product_spec'	=> $item_spec ,
				// 'product_price'	=> $product_price ,
				// 'item_sum'		=> $item_sum ,
				// 'discount'		=> $discount ,
				// 'payment_sum'	=> $payment_sum ,
				'remark'		=> $item_remark ,
			);

			$item_id = Orders::addOrdersItem( $input_data );
			
			if ($item_id>0) {
				SysLog::addLog ( UserSession::getUserName(), 'ADD', 'Orders' ,$item_id, json_encode($input_data) );
				$result = array("result"=>1,"msg"=> "组方: 成功添加一个营养素!","newId"=>"$item_id");
			}else{
				$result = array("result"=>0,"msg"=> "组方: 添加营养素出现异常哦，请刷新页面后重新提交！");
			}
		}
	}
	echo json_encode($result);
}
//修改组方
if ( $method=="ajax_modifyOrdersItem" ) {
	if($ordersItemId=="" || $ordersId == 0 || $product_id =="-1" || $product_id ==""
		|| $item_num==0 || $productName=="") {		
		$result = array("result"=>0,"msg"=> "组方: 添加营养素出现异常,".ErrorMessage::NEED_PARAM);
	}else{
		$ordersItem = Orders::getItemsById($ordersItemId);
		$nowTime = date('Y-m-d H:i:s');
		$item_data = array(
			'product_id'	=> $product_id ,
			'product_name'	=> $productName ,
			'item_num'		=> $item_num ,
			'product_spec'	=> $item_spec ,
			// 'product_price'	=> $product_price ,
			// 'item_sum'		=> $item_sum ,
			// 'discount'		=> $discount ,
			// 'payment_sum'	=> $payment_sum ,
			'remark'		=> $item_remark ,
		);

		$cnt = Orders::updateOrdersItem( $ordersItemId,$item_data );
		
		if ($cnt>0) {
			SysLog::addLog ( UserSession::getUserName(), 'UPDATE', 'Orders' ,$ordersItemId, json_encode($ordersItem) );
			$result = array("result"=>1,"msg"=> "组方: 营养素已更新!","newId"=>"$ordersItemId");
		}else{
			$result = array("result"=>0,"msg"=> "组方: 营养素更新出现异常哦，请刷新页面后重新提交！");
		}

	}
	echo json_encode($result);
}
//删除组方
if ( $method=="ajax_deleteOrdersItem" ) {
    if($ordersItemId=="") {
        $result = array("result"=>0,"msg"=> "组方: 删除营养素出现异常（没有选中？）：".ErrorMessage::NEED_PARAM);
    }else{
        $cnt = Orders::delOrdersItemById( $ordersItemId );
        if ($cnt>0) {
           // SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'Orders' ,$ordersItemId, json_encode($ordersItem) );
            $result = array("result"=>1,"msg"=> "组方: 营养素已删除!");
        }else{
            $result = array("result"=>0,"msg"=> "组方: 营养素删除出现异常哦，请刷新页面后重新提交！");
        }
    }
    echo json_encode($result);
}

//订单跟踪
if($method=="ajax_expresstrack" && $express_no!=''){
    $data = array(
        'id'    => EXP_ID ,
        'secret'=> EXP_SECRET ,
        'com'   => 'auto', //$myOrders['shipped_express'] ,
        'nu'    => $express_no ,
        'type'  => EXP_TYPE ,
        'encode'=> EXP_ENCODE ,
        'ord'   => EXP_ORD ,
    );

    // post and get fileContent by curl
    $ch = curl_init();
    $timeout = 50;
    curl_setopt($ch, CURLOPT_URL, EXP_URL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $shipping_detail = curl_exec($ch);

    if (curl_errno($ch))
    {
        $shipping_detail = array(
            'data'=>array(
                'time'=>date('Y-m-d'),
                'content'=>'对不起,由于快递公司查询服务器延时,没有查询到物流信息,请稍后再试!',
            ),
        );
        $shipping_detail = json_encode($shipping_detail);
    }
    curl_close($ch);

    echo $shipping_detail;
}

?>