<?php
require ('../include/init.inc.php');
$dictId='';
extract ( $_REQUEST, EXTR_IF_EXISTS );
 
Common::checkParam($dictId);

$dict = Dict::getDictById( $dictId );
if(empty($dict)){
	Common::exitWithError(ErrorMessage::DICT_NOT_EXIST,"admin/dicts.php");
}

$groupOptions=UserGroup::getGroupForOptions();

Template::assign ( 'dict', $dict );
Template::display ( 'admin/dict_modify.tpl' );
