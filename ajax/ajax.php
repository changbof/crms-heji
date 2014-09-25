<?php
require ('../include/init.inc.php');
$method = '';
$shopno = $guestphone = '';
$tokenKey = $ywname = $startdate = $usetype = $usenum = $usenum_dw = $curelong = '';
//取会员信息
$cardnum = $relationphone = $name = $papernumber = '';

extract ( $_REQUEST, EXTR_IF_EXISTS );

//取包厢类型及职员信息:大/小包等
if ($method=="getRoomsAndStaffs") {
	$rooms = Resources::getRooms($shopno);
	$staffs = Resources::getStaffs($shopno);
	echo json_encode(array("rooms"=>$rooms,"staffs"=>$staffs));
}
//根据取客人信息
if ($method=="getGuestInfo" && !empty($guestphone)) {
	//若来电号码不为空,则查询客户信息
	$guestinfo = Orders::getGuestInfo($guestphone);
	if(empty($guestinfo)){
		$guestinfo['errCode'] = '000';
	}else{
		$guestinfo['errCode'] = '100';
	}
	echo json_encode($guestinfo);
}
//取会员信息
if($method=="getMemberinfo"){
	if($cardnum!='' || $relationphone!='' || $name!='' || $papernumber!=''){
		$member = Resources::getCustomerInfo($cardnum,$relationphone,$name,$papernumber);
	}
	if(empty($member)){
		$member['errCode'] = '000';
	}else{
		$member['errCode'] = '100';
	}
	echo json_encode($member);
}
?>