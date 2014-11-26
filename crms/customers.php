<?php
require ('../include/init.inc.php');
$page_size = $page_no = $customer_ids = $type = $status = $vested = $name = '';
$dd = Common::getDaysOfWeek(date('Y-m-d'));
$sdate = $dd[0];
$edate = date('Y-m-d');
$method = $saler='';
$select_dt='create_date';

extract ( $_REQUEST, EXTR_IF_EXISTS );

if(empty($_GET)){
	$_GET['sdate'] = $sdate;
	$_GET['edate'] 	= $edate;
    $_GET['page_size'] 	= 50;
}

$current_user_info=UserSession::getSessionInfo();
$user_group = $current_user_info['user_group'];
$current_user_id = $current_user_info['user_id'];

//自动随机均匀分配
if($method == 'autoassign'){
	if($user_group != 1){
		OSAdmin::alert("error",ErrorMessage::ONLY_FOR_ADMIN);
	}else{
		$result = Customer::randAssign();
		$nowTime = date('Y-m-d H:i:s');
		if ($result>=0) {
			SysLog::addLog ( UserSession::getUserName(), 'ASSIGN', 'Customer' ,'[管理员]自动随机均匀分配', '本次共随机分配'.$result.'个客户[时间:'.$nowTime.']' );
			Common::exitWithSuccess ('客户自动随机分配已完成。<br />本次共随机分配'.$result.'个客户[完成时间:'.$nowTime.']','crms/customers.php');
		}else{
			OSAdmin::alert("error");
		}
	}		
}else if($method == 'remove') {
	if(!empty ( $customer_ids )){//批量删除
		if($user_group != 1){
			OSAdmin::alert("error",ErrorMessage::ONLY_FOR_ADMIN);
		}else{
			$customer_ids=implode(',',$customer_ids);
			$result = Customer::batchDelCustomers($customer_ids);
			if ($result) {
				SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'Customer' ,$customer_ids, '共删除'.result.'客户记录' );
				Common::exitWithSuccess ('客户信息已成功删除','crms/customers.php');
			}else{
				OSAdmin::alert("error");
			}
		}
	}
}else if($method == 'assign'){
	if(!empty ( $customer_ids )){//指定分配
		if($user_group != 1){
			OSAdmin::alert("error",ErrorMessage::ONLY_FOR_ADMIN);
		}else{
			$customer_ids=implode(',',$customer_ids);
            $nowtime = date("Y-m-d H:i:s");
			$update_data = array (
				'vested'        => $saler,
				'assign_date'   => $nowtime,
				'status'		=> 'assigned',
                'type'          => '-1',
                'expiration_date'=>date('Y-m-d',strtotime("+4 day")),
                "update_date"   =>$nowtime,
                "updater"       =>1,

			);
			$result = Customer::batchAssignCustomers($customer_ids,$update_data);
			if ($result>=0) {
                Sale::batchUpdateSale($customer_ids,array('vested'=> $saler));
                Orders::batchUpdateOrders($customer_ids,array('vested'=> $saler));

				SysLog::addLog ( UserSession::getUserName(), 'ASSIGN', 'Customer' ,$customer_ids, json_encode($update_data) );
				Common::exitWithSuccess ('客户分配成功','crms/customers.php');
			}else{
				OSAdmin::alert("error");
			}
		}
	}
}

//START 数据库查询及分页数据
$page_size = ($page_size==''?PAGE_SIZE:$page_size);
$page_no=$page_no<1?1:$page_no;

if($user_group==4){ //销售代表
	$_vested = $current_user_id;
}else{ //营养师/物流部
	$_vested = $vested ;
}
$row_count = Customer::countSearch($select_dt,$sdate,$edate,$type,$status,$_vested,$name);
$total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
$total_page=$total_page<1?1:$total_page;
$page_no=$page_no>($total_page)?($total_page):$page_no;
$start = ($page_no - 1) * $page_size;
$customers = Customer::search($select_dt,$sdate,$edate,$type,$status,$_vested,$name,$start,$page_size);


$page_html=Pagination::showPager("customers.php?select_dt=$select_dt&sdate=$sdate&edate=$edate&type=$type&status=$status&vested=$_vested&name=$name&search=$search",$page_no,$page_size,$row_count);

$status_options_list = Dict::getDictForOptionsByKeyName('customerstatus');
$status_options_list['']="全部";
//ksort($status_options_list);
$type_options_list = Dict::getDictForOptionsByKeyName('customertype');
$type_options_list['']="全部";
//ksort($type_options_list);

$saler_options_list = User::getUserForOptions(4);
$saler_options_list['']="分配给:";
ksort($saler_options_list);

Template::assign ('current_user_info',$current_user_info);
Template::assign ('status_options_list',$status_options_list);
Template::assign ('type_options_list',$type_options_list);
Template::assign ('saler_options_list',$saler_options_list);
Template::assign ('_GET',$_GET);
Template::assign ('page_html',$page_html);
Template::assign ('customers',$customers);
Template::display ( 'crms/customers.tpl' );
