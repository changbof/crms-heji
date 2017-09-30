<?php
require ('../include/init.inc.php');
$method = '';
$sms_content = $sms_to = $sms_toname = '';

extract ( $_REQUEST, EXTR_IF_EXISTS );

//发送短信
if ($method=="sendSMS" && !empty($guestphone)) {
    /*
	//若页面上没有处理则先处理短信内容
    $sms_content_temp = $sms_content;
    $replacement = array(
        "{CNAME}" 	=> $sms_toname ,
        "{UEXT}"	=> UserSession::getExt() ,
        "{UNAME}"   => UserSession::getRealName() ,
    );
    $sms_content = strtr($sms_content_temp,$replacement);
    */
    //发送短信
    $sms_data = array(
        'sms_subject'	=> '营销短信',
        'sms_content'	=> $sms_content ,
        'sms_category'	=> 0 , //0-普通 1-定时 2-群发
        'sms_to'		=> $sms_to ,
        'sms_to_vip'	=> $sms_toname ,
        'creator'		=> UserSession::getUserId(),//短信发送人（如销售代表）（为用户ID）
        'create_time'	=> time(),
        'status'		=> 0 , //等待发送
    );

    $result = Sms::sendSmsforYX($sms_data);
    $rst['result'] = $result;
    switch($result)
    {
        case -2:
            $rst['msg'] = "客户手机号码不正确,请修改客户信息。"; break;
        case -1:
            $rst['msg'] = "数据保存失败。"; break;
        case 0:
            $rst['msg'] = "短信发送成功！"; break;
        case 1001:
            $rst['msg'] = "用户名或密码错误！"; break;
        case 1002:
            $rst['msg'] = "账户余额不足！"; break;
        case 1003:
            $rst['msg'] = "参数错误，请输入完整的参数！"; break;
        case 1004:
            $rst['msg'] = "其他错误！"; break;
        case 1005:
            $rst['msg'] = "预约时间格式不正确！"; break;
        default:
            $rst['msg'] = "短信发送成功！"; break;
    }
	echo json_encode($rst);
}

?>