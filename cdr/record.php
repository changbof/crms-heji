<?php
require ('../include/init.inc.php');
$page_size = $page_no = $sdate = $edate = $dcontext = $keyword = $duration = '';

extract ( $_GET, EXTR_IF_EXISTS );

$sdate = $sdate==''?date('Y-m-d').' 00:00:00':$sdate;
$edate = $edate==''?date('Y-m-d').' 23:59:59':$edate;

//START 数据库查询及分页数据
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;

$row_count = Cti::countRecords($sdate, $edate, $dcontext, $keyword, $duration);
$total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
$total_page=$total_page<1?1:$total_page;
$page_no=$page_no>($total_page)?($total_page):$page_no;
$start = ($page_no - 1) * $page_size;
$myRecords = Cti::searchRecords($sdate, $edate, $dcontext, $keyword, $duration, $start, $page_size);


$page_html=Pagination::showPager("record.php?sdate=$sdate&edate=$edate&dcontext=$dcontext&keyword=$keyword&duration=$duration",$page_no,$page_size,$row_count);


Template::assign ('myRecords', $myRecords );
Template::assign ('sdate',$sdate);
Template::assign ('edate',$edate);
Template::assign ('_GET', $_GET);
Template::assign ('page_html', $page_html );
Template::display ('cdr/record.tpl' );