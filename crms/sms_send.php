<?php
require ('../include/init.inc.php');
$sendTo = '';

extract ( $_REQUEST, EXTR_IF_EXISTS );

if($sendTo==""){
	OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
}


Template::assign ('sendTo',$sendTo);

Template::display('crms/sms_send.tpl' );