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
			
		foreach ($excel_array as $key=>&$product) {
			//处理字典信息:将中文转化成对应的键值
			$product[16] = $product[16]=='套餐'?'suite':'single';
		    $values .= "('".join("','",$product)."','online','$current_time'),";
		}
		$values = substr($values,0,-1); //去掉最后一个逗号 
		$result = Product::batchAddProducts($values);
		if($result>0){
			SysLog::addLog ( UserSession::getUserName(), 'IMPORT', 'Product','导入时间:'.$current_time, json_encode(array('create_date'=>$current_time,'source'=>'initialImport','rows'=>$result)) );
			Common::exitWithSuccess ('成功导入'.$result.'个产品信息!','crms/products.php');
		}else{
			OSAdmin::alert("error");
		}
	}
}

Template::display('crms/product_import.tpl' );
