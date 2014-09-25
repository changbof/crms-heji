<?php
require ('../include/init.inc.php');
$disease_id = $disease_name = $disease_pathology = $disease_symptom = $disease_drug = $disease_check = $rec_hospital = $nutrients_effect = $precautions = $a = $p = '';
extract ( $_REQUEST, EXTR_IF_EXISTS );
Common::checkParam($disease_id);

$disease = Disease::getDiseaseById ( $disease_id );
if(empty($disease)){
	Common::exitWithError(ErrorMessage::DISEASE_NOT_EXIST,"crms/diseases.php");
}

if (Common::isPost ()) {
	$nutrients_effect = Common::filterText($nutrients_effect);
	if( $disease_name =="" || $disease_id=="" ){
		OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
	}else{
		$current_user_info=UserSession::getSessionInfo();
		$user_group = $current_user_info['user_group'];
		$current_user_id = $current_user_info['user_id'];

		if($user_group ==1 || $disease['owner_id'] == $current_user_id){
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
			$update_data = array (
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
			);
			$result = Disease::updateDisease( $disease_id,$update_data );
			
			if ($result>=0) {
				SysLog::addLog ( UserSession::getUserName(), 'MODIFY', 'Disease' ,$disease_id, json_encode($update_data) );
				Common::exitWithSuccess ('更新完成','crms/diseases.php');
			} else { 
				OSAdmin::alert("error");
			}
		}else{
			OSAdmin::alert("error",ErrorMessage::DISEASE_NOT_OWNER);
		}
	}
}
Template::assign ( 'a', $a );
Template::assign ( 'p', $p );
Template::assign ( 'disease', $disease );
Template::display ( 'crms/disease_modify.tpl' );