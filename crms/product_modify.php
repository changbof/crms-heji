<?php
require ('../include/init.inc.php');
$product_name = $product_spec = $product_code = $unit = $usage = $brand = "";
$product_type = $place_origin = $product_price = $superiority = "";
$product_effect = $product_symptom = $product_side_effect = $product_use_time = $help_factor = "";
$inhibiting_factor = $food_sources = $online = "";
$product_id = $online_o = '';
$p = $a = '';
extract ( $_REQUEST, EXTR_IF_EXISTS );
Common::checkParam($product_id);

$product = Product::getProductById( $product_id );

if(empty($product)){
	Common::exitWithError(ErrorMessage::PRODUCT_NOT_EXIST,"crms/products.php");
}

if (Common::isPost ()) {
	
	$superiority = Common::filterText($superiority);
	$product_effect = Common::filterText($product_effect);
	$product_symptom = Common::filterText($product_symptom);
	$product_side_effect = Common::filterText($product_side_effect);
	$food_sources = Common::filterText($food_sources);

	if($product_id=="" || $product_name=="" || $product_price==""){
		OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
	}else{
		$current_user_info=UserSession::getSessionInfo();
		$user_group = $current_user_info['user_group'];
		$current_user_id = $current_user_info['user_id'];
		if($user_group==1){
			$superiority = htmlspecialchars($superiority);
			$product_effect = htmlspecialchars($product_effect);
			$product_symptom = htmlspecialchars($product_symptom);
			$product_side_effect = htmlspecialchars($product_side_effect);
			$food_sources = htmlspecialchars($food_sources);

			$update_data = array (
				'product_name' 			=> $product_name ,
				'product_spec' 			=> $product_spec ,
				'product_code' 			=> $product_code ,
        'product_type'			=> $product_type ,
				'unit' 					=> $unit ,
				'`usage`' 				=> $usage ,
				'brand' 				=> $brand ,
				'place_origin' 			=> $place_origin ,
				'product_price' 		=> $product_price ,
				'superiority' 			=> $superiority ,
				'product_effect' 		=> $product_effect ,
				'product_symptom' 		=> $product_symptom ,
				'product_side_effect' 	=> $product_side_effect ,
				'product_use_time' 		=> $product_use_time ,
				'help_factor' 			=> $help_factor ,
				'inhibiting_factor' 	=> $inhibiting_factor ,
				'food_sources' 			=> $food_sources ,
				'`online`' 				=> $online,
			 );
			if($online_o =='online' && $online=='underline'){
				$update_data['shelf_time'] = date('Y-m-d H:i:s') ;
			}
			$result = Product::updateProduct( $product_id,$update_data );	
			if ($result>=0) {
				SysLog::addLog ( UserSession::getUserName(), 'MODIFY', 'Product' ,$product_id, json_encode($update_data) );
				Common::exitWithSuccess ('更新完成','crms/products.php');
			} else { 
				OSAdmin::alert("error");
			}
		}else{
			OSAdmin::alert("error",ErrorMessage::ONLY_FOR_ADMIN);
		}
	}
}
Template::assign ( 'a', $a );
Template::assign ( 'p', $p );
Template::assign ( 'user_group', $user_group );
Template::assign ( 'product', $product );
Template::display ( 'crms/product_modify.tpl' );