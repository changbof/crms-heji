<?php
require ('../include/init.inc.php');
$product_name = $product_spec = $product_code = $unit = $usage = $brand = "";
$product_type = $place_origin = $product_price = $superiority = "";
$product_effect = $product_symptom = $product_side_effect = $product_use_time = $help_factor = "";
$inhibiting_factor = $food_sources = $online = "";

extract ( $_POST, EXTR_IF_EXISTS );


if (Common::isPost ()) {
	
	$superiority = Common::filterText($superiority);
	$product_effect = Common::filterText($product_effect);
	$product_symptom = Common::filterText($product_symptom);
	$product_side_effect = Common::filterText($product_side_effect);
	$food_sources = Common::filterText($food_sources);

	if($product_name=="" || $product_price==""){		
		OSAdmin::alert("error",ErrorMessage::NEED_PARAM);
	}else{

		$superiority = htmlspecialchars($superiority);
		$product_effect = htmlspecialchars($product_effect);
		$product_symptom = htmlspecialchars($product_symptom);
		$product_side_effect = htmlspecialchars($product_side_effect);
		$food_sources = htmlspecialchars($food_sources);

		$input_data = array (
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
			'added_time' 			=> date('Y-m-d H:i:s')
		 );
		$product_id = Product::addProduct ( $input_data );
		
		if ($product_id) {
			SysLog::addLog ( UserSession::getUserName(), 'ADD', 'Product' ,$product_id, json_encode($input_data) );
			Common::exitWithSuccess ('产品添加成功','crms/product_add.php');
		}
	}
}

Template::assign("_POST" ,$_POST);
Template::display('crms/product_add.tpl' );
