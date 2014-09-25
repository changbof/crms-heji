<?php
require ('../include/init.inc.php');
$ordersstatus_options = Dict::getDictForOptionsByKeyName('ordersstatus');

Template::assign ( 'ordersstatus_options', $ordersstatus_options );
Template::display('sample/datatables.tpl' );