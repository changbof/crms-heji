<?php
require ('../include/init.inc.php');
$method = $dictId = $itemIds = '';
extract ( $_GET, EXTR_IF_EXISTS );

if ($method == 'del' && ! empty ( $dictId )) {
	$dicts = Dict::getItemsByDictId($dictId);
	if(sizeof($dicts)>0){
		OSAdmin::alert("error",ErrorMessage::HAVE_DICT);
	}else if(strtolower($owner) === 'system'){
		OSAdmin::alert("error",ErrorMessage::CAN_NOT_DELETE_SYSTEM_DICT);
	}else{
		$dict = Dict::getDictById($dictId);
		$result = Dict::delDict ( $dictId );
		if ($result>0) {
			SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'Dict',$dictId, json_encode($dict) );
			Common::exitWithSuccess ('已将字典项删除','admin/dicts.php');
		}else{
			OSAdmin::alert("error");
		}
	}
}
if ($method == 'delItem' && ! empty ( $itemIds )) {
	if(is_array($itemIds)){
		$itemIds=implode(',',$itemIds);
	}

	$result = Dict::delDictItem ($itemIds);
	
	if ($result>=0) {
		SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'Dict' , '', 'set item_status = disable' );
		Common::exitWithSuccess ('删除成功','admin/dicts.php');
	} else {
		OSAdmin::alert("error");
	}

}
//START 数据库查询及分页数据
/*
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;

$row_count = Dict::count ();
$total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
$total_page=$total_page<1?1:$total_page;
$page_no=$page_no>($total_page)?($total_page):$page_no;
$start = ($page_no - 1) * $page_size;
$dicts = Dict::getAllDicts($owner='', $start,$page_size);

$page_html=Pagination::showPager("dicts.php?dictId=$dictId",$page_no,$page_size,$row_count);
*/
$dicts = Dict::getAllDicts();

$confirm_html = OSAdmin::renderJsConfirm("icon-remove");

Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::assign ( 'dicts', $dicts );
Template::display ( 'admin/dicts.tpl' );
