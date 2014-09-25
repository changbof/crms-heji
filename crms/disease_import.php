<?php
require ('../include/init.inc.php');

$current_time = date('Y-m-d H:i:s');

if (Common::isPost ()) {
	if(empty($_FILES['excel'])) {
		OSAdmin::alert("error","empty file");
	}else{
		if($_FILES['excel']['error'] != 0) {
			$message = '上传文件失败,error number('.$_FILES['excel']['error'].')';
			OSAdmin::alert("error",$message);
		}
		$file = $_FILES['excel']['tmp_name'];
		$excel_array = ExcelReader::readXLS($file,3);
		$current_user_id = UserSession::getUserId();
			
		foreach ($excel_array as $key=>&$disease) {
		    $values .= "('".join("','",$disease)."','$current_user_id'),";
		}
		$values = substr($values,0,-1); //去掉最后一个逗号 
		$result = Disease::batchAddDiseases($values);
		if($result>0){
			SysLog::addLog ( UserSession::getUserName(), 'IMPORT', 'Disease','导入时间:'.$current_time, json_encode(array('create_date'=>$current_time,'source'=>'initialImport','rows'=>$result)) );
			Common::exitWithSuccess ('成功导入'.$result.'条知识库信息!','crms/diseases.php');
		}else{
			OSAdmin::alert("error");
		}
	}
}

Template::display('crms/disease_import.tpl' );
