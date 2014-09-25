<?php
require ('../include/init.inc.php');
$itemId='';
extract ( $_REQUEST, EXTR_IF_EXISTS );
 
Common::checkParam($itemId);

$dictItem = Dict::getDictItemsById( $itemId );
if(empty($dictItem)){
	Common::exitWithError(ErrorMessage::DICT_NOT_EXIST,"admin/dicts.php");
}

Template::assign ( 'dictItem', $dictItem );
Template::display ( 'admin/dictitem_modify.tpl' );
