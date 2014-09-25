<?php
require ('../include/init.inc.php');
$disease_name = $disease_pathology = $disease_prognostic = $disease_symptom = $disease_complication = '';
$disease_drug = $disease_therapy = $disease_check = $rec_hospital = $nutrients_effect = $precautions = '';
extract ( $_POST, EXTR_IF_EXISTS );
$nutrients_effect = Common::filterText($nutrients_effect);
if (Common::isPost ()) {
	
	if($disease_name ==""){
		OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
	}else{
		$disease_pathology = htmlspecialchars($disease_pathology);
		$disease_prognostic = htmlspecialchars($disease_prognostic);
		$disease_symptom = htmlspecialchars($disease_symptom);
		$disease_complication = htmlspecialchars($disease_complication);
		$disease_drug = htmlspecialchars($disease_drug);
		$disease_therapy = htmlspecialchars($disease_therapy);
		$disease_check = htmlspecialchars($disease_check);
		$rec_hospital = htmlspecialchars($rec_hospital);
		$nutrients_effect = htmlspecialchars($nutrients_effect);
		$precautions = htmlspecialchars($precautions);
		$input_data = array (
			'disease_name' 			=> $disease_name ,
			'disease_pathology' 	=> $disease_pathology ,
			'disease_prognostic' 	=> $disease_prognostic ,
			'disease_symptom' 		=> $disease_symptom ,
			'disease_complication'	=> $disease_complication,
			'disease_drug' 			=> $disease_drug ,
			'disease_therapy' 		=> $disease_therapy ,
			'disease_check' 		=> $disease_check ,
			'rec_hospital' 			=> $rec_hospital ,
			'nutrients_effect' 		=> $nutrients_effect ,
			'precautions' 			=> $precautions ,
			'owner_id' 				=> UserSession::getUserId(),
		);
		$disease_id = Disease::addDisease ( $input_data );
		
		if ($disease_id) {
			SysLog::addLog ( UserSession::getUserName(), 'ADD', 'Disease' ,$disease_id, json_encode($input_data) );
			Common::exitWithSuccess ('疾病知识库添加成功','crms/disease_add.php');
		}
	}
}

Template::assign("_POST" ,$_POST);
Template::display('crms/disease_add.tpl' );
