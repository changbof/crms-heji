<?php
require ('../include/init.inc.php');
$dictId='';
extract ( $_REQUEST, EXTR_IF_EXISTS );

Template::assign ( 'dictId', $dictId );
Template::display ( 'admin/dictitem_add.tpl' );
