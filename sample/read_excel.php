<?php
require ('../include/init.inc.php');

$sex_options = Dict::getDictForOptionsByKeyName('sex');
$income_options = Dict::getDictForOptionsByKeyName('income');
$source_options = Dict::getDictForOptionsByKeyName('source');
$personalitytype_options = Dict::getDictForOptionsByKeyName('personalitytype');
$personalitytraits_options = Dict::getDictForOptionsByKeyName('personalitytraits');
$dietpreference_options = Dict::getDictForOptionsByKeyName('dietpreference');
$dietfoods_options = Dict::getDictForOptionsByKeyName('dietfoods');
$diethobby_options = Dict::getDictForOptionsByKeyName('diethobby');
$dietsnacks_options = Dict::getDictForOptionsByKeyName('dietsnacks');
$diettaste_options = Dict::getDictForOptionsByKeyName('diettaste');
$link_relation_options = Dict::getDictForOptionsByKeyName('relation');
$labor_intensity_options = Dict::getDictForOptionsByKeyName('laborintensity');
$ordersstatus_options = Dict::getDictForOptionsByKeyName('ordersstatus');

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
		
		//$output=print_r($excel_array,true);

		foreach ($excel_array as &$customer) {
			$customer[1] = array_search($customer[1],$sex_options);
			$customer[7] = array_search($customer[7],$link_relation_options);
			$customer[9] = array_search($customer[9],$income_options);
			$customer[11] = array_search($customer[11],$personalitytype_options);
			$traits = explode(',',$customer[12]);
			$traits = array_keys(array_intersect($personalitytraits_options,$traits));
			$customer[12] = implode(',', $traits);
			$customer[14] = array_search($customer[14],$dietpreference_options);
			$customer[15] = array_search($customer[15],$diettaste_options);

			$foods = explode(',',$customer[16]);
			$foods = array_keys(array_intersect($dietfoods_options,$foods));
			$customer[16] = implode(',', $foods);

			$hobby = explode(',',$customer[17]);
			$hobby = array_keys(array_intersect($diethobby_options,$hobby));
			$customer[17] = implode(',', $hobby);

			$snacks = explode(',',$customer[18]);
			$snacks = array_keys(array_intersect($dietsnacks_options,$snacks));
			$customer[18] = implode(',', $snacks);

			$customer[22] = array_search($customer[22],$labor_intensity_options);
			$customer[32] = ($customer[32]=='有'?'1':'2');

		    $value .= "('".join("','",$customer)."'),";
		}
		$value = substr($value,0,-1); //去掉最后一个逗号 
		$output=$value;
	}
}

Template::assign("_POST" ,$_POST);
Template::assign("output" ,$output);
Template::display ( 'sample/read_excel.tpl' );
