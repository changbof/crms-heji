<?php
require ('../include/init.inc.php');
$method = '';
$name = $owner = $remark = $status = '';
$dictId = $id = '';
$key_name = $key_title = $key_value = $remark = '';
$item_id = $item_name = $item_status = $item_sort = '';

extract ( $_REQUEST, EXTR_IF_EXISTS );

//添加字典项信息
if ($method=="ajax_addDict") {
	if($name=="" || $owner=="" || $status==""){
		$result = array("result"=>0,"msg"=> ErrorMessage::NEED_PARAM );
	}else{
		$input_data = array (
			'name'		=> $name,
			'owner' 	=> $owner,
			'status' 	=> $status, 
			'remark' 	=> $remark
		 );
		$newId = Dict::addDict($input_data);
		if($newId !== false ){
			SysLog::addLog ( UserSession::getUserName(),'ADD','Dict',$newId,json_encode($input_data) );
			$result = array("result"=>"1","msg"=>"添加成功","dictId"=>$newId);
		}else{
			$result = array("result"=>"0","msg"=>"oOops! 添加不成功,请稍后再试!");
		}
	}
	echo json_encode($result);
}
if ($method=="ajax_modifyDict") {
	if($id=="" || $name=="" || $owner=="" || $status==""){
		$result = array("result"=>0,"msg"=> ErrorMessage::NEED_PARAM );
	}else{
		$dict = Dict::getDictById($id);
		$input_data = array (
			'name'		=> $name,
			'owner' 	=> $owner,
			'status' 	=> $status, 
			'remark' 	=> $remark
		 );
		$count = Dict::updateDict($id, $input_data);
		if($count>0){
			SysLog::addLog ( UserSession::getUserName(),'UPDATE','Dict',$id,json_encode($dict) );
			$result = array("result"=>"1","msg"=>"修改成功");
		}else{
			$result = array("result"=>"0","msg"=>"oOops! 修改不成功,请稍后再试!");
		}
	}
	echo json_encode($result);
}

//添加字典子项信息
if ($method=="ajax_addItemForDict") {
	if($dictId=="" || $item_id=="" || $item_name=="" || $item_status==""){
		$result = array("result"=>0,"msg"=> ErrorMessage::NEED_PARAM );
	}else{
		$input_data = array (
			'dict_id'		=> $dictId,
			'item_id' 		=> $item_id, 
			'item_name'		=> $item_name,
			'item_status' 	=> $item_status,
			'item_sort' 	=> $item_sort,
			'remark'		=> $remark,
		 );
		$newId = Dict::addDictItem($input_data);
		if($newId !== false ){
			SysLog::addLog ( UserSession::getUserName(),'ADD','Dict',$newId,json_encode($input_data) );
			$result = array("result"=>"1","msg"=>"添加成功","itemId"=>$newId);
		}else{
			$result = array("result"=>"0","msg"=>"oOops! 添加不成功,请稍后再试!");
		}
	}
	echo json_encode($result);
}
//获取字典子项
if ($method=="ajax_getItemForDictId") {
	if($dictId==""){
		$result = array("result"=>0,"msg"=> ErrorMessage::NEED_PARAM );
	}else{

		$dictItems = Dict::getItemsByDictId($dictId);
		if($dictItems){
			$result = $dictItems;
		}else{
			$result = array("result"=>"0","msg"=>"oOops!");
		}
	}
	echo json_encode($result);
}
//修改子项信息
if ($method=="ajax_updateItemById" && $id!='') {
	if($item_id=="" || $item_name=="" || $item_status==""){
		$result = array("result"=>0,"msg"=> ErrorMessage::NEED_PARAM );
	}else{
		$update_data = array (
			'item_id' 		=> $item_id, 
			'item_name'		=> $item_name,
			'item_status' 	=> $item_status,
			'item_sort' 	=> $item_sort,
			'remark'		=> $remark,
		 );
		$newId = Dict::updateDictItemById($id,$update_data);
		if($newId !== false ){
			SysLog::addLog ( UserSession::getUserName(),'ADD','Dict',$newId,json_encode($update_data) );
			$result = array("result"=>"1","msg"=>"修改成功","itemId"=>$newId);
		}else{
			$result = array("result"=>"0","msg"=>"oOops! 添加不成功,请稍后再试!");
		}
	}
	echo json_encode($result);
}
//设置系统参数
if ($method=="ajax_setSystemParams") {
	if($key_name=="" || $key_value==""){
		$result = array("result"=>0,"msg"=> ErrorMessage::NEED_PARAM );
	}else{
		$id = System::set($key_name,$key_value,$key_title,$remark);
		if($id !== false ){
			$result = array("result"=>"1","msg"=>"操作成功");
		}else{
			$result = array("result"=>"0","msg"=>"oOops! 操作不成功,请稍后再试!");
		}
	}
	echo json_encode($result);
}
?>