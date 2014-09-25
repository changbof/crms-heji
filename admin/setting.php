<?php 
require ('../include/init.inc.php');
$new_timezone = '';
$key_name = $key_title = $key_value = $remark = '';
extract ( $_POST, EXTR_IF_EXISTS );

$current_user_id=UserSession::getUserId();
$sysparams = System::getSysParams();
$timezone = System::get('timezone');

if (Common::isPost()) {
	System::set('timezone',$new_timezone,$key_title,$remark);
	$_SESSION['osa_timezone']=$new_timezone;
	Common::exitWithSuccess ('时区设置成功','/index.php');
}

$timezone_options=array(
		  "America/New_York"=>"纽约",
          "Europe/London"=>"伦敦,卡萨布拉卡",
          "Asia/Shanghai"=>"北京,新加坡,香港",
          "Asia/Tokyo"=>"东京,首尔",
		  );
		  
//更新Session里的用户信息

$dict_options = Dict::getDictForOptions();
ksort($dict_options);

Template::assign("user_info",UserSession::getSessionInfo());
Template::assign("timezone",$timezone);
Template::assign("timezone_options",$timezone_options);
Template::assign("sysparams",$sysparams);
Template::assign("dict_options",$dict_options);
Template::display ( 'admin/setting.tpl' );
?>


