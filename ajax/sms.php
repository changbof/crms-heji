<?php
require ('../include/init.inc.php');
$method = '';
$shopno = $guestphone = '';
$tokenKey = $ywname = $startdate = $usetype = $usenum = $usenum_dw = $curelong = '';
//取会员信息
$cardnum = $relationphone = $name = $papernumber = '';

extract ( $_REQUEST, EXTR_IF_EXISTS );

//发送短信
if ($method=="sendSMS" && !empty($guestphone)) {
	//若来电号码不为空
    /*
    //=====================================================
    //若预订成功则发送短信
    if($rst['result']==0){
        $sms_content_temp = "尊敬的{gname}，{gshop}{groom}，预约号{gno}，{gtime}前到店。{gaddress} 客服专线4000731321(新麦客量贩KTV)。";

        $replacement = array(
            "{gname}" 	=> mb_strimwidth($guestname, 0, 2, '', 'utf8').$guestsex,
            "{gshop}"	=> $roomshopno ,
            "{groom}"	=> $roompricesortid ,
            "{gno}"		=> substr($guesttel,-4) , //$rst['destineVoucher'] //预约号
            "{gtime}"	=> $destinedatetime ,
            "{gaddress}"=> '',
        );

        $sms_content = strtr($sms_content_temp,$replacement);
        //发送短信
        $sms_data = array(
            'sms_subject'	=> '房型预约:预订',
            'sms_content'	=> $sms_content ,
            'sms_category'	=> 0 , //0-包厢预约 1-预约取消 2-投诉
            'sms_to'		=> $guesttel ,
            'sms_to_vip'	=> $guestname ,
            'creator'		=> UserSession::getExt(),
            'create_time'	=> time(),
            'status'		=> 0 , //等待发送
        );

        $rst = Sms::sendSms($sms_data);
        if($rst>0){
            $rst['msg'] .= "(已发短信)";
        }
    }
    //=====================================================
    */
	echo json_encode($rst);
}

?>