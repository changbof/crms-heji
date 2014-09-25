<?php
require ('../include/init.inc.php');

$current_time = date('Y-m-d H:i:s');

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

if (Common::isPost ()) {
	if(empty($_FILES['excel'])) {
		OSAdmin::alert("error","empty file");
	}else{
		if($_FILES['excel']['error'] != 0) {
			$message = '上传文件失败,error number('.$_FILES['excel']['error'].')';
			OSAdmin::alert("error",$message);
		}
		$file = $_FILES['excel']['tmp_name'];
		$excel_array = ExcelReader::readXLS($file,3);
		$current_user_id = UserSession::getUserId();
			
		foreach ($excel_array as $key=>&$customer) {
            //检查系统中是否已有此客户
            $crm_customer = Customer::getCustomerByPhone ( $customer[4] );
            if(empty($crm_customer)){
                //处理字典信息:将中文转化成对应的键值
                $customer[1] = array_search($customer[1],$sex_options);
                $customer[7] = array_search($customer[7],$link_relation_options);
                $customer[9] = array_search($customer[9],$income_options);
                $customer[11] = array_search($customer[11],$personalitytype_options);
                $traits = explode(',',$customer[12]);
                $traits = array_keys(array_intersect($personalitytraits_options,$traits));
                $customer[12] = implode(',', $traits);
                $customer[14] = array_search($customer[14],$dietpreference_options);
                $customer[15] = array_search($customer[15],$diettaste_options);

                $foods = explode(',',$customer[16]);
                $foods = array_keys(array_intersect($dietfoods_options,$foods));
                $customer[16] = implode(',', $foods);

                $hobby = explode(',',$customer[17]);
                $hobby = array_keys(array_intersect($diethobby_options,$hobby));
                $customer[17] = implode(',', $hobby);

                $snacks = explode(',',$customer[18]);
                $snacks = array_keys(array_intersect($dietsnacks_options,$snacks));
                $customer[18] = implode(',', $snacks);

                $customer[22] = array_search($customer[22],$labor_intensity_options);
                $customer[32] = ($customer[32]=='有'?'1':'2');

                $values .= "('".join("','",$customer)."','import','assign','$current_time','$current_time',$current_user_id,'open','-1'),";
            }
		}
		$values = substr($values,0,-1); //去掉最后一个逗号 
		$result = Customer::batchAddCustomers($values);
		if($result>0){
			SysLog::addLog ( UserSession::getUserName(), 'IMPORT', 'Customer','导入时间:'.$current_time, json_encode(array('create_date'=>$current_time,'source'=>'initialImport','rows'=>$result)) );
			Common::exitWithSuccess ('成功导入'.$result.'条客户信息！批次号：'.date_format(date_create($current_time),"YmdHis") ,'crms/customers.php');
		}else{
			OSAdmin::alert("error");
		}
	}
}

Template::display('crms/customers_import.tpl' );
