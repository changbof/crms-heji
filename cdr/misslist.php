<?php
require ('../include/init.inc.php');
$page_no = $sdate = $edate = $keyword = $type = $duration = '';

extract ( $_GET, EXTR_IF_EXISTS );
if(empty($_GET)){
    $_GET['duration'] = $sdate;
}

$sdate = $sdate==''?date('Y-m-d').' 00:00:00':$sdate;
$edate = $edate==''?date('Y-m-d').' 23:59:59':$edate;

$current_user_info=UserSession::getSessionInfo();
$user_group = $current_user_info['user_group'];
$user_name = $current_user_info['user_name'];
if($user_group!=1){
    $keyword = $user_name;
}

//START 数据库查询及分页数据
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;

$row_count = Cti::countMissList($sdate, $edate,'',$keyword,$type, $duration);
$total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
$total_page=$total_page<1?1:$total_page;
$page_no=$page_no>($total_page)?($total_page):$page_no;
$start = ($page_no - 1) * $page_size;
$myMisses = Cti::searchMissList($sdate, $edate,'',$keyword, $type, $duration, $start, $page_size);


$page_html=Pagination::showPager("misslist.php?sdate=$sdate&edate=$edate&keyword=$keyword&duration=$duration",$page_no,$page_size,$row_count);

Template::assign ( 'start', $start );
Template::assign ( 'page_no', $page_no );
Template::assign ( 'myMisses', $myMisses );
Template::assign ( 'sdate',$sdate);
Template::assign ( 'edate',$edate);
Template::assign ( '_GET', $_GET);
Template::assign ( 'page_html', $page_html );
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::display( 'cdr/misslist.tpl' );