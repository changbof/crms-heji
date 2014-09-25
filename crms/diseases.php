<?php
require ('../include/init.inc.php');
$method = $page_no = $disease_id = $key = '';
extract ( $_GET, EXTR_IF_EXISTS );

//START 数据库查询及分页数据
$row_count = Disease::count($key);
$page_size = PAGE_SIZE;
$page_no=$page_no<1?1:$page_no;
$total_page=$row_count%$page_size==0?$row_count/$page_size:ceil($row_count/$page_size);
$total_page=$total_page<1?1:$total_page;
$page_no=$page_no>($total_page)?($total_page):$page_no;
$start = ($page_no - 1) * $page_size;

$current_user_info=UserSession::getSessionInfo();
$user_group = $current_user_info['user_group'];
$current_user_id = $current_user_info['user_id'];

if ($method == 'del' && ! empty ( $disease_id )) {
	
	$disease = Disease::getDiseaseById($disease_id);
	
	//是超级管理员组的成员或者是disease的主人
	if($user_group ==1 || $disease['owner_id'] == $current_user_id){
		$result = Disease::delDisease ( $disease_id );
		if ($result>0) {
			SysLog::addLog ( UserSession::getUserName(), 'DELETE', 'Disease',$disease_id, json_encode($disease) );
			Common::exitWithSuccess ('疾病知识库删除成功','crms/diseases.php');
		}else{
			OSAdmin::alert("error");
		}
	}else{
		OSAdmin::alert("error",ErrorMessage::DISEASE_NOT_OWNER);
	}
}

$diseases = Disease::getDiseases($key,$start,$page_size);

$confirm_html = OSAdmin::renderJsConfirm("icon-remove");

$page_html=Pagination::showPager("?key=$key",$page_no,PAGE_SIZE,$row_count);

Template::assign ( 'page_no', $page_no );
Template::assign ( 'page_size', PAGE_SIZE );
Template::assign ( 'row_count', $row_count );
Template::assign ( 'page_html', $page_html );
Template::assign ( 'diseases', $diseases );
Template::assign ( 'osadmin_action_confirm' , $confirm_html);
Template::assign ( 'user_group', $user_group );
Template::assign ( 'current_user_id', $current_user_id );
Template::display ( 'crms/diseases.tpl' );
