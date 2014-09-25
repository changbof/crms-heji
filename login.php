<?php
require ('./include/init.inc.php');
$user_name = $password = $remember = $verify_code = $ext = '';
extract ( $_POST, EXTR_IF_EXISTS );

if (Common::isPost ()) {
	if(strtolower($verify_code) != strtolower($_SESSION['osa_verify_code'])){
		OSAdmin::alert("error",ErrorMessage::VERIFY_CODE_WRONG);
	}else{
		$user_info = User::checkPassword ( $user_name, $password );
		
		if ($user_info) {
			if($user_info['status']==1){
				//更新分机号
				if ($ext) {
					User::setExt($user_info['user_id'],$ext);
				}
				
				User::loginDoSomething($user_info['user_id']);

				//====================================================
				//检查当日是否已检查过养护期客户
				$today = strtotime(date( 'Y-m-d'));
				$check_time = UserSession::getCheckValidTime();

				//若当天还没有执行,则立即执行养护期检查
				if($today > $check_time){
						Customer::backOpenSea($user_info['user_id']);
						//更新养护期检查时间
						SystemParam::setValue('checkvalid_date',$today);
						//并将时间更新到当前用户会话中
				}
				//====================================================
								
				if($remember){
					$encrypted = OSAEncrypt::encrypt($user_info['user_id']);
					User::setCookieRemember(urlencode($encrypted),30);
				}
				$ip = Common::getIp();
				SysLog::addLog ( $user_name, 'LOGIN', 'User' ,UserSession::getUserId(),json_encode(array("IP" => $ip )));
				Common::jumpUrl ( 'main.php' );
			}else{
				OSAdmin::alert("error",ErrorMessage::BE_PAUSED);
			}
		} else {
			OSAdmin::alert("error",ErrorMessage::USER_OR_PWD_WRONG);
			SysLog::addLog ( $user_name, 'LOGIN','User' ,'' , json_encode(ErrorMessage::USER_OR_PWD_WRONG) );
		}
	}
}
Template::assign ( '_POST',$_POST );
Template::assign ( 'page_title','登入' );
Template::Display ( 'login.tpl' );