<?php
require ('../include/init.inc.php');
$method = $isNew = $ComeTelPhone = $GuestName = $GuestSex = $MemberID = '';
extract ( $_GET, EXTR_IF_EXISTS );

if ($method=="add") {
	if($ComeTelPhone=="" || $GuestName==""){
		$rst = array("result"=>"0","msg"=>"oOops!<br />".ErrorMessage::NEED_PARAM)
	}else{
		$input_data = array (
			'ComeTelPhone' 	=> $ComeTelPhone,
			'GuestName' 	=> $GuestName, 
			'GuestSex' 		=> $GuestSex, 
			'MemberID'		=> $MemberID,
			'ZKMachineIP'	=> Common::getClientIp()
		 );
		$rst = Orders::addComeTel( $input_data );
		SysLog::addLog ( UserSession::getUserName(), 'ADD', 'ComeTel' ,$rst['ComeTelID'], json_encode($input_data) );
	}
	echo json_encode($rst);

}else if($method=="del"){

	$shortcut_arr = explode(',',$shortcuts);
	$idx = array_search($menu_id,$shortcut_arr);
	if($idx !==false ){
		unset($shortcut_arr[$idx]);
	}
	$shortcuts = implode(',',$shortcut_arr);
	$update_data = array ('shortcuts' => $shortcuts );
		
	$result = User::updateUser ( $user_id,$update_data );
	if($result !==false ){
		$ret = json_encode(array("result"=>"1","msg"=>"删除成功"));
		UserSession::reload();
	}else{
		$ret = json_encode(array("result"=>"0","msg"=>"oOops!"));
	}
	echo $ret;
}
?>