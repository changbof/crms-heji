<?php
/**
 * Created by PhpStorm.
 * User: ABO
 * CreateTime: 14-5-4 上午11:01
 * Description:
 */ 
require ('../include/init.inc.php');
$ordersId = $a = '';

extract ( $_REQUEST, EXTR_IF_EXISTS );
Common::checkParam($ordersId);

$orders = Orders::getOrders ('', '', '', $ordersId );
if(!empty($orders)){
	$myOrders = $orders[0];
}
$items = Orders::getItemsForOrdersId($ordersId);
$ordersstatus_options = Dict::getDictForOptionsByKeyName('ordersstatus');
$expressCompany_options = Dict::getDictForOptionsByKeyName('expresscompany');
$expressCompany_options['']="－请选择－";

//订单跟踪
if($myOrders['shipped_express']!='' && $myOrders['express_no']!=''){
    $data = array(
        'id'    => EXP_ID ,
        'secret'=> EXP_SECRET ,
        'com'   => $myOrders['shipped_express'] ,
        'nu'    => $myOrders['express_no'] ,
        'type'  => EXP_TYPE ,
        'encode'=> EXP_ENCODE ,
        'ord'   => EXP_ORD ,
    );
    // post and get fileContent by curl
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, EXP_URL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $file_contents = curl_exec($ch);

    if (curl_errno($ch))
    {
        $shipping_detail = array(
            'data'=>array(
                'time'=>date('Y-m-d'),
                'content'=>'对不起,由于快递公司查询服务器延时,没有查询到物流信息,请稍后再试!',
            ),
        );
    }else{
        $shipping_detail = json_decode($file_contents,true);
    }
    curl_close($ch);
    //get fileContent by fOpen
    //$url=EXP_URL."?id=".EXP_ID."&secret=".EXP_SECRET."&com=".$myOrders['shipped_express']."&nu=".$myOrders['express_no']."&type=".EXP_TYPE."&encode=".EXP_ENCODE."&ord=".EXP_ORD;
    //$file_contents = file_get_contents($url);
    //$shipping_detail = json_decode($file_contents,true);
}

Template::assign ('a',$a);
Template::assign ('orders',$myOrders);
Template::assign ('items',$items);
Template::assign ('shipping_detail',$shipping_detail);
Template::assign ('ordersstatus_array',$ordersstatus_options);
Template::assign ('expressCompany_options',$expressCompany_options);
Template::display('crms/orders_verify.tpl' );