<?php
require ('../include/init.inc.php');
$f = '';
extract ( $_GET, EXTR_IF_EXISTS );

if(!$f){
    return false;
}

$filename = basename($f);

header("Content-type: application/octet-stream");

//处理中文文件名
$ua = $_SERVER["HTTP_USER_AGENT"];
$encoded_filename = rawurlencode($filename);
if (preg_match("/MSIE/", $ua)) {
    header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
} else if (preg_match("/Firefox/", $ua)) {
    header("Content-Disposition: attachment; filename*=\"utf8''" . $filename . '"');
} else {
    header('Content-Disposition: attachment; filename="' . $filename . '"');
}

//让Xsendfile发送文件
header("X-Sendfile: $file");