<?php
require ('../include/init.inc.php');
$complainant = $vip_no = $phone = $complaint_subject = $complaint_content = $complaint_type = '';
extract ( $_POST, EXTR_IF_EXISTS );


Template::display('sample/layout.tpl' );