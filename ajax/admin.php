<?php
require ('../include/init.inc.php');
$method = '';
$note_id = $note_content = '';

extract ( $_REQUEST, EXTR_IF_EXISTS );

//获取消息
if ($method=="ajax_getquicknote" && $note_id !="") {
	$quicknote = QuickNote::getNoteById( $note_id );
	QuickNote::updateNote($note_id,array('status'=>'readed'));
	echo json_encode($quicknote);
}

?>