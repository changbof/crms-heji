<?php
require ('../include/init.inc.php');
$method = $customerId = '';
//客户信息
$name = $sex = $birthday = $address = $mobile = $telphone = $link_man = $link_relation = $link_phone = $income = '';
$source = $referrals = $personality_type = $personality_traits = $remark = ''; 
$diet_preference = $diet_taste = $diet_foods = $diet_hobby = $diet_snacks = '';
$health_height = $health_body_weight = $health_profession = $health_labor_intensity = '';
$health_blood_pressure = $health_blood_pressure_height = $health_gi_preprandial = $health_gi_postprandial = '';
$health_diagnosis = $health_diagnosis_time = $health_diagnosis_other = $health_symptom = '';
$health_has_biochemical_indicators = $health_anomaly_indicators = $health_had_medication = '';
$vested = '';


extract ( $_REQUEST, EXTR_IF_EXISTS );

//当前用户信息
$current_user_info=UserSession::getSessionInfo();
$user_group = $current_user_info['user_group'];
$current_user_id = $current_user_info['user_id'];


if ($method=="ajax_addCustomer" ) {

	$health_diagnosis_other = Common::filterText($health_diagnosis_other);
	$health_symptom 		= Common::filterText($health_symptom);

	if($name=="" || $mobile=="" || $address=="") {
		$result = array("result"=>0,"msg"=> "oOops!<br />".ErrorMessage::NEED_PARAM);
	}else{
		//检查系统中是否已有此客户
		$customer = Customer::getCustomerByPhone ( $mobile );
		if(!empty($customer)){
			$result = array("result"=>0,"msg"=> "oOops!<br />".ErrorMessage::CUSTOMER_ALREADY_EXIST);
		}else{

			$health_diagnosis_other = htmlspecialchars($health_diagnosis_other);
			$health_symptom 		= htmlspecialchars($health_symptom);
			$nowTime				= date('Y-m-d H:i:s');

			//处理多选: 字符串转数组
			if(!empty($personality_traits)){
				$personality_traits=implode(',',$personality_traits);
			}
			if(!empty($diet_foods)){
				$diet_foods=implode(',',$diet_foods);
			}
			if(!empty($diet_hobby)){
				$diet_hobby=implode(',',$diet_hobby);
			}
			if(!empty($diet_snacks)){
				$diet_snacks=implode(',',$diet_snacks);
			}

			$customer_data = array (
				'name'								=> $name ,
				'sex'								=> $sex ,
				'birthday'							=> $birthday ,
				'address'							=> $address ,
				'mobile'							=> $mobile ,
				'telphone'							=> $telphone ,
				'link_man'							=> $link_man ,
				'link_relation'						=> $link_relation ,
				'link_phone'						=> $link_phone ,
				'income'							=> $income ,
				'referrals'							=> $referrals ,
				'personality_type'					=> $personality_type ,
				'personality_traits'				=> $personality_traits ,
				'remark'							=> $remark ,
				'diet_preference'					=> $diet_preference ,
				'diet_taste'						=> $diet_taste ,
				'diet_foods'						=> $diet_foods ,
				'diet_hobby'						=> $diet_hobby ,
				'diet_snacks'						=> $diet_snacks ,
				'health_height'						=> $health_height ,
				'health_body_weight'				=> $health_body_weight ,
				'health_profession'					=> $health_profession ,
				'health_labor_intensity'			=> $health_labor_intensity ,
				'health_blood_pressure'				=> $health_blood_pressure ,
				'health_blood_pressure_height'		=> $health_blood_pressure_height ,
				'health_gi_preprandial'				=> $health_gi_preprandial ,
				'health_gi_postprandial'			=> $health_gi_postprandial ,
				'health_diagnosis'					=> $health_diagnosis ,
				'health_diagnosis_other'			=> $health_diagnosis_other ,
				'health_symptom'					=> $health_symptom ,
				'health_has_biochemical_indicators'	=> $health_has_biochemical_indicators ,
				'health_anomaly_indicators'			=> $health_anomaly_indicators ,
				'health_had_medication'				=> $health_had_medication ,
				'createby'							=> 'add',
				'create_date'						=> $nowTime ,
				'source'							=> $source ,
				'update_date'						=> $nowTime ,
				'updater'							=> $current_user_id,
			);
			if(!$health_diagnosis_time==''){
				$customer_data['health_diagnosis_time'] = $health_diagnosis_time;
			}
			if($user_group==4){
				$customer_data['status'] = 'assigned';
				$customer_data['vested'] = $current_user_id;
			}else{
				$customer_data['status'] = 'open';
			}
			$newId = Customer::addCustomer( $customer_data );

			if ($newId>0) {
				SysLog::addLog ( UserSession::getUserName(), 'ADD', 'Customer' ,$newId, '新增客户信息' );
				$result = array("result"=>1,"msg"=> "新增客户信息成功");
			}else{
				$result = array("result"=>0,"msg"=> "新增客户信息不成功，请检查数据后重新提交！");
			}
		}
	}
	echo json_encode($result);
}

if ($method=="ajax_updateCustomer" ) {

	$health_diagnosis_other = Common::filterText($health_diagnosis_other);
	$health_symptom 		= Common::filterText($health_symptom);

	if($customerId=="" || $name=="" || $mobile=="" || $address=="") {
		$result = array("result"=>0,"msg"=> "oOops!<br />".ErrorMessage::NEED_PARAM);
	}else{

		$health_diagnosis_other = htmlspecialchars($health_diagnosis_other);
		$health_symptom 		= htmlspecialchars($health_symptom);
		$nowTime				= date('Y-m-d H:i:s');

		//处理多选: 字符串转数据
		if(!empty($personality_traits)){
			$personality_traits=implode(',',$personality_traits);
		}
		if(!empty($diet_foods)){
			$diet_foods=implode(',',$diet_foods);
		}
		if(!empty($diet_hobby)){
			$diet_hobby=implode(',',$diet_hobby);
		}
		if(!empty($diet_snacks)){
			$diet_snacks=implode(',',$diet_snacks);
		}

		$input_data = array (
			'name'								=> $name ,
			'sex'								=> $sex ,
			'birthday'							=> $birthday ,
			'address'							=> $address ,
			'mobile'							=> $mobile ,
			'telphone'							=> $telphone ,
			'link_man'							=> $link_man ,
			'link_relation'						=> $link_relation ,
			'link_phone'						=> $link_phone ,
			'income'							=> $income ,
			'referrals'							=> $referrals ,
			'personality_type'					=> $personality_type ,
			'personality_traits'				=> $personality_traits ,
			'remark'							=> $remark ,
			'diet_preference'					=> $diet_preference ,
			'diet_taste'						=> $diet_taste ,
			'diet_foods'						=> $diet_foods ,
			'diet_hobby'						=> $diet_hobby ,
			'diet_snacks'						=> $diet_snacks ,
			'health_height'						=> $health_height ,
			'health_body_weight'				=> $health_body_weight ,
			'health_profession'					=> $health_profession ,
			'health_labor_intensity'			=> $health_labor_intensity ,
			'health_blood_pressure'				=> $health_blood_pressure ,
			'health_blood_pressure_height'		=> $health_blood_pressure_height ,
			'health_gi_preprandial'				=> $health_gi_preprandial ,
			'health_gi_postprandial'			=> $health_gi_postprandial ,
			'health_diagnosis'					=> $health_diagnosis ,
			'health_diagnosis_other'			=> $health_diagnosis_other ,
			'health_symptom'					=> $health_symptom ,
			'health_has_biochemical_indicators'	=> $health_has_biochemical_indicators ,
			'health_anomaly_indicators'			=> $health_anomaly_indicators ,
			'health_had_medication'				=> $health_had_medication ,
			'source'							=> $source ,
			'update_date'						=> $nowTime ,
			'updater'							=> UserSession::getUserId(),
		);
		if(!$health_diagnosis_time==''){
			$customer_data['health_diagnosis_time'] = $health_diagnosis_time;
		}

		$rst = Customer::updateCustomer( $customerId, $input_data );

		if ($rst>0) {
			SysLog::addLog ( UserSession::getUserName(), 'UPDATE', 'Customer' ,$customerId, '修改客户信息' );
			$result = array("result"=>1,"msg"=> "修改客户信息成功");
		}else{
			$result = array("result"=>0,"msg"=> "修改客户信息不成功，请检查数据后重新提交！");
		}
	}
	echo json_encode($result);
}

if($method=="ajax_sumDuration"){
	$ext = $current_user_info['ext'];
	$sdate = date('Y-m-d');
	$edate = date('Y-m-d',strtotime("+1 day"));
	
	$duration = Cti::sumDuration( $sdate, $edate, $ext );
	echo json_encode(array("result"=>1,"msg"=> "获取通话时长成功","duration"=>$duration));

}
if($method=="ajax_statCustomer"){
    if($user_group!=1){
        $vested = $current_user_info['user_id'];
    }
    $statInfo = Customer::statCustomer( $vested );
    echo json_encode(array("result"=>1,"msg"=> "获取销售代表客户统计信息成功","data"=>$statInfo));
}
?>